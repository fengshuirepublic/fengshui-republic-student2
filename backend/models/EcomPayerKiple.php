<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ecom_payer_kiple".
 *
 * @property int $id
 * @property int $status 1=success,2=fail,3=abort
 * @property int $count
 * @property string $invoice_number ord_mercref
 * @property string $kiple_reference wcID
 * @property string $transaction_state returncode
 * @property string $transaction_amount ord_totalamt
 * @property string $transaction_datetime ord_date
 * @property string $transaction_gst ord_gstamt
 * @property string $service_charge ord_svccharges
 * @property string $delivery_charge ord_delcharges
 * @property string $order_key ord_key
 * @property string $payer_name ord_shipname
 * @property string $payer_phone ord_telephone
 * @property string $payer_email ord_email
 * @property string $payer_country ord_shipcountry
 * @property string $custom_field_1 ord_customfield1
 * @property string $custom_field_2 ord_customfield2
 * @property string $remark
 * @property string $create_date
 */
class EcomPayerKiple extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_payer_kiple';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'invoice_number', 'create_date'], 'required'],
            [['status', 'count'], 'integer'],
            [['transaction_amount', 'transaction_gst', 'service_charge', 'delivery_charge'], 'number'],
            [['transaction_datetime', 'create_date'], 'safe'],
            [['remark'], 'string'],
            [['invoice_number', 'transaction_state', 'payer_country'], 'string', 'max' => 45],
            [['kiple_reference', 'payer_name', 'payer_phone', 'payer_email', 'custom_field_1', 'custom_field_2'], 'string', 'max' => 200],
            [['order_key'], 'string', 'max' => 100],
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
            'count' => 'Count',
            'invoice_number' => 'Invoice Number',
            'kiple_reference' => 'Kiple Reference',
            'transaction_state' => 'Transaction State',
            'transaction_amount' => 'Transaction Amount',
            'transaction_datetime' => 'Transaction Datetime',
            'transaction_gst' => 'Transaction Gst',
            'service_charge' => 'Service Charge',
            'delivery_charge' => 'Delivery Charge',
            'order_key' => 'Order Key',
            'payer_name' => 'Payer Name',
            'payer_phone' => 'Payer Phone',
            'payer_email' => 'Payer Email',
            'payer_country' => 'Payer Country',
            'custom_field_1' => 'Custom Field 1',
            'custom_field_2' => 'Custom Field 2',
            'remark' => 'Remark',
            'create_date' => 'Create Date',
        ];
    }
}
