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
				<img src="../images/service/child-birth/title-en.png" class="d-flex mx-auto h-100 w-auto" alt="Fengshui Republic" />
			</div>
		</div>
	</div>
</div>

<div class="fsrepublic-gradient-brown">
	<div class="container py-4">
		<div class="row">
			<div class="col-10 mx-auto">
				<p class="m-0 text-center fsrepublic-text-white">Having a good birth date will give your child a good life of success and auspiciousness.</p>
			</div>
		</div>
	</div>
</div>

<div class="container py-5">
	<div class="row mt-3">
		<div class="col-10 mx-auto">
			<p class="text-center">Child birth date selection is a special service. While we do not encourage parents to adopt cesarean section to deliver the babies unnecessarily - we will help choose an auspicious date based on the doctor’s given dates if the event of a cesarean section.</p>
			<p class="text-center">Being born on a good date means that your child will have good Bazi from the beginning and possess the good personalities and advantages. With parents’ guidance and the child’s own efforts, the child will enjoy a fulfilling, successful life.</p>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-12 px-0">
			<!-- <div id="bg-1">
				<button type="button" class="btn btn-primary d-flex mx-auto" data-toggle="modal" data-target="#enquiryModal">know more</button>
			</div> -->
			<div class="container-fluid px-0 d-block d-md-none">
				<button type="button" class="btn btn-primary d-flex mx-auto" data-toggle="modal" data-target="#enquiryModal">know more</button>
				<img src="../images/service/child-birth/baby-hand-s.jpg" class="img-fluid d-flex mx-auto fr-style-1">
			</div>
			<div class="container-fluid px-0 d-none d-md-block">
				<button type="button" class="btn btn-primary d-flex mx-auto" data-toggle="modal" data-target="#enquiryModal">know more</button>
				<img src="../images/service/child-birth/baby-hand-lg.jpg" class="img-fluid d-flex mx-auto fr-style-1">
			</div>
		</div>
	</div>
</div>

<div id="may-like">
	<div class="container py-5">
		<p class="text-center fsrepublic-text-white">YOU MAY LIKE</p>
		<div class="row">
			<div class="col-12 col-md-10 mx-auto">
				<div class="row">
					<div class="col-12 col-sm-6 px-0 px-sm-3 mx-auto text-center">
						<img src="../images/service/all-services/service-en-6.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('services/baby-naming') ?>" class="btn btn-primary mt-3 mb-5">know more</a>
					</div>
					<div class="col-12 col-sm-6 px-0 px-sm-3 mx-auto text-center">
						<img src="../images/service/all-services/service-extra3-en.jpg" class="img-fluid w-100">
						<a href="javascript:void(0)" class="btn btn-primary mt-3 mb-5">know more</a>
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
				<h5 class="modal-title"><?= Yii::t('app', 'CHILD BIRTH DATE SELECTION'); ?> <?= Yii::t('app', 'ENQUIRY'); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= Url::to(['/enquiry']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Enquiry[service]" value="<?= Yii::t('app', 'CHILD BIRTH DATE SELECTION'); ?>">
				<div class="modal-body">
					<div class="form-group row">
						<label for="enquiry_title" class="col-sm-4 col-form-label text-left text-sm-right">*Title</label>
						<div class="col-sm-8">
							<select id="enquiry_title" name="Enquiry[title]" class="form-control form-control-sm" required>
								<option value="">Please Select One</option>
								<option value="Mr">Mr</option>
								<option value="Mrs">Mrs</option>
								<option value="Ms">Ms</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_chinese_name" class="col-sm-4 col-form-label text-left text-sm-right">*Chinese Name</label>
						<div class="col-sm-8">
							<input id="enquiry_chinese_name" class="form-control form-control-sm" type="text" name="Enquiry[name_cn]" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_english_name" class="col-sm-4 col-form-label text-left text-sm-right">English Name</label>
						<div class="col-sm-8">
							<input id="enquiry_english_name" class="form-control form-control-sm" type="text" name="Enquiry[name_en]">
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_contact" class="col-sm-4 col-form-label text-left text-sm-right">*Contact</label>
						<div class="col-sm-8">
							<input id="enquiry_contact" class="form-control form-control-sm" type="text" name="Enquiry[contact]" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_email" class="col-sm-4 col-form-label text-left text-sm-right">*Email</label>
						<div class="col-sm-8">
							<input id="enquiry_email" class="form-control form-control-sm" type="email" name="Enquiry[email]" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_father" class="col-sm-4 col-form-label text-left text-sm-right">*Father Birthday</label>
						<div class="col-sm-8">
							<select class="form-control" name="Enquiry[info][father][year]" required>
								<option value="">Please Select Year</option>
								<?php for ($i=2050; $i>1910; $i--): ?>
									<option value="<?= $i ?>"><?= $i ?> year</option>
								<?php endfor; ?>
							</select>
							<select class="form-control" name="Enquiry[info][father][month]" required>
								<option value="">Please Select Month</option>
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
							<select class="form-control" name="Enquiry[info][father][day]" required>
								<option value="">Please Select Day</option>
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
							<select class="form-control" name="Enquiry[info][father][hour]" required>
								<option value="">Please Select Hour</option>
								<?php for ($i=0; $i<24; $i++): ?>
									<option value="<?= $i ?>"><?= $i ?> hour</option>
								<?php endfor; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_mother" class="col-sm-4 col-form-label text-left text-sm-right">*Mother Birthday</label>
						<div class="col-sm-8">
							<select class="form-control" name="Enquiry[info][mother][year]" required>
								<option value="">Please Select Year</option>
								<?php for ($i=2050; $i>1910; $i--): ?>
									<option value="<?= $i ?>"><?= $i ?> year</option>
								<?php endfor; ?>
							</select>
							<select class="form-control" name="Enquiry[info][mother][month]" required>
								<option value="">Please Select Month</option>
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
							<select class="form-control" name="Enquiry[info][mother][day]" required>
								<option value="">Please Select Day</option>
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
							<select class="form-control" name="Enquiry[info][mother][hour]" required>
								<option value="">Please Select Hour</option>
								<?php for ($i=0; $i<24; $i++): ?>
									<option value="<?= $i ?>"><?= $i ?> hour</option>
								<?php endfor; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_gender" class="col-sm-4 col-form-label text-left text-sm-right">*Baby Gender</label>
						<div class="col-sm-8">
							<select id="enquiry_gender" name="Enquiry[info][gender]" class="form-control form-control-sm" required>
								<option value="">Please Select One</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="Twins">Twins</option>
								<option value="Others">Others</option>
							</select>
							<div id="other-gender-textarea"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_dob" class="col-sm-4 col-form-label text-left text-sm-right">Baby Due Date</label>
						<div class="col-sm-8">
							<textarea id="enquiry_dob" name="Enquiry[info][baby_due_date]" class="form-control form-control-sm"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_operation" class="col-sm-4 col-form-label text-left text-sm-right">*Preferred Operation Date</label>
						<div class="col-sm-8">
							<select id="enquiry_operation" name="Enquiry[info][operation_date]" class="form-control form-control-sm" required>
								<option value="">Please Select One</option>
								<option value="Weekend">Weekend</option>
								<option value="Weekday">Weekday</option>
								<option value="Any">Any</option>
							</select>
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


