<?php
/** @var CategoriaController $this */
/** @var Categoria $model */
/** @var AweActiveForm $form */
$form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'type' => 'horizontal',
    'id' => 'categoria-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false,),
    'enableClientValidation' => false,
        ));
?>
<div class="widget blue">
    <div class="widget-title">
        <h4><i class="icon-plus"></i><?php echo Yii::t('AweCrud.app', $model->isNewRecord ? 'Create' : 'Update') . ' ' . Categoria::label(1); ?></h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <!--a href="javascript:;" class="icon-remove"></a-->
        </span>
    </div>
    <div class="widget-body">
        <div class="control-group">
            <label class="control-label required" for="Categoria_peso">Categoria <span class="required"></span></label>
            <div class="controls">
                <?php
                $this->widget('ext.dzRaty.DzRaty', array(
                    'model' => $model,
                    'attribute' => 'peso',
                ));
                ?>
            </div>

        </div>
        <!-- $max_entidad
         * @property integer $max_foto-->

        <?php echo $form->textFieldRow($model, 'nombre', array('maxlength' => 45)) ?>

    </div>             
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
<!--<div class="controls">
    <div class="select2-container select2-container-active select2-dropdown-open" id="s2id_Direccion_pais_id">    <a href="#" onclick="return false;" class="select2-choice" tabindex="-1">   <span>- Paises -</span><abbr class="select2-search-choice-close" style="display:none;"></abbr>   <div><b></b></div></a>    </div><select name="Direccion[pais_id]" id="Direccion_pais_id" style="display: none;">
        <option value="0">- Paises -</option>
        <option value="1">Ecuador</option>
    </select>
    <span class="help-inline error" id="Direccion_pais_id_em_" style="display: none"></span>
</div>
<div class="controls">
    <div class="select2-container select2-container-active select2-dropdown-open" id="s2id_Direccion_provincia_id">    <a href="#" onclick="return false;" class="select2-choice" tabindex="-1">   <span></span><abbr class="select2-search-choice-close" style="display:none;"></abbr> <div><b></b></div></a>  </div><select name="Direccion[provincia_id]" id="Direccion_provincia_id" style="display: none;"><option value="0">- Ninguna -</option></select>
    <span class="help-inline error" id="Direccion_provincia_id_em_" style="display: none"></span>
</div>-->