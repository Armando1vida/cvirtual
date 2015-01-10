<?php
/** @var ProductoUnidadController $this */
/** @var ProductoUnidad $model */
$this->pageTitle=  ProductoUnidad::label(); 
?>
    <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
