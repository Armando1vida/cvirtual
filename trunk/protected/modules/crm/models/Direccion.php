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
        return Yii::t('app', 'Direccion|Direccions', $n);
    }

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

}
