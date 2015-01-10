<?php

Yii::import('productos.models._base.BaseProductoUnidad');

class ProductoUnidad extends BaseProductoUnidad
{
        const ESTADO_ACTIVO = 'ACTIVO';
    const ESTADO_INACTIVO = 'INACTIVO';
    /**
     * @return ProductoUnidad
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', ' Unidad|Unidades', $n);
    }
    
       
     public function scopes() {
        return array(
            'activos' => array(
                'condition' => 'estado = :estado',
                'params' => array(
                    ':estado' => self::ESTADO_ACTIVO
                ),
            ),
            
        );
    }
      public function rules() {
        return array_merge(parent::rules(),array(
            array('nombre, abreviacion', 'required'),
            array('nombre','unique'),
            array('nombre', 'length', 'max'=>45),
            array('abreviacion', 'length', 'max'=>5),
            array('estado', 'length', 'max'=>8),
            array('descripcion', 'safe'),
            array('estado', 'in', 'range' => array('ACTIVO','INACTIVO')), // enum,
            array('descripcion, estado', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, nombre, abreviacion, descripcion, estado', 'safe', 'on'=>'search'),
        ));
    }


}