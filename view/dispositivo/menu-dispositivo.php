<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solar Giro</title>
    <link rel="icon" type="image/x-icon" href="../../img/favicon/favicon.ico">
    <link rel="stylesheet" href="../../bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/menu-dispositivo.css">

</head>
<?php
    session_set_cookie_params(0);
    session_start();
    if(!isset($_SESSION['usuaId']) || $_SESSION['usuaId'] == ''){
        header("Location: ../usuario/login.php");
    }
    if(!isset($_SESSION['dispId']) || $_SESSION['dispId'] == ''){
        header("Location: controle-de-dispositivos.php");
    }
?>
<body>

    <header>
        <nav class="nav-bar">
            <div class="nav-list"><a href="../../index.php"><img src="../../img/icons/homeIcon.svg" width="30rem" height="40rem"></a></div>
            <div class="logo"><a href="../../index.php"><img src="../../img/icons/solargirologoIconW.svg" style="width: 30vh;"></a></div>
            <div class="nav-list"><a href="../usuario/perfil.php"><img src="../../img/icons/userIcon.svg" width="40rem"></a></div>
        </nav>
    </header>


    <main class="body">
        <section>
            <div class="img-button"><a href="bateria.php"><button class="botao"><img src="../../img/icons/battery.svg"></button></a></div>
            <div class="button"><button class="" type="submit" id="" name="" value="">Adicionar Baterias</button></div>
        </section>
        <section>
            <div class="img-button"><a href="sistema.php"><button class="botao"><img src="../../img/icons/engine.svg"></button></a></div>
            <div class="button"><button class="" type="submit" id="" name="" value="">Gerenciar Motores</button></div>
        </section>
    </main>

</body>
</html>