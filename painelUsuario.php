<?php
session_start();

require('php/conectarBanco.php');

if(!isset($_SESSION['userLogado'])) {
    header('Location: login.php');
}

$usuario = $_SESSION['userLogado'];
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
                    <h2>Bem-vindo (a) <?php echo $usuario;?></h2>
                    <br><br>
                    <a class="a-basico" href="loja.php">Loja</a>
                    <br>
                    <a class="a-basico" href="meusProdutos.php">Meus produtos</a>
                    <br>
                    <a class="a-basico" href="meuSaldo.php">Meu saldo</a>
                    <br><br>
                    <a class="a-basico" href="php/desconectar.php">Clique aqui para desconectar de sua conta</a>
                    </center>
                </div>
            </div>
        </div>
    </body>
</html>