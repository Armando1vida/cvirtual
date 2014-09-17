/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function guardarImagen() {

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

