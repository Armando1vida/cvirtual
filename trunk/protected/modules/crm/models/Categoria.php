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

    public function getCategoria($id_categoria) {

//        SELECT pr.id,pr.nombre FROM provincia pr
//where pr.region_id=7
//order by pr.nombre
//;
        $command = Yii::app()->db->createCommand()
                ->select("ca.max_entidad as items, ca.max_foto")
                ->from("categoria ca")
                ->where("ca.id = :id_categoria");
        $command->bindValues(array(
            ':id_categoria' => $id_categoria,
        ));
        $result = $command->queryAll();
        return ($result[0]);
    }

}
