<?php
require('conectarBanco.php');

if(isset($_POST['produto']) && isset($_POST['usuario'])) {
    $produto = $_POST['produto'];
    $usuario = $_POST['usuario'];

    $consulta = mysqli_query($mysqli, "SELECT * FROM produtoscomprados WHERE Produto='$produto' AND Responsavel='$usuario'");
    $linhas = mysqli_num_rows($consulta);

    if($linhas == 0) {
        header('Location: ../meusProdutos.php?vendaerro1');
    } else {
        $consulta2 = mysqli_query($mysqli, "SELECT * FROM userinfos WHERE Usuario='$usuario'");
        $queryInfos = mysqli_fetch_assoc($consulta2);
        $dinheiroDisponivel = $queryInfos['Dinheiro'];
        
        $queryInfos2 = mysqli_fetch_assoc($consulta);
        $valor = $queryInfos2['Valor'];

        $dinheiroReembolsado = $dinheiroDisponivel + $valor;

        mysqli_query($mysqli, "UPDATE userinfos SET Dinheiro='$dinheiroReembolsado' WHERE Usuario='$usuario'");
        mysqli_query($mysqli, "DELETE FROM produtoscomprados WHERE Produto='$produto' LIMIT 1");

        header('Location: ../meusProdutos.php?vendasucess');
    }
} else {
    header('Location: ../meusProdutos.php?vendaerro0');
}
?>