<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "fg_char".
 *
 * @property int $id
 * @property string $status
 * @property string $character
 * @property string $bi_hua
 * @property string $pin_yin
 * @property string $bi_hua_wu_xing
 * @property string $na_yin_wu_xing
 * @property int $is_show
 * @property string $meaning
 * @property string $create_date
 * @property string $update_date
 * @property string $remarks
 */
class FsChar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fs_char';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'meaning', 'remarks'], 'string'],
            [['character'], 'required'],
            [['create_date', 'update_date'], 'safe'],
            [['character', 'bi_hua_wu_xing', 'na_yin_wu_xing', 'is_show'], 'string', 'max' => 1],
            [['bi_hua'], 'string', 'max' => 2],
            [['pin_yin'], 'string', 'max' => 10],
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
            'character' => 'Character',
            'bi_hua' => 'Bi Hua',
            'pin_yin' => 'Pin Yin',
            'bi_hua_wu_xing' => 'Bi Hua Wu Xing',
            'na_yin_wu_xing' => 'Na Yin Wu Xing',
            'is_show' => 'Is Show',
            'meaning' => 'Meaning',
            'create_date' => 'Create Date',
            'update_date' => 'Update Date',
            'remarks' => 'Remarks',
        ];
    }
}
