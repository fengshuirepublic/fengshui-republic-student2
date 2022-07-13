<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bo_paypal_product".
 *
 * @property int $id
 * @property int $status
 * @property string $item_name
 * @property string $item_number
 * @property string $invoice_number
 * @property string $transaction_id
 * @property string $name
 * @property string $name_cn
 * @property string $email
 * @property string $phone
 * @property string $remark
 * @property string $create_date
 */
class BoPaypalProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bo_paypal_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['item_name', 'item_number', 'invoice_number', 'create_date'], 'required'],
            [['remark'], 'string'],
            [['create_date'], 'safe'],
            [['item_name', 'name', 'name_cn', 'email'], 'string', 'max' => 200],
            [['item_number', 'invoice_number', 'transaction_id', 'phone'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'item_name' => 'Item Name',
            'item_number' => 'Item Number',
            'invoice_number' => 'Invoice Number',
            'transaction_id' => 'Transaction ID',
            'name' => 'Name',
            'name_cn' => 'Name Cn',
            'email' => 'Email',
            'phone' => 'Phone',
            'remark' => 'Remark',
            'create_date' => 'Create Date',
        ];
    }
}
