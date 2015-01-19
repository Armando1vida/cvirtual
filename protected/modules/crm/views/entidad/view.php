<?php
//Util::tsRegisterAssetJs('view.js');
//Util::tsRegisterAssetJs('gmap.js');
//Util::tsRegisterAssetJs('empresa.js');
$this->pageTitle = $model->nombre;
?>
<script>
    var entidad_id = "<?php print $model->id; ?>";
    var tipoMostrar = <?php echo $tipoMostrar; ?>;
</script>
<div class="row-fluid">

    <div class="span4">
        <div class="widget orange">
            <div class="widget-title">
                <h4><i class="icon-info"></i> Informaci&oacute;n General</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                </span>
            </div>

            <div class="widget-body">
                <div id="portlet_informacion">
                    <?php $this->renderPartial('portlets/_informacion', array('model' => $model)); ?>
                </div>
            </div>
        </div>

    </div>
    <div class="span8">
        <!-- BEGIN CALENDAR PORTLET-->
        <div class="widget ">
            <div class="widget-title">
                <h4><i class="icon-screenshot"></i> Ubicación</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                </span>
            </div>
            <div class="widget-body">
                <?php $this->renderPartial('portlets/_ubicacion', array('model' => $model, 'modelDireccion' => $modelDireccion)); ?>
            </div>
        </div>

    </div>
</div>
</div>
<div class="row-fluid">

    <div class="span7">
        <div class="widget orange">
            <div class="widget-title">
                <h4><i class="icon-info"></i> Direccion</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                </span>
            </div>

            <div class="widget-body">
                <div id="portlet_informacion">
                    <?php
                    if ($modelDireccion != null):
                        ?>
                        <?php $this->renderPartial('portlets/_direccion', array('modelDireccion' => $modelDireccion)); ?>

                    <?php endif; ?>
                    <?php
                    if ($modelDireccion == null):
                        ?>
                        <?php
                        $this->widget('bootstrap.widgets.TbButton', array(
                            'id' => 'add-subentidad',
                            'label' => "Agregar Sucursal",
                            'encodeLabel' => false,
                            'icon' => 'tag',
                            'htmlOptions' => array(
                                'onClick' => 'js:getModal();',
                                'class' => 'empty-portlet',
                            ),
                        ))
                        ?>
                    <?php endif; ?>
                </div>

            </div>
        </div>

    </div>
    <div class="span5">
        <!-- BEGIN CALENDAR PORTLET-->
        <div class="widget ">
            <div class="widget-title">
                <h4><i class="icon-screenshot"></i> Fotos</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                </span>
            </div>
            <div class="widget-body">
                <?php $this->renderPartial('portlets/_entidad_foto', array('model' => $model, 'archivos' => $archivos)); ?>
            </div>
        </div>

    </div>
</div>


