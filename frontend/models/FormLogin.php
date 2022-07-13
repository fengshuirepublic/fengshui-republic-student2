<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class FormLogin extends Model
{
	public $email;
	public $rememberMe;

	private $_user = false;

	public function rules()
	{
		return [
			[['email'], 'required'],
			['rememberMe', 'boolean'],
			['email', 'validateEmail'],
		];
	}

	public function validateEmail($attribute, $params)
	{
		if (!$this->hasErrors()) {
			$user = $this->getUser();

			if (!$user || !$user->validateEmail($this->email)) {
				$this->addError('llll', 'Incorrect email.');
			}
		}
	}

	public function login()
	{
		if ($this->validate()) {
			return Yii::$app->user->login($this->getUser());
		}
		return false;
	}

	private function getUser()
	{
		if ($this->_user === false) {
			$this->_user = User::findOne(['email' => strtolower($this->email), 'status' => 1]);
		}
		return $this->_user;
	}
}
