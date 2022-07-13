<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class FormSearchInvoice extends Model
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
					'invoice_id' => SORT_DESC,
				],
				'attributes' => [
					'invoice_id',
					'customer.name_en',
					'invoice_number',
					'invoice_date',
				],
			],
		]);

		return $dataProvider;
	}

	protected function query()
	{
		$query = Invoice::find();
		$query->alias('invoice');
		$query->leftJoin('invoice_item','invoice_item.invoice_id = invoice.invoice_id');
		$query->leftJoin('customer','customer.customer_id = invoice.customer_id');
		$query->leftJoin('customer_group_service','customer_group_service.customer_service_id = invoice_item.customer_service_id');
		$query->leftJoin('services','services.service_id = customer_group_service.service_id');

		if (!$this->validate()) {
			return $query->andWhere("1=0");
		}

		$query->andFilterWhere([
			'and',
			['like', 'customer.name_en', $this->name_en],
			['like', 'services.category', $this->category],
			['like', 'customer_group_service.service_id', $this->service_id],
		]);

		$query->andFilterWhere([
			'and',
			['<>', 'invoice.status', 0],
		]);

		$query->groupBy(['invoice.invoice_id']);

		return $query;
	}
}
