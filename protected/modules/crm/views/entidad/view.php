<?php
Util::tsRegisterAssetJs('view.js');
Util::tsRegisterAssetJs('gmap.js');
$this->pageTitle = $model->nombre;
?>
<script>
    var entidad_id = "<?php print $model->id; ?>";
</script>

<div class="row-fluid">
    <div class="span7">
        <!-- BEGIN CALENDAR PORTLET-->
        <div class="widget ">
            <div class="widget-title">
                <h4><i class="icon-screenshot"></i> Ubicación</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                </span>
            </div>
            <div class="widget-body">
                <?php $this->renderPartial('portlets/_ubicacion', array('model' => $model,)); ?>

            </div>
        </div>


        <?php $this->renderPartial('portlets/_entidad_foto', array('model' => $model, 'archivos' => $archivos)); ?>


    </div>
    <div class="span5">
        <div class="widget orange">
            <div class="widget-title">
                <h4><i class="icon-info"></i> Informaci&oacute;n General</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                </span>
            </div>

            <div class="widget-body">
                <div id="portlet_informacion">
                    <?php $this->renderPartial('portlets/_informacion', array('model' => $model, 'modelDireccion' => $modelDireccion)); ?>
                </div>
            </div>
        </div>
        <?php $model->matriz ? $this->renderPartial('portlets/_sucursales', array('model' => $model,)) : ''; ?>

    </div>
</div>


