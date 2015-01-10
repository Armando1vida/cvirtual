/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function() {
    // declarar variables
    $categoria = $('#Producto_categoria');
    $subCategoria = $('#Producto_subcategoria_producto_id');
    $venta = $('#Producto_venta');
    $precioLabel= $('label[for=Producto_precio]');
       $precio= $('#Producto_precio');
    //buscar las tpificaciones del negocio
    $categoria.on('change', function() {
//        obtenerTipificaciones($negocio.val(), function() {
//            $tipificacion.trigger('change');
//        });
        if ($categoria.val() === '') {//si el combo NEGOCIO no tiene ningun valor bloquear flujo
            $subCategoria.val(0);
            $subCategoria.prop('disabled', 'disabled');
           
        }
        else
        {
            $subCategoria.prop('disabled', false);
        }

    });
    
   
    
   
    
});


