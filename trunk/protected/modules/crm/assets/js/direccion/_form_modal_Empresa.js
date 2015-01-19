$(function() {

});
function initComponents() {
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