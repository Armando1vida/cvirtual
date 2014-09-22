
<?php
Util::tsRegisterAssetJs('_entidad_foto.js');
?>

<div class = "widget bluesky">
    <div class = "widget-title">
        <h4><i class = "icon-camera"></i> Imagenes</h4>
        <span class = "tools">
            <a href = "javascript:;" class = "icon-chevron-down"></a>
        </span>
    </div>
    <div class = "widget-body">
        <?php
        $formA = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
            'id' => 'archivo-form',
            'type' => 'vertical',
            'enableAjaxValidation' => true,
            'clientOptions' => array('validateOnSubmit' => false, 'validateOnChange' => false,),
            'enableClientValidation' => false,
        ));
        ?>
        <?php
        Util::checkAccess(array("action_entidadFoto_uploadTmp")) ?
                        $formA->widget('xupload.XUpload', array(
                            'model' => $archivos,
                            'url' => CController::createUrl('/crm/entidadFoto/uploadTmp'),
                            'htmlOptions' => array('id' => 'archivo-form', 'icon' => 'ok',),
                            'attribute' => 'file',
                            'multiple' => true,
                            'autoUpload' => true,
                            'options' => array(
                                'maxFileSize' => 2000000,
                                'acceptFileTypes' => 'js:/(\.|\/)(gif|jpe?g|png)$/i',
                            )
                        )) : '';
        ?>

        <?php $this->endWidget(); ?>

        <?php
        Util::checkAccess(array("action_entidadFoto_guardarImagenes")) ?
                        $this->widget('bootstrap.widgets.TbButton', array(
                            'type' => 'success',
                            'icon' => 'icon-cloud',
//                            'label' => $model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
                            'label' => Yii::t('AweCrud.app', 'Subir Imagenes'),
                            'htmlOptions' => array(
                                'onclick' => 'js:guardarImagen("' . CController::createUrl('/crm/entidadFoto/guardarImagenes') . '")',
                            ),
                        )) : '';
        ?>
    </div>
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
//                array(
//                    'header' => 'Notas', // give new column a header
//                    'type' => 'raw', // set it to manual HTML
//                    'value' => '$data->archivosToString()' // here is where you call the new function
//                ),
                array(
                    'header' => 'Imagens Nombre', // give new column a header
                    'type' => 'raw', // set it to manual HTML
                    'value' => '$data->nombre' // here is where you call the new function
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
</div>
