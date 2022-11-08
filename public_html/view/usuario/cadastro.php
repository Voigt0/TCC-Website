<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(isset($_SESSION['usuaId']) && $_SESSION['usuaId'] != ''){
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
    <link rel="stylesheet" href="../../css/cadastro.css">
    <link rel="stylesheet" href="../../css/css-geral.css"> 
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script>
        // Drop da navbar
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
        
        // Erro
        function showError() {
            var element = document.getElementById("error");
            element.classList.add("show-error");
        }

        function closeError() {
            var element = document.getElementById("error");
            element.classList.remove("show-error");
        }
        
        // Termos
        function showTermos() {
            var element = document.getElementById("termos");
            element.classList.add("show-modal");
        }

        function closeTermos() {
            var element = document.getElementById("termos");
            element.classList.remove("show-modal");
        }
	</script>
</head> 

<body>
    <header>
        <div class="navbar">
            <div class="navbar_left">
                <a href="#"><a href="../index.php"></a>
            </div>
            <div class="navbar_center">
                <a href="../../index.php"><img src="../../img/icons/solargirologoIconW.svg"></a>
            </div> 
            <div class="navbar_right">
                <div class="profile">
                    <div class="icon_wrap">
                        <span class="icon"></span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>
  </header>

    <div class="back"><a href="login.php"><img src="../../img/icons/backIconB.svg" width="60rem"></a></div>

    <main>
        <div class="box">
            <form action="../../php/controle/controle-cadastro.php" method="post" id="form">
                <div class="form-header">
                    <h2>Cadastro</h2>
                </div>
                <div class="form-body">
                    <div class="input-box">
                        <div class="elemento"><label for="usuaNome"><img src="../../img/icons/nameIcon.svg" width="40rem" height="40rem"></label></div>
                        <div class="elemento"><input class="" type="" id="usuaNome" name="usuaNome" placeholder="Nome completo" value="" minlength="3" required></div>
                    </div>
                    <div id="div_usuaNome"></div>

                    <div class="input-box">
                        <div class="elemento"><label for="usuaEmail"><img src="../../img/icons/emailIcon.svg" width="40rem" height="40rem"></label></div>
                        <div class="elemento"><input class="" type="email" id="usuaEmail" name="usuaEmail" placeholder="E-mail" value="" required></div>
                    </div>

                    <div class="input-box">
                        <div class="elemento"><label for="usuaTelefone"><img src="../../img/icons/phoneIcon.svg" width="40rem" height="40rem"></label></div>
                        <div class="elemento"><input type="tel" id="usuaTelefone" name="usuaTelefone" placeholder="Insira o telefone com o DDD" OnKeyPress="formatar('## # ####-####', this)" maxlength="14" required></div>
                    </div>    

                    <div class="input-box">
                        <div class="elemento"><label for="usuaSenha"><img src="../../img/icons/passwordIcon.svg" width="40rem" height="40rem"></label></div>
                        <div class="elemento"><input onkeyup='confirmarSenha();' class="" type="password" id="usuaSenha" name="usuaSenha" placeholder="Senha" value="" minlength="8" maxlength="20" required></div>
                    </div>

                    <div class="input-box">
                        <div class="elemento"><label for=""><img src="../../img/icons/passwordIcon.svg" width="40rem" height="40rem"></label></div>
                        <div class="elemento"><input onkeyup='confirmarSenha();' class="inputs required" type="password" id="usuaSenhaConfirma" name="" placeholder="Confirmar senha" value="" minlength="8" maxlength="20" required ></div>
                    </div>
                </div>
            
                <div class="form-footer">
                    <div class="checkbox">
                            <input id="checkbox" type="checkbox" required>
                            <label for="checkbox">
                                <a onclick="showTermos()">Li e concordei com os termos</a>
                            </label>
                    </div>
                    <br>
                    <button class="" type="submit" id="enviar" name="" value="" disabled>salvar</button>
            </form>
        </div>
                
        <!-- Conferencia da mensagem da modal-->
        <?php
            if ($msg == "sucesso"){
                echo "<script>
                        $( document ).ready(function() {
                            showModal();
                        });
                    </script>";
                }
            else if ($msg == "falha"){
                echo "<script>
                        $( document ).ready(function() {
                            showError();
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
                <h1>Bem-vindo ao Solar Giro!</h1>
                <h2>O usuário foi cadastrado, faça login para ter acesso ao site</h2>
            </div>
        </div>

        <div class="error" id="error">
            <div class="error-content">
                <a href="cadastro.php">
                    <span class="close-button">
                        &times;
                    </span>
                </a>
                <h1>Erro!</h1>
                <h2>O email inserido já está sendo utilizado</h2>
            </div>
        </div>

        <div class="termos" id="termos">
           <div class="termos-content">
                <a>
                    <span class="close-button" onclick="closeTermos()">
                        &times;
                    </span>
                </a>
                <h1>Termos</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Felis donec et odio pellentesque. Imperdiet sed euismod nisi porta lorem. Feugiat vivamus at augue eget arcu. Sit amet mattis vulputate enim nulla aliquet porttitor lacus. Dui sapien eget mi proin sed libero enim sed. Fames ac turpis egestas sed tempus urna et pharetra pharetra. Odio euismod lacinia at quis risus sed vulputate. Nunc sed id semper risus in hendrerit gravida rutrum. Tellus integer feugiat scelerisque varius. Urna id volutpat lacus laoreet non.</p>
            </div>
        </div>

    </main>
    
<script src="../../js/cadastro.js"></script>
<script src="../../js/confirmacao.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

</body>
</html>