


<?php
//var_dump($modelDireccion);
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $modelDireccion,
    'attributes' => array(
        'calle_principal',
        'calle_secundaria',
        'numero',
        'ciudad_id',
        array(
            'name' => 'ciudad_id',
            'value' => ($modelDireccion->ciudad !== null) ? CHtml::link($modelDireccion->ciudad, array('/ciudad/view', 'id' => $modelDireccion->ciudad->id)) . ' ' : null,
            'type' => 'html',
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

<p class="entity-user-info">
<!--Creado por <span class="bold"><?php // echo Yii::app()->user->um->loadUserById($model->usuario_creacion_id)->username         ?></span>-->
    <?php // echo Util::nicetime($model->fecha_creacion)    ?>
    <?php // if ($model->usuario_actualizacion_id):   ?>
    <br>
    <!--Actualizado por &uacute;ltima vez por <span class="bold"><?php // echo Yii::app()->user->um->loadUserById($model->usuario_actualizacion_id)->username        ?></span>-->
    <?php // echo Util::nicetime($model->fecha_actualizacion)    ?>
    <?php // endif;  ?>
</p>
<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'id' => 'add-direccion',
    'label' => ($modelDireccion ? '' : '<br>') . 'Actualizar',
    'encodeLabel' => false,
    'icon' => $modelDireccion ? 'icon-edit-sign' : 'tag',
    'htmlOptions' => array(
//                'onClick' => 'js:viewModal("campanias/campania/create/id_cuenta/' . $model->cuenta->id . '/id_contacto/' . $model->id . '",function(){'
//                . 'maskAttributes();})',
        'onClick' => 'js:viewModal("crm/direccion/update/id/' . $modelDireccion->id . '",function(){'
        . 'maskAttributes();})',
//                'class' => $model ? '' : 'empty-portlet',
    ),
));
?>
