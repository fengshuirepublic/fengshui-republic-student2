<?php

use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\ButtonDropdown;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\grid\ActionColumn;

$this->title = 'Course List';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs('
	$("#backend").addClass("active");

	$("#editCourseModal").on("hidden.bs.modal", function () {
		$("#editCourse-form").trigger("reset");
	});

	$(".edit-btn").click(function () {
		var data = $(this).data();

		$.getJSON("'.Url::to(['course/detail']).'", {id:data.id}, function (result) {
			if(result.error == 1) {
				alert("Fail");
			} else {
				$.each(result.course, function(key, value){
					if (value) {
						$("#editCourseModal #services-"+ key).val(value);
					}
				});
			}
		});

		$("#editCourseModal").modal("show");
	});

	$("#addCourseModal").on("hidden.bs.modal", function () {
		$("#addCourse-form").trigger("reset");
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
			<h4 style="margin-top: 3px; margin-bottom: 5px;">Course List</h4>
		</div>
	</div>
	<hr style="border-color: #404041; margin-top: 5px;">
	<div class="row">
		<div class="col-12 mb-3">
			<button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#addCourseModal">Add Course</button>
		</div>
	</div>

	<div class="card card-body bg-light mb-3">
		<?php $form = ActiveForm::begin([
			'method'      => 'get',
			'action'      => Url::to(['course/list']),
			'fieldConfig' => [
				'options' => [
					'class' => 'form-group',
				]
			],
		]) ?>
			<div class="row">
				<div class="col-12 col-md-3">
					<?php echo $form->field($model, 'year')->dropDownList(
						[
							'2020' => '2020',
							'2021' => '2021',
							'2022' => '2022',
							'2023' => '2023',
						],
						['class' => 'form-control form-control-sm']
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

	<div style="overflow: scroll; padding-bottom: 200px;">
		<?= GridView::widget([
			'dataProvider' => $courses,
			'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
			'tableOptions' => [
				'class' => 'table table-sm table-bordered table-hover',
				'style' => 'background-color: #FFF;',
			],
			// 'summary' => '',
			'columns' => [
				['class' => SerialColumn::className()],
				'type_en',
				'type_cn',
				[
					'label' => 'Suggest Price',
					'attribute' => 'price_refer',
					'value' => function ($courses) {
						return number_format($courses->price_refer, 2);
					},
				],
				'year',
				[
					'class' => ActionColumn::className(),
					'header' => 'Action',
					'headerOptions' => ['class' => 'text-center'],
					'contentOptions' => ['class' => 'text-center', 'style' => 'white-space: nowrap;'],
					'template' => '{action_list}',
					'buttons' => [
						'action_list' => function ($url, $courses, $key) {
							$items = array();

							$items[] = array(
								'label' => 'Edit',
								'url' => 'javascript:void(0)',
								'linkOptions' => ['class' => 'edit-btn', 'data-id' => $courses->service_id],
							);

							$items[] = array(
								'label' => 'Delete',
								'url' => Url::to(['delete', 'id' => $courses->service_id]),
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

<div id="editCourseModal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Course</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<?php $form = ActiveForm::begin([
				'id' => 'editCourse-form',
				'fieldConfig' => [
					'options' => [
						'class' => 'form-group',
					]
				],
			]); ?>
				<div class="modal-body">
					<fieldset>
						<?php echo Html::activeHiddenInput($courseForm, 'service_id'); ?>
						<div class="row">
							<div class="col-12 col-md-6">
								<?php echo $form->field($courseForm, 'type_en')->textInput(['class' => 'form-control form-control-sm']) ?>
							</div>
							<div class="col-12 col-md-6">
								<?php echo $form->field($courseForm, 'type_cn')->textInput(['class' => 'form-control form-control-sm']) ?>
							</div>
							<div class="col-12 col-md-6">
								<?php echo $form->field($courseForm, 'price_refer')->textInput(['class' => 'form-control form-control-sm'])->label('Suggest Price') ?>
							</div>
							<div class="col-12 col-md-6">
								<?php echo $form->field($courseForm, 'year')->dropDownList(
									[
										'2020' => '2020',
										'2021' => '2021',
										'2022' => '2022',
										'2023' => '2023',
									],
									['class' => 'form-control form-control-sm']
								) ?>
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

<div id="addCourseModal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Course</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<?php $form = ActiveForm::begin([
				'id' => 'addCourse-form',
				'fieldConfig' => [
					'options' => [
						'class' => 'form-group',
					]
				],
			]); ?>
				<div class="modal-body">
					<fieldset>
						<div class="row">
							<div class="col-12 col-md-4">
								<?php echo $form->field($courseForm, 'category')->dropDownList(
									$listCategory,
									[
										'prompt' => 'Please Select',
										'class' => 'form-control form-control-sm'
									]
								) ?>
							</div>
							<div class="col-12 col-md-4">
								<?php echo $form->field($courseForm, 'type_en')->textInput(['class' => 'form-control form-control-sm']) ?>
							</div>
							<div class="col-12 col-md-4">
								<?php echo $form->field($courseForm, 'type_cn')->textInput(['class' => 'form-control form-control-sm']) ?>
							</div>
							<div class="col-12 col-md-4">
								<?php echo $form->field($courseForm, 'price_refer')->textInput(['class' => 'form-control form-control-sm'])->label('Suggest Price') ?>
							</div>
							<div class="col-12 col-md-4">
								<?php echo $form->field($courseForm, 'year')->dropDownList(
									[
										'2020' => '2020',
										'2021' => '2021',
										'2022' => '2022',
										'2023' => '2023',
									],
									['class' => 'form-control form-control-sm']
								) ?>
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


