/**
 * 
 * @author Miguel Alba <malba@tradesystem.com.ec>
 * @returns {undefined}
 */
/**
 * gg   
 * @returns {undefined}
 */
$(function () {
    $("#Ciudad_pais_id").change(function () {
        AjaxLoadData("Ciudad_pais_id", "Ciudad_provincia_id", 'crm/provincia/ajaxGetProvinciaPais', {pais_id: $(this).val()});
    });
});
function AjaxLoadData(lista, lista_actualizar, url, params)
{
    $('#s2id_' + lista_actualizar + ' a span').html('');
    AjaxGetData(baseUrl + url,
            params, function (data) {
                $("#" + lista_actualizar).html(data);
                $('#s2id_' + lista_actualizar + ' a span').html($("#" + lista_actualizar + " option[em='p']").html());
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
