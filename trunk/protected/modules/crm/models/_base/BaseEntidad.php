<?php

/**
 * This is the model base class for the table "entidad".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Entidad".
 *
 * Columns in table "entidad" available as properties of the model,
 * followed by relations of table "entidad" available as properties of the model.
 *
 * @property integer $id
 * @property string $nombre
 * @property string $razon_social
 * @property string $documento
 * @property string $website
 * @property integer $raking
 * @property string $telefono
 * @property string $celular
 * @property string $email
 * @property integer $max_entidad
 * @property string $estado
 * @property integer $matriz
 * @property integer $categoria_id
 * @property integer $industria_id
 * @property integer $entidad_id
 * @property integer $max_foto
 * @property string $descripcion
 * @property integer $owner_id
 *
 * @property Categoria $categoria
 * @property Entidad $entidad
 * @property Entidad[] $entidads
 * @property Industria $industria
 * @property EntidadFoto[] $entidadFotos
 */
abstract class BaseEntidad extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'entidad';
    }

    public static function representingColumn() {
        return 'nombre';
    }

    public function rules() {
        return array(
            array('nombre, celular, estado, owner_id', 'required'),
            array('raking, max_entidad, matriz, categoria_id, industria_id, entidad_id, max_foto, owner_id', 'numerical', 'integerOnly'=>true),
            array('email', 'email'),
            array('nombre, razon_social', 'length', 'max'=>64),
            array('documento', 'length', 'max'=>20),
            array('website, telefono, celular, email', 'length', 'max'=>45),
            array('estado', 'length', 'max'=>8),
            array('descripcion', 'safe'),
            array('estado', 'in', 'range' => array('ACTIVO','INACTIVO')), // enum,
            array('razon_social, documento, website, raking, telefono, email, max_entidad, matriz, categoria_id, industria_id, entidad_id, max_foto, descripcion', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, nombre, razon_social, documento, website, raking, telefono, celular, email, max_entidad, estado, matriz, categoria_id, industria_id, entidad_id, max_foto, descripcion, owner_id', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
            'categoria' => array(self::BELONGS_TO, 'Categoria', 'categoria_id'),
            'entidad' => array(self::BELONGS_TO, 'Entidad', 'entidad_id'),
            'entidads' => array(self::HAS_MANY, 'Entidad', 'entidad_id'),
            'industria' => array(self::BELONGS_TO, 'Industria', 'industria_id'),
            'entidadFotos' => array(self::HAS_MANY, 'EntidadFoto', 'entidad_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'id' => Yii::t('app', 'ID'),
                'nombre' => Yii::t('app', 'Nombre'),
                'razon_social' => Yii::t('app', 'Razon Social'),
                'documento' => Yii::t('app', 'Documento'),
                'website' => Yii::t('app', 'Website'),
                'raking' => Yii::t('app', 'Raking'),
                'telefono' => Yii::t('app', 'Telefono'),
                'celular' => Yii::t('app', 'Celular'),
                'email' => Yii::t('app', 'Email'),
                'max_entidad' => Yii::t('app', 'Max Entidad'),
                'estado' => Yii::t('app', 'Estado'),
                'matriz' => Yii::t('app', 'Matriz'),
                'categoria_id' => Yii::t('app', 'Categoria'),
                'industria_id' => Yii::t('app', 'Industria'),
                'entidad_id' => Yii::t('app', 'Entidad'),
                'max_foto' => Yii::t('app', 'Max Foto'),
                'descripcion' => Yii::t('app', 'Descripcion'),
                'owner_id' => Yii::t('app', 'Owner'),
                'categoria' => null,
                'entidad' => null,
                'entidads' => null,
                'industria' => null,
                'entidadFotos' => null,
        );
    }

    public function search() {
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
        $criteria->compare('max_foto', $this->max_foto);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('owner_id', $this->owner_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
        ), parent::behaviors());
    }
}