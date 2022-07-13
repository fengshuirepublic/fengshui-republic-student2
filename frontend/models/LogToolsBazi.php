<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "log_tools_bazi".
 *
 * @property int $id
 * @property int $user_id
 * @property string $ip
 * @property string $cname
 * @property string $ename
 * @property int $gender
 * @property int $calendar
 * @property int $year
 * @property int $month
 * @property int $day
 * @property int $hour
 * @property int $minute
 * @property int $s_month
 * @property string $create_date
 */
class LogToolsBazi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'log_tools_bazi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'ip', 'cname', 'ename', 'gender', 'calendar', 'year', 'month', 'day', 'hour', 'minute', 's_month', 'create_date'], 'required'],
            [['user_id', 'gender', 'calendar', 'year', 'month', 'day', 'hour', 'minute', 's_month'], 'integer'],
            [['create_date'], 'safe'],
            [['ip'], 'string', 'max' => 20],
            [['cname', 'ename'], 'string', 'max' => 200],
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
            'cname' => 'Cname',
            'ename' => 'Ename',
            'gender' => 'Gender',
            'calendar' => 'Calendar',
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
