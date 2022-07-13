<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class FormSearchContactUs extends Model
{
	public $from;
	public $to;

	public function rules()
	{
		return [
			[['from', 'to'], 'safe'],
		];
	}

	public function attributeLabels()
	{
		return [
			'from' => 'From',
			'to'   => 'To',
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
					'service',
					'name',
					'email',
					'contact',
					'message',
					'create_date',
				],
			],
		]);

		return $dataProvider;
	}

	public function excel()
	{
		$onlineSales = $this->query()->all();
		return $onlineSales;
	}

	protected function query()
	{
		$query = ContactUs::find();

		if (!$this->validate()) {
			return $query->andWhere("1=0");
		}

		$query->andFilterWhere([
			'and',
			['<>', 'status', 0],
		]);

		if (empty($this->from)) {
			if (!empty($this->to)) {
				$query->where(['<=', 'create_date', $this->to]);
			}
		} else {
			if (empty($this->to)) {
				$query->where(['>=', 'create_date', $this->from]);
			} else {
				$query->where(['between', 'create_date', $this->from, $this->to]);
			}
		}

		return $query;
	}
}
