<?php

use yii\web\View;
use yii\helpers\Url;

$this->registerCssFile("@web/css/course/fengshui.css?2019-03-03-0000", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->title = Yii::t('app', 'FENGSHUI');

$this->registerCss('
	#seq-main {
		height: 1150px;
	}

	#main_fengshui_2_1 {
		height: 850px;
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
		#main_fengshui_2_1 {
			background-position: left;
		}

		.seq .seq-model-video {
			width: 100%;
			height: 15%;
			left: 0%;
		}

		#logo-img {
			width: 70%;
		}

		.seq .seq-model-1-1 {
			width: 80%;
			left: 10%;
			top: 470px;
		}
	}

	@media (min-width: 576px) and (max-width: 767px){
		.seq .seq-model-video {
			width: 70%;
			height: 20%;
			left: 15%;
		}

		#logo-img {
			width: 45%;
		}

		.seq .seq-model-1-1 {
			width: 80%;
			left: 10%;
			top: 530px;
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
			height: 22%;
			top: 560px;
		}

		.seq .seq-model-1-1 {
			width: 50%;
			left: 45%;
			top: 590px;
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
			height: 22%;
			top: 550px;
		}

		.seq .seq-model-1-1 {
			width: 40%;
			left: 45%;
			top: 580px;
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
			height: 22%;
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
				<h5 class="m-0 text-center fsrepublic-text-white">FENGSHUI <br class="d-block d-md-none">COURSE</h5>
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
				<p class="m-0 text-center fsrepublic-text-white">Fengshui knowledge allows you to understand Fengshui better and to know what is or not auspicious, and to avoid being a victim of fraud.</p>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0">
	<div id="seq-main" class="seq">
		<div class="seq-canvas">
			<div class="seq-absolute seq-background">
				<div id="main_fengshui_1_1"></div>
				<div id="main_fengshui_2_1"></div>
			</div>
			<div class="seq-absolute seq-model-fengshui">
				<img src="../images/course/course-fengshui/fengshui.png" class="d-flex mx-auto h-100 w-auto">
			</div>
			<div class="seq-absolute seq-model-video">
				<img src="../images/course/course-fengshui/video.jpg" class="d-flex mx-auto h-100 w-auto" data-toggle="modal" data-target="#videoModal" style="cursor: pointer">
			</div>
			<div class="seq-absolute seq-model-logo d-none d-md-block">
				<img src="../images/course/logo-course-en.png" class="d-flex mx-auto h-100 w-auto">
			</div>
			<div class="seq-absolute seq-model-1-1">
				<p class="text-center text-md-left fsrepublic-text-white">Fengshui Republic is the only ISO9001-certified Malaysian institute that offers complete, comprehensive courses in Fengshui and Chinese Metaphysics. We are the first institution to teach complete Fengshui knowledge - from the first to the last layers of Luo Pan or Fengshui compass, including various schools of Fengshui like Three Harmonies, Three Cycles, Nine Stars and Landform. These comprehensive Fengshui knowledge allows you to understand Fengshui better and to know what is or not auspicious, and to avoid being a victim of fraud.</p>
				<div class="d-block d-md-none">
					<img id="logo-img" src="../images/course/logo-course-en.png" class="d-flex mx-auto">
				</div>
				<div id="fengshui-btn" class="text-center">
					<button type="button" class="btn btn-primary d-flex mx-auto ml-md-0" data-toggle="modal" data-target="#scheduleModal">class schedule</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="faq" class="py-5">
	<div class="container py-5">
		<div class="row">
			<div class="col-10 mx-auto">
				<div class="row">
					<div class="col-12 col-md-6">
						<div class="row">
							<div class="col-6 px-0">
								<img src="../images/course/course-fengshui/photo/img-s-1.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/course-fengshui/photo/img-l-1.jpg') ?>" style="cursor:pointer;">
							</div>
							<div class="col-6 px-0">
								<img src="../images/course/course-fengshui/photo/img-s-2.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/course-fengshui/photo/img-l-2.jpg') ?>" style="cursor:pointer;">
							</div>
							<div class="col-12 px-0">
								<img src="../images/course/course-fengshui/photo/img-s-6.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/course-fengshui/photo/img-l-6.jpg') ?>" style="cursor:pointer;">
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="row">
							<div class="col-4 px-0">
								<img src="../images/course/course-fengshui/photo/img-s-3.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/course-fengshui/photo/img-l-3.jpg') ?>" style="cursor:pointer;">
							</div>
							<div class="col-4 px-0">
								<img src="../images/course/course-fengshui/photo/img-s-4.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/course-fengshui/photo/img-l-4.jpg') ?>" style="cursor:pointer;">
							</div>
							<div class="col-4 px-0">
								<img src="../images/course/course-fengshui/photo/img-s-5.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/course-fengshui/photo/img-l-5.jpg') ?>" style="cursor:pointer;">
							</div>
							<div class="col-12 px-0">
								<img src="../images/course/course-fengshui/photo/img-s-7.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/course-fengshui/photo/img-l-7.jpg') ?>" style="cursor:pointer;">
							</div>
						</div>
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
				<h5 class="text-center mb-3 mb-md-5 fsrepublic-text-gold">Fengshui Course Q&A</h5>
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
										<li>Why learn Fengshui from us?</li>
									</ol>
								</div>
								<div id="collapse01" class="collapse show" aria-labelledby="heading01" data-parent="#accordionFAQ">
									<div class="card-body">
										<ol class="pl-3 mb-0" style="list-style-type: none;">
											<li>We are the only Fengshui institute that teaches complete knowledge in Fengshui. It is not just Fengshui that we are teaching, we also teach our students on date selection to utilize the benefits of time, location and human factors. We have also developed our own Fengshui compass, and our students will benefit from practical fieldwork. We do not just teach Fengshui; we teach the complete knowledge of Fengshui. Success examples are crucial in our learning and we should always learn from those who are successful.</li>
										</ol>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading02" data-toggle="collapse" data-target="#collapse02" aria-expanded="true" aria-controls="collapse02">
									<ol class="pl-3 mb-0" start="2">
										<li>Who should enrol in the Fengshui course?</li>
									</ol>
								</div>
								<div id="collapse02" class="collapse" aria-labelledby="heading02" data-parent="#accordionFAQ">
									<div class="card-body">
										<ol class="pl-3 mb-0" style="list-style-type: none;">
											<li>Those who wish to live a better life should join this course, as this course allows you to enjoy better living environment through utilizing the Earth’s energy to improve our magnetic field.</li>
											<li>Those who wish to enjoy business growth or improvement in career can also use Fengshui to enhance their energy to improve their fortune.</li>
										</ol>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading03" data-toggle="collapse" data-target="#collapse03" aria-expanded="true" aria-controls="collapse03">
									<ol class="pl-3 mb-0" start="3">
										<li>Is Fengshui difficult to learn? Can I learn Fengshui if my maths is bad?</li>
									</ol>
								</div>
								<div id="collapse03" class="collapse" aria-labelledby="heading03" data-parent="#accordionFAQ">
									<div class="card-body">
										<ol class="pl-3 mb-0" style="list-style-type: none;">
											<li>Fengshui is not difficult to master if you understand basic Mandarin. It is even easier to learn with Master Loh’s easy-to-understand instructions together with our comprehensible charts.  If you are still unable to master the course, a one-time-payment will allow you to attend the course again until you can grasp the course matters for minimal cost.</li>
										</ol>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading04" data-toggle="collapse" data-target="#collapse04" aria-expanded="true" aria-controls="collapse04">
									<ol class="pl-3 mb-0" start="4">
										<li>I wish to learn Fengshui for personal interest. Do I need to take all the Fengshui courses?</li>
									</ol>
								</div>
								<div id="collapse04" class="collapse" aria-labelledby="heading04" data-parent="#accordionFAQ">
									<div class="card-body">
										<ol class="pl-3 mb-0" style="list-style-type: none;">
											<li>It is not necessary to enrol for all Fengshui courses If it is only for personal interest. You can choose the Beginner and/or Intermediate levels. Many of our students learn Fengshui to make better choices in house selection or make better Fengshui arrangements. By learning basic Fengshui, you will be able to harmonize your house and differentiate between facts and superstitious beliefs.</li>
										</ol>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading05" data-toggle="collapse" data-target="#collapse05" aria-expanded="true" aria-controls="collapse05">
									<ol class="pl-3 mb-0" start="5">
										<li>I wish to make Fengshui as my career path, are these courses for me?</li>
									</ol>
								</div>
								<div id="collapse05" class="collapse" aria-labelledby="heading05" data-parent="#accordionFAQ">
									<div class="card-body">
										<ol class="pl-3 mb-0" style="list-style-type: none;">
											<li>If you wish to be a Fengshui Master, our Fengshui courses are for you! Our instructor has years of experience teaching thousands of students with solid practical experience, pragmatic, and concise knowledge. It should be noted that our institute is the first Fengshui institute that offers Chinese-language Fengshui courses, from Household Fengshui to Tomb Fengshui and the techniques of Fengshui Compass from the first section to the last section.</li>
										</ol>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading06" data-toggle="collapse" data-target="#collapse06" aria-expanded="true" aria-controls="collapse06">
									<ol class="pl-3 mb-0" start="6">
										<li>I have already learned basic Fengshui from another institute. Can I join more advanced courses here directly?</li>
									</ol>
								</div>
								<div id="collapse06" class="collapse" aria-labelledby="heading06" data-parent="#accordionFAQ">
									<div class="card-body">
										<ol class="pl-3 mb-0" style="list-style-type: none;">
											<li>Certainly! If you happen to find out there are differences of what you have learned before with the current courses, and you are unable to follow the paces, we advise you to take the Beginner’s Course and interact more with the beginner students. By revising what you have learned, surely you will learn something new.</li>
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
						<img src="../images/course/all-courses/course-en-6.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/yiyanduan') ?>" class="btn btn-primary mt-3 mb-5">know more</a>
					</div>
					<div class="col-12 col-sm-6 px-0 px-sm-3 mx-auto text-center">
						<img src="../images/course/all-courses/course-en-4.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/yijing') ?>" class="btn btn-primary mt-3 mb-5">know more</a>
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
					<iframe class="embed-responsive embed-responsive-1by1" width="560" height="315" src="https://www.youtube.com/embed/hBgsjTwAKl4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="scheduleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Fengshui Class Schedule <?= date('Y') ?></h5>
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
				<h5 class="mt-4">Kuala Lumpur and Johor Bahru</h5>
				<table class="table table-bordered table-sm text-center" style="background-color: #EFECE8;">
					<tbody>
						<?php foreach ($groups as $group): ?>
							<?php if ($group->location == 'KL & JB'): ?>
								<?php $rep = 1; ?>
								<?php foreach ($schedules as $schedule): ?>
									<?php if ($schedule->name_en == $group->name_en && $schedule->location == 'KL & JB'): ?>
										<tr>
											<?php if ($rep == 1): ?>
												<td rowspan="<?= $group->cnt ?>"><?= $group->name_en ?></td>
												<td rowspan="<?= $group->cnt ?>"><?= $group->cnt ?> days</td>
											<?php endif; ?>

											<?php $mid = floor($group->cnt/2); ?>
											<?php if ($rep > $mid): ?>
												<?php $location = 'JB'; ?>
											<?php else: ?>
												<?php $location = 'KL'; ?>
											<?php endif; ?>

											<td><?= date("d F", strtotime($schedule->date)) ?> (<?= $location ?>)</td>
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


