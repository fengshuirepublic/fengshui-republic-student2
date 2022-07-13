<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use backend\models\EcomOrder;
use backend\models\EcomProduct;
use backend\models\EventAttendee;
use backend\models\VideoAccess;
use backend\models\VideoUrl;
use backend\models\FormNewVideoPass;
use backend\models\FormSearchVideoPass;
use backend\models\FormSearchProductOrder;
use backend\excel\ProductOrderList;
use backend\excel\AttendanceListVid2020;

use Aws\S3\S3Client;

class SalesController extends Controller
{
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
				],
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

	public function actionProductOrder()
	{
		$ecomOrder = new EcomOrder();
		if ($ecomOrder->load(Yii::$app->request->post())) {
			$post = Yii::$app->request->post('EcomOrder');

			if (isset($post['order_id'])) {
				$query = EcomOrder::find();
				$query->where([
					'and',
					['order_id' => $post['order_id']],
					// ['status' => 1],
				]);
				$order = $query->one();
				if ($order) {
					// $order->load($post, "");
					$order->deliver_status = $post['deliver_status'];
					$order->remark = $post['remark'];

					if ($order->update() !== false) {
						Yii::$app->session->setFlash('success', "Success update order.");
						return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
					} else {
						Yii::$app->session->setFlash('fail', "Error. Fail to update order.");
						return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
					}
				} else {
					Yii::$app->session->setFlash('fail', "Error. Order not found.");
					return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
				}
			} else {
				Yii::$app->session->setFlash('fail', "Error. Order not found.");
				return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
			}
		}

		$model = new FormSearchProductOrder();
		$model->load(Yii::$app->request->get());

		// print_r($model->search());exit;

		return $this->render('pg_product_sales', [
			'model'      => $model,
			'listOrders' => $model->search(),
			'ecomOrder'  => $ecomOrder,
		]);
	}

	public function actionOrderDetail($id)
	{
		$order = EcomOrder::find()
			->where([
				'and',
				['order_id' => $id],
				// ['status' => 1],
			])
			->asArray()
			->one();

		if ($order) {
			$result['error'] = 0;
			$result['order']  = $order;
		} else {
			$result['error'] = 1;
		}
		return json_encode($result);
	}

	public function actionExportOrderExcel()
	{
		$model = new FormSearchProductOrder();
		$model->load(Yii::$app->request->post());
		$productOrders = $model->excel();

		$excel = new ProductOrderList();
		$excel->generate($productOrders);
		exit;
	}

	public function actionVideoPass()
	{
		$allProducts = EcomProduct::find()->where(['status' => 1])->asArray()->all();
		$listProducts = ArrayHelper::map($allProducts, 'product_code', 'name_cn');

		$model = new FormSearchVideoPass();
		$model->load(Yii::$app->request->get());

		$videoPass = new FormNewVideoPass();
		if ($videoPass->load(Yii::$app->request->post())) {
			$post = Yii::$app->request->post('FormNewVideoPass');
			if (isset($post['id'])) {
				$query = VideoAccess::find();
				$query->where([
					'and',
					['id' => $post['id']],
					['<>', 'status', 0],
				]);
				$result = $query->one();

				if ($result) {
					if ($result->invoice_number == 'FSRP-00000') {
						$attendee = EventAttendee::find()
							->where([
								'and',
								['refer_id' => $result->id],
								['product_code' => $result->product_code],
							])
							->one();

						if ($attendee) {
							$result->attendance    = $post['attendance'];
							$result->remark        = $post['remark'];
							$result->update_date   = date("Y-m-d H:i:s");
							$attendee->name        = $post['name'];
							$attendee->email       = $post['email'];
							$attendee->phone       = $post['phone'];
							$attendee->update_date = date("Y-m-d H:i:s");
							$attendee->update_by   = Yii::$app->user->identity->user_id;
							if ($attendee->update() !== false && $result->update() !== false) {
								Yii::$app->session->setFlash('success', "Success update video pass.");
								return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
							}
						} else {
							Yii::$app->session->setFlash('fail', "Error. Fail to update video pass");
							return $this->redirect(['sales/video-pass']);
						}
					} else {
						$result->attendance = $post['attendance'];
						$result->remark = $post['remark'];
						if ($result->update() !== false) {
							Yii::$app->session->setFlash('success', "Success update video pass.");
							return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
						} else {
							Yii::$app->session->setFlash('fail', "Error. Fail to update video pass.");
							return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
						}
					}
				} else {
					Yii::$app->session->setFlash('fail', "Error. Fail to update video pass");
					return $this->redirect(['sales/video-pass']);
				}
			} else {
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

				$current    = date("Y-m-d H:i:s");
				$expired_ts = strtotime('+260 minutes', strtotime($current));

				$new_item = new VideoAccess();
				$new_item->status         = 1;
				$new_item->invoice_number = 'FSRP-00000';
				$new_item->product_code   = $post['product_code'];
				$new_item->access_code    = $code_complete;
				$new_item->attendance     = $post['attendance'];
				$new_item->expire_ts_url  = $expired_ts;
				$new_item->create_date    = date("Y-m-d H:i:s");
				$new_item->remark         = $post['remark'];

				if ($new_item->save() !== false) {
					$new_attendee = new EventAttendee();
					$new_attendee->refer_id     = $new_item->id;
					$new_attendee->product_code = $new_item->product_code;
					$new_attendee->name         = $post['name'];
					$new_attendee->email        = $post['email'];
					$new_attendee->phone        = $post['phone'];
					$new_attendee->create_date  = date("Y-m-d H:i:s");
					$new_attendee->create_by    = Yii::$app->user->identity->user_id;

					if ($new_attendee->save() !== false) {

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
							$new_url->video_access_id = $new_item->id;
							$new_url->url             = $url;
							$new_url->sequence        = $i;
							if ($new_url->save() == false) {
								Yii::$app->session->setFlash('fail', "Error. Fail to add video pass.");
								return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
							}
						}
					}
				}

				Yii::$app->session->setFlash('success', "Success add video pass.");
				return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
			}
		}

		return $this->render('pg_video_pass', [
			'model'        => $model,
			'listPasses'   => $model->search(),
			'videoPass'    => $videoPass,
			'listProducts' => $listProducts,
		]);
	}

	public function actionVideoPassRemark($id)
	{
		$pass = VideoAccess::find()
			->where([
				'and',
				['id' => $id],
				['status' => 1],
				['<>', 'invoice_number', 'FSRP-00000'],
			])
			->one();

		if ($pass) {
			$result['error'] = 0;
			$result['pass']['id'] = $pass->id;
			$result['pass']['access_code'] = $pass->access_code;
			$result['pass']['attendance'] = $pass->attendance;
			$result['pass']['remark']  = $pass->remark;
		} else {
			$result['error'] = 1;
		}
		return json_encode($result);
	}

	public function actionVideoPassDetail($id)
	{
		$pass = VideoAccess::find()
			->with('eventAttendee')
			->where([
				'and',
				['id' => $id],
				['status' => 1],
				['invoice_number' => 'FSRP-00000'],
			])
			->one();

		if ($pass) {
			$result['error'] = 0;
			$result['pass']['id'] = $pass->id;
			$result['pass']['access_code'] = $pass->access_code;
			$result['pass']['attendance'] = $pass->attendance;
			$result['pass']['name'] = $pass->eventAttendee->name;
			$result['pass']['email'] = $pass->eventAttendee->email;
			$result['pass']['phone'] = $pass->eventAttendee->phone;
			$result['pass']['remark']  = $pass->remark;
		} else {
			$result['error'] = 1;
		}
		return json_encode($result);
	}

	public function actionDeleteVideoPass($id)
	{
		if (VideoAccess::updateAll(['status' => 0], [
			'and',
			['id' => $id],
			['invoice_number' => 'FSRP-00000'],
		]) !== false) {
			Yii::$app->session->setFlash('success', "Success delete video pass");
			return $this->redirect(['sales/video-pass']);
		} else {
			Yii::$app->session->setFlash('fail', "Error. Fail to delete video pass");
			return $this->redirect(['sales/video-pass']);
		}
	}

	public function actionExportAttendanceExcel()
	{
		$model = new FormSearchVideoPass();
		$model->load(Yii::$app->request->post());
		$attendees = $model->excel();

		$excel = new AttendanceListVid2020();
		$excel->generate($attendees);
		exit;
	}
}
