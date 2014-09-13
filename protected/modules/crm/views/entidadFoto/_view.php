<?php
/** @var EntidadFotoController $this */
/** @var EntidadFoto $data */
?>
<div class="view">
                    
        <?php if (!empty($data->nombre)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->nombre); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->ruta)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('ruta')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->ruta); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->entidad->nombre)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('entidad_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->entidad->nombre); ?>
            </div>
        </div>

        <?php endif; ?>
    </div>