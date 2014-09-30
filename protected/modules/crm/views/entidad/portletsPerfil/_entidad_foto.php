<?php
/** @var OportunidadController $this */
/** @var Oportunidad $model */
/** @var AweActiveForm $form */
// Prevenir que jquery se cargue dos veces
//Yii::app()->clientScript->scriptMap['jquery.js'] = false;
//Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;
Util::tsRegisterAssetJs('_form_modal.js');

$mensaje = "Galeria";
?>
<div class="widget white-full">
    <div class="widget-title">
        <h4><i class="icon-tag"></i> <?php echo $mensaje ?> </h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
        </span>

    </div>
    <div class="widget-body">

<!--        <hr class="clearfix">-->
        <?php if (!empty($model->entidadFotos)): ?>
            <?php $this->beginWidget('ext.bootstrap.widgets.TbImageGallery'); ?>            
            <?php $i = 0; ?>
            <?php $j = 0; ?>
            <?php foreach ($model->entidadFotos as $image): ?>
                <?php $i++; ?>
                <?php $j++; ?>
                <?php if ($i == 1): ?>
                    <div class="row-fluid">
                    <?php endif; ?>
                    <div class="span2">
                        <div class="thumbnail">
                            <div class="item">
                                <a class="fancybox-button" title="<?php echo $image->nombre; ?>"  href="<?php echo $image->ruta ?>" data-gallery="gallery">
                                    <img   src="<?php echo $image->ruta; ?>" alt="Photo">
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php if ($i == 5 || $j == count($model->entidadFotos)): ?>
                    </div>
                    <div class="space10"></div>
                    <?php $i = 0; ?>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php $this->endWidget(); ?>
        <?php else : ?>
            <div class=" hero-unit">
                <h1 class="text-center">Sin Im&aacute;genes</h1>
                <!--                
                                <p>Tagline</p>
                                <p>
                                    <a class="btn btn-primary btn-large">
                                        Learn more
                                    </a>
                                </p>-->
            </div>
        <?php endif; ?>


    </div>
</div>




