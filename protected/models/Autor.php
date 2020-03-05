<?php

Yii::import('application.models._base.BaseAutor');

class Autor extends BaseAutor
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}