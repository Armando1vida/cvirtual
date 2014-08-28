<?php
/** @var ItemController $this */
/** @var Item $data */
?>
<div class="view">
                    
        <?php if (!empty($data->num_foto)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('num_foto')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->num_foto); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->entidad_id)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('entidad_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->entidad_id); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->descripcion)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->descripcion); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->itemDireccion->coord_x)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('item_direccion_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->itemDireccion->coord_x); ?>
            </div>
        </div>

        <?php endif; ?>
    </div>