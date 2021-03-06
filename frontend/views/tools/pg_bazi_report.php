<?php

use frontend\assets\AppAsset;
use yii\web\View;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Ba Zi Report');

$this->registerJs('
	$("#bazi-male").prop("checked", true);
	$("#bazi-en").prop("checked", true);

	$(".bazi-calendar").on("change", function(){
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
');

?>

<div id="liunian-div" class="container-fluid py-5">
	<h2 class="text-center mb-5"><?= Yii::t('app', 'Ba Zi Report') ?></h2>
	<form action="<?= Url::to(['bazireport/']) ?>" method="post" role="form" target="_blank">
		<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
		<div class="form-row justify-content-center">
			<div class="col-sm-9 col-md-12 col-lg-10 col-xl-8">
				<div class="form-group row">
					<label for="bazi_chinese_name" class="col-form-label offset-md-1 px-sm-1 col-sm-4 col-md-2">*<?= Yii::t('app', 'Chinese Name') ?></label>
					<div class="col-sm-7">
						<input id="bazi_chinese_name" class="form-control" type="text" name="bazi[chinese_name]" required>
					</div>
				</div>
			</div>
		</div>
		<div class="form-row justify-content-center">
			<div class="col-sm-9 col-md-12 col-lg-10 col-xl-8">
				<div class="form-group row">
					<label for="bazi_english_name" class="col-form-label offset-md-1 px-sm-1 col-sm-4 col-md-2"><?= Yii::t('app', 'English Name') ?></label>
					<div class="col-sm-7">
						<input id="bazi_english_name" class="form-control" type="text" name="bazi[english_name]">
					</div>
				</div>
			</div>
		</div>
		<div class="form-row justify-content-center">
			<div class="col-sm-9 col-md-12 col-lg-10 col-xl-8">
				<div class="form-group row">
					<label class="col-form-label offset-md-1 px-sm-1 col-sm-4 col-md-2">*<?= Yii::t('app', 'Gender') ?></label>
					<div class="col-sm-7 col-form-label">
						<div class="form-check form-check-inline" style="width: 80px;">
							<div class="custom-control custom-radio">
								<input class="custom-control-input" type="radio" name="bazi[gender]" id="bazi-male" value="1" required>
								<label class="custom-control-label" for="bazi-male"><?= Yii::t('app', 'Male') ?></label>
							</div>
						</div>
						<div class="form-check form-check-inline">
							<div class="custom-control custom-radio">
								<input class="custom-control-input" type="radio" name="bazi[gender]" id="bazi-female" value="0" required>
								<label class="custom-control-label" for="bazi-female"><?= Yii::t('app', 'Female') ?></label>
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
								<input class="custom-control-input bazi-calendar" type="radio" name="bazi[calendar]" id="bazi-en" value="1" required>
								<label class="custom-control-label" for="bazi-en"><?= Yii::t('app', 'Western') ?></label>
							</div>
						</div>
						<div class="form-check form-check-inline">
							<div class="custom-control custom-radio">
								<input class="custom-control-input bazi-calendar" type="radio" name="bazi[calendar]" id="bazi-cn" value="0" required>
								<label class="custom-control-label" for="bazi-cn"><?= Yii::t('app', 'Chinese') ?></label>
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
			<div class="form-row justify-content-center">
				<div class="col-sm-9 col-md-12 col-lg-10 col-xl-8">
					<div class="form-group row">
						<div class="offset-md-1 col-md-2 px-sm-1 mb-2">
							<select id="en-year" class="form-control" name="bazi[en][year]" required>
								<?php for ($i=2025; $i>1910; $i--): ?>
									<option value="<?= $i ?>"><?= $i ?> year</option>
								<?php endfor; ?>
							</select>
						</div>
						<div class="col-md-2 px-sm-1 mb-2">
							<select id="en-month" class="form-control" name="bazi[en][month]" required>
								<option value="1">January</option>
								<option value="2">February</option>
								<option value="3">March</option>
								<option value="4">April</option>
								<option value="5">May</option>
								<option value="6">June</option>
								<option value="7">July</option>
								<option value="8">August</option>
								<option value="9">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select>
						</div>
						<div class="col-md-2 px-sm-1 mb-2">
							<select id="en-day" class="form-control" name="bazi[en][day]" required>
								<?php for ($i=1; $i<32; $i++): ?>
									<?php
										if (!in_array(($i % 100), array(11,12,13))) {
											$n = $i;
											switch ($n % 10) {
												// Handle 1st, 2nd, 3rd
												case 1:  $n = $n.'st';break;
												case 2:  $n = $n.'nd';break;
												case 3:  $n = $n.'rd';break;
												default: $n = $n.'th';break;
											}
										} else {
											$n = $i;
											$n = $n.'th';
										}
									?>
									<option value="<?= $i ?>"><?= $n ?></option>
								<?php endfor; ?>
							</select>
						</div>
						<div class="col-md-2 px-sm-1 mb-2">
							<select id="en-hour" class="form-control" name="bazi[en][hour]" required>
								<?php for ($i=0; $i<24; $i++): ?>
									<option value="<?= $i ?>"><?= $i ?> hour</option>
								<?php endfor; ?>
							</select>
						</div>
						<div class="col-md-2 px-sm-1 mb-2">
							<select id="en-minute" class="form-control" name="bazi[en][minute]" required>
								<?php for ($i=0; $i<60; $i++): ?>
									<option value="<?= $i ?>"><?= $i ?> minute</option>
								<?php endfor; ?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="cn-calendar" class="to_hide" style="display: none;">
			<div class="form-row justify-content-center">
				<div class="col-sm-9 col-md-12 col-lg-10 col-xl-8">
					<div class="form-group row">
						<div class="offset-md-1 col-md-2 px-sm-1 mb-2">
							<select class="form-control" name="bazi[cn][year]" required>
								<?php for ($i=2025; $i>1910; $i--): ?>
									<option value="<?= $i ?>"><?= $i ?> ???</option>
								<?php endfor; ?>
							</select>
						</div>
						<div class="col-md-2 px-sm-1 mb-2">
							<select class="form-control" name="bazi[cn][month]" required>
								<option value="1">??????</option>
								<option value="2">??????</option>
								<option value="3">??????</option>
								<option value="4">??????</option>
								<option value="5">??????</option>
								<option value="6">??????</option>
								<option value="7">??????</option>
								<option value="8">??????</option>
								<option value="9">??????</option>
								<option value="10">??????</option>
								<option value="11">?????????</option>
								<option value="12">?????????</option>
							</select>
						</div>
						<div class="col-md-2 px-sm-1 mb-2">
							<select class="form-control" name="bazi[cn][day]" required>
								<option value="1">??????</option>
								<option value="2">??????</option>
								<option value="3">??????</option>
								<option value="4">??????</option>
								<option value="5">??????</option>
								<option value="6">??????</option>
								<option value="7">??????</option>
								<option value="8">??????</option>
								<option value="9">??????</option>
								<option value="10">??????</option>
								<option value="11">??????</option>
								<option value="12">??????</option>
								<option value="13">??????</option>
								<option value="14">??????</option>
								<option value="15">??????</option>
								<option value="16">??????</option>
								<option value="17">??????</option>
								<option value="18">??????</option>
								<option value="19">??????</option>
								<option value="20">??????</option>
								<option value="21">??????</option>
								<option value="22">??????</option>
								<option value="23">??????</option>
								<option value="24">??????</option>
								<option value="25">??????</option>
								<option value="26">??????</option>
								<option value="27">??????</option>
								<option value="28">??????</option>
								<option value="29">??????</option>
								<option value="30">??????</option>
							</select>
						</div>
						<div class="col-md-2 px-sm-1 mb-2">
							<select class="form-control" name="bazi[cn][hour]" required>
								<option value="00">?????? 00</option>
								<option value="01">??? 01</option>
								<option value="03">??? 03</option>
								<option value="05">??? 05</option>
								<option value="07">??? 07</option>
								<option value="09">??? 09</option>
								<option value="11">??? 11</option>
								<option value="13">??? 13</option>
								<option value="15">??? 15</option>
								<option value="17">??? 17</option>
								<option value="19">??? 19</option>
								<option value="21">??? 21</option>
								<option value="23">?????? 23</option>
							</select>
						</div>
						<div class="col-md-2 px-sm-1 mb-2">
							<div class="form-check col-form-label">
								<input class="form-check-input" type="checkbox" id="bazi-s_month" name="bazi[cn][s_month]">
								<label class="form-check-label" for="bazi-s_month">??????</label>
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
						<button id="bazi-pdf" type="submit" class="btn btn-primary fsrepublic-text-gold"><?= Yii::t('app', 'Check') ?></button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>


