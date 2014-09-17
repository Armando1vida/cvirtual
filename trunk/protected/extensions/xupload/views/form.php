<!-- The file upload form used as target for the file upload widget -->
<?php if ($this->showForm) echo CHtml::beginForm($this->url, 'post', $this->htmlOptions); ?>

<div class=" fileupload-buttonbar">
    <div class="span7">
        <!-- The fileinput-button span is used to style the file input field as button -->
        <span class="btn btn-mini  btn-default fileinput-button">
            <i class="icon-plus icon-white"></i>
            <span><?php echo $this->t('1#Agregar imágenes|0#Choose file', $this->multiple); ?></span>
            <?php
            if ($this->hasModel()) :
                echo CHtml::activeFileField($this->model, $this->attribute, $htmlOptions) . "\n";
            else :
                echo CHtml::fileField($name, $this->value, $htmlOptions) . "\n";
            endif;
            ?>
        </span>
        <?php // if ($this->multiple) { ?>
        <!--		<button type="submit" class=" btn-mini btn btn-primary start">
                                <i class="icon-upload icon-white"></i>
                                <span>Start upload</span>
                        </button>
                        <button type="reset" class="btn-mini btn btn-warning cancel">
                                <i class="icon-ban-circle icon-white"></i>
                                <span>Cancel upload</span>
                        </button>-->
        <!--		<button type="button" class="  btn btn-danger delete">
                                <i class="icon-trash icon-white"></i>
                                <span>Delete</span>
                        </button>
                        <input type="checkbox" class="toggle">-->
        <?php // } ?>
    </div>
    <div class="span5">
        <!-- The global progress bar -->
        <div class="progress progress-success progress-striped active fade">
            <div class="bar" style="width:0%;"></div>
        </div>
    </div>
</div>
<!-- The loading indicator is shown during image processing -->
<div class="fileupload-loading">

</div>
<br>
<!-- The table listing the files available for upload/download -->
<!--<select class='hidden' name='archivos[]' multiple>-->
<?php // var_dump($this->model->algo)?>
<table class="table table-striped">
    <tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery">
        <?php if ($this->pictures) : ?>
            <?php foreach ($this->pictures as $key => $value) { ?>
                <?php
                $ruta = explode('/', $value->ruta);
                $nombreArchivo = $ruta[count($ruta) - 1];
                $id_imagen = $value->id;
                $id_inmueble = $value->inmueble_id;
                ?>
                <tr class="template-download fade in" style="height: 59px;">
                    <td class="preview">
                        <a href="<?php echo $value->ruta; ?>" title="<?php echo $value->nombre; ?>" rel="gallery" download="<?php echo $value->nombre; ?>">
                            <img width="50" height="50" src="<?php echo $value->ruta; ?>">
                        </a>
                    </td>
                    <td class="name">
                        <a href="<?php echo $value->ruta; ?>" url="<?php echo $value->ruta; ?>" title="<?php echo $value->nombre; ?>" filename="<?php echo $nombreArchivo; ?>" rel="gallery" download="<?php echo $value->nombre; ?>"><?php echo $value->nombre; ?></a>
                    </td>
                    <td colspan="2"></td>
                    <td class="delete">
                        <button class="btn-mini btn btn-danger" data-type="POST" data-url="/SistemaInmobiliario/inmuebles/inmuebleImagen/uploadTmp?_method=deleteUpdate&amp;file_name=<?php echo $nombreArchivo; ?>&amp;id=<?php echo $value->id; ?>&amp;id_inmueble=<?php echo $value->inmueble_id; ?>">
                            <i class="icon-trash icon-white"></i>
                            <span>Delete</span>
                        </button>
                        <input type="hidden" name="delete" value="1">
                    </td>
                </tr>

            <?php } ?>
        <?php endif; ?>

    </tbody>
</table>
<?php if ($this->showForm) echo CHtml::endForm(); ?>
