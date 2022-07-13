<?php

use yii\web\View;
use yii\helpers\Url;

$this->registerCssFile("@web/css/course/qimen.css?2019-03-03-0000", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->title = Yii::t('app', 'QI MEN');

$this->registerCss('
	#seq-main {
		height: 900px;
	}

	.table-bordered td {
		border: 1px solid #7a6142;
		vertical-align: middle;
	}

	.table-bordered tr td:first-child {
		width: 50%;
	}

	td:nth-child(2) {
		width: 25%;
	}

	td:nth-child(3) {
		width: 25%;
	}

	@media (max-width: 575px){
		#seq-main {
			height: 1050px;
		}

		#main_qimen_1_1 {
			height: 1050px;
		}

		.seq .seq-model-video {
			width: 100%;
			height: 16%;
			left: 0%;
		}

		#logo-img {
			width: 70%;
		}

		.seq .seq-model-1-1 {
			width: 80%;
			left: 10%;
			top: 510px;
		}
	}

	@media (min-width: 576px) and (max-width: 767px){
		#seq-main {
			height: 1050px;
		}

		#main_qimen_1_1 {
			height: 1050px;
		}

		.seq .seq-model-video {
			width: 70%;
			height: 21%;
			left: 15%;
		}

		#logo-img {
			width: 45%;
		}

		.seq .seq-model-1-1 {
			width: 80%;
			left: 10%;
			top: 570px;
		}
	}

	@media (min-width: 768px) and (max-width: 991px){
		.seq .seq-model-video {
			width: 70%;
			height: 25%;
			left: 15%;
		}

		.seq-model-logo {
			width: 100%;
			right: 200px;
			height: 28%;
			top: 510px;
		}

		.seq .seq-model-1-1 {
			width: 50%;
			left: 45%;
			top: 540px;
		}
	}

	@media (min-width: 992px) and (max-width: 1199px){
		.seq .seq-model-video {
			width: 60%;
			left: 20%;
		}

		.seq-model-logo {
			width: 100%;
			right: 200px;
			height: 28%;
			top: 540px;
		}

		.seq .seq-model-1-1 {
			width: 40%;
			left: 45%;
			top: 570px;
		}
	}

	@media (min-width: 1200px){
		#seq-gif,
		#main_gif_1_2 {
			padding-top: 30%;
		}

		.seq-model-logo {
			width: 100%;
			right: 290px;
			height: 28%;
			top: 550px;
		}

		.seq .seq-model-1-1 {
			width: 40%;
			left: 40%;
			top: 580px;
		}
	}

	@media (min-width: 1500px){
		.seq .seq-model-video {
			width: 70%;
			left: 15%;
		}
	}
');

