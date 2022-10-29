<?php
    include_once (__DIR__."/../utils/autoload.php");
    include_once (__DIR__."/../utils/fuso-horario.php");
    session_start();
    
    
    
    // try {
        if(!isset($_GET['dispChave'])) {
            $consulta = Dispositivo::consultarData($_SESSION['dispId'])[0];
            date_default_timezone_set(fuso_horario(floatval($consulta['dispLatitude']), floatval($consulta['dispLongitude'])));
            $dataAtual = date("Y-m-d H:i:s");
            
            //Editar motor manualmente
            $moto = new Motor($_POST['motoId'], $_POST['motoPosicaoXY'], $_POST['motoPosicaoZ'], $_SESSION['dispId']);
            $moto->updateSemChave($dataAtual);
            header("Location: ../../view/dispositivo/motor.php?msg=Motor alterado com sucesso!");
        } else {
            $consulta = Dispositivo::consultarChave($_GET['dispChave'])[0];
            date_default_timezone_set(fuso_horario(floatval($consulta['dispLatitude']), floatval($consulta['dispLongitude'])));
            $dataAtual = date("Y-m-d H:i:s");
            
            //Editar motor automaticamente
            $moto = new Motor('', intval($_GET['anguloAzimutal']), intval($_GET['anguloDeAltitude']), '');
            $moto->updateComChave($_GET['dispChave'], $dataAtual);
        }
    // } catch(Exception $e) {
        // echo "<h1>Erro ao cadastrar as informações do motor.</h1><br> Erro:".$e->getMessage();
    // }
?>