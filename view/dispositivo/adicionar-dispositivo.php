<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solar Giro</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon/favicon.ico">
    <link rel="stylesheet" href="../../bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/addDevice.css">
</head>
<body>
    <header>
        <nav class="navbar" style="background-color: #171606;">        
            <div class="container-fluid">
                <div class="nav-element"><a href=""><img src="../../img/icons/homeIcon.svg" width="30rem" height="40rem"></a></div>
                <header>    
                   <div class="nav-element"><a><img src="../../img/icons/solargirologoIconW.svg" style="width: 30vh;"></a></div>
                </header>
                <div class="nav-element"><a href=""><img src="../../img/icons/userIcon.svg" width="40rem"></a></div>
            </div>
        </nav>
    </header>

    <section>
        <div class="container-fluid">
            <div class="back"><a href="../index.php"><img src="../../img/icons/backIconB.svg" width="60rem"></a></div>
            <div class="container">
                <div class="box">
                    <div class="form">
                        <div class="form-header">
                            <form action="" method="">
                                <h2>Adicionar dispositivo</h2>
                                <div class="underline"></div>
                        </div>
                    <br>
                        <div class="input-field">
                            <div class="form-element"><label for="name"><img src="../../img/icons/nameIcon.svg" width="40rem" height="40rem"></label></div>
                            <div class="form-element"><input class="" type="" id="name" name="name" placeholder="Nome do dispositivo" value="" required></div>
                        <br>
                        </div>
                        <div class="input-field">
                            <div class="form-element"><label for="local"><img src="../../img/icons/localIcon.svg" width="40rem" height="40rem"></label></div>
                            <div class="form-element"><input class="" type="" id="local" name="local" placeholder="Localização do dispositivo" value="" required></div>
                        <br>
                        </div>
                        <div class="input-field">
                            <div class="form-element"><label for="datetime"><img src="../../img/icons/datetimeIcon.svg" width="40rem" height="40rem"></label></div>
                            <div class="form-element"><input class="" type="datetime-local" id="datetime" name="datetime" placeholder="Data e hora" value="" required></div>
                        <br>
                        </div>
                        <div class="input-field">
                            <div class="form-element"><label for="description"><img src="../../img/icons/descriptionIcon.svg" width="40rem" height="40rem"></label></div>
                            <div class="form-element"><input class="description" type="textarea" id="description" name="description" placeholder="Descrição adicional" value=""></div>
                        <br>
                        </div>
                        <div class="form-footer">
                            <button class="" type="submit" id="" name="" value="">Salvar</button>
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