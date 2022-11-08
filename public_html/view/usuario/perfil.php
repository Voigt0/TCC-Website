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
    <link rel="stylesheet" href="../../css/perfil.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script>
		$(document).ready(function( ){
			$(".profile .icon_wrap").click(function(){
			  $(this).parent().toggleClass("active");
			});
		});
		
		 // Confirmar
        function confirmar() {
            var element = document.getElementById("confirmar");
            element.classList.add("show-modal");
        }

        function closeConfirmar() {
            var element = document.getElementById("confirmar");
            element.classList.remove("show-modal");
        }
        
         // Excluir
        function excluir() {
            var element = document.getElementById("excluir");
            element.classList.add("show-modal");
        }

        function closeExcluir() {
            var element = document.getElementById("excluir");
            element.classList.remove("show-modal");
        }
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
        
        
        <main>
            <div class="heading">
                <h2>Informações do perfil</h2>
                <a href="../../index.php"><img src="../../img/icons/backIconW.svg" width="60rem"></a>            
            </div>
        
            <form action="../../php/controle/controle-perfil.php" method="post" enctype="multipart/form-data">
                <div class="container">
                    <div class="box-foto">
                        <br>
                        <div class="foto">
                            <?php 
                                if($data['usuaFoto'] == ""){
                                    echo "<img id='img-perfil' src='../../img/png/defaultProfilePhoto.png'>";
                                } else {
                                    echo "<img id='img-perfil' src='../../img/perfil/$data[usuaFoto]'>";
                                }
                            
                            ?>
                    
                        </div> <!--onde fica a foto -->
                        <br>
                            <div class="button-alterar">
                                
                                <!--<button type="button" class="" onclick="document.getElementById('photo').click()" <?php if(!isset($_GET['update'])) {echo "hidden";}?>>Alterar foto</button>-->
                                
                                
                                <input type='file' id="imagem" name="imagem" class="<?php if(!isset($_GET['update'])) {echo "oculto";} else {echo "show";}?>" accept="image/*">
                                
                             <button type="button" id="btn-alterar" class="<?php if(!isset($_GET['update'])) {echo "oculto";} else {echo "show";}?>">
                            <label for="imagem" id="btn">
                               <p>alterar foto</p>
                            </label></button>
                            </div>
                            
                           
                            <input type="text" hidden id="usuaFoto" name="usuaFoto" value="<?php echo $data['usuaFoto']?>" >
                           

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
                            <input required class="" type="tel" id="telefone" name="usuaTelefone" placeholder="" value="<?php echo $data['usuaTelefone'];?>" <?php if(!isset($_GET['update'])) {echo "disabled";}?> required>
                        </div>
                        
                        <div class="input-box">
                            <label for="usuaSenha">Senha</label>
                            <input required onkeyup='confirmarSenha();' class="" type="password" id="usuaSenha" name="usuaSenha" placeholder="" minlength="8" value="<?php if(!isset($_GET['update'])) {echo $data['usuaSenha'];}?>" <?php if(!isset($_GET['update'])) {echo "disabled";}?> required>
                        </div>
                        <div class="input-box">
                            <label <?php if(!isset($_GET['update'])) {echo "hidden";}?> for="novaUsuaSenha">Nova senha</label>
                            <input onkeyup='confirmarSenha();' class="<?php if(!isset($_GET['update'])) {echo "oculto";} else {echo "show";}?>" type="password" id="novaUsuaSenha" name="novaUsuaSenha" placeholder="" minlength="8" maxlength="20" value="">
                        </div>

                   
                        <div class="input-box">
                            <label <?php if(!isset($_GET['update'])) {echo "hidden";}?> for="novaUsuaSenhaConfirma">Confirmar senha</label>
                            <input onkeyup='confirmarSenha();' class="" type="password" id="novaUsuaSenhaConfirma" name="" placeholder="" minlength="8" maxlength="20" value="" <?php if(!isset($_GET['update'])) {echo "hidden";}?>>
                        </div>
                        
                        </div>
                </div>
            </div>
                <div class="perfil-footer">
                     <div class="button"><button class="" type="submit" id="enviar" name="" value="" <?php if(!isset($_GET['update'])) {echo "hidden";}?> disabled>Salvar</button></div>

                <div class="button"><button class="delete" type="submit" id="enviar" name="" value="" <?php if(!isset($_GET['update'])) {echo "hidden";}?> disabled><a onclick="excluir()"> Excluir perfil</a></button></div>
                
                     
                    <div class="button"><a onclick="<?php if(isset($_GET['update'])) {echo "return confirm('Deseja mesmo cancelar?')";}?>" href="<?php if(!isset($_GET['update'])) {echo "perfil.php?update=true";} else {echo "perfil.php";}?>"><button class="" type="button" id="editarEcancelar" name="" value="" onclick="editarEcancela()"><?php if(!isset($_GET['update'])) {echo "Editar";} else {echo "Cancelar";}?></button></a></div>

                   

                    

                    <!--<div class="button"><a onclick="confirmar()"><button type="button" id="" name="" >Encerrar sessão</button></a></div>-->
                    
                    
                    

        <div class="confirmar" id="confirmar">
           <div class="confirmar-content">
                <a>
                    <span class="close-button" onclick="closeConfirmar()">
                        &times;
                    </span>
                </a>
                <h1>Deseja encerrar a sessão?</h1>
                 <div class="div-botao-modal">
                <a onclick="closeConfirmar()"><button type="button"class="btn-modal">Cancelar</button></a>
                <a href="../../php/controle/controle-login.php"><button type="button" class="btn-modal">Encerrar sessão</button></a>
            </div>
            </div>
        </div>
              
              
        <div class="excluir" id="excluir">
           <div class="excluir-content">
                <a>
                    <span class="close-button" onclick="closeExcluir()">
                        &times;
                    </span>
                </a>
                <h1>Deseja excluir o perfil?</h1>
                 <div class="div-botao-modal">
                <a onclick="closeExcluir()"><button type="button"class="btn-modal">Cancelar</button></a>
                <a href="../../php/controle/controle-perfil.php?acao=delete"><button type="button" class="btn-modal">Excluir perfil</button></a>
            </div>
            </div>
        </div>      
                </div>
            </form>
        </main>

    </section>
    <script>var senhaAtual = "<?php echo $data["usuaSenha"];?>";</script>
    <script src="../../js/perfil.js"></script>
</body>
</html>