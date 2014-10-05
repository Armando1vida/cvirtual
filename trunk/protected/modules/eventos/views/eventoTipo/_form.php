<?php
/** @var EventoTipoController $this */
/** @var EventoTipo $model */
/** @var AweActiveForm $form */
$form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'type' => 'horizontal',
    'id' => 'evento-tipo-form',
    'enableAjaxValidation' => false,
    'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false,),
    'enableClientValidation' => true,
        ));
?>
<p class="note"><?php echo Yii::t('AweCrud.app', 'Fields with') ?> <span class="required">*</span> <?php echo Yii::t('AweCrud.app', 'are required') ?>.</p>

<?php echo $form->textFieldRow($model, 'nombre', array('maxlength' => 64)) ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'success',
        'icon' => 'ok',
        'label' => $model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
    )); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'icon' => 'remove',
        'label' => Yii::t('AweCrud.app', 'Cancel'),
        'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
    )); ?>
</div>

<?php $this->endWidget(); ?>