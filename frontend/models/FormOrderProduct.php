<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class FormOrderProduct extends Model
{
	public $form_code;
	public $postage_area;
	public $collect_at;
	public $name;
	public $email;
	public $phone;
	public $address_1;
	public $address_2;
	public $address_3;
	public $payment_type;

	public function rules()
	{
		return [
			[['postage_area'], 'in', 'range' => ['singapore', 'east_msia', 'west_msia']],
			[['collect_at'], 'in', 'range' => ['kl', 'jb']],
			[['payment_type'], 'in', 'range' => ['paypal', 'kiple']],
			[['form_code', 'collect_at', 'name', 'email', 'phone', 'address_1', 'address_2', 'payment_type'], 'required'],
			[['address_3'], 'safe'],
			[['form_code', 'phone'], 'string', 'max' => 45],
			[['name', 'email', 'address_1', 'address_2', 'address_3'], 'string', 'max' => 200],
		];
	}

	public function attributeLabels()
	{
		return [
			'form_code'    => 'Code',
			'collect_at'   => 'Collect At',
			'postage_area' => 'Postage Area',
			'name'         => 'Name',
			'email'        => 'Email',
			'phone'        => 'Phone',
			'address_1'    => 'Address 1',
			'address_2'    => 'Address 2',
			'address_3'    => 'Address 3',
			'payment_type' => 'Payment Type',
		];
	}
}


