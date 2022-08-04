<?php
    $operation = "";
    if(isset($_POST['operation'])){$operation = $_POST['operation'];}else if(isset($_GET['operation'])){$operation = $_GET['operation'];}
    $table = "";
    if(isset($_POST['table'])){$table = $_POST['table'];}else if(isset($_GET['table'])){$table = $_GET['table'];}

    action($operation, $table);

    function action($operation, $table){
        include_once (__DIR__."/../utils/autoload.php");
        if($operation == "create"){
            try {
                if($table == 'Usuario') {
                    //Create da tabela USUÁRIO
                    $usua = new Usuario('', $_POST['usuaNome'], $_POST['usuaNascimento'], $_POST['usuaEmail'], $_POST['usuaTelefone'], $_POST['usuaLogin'], $_POST['usuaSenha']);
                    $usua->create();
                    header("Location: ../index.php?msg=Usuário criado com sucesso!");
                } else if($table == 'Dispositivo') {
                    //Create da tabela DISPOSITIVO
                    $disp = new Dispositivo('', $_POST['dispNome'], $_POST['dispLocalizacao'], $_POST['dispDescricao'], $_POST['dispositivo_usuaId']);
                    $disp->create();
                    header("Location: ../index.php?msg=Dispositivo criado com sucesso!");
                } else if($table == 'Bateria') {
                    //Create da tabela BATERIA
                    $bate = new Bateria('', $_POST['bateEstado'], $_POST['bateDescricao'], $_POST['bateCarga'], $_POST['bateTemperatura'], $_POST['bateria_dispId']);
                    $bate->create();
                    header("Location: ../index.php?msg=Bateria criada com sucesso!");
                } else if ($table == 'Motor') {
                    //Create da tabela MOTOR
                    $moto = new Motor('', $_POST['motoEstado'], $_POST['motoDescricao'], $_POST['motoPosicaoXY'], $_POST['motoPosicaoZ'], $_POST['motor_dispId']);
                    $moto->create();
                    header("Location: ../index.php?msg=Motor criado com sucesso!");
                }
            } catch(Exception $e) {
                echo "<h1>Erro ao criar as informações.</h1><br> Erro:".$e->getMessage();
            }
        } else if($operation == "update"){
            try {
                if($table == 'Usuario') {
                    //Update da tabela USUARIO
                    $usua = new Usuario($_GET['id'], $_POST['usuaNome'], $_POST['usuaNascimento'], $_POST['usuaEmail'], $_POST['usuaTelefone'], $_POST['usuaLogin'], $_POST['usuaSenha']);
                    $usua->update();
                    header("Location: ../index.php?msg=Usuário atualizado com sucesso!");
                } else if($table == 'Dispositivo') {
                    //Update da tabela DISPOSITIVO
                    $disp = new Dispositivo($_GET['id'], $_POST['dispNome'], $_POST['dispLocalizacao'], $_POST['dispDescricao'], $_POST['dispositivo_usuaId']);
                    $disp->update();
                    header("Location: ../index.php?msg=Dispositivo atualizado com sucesso!");
                } else if($table == 'Bateria') {
                    //Update da tabela BATERIA
                    $bate = new Bateria($_GET['id'], $_POST['bateEstado'], $_POST['bateDescricao'], $_POST['bateCarga'], $_POST['bateTemperatura'], $_POST['bateria_dispId']);
                    $bate->update();
                    header("Location: ../index.php?msg=Bateria atualizada com sucesso!");
                } else if ($table == 'Motor') {
                    //Update da tabela MOTOR
                    $moto = new Motor($_GET['id'], $_POST['motoEstado'], $_POST['motoDescricao'], $_POST['motoPosicaoXY'], $_POST['motoPosicaoZ'], $_POST['motor_dispId']);
                    $moto->update();
                    header("Location: ../index.php?msg=Motor atualizado com sucesso!");
                }
            } catch(Exception $e) {
                echo "<h1>Erro ao atualizar as informações.</h1><br> Erro:".$e->getMessage();
            }
        } else if($operation == "delete"){
            try {
                if($table == 'Usuario') {
                    //Delete da tabela USUARIO
                    $usua = new Usuario($_GET['id'], '', '', '', '', '', '');
                    $usua->delete();
                    header("Location: ../index.php?msg=Usuário deletado com sucesso!");
                } else if($table == 'Dispositivo') {
                    //Delete da tabela DISPOSITIVO
                    $disp = new Dispositivo($_GET['id'], '', '', '', '');
                    $disp->delete();
                    header("Location: ../index.php?msg=Dispositivo deletado com sucesso!");
                } else if($table == 'Bateria') {
                    //Delete da tabela BATERIA
                    $bate = new Bateria($_GET['id'], '', '', '', '', '');
                    $bate->delete();
                    header("Location: ../index.php?msg=Bateria deletada com sucesso!");
                } else if ($table == 'Motor') {
                    //Delete da tabela MOTOR
                    $moto = new Motor($_GET['id'], '', '', '', '', '');
                    $moto->delete();
                    header("Location: ../index.php?msg=Motor deletado com sucesso!");
                }
            } catch(Exception $e) {
                echo "<h1>Erro ao deletar as informações.</h1><br> Erro:".$e->getMessage();
            }
        }
    }
?>