<?php

use yii\bootstrap\ActiveForm;
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\grid\ActionColumn;

$this->title = 'Product Orders';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs('
	$("#export-excel").click(function () {
		var status         = $("#formsearchproductorder-status").val();
		var invoice_number = $("#formsearchproductorder-invoice_number").val();
		var from           = $("#formsearchproductorder-from").val();
		var to             = $("#formsearchproductorder-to").val();

		$("#exportOrderExcel-form #export_excel-status").val(status);
		$("#exportOrderExcel-form #export_excel-invoice_number").val(invoice_number);
		$("#exportOrderExcel-form #export_excel-from").val(from);
		$("#exportOrderExcel-form #export_excel-to").val(to);

		$("#exportOrderExcel-form").submit();
	});
', View::POS_END);

$this->registerJs('
	$("#sales").addClass("active");

	$(".datepicker").datepicker({
		format: "yyyy-mm-dd",
		todayHighlight: true,
	});

	$("#editOrderModal").on("hidden.bs.modal", function () {
		$("#editOrder-form").trigger("reset");
	})

	$(".edit-btn").click(function () {
		var data = $(this).data();

		$.getJSON("'.Url::to(['sales/order-detail']).'", {id:data.id}, function (result) {
			if(result.error == 1) {
				alert("Fail");
			} else {
				$.each(result.order, function(key, value){
					if (value) {
						$("#editOrderModal #ecomorder-"+ key).val(value);
					}
					if (key == "invoice_number") {
						$("#edit_inv_id").html(value);
					}
				});
			}
		});

		$("#editOrderModal").modal("show");
	})
', View::POS_END);

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

<div class="container">
	<div class="row">
		<div class="col-12">
			<h4 style="margin-top: 3px; margin-bottom: 5px;">Product Orders</h4>
		</div>
	</div>
	<hr style="border-color: #404041; margin-top: 5px;">
	<div class="row">
		<div class="col-12 mb-3">
			<a href="<?php echo Url::to(['sales/product-order']) ?>" class="btn btn-secondary btn-sm mr-3">Refresh</a>
		</div>
	</div>

	<form id="exportOrderExcel-form" action="<?php echo Url::to(['sales/export-order-excel']) ?>" method="post">
		<input type="hidden" name="_csrf-backend" value="<?php echo Yii::$app->request->getCsrfToken() ?>">
		<input type="hidden" id="export_excel-status" name="FormSearchProductOrder[status]">
		<input type="hidden" id="export_excel-invoice_number" name="FormSearchProductOrder[invoice_number]">
		<input type="hidden" id="export_excel-from" name="FormSearchProductOrder[from]">
		<input type="hidden" id="export_excel-to" name="FormSearchProductOrder[to]">
	</form>

	<div class="card card-body bg-light mb-3">
		<?php $form = ActiveForm::begin([
			'method'      => 'get',
			'action'      => Url::to(['sales/product-order']),
			'fieldConfig' => [
				'options' => [
					'class' => 'form-group',
					// 'style' => 'font-size: 12px;',
					// 'tag'   => false,
				]
			],
		]) ?>
			<div class="row">
				<div class="col-12 col-md-3">
					<?php echo $form->field($model, 'status')->dropDownList(
						[
							'1' => 'Active',
							'2' => 'Non-conforming',
						],
						[
							'class' => 'form-control form-control-sm',
						]
					) ?>
				</div>
				<div class="col-12 col-md-3">
					<?php echo $form->field($model, 'invoice_number')
						->textInput(['class'=>'form-control form-control-sm', 'placeholder'=>'Invoice ID'])
					?>
				</div>
				<div class="col-12 col-md-3">
					<?php echo $form->field($model, 'from')
						->textInput(['class'=>'form-control form-control-sm datepicker', 'placeholder'=>'From', 'autocomplete' => 'off'])
					?>
				</div>
				<div class="col-12 col-md-3">
					<?php echo $form->field($model, 'to')
						->textInput(['class'=>'form-control form-control-sm datepicker', 'placeholder'=>'To', 'autocomplete' => 'off'])
					?>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<button type="submit" class="btn btn-secondary btn-sm">Search</button>
					<button type="button" class="btn btn-secondary btn-sm" id="export-excel">Excel</button>
				</div>
			</div>
		<?php ActiveForm::end() ?>
	</div>

	<div style="overflow: scroll;">
		<?= GridView::widget([
			'dataProvider' => $listOrders,
			'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
			'tableOptions' => [
				'class' => 'table table-sm table-bordered table-hover',
				'style' => 'background-color: #FFF; font-size: 14px;',
			],
			// 'rowOptions'=>function($listJobs){
			// 	if($listJobs->is_urgent == 1){
			// 		return [
			// 			'class' => 'urgent',
			// 		];
			// 	}
			// },
			// 'summary' => '',
			'columns' => [
				['class' => SerialColumn::className()],
				[
					'label' => 'Invoice ID',
					'attribute' => 'invoice_number',
				],
				[
					'label' => 'Status',
					'attribute' => 'transaction_state',
					'value' => function ($listOrders) {
						if ($listOrders->payment_type == 1) {
							if (!empty($listOrders->paypal->transaction_state)) {
								return ucfirst($listOrders->paypal->transaction_state.' (PayPal)');
							} else {
								return ucfirst('Non-conforming (PayPal)');
							}
						}
						if ($listOrders->payment_type == 2) {
							if (!empty($listOrders->kiple->transaction_state)) {
								switch ($listOrders->kiple->transaction_state) {
									case '100':
										$status = 'success';
										break;
									case 'E1':
										$status = 'fail';
										break;
									case 'E2':
										$status = 'abort';
										break;
									default:
										$status = 'error';
										break;
								}
								return ucfirst($status.' (Kiple)');
							} else {
								return ucfirst('Non-conforming (Kiple)');
							}
						}
					}
				],
				[
					'label' => 'Date',
					'attribute' => 'create_date',
				],
				[
					'label' => 'Delivery',
					'attribute' => 'deliver_status',
					'value' => function ($listOrders) {
						$delivery = array(
							0 => "Pending",
							1 => "Completed",
						);
						return $delivery[$listOrders->deliver_status];
					}
				],
				[
					'label' => 'Price',
					'format' => 'raw',
					'value' => function ($listOrders) {
						$subtotal = 0;
						foreach ($listOrders->items as $item) {
							// $subtotal += $item->price*$item->quantity;
							$subtotal += $item->price;
						}

						$area = array(
							0 => "None",
							1 => "Singapore",
							2 => "East M'sia",
							3 => "West M'sia",
						);

						$p = '';
						$p .= '<div class="card card-body bg-dark text-white my-1 p-2"><p class="mb-0">Subtotal: MYR '.number_format($subtotal, 2).'</p></div>';
						$p .= '<div class="card card-body bg-dark text-white my-1 p-2"><p class="mb-0">Shipping ('.$area[$listOrders->postage_area].'): MYR '.number_format($listOrders->postage_price, 2).'</p></div>';
						if ($listOrders->payment_type == 1) {
							if (!empty($listOrders->paypal->total)) {
								$p .= '<div class="card card-body bg-dark text-white my-1 p-2"><p class="mb-0">Total: MYR '.number_format($listOrders->paypal->total, 2).'</p></div>';
							} else {
								$p .= '<div class="card card-body bg-dark text-white my-1 p-2"><p class="mb-0">Total: MYR -</p></div>';
							}
						}
						if ($listOrders->payment_type == 2) {
							if (!empty($listOrders->kiple->transaction_amount)) {
								$p .= '<div class="card card-body bg-dark text-white my-1 p-2"><p class="mb-0">Total: MYR '.number_format($listOrders->kiple->transaction_amount, 2).'</p></div>';
							} else {
								$p .= '<div class="card card-body bg-dark text-white my-1 p-2"><p class="mb-0">Total: MYR -</p></div>';
							}
						}
						return $p;
					}
				],
				[
					'label' => 'Item',
					'format' => 'raw',
					'value' => function ($listOrders) {
						$p = '';
						foreach ($listOrders->items as $item) {
							$p .= '<div class="card card-body bg-dark text-white my-1 p-2"><p class="mb-0">'.$item->info->name_cn.' x '.$item->quantity.' (MYR '.number_format($item->price, 2).')</p></div>';
						}
						return $p;
					}
				],
				[
					'label' => 'Payer',
					'format' => 'raw',
					'value' => function ($listOrders) {
						$p = '';
						if ($listOrders->payment_type == 1) {
							if (!empty($listOrders->paypal->payer_last_name)) {
								$p = '<div class="card card-body bg-dark text-white my-1 p-2"><p class="mb-0">PayPal<br>'.$listOrders->paypal->payer_last_name.' '.$listOrders->paypal->payer_first_name.'<br>'.$listOrders->paypal->payer_phone.'<br>'.$listOrders->paypal->payer_email.'</p></div>';
							} else {
								$p = '<div class="card card-body bg-dark text-white my-1 p-2"><p class="mb-0">PayPal<br>-</p></div>';
							}
						}
						if ($listOrders->payment_type == 2) {
							if (!empty($listOrders->kiple->payer_name)) {
								$p = '<div class="card card-body bg-dark text-white my-1 p-2"><p class="mb-0">Kiple<br>'.$listOrders->kiple->payer_name.'<br>'.$listOrders->kiple->payer_phone.'<br>'.$listOrders->kiple->payer_email.'</p></div>';
							} else {
								$p = '<div class="card card-body bg-dark text-white my-1 p-2"><p class="mb-0">Kiple<br>-</p></div>';
							}
						}
						return $p;
					}
				],
				[
					'label' => 'Info',
					'format' => 'raw',
					'headerOptions' => ['style' => 'width: 20%;'],
					'value' => function ($listOrders) {
						$addr = $listOrders->address_1.', '.$listOrders->address_2;
						$addr .= $listOrders->address_3 ? ', '.$listOrders->address_3 : '';
						$p = '<div class="card card-body bg-dark text-white my-1 p-2"><p class="mb-0">Collect at: '.$listOrders->collect_at.'<br>Name: '.$listOrders->name.'<br>Email: '.$listOrders->email.'<br>Phone: '.$listOrders->phone.'<br>Addr: '.$addr.'</p></div>';
						return $p;
					},
				],
				[
					'label' => 'Remark',
					'format' => 'raw',
					'value' => function ($listOrders) {
						return $listOrders->remark;
					}
				],
				[
					'class' => ActionColumn::className(),
					'header' => 'Action',
					'headerOptions' => ['class' => 'text-center'],
					'contentOptions' => ['class' => 'text-center', 'style' => 'white-space: nowrap;'],
					'template' => '{edit}',
					'buttons' => [
						'edit' => function ($url, $listOrders, $key) {
							return Html::a('Edit', 'javascript:void(0)', [
								'class' => 'btn btn-primary edit-btn',
								'data'  => [
									'id' => $listOrders->order_id,
								],
							]);
						},
					],
				]
			],
		]) ?>
	</div>
</div>

<div id="editOrderModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Order (Invoice ID: <span id="edit_inv_id"></span>)</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<?php $form = ActiveForm::begin([
				'id' => 'editOrder-form',
				'fieldConfig' => [
					'options' => [
						'class' => 'form-group',
					]
				],
			]); ?>
				<div class="modal-body">
					<fieldset>
						<?php echo Html::activeHiddenInput($ecomOrder, 'order_id'); ?>
						<div class="row">
							<div class="col-12">
								<?php echo $form->field($ecomOrder, 'deliver_status')->dropDownList(
									[
										0 => 'Pending',
										1 => 'Completed',
									],
									['class' => 'form-control form-control-sm']
								) ?>
							</div>
							<div class="col-12">
								<?php echo $form->field($ecomOrder, 'remark')->textarea(['class' => 'form-control form-control-sm', 'rows' => '4']) ?>
							</div>
						</div>
					</fieldset>
				</div>
				<div class="modal-footer">
					<div class="container">
						<div class="row">
							<div class="col-auto ml-auto px-0">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</div>
				</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>


