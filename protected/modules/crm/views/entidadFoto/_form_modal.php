<?php
/** @var OportunidadController $this */
/** @var Oportunidad $model */
/** @var AweActiveForm $form */
// Prevenir que jquery se cargue dos veces
Yii::app()->clientScript->scriptMap['jquery.js'] = false;
Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;
Yii::app()->clientScript->scriptMap['jquery.yiigridview.js'] = false;
$form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'type' => 'horizontal',
    'id' => 'entidad-foto-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array('validateOnSubmit' => false, 'validateOnChange' => false,),
    'enableClientValidation' => false,
        ));

$msj = "Agregar Fotos";
Util::tsRegisterAssetJs('_form_modal.js');
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4><i class="icon-tag"></i> <?php echo $msj ?> </h4>
</div>
<div class="modal-body">
    <div class="control-group">
<!--        <div class="control-label"><i class="icon icon-paper-clip"></i> Archivo adjunto</div>-->
        <label class="control-label required" for="EntidadFoto_ruta">Foto <span class="required">*</span></label>

        <div class="controls">
            <?php echo $form->hiddenField($model, 'ruta') ?>
            <div id="select_row">
                <button id="btn_upload_action" class="btn btn-mini">
                    <i class="icon icon-plus"></i> Seleccione
                </button>
                <input type="file" id="file_temp" class="hidden">
            </div>
            <div id="prev_row" hidden>
                <div class="row-fluid">
                    <img id="img_prev" data-src="holder.js/100%x200" alt="100%x300" src="#">

                    <!--<a id="prev_file" href="#"></a>-->
                </div>
                <div class="row-fluid">
                    <button id="btn_change_action" class="btn btn-mini btn-primary">
                        <i class="icon-white icon-search"></i> Cambiar
                    </button>
                    <button id="btn_delete_action" class="btn btn-mini btn-danger">
                        <i class="icon-white icon-stop"></i> Eliminar
                    </button>
                </div>
            </div>
            <span class="help-inline error" id="EntidadFoto_ruta_em_" style="display: none"></span>
        </div>
    </div>
    <?php echo $form->textFieldRow($model, 'nombre', array('maxlength' => 256)) ?>
    <?php echo $form->hiddenField($model, 'entidad_id') ?>

</div>
<div class="modal-footer">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'success',
        'icon' => 'ok',
        'label' => $model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
        'htmlOptions' => array(
            'onClick' => 'js:ajaxSaveImagen("#entidad-foto-form")')
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

