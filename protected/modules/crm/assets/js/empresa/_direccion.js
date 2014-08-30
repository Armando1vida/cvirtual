var urlProvincias = "crm/provincia/ajaxGetProvinciaPais";
var urlCiudades = "crm/ciudad/ajaxGetCiudadesProvincia";
$(function() {
    //Direccion_pais_id
//Direccion_provincia_id
//Direccion_ciudad_id
    $("#Direccion_pais_id").change(function() {

        pais_id = $("#Direccion_pais_id").val();
        arrayLatLong = getPaisesCoordenadas(pais_id);
        inicializarMapa(arrayLatLong[0], arrayLatLong[1]);
        actualizarDrop(pais_id, urlProvincias, "Direccion_provincia_id");
    });
    //CIUDADES DE DICHA PROVINCIA
    $("#Direccion_provincia_id").change(function() {
//        actualizarDrop();
        provincia_id = $("#Direccion_provincia_id").val();
        actualizarDrop(provincia_id, urlCiudades, "Direccion_ciudad_id");
        arrayLatLong = getPaisesCoordenadas(pais_id);
        inicializarMapa(arrayLatLong[0], arrayLatLong[1]);
    });
   //al hacer clic solo inicializar l mapa para mostrar la ciudad y asi pueda escoger la info
    $("#Direccion_ciudad_id").change(function() {
//        actualizarDrop();
        ciudad_id = $("#Direccion_provincia_id").val();
        arrayLatLong = getPaisesCoordenadas(ciudad_id);
        inicializarMapa(arrayLatLong[0], arrayLatLong[1]);
    });



});
/**
 * @Miguel Alba dadyalex777@hotmail.com
 Descripcion Metodo: Ingresara el id pais y asi mostrar sus coordenadas 
 Utilizacion Metodo :En esta vista del portelt direccion
 * @param {type} id_provincia
 * @returns {coordenadas latitud y longitud} 
 */
function getPaisesCoordenadas(id_pais) {

//-2.0345307,-79.0707253, Ecuador
    var arrayLatLong = new Array("-2.0345307", "-79.0707253");

    return arrayLatLong;
}
/**
 * @Miguel Alba dadyalex777@hotmail.com
 Descripcion Metodo: Ingresara el id provincia y asi mostrar sus coordenadas 
 Utilizacion Metodo :En esta vista del portelt direccion
 * @param {type} id_provincia
 * @returns {undefined}
 */
function getProvinciasCoordenadas(id_provincia) {
//0.4911771,-78.529198 Imbabura
//Cuando tengamos las coordenadas dlas provincias retornaremos asi
    var arrayLatLong = new Array("0.4911771", "-78.529198");

    return arrayLatLong;
}
function getCiudadesCoordenadas(id_ciudad) {

//0.3465822,-78.1169987 Ibarra
//Cuando tengamos las coordenadas dlas ciudades retornaremos asi
    var arrayLatLong = new Array("0.3465822", "-78.1169987");

    return arrayLatLong;
}

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
/*
 *  COMBOS DEPENDIENTES 
 */

//Drop listos
//Direccion_pais_id
//Direccion_provincia_id
//Direccion_ciudad_id

function actualizarDrop(idDrop, urlObtenerInfo, dropActualizar)
{
    $('#s2id_' + dropActualizar + ' a span').html('');
    if (idDrop > 0)
    {
        AjaxCargarListas(baseUrl + urlObtenerInfo,
                {idDrop: idDrop}, function(data) {
            $("#" + dropActualizar).html(data);
            $('#s2id_' + dropActualizar + ' a span').html($("#" + dropActualizar + " option[id='p']").html());
            $("#" + dropActualizar).selectBox("refresh");

        });
    }
    else
    {
        alert("S");
//        AjaxListasResetCanton(lista, lista_actualizar);
    }
}


function AjaxCargarListas(url, data, callBack)
{
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success: function(data) {
            callBack(data);
        }
    });
}
