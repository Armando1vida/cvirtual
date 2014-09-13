<?php
/** @var CiudadController $this */
/** @var Ciudad $model */
/** @var AweActiveForm $form */
$form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'type' => 'horizontal',
    'id' => 'ciudad-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false,),
    'enableClientValidation' => false,
        ));
Util::tsRegisterAssetJs('_form.js');
?>
<div class="widget blue">
    <div class="widget-title">
        <h4><i class="icon-plus"></i><?php echo Yii::t('AweCrud.app', $model->isNewRecord ? 'Create' : 'Update') . ' ' . Ciudad::label(1); ?></h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <!--a href="javascript:;" class="icon-remove"></a-->
        </span>
    </div>
    <div class="widget-body">
        <?php echo $form->textFieldRow($model, 'nombre', array('maxlength' => 45)) ?>

        <?php
        if ($model->isNewRecord) {
            $data_pais = CHtml::listData(Pais::model()->findAll(), 'id', 'nombre');
            $data_provincia = array();
        } else {
            $data_pais = CHtml::listData(Pais::model()->findAll(), 'id', 'nombre');
            $data_provincia = CHtml::listData(Provincia::model()->findAll(array(
                                "condition" => "pais_id =:pais_id",
                                "order" => "nombre",
                                "params" => array(':pais_id' => $model->pais_id,)
                            )), 'id', 'nombre');
        }
        ?>

        <?php
        echo $form->select2Row(
                $model, 'pais_id', array(
            'asDropDownList' => true,
            'data' => !empty($data_pais) ? array(null => ' -- Seleccione Pais -- ') + $data_pais : array(null => ' - Ninguno -'),
            'options' => array(
                'width' => '40%',
            )
                )
        );
        ?>
        <?php
        echo $form->select2Row(
                $model, 'provincia_id', array(
            'asDropDownList' => true,
            'data' => !empty($data_provincia) ? array(null => ' -- Seleccione Pais -- ') + $data_provincia : array(null => ' - Ninguno -'),
            'options' => array(
                'width' => '40%',
            )
                )
        );
        ?>

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
