<?php
// Prevenir que jquery se cargue dos veces
Yii::app()->clientScript->scriptMap['jquery.js'] = false;
?>
<div class="modal-header">

    <a class="close" data-dismiss="modal">&times;</a>
    <h4><i class="icon-calendar"></i> Información del Evento</h4>
</div>

<div class="modal-body">
    <?php
    $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'nullDisplay' => '',
        'attributes' => array(
            'nombre',
            array(
                'name' => 'evento_tipo_id',
                'value' => $model->eventoTipo,
                'visible' => (bool) $model->evento_tipo_id,
            ),
            array(
                'name' => 'evento_prioridad_id',
                'value' => $model->eventoPrioridad ? $model->eventoPrioridad : 'Normal',
            ),
//            array(
//                'name' => 'entidad_tipo',
//                'value' => $model->eventoPrioridad ? $model->eventoPrioridad : 'Normal',
//            ),
            array(
                'name' => 'entidad_id',
                'value' => $model->entidad_id ? $model->getNombreEntidad() : null,
            ),
            array(
                'name' => 'fecha_inicio',
                'value' => $model->fecha_inicio ? Util::FormatDate($model->fecha_inicio, "d/m/Y") : null,
            ),
            array(
                'name' => 'hora_inicio',
                'type' => 'time',
                'visible' => (bool) $model->hora_inicio,
            ),
            array(
                'name' => 'fecha_fin',
                'value' => $model->fecha_fin ? Util::FormatDate($model->fecha_fin, "d/m/Y") : null,
                'visible' => (bool) $model->fecha_fin,
            ),
            array(
                'name' => 'hora_fin',
                'type' => 'time',
                'visible' => (bool) $model->hora_fin,
            ),
            array(
                'name' => 'descripcion',
                'visible' => (bool) $model->descripcion,
            ),
        ),
    ));
    ?>

    <p class="entity-user-info">
        Creado por <span class="bold"><?php echo Yii::app()->user->um->loadUserById($model->usuario_creacion_id)->username ?></span>
        <?php echo Util::nicetime($model->fecha_creacion) ?>
        <?php if ($model->usuario_actualizacion_id): ?>
            <br>
            Actualizado por &uacute;ltima vez por <span class="bold"><?php echo Yii::app()->user->um->loadUserById($model->usuario_actualizacion_id)->username ?></span>
            <?php echo Util::nicetime($model->fecha_actualizacion) ?>
        <?php endif; ?>
    </p>
</div>

<div class="modal-footer">
    <?php
    Util::checkAccess(array("action_evento_updateModal")) ?
                    $this->widget('bootstrap.widgets.TbButton', array(
                        'type' => 'primary',
                        'icon' => 'pencil',
                        'label' => 'Editar Evento',
                        'encodeLabel' => false,
                        'id' => 'edit-' . date('U'),
                        'htmlOptions' => array(
                            'onClick' => 'js:viewModal("eventos/evento/update/id/' . $model->id . '",function(){'
                            . 'maskAttributes();})',
                        ),
                    )) : '';
    ?>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'icon' => 'ok',
        'label' => Yii::t('app', 'Aceptar'),
        'htmlOptions' => array('data-dismiss' => 'modal')
    ));
    ?>
</div>