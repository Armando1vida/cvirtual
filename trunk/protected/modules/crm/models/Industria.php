<?php

Yii::import('crm.models._base.BaseIndustria');

class Industria extends BaseIndustria
{
    /**
     * @return Industria
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Industria|Industrias', $n);
    }

}