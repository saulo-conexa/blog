<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */

	protected $_id;
	protected $email;
	protected $senha;
	protected $nome;

	public function __construct($email, $senha)
	{
		$this->email = $email;
		$this->senha = $senha;
		$this->username = $email;
		$this->password = $senha;
	}

	public function authenticate()
	{
		$user=Usuario::model()->find('LOWER(email)=?',array(strtolower($this->email)));
		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(!$user->validatePassword($this->senha))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->_id=$user->id;
			$this->nome=$user->nome;
			$this->email=$user->email;
			$this->errorCode=self::ERROR_NONE;
			Yii::app()->session->add('idUsuario', $user->id);
			Yii::app()->session->add('nomeUsuario', $user->nome);
		}
		return $this->errorCode==self::ERROR_NONE;
	}
}