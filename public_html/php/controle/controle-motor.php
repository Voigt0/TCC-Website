<?php
    include_once (__DIR__."/../utils/autoload.php");
    include_once (__DIR__."/../utils/fuso-horario.php");
    session_start();
    
    try {
        $estado = isset($_POST['dispEstado']) ? $_POST['dispEstado'] : 0;
        $consulta = Dispositivo::consultarData($_SESSION['dispId'])[0];
        date_default_timezone_set(fuso_horario(floatval($consulta['dispLatitude']), floatval($consulta['dispLongitude'])));
        $dataAtual = date("Y-m-d H:i:s");
        
        //Editar motor manualmente
        $usua = new Usuario('', '', '', '', '', '', '', '', '');
        $disp = new Dispositivo($_SESSION['dispId'], '', '', '', '', '', '', '', $usua);
        $moto = new Motor($_POST['motoId'], $_POST['motoPosicaoXY'], $_POST['motoPosicaoZ'], $disp);
        $moto->updateSemChave($estado, $dataAtual);
        header("Location: ../../view/dispositivo/motor.php?msg=Motor alterado com sucesso!");
    } catch(Exception $e) {
        echo "<h1>Erro ao cadastrar as informações do motor.</h1><br> Erro:".$e->getMessage();
    }
?>