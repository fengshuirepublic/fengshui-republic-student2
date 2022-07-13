<?php
namespace frontend\controllers;

use Yii;
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

class OnePageController extends Controller
{
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => [
					'2019zodiac-file',
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

	private function singleItemPayment($post, $item_name, $item_number, $invoice_number, $unit_price, $redirect)
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

		$total = $unit_price*$post['quantity'];
		$payer = new Payer();
		$payer->setPaymentMethod("paypal");

		$item1 = new Item();
		$item1->setName($item_name)
			->setCurrency('MYR')
			->setQuantity($post['quantity'])
			->setSku($item_number) // Similar to `item_number` in Classic API
			->setPrice($unit_price);

		$itemList = new ItemList();
		$itemList->setItems(array($item1));

		$details = new Details();
		$details->setShipping(0)
			->setTax(0)
			->setSubtotal($total);

		$amount = new Amount();
		$amount->setCurrency("MYR")
			->setTotal($total)
			->setDetails($details);

		$transaction = new PayPalTransaction();
		$transaction->setAmount($amount)
			->setItemList($itemList)
			->setDescription($item_number)
			->setInvoiceNumber($invoice_number);

		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturnUrl("http://fengshui-republic.com/execute-paypal?order=success&redirect={$redirect}")
			->setCancelUrl("http://fengshui-republic.com/execute-paypal?order=cancel&redirect={$redirect}");

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
			Yii::info($ex->getData(), 'paypal-notify');
			return $this->redirect(["/{$redirect}?order=error"]);
		}
	}

	public function action2019zodiac()
	{
		return $this->render('2019zodiac/pg_2019zodiac');
	}

	public function action2019zodiacFile($file_name)
	{
		$key = $file_name;

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

		$cmd = $s3->getCommand('GetObject', [
			'Bucket' => $bucketName,
			'Key'    => $key
		]);

		$request = $s3->createPresignedRequest($cmd, '+5 minutes');
		$presignedUrl = (string) $request->getUri();

		// if ($presignedUrl) {
		// 	$result['error']['status'] = 0;
		// 	$result['error']['data'] = $presignedUrl;
		// } else {
		// 	$result['error']['status'] = 1;
		// }
		// echo json_encode($result);
		// exit;

		if ($presignedUrl) {
			return $this->redirect($presignedUrl);
		}
	}

	public function action2019feast()
	{
		if (Yii::$app->request->get('order') == 'success') {
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Success order'));
			return $this->redirect(['/2019feast']);
		}

		if (Yii::$app->request->get('order') == 'cancel') {
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Order cancel'));
			return $this->redirect(['/2019feast']);
		}

		if (Yii::$app->request->get('order') == 'error') {
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Order error. Please try again later'));
			return $this->redirect(['/2019feast']);
		}

		$post = Yii::$app->request->post('Order');
		if (isset($post)) {

			if ($post['item_number'] == '2019-family-feast-jb-ticket') {
				$unit_price = 260;
			} elseif ($post['item_number'] == '2019-family-feast-kl-ticket') {
				$unit_price = 280;
			} else {
				return $this->redirect(['/2019feast?order=error']);
			}

			$invoice_number = '';
			$find = BoPaypalProduct::find()->orderBy(['id' => SORT_DESC])->one();
			if ($find) {
				$invoice_number = 'FR-'.sprintf('%05d', (substr($find->invoice_number, 3)+1));
			} else {
				$invoice_number = 'FR-33111';
			}

			$persons = $post['person'];
			$transaction = Yii::$app->db->beginTransaction();

			try {
				foreach ($persons as $key => $person) {
					$new_item = new BoPaypalProduct();
					$new_item->item_name      = $post['item_name'];
					$new_item->item_number    = $post['item_number'];
					$new_item->invoice_number = $invoice_number;
					$new_item->name           = $person['name'];
					$new_item->email          = $person['email'];
					$new_item->phone          = $person['phone'];
					$new_item->create_date    = date("Y-m-d H:i:s");
					if ($new_item->save() == false) {
						throw new NotFoundHttpException();
						// throw new \Exception("Fail to save.", 1);
					}
				}
				$transaction->commit();
			} catch (Exception $ex) {
				$transaction->rollBack();
				return $this->redirect(['/2019feast?order=error']);
			}

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

			$total = $unit_price*$post['quantity'];
			$payer = new Payer();
			$payer->setPaymentMethod("paypal");

			$item1 = new Item();
			$item1->setName($post['item_name'])
				->setCurrency('MYR')
				->setQuantity($post['quantity'])
				->setSku($post['item_number']) // Similar to `item_number` in Classic API
				->setPrice($unit_price);

			$itemList = new ItemList();
			$itemList->setItems(array($item1));

			$details = new Details();
			$details->setShipping(0)
				->setTax(0)
				->setSubtotal($total);

			$amount = new Amount();
			$amount->setCurrency("MYR")
				->setTotal($total)
				->setDetails($details);

			$transaction = new PayPalTransaction();
			$transaction->setAmount($amount)
				->setItemList($itemList)
				->setDescription($post['item_number'])
				->setInvoiceNumber($invoice_number);

			$redirectUrls = new RedirectUrls();
			$redirectUrls->setReturnUrl("http://www.fengshui-republic.com/execute-payment?order=success&redirect=2019feast")
				->setCancelUrl("http://www.fengshui-republic.com/execute-payment?order=cancel&redirect=2019feast");

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
				Yii::info($ex->getData(), 'paypal-notify');
				return $this->redirect(['/2019feast?order=error']);
			}
		}

		$this->layout = '2019feast';
		return $this->render('2019feast/pg_2019feast');
	}

	public function action2019video()
	{
		if (Yii::$app->request->get('order') == 'success') {
			Yii::$app->session->setFlash('alert', Yii::t('app', 'We are received the payment and thanks for your support! Kindly check the ACCESS CODE from your email and open the video by following steps. Should you have any questions please do not hesitate to contact us at 012-7019989 Peggy Tham.'));
			return $this->redirect(['/2019video']);
		}

		if (Yii::$app->request->get('order') == 'cancel') {
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Order cancel'));
			return $this->redirect(['/2019video']);
		}

		if (Yii::$app->request->get('order') == 'error') {
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Order error. Please try again later'));
			return $this->redirect(['/2019video']);
		}

		$post = Yii::$app->request->post('Order');
		if (isset($post)) {

			$item_name      = '2019 風水教學視頻';
			$item_number    = '2019-online-video-course';
			$unit_price     = 24.30;
			$invoice_number = '';
			$find = BoPaypalProduct::find()->orderBy(['id' => SORT_DESC])->one();
			if ($find) {
				$invoice_number = 'FR-'.sprintf('%05d', (substr($find->invoice_number, 3)+1));
			} else {
				$invoice_number = 'FR-33111';
			}

			$persons = $post['person'];
			$transaction = Yii::$app->db->beginTransaction();

			try {
				foreach ($persons as $key => $person) {
					$new_item = new BoPaypalProduct();
					$new_item->item_name      = $item_name;
					$new_item->item_number    = $item_number;
					$new_item->invoice_number = $invoice_number;
					$new_item->name           = $person['name'];
					$new_item->email          = $person['email'];
					$new_item->phone          = $person['phone'];
					$new_item->create_date    = date("Y-m-d H:i:s");
					if ($new_item->save() == false) {
						throw new NotFoundHttpException();
						// throw new \Exception("Fail to save.", 1);
					}
				}
				$transaction->commit();
			} catch (Exception $ex) {
				$transaction->rollBack();
				return $this->redirect(['/2019video?order=error']);
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
				$find_repeat = BoAccessCode::findOne(['code' => $code_complete]);
			} while ($find_repeat);

			$new_row = new BoAccessCode();
			$new_row->invoice_number = $invoice_number;
			$new_row->item_number    = $item_number;
			$new_row->code           = $code_complete;
			$new_row->create_date    = date("Y-m-d H:i:s");
			if ($new_row->save() !== false) {
				$this->singleItemPayment($post, $item_name, $item_number, $invoice_number, $unit_price, '2019video');
			}
		}

		$this->layout = 'footer_only';
		return $this->render('2019video/pg_2019video');
	}

	public function action2019fengshuiVideo()
	{
		$this->layout = 'footer_only';

		$code = Yii::$app->request->post('Code');
		if (isset($code)) {
			$find = BoAccessCode::findOne(['status' => 1, 'code' => $code]);
			if ($find) {

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

				$presignedUrl = array();
				for ($i=1; $i<5; $i++) {
					$cmd = $s3->getCommand('GetObject', [
						'Bucket' => $bucketName,
						'Key'    => '2019-1-'.$i.'.mp4'
					]);
					$request = $s3->createPresignedRequest($cmd, '+140 minutes');
					$presignedUrl[$i] = (string) $request->getUri();
				}
				// print_r($presignedUrl);exit;
				// foreach ($presignedUrl as $key => $value) {
				// 	print_r($value);exit;
				// }
			} else {
				Yii::$app->session->setFlash('alert', Yii::t('app', 'Code error. Please call for assistance'));
				return $this->redirect(['/2019fengshui-video']);
			}
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Access granted'));
			return $this->render('2019video_fengshui/pg_2019video_fengshui', [
				'access'    => true,
				'video_url' => $presignedUrl,
			]);
		} else {
			$presignedUrl[] = array();
			for ($i=1; $i<5; $i++) {
				$presignedUrl[$i] = '';
			}
			return $this->render('2019video_fengshui/pg_2019video_fengshui', [
				'access'    => false,
				'video_url' => $presignedUrl,
			]);
		}
	}

	public function action2019yiyanduan()
	{
		if (Yii::$app->request->get('order') == 'success') {
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Thanks for your support! We are received the payment & info and we will inform you one week earlier before the class. Bear in mind that you may using ENGLISH IC FULL NAME for registration. Should you have any questions please do not hesitate to contact us at 012-5212822 Elsa Tye.'));
			return $this->redirect(['/2019yiyanduan']);
		}

		if (Yii::$app->request->get('order') == 'cancel') {
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Order cancel'));
			return $this->redirect(['/2019yiyanduan']);
		}

		if (Yii::$app->request->get('order') == 'error') {
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Order error. Please try again later'));
			return $this->redirect(['/2019yiyanduan']);
		}

		$post = Yii::$app->request->post('Order');
		if (isset($post)) {

			$item_name      = '2019 風水一眼斷課程';
			$item_number    = '2019-yiyanduan-course';
			$unit_price     = 4880;
			$invoice_number = '';
			$find = BoPaypalProduct::find()->orderBy(['id' => SORT_DESC])->one();
			if ($find) {
				$invoice_number = 'FR-'.sprintf('%05d', (substr($find->invoice_number, 3)+1));
			} else {
				$invoice_number = 'FR-33111';
			}

			$persons = $post['person'];
			$transaction = Yii::$app->db->beginTransaction();

			try {
				foreach ($persons as $key => $person) {
					$new_item = new BoPaypalProduct();
					$new_item->item_name      = $item_name;
					$new_item->item_number    = $item_number;
					$new_item->invoice_number = $invoice_number;
					$new_item->name_cn        = $person['name_cn'];
					$new_item->name           = $person['name'];
					$new_item->email          = $person['email'];
					$new_item->phone          = $person['phone'];
					$new_item->create_date    = date("Y-m-d H:i:s");
					if ($new_item->save() == false) {
						throw new NotFoundHttpException();
						// throw new \Exception("Fail to save.", 1);
					}
				}
				$transaction->commit();
			} catch (Exception $ex) {
				$transaction->rollBack();
				return $this->redirect(['/2019yiyanduan?order=error']);
			}
			$this->singleItemPayment($post, $item_name, $item_number, $invoice_number, $unit_price, '2019yiyanduan');
		}

		$this->layout = 'footer_only';
		return $this->render('2019yiyanduan/pg_2019yiyanduan');
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

			try {
				$payment = Payment::get($paymentId, $apiContext);
			} catch (Exception $ex) {
				Yii::info($ex->getCode().'-'.$ex->getMessage(), 'paypal-notify');
				return $this->redirect(['/2019feast?order=error']);
			}

			$execution = new PaymentExecution();
			$execution->setPayerId($_GET['PayerID']);

			try {
				$result = $payment->execute($execution, $apiContext);
				$payment = Payment::get($paymentId, $apiContext);
			} catch (Exception $ex) {
				Yii::info($ex->getCode().'-'.$ex->getMessage(), 'paypal-notify');
				return $this->redirect(['/2019feast?order=error']);
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
				BoPaypalProduct::updateAll([
					'status'         => 1,
					'transaction_id' => $new_payer->transaction_id,
				], "invoice_number = '$new_payer->invoice_number'");
			}

			$log = var_export($payment->toArray(), true);
			Yii::info($log, 'paypal-notify');
			return $this->redirect(['/2019feast?order=success']);
		} else {
			return $this->redirect(['/2019feast?order=cancel']);
		}
	}
}


