<?php
/** @var ItemDireccionController $this */
/** @var ItemDireccion $model */
/** @var AweActiveForm $form */
$form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'type' => 'horizontal',
    'id' => 'item-direccion-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false,),
    'enableClientValidation' => false,
        ));
?>
<div class="widget blue">
    <div class="widget-title">
        <h4><i class="icon-plus"></i><?php echo Yii::t('AweCrud.app', $model->isNewRecord ? 'Create' : 'Update') . ' ' . ItemDireccion::label(1); ?></h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <!--a href="javascript:;" class="icon-remove"></a-->
        </span>
    </div>
    <div class="widget-body">


        <?php echo $form->textFieldRow($model, 'id') ?>

        <?php echo $form->textFieldRow($model, 'coord_x') ?>

        <?php echo $form->textFieldRow($model, 'coord_y') ?>

        <?php echo $form->textFieldRow($model, 'pais_id') ?>

        <?php echo $form->textFieldRow($model, 'provincia_id') ?>

        <?php echo $form->textFieldRow($model, 'ciudad_id') ?>

        <?php echo $form->textFieldRow($model, 'calle_principal', array('maxlength' => 45)) ?>

        <?php echo $form->textFieldRow($model, 'calle_secundaria', array('maxlength' => 45)) ?>

        <?php echo $form->textFieldRow($model, 'numero', array('maxlength' => 45)) ?>

            <?php echo $form->textFieldRow($model, 'referencia', array('maxlength' => 64)) ?>
        <div class="form-actions">
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'submit',
                'type' => 'success',
                'label' => $model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
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
</div>
<?php $this->endWidget(); ?>