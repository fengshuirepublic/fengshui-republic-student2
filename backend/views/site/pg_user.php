<?php

use yii\bootstrap\ActiveForm;
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\grid\ActionColumn;

$this->title = 'Registered User';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs('
', View::POS_END);

$this->registerJs('
	$("#website").addClass("active");
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
			<h4 style="margin-top: 3px; margin-bottom: 5px;">Registered User</h4>
		</div>
	</div>
	<hr style="border-color: #404041; margin-top: 5px;">

	<div class="card card-body bg-light mb-3">
		<?php $form = ActiveForm::begin([
			'method'      => 'get',
			'action'      => Url::to(['site/user']),
			'fieldConfig' => [
				'options' => [
					'class' => 'form-group',
				]
			],
		]) ?>
			<div class="row">
				<div class="col-12 col-md-3">
					<?php echo $form->field($model, 'status')->dropDownList(
						[
							1 => 'Active',
							2 => 'Inactive',
						],
						[
							'class'=>'form-control form-control-sm',
							'prompt' => 'Please Select',
						]
					) ?>
				</div>
				<div class="col-12 col-md-3">
					<?php echo $form->field($model, 'email')
						->textInput(['class'=>'form-control form-control-sm', 'placeholder'=>'Email'])
					?>
				</div>
				<div class="col-12 col-md-3">
					<?php echo $form->field($model, 'contact')
						->textInput(['class'=>'form-control form-control-sm', 'placeholder'=>'Contact'])
					?>
				</div>
				<div class="col-12 col-md-3">
					<?php echo $form->field($model, 'name')
						->textInput(['class'=>'form-control form-control-sm', 'placeholder'=>'Name'])
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

	<div style="overflow: scroll;">
		<?= GridView::widget([
			'dataProvider' => $users,
			'tableOptions' => [
				'class' => 'table table-sm table-bordered table-hover',
				'style' => 'background-color: #FFF;',
			],
			// 'summary' => '',
			'columns' => [
				['class' => SerialColumn::className()],
				[
					'attribute' => 'status',
					'value' => function ($users) {
						$status = array(
							1 => 'Active',
							2 => 'Inactive',
						);
						return $status[$users->status];
					}
				],
				'email',
				'contact',
				'name',
				'amount_login',
				'last_login',
				[
					'class' => ActionColumn::className(),
					'header' => 'Action',
					'headerOptions' => ['class' => 'text-center'],
					'contentOptions' => ['class' => 'text-right', 'style' => 'white-space: nowrap;'],
					'template' => '{bazi} {naming} {qimen} {act-inc}',
					'buttons' => [
						'act-inc' => function ($url, $users, $key) {
							if ($users->status == 2) {
								return Html::a('ACT', ['user-act-inc', 'id' => $users->user_id, 'status' => $users->status], [
									'class' => 'btn btn-sm btn-primary px-1',
									'style' => 'width: 46px;',
								]);
							} else {
								return Html::a('INC', ['user-act-inc', 'id' => $users->user_id, 'status' => $users->status], [
									'class' => 'btn btn-sm btn-danger px-1',
									'style' => 'width: 46px;',
								]);
							}
						},
						'bazi' => function ($url, $users, $key) {
							$amount = count($users->bazis);
							return Html::a("Bazi : $amount", ['user-bazi', 'id' => $users->user_id], [
								'class' => 'btn btn-sm btn-info px-1',
							]);
						},
						'naming' => function ($url, $users, $key) {
							$amount = count($users->namings);
							return Html::a("Naming : $amount", ['user-naming', 'id' => $users->user_id], [
								'class' => 'btn btn-sm btn-info px-1',
							]);
						},
						'qimen' => function ($url, $users, $key) {
							$amount = count($users->qimens);
							return Html::a("Qimen : $amount", ['user-qimen', 'id' => $users->user_id], [
								'class' => 'btn btn-sm btn-info px-1',
							]);
						},
					],
				]
			],
		]) ?>
	</div>
</div>


