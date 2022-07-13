<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\ButtonDropdown;
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\grid\ActionColumn;

$this->title = 'Video Pass';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs('
	$("#export-excel").click(function () {
		var attendance     = $("#formsearchvideopass-attendance").val();
		var invoice_number = $("#formsearchvideopass-invoice_number").val();

		$("#exportAttendanceExcel-form #export_excel-attendance").val(attendance);
		$("#exportAttendanceExcel-form #export_excel-invoice_number").val(invoice_number);

		$("#exportAttendanceExcel-form").submit();
	});
', View::POS_END);

$this->registerJs('
	$("#sales").addClass("active");

	$("#editPassRemarkModal").on("hidden.bs.modal", function () {
		$("#editPass-form").trigger("reset");
	});

	$(".editRemark-btn").click(function () {
		var data = $(this).data();

		$.getJSON("'.Url::to(['sales/video-pass-remark']).'", {id:data.id}, function (result) {
			if(result.error == 1) {
				alert("Fail");
			} else {
				$.each(result.pass, function(key, value){
					if (value) {
						$("#editPassRemarkModal #formnewvideopass-"+ key).val(value);
					}
					if (key == "access_code") {
						$("#remark_pass_code").html(value);
					}
				});
			}
		});

		$("#editPassRemarkModal").modal("show");
	});

	$("#editPassDetailModal").on("hidden.bs.modal", function () {
		$("#editPass-form").trigger("reset");
	});

	$(".editDetail-btn").click(function () {
		var data = $(this).data();

		$.getJSON("'.Url::to(['sales/video-pass-detail']).'", {id:data.id}, function (result) {
			if(result.error == 1) {
				alert("Fail");
			} else {
				$.each(result.pass, function(key, value){
					if (value) {
						$("#editPassDetailModal #formnewvideopass-"+ key).val(value);
					}
					if (key == "access_code") {
						$("#detail_pass_code").html(value);
					}
				});
			}
		});

		$("#editPassDetailModal").modal("show");
	});
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
			<h4 style="margin-top: 3px; margin-bottom: 5px;">Video Pass</h4>
		</div>
	</div>
	<hr style="border-color: #404041; margin-top: 5px;">
	<div class="row">
		<div class="col-12 mb-3">
			<button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#newPassModal">New Pass</button>
		</div>
	</div>

	<form id="exportAttendanceExcel-form" action="<?php echo Url::to(['sales/export-attendance-excel']) ?>" method="post">
		<input type="hidden" name="_csrf-backend" value="<?php echo Yii::$app->request->getCsrfToken() ?>">
		<input type="hidden" id="export_excel-attendance" name="FormSearchVideoPass[attendance]">
		<input type="hidden" id="export_excel-invoice_number" name="FormSearchVideoPass[invoice_number]">
	</form>

	<div class="card card-body bg-light mb-3">
		<?php $form = ActiveForm::begin([
			'method'      => 'get',
			'action'      => Url::to(['sales/video-pass']),
			'fieldConfig' => [
				'options' => [
					'class' => 'form-group',
				]
			],
		]) ?>
			<div class="row">
				<div class="col-12 col-md-3">
					<?php echo $form->field($model, 'attendance')->dropDownList(
						[
							0 => 'None',
							1 => 'KL',
							2 => 'JB',
						],
						[
							'class' => 'form-control form-control-sm',
							'prompt' => 'Please Select',
						]
					) ?>
				</div>
				<div class="col-12 col-md-3">
					<?php echo $form->field($model, 'invoice_number')
						->textInput(['class'=>'form-control form-control-sm', 'placeholder'=>'Invoice Number'])
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
			'dataProvider' => $listPasses,
			'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
			'tableOptions' => [
				'class' => 'table table-sm table-bordered table-hover',
				'style' => 'background-color: #FFF; font-size: 14px;',
			],
			'columns' => [
				['class' => SerialColumn::className()],
				[
					'attribute' => 'invoice_number',
				],
				[
					'attribute' => 'product_code',
					'value' => function ($listPasses) use ($listProducts) {
						return $listProducts[$listPasses->product_code];
					}
				],
				[
					'attribute' => 'access_code',
				],
				[
					'attribute' => 'attendance',
					'value' => function ($listPasses) {
						$attend = array(
							0 => "-",
							1 => "KL",
							2 => "JB",
						);
						return $attend[$listPasses->attendance];
					}
				],
				[
					'label' => 'Info',
					'format' => 'raw',
					'value' => function ($listPasses) {
						if ($listPasses->invoice_number == 'FSRP-00000') {
							$name = $listPasses->eventAttendee->name ? : '-';
							$email = $listPasses->eventAttendee->email ? : '-';
							$phone = $listPasses->eventAttendee->phone ? : '-';
						} else {
							$name = ($listPasses->ecomOrder->name) ? : '-';
							$email = ($listPasses->ecomOrder->email) ? : '-';
							$phone = ($listPasses->ecomOrder->phone) ? : '-';
						}
						$p = '<p class="mb-0">'.$name.'</p>'.'<p class="mb-0">'.$email.'</p>'.'<p class="mb-0">'.$phone.'</p>';
						return $p;
					}
				],
				[
					'attribute' => 'remark',
				],
				[
					'class' => ActionColumn::className(),
					'header' => 'Action',
					'headerOptions' => ['class' => 'text-center'],
					'contentOptions' => ['class' => 'text-center', 'style' => 'white-space: nowrap;'],
					'template' => '{edit} {delete}',
					'buttons' => [
						'edit' => function ($url, $listPasses, $key) {
							if ($listPasses->invoice_number == 'FSRP-00000') {
								return Html::a('Edit', 'javascript:void(0)', [
									'class' => 'btn btn-primary editDetail-btn',
									'data'  => [
										'id' => $listPasses->id,
									],
								]);
							} else {
								return Html::a('Edit', 'javascript:void(0)', [
									'class' => 'btn btn-primary editRemark-btn',
									'data'  => [
										'id' => $listPasses->id,
									],
								]);
							}
						},
						'delete' => function ($url, $listPasses, $key) {
							if ($listPasses->invoice_number == 'FSRP-00000') {
								return Html::a('Delete', ['delete-video-pass', 'id' => $listPasses->id], [
									'class' => 'btn btn-danger btn-confirm-del',
								]);
							} else {
								return Html::a('Delete', 'javascript:void(0)', [
									'class' => 'btn btn-secondary disabled',
								]);
							}
						},
					],
				]
			],
		]) ?>
	</div>
