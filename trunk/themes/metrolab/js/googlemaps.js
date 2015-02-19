/**
 * Funcion q muestra en un div un mapa del api}
 * 
 * @param double {type} lat latitud dond se encuentra
 * @param double {type} long longitud a mostrar
 * @param string {type} map_div_id dond mostrar el mapa
 * @param string {type} elementXid asignar informacion de lat
 * @param string  elementYid asignar informacion longi
 * @param  boolean draggable cuando se mueva l puntor del googlemap 
 * @returns {undefined}
 */
var latitudX = (0.346024);
var longitudY = (-78.119574);
var scrollwheel = false;
function initializeMapDiv(lat, long, map_div_id, elementXid, elementYid, draggable, scrollwheel) {
    var coordenaEmpresa = new google.maps.LatLng(lat, long);
    var mapOptions = {
        center: coordenaEmpresa,
        zoom: 14,
        panControl: true,
        scrollwheel: scrollwheel,
        mapTypeControl: false,
        scaleControl: false,
        streetViewControl: false,
        overviewMapControl: false
    };
    var map = new google.maps.Map(document.getElementById(map_div_id),
            mapOptions);
    var position = coordenaEmpresa;
    var marker = new google.maps.Marker({
        position: position,
        draggable: draggable,
        animation: google.maps.Animation.DROP,
        map: map
    });
//accion al mover la ubicacion
    if (draggable) {
        google.maps.event.addListener(marker, 'dragend', function() {
            var new_position = marker.getPosition();
            //asignacion de las coordenadas en cada elemento de dirrecion
            $(elementXid).val(new_position.lat());
            $(elementYid).val(new_position.lng());
        });
    }


//    }
}
var marker;

var map = null;
/**
 *Inicializa un mapa de google y asigna los valores en l mapa de la informacion a mostrar 
 * @param {String} map_div_id=el nombre del div donde se va amostrar la informacion
 * @param {json} point_position
 * @returns {undefined}
 */

function initializeMultiplesPointMaps(map_div_id, point_position, scrollwheel) {
    var mapOptions = {
        center: new google.maps.LatLng(0.346024, -78.119574),
        zoom: 14,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        panControl: true,
        scrollwheel: scrollwheel,
        zoomControl: true,
        mapTypeControl: false,
        scaleControl: false,
        streetViewControl: false,
        overviewMapControl: false
    };
    map = new google.maps.Map($(map_div_id).get(0), mapOptions);
    //Siempre pondra al centro del div 
    google.maps.event.addDomListener(window, "resize", function() {
        var center = map.getCenter();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center);
    });
//    google.maps.event.addListener(map, 'center_changed', function() {
//        // 3 seconds after the center of the map has changed, pan back to the
//        // marker.
//        console.log("center");
//        window.setTimeout(function() {
//            map.panTo(marker.getPosition());
//        }, 3000);
//    });

    loadPoints(point_position);
}

function loadPoints(json) {
//       var iconoMarca = new GIcon(G_DEFAULT_ICON);
//      iconoMarca.image = "/images/bandera-roja.png"; 
//      var tamanoIcono = new GSize(17,17);
//      iconoMarca.iconSize = tamanoIcono;
//      iconoMarca.shadow = "/images/sombra-bandera2.png"; 
//      var tamanoSombra = new GSize(22,18);
//      iconoMarca.shadowSize = tamanoSombra;
//      iconoMarca.iconAnchor = new GPoint(11, 16);


    var image = {
        url: 'images/papagallo.png',
        // This marker is 20 pixels wide by 32 pixels tall.
        size: new google.maps.Size(50, 50),
        // The origin for this image is 0,0.
        origin: new google.maps.Point(0, 0),
        // The anchor for this image is the base of the flagpole at 0,32.
        anchor: new google.maps.Point(0, 32)
    };
    // Shapes define the clickable region of the icon.
    // The type defines an HTML &lt;area&gt; element 'poly' which
    // traces out a polygon as a series of X,Y points. The final
    // coordinate closes the poly by connecting to the first
    // coordinate.
    var shape = {
        coords: [1, 1, 1, 20, 18, 20, 18, 1],
        type: 'poly'
    };
    var mc = null;
    var markers = [];
    for (var i = 0; i < json.length; i++) {
        var point = json[i];
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(point.coord_x, point.coord_y),
            map: map,
            title: point.nombre,
            icon: image,
//            shape: shape,
        });
        markers.push(marker);
        attachMensajeWindows(marker, point);
//        mc = new MarkerClusterer(map, markers);
    }
}
// The five markers show a secret message when clicked
// but that message is not within the marker's instance data.
function attachSecretMessage(marker, number) {
    var message = ["This", "is", "the", "secret", "message"];
    var infowindow = new google.maps.InfoWindow(
            {content: message[number],
                size: new google.maps.Size(50, 50)
            });
    google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map, marker);
    });
}
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
    var nombre = empresa.empresa;
    var calle_secundaria = empresa.calle_secundaria ? empresa.calle_secundaria : " ";
    var calles = empresa.calle_principal + calle_secundaria;
    var correo = empresa.email ? empresa.email : "Sin Informacion.";
    var info = "Informacion";
    var informacion =
            '<div class="profile-side-box green">' +
            '<h1 align="center"><strong>' + nombre + '</strong></h1>' +
            '<div class="desk">' +
            '<h5 align="center"><strong>' + info + '</strong><h5>' +
            '<h6>' +
            '<strong>Email :</strong>' + correo + '<br>' +
            ' <strong>Direccion :</strong>' + calles + '<br>' +
            '<strong>Telefonos :</strong>' + telefono + '<br>' +
            '</h6>' +
            ' <div class="space10"></div>' +
            '<a onclick="js:getInformacionDetallada(' + empresa.id + ')" class="btn btn-info" id="view-empresa"><i class="icon-eye-open"></i> Informacion Detallada</a>'
    '</div>'   //div desk
    '</div>'   //div about us
            ;
    return informacion;
}


function MercatorProjection() {
    this.pixelOrigin_ = new google.maps.Point(TILE_SIZE / 2,
            TILE_SIZE / 2);
    this.pixelsPerLonDegree_ = TILE_SIZE / 360;
    this.pixelsPerLonRadian_ = TILE_SIZE / (2 * Math.PI);
}
function clickMarker(marker, contenido) {
    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(contenido);
        infowindow.open(map, marker);
    });
}

function createInfoWindowContent(map, posicionLugar) {

    var numTiles = 1 << map.getZoom();
    var projection = new MercatorProjection();
    var worldCoordinate = projection.fromLatLngToPoint(posicionLugar);
    var pixelCoordinate = new google.maps.Point(
            worldCoordinate.x * numTiles,
            worldCoordinate.y * numTiles);
    var tileCoordinate = new google.maps.Point(
            Math.floor(pixelCoordinate.x / TILE_SIZE),
            Math.floor(pixelCoordinate.y / TILE_SIZE));
    return [
        'Chicago, IL',
        'LatLng: ' + chicago.lat() + ' , ' + chicago.lng(),
        'World Coordinate: ' + worldCoordinate.x + ' , ' +
                worldCoordinate.y,
        'Pixel Coordinate: ' + Math.floor(pixelCoordinate.x) + ' , ' +
                Math.floor(pixelCoordinate.y),
        'Tile Coordinate: ' + tileCoordinate.x + ' , ' +
                tileCoordinate.y + ' at Zoom Level: ' + map.getZoom()
    ].join('<br>');
}

