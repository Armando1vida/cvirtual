var $entidad_id;
function habilitarPaneles() {
//    $('#dv_form').addClass('hidden');
//    $('#dv_direccion').removeClass('hidden');
//    
    $('#dv_form').animate({
        'height': 'toggle'
    }, 200, function() {
        $('div.panel').animate({
            'height': 'toggle'
        }, 200, function() {
            $('#dv_direccion').removeClass('hidden');
        });
    });
}

/**
 * @param {type} Formulario
 * guarda los _form_modal por ajax para contacto, tarea, oportunidad, evento y cobranza
 */
function save(Formulario)
{
    BloquearBotonesModal(Formulario);
    AjaxGestionModalFormWizard(Formulario, function(list) {
        $(Formulario).trigger("reset");
        DesBloquearBotonesModal(Formulario, 'Crear', 'save');
    });
}

function AjaxGestionModalFormWizard($form, CallBack) {
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
            AjaxGuardarModalFormWizard(true, $form, CallBack);
        }
        else {
            settings = form.data('settings'),
                    $.each(settings.attributes, function() {
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
            beforeSend: function(xhr) {
            },
            success: function(data) {
                if (data.success) {
                    $('#Direccion_entidad_id').val(data.id);
                    $entidad_id = data.id;
                    $('#end_button').attr('href', $('#end_button').attr('href') + '/' + data.id);
                    habilitarPaneles();
                    setTimeout(function() {
                        var latitudX = (0.346024);
                        var longitudY = -78.119574;
                        initialize(latitudX, longitudY,"map-canvas");
                    }, 1000);
                } else {

                    DesBloquearBotonesModal(Formulario, 'Crear', 'save');

                    bootbox.alert(data.message);
                }
            }
        });
    }

}