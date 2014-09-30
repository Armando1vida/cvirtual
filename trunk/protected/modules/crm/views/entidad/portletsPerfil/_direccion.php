<?php
$direccion = "Sin Direccion.";
$Numero = "Sin Numero de Casa.";
$Referencia = "Sin Referencia.";
//die(var_dump("",$model->direccion ));
if ($model->direccion !== null) {

    $direccionSecundaria = $model->direccion->calle_secundaria ? "y " . $model->direccion->calle_secundaria : "";
    $direccionPrincipal = $model->direccion->calle_principal ? $model->direccion->calle_principal : "";
    $direccion = $direccionPrincipal . "" . $direccionSecundaria;
    $Numero = ($model->direccion->numero ) ? $model->direccion->numero : "Sin Numero de Casa.";
    $Referencia = ($model->direccion->referencia ) ? $model->direccion->referencia : "Sin Referencia.";
}
?>
<p><label>Direccion </label>:<?php echo $direccion ?> </p>
<p><label>Numero </label>:<?php echo $Numero ?> </p>
<p><label>Referencia. </label>: <?php echo $Referencia ?> </p>
