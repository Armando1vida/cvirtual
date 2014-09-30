function loadScript() {
    var url = "http://maps.googleapis.com/maps/api/js?sensor=TRUE&callback=initialize";
    $.getScript(url);
}
$(function() {
    loadScript();

//load();
});
function attachMensajeWindows(marker, empresa) {

    var mensaje = crearVentanaInformacion(empresa);
    var infowindow = new google.maps.InfoWindow({
        content: mensaje,
        maxWidth: 500

    });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(marker.get('map'), marker);

    });
}
function crearVentanaInformacion(empresa)
{
    var telefono = empresa.celular ? empresa.celular : "Sin Informacion.";
    var nombre = empresa.nombre;
    var calle_secundaria = empresa.calle_secundaria ? empresa.calle_secundaria : " ";
    var calles = empresa.calle_principal + calle_secundaria;
    var correo = empresa.email ? empresa.email : "Sin Informacion.";
    var info = "Informacion";

    var informacion =
            '<div class="profile-side-box green">' +
            '<h1 align="center"><strong>' + empresa.nombre + '</strong></h1>' +
            '<div class="desk">' +
            '<h5 align="center"><strong>' + info + '</strong><h5>' +
            '<h6>' +
            '<strong>Email :</strong>' + correo + '<br>' +
            ' <strong>Direccion :</strong>' + calles + '<br>' +
            '<strong>Telefonos :</strong>' + telefono + '<br>' +
            '</h6>' +
            ' <div class="space10"></div>' +
            '</div>'   //div desk
    '</div>'   //div about us
            ;
    return informacion;
}


//
//
var map = null;
function initialize() {
    console.log(empresas.coord_x);
    var mapOptions = {
        center: new google.maps.LatLng(empresas[0].coord_x, empresas[0].coord_y),
        zoom: 16,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        panControl: true,
        zoomControl: true,
        mapTypeControl: false,
        scaleControl: false,
        streetViewControl: false,
        overviewMapControl: false
    };
    map = new google.maps.Map($("#map-canvas").get(0), mapOptions);
    loadPoints(empresas);
}

function loadPoints(json) {
    for (var i = 0; i < json.length; i++) {
        var point = json[i];
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(point.coord_x, point.coord_y),
            map: map,
            title: point.nombre
        });
    }
}



//var map;
//var gdir;
//var geocoder = null;
//var addressMarker;
//function load() {
////    if (GBrowserIsCompatible()) {
//        map = new GMap(document.getElementById("google_map"));
//        map.setMapType(G_HYBRID_MAP);
//        // Centramos el mapa en las coordenadas con zoom 15  
//        map.setCenter(new GLatLng(40.396764, -3.713379), 15);
//        // Creamos el punto.  
//        var point = new GLatLng(40.396764, -3.713379);
//        // Pintamos el punto  
//        map.addOverlay(new GMarker(point));
//        // Controles que se van a ver en el mapa  
//        map.addControl(new GLargeMapControl());
//        var mapControl = new GMapTypeControl();
//        map.addControl(mapControl);
//        // Asociamos el div 'direcciones' a las direcciones que devolveremos a Google  
//        gdir = new GDirections(map, document.getElementById("direcciones"));
//        // Para recoger los errores si los hubiera  
//        GEvent.addListener(gdir, "error", handleErrors);
////    }
//}
//// Esta función calcula la ruta con el API de Google Maps  
//function setDirections(Address) {
//    gdir.load("from: " + Address + " to: @40.396764, -3.713379",
//            {"locale": "es"});
//    //Con la opción locale:es hace que la ruta la escriba en castellano.  
//}
//// Se han producido errores  
//function handleErrors() {
//    if (gdir.getStatus().code == G_GEO_UNKNOWN_ADDRESS)
//        alert("Direccion desconocida");
//    else if (gdir.getStatus().code == G_GEO_SERVER_ERROR)
//        alert("Error de Servidor");
//    else if (gdir.getStatus().code == G_GEO_MISSING_QUERY)
//        alert("Falta la direccion inicial");
//    else if (gdir.getStatus().code == G_GEO_BAD_KEY)
//        alert("Clave de Google Maps incorrecta");
//    else if (gdir.getStatus().code == G_GEO_BAD_REQUEST)
//        alert("No se ha encontrado la direccion de llegada");
//    else
//        alert("Error desconocido");
//}
//function onGDirectionsLoad() {
//}



