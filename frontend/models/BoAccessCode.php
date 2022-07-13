<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bo_access_code".
 *
 * @property int $id
 * @property int $status
 * @property string $invoice_number
 * @property string $item_number
 * @property string $code
 * @property string $create_date
 */
class BoAccessCode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bo_access_code';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['invoice_number', 'item_number', 'code', 'create_date'], 'required'],
            [['create_date'], 'safe'],
            [['invoice_number', 'item_number'], 'string', 'max' => 45],
            [['code'], 'string', 'max' => 10],
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
            'invoice_number' => 'Invoice Number',
            'item_number' => 'Item Number',
            'code' => 'Code',
            'create_date' => 'Create Date',
        ];
    }
}
