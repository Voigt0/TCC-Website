<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(!isset($_SESSION['usuaId']) || $_SESSION['usuaId'] == ''){
            header("Location: ../usuario/login.php");
        }
    }

    include_once (__DIR__ ."/../../php/utils/autoload.php");
    if(isset($_GET['dispId'])) {
        Dispositivo::validar($_GET['dispId'], $_SESSION['usuaId']);
    };
    $busca = isset($_POST["busca"]) ? $_POST["busca"] : "0";
    $pesquisa = isset($_POST["pesquisa"]) ? $_POST["pesquisa"] : "";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solar Giro</title>
    <link rel="icon" type="image/x-icon" href="../../img/favicon/favicon.ico">
    <link rel="stylesheet" href="../../css/controle-de-dispositivo.css">
    <link rel="stylesheet" href="../../css/css-geral.css">
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

    
        <main>          
            <section>
                <div class="back"><a href="../../../index.php"><img src="../../img/icons/backIconB.svg" width="60rem"></a></div>
            </section>

            <!-- Início do Formulário -->
            <form action="" method="post">
                <div class="form-header">
                    <h2>Controle de dispositivos</h2>
                    <div class="pesquisa">
                        <input type="text" name="pesquisa" id="pesquisa" placeholder="Pesquisar dispostivos" value="<?php echo $pesquisa;?>">
                        <button type="submit" name="" id=""><img src="../../img/icons/searchIcon.svg" width="30.38"></button>                
                    </div>
                </div>
            </form>

            <!-- Escopo da página -->
            <div class="box-body">
                <!-- Dispositivo selecionado -->
                <div class="select-box" <?php if(!isset($_SESSION['dispId']) || $_SESSION['dispId'] == '') {echo "hidden";}?>>
                    <?php
                        // Consulta valores do Dispositivo
                        $data = Dispositivo::consultarData($_SESSION['dispId'])[0];
                    ?>

                    <div class="select-header">
                        <a href="menu-dispositivo.php">
                            <h3><?php echo "N°".$data['dispId']." - ".$data['dispNome']; ?></h3>
                            <a class="select" href="configurar-dispositivo.php?acao=update"><img src="../../img/icons/editIcon.svg" width="43px">                            
                            <a onclick="confirmar()"><img src="../../img/icons/deleteIcon.svg" width="45px"></a>   
                    </div>
                            
                    <h4>Localização: <?php echo $data['dispLatitude'].", ".$data['dispLongitude']; ?></h4>
                    <h4>Descrição: <?php echo $data['dispDescricao']; ?></h4>
                    <a href="menu-dispositivo.php"><p>Ver mais informações</p></a>
                </div>

                <!-- Lista de dispositivos -->
                <div class="disp-box">
                    <table>
                        <tr>
                            <th class="col1">N°</th>
                            <th class="col2">Nome</th>
                        </tr>

                    <?php 
                        //Filtro da tabela exibida
                        $tabela = Dispositivo::consultarDeUsuario($_SESSION['usuaId'], 1, $pesquisa);
                        foreach($tabela as $key => $value) {
                    ?>

                        <tr>
                            <td class="col1"><a href="controle-de-dispositivos.php?dispId=<?php echo $value['dispId']; ?>"><?php echo $value['dispId'];?></td>
                            <td class="col2"><a href="controle-de-dispositivos.php?dispId=<?php echo $value['dispId'];?>"><?php echo $value['dispNome'];?></a></td>
                        </tr>

                    <?php
                        } 
                    ?> 
                                
                </div>

                <!-- Mensagem de confirmação -->
                <div class="confirmar" id="confirmar">
                    <div class="confirmar-content">
                        <a>
                            <span class="close-button" onclick="closeConfirmar()">
                                &times;
                            </span>
                        </a>
                        <h1>Deseja excluir o dispositivo?</h1>
                        <div class="div-botao-modal">
                            <a onclick="closeConfirmar()"><button type="button"class="btn-modal">Cancelar</button></a>
                            <a href="../../php/controle/controle-configurar-dispositivo.php?acao=delete"><button type="button" class="btn-modal">Excluir dispositivo</button></a>
                        </div>
                    </div>
                </div>
            </div> 
        </main>
    </table>
</body>
</html>