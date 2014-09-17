<?php
// Obtener contactos activos
$model_subentidad = new Entidad("search");
$model_subentidad->unsetAttributes();
$modelsucursales = Entidad::model()->searchSubendidad($model->id);

$data = $modelsucursales->getdata();

?>
<div class = "widget blue">
    <div class = "widget-title">
        <h4><i class = "icon-tags"></i>Sucursales</h4>
        <span class = "tools">
            <a href = "javascript:;" class = "icon-chevron-down"></a>
        </span>
    </div>
    <div class = "widget-body">
        <div id="informacion_subentidad" class="<?php echo count($data) >0? '' : 'hidden' ?> "style=overflow:auto"> 
            <?php
            $this->widget('bootstrap.widgets.TbGridView', array(
                'id' => 'subentidad-grid',
                'type' => 'striped bordered hover advance',
                'dataProvider' => $model_subentidad->searchSubendidad($model->id),
                'columns' => array(
                    'nombre',
                    'razon_social',
                    'documento',
                    'telefono',
                    array(
                        'class' => 'CButtonColumn',
                        'template' => '{update} {delete}',
                        'afterDelete' => 'function(link,success,data){ 
                    if(success) {
                         $("#flashMsg").empty();
                         $("#flashMsg").css("display","");
                         $("#flashMsg").html(data).animate({opacity: 1.0}, 5500).fadeOut("slow");
                    }
                    }',
                        'buttons' => array(
                            'update' => array(
                                'label' => '<button class="btn btn-primary"><i class="icon-pencil"></i></button>',
                                'options' => array('title' => 'Actualizar'),
                                'imageUrl' => false,
                            //'visible' => 'Util::checkAccess(array("action_incidenciaPrioridad_update"))'
                            ),
                            'delete' => array(
                                'label' => '<button class="btn btn-danger"><i class="icon-trash"></i></button>',
                                'options' => array('title' => 'Eliminar'),
                                'imageUrl' => false,
                            //'visible' => 'Util::checkAccess(array("action_incidenciaPrioridad_delete"))'
                            ),
                        ),
                        'htmlOptions' => array(
                            'width' => '80px'
                        )
                    ),
                ),
            ));
            ?>


        </div>
        <br>


        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'id' => 'add-subentidad',
            'label' => ($data ? '' : '<br>') . "Agregar Sucursal",
            'encodeLabel' => false,
            'icon' => $data ? 'plus-sign' : 'tag',
            'htmlOptions' => array(
                'onClick' => 'js:viewModal("crm/entidad/createSubentidad/id/' . $model->id . '",function(){'
                . 'maskAttributes();})',
                'class' => $data ? '' : 'empty-portlet',
            ),
        ))
        ?>
    </div>
</div>
