

$(function() {
    /**
     * carga de ciudades
     */
//     console.log('entraJS');


    //cambiar

    $("#Ciudad_pais_id").change(function() {
//Actualizar Todos
        actualizarInformacionTodos("Ciudad_pais_id", "Ciudad_provincia_id", "Contacto_canton_id");

    });


});

/**
 * @author Miguel Alba < malba@tradesystem.com.ec >
 * @param {type} region_id
 * @param {type} provincia_id
 * @param {type} canton_id
 * @param {type} ciudad_id
 * @returns {undefined}
 */
function actualizarInformacionTodos(pais_id, provincia_id) {
    if ($("#" + pais_id).val() > 0)//cuando selecciona datos de la region
    {

        $('#s2id_' + provincia_id + ' a span').html('');

        //Provincias unicamente de la regionX Selecionada
        AjaxCargarListas(baseUrl + "crm/provincia/ajaxGetProvinciaPais",
                {pais_id: $("#" + pais_id).val()}, function(data) {
              
                  
            $("#" + provincia_id).html(data);
            $('#s2id_' + provincia_id + ' a span').html($("#" + provincia_id + " option[id='p']").html());
            $("#" + provincia_id).selectBox("refresh");
//            $('#s2id_Ciudad_provincia_id').children('a').children('.select2-chosen').append('Seleccione una Provincia');

        });
    }
//    else//selecciono otra ves 
//    {
//        AjaxListasTodas(region_id, provincia_id, canton_id, ciudad_id);
//    }
}

function AjaxCargarListas(url, data, callBack)
{
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success: function(data) {
            callBack(data);
        }
    });
}

function actualizarContactoCampania(Formulario) {

    ajaxValidarFormulario({
        formId: Formulario,
        successCall: function(data) {


            if (data.nosey_form_id != null)
            {
                if (formulario_obligatorio == 0 && actualizacion_info == 1) {
                    $("#mainModal").modal("hide");
                    bootbox.confirm("¿Desea llenar el formulario ?", function(result) {
                        if (result) {
                            var url = "nosey/default/ajaxCreateEntidadAnswer/entidad_tipo/campania/entidad_id/" + data.campania_id + "/contacto/" + data.contacto +
                                    "/form_id/" + data.nosey_form_id + "/modalView/standar/subentidad_tipo/llamada/subentidad_id/" + data.llamada_id;
                            $.ajax({
                                type: "POST",
                                url: baseUrl + url,
                                beforeSend: function() {
                                    var html = "";
                                    html += "<div class='modal-header'><a class='close' data-dismiss='modal'>&times;</a><h4><i class='icon-refresh'></i> Cargando</h4></div>";
                                    html += "<div class='loading'><img src='" + themeUrl + "images/truulo-loading.gif' /></div>";
                                    $("#mainModal").html(html);

                                },
                                success: function(data) {
                                    $("#mainModal").html(data);
                                    $("#mainModal").modal("show");
                                }

                            });
                        }
                    });
                }
                if (formulario_obligatorio == 1 && actualizacion_info == 1)
                {
                    var url = "nosey/default/ajaxCreateEntidadAnswer/entidad_tipo/campania/entidad_id/" + data.campania_id + "/contacto/" + data.contacto +
                            "/form_id/" + data.nosey_form_id + "/modalView/standar/subentidad_tipo/llamada/subentidad_id/" + data.llamada_id;
                    $.ajax({
                        type: "POST",
                        url: baseUrl + url,
                        beforeSend: function() {
                            var html = "";
                            html += "<div class='modal-header'><a class='close' data-dismiss='modal'>&times;</a><h4><i class='icon-refresh'></i> Cargando</h4></div>";
                            html += "<div class='loading'><img src='" + themeUrl + "images/truulo-loading.gif' /></div>";
                            $("#mainModal").html(html);

                        },
                        success: function(data) {
                            $("#mainModal").html(data);
                        }
                    });

                }
            }
            else
            {
                $("#mainModal").modal("hide");
            }

        }

    });

}

function encerarErrores(Formulario) {
    $inputs = ($(Formulario + ' input '));
    $selects = ($(Formulario + ' select '));
    $inputs.each(function(element, valor) {
        if ($(valor).parent().has('label')) {
            divControlGroup = $(valor).parent().parent().parent('.control-group');
            divControlGroup.removeClass('success');
            divControlGroup.removeClass('error');
            $(Formulario + ' span.help-inline').html('');
        }
        divControlGroup = $(valor).parent().parent('.control-group');
        divControlGroup.removeClass('success');
        divControlGroup.removeClass('error');
        $(Formulario + ' span.help-inline').html('');
    });
    $selects.each(function(element, valor) {
        divControlGroup = $(valor).parent().parent('.control-group');
        divControlGroup.removeClass('success');
        divControlGroup.removeClass('error');
        $(Formulario + ' span.help-inline').html('');
    });

}
