<?php

Yii::import('crm.models._base.BaseDireccion');

class Direccion extends BaseDireccion {

    const TIPO_EMPRESA = 'EMPRESA';
    const TIPO_CLIENTE = 'CLIENTE';

    /**
     * @return Direccion
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Direccion|Direcciones', $n);
    }

    /**
     * Obtiene la informacion de dicha entidad para mostrar en el google map de las view d empresas
     * @param type $tipo_entidad 
     * @param type $entidad_id
     * @return type
     */
    public function getInformacionDireccionEntidad($tipo_entidad, $entidad_id) {

//        SELECT dir.id, dir.calle_principal, dir.calle_secundaria, pa.nombre, pro.nombre, ciu.nombre FROM direccion dir
//        inner join pais pa on dir.pais_id = pa.id
//        inner join provincia pro on dir.provincia_id = pro.id
//        inner join ciudad ciu on dir.ciudad_id = ciu.id
//        where dir.tipo_entidad = 1 and dir.tipo_entidad = "EMPRESA"
//        ;
        $command = Yii::app()->db->createCommand()
                ->select("dir.id, dir.calle_principal, dir.calle_secundaria, pa.nombre as pais, pro.nombre as provincia, ciu.nombre as ciudad,dir.coord_x as latitud, dir.coord_y as longitud")
                ->from("direccion dir")
                ->join('pais pa', '(dir.pais_id = pa.id)')
                ->join('provincia pro', '(dir.provincia_id = pro.id)')
                ->join('ciudad ciu', '(dir.ciudad_id = ciu.id)')
                ->where("dir.tipo_entidad = :tipo_entidad AND dir.entidad_id = :entidad_id ");
        $command->bindValues(array(
            ':tipo_entidad' => $tipo_entidad,
            ':entidad_id' => $entidad_id,
        ));
        $result = $command->queryAll();
        return ($result);
    }

    /**
     * Obtener informacion de un modelo ya creado en este caso empresa ya creada para asi saber si 
     * aql modelo tiene informacion agregada de direccion para actualizar o no 
     * @param type $tipo_entidad
     * @param type $entidad_id
     * @return type
     */
    public function getInformacionModelo($tipo_entidad, $entidad_id) {

//        SELECT mbre FROM direccion dir
//        where dir.tipo_entidad = 1 and dir.tipo_entidad = "EMPRESA"
//        ;
        $command = Yii::app()->db->createCommand()
                ->select("*")
                ->from("direccion dir")
                ->where("dir.tipo_entidad = :tipo_entidad AND dir.entidad_id = :entidad_id ");
        $command->bindValues(array(
            ':tipo_entidad' => $tipo_entidad,
            ':entidad_id' => $entidad_id,
        ));
        $result = $command->queryAll();
        return ($result);
    }

    public function rules() {
        return array_merge(parent::rules(), array(
//            array('ciudad_id', 'length',
//                'min' => 1,
//                'tooSmall' => 'You must enter minimum 20 characters',
//            ),
//            array('provincia_id', 'type', 'type' => 'integer',
//                'message' => '{attribute}: is not a date!', 'min' => 1),
            array('provincia_id', 'my_required'),
            array('pais_id', 'my_required'),
            array('ciudad_id', 'my_required'),
//            array('provincia_id', 'length',
////                'min' => 1,
//                'max' => 45,
//                'tooBig' => 'You cannot enter more than 45 characters',
////                'tooSmall' => 'You must enter minimum 20 characters',}
//            ),
//            array('pais_id', 'length',
//                'min' => 1,
////                'tooSmall' => 'You must enter minimum 20 characters',
//            ),
        ));
    }

    public function my_required($attribute_name, $params) {

        switch ($attribute_name) {
            case "provincia_id":
                if (empty($this->provincia_id) && ($this->provincia_id <= 0)) {

                    $this->addError($attribute_name, 'Seleccione la informacion');
                }
                break;
            case "pais_id":
                if (empty($this->pais_id) && ($this->pais_id <= 0)) {

                    $this->addError($attribute_name, 'Seleccione la informacion');
                }
                break;
            case "ciudad_id":
                if (empty($this->ciudad_id) && ($this->ciudad_id <= 0)) {

                    $this->addError($attribute_name, 'Seleccione la informacion');
                }
                break;
        }
    }

}
