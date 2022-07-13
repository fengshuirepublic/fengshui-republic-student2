<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "ecom_product".
 *
 * @property string $product_code
 * @property int $status
 * @property string $price
 * @property string $name_en
 * @property string $name_cn
 * @property int $is_postage
 * @property string $postage_singapore
 * @property string $postage_east_m
 * @property string $postage_west_m
 * @property string $remark
 */
class EcomProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_code', 'status', 'price', 'name_en', 'name_cn', 'postage_singapore', 'postage_east_m', 'postage_west_m'], 'required'],
            [['status', 'is_postage'], 'integer'],
            [['price', 'postage_singapore', 'postage_east_m', 'postage_west_m'], 'number'],
            [['name_en', 'name_cn', 'remark'], 'string'],
            [['product_code'], 'string', 'max' => 45],
            [['product_code'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_code' => 'Product Code',
            'status' => 'Status',
            'price' => 'Price',
            'name_en' => 'Name En',
            'name_cn' => 'Name Cn',
            'is_postage' => 'Is Postage',
            'postage_singapore' => 'Postage Singapore',
            'postage_east_m' => 'Postage East M',
            'postage_west_m' => 'Postage West M',
            'remark' => 'Remark',
        ];
    }
}
