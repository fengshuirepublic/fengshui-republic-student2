<?php

use yii\web\View;
use yii\helpers\Url;

$this->registerCssFile("@web/css/service/talks-events.css?2018-12-18-0000", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->title = Yii::t('app', 'TALKS & EVENTS');

$this->registerCss('
');

$this->registerJs('
	$("#videoModal").on("hidden.bs.modal", function () {
		$("#yt-video iframe").attr("src", $("#yt-video iframe").attr("src"));
	});
', View::POS_END);

?>

<div class="container-fluid px-0">
	<div class="seq">
		<div class="seq-canvas">
			<div class="seq-absolute seq-background">
				<div id="main_image_1_1" class="d-none d-md-block"></div>
				<div id="main_image_1_2" class="d-block d-md-none"></div>
				<div class="section_overlay"></div>
			</div>
			<div class="seq-absolute seq-model-1-1">
				<img src="../images/service/talks-events/title-cn.png" class="d-flex mx-auto h-100 w-auto" alt="Fengshui Republic" />
			</div>
		</div>
	</div>
</div>

<div class="fsrepublic-gradient-brown">
	<div class="container py-4">
		<div class="row">
			<div class="col-10 mx-auto">
				<p class="m-0 text-center fsrepublic-text-white">世界级千人讲座</p>
			</div>
		</div>
	</div>
</div>

<div id="bg-1">
	<div class="container py-5">
		<div class="row">
			<div class="col-10 mx-auto">
				<p class="text-left text-md-center">每一年罗一鸣师傅都会在吉隆坡会展中心KLCC及五星级酒店举办讲座，他也是马来西亚唯一能够以个人能力号召举办近万人出席讲座的风水师。</p>
				<p class="text-left text-md-center">参与讲座者来自世界各地，如马来西亚、新加坡、中国、文莱、印尼、台湾、英国等，是一名真正跨足世界、具有影响力的重量级风水师！</p>
			</div>
		</div>
		<div class="row">
			<div class="col-12 px-0 px-md-5">
				<img src="../images/service/talks-events/video.jpg?20190602" class="img-fluid d-flex mx-auto" width="400" data-toggle="modal" data-target="#videoModal" style="cursor: pointer">
			</div>
		</div>
		<div class="row">
			<div class="col-12 pt-5">
				<button type="button" class="btn btn-primary d-flex mx-auto" data-toggle="modal" data-target="#enquiryModal">了解更多</button>
			</div>
		</div>
	</div>
</div>

<div id="may-like">
	<div class="container py-5">
		<p class="text-center fsrepublic-text-white">您可能也会喜欢</p>
		<div class="row">
			<div class="col-12 col-md-10 mx-auto">
				<div class="row">
					<div class="col-12 col-sm-6 px-0 px-sm-3 mx-auto text-center">
						<img src="../images/service/all-services/service-cn-3.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('services/property-development') ?>" class="btn btn-primary mt-3 mb-5">了解更多</a>
					</div>
					<div class="col-12 col-sm-6 px-0 px-sm-3 mx-auto text-center">
						<img src="../images/service/all-services/service-cn-11.jpg" class="img-fluid w-100">
						<a href="javascript:void(0)" class="btn btn-primary mt-3 mb-5">了解更多</a>
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
					<iframe class="embed-responsive embed-responsive-1by1" width="560" height="315" src="https://www.youtube.com/embed/XoSgDtMfkdg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?= Yii::t('app', 'TALKS & EVENTS'); ?><?= Yii::t('app', 'ENQUIRY'); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= Url::to(['/enquiry']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Enquiry[service]" value="<?= Yii::t('app', 'TALKS & EVENTS'); ?>">
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
						<label for="enquiry_type" class="col-sm-4 col-form-label text-left text-sm-right">*讲座類型</label>
						<div class="col-sm-8">
							<select id="enquiry_type" name="Enquiry[info][type]" class="form-control form-control-sm" required>
								<option value="">請選擇一項</option>
								<option value="Residential Development">屋業發展</option>
								<option value="Commercial Development">商業發展</option>
								<option value="Graveyard Development">墓地發展</option>
								<option value="Others">其他</option>
							</select>
							<div id="other-type-textarea"></div>
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


