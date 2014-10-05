<?php
/** @var EventoController $this */
/** @var Evento $model */
$this->pageTitle = Evento::label(2);
?>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>