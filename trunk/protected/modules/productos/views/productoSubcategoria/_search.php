<?php
/** @var ProductoSubcategoriaController $this */
/** @var AweActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'type'=>'horizontal',
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>
                <div class="span-12 ">
            <?php echo $form->textFieldRow($model, 'id'); ?>
                                <?php echo $form->dropDownListRow($model, 'categoria_producto_id', array('' => ' -- Seleccione -- ') + CHtml::listData(ProductoCategoria::model()->findAll(), 'id', ProductoCategoria::representingColumn())); ?>
        </div>
                        <div class="span-12 ">
            <?php echo $form->textFieldRow($model, 'nombre', array('maxlength' => 45)); ?>
                                <?php echo $form->textAreaRow($model,'descripcion',array('rows'=>3, 'cols'=>50)); ?>
        </div>
                        <div class="span-12 ">
            <?php echo $form->dropDownListRow($model, 'estado', array('ACTIVO' => 'ACTIVO','INACTIVO' => 'INACTIVO',)); ?>
            </div><div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
			'type' => 'primary',
			'label' => Yii::t('AweCrud.app', 'Search'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
