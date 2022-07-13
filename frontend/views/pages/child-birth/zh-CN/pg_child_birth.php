<?php

use yii\web\View;
use yii\helpers\Url;

$this->registerCssFile("@web/css/service/child-birth.css?2018-12-18-0000", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->title = Yii::t('app', 'CHILD BIRTH DATE SELECTION');

$this->registerCss('
	.fr-style-1 {
		position: relative;
		z-index: -1;
		margin-top: -80px;
	}
');

$this->registerJs('
	$("#enquiry_gender").change(function() {
		var value = $(this).val();
		if(value=="Others") {
			$("#other-gender-textarea").append("<textarea name=\"Enquiry[info][genderOther]\" class=\"form-control form-control-sm mt-2 other-textarea\" required></textarea>");
		} else {
			$("#other-gender-textarea").empty();
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
							<source src="../images/service/child-birth/child-birth-s.mov">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/child-birth/child-birth-lg.mov">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php elseif ($android): ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/child-birth/child-birth-s.webm" type="video/webm">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/child-birth/child-birth-lg.webm" type="video/webm">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php else: ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/child-birth/child-birth-s.mp4" type="video/mp4">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/child-birth/child-birth-lg.mp4" type="video/mp4">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php endif; ?>

				<div class="section_overlay"></div>
			</div>
			<div class="seq-absolute seq-model-1-1">
				<img src="../images/service/child-birth/title-cn.png?001" class="d-flex mx-auto h-100 w-auto" alt="Fengshui Republic" />
			</div>
		</div>
	</div>
</div>

<div class="fsrepublic-gradient-brown">
	<div class="container py-4">
		<div class="row">
			<div class="col-10 mx-auto">
				<p class="m-0 text-center fsrepublic-text-white">选择一个好的出生时间点，组成一个好的命局，让人生顺遂吉祥，走上辉煌。</p>
			</div>
		</div>
	</div>
</div>

<div class="container py-5">
	<div class="row mt-3">
		<div class="col-10 mx-auto">
			<p class="text-center">择日生子是一项特别的服务，我们并不鼓吹父母一定要剖腹生子，但若在医生建议剖腹生子的情况下，我们会配合医生所给的日子里为家长选个吉祥日子让宝宝出生。好日子出生就代表让宝宝一开始就拥有良好的八字，拥有优良的性格之余也配合到好运势，先天上的优势再加上后天家长的循循善诱及自身的努力，做起事来将事半功倍，拥有美好的人生！</p>
			<p class="text-center">人们常说“听天由命”，但是若在可掌握的范围内做出改进那绝对不为过！这也正符合“命运就掌握在你手”的道理。</p>
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
				<img src="../images/service/child-birth/baby-hand-s.jpg" class="img-fluid d-flex mx-auto fr-style-1">
			</div>
			<div class="container-fluid px-0 d-none d-md-block">
				<button type="button" class="btn btn-primary d-flex mx-auto" data-toggle="modal" data-target="#enquiryModal">了解更多</button>
				<img src="../images/service/child-birth/baby-hand-lg.jpg" class="img-fluid d-flex mx-auto fr-style-1">
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
						<img src="../images/service/all-services/service-cn-6.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('services/baby-naming') ?>" class="btn btn-primary mt-3 mb-5">了解更多</a>
					</div>
					<div class="col-12 col-sm-6 px-0 px-sm-3 mx-auto text-center">
						<img src="../images/service/all-services/service-extra3-cn.jpg" class="img-fluid w-100">
						<a href="javascript:void(0)" class="btn btn-primary mt-3 mb-5">了解更多</a>
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
				<h5 class="modal-title"><?= Yii::t('app', 'CHILD BIRTH DATE SELECTION'); ?><?= Yii::t('app', 'ENQUIRY'); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= Url::to(['/enquiry']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Enquiry[service]" value="<?= Yii::t('app', 'CHILD BIRTH DATE SELECTION'); ?>">
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
						<label for="enquiry_father" class="col-sm-4 col-form-label text-left text-sm-right">*父親出生日期</label>
						<div class="col-sm-8">
							<select class="form-control" name="Enquiry[info][father][year]" required>
								<option value="">請選擇年</option>
								<?php for ($i=2050; $i>1910; $i--): ?>
									<option value="<?= $i ?>"><?= $i ?>年</option>
								<?php endfor; ?>
							</select>
							<select class="form-control" name="Enquiry[info][father][month]" required>
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
							<select class="form-control" name="Enquiry[info][father][day]" required>
								<option value="">請選擇日</option>
								<?php for ($i=1; $i<32; $i++): ?>
									<option value="<?= $i ?>"><?= $i ?>日</option>
								<?php endfor; ?>
							</select>
							<select class="form-control" name="Enquiry[info][father][hour]" required>
								<option value="">請選擇時</option>
								<?php for ($i=0; $i<24; $i++): ?>
									<option value="<?= $i ?>"><?= $i ?>時</option>
								<?php endfor; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_mother" class="col-sm-4 col-form-label text-left text-sm-right">*母親出生日期</label>
						<div class="col-sm-8">
							<select class="form-control" name="Enquiry[info][mother][year]" required>
								<option value="">請選擇年</option>
								<?php for ($i=2050; $i>1910; $i--): ?>
									<option value="<?= $i ?>"><?= $i ?>年</option>
								<?php endfor; ?>
							</select>
							<select class="form-control" name="Enquiry[info][mother][month]" required>
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
							<select class="form-control" name="Enquiry[info][mother][day]" required>
								<option value="">請選擇日</option>
								<?php for ($i=1; $i<32; $i++): ?>
									<option value="<?= $i ?>"><?= $i ?>日</option>
								<?php endfor; ?>
							</select>
							<select class="form-control" name="Enquiry[info][mother][hour]" required>
								<option value="">請選擇時</option>
								<?php for ($i=0; $i<24; $i++): ?>
									<option value="<?= $i ?>"><?= $i ?>時</option>
								<?php endfor; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_gender" class="col-sm-4 col-form-label text-left text-sm-right">*寶寶性別</label>
						<div class="col-sm-8">
							<select id="enquiry_gender" name="Enquiry[info][gender]" class="form-control form-control-sm" required>
								<option value="">請選擇一項</option>
								<option value="Male">男</option>
								<option value="Female">女</option>
								<option value="Twins">雙胞胎</option>
								<option value="Others">其他</option>
							</select>
							<div id="other-gender-textarea"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_dob" class="col-sm-4 col-form-label text-left text-sm-right">預產期</label>
						<div class="col-sm-8">
							<textarea id="enquiry_dob" name="Enquiry[info][baby_due_date]" class="form-control form-control-sm"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_operation" class="col-sm-4 col-form-label text-left text-sm-right">*手術日</label>
						<div class="col-sm-8">
							<select id="enquiry_operation" name="Enquiry[info][operation_date]" class="form-control form-control-sm" required>
								<option value="">請選擇一項</option>
								<option value="Weekend">週末</option>
								<option value="Weekday">週日</option>
								<option value="Any">都可以</option>
							</select>
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


