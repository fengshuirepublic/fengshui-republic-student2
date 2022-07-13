<?php
namespace frontend\controllers;

use Yii;
use Mandrill;
use Exception;
use yii\db\Transaction;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\BoPaypalProduct;
use frontend\models\BoPaypalPayer;
use frontend\models\BoAccessCode;
use frontend\models\EcomOrder;
use frontend\models\EcomPayerPaypal;
use frontend\lib\mail\GetResponse;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction as PayPalTransaction;
use PayPal\Exception\PayPalConnectionException;

class PaypalController extends Controller
{
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => [
					'',
				],
				'rules' => [
					[
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [],
			],
		];
	}

	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
		];
	}

	public function actionExecutePayment()
	{
		// $apiContext = new ApiContext(
		// 	new OAuthTokenCredential(
		// 		'AY6scak0C2uIl8Af4K9FsoYiMecjBlBEWMt2ONH5wExK3BXzc3iWMud1c1z5eOGw3oJpJZWMEaM8hiGe',     // Sandbox ClientID
		// 		'EJyAtDYVIuYry2_F1dJcPVVp5PRZJEwyJNxpwLkd32Fpy-JAVu5_dvxl_M8HVAuYNUIdiOJPlo9-nGqB'      // Sandbox ClientSecret
		// 	)
		// );

		$apiContext = new ApiContext(
			new OAuthTokenCredential(
				'AU7iTg5VPc9dMOzGAyr3NQJlXJbeONUGHjroyQ6rzDhfrBGtGqh4tzEWhnhEvWKcGbA1HzPhoYoUW8FX',     // Live ClientID
				'ENhkgrryfU_hhU6WMkQnwnODQwGAeTHzDSEa_2ekNvMOEyaHtALVypdrlTXcuWiGtwK4-RhtxIOrsQuD'      // Live ClientSecret
			)
		);
		$apiContext->setConfig(
			array(
				'mode' => 'live',
			)
		);

		if (isset($_GET['order']) && $_GET['order'] == 'success') {
			$paymentId = $_GET['paymentId'];
			$redirect  = $_GET['redirect'];

			try {
				$payment = Payment::get($paymentId, $apiContext);
			} catch (Exception $ex) {
				Yii::info($ex->getCode().'-'.$ex->getMessage(), 'paypal-notify');
				return $this->redirect(["/{$redirect}?order=error"]);
			}

			$execution = new PaymentExecution();
			$execution->setPayerId($_GET['PayerID']);

			try {
				$result = $payment->execute($execution, $apiContext);
				$payment = Payment::get($paymentId, $apiContext);
			} catch (Exception $ex) {
				Yii::info($ex->getCode().'-'.$ex->getMessage(), 'paypal-notify');
				return $this->redirect(["/{$redirect}?order=error"]);
			}

			$new_payer = new BoPaypalPayer();
			$new_payer->cart_id                     = $payment->cart;
			$new_payer->payment_id                  = $payment->id;
			$new_payer->payment_state               = $payment->state;
			$new_payer->payment_method              = $payment->payer->payment_method;
			$new_payer->payer_status                = $payment->payer->status;
			$new_payer->payer_email                 = $payment->payer->payer_info->email;
			$new_payer->payer_first_name            = $payment->payer->payer_info->first_name;
			$new_payer->payer_last_name             = $payment->payer->payer_info->last_name;
			$new_payer->payer_id                    = $payment->payer->payer_info->payer_id;
			$new_payer->payer_phone                 = $payment->payer->payer_info->phone;
			$new_payer->country_code                = $payment->payer->payer_info->country_code;
			$new_payer->recipient_name              = $payment->payer->payer_info->shipping_address->recipient_name;
			$new_payer->address_line1               = $payment->payer->payer_info->shipping_address->line1;
			$new_payer->address_line2               = $payment->payer->payer_info->shipping_address->line2;
			$new_payer->address_city                = $payment->payer->payer_info->shipping_address->city;
			$new_payer->address_state               = $payment->payer->payer_info->shipping_address->state;
			$new_payer->address_postal_code         = $payment->payer->payer_info->shipping_address->postal_code;
			$new_payer->address_country_code        = $payment->payer->payer_info->shipping_address->country_code;
			$new_payer->currency                    = $payment->transactions[0]->amount->currency;
			$new_payer->total                       = $payment->transactions[0]->amount->total;
			$new_payer->shipping                    = $payment->transactions[0]->amount->details->shipping;
			$new_payer->shipping_discount           = $payment->transactions[0]->amount->details->shipping_discount;
			$new_payer->merchant_id                 = $payment->transactions[0]->payee->merchant_id;
			$new_payer->merchant_email              = $payment->transactions[0]->payee->email;
			$new_payer->description                 = $payment->transactions[0]->description;
			$new_payer->invoice_number              = $payment->transactions[0]->invoice_number;
			$new_payer->transaction_id              = $payment->transactions[0]->related_resources[0]->sale->id;
			$new_payer->transaction_state           = $payment->transactions[0]->related_resources[0]->sale->state;
			$new_payer->payment_mode                = $payment->transactions[0]->related_resources[0]->sale->payment_mode;
			$new_payer->protection_eligibility      = $payment->transactions[0]->related_resources[0]->sale->protection_eligibility;
			$new_payer->protection_eligibility_type = $payment->transactions[0]->related_resources[0]->sale->protection_eligibility_type;
			$new_payer->transaction_fee_value       = $payment->transactions[0]->related_resources[0]->sale->transaction_fee->value;
			$new_payer->transaction_fee_currency    = $payment->transactions[0]->related_resources[0]->sale->transaction_fee->currency;
			$new_payer->create_time                 = $payment->transactions[0]->related_resources[0]->sale->create_time;
			$new_payer->update_time                 = $payment->transactions[0]->related_resources[0]->sale->update_time;
			$new_payer->create_date                 = date("Y-m-d H:i:s");
			if ($new_payer->save() !== false) {

				// $product     = BoPaypalProduct::findOne(['invoice_number' => $new_payer->invoice_number]);
				// $access_code = BoAccessCode::findOne(['invoice_number' => $new_payer->invoice_number]);

				// if ($product && $access_code) {
				// 	$product->status => 1;
				// 	$product->transaction_id => $new_payer->transaction_id;

				// 	$access_code->status => 1;

				// 	if ($product->update() !== false && $access_code->update() !== false) {
				// 		// update successful
				// 	} else {
				// 		// update failed
				// 	}
				// }

				BoPaypalProduct::updateAll([
					'status'         => 1,
					'transaction_id' => $new_payer->transaction_id,
				], "invoice_number = '$new_payer->invoice_number'");

				if ($redirect == '2019video') {
					// BoAccessCode::updateAll([
					// 	'status'         => 1,
					// ], "invoice_number = '$new_payer->invoice_number'");

					$access_code = BoAccessCode::findOne(['invoice_number' => $new_payer->invoice_number]);
					$access_code->status = 1;
					if ($access_code->update() !== false) {
						/* send email */
						$link             ="http://fengshui-republic.com/2019fengshui-video";
						$getresponse 			= new GetResponse(
							Yii::$app->params['getresponse.apiKey'],
							Yii::$app->params['getresponse.domain'],
							Yii::$app->params['getresponse.tagId']
						);
						$template_name    = "republic-code";
						$template_content = [
							[
								'name'    => 'name',
								'content' => $new_payer->payer_first_name,
							],
							[
								'name'    => 'code',
								'content' => $access_code->code,
							],
							[
								'name'    => 'link',
								'content' => $link,
							],
						];
						$message = [
							'from_field_id'=> 'yp8Rf', // 'no-reply@fengshui-republic.com'
							// 'from_email'   => 'no-reply@fengshui-republic.com',
							// 'from_name'    => "Fengshui Republic",
							'track_opens'  => true,
							'track_clicks' => true,
							'auto_text'    => true,
							'merge'        => true,
							'subject'      => 'Thank you for purchasing our product',
							'to'           => [
								[
									'email' => $new_payer->payer_email,
									'name'  => $new_payer->payer_first_name,
									'type'  => 'to',
								],
							],
						];
						$getresponse->sendTemplate($template_name, $template_content, $message);
					}
				}
			}

			$log = var_export($payment->toArray(), true);
			Yii::info($log, 'paypal-notify');

			return $this->redirect(["/{$redirect}?order=success"]);
		} else {
			$redirect  = $_GET['redirect'];
			return $this->redirect(["/{$redirect}?order=cancel"]);
		}
	}

	public function actionExecuteEcomPayment()
	{
		$apiContext = new ApiContext(
			new OAuthTokenCredential(
				'AU7iTg5VPc9dMOzGAyr3NQJlXJbeONUGHjroyQ6rzDhfrBGtGqh4tzEWhnhEvWKcGbA1HzPhoYoUW8FX',     // Live ClientID
				'ENhkgrryfU_hhU6WMkQnwnODQwGAeTHzDSEa_2ekNvMOEyaHtALVypdrlTXcuWiGtwK4-RhtxIOrsQuD'      // Live ClientSecret
			)
		);
		$apiContext->setConfig(
			array(
				'mode' => 'live',
			)
		);

		if (isset($_GET['order']) && $_GET['order'] == 'success') {
			$paymentId = $_GET['paymentId'];

			try {
				$payment = Payment::get($paymentId, $apiContext);
			} catch (Exception $ex) {
				Yii::info($ex->getCode().'-'.$ex->getMessage(), 'paypal-notify');
				return $this->redirect(["/products/list?order=error"]);
			}

			$execution = new PaymentExecution();
			$execution->setPayerId($_GET['PayerID']);

			try {
				$result = $payment->execute($execution, $apiContext);
				$payment = Payment::get($paymentId, $apiContext);
			} catch (Exception $ex) {
				Yii::info($ex->getCode().'-'.$ex->getMessage(), 'paypal-notify');
				return $this->redirect(["/products/list?order=error"]);
			}

			$payer = EcomPayerPaypal::find()->where([
				'and',
				['status' => 1],
				['transaction_id' => $payment->transactions[0]->related_resources[0]->sale->id],
			])->one();

			if ($payer) {
				$payer->cart_id                     = $payment->cart;
				$payer->payment_id                  = $payment->id;
				$payer->payment_state               = $payment->state;
				$payer->payment_method              = $payment->payer->payment_method;
				$payer->payer_status                = $payment->payer->status;
				$payer->payer_email                 = $payment->payer->payer_info->email;
				$payer->payer_first_name            = $payment->payer->payer_info->first_name;
				$payer->payer_last_name             = $payment->payer->payer_info->last_name;
				$payer->payer_id                    = $payment->payer->payer_info->payer_id;
				$payer->payer_phone                 = $payment->payer->payer_info->phone;
				$payer->country_code                = $payment->payer->payer_info->country_code;
				$payer->recipient_name              = $payment->payer->payer_info->shipping_address->recipient_name;
				$payer->address_line1               = $payment->payer->payer_info->shipping_address->line1;
				$payer->address_line2               = $payment->payer->payer_info->shipping_address->line2;
				$payer->address_city                = $payment->payer->payer_info->shipping_address->city;
				$payer->address_state               = $payment->payer->payer_info->shipping_address->state;
				$payer->address_postal_code         = $payment->payer->payer_info->shipping_address->postal_code;
				$payer->address_country_code        = $payment->payer->payer_info->shipping_address->country_code;
				$payer->currency                    = $payment->transactions[0]->amount->currency;
				$payer->total                       = $payment->transactions[0]->amount->total;
				$payer->shipping                    = $payment->transactions[0]->amount->details->shipping;
				$payer->shipping_discount           = $payment->transactions[0]->amount->details->shipping_discount;
				$payer->merchant_id                 = $payment->transactions[0]->payee->merchant_id;
				$payer->merchant_email              = $payment->transactions[0]->payee->email;
				$payer->description                 = $payment->transactions[0]->description;
				$payer->invoice_number              = $payment->transactions[0]->invoice_number;
				$payer->transaction_id              = $payment->transactions[0]->related_resources[0]->sale->id;
				$payer->transaction_state           = $payment->transactions[0]->related_resources[0]->sale->state;
				$payer->payment_mode                = $payment->transactions[0]->related_resources[0]->sale->payment_mode;
				$payer->protection_eligibility      = $payment->transactions[0]->related_resources[0]->sale->protection_eligibility;
				$payer->protection_eligibility_type = $payment->transactions[0]->related_resources[0]->sale->protection_eligibility_type;
				$payer->transaction_fee_value       = $payment->transactions[0]->related_resources[0]->sale->transaction_fee->value;
				$payer->transaction_fee_currency    = $payment->transactions[0]->related_resources[0]->sale->transaction_fee->currency;
				$payer->create_time                 = $payment->transactions[0]->related_resources[0]->sale->create_time;
				$payer->update_time                 = $payment->transactions[0]->related_resources[0]->sale->update_time;
				$payer->update();
			} else {
				$new_payer = new EcomPayerPaypal();
				$new_payer->cart_id                     = $payment->cart;
				$new_payer->payment_id                  = $payment->id;
				$new_payer->payment_state               = $payment->state;
				$new_payer->payment_method              = $payment->payer->payment_method;
				$new_payer->payer_status                = $payment->payer->status;
				$new_payer->payer_email                 = $payment->payer->payer_info->email;
				$new_payer->payer_first_name            = $payment->payer->payer_info->first_name;
				$new_payer->payer_last_name             = $payment->payer->payer_info->last_name;
				$new_payer->payer_id                    = $payment->payer->payer_info->payer_id;
				$new_payer->payer_phone                 = $payment->payer->payer_info->phone;
				$new_payer->country_code                = $payment->payer->payer_info->country_code;
				$new_payer->recipient_name              = $payment->payer->payer_info->shipping_address->recipient_name;
				$new_payer->address_line1               = $payment->payer->payer_info->shipping_address->line1;
				$new_payer->address_line2               = $payment->payer->payer_info->shipping_address->line2;
				$new_payer->address_city                = $payment->payer->payer_info->shipping_address->city;
				$new_payer->address_state               = $payment->payer->payer_info->shipping_address->state;
				$new_payer->address_postal_code         = $payment->payer->payer_info->shipping_address->postal_code;
				$new_payer->address_country_code        = $payment->payer->payer_info->shipping_address->country_code;
				$new_payer->currency                    = $payment->transactions[0]->amount->currency;
				$new_payer->total                       = $payment->transactions[0]->amount->total;
				$new_payer->shipping                    = $payment->transactions[0]->amount->details->shipping;
				$new_payer->shipping_discount           = $payment->transactions[0]->amount->details->shipping_discount;
				$new_payer->merchant_id                 = $payment->transactions[0]->payee->merchant_id;
				$new_payer->merchant_email              = $payment->transactions[0]->payee->email;
				$new_payer->description                 = $payment->transactions[0]->description;
				$new_payer->invoice_number              = $payment->transactions[0]->invoice_number;
				$new_payer->transaction_id              = $payment->transactions[0]->related_resources[0]->sale->id;
				$new_payer->transaction_state           = $payment->transactions[0]->related_resources[0]->sale->state;
				$new_payer->payment_mode                = $payment->transactions[0]->related_resources[0]->sale->payment_mode;
				$new_payer->protection_eligibility      = $payment->transactions[0]->related_resources[0]->sale->protection_eligibility;
				$new_payer->protection_eligibility_type = $payment->transactions[0]->related_resources[0]->sale->protection_eligibility_type;
				$new_payer->transaction_fee_value       = $payment->transactions[0]->related_resources[0]->sale->transaction_fee->value;
				$new_payer->transaction_fee_currency    = $payment->transactions[0]->related_resources[0]->sale->transaction_fee->currency;
				$new_payer->create_time                 = $payment->transactions[0]->related_resources[0]->sale->create_time;
				$new_payer->update_time                 = $payment->transactions[0]->related_resources[0]->sale->update_time;
				$new_payer->create_date                 = date("Y-m-d H:i:s");
				if ($new_payer->save() !== false) {

					EcomOrder::updateAll([
						'status'         => 1,
						'payment_id' => $new_payer->id,
					], "invoice_number = '$new_payer->invoice_number'");

					/* send email */
				}
			}

			$log = var_export($payment->toArray(), true);
			Yii::info($log, 'paypal-notify');

			return $this->redirect(["/products/list?order=success"]);
		} else {
			return $this->redirect(["/products/list?order=cancel"]);
		}
	}
}


