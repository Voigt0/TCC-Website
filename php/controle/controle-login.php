<?php
    include_once (__DIR__."/../utils/autoload.php");
    $email = isset($_POST['usuaEmail']) ? $_POST['usuaEmail'] : "";
    $senha = isset($_POST["usuaSenha"]) ? $_POST["usuaSenha"] : "";

    try {
        //Login da tabela USUÁRIO
        if(Usuario::autenticar($email, $senha) != null) {
            header("Location: ../../index.php?msg=Usuário criado com sucesso!");
        } else {
            header("Location: ../../view/usuario/login.php?msg=Usuário ou senha inválidos!");
        }
    } catch(Exception $e) {
        echo "<h1>Erro ao logar com as informações.</h1><br> Erro:".$e->getMessage();
    }
?>