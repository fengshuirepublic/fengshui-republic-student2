<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "customer_group_service".
 *
 * @property int $customer_service_id
 * @property int $customer_id
 * @property string $service_code
 * @property string $service_number
 * @property int $status
 * @property int $service_id
 * @property string|null $description
 * @property int $staff_id
 * @property float $price
 * @property float|null $deposit
 * @property float|null $remain
 * @property int $is_clear
 * @property int $payment_method
 * @property string $service_date
 * @property string|null $remark
 * @property string $create_date
 * @property int $create_by
 * @property string|null $update_date
 * @property int|null $update_by
 */
class CustomerGroupService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer_group_service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'service_number', 'service_id', 'staff_id', 'price', 'payment_method', 'service_date', 'create_date', 'create_by'], 'required'],
            [['customer_id', 'status', 'service_id', 'staff_id', 'is_clear', 'payment_method', 'create_by', 'update_by'], 'integer'],
            [['description', 'remark'], 'string'],
            [['price', 'deposit', 'remain'], 'number'],
            [['service_date', 'create_date', 'update_date'], 'safe'],
            [['service_code', 'service_number'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'customer_service_id' => 'Customer Service ID',
            'customer_id' => 'Customer ID',
            'service_code' => 'Service Code',
            'service_number' => 'Service Number',
            'status' => 'Status',
            'service_id' => 'Service ID',
            'description' => 'Description',
            'staff_id' => 'Staff ID',
            'price' => 'Price',
            'deposit' => 'Deposit',
            'remain' => 'Remain',
            'is_clear' => 'Is Clear',
            'payment_method' => 'Payment Method',
            'service_date' => 'Service Date',
            'remark' => 'Remark',
            'create_date' => 'Create Date',
            'create_by' => 'Create By',
            'update_date' => 'Update Date',
            'update_by' => 'Update By',
        ];
    }

    public function getStaff()
    {
        return $this->hasOne(BoUserInfo::className(), ['user_id' => 'staff_id']);
    }

    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['customer_id' => 'customer_id']);
    }

    public function getService()
    {
        return $this->hasOne(Services::className(), ['service_id' => 'service_id']);
    }

    public function getCreate()
    {
        return $this->hasOne(BoUserInfo::className(), ['user_id' => 'create_by']);
    }

    public function getUpdate()
    {
        return $this->hasOne(BoUserInfo::className(), ['user_id' => 'update_by']);
    }
}
