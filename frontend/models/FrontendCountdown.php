<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "frontend_countdown".
 *
 * @property int $id
 * @property string $countdown_date
 */
class FrontendCountdown extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'frontend_countdown';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['countdown_date'], 'required'],
            [['countdown_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'countdown_date' => 'Countdown Date',
        ];
    }
}
