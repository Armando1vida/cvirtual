<?php
// Obtener contactos activos
//$cobranzas = Cobranza::model()->activos()->de_contacto($model->id)->findAll();
$cobranzas = Cobranza::model()->activos()->sinfecha()->findAll();
?>
<div class="widget yellow">
    <div class="widget-title">
        <h4> <i class="icon-usd"></i> <?php echo Cobranza::label(2) ?></h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <a href="javascript:;" class="icon-remove"></a>
        </span>
    </div>
    <div class="widget-body">
        <?php
        $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'cobranza-grid',
            'emptyText' => 'No hay elementos sin agendar.',
            'type' => 'striped bordered hover advance',
            'dataProvider' => new CArrayDataProvider($cobranzas, array('pagination' => array('pageSize' => 5))),
            'rowCssClass' => array('xe'),
            "rowHtmlOptionsExpression" => 'array("id"=>$data->id,"tipo"=>"cobranzas_cobranza")',
            'columns' => array(
//                array(
//                    'name' => 'Nombre',
//                    'value' => '$data->nombre',
//                    'type' => 'raw',
//                ),
                array(
                    'header' => 'Monto Prestamo',
                    'name' => 'monto_prestamo',
                    'value' => '"$".number_format($data->monto_prestamo, 2)'
                ),
                array(
                    'header' => 'Fecha Vencimiento',
                    'name' => 'fecha_ven',
                    'type' => 'html',
                    'value' => 'Util::FormatDate($data->fecha_ven, "d/m/Y");'
                ),
            )
        ));
        ?>
    </div>
</div>