<?php
/** @var DireccionController $this */
/** @var Direccion $data */
?>
<div class="view">
                    
        <?php if (!empty($data->calle_principal)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('calle_principal')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->calle_principal); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->calle_secundaria)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('calle_secundaria')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->calle_secundaria); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->numero)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('numero')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->numero); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->ciudad->nombre)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('ciudad_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->ciudad->nombre); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->provincia_id)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('provincia_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->provincia_id); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->pais_id)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('pais_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->pais_id); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->coord_x)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('coord_x')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->coord_x); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->coord_y)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('coord_y')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->coord_y); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->referencia)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('referencia')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->referencia); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->tipo_entidad)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('tipo_entidad')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->tipo_entidad); ?>
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
    </div>