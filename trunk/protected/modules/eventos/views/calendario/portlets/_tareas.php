<?php
//$tareas = Tarea::model()->activos()->de_entidad($model->id,  Tarea::ENTIDAD_TIPO_CONTACTO)->ordenFechaFin()->findAll();
//Util::tsRegisterAssetJs('contactos.js');
$tareas = Tarea::model()->activos()->sinfecha()->findAll();
?>
<div class="widget red">
    <div class="widget-title">
        <h4><i class="icon-tasks"></i> Tareas</h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <a href="javascript:;" class="icon-remove"></a>
        </span>
    </div>
    <div class="widget-body">
            <?php
            $this->widget('bootstrap.widgets.TbGridView', array(
                'id' => 'tarea-grid',
                'type' => 'striped bordered hover advance',
                'emptyText'=>'No hay elementos sin agendar.',
                'rowCssClass' => array('xe'),
                "rowHtmlOptionsExpression" => 'array("id"=>$data->id,"tipo"=>"tareas_tarea")',
                'dataProvider' => new CArrayDataProvider($tareas, array('pagination' => array('pageSize' => 5))),
                'columns' => array(
                    array(
                        'header' => 'Nombre',
                        'name' => 'nombre',
                        'value' => '$data->nombre',
                        'type' => 'raw',
                    ),
                ),
            ));
            ?>
    </div>
</div>