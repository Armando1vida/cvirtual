/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function guardarImagen2() {

    var $archivos = [];
    $('.archivosNota').each(function(index) {
        $archivos.push(
                {
                    nombreArchivo: $(this).attr('title'),
                    url: $(this).attr('url'),
                    filename: $(this).attr('filename'),
                });
    });
    console.log(JSON.stringify($archivos));
    $('#archivosData').val(JSON.stringify($archivos));
    $("#entidad-foto-form").submit();

}
function guardarImagen(url) {
    $archivos = [];
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
//    envio los datos a guardar
    $.ajax({
        type: "POST",
        url: url,
        dataType: 'json',
        data: {id: entidad_id, tipo: "EMPRESA", archivos: $archivos},
        success: function(data) {
            if (data.success) {
//                $('#Nota_contenido').val('');c
//                $('#Nota_id').val('');
                bootbox.alert(data.informacion);
                $('.files').empty();
                $.fn.yiiGridView.update('imagenes-grid');
            } else {
                bootbox.alert(data.error);
            }
        }
    });
}



