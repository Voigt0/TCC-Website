<?php
    session_set_cookie_params(0);
    session_start();
    if(!isset($_SESSION['usuaId']) || $_SESSION['usuaId'] == ''){
        header("Location: ../usuario/login.php");
    }

    include_once (__DIR__."/../../php/utils/autoload.php");
    //Salvar contexto
    if(isset($_SESSION['dispId']) && $_SESSION['dispId'] != '') {
        $data = Dispositivo::consultarData($_SESSION['dispId'])[0];
    }
    
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
    <link rel="stylesheet" href="../../css/configurar-dispositivo.css">
    <link rel="stylesheet" href="../../css/css-geral.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
	<script>
		$(document).ready(function( ){
			$(".profile .icon_wrap").click(function(){
			  $(this).parent().toggleClass("active");
			});
		});
		
	// Mensagem
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
    <!-- Navbar -->
    <header>
        <div class="navbar">
            <div class="navbar_left">
                <a href="../../index.php"><img src="../../img/icons/homeIcon.svg"></a>
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
                            <li><a class="perfil" href="../usuario/perfil.php">Visualizar Perfil</a></li>
                            <li><a class="logout" href="../../php/controle/controle-login.php">Encerrar sessão</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
 
    <div class="back"><a href="../../index.php"><img src="../../img/icons/backIconB.svg" width="60rem"></a></div>
       
    <main>
        <div id="container" class="container">
            <div class="box" id="box">
                <!-- Início do formulário -->
               <form action="../../php/controle/controle-configurar-dispositivo.php?<?php if(isset($data)){echo 'acao=update';} else{echo'acao=create';}?>" method="post">

                    <div class="form-header">
                        <h2><?php if(isset($_GET['acao']) && $_GET['acao'] == 'update'){echo "Editar";}else{echo "Adicionar";} ?> dispositivo</h2>
                    </div>
        
                    <div class="form-body">
                        <div class="input-box">
                            <div class="elemento"><label for="dispNome"><img src="../../img/icons/nameIcon.svg" width="35rem" height="35rem"></label></div>
                            <div class="elemento"><input class="" type="" id="dispNome" name="dispNome" placeholder="Nome do dispositivo" value="<?php if(isset($data)){echo $data['dispNome'];}?>" required></div>
                        </div>
                
                        <div class="input-box">
                            <div class="elemento"><label for="dispChave"><img src="../../img/icons/keyIcon.svg" width="35rem" height="35rem"></label></div>
                            <div class="elemento"><input class="" type="" id="dispChave" name="dispChave" placeholder="Chave do dispositivo" pattern="[A-Z0-9]{5}-[A-Z0-9]{5}-[A-Z0-9]{5}" value="<?php if(isset($data)){echo $data['dispChave'];}?>" required maxlength="17"></div>
                        </div>
            
                        <div class="input-box">
                            <div class="elemento"><label for="dispDescricao"><img src="../../img/icons/descriptionIcon.svg" width="35rem" height="35rem"></label></div>
                            <div class="elemento"><textarea id="dispDescricao" name="dispDescricao" class="description" required placeholder="Descrição do dispositivo" maxlength="500" ><?php if(isset($data)){echo $data['dispDescricao'];}?></textarea></div>
                        </div>
                
                        <div class="input-box">
                            <div class="elemento"><label for="dispLatitude"><img src="../../img/icons/latitude.svg" width="30rem" height="30rem"></label></div>
                            <div class="elemento"><input class="" type="number" min="-90" max="90" step="0.0000001" id="dispLatitude" name="dispLatitude" placeholder="Latitude do dispositivo" value="<?php if(isset($data)){echo $data['dispLatitude'];}?>" required></div>
                        </div>
                    
                        <div class="input-box">
                            <div class="elemento"><label for="dispLongitude"><img src="../../img/icons/longitude.svg" width="30rem" height="30rem"></label></div>
                            <div class="elemento"><input class="" type="number" min="-180" max="180" step="0.0000001" id="dispLongitude" name="dispLongitude" placeholder="Longitude do dispositivo" value="<?php if(isset($data)){echo $data['dispLongitude'];}?>" required></div>
                        </div>
                    </div>

                    <div class="form-footer">
                        <button name="local" id="local" type="button" onclick="getLocation()">Localizar</button>
                        <label for="local"><p id="localizarDica" style="color:white">Clique no botão para obter suas coordenadas.</p></label>
                        <div id="mapa"></div>
                        <button class="footer" type="submit" id="" name="" value="">Salvar</button>
                        <a href="../../index.php"><button onclick="return confirm('Deseja mesmo cancelar?')" class="cancel" type="button" id="" name="" value="">Cancelar</button></a>
                    </div>
                </form>
            </div>
        </div>
            <?php
            // Mensagem - Modal
                if ($msg == "sucesso"){
                    echo "<script>
                            $( document ).ready(function() {
                                showModal();
                            });
                        </script>";    
                    }         
            ?>              
    
        <div class="modal" id="modal">
            <div class="modal-content">
                <h1>Dispositivo cadastrado</h1>
                <h2>O dispositivo foi cadastrado com sucesso!</h2>
                <div class="div-botao-modal">
                    <a href="controle-de-dispositivos.php"><button class="btn-modal">Confirmar</button></a>
                    <a href="configurar-dispositivo.php"><button class="btn-modal">Adicionar outro dispositivo</button></a>
                </div>
            </div>
        </div>
    
    
    </main>
<script src="../../js/adicionar-dispositivo.js"></script>  
</body>
</html>

