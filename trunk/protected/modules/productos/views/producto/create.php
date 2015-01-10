<?php
/** @var ProductoController $this */
/** @var Producto $model */
$this->pageTitle= Producto::label(); ?>
    <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
