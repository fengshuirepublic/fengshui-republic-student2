<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bo_user".
 *
 * @property int $user_id
 * @property int $status
 * @property string $role level_1 > level_2 > level_3 > level_4 > level_5 > level_6
 * @property string $role_name
 * @property string $username
 * @property string $password
 * @property string $create_date
 * @property int $create_by
 */
class BoUser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bo_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'create_by'], 'integer'],
            [['role', 'role_name', 'username', 'password', 'create_date', 'create_by'], 'required'],
            [['create_date'], 'safe'],
            [['role', 'role_name'], 'string', 'max' => 45],
            [['username', 'password'], 'string', 'max' => 100],
            [['username'], 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'status' => 'Status',
            'role' => 'Role',
            'role_name' => 'Role Name',
            'username' => 'Username',
            'password' => 'Password',
            'create_date' => 'Create Date',
            'create_by' => 'Create By',
        ];
    }

    public static function findByUsername($username)
    {
        // $query = User::find();
        // $query->andWhere([
        //     'username' => $username,
        // ]);
        // return $query->one();
        return BoUser::findOne(['username' => $username]);
    }

    public function validatePassword($password)
    {
        return $this->password === md5('fsgw'.$password);
    }

    public static function findIdentity($id)
    {
        return static::findOne(['user_id' => $id, 'status' => 1]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // return static::findOne(['access_token' => $token]);
        return false;
    }

    public function getId()
    {
        return $this->user_id;
    }

    public function getAuthKey()
    {
        // return $this->authKey;
        return false;
    }

    public function validateAuthKey($authKey)
    {
        // return $this->authKey === $authKey;
        return false;
    }

    public function getInfo()
    {
        return $this->hasOne(BoUserInfo::className(), ['user_id' => 'user_id']);
    }
}
