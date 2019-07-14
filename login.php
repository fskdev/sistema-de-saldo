<?php
session_start();
?>
<html>
    <head>
        <title>Sistema Carteira - Login</title>
        <meta charset='utf-8'>
        <script type='text/javascript' src='https://code.jquery.com/jquery-2.2.3.js'></script>
        <script type='text/javasscript' src='js/bootstrap.js'></script>
        <link rel='stylesheet' type='text/css' href='css/bootstrap.css'>
    </head>
    <body style="background-color: #34495e">
        <div class="container">
            <div class="row">
                <div class='col-md-6' style='margin: 20% 25%'>
                    <h1 align='center'>Acesse sua conta</h1>
                    <?php if(isset($_GET['errologin1'])):?>
                    <center><p style='color: red'>Credenciais incorretas!</p></center>
                    <br>
                    <?php elseif(isset($_GET['errologin0'])):?>
                    <center><p style='color: red'>Não foi possível realizar o login nesse momento, volte mais tarde!</p></center>
                    <br>
                    <?php endif;?>
                    <form method='POST' action='php/entrarConta.php'>
                        <input class='form-control' required='required' type='text' placeholder='Nome de usuário' name='usuario'>
                        <br>
                        <input class='form-control' required='required' type='password' placeholder='Senha' name='senha'>
                        <br>
                        <input class='btn btn-info form-control' type='submit' value='Entrar'>
                    </form>
                    <br>
                    <center><a href="registro.php">Não possui uma conta? Clique aqui e cria agora mesmo!</a></center>
                </div>
            </div>
        </div>
    </body>
</html>