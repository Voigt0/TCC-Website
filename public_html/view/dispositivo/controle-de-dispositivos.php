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
    <link rel="stylesheet" href="../../bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/controle-de-dispositivo.css">
</head>
<body>
    <header>
        <nav class="nav-bar">
            <div class="nav-list"><a href="../../index.php"><img src="../../img/icons/homeIcon.svg" width="30rem" height="40rem"></a></div>
            <div class="logo"><a href="../../index.php"><img src="../../img/icons/solargirologoIconW.svg" style="width: 30vh;"></a></div>
            <div class="nav-list"><a href="../../usuario/perfil.php"><img src="../../img/icons/userIcon.svg" width="40rem"></a></div>
        </nav>
    </header>

    <section>
        <div class="back"><a href="../../index.php"><img src="../../img/icons/backIconB.svg" width="60rem"></a></div>
    </section>    
    <section>
            <main class="body">
                    <form action="" method="">
                        <div class="form-header">
                            <h2>Controle de dispositivos</h2>
                            <div class="pesquisa">
                                <input type="text" name="pesquisa" id="pesquisa" placeholder="Pesquisar dispostivos" value="<?php echo $pesquisa;?>">
                                <button type="submit" name="" id=""><img src="../../img/icons/searchIcon.svg" width="30.38"></button>
                            </div>
                        <!-- radios -->
                            <!-- <input class="" type="radio" id="dispId" name="busca" value="0" <?php if($busca == "0"){echo "checked";}?>>
                            <label for="dispId">N°</label>
                            <input class="" type="radio" id="dispNome" name="busca" value="1" <?php if($busca == "1"){echo "checked";}?>>
                            <label for="dispNome">Nome</label> -->
                        <!-- fim dos radios  -->
                        </div>
                    </form>

                    <div class="box-body">

                        <div class="select-box" <?php if(!isset($_SESSION['dispId']) || $_SESSION['dispId'] == '') {echo "hidden";}?>>
                            <?php
                                $data = Dispositivo::consultarData($_SESSION['dispId'])[0];
                                ?>
                            <div class="select-header">
                                <a href="menu-dispositivo.php">
                                <h3><?php echo "N°".$data['dispId']." - ".$data['dispNome']; ?></h3>
                                <a class="select" href="adicionar-editar-dispositivo.php?acao=update"><img src="../../img/icons/editIcon.svg" width="43px">                            
                                <a href="../../php/controle/controle-adicionar-dispositivo.php?acao=delete"><img src="../../img/icons/deleteIcon.svg" width="45px"></a>                            
                            </div>
                            
                                <h4>Localização: <?php echo $data['dispLatitude'].", ".$data['dispLongitude']; ?></h4>
                                <h4>Descrição: <?php echo $data['dispDescricao']; ?></h4>
                                <a href="menu-dispositivo.php"><p>Ver mais informações</p></a>
                        </div>



                        <div class="disp-box">
                            <table>
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Nome</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php 
                                    //Filtro da tabela exibida
                                    $tabela = Dispositivo::consultarUsuario($_SESSION['usuaId'], $busca, $pesquisa);
                                    foreach($tabela as $key => $value) {
                                ?>

                                <tr>
                                    <th><a href="controle-de-dispositivos.php?dispId=<?php echo $value['dispId']; ?>"><?php echo $value['dispId'];?></th>
                                    <td><a href="controle-de-dispositivos.php?dispId=<?php echo $value['dispId'];?>"><?php echo $value['dispNome'];?></a></td>
                                </tr>
                                </tbody>
                                 

                                <?php
                                   } 
                                ?> 
                        </div>
                    </div> 
                    <!-- fecha boxbody -->
            </main>
        </table>
    </section>
</body>
</html>