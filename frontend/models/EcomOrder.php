<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "ecom_order".
 *
 * @property int $order_id
 * @property int $status
 * @property int $deliver_status
 * @property string $payment_id
 * @property int $payment_type 1=paypal,2=ipay
 * @property string $payment_price
 * @property int $postage_area 0=none,1=singapore,2=east.m,3=west.m
 * @property string $postage_price
 * @property string $invoice_number
 * @property string $form_code
 * @property string $collect_at
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address_1
 * @property string $address_2
 * @property string $address_3
 * @property string $remark
 * @property int $expiry_count
 * @property string $create_date
 */
class EcomOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'deliver_status', 'payment_type', 'postage_area', 'expiry_count'], 'integer'],
            [['payment_price', 'postage_price'], 'number'],
            [['form_code', 'create_date'], 'required'],
            [['remark'], 'string'],
            [['create_date'], 'safe'],
            [['payment_id', 'invoice_number', 'form_code', 'collect_at', 'phone'], 'string', 'max' => 45],
            [['name', 'email', 'address_1', 'address_2', 'address_3'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'status' => 'Status',
            'deliver_status' => 'Deliver Status',
            'payment_id' => 'Payment ID',
            'payment_type' => 'Payment Type',
            'payment_price' => 'Payment Price',
            'postage_area' => 'Postage Area',
            'postage_price' => 'Postage Price',
            'invoice_number' => 'Invoice Number',
            'form_code' => 'Form Code',
            'collect_at' => 'Collect At',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'address_1' => 'Address 1',
            'address_2' => 'Address 2',
            'address_3' => 'Address 3',
            'remark' => 'Remark',
            'expiry_count' => 'Expiry Count',
            'create_date' => 'Create Date',
        ];
    }

    public function getItems()
    {
        return $this->hasMany(EcomOrderDetail::className(), ['order_id' => 'order_id']);
    }
}
