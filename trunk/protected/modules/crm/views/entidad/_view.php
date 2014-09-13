<?php
/** @var EntidadController $this */
/** @var Entidad $data */
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
                
        <?php if (!empty($data->razon_social)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('razon_social')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->razon_social); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->documento)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('documento')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->documento); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->website)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('website')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo AweHtml::formatUrl($data->website, true); ?>
                            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->raking)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('raking')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->raking); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->telefono)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->telefono); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->celular)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('celular')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->celular); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->email)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::mailto($data->email); ?>
                            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->max_entidad)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('max_entidad')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->max_entidad); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->estado)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->estado); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->matriz)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('matriz')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->matriz); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->categoria->nombre)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('categoria_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->categoria->nombre); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->industria->nombre)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('industria_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->industria->nombre); ?>
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
                
        <?php if (!empty($data->max_foto)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('max_foto')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->max_foto); ?>
            </div>
        </div>

        <?php endif; ?>
    </div>