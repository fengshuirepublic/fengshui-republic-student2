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
				<p class="m-0 text-center fsrepublic-text-white">?????????????????????????????????????????????????????????????????????????????????</p>
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
						<p class="text-center m-0">???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
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
				<h4 class="text-center fsrepublic-text-gold pt-5 pb-4 m-0">??????????????????</h4>
				<p class="text-center">????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-sm-6 col-xl-4 mx-auto px-0">
				<div id="bg-2" class="p-2 p-md-4">
					<h4 class="m-0 d-none d-md-block text-center fsrepublic-text-white">???????????????????????????????????????<br>????????????????????????????????????</h4>
					<p class="m-0 d-block d-md-none text-center fsrepublic-text-white">???????????????????????????????????????<br>????????????????????????????????????</p>
				</div>
			</div>
		</div>
		<button type="button" class="btn btn-primary my-5 d-flex mx-auto" data-toggle="modal" data-target="#enquiryModal">????????????</button>
	</div>
</div>

<div id="may-like">
	<div class="container py-5">
		<p class="text-center fsrepublic-text-white">?????????????????????</p>
		<div class="row">
			<div class="col-12 col-md-10 mx-auto">
				<div class="row">
					<div class="col-12 col-sm-6 px-0 px-sm-3 mx-auto text-center">
						<img src="../images/service/all-services/service-cn-1.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('services/household-fengshui') ?>" class="btn btn-primary mt-3 mb-5">????????????</a>
					</div>
					<div class="col-12 col-sm-6 px-0 px-sm-3 mx-auto text-center">
						<img src="../images/service/all-services/service-cn-2.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('services/commercial-fengshui') ?>" class="btn btn-primary mt-3 mb-5">????????????</a>
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
						<label for="enquiry_title" class="col-sm-4 col-form-label text-left text-sm-right">*??????</label>
						<div class="col-sm-8">
							<select id="enquiry_title" name="Enquiry[title]" class="form-control form-control-sm" required>
								<option value="">???????????????</option>
								<option value="Mr">??????</option>
								<option value="Mrs">??????</option>
								<option value="Ms">??????</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_chinese_name" class="col-sm-4 col-form-label text-left text-sm-right">*????????????</label>
						<div class="col-sm-8">
							<input id="enquiry_chinese_name" class="form-control form-control-sm" type="text" name="Enquiry[name_cn]" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_english_name" class="col-sm-4 col-form-label text-left text-sm-right">????????????</label>
						<div class="col-sm-8">
							<input id="enquiry_english_name" class="form-control form-control-sm" type="text" name="Enquiry[name_en]">
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_contact" class="col-sm-4 col-form-label text-left text-sm-right">*????????????</label>
						<div class="col-sm-8">
							<input id="enquiry_contact" class="form-control form-control-sm" type="text" name="Enquiry[contact]" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_email" class="col-sm-4 col-form-label text-left text-sm-right">*????????????</label>
						<div class="col-sm-8">
							<input id="enquiry_email" class="form-control form-control-sm" type="email" name="Enquiry[email]" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_type" class="col-sm-4 col-form-label text-left text-sm-right">*??????</label>
						<div class="col-sm-8">
							<select id="enquiry_type" name="Enquiry[info][type]" class="form-control form-control-sm" required>
								<option value="">???????????????</option>
								<option value="Land Selection">????????????</option>
								<option value="Feng Shui Layout">??????????????????</option>
								<option value="Sheng Ji Feng Shui">????????????</option>
								<option value="Others">??????</option>
							</select>
							<div id="other-type-textarea"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_unit" class="col-sm-4 col-form-label text-left text-sm-right">*????????????</label>
						<div class="col-sm-8">
							<select id="enquiry_unit" name="Enquiry[info][unit]" class="form-control form-control-sm" required>
								<option value="">???????????????</option>
								<option value="Single">??????</option>
								<option value="Double">??????</option>
								<option value="Family">??????</option>
								<option value="Royal">??????</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_area" class="col-sm-4 col-form-label text-left text-sm-right">*??????</label>
						<div class="col-sm-8">
							<select id="enquiry_area" name="Enquiry[info][area]" class="form-control form-control-sm" required>
								<option value="">???????????????</option>
								<option value="Johor">??????</option>
								<option value="Selangor">?????????</option>
								<option value="Penang">??????</option>
								<option value="Others">??????</option>
							</select>
							<div id="other-area-textarea"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_remark" class="col-sm-4 col-form-label text-left text-sm-right">??????</label>
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


