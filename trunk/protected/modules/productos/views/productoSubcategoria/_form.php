
    <?php
    /** @var ProductoSubcategoriaController $this */
    /** @var ProductoSubcategoria $model */
    /** @var AweActiveForm $form */
    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
        'type' => 'horizontal',
        'id' => 'producto-subcategoria-form',
        'enableAjaxValidation' => true,
        'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false,),
        'enableClientValidation' => false,
    ));?>
<div class="span12">
    <div class="widget blue">
        <div class="widget-title">
            <h4><i class="icon-plus"></i> <?php echo Yii::t('AweCrud.app', $model->isNewRecord ? 'Create' : 'Update') . ' ' . ProductoSubcategoria::label(); ?></h4>  
            <span class="tools">
                <a href="javascript:;" class="icon-chevron-down"></a>
                <!--a href="javascript:;" class="icon-remove"></a-->
            </span>
        </div>
        <div class="widget-body">
            <p class="note">
                <?php echo Yii::t('AweCrud.app', 'Fields with') ?> <span class="required">*</span>
                <?php echo Yii::t('AweCrud.app', 'are required') ?>.  
            </p>
    <?php echo $form->errorSummary($model) ?>

                <?php echo $form->dropDownListRow($model, 'categoria_producto_id', array('' => ' -- Seleccione -- ') + CHtml::listData(ProductoCategoria::model()->activos()->findAll(), 'id', ProductoCategoria::representingColumn())) ?>
                    
                                <?php echo $form->textFieldRow($model, 'nombre', array('maxlength' => 45)) ?>
                    
                <?php echo $form->textAreaRow($model,'descripcion',array('rows'=>3, 'cols'=>50)) ?>
                             
                                <div class="form-actions">
                                    <div class="form-actions-float">
                <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>$model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
		)); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array(
			//'buttonType'=>'submit',
			'label'=> Yii::t('AweCrud.app', 'Cancel'),
			'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
		)); ?>
    </div>
            </div>
        </div>
    </div>
</div>

    <?php $this->endWidget(); ?>