/**
 * js para el manejo del formulario de creación
 * @author Alex Yépez <ayepez@tradesystem.com.ec>
 */


$(function() {
    /**
     * @author Alex Yépez <ayepez@tradesystem.com.ec>
     * acion para la validacion de la fecha de inicio y fin
     */
    //inicio: si se cambia la fecha de inicio se elimina la fecha de fin seleccionada
    $("#Campania_fecha_inicio").change(function() {
        $("#Campania_fecha_fin").val('');
    });
    //fin: la fecha de fin tiene que ser mayor a la fecha de inicio
    $("#Campania_fecha_fin").click(function() {
        //valida si ya fue selecionada una fecha de inicio
        if ($("#Campania_fecha_inicio").val() != '')
        {
            var fecha;
            {
                //selecciona el valor de la fecha de inicio
                fecha = $("#Campania_fecha_inicio").val().toString().split('/');
                var fechaDate = new Date(fecha[1] + '-' + fecha[0] + '-' + fecha[2]);
                //le aumenta un dia 
                fechaDate.setDate(fechaDate.getDate() + 1);
                //fecha en numeros
                dia = fechaDate.getDate();
                mes = fechaDate.getMonth() + 1;
                anio = fechaDate.getFullYear();
                //aplica setStartDate a fecha de fin
                $("#Campania_fecha_fin").datepicker('setStartDate', dia + '/' + mes + '/' + anio);
            }
        }
        else
        {
            bootbox.alert('debe elegir una fecha de inicio primero');
            $(this).val('');
        }
    });
});
function ActualizarInformacionAccion(Listas)
{
    for (var i = 0; i < Listas.length; i++)
    {
        $.fn.yiiGridView.update(Listas[i]);
    }
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
function  desplegarerror($parametro, $mensaje, $valido) {

    if ($valido) {
        $("#Campania_" + $parametro + '_em_').css('display', 'none');//para el spam
        $('#Campania_' + $parametro + '_em_').html('');
        $('#Campania_' + $parametro + '_em_').parent().parent('.control-group ').removeClass('error');
    }
    else {
        $("#Campania_" + $parametro + '_em_').css('display', '');//para el spam
        $('#Campania_' + $parametro + '_em_').html($mensaje);
        $('#Campania_' + $parametro + '_em_').parent().parent('.control-group ').addClass('error')
    }
}
/**
 * Update Campañas 
 */

function actualizarCampanias(Formulario) {
//    AjaxGestionModal(Formulario, function(list, data) {
//
//    });
    $.ajax({
        type: "POST",
        url: baseUrl + 'campanias/campania/update/id/' + entidad_id,
        dataType: 'json',
        data: $(Formulario).serialize(),
        success: function(data) {
            if (data.success)
            {
                ActualizarInformacion(data.nombreCampania);
                $("#mainModal").modal("hide");
            }
            else
            {
                encerarErrores(Formulario);

                $.each(data.errors, function(parametro, mensaje) {
                    console.log(parametro);
                    console.log(mensaje);
                    desplegarerror(parametro, mensaje, false);
                });
            }
        },
    }
    );

}
function ActualizarInformacion(nombreCampania)
{
    var listas = $('.grid-view');//otener los q sean clase grid para poder actualizar

    $.each(listas, function(index, idgrid) {
        if (idgrid.id != "notas-grid" && idgrid.id != "addUser-grid") {
            $.fn.yiiGridView.update(idgrid.id, {
                complete: function(jqXHR, status) {
                }
            });
        }
    });
    //actualizar los portlets da cada vista
    var url = baseUrl + "campanias/campania/ajaxCargarInformacionCampania/id/" + entidad_id;
    //actualizacion actividades
    AjaxUpdateElement(url, "#portlet_info", function() {

    });
    $('#nombre_cliente').html("<i  class='icon-rocket'></i> " + nombreCampania);
//    $('#calendar').fullCalendar('refetchEvents');


}