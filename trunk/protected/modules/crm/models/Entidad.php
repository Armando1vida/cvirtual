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

    public function attributeLabels() {
        return array_merge(parent::rules(), array(
            'nombre' => Yii::t('app', 'Nombre de la Empresa'),
            'razon_social' => Yii::t('app', 'Razon Social'),
            'documento' => Yii::t('app', 'CI/RUC'),
            'descripcion' => Yii::t('app', 'Descripcion/horarios'),
                )
        );
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Empresa|Empresas', $n);
    }

    public function scopes() {
        return array(
            'activos' => array(
                'condition' => (Yii::app()->user->isSuperAdmin) ? 't.estado = :estado' : 't.estado = :estado and (t.owner_id = :owner_id)',
                'params' => (Yii::app()->user->isSuperAdmin) ?
                        array(
                    ':estado' => self::ESTADO_ACTIVO,) : array(
                    ':estado' => self::ESTADO_ACTIVO,
                    ':owner_id' => Yii::app()->user->id,
                        ),
            ),
            'ordenPorNombre' => array(
                'order' => 't.nombre ASC',
            ),
        );
    }

    public function rules() {
        return array_merge(parent::rules(), array(
            array('industria_id, categoria_id,documento,email,descripcion', 'required'),
            array('email', 'email'),
        ));
    }

    public function relations() {
        return array_merge(parent::relations(), array(
            'direccion' => array(self::HAS_ONE, 'Direccion', 'entidad_id',)
        ));
    }

    public function searchEmpresasUsersAsignados() {
        $criteria = new CDbCriteria;
        $sort = new CSort;
        $criteria->join = 'LEFT JOIN cruge_user ON cruge_user.iduser = t.owner_id';
        $criteria->compare('id', $this->id);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('razon_social', $this->razon_social, true);
        $criteria->compare('documento', $this->documento, true);
        $criteria->compare('website', $this->website, true);
        $criteria->compare('raking', $this->raking);
        $criteria->compare('telefono', $this->telefono, true);
        $criteria->compare('celular', $this->celular, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('max_entidad', $this->max_entidad);
        $criteria->compare('estado', $this->estado, true);
        $criteria->compare('matriz', $this->matriz);
        $criteria->compare('categoria_id', $this->categoria_id);
        $criteria->compare('industria_id', $this->industria_id);
        $criteria->compare('entidad_id', $this->entidad_id);
        $criteria->compare('max_foto', $this->max_foto);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('cruge_user.username', $this->owner_id, true, 'OR');

        /* Sort criteria */

        $sort->attributes = array(
            'nombre' => array(
                'asc' => 't.nombre asc',
                'desc' => 't.nombre desc',
            ),
            '*',
        );
//        $sort->defaultOrder = 't.nombre asc';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria, 'sort' => $sort,
        ));
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
                ->from('entidad t')
                ->join('direccion d', "t.id=d.entidad_id  AND d.coord_x is not null AND d.coord_y is not null")
                ->where('t.estado=:estado')
        ;
        if ($id) {
            $command->andWhere('t.id=:entidad_id');

            $command->params = array(
                'estado' => self::ESTADO_ACTIVO,
                'entidad_id' => $id
                    )

            ;
        } else {
            $command->params = array(
                'estado' => self::ESTADO_ACTIVO
                    )
            ;
        }

        return $command->queryAll();
    }

    /**
     * @Miguel Alba dadyalex777@hotmail.com
      Utilizacion Metodo:Portlet view.entidad._sucursales
      Descripcion Metodo:Un dataprovider para mostrar unicamente los datos de subentidaddes de dicha entidad

     */
    public function searchSubendidad($entidad_id) {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('razon_social', $this->razon_social, true);
        $criteria->compare('documento', $this->documento, true);
        $criteria->compare('website', $this->website, true);
        $criteria->compare('raking', $this->raking);
        $criteria->compare('telefono', $this->telefono, true);
        $criteria->compare('celular', $this->celular, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('max_entidad', $this->max_entidad);
        $criteria->compare('estado', $this->estado, true);
        $criteria->compare('matriz', $this->matriz);
        $criteria->compare('categoria_id', $this->categoria_id);
        $criteria->compare('industria_id', $this->industria_id);
        $criteria->compare('entidad_id', $this->entidad_id);
        $criteria->addCondition('entidad_id=:entidad_id AND estado=:estado', 'AND');
        $Params = array(':entidad_id' => $entidad_id, ':estado' => 'ACTIVO');
        $criteria->params = array_merge($criteria->params, $Params);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 7,
            ),
        ));
    }

    /**
     * @Miguel Alba dadyalex777@hotmail.com
      Utilizacion Metodo:Vista
      Descripcion Metodo:

     * @param type $entidad_id
     * @return type
     */
    public function getEntidadPicActual($entidad_id) {
//     SELECT e.id,e.max_foto as max_foto_actual,ca.max_foto as  max_foto_actual_ca
//FROM entidad e 
//inner join categoria ca on e.categoria_id=ca.id
//where e.id=28 
//;
        $result = array();
        $command = Yii::app()->db->createCommand()
                ->select('e.id,e.max_foto as max_foto_actual,ca.max_foto as  max_foto_actual_ca')
                ->from('entidad e')
                ->join('categoria ca', "e.categoria_id=ca.id")
                ->where('e.estado=:estado AND e.id=:id')
        ;
//        $command->andWhere('t.id=:id', array(':id' => $entidad_id));
        $command->params = array(
            ':estado' => self::ESTADO_ACTIVO,
            ':id' => $entidad_id,
        );
        $result = $command->queryAll();
        return $result;
    }

}
