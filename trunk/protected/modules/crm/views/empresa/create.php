<?php
Util::tsRegisterAssetJs('form_wizard.js');

echo $this->renderPartial('steps/_form', array('model' => $model, 'categoria' => $categoria,
));
?>
<div class="row-fluid panel" id="dv_direccion"  >
<!--<div class="row-fluid panel" id="dv_direccion" <?php echo $model->isNewRecord ? 'hidden' : '' ?>>-->
    <?php $this->renderPartial('steps/_direccion', array('model' => $model)) ?>
</div>
