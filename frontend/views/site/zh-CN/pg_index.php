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
					<h4 class="mb-3">龙岩风水 <br class="d-block d-sm-none">THE COMPANY</h4>
					<p>罗一鸣是马来西亚最具影响力的风水师，拥有多年的风水命理实战经验，无论在行内或行外皆享誉盛名！</p>
					<p class="m-0">由他所领导的“罗家班”是龙岩风水的核心团队，每一位都由罗师傅亲自指导，受过最正统及最完善的风水命理培训，能够为顾客提供最专业的阳宅风水、祖坟风水、生基风水、商宅风水、婴儿命名、成人改名、八字批命、择日婚嫁、择日生产及择日入伙等一站式风水命理服务。</p>
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
					<p class="fsrepublic-text-white">龙岩风水也提供奇门遁甲课程、风水课程、八字课程、易经课程、面相课程等等，以深入浅出及实战教学方法，让所有对玄学充满兴趣但又一窍不通的学员得到最正统及最完善的教学。通过有系统的教学方法，至今从龙岩风水毕业的学生已经桃李满天下！</p>
					<p class="fsrepublic-text-white m-0">龙岩三有：“有系统、 有口碑、有名望”的特色，对于顾客所提出的疑问都能够做出正确及快速的解答，让所有将风水命理交给龙岩风水的顾客都能够安心、放心，称心！龙岩风水也提供奇门遁甲课程、风水课程、八字课程、易经课程、面相课程等等，以深入浅出及实战教学方法，让所有对玄学充满兴趣但又一窍不通的学员得到最正统及最完善的教学。通过有系统的教学方法，至今从龙岩风水毕业的学生已经桃李满天下！</p>
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
								<p class="text-center fsrepublic-text-white">Consultations<br>服务</p>
							</a>
						</div>
						<div class="col-4 col-md-3 px-0">
							<a href="<?= Url::to(['courses/all-courses']) ?>">
								<img class="img-fluid" src="images/fr/logo-courses.png" alt="Fengshui Republic">
								<p class="text-center fsrepublic-text-white">Courses<br>课程</p>
							</a>
						</div>
						<div class="col-4 col-md-3 px-0">
							<a href="<?= Url::to(['services/talks-events']) ?>">
								<img class="img-fluid" src="images/fr/logo-event_talk.png" alt="Fengshui Republic">
								<p class="text-center fsrepublic-text-white">Event Talk<br>讲座</p>
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
		<h4 class="text-center fsrepublic-text-gold mb-4">FREE TOOLS<br>免费工具</h4>
		<div class="row">
			<div class="col-11 col-md-7 mx-auto">
				<div class="row">
					<div class="col-6 col-md-4">
						<a href="#naming">
							<img class="img-fluid mb-4" src="images/republic/tools/cn-tool-naming.png" alt="Fengshui Republic">
						</a>
					</div>
					<div class="col-6 col-md-4">
						<a href="#bazi">
							<img class="img-fluid mb-4" src="images/republic/tools/cn-tool-bazi.png?003" alt="Fengshui Republic">
						</a>
					</div>
					<div class="col-6 col-md-4">
						<a href="<?= Yii::$app->urlManager->createUrl('qimen') ?>">
							<img class="img-fluid mb-4" src="images/republic/tools/cn-tool-qimen.png" alt="Fengshui Republic">
						</a>
					</div>
					<div class="col-6 col-md-4">
						<a href="<?= Yii::$app->urlManager->createUrl('flying-star') ?>">
							<img class="img-fluid mb-4" src="images/republic/tools/cn-tool-star.png" alt="Fengshui Republic">
						</a>
					</div>
					<div class="col-6 col-md-4">
						<a href="<?= Yii::$app->urlManager->createUrl('eight-mansion') ?>">
							<img class="img-fluid mb-4" src="images/republic/tools/cn-tool-8mansion.png?003" alt="Fengshui Republic">
						</a>
					</div>
					<div class="col-6 col-md-4">
						<a href="<?= Url::to('http://gerenjifang.fengshui-republic.com/') ?>">
							<img class="img-fluid mb-4" src="images/republic/tools/cn-tool-direction.png" alt="Fengshui Republic">
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
								<h5 class="text-center fsrepublic-text-gold mt-1 mb-3"><?= $shortcut->name_cn ?></h5>
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
											<option value="<?= $i ?>"><?= $i ?> 年</option>
										<?php endfor; ?>
									</select>
								</div>
								<div class="col-md-2 px-sm-1 mb-2">
									<select id="en-month" class="form-control" name="bazi[en][month]" required <?= Yii::$app->user->isGuest ? 'disabled' : '' ?>>
										<option value="1">1月</option>
										<option value="2">2月</option>
										<option value="3">3月</option>
										<option value="4">4月</option>
										<option value="5">5月</option>
										<option value="6">6月</option>
										<option value="7">7月</option>
										<option value="8">8月</option>
										<option value="9">9月</option>
										<option value="10">10月</option>
										<option value="11">11月</option>
										<option value="12">12月</option>
									</select>
								</div>
								<div class="col-md-2 px-sm-1 mb-2">
									<select id="en-day" class="form-control" name="bazi[en][day]" required <?= Yii::$app->user->isGuest ? 'disabled' : '' ?>>
										<?php for ($i=1; $i<32; $i++): ?>
											<option value="<?= $i ?>"><?= $i ?>日</option>
										<?php endfor; ?>
									</select>
								</div>
								<div class="col-md-2 px-sm-1 mb-2">
									<select id="en-hour" class="form-control" name="bazi[en][hour]" required <?= Yii::$app->user->isGuest ? 'disabled' : '' ?>>
										<?php for ($i=0; $i<24; $i++): ?>
											<option value="<?= $i ?>"><?= $i ?> 时</option>
										<?php endfor; ?>
									</select>
								</div>
								<div class="col-md-2 px-sm-1 mb-2">
									<select id="en-minute" class="form-control" name="bazi[en][minute]" required <?= Yii::$app->user->isGuest ? 'disabled' : '' ?>>
										<?php for ($i=0; $i<60; $i++): ?>
											<option value="<?= $i ?>"><?= $i ?> 分</option>
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
											<option value="<?= $i ?>"><?= $i ?> 年</option>
										<?php endfor; ?>
									</select>
								</div>
								<div class="col-md-2 px-sm-1 mb-2">
									<select class="form-control" name="bazi[cn][month]" required <?= Yii::$app->user->isGuest ? 'disabled' : '' ?>>
										<option value="1">正月</option>
										<option value="2">二月</option>
										<option value="3">三月</option>
										<option value="4">四月</option>
										<option value="5">五月</option>
										<option value="6">六月</option>
										<option value="7">七月</option>
										<option value="8">八月</option>
										<option value="9">九月</option>
										<option value="10">十月</option>
										<option value="11">十一月</option>
										<option value="12">十二月</option>
									</select>
								</div>
								<div class="col-md-2 px-sm-1 mb-2">
									<select class="form-control" name="bazi[cn][day]" required <?= Yii::$app->user->isGuest ? 'disabled' : '' ?>>
										<option value="1">初一</option>
										<option value="2">初二</option>
										<option value="3">初三</option>
										<option value="4">初四</option>
										<option value="5">初五</option>
										<option value="6">初六</option>
										<option value="7">初七</option>
										<option value="8">初八</option>
										<option value="9">初九</option>
										<option value="10">初十</option>
										<option value="11">十一</option>
										<option value="12">十二</option>
										<option value="13">十三</option>
										<option value="14">十四</option>
										<option value="15">十五</option>
										<option value="16">十六</option>
										<option value="17">十七</option>
										<option value="18">十八</option>
										<option value="19">十九</option>
										<option value="20">二十</option>
										<option value="21">廿一</option>
										<option value="22">廿二</option>
										<option value="23">廿三</option>
										<option value="24">廿四</option>
										<option value="25">廿五</option>
										<option value="26">廿六</option>
										<option value="27">廿七</option>
										<option value="28">廿八</option>
										<option value="29">廿九</option>
										<option value="30">三十</option>
									</select>
								</div>
								<div class="col-md-2 px-sm-1 mb-2">
									<select class="form-control" name="bazi[cn][hour]" required <?= Yii::$app->user->isGuest ? 'disabled' : '' ?>>
										<option value="00">早子 00</option>
										<option value="01">丑 01</option>
										<option value="03">寅 03</option>
										<option value="05">卯 05</option>
										<option value="07">辰 07</option>
										<option value="09">巳 09</option>
										<option value="11">午 11</option>
										<option value="13">未 13</option>
										<option value="15">申 15</option>
										<option value="17">酉 17</option>
										<option value="19">戌 19</option>
										<option value="21">亥 21</option>
										<option value="23">晚子 23</option>
									</select>
								</div>
								<div class="col-md-2 px-sm-1 mb-2">
									<div class="form-check col-form-label">
										<input class="form-check-input" type="checkbox" id="bazi-s_month" name="bazi[cn][s_month]" <?= Yii::$app->user->isGuest ? 'disabled' : '' ?>>
										<label class="form-check-label" for="bazi-s_month">闰月</label>
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

