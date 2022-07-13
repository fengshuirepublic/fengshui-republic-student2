<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ecom_order_detail".
 *
 * @property int $order_detail_id
 * @property int $deliver_status
 * @property int $order_id
 * @property string $product_code
 * @property int $quantity
 * @property string $price
 * @property string $create_date
 */
class EcomOrderDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_order_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deliver_status', 'order_id', 'quantity'], 'integer'],
            [['order_id', 'product_code', 'quantity', 'price', 'create_date'], 'required'],
            [['price'], 'number'],
            [['create_date'], 'safe'],
            [['product_code'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_detail_id' => 'Order Detail ID',
            'deliver_status' => 'Deliver Status',
            'order_id' => 'Order ID',
            'product_code' => 'Product Code',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'create_date' => 'Create Date',
        ];
    }

    public function getInfo()
    {
        return $this->hasOne(EcomProduct::className(), ['product_code' => 'product_code']);
    }
}
