<?php Util::tsRegisterAssetJs('historial.js'); ?>
<?php
/** @var ProductoController $this */
/** @var Producto $model */
$this->menu = array(
    array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . Producto::label(), 'icon' => 'plus', 'url' => array('create')),
    array(
        'label' => 'Exportar', 'icon' => 'download-alt', 'url' => '#', 'items' => array(
            array('label' => 'Todos', 'url' => '#', 'linkOptions' => array(
                    'onclick' => 'ExporProducto(true)',),),
            array('label' => 'Seleccionados', 'url' => '#', 'linkOptions' => array(
                    'onclick' => 'ExporProducto(false)',),)
        ),
    ),
);
?>

<div class="widget blue">
    <div class="widget-title">
        <h4><i class="icon-qrcode"></i> 
            <?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo Producto::label(2) ?>    
        </h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
        </span>
    </div>
    <div class="widget-body">
        <?php
        $this->widget('ext.Truulo.TruuloModuleSearch', array(
            'model' => $model,
            'grid_id' => 'producto-grid',
        ));
        ?>
        <div style='overflow:auto'> 
            <?php
            $this->widget('ext.selgridview.BootSelGridView', array(
                'id' => 'producto-grid',
                'type' => 'striped bordered hover advance',
                'template' => '{items}{summary}{pager}',
                'selectableRows' => 2,
                'dataProvider' => $model->activos()->search(),
                'columns' => array(
                    array(
                        'name' => 'id_producto',
                        'id' => 'check',
                        'class' => 'CCheckBoxColumn',
                        'value' => '$data->id',
                    ),
                    array(
                        'name' => 'Código',
                        'value' => 'CHtml::link($data->codigo, Yii::app()->createUrl("productos/producto/view",array("id"=>$data->id)))',
                        'type' => 'raw',
                    ),
                    'nombre',
                    array(
                        'name' => 'unidad_id',
                        'value' => 'isset($data->unidad) ? $data->unidad : null',
                        'filter' => CHtml::listData(ProductoUnidad::model()->findAll(), 'id', ProductoUnidad::representingColumn()),
                    ),
                    array(
                        'name' => 'subcategoria_producto_id',
                        'value' => 'isset($data->subcategoriaProducto) ? $data->subcategoriaProducto : null',
                        'filter' => CHtml::listData(ProductoSubcategoria::model()->findAll(), 'id', ProductoSubcategoria::representingColumn()),
                    ),
                
                    array(
                        'name' => 'precio',
                        'value' => '"$".number_format($data->precio,2)',
                    ),
                    /*
                      'marca',
                      'imagen',
                      array(
                      'name' => 'compra',
                      'value' => '($data->compra === 0) ? Yii::t(\'AweCrud.app\', \'No\') : Yii::t(\'AweCrud.app\', \'Yes\')',
                      'filter' => array('0' => Yii::t('AweCrud.app', 'No'), '1' => Yii::t('AweCrud.app', 'Yes')),
                      ),
                      array(
                      'name' => 'inventario',
                      'value' => '($data->inventario === 0) ? Yii::t(\'AweCrud.app\', \'No\') : Yii::t(\'AweCrud.app\', \'Yes\')',
                      'filter' => array('0' => Yii::t('AweCrud.app', 'No'), '1' => Yii::t('AweCrud.app', 'Yes')),
                      ),
                      array(
                      'name' => 'fabricacion',
                      'value' => '($data->fabricacion === 0) ? Yii::t(\'AweCrud.app\', \'No\') : Yii::t(\'AweCrud.app\', \'Yes\')',
                      'filter' => array('0' => Yii::t('AweCrud.app', 'No'), '1' => Yii::t('AweCrud.app', 'Yes')),
                      ),
                      array(
                      'name' => 'venta',
                      'value' => '($data->venta === 0) ? Yii::t(\'AweCrud.app\', \'No\') : Yii::t(\'AweCrud.app\', \'Yes\')',
                      'filter' => array('0' => Yii::t('AweCrud.app', 'No'), '1' => Yii::t('AweCrud.app', 'Yes')),
                      ),
                      array(
                      'name' => 'estado',
                      'filter' => array('ACTIVO'=>'ACTIVO','INACTIVO'=>'INACTIVO',),
                      ),
                     */
                    array(
                        'class' => 'CButtonColumn',
                        'template' => '{update} {delete}',
                        'buttons' => array(
                            'update' => array(
                                'label' => '<button class="btn btn-primary"><i class="icon-pencil"></i></button>',
                                'options' => array('title' => 'Actualizar'),
                                'imageUrl' => false,
                            ),
                            'delete' => array(
                                'label' => '<button class="btn btn-danger"><i class="icon-trash"></i></button>',
                                'options' => array('title' => 'Eliminar'),
                                'imageUrl' => false,
                            )
                        ),
                        'htmlOptions' => array(
                            'width' => '80',
                        )
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</div>
<form id="formId" method="post" target="blank">
    <input type="hidden" id="id_producto" name="Productos">
</form>