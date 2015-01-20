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

    public function relations() {
        return array_merge(parent::relations(), array(
            'pais' => array(self::BELONGS_TO, 'Pais', 'pais_id'),
        ));
    }

    /**
     * @author Miguel Alba <malba@tradesystem.com.ec>
     * @param type $pais_id
     * @return type Obtener todas las provincias de cada pais con su id pais
     * Utilizacion en el script de ubicacino en form crear Ciudad
     */
    public function getCiudadesProvincias($provincia_id) {

//        SELECT pr.id,pr.nombre FROM provincia pr
//where pr.region_id=7
//order by pr.nombre
//;
        $command = Yii::app()->db->createCommand()
                ->select("ci.id, ci.nombre")
                ->from("ciudad ci")
                ->where("ci.provincia_id = :provincia_id");
        $command->bindValues(array(
            ':provincia_id' => $provincia_id,
        ));
        $command->order("ci.nombre");
        $result = $command->queryAll();
        return ($result);
    }

    public function getListSelect2Ciudades($search_value = null, $provincia_id) {
        $command = New CDbCommand(Yii::app()->db);
        $command->select(array(
            "t.id as id",
            "t.nombre as text",
        ));
        $command->from("{$this->tableName()} as t");
        $command->join("provincia pr", "pr.id=t.provincia_id");
        $command->andWhere("pr.id = '$provincia_id'");
        if ($search_value) {
            $command->andWhere("t.nombre like '$search_value%'");
        }
//        if ($provincia_id) {
//            die("s");
//            $command->andWhere("p.id = '$provincia_id'");
//        }
        $command->limit(10);
        return $command->queryAll();
    }

}
