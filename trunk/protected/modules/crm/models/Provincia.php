<?php

Yii::import('crm.models._base.BaseProvincia');

class Provincia extends BaseProvincia {

    /**
     * @return Provincia
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Provincia|Provincias', $n);
    }

    public function rules() {
        return array_merge(parent::rules(), array(
            array('nombre, pais_id', 'required'),
//            array('ciudad_id, canton_id, provincia_id, region_id ', 'required'),
//            array('region_id', 'numerical',
//                'integerOnly' => true,
//                'min' => 1,
//                'tooSmall' => 'Elija una region  por favor.',
//            ),
            array('pais_id', 'numerical',
                'integerOnly' => true,
                'min' => 1,
                'tooSmall' => 'Elija un Pais  por favor.',
            ),
//            array('canton_id', 'numerical',
//                'integerOnly' => true,
//                'min' => 1,
//                'tooSmall' => 'Elija un canton  por favor.',
//            ),
//            array('ciudad_id', 'numerical',
//                'integerOnly' => true,
//                'min' => 1,
//                'tooSmall' => 'Elija un ciudad por favor.',
//            ),
        ));
    }

    /**
     * @author Miguel Alba <malba@tradesystem.com.ec>
     * @param type $pais_id
     * @return type Obtener todas las provincias de cada pais con su id pais
     */
    public function getProvinciasPais($pais_id) {

//        SELECT pr.id,pr.nombre FROM provincia pr
//where pr.region_id=7
//order by pr.nombre
//;
        $command = Yii::app()->db->createCommand()
                ->select("pro.id, pro.nombre")
                ->from("provincia pro")
                ->where("pro.pais_id = :pais_id");
        $command->bindValues(array(
            ':pais_id' => $pais_id,
        ));
        $command->order("pro.nombre");
        $result = $command->queryAll();
        return ($result);
    }

}
