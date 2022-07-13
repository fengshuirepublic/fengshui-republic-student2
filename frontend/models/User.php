<?php

namespace frontend\models;

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
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
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

    public static function findByEmail($email)
    {
        return User::findOne(['email' => $email]);
    }

    public function validateEmail($email)
    {
        return $this->email === $email;
    }

    public static function findIdentity($id)
    {
        return static::findOne(['user_id' => $id, 'status' => 1]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return false;
    }

    public function getId()
    {
        return $this->user_id;
    }

    public function getAuthKey()
    {
        return false;
    }

    public function validateAuthKey($authKey)
    {
        return false;
    }
}
