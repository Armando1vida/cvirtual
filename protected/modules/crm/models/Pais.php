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

}
