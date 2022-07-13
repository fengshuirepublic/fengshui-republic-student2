<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property int $service_id
 * @property int $status
 * @property string $category
 * @property string $category_code
 * @property string $type_en
 * @property string $type_cn
 * @property float $price_refer
 * @property int $year
 * @property string $create_date
 * @property int $create_by
 * @property string|null $update_date
 * @property int|null $update_by
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'year', 'create_by', 'update_by'], 'integer'],
            [['category', 'category_code', 'type_en', 'type_cn', 'price_refer', 'year', 'create_date', 'create_by'], 'required'],
            [['price_refer'], 'number'],
            [['create_date', 'update_date'], 'safe'],
            [['category', 'type_en', 'type_cn'], 'string', 'max' => 200],
            [['category_code'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'service_id' => 'Service ID',
            'status' => 'Status',
            'category' => 'Category',
            'category_code' => 'Category Code',
            'type_en' => 'Service Type (en)',
            'type_cn' => 'Service Type (cn)',
            'price_refer' => 'Price Refer',
            'year' => 'Year',
            'create_date' => 'Create Date',
            'create_by' => 'Create By',
            'update_date' => 'Update Date',
            'update_by' => 'Update By',
        ];
    }
}
