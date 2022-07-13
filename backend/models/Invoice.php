<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "invoice".
 *
 * @property int $invoice_id
 * @property int $status
 * @property int $customer_id
 * @property string $invoice_number
 * @property string $invoice_date
 * @property float|null $discount
 * @property string|null $attention
 * @property int $item_per_page
 * @property string|null $remark
 * @property string $create_date
 * @property int $create_by
 * @property string|null $update_date
 * @property int|null $update_by
 */
class Invoice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invoice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'customer_id', 'item_per_page', 'create_by', 'update_by'], 'integer'],
            [['customer_id', 'invoice_number', 'invoice_date', 'create_date', 'create_by'], 'required'],
            [['invoice_date', 'create_date', 'update_date'], 'safe'],
            [['discount'], 'number'],
            [['attention', 'remark'], 'string'],
            [['invoice_number'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'invoice_id' => 'Invoice ID',
            'status' => 'Status',
            'customer_id' => 'Customer ID',
            'invoice_number' => 'Invoice Number',
            'invoice_date' => 'Invoice Date',
            'discount' => 'Discount',
            'attention' => 'Attention',
            'item_per_page' => 'Item Per Page',
            'remark' => 'Remark',
            'create_date' => 'Create Date',
            'create_by' => 'Create By',
            'update_date' => 'Update Date',
            'update_by' => 'Update By',
        ];
    }

    public function getStaff()
    {
        return $this->hasOne(BoUserInfo::className(), ['user_id' => 'create_by']);
    }

    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['customer_id' => 'customer_id']);
    }

    public function getItems()
    {
        return $this->hasMany(InvoiceItem::className(), ['invoice_id' => 'invoice_id'])->where(['<>', 'status', 0]);
    }
}
