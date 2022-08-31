<?php
    include_once (__DIR__."/../utils/autoload.php");
    session_start();
    try {
        if($_GET['acao'] == 'delete') {
            //Excluir usuario
            $usua = new Usuario($_SESSION['usuaId'], '', '', '', '');
            $usua->delete();
            $_SESSION['dispId'] = '';
            header("Location: ../../php/controle/controle-login.php");
        } else{
        if(strlen($_POST['novaUsuaSenha']) >= 8) {
            //Atualizar as informações do usuário e SENHA
            $usua = new Usuario($_SESSION['usuaId'], $_POST['usuaNome'], $_POST['usuaEmail'], $_POST['usuaTelefone'], $_POST['novaUsuaSenha']);
        } else {
            //Atualizar as informações do usuário sem SENHA
            $usua = new Usuario($_SESSION['usuaId'], $_POST['usuaNome'], $_POST['usuaEmail'], $_POST['usuaTelefone'], $_POST['usuaSenha']);
        }
        $usua->update();

        header("Location: ../../view/usuario/perfil.php?msg=Usuário alterado com sucesso!");
        }
    } catch(Exception $e) {
        echo "<h1>Erro ao cadastrar as informações.</h1><br> Erro:".$e->getMessage();
    }
?>