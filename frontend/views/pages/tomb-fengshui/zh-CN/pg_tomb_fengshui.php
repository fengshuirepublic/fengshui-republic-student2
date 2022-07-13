<?php

use yii\web\View;
use yii\helpers\Url;

$this->registerCssFile("@web/css/service/tomb-fengshui.css?2018-12-18-0000", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->title = Yii::t('app', 'TOMB FENGSHUI');

$this->registerCss('
');

$this->registerJs('
	$("#videoModal").on("hidden.bs.modal", function () {
		$("#yt-video iframe").attr("src", $("#yt-video iframe").attr("src"));
	});

	$("#enquiry_type").change(function() {
		var value = $(this).val();
		if(value=="Others") {
			$("#other-type-textarea").append("<textarea name=\"Enquiry[info][typeOther]\" class=\"form-control form-control-sm mt-2 other-textarea\" required></textarea>");
		} else {
			$("#other-type-textarea").empty()
		}
	});

	$("#enquiry_area").change(function() {
		var value = $(this).val();
		if(value=="Others") {
			$("#other-area-textarea").append("<textarea name=\"Enquiry[info][areaOther]\" class=\"form-control form-control-sm mt-2 other-textarea\" required></textarea>");
		} else {
			$("#other-area-textarea").empty();
		}
	});
', View::POS_END);

$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
$android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");

?>

<div class="container-fluid px-0">
	<div class="seq">
		<div class="seq-canvas">
			<div class="seq-absolute seq-background">
				<?php if ($iPod || $iPhone || $iPad): ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/tomb-fengshui/tomb-fengshui-s.mov">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/tomb-fengshui/tomb-fengshui-lg.mov">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php elseif ($android): ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/tomb-fengshui/tomb-fengshui-s.webm" type="video/webm">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/tomb-fengshui/tomb-fengshui-lg.webm" type="video/webm">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php else: ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/tomb-fengshui/tomb-fengshui-s.mp4" type="video/mp4">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/tomb-fengshui/tomb-fengshui-lg.mp4" type="video/mp4">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php endif; ?>

				<div class="section_overlay"></div>
			</div>
			<div class="seq-absolute seq-model-1-1">
				<img src="../images/service/tomb-fengshui/title-cn.png" class="d-flex mx-auto h-100 w-auto" alt="Fengshui Republic" />
			</div>
		</div>
	</div>
</div>

<div class="fsrepublic-gradient-brown">
	<div class="container py-4">
		<div class="row">
			<div class="col-10 mx-auto">
				<p class="m-0 text-center fsrepublic-text-white">阴宅风水影响重大深远，做不好祸延后代，做得正确子孙兴旺</p>
			</div>
		</div>
	</div>
</div>

<div id="bg-1">
	<div class="container py-5 pb-md-3">
		<div class="row my-3 my-md-5">
			<div class="col-10 mx-auto">
				<div class="row">
					<div class="col-12 col-md-5 offset-md-1 pt-lg-5">
						<p class="text-center m-0">阴宅（坟墓）风水是风水学的根源，能够影响家族至少三代子孙的兴旺衰败！一位正统及专业的风水师可从一个坟墓的外形得知家族是兴旺发达或是衰败损丁，可见阴宅风水的重要性！</p>
					</div>
					<div class="col-12 col-md-6">
						<img src="../images/service/tomb-fengshui/video.jpg" class="img-fluid d-none d-md-block" width="400" data-toggle="modal" data-target="#videoModal" style="cursor: pointer">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid px-0">
		<img src="../images/service/tomb-fengshui/video.jpg" class="img-fluid w-100 d-block d-md-none" data-toggle="modal" data-target="#videoModal" style="cursor: pointer">
		<img src="../images/service/tomb-fengshui/master.jpg" class="img-fluid w-100 d-block d-sm-none mt-5">
	</div>
	<div class="container pb-5">
		<div class="row">
			<div class="col-10 mx-auto">
				<img src="../images/fr/line.png" class="img-fluid w-100 d-none d-md-block">
			</div>
		</div>
		<div class="row">
			<div class="col-10 col-md-8 mx-auto mt-sm-5 mb-5">
				<div class="d-none d-sm-block">
					<img src="../images/service/tomb-fengshui/master.jpg" class="img-fluid d-flex mx-auto" width="350">
				</div>
				<h4 class="text-center fsrepublic-text-gold pt-5 pb-4 m-0">专业阴宅堪舆</h4>
				<p class="text-center">专业的风水师会从寻地、分析土质、点穴、分金、寿洞之深潜、下葬时间及方位、罗盘的度数、开龙口、呼龙、开水口、立碑立向等都一一做足。切记，阴宅风水不只是棺木的摆放或是坟墓外形美观与否而已。所谓：“分金差一线，富贵不相见；分金分对线，富贵子孙见”，吉祥风水宝地加上正统及专业风水师处理，肯定能让子孙兴旺、家族和谐平安！</p>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-sm-6 col-xl-4 mx-auto px-0">
				<div id="bg-2" class="p-2 p-md-4">
					<h4 class="m-0 d-none d-md-block text-center fsrepublic-text-white">“分金差一线，富贵不相见；<br>分金分对线，富贵子孙见”</h4>
					<p class="m-0 d-block d-md-none text-center fsrepublic-text-white">“分金差一线，富贵不相见；<br>分金分对线，富贵子孙见”</p>
				</div>
			</div>
		</div>
		<button type="button" class="btn btn-primary my-5 d-flex mx-auto" data-toggle="modal" data-target="#enquiryModal">了解更多</button>
	</div>
</div>

<div id="may-like">
	<div class="container py-5">
		<p class="text-center fsrepublic-text-white">您可能也会喜欢</p>
		<div class="row">
			<div class="col-12 col-md-10 mx-auto">
				<div class="row">
					<div class="col-12 col-sm-6 px-0 px-sm-3 mx-auto text-center">
						<img src="../images/service/all-services/service-cn-1.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('services/household-fengshui') ?>" class="btn btn-primary mt-3 mb-5">了解更多</a>
					</div>
					<div class="col-12 col-sm-6 px-0 px-sm-3 mx-auto text-center">
						<img src="../images/service/all-services/service-cn-2.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('services/commercial-fengshui') ?>" class="btn btn-primary mt-3 mb-5">了解更多</a>
					</div>
				</div>
			</div>
		</div>
	</div>
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
					<iframe class="embed-responsive embed-responsive-1by1" width="560" height="315" src="https://www.youtube.com/embed/gTfSyi4ENb4?start=18" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?= Yii::t('app', 'TOMB FENGSHUI'); ?> <?= Yii::t('app', 'ENQUIRY'); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= Url::to(['/enquiry']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Enquiry[service]" value="<?= Yii::t('app', 'TOMB FENGSHUI'); ?>">
				<div class="modal-body">
					<div class="form-group row">
						<label for="enquiry_title" class="col-sm-4 col-form-label text-left text-sm-right">*稱呼</label>
						<div class="col-sm-8">
							<select id="enquiry_title" name="Enquiry[title]" class="form-control form-control-sm" required>
								<option value="">請選擇一項</option>
								<option value="Mr">先生</option>
								<option value="Mrs">太太</option>
								<option value="Ms">女士</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_chinese_name" class="col-sm-4 col-form-label text-left text-sm-right">*中文名字</label>
						<div class="col-sm-8">
							<input id="enquiry_chinese_name" class="form-control form-control-sm" type="text" name="Enquiry[name_cn]" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_english_name" class="col-sm-4 col-form-label text-left text-sm-right">英文名字</label>
						<div class="col-sm-8">
							<input id="enquiry_english_name" class="form-control form-control-sm" type="text" name="Enquiry[name_en]">
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_contact" class="col-sm-4 col-form-label text-left text-sm-right">*聯絡號碼</label>
						<div class="col-sm-8">
							<input id="enquiry_contact" class="form-control form-control-sm" type="text" name="Enquiry[contact]" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_email" class="col-sm-4 col-form-label text-left text-sm-right">*電郵地址</label>
						<div class="col-sm-8">
							<input id="enquiry_email" class="form-control form-control-sm" type="email" name="Enquiry[email]" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_type" class="col-sm-4 col-form-label text-left text-sm-right">*類型</label>
						<div class="col-sm-8">
							<select id="enquiry_type" name="Enquiry[info][type]" class="form-control form-control-sm" required>
								<option value="">請選擇一項</option>
								<option value="Land Selection">福地挑選</option>
								<option value="Feng Shui Layout">祖墳風水佈局</option>
								<option value="Sheng Ji Feng Shui">生基風水</option>
								<option value="Others">其他</option>
							</select>
							<div id="other-type-textarea"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_unit" class="col-sm-4 col-form-label text-left text-sm-right">*選擇單位</label>
						<div class="col-sm-8">
							<select id="enquiry_unit" name="Enquiry[info][unit]" class="form-control form-control-sm" required>
								<option value="">請選擇一項</option>
								<option value="Single">單穴</option>
								<option value="Double">雙穴</option>
								<option value="Family">家族</option>
								<option value="Royal">皇族</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_area" class="col-sm-4 col-form-label text-left text-sm-right">*地區</label>
						<div class="col-sm-8">
							<select id="enquiry_area" name="Enquiry[info][area]" class="form-control form-control-sm" required>
								<option value="">請選擇一項</option>
								<option value="Johor">柔佛</option>
								<option value="Selangor">雪蘭莪</option>
								<option value="Penang">檳城</option>
								<option value="Others">其他</option>
							</select>
							<div id="other-area-textarea"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_remark" class="col-sm-4 col-form-label text-left text-sm-right">備註</label>
						<div class="col-sm-8">
							<textarea id="enquiry_remark" name="Enquiry[info][remark]" class="form-control form-control-sm"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><?= Yii::t('app', 'Close'); ?></button>
					<button type="submit" class="btn btn-primary"><?= Yii::t('app', 'Submit'); ?></button>
				</div>
			</form>
		</div>
	</div>
</div>


