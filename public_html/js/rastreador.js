function rastreador (dispChave, latitude, longitude, dataMes, dataDia, dataAno, tempoHora, tempoMinutos, fusoHorario) {
        var informacoes = [];

        // Constantes
        var grausParaRadianos = 3.1415927 / 180;
        var radianosParaGraus = 180 / 3.1415927;



        // Cálculos
        
        // Meridiano de tempo (obtido pelo GMT) padrão do local
        //+12*15=180°
        //-12*15=-180°
        //180°+180°=360°
        var meridianoPeloGmt = fusoHorario * 15;
        
        //Cálculo para minutos após a meia noite
        var minutosAposAMeiaNoite = 60 * tempoHora + tempoMinutos;

        //Cálculo para minutos solares após a meia noite
        var minutosSolaresAposAMeiaNoite = minutosAposAMeiaNoite + (4 * (longitude - meridianoPeloGmt));

        //Valores de data corrigidos
        if (dataMes > 2) {
                anoCorrigido = dataAno;
                mesCorrigido = dataMes - 3;
        }
        else {
                anoCorrigido = dataAno - 1;
                mesCorrigido = dataMes  + 9;
        }
        
        //t = {(UT/24.0) + D + [30.6m + 0.5] +[365.25(ano-1976)] - 8707.5}/36525
        t = ((minutosSolaresAposAMeiaNoite / 60.0 / 24.0) + dataDia + Math.floor (30.6 * mesCorrigido + 0.5) + Math.floor (365.25 * (anoCorrigido - 1976)) - 8707.5) / 36525.0;

        G = 357.528 + 35999.05 * t;
        G = NormalizaPara360 (G);

        C = (1.915 * Math.sin (G * grausParaRadianos)) + (0.020 * Math.sin (2.0 * G * grausParaRadianos));
        
        L = 280.460 + (36000.770 * t) + C;
        L = NormalizaPara360 (L);
        
        alpha = L - 2.466 * Math.sin (2.0 * L * grausParaRadianos) + 0.053 *  Math.sin (4.0 * L * grausParaRadianos);
        
        obliquidade = 23.4393 - 0.013 * t;
        
        declinacao = Math.atan (Math.tan (obliquidade * grausParaRadianos) * Math.sin (alpha * grausParaRadianos)) * radianosParaGraus;
        // f.outputDeclination.value = FormatFloatString (declinacao);
        console.log(FormatFloatString(declinacao));
        informacoes["declinacao"] = FormatFloatString(declinacao);

        ajusteEoT = (L - C - alpha) / 15.0 * 60.0;
        // f.outputEOT.value = FormatFloatString (ajusteEoT);
        console.log(FormatFloatString(ajusteEoT));
        informacoes["eot"] = FormatFloatString(ajusteEoT);
        
        //Calcula a diferença entre a hora solar e a hora relógio, dado a Equação do Tempo que acabamos de calcular
        var ajusteTempoRelogioParaTempoSolar = (4 * (longitude - meridianoPeloGmt)) + ajusteEoT;

        //Calcula a hora solar local com mais precisão com o novo valor de ajuste obtido
        minutosSolaresAposAMeiaNoite = minutosAposAMeiaNoite + ajusteTempoRelogioParaTempoSolar;
        
        //Calcular se o dia solar é diferente do dia do relógio
        var qualDia = 0;
                
        if (minutosSolaresAposAMeiaNoite < 0) {
                //É um dia antes
                minutosSolaresAposAMeiaNoite += 24 * 60;
                qualDia = -1;
        }
                
        if (minutosSolaresAposAMeiaNoite >= 24 * 60) {
                //É um dia depois
                minutosSolaresAposAMeiaNoite -= 24 * 60;
                qualDia = 1;
        }
                
        tempoSolar = MinutosParaTempoRelogio (minutosSolaresAposAMeiaNoite);
        
        if (qualDia == "-1") {
                // f.outputLSOT.value = tempoSolar + "-";
                console.log(tempoSolar + "-");
                informacoes["tempoSolar"] = tempoSolar + "-";
        }else if (qualDia ==  "0") {
                // f.outputLSOT.value = tempoSolar;
                console.log(tempoSolar);
                informacoes["tempoSolar"] = tempoSolar;
        }else if (qualDia ==  "1") {
                // f.outputLSOT.value = tempoSolar + "+";
                console.log(tempoSolar + "+");
                informacoes["tempoSolar"] = tempoSolar + "+";
        }

        //Calcular se o dia relógio é diferente do dia solar
        var qualDia = 0;
        
        if (minutosAposAMeiaNoite < 0) {
                //É um dia antes
                minutosAposAMeiaNoite += 24 * 60;
                qualDia = -1;
        }
        
        if (minutosAposAMeiaNoite >= 24 * 60) {
                //É um dia depois
                minutosAposAMeiaNoite -= 24 * 60;
                qualDia = 1;
        }
        
        tempoRelogio = MinutosParaTempoRelogio (minutosAposAMeiaNoite);
        
        if (qualDia == "-1") {
                // f.outputClockTime.value = tempoRelogio + "-";
                console.log(tempoRelogio + "-");
                informacoes["tempoRelogio"] = tempoRelogio + "-";
        }else if (qualDia ==  "0") {
                // f.outputClockTime.value = tempoRelogio;
                console.log(tempoRelogio);
                informacoes["tempoRelogio"] = tempoRelogio;
        }else if (qualDia ==  "1") {
                // f.outputClockTime.value = tempoRelogio + "+";
                console.log(tempoRelogio + "+");
                informacoes["tempoRelogio"] = tempoRelogio + "+";
        }

        //Ângulo Horario
        var anguloHorario = (minutosSolaresAposAMeiaNoite - 12 * 60) / 4 * -1;
        // f.outputHourAngle.value = FormatFloatString (anguloHorario);
        console.log(FormatFloatString(anguloHorario));
        informacoes["anguloHorario"] = FormatFloatString(anguloHorario);

        //Ângulo de Altitude
        var anguloDeAltitude = radianosParaGraus * ArcSin (
                (Math.cos (latitude  * grausParaRadianos)  *
                        Math.cos (declinacao     * grausParaRadianos)  *
                        Math.cos (anguloHorario       * grausParaRadianos)) +
                (Math.sin (latitude  * grausParaRadianos)  *
                        Math.sin (declinacao     * grausParaRadianos)));
        // f.outputAltitude.value = FormatFloatString (anguloDeAltitude);
        console.log(FormatFloatString(anguloDeAltitude));
        informacoes["anguloDeAltitude"] = FormatFloatString(anguloDeAltitude);

        //Ângulo Azimutal
        var anguloAzimutal = radianosParaGraus * ArcCos ((
                (Math.sin (anguloDeAltitude  * grausParaRadianos)  *
                        Math.sin (latitude * grausParaRadianos)) -
                        Math.sin (declinacao    * grausParaRadianos)) /
                (Math.cos (anguloDeAltitude  * grausParaRadianos)  *
                        Math.cos (latitude * grausParaRadianos)));
                
        if (anguloAzimutal * anguloHorario < 0) { anguloAzimutal *= -1 }
        // f.outputAzimuth.value = FormatFloatString (anguloAzimutal);
        console.log(FormatFloatString(anguloAzimutal));
        informacoes["anguloAzimutal"] = FormatFloatString(anguloAzimutal);

        //Hora relógio do nascer e por do sol
        var nascerEPorDoSol = radianosParaGraus * ArcCos ( -1.0 *
                Math.sin (latitude * grausParaRadianos) *
                Math.sin (declinacao    * grausParaRadianos) /
                Math.cos (latitude * grausParaRadianos) /
                Math.cos (declinacao    * grausParaRadianos)) * 4;

        // f.outputSunrise.value = MinutosParaTempoRelogio ((12 * 60 - nascerEPorDoSol - (4 * (longitude -  meridianoPeloGmt)) - ajusteEoT));
        console.log(MinutosParaTempoRelogio ((12 * 60 - nascerEPorDoSol - (4 * (longitude -  meridianoPeloGmt)) - ajusteEoT)));
        informacoes["nascerDoSol"] = MinutosParaTempoRelogio ((12 * 60 - nascerEPorDoSol - (4 * (longitude -  meridianoPeloGmt)) - ajusteEoT));

        // f.outputSunset.value  = MinutosParaTempoRelogio ((12 * 60 + nascerEPorDoSol - (4 * (longitude -  meridianoPeloGmt)) - ajusteEoT));
        console.log(MinutosParaTempoRelogio ((12 * 60 + nascerEPorDoSol - (4 * (longitude -  meridianoPeloGmt)) - ajusteEoT)));
        informacoes["porDoSol"] = MinutosParaTempoRelogio ((12 * 60 + nascerEPorDoSol - (4 * (longitude -  meridianoPeloGmt)) - ajusteEoT));
        
        if (Math.abs (longitude - meridianoPeloGmt) > 30) alert ("AVISO: A longitude difere do fuso horário meridianoPeloGmt em > 30 graus... verifique a designação leste-oeste da longitude e/ou fuso horário e recalcule se necessário");
        
        //Mostra todas as informações
        jsonString = JSON.stringify(Object.assign({}, informacoes));
        
        $.ajax({
            method: "GET",
            url: "../transacao.php",
            dataType: 'json',
            data: {
               'dispChave': dispChave,
                'anguloDeAltitude': informacoes['anguloDeAltitude'],
                'anguloAzimutal': informacoes['anguloAzimutal']
            }
        });
        
        // document.write(jsonString);
        // document.close();

        // console.log(informacoes);  
        // console.log(jsonString);       
}


