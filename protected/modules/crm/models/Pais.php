<?php

Yii::import('crm.models._base.BasePais');

class Pais extends BasePais {

    /**
     * @return Pais
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Pais|Paises', $n);
    }

    /**
     * @Miguel Alba dadyalex777@hotmail.com
      Descripcion Metodo:Obtener todos los paises registrados en la bdd
     * @return type
     */
    public function getInscritasPaises() {
        $command = Yii::app()->db->createCommand()
                ->select("p.id, p.nombre")
                ->from("pais p")
        ;
        $result = $command->queryAll();
        return ($result);
    }

    public function getListSelect2Pais($search_value = null) {
        $command = New CDbCommand(Yii::app()->db);
        $command->select(array(
            "t.id as id",
            "t.nombre as text",
        ));
        $command->from("{$this->tableName()} as t");
        if ($search_value) {
            $command->andWhere("t.nombre like '$search_value%'");
        }
        $command->limit(10);
        return $command->queryAll();
    }

}
