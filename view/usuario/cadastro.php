<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solar Giro</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon/favicon.ico">
    <link rel="stylesheet" href="../../bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/register.css">
</head>
<body>
    <header>
        <nav class="navbar" style="background-color: #171606;">        
            <div class="container-fluid">
                <a href=""></a>
                <header>    
                    <a><img src="../../img/icons/solargirologoIconW.svg" style="width: 30vh;"></a>
                </header>
                <a href=""></a>
            </div>
        </nav>
    </header>

    <section>
        <div class="container-fluid">
            <div class="back"><a href="login.php"><img src="../../img/icons/backIconB.svg" width="60rem"></a></div>
            <div class="container">
                <div class="box">
                    <div class="form">
                        <div class="form-header">    
                            <form action="" method="">
                                <h2>Cadastro</h2>
                                <div class="underline"></div>
                        </div>
                    <br>
                        <div class="input-field">
                            <div class="form-element"><label for="nome"><img src="../../img/icons/nameIcon.svg" width="40rem" height="40rem"></label></div>
                            <div class="form-element"><input class="" type="" id="nome" name="nome" placeholder="Nome completo" value="" required></div>
                        <br>
                        </div>
                        <div class="input-field">
                            <div class="form-element"><label for="email"><img src="../../img/icons/emailIcon.svg" width="40rem" height="40rem"></label></div>
                            <div class="form-element"><input class="" type="email" id="email" name="email" placeholder="E-mail" value="" required></div>
                            <br>
                        </div>
                        <div class="input-field">
                            <div class="form-element"><label for="telefone"><img src="../../img/icons/phoneIcon.svg" width="40rem" height="40rem"></label></div>
                            <div class="form-element"><input type="tel" id="telefone" name="telefone" placeholder="formato: XX XXXXX-XXXX" pattern="[0-9]{2} [0-9]{5}-[0-9]{4}" required></div>
                        <br>            
                        </div>    
                        <br>
                        <div class="input-field">
                            <div class="form-element"><label for="senha"><img src="./../img/icons/passwordIcon.svg" width="40rem" height="40rem"></label></div>
                            <div class="form-element"><input class="" type="password" id="senha" name="senha" placeholder="Senha" value="" required></div>
                            <br>
                        </div>
                        <div class="form-footer">
                            <div class="checkbox">
                                <input id="checkbox" type="checkbox">
                                <label for="checkbox">Li e concordei com os termos</label>
                            </div>
                            <br>
                            <button class="" type="submit" id="" name="" value="">entrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>