//OUTRAS FUNÇÕES

function ArcSin (algo) {
        return (Math.asin (algo));
        // return (Math.atan2 (algo, Math.sqrt (1 - algo * algo)));
}
        


function ArcCos (algo) {
        return (Math.acos (algo));
        // return (Math.atan2 (Math.sqrt (1 - algo * algo), algo));
}



function MinutosParaTempoRelogio (minutos) {
        var asHoras = Math.floor (minutos / 60);
        var osMinutos = Math.floor (minutos % 60);
        if (osMinutos < 10) osMinutos = "0" + osMinutos;//Adiciona um 0 (exemplo 09 ao invés de 9)
        if (asHoras < 10) asHoras = "0" + asHoras;//Adiciona um 0 (exemplo 09 ao invés de 9)
        returnString = asHoras + ":" + osMinutos;

        return (returnString);
}


function NormalizaPara360 (algo) {
        return (algo - Math.floor (algo / 360.0) * 360);
}



function FormatFloatString (theInput) {

// This does two things...it forces two digits of precision after the decimal point, and it
// aligns the numbers to two integer digits and two decimal digits in the form:
//
//                  XX.XX
//                 - X.XX
//                   X.XX
//
        
        var negativeNumber = false;
        if (theInput < 0) {
                negativeNumber = true;
                theInput *= -1;
        }

        integerPortion = Math.floor (theInput); 
        decimalPortion = Math.round (theInput * 100) % 100;

        if (integerPortion < 10) integerPortionString = " " + integerPortion;   // add a space at beginning if necessary
        else integerPortionString = "" + integerPortion;
        
        if (decimalPortion < 10) decimalPortionString = "0" + decimalPortion;   // add a leading zero if necessary
        else decimalPortionString = "" + decimalPortion;
        
        if (negativeNumber == true) return ("-" + integerPortionString + "." + decimalPortionString);
        else return (" " + integerPortionString + "." + decimalPortionString);
}