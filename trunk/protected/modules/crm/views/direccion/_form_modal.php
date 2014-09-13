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
//    'action' => $model->isNewRecord ? Yii::app()->createUrl('/crm/empresa/create') : Yii::app()->createUrl('/crm/empresa/update', array('id' => $model->id)),
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
    <?php
    ?>
    <?php echo $form->textFieldRow($model, 'calle_principal', array('maxlength' => 64)) ?>

    <?php echo $form->textFieldRow($model, 'calle_secundaria', array('maxlength' => 64)) ?>

    <?php echo $form->textFieldRow($model, 'numero', array('maxlength' => 45)) ?>

    <div class="control-group" >
        <!-- drop de region -->
        <label class="control-label"> <?php echo $form->labelEx($model, 'pais_id') ?></label>
        <div class="controls">
            <?php
            $paises = Pais::model()->getInscritasPaises();
            $lista_paises = !(count($paises) == 0) ? array(0 => '- Paises -') + CHtml::listData($paises, 'id', 'nombre') : array(0 => '- Ninguna -');
            $this->widget(
                    'ext.bootstrap.widgets.TbSelect2', array(
                'asDropDownList' => TRUE,
                'model' => $model,
                'attribute' => 'pais_id',
                'data' => $lista_paises,
                'events' => array("event_name" => "Javascript code for handler"),
                'options' => array(
                    'placeholder' => 'Seleccione Un Pais!',
//                                    'width' => '25%',
                )
                    )
            );
            ?>

            <?php echo $form->error($model, 'pais_id'); ?>

        </div>
    </div>

    <div class="control-group" >
        <!-- drop de region -->
        <label class="control-label"> <?php echo $form->labelEx($model, 'provincia_id') ?></label>
        <div class="controls">
            <?php
            $lista_provincias = array(0 => '- Ninguna -');

            $this->widget(
                    'ext.bootstrap.widgets.TbSelect2', array(
                'asDropDownList' => TRUE,
                'model' => $model,
                'attribute' => 'provincia_id',
                'data' => $lista_provincias,
                'options' => array(
//                                    'width' => '25%',
                )
                    )
            );
            ?>

            <?php echo $form->error($model, 'provincia_id'); ?>

        </div>
    </div>
    <div class="control-group" >
        <!-- drop de region -->
        <label class="control-label"> <?php echo $form->labelEx($model, 'ciudad_id') ?></label>
        <div class="controls">
            <?php
            $lista_ciudades = array(0 => '- Ninguna -');

            $this->widget(
                    'ext.bootstrap.widgets.TbSelect2', array(
                'asDropDownList' => TRUE,
                'model' => $model,
                'attribute' => 'ciudad_id',
                'data' => $lista_provincias,
                'options' => array(
//                                    'width' => '25%',
                )
                    )
            );
            ?>

            <?php echo $form->error($model, 'ciudad_id'); ?>

        </div>
    </div>
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
