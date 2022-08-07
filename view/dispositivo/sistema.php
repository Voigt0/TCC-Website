<?php
    session_set_cookie_params(0);
    session_start();
    if(!isset($_SESSION['usuaId']) || $_SESSION['usuaId'] == ''){
        header("Location: ../usuario/login.php");
    }
    echo $_SESSION['dispId'];
    if(!isset($_SESSION['dispId']) || $_SESSION['dispId'] == ''){
        header("Location: controle-de-dispositivos.php");
    }
?>