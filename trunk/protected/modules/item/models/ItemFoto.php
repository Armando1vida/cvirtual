<?php

Yii::import('item.models._base.BaseItemFoto');

class ItemFoto extends BaseItemFoto
{
    /**
     * @return ItemFoto
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'ItemFoto|ItemFotos', $n);
    }

}