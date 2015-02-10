window.client = io.connect("http://192.168.0.103:3000");
function loadScript() {
    var url = "http://192.168.0.103/arduino_led/highcharts/js/highcharts.js";
    $.getScript(url);
    //BOOTSTRAP 3
//    arduino_led\bootstrap-3.3.2\dist\js
    var url = "http://192.168.0.103/arduino_led/bootstrap/js/bootstrap.min.js";
    $.getScript(url);
    var url = "http://192.168.0.103/arduino_led/bootstrapcss/bootstrap-theme.min.css";
    var cssLink = $("<link rel='stylesheet' type='text/css' href='" + url + "'>");
    $("head").append(cssLink);

    var url = "http://192.168.0.103/arduino_led/bootstrap/css/bootstrap.min.css";
    var cssLink = $("<link rel='stylesheet' type='text/css' href='" + url + "'>");
    $("head").append(cssLink);
}

var socket = io.connect('http://192.168.0.103:3000');
$(function() {
    loadScript();
    initComponents();
});
function mensaje(msj) {
    alert(msj);
}
function initComponents() {
    socket.on('connected', function() {
        console.log('Conectado al servidor!');
        info = {cambiarDatos: false};
        socket.emit('mostrarReporte', info, function(data) {
            viewHighchart("usersColumn", data);
        });
        socket.emit('mostrarReporte2', info, function(data) {
            viewHighchart("usersErrorsColumn", data);
        });
    });
    $('#btnIngresar').on('click', function() {
        if (verificarUsuario()) {
            mensaje("Usuario Correcto");
            data = {usuario_correcto: true};
            socket.emit("click", data, function(data) {
                console.log(data);
            });
            //ViaAjax
            $url = "/?LED=T";
            enviarDatosServidor($url);
            //SUBMIT PAGINA
//            $("#logon-form").attr("action", "?LED=T");
//            $("#logon-form").submit();
        }
        else {
            mensaje("Usuario incorrecto.");
            data = {usuario_correcto: false};
            socket.emit("click", data, function(data) {
                console.log(data);
            });
            //AJAX
            $url = "/?LED=F";
            enviarDatosServidor($url);
//            //SUBMIT PAGINA
//            $("#logon-form").attr("action", "?LED=F");
//            $("#logon-form").submit();
        }

    });
    socket.on('usuarioCorrectoF', function(data) {

        info = {cambiarDatos: true};
        socket.emit('mostrarReporte2', info, function(data) {
            viewHighchart("usersErrorsColumn", data);

        });
        $('#usuariosLogeadosF').replaceWith("<span id=usuariosLogeadosF> " + data.usuarios_logeadosF + " Personas Ingresaron mal sus datos.</span> ");
    });
    socket.on('usuarioCorrectoT', function(data) {
        info = {cambiarDatos: true};
        socket.emit('mostrarReporte', info, function(data) {
            viewHighchart("usersColumn", data);

        });
        $('#usuariosLogeadosT').replaceWith("<span id=usuariosLogeadosT> " + data.usuarios_logeadosT + " Personas Logeadas</span>");
    });
    socket.on('disconnect', function() {
        console.log('Desconectado!');
        toggle();
    });
}

function verificarUsuario()
{
    paso_correcto = $("#CrugeLogon_username").val() == "llema" && $("#CrugeLogon_password").val() == "123456" ? true : false;
    if (paso_correcto) {
        return paso_correcto;
    }
    return paso_correcto;
}
function enviarDatosServidor() {
    $.ajax({
        type: 'GET',
        url: $url,
        success: function(data) {
        }
    });
}
//0996643586
function viewHighchart($div_contenedor_id, data) {
    $div_nombreId = "#" + $div_contenedor_id;

    if (data.data.cambiar.mostrar) {//SOLO SI UBO CAMBISO MODIFICAR
        if (data.data.numeros == 1) {//A LA primera ves de enviar datos
            $usersColums = $($div_nombreId).highcharts();
            if ($usersColums != undefined) {
                viewDivsContenedoresCharts($div_nombreId, true);
                $usersColums.series[0].setData([data.numeros]);
            }
            else {
                $($div_nombreId).highcharts(data.data);
                viewDivsContenedoresCharts($div_nombreId, true);
            }

        }
        else {//siguieron llegando
            console.log("mostrar true");
            $usersColums = $($div_nombreId).highcharts();
            if ($usersColums != undefined) {
                viewDivsContenedoresCharts($div_nombreId, true);
                $usersColums.series[0].setData([data.numeros]);
            }
            else {
                $($div_nombreId).highcharts(data.data);
                viewDivsContenedoresCharts($div_nombreId, true);
            }

        }

    }
    else {//sin ningun cambio
        if (data.data.series[0].data[0] == 0) {
            $($div_nombreId).highcharts(data.data);
            console.log("nada");
            viewDivsContenedoresCharts($div_nombreId, false);
        }
        else {
            $($div_nombreId).highcharts(data.data);
            viewDivsContenedoresCharts($div_nombreId, true);
        }
    }
}
function viewDivsContenedoresCharts($id_div, $mostrar) {
    if ($mostrar) {//Mostrar los divs contenedores y ocultar el div de vacio
        if ($($id_div).hasClass("hidden")) {
            $($id_div).removeClass("hidden");
        }
        if (!$($id_div + "Empty").hasClass("hidden")) {
            $($id_div + "Empty").addClass("hidden");
        }

    }
    else {
        if (!$($id_div).hasClass("hidden")) {
            $($id_div).addClass("hidden");
        }
        if ($($id_div + "Empty").hasClass("hidden")) {
            $($id_div + "Empty").removeClass("hidden");
        }
    }

}