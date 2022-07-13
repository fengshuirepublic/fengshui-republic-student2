<?php

namespace backend\models;

use Yii;
use yii\base\Model;

class FormNewVideoPass extends Model
{
    public $id;
    public $product_code;
    public $attendance; // 1=kl, 2=jb
    public $name;
    public $email;
    public $phone;
    public $remark;

    public function rules()
    {
        return [
            [['id', 'attendance'], 'integer'],
            [['product_code', 'attendance', 'name', 'email', 'phone'], 'required'],
            [['remark'], 'string'],
            [['product_code', 'phone'], 'string', 'max' => 45],
            [['name', 'email'], 'string', 'max' => 200],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_code' => 'Product Code',
            'attendance' => 'Attend',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'remark' => 'Remark',
        ];
    }
}


