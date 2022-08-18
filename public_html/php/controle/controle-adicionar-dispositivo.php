<?php
    include_once (__DIR__."/../utils/autoload.php");
    session_start();
    try {
        if($_GET['acao'] == 'update') {
            //Editar dispositivo
            $disp = new Dispositivo($_SESSION['dispId'], $_POST['dispNome'], $_POST['dispLatitude'], $_POST['dispLongitude'], $_POST['dispDescricao'], $_SESSION['usuaId']);
            $disp->update();
            header("Location: ../../view/dispositivo/controle-de-dispositivos.php?msg=Dispositivo alterado com sucesso!");
        } else if($_GET['acao'] == 'delete') {
            //Excluir dispositivo
            $disp = new Dispositivo($_SESSION['dispId'], '', '', '', '', '');
            $disp->delete();
            $_SESSION['dispId'] = '';
            header("Location: ../../view/dispositivo/controle-de-dispositivos.php?msg=Dispositivo excluido com sucesso!");
        } else {
            //Cadastrar dispositivo
            $disp = new Dispositivo('', $_POST['dispNome'], $_POST['dispLatitude'], $_POST['dispLongitude'], $_POST['dispDescricao'], $_SESSION['usuaId']);
            $disp->create();
            header("Location: ../../view/dispositivo/controle-de-dispositivos.php?msg=Dispositivo adicionado com sucesso!");
        }
    } catch(Exception $e) {
        echo "<h1>Erro ao cadastrar as informações do dispositivo.</h1><br> Erro:".$e->getMessage();
    }
?>