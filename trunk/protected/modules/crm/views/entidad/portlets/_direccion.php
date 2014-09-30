<details style="text-align: right">
    <summary id="summary_direccion">Detalles Direccion</summary>

</details>
<div style="display:none" id="detalle_direccion">
    <h4 style="display: inline-block ; padding-right: 15px"><i class="icon-map-marker"></i><?php echo ' Detalles' ?> </h4>


    <?php
    $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $modelDireccion,
        'attributes' => array(
            'calle_principal',
            'calle_secundaria',
            'numero',
//        'ciudad_id',
            array(
                'name' => 'Direccion',
                'value' => ($modelDireccion->ciudad !== null) ? $modelDireccion->ciudad : null,
//            'type' => 'html',
            ),
            'provincia_id',
            'pais_id',
            'referencia',
        ),
    ));
    ?>
    <p class="entity-user-info">
<!--Creado por <span class="bold"><?php // echo Yii::app()->user->um->loadUserById($model->usuario_creacion_id)->username              ?></span>-->
        <?php // echo Util::nicetime($model->fecha_creacion)    ?>
        <?php // if ($model->usuario_actualizacion_id):   ?>
        <br>
        <!--Actualizado por &uacute;ltima vez por <span class="bold"><?php // echo Yii::app()->user->um->loadUserById($model->usuario_actualizacion_id)->username             ?></span>-->
        <?php // echo Util::nicetime($model->fecha_actualizacion)    ?>
        <?php // endif;  ?>
    </p>

    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'id' => 'add-direccion',
        'label' => ($modelDireccion ? '' : '<br>') . 'Actualizar Direccion',
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
</div>


