$(function() {
    mostrarMapa();
});

function mostrarMapa() {
    ("#Direccion_coord_x").val(latitudX);
    ("#Direccion_coord_y").val(longitudY);
    initializeMap(latitudX, longitudY, 'map-canvas-agregarDireccion', ("#Direccion_coord_x"), ("#Direccion_coord_y"), true);
}
function init() {
    $("#Producto_categoria_id").select2({
        placeholder: "Seleccione una Sección",
        initSelection: function(element, callback) {
            if ($(element).val()) {
                var data = {id: element.val(), text: $(element).attr('selected-text')};
                callback(data);
            }
        },
        ajax: {// instead of writing the function to execute the request we use Select2's convenient helper
            url: baseUrl + "productos/productoCategoria/ajaxlistCategorias",
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
    $("#Producto_categoria_id").on('change', function() {
        viewReportes("oportunidad");
        viewReportes("incidencia");
    });
    $("#Producto_subcategoria_id").select2({
        placeholder: "Seleccione una División",
        initSelection: function(element, callback) {
            if ($(element).val()) {
                var data = {id: element.val(), text: $(element).attr('selected-text')};
                callback(data);
            }
        },
        ajax: {// instead of writing the function to execute the request we use Select2's convenient helper
            url: baseUrl + "productos/productoSubCategoria/ajaxlistSubcategorias",
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
//        multiple: true,
    });
    $("#Producto_subcategoria_id").on('change', function() {
        viewReportes("oportunidad");
    });
    $("#Producto_oportunidad_etapa_ids").select2({
        placeholder: "Seleccione una Etapa",
        initSelection: function(element, callback) {

            if ($(element).val()) {
                if (data) {
                    callback(data);
                }
            }
        },
        ajax: {// instead of writing the function to execute the request we use Select2's convenient helper
            url: baseUrl + "oportunidades/oportunidadEtapa/ajaxlistOportunidadEtapa",
            type: "get",
            dataType: 'json',
            data: function(term, page) {
                return {
                    fechas: dataFecha ? dataFecha : null,
                    search_value: term,
                };
            },
            results: function(data, page) { // parse the results into the format expected by Select2.
                // since we are using custom formatting functions we do not need to alter remote JSON data

                datos = {results: data};
                return datos;
            }
        },
        multiple: true,
        allowClear: true
    });
    $("#Producto_oportunidad_etapa_ids").on('change', function() {
        viewReportes('oportunidad');
    });
    $("#Producto_incidenciaMotivoId").select2({
        placeholder: "Seleccione una Sección",
        initSelection: function(element, callback) {

            if ($(element).val()) {
                var data = {id: element.val(), text: $(element).attr('selected-text')};
                callback(data);
            }

        },
        ajax: {// instead of writing the function to execute the request we use Select2's convenient helper
            url: baseUrl + "incidencias/incidenciaMotivo/ajaxlistIncidenciaMotivo",
            type: "get",
            dataType: 'json',
            data: function(term, page) {
                return {
                    search_value: term, // search term
                    fechas: dataFecha ? dataFecha : null,
                };
            },
            results: function(data, page) { // parse the results into the format expected by Select2.
                // since we are using custom formatting functions we do not need to alter remote JSON data

                datos = {results: data};
                return datos;
            }
        },
        allowClear: true
    });
    $("#Producto_incidenciaMotivoId").on('change', function() {
        select2vacio('s2id_Producto_incidenciaSubmotivoId');
        viewReportes('incidencia');
    });
    $("#Producto_incidenciaSubmotivoId").select2({
        placeholder: "Seleccione un Motivo",
        initSelection: function(element, callback) {

            if ($(element).val()) {
                if (dataIncidencia) {
                    callback(dataIncidencia);
                }
            }

        },
        ajax: {// instead of writing the function to execute the request we use Select2's convenient helper
            url: baseUrl + "incidencias/incidenciaSubmotivo/ajaxlistIncidenciaSubMotivo",
            type: "get",
            dataType: 'json',
            data: function(term, page) {
                return {
                    search_value: term,
                    fechas: dataFecha ? dataFecha : null,
                    incidencia_motivo_id: ($("#Producto_incidenciaMotivoId").val() !== "") ? $("#Producto_incidenciaMotivoId").val() : null, // search term
                };
            },
            results: function(data, page) { // parse the results into the format expected by Select2.
                datos = {results: data};
                return datos;
            }
        },
        allowClear: true,
        multiple: true
    });
    $("#Producto_incidenciaSubmotivoId").on('change', function() {
        viewReportes('incidencia');
    });
    //input de zona
    zona_id = $('#Producto_zonas');
    zona_id.select2({
        multiple: true,
        placeholder: "Seleccione una Zona",
        ajax: {// instead of writing the function to execute the request we use Select2's convenient helper
            url: baseUrl + "crm/zona/ajaxlistZonasProducto",
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
        }
    });
    zona_id.on('change', function() {
        viewReportes("incidencia");
        viewReportes("oportunidad");
    });
}



function ajaxSaveDireccion($form_id) {
    ajaxValidarFormulario({
        formId: $form_id,
        beforeCall: function() {
            BloquearBotonesModal($form_id);
        },
        successCall: function(data) {
            if (data.success) {
                alert("ss");
            }
        },
        errorCall: function(data) {
            DesBloquearBotonesModal($form_id, ' Crear', 'ajaxSaveDireccion');
        }
    });
}

function actualizarDireccion(Formulario) {
    $.ajax({
        type: "POST",
        url: baseUrl + 'crm/direccion/update/id/' + entidad_id_direccion,
        dataType: 'json',
        data: $(Formulario).serialize(),
        success: function(data) {
            if (data.success)
            {
//                ActualizarInformacion("crm/entidad/ajaxCargarInformacionDireccion/id/", "#portlet_direccion");
                $("#mainModal").modal("hide");
            }
            else
            {
                ajaxValidarFormulario(Formulario);
                encerarErrores(Formulario);
                $.each(data.errors, function(parametro, mensaje) {
                    desplegarerror(parametro, mensaje, false, '#Direccion');
                });
            }
        },
        error: function(data) {


        }
    }
    );

}
function encerarErrores(Formulario) {
    $inputs = ($(Formulario + ' input '));
    $selects = ($(Formulario + ' select '));
    $inputs.each(function(element, valor) {
        if ($(valor).parent().has('label')) {
            divControlGroup = $(valor).parent().parent().parent('.control-group');
            divControlGroup.removeClass('success');
            divControlGroup.removeClass('error');
            $(Formulario + ' span.help-inline').html('');
        }
        divControlGroup = $(valor).parent().parent('.control-group');
        divControlGroup.removeClass('success');
        divControlGroup.removeClass('error');
        $(Formulario + ' span.help-inline').html('');
    });
    $selects.each(function(element, valor) {
        divControlGroup = $(valor).parent().parent('.control-group');
        divControlGroup.removeClass('success');
        divControlGroup.removeClass('error');
        $(Formulario + ' span.help-inline').html('');
    });

}
function  desplegarerror($parametro, $mensaje, $valido, $formulario) {

    if ($valido) {
        $($formulario + "_" + $parametro + '_em_').css('display', 'none');//para el spam
        $($formulario + "_" + $parametro + '_em_').html('');
        $($formulario + "_" + $parametro + '_em_').parent().parent('.control-group ').removeClass('error');
    }
    else {

        $($formulario + "_" + $parametro + '_em_').css('display', '');//para el spam
        $($formulario + "_" + $parametro + '_em_').html($mensaje);
        $($formulario + "_" + $parametro + '_em_').parent().parent('.control-group ').addClass('error')
    }
}

function actualizarContactoCampania(Formulario) {
    ajaxValidarFormulario({
        formId: Formulario,
        successCall: function(data) {

            /**
             * @author Miguel Alba <malba@tradesystem.com.ec>
             * @type String
             * Agrega la informacion actualizada enviando el id del contacto y el id de la campania
             */
            var url = "campanias/campaniaActualizacion/ajaxCreateActualizacion";
            $.ajax({
                type: "POST",
                url: baseUrl + url,
                dataType: 'json',
                data: {CampaniaActualizacion: {contacto_id: contacto_id, campania_id: entidad_id}},
                success: function(data) {
                    if (data.success)
                    {
                        $.fn.yiiGridView.update("cuenta-grid");
                    }


                }
            }
            );
            $("#mainModal").modal("hide");
            bootbox.alert('Datos guardados con exito!');

        }

    });

}