<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bo_paypal_payer".
 *
 * @property int $id
 * @property int $status
 * @property int $count
 * @property string $invoice_number
 * @property string $transaction_id
 * @property string $transaction_state
 * @property string $transaction_fee_value
 * @property string $transaction_fee_currency
 * @property string $payment_id
 * @property string $payment_state
 * @property string $payment_method
 * @property string $payment_mode
 * @property string $cart_id
 * @property string $payer_id
 * @property string $payer_status
 * @property string $payer_email
 * @property string $payer_first_name
 * @property string $payer_last_name
 * @property string $payer_phone
 * @property string $country_code
 * @property string $recipient_name
 * @property string $address_line1
 * @property string $address_line2
 * @property string $address_city
 * @property string $address_state
 * @property string $address_postal_code
 * @property string $address_country_code
 * @property string $currency
 * @property string $total
 * @property string $shipping
 * @property string $shipping_discount
 * @property string $merchant_id
 * @property string $merchant_email
 * @property string $description
 * @property string $protection_eligibility
 * @property string $protection_eligibility_type
 * @property string $create_time
 * @property string $update_time
 * @property string $remark
 * @property string $create_date
 */
class BoPaypalPayer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bo_paypal_payer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'count'], 'integer'],
            [['invoice_number', 'transaction_id', 'transaction_state', 'transaction_fee_value', 'transaction_fee_currency', 'payment_id', 'payment_state', 'payment_method', 'payment_mode', 'cart_id', 'payer_id', 'create_date'], 'required'],
            [['transaction_fee_value', 'total', 'shipping', 'shipping_discount'], 'number'],
            [['address_line1', 'address_line2', 'address_city', 'address_state', 'protection_eligibility_type', 'create_time', 'update_time', 'remark'], 'string'],
            [['create_date'], 'safe'],
            [['invoice_number', 'transaction_id', 'transaction_fee_currency', 'payment_id', 'payment_state', 'payment_method', 'cart_id', 'payer_id', 'payer_status', 'payer_phone', 'address_postal_code', 'currency', 'merchant_id', 'protection_eligibility'], 'string', 'max' => 45],
            [['transaction_state', 'payment_mode', 'payer_email', 'payer_first_name', 'payer_last_name', 'recipient_name', 'merchant_email', 'description'], 'string', 'max' => 200],
            [['country_code', 'address_country_code'], 'string', 'max' => 10],
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
            'transaction_id' => 'Transaction ID',
            'transaction_state' => 'Transaction State',
            'transaction_fee_value' => 'Transaction Fee Value',
            'transaction_fee_currency' => 'Transaction Fee Currency',
            'payment_id' => 'Payment ID',
            'payment_state' => 'Payment State',
            'payment_method' => 'Payment Method',
            'payment_mode' => 'Payment Mode',
            'cart_id' => 'Cart ID',
            'payer_id' => 'Payer ID',
            'payer_status' => 'Payer Status',
            'payer_email' => 'Payer Email',
            'payer_first_name' => 'Payer First Name',
            'payer_last_name' => 'Payer Last Name',
            'payer_phone' => 'Payer Phone',
            'country_code' => 'Country Code',
            'recipient_name' => 'Recipient Name',
            'address_line1' => 'Address Line1',
            'address_line2' => 'Address Line2',
            'address_city' => 'Address City',
            'address_state' => 'Address State',
            'address_postal_code' => 'Address Postal Code',
            'address_country_code' => 'Address Country Code',
            'currency' => 'Currency',
            'total' => 'Total',
            'shipping' => 'Shipping',
            'shipping_discount' => 'Shipping Discount',
            'merchant_id' => 'Merchant ID',
            'merchant_email' => 'Merchant Email',
            'description' => 'Description',
            'protection_eligibility' => 'Protection Eligibility',
            'protection_eligibility_type' => 'Protection Eligibility Type',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'remark' => 'Remark',
            'create_date' => 'Create Date',
        ];
    }
}
