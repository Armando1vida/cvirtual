<?php

Yii::import('crm.models._base.BaseEntidadFoto');

class EntidadFoto extends BaseEntidadFoto
{
    /**
     * @return EntidadFoto
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'EntidadFoto|EntidadFotos', $n);
    }

}