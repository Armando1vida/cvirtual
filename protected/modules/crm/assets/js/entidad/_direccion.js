$(function () {
    $("#Direccion_pais_id").change(function () {
        AjaxLoadData("Direccion_pais_id", "Direccion_provincia_id", 'crm/provincia/ajaxGetProvinciaPais', {pais_id: $(this).val()});
    });
    $("#Direccion_provincia_id").change(function () {
        AjaxLoadData("Direccion_provincia_id", "Direccion_ciudad_id", 'crm/ciudad/ajaxGetCiudadesProvincia', {provincia_id: $(this).val()});
    });
});
function saveDireccion(Formulario)
{
    BloquearBotonesModal(Formulario);
    AjaxGestionModalFormWizardDireccion(Formulario, function (list) {
        $(Formulario).trigger("reset");
        DesBloquearBotonesModal(Formulario, 'Agregar dirección', 'saveDireccion');
    });
}
function AjaxGestionModalFormWizardDireccion($form, CallBack) {
    var form = $($form);
    var settings = form.data('settings');
    settings.submitting = true;
    $.fn.yiiactiveform.validate(form, function (messages) {

        $.each(messages, function () {
        });
        if ($.isEmptyObject(messages)) {
            $.each(settings.attributes, function () {
                $.fn.yiiactiveform.updateInput(this, messages, form);
            });
            AjaxGuardarModalFormWizardDireccion(true, $form, CallBack);
        }
        else {
            settings = form.data('settings'),
                    $.each(settings.attributes, function () {
                        $.fn.yiiactiveform.updateInput(this, messages, form);
                    });
            DesBloquearBotonesModal($form, 'Agregar dirección', 'saveDireccion');
        }
    });
}
function AjaxGuardarModalFormWizardDireccion(verificador, Formulario, callBack)
{
    if (verificador)
    {
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: $(Formulario).attr('action'),
            data: $(Formulario).serialize(),
            beforeSend: function (xhr) {
            },
            success: function (data) {
                if (data.success) {
                    document.location.href = baseUrl + 'crm/entidad/view/id/' + $('#Direccion_entidad_id').val();
                } else {
                    DesBloquearBotonesModal(Formulario, 'Agregar dirección', 'saveDireccion');
                    bootbox.alert(data.message);
                }
            }
        });
    }


}

function AjaxLoadData(lista, lista_actualizar, url, params)
{
    $('#s2id_' + lista_actualizar + ' a span').html('');
    AjaxGetData(baseUrl + url,
            params, function (data) {
                $("#" + lista_actualizar).html(data);
                $('#s2id_' + lista_actualizar + ' a span').html($("#" + lista_actualizar + " option[em='p']").html());
                $('span.select2-arrow').html('<b role="presentation"></b>');
                $("option[em='p']").val(null);
            });
}
function AjaxGetData(url, data, callBack)
{
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success: function (data) {
            callBack(data);
        }
    });
}
