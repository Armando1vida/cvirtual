<?php
$this->pageTitle = Yii::t('app', 'Roles y Asignaciones');
?>



<div class="well blue">
    <div class="well-header">
        <h5><i class="icon-key"> <?php echo ucwords(CrugeTranslator::t("roles"));?></i> </h5>
      
     </div>
    <div class="well-content">
        <div class="row-fluid">
            <div class='span12'>
            <?php echo CHtml::link('<i class="icon-plus icon-white"></i> '.CrugeTranslator::t("Crear Nuevo Rol")
                    ,Yii::app()->user->ui->getRbacAuthItemCreateUrl(CAuthItem::TYPE_ROLE),
                    array('class'=>'btn btn-success pull-right'));?>
            </div>
        </div>
        
        <?php $this->renderPartial('_listauthitems',array('dataProvider'=>$dataProvider),false);?>
    </div>
</div>