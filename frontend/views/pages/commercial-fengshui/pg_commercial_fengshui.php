<?php

use yii\web\View;
use yii\helpers\Url;

$this->registerCssFile("@web/css/service/commercial-fengshui.css?2018-12-18-0000", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->title = Yii::t('app', 'COMMERCIAL FENGSHUI');

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
							<source src="../images/service/commercial-fengshui/commercial-fengshui-s.mov">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/commercial-fengshui/commercial-fengshui-lg.mov">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php elseif ($android): ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/commercial-fengshui/commercial-fengshui-s.webm" type="video/webm">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/commercial-fengshui/commercial-fengshui-lg.webm" type="video/webm">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php else: ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/commercial-fengshui/commercial-fengshui-s.mp4" type="video/mp4">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/commercial-fengshui/commercial-fengshui-lg.mp4" type="video/mp4">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php endif; ?>

				<div class="section_overlay"></div>
			</div>
			<div class="seq-absolute seq-model-1-1">
				<img src="../images/service/commercial-fengshui/title-en.png" class="d-flex mx-auto h-100 w-auto" alt="Fengshui Republic" />
			</div>
		</div>
	</div>
</div>

<div class="fsrepublic-gradient-brown">
	<div class="container py-4">
		<div class="row">
			<div class="col-11 mx-auto">
				<p class="m-0 text-center fsrepublic-text-white">Boost your finance and career through our perfect space planning</p>
			</div>
		</div>
	</div>
</div>

<div class="container py-5">
	<div class="row">
		<div class="col-10 mx-auto">
			<p class="m-0 text-center">You may somehow encounter obstacles and stumbling blocks regardless of whether your company is ideally located, markets great products, have superior management systems and innovative ideas to run the company. Good Commercial Fengshui helps you avert such obstacles and give you clearer perspectives for sound decision-making while ensuring harmonious interpersonal relations for business success.</p>
		</div>
	</div>
</div>

<div class="container-fluid px-0">
	<img src="../images/service/commercial-fengshui/video.jpg" class="img-fluid w-100 d-block d-md-none" data-toggle="modal" data-target="#videoModal" style="cursor: pointer">
</div>

<div id="bg-1" class="py-3">
	<div class="container py-5">
		<div class="row">
			<div class="col-10 mx-auto">
				<div class="row">
					<div class="col-12 col-md-5 offset-md-1">
						<img src="../images/service/commercial-fengshui/video.jpg" class="img-fluid d-none d-md-block" width="400" data-toggle="modal" data-target="#videoModal" style="cursor: pointer">
					</div>
					<div class="col-12 col-md-5 mx-auto">
						<p class="text-center text-md-left m-0">By determining your Company’s best Fengshui directions and building arrangement, coupled with commercial Five Elements and personal Bazi (elements of year, month, day and hour), we will help locate the best auspicious locations of wealth, intellect, beneficial people and human resource to boost your Company’s Fengshui.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="bg-2">
	<div class="container py-5">
		<div class="row">
			<div class="col-10 mx-auto">
				<h4 class="text-center my-0 fsrepublic-text-gold">CONSULTATION<br>COVERAGE</h4>
			</div>
		</div>
		<div class="row">
			<div class="col-10 mx-auto">
				<img src="../images/fr/line.png" class="img-fluid w-100">
			</div>
		</div>
		<div class="row">
			<div class="col-10 mx-auto">
				<div class="row">
					<div class="col-12 col-md-6">
						<div>
							<ul class="pl-3 mb-0" style="list-style-type:disc">
								<li>
									On site Feng Shui Audit, Analysis and Evaluation
								</li>
								<li>
									Internal & External Environment Analysis
								</li>
								<li>
									Reception Feng Shui and Spirit Wall
								</li>
								<li>
									Office Entrance
								</li>
								<li>
									Activation of Auspicious Sector
								</li>
								<li>
									Wealth Corner Activation
								</li>
								<li>
									Owner and key employees office analysis
								</li>
								<li>
									Personal auspicious direction
								</li>
								<li>
									Office sitting layout and Meeting room arrangement
								</li>
								<li>
									Date and Sector selection for Groundbreaking
								</li>
								<li>
									Date selection for Opening
								</li>
								<li>
									Opening process flow
								</li>
								<li>
									Full Color and Comprehensive Report
								</li>
							</ul>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="my-5 my-md-0">
							<img src="../images/service/commercial-fengshui/fengshui-republic-report.png" class="img-fluid d-flex mx-auto" width="350">
							<p class="text-center fsrepublic-text-gold">Fengshui Colour Report</p>
							<button type="button" class="btn btn-primary my-5 d-flex mx-auto" data-toggle="modal" data-target="#enquiryModal">know more</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="methodology" class="py-0 py-md-5">
	<div class="container-fluid px-0 d-block d-md-none">
		<div class="seq">
			<div class="seq-canvas">
				<div class="seq-absolute seq-background">
					<div id="master_image_1"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 col-md-5 offset-md-1 d-none d-md-block">
				<img class="img-fluid d-flex ml-auto" src="../images/service/commercial-fengshui/main-master-1-1.jpg" alt="Fengshui Republic" style="height: 300px;">
			</div>
			<div class="col-12 col-md-3 offset-md-1">
				<div class="px-2 py-5">
					<div>
						<h4 class="text-center my-0 fsrepublic-text-gold">METHODOLOGY</h4>
						<img src="../images/fr/line.png" class="img-fluid w-100">
						<p class="mt-2 text-center fsrepublic-text-gold">We will visit the site to audit the exterior and interior of the property in accordance to the owner’s Bazi against the premises. The Feng Shui assessment will be based on the theories and calculations of San He and San Yuan Feng Shui.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="why-us">
	<div class="container py-5">
		<h5 class="text-center fsrepublic-text-gold">WHY FENGSHUI REPUBLIC ?</h5>
		<div class="row">
			<div class="col-10 mx-auto">
				<div class="row">
					<div class="col-11 col-md-6 mx-auto">
						<img src="../images/fr/why-us/en-why-1.png" class="img-fluid w-100">
						<img src="../images/fr/why-us/en-why-2.png" class="img-fluid w-100">
						<img src="../images/fr/why-us/en-why-3.png" class="img-fluid w-100">
						<img src="../images/fr/why-us/en-why-4.png" class="img-fluid w-100">
					</div>
					<div class="col-11 col-md-6 mx-auto">
						<img src="../images/fr/why-us/en-why-5.png" class="img-fluid w-100">
						<img src="../images/fr/why-us/en-why-6.png" class="img-fluid w-100">
						<img src="../images/fr/why-us/en-why-7.png" class="img-fluid w-100">
						<img src="../images/fr/why-us/en-why-8.png" class="img-fluid w-100">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="process-flow">
	<div class="container py-5">
		<h5 class="text-center">PROCESS FLOW</h5>
		<div class="row">
			<div class="col-11 col-md-6 mx-auto">
				<div class="row">
					<div class="col-6 mx-auto">
						<img src="../images/fr/process-flow/icon-1.png" class="img-fluid w-100">
						<ol class="pl-3 mb-0" start="1">
							<li>
								RM1000 deposit for apointment confirmation.
							</li>
						</ol>
					</div>
					<div class="col-6 mx-auto">
						<img src="../images/fr/process-flow/icon-2.png" class="img-fluid w-100">
						<ol class="pl-3 mb-0" start="2">
							<li>
								Employer and Key Employees Bazi. Customer provide property layout plan according to scale.
							</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="col-11 col-md-6 mx-auto">
				<div class="row">
					<div class="col-6 mx-auto">
						<img src="../images/fr/process-flow/icon-3.png" class="img-fluid w-100">
						<ol class="pl-3 mb-0" start="3">
							<li>
								We will visit the site for Fengshui assessment. Any question can be asked during the session.
							</li>
						</ol>
					</div>
					<div class="col-6 mx-auto">
						<img src="../images/fr/process-flow/icon-4.png" class="img-fluid w-100">
						<ol class="pl-3 mb-0" start="4">
							<li>
								Full payment shall be make in advanced or on the spot.
							</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-11 col-md-6 mx-auto">
				<div class="row">
					<div class="col-6 mx-auto">
						<img src="../images/fr/process-flow/icon-5.png" class="img-fluid w-100">
						<ol class="pl-3 mb-0" start="5">
							<li>
								Collect full report three weeks after the site visit.
							</li>
						</ol>
					</div>
					<div class="col-6 mx-auto">
						<img src="../images/fr/process-flow/icon-6.png" class="img-fluid w-100">
						<ol class="pl-3 mb-0" start="6">
							<li>
								Date Selection for groundbreaking.
							</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="col-11 col-md-6 mx-auto">
				<div class="row">
					<div class="col-6 mx-auto">
						<img src="../images/fr/process-flow/icon-7.png" class="img-fluid w-100">
						<ol class="pl-3 mb-0" start="7">
							<li>
								Customer may call or email if have any doubt or questions during renovation/construction.
							</li>
						</ol>
					</div>
					<div class="col-6 mx-auto">
						<img src="../images/fr/process-flow/icon-8.png" class="img-fluid w-100">
						<ol class="pl-3 mb-0" start="8">
							<li>
								Date Selection for moving-in.
							</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<button type="button" class="btn btn-primary my-5 d-flex mx-auto" data-toggle="modal" data-target="#enquiryModal">know more</button>
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
						<img src="../images/service/all-services/service-en-11.jpg" class="img-fluid w-100">
						<a href="javascript:void(0)" class="btn btn-primary mt-3 mb-5">know more</a>
					</div>
					<div class="col-12 col-sm-6 px-0 px-sm-3 mx-auto text-center">
						<img src="../images/service/all-services/service-en-12.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('services/talks-events') ?>" class="btn btn-primary mt-3 mb-5">know more</a>
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
					<iframe class="embed-responsive embed-responsive-1by1" width="560" height="315" src="https://www.youtube.com/embed/TGT4Joxtbk8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?= Yii::t('app', 'COMMERCIAL FENGSHUI'); ?> <?= Yii::t('app', 'ENQUIRY'); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= Url::to(['/enquiry']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Enquiry[service]" value="<?= Yii::t('app', 'COMMERCIAL FENGSHUI'); ?>">
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
						<label for="enquiry_type" class="col-sm-4 col-form-label text-left text-sm-right">*Type</label>
						<div class="col-sm-8">
							<select id="enquiry_type" name="Enquiry[info][type]" class="form-control form-control-sm" required>
								<option value="">Please Select One</option>
								<option value="Shop Lot">Shop Lot</option>
								<option value="Mall Unit">Mall Unit</option>
								<option value="Factory">Factory</option>
								<option value="Others">Others</option>
							</select>
							<div id="other-type-textarea"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_sqft" class="col-sm-4 col-form-label text-left text-sm-right">*Sq.ft</label>
						<div class="col-sm-8">
							<select id="enquiry_sqft" name="Enquiry[info][sqft]" class="form-control form-control-sm" required>
								<option value="">Please Select One</option>
								<option value="500~2000">500~2000</option>
								<option value="2001~3500">2001~3500</option>
								<option value="3501~5000">3501~5000</option>
								<option value=">5000">>5000</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_area" class="col-sm-4 col-form-label text-left text-sm-right">*Area</label>
						<div class="col-sm-8">
							<select id="enquiry_area" name="Enquiry[info][area]" class="form-control form-control-sm" required>
								<option value="">Please Select One</option>
								<option value="Johor">Johor</option>
								<option value="Selangor">Selangor</option>
								<option value="Penang">Penang</option>
								<option value="Others">Others</option>
							</select>
							<div id="other-area-textarea"></div>
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


