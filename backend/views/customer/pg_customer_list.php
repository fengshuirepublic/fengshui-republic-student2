<?php

use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\ButtonDropdown;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\grid\ActionColumn;

$this->title = 'Customer List';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs('
	$("#backend").addClass("active");

	$(".view-btn").click(function () {
		var data = $(this).data();

		$.getJSON("'.Url::to(['customer/detail']).'", {id:data.id}, function (result) {
			if(result.error == 1) {
				alert("Fail");
			} else {
				$("#create_staff-p").html(result.customer.create.english_name);
				if (result.customer.update) {
					$("#update_staff-p").html(result.customer.update.english_name);
				} else {
					$("#update_staff-p").html("-");
				}

				$.each(result.customer, function(key, value){
					if (value) {
						if (key == "type") {
							var typeStr = {1: "Personal", 2: "Company"};
							$("#"+ key +"-p").html(typeStr[value]);
						} else if (key == "gender") {
							var genderStr = {1: "Male", 2: "Female"};
							$("#"+ key +"-p").html(genderStr[value]);
						} else if (key == "is_student") {
							var studentStr = {1: "Yes", 2: "No"};
							$("#"+ key +"-p").html(studentStr[value]);
						} else {
							$("#"+ key +"-p").html(value);
						}
					} else {
						$("#"+ key +"-p").html("-");
					}
				});
			}
		});

		$("#viewCustomerModal").modal("show");
	});

	$("#editCustomerModal").on("hidden.bs.modal", function () {
		$("#editCustomer-form").trigger("reset");
	});

	$(".edit-btn").click(function () {
		var data = $(this).data();

		$.getJSON("'.Url::to(['customer/detail']).'", {id:data.id}, function (result) {
			if(result.error == 1) {
				alert("Fail");
			} else {
				$.each(result.customer, function(key, value){
					if (value) {
						$("#editCustomerModal #customer-"+ key).val(value);
					}
				});
			}
		});

		$("#editCustomerModal").modal("show");
	});

	$("#addCustomerModal").on("hidden.bs.modal", function () {
		$("#addCustomer-form").trigger("reset");
	})
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
			<h4 style="margin-top: 3px; margin-bottom: 5px;">Customer List</h4>
		</div>
	</div>
	<hr style="border-color: #404041; margin-top: 5px;">
	<div class="row">
		<div class="col-12 mb-3">
			<button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#addCustomerModal">Add Customer</button>
		</div>
	</div>

	<div class="card card-body bg-light mb-3">
		<?php $form = ActiveForm::begin([
			'method'      => 'get',
			'action'      => Url::to(['customer/list']),
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
					<?php echo $form->field($model, 'name_cn')
						->textInput(['class'=>'form-control form-control-sm', 'placeholder'=>'Chinese Name'])
					?>
				</div>
				<div class="col-12 col-md-3">
					<?php echo $form->field($model, 'email_1')
						->textInput(['class'=>'form-control form-control-sm', 'placeholder'=>'Email'])
					?>
				</div>
				<div class="col-12 col-md-3">
					<?php echo $form->field($model, 'contact_number_1')
						->textInput(['class'=>'form-control form-control-sm', 'placeholder'=>'Contact'])
					?>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<button type="submit" class="btn btn-secondary btn-sm">Search</button>
				</div>
			</div>
		<?php ActiveForm::end() ?>
	</div>

	<div style="overflow: scroll; padding-bottom: 200px;">
		<?= GridView::widget([
			'dataProvider' => $customers,
			'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
			'tableOptions' => [
				'class' => 'table table-sm table-bordered table-hover',
				'style' => 'background-color: #FFF;',
			],
			// 'summary' => '',
			'columns' => [
				['class' => SerialColumn::className()],
				[
					'attribute' => 'name_en',
					'value' => function ($customers) {
						return $customers->name_en;
					}
				],
				'name_cn',
				'email_1',
				'contact_number_1',
				[
					'class' => ActionColumn::className(),
					'header' => 'Action',
					'headerOptions' => ['class' => 'text-center'],
					'contentOptions' => ['class' => 'text-center', 'style' => 'white-space: nowrap;'],
					'template' => '{action_list}',
					'buttons' => [
						'action_list' => function ($url, $customers, $key) {
							$items = array();

							$items[] = array(
								'label' => 'Add Case',
								'url' => Url::to(['case/add', 'id' => $customers->customer_id]),
								'linkOptions' => ['data-id' => $customers->customer_id],
							);

							$items[] = array(
								'label' => 'View',
								'url' => 'javascript:void(0)',
								'linkOptions' => ['class' => 'view-btn', 'data-id' => $customers->customer_id],
							);

							$items[] = array(
								'label' => 'Edit',
								'url' => 'javascript:void(0)',
								'linkOptions' => ['class' => 'edit-btn', 'data-id' => $customers->customer_id],
							);

							$items[] = array(
								'label' => 'Delete',
								'url' => Url::to(['delete', 'id' => $customers->customer_id]),
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

<div id="viewCustomerModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Customer Detail</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<fieldset>
					<div class="row">
						<div class="col-12 col-md-6">
							<div class="row">
								<p class="col-5 text-right">Customer Code :</p>
								<p class="col-7" id="customer_code-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Type :</p>
								<p class="col-7" id="type-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Gender :</p>
								<p class="col-7" id="gender-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Name (en) :</p>
								<p class="col-7" id="name_en-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Name (cn) :</p>
								<p class="col-7" id="name_cn-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">IC :</p>
								<p class="col-7" id="ic-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">1st Email :</p>
								<p class="col-7" id="email_1-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">2nd Email :</p>
								<p class="col-7" id="email_2-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">1st Contact :</p>
								<p class="col-7" id="contact_number_1-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">2nd Contact :</p>
								<p class="col-7" id="contact_number_2-p"></p>
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="row">
								<p class="col-5 text-right">Rate :</p>
								<p class="col-7">
									<span id="rate-p"></span>/5
								</p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Remark :</p>
								<p class="col-7" id="remark-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Student :</p>
								<p class="col-7" id="is_student-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Address 1 :</p>
								<p class="col-7" id="address_1-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Address 2 :</p>
								<p class="col-7" id="address_2-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Address 3 :</p>
								<p class="col-7" id="address_3-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Postcode :</p>
								<p class="col-7" id="postcode-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">City :</p>
								<p class="col-7" id="city-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">State :</p>
								<p class="col-7" id="state-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Country :</p>
								<p class="col-7" id="country-p"></p>
							</div>
						</div>
					</div>
					<hr style="border-color: #e9ecef;">
					<div class="row">
						<div class="col-12 col-md-6">
							<div class="row">
								<p class="col-5 text-right">Create at :</p>
								<p class="col-7" id="create_date-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Create by :</p>
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

<div id="editCustomerModal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Customer</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<?php $form = ActiveForm::begin([
				'id' => 'editCustomer-form',
				'fieldConfig' => [
					'options' => [
						'class' => 'form-group',
					]
				],
			]); ?>
				<div class="modal-body">
					<fieldset>
						<?php echo Html::activeHiddenInput($customerForm, 'customer_id'); ?>
						<div class="row">
							<div class="col-12 col-md-3">
								<div class="row">
									<div class="col-12">
										<?php echo $form->field($customerForm, 'type')->dropDownList(
											[
												'1' => 'Personal',
												'2' => 'Company',
											],
											['class' => 'form-control form-control-sm']
										) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'gender')->dropDownList(
											[
												'1' => 'Male',
												'2' => 'Female',
											],
											[
												'prompt' => 'Please Select',
												'class' => 'form-control form-control-sm'
											]
										) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'name_en')->textInput(['class' => 'form-control form-control-sm']) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'email_1')->textInput(['class' => 'form-control form-control-sm']) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'contact_number_1')->textInput(['class' => 'form-control form-control-sm']) ?>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-3">
								<div class="row">
									<div class="col-12">
										<?php echo $form->field($customerForm, 'rate')->dropDownList(
											[
												'1' => '1',
												'2' => '2',
												'3' => '3',
												'4' => '4',
												'5' => '5',
											],
											['class' => 'form-control form-control-sm']
										) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'ic')->textInput(['class' => 'form-control form-control-sm']) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'name_cn')->textInput(['class' => 'form-control form-control-sm']) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'email_2')->textInput(['class' => 'form-control form-control-sm']) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'contact_number_2')->textInput(['class' => 'form-control form-control-sm']) ?>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-3">
								<div class="row">
									<div class="col-12">
										<?php echo $form->field($customerForm, 'is_student')->dropDownList(
											[
												'1' => 'Yes',
												'2' => 'No',
											],
											[
												'prompt' => 'Please Select',
												'class' => 'form-control form-control-sm'
											]
										) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'address_1')->textInput(['class' => 'form-control form-control-sm']) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'address_2')->textInput(['class' => 'form-control form-control-sm']) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'address_3')->textInput(['class' => 'form-control form-control-sm']) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'postcode')->textInput(['class' => 'form-control form-control-sm']) ?>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-3">
								<div class="row">
									<div class="col-12">
										<?php echo $form->field($customerForm, 'city')->textInput(['class' => 'form-control form-control-sm']) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'state')->textInput(['class' => 'form-control form-control-sm']) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'country')->dropDownList(
											$countryList,
											[
												'prompt' => 'Please Select',
												'class' => 'form-control form-control-sm'
											]
										) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'remark')->textInput(['class' => 'form-control form-control-sm']) ?>
									</div>
								</div>
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

