<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $customer_id
 * @property string $customer_code A001
 * @property int $status
 * @property int $rate 3=normal
 * @property int $type 1=personal, 2=company
 * @property int|null $gender 1=male, 2=female
 * @property string $name_en 0=null
 * @property string|null $name_cn
 * @property string|null $ic
 * @property string|null $email_1
 * @property string|null $email_2
 * @property string $contact_number_1 0=null
 * @property string|null $contact_number_2
 * @property int|null $is_student 1=yes, 2=no
 * @property string|null $address_1
 * @property string|null $address_2
 * @property string|null $address_3
 * @property string|null $postcode
 * @property string|null $city
 * @property string|null $state
 * @property string|null $country
 * @property string|null $remark
 * @property string $create_date
 * @property int $create_by
 * @property string|null $update_date
 * @property int|null $update_by
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'rate', 'type', 'gender', 'is_student', 'create_by', 'update_by'], 'integer'],
            [['type', 'name_en', 'contact_number_1', 'create_date', 'create_by'], 'required'],
            [['city', 'remark'], 'string'],
            [['create_date', 'update_date'], 'safe'],
            [['customer_code'], 'string', 'max' => 10],
            [['name_en', 'email_1', 'email_2', 'address_1', 'address_2', 'address_3', 'state', 'country'], 'string', 'max' => 200],
            [['name_cn', 'postcode'], 'string', 'max' => 20],
            [['ic', 'contact_number_1', 'contact_number_2'], 'string', 'max' => 45],
            [['email_1', 'email_2'], 'email'],
            [['ic', 'contact_number_1', 'contact_number_2'], 'match', 'pattern' => '/^[0-9]*$/', 'message' => "{attribute} must be numbers only."],
            [['ic'], 'unique', 'filter' => ['<>', 'status', 0]],
            // [['name_en'], 'unique', 'filter' => ['<>', 'status', 0]],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'customer_id' => 'Customer ID',
            'customer_code' => 'Customer Code',
            'status' => 'Status',
            'rate' => 'Rate',
            'type' => 'Type',
            'gender' => 'Gender',
            'name_en' => 'Name (en)',
            'name_cn' => 'Name (cn)',
            'ic' => 'IC',
            'email_1' => '1st Email',
            'email_2' => '2nd Email',
            'contact_number_1' => '1st Contact Number',
            'contact_number_2' => '2nd Contact Number',
            'is_student' => 'Student',
            'address_1' => 'Address 1',
            'address_2' => 'Address 2',
            'address_3' => 'Address 3',
            'postcode' => 'Postcode',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'remark' => 'Remark',
            'create_date' => 'Create Date',
            'create_by' => 'Create By',
            'update_date' => 'Update Date',
            'update_by' => 'Update By',
        ];
    }

    public function getServices()
    {
        return $this->hasMany(CustomerGroupService::className(), ['customer_id' => 'customer_id']);
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
