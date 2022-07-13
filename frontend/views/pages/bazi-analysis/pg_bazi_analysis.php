<?php

use yii\web\View;
use yii\helpers\Url;

$this->registerCssFile("@web/css/service/bazi-analysis.css?2019-03-01-0000", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->title = Yii::t('app', 'BAZI ANALYSIS');

$this->registerCss('
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
							<source src="../images/service/bazi-analysis/bazi-analysis-s.mov">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/bazi-analysis/bazi-analysis-lg.mov">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php elseif ($android): ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/bazi-analysis/bazi-analysis-s.webm" type="video/webm">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/bazi-analysis/bazi-analysis-lg.webm" type="video/webm">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php else: ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/bazi-analysis/bazi-analysis-s.mp4" type="video/mp4">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/bazi-analysis/bazi-analysis-lg.mp4" type="video/mp4">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php endif; ?>

				<div class="section_overlay"></div>
			</div>
			<div class="seq-absolute seq-model-1-1">
				<img src="../images/service/bazi-analysis/title-en.png" class="d-flex mx-auto h-100 w-auto" alt="Fengshui Republic" />
			</div>
		</div>
	</div>
</div>

<div class="fsrepublic-gradient-brown">
	<div class="container py-4">
		<div class="row">
			<div class="col-11 mx-auto">
				<p class="m-0 text-center fsrepublic-text-white">Uncertain of which path to tread? Bazi Reading will make you to understand your own personality, fortune and overall direction!</p>
			</div>
		</div>
	</div>
</div>

<div id="bg-1">
	<div class="container py-5">
		<div class="row">
			<div class="col-10 col-md-8 mx-auto">
				<p class="text-left text-md-center">Are you facing uncertainties about your future and which path you should tread? Bazi can help you to understand your overall and future fortunes to guide you towards choosing the best resolutions.</p>
				<p class="text-left text-md-center">Bazi is not a superstition. It is the code of life with a formula to calculate one’s future outcomes in life. Only an expert Chinese metaphysician can tell a person’s ups and downs in his or her life through Bazi and Qimen Dunjia.</p>
			</div>
		</div>
	</div>
</div>

<div id="bg-2">
	<div class="container py-5">
		<div class="row d-none d-md-block">
			<div class="col-10 mx-auto">
				<div class="row fsrepublic-text-white">
					<div class="col-5 offset-1">
						<p>Knowing our own Bazi allows us to know our strengths and weaknesses, and enables us to make the right decisions to help us achieve success.</p>
						<ul class="pl-3 mb-0" style="list-style-type:disc">
							<li>Personality analysis</li>
							<li>Five Elemental strengths and weaknesses</li>
							<li>General fortune</li>
						</ul>
					</div>
					<div class="col-6">
						<ul class="pl-3 mb-0" style="list-style-type:disc">
							<li>Situational analysis</li>
							<li>Development direction</li>
							<li>Personal color</li>
							<li>Personal strengths and weaknesses</li>
							<li>Investment, wealth, health, children and career luck</li>
							<li>Career direction</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row d-block d-md-none">
			<div class="col-10 mx-auto">
				<p>Knowing our own Bazi allows us to know our strengths and weaknesses, and enables us to make the right decisions to help us achieve success.</p>
				<ul class="pl-3 mb-0" style="list-style-type:disc">
					<li>Personality analysis</li>
					<li>Five Elemental strengths and weaknesses</li>
					<li>General fortune</li>
					<li>Situational analysis</li>
					<li>Development direction</li>
					<li>Personal color</li>
					<li>Personal strengths and weaknesses</li>
					<li>Investment, wealth, health, children and career luck</li>
					<li>Career direction</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0 d-none d-md-block">
	<div class="seq">
		<div class="seq-canvas">
			<div class="seq-absolute seq-background">
				<div id="main_image_2_1"></div>
				<div class="section_overlay lite_overlay"></div>
			</div>
			<div class="seq-absolute seq-model-2-1">
				<h2 class="text-center fsrepublic-text-white">YEARLY BAZI</h2>
			</div>
		</div>
	</div>
</div>

<div class="container pt-3 pb-5">
	<div class="row d-block d-md-none">
		<div class="col-12 mx-auto mb-4">
			<img src="../images/service/bazi-analysis/writing-brush.jpg" class="img-fluid w-100">
		</div>
	</div>
	<div class="row">
		<div class="col-10 mx-auto">
			<h4 class="text-center fsrepublic-text-gold d-block d-md-none">YEARLY BAZI</h4>
			<img src="../images/fr/line.png" class="img-fluid w-100 d-block d-md-none">
			<p class="text-center fsrepublic-text-gold m-0">Strategize your own destiny, master your own fate.</p>
		</div>
	</div>
	<div class="row">
		<div class="col-10 col-md-6 mx-auto">
			<img src="../images/fr/line.png" class="img-fluid w-100 d-none d-md-block">
		</div>
	</div>
	<div class="row">
		<div class="col-11 col-md-8 mx-auto">
			<div id="bg-yearly-bazi">
				<p class="text-left text-md-center mt-4">After knowing your own Bazi, it is recommended to discover your yearly Bazi analysis to prepare for the challenges of the new year. The Yearly Bazi analysis will show you the ups and downs of one’s fortune within the year and caution you on each month’s challenges so you can achieve the best of your finance, health, career, love life and other aspects of your fortune.</p>
				<button type="button" class="btn btn-primary my-5 d-flex mx-auto" data-toggle="modal" data-target="#enquiryModal">know more</button>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0 d-none d-md-block">
	<div class="seq">
		<div class="seq-canvas">
			<div class="seq-absolute seq-background">
				<div id="main_image_3_1"></div>
				<div class="section_overlay lite_overlay"></div>
			</div>
			<div class="seq-absolute seq-model-3-1">
				<h2 class="text-center fsrepublic-text-white">LIFE'S BLUE PRINT</h2>
			</div>
		</div>
	</div>
</div>

<div class="container pt-3 pb-5 pb-md-0">
	<div class="row d-block d-md-none">
		<div class="col-12 mx-auto mb-4">
			<img src="../images/service/bazi-analysis/combination-lock.jpg" class="img-fluid w-100">
		</div>
	</div>
	<div class="row">
		<div class="col-10 mx-auto">
			<h4 class="text-center fsrepublic-text-gold d-block d-md-none">LIFE'S BLUE PRINT</h4>
			<img src="../images/fr/line.png" class="img-fluid w-100 d-block d-md-none">
			<p class="text-center fsrepublic-text-gold m-0">Devise your own life strategy, make the best choice for yourself!</p>
		</div>
	</div>
	<div class="row">
		<div class="col-10 col-md-6 mx-auto">
			<img src="../images/fr/line.png" class="img-fluid w-100 d-none d-md-block">
		</div>
	</div>
	<div class="row">
		<div class="col-11 col-md-8 mx-auto">
			<div id="bg-bleu-print">
				<p class="text-left text-md-center mt-4">All of us have strengths, talents, and life missions to fulfill. By understanding of our own personality with Life’s Blue Print Bazi analysis, we can discover more about ourselves to ensure greater chances of achieving success in life. Through analyzing the hidden secret codes in your personal Bazi, Fengshui Republic will produce your Personal Life Blue Print. It must be noted that life is not fatalistic or pre-determined - rather your Personal Life Blue Print maps your weaknesses and strengths and recommends ways to master your own fate.</p>
				<p class="text-left text-md-center">*This service is more economical as there is no need to meet the Master in person.</p>
				<button type="button" class="btn btn-primary my-5 d-flex mx-auto" data-toggle="modal" data-target="#enquiryModal">know more</button>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-12 mx-auto d-block d-md-none">
			<img src="../images/service/bazi-analysis/little-girl.jpg" class="img-fluid w-100">
			<h4 class="text-center fsrepublic-text-gold d-block d-md-none mt-4">CHILD POTENTIAL<br>REPORT</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-10 mx-auto mb-4">
			<img src="../images/fr/line.png" class="img-fluid w-100">
		</div>
	</div>
	<div class="row">
		<div class="col-11 col-md-4 offset-md-2 d-none d-md-block">
			<img src="../images/service/bazi-analysis/little-girl.jpg" class="img-fluid w-100">
			<img src="../images/service/bazi-analysis/fengshui-republic-report.png" id="potential-report-img" class="img-fluid d-flex mx-auto" width="250">
			<p id="potential-report-word" class="text-right fsrepublic-text-gold">Child Potential Report</p>
		</div>
		<div class="col-11 col-md-4 mx-auto ml-md-3">
			<div id="bg-child-potential" class="pb-5 mb-5">
				<h4 class="text-center text-md-left fsrepublic-text-gold d-none d-md-block">CHILD POTENTIAL REPORT</h4>
				<p class="text-center text-md-left fsrepublic-text-gold">Understand your child’s potentials and edges to pave the path towards his or her success!</p>
				<p>In ancient days Metaphysicians would determine the Guan Sha, or a child’s points of negative influences through Bazi. If a child carries Guan Sha, he or she must exercise caution during a specific period. The Bazi Potential Report will include this, together with the child’s potential and directions based on the Five Elements and Bazi to help parents discover the child’s strengths and weaknesses to ensure a bright and successful future.</p>
				<p>*This service is more economical as there is no need to meet the Master in person.</p>
				<img src="../images/service/bazi-analysis/fengshui-republic-report.png" class="img-fluid d-flex mx-auto mt-5 d-block d-md-none" width="250">
				<button type="button" class="btn btn-primary d-flex my-3 mx-auto ml-md-0" data-toggle="modal" data-target="#enquiryModal">know more</button>
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
						<img src="../images/service/all-services/service-extra1-en.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/bazi') ?>" class="btn btn-primary mt-3 mb-5">know more</a>
					</div>
					<div class="col-12 col-sm-6 px-0 px-sm-3 mx-auto text-center">
						<img src="../images/service/all-services/service-extra2-en.jpg" class="img-fluid w-100">
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
				<h5 class="modal-title"><?= Yii::t('app', 'BAZI ANALYSIS'); ?> <?= Yii::t('app', 'ENQUIRY'); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= Url::to(['/enquiry']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Enquiry[service]" value="<?= Yii::t('app', 'BAZI ANALYSIS'); ?>">
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
						<label for="enquiry_type" class="col-sm-4 col-form-label text-left text-sm-right">*Bazi Service</label>
						<div class="col-sm-8">
							<select id="enquiry_type" name="Enquiry[info][service]" class="form-control form-control-sm" required>
								<option value="">Please Select One</option>
								<option value="Bazi Consultation">Bazi Consultation</option>
								<option value="Annual Bazi">Annual Bazi</option>
								<option value="Bazi Potential">Bazi Potential</option>
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


