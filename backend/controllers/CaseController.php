<?php

namespace backend\controllers;

use Yii;
use yii\db\Transaction;
use yii\web\Controller;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use yii\bootstrap\ActiveForm;

use backend\models\FormSearchCase;
use backend\models\BoUser;
use backend\models\Customer;
use backend\models\CustomerGroupService;
use backend\models\Services;
use backend\models\Invoice;
use backend\models\InvoiceItem;

class CaseController extends Controller
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
					'generate' => ['POST'],
				],
			],
		];
	}

	public function actionDetail($id)
	{
		$customer = CustomerGroupService::find()
			->with('staff')
			->with('service')
			->with('create')
			->with('update')
			->where([
				'and',
				['customer_service_id' => $id],
				['<>', 'status', 0],
			])
			->asArray()
			->one();

		if ($customer) {
			$result['error'] = 0;
			$result['cgs']  = $customer;
		} else {
			$result['error'] = 1;
		}
		return json_encode($result);
	}

	public function actionDelete($id)
	{
		if (CustomerGroupService::updateAll([
			'status'      => 0,
			'update_date' => date("Y-m-d H:i:s"),
			'update_by'   => Yii::$app->user->identity->user_id,
		], "customer_service_id = '$id'") !== false) {
			Yii::$app->session->setFlash('success', "Success delete case.");
			return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
		} else {
			Yii::$app->session->setFlash('fail', "Error. Fail to delete case.");
			return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
		}
	}

	public function actionAdd($id)
	{
		if (Yii::$app->request->get('created')) {
			Yii::$app->session->setFlash('success', "Success create case.");
			return $this->redirect(['add', 'id' => $id]);
		}

		$allService  = Services::find()->where(['and', ['<>', 'status', 0]])->orderBy(['category' => SORT_ASC])->asArray()->all();
		$listService = ArrayHelper::index($allService, null, 'category');
		foreach ($allService as $key => $value) {
			$listService_arr[ucfirst($value['category'])][$value['service_id']] = ucfirst($value['type_en']);
		}

		$allStaff  = BoUser::find()
			->alias('t')
			->leftJoin('bo_user_info','bo_user_info.user_id = t.user_id')
			->where(['and',
				['<>', 't.user_id', 1],
				['<>', 't.status', 0]
			])
			->orderBy(['bo_user_info.english_name' => SORT_ASC])
			->all();
		$listStaff = array();
		foreach ($allStaff as $staff) {
			$listStaff[$staff->user_id] = strtoupper($staff->info->english_name);
		}

		$type = array(
			'1' => 'Personal',
			'2' => 'Company',
		);
		$gender = array(
			'1' => 'Male',
			'2' => 'Female',
		);
		$student = array(
			'1' => 'Yes',
			'2' => 'No',
		);

		$customer = Customer::find()
			->where([
				'and',
				['customer_id' => $id],
				['<>', 'status', 0],
			])
			->one();

		if ($customer) {
			$query = CustomerGroupService::find();
			$query->leftJoin('services', 'services.service_id = customer_group_service.service_id');
			$query->leftJoin('bo_user_info', 'bo_user_info.user_id = customer_group_service.staff_id');
			$query->where([
				'and',
				['=', 'customer_id', $id],
				['<>', 'customer_group_service.status', 0],
			]);

			$cases = new ActiveDataProvider([
				'query' => $query,
				'pagination' => false,
				'sort' => [
					'defaultOrder' => [
						'service_date' => SORT_DESC,
						'customer_service_id' => SORT_DESC,
					],
					'attributes' => [
						'customer_service_id',
						'service_date',
					],
				],
			]);

			$caseForm = new CustomerGroupService();
			if ($caseForm->load(Yii::$app->request->post())) {
				$post = Yii::$app->request->post('CustomerGroupService');

				if (isset($post['customer_service_id'])) {
					$query = CustomerGroupService::find()
						->where([
							'and',
							['customer_service_id' => $post['customer_service_id']],
							['<>', 'status' , 0],
						]);

					$exists = $query->one();

					if ($exists) {
						$exists->load($post, "");
						$exists->is_clear    = isset($item['is_clear']) ?  : 0;
						$exists->update_by   = Yii::$app->user->identity->user_id;
						$exists->update_date = date("Y-m-d H:i:s");

						if ($exists->update() !== false) {
							Yii::$app->session->setFlash('success', "Success update case.");
							return $this->redirect(['case/add?id='.$exists->customer_id]);
						} else {
							Yii::$app->session->setFlash('fail', "Error. Fail to update case.");
							return $this->redirect(['case/add?id='.$exists->customer_id]);
						}
					}
				}
			}

			$invoice = new Invoice();
			$invoice->customer_id   = $id;
			$invoice->item_per_page = 10;
			if ($invoice->load(Yii::$app->request->post())) {
				if (Yii::$app->request->post('selection')) {
					$post        = Yii::$app->request->post('Invoice');
					$selections  = Yii::$app->request->post('selection');
					$transaction = Yii::$app->db->beginTransaction();
					try {
						$find = Invoice::find()->where(['invoice_number' => 'FSRP-'.date('y').'-00001'])->one();
						$add_invoice = new Invoice();

						if ($find) {
							$exists = Invoice::find()->orderBy(['invoice_id' => SORT_DESC])->one();
							$invoice_number = 'FSRP-'.date('y').'-'.sprintf('%05d', (substr($exists->invoice_number, 8)+1));
						} else {
							$invoice_number = 'FSRP-'.date('y').'-00001';
						}
						$add_invoice->load($post, "");
						$add_invoice->invoice_number = $invoice_number;
						$add_invoice->create_date    = date("Y-m-d H:i:s");
						$add_invoice->create_by      = Yii::$app->user->identity->user_id;

						if ($add_invoice->save()) {
							foreach ($selections as $key => $value) {
								$add_invoice_item = new InvoiceItem();
								$add_invoice_item->invoice_id          = $add_invoice->invoice_id;
								$add_invoice_item->customer_service_id = $value;
								$add_invoice_item->create_date         = date("Y-m-d H:i:s");
								$add_invoice_item->create_by           = Yii::$app->user->identity->user_id;
								if ($add_invoice_item->save() == false) {
									$transaction->rollBack();
									print_r($add_invoice_item->getErrors());exit;

									Yii::$app->session->setFlash('fail', "Error. Fail to create invoice.");
									return $this->redirect(['case/add?id='.$id]);
								}
							}
						} else {
							$transaction->rollBack();
							print_r($add_invoice->getErrors());exit;

							Yii::$app->session->setFlash('fail', "Error. Fail to create invoice.");
							return $this->redirect(['case/add?id='.$id]);
						}
					} catch (Exception $ex) {
						$transaction->rollBack();
						Yii::$app->session->setFlash('fail', "Error. Fail to create invoice.");
						return $this->redirect(['case/add?id='.$id]);
					}
				} else {
					Yii::$app->session->setFlash('fail', "Error. Please select at least one case.");
					return $this->redirect(['case/add?id='.$id]);
				}

				$transaction->commit();
				Yii::$app->session->setFlash('success', "Success create invoice.");
				return $this->redirect(['invoice/list']);
			}
		} else {
			throw new NotFoundHttpException('Page not found.');
		}

		return $this->render('pg_add_case', [
			'type'            => $type,
			'gender'          => $gender,
			'student'         => $student,
			'customer'        => $customer,
			'cases'           => $cases,
			'listStaff'       => $listStaff,
			'listService'     => $listService,
			'listService_arr' => $listService_arr,
			'caseForm'        => $caseForm,
			'invoice'         => $invoice,
		]);
	}

	public function actionGenerate()
	{
		Yii::$app->response->format = Response::FORMAT_JSON;
		$result = array();
		$post   = Yii::$app->request->post();

		$customer = Customer::find()
			->where([
				'and',
				['customer_id' => $post['customer_id']],
				['<>', 'status', 0],
			])
			->asArray()
			->one();

		if ($customer) {
			$transaction = Yii::$app->db->beginTransaction();
			try {
				foreach ($post['Detail'] as $item) {
					$service = Services::find()
						->where([
							'and',
							['service_id' => $item['service_id']],
							['<>', 'status', 0],
						])
						->asArray()
						->one();

					if ($service) {
						$add_cgs = new CustomerGroupService();
						$add_cgs->load($item, "");
						$add_cgs->customer_id    = $post['customer_id'];
						$add_cgs->service_code   = $service['category_code'];
						$add_cgs->service_number = '0';
						$add_cgs->create_date    = date("Y-m-d H:i:s");
						$add_cgs->create_by      = Yii::$app->user->identity->user_id;

						if (isset($item['deposit'])) {
							$remain = $item['price'] - $item['deposit'];
							$add_cgs->remain = $remain;
						}

						if ($add_cgs->save() == false) {
							$transaction->rollBack();
							$result['error']['status'] = 1;
							$result['error']['msg']    = $add_cgs->getErrors();
							return $result;
						} else {
							$add_cgs->service_number = sprintf('%05d', $add_cgs->customer_service_id);
							$add_cgs->update();
						}
					} else {
						$transaction->rollBack();
						$result['error']['status'] = 1;
						$result['error']['msg']    = 'Service not exist';
						return $result;
					}
				}
			} catch (Exception $ex) {
				$transaction->rollBack();
				$result['error']['status'] = 1;
				// $result['error']['data']   = $post;
				$result['error']['msg']    = 'Error: '.$ex;
				return $result;
			}
		} else {
			$result['error']['status'] = 1;
			return $result;
		}

		$transaction->commit();
		$result['error']['status'] = 0;
		return $result;
	}

	public function actionList()
	{
		$listService  = array();
		$listCategory = array();
		$allService   = Services::find()->where(['and', ['<>', 'status', 0]])->orderBy(['category' => SORT_ASC])->asArray()->all();
		foreach ($allService as $key => $value) {
			$listService[ucfirst($value['category'])][$value['service_id']] = ucfirst($value['type_en']);
			$listCategory[$value['category']] = ucfirst($value['category']);
		}

		$model = new FormSearchCase();
		$model->load(Yii::$app->request->get());

		return $this->render('pg_case_list',[
			'model'        => $model,
			'listCases'    => $model->search(),
			'listService'  => $listService,
			'listCategory' => $listCategory,
		]);
	}
}


