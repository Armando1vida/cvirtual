<?php
/** @var OportunidadController $this */
/** @var Oportunidad $model */
/** @var AweActiveForm $form */
// Prevenir que jquery se cargue dos veces
Yii::app()->clientScript->scriptMap['jquery.js'] = false;
Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;
$form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'id' => 'direccion-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => true,
    'clientOptions' => array('validateOnSubmit' => false, 'validateOnChange' => false,),
    'enableClientValidation' => false,
        ));
//plugin select2
$baseUrl = Yii::app()->theme->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl . '/plugins/select2/select2.js');
$cs->registerScriptFile($baseUrl . '/plugins/select2/select2_locale_es.js');
$cs->registerCssFile($baseUrl . '/plugins/select2/select2.css');
$cs->registerCssFile($baseUrl . '/plugins/select2/select2-bootstrap.css');
$msj = $model->isNewRecord ? "Agregar Direccion" : "Actualizar direccion";
Util::tsRegisterAssetJs('_form_modal_entidad.js');
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4><i class="icon-tag"></i> <?php echo $msj ?> </h4>
</div>
<div class="modal-body">
    <?php echo $form->textFieldRow($model, 'pais_id') ?>
    <?php echo $form->textFieldRow($model, 'provincia_id') ?>
    <?php echo $form->dropDownListRow($model, 'ciudad_id', array('' => ' -- Seleccione -- ') + CHtml::listData(Ciudad::model()->findAll(), 'id', Ciudad::representingColumn())) ?>

    <?php echo $form->textFieldRow($model, 'calle_principal', array('maxlength' => 64)) ?>

    <?php echo $form->textFieldRow($model, 'calle_secundaria', array('maxlength' => 64)) ?>

    <?php echo $form->textFieldRow($model, 'numero', array('maxlength' => 45)) ?>

    <?php echo $form->textFieldRow($model, 'referencia', array('maxlength' => 45)) ?>

    <?php echo $form->hiddenField($model, 'coord_x') ?>
    <?php echo $form->hiddenField($model, 'coord_y') ?>
    <?php echo $form->hiddenField($model, 'entidad_id') ?>
    <div id="map-canvas-agregarDireccion" style="width:100%; height: 375px"></div>
</div>

<div class="modal-footer">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'success',
        'icon' => 'ok',
        'label' => $model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
        'htmlOptions' => array(
            'onClick' => 'js:ajaxSaveDireccion("#direccion-form")')
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
