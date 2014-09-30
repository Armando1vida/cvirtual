<?php
/** @var OportunidadController $this */
/** @var Oportunidad $model */
/** @var AweActiveForm $form */
// Prevenir que jquery se cargue dos veces
Yii::app()->clientScript->scriptMap['jquery.js'] = false;
Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;
Util::tsRegisterAssetJs('_form_modal.js');

$mensaje = "Galeria";
?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4><i class="icon-tag"></i> <?php echo $mensaje ?> </h4>
</div>
<div class="modal-body">
    <hr class="clearfix">
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
    <?php // echo $form->textFieldRow($model, 'nombre', array('maxlength' => 64)) ?>

    <?php // echo $form->textFieldRow($model, 'razon_social', array('maxlength' => 64)) ?>

    <?php // echo $form->textFieldRow($model, 'documento', array('maxlength' => 20)) ?>

    <?php // echo $form->textFieldRow($model, 'website', array('maxlength' => 45)) ?>

    <?php // echo $form->textFieldRow($model, 'telefono', array('maxlength' => 45)) ?>

    <?php // echo $form->textFieldRow($model, 'celular', array('maxlength' => 45)) ?>

    <?php // echo $form->textFieldRow($model, 'email', array('maxlength' => 45)) ?>

</div>

<div class="modal-footer">

</div>


