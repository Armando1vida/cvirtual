

<div class="widget blue">
    <div class="widget-title">
        <h4><i class="icon-map-marker "></i> Direccion</h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
        </span>
    </div>
    <div class="widget-body">
        <?php
        $this->widget('bootstrap.widgets.TbDetailView', array(
            'data' => $model,
            'nullDisplay' => '',
            'attributes' => array(
                array(
                    'name' => 'raking',
                    'class' => 'ext.DzRaty.DzRatyDataColumn', // #2 - Add a jQuery Raty data column
                    'options' => array(//      Custom options for jQuery Raty data column
                        'space' => FALSE
                    ),
                    'filter' => array('ext.DzRaty.DzRaty', array(// #3 - Add a jQuery Raty filter column
                            'model' => $model,
                            'attribute' => 'raking',
                            'options' => array(//      Custom options for jQuery Raty filter column
                                'cancel' => TRUE,
                                'cancelPlace' => 'right'
                            ),
                        ))
                ),
                'telefono',
                'celular',
                'email_',
                'descripcion',
            ),
        ));
        ?> 
        <p class="entity-user-info">
    <!--Creado por <span class="bold"><?php // echo Yii::app()->user->um->loadUserById($model->usuario_creacion_id)->username      ?></span>-->
            <?php // echo Util::nicetime($model->fecha_creacion)  ?>
            <?php // if ($model->usuario_actualizacion_id):  ?>
            <br>
            <!--Actualizado por &uacute;ltima vez por <span class="bold"><?php // echo Yii::app()->user->um->loadUserById($model->usuario_actualizacion_id)->username     ?></span>-->
            <?php // echo Util::nicetime($model->fecha_actualizacion)  ?>
            <?php // endif;  ?>
        </p>
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'id' => 'add-Oportunidad',
            'label' => ($model ? '' : '<br>') . 'Actualizar',
            'encodeLabel' => false,
            'icon' => $model ? 'icon-edit-sign' : 'tag',
            'htmlOptions' => array(
//                'onClick' => 'js:viewModal("campanias/campania/create/id_cuenta/' . $model->cuenta->id . '/id_contacto/' . $model->id . '",function(){'
//                . 'maskAttributes();})',
                'onClick' => 'js:viewModal("campanias/campania/update/id/' . $model->id . '",function(){'
                . 'maskAttributes();})',
//                'class' => $model ? '' : 'empty-portlet',
            ),
        ));
        ?>
    </div>




</div>
