<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class FormSearchCustomer extends Model
{
	public $name_en;
	public $name_cn;
	public $email_1;
	public $contact_number_1;

	public function rules()
	{
		return [
			[['name_en', 'name_cn', 'email_1', 'contact_number_1'], 'safe'],
		];
	}

	public function attributeLabels()
	{
		return [
			'name_en'          => 'Name (en)',
			'name_cn'          => 'Name (cn)',
			'email_1'          => '1st Email',
			'contact_number_1' => '1st Contact',
		];
	}

	public function search()
	{
		$dataProvider = new ActiveDataProvider([
			'query' => $this->query(),
			'pagination' => [
				'pageSize' => 30,
			],
			'sort'  => [
				'defaultOrder' => [
					'customer_id' => SORT_DESC,
				],
				'attributes' => [
					'customer_id',
					'name_en',
					'name_cn',
					'email_1',
					'contact_number_1',
					'is_student',
					'state',
				],
			],
		]);

		return $dataProvider;
	}

	protected function query()
	{
		$query = Customer::find();

		if (!$this->validate()) {
			return $query->andWhere("1=0");
		}

		$query->andFilterWhere([
			'and',
			['like', 'name_en', $this->name_en],
			['like', 'name_cn', $this->name_cn],
			['like', 'email_1', $this->email_1],
			['like', 'contact_number_1', $this->contact_number_1],
			['<>', 'status', 0],
		]);

		return $query;
	}
}
