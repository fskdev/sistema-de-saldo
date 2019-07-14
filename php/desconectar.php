<?php
session_start();
unset($_SESSION['userLogado']);
header('Location: ../painelUsuario.php');