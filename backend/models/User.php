<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $user_id
 * @property int $status
 * @property string $email
 * @property string $contact
 * @property string $name
 * @property string $code
 * @property int $amount_login
 * @property string $last_login
 * @property string $update_at
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'amount_login'], 'integer'],
            [['email', 'contact', 'name', 'code', 'update_at'], 'required'],
            [['last_login', 'update_at'], 'safe'],
            [['email', 'name'], 'string', 'max' => 200],
            [['contact'], 'string', 'max' => 100],
            [['code'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'status' => 'Status',
            'email' => 'Email',
            'contact' => 'Contact',
            'name' => 'Name',
            'code' => 'Code',
            'amount_login' => 'Amount Login',
            'last_login' => 'Last Login',
            'update_at' => 'Update At',
        ];
    }

    public function getBazis()
    {
        return $this->hasMany(LogToolsBazi::className(), ['user_id' => 'user_id']);
    }

    public function getNamings()
    {
        return $this->hasMany(LogToolsNaming::className(), ['user_id' => 'user_id']);
    }

    public function getQimens()
    {
        return $this->hasMany(LogToolsQimen::className(), ['user_id' => 'user_id']);
    }
}
