<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "country_list".
 *
 * @property string $country_code
 * @property string $phone_code
 * @property string $country_name
 */
class CountryList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_code', 'phone_code', 'country_name'], 'required'],
            [['country_code'], 'string', 'max' => 5],
            [['phone_code'], 'string', 'max' => 45],
            [['country_name'], 'string', 'max' => 200],
            [['country_code', 'phone_code'], 'unique', 'targetAttribute' => ['country_code', 'phone_code']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'country_code' => 'Country Code',
            'phone_code' => 'Phone Code',
            'country_name' => 'Country Name',
        ];
    }
}
