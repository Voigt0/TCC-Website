<!DOCTYPE html>
<?php
    //Inclusão de arquivos
    include_once "../../controle/controleGeral.php";

    //Salvar contexto
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $data = Motor::consultarData($id);
    }
   
    //Variáveis padrão
    $operation = isset($_GET['operation']) ? $_GET['operation'] : "";
    $table = "Motor";
    $busca = isset($_POST["busca"]) ? $_POST["busca"] : "0";
    $pesquisa = isset($_POST["pesquisa"]) ? $_POST["pesquisa"] : "";
    $operation = isset($_GET['operation']) ? $_GET['operation'] : "";

    //Variáveis tabela
    $motoId = isset($_POST["motoId"]) ? $_POST["motoId"] : "";
    $motoEstado = isset($_POST["motoEstado"]) ? $_POST["motoEstado"] : "";
    $motoDescricao = isset($_POST["motoDescricao"]) ? $_POST["motoDescricao"] : "";
    $motoPosicaoXY = isset($_POST["motoPosicaoXY"]) ? $_POST["motoPosicaoXY"] : "";
    $motoPosicaoZ = isset($_POST["motoPosicaoZ"]) ? $_POST["motoPosicaoZ"] : "";
    $motor_dispId = isset($_POST["motor_dispId"]) ? $_POST["motor_dispId"] : "";
?>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Tabela Motor</title>
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
                <h1>Tabela Motor</h1>
                <br>
                <form action="" method="post" style="padding-left: 5vw; padding-right: 5vw;">
                    <input class="form-check-input" type="radio" id="motoId" name="busca" value="1" <?php if($busca == "1"){echo "checked";}?>>
                    <label for="motoId"><h3>#ID</h3></label>
                    <br>
                    <input class="form-check-input" type="radio" id="motoEstado" name="busca" value="2" <?php if($busca == "2"){echo "checked";}?>>
                    <label for="motoEstado"><h3>Estado</h3></label>
                    <br>
                    <input class="form-check-input" type="radio" id="motoDescricao" name="busca" value="3" <?php if($busca == "3"){echo "checked";}?>>
                    <label for="motoDescricao"><h3>Descrição</h3></label>
                    <br>
                    <input class="form-check-input" type="radio" id="motoPosicaoXY" name="busca" value="4" <?php if($busca == "4"){echo "checked";}?>>
                    <label for="motoPosicaoXY"><h3>Posição XY</h3></label>
                    <br>
                    <input class="form-check-input" type="radio" id="motoPosicaoZ" name="busca" value="5" <?php if($busca == "5"){echo "checked";}?>>
                    <label for="motoPosicaoZ"><h3>Posição Z</h3></label>
                    <br>
                    <input class="form-check-input" type="radio" id="motor_dispId" name="busca" value="6" <?php if($busca == "6"){echo "checked";}?>>
                    <label for="motor_dispId"><h3>Dispositivo ID</h3></label>
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
                                <th scope="col">Estado</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Posição XY</th>
                                <th scope="col">Posição Z</th>
                                <th scope="col">Dispositivo ID</th>
                                <th scope="col">Dispositivo Nome</th>
                                <th scope="col">Alterar</th>
                                <th scope="col">Excluir</th>
                                <th scope="col">Listar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            //Filtro da tabela exibida
                            $tabela = Motor::consultar($busca, $pesquisa);
                            foreach($tabela as $key => $value) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $value['motoId'];?></th>
                                <td><?php echo $value['motoEstado'];?></td>
                                <td><?php echo $value['motoDescricao'];?></td>
                                <td><?php echo $value['motoPosicaoXY'];?></td>
                                <td><?php echo $value['motoPosicaoZ'];?></td>
                                <td><?php echo $value['motor_dispId'];?></td>
                                <td><?php echo $value['dispNome'];?></td>
                                <td scope="row"><a href="tabelaMotor.php?id=<?php echo $value['motoId'];?>"><img src="../../img/edit.svg" style="width: 3vw;"></a></td>
                                <td><a onclick="return confirm('Deseja mesmo excluir?')" href="../../controle/controleGeral.php?id=<?php echo $value['motoId'];?>&operation=delete&table=Motor"><img src="../../img/delete.svg" style="width: 3vw;"></a></td>
                                <td><a href="../show/showMotor.php?id=<?php echo $value['motoId']; ?>"><img src='../../img/list.svg' style="width: 3vw;"></a></td>
                            </tr>
                        <?php
                            } 
                        ?> 
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade  <?php if(isset($id)){echo 'show active';} ?>" id="nav-form" role="tabpanel" aria-labelledby="nav-form-tab" tabindex="0">
                <form action="<?php if(isset($id)) { echo "../../controle/controleGeral.php?id=$id&operation=update&table=Motor";} else {echo "../../controle/controleGeral.php?operation=create&table=Motor";} ?>" method="post" id="form" style="padding-left: 5vw; padding-right: 5vw;">
                    <br>
                    <h1>Cadastro Motor</h1>
                    <br>
                    <div class="form-group">
                        <h3>Informe o estado:</h3>
                        <input required class="form-check-input" type="radio" id="motoEstadoLigado" name="motoEstado" value="1" <?php if(isset($data[0]['motoEstado']) && $data[0]['motoEstado'] == 1){echo "checked";}?>>
                        <label for="motoEstado"><h5>Ligado </h5></label>
                        <input required class="form-check-input" type="radio" id="motoEstadoDesligado" name="motoEstado" value="0" <?php if(isset($data[0]['motoEstado']) && $data[0]['motoEstado'] == 0){echo "checked";}?>>
                        <label for="motoEstado"><h5>Desligado</h5></label>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="motoDescricao">Informe a descrição:</label>
                        <input required type="text" class="form-control" name="motoDescricao" id="motoDescricao" placeholder="Digite a descrição" value="<?php if(isset($data[0]['motoDescricao'])){echo $data[0]['motoDescricao'];}?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="motoPosicaoXY">Informe a posição XY:</label>
                        <input required type="number" class="form-control" name="motoPosicaoXY" id="motoPosicaoXY" placeholder="Digite a posição XY" value="<?php if(isset($data[0]['motoPosicaoXY'])){echo $data[0]['motoPosicaoXY'];}?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="motoPosicaoZ">Informe a posição Z:</label>
                        <input required type="number" class="form-control" name="motoPosicaoZ" id="motoPosicaoZ" placeholder="Digite a posição Z" value="<?php if(isset($data[0]['motoPosicaoZ'])){echo $data[0]['motoPosicaoZ'];}?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="motoPosicaoZ">Informe o usuário:</label>
                        <select required class="form-control" name="motor_dispId" id="motor_dispId">
                            <?php
                                //Select Box
                                require_once "../../utils/utility.php";
                                echo selectBox('Dispositivo', array('dispId', 'dispNome'), $data[0]['motor_dispId']);
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