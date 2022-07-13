<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class FormSearchCourse extends Model
{
	public $year;

	public function rules()
	{
		return [
			[['year'], 'safe'],
		];
	}

	public function attributeLabels()
	{
		return [
			'year' => 'Year',
		];
	}

	public function search()
	{
		$dataProvider = new ActiveDataProvider([
			'query' => $this->query(),
			// 'pagination' => [
			// 	'pageSize' => 30,
			// ],
			'sort'  => [
				'defaultOrder' => [
					'service_id' => SORT_DESC,
				],
				'attributes' => [
					'service_id',
					'type_en',
					'type_cn',
					'price_refer',
					'year',
				],
			],
		]);

		return $dataProvider;
	}

	protected function query()
	{
		$query = Services::find();

		if (!$this->validate()) {
			return $query->andWhere("1=0");
		}

		$query->andFilterWhere([
			'and',
			['=', 'year', $this->year],
			['=', 'category', 'course'],
			['<>', 'status', 0],
		]);

		return $query;
	}
}
