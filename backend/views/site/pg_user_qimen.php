<?php

use yii\bootstrap\ActiveForm;
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\grid\ActionColumn;

$this->title = 'Qimen Log';
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
	<li class="breadcrumb-item active">Qimen Log</li>
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
			'dataProvider' => $qimens,
			'tableOptions' => [
				'class' => 'table table-sm table-bordered table-hover',
				'style' => 'background-color: #FFF;',
			],
			// 'summary' => '',
			'columns' => [
				['class' => SerialColumn::className()],
				[
					'attribute' => 'type',
					'value' => function ($qimens) {
						$type = array(
							3  => '年盘',
							4  => '月盘',
							5  => '日盘',
							6  => '時盘',
							11 => '命盘',
							13 => '道家',
						);
						return $type[$qimens->type];
					}
				],
				[
					'attribute' => 'calendar',
					'value' => function ($qimens) {
						$calendar = array(
							1 => 'Solar 阳历',
							0 => 'Lunar 农历',
						);
						return $calendar[$qimens->calendar];
					}
				],
				[
					'label' => 'Datetime',
					'value' => function ($qimens) {
						$date_arr = array(
							$qimens->year,
							sprintf('%02d', $qimens->month),
							sprintf('%02d', $qimens->day),
						);
						$time_arr = array(
							sprintf('%02d', $qimens->hour),
							sprintf('%02d', $qimens->minute),
						);
						$date = implode("-",$date_arr);
						$time = implode(":",$time_arr);
						if ($qimens->s_month == 1) {
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


