<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "access_yijing".
 *
 * @property string $username
 * @property int $is_visible
 * @property string $password
 * @property string $access
 * @property string $update_at
 */
class AccessYijing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'access_yijing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'is_visible', 'password', 'access', 'update_at'], 'required'],
            [['is_visible'], 'integer'],
            [['update_at'], 'safe'],
            [['username', 'access'], 'string', 'max' => 45],
            [['password'], 'string', 'max' => 100],
            [['username'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'is_visible' => 'Is Visible',
            'password' => 'Password',
            'access' => 'Access',
            'update_at' => 'Update At',
        ];
    }
}
