<?php
/** @var EventoPrioridadController $this */
/** @var EventoPrioridad $model */
$this->pageTitle = EventoPrioridad::label(2);
?>
<div class="widget blue">
    <div class="widget-title">
        <h4><i class="icon-calendar"></i> <?php echo Yii::t('AweCrud.app', 'Update') . ' ' . EventoPrioridad::label(); ?></h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <!--a href="javascript:;" class="icon-remove"></a-->
        </span>
    </div>
    <div class="widget-body">
        <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
</div>