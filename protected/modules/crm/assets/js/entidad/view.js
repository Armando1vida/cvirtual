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
function getModalDireccion() {
    if (!tipoModal) {
        $url = "crm/direccion/createDireccionEmpresa/entidad_id/" + entidad_id;
    } else {
        $url = "crm/direccion/updateDireccionEmpresa/id/" + direccion_id;
    }

    viewModal($url, function() {
        maskAttributes();
    }, true);
}
function getModal($tipo) {
    switch ($tipo) {
        case 'entidad_foto':
            $url = "crm/entidadFoto/ajaxCreateEntidadFoto/entidad_id/" + entidad_id;
            break;
//        case '#pieIncidenciaProductos':
//            //Grafico Pie Productos
//            $url = "incidencias/incidenciaProducto/ajaxPieIncidenciaProducto";
//            $incidenciaMotivoId = $("#Producto_incidenciaMotivoId").val() ? $("#Producto_incidenciaMotivoId").val() : null;
//            $incidenciaSubmotivoId = $("#Producto_incidenciaSubmotivoId ").val() ? $("#Producto_incidenciaSubmotivoId").val() : null;
//            parametros = {fechas: dataFecha, incidenciaMotivoId: $incidenciaMotivoId, incidenciaSubmotivoId: $incidenciaSubmotivoId, categoria_id: $categoria_id, zona_id: $zona_id, producto: $producto};
//            break;

    }
    viewModal($url, function() {
        maskAttributes();
    }, true);
}
