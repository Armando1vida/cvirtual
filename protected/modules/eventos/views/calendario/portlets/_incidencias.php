<?php
/** @var IncidenciaController $this */
/** @var Incidencia $model */
$incidencias = Incidencia::model()->activos()->sinfecha()->findAll();
?>

<div class="widget purple">
    <div class="widget-title">
        <h4> <i class="icon-fire-extinguisher"></i> <?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo Incidencia::label(2) ?>  </h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <a href="javascript:;" class="icon-remove"></a>
        </span>
    </div>
    <div class="widget-body">
        <?php
        $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'incidencia-grid',
            'type' => 'striped bordered hover advance',
            "template" => "{items}{summary}{pager}",
            'dataProvider' => new CArrayDataProvider($incidencias, array('pagination' => array('pageSize' => 5))),
            'rowCssClass' => array('xe'),
            "rowHtmlOptionsExpression" => 'array("id"=>$data->id,"tipo"=>"incidencias_incidencia")',
            'emptyText'=>'No hay elementos sin agendar.',
            'columns' => array(
                'nombre'
            ),
        ));
        ?>
         
    </div>
</div>