<?php
// Obtener contactos activos
//$oportunidades = Oportunidad::model()->activos()->de_contacto($model->id)->findAll();
$oportunidades = Oportunidad::model()->activos()->sinfecha()->findAll();
//TODO: llamar desde el modelo
?>
<div class = "widget blue">
    <div class = "widget-title">
        <h4><i class = "icon-tags"></i> <?php echo Oportunidad::label(2) ?></h4>
        <span class = "tools">
            <a href = "javascript:;" class = "icon-chevron-down"></a>
            <a href="javascript:;" class="icon-remove"></a>
        </span>
    </div>
    <div class = "widget-body">

        <?php
        $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'oportunidad-grid',
            'emptyText'=>'No hay elementos sin agendar.',
            'type' => 'striped bordered hover advance',
            'dataProvider' => new CArrayDataProvider($oportunidades, array('pagination' => array('pageSize' => 5))),
            'rowCssClass' => array('xe'),
            "rowHtmlOptionsExpression" => 'array("id"=>$data->id,"tipo"=>"oportunidades_oportunidad")',
            'columns' => array(
                array(
                    'header' => 'Nombre',
                    'name' => 'nombre',
                    'value' => '$data->nombre',
                    'type' => 'raw',
                ),
//                array(
//                    'header' => 'Monto',
//                    'name' => 'monto',
//                    'value' => '"$".number_format($data->monto, 2)'
//                ),
//                array(
//                    'header' => 'Fecha Límite',
//                    'name' => 'fecha_fin',
//                    'value' => 'Util::FormatDate($data->fecha_fin, "d/m/Y");'
//                ),
            ),
        ));
        ?>
    </div>
</div>
