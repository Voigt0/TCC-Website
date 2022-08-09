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
    <link rel="stylesheet" href="../../css/login.css"> 
</head>
<body data-bs-toggle="modal" data-bs-target="#myModal">
    <header>
        <nav class="nav-bar">
            <div class="nav-list"></div>
            <div class="logo"><a href="../../index.php"><img src="../../img/icons/solargirologoIconW.svg" width="200rem"></a></div>
            <div class="nav-list"></div>
        </nav>
    </header>
    <script>
        alerta(){
            const element = document.createElement('div');
        }
    </script>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    <section>
        <main class="body">
            <div class="box">
                <div class="form">
                        <div class="form-header">
                            <form action="../../php/controle/controle-login.php" method="post" id="login">
                                <div class="form-title"><h2>Login</h2></div>
                                <div class="underline1"></div>
                                <div class="underline2"></div>
                        </div>
                    <br>
                        <div class="input-field">
                            <div class="form-element"><label for="usuaEmail"><img src="../../img/icons/emailIcon.svg" width="40rem" height="40rem"></label></div>
                            <div class="form-element"><input class="" type="email" id="usuaEmail" name="usuaEmail" placeholder="e-mail" value="" required></div>
                        <br>
                        </div>
                        <div class="input-field">
                            <div class="form-element"><label for="usuaSenha"><img src="../../img/icons/passwordIcon.svg" width="40rem" height="40rem"></label></div>
                            <div class="form-element"><input class="" type="password" id="usuaSenha" name="usuaSenha" placeholder="senha" value="" minlength="8" required></div>
                        <br>
                        </div>
                        <br>
                        <div class="form-footer">
                            <a href="esqueci-minha-senha.php">Esqueci minha senha</a>
                            <br>
                            <button class="" type="submit" id="" name="" value="">entrar</button>
                            <br>
                            <a href="cadastro.php">Ainda não tenho cadastro</a>
                            </form>
                        </div>
                    </div>
            </div>
        </main>
    <!-- <div class="container-fluid">
        <div class="container">
            <div class="box">
                <div class="form">
                    <div class="form-header">
                        <form action="../../php/controle/controle-login.php" method="post" id="login">
                            <div class="form-title"><h2>Login</h2></div>
                            <div class="underline1"></div>
                            <div class="underline2"></div>
                    </div>
                <br>
                    <div class="input-field">
                        <div class="form-element"><label for="usuaEmail"><img src="../../img/icons/emailIcon.svg" width="40rem" height="40rem"></label></div>
                        <div class="form-element"><input class="" type="email" id="usuaEmail" name="usuaEmail" placeholder="e-mail" value="" required></div>
                    <br>
                    </div>
                    <div class="input-field">
                        <div class="form-element"><label for="usuaSenha"><img src="../../img/icons/passwordIcon.svg" width="40rem" height="40rem"></label></div>
                        <div class="form-element"><input class="" type="password" id="usuaSenha" name="usuaSenha" placeholder="senha" value="" minlength="8" required></div>
                    <br>
                    </div>
                    <br>
                    <div class="form-footer">
                        <a href="esqueci-minha-senha.php">Esqueci minha senha</a>
                        <br>
                        <button class="" type="submit" id="" name="" value="">entrar</button>
                        <br>
                        <a href="cadastro.php">Ainda não tenho cadastro</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>