<?php
    session_set_cookie_params(0);
    session_start();
    if(!isset($_SESSION['usuaId']) || $_SESSION['usuaId'] == ''){
        header("Location: login.php");
    }
    include_once (__DIR__."/../../php/utils/autoload.php");
    //Salvar contexto
    $data = Usuario::consultarData($_SESSION['usuaId'])[0];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solar Giro</title>
    <link rel="icon" type="image/x-icon" href="../../img/favicon/favicon.ico">
</head>
<body>
    <nav>
        <a href="../../index.php"><button>Home</button></a>
        <header>
            <a>(S.G. Logo) Solar giro</a>
        </header>
        <a href=profile.php><button>(Perfil Icon) Nome usuário</button></a>
        <br>
    </nav>
    <section>
        <a href="../../index.php"><button>(Voltar Icon)</button></a>
    </section>
    <section>
        <form action="../../php/controle/controle-perfil.php" method="post">
            <h2>Informações de pefil</h2>
            <br>
            <svg xmlns="http://www.w3.org/2000/svg">
                <circle cx="50" cy="50" r="50" fill="grey" />
            </svg>
            <br>
            <button class="" onclick="document.getElementById('photo').click()" <?php if(!isset($_GET['update'])) {echo "hidden";}?>>Alterar foto</button>
            <input type='file' id="photo" style="display:none">
            <br>
            <label for="usuaNome">Nome completo</label>
            <input class="" type="" id="usuaNome" name="usuaNome" placeholder="" minlength="3" value="<?php echo $data['usuaNome'];?>" <?php if(!isset($_GET['update'])) {echo "disabled";}?> required>
            <br>
            <label for="usuaEmail">E-mail</label>
            <input class="" type="email" id="email" name="usuaEmail" placeholder="" value="<?php echo $data['usuaEmail'];?>" <?php if(!isset($_GET['update'])) {echo "disabled";}?> required>
            <br>
            <label for="usuaTelefone">Telefone</label>
            <input class="" type="tel" id="telefone" name="usuaTelefone" placeholder="" pattern="[0-9]{2} [0-9]{5}-[0-9]{4}" value="<?php echo $data['usuaTelefone'];?>" <?php if(!isset($_GET['update'])) {echo "disabled";}?> required>
            <br>
            <label for="usuaSenha">Senha</label>
            <input class="" type="password" id="usuaSenha" name="usuaSenha" placeholder="" minlength="8" value="<?php echo $data['usuaSenha'];?>" <?php if(!isset($_GET['update'])) {echo "disabled";}?> required>
            <br>
            <a href="<?php if(!isset($_GET['update'])) {echo "perfil.php?update=true";} else {echo "perfil.php";}?>"><button class="" type="button" id="" name="" value=""><?php if(!isset($_GET['update'])) {echo "Editar";} else {echo "Cancelar";}?></button></a>
            <br>
            <button class="" type="submit" id="" name="" value="" <?php if(!isset($_GET['update'])) {echo "hidden";}?>>Salvar</button>
            <br>
            <a href="../../php/controle/controle-login.php"><button class="" type="button" id="" name="" value="">Encerrar sessão</button></a>
        </form>
    </section>
</body>
</html>