<?php
$modelDireccion = new Direccion('search');
$dataProvider = $modelDireccion->search();
$fData = $dataProvider->getData();
?>
<div class="widget ">
    <div class="widget-title">
        <h4><i class="icon-map-marker"></i> Direcciones</h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
        </span>
    </div>
    <div class="widget-body">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span5">
                    <?php
                    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
                        'type' => 'horizontal',
                        'id' => 'direccion-form',
                        'enableAjaxValidation' => true,
                        'action' => Yii::app()->createUrl('/crm/direccion/create'),
                        'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false,),
                        'enableClientValidation' => false,
                    ));
                    ?>
                    <?php
                    $modelDireccion = new Direccion;

                    $modelDireccion->tipo_entidad = 'EMPRESA';
//                    $modelDireccion->entidad_id = 1;
                    ?>
                    <?php echo $form->textFieldRow($modelDireccion, 'calle_principal', array('maxlength' => 64)) ?>

                    <?php echo $form->textFieldRow($modelDireccion, 'calle_secundaria', array('maxlength' => 64)) ?>

                    <?php echo $form->textFieldRow($modelDireccion, 'numero', array('maxlength' => 45)) ?>

                    <?php echo $form->dropDownListRow($modelDireccion, 'pais_id', array('' => ' -- Seleccione -- ') + CHtml::listData(Pais::model()->findAll(), 'id', Pais::representingColumn())) ?>

                    <?php echo $form->dropDownListRow($modelDireccion, 'provincia_id', array('' => ' -- Seleccione -- ') + CHtml::listData(Provincia::model()->findAll(), 'id', Provincia::representingColumn())) ?>

                    <?php echo $form->dropDownListRow($modelDireccion, 'ciudad_id', array('' => ' -- Seleccione -- ') + CHtml::listData(Ciudad::model()->findAll(), 'id', Ciudad::representingColumn())) ?>

                    <?php echo $form->textFieldRow($modelDireccion, 'referencia', array('maxlength' => 45)) ?>

                    <?php echo $form->hiddenField($modelDireccion, 'coord_x') ?>

                    <?php echo $form->hiddenField($modelDireccion, 'coord_y') ?>

                    <?php echo $form->hiddenField($modelDireccion, 'tipo_entidad') ?>

                    <?php echo $form->hiddenField($modelDireccion, 'entidad_id') ?>

                    <!--<a href="#" class="btn success ">Finalizar</a>-->
                    <div class="form-actions">
                        <?php
                        $this->widget('bootstrap.widgets.TbButton', array(
                            'id' => 'add-direccion',
                            'label' => 'Agregar dirección',
                            'encodeLabel' => false,
                            'icon' => 'plus-sign',
                            'htmlOptions' => array(
                                'onClick' => 'js:saveDireccion("#direccion-form")',
                                'class' => 'btn',
                            ),
                        ));
                        ?>
                        <?php
                        $this->widget('ext.bootstrap.widgets.TbButton', array(
                            'type' => 'button',
                            'id' => 'end_button',
                            'label' => 'Finalizar',
                            'htmlOptions' => array(
                                'href' => Yii::app()->createUrl('/crm/empresa/view/id/'),
                                'class' => 'btn-info'
                            )
                        ));
                        ?>
                    </div>
                    <?php $this->endWidget(); ?>

                </div>
                <div class="span7">
                    <!--<div id="map-container" class="">-->
                    <div id="map-canvas" style="width:100%; height: 375px"></div>
                    <!--</div>-->
                </div>
            </div>
            <hr>
            <div class="row-fluid">


                <div id="container_direccion" style='overflow:auto' class=""> 
                    <?php
                    $this->widget('ext.bootstrap.widgets.TbGridView', array(
                        'id' => 'direccion-grid',
                        'type' => 'striped bordered hover advance',
                        'dataProvider' => $dataProvider,
//                'columns' => array(
//                    array(
//                        'name' => 'Dirección',
//                        'value' => '$data->direccionGoogle',
//                        'type' => 'raw',
//                    ),
//                    array(
//                        'header' => 'Fact.',
//                        'name' => 'facturacion',
//                        'value' => '$data->facturacion==1?"<i class=\"icon-check\"></i>":""',
//                        'type' => 'raw',
//                    ), array(
//                        'header' => 'Ent.',
//                        'name' => 'entrega',
//                        'value' => '$data->entrega==1?"<i class=\"icon-check\"></i>":""',
//                        'type' => 'raw',
//                    ),
//                    array(
//                        'class' => 'CButtonColumn',
//                        'template' => '{update} {delete}',
//                        'buttons' => array(
//                            'update' => array(
//                                'label' => '<button class="btn btn-primary"><i class="icon-pencil"></i></button>',
//                                'options' => array('title' => 'Actualizar'),
//                                'imageUrl' => false,
//                                'url' => '$data->id',
//                                'click' => 'function() {formModalDireccion(true, $(this).attr("href")); return false;}',
//                                'visible' => 'Util::checkAccess(array("action_direccion_quickUpdate"))',
//                            ),
//                            'delete' => array(
//                                'label' => '<button class="btn btn-danger"><i class="icon-trash"></i></button>',
//                                'options' => array('title' => 'Eliminar'),
//                                'url' => 'Yii::app()->createUrl("crm/direccion/delete", array("id"=>$data->id))',
//                                'imageUrl' => false,
//                                'visible' => 'Util::checkAccess(array("action_direccion_delete"))',
//                            ),
//                        ),
//                        'htmlOptions' => array(
//                            'width' => '80px'
//                        )
//                    ),
//                ),
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>        </div>

