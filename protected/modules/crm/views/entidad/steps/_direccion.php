<div class="widget ">
    <div class="widget-title">
        <h4><i class="icon-map-marker"></i> Direcciones</h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
        </span>
    </div>
    <div class="widget-body">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span5">
                    <?php
                    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
                        'type' => 'horizontal',
                        'id' => 'direccion-form',
                        'enableAjaxValidation' => true,
                        'action' => $modelDireccion->isNewRecord ? Yii::app()->createUrl('/crm/direccion/create') : Yii::app()->createUrl('/crm/direccion/update/id/' . $modelDireccion->id),
                        'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false,),
                        'enableClientValidation' => false,
                    ));
                    ?>
                    <?php
//                    $modelDireccion->tipo_entidad = 'EMPRESA';
//                    $modelDireccion->entidad_id = 1;
                    ?>
                    <?php echo $form->textFieldRow($modelDireccion, 'calle_principal', array('maxlength' => 64)) ?>

                    <?php echo $form->textFieldRow($modelDireccion, 'calle_secundaria', array('maxlength' => 64)) ?>

                    <?php echo $form->textFieldRow($modelDireccion, 'numero', array('maxlength' => 45)) ?>


                    <?php
                    if ($modelDireccion->isNewRecord) {
                        $data_pais = CHtml::listData(Pais::model()->findAll(), 'id', 'nombre');
                        $data_provincia = array();
                        $data_ciudad = array();
                    } else {
                        $data_pais = CHtml::listData(Pais::model()->findAll(), 'id', 'nombre');
                        $data_provincia = CHtml::listData(Provincia::model()->findAll(array(
                                            "condition" => "pais_id =:pais_id",
                                            "order" => "nombre",
                                            "params" => array(':pais_id' => $modelDireccion->pais_id,)
                                        )), 'id', 'nombre');
                        $data_ciudad = CHtml::listData(Ciudad::model()->findAll(array(
                                            "condition" => "provincia_id =:provincia_id",
                                            "order" => "nombre",
                                            "params" => array(':provincia_id' => $modelDireccion->provincia_id,)
                                        )), 'id', 'nombre');
                    }
                    ?>

                    <?php
                    echo $form->select2Row(
                            $modelDireccion, 'pais_id', array(
                        'asDropDownList' => true,
                        'data' => !empty($data_pais) ? array(null => ' -- Seleccione Pais -- ') + $data_pais : array(null => ' - Ninguno -'),
                        'options' => array(
                            'width' => '100%',
                        )
                            )
                    );
                    ?>
                    <?php
                    echo $form->select2Row(
                            $modelDireccion, 'provincia_id', array(
                        'asDropDownList' => true,
                        'data' => !empty($data_provincia) ? array(null => ' -- Seleccione Provincia -- ') + $data_provincia : array(null => ' - Ninguno -'),
                        'options' => array(
                            'width' => '100%',
                        )
                            )
                    );
                    ?>
                    <?php
                    echo $form->select2Row(
                            $modelDireccion, 'ciudad_id', array(
                        'asDropDownList' => true,
                        'data' => !empty($data_ciudad) ? array(null => ' -- Seleccione Ciudad -- ') + $data_ciudad : array(null => ' - Ninguno -'),
                        'options' => array(
                            'width' => '100%',
                        )
                            )
                    );
                    ?>
                    <?php echo $form->textFieldRow($modelDireccion, 'referencia', array('maxlength' => 45)) ?>

                    <?php echo $form->hiddenField($modelDireccion, 'coord_x') ?>

                    <?php echo $form->hiddenField($modelDireccion, 'coord_y') ?>


                    <?php echo $form->hiddenField($modelDireccion, 'entidad_id') ?>

                    <div class="form-actions">
                        <?php
                        $this->widget('bootstrap.widgets.TbButton', array(
                            'id' => 'add-direccion',
                            'label' => 'Agregar dirección',
                            'encodeLabel' => false,
                            'icon' => 'plus-sign',
                            'htmlOptions' => array(
                                'onClick' => 'js:saveDireccion("#direccion-form")',
                                'class' => 'btn',
                            ),
                        ));
                        ?>
                        <?php
                        $this->widget('ext.bootstrap.widgets.TbButton', array(
                            'type' => 'button',
                            'id' => 'end_button',
                            'label' => 'Finalizar',
                            'htmlOptions' => array(
                                'href' => Yii::app()->createUrl('/crm/entidad/view/id/'),
                                'class' => 'btn-info'
                            )
                        ));
                        ?>
                    </div>
                    <?php $this->endWidget(); ?>

                </div>
                <div class="span7">
                    <!--<div id="map-container" class="">-->
                    <div id="map-canvas" style="width:100%; height: 375px"></div>
                    <!--</div>-->
                </div>
            </div>
            <hr>

        </div>
    </div>        </div>

