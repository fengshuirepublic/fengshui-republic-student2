<?php

use yii\web\View;
use yii\helpers\Url;

$this->registerCssFile("@web/stand/slick/slick-theme.css", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->registerCssFile("@web/stand/slick/slick.css", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->registerCssFile("@web/css/home.css?2019-03-03-0000", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->registerJsFile("@web/stand/slick/slick.min.js", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->registerJsFile("@web/js/custom.js?2018-12-30-0000", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->title = Yii::t('app', 'HOME');

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

	$("#videoModal").on("hidden.bs.modal", function () {
		$("#yt-video iframe").attr("src", $("#yt-video iframe").attr("src"));
	});

	$(".main-slide").slick({
		speed: 500,
		arrows: false,
		autoplay: true,
		infinite: true
	});
', View::POS_END);

$this->registerCss('
	// .messenger-icon-move {
	// 	right: 65pt !important;
	// }

	@media (max-width: 575px){
		.fsrepublic-gradient-brown p {
			font-size: 13px;
		}
	}
');

?>

<?php //echo (Yii::$app->user->isGuest) ? 'guest' : Yii::$app->user->identity->email.', '.Yii::$app->user->identity->amount_login.', '.Yii::$app->user->identity->user_id ?>

<div id="fsrepublic-tools">
	<div class="fsrepublic-tools-menu-wrap">
		<div class="fsrepublic-tools-menu back-to-top" style="height: 26px; border: none;">
			<div class="d-flex justify-content-center">
				<i class="fa fa-4x fa-angle-double-up" aria-hidden="true"></i>
			</div>
		</div>
	</div>
	<div class="fsrepublic-tools-menu-wrap">
		<div id="fsrepublic-tools-dropdown" class="fsrepublic-tools-menu">
			<img class="d-flex mx-auto" src="images/republic/tools/tool-icon.png" width="30" alt="Fengshui Republic">
			<div class="text-center fsrepublic-tools-text"><?= Yii::t('app', 'FREE TOOLS') ?></div>
			<div class="d-flex justify-content-center">
				<i class="fa fa-lg fa-caret-down" aria-hidden="true"></i>
			</div>
		</div>
	</div>
	<div id="fsrepublic-tools-item-list">
		<div class="fsrepublic-tools-item-wrap" style="padding-top: 1em;">
			<a href="#naming">
				<div class="fsrepublic-tools-item">
					<img class="d-flex mx-auto" src="images/republic/tools/tool-naming.png" width="30" alt="Fengshui Republic">
					<div class="text-center fsrepublic-tools-item-text">
						<span>NAMING<br>ANALYSYS</span>
					</div>
				</div>
			</a>
		</div>
		<div class="fsrepublic-tools-item-wrap">
			<a href="#bazi">
				<div class="fsrepublic-tools-item">
					<img class="d-flex mx-auto" src="images/republic/tools/tool-bazi.png" width="30" alt="Fengshui Republic">
					<div class="text-center fsrepublic-tools-item-text">
						<span>BAZI<br>CHART</span>
					</div>
				</div>
			</a>
		</div>
		<div class="fsrepublic-tools-item-wrap">
			<a href="<?= Yii::$app->urlManager->createUrl('qimen') ?>">
				<div class="fsrepublic-tools-item">
					<img class="d-flex mx-auto" src="images/republic/tools/tool-qimen.png" width="30" alt="Fengshui Republic">
					<div class="text-center fsrepublic-tools-item-text">
						<span>QI MEN<br>DUN JIA</span>
					</div>
				</div>
			</a>
		</div>
		<div class="fsrepublic-tools-item-wrap">
			<a href="<?= Yii::$app->urlManager->createUrl('flying-star') ?>">
				<div class="fsrepublic-tools-item">
					<img class="d-flex mx-auto" src="images/republic/tools/tool-star.png" width="30" alt="Fengshui Republic">
					<div class="text-center fsrepublic-tools-item-text">
						<span>FLYING<br>STAR</span>
					</div>
				</div>
			</a>
		</div>
		<div class="fsrepublic-tools-item-wrap">
			<a href="<?= Yii::$app->urlManager->createUrl('eight-mansion') ?>">
				<div class="fsrepublic-tools-item">
					<img class="d-flex mx-auto" src="images/republic/tools/tool-8mansion.png" width="30" alt="Fengshui Republic">
					<div class="text-center fsrepublic-tools-item-text">
						<span>EIGHT<br>MANSION</span>
					</div>
				</div>
			</a>
		</div>
		<div class="fsrepublic-tools-item-wrap">
			<a href="<?= Url::to('http://gerenjifang.fengshui-republic.com/') ?>" target="_blank">
				<div class="fsrepublic-tools-item">
					<img class="d-flex mx-auto" src="images/republic/tools/tool-direction.png" width="30" alt="Fengshui Republic">
					<div class="text-center fsrepublic-tools-item-text">
						<span>PERSONAL<br>DIRECTION</span>
					</div>
				</div>
			</a>
		</div>
	</div>
</div>

<div class="container-fluid px-0">
	<div class="main-slide">
		<?php foreach ($slides as $slide): ?>
			<div>
				<a href="<?= ($slide->url ? $slide->url : 'javascript:void(0)') ?>">
					<img src="<?= Yii::$app->urlManager->createUrl('setting/slider/'.$slide->file.'-small.jpg?'.strtotime($slide->create_date)) ?>" class="img-fluid w-100 d-block d-sm-none" alt="Fengshui Republic">
					<img src="<?= Yii::$app->urlManager->createUrl('setting/slider/'.$slide->file.'-large.jpg?'.strtotime($slide->create_date)) ?>" class="img-fluid w-100 d-none d-sm-block" alt="Fengshui Republic">
				</a>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<div class="container py-5">
	<div class="row">
		<div class="col-10 mx-auto">
			<div class="row">
				<div class="col-12 col-md-6">
					<img src="images/fr/video.jpg" class="img-fluid w-100 mb-4" width="400" data-toggle="modal" data-target="#videoModal" style="cursor: pointer" alt="Fengshui Republic">
				</div>
				<div class="col-12 col-md-5 mx-auto">
					<h4 class="mb-3">THE COMPANY</h4>
					<p class="m-0">Fengshui Republic is founded by Master Louis Loh together with a group of skilled Fengshui practitioners. Master Loh???s life mission is to provide the most professional and authentic services to his customers, including: Residential Fengshui, Ancestral tomb Fengshui, Shengji Fengshui, Commercial Fengshui, Adult and Baby naming, Bazi reading, Wedding date selection, Delivery date selection and House moving date selection.</p>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- <div class="container-fluid px-0">
	<div class="seq">
		<div class="seq-canvas">
			<div class="seq-absolute seq-background">
				<div id="main_image_2_1" class="d-block d-md-none"></div>
				<div id="main_image_2_2" class="d-none d-md-block"></div>
			</div>
		</div>
	</div>
</div> -->

<div class="container-fluid px-0" style="background-color: #000;">
	<div class="d-none d-md-block">
		<img src="images/fr/main-master-2-1.jpg?20190301" class="img-fluid d-flex mx-auto">
	</div>
	<div class="d-block d-md-none">
		<img src="images/fr/main-master-2-2.jpg?20190301" class="img-fluid d-flex mx-auto">
	</div>
</div>

<div id="bg-1">
	<div class="container pt-5">
		<div class="row">
			<div class="col-10 mx-auto">
				<div class="py-0">
					<p class="fsrepublic-text-white">Fengshui Republic is acclaimed for its systematic and reputable results, speedy and professional services with a focus on giving satisfactory solutions to customers as the topmost priority.</p>
					<p class="fsrepublic-text-white m-0">Fengshui Republic is also the first and the only Fengshui-Chinese Metaphysic company to be ISO9001-certified. Master Loh is committed to continue modernizing the traditional art of Fengshui to provide its customers with the most professional Fengshui-Chinese Metaphysic services.</p>
				</div>
			</div>
			<div class="col-12 col-md-11 px-0 pb-5">
				<img src="images/fr/signature.png" class="img-fluid d-flex ml-auto" alt="Fengshui Republic" width="200">
			</div>
			<div class="col-10 mx-auto">
				<img src="images/fr/fse.jpg" class="img-fluid w-100 d-none d-md-block" alt="Fengshui Republic">
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0">
	<img src="images/fr/fse.jpg" class="img-fluid w-100 d-block d-md-none" alt="Fengshui Republic">
</div>

<div class="fsrepublic-gradient-brown">
	<div class="container py-4">
		<div class="row">
			<div class="col-12 col-md-10 mx-auto">
				<div class="row">
					<div class="d-flex justify-content-center">
						<div class="col-4 col-md-3 px-0">
							<a href="<?= Url::to(['services/all-services']) ?>">
								<img class="img-fluid" src="images/fr/logo-consultations.png" alt="Fengshui Republic">
								<p class="text-center fsrepublic-text-white">Consultations</p>
							</a>
						</div>
						<div class="col-4 col-md-3 px-0">
							<a href="<?= Url::to(['courses/all-courses']) ?>">
								<img class="img-fluid" src="images/fr/logo-courses.png" alt="Fengshui Republic">
								<p class="text-center fsrepublic-text-white">Courses</p>
							</a>
						</div>
						<div class="col-4 col-md-3 px-0">
							<a href="<?= Url::to(['services/talks-events']) ?>">
								<img class="img-fluid" src="images/fr/logo-event_talk.png" alt="Fengshui Republic">
								<p class="text-center fsrepublic-text-white">Event Talk</p>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="bg-3">
	<div class="container pt-5">
		<h4 class="text-center fsrepublic-text-gold mb-4">FREE TOOLS</h4>
		<div class="row">
			<div class="col-11 col-md-7 mx-auto">
				<div class="row">
					<div class="col-6 col-md-4">
						<a href="#naming">
							<img class="img-fluid mb-4 tools-box-shadow" src="images/republic/tools/en-tool-naming.png" alt="Fengshui Republic">
						</a>
					</div>
					<div class="col-6 col-md-4">
						<a href="#bazi">
							<img class="img-fluid mb-4 tools-box-shadow" src="images/republic/tools/en-tool-bazi.png?003" alt="Fengshui Republic">
						</a>
					</div>
					<div class="col-6 col-md-4">
						<a href="<?= Yii::$app->urlManager->createUrl('qimen') ?>">
							<img class="img-fluid mb-4 tools-box-shadow" src="images/republic/tools/en-tool-qimen.png" alt="Fengshui Republic">
						</a>
					</div>
					<div class="col-6 col-md-4">
						<a href="<?= Yii::$app->urlManager->createUrl('flying-star') ?>">
							<img class="img-fluid mb-4 tools-box-shadow" src="images/republic/tools/en-tool-star.png" alt="Fengshui Republic">
						</a>
					</div>
					<div class="col-6 col-md-4">
						<a href="<?= Yii::$app->urlManager->createUrl('eight-mansion') ?>">
							<img class="img-fluid mb-4 tools-box-shadow" src="images/republic/tools/en-tool-8mansion.png?003" alt="Fengshui Republic">
						</a>
					</div>
					<div class="col-6 col-md-4">
						<a href="<?= Url::to('http://gerenjifang.fengshui-republic.com/') ?>">
							<img class="img-fluid mb-4 tools-box-shadow" src="images/republic/tools/en-tool-direction.png" alt="Fengshui Republic">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="bg-3">
	<div class="container-fluid px-0 px-md-3 py-5">
		<div class="row px-0 px-md-3 mx-0 mx-md-3">
			<div class="col-12 px-0 px-md-3 mx-auto">
				<div class="row px-0 px-md-3 mx-0 mx-md-3">
					<?php foreach ($shortcuts as $shortcut): ?>
						<div class="col-12 col-md-6 col-lg-4 mx-auto px-0 px-md-3">
							<a href="<?= ($shortcut->url ? $shortcut->url : 'javascript:void(0)') ?>">
								<img class="img-fluid my-2" src="<?= Yii::$app->urlManager->createUrl('setting/shortcut/'.$shortcut->file.'.jpg?'.strtotime($slide->create_date)) ?>" alt="Fengshui Republic">
								<h5 class="text-center fsrepublic-text-gold mt-1 mb-3"><?= $shortcut->name_en ?></h5>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="naming-bazi-bg">
	<div id="naming">
		<div class="container-fluid py-5">
			<h2 class="text-center mb-5"><?= Yii::t('app', 'Free Name Analysis') ?></h2>
			<form id="name-analysis-form" action="<?= Url::to(['name-analysis/']) ?>" method="post" role="form" target="_blank">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<div class="form-row justify-content-center">
					<div class="col-auto mb-2">
						<input name="chinese_name" type="text" class="form-control" placeholder="<?= Yii::t('app', 'Chinese Name') ?>" required <?= Yii::$app->user->isGuest ? 'disabled' : '' ?>>
					</div>
					<div class="col-auto">
						<?php if (Yii::$app->user->isGuest): ?>
							<a href="<?= Url::to(['member/']) ?>" class="btn btn-primary fsrepublic-text-gold"><?= Yii::t('app', 'Register | Login') ?></a>
						<?php else: ?>
							<button id="name-pdf" type="submit" class="btn btn-primary fsrepublic-text-gold"><?= Yii::t('app', 'Check') ?></button>
						<?php endif; ?>
					</div>
				</div>
			</form>
		</div>
	</div>
	<hr>
	<div id="bazi">
		<div class="container-fluid py-5">
			<h2 class="text-center mb-5"><?= Yii::t('app', 'Free Bazi Chart') ?></h2>
			<form id="bazi-analysis-form" action="<?= Url::to(['bazi-analysis/']) ?>" method="post" role="form" target="_blank">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<div class="form-row justify-content-center">
					<div class="col-sm-9 col-md-12 col-lg-10 col-xl-8">
						<div class="form-group row">
							<label for="bazi_chinese_name" class="col-form-label offset-md-1 px-sm-1 col-sm-4 col-md-2">*<?= Yii::t('app', 'Chinese Name') ?></label>
							<div class="col-sm-7">
								<input id="bazi_chinese_name" class="form-control" type="text" name="bazi[chinese_name]" required <?= Yii::$app->user->isGuest ? 'disabled' : '' ?>>
							</div>
						</div>
					</div>
				</div>
				<div class="form-row justify-content-center">
					<div class="col-sm-9 col-md-12 col-lg-10 col-xl-8">
						<div class="form-group row">
							<label for="bazi_english_name" class="col-form-label offset-md-1 px-sm-1 col-sm-4 col-md-2"><?= Yii::t('app', 'English Name') ?></label>
							<div class="col-sm-7">
								<input id="bazi_english_name" class="form-control" type="text" name="bazi[english_name]" <?= Yii::$app->user->isGuest ? 'disabled' : '' ?>>
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
										<input class="custom-control-input" type="radio" name="bazi[gender]" id="bazi-male" value="1" required <?= Yii::$app->user->isGuest ? 'disabled' : '' ?>>
										<label class="custom-control-label" for="bazi-male"><?= Yii::t('app', 'Male') ?></label>
									</div>
								</div>
								<div class="form-check form-check-inline">
									<div class="custom-control custom-radio">
										<input class="custom-control-input" type="radio" name="bazi[gender]" id="bazi-female" value="0" required <?= Yii::$app->user->isGuest ? 'disabled' : '' ?>>
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
										<input class="custom-control-input bazi-calendar" type="radio" name="bazi[calendar]" id="bazi-en" value="1" required <?= Yii::$app->user->isGuest ? 'disabled' : '' ?>>
										<label class="custom-control-label" for="bazi-en"><?= Yii::t('app', 'Western') ?></label>
									</div>
								</div>
								<div class="form-check form-check-inline">
									<div class="custom-control custom-radio">
										<input class="custom-control-input bazi-calendar" type="radio" name="bazi[calendar]" id="bazi-cn" value="0" required <?= Yii::$app->user->isGuest ? 'disabled' : '' ?>>
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
									<select id="en-year" class="form-control" name="bazi[en][year]" required <?= Yii::$app->user->isGuest ? 'disabled' : '' ?>>
										<?php for ($i=2025; $i>1910; $i--): ?>
											<option value="<?= $i ?>"><?= $i ?> year</option>
										<?php endfor; ?>
									</select>
								</div>
								<div class="col-md-2 px-sm-1 mb-2">
									<select id="en-month" class="form-control" name="bazi[en][month]" required <?= Yii::$app->user->isGuest ? 'disabled' : '' ?>>
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
									<select id="en-day" class="form-control" name="bazi[en][day]" required <?= Yii::$app->user->isGuest ? 'disabled' : '' ?>>
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
									<select id="en-hour" class="form-control" name="bazi[en][hour]" required <?= Yii::$app->user->isGuest ? 'disabled' : '' ?>>
										<?php for ($i=0; $i<24; $i++): ?>
											<option value="<?= $i ?>"><?= $i ?> hour</option>
										<?php endfor; ?>
									</select>
								</div>
								<div class="col-md-2 px-sm-1 mb-2">
									<select id="en-minute" class="form-control" name="bazi[en][minute]" required <?= Yii::$app->user->isGuest ? 'disabled' : '' ?>>
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
									<select class="form-control" name="bazi[cn][year]" required <?= Yii::$app->user->isGuest ? 'disabled' : '' ?>>
										<?php for ($i=2025; $i>1910; $i--): ?>
											<option value="<?= $i ?>"><?= $i ?> ???</option>
										<?php endfor; ?>
									</select>
								</div>
								<div class="col-md-2 px-sm-1 mb-2">
									<select class="form-control" name="bazi[cn][month]" required <?= Yii::$app->user->isGuest ? 'disabled' : '' ?>>
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
									<select class="form-control" name="bazi[cn][day]" required <?= Yii::$app->user->isGuest ? 'disabled' : '' ?>>
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
									<select class="form-control" name="bazi[cn][hour]" required <?= Yii::$app->user->isGuest ? 'disabled' : '' ?>>
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
										<input class="form-check-input" type="checkbox" id="bazi-s_month" name="bazi[cn][s_month]" <?= Yii::$app->user->isGuest ? 'disabled' : '' ?>>
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
								<?php if (Yii::$app->user->isGuest): ?>
									<a href="<?= Url::to(['member/']) ?>" class="btn btn-primary fsrepublic-text-gold"><?= Yii::t('app', 'Register | Login') ?></a>
								<?php else: ?>
									<button id="bazi-pdf" type="submit" class="btn btn-primary fsrepublic-text-gold"><?= Yii::t('app', 'Check') ?></button>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- <div id="shadow"></div> -->
</div>

<div class="container-fluid py-0">
	<img src="images/fr/clientele-lg.png" class="img-fluid w-100 d-none d-sm-block px-5" alt="Fengshui Republic">
	<img src="images/fr/clientele-xs.png" class="img-fluid w-100 d-block d-sm-none" alt="Fengshui Republic">
</div>

<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div id="yt-video" class="d-flex justify-content-center">
					<iframe class="embed-responsive embed-responsive-1by1" width="560" height="315" src="https://www.youtube.com/embed/wtq2uHPeEeI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
</div>


