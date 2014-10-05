<?php

class CalendarioController extends AweController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    public function filters() {
        return array(
            array('CrugeAccessControlFilter'),
        );
    }

    public function actionIndex() {
        $this->render('index');
    }

    public function actionAjaxCargarModelosCalendar() {
        $total = array_merge(
                Util::AddNewKeyArray(Oportunidad::model()->getOportunidadesCalendar(), array('className'), array('oportunidades_oportunidad')), Util::AddNewKeyArray(Cobranza::model()->getCobranzasCalendar(), array('className'), array('cobranzas_cobranza')), Util::AddNewKeyArray(Evento::model()->getEventosCalendar(), array('className'), array('eventos_evento')), Util::AddNewKeyArray(Tarea::model()->getTareasCalendar(), array('className'), array('tareas_tarea')), Util::AddNewKeyArray(Incidencia::model()->getIncidenciasCalendario(), array('className'), array('incidencias_incidencia')))
        ;
        $total = Util::AlterIdAttrArray($total);
        echo CJSON::encode($total);
    }

    public function actionAjaxCargaCalendarioCuenta($cuenta_id) {
        $total = array_merge(
                Util::AddNewKeyArray(Oportunidad::model()->getOportunidadesCalendar($cuenta_id, null), array('className'), array('oportunidades_oportunidad')),
                //                TODO: borrar, la tabla cobransa no tiene el campo cuenta_id 
//                Util::AddNewKeyArray(Cobranza::model()->getCobranzasCalendar($cuenta_id, null), array('className'), array('cobranzas_cobranza')),
                Util::AddNewKeyArray(Evento::model()->getEventosCalendar($cuenta_id, Evento::ENTIDAD_TIPO_CUENTA), array('className'), array('eventos_evento')), Util::AddNewKeyArray(Tarea::model()->getTareasCalendar($cuenta_id, Tarea::ENTIDAD_TIPO_CUENTA), array('className'), array('tareas_tarea')), Util::AddNewKeyArray(Incidencia::model()->getIncidenciasCalendario(null, $cuenta_id, 'cuenta'), array('className'), array('incidencias_incidencia'))
        );
        $total = Util::AlterIdAttrArray($total);
        echo CJSON::encode($total);
    }

    public function actionAjaxCargaCalendarioContacto($contacto_id) {
        $total = array_merge(
                Util::AddNewKeyArray(Oportunidad::model()->getOportunidadesCalendar(null, $contacto_id), array('className'), array('oportunidades_oportunidad')), Util::AddNewKeyArray(Cobranza::model()->getCobranzasCalendar($contacto_id), array('className'), array('cobranzas_cobranza')), Util::AddNewKeyArray(Evento::model()->getEventosCalendar($contacto_id, Evento::ENTIDAD_TIPO_CONTACTO), array('className'), array('eventos_evento')), Util::AddNewKeyArray(Tarea::model()->getTareasCalendar($contacto_id, Tarea::ENTIDAD_TIPO_CONTACTO), array('className'), array('tareas_tarea')), Util::AddNewKeyArray(Incidencia::model()->getIncidenciasCalendario(null, $contacto_id, 'contacto'), array('className'), array('incidencias_incidencia')))

        ;
        echo CJSON::encode($total);
    }

    public function actionAjaxCargaCalendarioCampania($campania_id) {
        $total = array_merge(
//                Util::AddNewKeyArray(Oportunidad::model()->getOportunidadesCalendar(null, $campania_id), array('className'), array('oportunidades_oportunidad')), 
//                Util::AddNewKeyArray(Cobranza::model()->getCobranzasCalendar(null, $campania_id), array('className'), array('cobranzas_cobranza')), 
//                Util::AddNewKeyArray(Evento::model()->getEventosCalendar($campania_id, Evento::ENTIDAD_TIPO_CONTACTO), array('className'), array('eventos_evento')), 
                Util::AddNewKeyArray(Tarea::model()->getTareasCalendar($campania_id, Tarea::ENTIDAD_TIPO_CAMPANIA), array('className'), array('tareas_tarea')), Util::AddNewKeyArray(Campania::model()->getStar($campania_id), array('className'), array('campania')), Util::AddNewKeyArray(Campania::model()->getEnd($campania_id), array('className'), array('campania'))
//                Util::AddNewKeyArray(Incidencia::model()->getIncidenciasCalendario(null,$campania_id,'contacto'), array('className'), array('incidencias_incidencia')))
        );
        echo CJSON::encode($total);
    }

    public function actionAjaxCargaCalendarioIncidencia($incidencia_id) {

        $total = array_merge(
                Util::AddNewKeyArray(Evento::model()->getEventosCalendar($incidencia_id, Evento::ENTIDAD_TIPO_INCIDENCIA), array('className'), array('eventos_evento')), Util::AddNewKeyArray(Tarea::model()->getTareasCalendar($incidencia_id, Tarea::ENTIDAD_TIPO_INCIDENCIA), array('className'), array('tareas_tarea')), Util::AddNewKeyArray(Incidencia::model()->getSubIncidenciasCalendario($incidencia_id), array('className'), array('eventos_subincidencias'))
        );
  
        $total = Util::AlterIdAttrArray($total);
       
        echo CJSON::encode($total);
    }

}
