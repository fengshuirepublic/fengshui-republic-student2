<?php

use yii\web\View;
use yii\helpers\Url;

$this->registerCssFile("@web/css/service/wedding-date.css?2018-12-18-0000", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->title = Yii::t('app', 'WEDDING DATE SELECTION');

$this->registerCss('
	.fr-style-1 {
		position: relative;
		z-index: -1;
		margin-top: -80px;
	}
');

$this->registerJs('
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
							<source src="../images/service/wedding-date/wedding-date-s.mov">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/wedding-date/wedding-date-lg.mov">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php elseif ($android): ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/wedding-date/wedding-date-s.webm" type="video/webm">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/wedding-date/wedding-date-lg.webm" type="video/webm">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php else: ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/wedding-date/wedding-date-s.mp4" type="video/mp4">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/wedding-date/wedding-date-lg.mp4" type="video/mp4">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php endif; ?>

				<div class="section_overlay"></div>
			</div>
			<div class="seq-absolute seq-model-1-1">
				<img src="../images/service/wedding-date/title-cn.png" class="d-flex mx-auto h-100 w-auto" alt="Fengshui Republic" />
			</div>
		</div>
	</div>
</div>

<div class="fsrepublic-gradient-brown">
	<div class="container py-4">
		<div class="row">
			<div class="col-10 mx-auto">
				<p class="m-0 text-center fsrepublic-text-white">婚嫁大事绝不可马虎行事，择吉日定婚姻，永结同心！</p>
			</div>
		</div>
	</div>
</div>

<div class="container py-5">
	<div class="row mt-3">
		<div class="col-10 mx-auto">
			<p class="text-center">结婚是人生中非常重要的喜事，不止是两个人的是也是两家人的重要大事！所以我们应该根据一对新人的八字，选一个既不冲克又能够为他们带来好运的黄道吉日来进行！</p>
			<p class="text-center">除了嫁娶过门吉日外，我们也将提供过大礼、安床及上头等良辰吉日，让一对新人能够携手完成符合传统但又不繁杂的嫁娶流程，留下美满难忘的珍贵回忆！</p>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-12 px-0">
			<!-- <div id="bg-1">
				<button type="button" class="btn btn-primary d-flex mx-auto" data-toggle="modal" data-target="#enquiryModal">了解更多</button>
			</div> -->
			<div class="container-fluid px-0 d-block d-md-none">
				<button type="button" class="btn btn-primary d-flex mx-auto" data-toggle="modal" data-target="#enquiryModal">了解更多</button>
				<img src="../images/service/wedding-date/offer-tea-s.jpg" class="img-fluid d-flex mx-auto fr-style-1">
			</div>
			<div class="container-fluid px-0 d-none d-md-block">
				<button type="button" class="btn btn-primary d-flex mx-auto" data-toggle="modal" data-target="#enquiryModal">了解更多</button>
				<img src="../images/service/wedding-date/offer-tea-lg.jpg" class="img-fluid d-flex mx-auto fr-style-1">
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
						<img src="../images/service/all-services/service-cn-1.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('services/household-fengshui') ?>" class="btn btn-primary mt-3 mb-5">了解更多</a>
					</div>
					<div class="col-12 col-sm-6 px-0 px-sm-3 mx-auto text-center">
						<img src="../images/service/all-services/service-cn-10.jpg?001" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('services/child-birth-date') ?>" class="btn btn-primary mt-3 mb-5">了解更多</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?= Yii::t('app', 'WEDDING DATE SELECTION'); ?><?= Yii::t('app', 'ENQUIRY'); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= Url::to(['/enquiry']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Enquiry[service]" value="<?= Yii::t('app', 'WEDDING DATE SELECTION'); ?>">
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
						<label for="enquiry_bridegroom" class="col-sm-4 col-form-label text-left text-sm-right">*新郎出生日期</label>
						<div class="col-sm-8">
							<select class="form-control" name="Enquiry[info][bridegroom][year]" required>
								<option value="">請選擇年</option>
								<?php for ($i=2050; $i>1910; $i--): ?>
									<option value="<?= $i ?>"><?= $i ?>年</option>
								<?php endfor; ?>
							</select>
							<select class="form-control" name="Enquiry[info][bridegroom][month]" required>
								<option value="">請選擇月</option>
								<option value="1">一月</option>
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
							<select class="form-control" name="Enquiry[info][bridegroom][day]" required>
								<option value="">請選擇日</option>
								<?php for ($i=1; $i<32; $i++): ?>
									<option value="<?= $i ?>"><?= $i ?>日</option>
								<?php endfor; ?>
							</select>
							<select class="form-control" name="Enquiry[info][bridegroom][hour]" required>
								<option value="">請選擇時</option>
								<?php for ($i=0; $i<24; $i++): ?>
									<option value="<?= $i ?>"><?= $i ?>時</option>
								<?php endfor; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_bride" class="col-sm-4 col-form-label text-left text-sm-right">*新娘出生日期</label>
						<div class="col-sm-8">
							<select class="form-control" name="Enquiry[info][bride][year]" required>
								<option value="">請選擇年</option>
								<?php for ($i=2050; $i>1910; $i--): ?>
									<option value="<?= $i ?>"><?= $i ?>年</option>
								<?php endfor; ?>
							</select>
							<select class="form-control" name="Enquiry[info][bride][month]" required>
								<option value="">請選擇月</option>
								<option value="1">一月</option>
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
							<select class="form-control" name="Enquiry[info][bride][day]" required>
								<option value="">請選擇日</option>
								<?php for ($i=1; $i<32; $i++): ?>
									<option value="<?= $i ?>"><?= $i ?>日</option>
								<?php endfor; ?>
							</select>
							<select class="form-control" name="Enquiry[info][bride][hour]" required>
								<option value="">請選擇時</option>
								<?php for ($i=0; $i<24; $i++): ?>
									<option value="<?= $i ?>"><?= $i ?>時</option>
								<?php endfor; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_bridegroom_father" class="col-sm-4 col-form-label text-left text-sm-right">新郎父親出生日期</label>
						<div class="col-sm-8">
							<textarea id="enquiry_bridegroom_father" name="Enquiry[info][bridegroom_father_birthday]" class="form-control form-control-sm"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_bridegroom_mother" class="col-sm-4 col-form-label text-left text-sm-right">新郎母親出生日期</label>
						<div class="col-sm-8">
							<textarea id="enquiry_bridegroom_mother" name="Enquiry[info][bridegroom_mother_birthday]" class="form-control form-control-sm"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_bride_father" class="col-sm-4 col-form-label text-left text-sm-right">新娘父親出生日期</label>
						<div class="col-sm-8">
							<textarea id="enquiry_bride_father" name="Enquiry[info][bride_father_birthday]" class="form-control form-control-sm"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_bride_mother" class="col-sm-4 col-form-label text-left text-sm-right">新娘母親出生日期</label>
						<div class="col-sm-8">
							<textarea id="enquiry_bride_mother" name="Enquiry[info][bride_mother_birthday]" class="form-control form-control-sm"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_remark" class="col-sm-4 col-form-label text-left text-sm-right">理想日期</label>
						<div class="col-sm-8">
							<textarea id="enquiry_remark" name="Enquiry[info][preferred_date]" class="form-control form-control-sm"></textarea>
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


