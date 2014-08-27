<?php

Yii::import('crm.models._base.BaseEmpresa');

class Empresa extends BaseEmpresa
{
    /**
     * @return Empresa
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Empresa|Empresas', $n);
    }

}