<?php

Yii::import('crm.models._base.BaseEntidadFoto');

class EntidadFoto extends BaseEntidadFoto {

    /**
     * @return EntidadFoto
     */
    public $picture;
    public $foto;

    const TIPO_EMPRESA = 'EMPRESA';
    const TIPO_USUARIO = 'USUARIO';

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'EntidadFoto|EntidadFotos', $n);
    }

    public function rules() {
        return array_merge(parent::rules(), array(
            array('picture', 'length', 'max' => 255, 'tooLong' => '{attribute} is too long (max {max} chars).', 'on' => 'upload'),
            array('picture', 'file', 'types' => 'jpg,jpeg,gif,png', 'maxSize' => 1024 * 1024 * 2, 'tooLarge' => 'Size should be less then 2MB !!!', 'on' => 'upload'),
                ))
        ;
    }

    /**
     * @Miguel Alba dadyalex777@hotmail.com
      Utilizacion Metodo:Portlet _entidad_foto
      Descripcion Metodo:Obtener los archivos subidos para cada entidad

     * @param type $id
     * @param type $tipo
     * @return \CActiveDataProvider
     */
    public function searchArchivosByEntidad($id = null) {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('ruta', $this->ruta, true);
        $criteria->compare('entidad_id', $this->entidad_id);

        $criteria->compare('t.entidad_id', $id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 3
            )
                )
        );
    }

}
