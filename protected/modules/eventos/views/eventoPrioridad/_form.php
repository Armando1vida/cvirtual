<?php
/** @var EventoPrioridadController $this */
/** @var EventoPrioridad $model */
/** @var AweActiveForm $form */
$form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'type' => 'horizontal',
    'id' => 'evento-prioridad-form',
    'enableAjaxValidation' => false,
    'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false,),
    'enableClientValidation' => true,
));
?>
<p class="note"> <?php echo Yii::t('AweCrud.app', 'Fields with') ?> <span class="required">*</span> <?php echo Yii::t('AweCrud.app', 'are required') ?>.</p>

<?php echo $form->textFieldRow($model, 'nombre', array('maxlength' => 64)) ?>
<?php echo $form->colorpickerRow($model, 'color', array('defaultValue' => '#000000', 'hidden' => true)); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'icon' => 'ok',
        'type' => 'success',
        'label' => $model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
    )); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'icon' => 'remove',
        'label' => Yii::t('AweCrud.app', 'Cancel'),
        'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
    )); ?>
</div>

<?php $this->endWidget(); ?>