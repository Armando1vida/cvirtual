<?php

class EntidadController extends AweController {

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
        //Modelo de la 
        Yii::import("xupload.models.XUploadForm");
        $archivos = new XUploadForm;
        $modelDireccion = Direccion::model()->findByAttributes(array('entidad_id' => $id));
        $this->render('view', array(
            'model' => $this->loadModel($id),
            'modelDireccion' => $modelDireccion,
            'archivos' => $archivos
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Entidad;
        $model->direccion = New Direccion;
//        die(var_dump($model->direccion));
        $model->estado = Empresa::ESTADO_ACTIVO;
        $this->performAjaxValidation($model, 'entidad-form');
        $enable_form = true;

        if (isset($_POST['Entidad'])) {
            $model->attributes = $_POST['Entidad'];
            $model->matriz = 1;
            $result = array();
            $result['success'] = $model->save();
            if (!$result['success']) {
                $result['message'] = 'Error al registrar empresa.';
            }
            if ($result['success']) {//envio del id de la empresa creada
                $result['id'] = $model->id;
            }
            $enable_form = false;

            echo json_encode($result);
        }
        if ($enable_form) {
            $this->render('create', array(
                'model' => $model,
//                'categoria' => $categoria,
            ));
        }
    }

    public function actionGetPerfilEntidad($id) {
        $model = $this->loadModel($id);
        $points = Entidad::model()->getPointEmpresa($id);
//        die(var_dump($points));
        $this->render('_perfil_entidad', array(
            'model' => $model,
            'points' => $points
//                'categoria' => $categoria,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $model->direccion = $model->direccion ? $model->direccion : New Direccion;
        $this->performAjaxValidation($model, 'entidad-form');

        $enable_form = true;


        if (Yii::app()->request->isAjaxRequest) {

            $validadorPartial = false;
            $result = array();
            if (isset($_POST['Entidad'])) {
                $model->attributes = $_POST['Entidad'];

                if ($model->validate()) {//CAPTURAR LOS ERRRORES
                    $result['success'] = $model->save();
                    if (!$result['success']) {
                        $result['mensage'] = "Error al actualizar ";
                    }
                    if ($result['success']) {//envio del id de la empresa actualizada para poder agregar la direecion
                        $result['id'] = $model->id;
                        $validadorPartial = TRUE;
                        $result['success'] = true;
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
            if (isset($_POST['Entidad'])) {
                $model->attributes = $_POST['Entidad'];
                $result = array();
                $result['success'] = $model->save();

                if (!$result['success']) {
                    $result['message'] = 'Error al actualizar empresa.';
                }
                if ($result['success']) {//envio del id de la empresa creada
                    $result['id'] = $model->id;
                }
                $enable_form = false;

                echo json_encode($result);
            }
            if ($enable_form) {
                $this->render('update', array(
                    'model' => $model,
                ));
            }
        }
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
        $model = new Entidad('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Entidad']))
            $model->attributes = $_GET['Entidad'];

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
        $model = Entidad::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model, $form = null) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'entidad-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * @Miguel Alba dadyalex777@hotmail.com
      Utilizacion Metodo:Actualizar view portlets informacinon de empresa
      Descripcion Metodo:

     * @param type $id
     */
    public function actionAjaxCargarInformacionEmpresa($id) {
        $model = $this->loadModel($id);
        $modelDireccion = Direccion::model()->findByAttributes(array('entidad_id' => $id));

        $result = array();
        if (Yii::app()->request->isAjaxRequest) {
            $result['success'] = true;
//            $this->renderPartial('portlets/_listasVotosMatrizPorcentaje', array('model' => $model))
            $result['html'] = $this->renderPartial('portlets/_informacion', array('model' => $model, 'modelDireccion' => $modelDireccion, 'modal' => TRUE), TRUE, false);
//            var_dump($result);
//            die();
            echo json_encode($result);
        }
    }

    public function actionAjaxCargarInformacionDireccion($id) {
//        $modelDireccion = Direccion::model()->findByAttributes(array('tipo_entidad' => "EMPRESA", 'entidad_id' => $id));
//
//        $result = array();
//        if (Yii::app()->request->isAjaxRequest) {
//
//            $result['success'] = true;
////            $this->renderPartial('portlets/_listasVotosMatrizPorcentaje', array('model' => $model))
//            $result['html'] = $this->renderPartial('portlets/_direccion', array('modelDireccion' => $modelDireccion, 'modal' => TRUE), TRUE, false);
//
//            echo json_encode($result);
//        }
    }

    public function actionCreateSubentidad($id) {
        $model = new Entidad;
        $model->direccion = New Direccion;
//        die(var_dump($model->direccion));
        $model->estado = Entidad::ESTADO_ACTIVO;
        $model->matriz = 0;
        $model->entidad_id = $id;
        $modelEntidad = Entidad::model()->findByPk($id);
        $modelEntidad->max_entidad = $modelEntidad->max_entidad - 1;
        $modelEntidad->max_foto = $modelEntidad->max_foto - 1;
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'entidad-form') {
            echo CActiveForm::validate($model);

            Yii::app()->end();
        }
//        $this->performAjaxValidation($model, 'entidad-form');
        if (Yii::app()->request->isAjaxRequest) {

            $validadorPartial = false;
            $result = array();
            if (isset($_POST['Entidad'])) {
                $model->attributes = $_POST['Entidad'];

                if ($model->validate()) {//CAPTURAR LOS ERRRORES
                    $result['success'] = $model->save();
                    if (!$result['success']) {
                        $result['mensage'] = "Error al actualizar ";
                    }
                    if ($result['success']) {//envio del id de la empresa actualizada para poder agregar la direecion
                        $result['id'] = $model->id;
                        $modelEntidad->save();
                        $validadorPartial = TRUE;
                        $result['success'] = true;
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
                $this->renderPartial('_form_modal_subentidad', array('model' => $model), false, true);
            }
        }
    }

    /**
     * @Miguel Alba dadyalex777@hotmail.com
      Utilizacion Metodo:P
      Descripcion Metodo: Muestra la informacion detallada de dicha entidad
     * @param type $id
     */
    public function actionAjaxGetInformacionEntidad($id) {
        $model = $this->loadModel($id);
//        $this->performAjaxValidation($model, 'entidad-foto-form');
        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('_form_modal_Informacion', array('model' => $model), false, true);
        }
    }

}
