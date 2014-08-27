<?php

Yii::import('crm.models._base.BaseCategoria');

class Categoria extends BaseCategoria
{
    /**
     * @return Categoria
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Categoria|Categorias', $n);
    }

}