</div>

<div class="modal fade" id="newPassModal" tabindex="-1" role="dialog" aria-labelledby="newPassModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">New Pass</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php $form = ActiveForm::begin([
				'id' => 'newPass-form',
				'fieldConfig' => [
					'options' => [
						'class' => 'form-group',
					]
				],
			]); ?>
				<div class="modal-body">
					<fieldset>
						<div class="row">
							<div class="col-6">
								<?php echo $form->field($videoPass, 'product_code')->dropDownList(
									[
										'yydvi20a' => '2020 風水课程視頻 (14天)',
										'yydvi20b' => '2020 風水课程視頻 （無限）',
									],
									['class' => 'form-control form-control-sm']
								) ?>
							</div>
							<div class="col-6">
								<?php echo $form->field($videoPass, 'attendance')->dropDownList(
									[
										0 => 'None',
										1 => 'KL',
										2 => 'JB',
									],
									['class' => 'form-control form-control-sm']
								) ?>
							</div>
							<div class="col-12">
								<?php echo $form->field($videoPass, 'name')->textInput(
									['class' => 'form-control form-control-sm']
								) ?>
							</div>
							<div class="col-12">
								<?php echo $form->field($videoPass, 'email')->textInput(
									['class' => 'form-control form-control-sm']
								) ?>
							</div>
							<div class="col-12">
								<?php echo $form->field($videoPass, 'phone')->textInput(
									['class' => 'form-control form-control-sm']
								) ?>
							</div>
							<div class="col-12">
								<?php echo $form->field($videoPass, 'remark')->textarea([
									'class' => 'form-control form-control-sm',
									'rows' => '4'
								]) ?>
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

<div id="editPassRemarkModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Pass (Code: <span id="remark_pass_code"></span>)</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<?php $form = ActiveForm::begin([
				'id' => 'editPassRemark-form',
				'fieldConfig' => [
					'options' => [
						'class' => 'form-group',
					]
				],
			]); ?>
				<div class="modal-body">
					<fieldset>
						<?php echo Html::activeHiddenInput($videoPass, 'id'); ?>
						<div class="row">
							<div class="col-12">
								<?php echo $form->field($videoPass, 'attendance')->dropDownList(
									[
										0 => 'None',
										1 => 'KL',
										2 => 'JB',
									],
									['class' => 'form-control form-control-sm']
								) ?>
							</div>
							<div class="col-12">
								<?php echo $form->field($videoPass, 'remark')->textarea(['class' => 'form-control form-control-sm', 'rows' => '4']) ?>
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

<div id="editPassDetailModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Pass (Code: <span id="detail_pass_code"></span>)</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<?php $form = ActiveForm::begin([
				'id' => 'editPassDetail-form',
				'fieldConfig' => [
					'options' => [
						'class' => 'form-group',
					]
				],
			]); ?>
				<div class="modal-body">
					<fieldset>
						<?php echo Html::activeHiddenInput($videoPass, 'id'); ?>
						<div class="row">
							<div class="col-6">
								<?php echo $form->field($videoPass, 'product_code')->dropDownList(
									[
										'yydvi20a' => '2020 風水课程視頻 (14天)',
										'yydvi20b' => '2020 風水课程視頻 （無限）',
									],
									['class' => 'form-control form-control-sm']
								) ?>
							</div>
							<div class="col-6">
								<?php echo $form->field($videoPass, 'attendance')->dropDownList(
									[
										0 => 'None',
										1 => 'KL',
										2 => 'JB',
									],
									['class' => 'form-control form-control-sm']
								) ?>
							</div>
							<div class="col-12">
								<?php echo $form->field($videoPass, 'name')->textInput(
									['class' => 'form-control form-control-sm']
								) ?>
							</div>
							<div class="col-12">
								<?php echo $form->field($videoPass, 'email')->textInput(
									['class' => 'form-control form-control-sm']
								) ?>
							</div>
							<div class="col-12">
								<?php echo $form->field($videoPass, 'phone')->textInput(
									['class' => 'form-control form-control-sm']
								) ?>
							</div>
							<div class="col-12">
								<?php echo $form->field($videoPass, 'remark')->textarea(['class' => 'form-control form-control-sm', 'rows' => '4']) ?>
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


