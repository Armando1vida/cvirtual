<?php
/** @var OportunidadController $this */
/** @var Oportunidad $model */
/** @var AweActiveForm $form */
// Prevenir que jquery se cargue dos veces
Yii::app()->clientScript->scriptMap['jquery.js'] = false;
//Util::tsRegisterAssetJs('_form_modal.js');
$form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'id' => 'oportunidad-form',
    'type' => 'horizontal',
    'action' => $model->isNewRecord ? Yii::app()->createUrl('/oportunidades/oportunidad/create') : Yii::app()->createUrl('/oportunidades/oportunidad/Update', array('id' => $model->id)),
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

</div>

<div class="modal-footer">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'success',
        'icon' => 'ok',
        'label' => $model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
//        'htmlOptions' => array(
//            'onClick' => 'js:AjaxAtualizacionInformacion("#oportunidad-form")')
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
