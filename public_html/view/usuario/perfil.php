<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(!isset($_SESSION['usuaId']) || $_SESSION['usuaId'] == '') {
            header("Location: login.php");
        }
    }
    $_SESSION['dispId'] = '';

    include_once (__DIR__."/../../php/utils/autoload.php");
    //Salvar contexto
    $data = Usuario::consultarData($_SESSION['usuaId'])[0];
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
    <link rel="stylesheet" href="../../css/perfil.css">
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
        <a href="#"><a href="../../index.php"><img src="../../img/icons/homeIconB.svg"></a>
      </div>
      <div class="navbar_center">
        <a href="../../index.php"><img src="../../img/icons/solargirologoIconB.svg"></a>
      </div> 
      <div class="navbar_right">
        <div class="profile" id="invisivel">
        <div class="icon_wrap">
        <span class="icon"><a><img src="../../img/icons/userIcon.svg"></a></span>
        <i class="fas fa-chevron-down"></i>
      </div>
          <div class="profile_dd">
              
            <ul class="profile_ul">
              
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>
  
   
    <section>
        <div class="container-fluid">
            <div class="back"><a href="../../index.php"><img src="../../img/icons/backIconW.svg" width="60rem"></a></div>                
            <form action="../../php/controle/controle-perfil.php" method="post">
                <div class="container">
                    <div class="box-foto">
                        <div class="form-header"><h2>Informações de pefil</h2></div>
                        <br>
                        <div class="foto">
                            <img src="../../img/png/defaultProfilePhoto.png">
                    
                        </div> <!--onde fica a foto -->
                        <br>
                            <div class="button-alterar">
                                <button type="button" class="" onclick="document.getElementById('photo').click()" <?php if(!isset($_GET['update'])) {echo "hidden";}?>>Alterar foto</button>
                                <input type='file' id="photo" style="display:none">
                            </div>
                    </div>

                    <div class="dados">
                    <div class="input-group">
                        <div class="input-box">
                            <label for="usuaNome">Nome completo</label>
                            <input required class="" type="" id="usuaNome" name="usuaNome" placeholder="" minlength="3" value="<?php echo $data['usuaNome'];?>" <?php if(!isset($_GET['update'])) {echo "disabled";}?> required>
                        </div>

                        <div class="input-box">
                            <label for="usuaEmail">E-mail</label>
                            <input required class="" type="email" id="email" name="usuaEmail" placeholder="" value="<?php echo $data['usuaEmail'];?>" <?php if(!isset($_GET['update'])) {echo "disabled";}?> required>
                        </div>

                        <div class="input-box">
                            <label for="usuaTelefone">Telefone</label>
                            <input required class="" type="tel" id="telefone" name="usuaTelefone" placeholder="" pattern="[0-9]{2} [0-9]{5}-[0-9]{4}" value="<?php echo $data['usuaTelefone'];?>" <?php if(!isset($_GET['update'])) {echo "disabled";}?> required>
                        </div>
                        
                        <div class="input-box">
                            <label for="usuaSenha">Senha</label>
                            <input required onkeyup='confirmarSenha();' class="" type="password" id="usuaSenha" name="usuaSenha" placeholder="" minlength="8" value="<?php if(!isset($_GET['update'])) {echo $data['usuaSenha'];}?>" <?php if(!isset($_GET['update'])) {echo "disabled";}?> required>
                        </div>
</div>
                        <div class="input-group">
                        <div class="input-box">
                            <label <?php if(!isset($_GET['update'])) {echo "hidden";}?> for="novaUsuaSenha">Nova senha</label>
                            <input onkeyup='confirmarSenha();' class="" type="password" id="novaUsuaSenha" name="novaUsuaSenha" placeholder="" minlength="8" maxlength="20" value="" <?php if(!isset($_GET['update'])) {echo "hidden";}?>>
                        </div>

                        <div class="input-box">
                            <label <?php if(!isset($_GET['update'])) {echo "hidden";}?> for="novaUsuaSenhaConfirma">Confirmar senha</label>
                            <input onkeyup='confirmarSenha();' class="" type="password" id="novaUsuaSenhaConfirma" name="" placeholder="" minlength="8" maxlength="20" value="" <?php if(!isset($_GET['update'])) {echo "hidden";}?>>
                        </div>
                        </div>
                </div>
            </div>
                <div class="perfil-footer">
                    <div class="button"><a onclick="<?php if(isset($_GET['update'])) {echo "return confirm('Deseja mesmo cancelar?')";}?>" href="<?php if(!isset($_GET['update'])) {echo "perfil.php?update=true";} else {echo "perfil.php";}?>"><button class="" type="button" id="editarEcancelar" name="" value="" onclick="editarEcancela()"><?php if(!isset($_GET['update'])) {echo "Editar";} else {echo "Cancelar";}?></button></a></div>
                <br>
                    <div class="button"><button class="" type="submit" id="enviar" name="" value="" <?php if(!isset($_GET['update'])) {echo "hidden";}?> disabled>Salvar</button></div>
                <br>
                <!--<div class="button"><button><a onclick="return confirm('Deseja excluir a conta?')" href="../../php/controle/controle-perfil.php?acao=delete"</a>Excluir</button></div>-->
                    
                <div class="button"><button class="delete" type="submit" id="enviar" name="" value="" <?php if(!isset($_GET['update'])) {echo "hidden";}?> disabled><a onclick="return confirm('Deseja excluir o perfil?')" href="../../php/controle/controle-perfil.php?acao=delete"> Excluir perfil</a></button></div>
                
                     

                    
                    <div class="button"><a href="../../php/controle/controle-login.php"><button class="" type="button" id="" name="" value=""<?php if(isset($_GET['update'])) {echo "hidden";}?>>Encerrar sessão</button></a></div>
                </div>
            </form>
        </div>

    </section>
    <script>var senhaAtual = "<?php echo $data["usuaSenha"];?>";</script>
    <script src="../../js/perfil.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script> 
</body>
</html>