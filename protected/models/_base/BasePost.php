<?php

/**
 * This is the model base class for the table "post".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Post".
 *
 * Columns in table "post" available as properties of the model,
 * followed by relations of table "post" available as properties of the model.
 *
 * @property integer $id
 * @property string $titulo
 * @property string $texto
 * @property integer $destaque
 * @property string $dataPublicacao
 * @property integer $idAutor
 * @property integer $idCategoria
 *
 * @property Comentario[] $comentarios
 * @property Categoria $idCategoria0
 */
abstract class BasePost extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'post';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Post|Posts', $n);
	}

	public static function representingColumn() {
		return 'titulo';
	}

	public function rules() {
		return array(
			array('titulo, texto, dataPublicacao, idAutor, idCategoria', 'required'),
			array('destaque, idAutor, idCategoria', 'numerical', 'integerOnly'=>true),
			array('titulo', 'length', 'max'=>255),
			array('destaque', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, titulo, texto, destaque, dataPublicacao, idAutor, idCategoria', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'comentarios' => array(self::HAS_MANY, 'Comentario', 'idPost'),
			'autor' => array(self::BELONGS_TO, 'Autor', 'idAutor'),
			'categoria' => array(self::BELONGS_TO, 'Categoria', 'idCategoria'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'titulo' => Yii::t('app', 'Título'),
			'texto' => Yii::t('app', 'Texto'),
			'destaque' => Yii::t('app', 'Destaque'),
			'dataPublicacao' => Yii::t('app', 'Data da Publicação'),
			'idAutor' => null,
			'idCategoria' => null,
			'comentarios' => null,
			'autor' => null,
			'categoria' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('titulo', $this->titulo, true);
		$criteria->compare('texto', $this->texto, true);
		$criteria->compare('destaque', $this->destaque);
		$criteria->compare('dataPublicacao', $this->dataPublicacao, true);
		$criteria->compare('idAutor', $this->idAutor);
		$criteria->compare('idCategoria', $this->idCategoria);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}