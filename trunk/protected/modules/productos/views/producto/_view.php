<?php
/** @var ProductoController $this */
/** @var Producto $data */
?>
<div class="view">
                    
        <?php if (!empty($data->codigo)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('codigo')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->codigo); ?>
            </div>
        </div>

        <?php endif; ?>
                
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
                
        <?php if (!empty($data->unidad->nombre)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('unidad_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->unidad->nombre); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->subcategoriaProducto->nombre)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('subcategoria_producto_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->subcategoriaProducto->nombre); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->grupoInventario->nombre)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('grupo_inventario_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->grupoInventario->nombre); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->precio)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('precio')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->precio); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->marca)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('marca')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->marca); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->imagen)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('imagen')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->imagen); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('compra')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->compra == 1 ? 'True' : 'False'); ?>
                            </div>
        </div>

                
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('inventario')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->inventario == 1 ? 'True' : 'False'); ?>
                            </div>
        </div>

                
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('fabricacion')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->fabricacion == 1 ? 'True' : 'False'); ?>
                            </div>
        </div>

                
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('venta')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->venta == 1 ? 'True' : 'False'); ?>
                            </div>
        </div>

                
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
    </div>