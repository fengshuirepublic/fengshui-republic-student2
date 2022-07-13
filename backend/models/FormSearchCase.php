<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class FormSearchCase extends Model
{
	public $name_en;
	public $category;
	public $service_id;
	public $date_from;
	public $date_to;

	public function rules()
	{
		return [
			[['name_en', 'category', 'service_id', 'date_from', 'date_to'], 'safe'],
		];
	}

	public function attributeLabels()
	{
		return [
			'name_en'    => 'Customer Name (en)',
			'category'   => 'Category',
			'service_id' => 'Service Type',
			'date_from'  => 'From Date',
			'date_to'    => 'To Date',
		];
	}

	public function search()
	{
		$dataProvider = new ActiveDataProvider([
			'query' => $this->query(),
			'sort'  => [
				'defaultOrder' => [
					'service_date' => SORT_DESC,
					'customer_service_id' => SORT_DESC,
				],
				'attributes' => [
					'customer_service_id',
					'customer.name_en',
					'service_date',
					'services.category',
					'services.type_en',
					'bo_user_info.english_name',
					'price',
					'deposit',
					'remain',
					'is_clear',
				],
			],
		]);

		return $dataProvider;
	}

	protected function query()
	{
		$query = CustomerGroupService::find();
		$query->alias('cgs');
		$query->leftJoin('bo_user_info','bo_user_info.user_id = cgs.staff_id');
		$query->leftJoin('customer','customer.customer_id = cgs.customer_id');
		$query->leftJoin('services','services.service_id = cgs.service_id');

		if (!$this->validate()) {
			return $query->andWhere("1=0");
		}

		$query->andFilterWhere([
			'and',
			['like', 'customer.name_en', $this->name_en],
			['like', 'services.category', $this->category],
			['like', 'cgs.service_id', $this->service_id],
		]);

		$query->andFilterWhere([
			'and',
			['<>', 'cgs.status', 0],
		]);

		return $query;
	}
}


