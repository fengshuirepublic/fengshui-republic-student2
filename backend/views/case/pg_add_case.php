<?php

use backend\assets\AppAsset;
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\ButtonDropdown;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\grid\ActionColumn;

$this->title = 'Add Case';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile("@web/js/ng-case-app.js", [
	'depends' => AppAsset::className(),
]);

$this->registerJs('
	angular.module("case-app", ["republic-case"])
	.value("customerId", "'.$customer->customer_id.'")
	.value("csrfToken", "'.Yii::$app->request->getCsrfToken().'")
	.value("baseUrl", "'.Yii::getAlias('@web').'")
', View::POS_END);

$this->registerJs('
	$(".datepicker").datepicker({
		format: "yyyy-mm-dd",
		todayHighlight: true,
	});
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

$this->registerJs('
	$("#editCaseModal").on("hidden.bs.modal", function () {
		$("#editCase-form").trigger("reset");
	});

	$(".edit-btn").click(function () {
		var data = $(this).data();

		$.getJSON("'.Url::to(['case/detail']).'", {id:data.id}, function (result) {
			if(result.error == 1) {
				alert("Fail");
			} else {
				console.log(result);
				$.each(result.cgs, function(key, value){
					if (value) {
						if (key == "service_date") {
							var $datepicker = $("#editCase-form .datepicker");
							$datepicker.datepicker();
							$datepicker.datepicker("setDate", value);
						} else if (key == "is_clear") {
							if (value == 1) {
								$("#editCase-form #customergroupservice-"+ key).prop("checked", true);
							}
						} else {
							$("#editCase-form #customergroupservice-"+ key).val(value);
						}
					}
				});
			}
		});

		$("#editCaseModal").modal("show");
	});
', View::POS_END);

$this->registerJs('
	$("#generateInvoiceModal").on("hidden.bs.modal", function () {
		$("#addInvoice-form").trigger("reset");
	});

	$(".invoice-btn").click(function () {
		var selection = $("input[name=\'selection[]\']:checked").length > 0;
		if(selection == false) {
			alert("Please select at least one case.");
		} else {
			$("#generateInvoiceModal").modal("show");
		}
	});
', View::POS_END);

$this->registerCss('
	[ng\-cloak] {
		display: none;
	}

	.invalid-feedback {
		display: block;
	}

	.card-header {
		cursor: pointer;
	}

	.accordion .card {
		border-bottom: 1px solid rgba(0, 0, 0, 0.125) !important;
		border-radius: 0.25rem !important;
	}
');

?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="<?= Url::to(['customer/list']) ?>">Customer List</a>
	</li>
	<li class="breadcrumb-item active">Add Case</li>
</ol>

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
	<div class="row mb-3">
		<div class="col-12">
			<div class="accordion" id="accordionInfo">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header bg-2nd" id="heading01" data-toggle="collapse" data-target="#collapse01" aria-expanded="true" aria-controls="collapse01">
								<span><b>Customer Info</b> (<?= $customer->name_en ?>, <?= $customer->contact_number_1 ?>)</span>
							</div>
							<div id="collapse01" class="collapse show" aria-labelledby="heading01" data-parent="#accordionInfo">
								<div class="card-body">
									<div class="row">
										<div class="col-12 col-md-6">
											<div class="row">
												<p class="col-sm-4 mb-0 text-sm-right">Customer Code :</p>
												<p class="col-sm-8 mb-3 mb-sm-0"><b><?= $customer->customer_code ?></b></p>
											</div>
											<div class="row">
												<p class="col-sm-4 mb-0 text-sm-right">Rate :</p>
												<p class="col-sm-8 mb-3 mb-sm-0"><b><?= $customer->rate ?>/5</b></p>
											</div>
											<div class="row">
												<p class="col-sm-4 mb-0 text-sm-right">Type :</p>
												<p class="col-sm-8 mb-3 mb-sm-0"><b><?= $type[$customer->type] ?></b></p>
											</div>
											<div class="row">
												<p class="col-sm-4 mb-0 text-sm-right">Gender :</p>
												<p class="col-sm-8 mb-3 mb-sm-0"><b><?= $customer->gender ? $gender[$customer->gender] : '-' ?></b></p>
											</div>
											<div class="row">
												<p class="col-sm-4 mb-0 text-sm-right">Name (en) :</p>
												<p class="col-sm-8 mb-3 mb-sm-0"><b><?= $customer->name_en ?></b></p>
											</div>
											<div class="row">
												<p class="col-sm-4 mb-0 text-sm-right">Name (cn) :</p>
												<p class="col-sm-8 mb-3 mb-sm-0"><b><?= $customer->name_cn ? : '-' ?></b></p>
											</div>
											<div class="row">
												<p class="col-sm-4 mb-0 text-sm-right">1st Email :</p>
												<p class="col-sm-8 mb-3 mb-sm-0"><b><?= $customer->email_1 ? : '-' ?></b></p>
											</div>
											<div class="row">
												<p class="col-sm-4 mb-0 text-sm-right">2nd Email :</p>
												<p class="col-sm-8 mb-3 mb-sm-0"><b><?= $customer->email_2 ? : '-' ?></b></p>
											</div>
											<div class="row">
												<p class="col-sm-4 mb-0 text-sm-right">1st Contact :</p>
												<p class="col-sm-8 mb-3 mb-sm-0"><b><?= $customer->contact_number_1 ? : '-' ?></b></p>
											</div>
											<div class="row">
												<p class="col-sm-4 mb-0 text-sm-right">2nd Contact :</p>
												<p class="col-sm-8 mb-3 mb-sm-0"><b><?= $customer->contact_number_2 ? : '-' ?></b></p>
											</div>
											<div class="row">
												<p class="col-sm-4 mb-0 text-sm-right">Remark :</p>
												<p class="col-sm-8 mb-3 mb-sm-0"><b><?= $customer->remark ? : '-' ?></b></p>
											</div>
										</div>
										<div class="col-12 col-md-6">
											<div class="row">
												<p class="col-sm-4 mb-0 text-sm-right">Student :</p>
												<p class="col-sm-8 mb-3 mb-sm-0"><b><?= $customer->is_student ? $student[$customer->is_student] : '-' ?></b></p>
											</div>
											<div class="row">
												<p class="col-sm-4 mb-0 text-sm-right">Address 1 :</p>
												<p class="col-sm-8 mb-3 mb-sm-0"><b><?= $customer->address_1 ? : '-' ?></b></p>
											</div>
											<div class="row">
												<p class="col-sm-4 mb-0 text-sm-right">Address 2 :</p>
												<p class="col-sm-8 mb-3 mb-sm-0"><b><?= $customer->address_2 ? : '-' ?></b></p>
											</div>
											<div class="row">
												<p class="col-sm-4 mb-0 text-sm-right">Address 3 :</p>
												<p class="col-sm-8 mb-3 mb-sm-0"><b><?= $customer->address_3 ? : '-' ?></b></p>
											</div>
											<div class="row">
												<p class="col-sm-4 mb-0 text-sm-right">Postcode :</p>
												<p class="col-sm-8 mb-3 mb-sm-0"><b><?= $customer->postcode ? : '-' ?></b></p>
											</div>
											<div class="row">
												<p class="col-sm-4 mb-0 text-sm-right">City :</p>
												<p class="col-sm-8 mb-3 mb-sm-0"><b><?= $customer->city ? : '-' ?></b></p>
											</div>
											<div class="row">
												<p class="col-sm-4 mb-0 text-sm-right">State :</p>
												<p class="col-sm-8 mb-3 mb-sm-0"><b><?= $customer->state ? : '-' ?></b></p>
											</div>
											<div class="row">
												<p class="col-sm-4 mb-0 text-sm-right">Country :</p>
												<p class="col-sm-8 mb-3 mb-sm-0"><b><?= $customer->country ? : '-' ?></b></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $form = ActiveForm::begin([
	'id' => 'addInvoice-form',
	'fieldConfig' => [
		'options' => [
			'class' => 'form-group',
		]
	],
]); ?>

<div class="container">
	<div class="row mb-3">
		<div class="col-12">
			<div class="accordion" id="accordionCase">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header bg-2nd" id="heading02" data-toggle="collapse" data-target="#collapse02" aria-expanded="true" aria-controls="collapse02">
								<span><b>Case List</b></span>
							</div>
							<div id="collapse02" class="collapse show" aria-labelledby="heading01" data-parent="#accordionCase">
								<div class="card-body">
									<div class="row">
										<div class="col-12 mb-3">
											<button type="button" class="btn btn-secondary btn-sm invoice-btn">Create Invoice</button>
										</div>
									</div>
									<div style="overflow: scroll;">
										<?= GridView::widget([
											'dataProvider' => $cases,
											'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
											'tableOptions' => [
												'class' => 'table table-sm table-bordered table-hover',
												'style' => 'background-color: #FFF;',
											],
											// 'summary' => '',
											'columns' => [
												['class' => SerialColumn::className()],
												[
													'class' => 'yii\grid\CheckboxColumn',
												],
												[
													'label' => 'Service Date',
													'value' => function ($cases) {
														return $cases->service_date;
													}
												],
												[
													'label' => 'Category',
													'value' => function ($cases) {
														return ucfirst($cases->service->category);
													}
												],
												[
													'label' => 'Service Type',
													'attribute' => 'services.type_en',
													'value' => function ($cases) {
														return ucfirst($cases->service->type_en);
													}
												],
												[
													'label' => 'PIC',
													'value' => function ($cases) {
														return $cases->staff->english_name;
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
													'template' => '{action_list}',
													'buttons' => [
														'action_list' => function ($url, $cases, $key) {
															$items = array();

															// $items[] = array(
															// 	'label' => 'Add Case',
															// 	'url' => Url::to(['add-case', 'id' => $cases->customer_service_id]),
															// 	'linkOptions' => ['data-id' => $cases->customer_service_id],
															// );

															$items[] = array(
																'label' => 'View',
																'url' => 'javascript:void(0)',
																'linkOptions' => ['class' => 'view-btn', 'data-id' => $cases->customer_service_id],
															);

															$items[] = array(
																'label' => 'Edit',
																'url' => 'javascript:void(0)',
																'linkOptions' => ['class' => 'edit-btn', 'data-id' => $cases->customer_service_id],
															);

															$items[] = array(
																'label' => 'Delete',
																'url' => Url::to(['delete', 'id' => $cases->customer_service_id]),
																'linkOptions' => ['class' => 'btn-confirm-del'],
															);

															return ButtonDropdown::widget([
																'label' => 'Select Action',
																'tagName' => 'span',
																'buttonOptions' => [
																	'class' => 'text-light'
																],
																'options' => [
																	'class' => 'btn-primary'
																],
																'dropdown' => [
																	'options' => [
																		// 'class' => ['dropdown-menu-right'],
																	],
																	'items' => $items,
																],
															]);
														}
													],
												]
											],
										]) ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="generateInvoiceModal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Create Invoice</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<fieldset>
					<?php echo Html::activeHiddenInput($invoice, 'customer_id'); ?>
					<div class="row">
						<div class="col-12 col-md-3">
							<?php echo $form->field($invoice, 'invoice_date')->textInput([
								'class'        => 'form-control form-control-sm datepicker',
								'placeholder'  => 'yyyy-mm-dd',
								'autocomplete' => 'off',
							]) ?>
						</div>
						<div class="col-12 col-md-3">
							<?php echo $form->field($invoice, 'discount')->textInput([
								'class' =>'form-control form-control-sm',
								'type'  => 'number',
							]) ?>
						</div>
						<div class="col-12 col-md-3">
							<?php echo $form->field($invoice, 'attention')->textInput([
								'class' =>'form-control form-control-sm',
							]) ?>
						</div>
						<div class="col-12 col-md-3">
							<?php echo $form->field($invoice, 'item_per_page')->textInput([
								'class' => 'form-control form-control-sm',
								'type'  => 'number',
								'min'   => '1',
								'step'  => '1',
							]) ?>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<?php echo $form->field($invoice, 'remark')->textarea([
								'class' => 'form-control form-control-sm',
								'rows'  => '2'
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
		</div>
	</div>
</div>

<?php ActiveForm::end() ?>

<div ng-app="case-app" ng-controller="MainCtrl" ng-cloak>
	<div class="container" ng-form="form">
		<div class="bg-light p-3 mb-3">
			<!-- <div class="row">
				<div class="col-12">
					<pre>{{ model | json }}</pre>
				</div>
			</div> -->
			<div class="row">
				<div class="col-auto">
					<h5>New Item</h5>
				</div>
				<div class="col-auto px-0">
					<button type="button" class="btn btn-sm btn-secondary px-3 py-0" ng-click="duplicateItem()">Add</button>
				</div>
			</div>
			<div class="card bg-1st mb-3" ng-repeat="item in caseItems track by $index" ng-controller="CaseItemCtrl" ng-init="init(item)">
				<div class="card-body pb-1">
					<div class="row">
						<div class="col-12">
							<label class="control-label"><h6 class="mb-0"><u>No. {{ $index + 1 }}</u></h6></label>
							<button type="button" class="btn btn-danger btn-sm py-0 float-right" ng-show="$index > 0" ng-click="deleteItem(item)">Delete</button>
						</div>
					</div>
					<div class="row">
						<div class="col-12 col-md-3">
							<div class="form-group required">
								<label>Service Type {{ $index + 1 }}</label>
								<select required class="form-control form-control-sm" name="Item[{{$index}}][service_id]" ng-model="item.service_id"
									ng-class="{
										'is-invalid' : (form.$submitted || form['Item[' + $index + '][service_id]'].$touched) && form['Item[' + $index + '][service_id]'].$invalid,
										'is-valid' : (form.$submitted || form['Item[' + $index + '][service_id]'].$touched) && form['Item[' + $index + '][service_id]'].$valid
									}">
									<option value="">Please Select</option>
									<?php foreach ($listService as $category => $service): ?>
										<optgroup label="<?= ucfirst($category) ?>">
											<?php foreach ($service as $key => $value): ?>
												<option value="<?= $value['service_id'] ?>"><?= ucfirst($value['type_en']) ?></option>
											<?php endforeach ?>
										</optgroup>
									<?php endforeach ?>
								</select>
								<div ng-show="(form.$submitted || form['Item[' + $index + '][service_id]'].$touched) && form['Item[' + $index + '][service_id]'].$invalid">
									<div class="invalid-feedback">Service Type {{ $index + 1 }} cannot be blank.</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-3">
							<div class="form-group required">
								<label>Price {{ $index + 1 }}</label>
								<input type="number" class="form-control form-control-sm" name="Item[{{$index}}][price]" ng-model="item.price"
									ng-class="{
										'is-invalid' : (form.$submitted || form['Item[' + $index + '][price]'].$touched) && form['Item[' + $index + '][price]'].$invalid,
										'is-valid' : (form.$submitted || form['Item[' + $index + '][price]'].$touched) && form['Item[' + $index + '][price]'].$valid
									}" required>
								<div ng-show="(form.$submitted || form['Item[' + $index + '][price]'].$touched) && form['Item[' + $index + '][price]'].$invalid">
									<div class="invalid-feedback">Price {{ $index + 1 }} cannot be blank.</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-3">
							<div class="form-group required">
								<label>Service Date {{ $index + 1 }}</label>
								<input type="text" class="form-control form-control-sm datepicker" name="Item[{{$index}}][service_date]" ng-model="item.service_date" placeholder="yyyy-mm-dd" autocomplete="off"
									ng-class="{
										'is-invalid' : (form.$submitted || form['Item[' + $index + '][service_date]'].$touched) && form['Item[' + $index + '][service_date]'].$invalid,
										'is-valid' : (form.$submitted || form['Item[' + $index + '][service_date]'].$touched) && form['Item[' + $index + '][service_date]'].$valid
									}" rp-date required >
								<div ng-show="(form.$submitted || form['Item[' + $index + '][service_date]'].$touched) && form['Item[' + $index + '][service_date]'].$invalid">
									<div class="invalid-feedback">Service Date {{ $index + 1 }} cannot be blank.</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-3">
							<div class="form-group required">
								<label>PIC {{ $index + 1 }}</label>
								<select required class="form-control form-control-sm" name="Item[{{$index}}][staff_id]" ng-model="item.staff_id"
									ng-class="{
										'is-invalid' : (form.$submitted || form['Item[' + $index + '][staff_id]'].$touched) && form['Item[' + $index + '][staff_id]'].$invalid,
										'is-valid' : (form.$submitted || form['Item[' + $index + '][staff_id]'].$touched) && form['Item[' + $index + '][staff_id]'].$valid
									}">
									<option value="">Please Select</option>
									<?php foreach ($listStaff as $key => $value): ?>
										<option value="<?= $key ?>"><?= $value ?></option>
									<?php endforeach ?>
								</select>
								<div ng-show="(form.$submitted || form['Item[' + $index + '][staff_id]'].$touched) && form['Item[' + $index + '][staff_id]'].$invalid">
									<div class="invalid-feedback">PIC {{ $index + 1 }} cannot be blank.</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 col-md-3">
							<div class="form-group required">
								<label>Payment Method {{ $index + 1 }}</label>
								<select required class="form-control form-control-sm" name="Item[{{$index}}][payment_method]" ng-model="item.payment_method"
									ng-class="{
										'is-invalid' : (form.$submitted || form['Item[' + $index + '][payment_method]'].$touched) && form['Item[' + $index + '][payment_method]'].$invalid,
										'is-valid' : (form.$submitted || form['Item[' + $index + '][payment_method]'].$touched) && form['Item[' + $index + '][payment_method]'].$valid
									}">
									<option value="">Please Select</option>
									<option value="1">Cash</option>
									<option value="2">Credit Card</option>
									<option value="3">FPX</option>
									<option value="4">UPayMe</option>
								</select>
								<div ng-show="(form.$submitted || form['Item[' + $index + '][payment_method]'].$touched) && form['Item[' + $index + '][payment_method]'].$invalid">
									<div class="invalid-feedback">Payment Method {{ $index + 1 }} cannot be blank.</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-3">
							<div class="form-group">
								<label>Deposit {{ $index + 1 }}</label>
								<input type="number" class="form-control form-control-sm" name="Item[{{$index}}][deposit]" ng-model="item.deposit"
									ng-class="{
										'is-invalid' : (form.$submitted || form['Item[' + $index + '][deposit]'].$touched) && form['Item[' + $index + '][deposit]'].$invalid,
										'is-valid' : (form.$submitted || form['Item[' + $index + '][deposit]'].$touched) && form['Item[' + $index + '][deposit]'].$valid
									}">
							</div>
						</div>
						<div class="col-12 col-md-3">
							<div class="form-group">
								<label>Payment Clear {{ $index + 1 }}</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<div class="input-group-text">
											<input name="Item[{{$index}}][is_clear]" ng-model="item.is_clear" type="checkbox">
										</div>
									</div>
									<input type="text" class="form-control form-control-sm" value="Yes" readonly="">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 col-md-8">
							<div class="form-group">
								<label>Description {{ $index + 1 }}</label>
								<textarea class="form-control form-control-sm" rows="6" name="Item[{{$index}}][description]" ng-model="item.description"
									ng-class="{
										'is-invalid' : (form.$submitted || form['Item[' + $index + '][description]'].$touched) && form['Item[' + $index + '][description]'].$invalid,
										'is-valid' : (form.$submitted || form['Item[' + $index + '][description]'].$touched) && form['Item[' + $index + '][description]'].$valid
									}"></textarea>
							</div>
						</div>
						<div class="col-12 col-md-4">
							<div class="form-group">
								<label>Remark {{ $index + 1 }}</label>
								<textarea class="form-control form-control-sm" rows="6" name="Item[{{$index}}][remark]" ng-model="item.remark"
									ng-class="{
										'is-invalid' : (form.$submitted || form['Item[' + $index + '][remark]'].$touched) && form['Item[' + $index + '][remark]'].$invalid,
										'is-valid' : (form.$submitted || form['Item[' + $index + '][remark]'].$touched) && form['Item[' + $index + '][remark]'].$valid
									}"></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-auto">
					<button type="button" class="btn btn-primary" ng-click="submitForm(form)">Save</button>
				</div>
			</div>
		</div>
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

