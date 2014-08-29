function saveDireccion(Formulario)
{
    BloquearBotonesModal(Formulario);
    AjaxGestionModalFormWizardDireccion(Formulario, function(list) {
        $(Formulario).trigger("reset");
        DesBloquearBotonesModal(Formulario, 'Agregar dirección', 'saveDireccion');
    });
}

function AjaxGestionModalFormWizardDireccion($form, CallBack) {
    var form = $($form);
    var settings = form.data('settings');
    settings.submitting = true;
    $.fn.yiiactiveform.validate(form, function(messages) {

        $.each(messages, function() {
//            console.log(this);
        });
        if ($.isEmptyObject(messages)) {
            $.each(settings.attributes, function() {
                $.fn.yiiactiveform.updateInput(this, messages, form);
            });
            AjaxGuardarModalFormWizardDireccion(true, $form, CallBack);
        }
        else {
            settings = form.data('settings'),
                    $.each(settings.attributes, function() {
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
            beforeSend: function(xhr) {
            },
            success: function(data) {
                if (data.success) {
                    $(Formulario).trigger("reset");
                    $('#Direccion_entidad_id').val($entidad_id);
                    bootbox.alert('Dirección registrada correctamente');
                } else {

                    DesBloquearBotonesModal(Formulario, 'Agregar dirección', 'saveDireccion');
                    bootbox.alert(data.message);
                }
            }
        });
    }

}