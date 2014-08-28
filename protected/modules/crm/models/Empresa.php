<?php

Yii::import('crm.models._base.BaseEmpresa');

class Empresa extends BaseEmpresa {

    const ESTADO_ACTIVO = 'ACTIVO';
    const ESTADO_INACTVO = 'INACTIVO';

    /**
     * @return Empresa
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Empresa|Empresas', $n);
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
