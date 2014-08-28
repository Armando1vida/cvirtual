<?php

Yii::import('item.models._base.BaseItemDireccion');

class ItemDireccion extends BaseItemDireccion
{
    /**
     * @return ItemDireccion
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'ItemDireccion|ItemDireccions', $n);
    }

}