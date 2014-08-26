<?php
/* $model:  es una instancia que implementa a CrugeAuthItemEditor */

$this->pageTitle = Yii::t('app', 'Roles y Asignaciones');
?>

<div class="well blue">
    <div class="well-header">
        <h5><i class="icon-key"> <?php echo ucwords(CrugeTranslator::t("Creando") . " " . CrugeTranslator::t($model->categoria)); ?></i></h5>

    </div>
    <div class="well-content">
        <?php $this->renderPartial('_authitemform', array('model' => $model), false); ?>
    </div>
</div>