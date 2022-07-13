<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class FormSearchVideoPass extends Model
{
	public $invoice_number;
	public $attendance;

	public function rules()
	{
		return [
			[['attendance', 'invoice_number'], 'safe'],
		];
	}

	public function attributeLabels()
	{
		return [
			'invoice_number' => 'Invoice Number',
			'attendance' => 'Attend',
		];
	}

	public function search()
	{
		$dataProvider = new ActiveDataProvider([
			'query' => $this->query(),
			'sort'  => [
				'defaultOrder' => [
					'id' => SORT_DESC,
				],
				'attributes' => [
					'id',
					'invoice_number',
					'product_code',
					'access_code',
					'attendance',
					'remark'
				],
			],
		]);

		return $dataProvider;
	}

	public function excel()
	{
		$productOrders = $this->query()->all();
		return $productOrders;
	}

	protected function query()
	{
		$query = VideoAccess::find();
		// $query->alias('v');
		// $query->leftJoin('ecom_order','v.invoice_number = ecom_order.invoice_number');
		// $query->leftJoin('event_attendee','v.id = event_attendee.refer_id');

		if (!$this->validate()) {
			return $query->andWhere("1=0");
		}

		$query->andFilterWhere([
			'and',
			['like', 'invoice_number', $this->invoice_number],
			['=', 'attendance', $this->attendance],
			['<>', 'status', 0],
		]);

		return $query;
	}
}
