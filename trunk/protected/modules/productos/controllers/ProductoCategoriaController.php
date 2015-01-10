<?php

class ProductoCategoriaController extends AweController {

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
        $model = new ProductoCategoria;
        $this->performAjaxValidation($model, 'producto-categoria-form');

        if (isset($_POST['ProductoCategoria'])) {
            $model->attributes = $_POST['ProductoCategoria'];
            $model->estado = ProductoCategoria::ESTADO_ACTIVO;
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
        $this->performAjaxValidation($model, 'producto-categoria-form');

        if (isset($_POST['ProductoCategoria'])) {
            $model->attributes = $_POST['ProductoCategoria'];
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
//            $modelCuentas = ClienteGrupo::model()->activos()->findByPk($id)->clienteCuentas;
            $model = $this->loadModel($id);
            $modelSubCategoria = $model->productoSubcategorias;

            if (count($modelSubCategoria) == 0) {
                ProductoCategoria::model()->updateByPk($id, array('estado' => ProductoCategoria::ESTADO_INACTIVO));
                echo '<div class = "alert alert-error"><button data-dismiss = "alert" class = "close" type = "button">×</button>La Categoria del Producto fue eliminada.</div>';
//                Yii::app()->user->setFlash('success', "La Categoria del Producto fue eliminada.");
            } else {
                echo '<div class = "alert alert-error"><button data-dismiss = "alert" class = "close" type = "button">×</button>No se puede eliminar esta categoria, contiene Subcategorias ligadas a el.</div>';
//                die();
//                Yii::app()->user->setFlash('error', "No se puede eliminar esta categoria, contiene Subcategorias ligadas a el.");
            }

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
        $dataProvider = new CActiveDataProvider('ProductoCategoria');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new ProductoCategoria('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['ProductoCategoria']))
            $model->attributes = $_GET['ProductoCategoria'];

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
        $model = ProductoCategoria::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model, $form = null) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'producto-categoria-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
