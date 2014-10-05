<?php
/** @var EventoController $this */
/** @var Evento $model */
/** @var AweActiveForm $form */
//Yii::app()->clientScript->registerScriptFile('https://maps.googleapis.com/maps/api/js?sensor=true&language=es');
//plugin select2
$baseUrl = Yii::app()->theme->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl . '/plugins/select2/select2.js');
$cs->registerScriptFile($baseUrl . '/plugins/select2/select2_locale_es.js');
$cs->registerCssFile($baseUrl . '/plugins/select2/select2.css');
$cs->registerCssFile($baseUrl . '/plugins/select2/select2-bootstrap.css');
Util::tsRegisterAssetJs('form.js');

$form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'type' => 'horizontal',
    'id' => 'evento-form',
    'enableAjaxValidation' => false,
    'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false,),
    'enableClientValidation' => true,
        ));
?>
<div class="span8">
    <div class="widget blue">
        <div class="widget-title">
            <h4><i class="icon-calendar"></i> <?php echo Yii::t('AweCrud.app', $model->isNewRecord ? 'Create' : 'Update') . ' ' . Evento::label(); ?> </h4>
            <span class="tools">
                <a href="javascript:;" class="icon-chevron-down"></a>
            </span>
        </div>
        <div class="widget-body">
            <p class="note"><?php echo Yii::t('AweCrud.app', 'Fields with') ?> <span class="required">*</span> <?php echo Yii::t('AweCrud.app', 'are required') ?>.</p>
            <?php echo $form->textFieldRow($model, 'nombre', array('maxlength' => 64, 'class' => 'span8')) ?>
            <?php
            $tipos = EventoTipo::model()->findAll();
            if ($tipos)
                echo $form->dropDownListRow($model, 'evento_tipo_id', CHtml::listData($tipos, 'id', 'nombre'), array('empty' => '- Seleccione -', 'class' => 'span6'));
            ?>
            <?php
            $prioridades = EventoPrioridad::model()->findAll();
            if ($prioridades)
                echo $form->dropDownListRow($model, 'evento_prioridad_id', CHtml::listData($prioridades, 'id', 'nombre'), array('empty' => 'Normal', 'class' => 'span6'));
            ?>
            <?php
            $entidades = $model->entidadTipoOpciones;
            if (count($entidades)):
                ?>
                <?php
                echo $form->dropDownListRow($model, 'entidad_tipo', $model->entidadTipoOpciones, array(
//                    'id'=>'Entidad_tipo',
                    'empty' => '- Seleccione -',
                    'class' => 'span6 fix',
                ));
                ?>
                <div class="control-group ">
                    <label class="control-label" for="Evento_entidad_id">Entidad</label>
                    <div class="controls">
                        <?php
                        $htmlOptions = array('class' => "span6");
                        if ($model->entidad_id) {
                            $mame_entidad = ucfirst($model->entidad_tipo);
                            $model_entidad = $mame_entidad::model()->findByPk($model->entidad_id);
                            $htmlOptions = array_merge($htmlOptions, array(
                                'selected-text' => (isset($model_entidad->documento) ? $model_entidad->documento . ' ' : '' )
                                . (isset($model_entidad->nombre_completo) ? $model_entidad->nombre_completo : $model_entidad->nombre)
                            ));
                        }
                        echo $form->hiddenField($model, 'entidad_id', $htmlOptions);
                        ?>
                        <span class="help-inline error" id="Evento_entidad_id_em_" style="display: none"></span>
                    </div>
                </div>
            <?php endif; ?>

            <?php echo $form->datepickerRow($model, 'fecha_inicio', array('class' => 'span4', 'options' => array('format' => 'dd/mm/yyyy', 'autoclose' => 'true', 'startDate' => 'today'))); ?>
            <?php echo $form->textAreaRow($model, 'descripcion', array('rows' => 3, 'class' => 'span8')) ?>
            <div class="control-group">
                <a class="btn btn-mini" id="show-hora-inicio" <?php if ($model->hora_inicio): ?>style="display: none" <?php endif; ?>><i class="icon-plus-sign"></i> Hora de Inicio</a>
                <div id="hora-inicio" <?php if (!$model->hora_inicio): ?>style="display: none" <?php endif; ?>>
                    <?php echo $form->timepickerRow($model, 'hora_inicio', array('class' => 'span4', 'options' => array('showMeridian' => false, 'defaultTime' => false))); ?>  
                </div>

                <a class="btn btn-mini" id="show-fecha-fin" <?php if ($model->fecha_fin): ?>style="display: none" <?php endif; ?>><i class="icon-plus-sign"></i> Fecha Fin</a>
                <div id="fecha-fin" <?php if (!$model->fecha_fin): ?>style="display: none" <?php endif; ?>
                <?php echo $form->datepickerRow($model, 'fecha_fin', array('class' => 'span4', 'options' => array('format' => 'dd/mm/yyyy', 'autoclose' => 'true'))); ?>
                     <a class="btn btn-mini" id="show-hora-fin" <?php if ($model->hora_fin): ?>style="display: none" <?php endif; ?>><i class="icon-plus-sign"></i> Hora Fin</a>
                    <div id="hora-fin" <?php if (!$model->hora_fin): ?>style="display: none" <?php endif; ?>>
                        <?php echo $form->timepickerRow($model, 'hora_fin', array('class' => 'span4', 'options' => array('showMeridian' => false, 'defaultTime' => false))); ?>
                    </div>
                </div>

                <a class="btn btn-mini" id="show-map" ><i class="icon-plus-sign"></i> Ubicaci&oacute;n</a>
                <a class="btn btn-mini" id="hide-map" style="display: none"><i class="icon-minus-sign"></i> Ocultar Ubicaci&oacute;n</a>
            </div>

            <div id="map-container" class="control-group" style="display: none;">
                <div id="map-canvas" style="width: 100%; height: 300px"></div>
            </div>
            <?php echo $form->hiddenField($model, 'coords_x') ?>
            <?php echo $form->hiddenField($model, 'coords_y') ?>

            <div class="form-actions">
                <div class="form-actions-float">
                    <?php
                    $this->widget('bootstrap.widgets.TbButton', array(
                        'buttonType' => 'submit',
                        'type' => 'success',
                        'icon' => 'ok',
                        'label' => $model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
                    ));
                    ?>
                    <?php
                    $this->widget('bootstrap.widgets.TbButton', array(
                        'icon' => 'remove',
                        'label' => Yii::t('AweCrud.app', 'Cancel'),
                        'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->endWidget(); ?>