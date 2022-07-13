<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "qimen_access".
 *
 * @property int $is_visible
 * @property string $username
 * @property string $password
 * @property string $access
 * @property string $update_at
 */
class AccessQimen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'access_qimen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_visible', 'username', 'password', 'access', 'update_at'], 'required'],
            [['is_visible'], 'integer'],
            [['update_at'], 'safe'],
            [['username', 'access'], 'string', 'max' => 45],
            [['password'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'is_visible' => 'Is Visible',
            'username' => 'Username',
            'password' => 'Password',
            'access' => 'Access',
            'update_at' => 'Update At',
        ];
    }
}
