<?php
    include_once (__DIR__."/../utils/autoload.php");
    try {
        //Cadastrar usuário
        $usua = new Usuario('', $_POST['usuaNome'], $_POST['usuaEmail'], $_POST['usuaTelefone'], $_POST['usuaSenha']);
        $usua->create();
        header("Location: ../../view/usuario/login.php?msg=Usuário cadastrado com sucesso!");
    } catch(Exception $e) {
        echo "<h1>Erro ao cadastrar as informações.</h1><br> Erro:".$e->getMessage();
    }
?>