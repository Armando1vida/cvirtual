<?php
// Obtener contactos activos
$modelsucursales = Entidad::model()->findAll();
?>
<div class = "widget blue">
    <div class = "widget-title">
        <h4><i class = "icon-tags"></i>Sucursales</h4>
        <span class = "tools">
            <a href = "javascript:;" class = "icon-chevron-down"></a>
        </span>
    </div>
    <div class = "widget-body"><?php if ($modelsucursales): ?>
            <div style='overflow:auto'> 
                <?php
                $this->widget('bootstrap.widgets.TbGridView', array(
                    'id' => 'entidad-grid',
                    'type' => 'striped bordered hover advance',
                    'dataProvider' => $model->search(),
                    'columns' => array(
                        'nombre',
                        'razon_social',
                        'documento',
                        'website',
                        'raking',
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

        <?php endif; ?>
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'id' => 'add-Oportunidad',
            'label' => ($modelsucursales ? '' : '<br>') . "Agregar Sucursal",
            'encodeLabel' => false,
            'icon' => $modelsucursales ? 'plus-sign' : 'tag',
            'htmlOptions' => array(
                'onClick' => 'js:viewModal("crm/entidad/createSubentidad/id/' . $model->id . '",function(){'
                . 'maskAttributes();})',
                'class' => $modelsucursales ? '' : 'empty-portlet',
            ),
        ))
        ?>
    </div>
</div>
