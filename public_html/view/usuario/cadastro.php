<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(isset($_SESSION['usuaId']) && $_SESSION['usuaId'] != ''){
            header("Location: ../../index.php");
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
    <link rel="icon" type="image/x-icon" href="../../img/favicon/favicon.ico">
    <link rel="stylesheet" href="../../bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/cadastro.css">
	
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
            <span class="icon"><a></a></span>
            <i class="fas fa-chevron-down"></i>
        </div>
        </div>
      </div>
    </div>
  </header>


      <section>
        <div class="back"><a href="login.php"><img src="../../img/icons/backIconB.svg" width="60rem"></a></div>
    </section>
    
    <section>
        <main class="body">
            <div class="box">
                <div class="form">
                    <div class="form-header">
                        <form action="../../php/controle/controle-cadastro.php" method="post" id="form">
                            <h2>Cadastro</h2>
                    </div>
                    <div class="form-body">
                         <div class="input-field">
                            <div class="form-element"><label for="usuaNome"><img src="../../img/icons/nameIcon.svg" width="40rem" height="40rem"></label></div>
                            <div class="form-element"><input class="inputs required" type="" id="usuaNome" name="usuaNome" placeholder="Nome completo" value="" minlength="3" required oninput="nameValidate()"></div>
                            <!--<span class="span-required" style="color: white;">O nome está errado</span>-->
                        <br>
                        </div>
                        <div class="input-field">
                            <div class="form-element"><label for="usuaEmail"><img src="../../img/icons/emailIcon.svg" width="40rem" height="40rem"></label></div>
                            <div class="form-element"><input class="" type="email" id="usuaEmail" name="usuaEmail" placeholder="E-mail" value="" required></div>
                            <br>
                        </div>
                        <div class="input-field">
                            <div class="form-element"><label for="usuaTelefone"><img src="../../img/icons/phoneIcon.svg" width="40rem" height="40rem"></label></div>
                            <div class="form-element"><input type="tel" id="usuaTelefone" name="usuaTelefone" placeholder="Insira o telefone com o DDD" OnKeyPress="formatar('## # ####-####', this)" maxlength="14" required></div>
                        <br>            
                        </div>    
                        <br>
                        <div class="input-field">
                            <div class="form-element"><label for="usuaSenha"><img src="../../img/icons/passwordIcon.svg" width="40rem" height="40rem"></label></div>
                            <div class="form-element"><input onkeyup='confirmarSenha();' class="" type="password" id="usuaSenha" name="usuaSenha" placeholder="Senha" value="" minlength="8" maxlength="20" required></div>
                            
                            <!--<p id="mensagemSenhaPequena" style="color: red;">*A senha deve ter entre 8 e 20 caracteres</p>-->
                            <br>
                        </div>
                        <div class="input-field">
                            <div class="form-element"><label for=""><img src="../../img/icons/passwordIcon.svg" width="40rem" height="40rem"></label></div>
                            <div class="form-element"><input onkeyup='confirmarSenha();' class="inputs required" type="password" id="usuaSenhaConfirma" name="" placeholder="Confirmar senha" value="" minlength="8" maxlength="20" required oninput="comparePassword()"></div>
                            <!--<span class="span-required" style="color: white;">As senhas não combinam</span>-->

                            <!--<p id="mensagemSenhaDiferente" style="color: red;">*As senhas devem ser iguais</p>-->
                        </div>
                    </div>
                <div class="form-footer">
                      <div class="checkbox">
                                <input id="checkbox" type="checkbox" required>
                                <label for="checkbox"><a target="_blank" href="termos.php">Li e concordei com os termos</a></label>
                            </div>
                            <br>
                            <button class="" type="submit" id="enviar" name="" value="" disabled>salvar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                </div>
                    </form>
            </div>
        </main>
        
        
<!--        <script>-->
<!--            const form = document.getElementById('form');-->
<!--            const campos = document.querySelectorAll('.required');-->
<!--            const spans = document.querySelectorAll('.span-required');-->

<!--            function setError(index){-->
<!--                campos[index].style.border = '2px solid #e63636';       -->
<!--                spans[index].style.display = 'block';-->
<!--}-->
<!--                function removeError(index){-->
<!--                	campos[index].style.border = '';-->
<!--                	spans[index].style.display = 'none';-->
<!--                }-->

<!--            function nameValidate(){-->
<!--            	if(campos[0].value.length < 3){-->
<!--                    setError(0);-->
<!--            } else {-->
<!--                removeError(0);                -->
<!--                }-->
<!--            }-->
        
<!--        </script>-->
    
    </section>
    <script src="../../js/cadastro.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

</body>
</html>