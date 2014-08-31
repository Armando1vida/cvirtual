//$(function() {
//    var latitudX = (0.346024);
//    var longitudY = -78.119574;
////    initializeMap(latitudX, longitudY);
//    initialize(latitudX, longitudY);
//
//
//});
//
////function tratamiento_clic(overlay, point) {
////    alert("Hola amigo! Veo que estás ahí porque has hecho clic!");
////    alert("El punto donde has hecho clic es: " + point.toString());
////}
//
//
////function MercatorProjection() {
////    this.pixelOrigin_ = new google.maps.Point(TILE_SIZE / 2,
////            TILE_SIZE / 2);
////    this.pixelsPerLonDegree_ = TILE_SIZE / 360;
////    this.pixelsPerLonRadian_ = TILE_SIZE / (2 * Math.PI);
////}
//function clickMarker(marker, contenido) {
//    google.maps.event.addListener(marker, 'click', function() {
//        infowindow.setContent(contenido);
//        infowindow.open(map, marker);
//    });
//}
//
//function createInfoWindowContent(map, posicionLugar) {
//
//    var numTiles = 1 << map.getZoom();
//    var projection = new MercatorProjection();
//    var worldCoordinate = projection.fromLatLngToPoint(posicionLugar);
//    var pixelCoordinate = new google.maps.Point(
//            worldCoordinate.x * numTiles,
//            worldCoordinate.y * numTiles);
//    var tileCoordinate = new google.maps.Point(
//            Math.floor(pixelCoordinate.x / TILE_SIZE),
//            Math.floor(pixelCoordinate.y / TILE_SIZE));
//    return [
//        'Chicago, IL',
//        'LatLng: ' + chicago.lat() + ' , ' + chicago.lng(),
//        'World Coordinate: ' + worldCoordinate.x + ' , ' +
//                worldCoordinate.y,
//        'Pixel Coordinate: ' + Math.floor(pixelCoordinate.x) + ' , ' +
//                Math.floor(pixelCoordinate.y),
//        'Tile Coordinate: ' + tileCoordinate.x + ' , ' +
//                tileCoordinate.y + ' at Zoom Level: ' + map.getZoom()
//    ].join('<br>');
//}
//function initialize() {
////    var Suiton_Sushi_Bar = new google.maps.LatLng(0.355133, -78.118672);
////    var Mercado_Santo_Domingo = new google.maps.LatLng(0.355272, -78.120174);
////    var PasajeC = new google.maps.LatLng(0.341432, -78.132684);
////    var Equinorte_Comhidrobo = new google.maps.LatLng(0.347081, -78.130549);
////    var Seminuevos_Imbauto = new google.maps.LatLng(0.346837, -78.131256);
////    var Supermaxi = new google.maps.LatLng(0.346091, -78.135708);
////    var Cooperativa_de_Ahorro_y_Credito_Mujeres_Unidas = new google.maps.LatLng(0.353256, -78.116486);
////    var Mercado_Mayorista = new google.maps.LatLng(0.361120, -78.121561);
////
////    var locationArray = [Suiton_Sushi_Bar, Mercado_Santo_Domingo, PasajeC, Equinorte_Comhidrobo, Seminuevos_Imbauto, Supermaxi, Cooperativa_de_Ahorro_y_Credito_Mujeres_Unidas, Mercado_Mayorista];
////    var locationNameArray = ['Suiton Sushi Bar', 'Mercado Santo Domingo', 'Pasaje C', 'Equinorte Comercial hidrobo', 'Seminuevos Imbauto', 'Supermaxi', 'Cooperativa de Ahorro y Credito Mujeres Unidas', 'Mercado_Mayorista']; //
//    var location = new google.maps.LatLng(0.346024, -78.119574);
//
//    var mapOptions = {
//        center: location,
//        zoom: 14,
//        panControl: true,
//        zoomControl: true,
//        mapTypeControl: false,
//        scaleControl: false,
//        streetViewControl: false,
//        overviewMapControl: false
//    };
//
//    var map = new google.maps.Map(document.getElementById('map-canvas'),
//            mapOptions);
//
//
////
////    for (var i = 0; i < locationArray.length; i++) {
////
////        var position = locationArray[i];
////        var marker = new google.maps.Marker({
////            position: position,
////            map: map
////        });
////        var nombreEmpresa = locationNameArray[i];
////        marker.setTitle("Local :" + (i + 1).toString());
////        attachMensajeWindows(marker, nombreEmpresa);
////    }
//}
//
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
});




