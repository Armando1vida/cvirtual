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