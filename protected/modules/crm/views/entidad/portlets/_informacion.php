

<?php
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
?>
<?php
if ($modelDireccion != null):
    ?>
    <?php $this->renderPartial('portlets/_direccion', array('modelDireccion' => $modelDireccion)); ?>

<?php endif; ?>
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
