<?php

class DireccionController extends AweController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $defaultAction = 'admin';
    public $admin = true;

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
        $model = new Direccion;

        $this->performAjaxValidation($model, 'direccion-form');
        $enalberender = true;
        if (isset($_POST['Direccion'])) {
//            var_dump("POST",$_POST['Direccion']);
//            DIE();
            $model->attributes = $_POST['Direccion'];
            $result = array();
            $result['success'] = $model->save();
            if (!$result['success']) {
                $result['message'] = 'Error al registrar la direccion';
            }
            $enalberender = false;
            echo json_encode($result);
        }
        if ($enalberender) {
            $this->render('create', array(
                'model' => $model,
            ));
        }
    }

    public function actionCreateSubincidencia($id, $cuenta_id = null, $contacto_id = null) {

        $result = array();
        $model = new Incidencia;
        $model->incidencia_id = $id;
        $model->cuenta_id = $cuenta_id ? $cuenta_id : null;
        $model->contacto_id = $contacto_id ? $contacto_id : null;
        $model->permisos = Incidencia::PERMISOS_ALL;
        $model->usuario_creacion_id = Yii::app()->user->id;
        $model->estado = Incidencia::ESTADO_ACTIVO;

        $model->owner_id = Yii::app()->user->id;
//        $this->performAjaxValidation($model, 'incidencia-form');

        if (Yii::app()->request->isAjaxRequest) {
            $validadorPartial = false;
            $this->ajaxValidation($model);
            if (isset($_POST['Incidencia'])) {

                $model->attributes = $_POST['Incidencia'];
                $result = $this->Crear($model);
                if (!$result['success']) {
                    $result['mensage'] = "Error al actualizar la fecha de la Incidencia";
                } else if ($result['success']) {
                    $result['id'] = $model->id;
//                    $result['producto'] = $model->incidenciaSubmotivo->producto;
                    Alerta::registrarAlertaA($model, Alerta::ASIGNADO);
                }
                $validadorPartial = TRUE;
                echo json_encode($result);
            }

            if (!$validadorPartial) {
                $this->renderPartial('_form_subincidencia_modal', array('model' => $model
                        ), false, true);
            }
        }
    }

    public function actionCreateDireccionEmpresa($entidad_id = null) {
        $model = new Direccion;
        $model->entidad_id = $entidad_id;
        $result = array();
        $this->performAjaxValidation($model, 'direccion-form');
        $validadorPartial = false;
        if (Yii::app()->request->isAjaxRequest) {
            $validadorPartial = false;
            if (isset($_POST['Direccion'])) {
                $model->attributes = $_POST['Direccion'];
                var_dump($model->errors);
                var_dump($model->attributes);
                die();
                $result['success'] = $model->save();
                if (!$result['success']) {
                    $result['mensage'] = "Error al crear la direccion.";
                } else if ($result['success']) {
                    $result['mensage'] = "Agregada  la direccion.";
                    $validadorPartial = true;
                }
                echo json_encode($result);
            }

            if (!$validadorPartial) {
                $this->renderPartial('_form_modal_entidad', array('model' => $model
                        ), false, true);
            }
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $this->performAjaxValidation($model, 'direccion-form');
        if (Yii::app()->request->isAjaxRequest) {
            $validadorPartial = false;

            if (isset($_POST['Direccion'])) {

                $model->attributes = $_POST['Direccion'];

                if ($model->validate()) {//CAPTURAR LOS ERRRORES
                    $result['success'] = $model->save();
                    if (!$result['success']) {
                        $result['mensage'] = "Error al actualizar ";
                    } else {
                        $validadorPartial = TRUE;
                        $result['success'] = true;
//                        var_dump("s",$result['success']);
                        //en un futuro para guardar informacion actualizada
                    }
                    echo json_encode($result);
                } else {
                    $result['success'] = false;
                    $result['errors'] = $model->getErrors();
                    $validadorPartial = true;
                    echo json_encode($result);
                }
            }

            if (!$validadorPartial) {
                $this->renderPartial('_form_modal', array('model' => $model), false, true);
            }
        } else {
            if (isset($_POST['Direccion'])) {
                $model->attributes = $_POST['Direccion'];
                if ($model->save()) {
                    $this->redirect(array('admin'));
                }
            }

            $this->render('update', array(
                'model' => $model,
            ));
        }
    }

    /**
     * MP    
     * @param type $id
     */
    public function actionUpdateEntidad($id) {

        $model = $this->loadModel($id);

        $this->performAjaxValidation($model, 'direccion-form');

        if (isset($_POST['Direccion'])) {
            $model->attributes = $_POST['Direccion'];
            if ($model->save()) {
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
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Direccion('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Direccion']))
            $model->attributes = $_GET['Direccion'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id, $modelClass = __CLASS__) {
        $model = Direccion::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model, $form = null) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'direccion-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * @Miguel Alba dadyalex777@hotmail.com
      Utilizacion Metodo:En los views para poder mostrar la informacion en google maps
      Descripcion Metodo:Obtener la informacion completa de dicha empresa para poder  mostrar datos
     */
    public function actionAjaxGetInformacionEmpresa() {
        if (Yii::app()->request->isAjaxRequest) {

            if (isset($_POST['tipo_entidad'])) {
                $data = Direccion::model()->getInformacionDireccionEntidad($_POST['entidad_id']);
//Si hay datos
                if ($data) {
                    echo json_encode($data);
                } else {
//Enviar un arreglo vacio
                    $data = array();
                    echo json_encode($data);
                }
            } else {
                //surgio un errorF
                $data = array("error" => false);
                echo json_encode($data);
            }
        }
    }

    /**
     * @Miguel Alba dadyalex777@hotmail.com
      Utilizacion Metodo:En el js _form d actulizar empresa .
      Descripcion Metodo:Retorna un arreglo en l cual retorna verdadero y la informacion de dicho modelo
     * y falso si no tiene informacion

     */
    public function actionAjaxGetInformacioModelo() {
        $data = array();
        if (Yii::app()->request->isAjaxRequest) {

            if (isset($_POST['empresa_id'])) {
                $datos = Direccion::model()->getInformacionModelo(Direccion::TIPO_EMPRESA, $_POST['empresa_id']);
//Si hay datos
                if ($datos) {
                    $data['existe'] = true;
                    $data['datos'] = $datos[0];
                    echo json_encode($data);
                } else {
                    $data['existe'] = false;
                    echo json_encode($data);
                }
            } else {
                //surgio un errorF
                $data["error"] = true;
                echo json_encode($data);
            }
        }
    }

    /**
     * @Miguel Alba dadyalex777@hotmail.com
      Utilizacion Metodo:Actualizacion d datos en el modal d la vista de Empresa
      Descripcion Metodo:

     */
}
