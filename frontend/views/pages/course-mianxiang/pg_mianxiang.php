<?php

use yii\web\View;
use yii\helpers\Url;

$this->registerCssFile("@web/css/course/mianxiang.css?2018-12-19-0000", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->title = Yii::t('app', 'MIAN XIANG');

$this->registerCss('
	#seq-main {
		height: 900px;
	}

	@media (max-width: 575px){
		#seq-main {
			height: 1050px;
		}

		#main_mianxiang_1_1 {
			height: 1050px;
		}

		#logo-img {
			width: 70%;
		}

		.seq-model-mianxiang {
			height: 32%;
		}

		.seq .seq-model-1-1 {
			width: 80%;
			left: 10%;
			top: 320px;
		}
	}

	@media (min-width: 576px) and (max-width: 767px){
		#seq-main {
			height: 1050px;
		}

		#main_mianxiang_1_1 {
			height: 1050px;
		}

		.seq-model-mianxiang {
			height: 32%;
		}

		#logo-img {
			width: 45%;
		}

		.seq .seq-model-1-1 {
			width: 80%;
			left: 10%;
			top: 320px;
		}
	}

	@media (min-width: 768px) and (max-width: 991px){
		.seq-model-logo {
			width: 100%;
			right: 200px;
			height: 28%;
			top: 270px;
		}

		.seq .seq-model-1-1 {
			width: 50%;
			left: 45%;
			top: 320px;
		}
	}

	@media (min-width: 992px) and (max-width: 1199px){
		.seq-model-logo {
			width: 100%;
			right: 200px;
			height: 28%;
			top: 270px;
		}

		.seq .seq-model-1-1 {
			width: 40%;
			left: 45%;
			top: 320px;
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
			top: 270px;
		}

		.seq .seq-model-1-1 {
			width: 40%;
			left: 40%;
			top: 320px;
		}
	}
');

