var io = require('socket.io').listen(3000);
console.log("entro a server node");
clicks = 0;
$dataReport = {};
$numeros = 0;
usuarios_logeadosT = 0;
usuarios_logeadosF = 0;
function cambiarDatos($cambio, $conectados, $mostrar) {
    if ($cambio) {
        $numeros = $conectados;
        $cambiar = $mostrar;
    }
    $columns = {
        title: {text: ""},
        credits: {
            enabled: false
        },
        chart: {
            marginTop: "35",
            height: "320",
            type: "column"
        },
        plotOptions: {
            column: {
                depth: 70
            }},
        tooltip: {
            pointFormat: "{series.name}: <b>{point.y:.2f}<\/b>"
        },
        xAxis: {
            categories: ["Conectados"]
        },
        yAxis: {
            title: {
                text: "Conectados"},
            allowDecimals: true
        },
        series:
                [
                    {
                        name: "Conectados",
                        data: [$numeros]
                    }
                ],
        cambiar: {
            mostrar: $cambiar
        }

    };
    return $columns;
}
function cambiarDatos2($cambio, $conectados, $mostrar) {
    if ($cambio) {
        $numeros = $conectados;
        $cambiar = $mostrar;
    }
    $columns = {
        title: {text: ""},
        credits: {
            enabled: false
        },
        chart: {
            marginTop: "35",
            height: "320",
            type: "column"
        },
        plotOptions: {
            column: {
                depth: 70
            }},
        tooltip: {
            pointFormat: "{series.name}: <b>{point.y:.2f}<\/b>"
        },
        xAxis: {
            categories: ["Datos Mal Ingresados"]
        },
        yAxis: {
            title: {
                text: "Datos Mal Ingresados Usuarios"},
            allowDecimals: true
        },
        series:
                [
                    {
                        name: "Datos Mal Ingresados",
                        data: [$numeros]
                    }
                ],
        cambiar: {
            mostrar: $cambiar
        }

    };
    return $columns;
}
io.sockets.on('connection', function(socket) {
    console.log("conectado alex miguel");
    //Emitimos nuestro evento connected
    //Devolvemos el ping con los milisegundos al cliente para que pueda calcular la latencia.
    socket.on('ping', function(data, callback) {
        if (callback && typeof callback == 'function') {
            callback(data);
        }
    });
    //Si llega un mensaje del chat de un usuario lo limpiamos y reenviamos a todos los demás.
    socket.on('msg', function(data) {
        $numeros++;
        $dataReport = cambiarDatos(true, $numeros, false);
        io.sockets.emit('msg', data);
    });

    socket.on('mostrarReporte', function(data, callback) {
        if (!data.cambiarDatos) {//Cuando al inicio se ejecuta el programa
            $dataReport = cambiarDatos(true, usuarios_logeadosT, false);
            $data = {numeros: usuarios_logeadosT, data: $dataReport
            };
            callback($data);
        }
        else {
            $dataReport = cambiarDatos(true, usuarios_logeadosT, true);
            $data = {numeros: usuarios_logeadosT, data: $dataReport
            };
            callback($data);
        }

    });
    socket.on('mostrarReporte2', function(data, callback) {
        if (!data.cambiarDatos) {//Cuando al inicio se ejecuta el programa
            $dataReport = cambiarDatos2(true, usuarios_logeadosF, false);
            $data = {numeros: usuarios_logeadosF, data: $dataReport
            };
            callback($data);
        }
        else {
            $dataReport = cambiarDatos2(true, usuarios_logeadosF, true);
            $data = {numeros: usuarios_logeadosF, data: $dataReport
            };
            callback($data);
        }

    });
    socket.emit('connected');
    //Permanecemos a la escucha del evento click
    socket.on('click', function(data) {
        //Sumamos el click
        console.log(data);
        clicks++;
        if (data.usuario_correcto) {
            usuarios_logeadosT++;
            $info = {usuarios_logeadosT: usuarios_logeadosT, data: $dataReport};
            $dataReport = cambiarDatos(true, $numeros, false);
            socket.broadcast.emit('usuarioCorrectoT', $info);
        } else {
            usuarios_logeadosF++;
            $info = {usuarios_logeadosF: usuarios_logeadosF, data: $dataReport};
            $dataReport = cambiarDatos2(true, $numeros, false);
//            $dataReport = cambiarDatos(true, $numeros, false);
            socket.broadcast.emit('usuarioCorrectoF', $info);
        }
        console.log("Usuarios logeados:", usuarios_logeadosT);
        console.log("Usuarios Mala Contrasenia:", usuarios_logeadosF);
//        socket.broadcast.emit('otherClick', clicks);
    });
});