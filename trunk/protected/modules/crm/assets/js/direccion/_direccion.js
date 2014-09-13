var urlProvincias = "crm/provincia/ajaxGetProvinciaPais";
var urlCiudades = "crm/ciudad/ajaxGetCiudadesProvincia";
$(function() {
//lat, long, tipo, nombre_map_cambas)

    inicializarMapa(coord_x, coord_y, "ciudad", "map-canvas_actualizacion_direccion");
    $("#Direccion_pais_id").change(function() {
        AjaxLoadData("Direccion_pais_id", "Direccion_provincia_id", 'crm/provincia/ajaxGetProvinciaPais', {pais_id: $(this).val()});

    });
    $("#Direccion_provincia_id").change(function() {
        AjaxLoadData("Direccion_provincia_id", "Direccion_ciudad_id", 'crm/ciudad/ajaxGetCiudadesProvincia', {provincia_id: $(this).val()});
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
/**
 * @Miguel Alba dadyalex777@hotmail.com
 Descripcion Metodo: Ingresara el id ciudad y asi mostrar sus coordenadas 
 Utilizacion Metodo :En esta vista del portelt direccion
 * @param {type} id_provincia
 * @returns {undefined}
 */
function getCiudadesCoordenadas(id_ciudad) {

//0.3465822,-78.1169987 Ibarra
//Cuando tengamos las coordenadas dlas ciudades retornaremos asi
    var arrayLatLong = new Array("0.3465822", "-78.1169987");

    return arrayLatLong;
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
