<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class FormSearchSchedule extends Model
{
	public $type;
	public $location;

	public function rules()
	{
		return [
			[['type'], 'in', 'range' => ['All', 'Bazi', 'Qimen', 'Yijing', 'Fengshui', 'Yiyanduan', 'Mianxiang']],
			[['location'], 'in', 'range' => ['All', 'KL', 'JB', 'KL & JB']],
			[['type', 'location'], 'safe'],
		];
	}

	public function attributeLabels()
	{
		return [
			'type' => 'Type',
			'location' => 'Location',
		];
	}

	public function search()
	{
		$dataProvider = new ActiveDataProvider([
			'query' => $this->query(),
			'pagination' => false,
			'sort'  => [
				'defaultOrder' => [
					'location' => SORT_DESC,
					'type' => SORT_ASC,
					'date' => SORT_ASC,
				],
				'attributes' => [
					'type',
					'name_en',
					'name_cn',
					'date',
					'location',
				],
			],
		]);

		return $dataProvider;
	}

	protected function query()
	{
		$query = FsSchedules::find();

		if (!$this->validate()) {
			return $query->andWhere("1=0");
		}

		$query->andFilterWhere([
			'and',
			['<>', 'status', 0],
		]);

		if ($this->type && $this->type != 'All') {
			$query->andWhere([
				'type' => $this->type,
			]);
		}

		if ($this->location && $this->location != 'All') {
			$query->andWhere([
				'location' => $this->location,
			]);
		}

		return $query;
	}
}
