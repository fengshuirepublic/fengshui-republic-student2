<?php

namespace backend\controllers;

use Yii;
use yii\db\Transaction;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

use backend\models\Services;
use backend\models\Invoice;
use backend\models\InvoiceItem;
use backend\models\FormSearchInvoice;

class InvoiceController extends Controller
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
		];
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

		$model = new FormSearchInvoice();
		$model->load(Yii::$app->request->get());

		return $this->render('pg_invoice_list',[
			'model'        => $model,
			'listInvoices' => $model->search(),
			'listService'  => $listService,
			'listCategory' => $listCategory,
		]);
	}

	public function actionView($id)
	{
		Yii::$app->response->format = Response::FORMAT_JSON;

		$invoice = Invoice::find()
			->alias('invoice')
			->leftJoin('invoice_item','invoice_item.invoice_id = invoice.invoice_id')
			->leftJoin('customer','customer.customer_id = invoice.customer_id')
			->leftJoin('customer_group_service','customer_group_service.customer_service_id = invoice_item.customer_service_id')
			->leftJoin('services','services.service_id = customer_group_service.service_id')
			->where([
				'and',
				['invoice.invoice_id' => $id],
				['<>', 'invoice.status', 0],
			])
			->one();

		$invoiceInfo                     = ArrayHelper::toArray($invoice);
		$invoiceInfo['name_en']          = $invoice->customer->name_en;
		$invoiceInfo['contact_number_1'] = $invoice->customer->contact_number_1;
		$invoiceInfo['staff_en']         = $invoice->staff->english_name;

		foreach ($invoice->items as $key => $item) {
			$invoiceItemInfo[$key] = ArrayHelper::toArray($item->case);
			$invoiceItemInfo[$key]['category'] = $item->case->service->category;
			$invoiceItemInfo[$key]['type_en']  = $item->case->service->type_en;
			$invoiceItemInfo[$key]['type_cn']  = $item->case->service->type_cn;
			$invoiceItemInfo[$key]['staff_en'] = $item->case->staff->english_name;
		}

		if ($invoiceInfo) {
			$result['error']['status'] = 0;
			$result['invoiceInfo']     = $invoiceInfo;
			$result['invoiceItemInfo'] = $invoiceItemInfo;
		} else {
			$result['error']['status'] = 1;
		}
		return $result;
	}

	public function actionDelete($id)
	{
		if (Invoice::updateAll(['status' => 0], "invoice_id = '$id'") !== false) {
			Yii::$app->session->setFlash('success', "Success delete invoice.");
			return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
			// if (InvoiceItem::updateAll([
			// 	'status' => 0,
			// 	'update_by' => Yii::$app->user->identity->user_id,
			// 	'update_date' => date("Y-m-d H:i:s"),
			// ], "invoice_id = ".$id) !== false) {
			// 	Yii::$app->session->setFlash('success', "Success delete invoice.");
			// 	return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
			// } else {
			// 	Yii::$app->session->setFlash('fail', "Error. Something wrong.");
			// 	return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
			// }
		} else {
			Yii::$app->session->setFlash('fail', "Error. Fail to delete invoice.");
			return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
		}
	}
}


