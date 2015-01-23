<div style='overflow-x:auto'> 

    <?php
    $modelImagen = new EntidadFoto('search');
    $modelImagen->unsetAttributes();
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'imagenes-grid',
        'type' => 'striped bordered hover advance',
        'showTableOnEmpty' => false,
        'emptyText' => '',
//            'afterAjaxUpdate' => "function(id,data){AjaxActualizarActividades();}",
        'dataProvider' => $modelImagen->searchArchivosByEntidad($model->id),
        'columns' => array(
            array(
                'header' => 'Información',
                'value' => '$data->generateview()',
                'type' => 'raw',
            ),
            array(
                'class' => 'CButtonColumn',
                'template' => '{delete}',
                'buttons' => array(
                    'delete' => array(
                        'url' => 'Yii::app()->createUrl("/crm/entidadFoto/delete", array("id"=>$data->id))',
                        'label' => '<button class="btn btn-danger"><i class="icon-trash"></i></button>',
                        'htmlOptions' => array(
//                                'onClick' => 'js:AjaxActualizarActividades()'
                        ),
                        'options' => array('title' => 'Eliminar'),
                        'imageUrl' => false,
                        'visible' => 'Util::checkAccess(array("action_nota_delete"))'
                    ),
                ),
            ),
        )
            )
    );
    ?>
</div > 
