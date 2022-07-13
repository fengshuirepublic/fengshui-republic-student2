<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "setting_shortcut".
 *
 * @property int $id
 * @property int $status
 * @property int $sequence
 * @property string $name_en
 * @property string $name_cn
 * @property string $file
 * @property string $url
 * @property string $create_date
 * @property int $create_by
 */
class SettingShortcut extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'setting_shortcut';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'sequence', 'create_by'], 'integer'],
            [['sequence', 'name_en', 'name_cn', 'file', 'create_date', 'create_by'], 'required'],
            [['url'], 'string'],
            [['create_date'], 'safe'],
            [['name_en', 'name_cn'], 'string', 'max' => 200],
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
            'name_en' => 'Name En',
            'name_cn' => 'Name Cn',
            'file' => 'File',
            'url' => 'Url',
            'create_date' => 'Create Date',
            'create_by' => 'Create By',
        ];
    }
}
