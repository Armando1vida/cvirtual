<div class="widget orange ">
    <div class="widget-title">
        <h4><i class="icon-list"></i> Detalles <?php echo Producto::label() ?></h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
        </span>
    </div>
    <div class="widget-body">
        <?php
        $this->widget('bootstrap.widgets.TbDetailView', array(
            'data' => $model,
            'attributes' => array(
                array(
                    'name' => 'precio',
                    'value' => number_format($model->precio, 2),
                    'type' => 'html',
                ),
                'marca',
                array(
                    'name' => 'imagen',
                    'type' => 'raw',
                    'value' => ($model->imagen!=NUll)?CHtml::image(Yii::app()->request->baseUrl . '/upload/' . $model->imagen, "imagen", array('style' => "width: 200px; height: 150px;")):CHtml::image("http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image",''),
                ),
            ),
        ));
        ?>

    </div>
</div>