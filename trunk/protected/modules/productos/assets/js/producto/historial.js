/**
 * function para exportar las llamadas a excel
 * @param boolen all true si se van a exportar todas las llamadas
 * @param string fecha intervalo de las fechas para las consultas
 * @param atring texto si las llamadas son de tipo entrantes o salientes
 */
function ExporProducto(all) {
    if (all) {
        $('#formId').attr('action', baseUrl + "productos/producto/exportar?producto_id=" + 1);
        $('#id_producto').val('todos');
        if ($('#producto-grid table tbody .empty').val() == '') {
            bootbox.alert("No existen productos que exportan.");
        }
        else {
            $('#formId').submit();
        }
    }
    else if (!all) {
        var selected = $("#producto-grid").selGridView("getAllSelection");
        if (selected != '') {
            $('#formId').attr('action', baseUrl + "productos/producto/exportar?producto_id=" + selected);
            $('#id_producto').val(selected);
            $('#formId').submit();
        } else {
            bootbox.alert("Seleccione al menos un producto.");
        }
    }
}
