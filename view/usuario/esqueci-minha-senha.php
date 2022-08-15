<?php
    session_set_cookie_params(0);
    session_start();
    if(isset($_SESSION['usuaId']) && $_SESSION['usuaId'] != '') {
        header("Location: ../../index.php");
    }
    $_SESSION['dispId'] = '';
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
    <link rel="stylesheet" href="../../css/esqueci-minha-senha.css">
</head>
<body>
     <header>
     <header>
        <nav class="nav-bar">
            <div class="nav-list"></div>
            <div class="logo"><a href="../../index.php"><img src="../../img/icons/solargirologoIconW.svg" style="width: 30vh;"></a></div>
            <div class="nav-list"></div>
        </nav>
    </header>
    </header>

    <section>
        <div class="back"><a href="login.php"><img src="../../img/icons/backIconB.svg" width="60rem"></a></div>
    </section>


    <!-- <section>
        <main class="body">
            <div class="box">
                <div class="form">
                    <div class="form-header">
                        <form action="" method="">
                            <h2>Redefinir senha</h2>
                            <div class="underline"></div>
                    </div>
                    <div class="input-field">
                        <div class="form-element"><label for="email"><img src="../../img/icons/emailIcon.svg" width="60rem"></label></div>
                        <div class="form-element"><input class="" type="email" id="email" name="email" placeholder="e-mail de recuperação" value="" required></div>
                    </div>
                    <div class="form-footer">
                        <button class="" type="submit" id="" name="" value="">entrar</button>
                        <a href="login.php"><button onclick="return confirm('Deseja mesmo cancelar?')" class="cancel" type="button" id="" name="" value="">cancelar</button></a>
                    </div>
                </div>
            </div>
        </main>
    </section> -->





            <div class="container-fluid">
                <div class="container">
                    <div class="box">
                        <div class="form-header">
                            <form action="" method="">
                                <h2>Redefinir senha</h2>
                                <div class="underline"></div>
                        </div>
                    <br>
                        <div class="input-field">
                            <div class="form-element"><label for="email"><img src="../../img/icons/emailIcon.svg" width="60rem"></label></div>
                            <div class="form-element"><input class="" type="email" id="email" name="email" placeholder="e-mail de recuperação" value="" required></div>
                        <br>
                        </div>
                        <div class="form-footer">
                            <button class="" type="submit" id="" name="" value="">entrar</button>
                            <a href="login.php"><button onclick="return confirm('Deseja mesmo cancelar?')" class="cancel" type="button" id="" name="" value="">cancelar</button></a>
                        </form>
                        </div>
                    </div>
                </div>
            </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>