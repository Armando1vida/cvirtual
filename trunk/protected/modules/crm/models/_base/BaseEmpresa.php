<?php

/**
 * This is the model base class for the table "empresa".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Empresa".
 *
 * Columns in table "empresa" available as properties of the model,
 * followed by relations of table "empresa" available as properties of the model.
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
 * @property integer $num_item
 * @property integer $categoria_id
 * @property integer $industria_id
 * @property string $estado
 *
 * @property Categoria $categoria
 * @property Industria $industria
 */
abstract class BaseEmpresa extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'empresa';
    }

    public static function representingColumn() {
        return 'nombre';
    }

    public function rules() {
        return array(
            array('nombre, celular, num_item, categoria_id, industria_id, estado', 'required'),
            array('raking, num_item, categoria_id, industria_id', 'numerical', 'integerOnly'=>true),
            array('email', 'email'),
            array('nombre, razon_social', 'length', 'max'=>64),
            array('documento', 'length', 'max'=>20),
            array('website, telefono, celular, email', 'length', 'max'=>45),
            array('estado', 'length', 'max'=>8),
            array('estado', 'in', 'range' => array('ACTIVO','INACTIVO')), // enum,
            array('razon_social, documento, website, raking, telefono, email', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, nombre, razon_social, documento, website, raking, telefono, celular, email, num_item, categoria_id, industria_id, estado', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
            'categoria' => array(self::BELONGS_TO, 'Categoria', 'categoria_id'),
            'industria' => array(self::BELONGS_TO, 'Industria', 'industria_id'),
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
                'num_item' => Yii::t('app', 'Num Item'),
                'categoria_id' => Yii::t('app', 'Categoria'),
                'industria_id' => Yii::t('app', 'Industria'),
                'estado' => Yii::t('app', 'Estado'),
                'categoria' => null,
                'industria' => null,
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
        $criteria->compare('num_item', $this->num_item);
        $criteria->compare('categoria_id', $this->categoria_id);
        $criteria->compare('industria_id', $this->industria_id);
        $criteria->compare('estado', $this->estado, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
        ), parent::behaviors());
    }
}