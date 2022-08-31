<?php
    include_once (__DIR__."/../utils/autoload.php");
    session_start();
    // if(isset($_POST['dispLatitude']) && $_POST['dispLongitude']) {
    //     date_default_timezone_set(fuso_horario(floatval($_POST['dispLatitude']), floatval($_POST['dispLongitude'])));
    //     $dataAtual = date("Y-m-d H:i:s");
    // }
    
    try {
        //Editar motor
        $moto = new Motor($_POST['motoId'], $_POST['motoPosicaoXY'], $_POST['motoPosicaoZ'], $_SESSION['dispId']);
        $moto->update();
        header("Location: ../../view/dispositivo/motor.php?msg=Motor alterado com sucesso!");
       
           
            
        
    } catch(Exception $e) {
        echo "<h1>Erro ao cadastrar as informações do dispositivo.</h1><br> Erro:".$e->getMessage();
    }
?>