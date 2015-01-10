  <div id="portlet_info">
            <div class="widget blue ">
                <div class="widget-title">
                    <h4><i class="icon-info-sign"></i> Información General <?php echo Producto::label() ?></h4>
                    <span class="tools">
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                        </span>
                    </span>
                </div>

                <div class="widget-body">
                    <?php
                    $this->widget('bootstrap.widgets.TbDetailView', array(
                        'data' => $model,
                        'attributes' => array(
                            'codigo',
                            'nombre',
                            array(
                                'name'=>'descripcion',
                                'value'=>$model->descripcion ? $model->descripcion:'',
                            ),
                            
                            array(
                                'name' => 'unidad_id',
//                                'value' => ($model->unidad !== null) ? CHtml::link($model->unidad, array('/productos/productoUnidad/view', 'id' => $model->unidad->id)) . ' ' : null,
                                'value' => ($model->unidad !== null) ? $model->unidad : '',
                                'type' => 'html',
                            ),
                            array(
                                'name' => 'categoriaProducto',
//                                'value' => ($model->subcategoriaProducto !== null) ? CHtml::link($model->subcategoriaProducto, array('/productos/productoSubcategoria/view', 'id' => $model->subcategoriaProducto->id)) . ' ' : null,
                                'value' => ($model->subcategoriaProducto->categoriaProducto !== null) ? $model->subcategoriaProducto->categoriaProducto : '',
                                'type' => 'html',
                            ),
              
                            
                            array(
                                'name' => 'subcategoria_producto_id',
//                                'value' => ($model->subcategoriaProducto !== null) ? CHtml::link($model->subcategoriaProducto, array('/productos/productoSubcategoria/view', 'id' => $model->subcategoriaProducto->id)) . ' ' : null,
                                'value' => ($model->subcategoriaProducto !== null) ? $model->subcategoriaProducto : '',
                                'type' => 'html',
                            ),
                              
                            'tipo',
                     
                            
//                            array(
//                                'name' => 'compra',
//                                'type' => 'boolean'
//                            ),
//                            array(
//                                'name' => 'inventario',
//                                'type' => 'boolean'
//                            ),
//                            array(
//                                'name' => 'fabricacion',
//                                'type' => 'boolean'
//                            ),
//                            array(
//                                'name' => 'venta',
//                                'type' => 'boolean'
//                            ),
                            'estado',
                        ),
                    ));
                    ?>
                    <hr>
                    <?php echo Util::checkAccess(array("action_producto_update")) ? Chtml::link('<i class="icon-edit-sign"></i> Actualizar', array('update', 'id' => $model->id), array('class' => 'btn')) : '' ?>
                </div>
            </div>
        </div>