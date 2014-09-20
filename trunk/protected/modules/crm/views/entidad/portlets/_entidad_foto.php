
<?php
Util::tsRegisterAssetJs('_entidad_foto.js');
?>

<div class = "widget bluesky">
    <div class = "widget-title">
        <h4><i class = "icon-edit-sign"></i> Notas</h4>
        <span class = "tools">
            <a href = "javascript:;" class = "icon-chevron-down"></a>
            <a href="javascript:;" class="icon-remove"></a>
        </span>
    </div>
    <div class = "widget-body">
        <?php
//$modelNota = new Nota();
//$modelNota->entidad_id = $model->id;
//$modelNota->entidad_tipo = $model->tableName();
//$modelNota->usuario_creacion_id = Yii::app()->user->id;
//$form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
//    'id' => 'nota-form',
//    'type' => 'vertical',
//    'enableAjaxValidation' => true,
//    'clientOptions' => array('validateOnSubmit' => false, 'validateOnChange' => false,),
//    'enableClientValidation' => false,
//        ));
        ?>

        <?php // echo $form->hiddenField($modelNota, 'entidad_id') ?>
        <?php // echo $form->hiddenField($modelNota, 'entidad_tipo') ?>
        <?php // echo $form->hiddenField($modelNota, 'usuario_creacion_id') ?>
        <?php // echo $form->hiddenField($modelNota, 'id') ?>
        <?php // echo $form->textArea($modelNota, 'contenido', array('rows' => 3, 'class' => 'span12', 'required' => 'required')) ?>

        <?php // $this->endWidget(); ?>

        <!--<div  id='notaarchivos' class="row-fluid">-->
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
                            'htmlOptions' => array('id' => 'archivo-form'),
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
        Util::checkAccess(array("action_nota_create")) ?
                        $this->widget('bootstrap.widgets.TbButton', array(
                            'type' => 'success',
                            'icon' => 'ok',
//                            'label' => $model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
                            'label' => Yii::t('AweCrud.app', 'Create'),
                            'htmlOptions' => array(
                                'onclick' => 'js:guardarImagen("' . CController::createUrl('/crm/entidadFoto/guardarImagenes') . '")',
                            ),
                        )) : '';
        ?>
    </div>
    <div style='overflow-x:auto'> 
        <?php
//        $this->widget('bootstrap.widgets.TbGridView', array(
//            'id' => 'notas-grid',
//            'type' => 'striped bordered hover advance',
//            'showTableOnEmpty' => false,
//            'emptyText' => '',
//            'afterAjaxUpdate' => "function(id,data){AjaxActualizarActividades();}",
//            'dataProvider' => $modelNota->activos()->searchArchivosByEntidad($model->id, $model->tableName()),
//            'columns' => array(
//                array(
//                    'header' => 'Notas', // give new column a header
//                    'type' => 'raw', // set it to manual HTML
//                    'value' => '$data->archivosToString()' // here is where you call the new function
//                ),
//                array(
//                    'class' => 'CButtonColumn',
//                    'template' => '{delete}',
//                    'buttons' => array(
//                        'delete' => array(
//                            'url' => 'Yii::app()->createUrl("/notas/nota/delete", array("id"=>$data->id))',
//                            'label' => '<button class="btn btn-danger"><i class="icon-trash"></i></button>',
//                            'htmlOptions' => array(
//                                'onClick' => 'js:AjaxActualizarActividades()'),
//                            'options' => array('title' => 'Eliminar'),
//                            'imageUrl' => false,
//                            'visible' => 'Util::checkAccess(array("action_nota_delete"))'
//                        ),
//                    ),
//                ),
//            )
//                )
//        );
        ?>
    </div>
</div>
