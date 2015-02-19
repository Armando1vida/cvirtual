<?php
//Yii::app()->clientScript->registerScriptFile('https://maps.googleapis.com/maps/api/js?sensor=true&language=es');
Yii::app()->clientScript->registerScriptFile('https://maps.googleapis.com/maps/api/js?v=3.exp');
$cs = Yii::app()->getClientScript();
$baseUrl = Yii::app()->theme->baseUrl;
$assetjs = "/js/site/index.js";
Yii::app()->clientScript->registerScriptFile($baseUrl . $assetjs);
?>
<!--<style>
    .google-maps {
        position: relative;
        padding-bottom: 75%; // This is the aspect ratio
        height: 0;
        overflow: hidden;
    }
    .google-maps iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100% !important;
        height: 100% !important;
    }
</style>-->


<script>
    var empresas =<?php echo json_encode($points); ?>
</script>



<div  class="google-maps" id="empresas-map-canvas" style="width: 100%; height: 500px">
</div>





