<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "video_access".
 *
 * @property int $id
 * @property int $status
 * @property string $invoice_number
 * @property string $product_code
 * @property string $access_code
 * @property int $attendance 1=kl, 2=jb
 * @property int $expire_ts_url
 * @property string $create_date
 * @property string $update_date
 * @property string $remark
 */
class VideoAccess extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'video_access';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'attendance', 'expire_ts_url'], 'integer'],
            [['product_code', 'access_code', 'create_date'], 'required'],
            [['create_date', 'update_date'], 'safe'],
            [['remark'], 'string'],
            [['invoice_number', 'product_code'], 'string', 'max' => 45],
            [['access_code'], 'string', 'max' => 10],
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
            'product_code' => 'Product Code',
            'access_code' => 'Access Code',
            'attendance' => 'Attendance',
            'expire_ts_url' => 'Expire Ts Url',
            'create_date' => 'Create Date',
            'update_date' => 'Update Date',
            'remark' => 'Remark',
        ];
    }
}
