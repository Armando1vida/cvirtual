<?php
/** @var EmpresaController $this */
/** @var Empresa $model */
//$this->menu = array(
//    //array('label' => Yii::t('AweCrud.app', 'List') . ' ' . Empresa::label(2), 'icon' => 'list', 'url' => array('index')),
//    array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/administrar.png") . "</div>" . Yii::t('AweCrud.app', 'Manage'), 'url' => array('admin')),
//    array('label' => "<div>" . CHtml::image(Yii::app()->baseUrl . "/images/topbar/nuevo.png") . "</div>" . Yii::t('AweCrud.app', 'Create'), 'url' => array('create')),
//        //array('label' => Yii::t('AweCrud.app', 'View'), 'icon' => 'eye-open', 'itemOptions'=>array('class'=>'active')),
//        //array('label' => Yii::t('AweCrud.app', 'Update'), 'icon' => 'pencil', 'url' => array('update', 'id' => $model->id)),
//        //array('label' => Yii::t('AweCrud.app', 'Delete'), 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => Yii::t('AweCrud.app', 'Are you sure you want to delete this item?'))),
//);
Util::tsRegisterAssetJs('view.js');
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
                    <?php $this->renderPartial('portlets/_direccion', array('modelDireccion'=>$modelDireccion)); ?>

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

