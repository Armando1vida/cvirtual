<?php
?>
<div class="widget yellow">
    <div class="widget-title">
        <h4> <i class="icon-ok"></i> Opciones</h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <a href="javascript:;" class="icon-remove"></a>
        </span>
    </div>
    <div class="widget-body">
         <?php
                    $this->widget('bootstrap.widgets.TbDetailView', array(
                        'data' => $model,
                        'attributes' => array(
                         
                            array(
                                'name' => 'compra',
                                'value' => $model->compra==0?'NO':'SI',
//                                'type' => 'boolean'
                            ),
                            array(
                                'name' => 'inventario',
                                'value' => $model->inventario==0?'NO':'SI',
//                                'type' => 'boolean'
                            ),
                            array(
                                'name' => 'fabricacion',
                                'value' => $model->fabricacion==0?'NO':'SI',
//                                'type' => 'boolean'
                            ),
                            array(
                                'name' => 'venta',
                                'value' => $model->venta==0?'NO':'SI',
//                                'type' => 'boolean'
                            ),
                           
                        ),
                    ));
                    ?>

    </div>
</div>