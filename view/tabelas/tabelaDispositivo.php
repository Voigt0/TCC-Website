<!DOCTYPE html>
<?php
    //Inclusão de arquivos
    include_once "../../controle/controleGeral.php";

    //Salvar contexto
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $data = Dispositivo::consultarData($id);
    }
   
    //Variáveis padrão
    $operation = isset($_GET['operation']) ? $_GET['operation'] : "";
    $table = "Dispositivo";
    $busca = isset($_POST["busca"]) ? $_POST["busca"] : "0";
    $pesquisa = isset($_POST["pesquisa"]) ? $_POST["pesquisa"] : "";
    $operation = isset($_GET['operation']) ? $_GET['operation'] : "";

    //Variáveis tabela
    $dispId = isset($_POST["dispId"]) ? $_POST["dispId"] : "";
    $dispNome = isset($_POST["dispNome"]) ? $_POST["dispNome"] : "";
    $dispLocalizacao = isset($_POST["dispLocalizacao"]) ? $_POST["dispLocalizacao"] : "";
    $dispDescricao = isset($_POST["dispDescricao"]) ? $_POST["dispDescricao"] : "";
    $dispostivo_usuaId = isset($_POST["dispostivo_usuaId"]) ? $_POST["dispostivo_usuaId"] : "";
?>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Tabela Dispositivo</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="../../../bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="../../img/favicon.ico">
</head>
<body>
    <header>

    </header>
    <content>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link <?php if(!isset($id)){echo 'active';} ?>" id="nav-table-tab" data-bs-toggle="tab" data-bs-target="#nav-table" type="button" role="tab" aria-controls="nav-table">Tabela</button>
                <button class="nav-link <?php if(isset($id)){echo 'active';} ?>" id="nav-form-tab" data-bs-toggle="tab" data-bs-target="#nav-form" type="button" role="tab" aria-controls="nav-form">Formulário</button>
                <button class="nav-link" id="nav-class-tab" data-bs-toggle="tab" data-bs-target="#nav-class" type="button" role="tab" aria-controls="nav-class">Classe</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade <?php if(!isset($id)){echo 'show active';} ?>" id="nav-table" role="tabpanel" aria-labelledby="nav-table-tab" tabindex="0">
                <br>    
                <h1>Tabela Dispositivo</h1>
                <br>
                <form action="" method="post" style="padding-left: 5vw; padding-right: 5vw;">
                    <input class="form-check-input" type="radio" id="dispId" name="busca" value="1" <?php if($busca == "1"){echo "checked";}?>>
                    <label for="dispId"><h3>#ID</h3></label>
                    <br>
                    <input class="form-check-input" type="radio" id="dispNome" name="busca" value="2" <?php if($busca == "2"){echo "checked";}?>>
                    <label for="dispNome"><h3>Nome</h3></label>
                    <br>
                    <input class="form-check-input" type="radio" id="dispLocalizacao" name="busca" value="3" <?php if($busca == "3"){echo "checked";}?>>
                    <label for="dispLocalizacao"><h3>Localização</h3></label>
                    <br>
                    <input class="form-check-input" type="radio" id="dispDescricao" name="busca" value="4" <?php if($busca == "4"){echo "checked";}?>>
                    <label for="dispDescricao"><h3>Descrição</h3></label>
                    <br>
                    <input class="form-check-input" type="radio" id="dispostivo_usuaId" name="busca" value="5" <?php if($busca == "5"){echo "checked";}?>>
                    <label for="dispostivo_usuaId"><h3>Usuário ID</h3></label>
                    <br><br>
                    <div class="" style="padding-left: 5vw;">
                        <legend>Procurar: </legend>
                        <input type="text" style="width: 30vw;" name="pesquisa" id="pesquisa" value="<?php echo $pesquisa;?>">
                        <button type="submit" class="btn btn-dark" name="acao" id="acao">
                        <img src="../../img/search.svg" style="width: 3vh;">
                        </button>
                        <br><br>
                    </div>
                </form>
                <div class="">
                    <table id="example" class="table table-striped" style="background-color: #FFF;">
                        <thead>
                            <tr class="table-dark">
                                <th scope="col">#ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Localização</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Usuário ID</th>
                                <th scope="col">Usuário Nome</th>
                                <th scope="col">Alterar</th>
                                <th scope="col">Excluir</th>
                                <th scope="col">Listar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            //Filtro da tabela exibida
                            $tabela = Dispositivo::consultar($busca, $pesquisa);
                            foreach($tabela as $key => $value) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $value['dispId'];?></th>
                                <td><?php echo $value['dispNome'];?></td>
                                <td><?php echo $value['dispLocalizacao'];?></td>
                                <td><?php echo $value['dispDescricao'];?></td>
                                <td><?php echo $value['dispositivo_usuaId'];?></td>
                                <td><?php echo $value['usuaNome'];?></td>
                                <td scope="row"><a href="tabelaDispositivo.php?id=<?php echo $value['dispId'];?>"><img src="../../img/edit.svg" style="width: 3vw;"></a></td>
                                <td><a onclick="return confirm('Deseja mesmo excluir?')" href="../../controle/controleGeral.php?id=<?php echo $value['dispId'];?>&operation=delete&table=Dispositivo"><img src="../../img/delete.svg" style="width: 3vw;"></a></td>
                                <td><a href="../show/showDispositivo.php?id=<?php echo $value['dispId']; ?>"><img src='../../img/list.svg' style="width: 3vw;"></a></td>
                            </tr>
                        <?php
                            } 
                        ?> 
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade  <?php if(isset($id)){echo 'show active';} ?>" id="nav-form" role="tabpanel" aria-labelledby="nav-form-tab" tabindex="0">
                <form action="<?php if(isset($id)) { echo "../../controle/controleGeral.php?id=$id&operation=update&table=Dispositivo";} else {echo "../../controle/controleGeral.php?operation=create&table=Dispositivo";} ?>" method="post" id="form" style="padding-left: 5vw; padding-right: 5vw;">
                    <br>
                    <h1>Cadastro Dispositivo</h1>
                    <br>
                    <div class="form-group">
                        <label for="dispNome">Informe o nome:</label>
                        <input required type="text" class="form-control" name="dispNome" id="dispNome" placeholder="Digite o nome" value="<?php if(isset($data[0]['dispNome'])){echo $data[0]['dispNome'];}?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="dispLocalizacao">Informe a localização:</label>
                        <input required type="text" class="form-control" name="dispLocalizacao" id="dispLocalizacao" placeholder="Digite a localização" value="<?php if(isset($data[0]['dispLocalizacao'])){echo $data[0]['dispLocalizacao'];}?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="dispDescricao">Informe a descrição:</label>
                        <input required type="text" class="form-control" name="dispDescricao" id="dispDescricao" placeholder="Digite a descrição" value="<?php if(isset($data[0]['dispDescricao'])){echo $data[0]['dispDescricao'];}?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="dispostivo_usuaId">Informe o usuário:</label>
                        <select required class="form-control" name="dispositivo_usuaId" id="dispositivo_usuaId">
                            <?php
                                //Select Box
                                require_once "../../utils/utility.php";
                                echo selectBox('Usuario', array('usuaId', 'usuaNome'), $data[0]['dispositivo_usuaId']);
                            ?>
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-dark">Salvar</button>
                </form>
            </div>
            <div class="tab-pane fade" id="nav-class" role="tabpanel" aria-labelledby="nav-class-tab" tabindex="0">

            </div>
        </div>
    </content>
    <footer class="" id="">
    </footer>
</body>
</html>