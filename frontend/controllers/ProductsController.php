<?php
namespace frontend\controllers;

use Yii;
use Mandrill;
use Exception;
use yii\db\Transaction;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\EcomOrder;
use frontend\models\EcomOrderDetail;
use frontend\models\EcomProduct;
use frontend\models\EcomPayerKiple;
use frontend\models\FormOrderProduct;

use frontend\fs_tools\Kiple\PaymentGateway as KiplePay;

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

class ProductsController extends Controller
{
	/**
	 * {@inheritdoc}
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'allow' => true,
					]
				],
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'process-order' => ['post'],
					'place-order' => ['post'],
					'kiple-return' => ['post'],
				],
			],
		];
	}

	public function beforeAction($action)
	{
		if ($action->id == 'kiple-return') {
			Yii::$app->request->enableCsrfValidation = false;
			// $this->enableCsrfValidation = false;
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
			$redirectUrls->setReturnUrl("http://fengshui-republic.com/product-paypal?order=success&redirect=list")
				->setCancelUrl("http://fengshui-republic.com/products/list?order=cancel");

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
				return $this->redirect(['/products/list?order=error']);
			}
		} else {
			return $this->redirect(['/products/list?order=error']);
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
			$webcash->returnUrl       = $webcash->createUrl("kiple-return"); //point to return url

			//connect to payment gateway
			try {
				echo $webcash->connect();
			} catch (PayPalConnectionException $ex) {
				Yii::info($ex->getData(), 'kiple-notify');
				return $this->redirect(['/products/list?order=error']);
			}
		} else {
			return $this->redirect(['/products/list?order=error']);
		}
	}

	public function actionList()
	{
		if (Yii::$app->request->get('order') == 'success') {
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Success order'));
			return $this->redirect(['/products/list']);
		}

		if (Yii::$app->request->get('order') == 'cancel') {
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Order cancel'));
			return $this->redirect(['/products/list']);
		}

		if (Yii::$app->request->get('order') == 'error') {
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Order error. Please try again later'));
			return $this->redirect(['/products/list']);
		}

		return $this->render('pg_product_list');
	}

	public function actionProcessOrder()
	{
		$post = Yii::$app->request->post();
		if (isset($post['Item'])) {
			$items = $post['Item'];
			$transaction = Yii::$app->db->beginTransaction();
			try {
				$allProducts = EcomProduct::find()->where(['status' => 1])->asArray()->all();
				$listProducts = ArrayHelper::map($allProducts, 'product_code', 'price');

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
				$new_order->form_code = $form_code;
				$new_order->create_date = date("Y-m-d H:i:s");
				if ($new_order->save() !== false) {
					$new_order->invoice_number = 'FSRP-'.($new_order->order_id+13388);
					if ($new_order->update() !== false) {
						foreach ($items as $key => $value) {
							if ($value == 0) {
								$transaction->rollBack();
								return $this->redirect(['/products/list?order=error']);
							}
							if (array_key_exists($key, $listProducts)) {
								$new_order_detail = new EcomOrderDetail();
								$new_order_detail->order_id = $new_order->order_id;
								$new_order_detail->product_code = $key;
								$new_order_detail->quantity = $value;
								$new_order_detail->price = $listProducts[$key]*$value;
								$new_order_detail->create_date = date("Y-m-d H:i:s");
								if ($new_order_detail->save() == false) {
									// print_r($new_order_detail->getErrors());exit;
									$transaction->rollBack();
									return $this->redirect(['/products/list?order=error']);
								}
							} else {
								// print_r($key);exit;
								$transaction->rollBack();
								return $this->redirect(['/products/list?order=error']);
							}
						}
					} else {
						// print_r($new_order->getErrors());exit;
						$transaction->rollBack();
						return $this->redirect(['/products/list?order=error']);
					}
				} else {
					// print_r($new_order->getErrors());exit;
					$transaction->rollBack();
					return $this->redirect(['/products/list?order=error']);
				}
				$transaction->commit();
				return $this->redirect(['/products/checkout?form_code='.$new_order->form_code]);
			} catch (Exception $ex) {
				$transaction->rollBack();
				return $this->redirect(['/products/list?order=error']);
			}
		} else {
			// throw new NotFoundHttpException();
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Order error. Please try again later'));
			return $this->redirect(['/products/list']);
		}
	}

	public function actionCheckout($form_code)
	{
		$allProducts = EcomProduct::find()->where(['status' => 1])->asArray()->all();
		$listProduct = ArrayHelper::index($allProducts, 'product_code');
		$cnProducts  = ArrayHelper::map($allProducts, 'product_code', 'name_cn');
		$enProducts  = ArrayHelper::map($allProducts, 'product_code', 'name_en');

		$new_order = EcomOrder::find()->where([
			'and',
			['status'    => 0],
			['form_code' => $form_code],
			['<', 'expiry_count', 5],
		])->one();

		if ($new_order) {
			// print_r($listProduct);exit;
			// print_r($new_order);exit;
			// print_r($allProducts);exit;

			$new_order->expiry_count = $new_order->expiry_count+1;
			if ($new_order->update() !== false) {
				$magazine_list = array(
					"jjfs2019ext",
					"jjfs2019int",
					"jjfs2019set",
					// "yb2020cn",
					// "yb2020en",
					// "ybts2020cn",
					// "ybts2020en",
					// "zsts2020",
					"yb2021cn",
					"ybts2021cn",
					"zsts2021"
				);

				$postage_sg    = 0;
				$postage_westm = 0;
				$postage_eastm = 0;

				foreach ($new_order->items as $item) {
					if (in_array($item->product_code, $magazine_list)) {
						$postage_sg    = $listProduct[$item->product_code]['postage_singapore'];
						$postage_westm = $listProduct[$item->product_code]['postage_west_m'];
						$postage_eastm = $listProduct[$item->product_code]['postage_east_m'];
					}
				}

				$this->layout = 'footer_only';
				return $this->render('pg_checkout', [
					'cnProducts'    => $cnProducts,
					'enProducts'    => $enProducts,
					'magazine_list' => $magazine_list,
					'new_order'     => $new_order,
					'postage_sg'    => $postage_sg,
					'postage_westm' => $postage_westm,
					'postage_eastm' => $postage_eastm,
				]);
			} else {
				return $this->redirect(['/products/list?order=error']);
			}
		} else {
			return $this->redirect(['/products/list?order=error']);
		}
	}

	public function actionPlaceOrder()
	{
		$post = Yii::$app->request->post('FormOrderProduct');

		$find_order = EcomOrder::find()->where([
			'and',
			['status'    => 0],
			['form_code' => $post['form_code']],
			['<', 'expiry_count', 5],
		])->one();

		if ($find_order) {

			$place_order = new FormOrderProduct();
			$place_order->load($post, "");

			if ($place_order->validate()) {
				$payment_price = 0;
				$postage_price = 0;
				$postage_area  = array(
					"singapore" => 1,
					"east_msia" => 2,
					"west_msia" => 3,
				);

				foreach ($find_order->items as $item) {
					$payment_price += $item->price;
					if ($item->info->is_postage == 1) {
						if ($place_order['postage_area']) {
							if ($place_order['postage_area'] == "singapore") {
								// $payment_price = $item->info->postage_singapore;
								$postage_price = $item->info->postage_singapore;
							} elseif ($place_order['postage_area'] == "east_msia") {
								// $payment_price = $item->info->postage_east_m;
								$postage_price = $item->info->postage_east_m;
							} elseif ($place_order['postage_area'] == "west_msia") {
								// $payment_price = $item->info->postage_west_m;
								$postage_price = $item->info->postage_west_m;
							} else {
								return $this->redirect(['/products/list?order=error']);
							}
						} else {
							return $this->redirect(['/products/list?order=error']);
						}
					}
				}

				$payment_price += $postage_price;

				$find_order->collect_at    = $place_order['collect_at'];
				$find_order->name          = $place_order['name'];
				$find_order->email         = $place_order['email'];
				$find_order->phone         = $place_order['phone'];
				$find_order->address_1     = $place_order['address_1'];
				$find_order->address_2     = $place_order['address_2'];
				$find_order->address_3     = $place_order['address_3'] ? $place_order['address_3'] : "";
				$find_order->status        = 2;
				$find_order->payment_price = $payment_price;
				$find_order->postage_area  = $place_order['postage_area'] ? $postage_area[$place_order['postage_area']] : 0;
				$find_order->postage_price = $postage_price;

				if ($place_order['payment_type'] == "paypal") {

					$find_order->payment_type = 1;
					if ($find_order->update() !== false) {
						$this->productPaypalPayment($find_order->form_code);
					} else {
						$transaction->rollBack();
						return $this->redirect(['/products/list?order=error']);
					}
				} elseif ($place_order['payment_type'] == "kiple") {
					$find_order->payment_type = 2;
					if ($find_order->update() !== false) {
						$this->productKiplePayment($find_order->form_code);
						// print_r("time to call kiple");
					} else {
						// print_r($find_order->getErrors());exit;
						$transaction->rollBack();
						return $this->redirect(['/products/list?order=error']);
					}
				} else {
					return $this->redirect(['/products/list?order=error']);
				}
			} else {
				// print_r($place_order->getErrors());exit;
				return $this->redirect(['/products/list?order=error']);
			}
		} else {
			return $this->redirect(['/products/list?order=error']);
		}
	}

	public function actionKipleReturn()
	{
		// $status = array(
		// 	'100' => '1', // success
		// 	'E1'  => '2', // fail
		// 	'E2'  => '3', // abort
		// );
		// $test = $status[100];
		// print_r($test);exit;

		// $post = Yii::$app->request->post();

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

					// $payer->update();
					if ($payer->update() !== false) {

						if ($status == 1) {
							EcomOrder::updateAll([
								'status'     => 1,
								'payment_id' => $payer->id,
							], "invoice_number = '$payer->invoice_number'");
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

					// $new_payer->save();
					if ($new_payer->save() !== false) {

						if ($status == 1) {
							EcomOrder::updateAll([
								'status'     => 1,
								'payment_id' => $new_payer->id,
							], "invoice_number = '$new_payer->invoice_number'");
						}
						// http://fengshui-republic.com/products/checkout?form_code=ZMAP1YXGXIVR
						/* send email */
					}
					switch ($status) {
						case 1:
							$redirect = 'success'; // success
							break;
						case 2:
							$redirect = 'error'; // fail
							break;
						case 3:
							$redirect = 'cancel'; // abort
							break;
						default:
							$redirect = 'error'; // error
							break;
					}
					return $this->redirect(['/products/list?order='.$redirect]);
				}
			}
		} else {
			return $this->redirect(['/products/list?order=error']);
		}
	}
}


