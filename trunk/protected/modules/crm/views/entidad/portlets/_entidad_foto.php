
<?php
Util::tsRegisterAssetJs('_entidad_foto.js');
?>

<div class="control-group">
    <div class="control-label"><i class="icon icon-paper-clip"></i> Archivo adjunto</div>
    <div class="controls">
        <div id="select_row">
            <button id="btn_upload_action" class="btn btn-mini">
                <i class="icon icon-plus"></i> Seleccione
            </button>
            <input type="file" id="file_temp" class="hidden">
            <?php echo $form->hiddenField($model, 'url_archivo') ?>
        </div>
        <div id="prev_row" hidden>
            <div class="row-fluid">
                <a id="prev_file" href="#"></a>
            </div>
            <div class="row-fluid">
                <button id="btn_change_action" class="btn btn-mini btn-primary">
                    <i class="icon-white icon-search"></i> Cambiar
                </button>
                <button id="btn_delete_action" class="btn btn-mini btn-danger">
                    <i class="icon-white icon-stop"></i> Eliminar
                </button>
            </div>
        </div>
    </div>
</div>