$this->registerJs('
	$(".view-img").click(function () {
		var data = $(this).data();

		$("#prompt-img").attr("src", data.img);
		$("#imageModal").modal("show");
	})

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
				<h5 class="m-0 text-center fsrepublic-text-white">PHYSIOGNOMY <br class="d-block d-md-none">COURSE</h5>
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
				<p class="m-0 text-center fsrepublic-text-white">Our Physiognomy course is available soon. Register now!</p>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0">
	<div id="seq-main" class="seq">
		<div class="seq-canvas">
			<div class="seq-absolute seq-background">
				<div id="main_mianxiang_1_1"></div>
				<div id="main_mianxiang_2_1"></div>
			</div>
			<div class="seq-absolute seq-model-mianxiang">
				<img src="../images/course/course-mianxiang/mianxiang.png" class="d-flex mx-auto h-100 w-auto">
			</div>
			<div class="seq-absolute seq-model-logo d-none d-md-block">
				<img src="../images/course/logo-course-en.png" class="d-flex mx-auto h-100 w-auto">
			</div>
			<div class="seq-absolute seq-model-1-1">
				<p class="text-center text-md-left fsrepublic-text-white">Fengshui Republic is the only ISO9001-certified Malaysian institute offering complete, comprehensive courses in Fengshui and Chinese Metaphysics. Acquiring knowledge in Chinese Metaphysics allows you to understand yourself and others, avoid being a victim of fraud, and learn extensive lessons with Fengshui Republic.</p>
				<div class="d-block d-md-none">
					<img id="logo-img" src="../images/course/logo-course-en.png" class="d-flex mx-auto">
				</div>
				<div id="mianxiang-btn" class="text-center">
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
				<p class="text-center">In Fengshui Republic’s course, you will acquire profound physiognomy knowledge via our easy-to-understand system. Coupled with practical Bazi reading examples, you will understand your fortune’s development and how to avoid negative outcomes.</p>
			</div>
		</div>
	</div>
</div>

<div id="faq" class="py-5">
	<div class="container py-5">
		<div class="row">
			<div class="col-10 mx-auto">
				<div class="row">
					<div class="col-12 col-md-4 offset-md-1">
						<img src="../images/course/course-mianxiang/face.png" class="img-fluid">
					</div>
					<div class="col-12 col-md-6 mt-4">
						<h5 class="fsrepublic-text-gold">Professional Physiognomy course - Understand the keys of your fortune through your face</h5>
						<p>Physiognomy is the knowledge of face-reading that allows us to read a person’s personality and thoughts through his or her facial features. Physiognomy is also a key for us to truly understand ourselves. It also allows us to tap into our potentials to achieve goals and wealth that we desire and uncover hidden secrets.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container pb-5">
		<div class="row">
			<div class="col-10 mx-auto">
				<div class="row">
					<div class="col-12 col-md-6">
						<div class="row">
							<div class="col-6 px-0">
								<img src="../images/course/course-mianxiang/photo/img-s-1.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/course-mianxiang/photo/img-l-1.jpg') ?>" style="cursor:pointer;">
							</div>
							<div class="col-6 px-0">
								<img src="../images/course/course-mianxiang/photo/img-s-2.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/course-mianxiang/photo/img-l-2.jpg') ?>" style="cursor:pointer;">
							</div>
							<div class="col-6 px-0">
								<img src="../images/course/course-mianxiang/photo/img-s-3.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/course-mianxiang/photo/img-l-3.jpg') ?>" style="cursor:pointer;">
							</div>
							<div class="col-6 px-0">
								<img src="../images/course/course-mianxiang/photo/img-s-4.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/course-mianxiang/photo/img-l-4.jpg') ?>" style="cursor:pointer;">
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6 px-0">
						<img src="../images/course/course-mianxiang/photo/img-s-5.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/course-mianxiang/photo/img-l-5.jpg') ?>" style="cursor:pointer;">
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
				<h5 class="text-center mb-3 mb-md-5 fsrepublic-text-gold">Physiognomy Course Q&A</h5>
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
										<li>Why learn Physiognomy from us?</li>
									</ol>
								</div>
								<div id="collapse01" class="collapse show" aria-labelledby="heading01" data-parent="#accordionFAQ">
									<div class="card-body">
										<ol class="pl-3 mb-0" style="list-style-type: none;">
											<li>Fengshui Republic is the only ISO9001-certified Malaysian Fengshui institute renowned for its systematic teaching.  We conduct lively teaching methods with numerous examples to ensure students master the course easily.</li>
										</ol>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading02" data-toggle="collapse" data-target="#collapse02" aria-expanded="true" aria-controls="collapse02">
									<ol class="pl-3 mb-0" start="2">
										<li>Who should learn Physiognomy?</li>
									</ol>
								</div>
								<div id="collapse02" class="collapse" aria-labelledby="heading02" data-parent="#accordionFAQ">
									<div class="card-body">
										<ol class="pl-3 mb-0" style="list-style-type: none;">
											<li>All of us interact with others, therefore our Physiognomy course is ideal for everyone. Physiognomy gives us the advantage of reading a person’s attitudes and inner-self without obtaining the birth year, month, date and hour. In short, Physiognomy greatly helps our everyday life.</li>
											<ul class="pl-3 mb-0" style="list-style-type:disc">
												<li>
													Hiring new employees? Physiognomy can help you read your candidates better.
												</li>
												<li>
													Who to delegate a special project to? Physiognomy will help you to choose the right person for the job.
												</li>
												<li>
													Making new friends? Physiognomy can help you choose the right friends and avoid enemies.
												</li>
											</ul>
										</ol>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading03" data-toggle="collapse" data-target="#collapse03" aria-expanded="true" aria-controls="collapse03">
									<ol class="pl-3 mb-0" start="3">
										<li>What are the benefits of learning Physiognomy?</li>
									</ol>
								</div>
								<div id="collapse03" class="collapse" aria-labelledby="heading03" data-parent="#accordionFAQ">
									<div class="card-body">
										<ul class="pl-3 mb-0" style="list-style-type:disc">
											<li>
												Understanding yourself and improving your fortune.
											</li>
											<li>
												Understanding others and avoiding pitfalls.
											</li>
											<li>
												Understanding your customers and adopting the right strategy and improve your business opportunities.
											</li>
											<li>
												Learn how to have unique conversational topics.
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading04" data-toggle="collapse" data-target="#collapse04" aria-expanded="true" aria-controls="collapse04">
									<ol class="pl-3 mb-0" start="4">
										<li>Can Physiognomy change our fortune?</li>
									</ol>
								</div>
								<div id="collapse04" class="collapse" aria-labelledby="heading04" data-parent="#accordionFAQ">
									<div class="card-body">
										<ol class="pl-3 mb-0" style="list-style-type: none;">
											<li>Certainly! There’s a Chinese saying which says that one’s mind will change one’s face. This means that our attitude will manifest on our face. Master Loh will provide practical knowledge on how to improve our face’s Qi to improve our fortune.</li>
										</ol>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading05" data-toggle="collapse" data-target="#collapse05" aria-expanded="true" aria-controls="collapse05">
									<ol class="pl-3 mb-0" start="5">
										<li>Is Physiognomy difficult?</li>
									</ol>
								</div>
								<div id="collapse05" class="collapse" aria-labelledby="heading05" data-parent="#accordionFAQ">
									<div class="card-body">
										<ol class="pl-3 mb-0" style="list-style-type: none;">
											<li>Physiognomy is the easiest of our courses. Master Loh will provide actual examples to make the learning process fun and easy. While it is possible to learn Physiognomy through books, having a teacher will help us to grasp the important points of Physiognomy. If you are still unable to master the course, a one-time-payment will allow you to attend the course again and again until you succeed.</li>
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
						<img src="../images/course/all-courses/course-en-5.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/fengshui') ?>" class="btn btn-primary mt-3 mb-5">know more</a>
					</div>
					<div class="col-12 col-sm-6 px-0 px-sm-3 mx-auto text-center">
						<img src="../images/course/all-courses/course-en-1.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/bazi') ?>" class="btn btn-primary mt-3 mb-5">know more</a>
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

<div class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="scheduleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Physiognomy Schedule <?= date('Y') ?></h5>
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


