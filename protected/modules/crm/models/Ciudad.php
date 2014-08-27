<?php

Yii::import('crm.models._base.BaseCiudad');

class Ciudad extends BaseCiudad
{
    /**
     * @return Ciudad
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Ciudad|Ciudads', $n);
    }

}