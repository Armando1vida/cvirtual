var entidad_tipo;
$(function() {
    //select2
    $("#Evento_entidad_id").select2({
        initSelection: function(element, callback) {
            if ($(element).val()) {
                var data = {id: element.val(), text: $(element).attr('selected-text')};
                callback(data);
            }
        },
        ajax: {// instead of writing the function to execute the request we use Select2's convenient helper
            url: baseUrl + "eventos/evento/ajaxCargarEntidades",
            type: "post",
            dataType: 'json',
            data: function(term, page) {
                return {
                    search_value: term, // search term
                    entidad_tipo: entidad_tipo
                };
            },
            results: function(data, page) { // parse the results into the format expected by Select2.
                // since we are using custom formatting functions we do not need to alter remote JSON data
                return {results: data};
            }
        }
    });
    if (!$("#Evento_entidad_id").val()) {
        $("#Evento_entidad_id").select2("enable", false);
    }
    if ($("#Evento_entidad_tipo").val()) {
        entidad_tipo = $("#Evento_entidad_tipo").val();
    }
    $("#Evento_entidad_tipo").change(function() {
        if ($(this).val()) {
            entidad_tipo = $(this).val();
            $("#Evento_entidad_id").select2("enable", true);
            $("#Evento_entidad_id").select2("val", "");
        }
        else {
            $("#Evento_entidad_id").select2("enable", false);
            $("#Evento_entidad_id").select2("val", "");
        }

    });
    /**
     * @author Alex Yépez <ayepez@tradesystem.com.ec>
     * acion para la validacion de la fecha de inicio y fin
     */
    //inicio: si se cambia la fecha de inicio se elimina la fecha de fin seleccionada
    $("#Evento_fecha_inicio").change(function() {
        $("#Evento_fecha_fin").val('');
    });
    //fin: la fecha de fin tiene que ser mayor a la fecha de inicio
    $("#Evento_fecha_fin").click(function() {
        //valida si ya fue selecionada una fecha de inicio
        if ($("#Evento_fecha_inicio").val() != '')
        {
            var fecha;
            {
                //selecciona el valor de la fecha de inicio
                fecha = $("#Evento_fecha_inicio").val().toString().split('/');
                var fechaDate = new Date(fecha[1] + '-' + fecha[0] + '-' + fecha[2]);
                //le aumenta un dia 
                fechaDate.setDate(fechaDate.getDate() + 1);
                //fecha en numeros
                dia = fechaDate.getDate();
                mes = fechaDate.getMonth() + 1;
                anio = fechaDate.getFullYear();
                //aplica setStartDate a fecha de fin
                $("#Evento_fecha_fin").datepicker('setStartDate', dia + '/' + mes + '/' + anio);
            }
        }
        else
        {
            bootbox.alert('Debe elegir una fecha de inicio');
            $(this).val('');
        }
    });



    $("#show-hora-inicio").click(function(e) {
        e.preventDefault();
        $("#hora-inicio").show();
        $(this).hide();
    });

    $("#show-fecha-fin").click(function(e) {
        e.preventDefault();
        $("#fecha-fin").show();
        $(this).hide();
    });

    $("#show-hora-fin").click(function(e) {
        e.preventDefault();
        $("#hora-fin").show();
        $(this).hide();
    });

    $("#show-map").click(function(e) {
        e.preventDefault();
        $("#map-container").show();
        initializeMap();
        $(this).hide();
        $("#hide-map").show();
    });

    $("#hide-map").click(function(e) {
        e.preventDefault();
        $("#map-container").hide();
        $(this).hide();
        $("#show-map").show();
        $("#Evento_coords_x").val('');
        $("#Evento_coords_y").val('');
    });

    if ($("#Evento_coords_x").val() && $("#Evento_coords_y").val()) {
        $("#show-map").trigger('click');
    }

});
//Verificacion fecha modal
function initializeMap() {
    var location = new google.maps.LatLng(-0.1967, -78.4890);

    $("#Evento_coords_x").val(-0.1967);
    $("#Evento_coords_y").val(-78.4890);

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
    var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

    var marker = new google.maps.Marker({
        position: location,
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP
    });

    google.maps.event.addListener(marker, 'dragend', function() {
        var new_position = marker.getPosition();

        $("#Evento_coords_x").val(new_position.lat());
        $("#Evento_coords_y").val(new_position.lng());
    });
}