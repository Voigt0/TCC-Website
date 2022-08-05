<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solar Giro</title>
    <link rel="icon" type="image/x-icon" href="../../img/favicon/favicon.ico">
    <link rel="stylesheet" href="../../bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/adicionar-dispositivo.css">
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
            <div class="back"><a href="../../index.php"><img src="../../img/icons/backIconB.svg" width="60rem"></a></div>
            <div class="container">
                <div class="box">
                    <div class="form">
                        <div class="form-header">
                            <form action="../../php/controle/controle-adicionar-dispositivo.php" method="post">
                                <h2>Adicionar dispositivo</h2>
                                <div class="underline"></div>
                        </div>
                    <br>
                        <div class="input-field">
                            <div class="form-element"><label for="dispNome"><img src="../../img/icons/nameIcon.svg" width="40rem" height="40rem"></label></div>
                            <div class="form-element"><input class="" type="" id="dispNome" name="dispNome" placeholder="Nome do dispositivo" value="" required></div>
                        <br>
                        </div>
                        <div class="input-field">
                            <div class="form-element"><label for="dispLatitude"><img src="../../img/icons/localIcon.svg" width="40rem" height="40rem"></label></div>
                            <div class="form-element"><input class="" type="" id="dispLatitude" name="dispLatitude" placeholder="Latitude do dispositivo" value="" required></div>
                        <br>
                        </div>
                        <div class="input-field">
                            <div class="form-element"><label for="dispLongitude"><img src="../../img/icons/localIcon.svg" width="40rem" height="40rem"></label></div>
                            <div class="form-element"><input class="" type="" id="dispLongitude" name="dispLongitude" placeholder="Longitude do dispositivo" value="" required></div>
                        <br>
                        <button type="button" onclick="getLocation()">Localizar</button>
                        <p style="color:white">Clique no botão para obter suas coordenadas.</p>
                        <div id="mapa"></div>
                        <!-- <div class="input-field">
                            <div class="form-element"><label for="datetime"><img src="../../img/icons/datetimeIcon.svg" width="40rem" height="40rem"></label></div>
                            <div class="form-element"><input class="" type="datetime-local" id="datetime" name="datetime" placeholder="Data e hora" value="" required></div>
                        <br>
                        </div> -->
                        <div class="input-field">
                            <div class="form-element"><label for="dispDescricao"><img src="../../img/icons/descriptionIcon.svg" width="40rem" height="40rem"></label></div>
                            <div class="form-element"><input class="description" type="textarea" id="dispDescricao" name="dispDescricao" placeholder="Descrição adicional" value=""></div>
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
<script>
    var latitude = document.getElementById("dispLatitude");
    var longitude = document.getElementById("dispLongitude");
    var mapa = document.getElementById("mapa");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else { 
            latitude.value = "Geolocalização não é suportada.";
            longitude.value = "Geolocalização não é suportada.";
            mapa.innerHTML = "";
        }
    }

    function showPosition(position) {
        latitude.value = position.coords.latitude;
        longitude.value = position.coords.longitude;
        mapa.innerHTML = "<iframe width='600' height='500' id='gmap_canvas' src='https://maps.google.com/maps?q="+position.coords.latitude+",%20"+position.coords.longitude+"&t=&z=13&ie=UTF8&iwloc=&output=embed' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'></iframe>";
    }
</script>