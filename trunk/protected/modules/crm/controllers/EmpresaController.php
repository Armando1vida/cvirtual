<?php

class EmpresaController extends AweController {

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
        $model = new Empresa;
        $model->estado = Empresa::ESTADO_ACTIVO;
        $model->num_item = 5;
        $this->performAjaxValidation($model, 'empresa-form');
        $enable_form = true;
        if (isset($_POST['Empresa'])) {
            $model->attributes = $_POST['Empresa'];
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
        $categoria = Categoria::model()->activos()->findAll();

//        die(var_dump($categoria));
        if ($enable_form) {
            $this->render('create', array(
                'model' => $model,
                'categoria' => $categoria,
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

        $this->performAjaxValidation($model, 'empresa-form');

        if (isset($_POST['Empresa'])) {
            $model->attributes = $_POST['Empresa'];
            if ($model->save()) {
                $this->redirect(array('admin'));
            }
        }
        $categoria = Categoria::model()->activos()->findAll();


        $this->render('update', array(
            'model' => $model,
            'categoria' => $categoria,
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
        $model = new Empresa('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Empresa']))
            $model->attributes = $_GET['Empresa'];

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
        $model = Empresa::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model, $form = null) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'empresa-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
