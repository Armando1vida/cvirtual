
//// The five markers show a secret message when clicked
//// but that message is not within the marker's instance data
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
    console.log(empresa);
    var telefono = empresa.celular;
    var calles = empresa.calle_principal + " y " + empresa.calle_secundaria;
    var correo = empresa.email;

    var informacion = '<div class="span12">' +
            '<div class="row-fluid about-us">' +
            '<div class="span12">' +
            '<div class="info green">' +
            ' <div >' +
            '<h3 align="center"><strong>' + empresa.nombre + '<h3></strong>' +
            '</div>' +
            ' <div id="parrafoId">' +
            ' <div id="informacionId">' +
            ' <div class="social-links">' +
            '<strong>Email :</strong>' + correo + '<br>' +
            ' <strong>Direccion :</strong>' + calles + '<br>' +
            '<strong>Telefonos :</strong>' + telefono + '<br>' +
            '</div>' +
            '</div>' +
            '</div>' +
            ' </div>' +
            ' <div class="space10"></div>' +
            ' <p>' +
            'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Donec ut volutpat metus. Aliquam tortor lorem, fringilla tempor dignissim at, pretium et arcu. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.' +
            '</p>' +
            '</div>' +
            '</div>';
    return informacion;
}

//
//
var map = null;
function initialize() {
    var mapOptions = {
        center: new google.maps.LatLng(0.346024, -78.119574),
        zoom: 14,
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
        attachMensajeWindows(marker, point);
    }
}

function loadScript() {
    var url = "http://maps.googleapis.com/maps/api/js?sensor=TRUE&callback=initialize";
    $.getScript(url);
}
$(function() {
    loadScript();
  
//load();
});

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



