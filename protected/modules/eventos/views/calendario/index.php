<?php
Yii::app()->clientScript->registerCoreScript('jquery.ui');
Util::tsRegisterAssetJs('index.js');
Yii::app()->clientScript->registerScriptFile('https://maps.googleapis.com/maps/api/js?sensor=true&language=es');

$this->menu = array(
    array('label' => Yii::t('AweCrud.app', 'Create'), 'icon' => 'plus', 'visible' => Util::checkAccess(array("action_cobranza_create")), 'url' => array('/eventos/evento/create')),
//    array(
//        'label' => 'Exportar', 'icon' => 'download-alt', 'url' => '#', 'visible' => Util::checkAccess(array("action_cobranza_ExportExcel")), 'items' => array(
//            array('label' => 'Todos', 'url' => '#', 'linkOptions' => array(
//                    'onclick' => 'ExporCont(true)',
//                )),
//            array('label' => 'Seleccionados', 'url' => '#', 'linkOptions' => array(
//                    'onclick' => 'ExporCont(false)'))
//        ),
//    ),
//    array('label' => Yii::t('AweCrud.app', 'Kanban'), 'icon' => 'trello', 'visible' => Util::checkAccess(array("action_cobranza_kanban")), 'url' => array('/cobranzas/cobranza/kanban')),
);

?>
<div class="row-fluid">
    <div class="span8">
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
                        'eventSources' => array(CController::createUrl('/eventos/calendario/ajaxCargarModelosCalendar/')),
                        'disableResizing'=> true,
                        'dayClick' => Util::checkAccess(array("action_evento_ajaxCreateCalendarModal"))?"js:function(date, allDay, jsEvent, view){
                            var NewDate = new Date();
                            NewDate = $.fullCalendar.formatDate(date, 'yyyy-MM-dd');
                            var today = new Date();
                            today = $.fullCalendar.formatDate(today, 'yyyy-MM-dd'); 
                            if (NewDate >= today) { 
                                AjaxModalCreateNewEvento(date);
                                }
                            
                        
                        }":'',
                        
                        'eventClick' => Util::checkAccess(array("action_evento_view"))?'js:function(event, eventElement, view){
                                AjaxModalEntidad(event,"view");
                        }':'',
                        'drop' => "js:function(date, allDay) {
                            var NewDate = new Date();
                            NewDate = $.fullCalendar.formatDate(date, 'yyyy-MM-dd');
                            var today = new Date();
                            today = $.fullCalendar.formatDate(today, 'yyyy-MM-dd');               
                                if (NewDate >= today) { 
                                    var originalEventObject = $(this).data('eventObject');
                                    originalEventObject.start = date;
                                    originalEventObject.allDay = allDay;
                                    AjaxSeleccionarFechaInicioEvento(originalEventObject);
                                }
                                else
                            {
                                bootbox.alert('No se puede asignar a una fecha pasada');
                            }
				
			}",
                        'eventDrop' => 'js:function(event, dayDelta, minuteDelta, allDay, revertFunc) {
                            var NewDate = new Date();
                            NewDate = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd");
                            var today = new Date();
                            today = $.fullCalendar.formatDate(today, "yyyy-MM-dd");
                            
                                if (NewDate >= today) {
                                        AjaxSeleccionarFechaInicioEvento(event,revertFunc);
                                }
                                else
                                {
                                    revertFunc();
                                bootbox.alert("No se puede asignar a una fecha pasada");
                                }
                                
                        }',
                        
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


    <div class="span4">
        <?php $this->renderPartial('portlets/_tareas'); ?>
        <?php $this->renderPartial('portlets/_oportunidades'); ?>
        <?php $this->renderPartial('portlets/_cobranzas'); ?>
        <?php $this->renderPartial('portlets/_incidencias'); ?>
    </div>

</div>

