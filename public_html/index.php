<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(!isset($_SESSION['usuaId']) || $_SESSION['usuaId'] == ''){
            header("Location: view/usuario/login.php");
        }
    }
    $_SESSION['dispId'] = '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solar Giro</title>
    <link rel="icon" type="image/x-icon" href="img/favicon/favicon.ico">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="../../css/css-geral.css">

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

	<script>
		$(document).ready(function( ){
			$(".profile .icon_wrap").click(function(){
			  $(this).parent().toggleClass("active");
			});
		});
	</script>

</head>
<body>
<header>
    <div class="navbar">
      <div class="navbar_left">
        <a href="#"><a href="../index.php"><img src="../../img/icons/homeIcon.svg"></a>
      </div>
      <div class="navbar_center">
        <a href="../../index.php"><img src="../../img/icons/solargirologoIconW.svg"></a>
      </div> 
      <div class="navbar_right">
        <div class="profile">
        <div class="icon_wrap">
        <span class="icon"><a><img src="../../img/icons/userIcon.svg"></a></span>
        <i class="fas fa-chevron-down"></i>
      </div>
          <div class="profile_dd">
            <ul class="profile_ul">
              <li><a class="perfil" href="view/usuario/perfil.php">Visualizar Perfil</a></li>
              <li><a class="logout" href="../../php/controle/controle-login.php">Encerrar sessão</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header> 
    <main class="body">
        <section>
            <div class="img-button"><a href="view/dispositivo/configurar-dispositivo.php"><button class="botao"><img src="img/icons/addIcon.svg"></button></a></div>
            <div class="button"><a href="view/dispositivo/configurar-dispositivo.php"><button class="" type="submit" id="" name="" value="">Adicionar dispositivo</button></a></div>
        </section>
        <section>
            <div class="img-button"><a href="view/dispositivo/controle-de-dispositivos.php"><button class="botao"><img src="img/icons/confIcon.svg"></button></a></div>
            <div class="button"><a href="view/dispositivo/controle-de-dispositivos.php"><button class="" type="submit" id="" name="" value="">Gerenciar dispositivo</button></a></div>
        </section>
        <section>
            <div class="img-button"><a href="view/usuario/perfil.php"><button class="botao"><img src="img/icons/userIcon.svg"></button></a></div>
            <div class="button"><a href="view/usuario/perfil.php"><button class="" type="submit" id="" name="" value="">Perfil do usuário</button></a></div>
        </section>
    </main>
</div>
</body>
</html>