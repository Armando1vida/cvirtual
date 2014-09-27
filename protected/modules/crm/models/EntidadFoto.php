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

    public function generateview() {
        $resultado = '<div>';
        $resultado.='<div class="span2">';
        if (!empty($this->id)) {
            $resultado.='<img  src="' . $this->ruta . '" alt="">';
        } else {
            $resultado.='<div class=" hero-unit">';
            $resultado.=' <h2 class="text-center">Sin Im&aacute;gen </h2>';
            $resultado.='</div>';
        }
        $resultado.='  </div>'; //Div del span de la imagen
        $resultado.='<div class="span10">';
        //div informacion imagen
        $resultado.='<div class="date" style="width:110px;>';
        $resultado.='<p class="day"> $ ' . $this->nombre . '</p>';
        $resultado.=' <p class="month">  Precio  </p>';
        $resultado.=' </div>';
        $resultado.=' <h2>';
        $resultado.='<a href="/SistemaInmobiliario/inmuebles/inmueble/view?id=' . $this->id . '">' . Util::truncateTwo($this->nombre, 50) . '</a>';
        $resultado.='</h2>';
        $resultado.=' <p>';
        $resultado.='Propietario <a href="javascript:;">' . $this->nombre . '</a>';
        $resultado.=' </p>';

        $resultado.='<p>';
        $resultado.=' </p>';

//        if ((!Yii::app()->user->isSuperAdmin) && ( Yii::app()->user->checkAccess('cliente'))) {
//            $resultado.=' <button  class="btn btn-info" onclick="js:comprar(' . $this->id . ')">Comprar</button>';
//            $resultado.=' <button  class="btn btn-info" onclick="js:arrendar(' . $this->id . ')">Arrendar</button>';
//            $resultado.=' <button  class="btn btn-info" onclick="js:reservar(' . $this->id . ')">Reservar</button>';
//        }

        $resultado.='  </div>';
        $resultado.='  </div>';
        $resultado.='<div class="span2">';
        echo $resultado;
    }

//    public function detalleconformato() {
//        $detalle = '';
//        if ($this->numero_habitacion)
//            $detalle .= "<b>$this->numero_habitacion</b> Habitaciones<br>";
//        if ($this->numero_banio)
//            $detalle .= "<b>$this->numero_banio</b> Baños<br>";
//        if ($this->numero_garage)
//            $detalle .= "<b>$this->numero_garage</b> Garages<br>";
//        return $detalle;
//    }
}
