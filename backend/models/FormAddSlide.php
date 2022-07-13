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
class FormAddSlide extends \yii\db\ActiveRecord
{
    public $imgDesktop;
    public $imgMobile;

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
            [
                ['imgDesktop'],
                'image',
                'skipOnEmpty' => false,
                'extensions'  => 'jpg',
                'mimeTypes'   => 'image/jpeg',
                'maxSize'     => 1*1000*1000,
                'tooBig'      => 'Image file cannot exceed 1 MB.',
                'minWidth'    => 1920,
                'maxWidth'    => 1920,
                'minHeight'   => 540,
                'maxHeight'   => 540,
                'overHeight'  => 'Image file required dimension 1920px * 540px.',
                'overWidth'   => 'Image file required dimension 1920px * 540px.',
                'underHeight' => 'Image file required dimension 1920px * 540px.',
                'underWidth'  => 'Image file required dimension 1920px * 540px.',
            ],
            [
                ['imgMobile'],
                'image',
                'skipOnEmpty' => false,
                'extensions'  => 'jpg',
                'mimeTypes'   => 'image/jpeg',
                'maxSize'     => .5*1000*1000,
                'tooBig'      => 'Image file cannot exceed 500 KB.',
                'minWidth'    => 540,
                'maxWidth'    => 540,
                'minHeight'   => 810,
                'maxHeight'   => 810,
                'overHeight'  => 'Image file required dimension 540px * 810px.',
                'overWidth'   => 'Image file required dimension 540px * 810px.',
                'underHeight' => 'Image file required dimension 540px * 810px.',
                'underWidth'  => 'Image file required dimension 540px * 810px.',
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
            'name' => 'Name',
            'file' => 'File',
            'url' => 'Url',
            'create_date' => 'Create Date',
            'create_by' => 'Create By',
            'imgDesktop' => 'Desktop View Image',
            'imgMobile' => 'Mobile View Image',
        ];
    }

    public function uploadDesktopImage($file)
    {
        $this->imgDesktop->saveAs(Yii::getAlias('@frontend')."/web/setting/slider/{$file}-large.jpg");
        return true;
    }

    public function uploadMobileImage($file)
    {
        $this->imgMobile->saveAs(Yii::getAlias('@frontend')."/web/setting/slider/{$file}-small.jpg");
        return true;
    }
}
