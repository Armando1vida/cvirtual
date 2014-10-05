<?php
/** @var EventoTipoController $this */
/** @var EventoTipo $model */
$this->pageTitle = EventoTipo::label(2);
?>
<div class="widget blue">
    <div class="widget-title">
        <h4><i class="icon-user"></i> <?php echo Yii::t('AweCrud.app', 'Create') . ' ' . EventoTipo::label(); ?></h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
        </span>
    </div>
    <div class="widget-body form">
        <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
</div> 