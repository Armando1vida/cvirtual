<details style="text-align: right">
    <summary id="summary_direccion">Detalles Direccion</summary>

</details>
<div style="display:none" id="detalle_direccion">
    <h4 style="display: inline-block ; padding-right: 15px"><i class="icon-map-marker"></i><?php echo ' Detalles' ?> </h4>


    <?php
    $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $modelDireccion,
        'attributes' => array(
            'calle_secundaria',
            'numero',
            array(
                'name' => 'Direccion',
                'value' => ($modelDireccion->calle_principal !== null) ? $modelDireccion->calle_principal : null,
            ),
            array(
                'name' => 'Pais',
                'value' => ($modelDireccion->pais_id !== null) ? $modelDireccion->pais->nombre : null,
//            'type' => 'html',
            ),
            array(
                'name' => 'Provincia',
                'value' => ($modelDireccion->provincia_id !== null) ? $modelDireccion->provincia->nombre : null,
//            'type' => 'html',
            ),
            array(
                'name' => 'Ciudad',
                'value' => ($modelDireccion->ciudad_id !== null) ? $modelDireccion->ciudad->nombre : null,
//            'type' => 'html',
            ),
            'referencia',
        ),
    ));
    ?>
    <p class="entity-user-info">
<!--Creado por <span class="bold"><?php // echo Yii::app()->user->um->loadUserById($model->usuario_creacion_id)->username                ?></span>-->
<?php // echo Util::nicetime($model->fecha_creacion)      ?>
        <?php // if ($model->usuario_actualizacion_id):    ?>
        <br>
        <!--Actualizado por &uacute;ltima vez por <span class="bold"><?php // echo Yii::app()->user->um->loadUserById($model->usuario_actualizacion_id)->username               ?></span>-->
<?php // echo Util::nicetime($model->fecha_actualizacion)      ?>
        <?php // endif;   ?>
    </p>


</div>