$this->registerJs('
	$(".view-img").click(function () {
		var data = $(this).data();

		$("#prompt-img").attr("src", data.img);
		$("#imageModal").modal("show");
	})

	$("#videoModal").on("hidden.bs.modal", function () {
		$("#yt-video iframe").attr("src", $("#yt-video iframe").attr("src"));
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

<div class="fsrepublic-gradient-brown">
	<div class="container py-3">
		<div class="row">
			<div class="col-10 mx-auto">
				<h5 class="m-0 text-center fsrepublic-text-white">QIMEN DUNJIA <br class="d-block d-md-none">COURSE</h5>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0">
	<div id="seq-gif" class="seq">
		<div class="seq-canvas">
			<div class="seq-absolute seq-background">
				<div id="main_gif_1_1" class="d-block d-md-none"></div>
				<div id="main_gif_1_2" class="d-none d-md-block"></div>
			</div>
		</div>
	</div>
</div>

<div class="bg-brown">
	<div class="container py-3">
		<div class="row">
			<div class="col-11 mx-auto">
				<p class="m-0 text-center fsrepublic-text-white">Our Qimen Dunjia course is available soon. Register now!</p>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0">
	<div id="seq-main" class="seq">
		<div class="seq-canvas">
			<div class="seq-absolute seq-background">
				<div id="main_qimen_1_1"></div>
				<div id="main_qimen_2_1"></div>
			</div>
			<div class="seq-absolute seq-model-qimen">
				<img src="../images/course/course-qimen/qimen.png" class="d-flex mx-auto h-100 w-auto">
			</div>
			<div class="seq-absolute seq-model-video">
				<img src="../images/course/course-qimen/video.jpg" class="d-flex mx-auto h-100 w-auto" data-toggle="modal" data-target="#videoModal" style="cursor: pointer">
			</div>
			<div class="seq-absolute seq-model-logo d-none d-md-block">
				<img src="../images/course/logo-course-en.png" class="d-flex mx-auto h-100 w-auto">
			</div>
			<div class="seq-absolute seq-model-1-1">
				<p class="text-center text-md-left fsrepublic-text-white">Fengshui Republic is the only ISO9001-certified Malaysian institute that offers complete, comprehensive courses in Fengshui and Chinese Metaphysics. Acquiring knowledge in Chinese Metaphysics allows you to understand yourself and others, avoid being a victim of fraud, and learn extensive lessons with Fengshui Republic.</p>
				<div class="d-block d-md-none">
					<img id="logo-img" src="../images/course/logo-course-en.png" class="d-flex mx-auto">
				</div>
				<div id="qimen-btn" class="text-center">
					<button type="button" class="btn btn-primary d-flex mx-auto ml-md-0" data-toggle="modal" data-target="#scheduleModal">class schedule</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="bg-light">
	<div class="container py-5">
		<div class="row">
			<div class="col-10 col-md-8 mx-auto">
				<p class="text-center">Qimen Dunjia is an art and science used by ancient Chinese strategists to devise their moves and tactics. Fengshui Republic now teaches this knowledge form in an easy-to-understand way, aided by proprietary software to help you master Qimen Dunjia.</p>
			</div>
		</div>
	</div>
</div>

<div id="faq" class="pb-5">
	<div class="container-fluid">
		<div class="row">
			<div class="col-10 mx-auto px-0">
				<img src="../images/course/course-qimen/hand.png" class="img-fluid d-flex mx-auto" width="400">
			</div>
		</div>
	</div>

	<div id="bg-desc" class="container">
		<div class="row">
			<div class="col-10 mx-auto">
				<div class="row">
					<div class="col-12 col-md-4 offset-md-1">
						<img src="../images/course/course-qimen/chart.png" class="img-fluid">
					</div>
					<div class="col-12 col-md-6 mt-4">
						<h5 class="fsrepublic-text-gold">A Professional Course for Strategizing Your Moves</h5>
						<p>As an ancient knowledge form used by military strategists in the past, Qimen Dunjia benefits those who wish to start their own business. Applying this ancient wisdom in business will allow you to influence and improve the desired results. We can use this knowledge to locate the cosmic energy field and discover our potentials and create our own future.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container py-5">
		<div class="row">
			<div class="col-10 mx-auto">
				<div class="d-block d-md-none">
					<div class="row">
						<div class="col-12 px-0">
							<img src="../images/course/course-qimen/photo/img-s-2.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/course-qimen/photo/img-l-2.jpg') ?>" style="cursor:pointer;">
						</div>
						<div class="col-6 px-0">
							<img src="../images/course/course-qimen/photo/img-s-1.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/course-qimen/photo/img-l-1.jpg') ?>" style="cursor:pointer;">
						</div>
						<div class="col-6 px-0">
							<img src="../images/course/course-qimen/photo/img-s-3.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/course-qimen/photo/img-l-3.jpg') ?>" style="cursor:pointer;">
						</div>
					</div>
				</div>
				<div class="d-none d-md-block">
					<div class="row">
						<div class="col-3 px-0">
							<img src="../images/course/course-qimen/photo/img-s-1.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/course-qimen/photo/img-l-1.jpg') ?>" style="cursor:pointer;">
						</div>
						<div class="col-6 px-0">
							<img src="../images/course/course-qimen/photo/img-s-2.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/course-qimen/photo/img-l-2.jpg') ?>" style="cursor:pointer;">
						</div>
						<div class="col-3 px-0">
							<img src="../images/course/course-qimen/photo/img-s-3.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/course-qimen/photo/img-l-3.jpg') ?>" style="cursor:pointer;">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-md-6 px-0">
						<img src="../images/course/course-qimen/photo/img-s-4.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/course-qimen/photo/img-l-4.jpg') ?>" style="cursor:pointer;">
					</div>
					<div class="col-12 col-md-6 px-0">
						<img src="../images/course/course-qimen/photo/img-s-5.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/course-qimen/photo/img-l-5.jpg') ?>" style="cursor:pointer;">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-12 col-md-10 mx-auto pb-5">
				<img src="../images/fr/line.png" class="img-fluid w-100">
			</div>
		</div>
		<div class="row">
			<div class="col-11 col-md-8 mx-auto">
				<h5 class="text-center mb-3 mb-md-5 fsrepublic-text-gold">Qimen Course Q&A</h5>
			</div>
		</div>
		<div class="row">
			<div class="col-11 col-md-8 mx-auto">
				<div class="accordion mt-3" id="accordionFAQ">
					<div class="row">
						<div class="col-12">
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading01" data-toggle="collapse" data-target="#collapse01" aria-expanded="true" aria-controls="collapse01">
									<ol class="pl-3 mb-0" start="1">
										<li>Why learn Qimen Dunjia from us?</li>
									</ol>
								</div>
								<div id="collapse01" class="collapse show" aria-labelledby="heading01" data-parent="#accordionFAQ">
									<div class="card-body">
										<ol class="pl-3 mb-0" style="list-style-type: none;">
											<li>Fengshui Republic is the only ISO9001-certified Fengshui and Chinese Metaphysics Institute using highly systematic teaching methods to help you master Qimen Dunjia. You will also learn how to strategize from a macro perspective and use successful stories to help you understand the fundamentals of Qimen Dunjia.</li>
										</ol>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading02" data-toggle="collapse" data-target="#collapse02" aria-expanded="true" aria-controls="collapse02">
									<ol class="pl-3 mb-0" start="2">
										<li>Who should learn Qimen Dunjia?</li>
									</ol>
								</div>
								<div id="collapse02" class="collapse" aria-labelledby="heading02" data-parent="#accordionFAQ">
									<div class="card-body">
										<ul class="pl-3 mb-0">
											<li>Those running their own business, because the business world is a battlefield. Qimen Dunjia allows us to master the entire situation, win over clients and elevate our careers to greater heights.</li>
											<li>Qimen Dunjia will be helpful for business owners facing human resource issues.</li>
											<li>Qimen Dunjia can provide effective strategies for those wishing to start their own business or salaried employees.</li>
											<li>Most importantly, Qimen Dunjia is all about tapping natural energies to improve our livelihood.</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading03" data-toggle="collapse" data-target="#collapse03" aria-expanded="true" aria-controls="collapse03">
									<ol class="pl-3 mb-0" start="3">
										<li>Is Qimen Dunjia difficult to master?</li>
									</ol>
								</div>
								<div id="collapse03" class="collapse" aria-labelledby="heading03" data-parent="#accordionFAQ">
									<div class="card-body">
										<ul class="pl-3 mb-0">
											<li>Mastering Qimen Dunjia is painstakingly long and arduous. However, our proprietary and unique software is designed to help you master Qimen Dunjia easily.</li>
											<li>Anyone can master our Qimen Dunjia course. You will be able to apply what you have learnt anytime, anywhere with Fengshui Republic’s easy learning system.</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading04" data-toggle="collapse" data-target="#collapse04" aria-expanded="true" aria-controls="collapse04">
									<ol class="pl-3 mb-0" start="4">
										<li>What are the benefits of learning Qimen Dunjia?</li>
									</ol>
								</div>
								<div id="collapse04" class="collapse" aria-labelledby="heading04" data-parent="#accordionFAQ">
									<div class="card-body">
										<ol class="pl-3 mb-0" style="list-style-type: none;">
											<li>Mastering Qimen Dunjia is like having an invisible strategist to advise you on how to maximize your desired results and minimize unwanted events.</li>
										</ol>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<button type="button" class="btn btn-primary d-flex mx-auto mt-4" data-toggle="modal" data-target="#enquiryModal">know more</button>
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
						<img src="../images/course/all-courses/course-en-1.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/bazi') ?>" class="btn btn-primary mt-3 mb-5">know more</a>
					</div>
					<div class="col-12 col-sm-6 px-0 px-sm-3 mx-auto text-center">
						<img src="../images/course/all-courses/course-en-5.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/fengshui') ?>" class="btn btn-primary mt-3 mb-5">know more</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<img id="prompt-img" class="img-fluid w-100">
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
					<iframe class="embed-responsive embed-responsive-1by1" width="560" height="315" src="https://www.youtube.com/embed/m0goiDZBua0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="scheduleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Qimen Dunjia Class Schedule <?= date('Y') ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h5>Kuala Lumpur</h5>
				<table class="table table-bordered table-sm text-center" style="background-color: #EFECE8;">
					<tbody>
						<?php foreach ($groups as $group): ?>
							<?php if ($group->location == 'KL'): ?>
								<?php $rep = 1; ?>
								<?php foreach ($schedules as $schedule): ?>
									<?php if ($schedule->name_en == $group->name_en && $schedule->location == 'KL'): ?>
										<tr>
											<?php if ($rep == 1): ?>
												<td rowspan="<?= $group->cnt ?>"><?= $group->name_en ?></td>
												<td rowspan="<?= $group->cnt ?>"><?= $group->cnt ?> days</td>
											<?php endif; ?>
											<td><?= date("d F", strtotime($schedule->date)) ?></td>
										</tr>
										<?php $rep++; ?>
									<?php endif; ?>
								<?php endforeach; ?>
							<?php endif; ?>
						<?php endforeach; ?>
					</tbody>
				</table>
				<h5 class="mt-4">Johor Bahru</h5>
				<table class="table table-bordered table-sm text-center" style="background-color: #EFECE8;">
					<tbody>
						<?php foreach ($groups as $group): ?>
							<?php if ($group->location == 'JB'): ?>
								<?php $rep = 1; ?>
								<?php foreach ($schedules as $schedule): ?>
									<?php if ($schedule->name_en == $group->name_en && $schedule->location == 'JB'): ?>
										<tr>
											<?php if ($rep == 1): ?>
												<td rowspan="<?= $group->cnt ?>"><?= $group->name_en ?></td>
												<td rowspan="<?= $group->cnt ?>"><?= $group->cnt ?> days</td>
											<?php endif; ?>
											<td><?= date("d F", strtotime($schedule->date)) ?></td>
										</tr>
										<?php $rep++; ?>
									<?php endif; ?>
								<?php endforeach; ?>
							<?php endif; ?>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">COURSE ENQUIRY</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= Url::to(['/enquiry']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Enquiry[service]" value="Course Enquiry">
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
						<label for="enquiry_type" class="col-sm-4 col-form-label text-left text-sm-right">*Course Type</label>
						<div class="col-sm-8">
							<select id="enquiry_type" name="Enquiry[info][type]" class="form-control form-control-sm" required>
								<option value="">Please Select One</option>
								<option value="Fengshui">Fengshui</option>
								<option value="Bazi">Bazi</option>
								<option value="Qimen Dunjia">Qimen Dunjia</option>
								<option value="Yijing">Yijing</option>
								<option value="Yi Yan Duan">Yi Yan Duan</option>
								<option value="Mian Xiang">Physiognomy (Mian Xiang)</option>
								<option value="All">All</option>
							</select>
							<div id="other-type-textarea"></div>
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


