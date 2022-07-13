<?php

use yii\web\View;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Personal Direction');

$this->registerJs('
	$("#personal-direction-male").prop("checked", true);
	$("#personal-direction-en").prop("checked", true);

	$(".personal-direction-calendar").on("change", function(){
		$(".to_hide").hide();
		if ($(this).val() == 1) {$("#en-calendar").show();}
		if ($(this).val() == 0) {$("#cn-calendar").show();}
	});

	var dateObj = new Date();
	var year = dateObj.getUTCFullYear();
	var month = dateObj.getUTCMonth() + 1; //months from 1-12
	var day = dateObj.getUTCDate();

	$("#en-year").val(year);
	$("#en-month").val(month);
	$("#en-day").val(day);
', View::POS_END);

$this->registerCss('
	#personal-direction-div {
		background-image: url("../images/personal-direction/bg.jpg");
		background-repeat: no-repeat;
		background-position: center;
		background-size: cover;
		min-height: 800px;
	}
');

?>

<div id="personal-direction-div" class="container-fluid py-3">
	<img src="<?= Yii::$app->urlManager->createUrl('/images/personal-direction/logo.png') ?>" class="img-fluid d-flex mx-auto" width="140">
	<img src="<?= Yii::$app->urlManager->createUrl('/images/personal-direction/title.png') ?>" class="img-fluid d-flex mx-auto py-4 pb-5" width="300">
	<form id="personal-direction-form" method="post" role="form" target="_blank">
		<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
		<div class="form-row justify-content-center">
			<div class="col-sm-9 col-md-12 col-lg-10 col-xl-8">
				<div class="form-group row">
					<label class="col-form-label offset-md-1 px-sm-1 col-sm-4 col-md-2">*<?= Yii::t('app', 'Gender') ?></label>
					<div class="col-sm-7 col-form-label">
						<div class="form-check form-check-inline" style="width: 80px;">
							<div class="custom-control custom-radio">
								<input class="custom-control-input" type="radio" name="pd[gender]" id="personal-direction-male" value="1" required>
								<label class="custom-control-label" for="personal-direction-male"><?= Yii::t('app', 'Male') ?></label>
							</div>
						</div>
						<div class="form-check form-check-inline">
							<div class="custom-control custom-radio">
								<input class="custom-control-input" type="radio" name="pd[gender]" id="personal-direction-female" value="0" required>
								<label class="custom-control-label" for="personal-direction-female"><?= Yii::t('app', 'Female') ?></label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-row justify-content-center">
			<div class="col-sm-9 col-md-12 col-lg-10 col-xl-8">
				<div class="form-group row">
					<label class="col-form-label offset-md-1 px-sm-1 col-sm-4 col-md-2">*<?= Yii::t('app', 'Calendar') ?></label>
					<div class="col-sm-7 col-form-label">
						<div class="form-check form-check-inline" style="width: 80px;">
							<div class="custom-control custom-radio">
								<input class="custom-control-input personal-direction-calendar" type="radio" name="pd[calendar]" id="personal-direction-en" value="1" required>
								<label class="custom-control-label" for="personal-direction-en"><?= Yii::t('app', 'Western') ?></label>
							</div>
						</div>
						<div class="form-check form-check-inline">
							<div class="custom-control custom-radio">
								<input class="custom-control-input personal-direction-calendar" type="radio" name="pd[calendar]" id="personal-direction-cn" value="0" required>
								<label class="custom-control-label" for="personal-direction-cn"><?= Yii::t('app', 'Chinese') ?></label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-row justify-content-center">
			<div class="col-sm-9 col-md-12 col-lg-10 col-xl-8">
				<div class="form-group row">
					<div class="offset-md-1 col-11 px-sm-1">
						<label>*<?= Yii::t('app', 'Birthday') ?></label>
					</div>
				</div>
			</div>
		</div>
		<div id="en-calendar" class="to_hide">
			<?= $this->render('pg_index_calendar_en') ?>
		</div>
		<div id="cn-calendar" class="to_hide" style="display: none;">
			<?= $this->render('pg_index_calendar_cn') ?>
		</div>
		<div class="form-row justify-content-center">
			<div class="col-sm-9 col-md-12 col-lg-10 col-xl-8">
				<div class="form-group row">
					<div class="offset-md-1 col-11 px-sm-1">
						<button id="personal-direction-pdf" type="submit" class="btn btn-primary"><?= Yii::t('app', 'Check') ?></button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>