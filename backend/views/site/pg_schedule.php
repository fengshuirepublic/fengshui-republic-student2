<?php

use yii\bootstrap\ActiveForm;
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\grid\ActionColumn;

$this->title = 'Schedule';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs('
', View::POS_END);

$this->registerJs('
	$("#website").addClass("active");

	$(".datepicker").datepicker({
		format: "yyyy-mm-dd",
		todayHighlight: true,
	});

	$("#addScheduleModal").on("hidden.bs.modal", function () {
		$("#addSchedule-form").trigger("reset");
	})

	$("#editScheduleModal").on("hidden.bs.modal", function () {
		$("#editSchedule-form").trigger("reset");
	})

	$(".edit-btn").click(function () {
		var data = $(this).data();

		$.getJSON("'.Url::to(['site/schedule-detail']).'", {id:data.id}, function (result) {
			if(result.error == 1) {
				alert("Fail");
			} else {
				$.each(result.schedule, function(key, value){
					if (value) {
						$("#editScheduleModal #fsschedules-"+ key).val(value);
					}
				});
			}
		});

		$("#editScheduleModal").modal("show");
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
			<h4 style="margin-top: 3px; margin-bottom: 5px;">Schedule</h4>
		</div>
	</div>
	<hr style="border-color: #404041; margin-top: 5px;">
	<div class="row">
		<div class="col-12 mb-3">
			<button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#addScheduleModal">Add Schedule</button>
		</div>
	</div>

	<div class="card card-body bg-light mb-3">
		<?php $form = ActiveForm::begin([
			'method'      => 'get',
			'action'      => Url::to(['site/schedule']),
			'fieldConfig' => [
				'options' => [
					'class' => 'form-group',
				]
			],
		]) ?>
			<div class="row">
				<div class="col-12 col-md-4">
					<?php echo $form->field($model, 'type')->dropDownList(
						[
							'All'       => 'All',
							'Bazi'      => 'Bazi',
							'Qimen'     => 'Qimen',
							'Yijing'    => 'Yijing',
							'Fengshui'  => 'Fengshui',
							'Yiyanduan' => 'Yiyanduan',
							'Mianxiang' => 'Mianxiang',
						],
						['class'=>'form-control form-control-sm']
					) ?>
				</div>
				<div class="col-12 col-md-4">
					<?php echo $form->field($model, 'location')->dropDownList(
						[
							'All'     => 'All',
							'KL'      => 'KL',
							'JB'      => 'JB',
							'KL & JB' => 'KL & JB',
						],
						['class'=>'form-control form-control-sm']
					) ?>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<button type="submit" class="btn btn-secondary btn-sm">Search</button>
				</div>
			</div>
		<?php ActiveForm::end() ?>
	</div>

	<div style="overflow: scroll;">
		<?= GridView::widget([
			'dataProvider' => $schedules,
			'tableOptions' => [
				'class' => 'table table-sm table-bordered table-hover',
				'style' => 'background-color: #FFF;',
			],
			// 'summary' => '',
			'columns' => [
				['class' => SerialColumn::className()],
				'type',
				'name_en',
				'name_cn',
				'date',
				'location',
				[
					'class' => ActionColumn::className(),
					'header' => 'Action',
					'headerOptions' => ['class' => 'text-center'],
					'contentOptions' => ['class' => 'text-center', 'style' => 'white-space: nowrap;'],
					'template' => '{edit} {delete}',
					'buttons' => [
						'edit' => function ($url, $schedules, $key) {
							return Html::a('Edit', 'javascript:void(0)', [
								'class' => 'btn btn-primary edit-btn',
								'data'  => [
									'id' => $schedules->id,
								],
							]);
						},
						'delete' => function ($url, $schedules, $key) {
							return Html::a('Delete', ['delete-schedule', 'id' => $schedules->id], [
								'class' => 'btn btn-danger delete-btn btn-confirm-del',
							]);
						},
					],
				]
			],
		]) ?>
	</div>
</div>

<div id="addScheduleModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">New Schedule</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<?php $form = ActiveForm::begin([
				'id'     => 'addSchedule-form',
				'fieldConfig' => [
					'options' => [
						'class' => 'form-group',
					]
				],
			]); ?>
				<div class="modal-body">
					<fieldset>
						<div class="row">
							<div class="col-12 col-md-6">
								<?php echo $form->field($fsSchedules, 'type')->dropDownList(
									[
										'Bazi'      => 'Bazi',
										'Qimen'     => 'Qimen',
										'Yijing'    => 'Yijing',
										'Fengshui'  => 'Fengshui',
										'Yiyanduan' => 'Yiyanduan',
										'Mianxiang' => 'Mianxiang',
									],
									['class' => 'form-control form-control-sm']
								) ?>
							</div>
							<div class="col-12 col-md-6">
								<?php echo $form->field($fsSchedules, 'location')->dropDownList(
									[
										'KL'      => 'KL',
										'JB'      => 'JB',
										'KL & JB' => 'KL & JB',
									],
									['class' => 'form-control form-control-sm']
								) ?>
							</div>
							<div class="col-12 col-md-6">
								<?php echo $form->field($fsSchedules, 'name_en')->textInput(['class' => 'form-control form-control-sm']) ?>
							</div>
							<div class="col-12 col-md-6">
								<?php echo $form->field($fsSchedules, 'name_cn')->textInput(['class' => 'form-control form-control-sm']) ?>
							</div>
							<div class="col-12 col-md-6">
								<?php echo $form->field($fsSchedules, 'date')
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

<div id="editScheduleModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Schedule</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<?php $form = ActiveForm::begin([
				'id'     => 'editSchedule-form',
				'fieldConfig' => [
					'options' => [
						'class' => 'form-group',
					]
				],
			]); ?>
				<div class="modal-body">
					<fieldset>
						<?php echo Html::activeHiddenInput($fsSchedules, 'id'); ?>
						<div class="row">
							<div class="col-12 col-md-6">
								<?php echo $form->field($fsSchedules, 'type')->dropDownList(
									[
										'Bazi'      => 'Bazi',
										'Qimen'     => 'Qimen',
										'Yijing'    => 'Yijing',
										'Fengshui'  => 'Fengshui',
										'Yiyanduan' => 'Yiyanduan',
										'Mianxiang' => 'Mianxiang',
									],
									['class' => 'form-control form-control-sm']
								) ?>
							</div>
							<div class="col-12 col-md-6">
								<?php echo $form->field($fsSchedules, 'location')->dropDownList(
									[
										'KL'      => 'KL',
										'JB'      => 'JB',
										'KL & JB' => 'KL & JB',
									],
									['class' => 'form-control form-control-sm']
								) ?>
							</div>
							<div class="col-12 col-md-6">
								<?php echo $form->field($fsSchedules, 'name_en')->textInput(['class' => 'form-control form-control-sm']) ?>
							</div>
							<div class="col-12 col-md-6">
								<?php echo $form->field($fsSchedules, 'name_cn')->textInput(['class' => 'form-control form-control-sm']) ?>
							</div>
							<div class="col-12 col-md-6">
								<?php echo $form->field($fsSchedules, 'date')
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


