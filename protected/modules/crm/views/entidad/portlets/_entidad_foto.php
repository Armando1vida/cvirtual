<?php
$modelImagen = new EntidadFoto('search');
$modelImagen->unsetAttributes();

$numentidad_fotos = $modelImagen->searchArchivosByEntidad($model->id)->itemCount;
?>

<div id="divfotografia_entidad" style='overflow:auto'  class='grid <?php echo($numentidad_fotos > 0) ? '' : 'hidden'; ?>'>
    <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'imagenes-grid',
        'type' => 'striped bordered hover advance',
        'showTableOnEmpty' => false,
        'emptyText' => '',
//            'afterAjaxUpdate' => "function(id,data){AjaxActualizarActividades();}",
        'dataProvider' => $modelImagen->searchArchivosByEntidad($model->id),
        'columns' => array(
            array(
                'header' => 'Información',
                'value' => '$data->generateview()',
                'type' => 'raw',
            ),
            array(
                'class' => 'CButtonColumn',
                'template' => '{delete}',
                'buttons' => array(
                    'delete' => array(
                        'url' => 'Yii::app()->createUrl("/crm/entidadFoto/delete", array("id"=>$data->id))',
                        'label' => '<button class="btn btn-danger"><i class="icon-trash"></i></button>',
                        'htmlOptions' => array(
//                                'onClick' => 'js:AjaxActualizarActividades()'
                        ),
                        'options' => array('title' => 'Eliminar'),
                        'imageUrl' => false,
                        'visible' => 'Util::checkAccess(array("action_nota_delete"))'
                    ),
                ),
            ),
        )
            )
    );
    ?>

</div>
<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'id' => 'add-subentidad',
    'label' => "Agregar Direccion",
    'label' => ($numentidad_fotos > 0 ? 'Gestionar Imagenes  ' : '<br>Agregar Imagenes'),
    'encodeLabel' => false,
    'icon' => $numentidad_fotos > 0 ? 'plus-sign' : ' icon-picture',
    'htmlOptions' => array(
        'onClick' => 'js:getModal("entidad_foto");',
        'class' => $numentidad_fotos > 0 ? '' : 'empty-portlet',
    ),
))
?>


</div > 
