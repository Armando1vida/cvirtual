<?php
/** @var ProductoSubcategoriaController $this */
/** @var ProductoSubcategoria $model */
$this->menu = array(
    array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . ProductoSubcategoria::label(), 'icon' => 'plus', 'url' => array('create')),
        //array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/administrar.png") . "</div>" . Yii::t('AweCrud.app', 'Manage'), 'itemOptions' => array('class' => 'active')),
        //array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/nuevo.png") . "</div>" . Yii::t('AweCrud.app', 'Create'), 'url' => array('create')),
);
?>
<div id="flashMsg"  class="flash-messages">

</div>
<div class="widget blue">
    <div class="widget-title">
        <h4><i class="icon-qrcode"></i>
            <?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo ProductoSubcategoria::label(2) ?>    
        </h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
        </span>
    </div>
    <div class="widget-body">
        <?php
        $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'producto-subcategoria-grid',
            'type' => 'striped bordered hover advance',
            'dataProvider' => $model->activos()->search(),
            //  'filter' => $model,
            'columns' => array(
                array(
                    'name' => 'categoria_producto_id',
                    'value' => 'isset($data->categoriaProducto) ? $data->categoriaProducto : null',
                    'filter' => CHtml::listData(ProductoCategoria::model()->findAll(), 'id', ProductoCategoria::representingColumn()),
                ),
                'nombre',
//                array(
//                    'name' => 'estado',
//                    'filter' => array('ACTIVO'=>'ACTIVO','INACTIVO'=>'INACTIVO',),
//                ),
                array(
                    'class' => 'CButtonColumn',
                    'template' => '{update} {delete}',
                    'afterDelete' => 'function(link,success,data){ 
                    if(success) {
                         $("#flashMsg").empty();
                         $("#flashMsg").css("display","");
                         $("#flashMsg").html(data).animate({opacity: 1.0}, 7500).fadeOut("slow");
                    }
                    }',
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