<?php

namespace backend\controllers;

use Yii;
use yii\db\Transaction;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use yii\bootstrap\ActiveForm;

use backend\models\Invoice;
use backend\models\InvoiceItem;
use backend\models\BoUser;
use backend\models\Customer;
use backend\models\CountryList;
use backend\models\FormSearchCustomer;

class CustomerController extends Controller
{
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'allow' => true,
						'roles' => ['level_3'],
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

	public function actionList()
	{
		$countryAll  = CountryList::find()->asArray()->all();
		$countryList = ArrayHelper::map($countryAll, 'country_name', 'country_name');

		$customerForm          = new Customer();
		$customerForm->rate    = 3;
		// $customerForm->country = 'MALAYSIA';

		if (Yii::$app->request->isAjax && $customerForm->load(Yii::$app->request->post())) {
			Yii::$app->response->format = Response::FORMAT_JSON;
			return ActiveForm::validate($customerForm);
		}
		if ($customerForm->load(Yii::$app->request->post())) {
			$abc = array(
				0  => 'A',
				1  => 'B',
				2  => 'C',
				3  => 'D',
				4  => 'E',
				5  => 'F',
				6  => 'G',
				7  => 'H',
				8  => 'I',
				9  => 'J',
				10 => 'K',
				11 => 'L',
				12 => 'M',
				13 => 'N',
				14 => 'O',
				15 => 'P',
				16 => 'Q',
				17 => 'R',
				18 => 'S',
				19 => 'T',
				20 => 'U',
				21 => 'V',
				22 => 'W',
				23 => 'X',
				24 => 'Y',
				25 => 'Z',
			);
			$post = Yii::$app->request->post('Customer');

			if (isset($post['customer_id'])) {
				$result = Customer::find()
					->where([
						'and',
						['customer_id' => $post['customer_id']],
						['<>', 'status', 0],
					])
					->one();

				if ($result) {
					$result->load($post, "");
					$result->name_en     = trim(strtoupper($post['name_en']));
					$result->name_cn     = trim($post['name_cn']);
					$result->address_1   = trim($post['address_1']);
					$result->address_2   = trim($post['address_2']);
					$result->address_3   = trim($post['address_3']);
					$result->postcode    = trim($post['postcode']);
					$result->city        = trim($post['city']);
					$result->state       = trim($post['state']);
					$result->remark      = trim($post['remark']);
					$result->update_date = date("Y-m-d H:i:s");
					$result->update_by   = Yii::$app->user->identity->user_id;

					if ($result->update() !== false) {
						Yii::$app->session->setFlash('success', "Success update customer.");
						return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
					} else {
						Yii::$app->session->setFlash('fail', "Error. Fail to update customer.");
						return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
					}
				}
			} else {
				$new_customer = new Customer();
				$new_customer->load($post, "");
				$new_customer->name_en     = trim(strtoupper($post['name_en']));
				$new_customer->name_cn     = trim($post['name_cn']);
				$new_customer->address_1   = trim($post['address_1']);
				$new_customer->address_2   = trim($post['address_2']);
				$new_customer->address_3   = trim($post['address_3']);
				$new_customer->postcode    = trim($post['postcode']);
				$new_customer->city        = trim($post['city']);
				$new_customer->state       = trim($post['state']);
				$new_customer->remark      = trim($post['remark']);
				$new_customer->create_date = date("Y-m-d H:i:s");
				$new_customer->create_by   = Yii::$app->user->identity->user_id;

				if ($new_customer->validate() && $new_customer->save()) {
					$customer_id                 = $new_customer->customer_id;;
					$remainder                   = $customer_id%10000;
					$number                      = floor($customer_id/10000);
					$code                        = $abc[$number];
					$customer_code               = $code.sprintf('%04d', $remainder);
					$new_customer->customer_code = $customer_code;
					$new_customer->update();

					Yii::$app->session->setFlash('success', "Success add customer.");
					return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
				} else {
					Yii::$app->session->setFlash('fail', "Error. Fail to add customer.");
					return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
				}
			}
		}

		$model = new FormSearchCustomer();
		$model->load(Yii::$app->request->get());

		return $this->render('pg_customer_list', [
			'countryList'  => $countryList,
			'model'        => $model,
			'customers'    => $model->search(),
			'customerForm' => $customerForm,
		]);
	}

	public function actionDetail($id)
	{
		$customer = Customer::find()
			->with('create')
			->with('update')
			->where([
				'and',
				['customer_id' => $id],
				['<>', 'status', 0],
			])
			->asArray()
			->one();

		if ($customer) {
			$result['error'] = 0;
			$result['customer']  = $customer;
		} else {
			$result['error'] = 1;
		}
		return json_encode($result);
	}

	public function actionDelete($id)
	{
		if (Customer::updateAll([
			'status'      => 0,
			'update_date' => date("Y-m-d H:i:s"),
			'update_by'   => Yii::$app->user->identity->user_id,
		], "customer_id = '$id'") !== false) {
			Yii::$app->session->setFlash('success', "Success delete customer.");
			return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
		} else {
			Yii::$app->session->setFlash('fail', "Error. Fail to delete customer.");
			return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
		}
	}
}


