<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "setting_slider".
 *
 * @property int $id
 * @property int $status
 * @property int $sequence
 * @property string $name
 * @property string $file
 * @property string $url
 * @property string $create_date
 * @property int $create_by
 */
class SettingSlider extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'setting_slider';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'sequence', 'create_by'], 'integer'],
            [['sequence', 'name', 'file', 'create_date', 'create_by'], 'required'],
            [['url'], 'string'],
            [['create_date'], 'safe'],
            [['name'], 'string', 'max' => 200],
            [['file'], 'string', 'max' => 10],
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
            'sequence' => 'Sequence',
            'name' => 'Name',
            'file' => 'File',
            'url' => 'Url',
            'create_date' => 'Create Date',
            'create_by' => 'Create By',
        ];
    }
}
