<?php

/**
 * This is the model class for table "post".
 *
 * The followings are the available columns in table 'post':
 * @property integer $id
 * @property string $titulo
 * @property string $texto
 * @property integer $destaque
 * @property string $dataPublicacao
 * @property integer $idAutor
 * @property integer $idCategoria
 */
class Post extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Post the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, texto, dataPublicacao, idAutor, idCategoria', 'required'),
			array('destaque, idAutor, idCategoria', 'numerical', 'integerOnly'=>true),
			array('titulo', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, titulo, texto, destaque, dataPublicacao, idAutor, idCategoria', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'titulo' => 'Titulo',
			'texto' => 'Texto',
			'destaque' => 'Destaque',
			'dataPublicacao' => 'Data Publicacao',
			'idAutor' => 'Id Autor',
			'idCategoria' => 'Id Categoria',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('texto',$this->texto,true);
		$criteria->compare('destaque',$this->destaque);
		$criteria->compare('dataPublicacao',$this->dataPublicacao,true);
		$criteria->compare('idAutor',$this->idAutor);
		$criteria->compare('idCategoria',$this->idCategoria);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}