<?php

use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\ButtonDropdown;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\grid\ActionColumn;

$this->title = 'Staff List';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs('
	$("#backend").addClass("active");

	$(".datepicker").datepicker({
		format: "yyyy-mm-dd",
		todayHighlight: true,
	});

	$("#addStaffModal").on("hidden.bs.modal", function () {
		$("#addStaff-form").trigger("reset");
	})

	$("#resetPassModal").on("hidden.bs.modal", function () {
		$("#resetPass-form").trigger("reset");
	})

	$("#editStaffModal").on("hidden.bs.modal", function () {
		$("#editStaff-form").trigger("reset");
	})

	$(".view-btn").click(function () {
		var data = $(this).data();

		$.getJSON("'.Url::to(['staff/detail']).'", {id:data.id}, function (result) {
			if(result.error == 1) {
				alert("Fail");
			} else {
				$.each(result.user, function(key, value){
					if (value) {
						if (key == "status") {
							var statusStr = {1: "Active", 2: "Resign"};
							$("#"+ key +"-p").html(statusStr[value]);
						} else if (key == "role_name") {
							var roleStr = {"level_3": "Admin", "level_6": "Normal"};
							$("#"+ key +"-p").html(roleStr[value]);
						} else {
							$("#"+ key +"-p").html(value);
						}
					} else {
						$("#"+ key +"-p").html("-");
					}
				});

				$.each(result.user.info, function(key, value){
					if (value) {
						$("#"+ key +"-p").html(value);
					} else {
						$("#"+ key +"-p").html("-");
					}
				});
			}
		});

		$("#viewStaffModal").modal("show");
	})

	$(".edit-btn").click(function () {
		var data = $(this).data();

		$.getJSON("'.Url::to(['staff/detail']).'", {id:data.id}, function (result) {
			if(result.error == 1) {
				alert("Fail");
			} else {
				$.each(result.user, function(key, value){
					if (value) {
						$("#editStaffModal #formstaffinfo-"+ key).val(value);
					}
				});

				$.each(result.user.info, function(key, value){
					if (value) {
						$("#editStaffModal #formstaffinfo-"+ key).val(value);
					}
				});
			}
		});

		$("#editStaffModal").modal("show");
	})

	$(".reset-btn").click(function () {
		var data = $(this).data();
		$("#bouser-user_id").val(data.id);
		$("#bouser-username").val(data.username);
		$("#resetPassModal").modal("show");
	})
', View::POS_END);

$this->registerCss('
');

// if (Yii::$app->user->can("level_2")) {
// 	$role_name = array(
// 		'Supervisor' => 'Supervisor',
// 		'Staff'      => 'Staff',
// 	);
// } else {
// 	$role_name = array(
// 		'Staff' => 'Staff',
// 	);
// }

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
			<h4 style="margin-top: 3px; margin-bottom: 5px;">Staff List</h4>
		</div>
	</div>
	<hr style="border-color: #404041; margin-top: 5px;">
	<div class="row">
		<div class="col-12 mb-3">
			<button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#addStaffModal">Add Staff</button>
		</div>
	</div>

	<div style="overflow: scroll; padding-bottom: 200px;">
		<?= GridView::widget([
			'dataProvider' => $users,
			'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
			'tableOptions' => [
				'class' => 'table table-sm table-bordered table-hover',
				'style' => 'background-color: #FFF;',
			],
			// 'summary' => '',
			'columns' => [
				['class' => SerialColumn::className()],
				'username',
				[
					'attribute' => 'status',
					'value' => function ($users) {
						$status = array(
							1 => 'Active',
							2 => 'Resign',
						);
						return $status[$users->status];
					},
				],
				[
					'attribute' => 'info.last_login',
					'value' => function($users) {
						return !empty($users->info->last_login) ? $users->info->last_login : '-';
					}
				],
				[
					'attribute' => 'info.position',
					'value' => function($users) {
						return !empty($users->info->position) ? $users->info->position : '-';
					}
				],
				[
					'label' => 'Name',
					'format' => 'raw',
					'value' => function ($users) {
						$name1 = $users->info->chinese_name;
						$name2 = $users->info->english_name;
						return "<p class='mb-0'>{$name1}<br>{$name2}</p>";
					},
				],
				// 'role_name',
				[
					'label' => 'Role',
					'attribute' => 'role_name',
					'value' => function($users) {
						$role = array(
							'level_1' => 'Admin',
							'level_2' => 'Admin',
							'level_3' => 'Admin',
							'level_4' => 'Normal',
							'level_5' => 'Normal',
							'level_6' => 'Normal',
						);
						return $role[$users->role_name];
					}
				],
				[
					'label' => 'Date',
					'format' => 'raw',
					'value' => function ($users) {
						$join = $users->info->join_date;
						$resign = $users->info->resign_date;
						return "<p class='mb-0'>Join: {$join}<br>Resign: {$resign}</p>";
					},
				],
				[
					'class' => ActionColumn::className(),
					'header' => 'Action',
					'headerOptions' => ['class' => 'text-center'],
					'contentOptions' => ['class' => 'text-center', 'style' => 'white-space: nowrap;'],
					'template' => '{action_list}',
					'buttons' => [
						'action_list' => function ($url, $users, $key) {
							$items = array();

							$items[] = array(
								'label' => 'View',
								'url' => 'javascript:void(0)',
								'linkOptions' => ['class' => 'view-btn', 'data-id' => $users->user_id],
							);

							$items[] = array(
								'label' => 'Edit',
								'url' => 'javascript:void(0)',
								'linkOptions' => ['class' => 'edit-btn', 'data-id' => $users->user_id],
							);

							$items[] = array(
								'label' => 'Reset Password',
								'url' => 'javascript:void(0)',
								'linkOptions' => ['class' => 'reset-btn', 'data-id' => $users->user_id, 'data-username' => $users->username],
							);

							$items[] = array(
								'label' => 'Delete',
								'url' => Url::to(['delete', 'id' => $users->user_id]),
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

<div id="addStaffModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">New Staff</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<?php $form = ActiveForm::begin([
				'id' => 'addStaff-form',
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
								<?php echo $form->field($userInfoForm, 'username')->textInput(['class' => 'form-control form-control-sm']) ?>
							</div>
							<div class="col-12 col-md-3">
								<?php echo $form->field($userInfoForm, 'role_name')->dropDownList(
									[
										'level_6' => 'Normal',
										'level_3' => 'Admin',
									],
									['class' => 'form-control form-control-sm']
								) ?>
							</div>
							<div class="col-12 col-md-3">
								<?php echo $form->field($userInfoForm, 'branch')->dropDownList(
									[
										'KL' => 'KL',
										'JB' => 'JB',
									],
									['class' => 'form-control form-control-sm']
								) ?>
							</div>
							<div class="col-12 col-md-3">
								<?php echo $form->field($userInfoForm, 'position')->textInput(['class' => 'form-control form-control-sm']) ?>
							</div>
							<div class="col-12 col-md-3">
								<?php echo $form->field($userInfoForm, 'chinese_name')->textInput(['class' => 'form-control form-control-sm']) ?>
							</div>
							<div class="col-12 col-md-3">
								<?php echo $form->field($userInfoForm, 'english_name')->textInput(['class' => 'form-control form-control-sm']) ?>
							</div>
							<div class="col-12 col-md-3">
								<?php echo $form->field($userInfoForm, 'gender')->dropDownList(
									[
										'M' => 'Male',
										'F' => 'Female',
									],
									['class' => 'form-control form-control-sm']
								) ?>
							</div>
							<div class="col-12 col-md-3">
								<?php echo $form->field($userInfoForm, 'ic')->textInput(['class' => 'form-control form-control-sm']) ?>
							</div>
							<div class="col-12 col-md-3">
								<?php echo $form->field($userInfoForm, 'join_date')
									->textInput(['class'=>'form-control form-control-sm datepicker', 'autocomplete' => 'off'])
								?>
							</div>
							<div class="col-12 col-md-3">
								<?php echo $form->field($userInfoForm, 'resign_date')
									->textInput(['class'=>'form-control form-control-sm datepicker', 'autocomplete' => 'off'])
								?>
							</div>
						</div>
					</fieldset>
				</div>
				<div class="modal-footer">
					<div class="container">
						<div class="row">
							<div class="col-auto px-0 pb-3">
								<em>The default new user password is 138999</em>
							</div>
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

<div id="editStaffModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Staff</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<?php $form = ActiveForm::begin([
				'id' => 'editStaff-form',
				'enableAjaxValidation' => true,
				'fieldConfig' => [
					'options' => [
						'class' => 'form-group',
					]
				],
			]); ?>
				<div class="modal-body">
					<fieldset>
						<?php echo Html::activeHiddenInput($userInfoForm, 'user_id'); ?>
						<div class="row">
							<div class="col-12 col-md-3">
								<?php echo $form->field($userInfoForm, 'status')->dropDownList(
									[
										'1' => 'Active',
										'2' => 'Resign',
									],
									['class' => 'form-control form-control-sm']
								) ?>
							</div>
							<div class="col-12 col-md-3">
								<?php echo $form->field($userInfoForm, 'role_name')->dropDownList(
									[
										'level_6' => 'Normal',
										'level_3' => 'Admin',
									],
									['class' => 'form-control form-control-sm']
								) ?>
							</div>
							<div class="col-12 col-md-3">
								<?php echo $form->field($userInfoForm, 'branch')->dropDownList(
									[
										'KL' => 'KL',
										'JB' => 'JB',
									],
									['class' => 'form-control form-control-sm']
								) ?>
							</div>
							<div class="col-12 col-md-3">
								<?php echo $form->field($userInfoForm, 'position')->textInput(['class' => 'form-control form-control-sm']) ?>
							</div>
							<div class="col-12 col-md-3">
								<?php echo $form->field($userInfoForm, 'chinese_name')->textInput(['class' => 'form-control form-control-sm']) ?>
							</div>
							<div class="col-12 col-md-3">
								<?php echo $form->field($userInfoForm, 'english_name')->textInput(['class' => 'form-control form-control-sm']) ?>
							</div>
							<div class="col-12 col-md-3">
								<?php echo $form->field($userInfoForm, 'gender')->dropDownList(
									[
										'M' => 'Male',
										'F' => 'Female',
									],
									['class' => 'form-control form-control-sm']
								) ?>
							</div>
							<div class="col-12 col-md-3">
								<?php echo $form->field($userInfoForm, 'ic')->textInput(['class' => 'form-control form-control-sm']) ?>
							</div>
							<div class="col-12 col-md-3">
								<?php echo $form->field($userInfoForm, 'join_date')
									->textInput(['class'=>'form-control form-control-sm datepicker', 'autocomplete' => 'off'])
								?>
							</div>
							<div class="col-12 col-md-3">
								<?php echo $form->field($userInfoForm, 'resign_date')
									->textInput(['class'=>'form-control form-control-sm datepicker', 'autocomplete' => 'off'])
								?>
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

<div id="resetPassModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Reset Password</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<?php $form = ActiveForm::begin([
				'id'     => 'resetPass-form',
				'fieldConfig' => [
					'options' => [
						'class' => 'form-group',
					]
				],
			]); ?>
				<div class="modal-body">
					<fieldset>
						<?php echo Html::activeHiddenInput($resetPass, 'user_id'); ?>
						<div class="row">
							<div class="col-md-12">
								<?php echo $form->field($resetPass, 'username')->textInput([
									'disabled' => true,
									'class' => 'form-control form-control-sm disabled-wrapper',
								]) ?>
								<?php echo $form->field($resetPass, 'password')->textInput(['class' => 'form-control form-control-sm', 'autocomplete' => 'off']) ?>
							</div>
						</div>
					</fieldset>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>

<div id="viewStaffModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Staff Detail</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<fieldset>
					<div class="row">
						<div class="col-12 col-md-6">
							<div class="row">
								<p class="col-5 text-right">Username :</p>
								<p class="col-7" id="username-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Status :</p>
								<p class="col-7" id="status-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Role :</p>
								<p class="col-7" id="role_name-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Last Login :</p>
								<p class="col-7" id="last_login-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Last Update :</p>
								<p class="col-7" id="update_date-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Join Date :</p>
								<p class="col-7" id="join_date-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Resign Date :</p>
								<p class="col-7" id="resign_date-p"></p>
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="row">
								<p class="col-5 text-right">Chinese Name :</p>
								<p class="col-7" id="chinese_name-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">English Name :</p>
								<p class="col-7" id="english_name-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Position :</p>
								<p class="col-7" id="position-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Branch :</p>
								<p class="col-7" id="branch-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">Gender :</p>
								<p class="col-7" id="gender-p"></p>
							</div>
							<div class="row">
								<p class="col-5 text-right">IC :</p>
								<p class="col-7" id="ic-p"></p>
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


