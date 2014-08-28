<?php
/** @var DireccionController $this */
/** @var Direccion $model */

$this->menu=array(
    //array('label' => Yii::t('AweCrud.app', 'List') . ' ' . Direccion::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/administrar.png") . "</div>" . Yii::t('AweCrud.app', 'Manage'), 'url' => array('admin')),
    array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/nuevo.png") . "</div>" .  Yii::t('AweCrud.app', 'Create'), 'url' => array('create')),
    //array('label' => Yii::t('AweCrud.app', 'View'), 'icon' => 'eye-open', 'itemOptions'=>array('class'=>'active')),
    //array('label' => Yii::t('AweCrud.app', 'Update'), 'icon' => 'pencil', 'url' => array('update', 'id' => $model->id)),
    //array('label' => Yii::t('AweCrud.app', 'Delete'), 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => Yii::t('AweCrud.app', 'Are you sure you want to delete this item?'))),
    
);
?>

<fieldset>
    <legend><?php echo Yii::t('AweCrud.app', 'View'); ?> </legend>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data' => $model,
	'attributes' => array(
                  'calle_principal',
             'calle_secundaria',
             'numero',
             array(
			'name' => 'ciudad_id',
			'value'=>($model->ciudad !== null) ? CHtml::link($model->ciudad, array('/ciudad/view', 'id' => $model->ciudad->id)).' ' : null,
			'type' => 'html',
		),
             'provincia_id',
             'pais_id',
             'coord_x',
             'coord_y',
             'referencia',
             'tipo_entidad',
             'entidad_id',
	),
)); ?>
</fieldset>