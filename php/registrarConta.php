<?php
require('conectarBanco.php');

if(isset($_POST['usuario']) && isset($_POST['senha'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $dinheiroInicial = 0;

    $consulta = mysqli_query($mysqli, "SELECT * FROM userinfos WHERE Usuario='$usuario'");
    $linhas = mysqli_num_rows($consulta);

    if($linhas == 0) {
        mysqli_query($mysqli, "INSERT INTO userinfos (Usuario, Senha, Dinheiro) VALUES ('$usuario','$senha','$dinheiroInicial')");
        header('Location: ../registro.php?registrosucess');
    } else {
        header('Location: ../registro.php?erroregistro1');
    }
} else {
    header('Location: ../registro.php?erroregistro0');
}
?>