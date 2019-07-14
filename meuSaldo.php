<?php
session_start();

require('php/conectarBanco.php');

if(!isset($_SESSION['userLogado'])) {
    header('Location: login.php');
}

$usuario = $_SESSION['userLogado'];

$consulta = mysqli_query($mysqli, "SELECT * FROM userinfos WHERE Usuario='$usuario'");
$queryInfos = mysqli_fetch_assoc($consulta);
$saldo = $queryInfos['Dinheiro'];
?>
<html>
    <head>
        <title>Sistema Carteira - Login</title>
        <meta charset='utf-8'>
        <script type='text/javascript' src='https://code.jquery.com/jquery-2.2.3.js'></script>
        <script type='text/javasscript' src='js/bootstrap.js'></script>
        <link rel='stylesheet' type='text/css' href='css/bootstrap.css'>

        <style>
            .a-basico:link {
                text-decoration: none;
            }
        </style>
    </head>
    <body style="background-color: #34495e">
        <div class="container">
            <div class="row">
                <div class='col-md-6' style='margin: 1% 25%'>
                    <center>
                    <h2>Seu saldo</h2>
                    <a class='a-basico' href="painelUsuario.php">Clique aqui para voltar ao menu.</a>
                    <br><br>
                    <h4>Você possui exatamente <span style='color: green'>R$<?php echo $saldo;?></span></h4>
                    </center>
                </div>
            </div>
        </div>
    </body>
</html>