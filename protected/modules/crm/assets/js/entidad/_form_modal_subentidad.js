
function agregarEntidad(Formulario) {
    $.ajax({
        type: "POST",
        url: $(Formulario).attr('action'),
        dataType: 'json',
        data: $(Formulario).serialize(),
        success: function(data) {
            if (data.success)
            {
                $.fn.yiiGridView.update("subentidad-grid");
//                ActualizarInformacion("crm/entidad/ajaxCargarInformacionEmpresa/id/", "#portlet_informacion");
                $("#mainModal").modal("hide");
                if ($("#informacion_subentidad").hasClass("hidden"))
                {
                    $("#informacion_subentidad").removeClass("hidden");
                    $("#informacion_subentidad").addClass("");
                }
                if ($("#add-subentidad").hasClass("empty-portlet")) {
                    $("#add-subentidad.empty-portlet >br").remove();
//                    $("#add-subentidad.empty-portlet").remove();
                    if ($("a#add-subentidad").hasClass("empty-portlet"))
                    {
                        $("a#add-subentidad").removeClass("empty-portlet");
                    }

                }

            }
            else
            {

                ajaxValidarFormulario(Formulario);
                encerarErrores(Formulario);
                $.each(data.errors, function(parametro, mensaje) {

                    desplegarerror(parametro, mensaje, false, '#Entidad');
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
