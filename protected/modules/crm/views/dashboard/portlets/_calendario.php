<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$eventos = array(
    array(),
);
?>
<div >
    <div class="widget redblack">
        <div class="widget-title">
            <h4><i class="icon-calendar"></i> Calendario</h4>
            <span class="tools">
                <a href="javascript:;" class="icon-chevron-down"></a>
            </span>
        </div>
        <div class="widget-body">
            <?php
            $this->widget('application.extensions.fullcalendar.FullcalendarGraphWidget', array(
                'id' => 'calendar',
                'options' => array(
                    'editable' => true,
                    'droppable' => true,
                    'monthNames' => Util::obtenerMeses(),
                    'monthNamesShort' => Util::obtenerMesesCortos(),
                    'dayNames' => Util::obtenerDias(),
                    'buttonText' => Util::obtenerBotonesCalendario(),
                    'dayNamesShort' => Util::obtenerDiasCortos(),
                    'columnFormat' => Util::obtenerColumnasCalendario(),
                    'titleFormat' => Util::obtenerTitulosCalendario(),
                    'events' => array(
                        array('title' => 'Agencia ', 'start' => '2014-04-26', 'color' => '#3DBEDC',),
                        array('title' => 'Agencia ', 'start' => '2014-04-06', 'color' => '#3DBEDC',),
                        array('title' => 'Agencia ', 'start' => '2014-04-09', 'color' => '#3DBEDC'),
                        array('title' => 'Email ', 'start' => '2014-04-07', 'color' => '#9D4A9C'),
                        array('title' => 'Email ', 'start' => '2014-04-09', 'color' => '#9D4A9C'),
                        array('title' => 'Email ', 'start' => '2014-04-25', 'color' => '#9D4A9C'),
                        array('title' => 'Llamada ', 'start' => '2014-04-25', 'color' => '#90C56D'),
                        array('title' => 'Llamada ', 'start' => '2014-04-21', 'color' => '#90C56D'),
                        array('title' => 'Visita ', 'start' => '2014-04-01', 'color' => '#F37B53'),
                        array('title' => 'Visita ', 'start' => '2014-04-03', 'color' => '#F37B53'),
                        array('title' => 'Visita ', 'start' => '2014-04-23', 'color' => '#F37B53'),
                        array('title' => 'Email ', 'start' => '2014-04-25', 'color' => '#9D4A9C'),
                        array('title' => 'Email ', 'start' => '2014-04-27', 'color' => '#9D4A9C'),
                    ),
//                        'eventSources' => array(CController::createUrl('/eventos/calendario/ajaxCargarModelosCalendar/')),
                    'disableResizing' => true,
                    'dayClick' => Util::checkAccess(array("action_evento_ajaxCreateCalendarModal")) ? "js:function(date, allDay, jsEvent, view){
                            var NewDate = new Date();
                            NewDate = $.fullCalendar.formatDate(date, 'yyyy-MM-dd');
                            var today = new Date();
                            today = $.fullCalendar.formatDate(today, 'yyyy-MM-dd'); 
                            if (NewDate >= today) { 
                                AjaxModalCreateNewEvento(date);
                                }
                            
                        
                        }" : '',
//                        'eventClick' => Util::checkAccess(array("action_evento_view"))?'js:function(event, eventElement, view){
//                                AjaxModalEntidad(event,"view");
//                        }':'',
//        'drop' => "js:function(date, allDay) {
//                            var NewDate = new Date();
//                            NewDate = $.fullCalendar.formatDate(date, 'yyyy-MM-dd');
//                            var today = new Date();
//                            today = $.fullCalendar.formatDate(today, 'yyyy-MM-dd');               
//                                if (NewDate >= today) { 
//                                    var originalEventObject = $(this).data('eventObject');
//                                    originalEventObject.start = date;
//                                    originalEventObject.allDay = allDay;
//                                    AjaxSeleccionarFechaInicioEvento(originalEventObject);
//                                }
//                                else
//                            {
//                                bootbox.alert('No se puede asignar a una fecha pasada');
//                            }
//				
//			}",
//        'eventDrop' => 'js:function(event, dayDelta, minuteDelta, allDay, revertFunc) {
//                            var NewDate = new Date();
//                            NewDate = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd");
//                            var today = new Date();
//                            today = $.fullCalendar.formatDate(today, "yyyy-MM-dd");
//                            
//                                if (NewDate >= today) {
//                                        AjaxSeleccionarFechaInicioEvento(event,revertFunc);
//                                }
//                                else
//                                {
//                                    revertFunc();
//                                bootbox.alert("No se puede asignar a una fecha pasada");
//                                }
//                                
//                        }',
                    'header' => array(
                        'left' => 'prev,next today',
                        'center' => 'title',
                        'right' => 'month,basicWeek,basicDay'
                    ),
                ),
                'htmlOptions' => array(
                    'class' => 'has-toolbar'
                ),
            ));
            ?>


        </div>
    </div>
</div>
