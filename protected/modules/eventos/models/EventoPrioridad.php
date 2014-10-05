<?php

Yii::import('eventos.models._base.BaseEventoPrioridad');

class EventoPrioridad extends BaseEventoPrioridad {
    /**
     * @return EventoPrioridad
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Evento Prioridad|Eventos Prioridades', $n);
    }

}