<?php

Yii::import('application.models._base.BaseUsuario');

class Usuario extends BaseUsuario
{
	
	protected $senha;
	protected $hash;

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	/**
	 * Checks if the given password is correct.
	 * @param string the password to be validated
	 * @return boolean whether the password is valid
	 */
	public function validatePassword($senha)
	{
		return $this->hashPassword($senha)===$this->senha;
	}

	/**
	 * Generates the password hash.
	 * @param string password
	 * @return string hash
	 */
	public function hashPassword($senha)
	{
		return md5($senha);
	}

	/**
	 * Generates a salt that can be used to generate a password hash.
	 * @return string the salt
	 */
	protected function generateSalt()
	{
		return '';
	}
}