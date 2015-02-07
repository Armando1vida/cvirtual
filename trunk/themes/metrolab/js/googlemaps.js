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
function initializeMapDiv(lat, long, map_div_id, elementXid, elementYid, draggable) {
    var coordenaEmpresa = new google.maps.LatLng(lat, long);
    console.log("entro");
    var mapOptions = {
        center: coordenaEmpresa,
        zoom: 14,
        panControl: true,
        zoomControl: true,
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
//        console.log($("#Direccion_coord_x").val());
            $(elementYid).val(new_position.lng());
//        console.log($("#Direccion_coord_y").val());
        });
    }


//    }
}


var map = null;
/**
 *Inicializa un mapa de google y asigna los valores en l mapa de la informacion a mostrar 
 * @param {String} map_div_id=el nombre del div donde se va amostrar la informacion
 * @param {json} point_position
 * @returns {undefined}
 */
function initializeMultiplesPointMaps(map_div_id, point_position) {
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
    map = new google.maps.Map($(map_div_id).get(0), mapOptions);
    loadPoints(point_position);
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

