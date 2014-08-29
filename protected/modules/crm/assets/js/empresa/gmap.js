$(function() {

//Direccion_coord_x
//Direccion_coord_y
//Al inicio empieza asi por defecto
//    $("#Direccion_coord_x").val(0.346024);
//    $("#Direccion_coord_y").val(-78.119574);

});

function tratamiento_clic(overlay, point) {
    alert("Hola amigo! Veo que estás ahí porque has hecho clic!");
    alert("El punto donde has hecho clic es: " + point.toString());
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
function initialize(lat, long) {
//    console.log('entroaaaaaaaaaaaaaaaaaaaa');
    var coordenaEmpresa = new google.maps.LatLng(lat, long);


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


    var map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);

    var position = coordenaEmpresa;
    var marker = new google.maps.Marker({
        position: position,
        draggable: true,
        animation: google.maps.Animation.DROP,
        map: map
    });
//accion al mover la ubicacion
    google.maps.event.addListener(marker, 'dragend', function() {
        var new_position = marker.getPosition();
        //asignacion de las coordenadas en cada elemento de dirrecion
        $("#Direccion_coord_x").val(new_position.lat());
//        console.log($("#Direccion_coord_x").val());
        $("#Direccion_coord_y").val(new_position.lng());
//        console.log($("#Direccion_coord_y").val());
    });

//    }
}

// The five markers show a secret message when clicked
// but that message is not within the marker's instance data
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
function crearVentanaInformacion(nombreEmpresa)
{

    var contentString = '<div id="content">' +
            '<div id="siteNotice">' +
            '</div>' +
            '<h1 id="firstHeading" class="firstHeading">Uluru</h1>' +
            '<div id="bodyContent">' +
            '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
            'sandstone rock formation in the southern part of the ' +
            'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) ' +
            'south west of the nearest large town, Alice Springs; 450&#160;km ' +
            '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major ' +
            'features of the Uluru - Kata Tjuta National Park. Uluru is ' +
            'sacred to the Pitjantjatjara and Yankunytjatjara, the ' +
            'Aboriginal people of the area. It has many springs, waterholes, ' +
            'rock caves and ancient paintings. Uluru is listed as a World ' +
            'Heritage Site.</p>' +
            '<p>Attribution: Uluru, <a href="http://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">' +
            'http://en.wikipedia.org/w/index.php?title=Uluru</a> ' +
            '(last visited June 22, 2009).</p>' +
            '</div>' +
            '</div>';
    var telefono = "062927324-09685415441";
    var calles = "Calle Piedrahita y Buenos Aires";
    var correo = "live@vectorlab.com";

    var infornacion = '<div class="span12">' +
            '<div class="row-fluid about-us">' +
            '<div class="span12">' +
            '<div class="info green">' +
            ' <div >' +
            '<h3 align="center"><strong>' + nombreEmpresa + '<h3></strong>' +
            '</div>' +
            ' <div id="parrafoId">' +
            ' <div class="social-links">' +
            ' <a href="#">' +
            ' <i class="icon-facebook"></i>' +
            '</a>' +
            '<a href="#">' +
            '<i class="icon-twitter"></i>' +
            '</a>' +
            '<a href="#">' +
            '<i class="icon-google-plus"></i>' +
            '</a>' +
            '<a href="#">' +
            '<i class="icon-youtube"></i>' +
            '</a>' +
            '<a href="#">' +
            '<i class="icon-pinterest"></i>' +
            '</a>' +
            '<a href="#">' +
            '<i class="icon-linkedin"></i>' +
            '</a>' +
            '</div>' +
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
    return infornacion;
}