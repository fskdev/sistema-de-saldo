<?php
session_start();

require('php/conectarBanco.php');

if(!isset($_SESSION['userLogado'])) {
    header('Location: login.php');
}

$usuario = $_SESSION['userLogado'];

$queryStr = "SELECT * FROM produtoscomprados WHERE Responsavel='$usuario'";
$con = $mysqli->query($queryStr);
?>
<html>
    <head>
        <title>Sistema Carteira - Meus produtos</title>
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
                    <h2>Bem-vindo a sua biblioteca de produtos</h2>
                    <a class='a-basico' href="painelUsuario.php">Clique aqui para voltar ao menu.</a>
                    <br><br><br>
                    <?php if(isset($_GET['vendaerro0'])):?>
                    <p style='color: red'>Não foi possível vender este produto. Tente novamente mais tarde.</p>
                    <?php elseif(isset($_GET['vendaerro1'])):?>
                    <p style='color: red'>Você não possui este produto, portanto, não foi possível vende-lo.</p>
                    <?php elseif(isset($_GET['vendasucess'])):?>
                    <p style='color: green'>Venda realizada com sucesso!</p>
                    <?php endif;?>
                    <?php while($dado = $con->fetch_array()):?>
                    <form method='POST' action='php/venderProduto.php'>
                        <h4><?php echo $dado['Produto'];?> | R$<?php echo $dado['Valor'];?> | <input type='submit' value='Vender'></h4>
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