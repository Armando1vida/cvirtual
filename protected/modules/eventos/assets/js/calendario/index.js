$(function() {
    DraggableEvent();
});
/**
 * 
 * asigna la propiedad draggable a las tablas
 */
function DraggableEvent()
{
    $("tbody tr.xe").each(function() {
        var eventObject = {
            id: $.trim($(this).attr('id')),
            className: $.trim($(this).attr('tipo'))
        };
        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);
        // make the event draggable using jQuery UI
        $(this).draggable({
            cursorAt: { bottom: 0 },
            cursor: "move",
            helper: "clone",
            zIndex: 0,
            revert: true, // will cause the event to go back to its
            revertDuration: 0
        });
    });
}
/**
 * @author Alex Yépez Chávez
 * @param {type} Fecha_evento
 * @returns Carga la vista _form_modal de evento
 */
function AjaxModalCreateNewEvento(Fecha_evento)
{

    var fechaInicio = $.fullCalendar.formatDate(Fecha_evento, 'yyyy-MM-dd');
    var url = 'eventos/evento/create/fecha_evento/' + fechaInicio;
    viewModal(url);
}
/**
 * 
 * @param {type} event
 * @param {type} accion
 * @returns {undefined}
 */
function AjaxModalEntidad(event, accion)
{
    var control = event.className;
    var Module_Model = control.toString().split("_");
    var url = Module_Model[0] + '/' + Module_Model[1] + '/' + accion + '/id/' + Module_Model[2];
    viewModal(url, function() {
    });
}
/**
 * @author Alex Yepez <ayepez@tradesystem.com.ec>
 * @param {type} lista
 * actualiza un determinada lista y el calendario
 */
function actualizarInformacion(lista)
{
    console.log('entre');
    var listaActual = lista.replace('#', '');
    $.fn.yiiGridView.update(listaActual, {
        complete: function(jqXHR, status) {
            DraggableEvent();
        }
    });
    $('#calendar').fullCalendar('refetchEvents');


}
/**
 * @author Alex Yepez <ayepez@tradesystem.com.ec>
 * @param {type} Formulario
 * guarda los _form_modal por ajax para contacto, tarea, oportunidad, evento y cobranza
 */
function AjaxAtualizacionInformacion(Formulario)
{
    BloquearBotonesModal(Formulario);
    AjaxGestionModal(Formulario, function(list) {
        actualizarInformacion(list);

    });
}
/**
 * 
 * @param {type} event
 * @returns {undefined}
 */
function AjaxSeleccionarFechaInicioEvento(event, revertFunc)
{
    var control = event.className;
    var Module_Model = control.toString().split("_");
    var fecha = $.fullCalendar.formatDate(event.start, 'yyyy-MM-dd');
    var lista;
    var id;
    if (Module_Model.length == 3)
    {
        id = Module_Model[2];
    }
    else
    {
        id = event.id;
    }
    var url = baseUrl + Module_Model[0] + '/' + Module_Model[1] + '/ajaxUpdateFecha/id/' + id + '/fecha/' + fecha;
    if (Module_Model[1] == 'evento')
    {
        var fechafin = $.fullCalendar.formatDate(event.end, 'yyyy-MM-dd');
        url = url + '/fechafin/' + fechafin;
    }
    $.ajax({
        type: "POST",
        dataType: 'json',
        url: url,
//            beforeSend: function(xhr) {
//            },
        success: function(data) {
            if (data.success) {
                lista = '#' + Module_Model[1] + '-grid';
                actualizarInformacion(lista);

            } else {
                bootbox.alert(data.mensage);
                revertFunc();
            }
        }
    });
}