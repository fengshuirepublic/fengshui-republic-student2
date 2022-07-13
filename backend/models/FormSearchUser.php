<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class FormSearchUser extends Model
{
	public $status;
	public $email;
	public $contact;
	public $name;

	public function rules()
	{
		return [
			[['status', 'email', 'contact', 'name'], 'safe'],
		];
	}

	public function attributeLabels()
	{
		return [
			'status'  => 'Status',
			'email'   => 'Email',
			'contact' => 'Contact',
			'name'    => 'Name',
		];
	}

	public function search()
	{
		$dataProvider = new ActiveDataProvider([
			'query' => $this->query(),
			'sort'  => [
				'defaultOrder' => [
					'user_id' => SORT_DESC,
				],
				'attributes' => [
					'user_id',
					'status',
					'email',
					'contact',
					'name',
					'amount_login',
					'last_login',
				],
			],
		]);

		return $dataProvider;
	}

	protected function query()
	{
		$query = User::find();

		if (!$this->validate()) {
			return $query->andWhere("1=0");
		}

		// $query->andFilterWhere([
		// 	'and',
		// 	['<>', 'status', 0],
		// ]);

		$query->andFilterWhere([
			'and',
			['=', 'status', $this->status],
			['like', 'email', $this->email],
			['like', 'contact', $this->contact],
			['like', 'name', $this->name],
			// ['<>', 'status', 0],
		]);

		// if (!empty($this->job_receive_from)) {
		// 	$query->andWhere(['>=', 'job.receive_date', $this->job_receive_from]);
		// }

		return $query;
	}
}
