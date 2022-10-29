<?php
    include_once (__DIR__."/php/utils/autoload.php");
    include_once (__DIR__."/php/utils/fuso-horario.php");
    $dispChave = isset($_GET['dispChave']) ? $_GET['dispChave'] : '';
    $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
    
    if($dispChave) {
        $consulta = Dispositivo::consultarChave($dispChave)[0];
        if($acao == 'verificar') {
            $informacao = json_encode(array("estado" => $consulta['dispEstado']));
            echo $informacao; 
        } else if($acao == 'rastrear') {
            date_default_timezone_set(fuso_horario(floatval($consulta['dispLatitude']), floatval($consulta['dispLongitude'])));
            $timezoneId = fuso_horario(floatval($consulta['dispLatitude']), floatval($consulta['dispLongitude']));
            $timezone = new DateTimeZone($timezoneId);
            $gmtTimezone = new DateTimeZone('GMT');
            $dataAtual = new DateTime(date("Y-m-d H:i:s"), $gmtTimezone);
            $timezoneNum = $timezone->getOffset($dataAtual)/3600;
            echo "<script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>";
            echo "<script src='js/rastreador.js'></script>";
            echo "<script>
                    window.onbeforeunload = function() {
        return 'Your text here';
      };
              
                    // $( document ).ready(function() {
                        // rastreador('". $dispChave ."', ". $consulta['dispLatitude'] .", ". $consulta['dispLongitude'] .", ". date("m") .", ". date("d") .", ". date("Y") .", ". date("H") .", ". date("i") .", ". $timezoneNum .");
                    // });
                    
                  </script>";
        } else if($acao == 'movimentar') {
            $informacao = json_encode(array(
                                            "posicaoXY" => $consulta['motoPosicaoXY'],
                                            "posicaoZ" => $consulta['motoPosicaoZ']
                                           ));
            echo $informacao; 
        }
    }
?>