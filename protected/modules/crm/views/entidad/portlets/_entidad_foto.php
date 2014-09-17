<?php

$this->widget('xupload.XUpload', array(
    'model' => $archivos,
    'url' => CController::createUrl('/index.php/inmuebles/inmuebleImagen/uploadTmp'),
    'htmlOptions' => array('id' => 'archivo-form'),
    'attribute' => 'file',
//    'pictures' => !$model->isNewRecord ? $model->inmuebleImagens : array(),
    'multiple' => true,
    'autoUpload' => true,
    'options' => array(
        'maxFileSize' => 2000000,
        'acceptFileTypes' => 'js:/(\.|\/)(gif|jpe?g|png)$/i',
    )
));
?>   