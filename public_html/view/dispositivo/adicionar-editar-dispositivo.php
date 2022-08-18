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
    <link rel="stylesheet" href="../../css/adicionar-dispositivo.css">
</head>
<body>
    <header>
        <nav class="nav-bar">
            <div class="nav-list"><a href="../../index.php"><img src="../../img/icons/homeIcon.svg" width="30rem" height="40rem"></a></div>
            <div class="logo"><a href="../../index.php"><img src="../../img/icons/solargirologoIconW.svg" style="width: 30vh;"></a></div>
            <div class="nav-list"><a href="../usuario/perfil.php"><img src="../../img/icons/userIcon.svg" width="40rem"></a></div>
        </nav>
    </header>
    <section>
        <div class="back"><a href="../index.php"><img src="../../img/icons/backIconB.svg" width="60rem"></a></div>
    </section>
    <section>
            <div id="container" class="container">
                <div class="box">
                    <div class="form">
                        <div class="form-header">
                            <form action="../../php/controle/controle-adicionar-dispositivo.php?<?php if(isset($data)){echo 'acao=update';}?>" method="post">
                                <h2><?php if(isset($_GET['acao']) && $_GET['acao'] == 'update'){echo "Editar";}else{echo "Adicionar";} ?> dispositivo</h2>
                                <div class="underline"></div>
                        </div>
                        <br>
                        <div class="input-field">
                            <div class="form-element"><label for="dispNome"><img src="../../img/icons/nameIcon.svg" width="35rem" height="35rem"></label></div>
                            <div class="form-element"><input class="" type="" id="dispNome" name="dispNome" placeholder="Nome do dispositivo" value="<?php if(isset($data)){echo $data['dispNome'];}?>" required></div>
                        <br>
                        </div>
                        <div class="input-field">
                            <div class="form-element"><label for="dispDescricao"><img src="../../img/icons/descriptionIcon.svg" width="35rem" height="35rem"></label></div>
                            <div class="form-element"><input class="description" type="textarea" id="dispDescricao" name="dispDescricao" placeholder="Descrição adicional" value="<?php if(isset($data)){echo $data['dispDescricao'];}?>"></div>
                        </div>
                        <div class="input-field">
                            <div class="form-element"><label for="dispLatitude"><img src="../../img/icons/latitude.svg" width="30rem" height="30rem"></label></div>
                            <div class="form-element"><input class="" type="number" min="-90" max="90" step="0.0000001" id="dispLatitude" name="dispLatitude" placeholder="Latitude do dispositivo" value="<?php if(isset($data)){echo $data['dispLatitude'];}?>" required></div>
                        </div>
                        <div class="input-field">
                            <div class="form-element"><label for="dispLongitude"><img src="../../img/icons/longitude.svg" width="30rem" height="30rem"></label></div>
                            <div class="form-element"><input class="" type="number" min="-180" max="180" step="0.0000001" id="dispLongitude" name="dispLongitude" placeholder="Longitude do dispositivo" value="<?php if(isset($data)){echo $data['dispLongitude'];}?>" required></div>
                        <br>
                        </div>
                        <div class="center">
                            <button name="local" id="local" type="button" onclick="getLocation()">Localizar</button>
                            <label for="local"><p id="localizarDica" style="color:white">Clique no botão para obter suas coordenadas.</p></label>
                            <div id="mapa"></div>
                        </div>
                        <div class="form-footer">
                            <button class="footer" type="submit" id="" name="" value="">Salvar</button>
                            <a href="../index.php"><button onclick="return confirm('Deseja mesmo cancelar?')" class="cancel" type="button" id="" name="" value="">Cancelar</button></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <script src="../../js/adicionar-dispositivo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script> 
</body>
</html>
