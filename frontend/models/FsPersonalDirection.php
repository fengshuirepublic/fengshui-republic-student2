<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "fs_personal_direction".
 *
 * @property int $id
 * @property string $gua_datetime
 * @property string $date_start
 * @property string $date_end
 * @property int $male
 * @property int $female
 * @property string $animal_en
 * @property string $animal_cn
 */
class FsPersonalDirection extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_personal_direction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gua_datetime', 'date_start', 'date_end', 'male', 'female', 'animal_en', 'animal_cn'], 'required'],
            [['gua_datetime', 'date_start', 'date_end'], 'safe'],
            [['male', 'female'], 'integer'],
            [['animal_en', 'animal_cn'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gua_datetime' => 'Gua Datetime',
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
            'male' => 'Male',
            'female' => 'Female',
            'animal_en' => 'Animal En',
            'animal_cn' => 'Animal Cn',
        ];
    }
}
