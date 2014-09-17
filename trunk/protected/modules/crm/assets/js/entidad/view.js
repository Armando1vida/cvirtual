/**
 * @Miguel Alba dadyalex777@hotmail.com
 Descripcion Metodo: Actualiza la informacion de un detalview en un portlet
 Utilizacion Metodo : Al realizar las respectivas actualizaciones de la empresa:Direccion,Informacion empres
 * @param {type} urlaccion : acepta la url en la q esta ubicada la accion para la renderizacion del portle
 * @param {type} portlet_name 
 * @returns {undefined}
 */
$(function() {
    MostrarDetalleDireccion();
});
function ActualizarInformacion(urlaccion, portlet_name)
{

    //actualizar los portlets da cada vista
    var url = baseUrl + urlaccion + entidad_id;
    //actualizacion actividades
    AjaxUpdateElement(url, portlet_name, function() {

    });
//    $('#nombre_cportlet_informacioniente').html("<i  class='icon-rocket'></i> " + nombreCampania);
//    $('#calendar').fullCalendar('refetchEvents');


}
function MostrarDetalleDireccion() {
    $('#summary_direccion').click(function(event) {
        $('#detalle_direccion').animate({
            'height': 'toggle'
        }, 1000, function() {
        });
        ;
        event.preventDefault();
    });
}
function guardarImagen() {
//    $('#inmueble-form').submit(function(e) {
//        e.preventDefault();
//    });
//    $('#inmueble-form').submit();
    url = s;
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

//
////    console.log(url, $archivos);
//    $.ajax({
//        type: "POST",
//        url: url,
////        dataType: 'json',
//        data: {Inmueble: $('#inmueble-form').serialize(), Imagenes: $archivos},
//        success: function(data) {
////            if (data.success) {
////                $('#Nota_contenido').val('');
////                $('#Nota_id').val('');
////                $('.files').empty();
////                $.fn.yiiGridView.update('notas-grid');
////                AjaxActualizarActividades();
////            } else {
////                bootbox.alert(data.error);
////            }
//        }
//    });
}

