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
                <?php $this->renderPartial('portlets/_ubicacion', array('model' => $model)); ?>

            </div>
        </div>

        <!-- BEGIN CALENDAR PORTLET-->

        <div class="widget blue">
            <div class="widget-title">
                <h4><i class="icon-map-marker "></i> Direccion</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                </span>
            </div>
            <div class="widget-body">
                <div id="portlet_direccion">

                    <?php

                    if (!empty($modelDireccion)) {//cuando  hay datos o.O
                        $this->renderPartial('portlets/_direccion', array('modelDireccion' => $modelDireccion));
                    }
                    ?>

                </div>
            </div>
        </div>


        <!-- END CALENDAR PORTLET-->
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
                    <?php $this->renderPartial('portlets/_informacion', array('model' => $model)); ?>
                </div>
            </div>
        </div>

        <div class="widget purple">
            <div class="widget-title">
                <h4><i class="icon-tasks"></i> Productos Agregados </h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                </span>
            </div>
            <div class="widget-body">
                <?php $this->renderPartial('portlets/_items', array('model' => $model)); ?>
            </div>
        </div>
        <!-- END PROGRESS PORTLET-->
        <!-- BEGIN ALERTS PORTLET-->

        <!-- END ALERTS PORTLET-->
    </div>
</div>

