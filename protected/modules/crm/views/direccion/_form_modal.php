<?php
/** @var OportunidadController $this */
/** @var Oportunidad $model */
/** @var AweActiveForm $form */
// Prevenir que jquery se cargue dos veces
Yii::app()->clientScript->scriptMap['jquery.js'] = false;
Util::tsRegisterAssetJs('_form_modal.js');
Util::tsRegisterAssetJs('_direccion.js');
$form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'id' => 'direccion-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => true,
    'clientOptions' => array('validateOnSubmit' => false, 'validateOnChange' => false,),
    'enableClientValidation' => false,
        ));
?>
<script>
    var entidad_id_direccion = "<?php print $model->id; ?>";
    var coord_x = "<?php print $model->coord_x; ?>";
    var coord_y = "<?php print $model->coord_y; ?>";
</script>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4><i class="icon-tag"></i> Actualizar Informacion </h4>
</div>
<div class="modal-body">

    <?php echo $form->textFieldRow($model, 'calle_principal', array('maxlength' => 64)) ?>

    <?php echo $form->textFieldRow($model, 'calle_secundaria', array('maxlength' => 64)) ?>

    <?php echo $form->textFieldRow($model, 'numero', array('maxlength' => 45)) ?>

    <?php
    if ($model->isNewRecord) {
        $data_pais = CHtml::listData(Pais::model()->findAll(), 'id', 'nombre');
        $data_provincia = array();
        $data_ciudad = array();
    } else {
        $data_pais = CHtml::listData(Pais::model()->findAll(), 'id', 'nombre');
        $data_provincia = CHtml::listData(Provincia::model()->findAll(array(
                            "condition" => "pais_id =:pais_id",
                            "order" => "nombre",
                            "params" => array(':pais_id' => $model->pais_id,)
                        )), 'id', 'nombre');
        $data_ciudad = CHtml::listData(Ciudad::model()->findAll(array(
                            "condition" => "provincia_id =:provincia_id",
                            "order" => "nombre",
                            "params" => array(':provincia_id' => $model->provincia_id,)
                        )), 'id', 'nombre');
    }
    ?>

    <?php
    echo $form->select2Row(
            $model, 'pais_id', array(
        'asDropDownList' => true,
        'data' => !empty($data_pais) ? array(null => ' -- Seleccione Pais -- ') + $data_pais : array(null => ' - Ninguno -'),
        'options' => array(
            'width' => '100%',
        )
            )
    );
    ?>
    <?php
    echo $form->select2Row(
            $model, 'provincia_id', array(
        'asDropDownList' => true,
        'data' => !empty($data_provincia) ? array(null => ' -- Seleccione Provincia -- ') + $data_provincia : array(null => ' - Ninguno -'),
        'options' => array(
            'width' => '100%',
        )
            )
    );
    ?>
    <?php
    echo $form->select2Row(
            $model, 'ciudad_id', array(
        'asDropDownList' => true,
        'data' => !empty($data_ciudad) ? array(null => ' -- Seleccione Ciudad -- ') + $data_ciudad : array(null => ' - Ninguno -'),
        'options' => array(
            'width' => '100%',
        )
            )
    );
    ?>

    <?php echo $form->textFieldRow($model, 'referencia', array('maxlength' => 45)) ?>

    <?php echo $form->hiddenField($model, 'coord_x') ?>

    <?php echo $form->hiddenField($model, 'coord_y') ?>


    <?php echo $form->hiddenField($model, 'entidad_id') ?>
    <div id="map-canvas_actualizacion_direccion" style="width:100%; height: 375px"></div>
</div>

<div class="modal-footer">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'success',
        'icon' => 'ok',
        'label' => $model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
        'htmlOptions' => array(
            'onClick' => 'js:actualizarDireccion("#direccion-form")')
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
