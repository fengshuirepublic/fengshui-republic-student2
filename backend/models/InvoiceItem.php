<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "invoice_item".
 *
 * @property int $invoice_item_id
 * @property int $invoice_id
 * @property int $status
 * @property int $customer_service_id
 * @property string $create_date
 * @property int $create_by
 * @property string|null $update_date
 * @property int|null $update_by
 */
class InvoiceItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invoice_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['invoice_id', 'customer_service_id', 'create_date', 'create_by'], 'required'],
            [['invoice_id', 'status', 'customer_service_id', 'create_by', 'update_by'], 'integer'],
            [['create_date', 'update_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'invoice_item_id' => 'Invoice Item ID',
            'invoice_id' => 'Invoice ID',
            'status' => 'Status',
            'customer_service_id' => 'Customer Service ID',
            'create_date' => 'Create Date',
            'create_by' => 'Create By',
            'update_date' => 'Update Date',
            'update_by' => 'Update By',
        ];
    }

    public function getCase()
    {
        return $this->hasOne(CustomerGroupService::className(), ['customer_service_id' => 'customer_service_id']);
    }
}
