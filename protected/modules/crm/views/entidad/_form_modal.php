<?php
/** @var OportunidadController $this */
/** @var Oportunidad $model */
/** @var AweActiveForm $form */
// Prevenir que jquery se cargue dos veces
Yii::app()->clientScript->scriptMap['jquery.js'] = false;
Util::tsRegisterAssetJs('_form_modal.js');
$form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'id' => 'entidad-form',
    'type' => 'horizontal',
//    'action' => $model->isNewRecord ? Yii::app()->createUrl('/crm/empresa/create') : Yii::app()->createUrl('/crm/empresa/update', array('id' => $model->id)),
    'enableAjaxValidation' => true,
    'clientOptions' => array('validateOnSubmit' => false, 'validateOnChange' => false,),
    'enableClientValidation' => false,
        ));
?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4><i class="icon-tag"></i> Actualizar Informacion </h4>
</div>
<div class="modal-body">
    <div class="control-group" >
        <label class="control-label"> <?php echo $form->labelEx($model, 'raking') ?></label>
        <div class="controls">

            <?php
            $this->widget('ext.DzRaty.DzRaty', array(
                'model' => $model,
                'attribute' => 'raking',
            ));
            ?>
            <?php echo $form->error($model, 'raking'); ?>
        </div>
    </div>
    <?php echo $form->textFieldRow($model, 'nombre', array('maxlength' => 64)) ?>

    <?php echo $form->textFieldRow($model, 'razon_social', array('maxlength' => 64)) ?>

    <?php echo $form->textFieldRow($model, 'documento', array('maxlength' => 20)) ?>

    <?php echo $form->textFieldRow($model, 'website', array('maxlength' => 45)) ?>

    <?php echo $form->textFieldRow($model, 'telefono', array('maxlength' => 45)) ?>

    <?php echo $form->textFieldRow($model, 'celular', array('maxlength' => 45)) ?>

    <?php echo $form->textFieldRow($model, 'email', array('maxlength' => 45)) ?>

    <?php echo $form->textFieldRow($model, 'max_entidad') ?>


    <?php echo $form->textFieldRow($model, 'max_foto') ?>

    <?php echo $form->hiddenField($model, 'id') ?>
</div>

<div class="modal-footer">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'success',
        'icon' => 'ok',
        'label' => $model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
        'htmlOptions' => array(
            'onClick' => 'js:actualizarEmpresa("#entidad-form")')
    ));
    ?>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'icon' => 'remove',
        'label' => Yii::t('AweCrud.app', 'Cancel'),
        'htmlOptions' => array(
            'data-dismiss' => 'modal',)
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
