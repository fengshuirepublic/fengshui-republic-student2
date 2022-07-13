<?php

use yii\web\View;
use yii\helpers\Url;

$this->registerCssFile("@web/css/service/house-moving.css?2018-12-18-0000", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->title = Yii::t('app', 'HOUSE MOVING DATE SELECTION');

$this->registerCss('
	.fr-style-1 {
		position: relative;
		z-index: -1;
		margin-top: -60px;
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
							<source src="../images/service/house-moving/house-moving-s.mov">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/house-moving/house-moving-lg.mov">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php elseif ($android): ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/house-moving/house-moving-s.webm" type="video/webm">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/house-moving/house-moving-lg.webm" type="video/webm">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php else: ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/house-moving/house-moving-s.mp4" type="video/mp4">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/house-moving/house-moving-lg.mp4" type="video/mp4">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php endif; ?>

				<div class="section_overlay"></div>
			</div>
			<div class="seq-absolute seq-model-1-1">
				<img src="../images/service/house-moving/title-cn.png" class="d-flex mx-auto h-100 w-auto" alt="Fengshui Republic" />
			</div>
		</div>
	</div>
</div>

<div class="fsrepublic-gradient-brown">
	<div class="container py-4">
		<div class="row">
			<div class="col-10 mx-auto">
				<p class="m-0 text-center fsrepublic-text-white">任何重大的事务，都应该择一个好的日子，才能把好的气场推到最高点，让事情圆满完成。</p>
			</div>
		</div>
	</div>
</div>

<div class="container py-5">
	<div class="row mt-3">
		<div class="col-10 mx-auto">
			<p class="text-center">搬入新家总是让人觉得愉快的，若能配合良辰吉日入宅便能把吉祥气场推到最高，让全家人在吉祥平安的气场下，欢欢喜喜地入住新家，增添家宅的喜气！</p>
			<p class="text-center">入伙择日并非只是随意翻阅通书，看到吉祥日子就能够进行，应该要配合家宅方向及全体家庭成员的八字选一个既能够旺宅也能够旺人的吉日，达到“天地人”皆旺的效果让宅旺人更兴旺！</p>
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
				<img src="../images/service/house-moving/house-couple-s.jpg" class="img-fluid d-flex mx-auto fr-style-1">
			</div>
			<div class="container-fluid px-0 d-none d-md-block">
				<button type="button" class="btn btn-primary d-flex mx-auto" data-toggle="modal" data-target="#enquiryModal">了解更多</button>
				<img src="../images/service/house-moving/house-couple-lg.jpg" class="img-fluid d-flex mx-auto fr-style-1">
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
						<img src="../images/service/all-services/service-cn-12.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('services/talks-events') ?>" class="btn btn-primary mt-3 mb-5">了解更多</a>
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
				<h5 class="modal-title"><?= Yii::t('app', 'HOUSE MOVING DATE SELECTION'); ?><?= Yii::t('app', 'ENQUIRY'); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= Url::to(['/enquiry']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Enquiry[service]" value="<?= Yii::t('app', 'HOUSE MOVING DATE SELECTION'); ?>">
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
						<label for="enquiry_dob" class="col-sm-4 col-form-label text-left text-sm-right">*家庭成員 1</label>
						<div class="col-sm-8">
							<select class="form-control" name="Enquiry[info][family][1][year]" required>
								<option value="">請選擇年</option>
								<?php for ($i=2050; $i>1910; $i--): ?>
									<option value="<?= $i ?>"><?= $i ?>年</option>
								<?php endfor; ?>
							</select>
							<select class="form-control" name="Enquiry[info][family][1][month]" required>
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
							<select class="form-control" name="Enquiry[info][family][1][day]" required>
								<option value="">請選擇日</option>
								<?php for ($i=1; $i<32; $i++): ?>
									<option value="<?= $i ?>"><?= $i ?>日</option>
								<?php endfor; ?>
							</select>
							<select class="form-control" name="Enquiry[info][family][1][hour]" required>
								<option value="">請選擇時</option>
								<?php for ($i=0; $i<24; $i++): ?>
									<option value="<?= $i ?>"><?= $i ?>時</option>
								<?php endfor; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_dob" class="col-sm-4 col-form-label text-left text-sm-right">家庭成員 2</label>
						<div class="col-sm-8">
							<select class="form-control" name="Enquiry[info][family][2][year]">
								<option value="-">請選擇年</option>
								<?php for ($i=2050; $i>1910; $i--): ?>
									<option value="<?= $i ?>"><?= $i ?>年</option>
								<?php endfor; ?>
							</select>
							<select class="form-control" name="Enquiry[info][family][2][month]">
								<option value="-">請選擇月</option>
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
							<select class="form-control" name="Enquiry[info][family][2][day]">
								<option value="-">請選擇日</option>
								<?php for ($i=1; $i<32; $i++): ?>
									<option value="<?= $i ?>"><?= $i ?>日</option>
								<?php endfor; ?>
							</select>
							<select class="form-control" name="Enquiry[info][family][2][hour]">
								<option value="-">請選擇時</option>
								<?php for ($i=0; $i<24; $i++): ?>
									<option value="<?= $i ?>"><?= $i ?>時</option>
								<?php endfor; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_dob" class="col-sm-4 col-form-label text-left text-sm-right">家庭成員 3</label>
						<div class="col-sm-8">
							<select class="form-control" name="Enquiry[info][family][3][year]">
								<option value="-">請選擇年</option>
								<?php for ($i=2050; $i>1910; $i--): ?>
									<option value="<?= $i ?>"><?= $i ?>年</option>
								<?php endfor; ?>
							</select>
							<select class="form-control" name="Enquiry[info][family][3][month]">
								<option value="-">請選擇月</option>
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
							<select class="form-control" name="Enquiry[info][family][3][day]">
								<option value="-">請選擇日</option>
								<?php for ($i=1; $i<32; $i++): ?>
									<option value="<?= $i ?>"><?= $i ?>日</option>
								<?php endfor; ?>
							</select>
							<select class="form-control" name="Enquiry[info][family][3][hour]">
								<option value="-">請選擇時</option>
								<?php for ($i=0; $i<24; $i++): ?>
									<option value="<?= $i ?>"><?= $i ?>時</option>
								<?php endfor; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_preferred" class="col-sm-4 col-form-label text-left text-sm-right">Preferred Date</label>
						<div class="col-sm-8">
							<textarea id="enquiry_preferred" name="Enquiry[info][preferred]" class="form-control form-control-sm"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_remark" class="col-sm-4 col-form-label text-left text-sm-right">Remark</label>
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


