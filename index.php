<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solar Giro</title>
    <link rel="icon" type="image/x-icon" href="img/favicon/favicon.ico">
    <link rel="stylesheet" href="bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css"> 
</head>
<?php
    session_set_cookie_params(0);
    session_start();
    if(!isset($_SESSION['usuaId']) || $_SESSION['usuaId'] == ''){
        header("Location: view/usuario/login.php");
    }
    $_SESSION['dispId'] = '';
?>
<body>
    <header>
        <nav class="nav-bar">
            <div class="nav-list"><a href=""><img src="img/icons/homeIcon.svg" width="30rem" height="40rem"></a></div>
            <div class="logo"><a href=""><img src="img/icons/solargirologoIconW.svg" style="width: 30vh;"></a></div>
            <div class="nav-list"><a href=""><img src="img/icons/userIcon.svg" width="40rem"></a></div>
        </nav>
    </header>


    
<!-- 
    <section>
        <div class="item"><div class="img-button"><a href="view/dispositivo/adicionar-dispositivo.php"><button class="botao"><img src="img/icons/addIcon.svg"></button></a></div></div>
        <div class="item"><div class="button"><button class="" type="submit" id="" name="" value="">Adicionar dispositivo</button></div></div>
    </section>
    <section>
        <div class="item"><div class="img-button"><a href="view/dispositivo/controle-de-dispositivos.php"><button class="botao"><img src="img/icons/confIcon.svg"></button></a></div></div>
        <div class="item"><div class="button"><button class="" type="submit" id="" name="" value="">Gerenciar dispositivo</button></div></div>
    </section>
    <section>
        <div class="item"><div class="img-button"><a href="view/usuario/perfil.php"><button class="botao"><img src="img/icons/userIcon.svg"></button></a></div></div>
        <div class="item"><div class="button"><button class="" type="submit" id="" name="" value="">Perfil do usuário</button></div></div>
    </section> -->



    <main class="body">
        <section>
            <div class="img-button"><a href="view/dispositivo/adicionar-dispositivo.php"><button class="botao"><img src="img/icons/addIcon.svg"></button></a></div>
            <div class="button"><button class="" type="submit" id="" name="" value="">Adicionar dispositivo</button></div>
        </section>
        <section>
            <div class="img-button"><a href="view/dispositivo/controle-de-dispositivos.php"><button class="botao"><img src="img/icons/confIcon.svg"></button></a></div>
            <div class="button"><button class="" type="submit" id="" name="" value="">Gerenciar dispositivo</button></div>
        </section>
        <section>
            <div class="img-button"><a href="view/usuario/perfil.php"><button class="botao"><img src="img/icons/userIcon.svg"></button></a></div>
            <div class="button"><button class="" type="submit" id="" name="" value="">Perfil do usuário</button></div>
        </section>
    </main>
</div>
</body>
</html>