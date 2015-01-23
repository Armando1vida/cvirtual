<?php

class EntidadFotoController extends AweController {

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

    protected function ajaxValidation($model, $form_id = "entidad-foto-form") {
        $portAtt = str_replace('-', ' ', (str_replace('-form', '', $form_id)));
        $portAtt = ucwords(strtolower($portAtt));
        $portAtt = str_replace(' ', '', $portAtt);
        if (isset($_POST['ajax']) && $_POST['ajax'] === '#' . $form_id) {
            $model->attributes = $_POST[$portAtt];
            $result['success'] = $model->validate();
            if (!$result['success']) {
                $result['errors'] = $model->errors;
                echo json_encode($result);
                Yii::app()->end();
            }
        }
    }

    public function actionAjaxCreateEntidadFoto($entidad_id) {
        $model = new EntidadFoto;
        $model->entidad_id = $id;
        $validadorPartial = false;
        $result = array();
        $this->ajaxValidation($model);
        if (Yii::app()->request->isAjaxRequest) {
            if (isset($_POST['EntidadFoto'])) {
                $model->attributes = $_POST['EntidadFoto'];
                $int++;
                $result['success'] = $model->save();
                if (!$result['success']) {
                    $validadorPartial = false;
                    $result['mensage'] = "Error al actualizar ";
                }
                if ($result['success']) {//envio del id de la empresa actualizada para poder agregar la direecion
                    $result['id'] = $model->id;
                    $validadorPartial = false;
                    $result['success'] = true;
                }
                echo json_encode($result);
            }
            if (!$validadorPartial) {
                $this->renderPartial('_form_modal', array('model' => $model
                        ), false, true);
            }
        }
    }

