<?php
Yii::app()->clientScript->registerScriptFile('https://maps.googleapis.com/maps/api/js?sensor=true&language=es');

Util::tsRegisterAssetJs('_direccion.js');
Util::tsRegisterAssetJs('_form.js');
Util::tsRegisterAssetJs('gmap.js');
?>
<div class="row-fluid" id="dv_form">
    <?php
    echo $this->renderPartial('steps/_form', array('model' => $model
    ));
    ?>
</div>
<div class="row-fluid panel hidden" id="dv_direccion" >
    <?php $this->renderPartial('steps/_direccion', array('modelDireccion' => $model->direccion)) ?>
</div>
