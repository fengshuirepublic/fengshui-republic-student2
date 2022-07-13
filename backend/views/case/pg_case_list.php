<?php

use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\ButtonDropdown;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\grid\ActionColumn;

$this->title = 'Case List';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs('
	$("#backend").addClass("active");
', View::POS_END);

$this->registerJs('
	$(".view-btn").click(function () {
		var data = $(this).data();

		$.getJSON("'.Url::to(['case/detail']).'", {id:data.id}, function (result) {
			if(result.error == 1) {
				alert("Fail");
			} else {
				$("#service_no-p").html(result.cgs.service_code + result.cgs.service_number);
				$("#category-p").html(result.cgs.service.category.substr(0,1).toUpperCase()+result.cgs.service.category.substr(1));
				$("#service_type-p").html(result.cgs.service.type_en.substr(0,1).toUpperCase()+result.cgs.service.type_en.substr(1) + ", " + result.cgs.service.type_cn);
				$("#pic-p").html(result.cgs.staff.english_name);

				$("#create_staff-p").html(result.cgs.create.english_name);
				if (result.cgs.update) {
					$("#update_staff-p").html(result.cgs.update.english_name);
				} else {
					$("#update_staff-p").html("-");
				}

				$.each(result.cgs, function(key, value){
					if (value) {
						if (key == "type") {
							var typeStr = {1: "Personal", 2: "Company"};
							$("#"+ key +"-p").html(typeStr[value]);
						} else if (key == "price") {
							$("#"+ key +"-p").html(value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
						} else if (key == "payment_method") {
							var methodStr = {1: "Cash", 2: "Credit Card", 3: "FPX", 4: "UPayMe"};
							$("#"+ key +"-p").html(methodStr[value]);
						} else if (key == "is_clear") {
							var clearStr = {1: "Yes", 0: "No"};
							$("#"+ key +"-p").html(clearStr[value]);
						} else {
							$("#"+ key +"-p").html(value);
						}
					} else {
						$("#"+ key +"-p").html("-");
					}
				});
			}
		});

		$("#viewCaseModal").modal("show");
	});
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

<div class="container">
	<div class="row">
		<div class="col-12">
			<h4 style="margin-top: 3px; margin-bottom: 5px;">Case List</h4>
		</div>
	</div>
	<hr style="border-color: #404041; margin-top: 5px;">

	<div class="card card-body bg-light mb-3">
		<?php $form = ActiveForm::begin([
			'method'      => 'get',
			'action'      => Url::to(['case/list']),
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
			'dataProvider' => $listCases,
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
					'value' => function ($listCases) {
						$name_cn = $listCases->customer->name_cn ? ' ('.$listCases->customer->name_cn.')' : '';
						return $listCases->customer->name_en.$name_cn;
					},
				],
				'service_date',
				[
					'label' => 'Category',
					'attribute' => 'services.category',
					'value' => function ($listCases) {
						return ucfirst($listCases->service->category);
					}
				],
				[
					'label' => 'Service Type',
					'attribute' => 'services.type_en',
					'value' => function ($listCases) {
						return ucfirst($listCases->service->type_en);
					}
				],
				[
					'label' => 'PIC',
					'attribute' => 'bo_user_info.english_name',
					'value' => function ($listCases) {
						return $listCases->staff->english_name;
					}
				],
				[
					'attribute' => 'price',
					'value' => function ($listCases) {
						return number_format($listCases->price, 2);
					}
				],
				[
					'attribute' => 'deposit',
					'value' => function ($listCases) {
						if ($listCases->deposit) {
							return number_format($listCases->deposit, 2);
						} else {
							return '-';
						}
					}
				],
				[
					'attribute' => 'remain',
					'value' => function ($listCases) {
						if ($listCases->remain) {
							return number_format($listCases->remain, 2);
						} else {
							return '-';
						}
					}
				],
				[
					'label' => 'Clear',
					'attribute' => 'is_clear',
					'value' => function ($cases) {
						$clear = array(
							0 => 'No',
							1 => 'Yes',
						);
						return $clear[$cases->is_clear];
					}
				],
				[
					'class' => ActionColumn::className(),
					'header' => 'Action',
					'headerOptions' => ['class' => 'text-center'],
					'contentOptions' => ['class' => 'text-center', 'style' => 'white-space: nowrap;'],
					'template' => '{info} {view}',
					'buttons' => [
						'info' => function ($url, $listCases, $key) {
							return Html::a('Info', ['case/add', 'id' => $listCases->customer_id], [
								'class' => 'btn btn-primary',
							]);
						},

						'view' => function ($url, $listCases, $key) {
							return Html::a('View', 'javascript:void(0)', [
								'class' => 'btn btn-primary view-btn',
								'data-id' => $listCases->customer_service_id,
							]);
						},
					],
				]
			],
		]) ?>
	</div>
</div>

<div id="viewCaseModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Case Detail</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<fieldset>
					<div class="row">
						<div class="col-12 col-md-6">
							<div class="row">
								<p class="col-5 text-right">Service Number :</p>
								<p class="col-7" id="service_no-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Category :</p>
								<p class="col-7" id="category-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Service Type :</p>
								<p class="col-7" id="service_type-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Service Date :</p>
								<p class="col-7" id="service_date-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Price :</p>
								<p class="col-7" id="price-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">PIC :</p>
								<p class="col-7" id="pic-p"></p>
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="row">
								<p class="col-5 text-right">Payment Method :</p>
								<p class="col-7" id="payment_method-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Deposit :</p>
								<p class="col-7" id="deposit-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Clear :</p>
								<p class="col-7" id="is_clear-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Description :</p>
								<p class="col-7" id="description-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Remark :</p>
								<p class="col-7" id="remark-p"></p>
							</div>
						</div>
					</div>
					<hr style="border-color: #e9ecef;">
					<div class="row">
						<div class="col-12 col-md-6">
							<div class="row">
								<p class="col-5 text-right">Create At :</p>
								<p class="col-7" id="create_date-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Create By :</p>
								<p class="col-7" id="create_staff-p"></p>
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="row">
								<p class="col-5 text-right">Last Update at :</p>
								<p class="col-7" id="update_date-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Last Update by :</p>
								<p class="col-7" id="update_staff-p"></p>
							</div>
						</div>
					</div>
				</fieldset>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


