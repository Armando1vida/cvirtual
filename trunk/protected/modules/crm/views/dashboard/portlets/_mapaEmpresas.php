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
<div id="google_map" style="width: 600px; height: 400px;"></div>  
<form action="#" onsubmit="setDirections(this.from.value);
        return false">  
    <input type="text" size="43" id="fromAddress" name="from" value=""/>  
    <input type="submit" value="Calcula la ruta">  
</form>  
<div id="direcciones" style="width: 500px;"></div> 
<!--</div>-->



