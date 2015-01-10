<?php

Yii::import('productos.models._base.BaseProductoSubcategoria');

class ProductoSubcategoria extends BaseProductoSubcategoria
{
        const ESTADO_ACTIVO = 'ACTIVO';
    const ESTADO_INACTIVO = 'INACTIVO';
    /**
     * @return ProductoSubcategoria
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Subcategoria|Subcategorias', $n);
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
    
       public function getSubCategorias($categoria) {
        $command = Yii::app()->db->createCommand()
                ->select("sub.id , sub.nombre")
                ->from("producto_subcategoria sub") 
                ->where("estado = :estado", array(':estado' => 'ACTIVO'))
                ->order("sub.nombre");
        if ($categoria) {
            $command->andWhere("sub.categoria_producto_id =:categoria", array(':categoria' => $categoria));
        }
       
        return ($command->queryAll());
    }



}