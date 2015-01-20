///* 
// * To change this license header, choose License Headers in Project Properties.
// * To change this template file, choose Tools | Templates
// * and open the template in the editor.
// */
//$(function() {
////    getInfoPicture();
//});
//function getInfoPicture() {
//
//    $url = "crm/entidadFoto/ajaxGeInfoPicActual";
//    getAjaxData(
//            "POST",
//            $url,
//            "json",
//            {entidad_id: entidad_id},
//    function(data) {
//        if (data.success) {
////            width: 48 % ;
//            $("#porcentaje_progress").attr("style", "width:" + data.porcentaje);
//            $("#porcentaje_subidas").html(data.porcentaje);
//            $("#num_pic_uploads").html(" " + data.num_pic_uploads);
//        } else {
//            alert();
//        }
//    }
//    );
//}
//
//function guardarImagen() {
//    $archivos = [];
//    $url = "/crm/entidadFoto/guardarImagenes";
////    construyo los datos de los archivo para guardar en la base
//    $('.archivosNota').each(function(index) {
//        $archivos.push(
//                {
//                    nombreArchivo: $(this).attr('title'),
//                    url: $(this).attr('url'),
//                    filename: $(this).attr('filename'),
//                }
//        );
//    });
//    getAjaxData(
//            "POST",
//            $url,
//            "json",
//            {id: entidad_id, tipo: "EMPRESA", archivos: $archivos},
//    function(data) {
//        if (data.success) {
//            bootbox.alert(data.informacion);
//            $('.files').empty();
//            $.fn.yiiGridView.update('imagenes-grid');
//            getInfoPicture();
//        } else {
//            bootbox.alert(data.error);
//        }
//    }
//    );
//
//
//}
//
//function getAjaxData(type, url, dataType, data, callback) {
//    $.ajax({
//        type: type,
//        url: baseUrl + url,
//        dataType: dataType,
//        data: data,
//        success: function(data) {
//            if (data.success) {
//                callback(data);
//            }
//            else
//            {
//                callback(data);
//            }
//        }
//    });
//}
var dataFile = {success: false};
//var btn_save_modal;btn_save_modal
$(function() {
    initcomponents();

});
function ajaxSaveImagen($form_id) {

    ajaxValidarFormulario({
        formId: $form_id,
        beforeCall: function() {
            btn_save_modal.setProgress(0.6);
        },
        successCall: function(data) {
            if (data.success) {
                btn_save_modal.setProgress(1);
                btn_save_modal.stop();
                $url = "/galeria/imagen/ajaxCreate/id_album/" + id_album;
                updateGrid("imagen-modal-grid", $url);
            }
        },
        errorCall: function(data) {
            btn_save_modal.setProgress(1);
            btn_save_modal.stop();
//            DesBloquearBotonesModal($form_id, ' Crear', 'ajaxSaveImagen');
        }
    });
}

function initcomponents() {
    $("#btn_save_imagen").click(function(e) {
        e.preventDefault();
        btn_save_modal = Ladda.create(this);
        var form_id = "#imagen-form";
        btn_save_modal.start();
        ajaxSaveImagen(form_id);
        return false;
    });
    $('#btn_upload_action,#btn_upload_change').click(function() {
        if (dataFile.success) {
            $('#logo_imagen').click();
        }
        else {
            $('#logo_imagen').click();
        }

        return false;
    });
    $("#logo_imagen").change(function() {
        var file = $("#logo_imagen")[0].files[0];
        if (file) {
            var fileName = file.name;
            var fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
            if (file && isImage(fileExtension)) {
                mostrarImagen(this, "#img_prev");
                upload({
                    successCall: function(data) {
                        if (dataFile.success) {
                            deleted({delete_url: dataFile.data.delete_url});
                            $("#url_archivo").val('');
                        }
                        $("#url_archivo").val(data.data.name);
                        if ($("#content_prev").attr('hidden')) {
                            $("#content_prev").toggle(200, function() {
                                $("#content_action").toggle(200);
                                $("#content_prev").removeAttr('hidden');
                            });
                        }
                    }
                });
            }
            else {
                $("#url_archivo").val(null);
                bootbox.alert('El archivo seleccionado no es una imagen');
            }
        }
    });


    $('#popover2').on('show.bs.popover', function() {
        abrirpopover($(this).attr('entidad'));
    });
    $('#popover2').popover({
        html: true,
        placement: 'left',
        title: function() {
            return $("#popover-head-ElencoRepresentante").html();
        },
        content: function() {
            return $("#popover-content-ElencoRepresentante").html();
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
function deleted(options) {
    $.ajax({
        url: options.delete_url,
        success: function(data) {
            if (data.success) {
                if (options.successCall)
                    options.successCall(data);
            }
            else {
                if (options.successCall)
                    options.errorCall(data);
            }
        }
    });
}
function upload(options) {
    //información del formulario
    var inputFileImage = document.getElementById('logo_imagen');
    if (inputFileImage.files[0]) {
        var file = inputFileImage.files[0];
        var formData = new FormData();
        formData.append('file', file);
        //hacemos la petición ajax
        $.ajax({
            url: baseUrl + 'galeria/multimedia/ajaxUploadTemp',
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
function cerrarpopover() {

    $('#popover2').popover('hide');
//    $('#elenco-representante-form').trigger("reset");
//    $('#produccion-categoria-form').trigger("reset");
}
function abrirpopover(entidad_tipo) {
    $('#' + entidad_tipo + '_nombre_em_').attr('style', 'display:none;');
//    $('#Proyecto_nombre_em_').attr('style', 'display:none;');
}