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