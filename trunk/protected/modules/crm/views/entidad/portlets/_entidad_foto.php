<?php
/** @var EntidadFotoController $this */
/** @var EntidadFoto $model */
/** @var AweActiveForm $form */
$modelEntidadFoto = new EntidadFoto;
$form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'type' => 'horizontal',
    'id' => 'entidad-foto-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array('validateOnSubmit' => false, 'validateOnChange' => true,),
    'enableClientValidation' => false,
        ));
Util::tsRegisterAssetJs('_entidad_foto.js');
?>

<?php echo $form->textFieldRow($modelEntidadFoto, 'nombre', array('maxlength' => 256)) ?>

<div class="control-group">
    <div class="control-label"><i class="icon icon-paper-clip"></i> Agregar Imagen</div>
    <div class="controls">
        <div id="select_row">
            <button id="btn_upload_action" class="btn btn-mini">
                <i class="icon icon-plus"></i> Seleccione
            </button>
            <input type="file" id="file_temp" class="hidden">
            <?php echo $form->hiddenField($modelEntidadFoto, 'ruta') ?>
        </div>
        <div id="prev_row" hidden>
            <div class="row-fluid">
                <a id="prev_file" href="#"></a>
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
    </div>
</div>
<?php echo $form->hiddenField($modelEntidadFoto, 'entidad_id') ?>

<?php
$this->widget('bootstrap.widgets.TbButton', array(
//    'buttonType' => 'submit',
    'type' => 'success',
    'label' => "Agregar Imagen",
));
?>
<?php $this->endWidget(); ?>