    public function actionAjaxUploadTemp() {
        if (Yii::app()->request->isAjaxRequest) {
            //nombre de la carpeta
            $carpeta = 'tmp';
            $path = realpath(Yii::app()->getBasePath() . "/../uploads/" . $carpeta . "/") . "/";
            $publicPath = Yii::app()->getBaseUrl() . "/uploads/" . $carpeta . "/";

            if (isset($_GET['_method'])) {
                if ($_GET['_method'] == 'delete') {
                    $file = $path . $_GET["file"];
                    if (is_file($file)) {
                        // borrar el archivo del path correspondiente
                        unlink($file);
                        echo CJSON::encode(array("success" => true));
                    } else {
                        echo CJSON::encode(array("success" => false));
                    }
                }
                Yii::app()->end();
            }
            //obtenemos el archivo a subir
            $file = $_FILES['file'];
            //comprobamos si existe un directorio para subir el archivo
            //si no es así, lo creamos
            if (!file_exists('uploads/')) {
                if (mkdir('uploads/', 0777, true)) {
                    chmod("uploads/", 0777);
                    chdir(getcwd() . '/uploads/');
                    if (!file_exists($carpeta . '/')) {
                        mkdir($carpeta . '/', 0777, true);
                        chmod("$carpeta/", 0777);
                    }
                }
            }
            // creacion de los path para el guardado de los multiples archivos con el $id y $carpeta correspondiente
            $filename = time('U') . rand(0, time('U')) . '.' . Util::getExtensionName($file['name']);
            //comprobamos si el archivo ha subido
            if ($file && move_uploaded_file($_FILES['file']['tmp_name'], $path . $filename)) {
                echo CJSON::encode(array(
                    "success" => true,
                    "data" => array(
                        'name' => $filename,
                        'size' => $file['size'],
                        'url' => $path . $filename,
                        'src' => $publicPath . $filename,
                        'delete_url' => $this->createUrl('ajaxUploadTemp', array(
                            '_method' => "delete",
                            'file' => $filename,
                            "carpeta" => $carpeta
                        ))
                )));
            }
        } else {
            echo CJSON::encode(array("success" => false));
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */

    /**
     * @Miguel Alba dadyalex777@hotmail.com
      Utilizacion Metodo: Portle _entidad_foto Entidad Portltes
      Descripcion Metodo:  Guarda imagen/s para dicha entidad

     */
    public function actionGuardarImagenes() {
//        die(var_dump("post", $_POST));
        $result = array();
        if (!empty($_POST['archivos'])) {

            // Crear registro de actividad
//                Actividad::registrarActividad($model, Actividad::TIPO_CREATE);
            $result['success'] = true;
            $result['texto'] = 'Nota creada Satisfactoriamente.';
            if (!empty($_POST['archivos'])) {
                $modelEntidad = Entidad::model()->findByPk($_POST['id']); //Recuperar informacion modelo  Entidad: fotos  agregadas 
                $num_picsEntidad = $modelEntidad->max_foto; //Numero de fotos ya actualmente disponibles x subir
                $num_picsArchivos = count($_POST['archivos']); //Numero de archivos q vienen del post
                if ($num_picsArchivos <= $num_picsEntidad) {//Controlar l numero de datos segun su categoria
//                var_dump("entro si existe archivos");
                    if ($_POST['tipo'] == EntidadFoto::TIPO_EMPRESA) {
//                    var_dump("entro tipo empresa");

                        if (!file_exists('uploads/crm/' . EntidadFoto::TIPO_EMPRESA . '/' . $_POST['id'])) {
                            mkdir('uploads/crm/' . EntidadFoto::TIPO_EMPRESA . '/' . $_POST['id'], 0777, true);
//                        var_dump("entro creo la carpeta");
                        }

                        $path = realpath(Yii::app()->getBasePath() . "/../uploads/crm/" . EntidadFoto::TIPO_EMPRESA . "/" . $_POST['id']) . "/";
                        $pathorigen = realpath(Yii::app()->getBasePath() . "/../uploads/tmp/") . "/";
                        $publicPath = Yii::app()->getBaseUrl() . "/uploads/crm/" . EntidadFoto::TIPO_EMPRESA . "/" . $_POST['id'] . '/';
                        foreach ($_POST['archivos'] as $value) {

//                        var_dump("entro creo foreach arhivos:", $value['nombreArchivo']);

                            $archivo_model = new EntidadFoto();
                            $archivo_model->nombre = $value['nombreArchivo'];
                            $archivo_model->ruta = $publicPath . $value['filename'];
                            $archivo_model->entidad_id = $_POST['id'];
                            if (rename($pathorigen . $value['filename'], $path . $value['filename'])) {
                                $result['success'] = $archivo_model->save();
//                            var_dump("entro guardo el modelo:", $result['success']);
                                $result['success'] = $result['success'] ? true : false;
                            }
                        }
//                    die("sss");
                        if ($result['success']) {
                            $max_foto_actual = $num_picsEntidad - $num_picsArchivos;
                            Entidad::model()->updateByPk($_POST['id'], array('max_foto' => $max_foto_actual));
                            $result['success'] = true;
                            $mensaje = $max_foto_actual > 1 ? " fotos" : " foto";
                            $result['informacion'] = "Se agrego:" . $num_picsArchivos . $mensaje;
                        } else {
                            $result['success'] = false;
                            $result['error'] = "Error al guardar un archivo.";
                        }
                    }
                } else {
                    $result['success'] = false;
                    $result['error'] = "El Numero de fotos excede.";
                }
            }
        } else {
            $result['success'] = false;
            $result['error'] = 'Agrege una imagen por lo menos.';
        }

        echo json_encode($result);
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        $this->performAjaxValidation($model, 'entidad-foto-form');

        if (isset($_POST['EntidadFoto'])) {
            $model->attributes = $_POST['EntidadFoto'];
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
        $model = new EntidadFoto('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['EntidadFoto']))
            $model->attributes = $_GET['EntidadFoto'];

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
        $model = EntidadFoto::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model, $form = null) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'entidad-foto-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * Carga archivos a carpeta tmp
     * @autor Armando Maldonado <amaldonado@tradesystem.com.ec>
     * @throws CHttpException
     */
//    public function actionUploadTmp() {
//        $carpeta = 'tmp';
//        $id = '';
//        chdir(getcwd()); //me ubico en el directorio del proyecto
//        Yii::import("xupload.models.XUploadForm");
//        /* creacion de la carpeta $id dentro de la $carpeta correspondiente para
//         * el guardado de los multiples archivos */
//        if (!file_exists('uploads/')) {
//            if (mkdir('uploads/', 0777, true)) {
//                chmod("uploads/", 0777);
//                chdir(getcwd() . '/uploads/');
//                if (!file_exists($carpeta . '/')) {
//                    mkdir($carpeta . '/', 0777, true);
//                    chmod("$carpeta/", 0777);
//                }
//            }
//        }
//        // Here we define the paths where the files will be stored temporarily
//        // creacion de los path para el guardado de los multiples archivos con el $id y $carpeta correspondiente
//        $path = realpath(Yii::app()->getBasePath() . "/../uploads/" . $carpeta . "/" . $id) . "/";
//        $publicPath = Yii::app()->getBaseUrl() . "/uploads/" . $carpeta . "/" . $id;
//
//        //This is for IE which doens't handle 'Content-type: application/json' correctly
//        header('Vary: Accept');
//        if (isset($_SERVER['HTTP_ACCEPT']) && (strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false)) {
//            header('Content-type: application/json');
//        } else {
//            header('Content-type: text/plain');
//        }
//
//        //Here we check if we are deleting and uploaded file
//        if (isset($_GET["_method"])) {
//            if ($_GET["_method"] == "delete") {
//                if ($_GET["file"][0] !== '.') {
//
//                    $file = $path . $_GET["file"];
//                    if (is_file($file)) {
////                        die(var_dump($file));
//                        // borrar el archivo del path correspondiente
//                        unlink($file);
//                    }
//                }
//                echo json_encode(true);
//            } else if ($_GET["_method"] == "deleteUpdate") { //para borrar imagenes dento de update de inmueble
//                $file = realpath(Yii::app()->getBasePath() . "/../uploads/inmueble/" . $_GET['id_inmueble']) . "/";
//                $file = $file . $_GET['file_name'];
//                if (is_file($file)) {
//                    // borrar el archivo del path correspondiente
//                    if ($this->loadModel($_GET["id"])->delete()) {
//                        unlink($file);
//                    }
//                }
//                echo json_encode(true);
//            }
//        } else {
//            $model = new XUploadForm;
//            $model->file = CUploadedFile::getInstance($model, 'file');
//
//            // We check that the file was successfully uploaded
//            if ($model->file !== null) {
//
//                // Grab some data
//                $model->mime_type = $model->file->getType();
//                $model->size = $model->file->getSize();
//                $model->name = $model->file->getName();
//
//                //(optional) Generate a random name for our file
//                $filename = $model->name;
//                $filename = time('U') . rand(0, time('U')) . '.' . $model->file->getExtensionName();
//                if ($model->validate()) {
//                    // Move our file to our temporary dir
//                    $model->file->saveAs($path . $filename);
//
//                    chmod($path . $filename, 0777);
//                    // here you can also generate the image versions you need 
//                    // using something like PHPThumb
//                    // Now we need to save this path to the user's session
//                    if (Yii::app()->user->hasState('images')) {
//                        $userImages = Yii::app()->user->getState('images');
//                    } else {
//                        $userImages = array();
//                    }
//                    $userImages[] = array(
//                        "path" => $path . $filename,
//                        //the same file or a thumb version that you generated
//                        "thumb" => $path . $filename,
//                        "filename" => $filename,
//                        'size' => $model->size,
//                        'mime' => $model->mime_type,
//                        'name' => $model->name,
//                    );
//                    Yii::app()->user->setState('images', $userImages);
//
//                    // Now we need to tell our widget that the upload was succesfull
//                    // We do so, using the json structure defined in
//                    // https://github.com/blueimp/jQuery-File-Upload/wiki/Setup
//                    echo json_encode(array(array(
//                            "name" => $model->name,
//                            "type" => $model->mime_type,
//                            "size" => $model->size,
//                            "filename" => $filename,
//                            "url" => $publicPath . '/' . $filename,
//                            "delete_url" => $this->createUrl("uploadTmp", array(
//                                "_method" => "delete",
//                                "file" => $filename,
//                                "id" => $id,
//                                "carpeta" => $carpeta
//                            )),
//                            'thumbnail_url' => $path . $filename,
//                            "delete_type" => "POST"
//                    )));
//                    /*
//                     * Aqui va la guardado de archivos en l base                     */
//                } else {
//                    //If the upload failed for some reason we log some data and let the widget know
//                    echo json_encode(array(array("error" => $model->getErrors('file'))));
//                    Yii::log("XUploadAction: " . CVarDumper::dumpAsString($model->getErrors()), CLogger::LEVEL_ERROR, "xupload.actions.XUploadAction");
//                }
//            } else {
//                throw new CHttpException(500, "Could not upload file");
//            }
//        }
//    }

    /**
     * @Miguel Alba dadyalex777@hotmail.com
      Utilizacion Metodo:Portlet entidad_foto
      Descripcion Metodo: Muestra la informacion actual de las fotos subidas de cada entidad
     * retornara la informacion en porcenje y fotos por subir

     */
    public function actionAjaxGeInfoPicActual() {
        $result = array();

        if (Yii::app()->request->isAjaxRequest) {
            if (isset($_POST['entidad_id']) && $_POST['entidad_id'] != '') {

                $data = Entidad::model()->getEntidadPicActual($_POST['entidad_id']);

                if ($data) {
                    $cien_porciento = 100;
                    $num_pic_uploads = ($data[0]['max_foto_actual_ca'] - ($data[0]['max_foto_actual'] ? $data[0]['max_foto_actual'] : 0));
                    $porcentaje = ($num_pic_uploads * $cien_porciento) / $data[0]['max_foto_actual_ca'];
                    $result['porcentaje'] = $porcentaje . "%";
                    $result['success'] = true;
                    $result['max_foto_actual_ca'] = $data[0]['max_foto_actual_ca'];
                    $result['max_foto_actual'] = $data[0]['max_foto_actual'];
                    $result['num_pic_uploads'] = $num_pic_uploads;
//                    die(var_dump($result));
                    echo json_encode($result);
                } else {

                    $result['succes'] = false;

//                    max_foto_actual_ca
//                    100 max_foto_actual_ca
//                    xporcentaje 

                    echo json_encode($result);
                }
            } else {

                $result['succes'] = false;
                echo json_encode($result);
            }
        }
    }

}
