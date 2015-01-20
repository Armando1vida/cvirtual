pais_id = $("#Direccion_pais_id");
provincia_id = $("#Direccion_provincia_id");
ciudad_id = $("#Direccion_ciudad_id");
$(function() {
    mostrarMapa();
    init();
});

function mostrarMapa() {
    $("#Direccion_coord_x").val(latitudX);
    $("#Direccion_coord_y").val(longitudY);
    initializeMap(latitudX, longitudY, 'map-canvas-agregarDireccion', ("#Direccion_coord_x"), ("#Direccion_coord_y"), true);
}
function init() {
    pais_id.select2({
        placeholder: "Seleccione una Pais",
        initSelection: function(element, callback) {
            if ($(element).val()) {
                var data = {id: element.val(), text: $(element).attr('selected-text')};
                callback(data);
            }
        },
        ajax: {// instead of writing the function to execute the request we use Select2's convenient helper
            url: baseUrl + "crm/pais/ajaxListSelect2Pais",
            type: "get",
            dataType: 'json',
            data: function(term, page) {
                return {
                    search_value: term, // search term
                };
            },
            results: function(data, page) { // parse the results into the format expected by Select2.
                // since we are using custom formatting functions we do not need to alter remote JSON data
                return {results: data};
            }
        },
        allowClear: true
    });
    provincia_id.select2({
        placeholder: "Seleccione una Provincia",
        initSelection: function(element, callback) {
            if ($(element).val()) {
                var data = {id: element.val(), text: $(element).attr('selected-text')};
                callback(data);
            }
        },
        ajax: {// instead of writing the function to execute the request we use Select2's convenient helper
            url: baseUrl + "crm/provincia/ajaxListSelect2Provincias",
            type: "get",
            dataType: 'json',
            data: function(term, page) {
                return {
                    search_value: term, // search term
                    pais_id: pais_id.val() ? pais_id.val() : 0
                };
            },
            results: function(data, page) { // parse the results into the format expected by Select2.
                // since we are using custom formatting functions we do not need to alter remote JSON data
                return {results: data};
            }
        },
        allowClear: true
    });
    ciudad_id.select2({
        placeholder: "Seleccione una Ciudad",
        initSelection: function(element, callback) {
            if ($(element).val()) {
                var data = {id: element.val(), text: $(element).attr('selected-text')};
                callback(data);
            }
        },
        ajax: {// instead of writing the function to execute the request we use Select2's convenient helper
            url: baseUrl + "crm/ciudad/ajaxListSelect2Ciudades",
            type: "get",
            dataType: 'json',
            data: function(term, page) {
                return {
                    search_value: term, // search term
                    provincia_id: provincia_id.val() ? provincia_id.val() : 0
                };
            },
            results: function(data, page) { // parse the results into the format expected by Select2.
                // since we are using custom formatting functions we do not need to alter remote JSON data
                return {results: data};
            }
        },
        allowClear: true
    });

//    zona_id.on('change', function() {
//        viewReportes("incidencia");
//        viewReportes("oportunidad");
//    });
}



function ajaxSaveDireccion($form_id) {
    ajaxValidarFormulario({
        formId: $form_id,
        beforeCall: function() {
            BloquearBotonesModal($form_id);
        },
        successCall: function(data) {
            if (data.success) {
                $("#" + $('.modal.fade.in').attr('id')).modal("hide");
                direccion_id = data.model.id;
                tipoModal = 1;
            }
        },
        errorCall: function(data) {
            DesBloquearBotonesModal($form_id, ' Crear', 'ajaxSaveDireccion');
        }
    });
}

//function actualizarDireccion(Formulario) {
//    $.ajax({
//        type: "POST",
//        url: baseUrl + 'crm/direccion/update/id/' + entidad_id_direccion,
//        dataType: 'json',
//        data: $(Formulario).serialize(),
//        success: function(data) {
//            if (data.success)
//            {
////                ActualizarInformacion("crm/entidad/ajaxCargarInformacionDireccion/id/", "#portlet_direccion");
//                $("#mainModal").modal("hide");
//            }
//            else
//            {
//                ajaxValidarFormulario(Formulario);
//                encerarErrores(Formulario);
//                $.each(data.errors, function(parametro, mensaje) {
//                    desplegarerror(parametro, mensaje, false, '#Direccion');
//                });
//            }
//        },
//        error: function(data) {
//
//
//        }
//    }
//    );
//
//}
