var $entidad_id;
var url_direccion = "crm/direccion/ajaxGetInformacioModelo";
var url_direccionUpdate = "/cvirtual/crm/direccion/update";
var url_direccionCreate = "/cvirtual/crm/direccion/create";
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
                    getInfoEmpresa($entidad_id, url_direccion);

                    $('#end_button').attr('href', $('#end_button').attr('href') + '/' + data.id);
                    habilitarPaneles();
                    setTimeout(function() {
                        var latitudX = (0.346024);
                        var longitudY = -78.119574;
                        initialize(latitudX, longitudY, "map-canvas");
                    }, 1000);
                } else {

                    DesBloquearBotonesModal(Formulario, 'Crear', 'save');

                    bootbox.alert(data.message);
                }
            }
        });
    }

}
function getInfoEmpresa(empresa_id, urlObtenerInfo) {

    AjaxObtenerInformacion(baseUrl + urlObtenerInfo,
            {empresa_id: empresa_id}, function(data) {
        if (data.existe) {//solo si existe informacion se asignaria los valores a los reespectivos valores n l formulario Direccionf
            console.log(data.datos);
            $('#Direccion_calle_principal').val(data.datos.calle_principal);
            $('#Direccion_calle_secundaria').val(data.datos.calle_secundaria);
            $('#Direccion_numero').val(data.datos.numero);
            $('#Direccion_pais_id').val(data.datos.pais_id);
            $('#Direccion_provincia_id').val(data.datos.provincia_id);
            $('#Direccion_ciudad_id').val(data.datos.ciudad_id);
            $('#Direccion_coord_x').val(data.datos.coord_x);
            $('#Direccion_coord_y').val(data.datos.coord_y);
            $('#Direccion_tipo_entidad').val(data.datos.tipo_entidad);
            $('#Direccion_referencia').val(data.datos.referencia);
            $('#direccion-form').attr('action', url_direccionUpdate + "/id/" + data.datos.id);
//            Direccion_referencia
        }
        //Informacion de Direccion para este modelo no hay 
        else
        {

            $('#direccion-form').attr('action', url_direccionCreate);

        }

    });
}

function AjaxObtenerInformacion(url, data, callBack)
{
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        data: data,
        success: function(data) {
            callBack(data);
        }
    });
}
