<?php
/** @var EventoTipoController $this */
/** @var EventoTipo $model */
$this->pageTitle = EventoTipo::label(2);
$this->menu = array(
    array('label' => Yii::t('AweCrud.app', 'Create'), 'icon'=>'plus', 'url' => array('create')),);
?>

<div class="widget redblack">
    <div class="widget-title">
        <h4><i class="icon-calendar"></i>   <?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo EventoTipo::label(2) ?>  </h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
        </span>

    </div>

    <div class="widget-body form">
        <?php $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'evento-tipo-grid',
            'type' => 'striped condensed',
            'dataProvider' => $model->search(),
            //'filter' => $model,
            'columns' => array(
                'nombre',
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
                        ),
                    ),
                    'htmlOptions' => array(
                        'width' => '80px'
                    )
                ),
            ),
        )); ?>
    </div>
</div>