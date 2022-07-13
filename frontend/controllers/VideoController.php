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
use yii\web\Response;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\EcomOrder;
use frontend\models\EcomOrderDetail;
use frontend\models\EcomProduct;
use frontend\models\EcomPayerPaypal;
use frontend\models\EcomPayerKiple;
use frontend\models\VideoAccess;
use frontend\models\VideoUrl;
use frontend\models\FrontendCountdown;

use frontend\fs_tools\Kiple\PaymentGateway as KiplePay;
use frontend\lib\mail\GetResponse;

use Aws\S3\S3Client;
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

class VideoController extends Controller
{
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'allow' => true,
					],
				],
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'kiple-return' => ['post'],
				],
			],
		];
	}

	public function beforeAction($action)
	{
		if ($action->id == 'kiple-return') {
			Yii::$app->request->enableCsrfValidation = false;
		}

		return parent::beforeAction($action);
	}

	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
		];
	}

	private function productPaypalPayment($form_code)
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

		$find_order = EcomOrder::find()->where([
			'and',
			['status'    => 2],
			['form_code' => $form_code],
			['<', 'expiry_count', 5],
		])->one();

		if ($find_order) {

			$total = 0;
			$cart  = array();

			$payer = new Payer();
			$payer->setPaymentMethod("paypal");

			foreach ($find_order->items as $cartItem) {
				$item = new Item();
				$item->setName($cartItem->info->name_cn.', '.$cartItem->info->name_en)
					->setCurrency('MYR')
					->setQuantity($cartItem->quantity)
					->setSku($cartItem->product_code) // Similar to `item_number` in Classic API
					->setPrice($cartItem->info->price);
				array_push($cart, $item);

				$total += $cartItem->price;
			}

			$itemList = new ItemList();
			$itemList->setItems($cart);

			$details = new Details();
			$details->setShipping($find_order->postage_price)
				->setTax(0)
				->setSubtotal($total);

			$amount = new Amount();
			$amount->setCurrency("MYR")
				->setTotal($find_order->payment_price)
				->setDetails($details);

			$transaction = new PayPalTransaction();
			$transaction->setAmount($amount)
				->setItemList($itemList)
				->setDescription("Fengshui Republic Products")
				->setInvoiceNumber($find_order->invoice_number);

			$redirectUrls = new RedirectUrls();
			$redirectUrls->setReturnUrl("http://fengshui-republic.com/video-paypal?order=success")
				->setCancelUrl("http://fengshui-republic.com/yydcourse?order=cancel");

			$payment = new Payment();
			$payment->setIntent("sale")
				->setPayer($payer)
				->setRedirectUrls($redirectUrls)
				->setTransactions(array($transaction));

			try {
				$payment->create($apiContext);
				// echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
				return $this->redirect($payment->getApprovalLink());
			} catch (PayPalConnectionException $ex) {
				// print_r($ex->getData());exit;
				// Yii::info($ex->getData(), 'paypal-notify');
				return $this->redirect(['/yydcourse?order=error']);
			}
		} else {
			return $this->redirect(['/yydcourse?order=error']);
		}
	}

	private function productKiplePayment($form_code)
	{
		$merchantID = 80006571;
		$merchantSecret = "PgtCEzVLJMyxwSa5";
		$testMode = false;

		$find_order = EcomOrder::find()->where([
			'and',
			['status'    => 2],
			['form_code' => $form_code],
			['<', 'expiry_count', 5],
		])->one();

		if ($find_order) {

			$webcash = new KiplePay($merchantID, $merchantSecret, $testMode);

			$amount = 0;
			foreach ($find_order->items as $cartItem) {
				$amount += $cartItem->quantity*$cartItem->info->price; //order amount
			}
			$grand_total = $amount + $find_order->postage_price;

			//set the parameters
			$webcash->datetime        = date("Y-m-d H:i:s");
			$webcash->amount          = $grand_total;
			$webcash->gst             = 0; //gst - only works if you registered as GST merchant with Webcash
			$webcash->serviceCharges  = 0; //service charges - reference
			$webcash->deliveryCharges = $find_order->postage_price; //delivery charges - reference
			$webcash->buyerName       = $find_order->name; //user full name
			$webcash->buyerTelephone  = $find_order->phone; //user telephone number
			$webcash->buyerEmail      = $find_order->email; //user email
			$webcash->reference       = $find_order->invoice_number; //your reference
			$webcash->returnUrl       = $webcash->createUrl("video/kiple-return"); //point to return url

			//connect to payment gateway
			try {
				echo $webcash->connect();
			} catch (Exception $ex) {
				Yii::info($ex->getCode().'-'.$ex->getMessage(), 'kiple-notify');
				return $this->redirect(['/yydcourse?order=error']);
			}
		} else {
			return $this->redirect(['/yydcourse?order=error']);
		}
	}

	public function actionExecutePaypal()
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
				return $this->redirect(['/yydcourse?order=error']);
			}

			$execution = new PaymentExecution();
			$execution->setPayerId($_GET['PayerID']);

			try {
				$result = $payment->execute($execution, $apiContext);
				$payment = Payment::get($paymentId, $apiContext);
			} catch (Exception $ex) {
				Yii::info($ex->getCode().'-'.$ex->getMessage(), 'paypal-notify');
				return $this->redirect(['/yydcourse?order=error']);
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
						'status'     => 1,
						'payment_id' => $new_payer->id,
					], "invoice_number = '$new_payer->invoice_number'");

					if ($payment->transactions[0]->related_resources[0]->sale->state == 'completed') {

						$current    = date("Y-m-d H:i:s");
						$expired_ts = strtotime('+260 minutes', strtotime($current));

						$pass = VideoAccess::findOne(['invoice_number' => $new_payer->invoice_number]);
						$pass->status = 1;
						$pass->expire_ts_url = $expired_ts;


						if ($pass->update() !== false) {

							/* create video container */

							$s3 = S3Client::factory(
								array(
									'credentials' => array(
									'key' => $IAM_KEY,
									'secret' => $IAM_SECRET
								),
									'version' => 'latest',
									'region'  => 'ap-southeast-1'
								)
							);

							for ($i=1; $i<5; $i++) {
								$cmd = $s3->getCommand('GetObject', [
									'Bucket' => $bucketName,
									'Key'    => '2019-1-'.$i.'.mp4'
								]);
								$request                  = $s3->createPresignedRequest($cmd, '+260 minutes');
								$url                      = '';
								$url                      = (string) $request->getUri();
								$new_url                  = new VideoUrl();
								$new_url->video_access_id = $pass->id;
								$new_url->url             = $url;
								$new_url->sequence        = $i;
								$new_url->save();
							}

							/* send email */

							$link             ="http://fengshui-republic.com/yydpass";
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
									'content' => $pass->access_code,
								],
								[
									'name'    => 'link',
									'content' => $link,
								],
							];
							$message = [
								'from_field_id'=> 'yp8Rf', // 'no-reply@fengshui-republic.com'
								// 'from_email'   => 'no-reply@fengshui-republic.com',
								// 'from_name'    => "Fengshui Republic Sdn Bhd",
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
			}

			$log = var_export($payment->toArray(), true);
			Yii::info($log, 'paypal-notify');

			return $this->redirect(["/yydcourse?order=success"]);
		} else {
			return $this->redirect(['/yydcourse?order=cancel']);
		}
	}

	public function actionKipleReturn()
	{
		$merchantSecret = "PgtCEzVLJMyxwSa5";
		$post = $_POST;

		if ($post) {
			Yii::info($post, 'kiple-notify');
		}

		// merchantSecret
		// ord_mercID   = merchantID
		// ord_mercref  = referenceNo
		// ord_totalamt = amount
		// returncode   = status
		// ord_key      = key

		if (isset($post['ord_mercID'])
			&& isset($post['ord_mercref'])
			&& isset($post['ord_totalamt'])
			&& isset($post['returncode'])
			&& isset($post['ord_key'])
		) {
			$merchantSecret = "PgtCEzVLJMyxwSa5";
			$merchantID     = $post['ord_mercID'];
			$referenceNo    = $post['ord_mercref'];
			$amount         = $post['ord_totalamt'];
			$status         = $post['returncode'];
			$key            = $post['ord_key'];

			$valid = sha1($merchantSecret . $merchantID . $referenceNo . str_replace(['.', '|'], '', $amount) . $status);

			if ($valid == $key) {
				switch ($post['returncode']) {
					case '100':
						$status = 1; // success
						break;
					case 'E1':
						$status = 2; // fail
						break;
					case 'E2':
						$status = 3; // abort
						break;
					default:
						$status = 4; // error
						break;
				}

				$payer = EcomPayerKiple::find()->where([
					'and',
					['invoice_number' => $post['ord_mercref']],
				])->one();

				if ($payer) {
					$payer->status               = $status;
					$payer->count                = $payer->count+1;
					$payer->invoice_number       = $post['ord_mercref'];
					$payer->kiple_reference      = isset($post['wcID']) ? $post['wcID'] : "";
					$payer->transaction_state    = isset($post['returncode']) ? $post['returncode'] : "";
					$payer->transaction_amount   = isset($post['ord_totalamt']) ? $post['ord_totalamt'] : "";
					$payer->transaction_datetime = isset($post['ord_date']) ? $post['ord_date'] : "";
					$payer->transaction_gst      = isset($post['ord_gstamt']) ? $post['ord_gstamt'] : "";
					$payer->service_charge       = isset($post['ord_svccharges']) ? $post['ord_svccharges'] : "";
					$payer->delivery_charge      = isset($post['ord_delcharges']) ? $post['ord_delcharges'] : "";
					$payer->order_key            = isset($post['ord_key']) ? $post['ord_key'] : "";
					$payer->payer_name           = isset($post['ord_shipname']) ? $post['ord_shipname'] : "";
					$payer->payer_phone          = isset($post['ord_telephone']) ? $post['ord_telephone'] : "";
					$payer->payer_email          = isset($post['ord_email']) ? $post['ord_email'] : "";
					$payer->payer_country        = isset($post['ord_shipcountry']) ? $post['ord_shipcountry'] : "";
					$payer->custom_field_1       = isset($post['ord_customfield1']) ? $post['ord_customfield1'] : "";
					$payer->custom_field_2       = isset($post['ord_customfield2']) ? $post['ord_customfield2'] : "";

					if ($payer->update() !== false) {

						if ($status == 1) {
							EcomOrder::updateAll([
								'status'     => 1,
								'payment_id' => $payer->id,
							], "invoice_number = '$payer->invoice_number'");

							$current    = date("Y-m-d H:i:s");
							$expired_ts = strtotime('+260 minutes', strtotime($current));

							$pass = VideoAccess::findOne(['invoice_number' => $new_payer->invoice_number]);
							$pass->status = 1;
							$pass->expire_ts_url = $expired_ts;


							if ($pass->update() !== false) {

								/* create video container */

								$s3 = S3Client::factory(
									array(
										'credentials' => array(
										'key' => $IAM_KEY,
										'secret' => $IAM_SECRET
									),
										'version' => 'latest',
										'region'  => 'ap-southeast-1'
									)
								);

								for ($i=1; $i<5; $i++) {
									$cmd = $s3->getCommand('GetObject', [
										'Bucket' => $bucketName,
										'Key'    => '2019-1-'.$i.'.mp4'
									]);
									$request                  = $s3->createPresignedRequest($cmd, '+260 minutes');
									$url                      = '';
									$url                      = (string) $request->getUri();
									$new_url                  = new VideoUrl();
									$new_url->video_access_id = $pass->id;
									$new_url->url             = $url;
									$new_url->sequence        = $i;
									$new_url->save();
								}
							}
						}
					}
				} else {
					$new_payer = new EcomPayerKiple();
					$new_payer->status               = $status;
					$new_payer->invoice_number       = $post['ord_mercref'];
					$new_payer->kiple_reference      = isset($post['wcID']) ? $post['wcID'] : "";
					$new_payer->transaction_state    = isset($post['returncode']) ? $post['returncode'] : "";
					$new_payer->transaction_amount   = isset($post['ord_totalamt']) ? $post['ord_totalamt'] : "";
					$new_payer->transaction_datetime = isset($post['ord_date']) ? $post['ord_date'] : "";
					$new_payer->transaction_gst      = isset($post['ord_gstamt']) ? $post['ord_gstamt'] : "";
					$new_payer->service_charge       = isset($post['ord_svccharges']) ? $post['ord_svccharges'] : "";
					$new_payer->delivery_charge      = isset($post['ord_delcharges']) ? $post['ord_delcharges'] : "";
					$new_payer->order_key            = isset($post['ord_key']) ? $post['ord_key'] : "";
					$new_payer->payer_name           = isset($post['ord_shipname']) ? $post['ord_shipname'] : "";
					$new_payer->payer_phone          = isset($post['ord_telephone']) ? $post['ord_telephone'] : "";
					$new_payer->payer_email          = isset($post['ord_email']) ? $post['ord_email'] : "";
					$new_payer->payer_country        = isset($post['ord_shipcountry']) ? $post['ord_shipcountry'] : "";
					$new_payer->custom_field_1       = isset($post['ord_customfield1']) ? $post['ord_customfield1'] : "";
					$new_payer->custom_field_2       = isset($post['ord_customfield2']) ? $post['ord_customfield2'] : "";
					$new_payer->create_date          = date("Y-m-d H:i:s");

					if ($new_payer->save() !== false) {

						if ($status == 1) {
							EcomOrder::updateAll([
								'status'     => 1,
								'payment_id' => $new_payer->id,
							], "invoice_number = '$new_payer->invoice_number'");

							$current    = date("Y-m-d H:i:s");
							$expired_ts = strtotime('+260 minutes', strtotime($current));

							$pass = VideoAccess::findOne(['invoice_number' => $new_payer->invoice_number]);
							$pass->status = 1;
							$pass->expire_ts_url = $expired_ts;


							if ($pass->update() !== false) {

								/* create video container */

								$s3 = S3Client::factory(
									array(
										'credentials' => array(
										'key' => $IAM_KEY,
										'secret' => $IAM_SECRET
									),
										'version' => 'latest',
										'region'  => 'ap-southeast-1'
									)
								);

								for ($i=1; $i<5; $i++) {
									$cmd = $s3->getCommand('GetObject', [
										'Bucket' => $bucketName,
										'Key'    => '2019-1-'.$i.'.mp4'
									]);
									$request                  = $s3->createPresignedRequest($cmd, '+260 minutes');
									$url                      = '';
									$url                      = (string) $request->getUri();
									$new_url                  = new VideoUrl();
									$new_url->video_access_id = $pass->id;
									$new_url->url             = $url;
									$new_url->sequence        = $i;
									$new_url->save();
								}

								/* send email */

								$link             ="http://fengshui-republic.com/yydpass";
								$getresponse 			= new GetResponse(
									Yii::$app->params['getresponse.apiKey'],
									Yii::$app->params['getresponse.domain'],
									Yii::$app->params['getresponse.tagId']
								);
								$template_name    = "republic-code";
								$template_content = [
									[
										'name'    => 'name',
										'content' => $new_payer->payer_name,
									],
									[
										'name'    => 'code',
										'content' => $pass->access_code,
									],
									[
										'name'    => 'link',
										'content' => $link,
									],
								];
								$message = [
									'from_field_id'=> 'yp8Rf', // 'no-reply@fengshui-republic.com'
									// 'from_email'   => 'no-reply@fengshui-republic.com',
									// 'from_name'    => "Fengshui Republic Sdn Bhd",
									'track_opens'  => true,
									'track_clicks' => true,
									'auto_text'    => true,
									'merge'        => true,
									'subject'      => 'Thank you for purchasing our product',
									'to'           => [
										[
											'email' => $new_payer->payer_email,
											'name'  => $new_payer->payer_name,
											'type'  => 'to',
										],
									],
								];
								$getresponse->sendTemplate($template_name, $template_content, $message);
							}
						}
					}
				}

				switch ($status) {
					case 1:
						$redirect = 'success';
						break;
					case 2:
						$redirect = 'error';
						break;
					case 3:
						$redirect = 'cancel';
						break;
					default:
						$redirect = 'error';
						break;
				}
				return $this->redirect(['/yydcourse?order='.$redirect]);
			}
		} else {
			return $this->redirect(['/yydcourse?order=error']);
		}
	}

	public function actionYydcourse()
	{
		if (Yii::$app->request->get('order') == 'success') {
			Yii::$app->session->setFlash('alert', Yii::t('app', 'We are received the payment and thanks for your support! Kindly check the ACCESS CODE from your email and open the video by following steps. Should you have any questions please do not hesitate to contact us at 012-7019989 Peggy Tham.'));
			return $this->redirect(['/yydcourse']);
		}

		if (Yii::$app->request->get('order') == 'cancel') {
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Order cancel'));
			return $this->redirect(['/yydcourse']);
		}

		if (Yii::$app->request->get('order') == 'error') {
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Order error. Please try again later'));
			return $this->redirect(['/yydcourse']);
		}

		$find_cd = FrontendCountdown::find()->where(['id' => 1])->one();
		$current_cd_date = date("Y-m-d");
		if ($current_cd_date >= $find_cd->countdown_date) {
			$new_cd_date = date("Y-m-d", strtotime("+ 3 day"));
			$find_cd->countdown_date = $new_cd_date;
			$find_cd->update();
			$cd_date = date("Y/m/d", strtotime($new_cd_date));
		} else {
			$cd_date = date("Y/m/d", strtotime($find_cd->countdown_date));
		}

		$post = Yii::$app->request->post('Order');
		if (isset($post)) {
			$transaction = Yii::$app->db->beginTransaction();
			try {
				$allProducts  = EcomProduct::find()->where(['status' => 1])->asArray()->all();
				$listProducts = ArrayHelper::map($allProducts, 'product_code', 'price');
				$paymentType  = array(
					'paypal' => 1,
					'kiple'  => 2,
				);

				do {
					$form_code = '';
					$keyspace = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$max = mb_strlen($keyspace, '8bit') - 1;
					for ($i = 0; $i < 12; ++$i) {
						$form_code .= $keyspace[random_int(0, $max)];
					}
					$find_repeat = EcomOrder::findOne(['form_code' => $form_code]);
				} while ($find_repeat);

				$new_order = new EcomOrder();
				$new_order->form_code     = $form_code;
				$new_order->name          = $post['name'];
				$new_order->email         = $post['email'];
				$new_order->phone         = $post['phone'];
				$new_order->status        = 2;
				$new_order->payment_type  = $paymentType[$post['payment_type']];
				$new_order->payment_price = $listProducts[$post['product']];
				$new_order->postage_price = 0;
				$new_order->create_date = date("Y-m-d H:i:s");
				if ($new_order->save() !== false) {
					$new_order->invoice_number = 'FSRP-'.($new_order->order_id+13388);
					if ($new_order->update() !== false) {
						if (array_key_exists($post['product'], $listProducts)) {
							$new_order_detail = new EcomOrderDetail();
							$new_order_detail->order_id = $new_order->order_id;
							$new_order_detail->product_code = $post['product'];
							$new_order_detail->quantity = 1;
							$new_order_detail->price = $listProducts[$post['product']];
							$new_order_detail->create_date = date("Y-m-d H:i:s");
							if ($new_order_detail->save() == false) {
								// print_r($new_order_detail->getErrors());exit;
								$transaction->rollBack();
								return $this->redirect(['/yydcourse?order=error']);
							}

							do {
							$code1 = '';
								$code2 = '';
								$code_complete = '';

								$keyspace1 = '123456789';
								$max1 = mb_strlen($keyspace1, '8bit') - 1;
								for ($i = 0; $i < 4; ++$i) {
									$code1 .= $keyspace1[random_int(0, $max1)];
								}

								$keyspace2 = 'ABCDEFG';
								$max2 = mb_strlen($keyspace2, '8bit') - 1;
								for ($i = 0; $i < 2; ++$i) {
									$code2 .= $keyspace2[random_int(0, $max2)];
								}

								$code_complete = $code1.$code2;
								$find_repeat = VideoAccess::findOne(['access_code' => $code_complete]);
							} while ($find_repeat);

							$new_row = new VideoAccess();
							$new_row->invoice_number = $new_order->invoice_number;
							$new_row->product_code   = $post['product'];
							$new_row->access_code    = $code_complete;
							$new_row->create_date    = date("Y-m-d H:i:s");
							if ($new_row->save() == false) {
								// print_r($new_row->getErrors());exit;
								$transaction->rollBack();
								return $this->redirect(['/yydcourse?order=error']);
							}
						} else {
							// print_r($key);exit;
							$transaction->rollBack();
							return $this->redirect(['/yydcourse?order=error']);
						}
					} else {
						// print_r($new_order->getErrors());exit;
						$transaction->rollBack();
						return $this->redirect(['/yydcourse?order=error']);
					}
				} else {
					// print_r($new_order->getErrors());exit;
					$transaction->rollBack();
					return $this->redirect(['/yydcourse?order=error']);
				}
				$transaction->commit();

				// 1=paypal 2=kiple
				if ($new_order->payment_type == 1) {
					$this->productPaypalPayment($new_order->form_code);
				} elseif ($new_order->payment_type == 2) {
					$this->productKiplePayment($new_order->form_code);
				} else {
					return $this->redirect(['/yydcourse?order=error']);
				}
			} catch (Exception $ex) {
				$transaction->rollBack();
				return $this->redirect(['/yydcourse?order=error']);
			}
		}

		$this->layout = 'footer_only';
		return $this->render('pg_yyd_course', [
			'cd_date' => $cd_date,
		]);
	}

	public function actionYydpass()
	{
		$this->layout = 'footer_only';

		$code = Yii::$app->request->post('Code');
		if (isset($code)) {
			$find         = VideoAccess::findOne(['status' => 1, 'access_code' => $code]);
			$presignedUrl = array();

			if ($find) {
				$attendance = $find->attendance;
				$place = array(
					'kl' => 1,
					'jb' => 2,
				);

				$attend = Yii::$app->request->post('Attend');
				if ($attend) {
					$find->attendance = $place[$attend];
					$find->update();
					$attendance = $find->attendance;

					Yii::$app->session->setFlash('alert', Yii::t('app', 'Register Success'));
				} else {
					Yii::$app->session->setFlash('alert', Yii::t('app', 'Access granted'));
				}

				$current = date("Y-m-d H:i:s");
				$current_ts = strtotime($current);
				if (($current_ts-600)>$find->expire_ts_url) {
					// for ($i=1; $i<5; $i++) {
					// 	$presignedUrl[$i] = '';
					// }

					$s3 = S3Client::factory(
						array(
							'credentials' => array(
							'key' => $IAM_KEY,
							'secret' => $IAM_SECRET
						),
							'version' => 'latest',
							'region'  => 'ap-southeast-1'
						)
					);

					for ($i=1; $i<5; $i++) {
						$cmd = $s3->getCommand('GetObject', [
							'Bucket' => $bucketName,
							'Key'    => '2019-1-'.$i.'.mp4'
						]);

						$video_url = VideoUrl::find()->where([
							'and',
							['video_access_id' => $find->id],
							['sequence' => $i],
						])->one();

						$request        = $s3->createPresignedRequest($cmd, '+260 minutes');
						$url            = '';
						$url            = (string) $request->getUri();
						$video_url->url = $url;
						$video_url->update();
						$presignedUrl[$i] = $url;
					}

					$current    = date("Y-m-d H:i:s");
					$expired_ts = strtotime('+260 minutes', strtotime($current));
					$find->expire_ts_url = $expired_ts;
					$find->update();
				} else {
					// for ($i=1; $i<5; $i++) {
					// 	$presignedUrl[$i] = '';
					// }

					$video_url = VideoUrl::find()
						->where(['video_access_id' => $find->id])
						->orderBy(['sequence' => SORT_ASC])
						->all();

					if ($video_url) {
						foreach ($video_url as $item) {
							$presignedUrl[$item->sequence] = $item->url;
						}
					} else {
						Yii::$app->session->setFlash('alert', Yii::t('app', 'Code error. Please call for assistance'));
						return $this->redirect(['/yydpass']);
					}
				}
			} else {
				Yii::$app->session->setFlash('alert', Yii::t('app', 'Code error. Please call for assistance'));
				return $this->redirect(['/yydpass']);
			}

			return $this->render('pg_yyd_pass', [
				'access'     => true,
				'code'       => $code,
				'attendance' => $attendance,
				'video_url'  => $presignedUrl,
			]);
		} else {
			return $this->render('pg_yyd_pass', [
				'access' => false,
			]);
		}
	}

	// public function actionStst()
	// {
	// 	$current = date("Y-m-d H:i:s");
	// 	$current_ts = strtotime($current);
	// 	echo "current ts: ".$current_ts;
	// 	echo "<br>";
	// 	echo "expired ts: "."1585247992";
	// 	echo "<br>";
	// 	echo "current: ".$current;
	// 	echo "<br>";
	// 	// $expired_ts = strtotime('+140 minutes', strtotime($current));
	// 	// $expired = date("Y-m-d H:i:s", $expired_ts);
	// 	// echo "expired ts: ".$expired_ts;
	// 	// echo "<br>";
	// 	// echo "expired: ".$expired;
	// 	// echo "<br>";
	// 	$expired_ts = 1585247992;
	// 	if (($current_ts-600)<1585247992) {
	// 		print_r('expire');exit;
	// 	} else {
	// 		print_r('valid');exit;
	// 	}
	// }
}



