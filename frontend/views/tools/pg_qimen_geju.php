<?php

use frontend\assets\AppAsset;
use yii\web\View;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Qi Men Dun Jia');

$this->registerJsFile("@web/core/moment/moment-2.13.0.js", [
	'depends' => AppAsset::className(),
]);

$this->registerJs('
	function update() {
		$(".current-time").html(moment().format("YYYY-MM-DD HH:mm:ss A"));
	}

	setInterval(update, 1000);

	$("#qimen-en").prop("checked", true);
	$("#qimen-type10").prop("checked", true);

	$(".qimen-calendar").on("change", function(){
		$(".to_hide").hide();
		if ($(this).val() == 1) {$("#en-calendar").show();}
		if ($(this).val() == 0) {$("#cn-calendar").show();}
	});

	var dateObj = new Date();
	var year    = dateObj.getFullYear();
	var month   = dateObj.getMonth()+1; //months from 1-12
	var day     = dateObj.getDate();
	var hour    = dateObj.getHours();
	var minute  = dateObj.getMinutes();

	$("#en-year").val(year);
	$("#en-month").val(month);
	$("#en-day").val(day);
	$("#en-hour").val(hour);
	$("#en-minute").val(minute);

	$("#qimen-current-time").on("click", function(){
		var dateObj = new Date();
		var year    = dateObj.getFullYear();
		var month   = dateObj.getMonth() + 1; //months from 1-12
		var day     = dateObj.getDate();
		var hour    = dateObj.getHours();
		var minute  = dateObj.getMinutes();

		$("#current-time-year").val(year);
		$("#current-time-month").val(month);
		$("#current-time-day").val(day);
		$("#current-time-hour").val(hour);
		$("#current-time-minute").val(minute);

		$("#qimen-current-time-form").submit();
	})
', View::POS_END);

$this->registerCss('
	.nav-tabs .nav-link {
		color: #337ab7;
	}
	.nav-tabs .nav-link.active:focus,
	.nav-tabs .nav-link.active:hover,
	.nav-tabs .nav-link.active {
		color: #300000;
		border: 1px solid #300000;
		background-color: #fff;
		border-color: #300000;
		border-bottom-color: transparent;
	}
	.nav-tabs .nav-link:focus,
	.nav-tabs .nav-link:hover {
		background-color: transparent;
		border-color: transparent;
	}
	#qimenTabContent {
		border: 1px solid #300000;
		margin-top: -1px;
		padding: 20px;
		background-color: #fff;
	}
	.card-body {
		background-color: rgba(0,0,0,.03);
	}
	.current-time {
		font-size: 35px;
		color: #300000;
		text-align: center;
	}
');

?>

<div id="qimen-div" class="container-fluid py-5">
	<h2 class="text-center mb-5"><?= Yii::t('app', 'Qi Men Dun Jia') ?> (<?= Yii::t('app', 'Ge Ju') ?>)</h2>
	<div class="row justify-content-center">
		<div class="col-10">
			<ul class="nav nav-tabs" id="qimenTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="current-time-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true"><?= Yii::t('app', 'Current Time') ?></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="select-time-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><?= Yii::t('app', 'Choose Time') ?></a>
				</li>
			</ul>
			<div class="tab-content" id="qimenTabContent">
				<div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="current-time-tab">
					<div class="card">
						<div class="card-body card-dark current-time px-1"></div>
					</div>
					<br>
					<div class="row justify-content-center">
						<div class="col-sm-9 col-md-12 col-lg-5 col-xl-4">
							<form id="qimen-current-time-form" action="<?= Url::to(['qimengeju/']) ?>" method="post" role="form" target="_blank">
								<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
								<input type="hidden" name="Qimen[calendar]" value="1">
								<input type="hidden" name="Qimen[type]" value="10">
								<input type="hidden" id="current-time-year" name="Qimen[en][year]">
								<input type="hidden" id="current-time-month" name="Qimen[en][month]">
								<input type="hidden" id="current-time-day" name="Qimen[en][day]">
								<input type="hidden" id="current-time-hour" name="Qimen[en][hour]">
								<input type="hidden" id="current-time-minute" name="Qimen[en][minute]">
								<button id="qimen-current-time" type="button" class="btn btn-block btn-primary"><?= Yii::t('app', 'Check') ?></button>
							</form>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="select-time-tab">
					<form id="qimen-choose-time-form" action="<?= Url::to(['qimengeju/']) ?>" method="post" role="form" target="_blank">
						<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
						<div class="form-row">
							<div class="col-12 col-md-4 col-form-label">
								<div class="form-check form-check-inline">
									<div class="custom-control custom-radio">
										<input class="custom-control-input qimen-calendar" type="radio" name="Qimen[calendar]" id="qimen-en" value="1" required>
										<label class="custom-control-label" for="qimen-en"><?= Yii::t('app', 'Western Calendar') ?></label>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-4 col-form-label">
								<div class="form-check form-check-inline">
									<div class="custom-control custom-radio">
										<input class="custom-control-input qimen-calendar" type="radio" name="Qimen[calendar]" id="qimen-cn" value="0" required>
										<label class="custom-control-label" for="qimen-cn"><?= Yii::t('app', 'Chinese Calendar') ?></label>
									</div>
								</div>
							</div>
						</div>
						<hr>
						<div class="form-row">
							<div class="col-12 col-md-2 col-form-label">
								<div class="form-check form-check-inline">
									<div class="custom-control custom-radio">
										<input class="custom-control-input" type="radio" name="Qimen[type]" id="qimen-type14" value="14" required>
										<label class="custom-control-label" for="qimen-type14">道家</label>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-2 col-form-label">
								<div class="form-check form-check-inline">
									<div class="custom-control custom-radio">
										<input class="custom-control-input" type="radio" name="Qimen[type]" id="qimen-type12" value="12" required>
										<label class="custom-control-label" for="qimen-type12">命盘</label>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-2 col-form-label">
								<div class="form-check form-check-inline">
									<div class="custom-control custom-radio">
										<input class="custom-control-input" type="radio" name="Qimen[type]" id="qimen-type07" value="07" required>
										<label class="custom-control-label" for="qimen-type07">年盘</label>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-2 col-form-label">
								<div class="form-check form-check-inline">
									<div class="custom-control custom-radio">
										<input class="custom-control-input" type="radio" name="Qimen[type]" id="qimen-type08" value="08" required>
										<label class="custom-control-label" for="qimen-type08">月盘</label>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-2 col-form-label">
								<div class="form-check form-check-inline">
									<div class="custom-control custom-radio">
										<input class="custom-control-input" type="radio" name="Qimen[type]" id="qimen-type09" value="09" required>
										<label class="custom-control-label" for="qimen-type09">日盘</label>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-2 col-form-label">
								<div class="form-check form-check-inline">
									<div class="custom-control custom-radio">
										<input class="custom-control-input" type="radio" name="Qimen[type]" id="qimen-type10" value="10" required>
										<label class="custom-control-label" for="qimen-type10">时盘</label>
									</div>
								</div>
							</div>
						</div>
						<hr>
						<div id="en-calendar" class="to_hide">
							<?= $this->render('pg_qimen_calendar_en') ?>
						</div>
						<div id="cn-calendar" class="to_hide" style="display: none;">
							<?= $this->render('pg_qimen_calendar_cn') ?>
						</div>
						<br>
						<div class="form-row">
							<div class="col-12">
								<?= $this->render('pg_qimen_note') ?>
							</div>
						</div>
						<br>
						<div class="row justify-content-center">
							<div class="col-sm-9 col-md-12 col-lg-5 col-xl-4">
								<button type="submit" class="btn btn-block btn-primary"><?= Yii::t('app', 'Check') ?></button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>