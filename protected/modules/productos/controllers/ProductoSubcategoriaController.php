<?php

class ProductoSubcategoriaController extends AweController {

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
        $model = new ProductoSubcategoria;
        $this->performAjaxValidation($model, 'producto-subcategoria-form');

        if (isset($_POST['ProductoSubcategoria'])) {
            $model->attributes = $_POST['ProductoSubcategoria'];
            $model->estado = ProductoSubcategoria::ESTADO_ACTIVO;
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
        $this->performAjaxValidation($model, 'producto-subcategoria-form');
        if (isset($_POST['ProductoSubcategoria'])) {
            $model->attributes = $_POST['ProductoSubcategoria'];
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
            $model = $this->loadModel($id);
            $modelProductos = $model->productos;

            if (count($modelProductos) == 0) {
                ProductoSubcategoria::model()->updateByPk($id, array('estado' => ProductoSubcategoria::ESTADO_INACTIVO));
                echo '<div class = "alert alert-error"><button data-dismiss = "alert" class = "close" type = "button">×</button>La Sub Categoria  fue eliminada.</div>';
            } else {
                echo '<div class = "alert alert-error"><button data-dismiss = "alert" class = "close" type = "button">×</button>No se puede eliminar esta Sub categoria, contiene productos ligados a el.</div>';
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
        $dataProvider = new CActiveDataProvider('ProductoSubcategoria');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new ProductoSubcategoria('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['ProductoSubcategoria']))
            $model->attributes = $_GET['ProductoSubcategoria'];

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
        $model = ProductoSubcategoria::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model, $form = null) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'producto-subcategoria-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionCargarSubCategoria() {
        var_dump($_POST);

        if ($_POST) {
            $sub_categorias = ProductoSubcategoria::model()->getSubCategorias($_POST['Producto']['categoriaProducto']);
            echo CHtml::tag('option', array('value' => ''), '-- Seleccione --', true);
            foreach ($sub_categorias as $value) {
                echo CHtml::tag('option', array('value' => $value['id']), CHtml::encode($value['nombre']), true);
            }
        }
    }

}
