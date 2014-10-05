<?php

Yii::import('eventos.models._base.BaseEventoTipo');

class EventoTipo extends BaseEventoTipo {
    
    /**
     * @return EventoTipo
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Evento Tipo|Eventos Tipos', $n);
    }

}