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
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solar Giro</title>
    <link rel="icon" type="image/x-icon" href="../../img/favicon/favicon.ico">
    <link rel="stylesheet" href="../../css/bateria.css">
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
            <div class="back"><a href="menu-dispositivo.php"><img src="../../img/icons/backIconW.svg" width="60rem"></a></div>
            <h1>Página em desenvolvimento :(</h1>
        </main>

</body>
</html>