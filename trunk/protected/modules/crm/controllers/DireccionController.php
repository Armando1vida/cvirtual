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
            if (!$result['success'])
                $result['message'] = 'Error al registrar la direccion';
            $enalberender = false;
            echo json_encode($result);
        }
        if ($enalberender) {
            $this->render('create', array(
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
//                var_dump("ss");
//                die();
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
    public function actionUpdateEntidad($id, $id_entidad_tipo) {

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

    public function actionAjaxGetInformacionEmpresa() {
//         var_dump($_POST);
//            die();
        if (Yii::app()->request->isAjaxRequest) {
//`tipo_entidad` `entidad_id`

            if (isset($_POST['tipo_entidad'])) {
//                var_dump("sss");
//                $tipo_entidad, $entidad_id)
//                die();
                $data = Direccion::model()->getInformacionDireccionEntidad($_POST['tipo_entidad'], $_POST['entidad_id']);
                if ($data) {

                    echo json_encode($data);
                } else {
                    $data = array();
                    echo json_encode($data);
//                    echo CHtml::tag('option', array('value' => 0, 'id' => 'p'), '- NO EXISTEN OPCIONES -', true);
                }
            } else {
//                echo CHtml::tag('option', array('value' => 0, 'id' => 'p'), '- Pronvicia -', true);
//                echo CHtml::tag('option', array('value' => 0, 'id' => 'p'), '- Seleccione una region -', true);                
            }
        }
    }

    /**
     * @Miguel Alba dadyalex777@hotmail.com
      Utilizacion Metodo:Actualizacion d datos en el modal d la vista de Empresa
      Descripcion Metodo:

     */

}
