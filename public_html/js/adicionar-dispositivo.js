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
    document.getElementById("localizarDica").innerHTML = "";
    document.getElementById("container").style.height = '980px';
    mapa.innerHTML = "<iframe style='margin-bottom: 1rem;' width='400' height='400' id='gmap_canvas' src='https://maps.google.com/maps?q="+position.coords.latitude+",%20"+position.coords.longitude+"&t=&z=13&ie=UTF8&iwloc=&output=embed' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'></iframe>";
}

        $("#dispChave").mask("AAAAA-AAAAA-AAAAA"); 