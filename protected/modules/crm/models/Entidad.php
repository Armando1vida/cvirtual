<?php

Yii::import('crm.models._base.BaseEntidad');

class Entidad extends BaseEntidad {

    const ESTADO_ACTIVO = 'ACTIVO';
    const ESTADO_INACTVO = 'INACTIVO';

    /**
     * @return Entidad
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Entidad|Entidads', $n);
    }

    public function scopes() {
        return array(
            'activos' => array(
                'condition' => 't.estado = :estado',
                'params' => array(
                    ':estado' => self::ESTADO_ACTIVO,
                ),
            ),
        );
    }

    public function relations() {
        return array_merge(parent::relations(), array(
            'direccion' => array(self::HAS_ONE, 'Direccion', 'entidad_id',)
        ));
    }

}
