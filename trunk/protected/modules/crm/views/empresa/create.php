<?php
Util::tsRegisterAssetJs('form_wizard.js');
Util::tsRegisterAssetJs('gmap.js');
Yii::app()->clientScript->registerScriptFile('https://maps.googleapis.com/maps/api/js?sensor=true&language=es');
?>
<div class="row-fluid" id="dv_form">
    <?php
    echo $this->renderPartial('steps/_form', array('model' => $model, 'categoria' => $categoria,
    ));
    ?>
</div>
<div class="row-fluid panel hidden " id="dv_direccion" >
    <?php $this->renderPartial('steps/_direccion', array('model' => $model)) ?>
</div>
