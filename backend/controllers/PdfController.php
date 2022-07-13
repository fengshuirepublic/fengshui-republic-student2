<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use backend\pdf\InvoiceReceipt;
use backend\models\Invoice;

class PdfController extends Controller
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

	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
			'captcha' => [
				'class' => 'yii\captcha\CaptchaAction',
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
		];
	}

	public function actionInvoice($id)
	{
		$invoiceInfo = Invoice::find()
			->with('customer')
			->with('items')
			->where([
				'and',
				['invoice_id' => $id],
				['<>', 'status', 0],
			])
			->one();

		$pdf = new InvoiceReceipt();
		$pdf->generate($invoiceInfo);
		$pdf->Output("Invoice_".$invoiceInfo->invoice_number.".pdf");
	}
}


