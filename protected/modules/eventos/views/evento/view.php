<?php
$this->pageTitle = Evento::label(2);

$this->menu = array(
    array('label' => Yii::t('AweCrud.app', 'Create'), 'icon' => 'plus', 'visible' => Util::checkAccess(array("action_evento_create")), 'url' => array('create')),
    array('label' => Yii::t('AweCrud.app', 'Calendario'), 'icon' => 'icon-calendar', 'visible' => Util::checkAccess(array("action_calendario_index")), 'url' => array('calendario/index')),
);
?>
<div class="widget green">
    <div class="widget-title">
        <h4><i class="icon-calendar"></i>Información del Evento <?php echo $model->nombre ?></h4>
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
                'entidad_tipo',
                'entidad_id',
                'fecha_inicio',
                array(
                    'name' => 'hora_inicio',
                    'type' => 'time',
                    'visible' => (bool) $model->hora_inicio,
                ),
                array(
                    'name' => 'fecha_fin',
                    'visible' => (bool) $model->evento_tipo_id,
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
        <?php echo Util::checkAccess(array("action_cobranza_update")) ? Chtml::link('<i class="icon-edit-sign"></i> Actualizar', array('update', 'id' => $model->id), array('class' => 'btn')) : ''; ?>

    </div>
</div>