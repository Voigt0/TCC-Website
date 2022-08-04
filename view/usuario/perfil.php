<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solar Giro</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon/favicon.ico">
</head>
<body>
    <nav>
        <a href="../index.php"><button>Home</button></a>
        <header>
            <a>(S.G. Logo) Solar giro</a>
        </header>
        <a href=profile.php><button>(Perfil Icon) Nome usuário</button></a>
        <br>
    </nav>
    <section>
        <a href="../index.php"><button>(Voltar Icon)</button></a>
    </section>
    <section>
        <form action="" method="">
            <h2>Informações de pefil</h2>
            <br>
            <svg xmlns="http://www.w3.org/2000/svg">
                <circle cx="50" cy="50" r="50" fill="grey" />
            </svg>
            <br>
            <button class="" onclick="document.getElementById('photo').click()">Alterar foto</button>
            <input type='file' id="photo" style="display:none">
            <br>
            <label for="name">Nome completo</label>
            <input class="" type="" id="name" name="name" placeholder="" value="" required>
            <br>
            <label for="email">E-mail</label>
            <input class="" type="email" id="email" name="email" placeholder="" value="" required>
            <br>
            <label for="telefone">Telefonetab</label>
            <input class="" type="tel" id="telefone" name="telefone" placeholder="" value="" required>
            <br>
            <label for="password">Senha</label>
            <input class="" type="password" id="password" name="password" placeholder="" value="" required>
            <br>
            <button class="" type="submit" id="" name="" value="">Editar</button>
            <br>
            <button class="" type="submit" id="" name="" value="">Salvar</button>
            <br>
            <a href="../../php/controle/controle-login.php"><button class="" type="button" id="" name="" value="">Encerrar sessão</button></a>
        </form>
    </section>
</body>
</html>