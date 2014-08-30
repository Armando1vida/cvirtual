<?php

class ProvinciaController extends AweController {

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
        $model = new Provincia;

        $this->performAjaxValidation($model, 'provincia-form');

        if (isset($_POST['Provincia'])) {
            $model->attributes = $_POST['Provincia'];
            if ($model->save()) {
                $this->redirect(array('admin'));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        $this->performAjaxValidation($model, 'provincia-form');

        if (isset($_POST['Provincia'])) {
            $model->attributes = $_POST['Provincia'];
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
        $model = new Provincia('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Provincia']))
            $model->attributes = $_GET['Provincia'];

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
        $model = Provincia::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model, $form = null) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'provincia-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * @author Miguel Alba <malba@tradesystem.com.ec>
     * Obtener las provincias de un Pais
     */
    public function actionAjaxGetProvinciaPais2() {
        if (Yii::app()->request->isAjaxRequest) {

            if (isset($_POST['idDrop']) && $_POST['idDrop'] > 0) {
//                $data = Provincia::model()->findAll(array(
//                    "condition" => "region_id =:region_id ",
//                    "order" => "nombre",
//                    "params" => array(':region_id' => $_POST['region_id'],)
//                ));
                $data = Provincia::model()->getProvinciasPais($_POST['idDrop']);
                if ($data) {
                    $data = CHtml::listData($data, 'id', 'nombre');
//                     echo CHtml::tag('option', array('value' => '-'), CHtml::encode('- PROVINCIAS -'), true);
                    echo CHtml::tag('option', array('value' => 0, 'id' => 'provincia'), '- PROVINCIAS -', true);
                    foreach ($data as $value => $name) {
                        echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
                    }
                } else {
                    echo CHtml::tag('option', array('value' => 0, 'id' => 'p'), '- NO EXISTEN OPCIONES -', true);
                }
            } else {
                echo CHtml::tag('option', array('value' => 0, 'id' => 'p'), '- PROVINCIA -', true);
//                echo CHtml::tag('option', array('value' => 0, 'id' => 'p'), '- Seleccione una region -', true);                
            }
        }
    }

    public function actionAjaxGetProvinciaPais() {
        if (Yii::app()->request->isAjaxRequest) {

            if (isset($_POST['idDrop']) && $_POST['idDrop'] > 0) {

                $data = Provincia::model()->getProvinciasPais($_POST['idDrop']);
                if ($data) {
                    $data = CHtml::listData($data, 'id', 'nombre');
                    echo CHtml::tag('option', array('value' => 0, 'id' => 'p'), '- Provincia -', true);
                    foreach ($data as $value => $name) {
                        echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
                    }
                } else {
                    echo CHtml::tag('option', array('value' => 0, 'id' => 'p'), '- NO EXISTEN OPCIONES -', true);
                }
            } else {
                echo CHtml::tag('option', array('value' => 0, 'id' => 'p'), '- Pronvicia -', true);
//                echo CHtml::tag('option', array('value' => 0, 'id' => 'p'), '- Seleccione una region -', true);                
            }
        }
    }

}
