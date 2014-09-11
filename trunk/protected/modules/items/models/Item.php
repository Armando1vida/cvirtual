<?php

Yii::import('items.models._base.BaseItem');

class Item extends BaseItem
{
    /**
     * @return Item
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Item|Items', $n);
    }

}