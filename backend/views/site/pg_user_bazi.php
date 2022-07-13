<?php

use yii\bootstrap\ActiveForm;
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\grid\ActionColumn;

$this->title = 'Bazi Log';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs('
', View::POS_END);

$this->registerJs('
	$("#website").addClass("active");
', View::POS_END);

?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="<?= Url::to(['site/user']) ?>">Registered User List</a>
	</li>
	<li class="breadcrumb-item active">Bazi Log</li>
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
	<div class="row">
		<div class="col-12">
			<h6 style="margin-top: 3px; margin-bottom: 5px;"><?= $user->name ?><br><?= $user->contact ?><br><?= $user->email ?></h6>
		</div>
	</div>
	<hr style="border-color: #404041; margin-top: 5px;">

	<div style="overflow: scroll;">
		<?= GridView::widget([
			'dataProvider' => $bazis,
			'tableOptions' => [
				'class' => 'table table-sm table-bordered table-hover',
				'style' => 'background-color: #FFF;',
			],
			// 'summary' => '',
			'columns' => [
				['class' => SerialColumn::className()],
				[
					'label' => 'Name (en)',
					'attribute' => 'ename',
				],
				[
					'label' => 'Name (cn)',
					'attribute' => 'cname',
				],
				[
					'attribute' => 'gender',
					'value' => function ($bazis) {
						$gender = array(
							1 => 'Male',
							0 => 'Female',
						);
						return $gender[$bazis->gender];
					}
				],
				[
					'attribute' => 'calendar',
					'value' => function ($bazis) {
						$calendar = array(
							1 => 'Solar 阳历',
							0 => 'Lunar 农历',
						);
						return $calendar[$bazis->calendar];
					}
				],
				[
					'label' => 'Datetime',
					'value' => function ($bazis) {
						$date_arr = array(
							$bazis->year,
							sprintf('%02d', $bazis->month),
							sprintf('%02d', $bazis->day),
						);
						$time_arr = array(
							sprintf('%02d', $bazis->hour),
							sprintf('%02d', $bazis->minute),
						);
						$date = implode("-",$date_arr);
						$time = implode(":",$time_arr);
						if ($bazis->s_month == 1) {
							$time = $time.' (Leap Month)';
						}
						return $date.' '.$time;
					}
				],
				'create_date',
			],
		]) ?>
	</div>
</div>