<div id="editCaseModal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Case</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<?php $form = ActiveForm::begin([
				'id' => 'editCase-form',
				'fieldConfig' => [
					'options' => [
						'class' => 'form-group',
					]
				],
			]); ?>
				<div class="modal-body">
					<fieldset>
						<?php echo Html::activeHiddenInput($caseForm, 'customer_service_id'); ?>
						<div class="row">
							<div class="col-12 col-md-3">
								<?php echo $form->field($caseForm, 'service_id')->dropDownList(
									$listService_arr,
									[
										'prompt' => 'Please Select',
										'class'  => 'form-control form-control-sm'
									]
								)->label('Service Type') ?>
							</div>
							<div class="col-12 col-md-3">
								<?php echo $form->field($caseForm, 'price')->textInput([
									'class' =>'form-control form-control-sm',
									'type'  => 'number',
								]) ?>
							</div>
							<div class="col-12 col-md-3">
								<?php echo $form->field($caseForm, 'service_date')->textInput([
									'class'        => 'form-control form-control-sm datepicker',
									'placeholder'  => 'yyyy-mm-dd',
									'autocomplete' => 'off',
								]) ?>
							</div>
							<div class="col-12 col-md-3">
								<?php echo $form->field($caseForm, 'staff_id')->dropDownList(
									$listStaff,
									[
										'prompt' => 'Please Select',
										'class'  => 'form-control form-control-sm'
									]
								)->label('PIC') ?>
							</div>
						</div>
						<div class="row">
							<div class="col-12 col-md-3">
								<?php echo $form->field($caseForm, 'payment_method')->dropDownList(
									$listService_arr,
									[
										'prompt' => 'Please Select',
										'class'  => 'form-control form-control-sm'
									]
								) ?>
							</div>
							<div class="col-12 col-md-3">
								<?php echo $form->field($caseForm, 'deposit')->textInput([
									'class' =>'form-control form-control-sm',
									'type'  => 'number',
								]) ?>
							</div>
							<div class="col-12 col-md-3">
								<div class="form-group">
									<label>Payment Clear</label>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<input id="customergroupservice-is_clear" name="CustomerGroupService[is_clear]" type="checkbox" value="1">
											</div>
										</div>
										<input type="text" class="form-control form-control-sm" value="Yes" readonly="">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12 col-md-8">
								<?php echo $form->field($caseForm, 'description')->textarea([
									'class' => 'form-control form-control-sm',
									'rows'  => '6'
								]) ?>
							</div>
							<div class="col-12 col-md-4">
								<?php echo $form->field($caseForm, 'remark')->textarea([
									'class' => 'form-control form-control-sm',
									'rows'  => '6'
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


