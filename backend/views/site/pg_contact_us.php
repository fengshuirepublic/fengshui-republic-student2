<?php

use yii\bootstrap\ActiveForm;
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\grid\ActionColumn;

$this->title = 'Contact Us';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs('
	$("#export-excel").click(function () {
		var from = $("#formsearchcontactus-from").val();
		var to   = $("#formsearchcontactus-to").val();

		$("#exportContactUs-form #export_excel-from").val(from);
		$("#exportContactUs-form #export_excel-to").val(to);

		$("#exportContactUs-form").submit();
	});
', View::POS_END);

$this->registerJs('
	$("#website").addClass("active");

	$(".datepicker").datepicker({
		format: "yyyy-mm-dd",
		todayHighlight: true,
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
			<h4 style="margin-top: 3px; margin-bottom: 5px;">Contact Us</h4>
		</div>
	</div>
	<hr style="border-color: #404041; margin-top: 5px;">

	<form id="exportContactUs-form" action="<?php echo Url::to(['site/export-contact-us']) ?>" method="post">
		<input type="hidden" name="_csrf-backend" value="<?php echo Yii::$app->request->getCsrfToken() ?>">
		<input type="hidden" id="export_excel-from" name="FormSearchContactUs[from]">
		<input type="hidden" id="export_excel-to" name="FormSearchContactUs[to]">
	</form>

	<div class="card card-body bg-light mb-3">
		<?php $form = ActiveForm::begin([
			'method'      => 'get',
			'action'      => Url::to(['site/contact-us']),
			'fieldConfig' => [
				'options' => [
					'class' => 'form-group',
					// 'style' => 'font-size: 12px;',
					// 'tag'   => false,
				]
			],
		]) ?>
			<div class="row">
				<div class="col-12 col-md-4">
					<?php echo $form->field($model, 'from')
						->textInput(['class'=>'form-control form-control-sm datepicker', 'placeholder'=>'From', 'autocomplete' => 'off'])
					?>
				</div>
				<div class="col-12 col-md-4">
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
			'dataProvider' => $listContactUs,
			'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
			'tableOptions' => [
				'class' => 'table table-sm table-bordered table-hover',
				'style' => 'background-color: #FFF; font-size: 14px;',
			],
			'columns' => [
				['class' => SerialColumn::className()],
				[
					'label' => 'Service',
					'attribute' => 'service',
					'format' => 'raw',
					'value' => function ($listContactUs) {
						$service = array(
							1  => '居家风水',
							2  => '商宅风水',
							3  => '阴宅风水',
							4  => '屋业发展',
							5  => '婴儿取名',
							6  => '成人改名',
							7  => '搬家择日',
							8  => '婚嫁择日',
							9  => '择日剖腹',
							10 => '八字批命',
							11 => '风水讲座',
							12 => '课程',
						);
						return $service[$listContactUs->service];
					},
				],
				[
					'label' => 'Name',
					'attribute' => 'name',
				],
				[
					'label' => 'Email',
					'attribute' => 'email',
				],
				[
					'label' => 'Contact',
					'attribute' => 'contact',
				],
				[
					'label' => 'Message',
					'attribute' => 'message',
				],
				[
					'label' => 'Date',
					'attribute' => 'create_date',
				],
				[
					'class' => ActionColumn::className(),
					'header' => 'Action',
					'headerOptions' => ['class' => 'text-center'],
					'contentOptions' => ['class' => 'text-center', 'style' => 'white-space: nowrap;'],
					'template' => '{delete}',
					'buttons' => [
						'delete' => function ($url, $listContactUs, $key) {
							return Html::a('Delete', ['delete-contact-us', 'id' => $listContactUs->id], [
								'class' => 'btn btn-danger btn-confirm-del',
							]);
						},
					],
				]
			],
		]) ?>
	</div>
</div>


