<?php

namespace backend\models;

use Yii;
use yii\base\Model;

class FormStaffInfo extends Model
{
	public $user_id;
	public $status;
	public $username;
	public $role_name;
	public $chinese_name;
	public $english_name;
	public $gender;
	public $ic;
	public $position;
	public $branch;
	public $join_date;
	public $resign_date;

	private $_user = false;

	public function rules()
	{
		return [
			[['username', 'role_name', 'english_name', 'gender', 'ic', 'position', 'branch', 'join_date'], 'required'],
			[['user_id', 'status'], 'integer'],
			[['gender'], 'string'],
			[['join_date', 'resign_date'], 'safe'],
			[['role_name', 'chinese_name', 'english_name', 'branch'], 'string', 'max' => 45],
			[['ic'], 'string', 'max' => 20],
			[['position'], 'string', 'max' => 200],
			['username', 'unique', 'targetClass' => BoUser::className(), 'filter' => ['<>', 'status', 0]],
			[['username'], 'email'],

			// ['username', function($attribute) {
			// 	$user = $this->getUser();
			// 	if ($user) {
			// 		$this->addError($attribute, 'This username is already in use.');
			// 	}
			// }],

			// ['username', 'unique', 'targetClass' => BoUser::className(), 'targetAttribute' => 'username'],


			// ['username', 'validateUsername'],

			// [['username'], 'match', 'pattern' => '/^[a-zA-Z0-9]+$/', 'message' => "{attribute} must be alphanumeric."],
		];
	}

	// public function validateUsername($attribute, $params)
	// {
	// 	$user = $this->getUser();
	// 	if ($user) {
	// 		$this->addError($attribute, 'Test test.');
	// 	}
	// }

	// private function getUser()
	// {
	// 	if ($this->_user === false) {
	// 		$this->_user = BoUser::findOne(['username' => $this->username]);
	// 	}

	// 	return $this->_user;
	// }

	public function attributeLabels()
	{
		return [
			'status'       => 'Status',
			'username'     => 'Username',
			'role_name'    => 'Role Name',
			'chinese_name' => 'Chinese Name',
			'english_name' => 'English Name',
			'gender'       => 'Gender',
			'ic'           => 'IC',
			'position'     => 'Position',
			'branch'       => 'Branch',
			'join_date'    => 'Join Date',
			'resign_date'  => 'Resign Date',
		];
	}
}


