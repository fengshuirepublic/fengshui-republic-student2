<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class FormSearchProductOrder extends Model
{
	public $status;
	public $invoice_number;
	public $from;
	public $to;

	public function rules()
	{
		return [
			[['status', 'invoice_number', 'from', 'to'], 'safe'],
		];
	}

	public function attributeLabels()
	{
		return [
			'status'         => 'Status',
			'invoice_number' => 'Invoice ID',
			'from'           => 'From',
			'to'             => 'To',
		];
	}

	public function search()
	{
		$dataProvider = new ActiveDataProvider([
			'query' => $this->query(),
			'sort'  => [
				'defaultOrder' => [
					'order_id' => SORT_DESC,
				],
				'attributes' => [
					'order_id',
					'invoice_number',
					'deliver_status',
					'create_date',
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
		$query = EcomOrder::find();
		$query->alias('order');

		$query->leftJoin('ecom_payer_paypal','order.invoice_number = ecom_payer_paypal.invoice_number');
		$query->leftJoin('ecom_payer_kiple','order.invoice_number = ecom_payer_kiple.invoice_number');

		if (!$this->validate()) {
			return $query->andWhere("1=0");
		}

		if (empty($this->status)) {
			$this->status = 1;
		}

		$query->andFilterWhere([
			'and',
			['like', 'order.invoice_number', $this->invoice_number],
			['order.status' => $this->status],
		]);

		if (empty($this->from)) {
			if (!empty($this->to)) {
				$query->andWhere(['<=', 'order.create_date', $this->to]);
			}
		} else {
			if (empty($this->to)) {
				$query->andWhere(['>=', 'order.create_date', $this->from]);
			} else {
				$query->andWhere(['between', 'order.create_date', $this->from, $this->to]);
			}
		}

		$query->groupBy(['order.invoice_number']);

		return $query;
	}
}
