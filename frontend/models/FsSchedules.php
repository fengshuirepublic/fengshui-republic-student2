<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "fs_schedules".
 *
 * @property int $id
 * @property int $status
 * @property string $type
 * @property string $name_en
 * @property string $name_cn
 * @property string $date
 * @property string $location
 * @property string $create_date
 */
class FsSchedules extends \yii\db\ActiveRecord
{
    public $cnt;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fs_schedules';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['type', 'name_en', 'name_cn', 'date', 'location', 'create_date'], 'required'],
            [['date', 'create_date'], 'safe'],
            [['type', 'location'], 'string', 'max' => 45],
            [['name_en', 'name_cn'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'type' => 'Type',
            'name_en' => 'Name EN',
            'name_cn' => 'Name CN',
            'date' => 'Date',
            'location' => 'Location',
            'create_date' => 'Create Date',
        ];
    }
}