<div id="addCustomerModal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Customer</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<?php $form = ActiveForm::begin([
				'id' => 'addCustomer-form',
				'enableAjaxValidation' => true,
				'fieldConfig' => [
					'options' => [
						'class' => 'form-group',
					]
				],
			]); ?>
				<div class="modal-body">
					<fieldset>
						<div class="row">
							<div class="col-12 col-md-3">
								<div class="row">
									<div class="col-12">
										<?php echo $form->field($customerForm, 'type')->dropDownList(
											[
												'1' => 'Personal',
												'2' => 'Company',
											],
											['class' => 'form-control form-control-sm']
										) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'gender')->dropDownList(
											[
												'1' => 'Male',
												'2' => 'Female',
											],
											[
												'prompt' => 'Please Select',
												'class' => 'form-control form-control-sm'
											]
										) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'name_en')->textInput(['class' => 'form-control form-control-sm']) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'email_1')->textInput(['class' => 'form-control form-control-sm']) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'contact_number_1')->textInput(['class' => 'form-control form-control-sm']) ?>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-3">
								<div class="row">
									<div class="col-12">
										<?php echo $form->field($customerForm, 'rate')->dropDownList(
											[
												'1' => '1',
												'2' => '2',
												'3' => '3',
												'4' => '4',
												'5' => '5',
											],
											['class' => 'form-control form-control-sm']
										) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'ic')->textInput(['class' => 'form-control form-control-sm']) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'name_cn')->textInput(['class' => 'form-control form-control-sm']) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'email_2')->textInput(['class' => 'form-control form-control-sm']) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'contact_number_2')->textInput(['class' => 'form-control form-control-sm']) ?>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-3">
								<div class="row">
									<div class="col-12">
										<?php echo $form->field($customerForm, 'is_student')->dropDownList(
											[
												'1' => 'Yes',
												'2' => 'No',
											],
											[
												'prompt' => 'Please Select',
												'class' => 'form-control form-control-sm'
											]
										) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'address_1')->textInput(['class' => 'form-control form-control-sm']) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'address_2')->textInput(['class' => 'form-control form-control-sm']) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'address_3')->textInput(['class' => 'form-control form-control-sm']) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'postcode')->textInput(['class' => 'form-control form-control-sm']) ?>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-3">
								<div class="row">
									<div class="col-12">
										<?php echo $form->field($customerForm, 'city')->textInput(['class' => 'form-control form-control-sm']) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'state')->textInput(['class' => 'form-control form-control-sm']) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'country')->dropDownList(
											$countryList,
											[
												'prompt' => 'Please Select',
												'class' => 'form-control form-control-sm'
											]
										) ?>
									</div>
									<div class="col-12">
										<?php echo $form->field($customerForm, 'remark')->textInput(['class' => 'form-control form-control-sm']) ?>
									</div>
								</div>
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


