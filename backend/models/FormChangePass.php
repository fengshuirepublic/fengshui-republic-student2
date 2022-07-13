<?php

namespace backend\models;

use Yii;
use yii\base\Model;

class FormChangePass extends Model
{
	public $old_password;
	public $new_password;
	public $rep_password;
	public $user_id;

	private $_user = false;

	public function rules()
	{
		return [
			[['user_id', 'old_password', 'new_password', 'rep_password'], 'required'],
			[['new_password', 'rep_password'], 'validateNewPassword'],
			['old_password', 'validatePassword'],
		];
	}

	public function validateNewPassword($attribute, $params)
	{
		if ($this->new_password != $this->rep_password) {
			$this->addError('llll', 'Please check your new password.');
		}
	}

	public function validatePassword($attribute, $params)
	{
		$user = $this->getUser();
		if (!$user || !$user->validatePassword($this->old_password)) {
			$this->addError('llll', 'Incorrect password.');
		}
	}

	private function getUser()
	{
		if ($this->_user === false) {
			$this->_user = BoUser::findOne(['user_id' => $this->user_id]);
		}

		return $this->_user;
	}

	public function attributeLabels()
	{
		return [
			'rep_password' => 'Confirm Password',
		];
	}
}
