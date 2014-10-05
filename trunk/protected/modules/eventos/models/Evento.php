<?php

Yii::import('eventos.models._base.BaseEvento');

class Evento extends BaseEvento {

    const ESTADO_ACTIVO = 'ACTIVO';
    const ESTADO_INACTIVO = 'INACTIVO';
    const PERMISOS_OWNER = 'OWNER';
    const PERMISOS_ALL = 'ALL';
    const ENTIDAD_TIPO_EMPRESA = 'empresa';
    const ENTIDAD_TIPO_CONTACTO = 'contacto';
    const ENTIDAD_TIPO_INCIDENCIA = 'incidencia';

    /**
     * @return Evento
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Evento|Eventos', $n);
    }

    public function scopes() {
        return array(
            'activos' => array(
                'condition' => 't.estado = :estado',
                'params' => array(
                    ':estado' => self::ESTADO_ACTIVO,
                ),
            ),
            'fechaReferencia' => array(
                'condition' => 't.fecha_fin > NOW() OR t.fecha_inicio > NOW() OR t.hora_fin > TIME(NOW()) OR t.hora_inicio > TIME(NOW())',
            ),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array_merge(parent::attributeLabels(), array(
            'owner_id' => Yii::t('app', 'Usuario Responsable'),
            'permisos' => Yii::t('app', 'Visible para'),
        ));
    }

    public function getPermisosOpciones() {
        return array(
            self::PERMISOS_OWNER => Yii::t('app', 'Usuario Responsable'),
            self::PERMISOS_ALL => Yii::t('app', 'Todos'),
        );
    }

    public function de_cuenta($entidad_id) {
        $this->getDbCriteria()->mergeWith(
                array(
                    'condition' => 'entidad_id = :entidad_id',
                    'params' => array(
                        ':entidad_id' => $entidad_id
                    ),
                )
        );
        return $this;
    }

    public function getEntidadTipoOpciones() {
        $return = array();

        if (Entidad::model()->findAll())
            $return[self::ENTIDAD_TIPO_EMPRESA] = Yii::t('app', 'Entidad');



        return $return;
    }

//TODO: comertar función @autor Armando Maldonado <amaldonado@tradesystem.com.ec>
    public function getNombreEntidad() {
        $modelEntidad = ucfirst($this->entidad_tipo);
        $modelEntidad = $modelEntidad::model()->findByPk($this->entidad_id);
        $nombreEntidad = $modelEntidad ? $modelEntidad->nombre : '';

        if ($modelEntidad && $this->entidad_tipo == self::ENTIDAD_TIPO_CONTACTO)
            $nombreEntidad = $modelEntidad->getNombre_completo();

        return $nombreEntidad;
    }

    public function getEntidadTexto() {
        if ($this->entidad_tipo && $this->entidad_id) {
            $table = $this->entidad_tipo;
            $model = ucfirst($table);

            $data = $model::model()->findByPk($this->entidad_id);

            if ($table == Cuenta::model()->tableName()) {
                return '<a href="' . Yii::app()->createUrl('crm/cuenta/view', array('id' => $data->id)) . '">' . $data->nombre . '</a>';
            } else if ($table == Contacto::model()->tableName()) {
                return '<a href="' . Yii::app()->createUrl('crm/contacto/view', array('id' => $data->id)) . '">' . $data->nombre_completo . '</a>';
            }
        }
    }

    /*     * ********************Consultas SQL****************************** */
    /*
     * retorna los eventos formateadas para el calendario 
     * @autor: Alex Yepez 
     */

    public function getEventosCalendar($entidad_id = null, $entidad_tipo = null) {
        $resul = array();

        $command = Yii::app()->db->createCommand()
                ->select("e.id as id,
                        concat('Evento: ',e.nombre) as title,
                        e.fecha_inicio as start, 
                        e.fecha_fin as end,
                        p.color as color
                        ");
        $command->from("truulo_crm.evento e");
        $command->leftJoin('evento_prioridad p', 'p.id = e.evento_prioridad_id');
        $command->Where("e.estado =:estado", array(':estado' => self::ESTADO_ACTIVO));

        if ($entidad_tipo == self::ENTIDAD_TIPO_CUENTA) {

            $command->leftJoin('contacto cont', '(cont.id=e.entidad_id and e.entidad_tipo=:tipo_contacto)', array(':tipo_contacto' => self::ENTIDAD_TIPO_CONTACTO));
            $command->leftJoin('cuenta cue', 'cue.id = cont.cuenta_id');
            if ($entidad_id) {
                $command->andWhere('(cue.id = :entidad_id or (e.entidad_tipo=:entidad_tipo and e.entidad_id=:entidad_id ))', array(':entidad_id' => $entidad_id,
                    ':entidad_tipo' => $entidad_tipo));
            }
        }
        if ($entidad_tipo == self::ENTIDAD_TIPO_CONTACTO) {

            if ($entidad_id) {
                $command->andWhere('(e.entidad_tipo = :entidad_tipo and e.entidad_id = :entidad_id)', array(':entidad_id' => $entidad_id,
                    ':entidad_tipo' => $entidad_tipo));
            }
        }
        if ($entidad_tipo == self::ENTIDAD_TIPO_INCIDENCIA) {
            if ($entidad_id) {
                $command->andWhere('(e.entidad_tipo = :entidad_tipo and e.entidad_id = :entidad_id)', array(':entidad_id' => $entidad_id,
                    ':entidad_tipo' => $entidad_tipo));
            }
        }

        $resul = $command->queryAll();

        return $resul;
    }

    public function ActualizarEstadoEntidad($entidad_tipo, $entidad_id) {
        $return = Evento::model()->updateAll(array('estado' => Evento::ESTADO_INACTIVO,
            'usuario_actualizacion_id' => Yii::app()->user->id,
            'fecha_actualizacion' => Util::FechaActual()), '(entidad_tipo = :entidad_tipo and entidad_id = :entidad_id) and estado = :estado', array(':entidad_tipo' => $entidad_tipo,
            ':entidad_id' => $entidad_id,
            ':estado' => Evento::ESTADO_ACTIVO));
        return $return;
    }

    public function AnularRelacion($entidad_id) {
        $return = Evento::model()->updateAll(array('contacto_id' => null,
            'usuario_actualizacion_id' => Yii::app()->user->id,
            'fecha_actualizacion' => Util::FechaActual()), '(contacto_id=:contacto_id and entidad_tipo != :entidad_tipo) and estado = :estado', array(':contacto_id' => $entidad_id,
            ':entidad_tipo' => Evento::ENTIDAD_TIPO_CONTACTO,
            ':estado' => Evento::ESTADO_ACTIVO));
        return $return;
    }

}
