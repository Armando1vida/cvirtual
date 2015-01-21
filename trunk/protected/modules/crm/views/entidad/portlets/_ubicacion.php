<?php
Yii::app()->clientScript->registerScriptFile('https://maps.googleapis.com/maps/api/js?sensor=true&language=es');
Util::tsRegisterAssetJs('empresa.js');
?>

<div class="contact-us">

    <div id="map-container" class="control-group">
        <div id="map-canvas" style="width: 100%; height: 320px"></div>
    </div>


</div>

<?php
if ($modelDireccion != null):
    ?>
    <?php $this->renderPartial('portlets/_direccion', array('modelDireccion' => $modelDireccion)); ?>

<?php endif; ?>

<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'id' => 'add-subentidad',
    'label' => "Agregar Direccion",
    'label' => ($modelDireccion ? 'Actualizar Direccion  ' : '<br>Agregar Direccion'),
    'encodeLabel' => false,
    'icon' => $modelDireccion ? 'plus-sign' : 'icon-fire-extinguisher',
    'htmlOptions' => array(
        'onClick' => 'js:getModalDireccion();',
        'class' => $modelDireccion ? '' : 'empty-portlet',
    ),
))
?>


