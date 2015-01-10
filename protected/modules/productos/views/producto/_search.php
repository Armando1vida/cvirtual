<?php
/** @var ProductoController $this */
/** @var AweActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'type'=>'horizontal',
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>
                <div class="span-12 ">
            <?php echo $form->textFieldRow($model, 'id'); ?>
                                <?php echo $form->textFieldRow($model, 'codigo', array('maxlength' => 15)); ?>
        </div>
                        <div class="span-12 ">
            <?php echo $form->textFieldRow($model, 'nombre', array('maxlength' => 45)); ?>
                                <?php echo $form->textAreaRow($model,'descripcion',array('rows'=>3, 'cols'=>50)); ?>
        </div>
                        <div class="span-12 ">
            <?php echo $form->dropDownListRow($model, 'unidad_id', array('' => ' -- Seleccione -- ') + CHtml::listData(ProductoUnidad::model()->findAll(), 'id', ProductoUnidad::representingColumn())); ?>
                                <?php echo $form->dropDownListRow($model, 'subcategoria_producto_id', array('' => ' -- Seleccione -- ') + CHtml::listData(ProductoSubcategoria::model()->findAll(), 'id', ProductoSubcategoria::representingColumn())); ?>
        </div>
                        <div class="span-12 ">
            <?php echo $form->dropDownListRow($model, 'grupo_inventario_id', array('' => ' -- Seleccione -- ') + CHtml::listData(ProductoGrupoInventario::model()->findAll(), 'id', ProductoGrupoInventario::representingColumn()), array('prompt' => Yii::t('AweApp', 'None'))); ?>
                                <?php echo $form->textFieldRow($model, 'precio', array('maxlength' => 10)); ?>
        </div>
                        <div class="span-12 ">
            <?php echo $form->textFieldRow($model, 'marca', array('maxlength' => 45)); ?>
                                <?php echo $form->textFieldRow($model, 'imagen', array('maxlength' => 45)); ?>
        </div>
                        <div class="span-12 ">
            <?php echo $form->checkBoxRow($model, 'compra'); ?>
                                <?php echo $form->checkBoxRow($model, 'inventario'); ?>
        </div>
                        <div class="span-12 ">
            <?php echo $form->checkBoxRow($model, 'fabricacion'); ?>
                                <?php echo $form->checkBoxRow($model, 'venta'); ?>
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
