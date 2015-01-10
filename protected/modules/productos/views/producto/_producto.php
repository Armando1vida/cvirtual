<?php Yii::app()->clientScript->scriptMap['jquery.js'] = false;
?>
<?php
Util::tsRegisterAssetJs('_producto.js')
?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel2">Añadir Productos</h3>
</div>
<div class="modal-body">
    <?php
    $this->widget('ext.Truulo.TruuloModuleSearch', array(
        'model' => $model,
        'grid_id' => 'producto-grid',
    ));
    ?>
    <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'producto-grid',
        'type' => 'striped bordered hover advance condensed',
         'afterAjaxUpdate' => "function(id,data){deshabilitarBotones(productosSeleccionados); $('.seleccionarProducto').on('click', function(data) {
        
        agregarProducto($(this).attr('id'));
      

    });}",
        'dataProvider' => $model->activos()->venta()->search(10),
//        'filter' => $model,
        'enableSorting' => false,
        'enablePagination' => FALSE,
        'columns' => array(
            'codigo',
            'nombre',
//            'unidad',
//            'subcategoria_producto_id',
            array(
                'name' => 'subcategoria_producto_id',
                'value' => 'isset($data->subcategoria_producto_id) ? ProductoSubcategoria::model()->findByPk($data->subcategoria_producto_id) : null',
            ),
//            'precio',
            /*
              array(
              'name' => 'estado',
              'filter' => array('ACTIVO'=>'Activo','INACTIVO'=>'Inactivo',),
              ),
             */
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                  'header'=>'Añadir',
                'template' => '{seleccionar}',
                'buttons' => array
                    (
                    'seleccionar' => array(
                      
                        'label' => 'Añadir Producto',
                        'options' => array("id" => '$data->id',
                            'class'=>'seleccionarProducto'),
//                        'click' => 'js:function(){
//                        agregarProducto($(this).attr("id"));
//                        }',
                        'icon' => 'icon-plus',
                    ),
                ),
            ),
        ),
    ));
    ?>
</div>
<div class="modal-footer">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
                        'type' => 'success',
                        'icon' => 'plus',
                        'label' => 'Crear Producto',
                        'encodeLabel' => false,
                        'id' => 'edit-' . date('U'),
                        'htmlOptions' => array(
                            'onClick' => 'js:viewModal("productos/producto/create",function(){})',
                        ),
                    ));
            
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Cerrar',
        'type' => 'primary',
        'htmlOptions' => array('data-dismiss' => 'modal'),
            )
    );
    ?>
</div>