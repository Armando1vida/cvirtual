var entidad_id;
var entidad_tipo;
$(function() {
    //update
    if ($("#Contacto_id").val()) {
        entidad_id = $("#Contacto_id").val();
        entidad_tipo = "CONTACTO";
    }
    //select2
    $("#Contacto_cuenta_id").select2({
        minimumInputLength: 3,
        initSelection: function(element, callback) {
            if ($(element).val()) {
                var data = {id: element.val(), text: $(element).attr('selected-text')};
                callback(data);
            }
        },
        ajax: {// instead of writing the function to execute the request we use Select2's convenient helper
            url: baseUrl + "crm/cuenta/ajaxlistCuentas",
            type: "get",
            dataType: 'json',
            data: function(term, page) {
                return {
                    search_value: term, // search term
                };
            },
            results: function(data, page) { // parse the results into the format expected by Select2.
                // since we are using custom formatting functions we do not need to alter remote JSON data
                return {results: data};
            }
        }
    });
});
/**
 * @author Alex Yepez <ayepez@tradesystem.com.ec>
 * funcion de registro del contacto
 * @param {type} form_id
 * @returns {undefined}
 */
function save(form_id) {
    ajaxValidarFormulario({
        formId: form_id,
        beforeCall: function() {
            BloquearBotonesModal(form_id);
        },
        successCall: function(data) {
            if (!$("#Contacto_id").val()) {
                entidad_id = data.guardar.id_contacto;
                entidad_tipo = data.guardar.entidad_tipo;
                habilitarPaneles();
                $("#btn_finalizar").attr('href', baseUrl + 'crm/contacto/view/id/' + entidad_id);
            }
            else {
                DesBloquearBotonesModal(form_id, ' Guardar', 'save');
                bootbox.alert('Se actualizó correctamente la información');
            }
        },
        errorCall: function(data) {
            DesBloquearBotonesModal(form_id, ' Crear', 'save');
        }
    });
}
/**
 * @author Alex Yepez <ayepez@tradesystem.com.ec>
 * carga del modal para registrar direcciones
 * @param {type} isUpdate
 * @param {type} id
 * @returns {undefined}
 */
function formModalDireccion(isUpdate, id) {
    url = isUpdate ? 'crm/direccion/quickUpdate?id=' + id : 'crm/direccion/quickCreate?entidad_tipo=' + entidad_tipo + '&entidad_id=' + entidad_id;
    viewModal(url, function() {
    });
}
/**
 * @author Alex Yepez <ayepez@tradesystem.com.ec>
 * carga del modal de registro de emails
 * @param {type} isUpdate
 * @param {type} id
 * @returns {undefined}
 */
function formModalEmail(isUpdate, id) {
    url = isUpdate ? 'crm/email/quickUpdate?id=' + id : 'crm/email/quickCreate?entidad_tipo=' + entidad_tipo + '&entidad_id=' + entidad_id;
    viewModal(url, function() {
    });
}
function formModalTelefono(isUpdate, id) {
    url = isUpdate ? 'crm/telefono/quickUpdate?id=' + id : 'crm/telefono/quickCreate?entidad_tipo=' + entidad_tipo + '&entidad_id=' + entidad_id;
    viewModal(url, function() {
    });
}
function formModalRedSocial(isUpdate, id) {
    url = isUpdate ? 'crm/redSocial/quickUpdate?id=' + id : 'crm/redSocial/quickCreate?entidad_tipo=' + entidad_tipo + '&entidad_id=' + entidad_id;
    viewModal(url, function() {
    });
}
function updateGrid(id_grid, data, url) {
    $.fn.yiiGridView.update(id_grid, {
        data: {data: data},
        url: baseUrl + url
    });
    $nameGrid = id_grid.split('-');
    if ($("#add-" + $nameGrid[0]).hasClass('empty-portlet')) {
        $("#container_" + $nameGrid[0]).append('<br>');
        $("#container_" + $nameGrid[0]).removeClass('hidden');
        $("#add-" + $nameGrid[0]).removeClass('empty-portlet');
        $("#add-" + $nameGrid[0] + ' br').remove();
    }
}

function habilitarPaneles() {
    $('#dv_contacto').animate({
        'height': 'toggle'
    }, 200, function() {
        $('div.panel').animate({
            'height': 'toggle'
        }, 200, function() {
        });
    });
}