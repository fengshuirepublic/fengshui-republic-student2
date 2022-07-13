<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "video_url".
 *
 * @property int $id
 * @property int $video_access_id
 * @property string $url
 * @property int $sequence
 */
class VideoUrl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'video_url';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['video_access_id', 'url', 'sequence'], 'required'],
            [['video_access_id', 'sequence'], 'integer'],
            [['url'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'video_access_id' => 'Video Access ID',
            'url' => 'Url',
            'sequence' => 'Sequence',
        ];
    }
}
