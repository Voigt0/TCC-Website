<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(isset($_SESSION['usuaId']) && $_SESSION['usuaId'] != '') {
            header("Location: ../../index.php");
        } 
    }
    $_SESSION['dispId'] = '';
    
    $msg = isset($_GET['msg']) ? $_GET['msg'] : '';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solar Giro</title>
    <link rel="icon" type="image/x-icon" href="../../img/favicon/favicon.ico">
    <link rel="stylesheet" href="../../css/login.css"> 
    <link rel="stylesheet" href="../../css/css-geral.css"> 
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script>
        // Drop da Navbar
		$(document).ready(function( ){
			$(".profile .icon_wrap").click(function(){
			  $(this).parent().toggleClass("active");
			});
		});
		
        // Funções da modal de mensagem
        function showModal() {
            var element = document.getElementById("modal");
            element.classList.add("show-modal");
        }

        function closeModal() {
            var element = document.getElementById("modal");
            element.classList.remove("show-modal");
        }
	</script>
</head>

<body>
    <header>
        <div class="navbar">
            <div class="navbar_left">
                <span class="icon"><a href="#"><a href="../index.php"></a></span>
            </div>
            <div class="navbar_center">
                <span class="icon"><a href="../../index.php"><img src="../../img/icons/solargirologoIconW.svg"></a></span>
            </div> 
            <div class="navbar_right">
                <div class="profile">
                    <div class="icon_wrap">
                        <span class="icon"></span>
                        <i class="fas fa-chevron-down" style="color: #000000";></i>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="box">
            <form action="../../php/controle/controle-login.php" method="post" id="login">
                <div class="form-header">
                    <h2>Login</h2>
                </div>
                <div class="form-body">
                    <div class="input-box">
                        <div class="elemento"><label for="usuaEmail"><img src="../../img/icons/emailIcon.svg" width="40rem" height="40rem"></label></div>
                        <div class="elemento"><input class="" type="email" id="usuaEmail" name="usuaEmail" placeholder="e-mail" value="" required></div>
                    </div>
                        
                    <div class="input-box">
                        <div class="elemento"><label for="usuaSenha"><img src="../../img/icons/passwordIcon.svg" width="40rem" height="40rem"></label></div>
                        <div class="elemento"><input class="" type="password" id="usuaSenha" name="usuaSenha" placeholder="senha" value="" minlength="8" required></div>
                    </div>        
                </div>
                        
                <div class="form-footer">
                    <a href="esqueci-minha-senha.php">Esqueci minha senha</a>
                    <button class="" type="submit" id="" name="" value="">entrar</button>
                    <a href="cadastro.php">Ainda não tenho cadastro</a>
                </div>
            </form>
        </div>
            
        <!-- Conferencia da mensagem da modal-->
        <?php
            if ($msg == "invalido"){
                echo "<script>
                        $( document ).ready(function() {
                            showModal();
                        });
                    </script>";
            }
        ?>
                
        <!-- Div de exibição da modal-->
        <div class="modal" id="modal">
            <div class="modal-content">
                <a href="login.php">
                    <span class="close-button">
                        &times;
                    </span>
                </a>
                <h1>Não foi possível realizar o login</h1>
                <h2>Confira os dados inseridos e tente novamente</h2>
            </div>
        </div>

    </main>
</body>
</html>