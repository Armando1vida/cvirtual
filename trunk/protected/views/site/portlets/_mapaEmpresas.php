<?php
Yii::app()->clientScript->registerScriptFile('https://maps.googleapis.com/maps/api/js?sensor=true&language=es');
$cs = Yii::app()->getClientScript();
$baseUrl = Yii::app()->theme->baseUrl;
$assetjs = "/js/site/index.js";
Yii::app()->clientScript->registerScriptFile($baseUrl . $assetjs);
?>

<script>
    var empresas =<?php echo json_encode($points); ?>
</script>
<div id="empresas-map-canvas" style="width: 100%; height: 600px">

</div>




