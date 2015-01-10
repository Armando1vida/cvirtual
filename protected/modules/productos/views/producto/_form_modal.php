<?php
Yii::app()->clientScript->scriptMap['jquery.js'] = false;
Util::tsRegisterAssetJs('_form.js');
Util::tsRegisterAssetJs('_form_modal.js');
Util::tsRegisterAssetJs('uploadFile.js');
?>
<?php
/** @var ProductoController $this */
/** @var Producto $model */
/** @var AweActiveForm $form */
$form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'type' => 'horizontal',
    'id' => 'producto-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false,),
    'enableClientValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));

?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4><i class="icon-user"></i> Nuevo Producto</h4>
</div>
<div class="modal-body">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget blue">
                <div class="widget-title">
                    <h4><i class="icon-qrcode"></i> Datos Producto</h4>  
                    <span class="tools">
                        <a href="javascript:;" class="icon-chevron-down"></a>
                        <!--a href="javascript:;" class="icon-remove"></a-->
                    </span>
                </div>

                <div class="widget-body">
                    <p class="note">
                        <?php echo Yii::t('AweCrud.app', 'Fields with') ?> <span class="required">*</span>
                        <?php echo Yii::t('AweCrud.app', 'are required') ?>.  
                    </p>


                    <?php echo $form->textFieldRow($model, 'codigo', array('maxlength' => 15)) ?>
                    <?php echo $form->textFieldRow($model, 'nombre', array('maxlength' => 45)) ?>

                    <?php echo $form->textAreaRow($model, 'descripcion', array('rows' => 3, 'cols' => 50)) ?>
                    <?php echo $form->dropDownListRow($model, 'unidad_id', array('' => ' -- Seleccione -- ') + CHtml::listData(ProductoUnidad::model()->activos()->findAll(), 'id', ProductoUnidad::representingColumn())) ?>

                    <?php
                    echo $form->dropDownListRow($model, 'categoriaProducto', $model->subcategoriaProducto ?
                                    array($model->subcategoriaProducto->categoriaProducto->id => $model->subcategoriaProducto->categoriaProducto->nombre) + CHtml::listData(ProductoCategoria::model()->activos()->findAll(array(
                                                "condition" => "id != :id",
                                                "order" => "nombre",
                                                "params" => array(":id" => $model->subcategoriaProducto->categoriaProducto->id)
                                            )), 'id', ProductoCategoria::representingColumn()) : array('' => ' -- Seleccione -- ') + CHtml::listData(ProductoCategoria::model()->activos()->findAll(), 'id', ProductoCategoria::representingColumn()), array(
                        'ajax' => array('type' => 'POST',
                            'url' => Yii::app()->baseUrl . '/index.php/productos/ProductoSubcategoria/CargarSubCategoria',
                            'update' => '#Producto_subcategoria_producto_id',
                        )
                            )
                    )
                    ?>
                    <?php
                    echo $form->dropDownListRow($model, 'subcategoria_producto_id', array('' => ' -- Seleccione -- ') + CHtml::listData($model->subcategoriaProducto ? $model->subcategoriaProducto->categoriaProducto->productoSubcategorias : array(), 'id', ProductoSubcategoria::representingColumn()));
                    ?>

                    <?php echo $form->dropDownListRow($model, 'grupo_inventario_id', array('' => ' -- Seleccione -- ') + CHtml::listData(ProductoGrupoInventario::model()->activos()->findAll(), 'id', ProductoGrupoInventario::representingColumn())) ?>


                    <?php echo $form->dropDownListRow($model, 'tipo', $model->tipoProducto, array('empty' => '- Seleccione -')) ?>
                    <?php echo $form->dropDownListRow($model, 'iva', array('12%' => '12%', '0%' => '0%', 'NOIVA' => 'No objeto IVA'), array('empty' => '- Seleccione -'), array('maxlength' => 10))
                    ?>

                    <?php echo $form->dropDownListRow($model, 'porcentaje_retencion', array('' => ' -- Seleccione -- ') + CHtml::listData(ProductoRetencion::model()->activos()->findAll(), 'id', ProductoRetencion::representingColumn())) ?>

                </div>
            </div>

            <div class="widget orange">
                <div class="widget-title">
                    <h4><i class=" icon-list"></i> Detalle Producto</h4>  
                    <span class="tools">
                        <a href="javascript:;" class="icon-chevron-down"></a>
                        <!--a href="javascript:;" class="icon-remove"></a-->
                    </span>
                </div>
                <div class="widget-body">

                    <?php echo $form->textFieldRow($model, 'precio', array('maxlength' => 10, 'class' => 'money')) ?>

                    <?php echo $form->textFieldRow($model, 'marca', array('maxlength' => 45)) ?>
                    
                    <?php echo CHtml::hiddenField('Producto[imagen]',null,array('id'=>'Producto_imagen')) ?>


                    <!--<div class="control-group ">-->
                    <?php // echo $form->labelEx($model, 'imagen', array('class' => 'span4')); ?> 
                        <!--<div class="fileupload controls  subirArchivo <?php // echo $model->isNewRecord ? 'fileupload-new' : 'fileupload-new';          ?>">-->
                    <!--<div style="width: 200px; height: 150px;" class="fileupload-new thumbnail">-->
                    <?php // if ((!$model->isNewRecord) && $model->imagen != NULL) { ?>
                    <?php // echo CHtml::image(Yii::app()->request->baseUrl . '/upload/' . $model->imagen, "imagen", array("width" => 200)); ?>  

                    <?php // } ?>
                                <!--<img alt="" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image">-->
                    <!--</div>-->
                    <!--<div id="typeImage" style="max-width: 200px; max-height: 150px; line-height: 20px;" class="fileupload-preview fileupload-exists thumbnail"></div>-->

                    <!--<div>-->

                                <!--<span class="btn btn-file"><span class="fileupload-new">Seleccione Imagen</span>-->
                    <?php // echo CHtml::activeFileField($model, 'imagen'); ?> 
                                    <!--<span class="fileupload-exists">Cambiar</span>-->
                    <!--</span>-->

                    <!--<a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Quitar</a>-->


                    <!--</div>-->
                </div>
            </div>

            <div class="widget yellow">
                <div class="widget-title">
                    <h4><i class=" icon-ok"></i> Opciones</h4>  
                    <span class="tools">
                        <a href="javascript:;" class="icon-chevron-down"></a>
                        <!--a href="javascript:;" class="icon-remove"></a-->
                    </span>
                </div>
                <div class="widget-body">


                    <div class="row-fluid">
                        <label class="control-label">Compra</label>
                        <?php
                        $this->widget(
                                'bootstrap.widgets.TbToggleButton', array(
                            'name' => 'compra',
                            //'label'=>'compra',
                            'model' => $model,
                            'attribute' => 'compra',
                            // 'enabledLabel '=> 'ON',
                            'onChange' => 'js:function($el, status, e){console.log($el, status, e);}'
                                )
                        );
                        ?>
                    </div>
                    <div class="row-fluid">
                        <label class="control-label">Inventario</label>
                        <?php
                        $this->widget(
                                'bootstrap.widgets.TbToggleButton', array(
                            //  'name' => 'compra',
                            'model' => $model,
                            'attribute' => 'inventario',
                            'onChange' => 'js:function($el, status, e){console.log($el, status, e);}'
                                )
                        );
                        ?>
                    </div>

                    <div class="row-fluid">
                        <label class="control-label">Fabricación</label>
                        <?php
                        $this->widget(
                                'bootstrap.widgets.TbToggleButton', array(
                            //  'name' => 'compra',
                            'model' => $model,
                            'attribute' => 'fabricacion',
                            'onChange' => 'js:function($el, status, e){console.log($el, status, e);}'
                                )
                        );
                        ?>
                    </div>

                    <div class="row-fluid">
                        <label class="control-label">Venta</label>
                        <?php
                        $this->widget(
                                'bootstrap.widgets.TbToggleButton', array(
                            //  'name' => 'compra',
                            'model' => $model,
                            'attribute' => 'venta',
                            'onChange' => 'js:function($el, status, e){console.log($el, status, e);}'
                                )
                        );
                        ?>
                    </div>







                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <?php echo CHtml::button('Guardar', array('class' => 'btn btn-success', 'id' => 'saveModal')); ?>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'id' => 'cerrarModal',
        'icon' => 'remove',
        'label' => Yii::t('AweCrud.app', 'Cancel'),
        'htmlOptions' => array('data-dismiss' => 'modal')
    ));
    ?>
</div>
<?php $this->endWidget(); ?>