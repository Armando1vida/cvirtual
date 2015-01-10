<?php
/** @var ProductoUnidadController $this */
/** @var ProductoUnidad $model */
$this->menu = array(
    array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . ProductoUnidad::label(), 'icon' => 'plus', 'url' => array('create')),
    //array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/administrar.png") . "</div>" . Yii::t('AweCrud.app', 'Manage'), 'itemOptions' => array('class' => 'active')),
    //array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/nuevo.png") . "</div>" . Yii::t('AweCrud.app', 'Create'), 'url' => array('create')),
);

?>

  <div class="widget blue">
      <div class="widget-title">
        <h4><i class="icon-qrcode"></i> <?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo ProductoUnidad::label(2) ?>    </legend>
</h4>
          <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
        </span>
      </div>
     <div class="widget-body">
        <?php 
        $this->widget('bootstrap.widgets.TbGridView',array(
    'id' => 'producto-unidad-grid',
    'type' => 'striped bordered hover advance',
    'dataProvider' => $model->activos()->search(),
    //'filter' => $model,
    'columns' => array(
            'nombre',
                'abreviacion',
//                array(
//                    'name' => 'estado',
//                    'filter' => array('ACTIVO'=>'ACTIVO','INACTIVO'=>'INACTIVO',),
//                ),
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
    )); ?>
    </div>
</div>