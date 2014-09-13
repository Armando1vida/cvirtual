<?php
/** @var EntidadController $this */
/** @var Entidad $model */
/** @var AweActiveForm $form */
$form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'type' => 'horizontal',
    'id' => 'entidad-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false,),
    'enableClientValidation' => false,
        ));
?>

<div class="span7">
    <div class="widget blue">
        <div class="widget-title">
            <h4><i class="icon-plus"></i><?php echo Yii::t('AweCrud.app', $model->isNewRecord ? 'Create' : 'Update') . ' ' . Entidad::label(1); ?></h4>
            <span class="tools">
                <a href="javascript:;" class="icon-chevron-down"></a>
                <!--a href="javascript:;" class="icon-remove"></a-->
            </span>
        </div>
        <div class="widget-body">
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
            <label class="control-label required" for="Entidad_matriz">
                <?php echo $form->labelEx($model, 'matriz') ?></label>
            <div class="controls">
                <?php
                $this->widget(
                        'ext.bootstrap.widgets.TbToggleButton', array(
                    'model' => $model,
                    'disabledLabel' => 'NO',
                    'enabledLabel' => 'SI',
                    'width' => 100,
                    'attribute' => 'matriz',
                        )
                );
                ?>
            </div>
        </div>               
    </div>
</div>
<div class="span5">
    <?php // if (!empty($categoria)):  ?>
    <div class="widget green">
        <div class="widget-title">
            <h4><i class="icon-archive"></i> Categoria</h4>
            <span class="tools">
                <a href="javascript:;" class="icon-chevron-down"></a>
                <!--a href="javascript:;" class="icon-remove"></a-->
            </span>
        </div>
        <div class="widget-body">
            <!--<div class="check-box-list">-->
            <?php echo $form->dropDownListRow($model, 'categoria_id', array('' => ' -- Seleccione -- ') + CHtml::listData(Categoria::model()->activos()->findAll(), 'id', Categoria::representingColumn()), array('class' => 'span12 fix',)) ?>

            <!--</div>-->
        </div>
    </div>
    <?php // endif;  ?>
    <?php // if (!empty($categoria)):  ?>
    <div class="widget green">
        <div class="widget-title">
            <h4><i class="icon-archive"></i> Industria</h4>
            <span class="tools">
                <a href="javascript:;" class="icon-chevron-down"></a>
                <!--a href="javascript:;" class="icon-remove"></a-->
            </span>
        </div>
        <div class="widget-body">
            <!--<div class="check-box-list">-->
            <?php echo $form->dropDownListRow($model, 'industria_id', array('' => ' -- Seleccione -- ') + CHtml::listData(Industria::model()->findAll(), 'id', Industria::representingColumn()), array('class' => 'span12 fix',)) ?>

            <!--</div>-->
        </div>
    </div>
    <?php // endif;  ?>
    <div class="form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
//                'buttonType' => 'submit',
            'type' => 'success',
            'label' => $model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
            'htmlOptions' => array(
                'onclick' => 'js:save("#entidad-form")'
            )
        ));
        ?>
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('AweCrud.app', 'Cancel'),
            'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
        ));
        ?>
    </div>
</div>
<?php $this->endWidget(); ?>
