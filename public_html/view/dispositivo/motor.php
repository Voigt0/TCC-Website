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
        

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solar Giro</title>
    <link rel="icon" type="image/x-icon" href="../../img/favicon/favicon.ico">
    <!--<link rel="stylesheet" href="../../bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="../../css/motor.css">
    <!--<link rel="stylesheet" href="../../css/css-geral.css">-->
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
value.textContent = this.value;}
	</script>

</head>

</head>
<body>
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


<section>
        <!--<div class="back"><a href="menu-dispositivo.php"><img src="../../img/icons/backIconW.svg" width="60rem"></a></div>-->
</section>
<section>
    <main class="body">
        <?php
                    $data = Motor::consultarData($_SESSION['dispId'])[0];
                ?>
            <form action="../../php/controle/controle-motor.php" method="post" id="motor">
                <div class="form-header">
                    <h3>Gerenciamento do Motor <?php echo $data['motoId']?><br> 
                    Dispositivo Nº<?php echo $data['motor_dispId']?></h3>
                    <div class="back"><a href="menu-dispositivo.php"><img src="../../img/icons/backIconW.svg" width="60rem"></a></div>
                    
                      <?php 
                    $value = Motor::consultarDispositivo($_SESSION['dispId'])[0];
            ?>
            
                    
                    <input type="radio" id="dispEstado" name="dispEstado" value="0" <?php if(isset($data) && $value['dispEstado'] == '0') echo 'checked';?>>
                    <label id="radio">Modo 0</label>
                    <input type="radio" id="dispEstado" name="dispEstado" value="1" <?php if(isset($data) && $value['dispEstado'] == '1') echo 'checked';?>>
                    <label id="radio">Modo 1</label>
                   
                    
                </div>
            
            <div class="form-body">
                <label for="motoPosicaoXY">Posição X/Y</label>
                <input class="" type="range" id="motoPosicaoXY" name="motoPosicaoXY" value="<?php echo $data['motoPosicaoXY']; ?>" min="-360" max="360" oninput="this.nextElementSibling.value = this.value" required>
                <output><?php echo $data['motoPosicaoXY']."°";?></output>
<br>
                
                <label for="motoPosicaoZ">Posição Z</label>
                <input class="" type="range" id="motoPosicaoZ" name="motoPosicaoZ" value="<?php echo $data['motoPosicaoZ']; ?>" min="-360" max="360" oninput="this.nextElementSibling.value = this.value" required>
                <output><?php echo $data['motoPosicaoZ']."°";?></output>
                
                <input type="hidden" name="motoId" id="" value="<?php echo $data['motoId']?>">
<br>
            <button class="" type="submit" id="" name="" value="">Salvar</button>
            </form>
            </div>
            
          
            

            
            </main>
</section>

</body>
</html>