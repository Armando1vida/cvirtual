

        <?php
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
                'raking',
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
        ?>

        <p class="entity-user-info">
            <!--Creado por <span class="bold"><?php // echo Yii::app()->user->um->loadUserById($model->usuario_creacion_id)->username ?></span>-->
            <?php // echo Util::nicetime($model->fecha_creacion) ?>
            <?php // if ($model->usuario_actualizacion_id): ?>
            <br>
            <!--Actualizado por &uacute;ltima vez por <span class="bold"><?php // echo Yii::app()->user->um->loadUserById($model->usuario_actualizacion_id)->username ?></span>-->
            <?php // echo Util::nicetime($model->fecha_actualizacion) ?>
            <?php // endif; ?>
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
                'onClick' => 'js:viewModal("crm/empresa/update/id/' . $model->id . '",function(){'
                . 'maskAttributes();})',
//                'class' => $model ? '' : 'empty-portlet',
            ),
        ));
        ?>
