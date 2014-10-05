

<?php

class EventoController extends AweController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $defaultAction = 'create';
    public $admin = true;

    public function filters() {
        return array(
            array('CrugeAccessControlFilter'),
        );
    }

    public function actionView($id) {
        //peticion de view por ajax
        $model = $this->loadModel($id);
        if (Yii::app()->request->isAjaxRequest) {
            //envio de la vista parcial
            $this->renderPartial('_view_modal', array(
                'model' => $model,
                    ), false, true);
        } else {
            $this->render('view', array(
                'model' => $model,
            ));
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($entidad_tipo = null, $entidad_id = null, $fecha_evento = null) {

        $model = new Evento;
        $model->owner_id = Yii::app()->user->id;
        $model->usuario_creacion_id = Yii::app()->user->id;
        $this->performAjaxValidation($model, 'evento-form');
        /**
         * Carga de formularios tanto por render como renderPartial
         */
        //petición del formulario por ajax renderPartial
        if (Yii::app()->request->isAjaxRequest) {
            $validadorPartial = false;
            $model->entidad_tipo = $entidad_tipo;
            $model->entidad_id = $entidad_id;
            $model->fecha_inicio = $fecha_evento;
            if (isset($_POST['Evento'])) {
                $model->attributes = $_POST['Evento'];
                $result = $this->Crear($model);
                if (!$result['success']) {
                    $result['mensage'] = "Error al actualizar la fecha de la oportunidad";
                }
                $validadorPartial = TRUE;
                echo json_encode($result);
            }
            if (!$validadorPartial) {
                $this->renderPartial('_form_modal', array('model' => $model), false, true);
            }
        } else {
            $model->entidad_tipo = $entidad_tipo;
            $model->entidad_id = $entidad_id;
            $model->fecha_inicio = $fecha_evento;
            if (isset($_POST['Evento'])) {
                $model->attributes = $_POST['Evento'];
                $result = $this->Crear($model);
                if (!$result['success']) {
                    $result['mensage'] = "Error al actualizar la fecha de la oportunidad";
                }
                $this->redirect(array('calendario/index'));
            }

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
        $result = array();
        $model->fecha_inicio = Util::FormatDate($model->fecha_inicio, "d/m/Y");
        $this->performAjaxValidation($model, 'evento-form');
        if ($model->fecha_fin) {
            $model->fecha_fin = Util::FormatDate($model->fecha_fin, "d/m/Y");
        }
        if (Yii::app()->request->isAjaxRequest) {
            $validadorPartial = false;
            if (isset($_POST['Evento'])) {
                $asignadoactual = $model->owner_id;
                $model->attributes = $_POST['Evento'];
                $asignadonuevo = $model->owner_id;
                $result = $this->Update($model);
                if (!$result['success']) {
                    $result['mensage'] = "Error al actualizar la fecha de la oportunidad";
                }
                if ($asignadoactual != $asignadonuevo) {
                    Alerta::registrarAlertaNA($model, $asignadoactual, Alerta::NOASIGNADO);
                    Alerta::registrarAlertaA($model, Alerta::ASIGNADO);
                }
                $validadorPartial = TRUE;
                echo json_encode($result);
            }
            if (!$validadorPartial) {
                $this->renderPartial('_form_modal', array('model' => $model), false, true);
            }
        } else {
            if (isset($_POST['Evento'])) {
                $asignadoactual = $model->owner_id;
                $model->attributes = $_POST['Evento'];
                $asignadonuevo = $model->owner_id;
                $result = $this->Update($model);
                if (!$result['success']) {
                    $result['mensage'] = "Error al actualizar la fecha de la oportunidad";
                }
                if ($asignadoactual != $asignadonuevo) {
                    Alerta::registrarAlertaNA($model, $asignadoactual, Alerta::NOASIGNADO);
                    Alerta::registrarAlertaA($model, Alerta::ASIGNADO);
                }
                if ($result['success']) {
                    $this->redirect(array('calendario/index'));
                }
            }
            $this->render('update', array('model' => $model));
        }
    }

    public function actionAjaxUpdateFecha($id, $fecha = null, $fechafin = null) {
        $result = array();
        if (Yii::app()->request->isAjaxRequest) {
            $model = $this->loadModel($id);
            $fecha ? $model->fecha_inicio = $fecha : '';
            $fechafin ? $model->fecha_fin = $fechafin : '';
            $result = $this->Update($model);
            if (!$result['success']) {
                $result['mensage'] = "Error al actualizar la fecha de la oportunidad";
            }
            $validadorPartial = TRUE;
            echo json_encode($result);
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
            $model = $this->loadModel($id);

            $FechaHoraEliminacion = Util::FechaActual();
            Evento::model()->updateByPk($id, array('estado' => Cobranza::ESTADO_INACTIVO,
                'usuario_actualizacion_id' => Yii::app()->user->id,
                'fecha_actualizacion' => $FechaHoraEliminacion));
            // Crear registro de actividad
            Actividad::registrarActividad($model, Actividad::TIPO_DELETE);

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
        $model = new Evento('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Evento']))
            $model->attributes = $_GET['Evento'];

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
        $model = Evento::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model, $form = null) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'evento-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /*     * ***********************************************funciones Ajax******************************** */

    /**
     * @author Alex Yepez <ayepez@tradesystem.com.ec>
     * Carga de id segunla tabla 
     */
    public function actionAjaxCargarEntidades() {
        $table = $_POST['entidad_tipo'];
        $search_value = $_POST['search_value'];
        $model = ucfirst($table);
        if (Yii::app()->request->isAjaxRequest) {
            echo CJSON::encode($model::model()->getListSelect2($search_value));
        }
    }

    /*     * *******************************************funciones internas******************************* */

    /**
     * @author Alex Yepez <ayepez@tradesystem.com.ec>
     * @param type $post
     * @return array $b_guardado
     * Crea una nueva oportunidad
     */
    private function Crear($model) {
        $b_guardado = array();
        $model->estado = Evento::ESTADO_ACTIVO;

        $model->fecha_inicio = Util::FormatDate($model->fecha_inicio, "Y/m/d");
        if ($model->fecha_fin) {
            $model->fecha_fin = Util::FormatDate($model->fecha_fin, "Y/m/d");
        }
        $b_guardado['success'] = $model->save();
        if ($b_guardado['success']) {
            Actividad::registrarActividad($model, Actividad::TIPO_CREATE);
            Alerta::registrarAlertaA($model, Alerta::ASIGNADO);
        }
        return $b_guardado;
    }

    /**
     * 
     * @param type $model
     * @return type
     */
    private function Update($model) {
        $b_guardado = array();
        $asignadoactual = $model->owner_id;
        $model->usuario_actualizacion_id = Yii::app()->user->id;
        $model->fecha_inicio = Util::FormatDate($model->fecha_inicio, "Y/m/d");
        if ($model->fecha_fin) {
            $model->fecha_fin = Util::FormatDate($model->fecha_fin, "Y/m/d");
        }
        if ($model->entidad_id == 0) {
            $model->entidad_id = null;
        }
        $b_guardado['success'] = $model->save();
        if ($b_guardado['success']) {
            // Crear registro de actividad
            Actividad::registrarActividad($model, Actividad::TIPO_UPDATE);
            $asignadonuevo = $model->owner_id;
            if ($asignadoactual != $asignadonuevo) {
                Alerta::registrarAlertaNA($model, $asignadoactual, Alerta::NOASIGNADO);
                Alerta::registrarAlertaA($model, Alerta::ASIGNADO);
            }
        }
        return $b_guardado;
    }

}
