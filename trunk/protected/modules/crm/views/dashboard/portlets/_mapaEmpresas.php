<?php
//Yii::app()->clientScript->registerScriptFile('https://maps.googleapis.com/maps/api/js?sensor=true&language=es');
//die(var_dump($points));
?>
<script>
    var empresas =<?php echo json_encode($points); ?>
</script>
<!--<div id="map-container" class="control-group">-->
<div id="map-canvas" style="width: 100%; height: 600px">

</div>
<!--</div>-->



