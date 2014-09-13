

<?php
$this->widget('ext.DzRaty.DzRaty', array(
    'model' => $model,
    'attribute' => 'raking',
    'value' => $model->raking,
    'data' => array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10'),
    'options' => array(
        'width' => 400,
        'readOnly' => true,
    ),
    'htmlOptions' => array('style' => 'display: inline-block')
));
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'nombre',
        'razon_social',
        'documento',
        array(
            'name' => 'website',
            'type' => 'url'
        ),
        'telefono',
        'celular',
        array(
            'name' => 'email',
            'type' => 'email'
        ),
        'num_item',
        array(
            'name' => 'categoria_id',
            'value' => ($model->categoria !== null) ? CHtml::link($model->categoria, array('/categoria/view', 'id' => $model->categoria->id)) . ' ' : null,
            'type' => 'html',
        ),
        array(
            'name' => 'industria_id',
            'value' => ($model->industria !== null) ? CHtml::link($model->industria, array('/industria/view', 'id' => $model->industria->id)) . ' ' : null,
            'type' => 'html',
        ),
        'estado',
    ),
));
if ($modelDireccion != null):
    ?>
    <details style="text-align: right">
        <summary id="summary_direccion">Detalles Direccion</summary>

    </details>
    <div style="display:none" id="detalle_direccion">
        <h4 style="display: inline-block ; padding-right: 15px"><i class="icon-youtube-play"></i><?php echo ' Detalles' ?> </h4>


        <?php
        $this->widget('bootstrap.widgets.TbDetailView', array(
            'data' => $modelDireccion,
            'attributes' => array(
                'calle_principal',
                'calle_secundaria',
                'numero',
//        'ciudad_id',
                array(
                    'name' => 'ciudad_id',
                    'value' => ($modelDireccion->ciudad !== null) ? $modelDireccion->ciudad : null,
//            'type' => 'html',
                ),
                'provincia_id',
                'pais_id',
                'coord_x',
                'coord_y',
                'referencia',
                'tipo_entidad',
                'entidad_id',
            ),
        ));
        ?>
    </div>
<?php endif; ?>



<p class="entity-user-info">
    <!--Creado por <span class="bold"><?php // echo Yii::app()->user->um->loadUserById($model->usuario_creacion_id)->username       ?></span>-->
    <?php // echo Util::nicetime($model->fecha_creacion)  ?>
    <?php // if ($model->usuario_actualizacion_id):  ?>
    <br>
    <!--Actualizado por &uacute;ltima vez por <span class="bold"><?php // echo Yii::app()->user->um->loadUserById($model->usuario_actualizacion_id)->username       ?></span>-->
    <?php // echo Util::nicetime($model->fecha_actualizacion)  ?>
    <?php // endif;  ?>
</p>
<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'id' => 'add-actualizar',
    'label' => ($model ? '' : '<br>') . 'Actualizar',
    'encodeLabel' => false,
    'icon' => $model ? 'icon-edit-sign' : 'tag',
    'htmlOptions' => array(
//                'onClick' => 'js:viewModal("campanias/campania/create/id_cuenta/' . $model->cuenta->id . '/id_contacto/' . $model->id . '",function(){'
//                . 'maskAttributes();})',
        'onClick' => 'js:viewModal("crm/entidad/update/id/' . $model->id . '",function(){'
        . 'maskAttributes();})',
//                'class' => $model ? '' : 'empty-portlet',
    ),
));
?>
