<?php
    session_set_cookie_params(0);
    session_start();
    if(!isset($_SESSION['usuaId']) || $_SESSION['usuaId'] == ''){
        header("Location: view/usuario/login.php");
    }
    include_once (__DIR__ ."/../../php/utils/autoload.php");
    if(isset($_GET['dispId'])) {
        Dispositivo::validar($_GET['dispId'], $_SESSION['usuaId']);
    };
    $busca = isset($_POST["busca"]) ? $_POST["busca"] : "0";
    $pesquisa = isset($_POST["pesquisa"]) ? $_POST["pesquisa"] : "";
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
        <a href="../usuario/perfil.php"><button>(Perfil) Nome usuário</button></a>
        <br>
    </nav>
    <section>
        <a href="../../index.php"><button>(Voltar Icon)</button></a>
    </section>
    <section>
        <form action="" method="">
            <h2>Controle de dispositivo</h2>
            <br>
            <input class="" type="radio" id="dispId" name="busca" value="0" <?php if($busca == "0"){echo "checked";}?>>
            <label for="dispId">N°</label>
            <br>
            <input class="" type="radio" id="dispNome" name="busca" value="1" <?php if($busca == "1"){echo "checked";}?>>
            <label for="dispNome">Nome</label>
            <br><br>
            <div class="">
                <input type="text" name="pesquisa" id="pesquisa" placeholder="pesquisar" value="<?php echo $pesquisa;?>">
                <button type="submit" name="" id=""><img src="../../img/search.svg"></button>
                <br><br>
            </div>
        </form>
        <div <?php if(!isset($_SESSION['dispId']) || $_SESSION['dispId'] == '') {echo "hidden";}?>>
            <?php
                $data = Dispositivo::consultarData($_SESSION['dispId'])[0];
            ?>
            <h3>N°(Id): <?php echo $data['dispId']; ?></h3>
            <h3>(Nome) <?php echo $data['dispNome']; ?></h3>
            <h4>Localização: <?php echo $data['dispLatitude'].", ".$data['dispLongitude']; ?></h4>
            <h4>Descrição: <?php echo $data['dispDescricao']; ?></h4>
            <a href="menu-dispositivo.php"><button class="" type="button" id="" name="" value="">(Ver mais)</button></a>
        </div>
        <br>
        <table id="">
            <thead>
                <tr class="">
                    <th>N°</th>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>
            <?php
                //Filtro da tabela exibida
                $tabela = Dispositivo::consultarUsuario($_SESSION['usuaId'], $busca, $pesquisa);
                foreach($tabela as $key => $value) {
            ?>
                <tr>
                    <th><?php echo $value['dispId'];?></th>
                    <td><a href="controle-de-dispositivos.php?dispId=<?php echo $value['dispId'];?>"><?php echo $value['dispNome'];?></a></td>
                </tr>
            <?php
                } 
            ?> 
            </tbody>
            <?php
                echo $_SESSION['dispId'];
            ?>
        </table>
    </section>
</body>
</html>