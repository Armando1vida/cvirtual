function habilitarPaneles() {

    $('#dv_form').animate({
        'height': 'toggle'
    }, 200, function () {
        $('div.panel').animate({
            'height': 'toggle'
        }, 200, function () {
            $('#dv_direccion').removeClass('hidden');
        });
    });
}


function save(Formulario)
{
    BloquearBotonesModal(Formulario);
    AjaxGestionModalFormWizard(Formulario, function (list) {
        $(Formulario).trigger("reset");
        DesBloquearBotonesModal(Formulario, 'Crear', 'save');
    });
}

function AjaxGestionModalFormWizard($form, CallBack) {
    var form = $($form);
    var settings = form.data('settings');
    settings.submitting = true;
    $.fn.yiiactiveform.validate(form, function (messages) {

        $.each(messages, function () {
//            console.log(this);
        });
        if ($.isEmptyObject(messages)) {
            $.each(settings.attributes, function () {
                $.fn.yiiactiveform.updateInput(this, messages, form);
            });
            AjaxGuardarModalFormWizard(true, $form, CallBack);
        }
        else {
            settings = form.data('settings'),
                    $.each(settings.attributes, function () {
                        $.fn.yiiactiveform.updateInput(this, messages, form);
                    });
            DesBloquearBotonesModal($form, 'Crear', 'save');
        }
    });
}
function AjaxGuardarModalFormWizard(verificador, Formulario, callBack)
{
    if (verificador)
    {
        var listaActualizar = Formulario.split('-');
        listaActualizar = listaActualizar[0] + '-grid';
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: $(Formulario).attr('action'),
            data: $(Formulario).serialize(),
            beforeSend: function (xhr) {

            },
            success: function (data) {
                if (data.success) {
                    $('#Direccion_entidad_id').val(data.id);
                    $('#end_button').attr('href', $('#end_button').attr('href') + '/' + data.id);
                    habilitarPaneles();
                    $('#Direccion_coord_x').val(cord_x);
                    $('#Direccion_coord_y').val(cord_y);
                    setTimeout(function () {
                        initialize(cord_x, cord_y, "map-canvas");
                    }, 1000);
                } else {

                    DesBloquearBotonesModal(Formulario, 'Crear', 'save');

                    bootbox.alert(data.message);
                }
            }
        });
    }

}
