<?php
/** @var EmpresaController $this */
/** @var Empresa $model */
/** @var AweActiveForm $form */
$form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'type' => 'horizontal',
    'id' => 'empresa-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false,),
    'enableClientValidation' => false,
        ));
?>
<div class="row-fluid">

    <div class="span8">
        <div class="widget blue">
            <div class="widget-title">
                <h4><i class="icon-plus"></i><?php echo Yii::t('AweCrud.app', $model->isNewRecord ? 'Create' : 'Update') . ' ' . Empresa::label(1); ?></h4>
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
                <?php echo $form->textFieldRow($model, 'nombre', array('maxlength' => 64)) ?>

                <?php echo $form->textFieldRow($model, 'razon_social', array('maxlength' => 64)) ?>

                <?php echo $form->textFieldRow($model, 'documento', array('maxlength' => 20)) ?>

                <?php echo $form->textFieldRow($model, 'website', array('maxlength' => 45)) ?>

                <?php echo $form->textFieldRow($model, 'raking') ?>

                <?php echo $form->textFieldRow($model, 'telefono', array('maxlength' => 45)) ?>

                <?php echo $form->textFieldRow($model, 'celular', array('maxlength' => 45)) ?>

                <?php echo $form->textFieldRow($model, 'email', array('maxlength' => 45)) ?>

                <?php // echo $form->textFieldRow($model, 'num_item')  ?>

                <?php // echo $form->dropDownListRow($model, 'categoria_id', array('' => ' -- Seleccione -- ') + CHtml::listData(Categoria::model()->findAll(), 'id', Categoria::representingColumn()))  ?>

                <?php echo $form->dropDownListRow($model, 'industria_id', array('' => ' -- Seleccione -- ') + CHtml::listData(Industria::model()->findAll(), 'id', Industria::representingColumn()), array('placeholder' => '')) ?>

                <?php // echo $form->dropDownListRow($model, 'estado', array('ACTIVO' => 'ACTIVO', 'INACTIVO' => 'INACTIVO',))  ?>
                <div class="form-actions">
                    <?php
                    $this->widget('bootstrap.widgets.TbButton', array(
                        'buttonType' => 'submit',
                        'type' => 'success',
                        'label' => $model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
                    ));
                    ?>
                    <?php
                    $this->widget('bootstrap.widgets.TbButton', array(
                        'label' => Yii::t('AweCrud.app', 'Cancel'),
                        'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="span4">
        <?php if (!empty($categoria)): ?>
            <div class="widget green">
                <div class="widget-title">
                    <h4><i class="icon-archive"></i> Categoria</h4>
                    <span class="tools">
                        <a href="javascript:;" class="icon-chevron-down"></a>
                        <!--a href="javascript:;" class="icon-remove"></a-->
                    </span>
                </div>
                <div class="widget-body">
                    <!--<div class="check-box-list">-->
                    <?php echo $form->radioButtonListRow($model, 'categoria_id', CHtml::listData($categoria, 'id', 'nombre')); ?>
                    <!--</div>-->
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $this->endWidget(); ?>
