<?php

Yii::import('productos.models._base.BaseProducto');
Yii::import('productos.models.*');

class Producto extends BaseProducto {

    const ESTADO_ACTIVO = 'ACTIVO';
    const ESTADO_INACTIVO = 'INACTIVO';
    const TIPO_BIEN = 'BIEN';
    const TIPO_SERVICIO = 'SERVICIO';
    const IVA_12 = '12%';
    const IVA_0 = '0%';
    const IVA_NOIVA = 'NOIVA';

    public $categoriaProducto;
    public $preview;
    public $descuento;
    public $valorMinimo = 0;
    private $nombre_completo;

    /**
     * @return Producto
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Producto|Productos', $n);
    }

    public function searchParams() {
        return array(
            'codigo',
            'nombre',
            'subcategoria_producto_id',
//            'grupo_inventario_id',
//            'precio',
//            'unidad_id',
        );
    }

    public function scopes() {
        return array(
            'activos' => array(
                'condition' => 't.estado = :estado',
                'params' => array(
                    ':estado' => self::ESTADO_ACTIVO
                ),
            ),
            'venta' => array(
                'condition' => 't.venta = :venta',
                'params' => array(
                    ':venta' => 1
                ),
            ),
        );
    }

    public function rules() {
        return array_merge(parent::rules(), array(
            array('codigo', 'unique'),
            array('codigo, nombre, unidad_id, subcategoria_producto_id, categoriaProducto', 'required'),
            array('unidad_id, subcategoria_producto_id', 'numerical', 'integerOnly' => true),
            array('codigo', 'length', 'max' => 15),
            array('nombre, marca, imagen', 'length', 'max' => 45),
            array('precio', 'length', 'max' => 10),
            array('descuento', 'length', 'max' => 10),
            array('imagen', 'file', 'types' => 'jpg, gif, png', 'allowEmpty' => true),
//            array('venta', 'ext.YiiConditionalValidator.YiiConditionalValidator',
//                'if' => array(
//                    array('venta', 'compare', 'compareValue' => '1'),
//                ),
//                'then' => array(
//                    array('precio', 'required'),
//                    array('precio', 'compare', 'compareAttribute' => 'valorMinimo', 'operator' => '>', 'message' => 'Precio no puede ser nulo o 0.00.'),
//                ),
//            ),
            array('estado', 'length', 'max' => 8),
            array('descripcion', 'safe'),
            array('estado', 'in', 'range' => array('ACTIVO', 'INACTIVO')), // enum,
            array('descripcion,precio, marca, imagen,estado', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, codigo, nombre, descripcion, unidad_id, subcategoria_producto_id,precio, marca, imagen,estado, nombre_completo', 'safe', 'on' => 'search'),
        ));
    }

    public function getTipoProducto() {
        return array(
            self:: TIPO_BIEN => Yii::t('app', 'Bien'),
            self:: TIPO_SERVICIO => Yii::t('app', 'Servicio'),
        );
    }

    public function getNombre_completo() {
        if (!$this->nombre_completo)
            $this->nombre_completo = $this->codigo . ($this->codigo ? ' - ' : '') . $this->nombre;
        return $this->nombre_completo;
    }

    public function setNombre_completo($nombre_completo) {
        $this->nombre_completo = $nombre_completo;
        return $this->nombre_completo;
    }

    public function search() {
        $criteria = new CDbCriteria;
        $sort = new CSort;
        $criteria->compare('t.codigo', $this->codigo, true, 'OR');
        $criteria->compare('t.nombre', $this->nombre, true, 'OR');
        $criteria->compare('subcategoriaProducto.nombre', $this->subcategoria_producto_id, true, 'OR');
        $criteria->compare('t.precio', $this->precio, true, 'OR');

        /* Sort criteria */

        $sort->attributes = array(
            'nombre' => array(
                'asc' => 't.nombre asc',
                'desc' => 't.nombre desc',
            ),
            '*',
        );
        $sort->defaultOrder = 't.nombre asc';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria, 'sort' => $sort,
        ));
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'codigo' => Yii::t('app', 'Código'),
            'nombre' => Yii::t('app', 'Nombre'),
            'descripcion' => Yii::t('app', 'Descripción'),
            'unidad_id' => Yii::t('app', 'Unidad'),
            'categoriaProducto' => Yii::t('app', 'Categoría'),
            'subcategoria_producto_id' => Yii::t('app', 'Subcategoría'),
            'precio' => Yii::t('app', 'Precio'),
            'descuento' => Yii::t('app', 'Descuento'),
            'marca' => Yii::t('app', 'Marca'),
            'imagen' => Yii::t('app', 'Imagen'),
            'estado' => Yii::t('app', 'Estado'),
            'tipo' => Yii::t('app', 'Tipo'),
            'subcategoriaProducto' => null,
            'unidad' => null,
            'productoCuentaContables' => null,
            'ventasCotizacions' => null,
            'ventasDescuentos' => null,
            'ventasFacturaPeriodicas' => null,
            'ventasFacturas' => null,
            'ventasOportunidads' => null,
            'ventasPedidos' => null,
            'ventasRetencionProductos' => null,
        );
    }

}
