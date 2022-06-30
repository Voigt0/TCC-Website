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
        <a><button>Home</button></a>
        <header>
            <a>(S.G. Logo) Solar giro</a>
        </header>
        <a href=profile.php><button>(Perfil Icon) Nome usuário</button></a>
        <br>
    </nav>
    <section>
        <a href="login.php"><button>(Voltar Icon)</button></a>
    </section>
    <section>
        <form action="" method="">
            <h2>Cadastro</h2>
            <br>
            <label for="nome">(Nome Icon)</label>
            <input class="" type="" id="nome" name="nome" placeholder="Nome completo" value="" required>
            <br>
            <label for="email">(E-mail Icon)</label>
            <input class="" type="email" id="email" name="email" placeholder="E-mail" value="" required>
            <br>
            <label for="telefone">(Telefone Icon)</label>
            <input type="tel" id="telefone" name="telefone" placeholder="formato: XX XXXXX-XXXX" pattern="[0-9]{2} [0-9]{5}-[0-9]{4}" required>
            <br>            <br>
            <label for="senha">(Senha Icon)</label>
            <input class="" type="password" id="senha" name="senha" placeholder="Senha" value="" required>
            <br>
            <button class="" type="submit" id="" name="" value="">Entrar</button>
        </form>
    </section>
</body>
</html>