<?php
/** @var EntidadController $this */
/** @var Entidad $model */

$this->menu=array(
    //array('label' => Yii::t('AweCrud.app', 'List') . ' ' . Entidad::label(2), 'icon' => 'list', 'url' => array('index')),
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
                  'nombre',
             'razon_social',
             'documento',
             array(
                'name' => 'website',
                'type' => 'url'
            ),
             'raking',
             'telefono',
             'celular',
             array(
                'name' => 'email',
                'type' => 'email'
            ),
             'max_entidad',
             'estado',
             'matriz',
             array(
			'name' => 'categoria_id',
			'value'=>($model->categoria !== null) ? CHtml::link($model->categoria, array('/categoria/view', 'id' => $model->categoria->id)).' ' : null,
			'type' => 'html',
		),
             array(
			'name' => 'industria_id',
			'value'=>($model->industria !== null) ? CHtml::link($model->industria, array('/industria/view', 'id' => $model->industria->id)).' ' : null,
			'type' => 'html',
		),
             array(
			'name' => 'entidad_id',
			'value'=>($model->entidad !== null) ? CHtml::link($model->entidad, array('/entidad/view', 'id' => $model->entidad->id)).' ' : null,
			'type' => 'html',
		),
             'max_foto',
	),
)); ?>
</fieldset>