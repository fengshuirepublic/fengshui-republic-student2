<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "enquiry".
 *
 * @property int $id
 * @property int $status
 * @property string $service
 * @property string $title
 * @property string $name_en
 * @property string $name_cn
 * @property string $contact
 * @property string $email
 * @property string $info
 * @property string $ip
 * @property string $create_date
 */
class Enquiry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'enquiry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['service', 'title', 'name_cn', 'contact', 'email', 'info', 'ip', 'create_date'], 'required'],
            [['service', 'info'], 'string'],
            [['create_date'], 'safe'],
            [['title'], 'string', 'max' => 5],
            [['name_en', 'email'], 'string', 'max' => 100],
            [['name_cn', 'contact', 'ip'], 'string', 'max' => 20],
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
            'title' => 'Title',
            'name_en' => 'Name En',
            'name_cn' => 'Name Cn',
            'contact' => 'Contact',
            'email' => 'Email',
            'info' => 'Info',
            'ip' => 'Ip',
            'create_date' => 'Create Date',
        ];
    }
}
