<?php

use yii\web\View;
use yii\helpers\Url;

$this->registerCssFile("@web/stand/slick/slick-theme.css", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->registerCssFile("@web/stand/slick/slick.css", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->registerCssFile("@web/css/service/household-fengshui.css?2018-12-19-0000", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->registerJsFile("@web/stand/slick/slick.min.js", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->title = Yii::t('app', 'HOUSEHOLD FENGSHUI');

$this->registerCss('
	@media (max-width: 575px){
		.seq .seq-model-2-1 {
			bottom: 22%;
			height: 56%;
		}
	}
');

$this->registerJs('
	$("#videoModal").on("hidden.bs.modal", function () {
		$("#yt-video iframe").attr("src", $("#yt-video iframe").attr("src"));
	});

	$(".testimonial-slide").slick({
		initialSlide: Math.floor((Math.random() * 10) + 1),
		autoplay: true,
		lazyLoad: "ondemand",
		infinite: true
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

?>

<div class="container-fluid px-0">
	<div class="seq">
		<div class="seq-canvas">
			<div class="seq-absolute seq-background">
				<div id="main_image_1_1" class="d-block d-md-none"></div>
				<div id="main_image_1_2" class="d-none d-md-block"></div>
				<div class="section_overlay"></div>
			</div>
			<div class="seq-absolute seq-model-1-1">
				<img src="../images/service/household-fengshui/title-en.png" class="d-flex mx-auto h-100 w-auto" alt="Fengshui Republic" />
			</div>
		</div>
	</div>
</div>

<div class="fsrepublic-gradient-brown">
	<div class="container py-4">
		<div class="row">
			<div class="col-10 mx-auto">
				<p class="m-0 text-center fsrepublic-text-white">Combining both the ancient art of Fengshui and modern design, giving your dream home full of positive Fengshui energy to boost your household fortune.</p>
			</div>
		</div>
	</div>
</div>

<div id="bg-1">
	<div class="container py-5">
		<div class="row">
			<div class="col-10 mx-auto">
				<div class="row">
					<div class="col-12 col-md-5 offset-md-1">
						<p class="text-center text-md-left m-0">Many of us spend one third of our time at home. Household Fengshui application helps by ensuring harmonious and quality living to benefit our health, finance, career and relationship with others.</p>
					</div>
					<div class="col-12 col-md-6">
						<img src="../images/service/household-fengshui/video.jpg" class="img-fluid d-none d-md-block" width="400" data-toggle="modal" data-target="#videoModal" style="cursor: pointer">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0">
	<img src="../images/service/household-fengshui/video.jpg" class="img-fluid w-100 d-block d-md-none" data-toggle="modal" data-target="#videoModal" style="cursor: pointer">
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
					<div class="col-12 col-md-5 offset-md-1">
						<div>
							<ul class="pl-3 mb-0" style="list-style-type:disc">
								<li>
									On site Feng Shui Audit, Analysis and Evaluation
								</li>
								<li>
									External Environment Analysis
								</li>
								<li>
									Internal Environment Analysis
								</li>
								<li>
									Door, Kitchen and Bedroom Adjustment
								</li>
								<li>
									Activation of Auspicious Sector
								</li>
								<li>
									Enhance the Peach Blossom relationship
								</li>
								<li>
									Activate the wealth corner
								</li>
							</ul>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div>
							<ul class="pl-3" style="list-style-type:disc">
								<li>
									Wealth, study and career corner
								</li>
								<li>
									Date and Sector selection for
								</li>
								<li>
									Groundbreaking
								</li>
								<li>
									Date selection for Moving-in
								</li>
								<li>
									House moving-in process flow
								</li>
								<li>
									Full Color and Comprehensive Report
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-10 mx-auto my-5">
				<img src="../images/service/household-fengshui/fengshui-republic-report.png" class="img-fluid d-flex mx-auto" width="350">
				<p class="text-center fsrepublic-text-gold">Fengshui Colour Report</p>
				<button type="button" class="btn btn-primary my-5 d-flex mx-auto" data-toggle="modal" data-target="#enquiryModal">know more</button>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0">
	<div class="seq">
		<div class="seq-canvas">
			<div class="seq-absolute seq-background">
				<div id="main_image_2_1" class="d-block d-md-none"></div>
				<div id="main_image_2_2" class="d-none d-md-block"></div>
				<div class="section_overlay"></div>
			</div>
			<div class="seq-absolute seq-model-2-1">
				<img src="../images/service/household-fengshui/methodology-en-desktop.png" class="h-100 w-auto d-none d-md-block" alt="Fengshui Republic" />
				<img src="../images/service/household-fengshui/methodology-en-mobile.png" class="h-100 w-auto d-block d-md-none mx-auto" alt="Fengshui Republic" />
			</div>
		</div>
	</div>
</div>

<div id="testimonial">
	<div class="container py-5">
		<h4 class="text-center m-4">TESTIMONIAL</h4>
		<div class="row">
			<div class="col-10 col-md-6 col-lg-4 mx-auto">
				<div class="testimonial-slide">
					<div>
						<img src="../images/testimonials/testimonial-01-sm.jpg" class="img-fluid w-100">
						<p class="text-center mt-4 px-3">"I Found Out Master Loh’s Services Are High Quality,High Standard And Trustworthy"</p>
						<p class="text-center"><small>Angie Ng</small></p>
					</div>
					<div>
						<img src="../images/testimonials/testimonial-02-sm.jpg" class="img-fluid w-100">
						<p class="text-center mt-4 px-3">"After Conducting The Fengshui Survey, The Team Provided Me A Copy Of Our Very Own Fengshui Report And Explained To Us Everything In Details"</p>
						<p class="text-center"><small>Paula Lin</small></p>
					</div>
					<div>
						<img src="../images/testimonials/testimonial-03-sm.jpg" class="img-fluid w-100">
						<p class="text-center mt-4 px-3">"It Is In This House After Conducting The Fengshui Survey Our Child Grew Up Healthily And Happily, And That Our Family Lives Harmoniously."</p>
						<p class="text-center"><small>Yin Lee</small></p>
					</div>
					<div>
						<img src="../images/testimonials/testimonial-04-sm.jpg" class="img-fluid w-100">
						<p class="text-center mt-4 px-3">"After Master Loh’s Fengshui Arrangement, My Business, Family And Wealth See Great Improvement."</p>
						<p class="text-center"><small>Louis Lai</small></p>
					</div>
					<div>
						<img src="../images/testimonials/testimonial-05-sm.jpg" class="img-fluid w-100">
						<p class="text-center mt-4 px-3">"To Give A Child A Good Name Is Better Than Giving Him Or Her A Thousand Gold."</p>
						<p class="text-center"><small>Ong Bee Yun</small></p>
					</div>
					<div>
						<img src="../images/testimonials/testimonial-06-sm.jpg" class="img-fluid w-100">
						<p class="text-center mt-4 px-3">"After Moved To New House Selected By Master Loh, We Live Peacefully And Harmoniously Ever Since."</p>
						<p class="text-center"><small>Hong Pik Yee</small></p>
					</div>
					<div>
						<img src="../images/testimonials/testimonial-07-sm.jpg" class="img-fluid w-100">
						<p class="text-center mt-4 px-3">"Master Loh And His Team Are Very Professional."</p>
						<p class="text-center"><small>Shim Woon Choon</small></p>
					</div>
					<div>
						<img src="../images/testimonials/testimonial-08-sm.jpg" class="img-fluid w-100">
						<p class="text-center mt-4 px-3">"The Company’s Energy Flow Did Become Better; Its Business Development And The Debt Collection Became Much More Efficient, And The Staff Turnover Also Became More Stabilized."</p>
						<p class="text-center"><small>Jeremy Kee</small></p>
					</div>
					<div>
						<img src="../images/testimonials/testimonial-09-sm.jpg" class="img-fluid w-100">
						<p class="text-center mt-4 px-3">"My Company Expand So Rapidly, And I Am Able To Enjoy A Comfortable House And Working Place Too!"</p>
						<p class="text-center"><small>Sun Low</small></p>
					</div>
					<div>
						<img src="../images/testimonials/testimonial-10-sm.jpg" class="img-fluid w-100">
						<p class="text-center mt-4 px-3">"Fengshui Republic Is A Trustworthy Choice; Its Professionalism And Positive Attitude Has Provided Us Truly One-Stop, Comprehensive Fengshui Services."</p>
						<p class="text-center"><small>Adam Ang</small></p>
					</div>
					<div>
						<img src="../images/testimonials/testimonial-11-sm.jpg" class="img-fluid w-100">
						<p class="text-center mt-4 px-3">"I Hoped To Get Some Advices From Some Pragmatic, Scientific-Minded New Generation Of Fengshui Master."</p>
						<p class="text-center"><small>Liang Hill</small></p>
					</div>
					<div>
						<img src="../images/testimonials/testimonial-12-sm.jpg" class="img-fluid w-100">
						<p class="text-center mt-4 px-3">"Having Good Fengshui Helps My Family’s Luck and Career!"</p>
						<p class="text-center"><small>Erny Looi Chee E</small></p>
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
								DOB of Family members & house layout plan.
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
						<img src="../images/service/all-services/service-en-5.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('services/bazi-analysis') ?>" class="btn btn-primary mt-3 mb-5">know more</a>
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
				<h5 class="modal-title"><?= Yii::t('app', 'HOUSEHOLD FENGSHUI'); ?> <?= Yii::t('app', 'ENQUIRY'); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= Url::to(['/enquiry']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Enquiry[service]" value="<?= Yii::t('app', 'HOUSEHOLD FENGSHUI'); ?>">
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
								<option value="Single Storey Terrace">Single Storey Terrace</option>
								<option value="Double Storey Terrace">Double Storey Terrace</option>
								<option value="Triple Storey Terrace">Triple Storey Terrace</option>
								<option value="Cluster">Cluster</option>
								<option value="Semi-D">Semi-D</option>
								<option value="Detached">Detached</option>
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


