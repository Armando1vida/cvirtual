<?php
$modelDireccion = new Direccion('search');
$modelDireccion->unsetAttributes();
//$modelDireccion->entidad_tipo = Crm_Constants::ENTIDAD_TIPO_CONTACTO;
$modelDireccion->entidad_id = $model->id ? $model->id : 0;
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
        <div id="container_direccion" style='overflow:auto' class="<?php echo empty($fData) ? 'hidden' : ''; ?>"> 
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
        <?php
        echo empty($fData) ? '' : '<br>';
        $this->widget('bootstrap.widgets.TbButton', array(
            'id' => 'add-direccion',
            'label' => (!empty($fData) ? '' : '<br>') . 'Agregar dirección',
            'encodeLabel' => false,
            'icon' => 'plus-sign',
            'htmlOptions' => array(
                'onClick' => 'js:formModalDireccion()',
                'class' => (empty($fData) == false ? 'btn' : 'empty-portlet'),
            ),
        ));
        ?>
    </div>
</div>