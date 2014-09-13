<?php

Yii::import('crm.models._base.BaseCategoria');

class Categoria extends BaseCategoria {

    const ESTADO_ACTIVO = 'ACTIVO';
    const ESTADO_INACTVO = 'INACTIVO';

    /**
     * @return Categoria
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Categoria|Categorias', $n);
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

    public function attributeLabels() {
        return array_merge(parent::attributeLabels(), array(
            'max_entidad' => Yii::t('app', 'Número de Items'),
            'max_foto' => Yii::t('app', 'Número de Fotos'),
        ));
    }

}
