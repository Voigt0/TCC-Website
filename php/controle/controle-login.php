<?php
    include_once (__DIR__."/../utils/autoload.php");
    try {
        //Login do usuário com sucesso, Login do usuário sem sucesso, Logout do usuário
        if(Usuario::autenticar($_POST['usuaEmail'], $_POST['usuaSenha'])) {
            header("Location: ../../index.php?msg=Usuário logado com sucesso!");
        } else if(isset($_POST['usuaEmail']) && isset($_POST['usuaSenha'])) {
            header("Location: ../../view/usuario/login.php?msg=Usuário ou senha inválidos!");
        } else {
            header("Location: ../../view/usuario/login.php");
        }
    } catch(Exception $e) {
        echo "<h1>Erro ao logar com as informações.</h1><br> Erro:".$e->getMessage();
    }
?>