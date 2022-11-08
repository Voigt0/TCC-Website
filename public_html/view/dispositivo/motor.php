<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(!isset($_SESSION['usuaId']) || $_SESSION['usuaId'] == ''){
            header("Location: ../usuario/login.php");
        } 
        else if(!isset($_SESSION['dispId']) || $_SESSION['dispId'] == ''){
            header("Location: controle-de-dispositivos.php");
        }
        // echo $_SESSION['dispId'];
    }
    
    include_once (__DIR__ ."/../../php/utils/autoload.php");
    include_once (__DIR__."/../../php/utils/fuso-horario.php");
    include_once (__DIR__ ."/../../php/utils/rastreador.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solar Giro</title>
    <link rel="icon" type="image/x-icon" href="../../img/favicon/favicon.ico">
    <link rel="stylesheet" href="../../css/motor.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="/path/to/jquery.min.js"></script>
    <script src="/path/to/d3.min.js"></script>
	<script>
		$(document).ready(function( ){
			$(".profile .icon_wrap").click(function(){
			  $(this).parent().toggleClass("active");
			});
		}); 
	
        const slider = document.querySelector("input");
        const value = document.querySelector(".value");
        value.textContent = slider.value;
        
        slider.oninput = function(){
            value.textContent = this.value;
        }
	</script>
</head>
<body>
    <!-- Navbar -->
    <header>
        <div class="navbar">
            <div class="navbar_left">
                <a href="../../index.php"><img src="../../img/icons/homeIconB.svg"></a>
            </div>
            <div class="navbar_center">
                <a href="../../index.php"><img src="../../img/icons/solargirologoIconB.svg"></a>
            </div> 
            <div class="navbar_right">
                <div class="profile">
                    <div class="icon_wrap">
                        <span class="icon"><a><img src="../../img/icons/userIconB.svg"></a></span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="profile_dd">
                        <ul class="profile_ul">
                            <li><a class="perfil" href="../usuario/perfil.php">Visualizar Perfil</a></li>
                            <li><a class="logout" href="../../php/controle/controle-login.php">Encerrar sessão</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

        <main>
            <?php
                $data = Motor::consultarData($_SESSION['dispId'])[0];
                $infoRastreador = Dispositivo::consultarData($_SESSION['dispId'])[0];
                date_default_timezone_set(fuso_horario(floatval($infoRastreador['dispLatitude']), floatval($infoRastreador['dispLongitude'])));
                $timezoneId = fuso_horario(floatval($infoRastreador['dispLatitude']), floatval($infoRastreador['dispLongitude']));
                $timezone = new DateTimeZone($timezoneId);
                $gmtTimezone = new DateTimeZone('GMT');
                $dataAtual = new DateTime(date("Y-m-d H:i:s"), $gmtTimezone);
                $timezoneNum = $timezone->getOffset($dataAtual)/3600;
                $resultado = rastreador('', $infoRastreador['dispLatitude'], $infoRastreador['dispLongitude'], date("m"), date("d"), date("Y"), date("H"), date("i"), $timezoneNum);
            ?>
                
            <!-- Início do Formulário -->
            <form action="../../php/controle/controle-motor.php" method="post" id="motor">
                <div class="form-header">
                    <h3>Gerenciamento do motor  Nº<?php echo $data['motoId']?></h3>
                    <div class="back"><a href="menu-dispositivo.php"><img src="../../img/icons/backIconW.svg" width="60rem"></a></div>
                    
                    <?php 
                        // Consultar valores do Dispositivo
                        $value = Motor::consultarDispositivo($_SESSION['dispId'])[0];
                    ?>  
                </div>

                <!-- Escopo da página -->
                <div class="form-body">
                    <!-- Coluna Nº1 -->
                    <div class="col">
                        <!-- Informações do Motor -->
                        <div class="infos-motor"> 
                            <h2>Informações sobre o motor Nº<?php echo $data['motoId']?>, referente ao Dispositivo Nº<?php echo $data['motor_dispId']?></h2> 
                            <p>Atualmente o dispositivo se encontra no modo:
                                <?php 
                                    if($value['dispEstado'] == "0"){
                                        echo "manual";
                                        // $manual = "style='visibility: visible'";
                                        // $calculo = "style='visibility: hidden'";
                                    } else {
                                        echo "automático";
                                        // $calculo = "style='visibility: visible'";
                                        // $manual = "style='visibility: hidden'";
                                    }
                                ?>
                            </p>
                            <p>Alterar o estado:</p>
                            <div class="botoes">
                                <label class="switch">
                                    <input type="checkbox" id="dispEstado" name="dispEstado" value="1" <?php if(isset($data) && $value['dispEstado'] == '1')echo 'checked';?>>
                                    <span class="slider round"></span>
                                </label> 
                            
                                <button class="" type="submit" id="" name="" value="">Salvar</button>
    
                            </div>
                            
                        </div>
                    
                        <!-- Informações do Calculo -->
                        <!--<div class="infos-auto" <?php echo $calculo?>>-->
                        <!--    <h2>Informações sobre o modo automático:</h2>-->
                        <!--    <p>Declinação <?php echo round($resultado['declinacao'], 2);?></p>-->
                        <!--    <p>Equação do Tempo: <?php echo round($resultado['eot'], 2);?></p>-->
                        <!--    <p>Tempo Solar: <?php echo $resultado['tempoSolar'];?></p>-->
                        <!--    <p>Tempo Relógio: <?php echo $resultado['tempoRelogio'];?></p>-->
                        <!--    <p>Ângulo do Horário: <?php echo round($resultado['anguloHorario'], 2);?></p>-->
                        <!--    <p>Ângulo de Altitude: <?php echo round($resultado['anguloDeAltitude'], 2);?></p>-->
                        <!--    <p>Ângulo Azimutal: <?php echo round($resultado['anguloAzimutal'], 2);?></p>-->
                        <!--    <p>Horário do nascer do Sol: <?php echo $resultado['nascerDoSol'];?></p>-->
                        <!--    <p>Horário do por do Sol: <?php echo $resultado['porDoSol'];?></p>-->
                        <!--</div>-->

                    </div>         

                    <!-- Coluna Nº2 -->
                    <div class="col">
                        <!--<div class="infos-auto" <?php echo $calculo?>>-->
                        <div class="infos-auto">
                            <h2>Informações sobre o modo automático:</h2>
                            <p>Declinação <?php echo round($resultado['declinacao'], 2);?></p>
                            <p>Equação do Tempo: <?php echo round($resultado['eot'], 2);?></p>
                            <p>Tempo Solar: <?php echo $resultado['tempoSolar'];?></p>
                            <p>Tempo Relógio: <?php echo $resultado['tempoRelogio'];?></p>
                            <p>Ângulo do Horário: <?php echo round($resultado['anguloHorario'], 2);?></p>
                            <p>Ângulo de Altitude: <?php echo round($resultado['anguloDeAltitude'], 2);?></p>
                            <p>Ângulo Azimutal: <?php echo round($resultado['anguloAzimutal'], 2);?></p>
                            <p>Horário do nascer do Sol: <?php echo $resultado['nascerDoSol'];?></p>
                            <p>Horário do por do Sol: <?php echo $resultado['porDoSol'];?></p>
                        </div>
                        
                        
                        <!--<div class="inputs"  <?php echo $manual?>>-->
                        <div class="inputs">

                            <h2>Alterações no modo manual:</h2>
                            <label for="motoPosicaoXY">Posição X/Y</label>
                            <input class="" type="range" id="motoPosicaoXY" name="motoPosicaoXY" value="<?php echo $data['motoPosicaoXY']; ?>" min="-360" max="360" oninput="this.nextElementSibling.value = this.value" required>
                            <output><?php echo $data['motoPosicaoXY']."°";?></output>
                        
                            <label for="motoPosicaoZ">Posição Z</label>
                            <input class="" type="range" id="motoPosicaoZ" name="motoPosicaoZ" value="<?php echo $data['motoPosicaoZ']; ?>" min="0" max="90" oninput="this.nextElementSibling.value = this.value" required>
                            <output><?php echo $data['motoPosicaoZ']."°";?></output>
                        
                            <input type="hidden" name="motoId" id="" value="<?php echo $data['motoId']?>">
                            <p>Verifique se o dispositivo se encontra no modo manual antes de realizar modificações</p>
                        </div>

                    </div>

                </div>
            </form>
        </main>
</body>
</html>