<?php ?>

<div class="row-fluid">
    <div class="span12">
        <h1 class="name-title"><i class="icon-qrcode"></i> <?php echo Producto::label() . ' #' . Util::number_pad($model->id, 5); ?></h1>
    </div>
</div>
<div class="row-fluid">
    <div class="span7">
      <?php $this->renderPartial('portlets/_info', array('model' => $model)); ?>
    </div>
    <div class="span5">
        <?php $this->renderPartial('portlets/_detalle', array('model' => $model)); ?>
        <?php // $this->renderPartial('portlets/_opciones', array('model' => $model)); ?>
    </div>
</div>


