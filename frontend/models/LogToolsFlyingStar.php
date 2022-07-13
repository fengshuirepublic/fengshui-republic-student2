<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "log_tools_flying_star".
 *
 * @property int $id
 * @property int $user_id
 * @property string $ip
 * @property string $facing
 * @property string $period
 * @property string $create_date
 */
class LogToolsFlyingStar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'log_tools_flying_star';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'ip', 'facing', 'period', 'create_date'], 'required'],
            [['user_id'], 'integer'],
            [['create_date'], 'safe'],
            [['ip'], 'string', 'max' => 20],
            [['facing'], 'string', 'max' => 200],
            [['period'], 'string', 'max' => 45],
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
            'period' => 'Period',
            'create_date' => 'Create Date',
        ];
    }
}
