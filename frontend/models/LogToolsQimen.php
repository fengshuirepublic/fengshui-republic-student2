<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "log_tools_qimen".
 *
 * @property int $id
 * @property int $user_id
 * @property string $ip
 * @property int $calendar
 * @property int $type
 * @property int $year
 * @property int $month
 * @property int $day
 * @property int $hour
 * @property int $minute
 * @property int $s_month
 * @property string $create_date
 */
class LogToolsQimen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'log_tools_qimen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'ip', 'calendar', 'type', 'year', 'month', 'day', 'hour', 'minute', 's_month', 'create_date'], 'required'],
            [['user_id', 'calendar', 'type', 'year', 'month', 'day', 'hour', 'minute', 's_month'], 'integer'],
            [['create_date'], 'safe'],
            [['ip'], 'string', 'max' => 20],
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
            'calendar' => 'Calendar',
            'type' => 'Type',
            'year' => 'Year',
            'month' => 'Month',
            'day' => 'Day',
            'hour' => 'Hour',
            'minute' => 'Minute',
            's_month' => 'S Month',
            'create_date' => 'Create Date',
        ];
    }
}
