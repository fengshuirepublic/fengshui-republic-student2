<?php

use yii\web\View;
use yii\helpers\Url;

$this->registerCssFile("@web/css/service/adult-renaming.css?2018-12-18-0000", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->title = Yii::t('app', 'ADULT RENAMING');

$this->registerCss('
	.package-height {
		height: 530px;
	}

	@media (min-width: 768px) and (max-width: 991px){
		.package-height {
			height: 630px;
		}
	}
');

$this->registerJs('
	if(window.location.href.indexOf("?m=a") != -1) {
		$("#enquiryModalA").modal("show");
	}
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
							<source src="../images/service/adult-renaming/adult-renaming-s.mov">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/adult-renaming/adult-renaming-lg.mov">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php elseif ($android): ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/adult-renaming/adult-renaming-s.webm" type="video/webm">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/adult-renaming/adult-renaming-lg.webm" type="video/webm">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php else: ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/adult-renaming/adult-renaming-s.mp4" type="video/mp4">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/adult-renaming/adult-renaming-lg.mp4" type="video/mp4">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php endif; ?>

				<div class="section_overlay"></div>
			</div>
			<div class="seq-absolute seq-model-1-1">
				<img src="../images/service/adult-renaming/title-en.png" class="d-flex mx-auto h-100 w-auto" alt="Fengshui Republic" />
			</div>
		</div>
	</div>
</div>

<div class="fsrepublic-gradient-brown">
	<div class="container py-4">
		<div class="row">
			<div class="col-10 mx-auto">
				<p class="m-0 text-center fsrepublic-text-white">Having a good name can determine the success and failure in your life. Chose to have auspicious name!</p>
			</div>
		</div>
	</div>
</div>

<div class="container py-5">
	<div class="row">
		<div class="col-10 mx-auto">
			<p class="m-0 text-center">A good name can enhance your interpersonal relationship and help you succeed in life easily. Our adult renaming service is based on your Bazi, as well as the strengths and weaknesses of the Five Elements. We will provide 5 to 7 elegant names to suit your Bazi. Once you choose your selected new name we will include a comprehensive, detailed naming report.</p>
		</div>
	</div>
</div>

<div id="bg-1">
	<div class="container py-5">
		<div class="row d-none d-md-block">
			<div class="col-11 mx-auto">
				<div class="row">
					<div class="col-12 col-md-6 col-lg-5 ml-auto pl-0">
						<div class="bg-package pt-5 pb-3 px-3">
							<div class="d-flex justify-content-center">
								<p class="text-center bg-brown fsrepublic-text-white px-3">Package A</p>
							</div>
							<div class="package-height">
								<p class="text-center m-0 fsrepublic-text-gold">Adult Renaming</p>
								<p class="text-center fsrepublic-text-gold">RM688</p>
								<p class="text-center px-4">Our Adult Renaming Package is based on your Bazi (birth year, month, date and hour), as well as your favorable and unfavorable Five Elements. Based on your original name, we will provide you 7 to 10 names with high scores for you to chose from. If the original name cannot be used as reference, we will provide names of different characters but still having high scores. After you chose your name, we will provide you a complete analytical report on the name for you to keep.</p>
							</div>
							<button type="button" class="btn btn-primary my-5 d-flex mx-auto" data-toggle="modal" data-target="#enquiryModalA">know more</button>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-5 mr-auto pr-0">
						<div class="bg-package pt-5 pb-3 px-3">
							<div class="d-flex justify-content-center">
								<p class="text-center bg-brown fsrepublic-text-white px-3">Package B</p>
							</div>
							<div class="package-height">
								<p class="text-center m-0 fsrepublic-text-gold">Adult Renaming + English name</p>
								<p class="text-center fsrepublic-text-gold">RM788</p>
								<p class="text-center px-4">Our Adult Renaming Package is based on your Bazi (birth year, month, date and hour), as well as your favorable and unfavorable Five Elements. Based on your original name, we will provide you 7 to 10 names with high scores for you to chose from. If the original name cannot be used as reference, we will provide names of different characters but still having high scores. After you chose your name, we will provide you a complete analytical report on the name for you to keep.</p>
								<p class="text-center px-4">+</p>
								<p class="text-center px-4">Having an English name that suits your cultural, education background, and compatible with the balance of your Five Elements can help to greatly boost your career, marriage, health, academic life and interpersonal relationship.</p>
							</div>
							<button type="button" class="btn btn-primary my-5 d-flex mx-auto" data-toggle="modal" data-target="#enquiryModalB">know more</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row d-block d-md-none">
			<div class="col-12 mx-auto">
				<div class="d-flex justify-content-center">
					<p class="text-center bg-brown fsrepublic-text-white px-3">Package A</p>
				</div>
				<p class="text-center m-0 fsrepublic-text-gold">Adult Renaming</p>
				<p class="text-center fsrepublic-text-gold">RM688</p>
				<p class="text-center px-4">Our Adult Renaming Package is based on your Bazi (birth year, month, date and hour), as well as your favorable and unfavorable Five Elements. Based on your original name, we will provide you 7 to 10 names with high scores for you to chose from. If the original name cannot be used as reference, we will provide names of different characters but still having high scores. After you chose your name, we will provide you a complete analytical report on the name for you to keep.</p>
				<button type="button" class="btn btn-primary mt-5 d-flex mx-auto">know more</button>
			</div>
		</div>
	</div>
</div>

<div class="container py-5 d-block d-md-none">
	<div class="row">
		<div class="col-12 mx-auto">
			<div class="d-flex justify-content-center">
				<p class="text-center bg-brown fsrepublic-text-white px-3">Package B</p>
			</div>
			<p class="text-center m-0 fsrepublic-text-gold">Adult Renaming + English name</p>
			<p class="text-center fsrepublic-text-gold">RM788</p>
			<p class="text-center px-4">Our Adult Renaming Package is based on your Bazi (birth year, month, date and hour), as well as your favorable and unfavorable Five Elements. Based on your original name, we will provide you 7 to 10 names with high scores for you to chose from. If the original name cannot be used as reference, we will provide names of different characters but still having high scores. After you chose your name, we will provide you a complete analytical report on the name for you to keep.</p>
			<p class="text-center px-4">+</p>
			<p class="text-center px-4">Having an English name that suits your cultural, education background, and compatible with the balance of your Five Elements can help to greatly boost your career, marriage, health, academic life and interpersonal relationship.</p>
		</div>
	</div>
</div>

<div class="container-fluid d-block d-md-none">
	<div class="row">
		<div class="col-12 px-0">
			<div id="bg-2">
				<button type="button" class="btn btn-primary d-flex mx-auto">know more</button>
			</div>
		</div>
	</div>
</div>

<div class="container py-5">
	<p class="text-center m-0 fsrepublic-text-gold">Adult Renaming FAQ</p>
	<div class="row">
		<div class="col-10 col-md-4 mx-auto d-none d-md-block">
			<img src="../images/fr/line.png" class="img-fluid w-100">
		</div>
	</div>
	<div class="row">
		<div class="col-11 mx-auto">
			<div class="accordion mt-3" id="accordionFAQ">
				<div class="row">
					<div class="col-12 col-md-6">
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading01" data-toggle="collapse" data-target="#collapse01" aria-expanded="true" aria-controls="collapse01">
								<ol class="pl-3 mb-0" start="1">
									<li>Why can’t I change back to my old name?</li>
								</ol>
							</div>
							<div id="collapse01" class="collapse show" aria-labelledby="heading01" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>The Art of Naming emphasizes that one’s name has to be compatible with the Bazi. If the original name is not compatible with the client’s Five Elements, we would not recommend the client using the old name.</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading02" data-toggle="collapse" data-target="#collapse02" aria-expanded="true" aria-controls="collapse02">
								<ol class="pl-3 mb-0" start="2">
									<li>Do I have to participate in any ritual worship after changing my name?</li>
								</ol>
							</div>
							<div id="collapse02" class="collapse" aria-labelledby="heading02" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>There is no such requirement in the Art of Naming. However, if it is in your family tradition, you can opt for such ritual worship. Generally, the ritual would involve in offering joss sticks to the ancestors and informing them about your new name.</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading03" data-toggle="collapse" data-target="#collapse03" aria-expanded="true" aria-controls="collapse03">
								<ol class="pl-3 mb-0" start="3">
									<li>Should I change my identity card?</li>
								</ol>
							</div>
							<div id="collapse03" class="collapse" aria-labelledby="heading03" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>There is no need to do so. However, we suggest that you change your name cards, stamps, and name labels to your new name.</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading04" data-toggle="collapse" data-target="#collapse04" aria-expanded="true" aria-controls="collapse04">
								<ol class="pl-3 mb-0" start="4">
									<li>I rarely use my Chinese name. Is there the need for me to change my Chinese name?</li>
								</ol>
							</div>
							<div id="collapse04" class="collapse" aria-labelledby="heading04" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>A person’s name is an important factor that determines his or her success and failure. If your name scores less than 70, we would recommend you change your name. Printing an auspicious name that is compatible with your Bazi on your name card can leave good impression of you on others, and can increase your fortune. Using such name frequently will have desirable effects.</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading05" data-toggle="collapse" data-target="#collapse05" aria-expanded="true" aria-controls="collapse05">
								<ol class="pl-3 mb-0" start="5">
									<li>How should I use my new name frequently?</li>
								</ol>
							</div>
							<div id="collapse05" class="collapse" aria-labelledby="heading05" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>You can use your new name more frequently on your name cards and stamps, or ask others to call you with your new name. If you rarely use your Chinese name, we provide the service of English naming to give you names compatible with your Five Elements.</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading06" data-toggle="collapse" data-target="#collapse06" aria-expanded="true" aria-controls="collapse06">
								<ol class="pl-3 mb-0" start="6">
									<li>Should I use my original name or my new name during ancestral worship or funeral?</li>
								</ol>
							</div>
							<div id="collapse06" class="collapse" aria-labelledby="heading06" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>You can use your new name. There will not be any negative consequences.</li>
									</ol>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading07" data-toggle="collapse" data-target="#collapse07" aria-expanded="true" aria-controls="collapse07">
								<ol class="pl-3 mb-0" start="7">
									<li>Many people still call me with my old name even after I got my new one. Will this affect me?</li>
								</ol>
							</div>
							<div id="collapse07" class="collapse" aria-labelledby="heading07" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>There will not be any effect, although this will not help to boost your luck.</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading08" data-toggle="collapse" data-target="#collapse08" aria-expanded="true" aria-controls="collapse08">
								<ol class="pl-3 mb-0" start="8">
									<li>After receiving the 10 names from the Master, if the client still has other naming suggestions, can the client send the names to the Master to enquire if the names are suitable?</li>
								</ol>
							</div>
							<div id="collapse08" class="collapse" aria-labelledby="heading08" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>Yes, but we recommend you to provide us these names before receiving your new names so that we can provide the 10 names that suit you. If you wish to have more names, extra fee will be charged.</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading09" data-toggle="collapse" data-target="#collapse09" aria-expanded="true" aria-controls="collapse09">
								<ol class="pl-3 mb-0" start="9">
									<li>My name is the same as a younger family member, but I like the name. Will that name affect me?</li>
								</ol>
							</div>
							<div id="collapse09" class="collapse" aria-labelledby="heading09" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>There will not be any effect. It is just that in Chinese culture, generally the elder person does not share the same name with the younger person to avoid confusion.</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading10" data-toggle="collapse" data-target="#collapse10" aria-expanded="true" aria-controls="collapse10">
								<ol class="pl-3 mb-0" start="10">
									<li>I am an aging person now, do I still need to change my name?</li>
								</ol>
							</div>
							<div id="collapse10" class="collapse" aria-labelledby="heading10" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>Our name is an important factor that determines our fortune. As long as you score is lower than 70 points, we recommend you to change your name.</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading11" data-toggle="collapse" data-target="#collapse11" aria-expanded="true" aria-controls="collapse11">
								<ol class="pl-3 mb-0" start="11">
									<li>How effective is name changing? How soon can I see the result?</li>
								</ol>
							</div>
							<div id="collapse11" class="collapse" aria-labelledby="heading11" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>Among the factors that influence our life, our name is one of the major factors, therefore changing our name will definitely be effective. As for how soon will you see the result, it depends on the frequency of using the name; the more often you use the name, the faster you will see the result.</li>
									</ol>
								</div>
							</div>
						</div>
					</div>
				</div>
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
						<img src="../images/service/all-services/service-en-5.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('services/bazi-analysis') ?>" class="btn btn-primary mt-3 mb-5">know more</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="enquiryModalA" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?= Yii::t('app', 'ADULT RENAMING'); ?> <?= Yii::t('app', 'ENQUIRY'); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= Url::to(['/enquiry']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Enquiry[service]" value="<?= Yii::t('app', 'ADULT RENAMING'); ?> Package A">
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
						<label for="enquiry_chinese_name" class="col-sm-4 col-form-label text-left text-sm-right">*Chinese Name (Original)</label>
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
						<label for="enquiry_dob" class="col-sm-4 col-form-label text-left text-sm-right">Date of Birth</label>
						<div class="col-sm-8">
							<select class="form-control" name="Enquiry[info][year]">
								<option value="">Please Select Year</option>
								<?php for ($i=2050; $i>1910; $i--): ?>
									<option value="<?= $i ?>"><?= $i ?> year</option>
								<?php endfor; ?>
							</select>
							<select class="form-control" name="Enquiry[info][month]">
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
							<select class="form-control" name="Enquiry[info][day]">
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
							<select class="form-control" name="Enquiry[info][hour]">
								<option value="">Please Select Hour</option>
								<?php for ($i=0; $i<24; $i++): ?>
									<option value="<?= $i ?>"><?= $i ?> hour</option>
								<?php endfor; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_preferred" class="col-sm-4 col-form-label text-left text-sm-right">Preferred Names</label>
						<div class="col-sm-8">
							<textarea id="enquiry_preferred" name="Enquiry[info][preferred]" class="form-control form-control-sm"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_avoid" class="col-sm-4 col-form-label text-left text-sm-right">Avoid Names</label>
						<div class="col-sm-8">
							<textarea id="enquiry_avoid" name="Enquiry[info][avoid]" class="form-control form-control-sm"></textarea>
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

<div class="modal fade" id="enquiryModalB" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?= Yii::t('app', 'ADULT RENAMING'); ?> <?= Yii::t('app', 'ENQUIRY'); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= Url::to(['/enquiry']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Enquiry[service]" value="<?= Yii::t('app', 'ADULT RENAMING'); ?> Package B">
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
						<label for="enquiry_chinese_name" class="col-sm-4 col-form-label text-left text-sm-right">*Chinese Name (Original)</label>
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
						<label for="enquiry_dob" class="col-sm-4 col-form-label text-left text-sm-right">Date of Birth</label>
						<div class="col-sm-8">
							<select class="form-control" name="Enquiry[info][year]">
								<option value="">Please Select Year</option>
								<?php for ($i=2050; $i>1910; $i--): ?>
									<option value="<?= $i ?>"><?= $i ?> year</option>
								<?php endfor; ?>
							</select>
							<select class="form-control" name="Enquiry[info][month]">
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
							<select class="form-control" name="Enquiry[info][day]">
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
							<select class="form-control" name="Enquiry[info][hour]">
								<option value="">Please Select Hour</option>
								<?php for ($i=0; $i<24; $i++): ?>
									<option value="<?= $i ?>"><?= $i ?> hour</option>
								<?php endfor; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_preferred" class="col-sm-4 col-form-label text-left text-sm-right">Preferred Names</label>
						<div class="col-sm-8">
							<textarea id="enquiry_preferred" name="Enquiry[info][preferred]" class="form-control form-control-sm"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_avoid" class="col-sm-4 col-form-label text-left text-sm-right">Avoid Names</label>
						<div class="col-sm-8">
							<textarea id="enquiry_avoid" name="Enquiry[info][avoid]" class="form-control form-control-sm"></textarea>
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


