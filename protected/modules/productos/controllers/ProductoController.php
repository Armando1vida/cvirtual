<?php

Yii::import('ext.helpers.EDownloadHelper');

class ProductoController extends AweController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $defaultAction = 'admin';
    public $admin = false;

    public function filters() {
        return array(
            array('CrugeAccessControlFilter'),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {

        $model = new Producto;
        $this->performAjaxValidation($model, 'producto-form');


//        $this->render('view', array(
//            'model' => $this->loadModel($id),
//            'archivos' => $archivos,
//        ));

        if (isset($_POST['Producto'])) {

            $model->attributes = $_POST['Producto'];
            $model->estado = Producto::ESTADO_ACTIVO;
            $model->categoriaProducto = $model->subcategoriaProducto->categoriaProducto->nombre;

            if (!(isset($_POST['Producto']['imagen']))) {
                $subiendoImagen = CUploadedFile::getInstance($model, 'imagen');
//                TODO
                /**
                 * validar que no guarde nombre de imagen con caracteres especiales
                 */
                $image = str_replace(' ', '', $model->codigo);
                $model->imagen = $image;
            }

            if ($model->save()) {

                if ($model->imagen != '' && $subiendoImagen != null) {
                    $subiendoImagen->saveAs(Yii::getPathOfAlias('webroot') . '/uploads/' . $image);
                }


                if (Yii::app()->request->isAjaxRequest) {
                    echo CJSON::encode(intval($model->id));
                    exit;
//                    return;
                } else {
                    $this->redirect(array('admin'));
                }
            }
        }
        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('_form_modal', array(
//            'archivos' => $archivos,
                'model' => $model,
                    ), FALSE, TRUE);
        } else {

            $this->render('create', array(
//            'archivos' => $archivos,
                'model' => $model,
            ));
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {

        $model = $this->loadModel($id);
//        $subCategoria = ProductoSubcategoria::model()->findByPk($model->subcategoria_producto_id);
        $model->categoriaProducto = $model->subcategoriaProducto->categoriaProducto;
        $this->performAjaxValidation($model, 'producto-form');


        if (isset($_POST['Producto'])) {

            $model->attributes = $_POST['Producto'];
            //TODO: BORRAR

            $imagenantigua = $model->oldValues['imagen'];
            $imagenNueva = CUploadedFile::getInstance($model, 'imagen');
            $image = str_replace(' ', '', $model->codigo);
            if ($imagenNueva != null || $imagenantigua != null) {
                $model->imagen = $image;
            }

//            Si no existe un archivo que guardar verifica que exista un archivo ya subido
            if (isset($imagenNueva) == null && $imagenantigua) {
//                Si existe un archivo en la base le asigna es archivo al modelo
                $imagenNueva = $imagenantigua;
            }
            if ($model->save()) {
                if (!isset($imagenNueva) == null) {
//                    Cambia el nombre de la imagen si solamente se cambia el codigo de producto
                    if ($model->imagen != $model->oldValues['imagen'] && $imagenantigua == $imagenNueva) {
                        $pathdestino = realpath(Yii::getPathOfAlias('webroot') . "/uploads/") . '/';
                        $pathorigen = realpath(Yii::getPathOfAlias('webroot') . "/uploads/") . '/';
                        rename($pathorigen . $model->oldValues['codigo'], $pathdestino . $model->codigo);
                    }
//                  Verifica que la imagen a subir no sea igual a la imagen antigua
                    if ($imagenantigua != $imagenNueva) {
                        if ($imagenantigua) {
//                           Agrega la direccion de la imagen vieja si existe 
                            $path = realpath(Yii::getPathOfAlias('webroot') . '/uploads/' . $image);
//                     Si existe un archivo en la base y se va a guardar uno nuevo lo borra del $path 
                            unlink($path);
                        }
//                        Guarda la iamgen nueva en el path 
                        $imagenNueva->saveAs(Yii::getPathOfAlias('webroot') . '/uploads/' . $image);
                    }
                    if (!$imagenantigua) {
//                    Guarda el archivo en el path que se coloca de nivel 1      
                        $imagenNueva->saveAs(Yii::getPathOfAlias('webroot') . '/uploads/' . $image);
                    }
                }

//                if (isset($_POST['Producto']['ventasCotizacions']))
//                    $model->saveManyMany('ventasCotizacions', $_POST['Producto']['ventasCotizacions']);
//                else
//                    $model->saveManyMany('ventasCotizacions', array());
//                if (isset($_POST['Producto']['ventasDescuentos']))
//                    $model->saveManyMany('ventasDescuentos', $_POST['Producto']['ventasDescuentos']);
//                else
//                    $model->saveManyMany('ventasDescuentos', array());
//                if (isset($_POST['Producto']['ventasFacturaPeriodicas']))
//                    $model->saveManyMany('ventasFacturaPeriodicas', $_POST['Producto']['ventasFacturaPeriodicas']);
//                else
//                    $model->saveManyMany('ventasFacturaPeriodicas', array());
//                if (isset($_POST['Producto']['ventasFacturas']))
//                    $model->saveManyMany('ventasFacturas', $_POST['Producto']['ventasFacturas']);
//                else
//                    $model->saveManyMany('ventasFacturas', array());
//                if (isset($_POST['Producto']['ventasOportunidads']))
//                    $model->saveManyMany('ventasOportunidads', $_POST['Producto']['ventasOportunidads']);
//                else
//                    $model->saveManyMany('ventasOportunidads', array());
//                if (isset($_POST['Producto']['ventasPedidos']))
//                    $model->saveManyMany('ventasPedidos', $_POST['Producto']['ventasPedidos']);
//                else
//                    $model->saveManyMany('ventasPedidos', array());
                $this->redirect(array('admin'));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            Producto::model()->updateByPk($id, array('estado' => Producto::ESTADO_INACTIVO));
            //$this->loadModel($id)->delete();
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Producto');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Producto('search');
        $model->unsetAttributes(); // clear any default values

        if (isset($_GET['search']))
            $model->attributes = $this->assignParams($_GET['search']);

        if ($model->activos()->findAll()) {
            $this->render('admin', array(
                'model' => $model,
            ));
        } else {
            $this->render('empty', array('model' => $model));
        }
    }

    public function assignParams($params) {
        $result = array();
        if ($params['filters'][0] == 'all') {
            foreach (Producto::model()->searchParams() as $param) {
                $result[$param] = $params['value'];
            }
        } else {
            foreach ($params['filters'] as $param) {
                $result[$param] = $params['value'];
            }
        }
        return $result;
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id, $modelClass = __CLASS__) {
        $model = Producto::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model, $form = null) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'producto-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionExportar($producto_id = null) {
        $data = array();
        $temp = array();
//        Valida si el exportar a excel es de todos los anticipos
        if ($_POST['Productos'] == 'todos') {
            $temp = Producto::model()->findAll();
            foreach ($temp as $values) {
                array_push($data, $values->id);
            }
        } else {
//            Coloca en $data solo los id de las sms seleccionadas
            $data = explode(',', $producto_id);
        }
        $objExcel = new PHPExcel();
        $objExcel->setActiveSheetIndex(0) // Titulo del reporte
                ->setCellValue('A1', 'Codigo')  //Titulo de las columnas
                ->setCellValue('B1', 'Nombre')
                ->setCellValue('C1', 'Unidad')
                ->setCellValue('D1', 'Subcategoría')
                ->setCellValue('E1', 'Grupo Inventario')
                ->setCellValue('F1', 'Precio')
        ;
        $id = 2;
        $producto = null;
        $grupo = '';
        foreach ($data as $dato) {

            $producto = Producto::model()->findAllByPk($dato);
            foreach ($producto as $value) {
                if (count($value->grupoInventario) > 0) {
                    $grupo = $value->grupoInventario->nombre;
                } else {
                    $grupo = '';
                }
                $objExcel->setActiveSheetIndex(0)
                        ->setCellValue('A' . $id, $value->codigo)
                        ->setCellValue('B' . $id, $value->nombre)  //Titulo de las columnas
                        ->setCellValue('C' . $id, $value->unidad->nombre)
                        ->setCellValue('D' . $id, $value->subcategoriaProducto->nombre)
                        ->setCellValue('E' . $id, $grupo)
                        ->setCellValue('F' . $id, $value->precio)
                ;
                $id++;
            }
        }
        for ($i = 'A'; $i <= 'F'; $i++) {
            $objExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
        }
        $objExcel->getActiveSheet()->setTitle('Sms');
//       Se activa la hoja para que sea la que se muestre cuando el archivo se abre
        $objExcel->setActiveSheetIndex(0);
////// Inmovilizar paneles
        $objExcel->getActiveSheet(0)->freezePane('A4');
        $objExcel->getActiveSheet(0)->freezePaneByColumnAndRow(1, 2);
//        // Se manda el archivo al navegador web, con el nombre que se indica, en formato 2007
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Productos.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }

}
