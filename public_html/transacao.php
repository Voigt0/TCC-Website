<?php
    include_once (__DIR__."/php/utils/autoload.php");
    include_once (__DIR__."/php/utils/fuso-horario.php");
    
    if(isset($_GET['dispChave'])) {
        $consulta = Dispositivo::consultarChave($_GET['dispChave'])[0];
        date_default_timezone_set(fuso_horario(floatval($consulta['dispLatitude']), floatval($consulta['dispLongitude'])));
        if($consulta['dispEstado'] == 1) {
            $info_calculo = json_encode(array("estado" => $consulta['dispEstado'],
                                              "latitude" => $consulta['dispLatitude'],
                                              "longitude" => $consulta['dispLongitude'],
                                              "ano" => date("Y"),
                                              "mes" => date("m"),
                                              "dia" => date("d"),
                                              "hora" => date("H"),
                                              "minuto" => date("i"),
                                              "segundo" => date("s")
                                             ));
            echo $info_calculo;
        } else if($consulta['dispEstado'] == 0) {
            $info_comando = json_encode(array("estado" => $consulta['dispEstado'],
                                              "posicaoXY" => $consulta['motoPosicaoXY'],
                                              "posicaoZ" => $consulta['motoPosicaoZ'],
                                             ));
            echo $info_comando;
        }
    }
?>