<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "log_tools_naming".
 *
 * @property int $id
 * @property int $user_id
 * @property string $ip
 * @property string $name
 * @property string $create_date
 */
class LogToolsNaming extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'log_tools_naming';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'ip', 'name', 'create_date'], 'required'],
            [['user_id'], 'integer'],
            [['create_date'], 'safe'],
            [['ip'], 'string', 'max' => 20],
            [['name'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'ip' => 'Ip',
            'name' => 'Name',
            'create_date' => 'Create Date',
        ];
    }
}
