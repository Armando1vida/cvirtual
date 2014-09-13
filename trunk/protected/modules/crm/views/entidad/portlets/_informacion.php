

<?php
$this->widget('ext.DzRaty.DzRaty', array(
    'model' => $model,
    'attribute' => 'raking',
    'value' => $model->raking,
    'data' => array('1', '2', '3', '4', '5'),
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
        ),
        'telefono',
        'celular',
        array(
            'name' => 'email',
        ),
//        'num_item',
        array(
            'name' => 'categoria_id',
            'value' => ($model->categoria !== null) ? $model->categoria : null,
            'type' => 'html',
        ),
        array(
            'name' => 'industria_id',
            'value' => ($model->industria !== null) ? $model->industria : null,
            'type' => 'html',
        ),
//        'estado',
    ),
));
if ($modelDireccion != null):
    ?>
    <?php $this->renderPartial('portlets/_direccion', array('modelDireccion' => $modelDireccion)); ?>

<?php endif; ?>



<p class="entity-user-info">
    <!--Creado por <span class="bold"><?php // echo Yii::app()->user->um->loadUserById($model->usuario_creacion_id)->username              ?></span>-->
    <?php // echo Util::nicetime($model->fecha_creacion)  ?>
    <?php // if ($model->usuario_actualizacion_id):  ?>
    <br>
    <!--Actualizado por &uacute;ltima vez por <span class="bold"><?php // echo Yii::app()->user->um->loadUserById($model->usuario_actualizacion_id)->username              ?></span>-->
    <?php // echo Util::nicetime($model->fecha_actualizacion)  ?>
    <?php // endif;  ?>
</p>
<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'id' => 'add-actualizar',
    'label' => ($model ? '' : '<br>') . 'Actualizar Informacion',
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
