<!DOCTYPE html>
<?php
    //Inclusão de arquivos
    include_once "../../controle/controleGeral.php";

    //Salvar contexto
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $data = Usuario::consultarData($id);
    }
   
    //Variáveis padrão
    $operation = isset($_GET['operation']) ? $_GET['operation'] : "";
    $table = "Usuario";
    $busca = isset($_POST["busca"]) ? $_POST["busca"] : "0";
    $pesquisa = isset($_POST["pesquisa"]) ? $_POST["pesquisa"] : "";
    $operation = isset($_GET['operation']) ? $_GET['operation'] : "";

    //Variáveis tabela
    $usuaId = isset($_POST["usuaId"]) ? $_POST["usuaId"] : "";
    $usuaNome = isset($_POST["usuaNome"]) ? $_POST["usuaNome"] : "";
    $usuaNascimento = isset($_POST["usuaNascimento"]) ? $_POST["usuaNascimento"] : "";
    $usuaEmail = isset($_POST["usuaEmail"]) ? $_POST["usuaEmail"] : "";
    $usuaTelefone = isset($_POST["usuaTelefone"]) ? $_POST["usuaTelefone"] : "";
    $usuaLogin = isset($_POST["usuaLogin"]) ? $_POST["usuaLogin"] : "";
    $usuaSenha = isset($_POST["usuaSenha"]) ? $_POST["usuaSenha"] : "";

?>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Tabela Usuário</title>
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
                <h1>Tabela Usuário</h1>
                <br>
                <form action="" method="post" style="padding-left: 5vw; padding-right: 5vw;">
                    <input class="form-check-input" type="radio" id="usuaId" name="busca" value="1" <?php if($busca == "1"){echo "checked";}?>>
                    <label for="usuaId"><h3>#ID</h3></label>
                    <br>
                    <input class="form-check-input" type="radio" id="usuaNome" name="busca" value="2" <?php if($busca == "2"){echo "checked";}?>>
                    <label for="usuaNome"><h3>Nome</h3></label>
                    <br>
                    <input class="form-check-input" type="radio" id="usuaNascimento" name="busca" value="6" <?php if($busca == "6"){echo "checked";}?>>
                    <label for="usuaNascimento"><h3>Nascimento</h3></label>
                    <br>
                    <input class="form-check-input" type="radio" id="usuaEmail" name="busca" value="3" <?php if($busca == "3"){echo "checked";}?>>
                    <label for="usuaEmail"><h3>Email</h3></label>
                    <br>
                    <input class="form-check-input" type="radio" id="usuaTelefone" name="busca" value="5" <?php if($busca == "5"){echo "checked";}?>>
                    <label for="usuaTelefone"><h3>Telefone</h3></label>
                    <br>
                    <input class="form-check-input" type="radio" id="usuaLogin" name="busca" value="4" <?php if($busca == "4"){echo "checked";}?>>
                    <label for="usuaLogin"><h3>Login</h3></label>
                    <br>
                    <input class="form-check-input" type="radio" id="usuaSenha" name="busca" value="7" <?php if($busca == "7"){echo "checked";}?>>
                    <label for="usuaSenha"><h3>Senha</h3></label>
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
                                <th scope="col">Nascimento</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Login</th>
                                <th scope="col">Senha</th>
                                <th scope="col">Alterar</th>
                                <th scope="col">Excluir</th>
                                <th scope="col">Listar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            //Filtro da tabela exibida
                            $tabela = Usuario::consultar($busca, $pesquisa);
                            foreach($tabela as $key => $value) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $value['usuaId'];?></th>
                                <td><?php echo $value['usuaNome'];?></td>
                                <td><?php echo date("d/m/Y", strtotime($value['usuaNascimento']));?></td>
                                <td><?php echo $value['usuaEmail'];?></td>
                                <td><?php echo $value['usuaTelefone'];?></td>
                                <td><?php echo $value['usuaLogin'];?></td>
                                <td><?php echo $value['usuaSenha'];?></td>
                                <td scope="row"><a href="tabelaUsuario.php?id=<?php echo $value['usuaId'];?>"><img src="../../img/edit.svg" style="width: 3vw;"></a></td>
                                <td><a onclick="return confirm('Deseja mesmo excluir?')" href="../../controle/controleGeral.php?id=<?php echo $value['usuaId'];?>&operation=delete&table=Usuario"><img src="../../img/delete.svg" style="width: 3vw;"></a></td>
                                <td><a href="../show/showUsuario.php?id=<?php echo $value['usuaId']; ?>"><img src='../../img/list.svg' style="width: 3vw;"></a></td>
                            </tr>
                        <?php
                            } 
                        ?> 
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade  <?php if(isset($id)){echo 'show active';} ?>" id="nav-form" role="tabpanel" aria-labelledby="nav-form-tab" tabindex="0">
                <form action="<?php if(isset($_GET['id'])) { echo "../../controle/controleGeral.php?id=$id&operation=update&table=Usuario";} else {echo "../../controle/controleGeral.php?operation=create&table=Usuario";} ?>" method="post" id="form" style="padding-left: 5vw; padding-right: 5vw;">
                    <br>
                    <h1>Cadastro Usuário</h1>
                    <br>
                    <div class="form-group">
                        <label for="usuaNome">Informe o nome:</label>
                        <input required type="text" class="form-control" name="usuaNome" id="usuaNome" placeholder="Digite o nome" value="<?php if(isset($data[0]['usuaNome'])){echo $data[0]['usuaNome'];}?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="usuaNascimento">Informe a data de nascimento:</label>
                        <input required type="date" class="form-control" name="usuaNascimento" id="usuaNascimento" placeholder="Digite a data de nascimento" value="<?php if(isset($data[0]['usuaNascimento'])){echo $data[0]['usuaNascimento'];}?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">Informe o email:</label>
                        <input required type="mail" class="form-control" name="usuaEmail" id="usuaEmail" placeholder="Digite o email" value="<?php if(isset($data[0]['usuaEmail'])){echo $data[0]['usuaEmail'];}?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="usuaTelefone">Informe o telefone:</label>
                        <input required type="text" class="form-control" name="usuaTelefone" id="usuaTelefone" placeholder="Digite o telefone" value="<?php if(isset($data[0]['usuaTelefone'])){echo $data[0]['usuaTelefone'];}?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="usuaLogin">Informe o login:</label>
                        <input required type="text" class="form-control" name="usuaLogin" id="usuaLogin" placeholder="Digite o login" value="<?php if(isset($data[0]['usuaLogin'])){echo $data[0]['usuaLogin'];}?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="usuaSenha">Informe a senha:</label>
                        <input required type="password" class="form-control" name="usuaSenha" id="usuaSenha" placeholder="Digite a senha" value="<?php if(isset($data[0]['usuaSenha'])){echo $data[0]['usuaSenha'];}?>">
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