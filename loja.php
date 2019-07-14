<?php
session_start();

require('php/conectarBanco.php');

if(!isset($_SESSION['userLogado'])) {
    header('Location: login.php');
}

$usuario = $_SESSION['userLogado'];

$queryStr = "SELECT * FROM produtosinfos";
$con = $mysqli->query($queryStr);
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
                    <h2>Bem-vindo a loja</h2>
                    <a class='a-basico' href="painelUsuario.php">Clique aqui para voltar ao menu.</a>
                    <br><br><br>
                    <?php if(isset($_GET['comprarerro2'])):?>
                    <p style='color: red'>Você não possui fundos suficientes para comprar este produto.</p>
                    <?php elseif(isset($_GET['comprarerro1']) || isset($_GET['comprarerro0'])):?>
                    <p style='color: red'>Não foi possível realizar a compra deste produto. Tente novamente mais tarde.
                    <?php elseif(isset($_GET['comprarsucess'])):?>
                    <p style='color: green'>Compra realizada com sucesso!</p>
                    <?php endif;?>
                    <?php while($dado = $con->fetch_array()):?>
                    <form method='POST' action='php/comprarProduto.php'>
                        <h4><?php echo $dado['Produto'];?> | R$<?php echo $dado['Valor'];?> | <input type='submit' value='Comprar'></h4>
                        <input type='hidden' value='<?php echo $dado['Produto'];?>' name='produto'>
                        <input type='hidden' value='<?php echo $usuario;?>' name='usuario'>
                    </form>
                    <br><br>
                    <?php endwhile;?>
                    </center>
                </div>
            </div>
        </div>
    </body>
</html>