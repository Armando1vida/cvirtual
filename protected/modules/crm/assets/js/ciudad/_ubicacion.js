

$(function() {
    /**
     * carga de ciudades
     */
//     console.log('entraJS');


    //cambiar

    $("#Ciudad_pais_id").change(function() {
//Actualizar Todos
//        actualizarInformacionTodos("Ciudad_pais_id", "Ciudad_provincia_id", "Contacto_canton_id");
        AjaxListaProvincias("Ciudad_pais_id", "Ciudad_provincia_id");
    });


});

/**
 * @author Miguel Alba < malba@tradesystem.com.ec >
 * @param {type} region_id
 * @param {type} provincia_id
 * @param {type} canton_id
 * @param {type} ciudad_id
 * @returns {undefined}
 */

function AjaxListaProvincias(lista, lista_actualizar)
{
    $('#s2id_' + lista_actualizar + ' a span').html('');
    if ($("#" + lista).val() > 0)
    {
        AjaxCargarListas(baseUrl + "crm/provincia/ajaxGetProvinciaPais",
                {idDrop: $("#" + lista).val()}, function(data) {
            $("#" + lista_actualizar).html(data);
            $('#s2id_' + lista_actualizar + ' a span').html($("#" + lista_actualizar + " option[id='p']").html());
            $("#" + lista_actualizar).selectBox("refresh");

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


