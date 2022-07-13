<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "access_bazi_report".
 *
 * @property string $username
 * @property int $is_visible
 * @property string $password
 * @property string $update_at
 */
class AccessBaziReport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'access_bazi_report';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'is_visible', 'password', 'update_at'], 'required'],
            [['is_visible'], 'integer'],
            [['update_at'], 'safe'],
            [['username'], 'string', 'max' => 45],
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
            'update_at' => 'Update At',
        ];
    }
}
