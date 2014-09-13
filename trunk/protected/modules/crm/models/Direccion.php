<?php

Yii::import('crm.models._base.BaseDireccion');

class Direccion extends BaseDireccion {

    /**
     * @return Direccion
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Direccion|Direcciones', $n);
    }

    public function relations() {
        return array(
            'ciudad' => array(self::BELONGS_TO, 'Ciudad', 'ciudad_id'),
            'provincia' => array(self::BELONGS_TO, 'Provincia', 'provincia_id'),
            'pais' => array(self::BELONGS_TO, 'Pais', 'pais_id'),
        );
    }

    /**
     * Obtiene la informacion de dicha entidad para mostrar en el google map de las view d empresas
     * @param type $tipo_entidad 
     * @param type $entidad_id
     * @return type
     */
    public function getInformacionDireccionEntidad( $entidad_id) {

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
                ->where("dir.entidad_id = :entidad_id ");
        $command->bindValues(array(
//            ':tipo_entidad' => $tipo_entidad,
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
            array('provincia_id, pais_id, ciudad_id', 'required'),
        ));
    }

}
