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

    public function getPointEmpresa($id = null) {
        //select t.id,t.nombre,t.razon_social,t.website,t.telefono,t.celular,t.email,d.calle_principal,d.calle_secundaria,d.numero,d.coord_x,d.coord_y,d.referencia 
        //from empresa t
        //    inner join direccion d on t.id=d.entidad_id  and d.coord_x is not null and d.coord_y is not null and d.tipo_entidad='EMPRESA'
        //where t.estado='ACTIVO' ;
//        Direccion::TIPO_EMPRESA
        $command = Yii::app()->db->createCommand()
                ->select('t.id,
                    t.nombre,
                    t.razon_social,
                    t.website,
                    t.telefono,
                    t.celular,
                    t.email,
                    d.calle_principal,
                    d.calle_secundaria,
                    d.numero,
                    d.coord_x,
                    d.coord_y,
                    d.referencia')
                ->from('empresa t')
                ->join('direccion d', "t.id=d.entidad_id  AND d.coord_x is not null AND d.coord_y is not null AND d.tipo_entidad=:tipo_empresa")
                ->where('t.estado=:estado')
        ;
        if ($id) {
            $command->andWhere('t.id=:id', array(':id' => $id));
        }
        $command->params = array(':tipo_empresa' => Direccion::TIPO_EMPRESA, ':estado' => self::ESTADO_ACTIVO);
        return $command->queryAll();
    }

}
