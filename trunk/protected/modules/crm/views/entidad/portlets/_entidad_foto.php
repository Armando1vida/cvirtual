
<?php
Util::tsRegisterAssetJs('_entidad_foto.js');
$modelEntidadFoto = new EntidadFoto;
$modelEntidadFoto->entidad_id = $model->id;
?>

<form class="form-vertical" id="entidad-foto-form">
    <div class="control-group">
        <div class="control-label"><i class="icon icon-paper-clip"></i> Agregar Imagen</div>
        <div class="controls">
            <div id="select_row">
                <button id="btn_upload_action" class="btn btn-mini">
                    <i class="icon icon-plus"></i> Seleccione
                </button>
                <input type="file" id="file_temp" class="hidden">
                <input name="EntidadFoto[ruta]" id="EntidadFoto_ruta" type="hidden">        </div>
            <div id="prev_row" hidden="">
                <!--            <div class="row-fluid">
                                <a id="prev_file" href="#"></a>
                            </div>-->
                <div class="row-fluid">
                    <div class="thumbnail">
                        <img id="img_prev" data-src="holder.js/100%x200" alt="100%x300" src="#">
                    </div> 
                    <button id="btn_change_action" class="btn btn-mini btn-primary">
                        <i class="icon-white icon-search"></i> Cambiar
                    </button>
                    <button id="btn_delete_action" class="btn btn-mini btn-danger">
                        <i class="icon-white icon-stop"></i> Eliminar
                    </button>

                </div>
            </div>
        </div>
    </div>
</form>


<?php
Util::checkAccess(array("action_entidadFoto_guardarImagenes")) ?
                $this->widget('bootstrap.widgets.TbButton', array(
                    'type' => 'success',
                    'icon' => 'icon-cloud',
//                            'label' => $model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
                    'label' => Yii::t('AweCrud.app', 'Subir Imagenes'),
                    'htmlOptions' => array(
//                                'onclick' => 'js:guardarImgetAjaxData(type, url, dataType, data, callback)agen("' . CController::createUrl('/crm/entidadFoto/guardarImagenes') . '")',
                        'onclick' => 'js:guardarImagen()',
                    ),
                )) : '';
?>
<div class="space10"></div>

<div style='overflow-x:auto'> 

    <?php
    $modelImagen = new EntidadFoto('search');
    $modelImagen->unsetAttributes();
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
 