<?php

Yii::import('crm.models._base.BaseIndustria');

class Industria extends BaseIndustria {

    const ESTADO_ACTIVO = 'ACTIVO';
    const ESTADO_INACTVO = 'INACTIVO';

    /**
     * @return Industria
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Industria|Industrias', $n);
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

}
