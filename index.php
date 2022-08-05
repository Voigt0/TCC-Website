<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solar Giro</title>
    <link rel="icon" type="image/x-icon" href="img/favicon/favicon.ico">
</head>
<?php
    //temporário
    session_set_cookie_params(0);
    session_start();
    echo $_SESSION['usuaId'];
    if(!isset($_SESSION['usuaId']) || $_SESSION['usuaId'] == ''){
        header("Location: view/usuario/login.php");
    }
?>
<body>
<header>
        <nav class="navbar" style="background-color: #171606;">        
            <div class="container-fluid">
                <div class="nav-element"><a href=""><img src="img/icons/homeIcon.svg" width="30rem" height="40rem"></a></div>
                <header>    
                   <div class="nav-element"><a><img src="img/icons/solargirologoIconW.svg" style="width: 30vh;"></a></div>
                </header>
                <div class="nav-element"><a href=""><img src="img/icons/userIcon.svg" width="40rem"></a></div>
            </div>
        </nav>
    </header>

    <section>
        <a href="view/dispositivo/adicionar-dispositivo.php"><button>(Add Device Icon)</button></a>
    </section>
    <section>
        <a href="view/dispositivo/controle-de-dispositivos.php"><button>(Control Device Icon)</button></a>
    </section>
    <section>
        <a href="view/usuario/perfil.php"><button>(Show Perfil Icon)</button></a>
    </section>
</body>
</html>