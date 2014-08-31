
function actualizarEmpresa(Formulario) {

    $.ajax({
        type: "POST",
        url: baseUrl + 'crm/empresa/update/id/' + entidad_id,
        dataType: 'json',
        data: $(Formulario).serialize(),
        success: function(data) {
            if (data.success)
            {
                ActualizarInformacion("crm/empresa/ajaxCargarInformacionEmpresa/id/","#portlet_informacion");
                $("#mainModal").modal("hide");
            }
            else
            {

                ajaxValidarFormulario(Formulario);
                encerarErrores(Formulario);
                $.each(data.errors, function(parametro, mensaje) {

                    desplegarerror(parametro, mensaje, false, '#Empresa');
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
