<?php
$this->pageTitle = Yii::t('app', 'Roles y Asignaciones');
?>

<div class="well blue">
    <div class="well-header">
        <h5><i class="icon-key"><?php echo ucwords(CrugeTranslator::t("tareas")); ?></i> </h5>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <!--a href="javascript:;" class="icon-remove"></a-->
        </span>
    </div>
    <div class="well-content">
        <div class="row-fluid">
            <div class='span12'>
                <?php
                echo CHtml::link('<i class="icon-plus icon-white"></i> ' . CrugeTranslator::t("Crear Nueva Tarea")
                        , Yii::app()->user->ui->getRbacAuthItemCreateUrl(CAuthItem::TYPE_TASK), array('class' => 'btn btn-success pull-right'));
                ?>
            </div>
        </div>

        <?php $this->renderPartial('_listauthitems', array('dataProvider' => $dataProvider), false); ?>
    </div>
</div>
