<?php
/** @var CategoriaController $this */
/** @var Categoria $model */
$this->menu = array(
    array('label' => Yii::t('AweCrud.app', 'Create'), 'icon' => 'plus', 'url' => array('create'),
    //'visible' => (Util::checkAccess(array('action_incidenciaPrioridad_create')))
    ),
);
?>
<div id="flashMsg"  class="flash-messages">

</div> 
<div class="widget blue">
    <div class="widget-title">
        <h4> <i class="icon-fire-extinguisher"></i> <?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo Categoria::label(2) ?> </h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <!--a href="javascript:;" class="icon-remove"></a-->
        </span>
    </div>
    <div class="widget-body">

        <?php
        $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'categoria-grid',
            'type' => 'striped bordered hover advance',
            'afterAjaxUpdate' => 'js:function() { dzRatyUpdate(); }',
            'dataProvider' => $model->activos()->search(),
            'columns' => array(
                'nombre',
                array(
                    'name' => 'peso',
                    'class' => 'ext.dzRaty.DzRatyDataColumn', // #2 - Add a jQuery Raty data column
                    'options' => array(//      Custom options for jQuery Raty data column
                        'space' => FALSE
                    ),
                    'filter' => array('ext.dzRaty.DzRaty', array(// #3 - Add a jQuery Raty filter column
                            'model' => $model,
                            'attribute' => 'score',
                            'options' => array(//      Custom options for jQuery Raty filter column
                                'cancel' => TRUE,
                                'cancelPlace' => 'right'
                            ),
                        ))
                    ,
                    'header' => 'Estrellas',
                ),
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
</div>