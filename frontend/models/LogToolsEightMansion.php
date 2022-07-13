<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "log_tools_eight_mansion".
 *
 * @property int $id
 * @property int $user_id
 * @property string $ip
 * @property string $facing
 * @property string $create_date
 */
class LogToolsEightMansion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'log_tools_eight_mansion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'ip', 'facing', 'create_date'], 'required'],
            [['user_id'], 'integer'],
            [['create_date'], 'safe'],
            [['ip'], 'string', 'max' => 20],
            [['facing'], 'string', 'max' => 200],
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
            'facing' => 'Facing',
            'create_date' => 'Create Date',
        ];
    }
}
