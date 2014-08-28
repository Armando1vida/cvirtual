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

}
