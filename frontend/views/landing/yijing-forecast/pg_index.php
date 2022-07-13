<?php

use frontend\assets\AppAsset;
use yii\web\View;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Yi Jing Forecast');

$this->registerJsFile("@web/core/moment/moment-2.13.0.js", [
	'depends' => AppAsset::className(),
]);

$this->registerJs('
	function update() {
		$(".current-time").html(moment().format("YYYY-MM-DD HH:mm"));
	}

	setInterval(update, 1000);

	$("#yijing-current-time").on("click", function(){
		var dateObj = new Date();
		var year    = dateObj.getFullYear();
		var month   = dateObj.getMonth()+1; 
		var day     = dateObj.getDate();
		var hour    = dateObj.getHours();
		var minute  = dateObj.getMinutes();

		$("#current-time-year").val(year);
		$("#current-time-month").val(month);
		$("#current-time-day").val(day);
		$("#current-time-hour").val(hour);
		$("#current-time-minute").val(minute);

		$("#yijing-current-time-form").submit();
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
	#yijingTabContent {
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
	input[type=number]::-webkit-inner-spin-button,
	input[type=number]::-webkit-outer-spin-button {
		-webkit-appearance: none;
		margin: 0;
	}

	#yijing-div {
		background-image: url("../images/yijing-forecast/bg.jpg");
		background-repeat: no-repeat;
		background-position: top center;
		background-size: cover;
		min-height: 800px;
	}
');

?>

<div id="yijing-div" class="container-fluid py-3">
	<div class="row justify-content-center">
		<div class="col-10">
			<img src="<?= Yii::$app->urlManager->createUrl('/images/yijing-forecast/logo.png') ?>" class="img-fluid d-flex mx-auto" width="140">
			<img src="<?= Yii::$app->urlManager->createUrl('/images/yijing-forecast/title.png') ?>" class="img-fluid d-flex mx-auto py-4 pb-5" width="300">
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-12 col-sm-10">
			<ul class="nav nav-tabs" id="yijingTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="current-time-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">現時<br class="d-block d-sm-none">起卦</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="select-number-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">報數<br class="d-block d-sm-none">起卦</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="select-gua-tab" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">指定<br class="d-block d-sm-none">起卦</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="select-phone-tab" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false">電話<br class="d-block d-sm-none">起卦</a>
				</li>
			</ul>
			<div class="tab-content" id="yijingTabContent">
				<div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="current-time-tab">
					<div class="card">
						<div class="card-body card-dark current-time px-1"></div>
					</div>
					<br>
					<div class="row justify-content-center">
						<div class="col-sm-9 col-md-12 col-lg-5 col-xl-4">
							<form id="yijing-current-time-form" method="post" role="form" target="_blank">
								<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
								<input type="hidden" id="current-time-year" name="Yijing[1][year]">
								<input type="hidden" id="current-time-month" name="Yijing[1][month]">
								<input type="hidden" id="current-time-day" name="Yijing[1][day]">
								<input type="hidden" id="current-time-hour" name="Yijing[1][hour]">
								<input type="hidden" id="current-time-minute" name="Yijing[1][minute]">
								<button id="yijing-current-time" type="button" class="btn btn-block btn-primary">立刻分析</button>
							</form>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="select-number-tab">
					<form class="py-3" id="yijing-select-number-form" method="post" role="form" target="_blank">
						<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
						<div class="row justify-content-center">
							<div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2">
								<label class="pl-2 w-100" for="number_1">數字一</label>
								<input id="number_1" type="number" step="1" max="99" min="0" class="form-control" name="Yijing[2][number_1]" placeholder="0 至 99" required>
							</div>
							<div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2">
								<label class="pl-2 w-100" for="number_1">數字二</label>
								<input id="number_2" type="number" step="1" max="99" min="0" class="form-control" name="Yijing[2][number_2]" placeholder="0 至 99" required>
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-sm-8 col-md-6 col-lg-6 col-xl-4">
								<button type="submit" class="btn btn-block btn-primary mt-3">立刻分析</button>
							</div>
						</div>
					</form>
				</div>
				<div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="select-gua-tab">
					<form class="py-3" id="yijing-select-gua-form" method="post" role="form" target="_blank">
						<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
						<div class="row justify-content-center">
							<div class="col-4 col-sm-3 col-md-2 col-lg-2 col-xl-2 px-1">
								<div class="form-group">
									<label class="pl-2 w-100" for="gua_up">上卦</label>
									<select name="Yijing[3][gua_up]" class="form-control" id="gua_up" required>
										<option value="1">1 乾</option><!-- Qian -->
										<option value="2">2 兌</option><!-- Dui -->
										<option value="3">3 離</option><!-- Li -->
										<option value="4">4 震</option><!-- Zhen -->
										<option value="5">5 巽</option><!-- Xun -->
										<option value="6">6 坎</option><!-- Kan -->
										<option value="7">7 艮</option><!-- Gen -->
										<option value="8">8 坤</option><!-- Kun -->
									</select>
								</div>
							</div>
							<div class="col-4 col-sm-3 col-md-2 col-lg-2 col-xl-2 px-1">
								<div class="form-group">
									<label class="pl-2 w-100" for="gua_down">下掛</label>
									<select name="Yijing[3][gua_down]" class="form-control" id="gua_down" required>
										<option value="1">1 乾</option>
										<option value="2">2 兌</option>
										<option value="3">3 離</option>
										<option value="4">4 震</option>
										<option value="5">5 巽</option>
										<option value="6">6 坎</option>
										<option value="7">7 艮</option>
										<option value="8">8 坤</option>
									</select>
								</div>
							</div>
							<div class="col-4 col-sm-3 col-md-2 col-lg-2 col-xl-2 px-1">
								<div class="form-group">
									<label class="pl-2 w-100" for="yao_number">動爻</label>
									<select name="Yijing[3][yao_number]" class="form-control" id="yao_number" required>
										<option value="1">1 初</option><!-- 壹 -->
										<option value="2">2 二</option><!-- 贰 -->
										<option value="3">3 三</option><!-- 叁 -->
										<option value="4">4 四</option><!-- 肆 -->
										<option value="5">5 五</option><!-- 伍 -->
										<option value="6">6 上</option><!-- 陆 -->
									</select>
								</div>
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-sm-9 col-md-6 col-lg-6 col-xl-3 px-1">
								<button type="submit" class="btn btn-block btn-primary">立刻分析</button>
							</div>
						</div>
					</form>
				</div>
				<div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="select-phone-tab">
					<form class="py-3" id="yijing-select-phone-form" method="post" role="form" target="_blank">
						<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
						<div class="row justify-content-center">
							<div class="col-sm-9 col-md-6 col-lg-6 col-xl-3 px-1">
								<label class="pl-2 w-100" for="phone">電話號碼</label>
								<input id="phone" type="number" step="1" min="0" max="99999999999999" class="form-control" name="Yijing[4][phone]" required>
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-sm-9 col-md-6 col-lg-6 col-xl-3 px-1">
								<button type="submit" class="btn btn-block btn-primary mt-3">立刻分析</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>