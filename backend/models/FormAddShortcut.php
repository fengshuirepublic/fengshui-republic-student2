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
class FormAddShortcut extends \yii\db\ActiveRecord
{
    public $img;

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
            [
                ['img'],
                'image',
                'skipOnEmpty' => false,
                'extensions'  => 'jpg',
                'mimeTypes'   => 'image/jpeg',
                'maxSize'     => .3*1000*1000,
                'tooBig'      => 'Image file cannot exceed 300 KB.',
                'minWidth'    => 750,
                'maxWidth'    => 750,
                'minHeight'   => 435,
                'maxHeight'   => 435,
                'overHeight'  => 'Image file required dimension 750px * 435px.',
                'overWidth'   => 'Image file required dimension 750px * 435px.',
                'underHeight' => 'Image file required dimension 750px * 435px.',
                'underWidth'  => 'Image file required dimension 750px * 435px.',
            ],
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
            'img' => 'Image',
        ];
    }

    public function uploadImage($file)
    {
        $this->img->saveAs(Yii::getAlias('@frontend')."/web/setting/shortcut/{$file}.jpg");
        return true;
    }
}
