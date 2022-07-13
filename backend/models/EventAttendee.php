<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "event_attendee".
 *
 * @property int $id
 * @property int $refer_id
 * @property string $product_code
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $create_date
 * @property int $create_by
 * @property string $update_date
 * @property int $update_by
 */
class EventAttendee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event_attendee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['refer_id', 'product_code', 'name', 'email', 'phone', 'create_date', 'create_by'], 'required'],
            [['refer_id', 'create_by', 'update_by'], 'integer'],
            [['create_date', 'update_date'], 'safe'],
            [['product_code', 'phone'], 'string', 'max' => 45],
            [['name', 'email'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'refer_id' => 'Refer ID',
            'product_code' => 'Product Code',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'create_date' => 'Create Date',
            'create_by' => 'Create By',
            'update_date' => 'Update Date',
            'update_by' => 'Update By',
        ];
    }
}
