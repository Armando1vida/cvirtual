/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(function() {

    $guardar = $('#saveModal');
    $guardar.on('click', function() {
        var frm = $('#producto-form');
//        alert('entra '+frm.attr('action'));
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function(data) {
//                console.log("data->"+data);
//                agregarProducto(data);
                if ($.isNumeric(data)) {
//                    console.log("nuevo->>"+data);
                    bootbox.confirm('Se ha guardado con exito, ¿Desea agregar el producto a la factura?', function(e) {
                        if (e) {
                           agregarProducto(data);
                        } 
                    })
                    
//                    bootbox.alert('Se ha guardado con exito');
                    $("#mainModal").load("producto");
//                    alert('Se ha guardado con exito');
                } else {
                    $("#mainModal").html(data);
                }
            },
            error: function(data) {
                $guardar.attr('data-dismiss', '');
                console.log('ERROR ' + data);
                alert('Error al enviar la solicitud');
            }
        });
    });
});