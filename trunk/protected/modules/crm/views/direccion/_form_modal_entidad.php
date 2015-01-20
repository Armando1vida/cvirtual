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

    <div class="control-group ">
        <label class="control-label required" for="Direccion_pais_id">Pais <span class="required">*</span></label>
        <div class="controls">
            <?php
            $htmlOptionsPais = array('class' => "span12");
            if ($model->pais_id) {
                $modelPais = Pais::model()->findByPk($model->pais_id);
                $htmlOptionsPais = array_merge($htmlOptionsPais, array(
                    'selected-text' => $modelPais->nombre
                ));
            }
            ?>
            <?php echo $form->hiddenField($model, 'pais_id',$htmlOptionsPais) ?>
            <?php echo $form->error($model, 'pais_id'); ?>
        </div>
    </div>
    <div class="control-group ">
        <label class="control-label required" for="Direccion_provincia_id">Provincia <span class="required">*</span></label>
        <div class="controls">
            <?php
            $htmlOptionsProvincia = array('class' => "span12");
            if ($model->provincia_id) {
                $modelProvincia = Provincia::model()->findByPk($model->provincia_id);
                $htmlOptionsProvincia = array_merge($htmlOptionsProvincia, array(
                    'selected-text' => $modelProvincia->nombre
                ));
            }
            ?>
            <?php echo $form->hiddenField($model, 'provincia_id',$htmlOptionsProvincia) ?>
            <?php echo $form->error($model, 'provincia_id'); ?>
        </div>
    </div>
    <div class="control-group ">
        <label class="control-label required" for="Direccion_ciudad_id">Ciudad <span class="required">*</span></label>
        <div class="controls">
            <?php
            $htmlOptionsCiudad = array('class' => "span12");
            if ($model->ciudad_id) {
                $modelCiudad = Ciudad::model()->findByPk($model->ciudad_id);
                $htmlOptionsCiudad = array_merge($htmlOptionsCiudad, array(
                    'selected-text' => $modelCiudad->nombre
                ));
            }
            ?>
            <?php echo $form->hiddenField($model, 'ciudad_id',$htmlOptionsCiudad) ?>
            <?php echo $form->error($model, 'ciudad_id'); ?>
        </div>
    </div>
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
