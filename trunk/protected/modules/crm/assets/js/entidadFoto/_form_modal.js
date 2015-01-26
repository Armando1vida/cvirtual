
var dataFile = {success: false};
//var btn_save_modal;btn_save_modal
$(function() {
    initcomponents();
});
function initcomponents() {
    /****************Upload file******************/
    //btn_actions
    $('#btn_upload_action,#btn_change_action').click(function() {
        if (dataFile.success) {
            $('#file_temp').click();
        }
        else {
            $('#file_temp').click();
        }

        return false;
    });
    //delete
    $("#btn_delete_action").click(function() {
        if (dataFile.success) {
            deleted({delete_url: dataFile.data.delete_url});
            $('#EntidadFoto_ruta').val('')
            $("#prev_row").toggle(100, function() {
                $("#select_row").toggle(50);
                $("#prev_row").removeClass('view-on');
            });
        }
        return false;
    });
    //action load
    $("#file_temp").change(function() {
        var file = $("#file_temp")[0].files[0];
        if (file) {
            //var fileName = file.name;
            //var fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
            var fileName = file.name;
            var fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);

            if (file && isImage(fileExtension)) {
                mostrarImagen(this, "#img_prev");
                upload({
                    successCall: function(data) {
                        if (data.success) {
                            if (dataFile.success) {
                                deleted({delete_url: dataFile.data.delete_url});
                                $("EntidadFoto_ruta").val('');
                            }
//                            $("#prev_file").html('<i class="icon icon-paper-clip"></i> ' + data.data.name);
                            //valor
                            $("#EntidadFoto_ruta").val(data.data.name);
                            //$("#prev_file").attr('href', data.data.src)
                            if (!$("#prev_row").hasClass('view-on')) {
                                $("#prev_row").toggle(100, function() {
                                    $("#select_row").toggle(50);
                                    $("#prev_row").addClass('view-on');
                                });
                            }
                        }
                    }
                });
            }
            else {
                $("#file_temp").val(null);
                bootbox.alert('El archivo seleccionado no es una imagen');
            }
        }
    });
}

function formUnset() {
    dataFile = {success: false};
    if ($("#prev_row").hasClass('view-on')) {
        $("#EntidadFoto_ruta").val('');
        $("#prev_row").toggle(100, function() {
            $("#select_row").toggle(50);
            $("#prev_row").removeClass('view-on');
        });
    }
    $("#entidad-foto-form").trigger('reset');
}
function ajaxSaveImagen($form_id) {
    ajaxValidarFormulario({
        formId: $form_id,
        beforeCall: function() {
            BloquearBotonesModal($form_id);
        },
        successCall: function(data) {
            console.log(data);
            if (data.success) {
//                var url = baseUrl + "incidencias/incidenciaProducto/ajaxCargarForm/incidencia_id/" + incidencia_id;
//                $.fn.yiiGridView.update('images-producto-grid', {url: baseUrl + 'incidencias/incidenciaProducto/create/incidencia_id/' + incidencia_id + '/cco/' + cco});
                formUnset();
                DesBloquearBotonesModal($form_id, 'Agregar', 'ajaxSaveImagen');

            }
            else {
                bootbox.alert(data.msj);
            }
        },
        errorCall: function(data) {
            DesBloquearBotonesModal($form_id, 'Agregar', 'ajaxSaveImagen');
        }
    });


}

/************* Upload archivo ****************/
/**
 * previsualización de la imagen
 * @autor Alex Yépez <alex.Yepez@outlook.com>
 * @param input
 */
function mostrarImagen(input, prev_id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(prev_id).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
function isImage(extension) {
    switch (extension.toLowerCase()) {
        case 'jpg':
        case 'gif':
        case 'png':
        case 'jpeg':
            return true;
            break;
        default:
            return false;
            break;
    }
}
function isDocument(extension) {
    switch (extension.toLowerCase()) {
        case 'pdf':
        case 'docx':
            return true;
            break;
        default:
            return false;
            break;
    }
}



/*******************Upload file**********************/
/**
 * upload de archivos
 * @autor Alex Yépez <alex.Yepez@outlook.com>
 * @param input
 */
function deleted(options) {
    $.ajax({
        url: options.delete_url,
        success: function(data) {
            if (data.success) {
                if (options.successCall) {
                    options.successCall(data);
                }

            }
            else {
                if (options.successCall) {
                    options.errorCall(data);
                }

            }
        }
    });
}
function upload(options) {
    //información del formulario
    var inputFileImage = document.getElementById('file_temp');
    if (inputFileImage.files[0]) {
        var file = inputFileImage.files[0];
        var formData = new FormData();
        formData.append('file', file);
        //hacemos la petición ajax
        $.ajax({
            url: baseUrl + 'crm/entidadFoto/ajaxUploadTemp',
            type: 'POST',
            // Form data
            //datos del formulario
            data: formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //una vez finalizado correctamente
            success: function(data) {
                var json = JSON.parse(data);
                if (options.successCall)
                    options.successCall(json);

                dataFile = json;
            },
            //si ha ocurrido un error
            error: function() {
            }
        });
    }
}
function formUnset() {
    dataFile = {success: false};
    if ($("#prev_row").hasClass('view-on')) {
        $("#IncidenciaProducto_url_archivo").val('');
        $("#prev_row").toggle(100, function() {
            $("#select_row").toggle(50);
            $("#prev_row").removeClass('view-on');
        });
    }
//    $("#OportunidadProducto_subtotal").val('');
//    $("#IncidenciaProducto_producto_id").select2("val", "");
    $("#entidad-foto-form").trigger('reset');
}