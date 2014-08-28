<?php

Yii::import('crm.models._base.BaseCiudad');

class Ciudad extends BaseCiudad {

    /**
     * @return Ciudad
     */
    public $pais_id;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Ciudad|Ciudades', $n);
    }

    public function rules() {
        return array_merge(parent::rules(), array(
            array('pais_id, provincia_id', 'required'),
            array('pais_id', 'numerical',
                'integerOnly' => true,
                'min' => 1,
                'tooSmall' => 'Elija un Pais  por favor.',
            ),
            array('provincia_id', 'numerical',
                'integerOnly' => true,
                'min' => 1,
                'tooSmall' => 'Elija una Provinca  por favor.',
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
