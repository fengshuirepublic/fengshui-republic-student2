<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "contact_us".
 *
 * @property int $id
 * @property int $status
 * @property int $service
 * @property string $name
 * @property string $email
 * @property string $contact
 * @property string $message
 * @property string $create_date
 */
class ContactUs extends \yii\db\ActiveRecord
{
    public $captcha;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact_us';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'service'], 'integer'],
            [['service', 'name', 'email', 'contact', 'message', 'create_date'], 'required'],
            [['message'], 'string'],
            [['create_date'], 'safe'],
            [['name'], 'string', 'max' => 200],
            [['email', 'contact'], 'string', 'max' => 100],
            [['captcha'], 'captcha'],
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
            'service' => 'Service',
            'name' => 'Name',
            'email' => 'Email',
            'contact' => 'Contact',
            'message' => 'Message',
            'create_date' => 'Create Date',
        ];
    }
}
