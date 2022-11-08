<?php
function rastreador ($dispChave, $latitude, $longitude, $dataMes, $dataDia, $dataAno, $tempoHora, $tempoMinutos, $fusoHorario) {
         $informacoes = array();

        // Constantes
         $grausParaRadianos = 3.1415927 / 180;
         $radianosParaGraus = 180 / 3.1415927;



        // Cálculos
        
        // Meridiano de tempo (obtido pelo GMT) padrão do local
        //+12*15=180°
        //-12*15=-180°
        //180°+180°=360°
         $meridianoPeloGmt = $fusoHorario * 15;
        
        //Cálculo para minutos após a meia noite
         $minutosAposAMeiaNoite = 60 * $tempoHora + $tempoMinutos;

        //Cálculo para minutos solares após a meia noite
         $minutosSolaresAposAMeiaNoite = $minutosAposAMeiaNoite + (4 * ($longitude - $meridianoPeloGmt));

        //Valores de data corrigidos
        if ($dataMes > 2) {
                $anoCorrigido = $dataAno;
                $mesCorrigido = $dataMes - 3;
        }
        else {
                $anoCorrigido = $dataAno - 1;
                $mesCorrigido = $dataMes  + 9;
        }
        
        //t = {(UT/24.0) + D + [30.6m + 0.5] +[365.25(ano-1976)] - 8707.5}/36525
        $t = (($minutosSolaresAposAMeiaNoite / 60.0 / 24.0) + $dataDia + floor(30.6 * $mesCorrigido + 0.5) + floor(365.25 * ($anoCorrigido - 1976)) - 8707.5) / 36525.0;

        $G = 357.528 + 35999.05 * $t;
        $G = NormalizaPara360 ($G);

        $C = (1.915 * sin($G * $grausParaRadianos)) + (0.020 * sin(2.0 * $G * $grausParaRadianos));
        
        $L = 280.460 + (36000.770 * $t) + $C;
        $L = NormalizaPara360 ($L);
        
        $alpha = $L - 2.466 * sin(2.0 * $L * $grausParaRadianos) + 0.053 *  sin(4.0 * $L * $grausParaRadianos);
        
        $obliquidade = 23.4393 - 0.013 * $t;
        
        $declinacao = atan(tan($obliquidade * $grausParaRadianos) * sin($alpha * $grausParaRadianos)) * $radianosParaGraus;
        $informacoes["declinacao"] = $declinacao;

        $ajusteEoT = ($L - $C - $alpha) / 15.0 * 60.0;
        $informacoes["eot"] = $ajusteEoT;
        
        //Calcula a diferença entre a hora solar e a hora relógio, dado a Equação do Tempo que acabamos de calcular
         $ajusteTempoRelogioParaTempoSolar = (4 * ($longitude - $meridianoPeloGmt)) + $ajusteEoT;

        //Calcula a hora solar local com mais precisão com o novo valor de ajuste obtido
        $minutosSolaresAposAMeiaNoite = $minutosAposAMeiaNoite + $ajusteTempoRelogioParaTempoSolar;
        
        //Calcular se o dia solar é diferente do dia do relógio
         $qualDia = 0;
                
        if ($minutosSolaresAposAMeiaNoite < 0) {
                //É um dia antes
                $minutosSolaresAposAMeiaNoite += 24 * 60;
                $qualDia = -1;
        }
                
        if ($minutosSolaresAposAMeiaNoite >= 24 * 60) {
                //É um dia depois
                $minutosSolaresAposAMeiaNoite -= 24 * 60;
                $qualDia = 1;
        }
                
        $tempoSolar = MinutosParaTempoRelogio ($minutosSolaresAposAMeiaNoite);
        
        if ($qualDia == "-1") {
                $informacoes["tempoSolar"] = $tempoSolar + "-";
        }else if ($qualDia ==  "0") {
                $informacoes["tempoSolar"] = $tempoSolar;
        }else if ($qualDia ==  "1") {
                $informacoes["tempoSolar"] = $tempoSolar + "+";
        }

        //Calcular se o dia relógio é diferente do dia solar
         $qualDia = 0;
        
        if ($minutosAposAMeiaNoite < 0) {
                //É um dia antes
                $minutosAposAMeiaNoite += 24 * 60;
                $qualDia = -1;
        }
        
        if ($minutosAposAMeiaNoite >= 24 * 60) {
                //É um dia depois
                $minutosAposAMeiaNoite -= 24 * 60;
                $qualDia = 1;
        }
        
        $tempoRelogio = MinutosParaTempoRelogio ($minutosAposAMeiaNoite);
        
        if ($qualDia == "-1") {
                $informacoes["tempoRelogio"] = $tempoRelogio + "-";
        }else if ($qualDia ==  "0") {
                $informacoes["tempoRelogio"] = $tempoRelogio;
        }else if ($qualDia ==  "1") {
                $informacoes["tempoRelogio"] = $tempoRelogio + "+";
        }

        //Ângulo Horario
         $anguloHorario = ($minutosSolaresAposAMeiaNoite - 12 * 60) / 4 * -1;
        $informacoes["anguloHorario"] = $anguloHorario;

        //Ângulo de Altitude
         $anguloDeAltitude = $radianosParaGraus * ArcSin (
                (cos($latitude  * $grausParaRadianos)  *
                        cos($declinacao     * $grausParaRadianos)  *
                        cos($anguloHorario       * $grausParaRadianos)) +
                (sin($latitude  * $grausParaRadianos)  *
                        sin($declinacao     * $grausParaRadianos)));
        $informacoes["anguloDeAltitude"] = $anguloDeAltitude;

        //Ângulo Azimutal
         $anguloAzimutal = $radianosParaGraus * ArcCos ((
                (sin($anguloDeAltitude  * $grausParaRadianos)  *
                        sin($latitude * $grausParaRadianos)) -
                        sin($declinacao    * $grausParaRadianos)) /
                (cos($anguloDeAltitude  * $grausParaRadianos)  *
                        cos($latitude * $grausParaRadianos)));
                
        if ($anguloAzimutal * $anguloHorario < 0) { $anguloAzimutal *= -1; }
        $informacoes["anguloAzimutal"] = $anguloAzimutal;

        //Hora relógio do nascer e por do sol
         $nascerEPorDoSol = $radianosParaGraus * ArcCos ( -1.0 *
                sin($latitude * $grausParaRadianos) *
                sin($declinacao    * $grausParaRadianos) /
                cos($latitude * $grausParaRadianos) /
                cos($declinacao    * $grausParaRadianos)) * 4;

        $informacoes["nascerDoSol"] = MinutosParaTempoRelogio ((12 * 60 - $nascerEPorDoSol - (4 * ($longitude -  $meridianoPeloGmt)) - $ajusteEoT));

        $informacoes["porDoSol"] = MinutosParaTempoRelogio ((12 * 60 + $nascerEPorDoSol - (4 * ($longitude -  $meridianoPeloGmt)) - $ajusteEoT));
        
        if (abs($longitude - $meridianoPeloGmt) > 30) echo ("AVISO: A longitude difere do fuso horário meridianoPeloGmt em > 30 graus... verifique a designação leste-oeste da longitude e/ou fuso horário e recalcule se necessário");

        // $JQUERY['ajax'](array(
        //     'method'=> "GET",
        //     'url'=> "../php/controle/controle-motor.php",
        //     'dataType'=> 'json',
        //     'data'=> array(
        //        'dispChave'=> $dispChave,
        //         'anguloDeAltitude'=> $informacoes['anguloDeAltitude'],
        //         'anguloAzimutal'=> $informacoes['anguloAzimutal']
        //     )
        // ));
        
        return $informacoes;
    }


    //OUTRAS FUNÇÕES

    function ArcSin ($algo) {
        return (asin($algo));
        // return (Math.atan2 (algo, Math.sqrt (1 - algo * algo)));
    }


    function ArcCos ($algo) {
        return (acos($algo));
        // return (Math.atan2 (Math.sqrt (1 - algo * algo), algo));
    }


    function MinutosParaTempoRelogio ($minutos) {
         $asHoras = floor($minutos / 60);
         $osMinutos = floor($minutos % 60);
        if ($osMinutos < 10) $osMinutos = "0". $osMinutos;//Adiciona um 0 (exemplo 09 ao invés de 9)
        if ($asHoras < 10) $asHoras = "0". $asHoras;//Adiciona um 0 (exemplo 09 ao invés de 9)
        $returnString = $asHoras .":". $osMinutos;

        return ($returnString);
    }


    function NormalizaPara360 ($algo) {
        return ($algo - floor($algo / 360.0) * 360);
    }
?>