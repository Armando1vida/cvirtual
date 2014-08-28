$(function() {
    var latitudX = (0.346024);
    var longitudY = -78.119574;
//    initializeMap(latitudX, longitudY);
    initialize(latitudX, longitudY);




    $('#metasContainer').highcharts({
        chart: {
            type: 'gauge',
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false,
            height: 240,
        },
        credits: {
            enabled: false
        },
        title: {
            text: ''
        },
        pane: {
            startAngle: -150,
            endAngle: 150,
            background: [{
                    backgroundColor: {
                        linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                        stops: [
                            [0, '#FFF'],
                            [1, '#333']
                        ]
                    },
                    borderWidth: 0,
                    outerRadius: '109%'
                }, {
                    backgroundColor: {
                        linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                        stops: [
                            [0, '#333'],
                            [1, '#FFF']
                        ]
                    },
                    borderWidth: 1,
                    outerRadius: '107%'
                }, {
                    // default background
                }, {
                    backgroundColor: '#DDD',
                    borderWidth: 0,
                    outerRadius: '105%',
                    innerRadius: '103%'
                }]
        },
        // the value axis
        yAxis: {
            min: 0,
            max: 100,
            minorTickInterval: 'auto',
            minorTickWidth: 1,
            minorTickLength: 10,
            minorTickPosition: 'inside',
            minorTickColor: '#666',
            tickPixelInterval: 30,
            tickWidth: 2,
            tickPosition: 'inside',
            tickLength: 10,
            tickColor: '#666',
            labels: {
                step: 2,
                rotation: 'auto'
            },
            title: {
                text: '% Meta'
            },
            plotBands: [{
                    from: 40,
                    to: 100,
                    color: '#55BF3B' // green
                }, {
                    from: 20,
                    to: 40,
                    color: '#DDDF0D' // yellow
                }, {
                    from: 0,
                    to: 20,
                    color: '#DF5353' // red
                }]
        },
        series: [{
                name: 'Completado ',
                data: [60],
                tooltip: {
                    valueSuffix: ' %'
                }
            }]

    });



    /**********CONTACTOS*********/

    Highcharts.data({
        csv: document.getElementById('datos').innerHTML,
        itemDelimiter: '\t',
        parsed: function(columns) {

            var brands = {},
                    brandsData = [],
                    versions = {},
                    drilldownSeries = [];

            // Parse percentage strings
            columns[1] = $.map(columns[1], function(value) {
                if (value.indexOf('%') === value.length - 1) {
                    value = parseFloat(value);
                }
                return value;
            });

            $.each(columns[0], function(i, name) {
                var brand,
                        version;

                if (i > 0) {

                    // Remove special edition notes
                    name = name.split(' -')[0];

                    // Split into brand and version
                    version = name.match(/([0-9]+[\.0-9x]*)/);
                    if (version) {
                        version = version[0];
                    }
                    //console.log(version);
                    brand = name.replace(version, '');
                    // Create the main data
                    if (!brands[brand]) {
                        brands[brand] = columns[1][i];
                    } else {
                        brands[brand] += columns[1][i];
                    }

                    // Create the version data
                    if (version !== null) {
                        if (!versions[brand]) {
                            versions[brand] = [];
                        }
                        versions[brand].push(['v' + version, columns[1][i]]);
                    }
                }

            });

            $.each(brands, function(name, y) {
                brandsData.push({
                    name: name,
                    y: y,
                    drilldown: versions[name] ? name : null
                });
            });
            var agencia = [["VIP", 26.61], ["VALOR", 16.96], ["POTENCIAL", 6.40], ["LATENTE", 3.55], ["RESERVA", 10.19]];
            var correo = [["VIP", 8.01], ["VALOR", 7.73], ["POTENCIAL", 1.13], ["LATENTE", 0.45], ["RESERVA", 0.26]];
            var telefonica = [["VIP", 6.72], ["VALOR", 4.72], ["POTENCIAL", 2.16], ["LATENTE", 1.87], ["RESERVA", 0.91]];
            var personal = [["VIP", 3.53], ["VALOR", 0.85], ["POTENCIAL", 0.14], ["LATENTE", 0.12], ["RESERVA", 0.15]];

            var varialble = {
                0: agencia,
                1: correo,
                2: telefonica,
                3: personal

            };

            var cont = 0;
            $.each(versions, function(key)
            {

                drilldownSeries.push({
                    name: key,
                    id: key,
                    data: varialble[cont++]
                });
            });

            // Create the chart
            $('#containerIndexContactos').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: ''
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: '% Clientes'
                    }
                },
                legend: {
                    enabled: false
                },
                credits: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.1f}%'
                        }
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                },
                series: [{
                        name: 'Contactos',
                        colorByPoint: true,
                        data: brandsData
                    }],
                drilldown: {
                    series: drilldownSeries
                }
            })

            // console.log(drilldownSeries);

        }

    });


    /************TIEMPOS**************/

    Highcharts.data({
        csv: document.getElementById('tsv').innerHTML,
        itemDelimiter: '\t',
        parsed: function(columns) {

            var brands = {},
                    brandsData = [],
                    versions = {},
                    drilldownSeries = [];

            // Parse percentage strings
            columns[1] = $.map(columns[1], function(value) {
                if (value.indexOf('%') === value.length - 1) {
                    value = parseFloat(value);
                }
                return value;
            });

            $.each(columns[0], function(i, name) {
                var brand,
                        version;

                if (i > 0) {

                    // Remove special edition notes
                    name = name.split(' -')[0];

                    // Split into brand and version
                    version = name.match(/([0-9]+[\.0-9x]*)/);
                    if (version) {
                        version = version[0];
                    }
                    brand = name.replace(version, '');

                    // Create the main data
                    if (!brands[brand]) {
                        brands[brand] = columns[1][i];
                    } else {
                        brands[brand] += columns[1][i];
                    }

                    // Create the version data
                    if (version !== null) {
                        if (!versions[brand]) {
                            versions[brand] = [];
                        }
                        versions[brand].push(['v' + version, columns[1][i]]);
                    }
                }

            });
            // console.log(brands);
            var agencia = [["VIP", 26.61], ["VALOR", 16.96], ["POTENCIAL", 6.40], ["LATENTE", 3.55], ["RESERVA", 10.19]];
            var correo = [["VIP", 8.01], ["VALOR", 7.73], ["POTENCIAL", 1.13], ["LATENTE", 0.45], ["RESERVA", 0.26]];
            var telefonica = [["VIP", 6.72], ["VALOR", 4.72], ["POTENCIAL", 2.16], ["LATENTE", 1.87], ["RESERVA", 0.91]];
            var personal = [["VIP", 3.53], ["VALOR", 0.85], ["POTENCIAL", 0.14], ["LATENTE", 0.12], ["RESERVA", 0.15]];
            var anual = [["VIP", 3.53], ["VALOR", 0.85], ["POTENCIAL", 0.14], ["LATENTE", 0.12], ["RESERVA", 0.15]];

            var varialble = {
                0: agencia,
                1: correo,
                2: telefonica,
                3: personal,
                4: anual

            };
            $.each(brands, function(name, y) {
                brandsData.push({
                    name: name,
                    y: y,
                    drilldown: versions[name] ? name : null
                });
            });


            var cont = 0;
            $.each(versions, function(key)
            {

                drilldownSeries.push({
                    name: key,
                    id: key,
                    data: varialble[cont++]
                });
            });

            // Create the chart
            $('#tiemposContainer').highcharts({
                chart: {
                    type: 'pie'
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: ''
                },
                credits: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        dataLabels: {
                            enabled: true,
                            format: '{point.name}: {point.y:.1f}%'
                        }
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                },
                series: [{
                        name: 'Tiempos',
                        colorByPoint: true,
                        data: brandsData

                    }],
                drilldown: {
                    series: drilldownSeries
                }
            })
            console.log(drilldownSeries);
            console.log(brandsData);
        }
    });

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

    var Suiton_Sushi_Bar = new google.maps.LatLng(0.355133, -78.118672);
    var Mercado_Santo_Domingo = new google.maps.LatLng(0.355272, -78.120174);
    var PasajeC = new google.maps.LatLng(0.341432, -78.132684);
    var Equinorte_Comhidrobo = new google.maps.LatLng(0.347081, -78.130549);
    var Seminuevos_Imbauto = new google.maps.LatLng(0.346837, -78.131256);
    var Supermaxi = new google.maps.LatLng(0.346091, -78.135708);
    var Cooperativa_de_Ahorro_y_Credito_Mujeres_Unidas = new google.maps.LatLng(0.353256, -78.116486);
    var Mercado_Mayorista = new google.maps.LatLng(0.361120, -78.121561);

    var locationArray = [Suiton_Sushi_Bar, Mercado_Santo_Domingo, PasajeC, Equinorte_Comhidrobo, Seminuevos_Imbauto, Supermaxi, Cooperativa_de_Ahorro_y_Credito_Mujeres_Unidas, Mercado_Mayorista];
    var locationNameArray = ['Suiton Sushi Bar', 'Mercado Santo Domingo', 'Pasaje C', 'Equinorte Comercial hidrobo', 'Seminuevos Imbauto', 'Supermaxi', 'Cooperativa de Ahorro y Credito Mujeres Unidas', 'Mercado_Mayorista'];

    var location = new google.maps.LatLng(lat, long);

    var mapOptions = {
        center: location,
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



    for (var i = 0; i < locationArray.length; i++) {

        var position = locationArray[i];
        var marker = new google.maps.Marker({
            position: position,
            map: map
        });
        var nombreEmpresa = locationNameArray[i];
        marker.setTitle("Local :" + (i + 1).toString());
        attachMensajeWindows(marker, nombreEmpresa);
    }
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

  var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
      '<div id="bodyContent">'+
      '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
      'sandstone rock formation in the southern part of the '+
      'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
      'south west of the nearest large town, Alice Springs; 450&#160;km '+
      '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
      'features of the Uluru - Kata Tjuta National Park. Uluru is '+
      'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
      'Aboriginal people of the area. It has many springs, waterholes, '+
      'rock caves and ancient paintings. Uluru is listed as a World '+
      'Heritage Site.</p>'+
      '<p>Attribution: Uluru, <a href="http://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
      'http://en.wikipedia.org/w/index.php?title=Uluru</a> '+
      '(last visited June 22, 2009).</p>'+
      '</div>'+
      '</div>';
      var telefono="062927324-09685415441";
      var calles="Calle Piedrahita y Buenos Aires";
      var correo="live@vectorlab.com";

      var infornacion='<div class="span12">'+
    '<div class="row-fluid about-us">'+
      
        '<div class="span12">'+
            '<div class="info green">'+
             ' <div >'+
         '<h3 align="center"><strong>'+nombreEmpresa+'<h3></strong>'+
              '</div>'+
                  ' <div id="parrafoId">'+
            
                    ' <div class="social-links">'+
                   ' <a href="#">'+
                       ' <i class="icon-facebook"></i>'+
                    '</a>'+
                    '<a href="#">'+
                        '<i class="icon-twitter"></i>'+
                    '</a>'+
                    '<a href="#">'+
                        '<i class="icon-google-plus"></i>'+
                    '</a>'+
                    '<a href="#">'+
                        '<i class="icon-youtube"></i>'+
                    '</a>'+
                    '<a href="#">'+
                        '<i class="icon-pinterest"></i>'+
                    '</a>'+
                    '<a href="#">'+
                        '<i class="icon-linkedin"></i>'+
                    '</a>'+

                '</div>'+
                ' <div id="informacionId">'+
                ' <div class="social-links">'+
                 '<strong>Email :</strong>'+correo +'<br>'+
                                                    ' <strong>Direccion :</strong>'+calles +'<br>'+
                                                     '<strong>Telefonos :</strong>'+telefono+'<br>'+
                        '</div>'+                            
                     '</div>'+
            '</div>'+

       ' </div>'+
       ' <div class="space10"></div>'+

       ' <p>'+
            'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Donec ut volutpat metus. Aliquam tortor lorem, fringilla tempor dignissim at, pretium et arcu. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.'+
        '</p>'+
    '</div>'+
'</div>';
      return infornacion;
}






