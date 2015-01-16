/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function() {
//    getInfoPicture();
});
function getInfoPicture() {

    $url = "crm/entidadFoto/ajaxGeInfoPicActual";
    getAjaxData(
            "POST",
            $url,
            "json",
            {entidad_id: entidad_id},
    function(data) {
        if (data.success) {
//            width: 48 % ;
            $("#porcentaje_progress").attr("style", "width:" + data.porcentaje);
            $("#porcentaje_subidas").html(data.porcentaje);
            $("#num_pic_uploads").html(" "+data.num_pic_uploads);
        } else {
            alert();
        }
    }
    );
}

function guardarImagen() {
    $archivos = [];
    $url = "/crm/entidadFoto/guardarImagenes";
//    construyo los datos de los archivo para guardar en la base
    $('.archivosNota').each(function(index) {
        $archivos.push(
                {
                    nombreArchivo: $(this).attr('title'),
                    url: $(this).attr('url'),
                    filename: $(this).attr('filename'),
                }
        );
    });
    getAjaxData(
            "POST",
            $url,
            "json",
            {id: entidad_id, tipo: "EMPRESA", archivos: $archivos},
    function(data) {
        if (data.success) {
            bootbox.alert(data.informacion);
            $('.files').empty();
            $.fn.yiiGridView.update('imagenes-grid');
            getInfoPicture();
        } else {
            bootbox.alert(data.error);
        }
    }
    );


}

function getAjaxData(type, url, dataType, data, callback) {
    $.ajax({
        type: type,
        url: baseUrl + url,
        dataType: dataType,
        data: data,
        success: function(data) {
            if (data.success) {
                callback(data);
            }
            else
            {
                callback(data);
            }
        }
    });
}
