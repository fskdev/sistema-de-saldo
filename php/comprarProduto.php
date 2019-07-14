<?php
require('conectarBanco.php');

if(isset($_POST['produto']) && $_POST['usuario']) {
    $produto = $_POST['produto'];
    $usuario = $_POST['usuario'];

    $consulta = mysqli_query($mysqli, "SELECT * FROM produtosinfos WHERE Produto='$produto'");
    $linhas = mysqli_num_rows($consulta);

    if($linhas == 1) {
        $queryInfos = mysqli_fetch_assoc($consulta);
        $valor = $queryInfos['Valor'];

        $consulta2 = mysqli_query($mysqli, "SELECT * FROM userinfos WHERE Usuario='$usuario'");
        $queryInfos2 = mysqli_fetch_assoc($consulta2);
        $dinheiroDisponivel = $queryInfos2['Dinheiro'];

        if($dinheiroDisponivel >= $valor) {
            $dinheiroResto = $dinheiroDisponivel - $valor;

            mysqli_query($mysqli, "UPDATE userinfos SET Dinheiro='$dinheiroResto' WHERE Usuario='$usuario'");
            mysqli_query($mysqli, "INSERT INTO produtoscomprados (Produto, Responsavel, Valor) VALUES ('$produto','$usuario', '$valor')");

            header('Location: ../loja.php?comprarsucess');
        } else {
            header('Location: ../loja.php?comprarerro2');
        }
    } else {
        header('Location: ../loja.php?comprarerro1');
    }
} else {
    header('Location: ../loja.php?comprarerro0');
}
?>