<?php

Yii::import('crm.models._base.BaseEntidad');

class Entidad extends BaseEntidad
{
    /**
     * @return Entidad
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Entidad|Entidads', $n);
    }

}