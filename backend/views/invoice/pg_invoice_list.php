<?php

use backend\assets\AppAsset;
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\grid\ActionColumn;

$this->title = 'Invoice List';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile("@web/js/ng-invoice-app.js", [
	'depends' => AppAsset::className(),
]);

$this->registerJs('
	angular.module("invoice-app", ["republic-invoice"]);
', View::POS_END);

$this->registerJs('
	angular.module("invoice-app", ["republic-invoice"])
	.value("baseUrl", "'.Yii::getAlias('@web').'")
', View::POS_END);

$this->registerJs('
	$("#backend").addClass("active");
', View::POS_END);

$this->registerCss('
');

?>

<?php if (Yii::$app->session->hasFlash('success')): ?>
	<div class="container">
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close p-0" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			<?= Yii::$app->session->getFlash('success') ?>
		</div>
	</div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('fail')): ?>
	<div class="container">
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close p-0" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			<?= Yii::$app->session->getFlash('fail') ?>
		</div>
	</div>
<?php endif; ?>

<div ng-app="invoice-app" ng-controller="ViewInvoiceCtrl">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h4 style="margin-top: 3px; margin-bottom: 5px;">Invoice List</h4>
			</div>
		</div>
		<hr style="border-color: #404041; margin-top: 5px;">

		<div class="card card-body bg-light mb-3">
			<?php $form = ActiveForm::begin([
				'method'      => 'get',
				'action'      => Url::to(['invoice/list']),
				'fieldConfig' => [
					'options' => [
						'class' => 'form-group',
					]
				],
			]) ?>
				<div class="row">
					<div class="col-12 col-md-3">
						<?php echo $form->field($model, 'name_en')
							->textInput(['class'=>'form-control form-control-sm', 'placeholder'=>'English Name'])
						?>
					</div>
					<div class="col-12 col-md-3">
						<?php echo $form->field($model, 'category')->dropDownList(
							$listCategory,
							[
								'prompt' => 'Please Select',
								'class' => 'form-control form-control-sm'
							]
						) ?>
					</div>
					<div class="col-12 col-md-3">
						<?php echo $form->field($model, 'service_id')->dropDownList(
							$listService,
							[
								'prompt' => 'Please Select',
								'class' => 'form-control form-control-sm'
							]
						) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<button type="submit" class="btn btn-secondary btn-sm">Search</button>
					</div>
				</div>
			<?php ActiveForm::end() ?>
		</div>

		<div style="overflow: scroll; padding-bottom: 200px;">
			<?= GridView::widget([
				'dataProvider' => $listInvoices,
				'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
				'tableOptions' => [
					'class' => 'table table-sm table-bordered table-hover',
					'style' => 'background-color: #FFF;',
				],
				// 'summary' => '',
				'columns' => [
					['class' => SerialColumn::className()],
					[
						'label' => 'Customer',
						'attribute' => 'customer.name_en',
						'value' => function ($listInvoices) {
							$name_cn = $listInvoices->customer->name_cn ? ' ('.$listInvoices->customer->name_cn.')' : '';
							return $listInvoices->customer->name_en.$name_cn;
						},
					],
					[
						'label' => 'Services',
						'format' => 'raw',
						'value' => function ($listInvoices) {
							$item_arr = array();
							foreach ($listInvoices->items as $item) {
								array_push($item_arr, ucfirst($item->case->service->type_en).' - '.number_format($item->case->price, 2).' ('.strtoupper($item->case->staff->english_name).')');
							}
							if ($item_arr) {
								$item_txt = implode('<hr style="margin-top: 3px; margin-bottom: 3px; border-color: #dedede;">',$item_arr);
							} else {
								$item_txt = '-';
							}
							return $item_txt;
						},
					],
					'invoice_number',
					'invoice_date',
					'remark',
					[
						'class' => ActionColumn::className(),
						'header' => 'Action',
						'headerOptions' => ['class' => 'text-center'],
						'contentOptions' => ['class' => 'text-center', 'style' => 'white-space: nowrap;'],
						'template' => '{pdf} {view} {edit} {delete}',
						'buttons' => [
							'pdf' => function ($url, $listInvoices, $key) {
								return Html::a('PDF', ['pdf/invoice', 'id' => $listInvoices->invoice_id], [
									'class'  => 'btn btn-primary',
									'target' => '_blank',
								]);
							},
							'view' => function ($url, $listInvoices, $key) {
								return Html::a('View', 'javascript:void(0)', [
									'class' => 'btn btn-primary',
									'ng-click' => 'fetchInfo('.$listInvoices->invoice_id.')',
								]);
							},
							// 'edit' => function ($url, $listInvoices, $key) {
							// 	return Html::a('Edit', ['edit', 'id' => $listInvoices->invoice_id], [
							// 		'class' => 'btn btn-primary',
							// 	]);
							// },
							'delete' => function ($url, $listInvoices, $key) {
								return Html::a('Delete', ['delete', 'id' => $listInvoices->invoice_id], [
									'class' => 'btn btn-danger btn-confirm-del',
								]);
							},
						],
					]
				],
			]) ?>
		</div>
	</div>

	<div id="viewInvoiceModal" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Invoice Info</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<fieldset>
						<div class="row mb-2">
							<div class="col-12 col-sm-4">Customer Name (en)</div>
							<div class="col-12 col-sm-8">
								<span ng-if="invoiceInfo.name_en"><b>{{ invoiceInfo.name_en }}</b></span>
								<span ng-if="!invoiceInfo.name_en"><b>-</b></span>
							</div>
						</div>
						<div class="row mb-2">
							<div class="col-12 col-sm-4">Customer 1st Contact</div>
							<div class="col-12 col-sm-8">
								<span ng-if="invoiceInfo.contact_number_1"><b>{{ invoiceInfo.contact_number_1 }}</b></span>
								<span ng-if="!invoiceInfo.contact_number_1"><b>-</b></span>
							</div>
						</div>
						<div class="row mb-2">
							<div class="col-12 col-sm-4">Invoice Number</div>
							<div class="col-12 col-sm-8">
								<span ng-if="invoiceInfo.invoice_number"><b>{{ invoiceInfo.invoice_number }}</b></span>
								<span ng-if="!invoiceInfo.invoice_number"><b>-</b></span>
							</div>
						</div>
						<div class="row mb-2">
							<div class="col-12 col-sm-4">Invoice Date</div>
							<div class="col-12 col-sm-8">
								<span ng-if="invoiceInfo.invoice_date"><b>{{ invoiceInfo.invoice_date }}</b></span>
								<span ng-if="!invoiceInfo.invoice_date"><b>-</b></span>
							</div>
						</div>
						<div class="row mb-2">
							<div class="col-12 col-sm-4">Discount</div>
							<div class="col-12 col-sm-8">
								<span ng-if="invoiceInfo.discount"><b>{{ invoiceInfo.discount }}</b></span>
								<span ng-if="!invoiceInfo.discount"><b>-</b></span>
							</div>
						</div>
						<div class="row mb-2">
							<div class="col-12 col-sm-4">Attention</div>
							<div class="col-12 col-sm-8">
								<span ng-if="invoiceInfo.attention"><b>{{ invoiceInfo.attention }}</b></span>
								<span ng-if="!invoiceInfo.attention"><b>-</b></span>
							</div>
						</div>
						<div class="row mb-2">
							<div class="col-12 col-sm-4">Item Per Page</div>
							<div class="col-12 col-sm-8">
								<span ng-if="invoiceInfo.item_per_page"><b>{{ invoiceInfo.item_per_page }}</b></span>
								<span ng-if="!invoiceInfo.item_per_page"><b>-</b></span>
							</div>
						</div>
						<div class="row mb-2">
							<div class="col-12 col-sm-4">Remark</div>
							<div class="col-12 col-sm-8">
								<span ng-if="invoiceInfo.remark"><b>{{ invoiceInfo.remark }}</b></span>
								<span ng-if="!invoiceInfo.remark"><b>-</b></span>
							</div>
						</div>
						<div class="row mb-2">
							<div class="col-12 col-sm-4">Create Date</div>
							<div class="col-12 col-sm-8">
								<span ng-if="invoiceInfo.create_date"><b>{{ invoiceInfo.create_date }}</b></span>
								<span ng-if="!invoiceInfo.create_date"><b>-</b></span>
							</div>
						</div>
						<div class="row mb-2">
							<div class="col-12 col-sm-4">Create By</div>
							<div class="col-12 col-sm-8">
								<span ng-if="invoiceInfo.staff_en"><b>{{ invoiceInfo.staff_en }}</b></span>
								<span ng-if="!invoiceInfo.staff_en"><b>-</b></span>
							</div>
						</div>
						<div style="overflow: scroll;">
							<table class="table table-bordered table-condensed">
								<thead>
									<tr>
										<th>Category</th>
										<th>Service Type (en)</th>
										<th>Service Type (cn)</th>
										<th>Service No.</th>
										<th>Description</th>
										<th>PIC</th>
										<th>Remark</th>
										<th class="text-right">Price</th>
									</tr>
								</thead>
								<tbody>
									<tr ng-repeat="item in invoiceItemInfo track by $index">
										<td>{{ item.category | capitalize }}</td>
										<td>{{ item.type_en | capitalize }}</td>
										<td>{{ item.type_cn }}</td>
										<td>{{ item.service_code }}{{ item.service_number }}</td>
										<td>
											<span ng-if="item.description">{{ item.description }}</span>
											<span ng-if="!item.description">-</span>
										</td>
										<td>
											<span ng-if="item.staff_en">{{ item.staff_en }}</span>
											<span ng-if="!item.staff_en">-</span>
										</td>
										<td>
											<span ng-if="item.remark">{{ item.remark }}</span>
											<span ng-if="!item.remark">-</span>
										</td>
										<td class="text-right">{{ item.price | number: 2 }}</td>
									</tr>
									<tr>
										<td class="text-right" colspan="7">Total</td>
										<td class="text-right">{{ grandTotal() | number: 2 }}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</fieldset>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>


