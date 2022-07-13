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
				<h5 class="m-0 text-center fsrepublic-text-white">面相课程 <br class="d-block d-md-none">PHYSIOGNOMY COURSE</h5>
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
				<p class="m-0 text-center fsrepublic-text-white">全新的专业面相课程要正式开课了，有兴趣的朋友准备好了吗？</p>
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
				<img src="../images/course/logo-course-cn.png" class="d-flex mx-auto h-100 w-auto">
			</div>
			<div class="seq-absolute seq-model-1-1">
				<p class="text-center text-md-left fsrepublic-text-white">全马唯一一家荣获ISO9001国际认证的《龙岩风水》是一家教学系统完善的风水命理学院。传授正统的八字命理学问，绝不藏私！学习风水命理除了能够懂得运用这门博大精深的学问，也能助己助人及防止受骗，一举多得！</p>
				<div class="d-block d-md-none">
					<img id="logo-img" src="../images/course/logo-course-cn.png" class="d-flex mx-auto">
				</div>
				<div id="mianxiang-btn" class="text-center">
					<button type="button" class="btn btn-primary d-flex mx-auto ml-md-0" data-toggle="modal" data-target="#scheduleModal">课程时间表</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="bg-light">
	<div class="container py-5">
		<div class="row">
			<div class="col-10 col-md-8 mx-auto">
				<p class="text-center">将博大精深的学理用深入浅出的方法教学，配合实际例子解读面相真谛，了解自身运势起伏，学习如何趋吉避凶、一帆风顺！对我们的课程有兴趣但仍存有疑问？不必担心，我们综合了大家常遇到的问题，一一为大家解说。</p>
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
						<h5 class="fsrepublic-text-gold">专业面相课程 - “学习面相、修心改相！”</h5>
						<p>面相，即是由我们的五官所组成的相学，我们可以通过面相去解读一个人的性格与内心，所谓“知人知面更要知心”！了解面相就能够读懂他人的内心，提升用人的能力。此外，面相学也能让我们认识自己，发挥自己的潜能、提升业绩、创造财富，甚至看穿别人不知道的事！</p>
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
				<h5 class="text-center mb-3 mb-md-5 fsrepublic-text-gold">面相课程 Q&A</h5>
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
										<li>为什么要跟我们学面相？</li>
									</ol>
								</div>
								<div id="collapse01" class="collapse show" aria-labelledby="heading01" data-parent="#accordionFAQ">
									<div class="card-body">
										<ul class="pl-3 mb-0" style="list-style-type:disc">
											<li>全马唯一一家荣获ISO9001认证，是一家非常有系统教学的风水学院。</li>
											<li>拥有灵活的教学方式及大量实际的例子，简单易学。</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading02" data-toggle="collapse" data-target="#collapse02" aria-expanded="true" aria-controls="collapse02">
									<ol class="pl-3 mb-0" start="2">
										<li>谁适合学面相？</li>
									</ol>
								</div>
								<div id="collapse02" class="collapse" aria-labelledby="heading02" data-parent="#accordionFAQ">
									<div class="card-body">
										<ul class="pl-3 mb-0" style="list-style-type:disc">
											<li>
												所谓“知人知面便可知心”，想要辨别贵人、小人，让事业、感情及人际关系顺利的人，都适合学习面相。在外与他人接触时，我们或许不能马上拿到他人的八字，但我们能够立即透过面相去解读他人的性格及内心。当我们懂得人心时，办起事来便事半功倍。
											</li>
											<li>
												当我们聘请员工时，可透过面相挑选忠诚可靠的人。
											</li>
											<li>
												当我们委托他人时，可透过面相选择正直善良的人。
											</li>
											<li>
												当我们结交朋友时，可透过面相辨别是非善恶的人。
											</li>
											<li>
												当我们寻觅良缘时，可透过面相寻找托付终生的人。
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading03" data-toggle="collapse" data-target="#collapse03" aria-expanded="true" aria-controls="collapse03">
									<ol class="pl-3 mb-0" start="3">
										<li>学习面相有什么好处？</li>
									</ol>
								</div>
								<div id="collapse03" class="collapse" aria-labelledby="heading03" data-parent="#accordionFAQ">
									<div class="card-body">
										<ul class="pl-3 mb-0" style="list-style-type:disc">
											<li>
												了解自己，提升运势。
											</li>
											<li>
												了解他人，懂得避短扬长。
											</li>
											<li>
												了解顾客，用对的策略，来增加业绩。
											</li>
											<li>
												要成为焦点交流时，拥有独特的话题。
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading04" data-toggle="collapse" data-target="#collapse04" aria-expanded="true" aria-controls="collapse04">
									<ol class="pl-3 mb-0" start="4">
										<li>学习面相可以改运吗？</li>
									</ol>
								</div>
								<div id="collapse04" class="collapse" aria-labelledby="heading04" data-parent="#accordionFAQ">
									<div class="card-body">
										<ol class="pl-3 mb-0" style="list-style-type: none;">
											<li>当然可以，我们常说修面改心，修心改面。这句话的意思就是说当我们的心态一改变的时候，我们的面相也会跟着改变。在课堂中，罗师傅也将教大家如何修炼自己的气色，气色一好我们的运气也会跟着好。</li>
										</ol>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading05" data-toggle="collapse" data-target="#collapse05" aria-expanded="true" aria-controls="collapse05">
									<ol class="pl-3 mb-0" start="5">
										<li>学习面相会难吗？</li>
									</ol>
								</div>
								<div id="collapse05" class="collapse" aria-labelledby="heading05" data-parent="#accordionFAQ">
									<div class="card-body">
										<ol class="pl-3 mb-0" style="list-style-type: none;">
											<li>面相学比其它课程来得容易，因为在上课时，罗师傅都会提供大量的实际例子，是简单、轻松的学习方式。很多人也许会认为，那么我自己看书自学也可以学会呀，但是，如果没有老师现场带入，你是很难正确的抓住重点，是很难学得更仔细。万一你真的学不会，一次付费终生学习，就是让你学到会为止。</li>
										</ol>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<button type="button" class="btn btn-primary d-flex mx-auto mt-4" data-toggle="modal" data-target="#enquiryModal">了解更多</button>
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
						<img src="../images/course/all-courses/course-cn-5.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/fengshui') ?>" class="btn btn-primary mt-3 mb-5">了解更多</a>
					</div>
					<div class="col-12 col-sm-6 px-0 px-sm-3 mx-auto text-center">
						<img src="../images/course/all-courses/course-cn-1.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/bazi') ?>" class="btn btn-primary mt-3 mb-5">了解更多</a>
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
				<h5 class="modal-title">面相课程时间表 <?= date('Y') ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h5>吉隆坡</h5>
				<table class="table table-bordered table-sm text-center" style="background-color: #EFECE8;">
					<tbody>
						<?php foreach ($groups as $group): ?>
							<?php if ($group->location == 'KL'): ?>
								<?php $rep = 1; ?>
								<?php foreach ($schedules as $schedule): ?>
									<?php if ($schedule->name_en == $group->name_en && $schedule->location == 'KL'): ?>
										<tr>
											<?php if ($rep == 1): ?>
												<td rowspan="<?= $group->cnt ?>"><?= $group->name_cn ?></td>
												<td rowspan="<?= $group->cnt ?>"><?= $group->cnt ?> 天</td>
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
				<h5 class="mt-4">新山</h5>
				<table class="table table-bordered table-sm text-center" style="background-color: #EFECE8;">
					<tbody>
						<?php foreach ($groups as $group): ?>
							<?php if ($group->location == 'JB'): ?>
								<?php $rep = 1; ?>
								<?php foreach ($schedules as $schedule): ?>
									<?php if ($schedule->name_en == $group->name_en && $schedule->location == 'JB'): ?>
										<tr>
											<?php if ($rep == 1): ?>
												<td rowspan="<?= $group->cnt ?>"><?= $group->name_cn ?></td>
												<td rowspan="<?= $group->cnt ?>"><?= $group->cnt ?> 天</td>
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
				<h5 class="modal-title">課程咨詢</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= Url::to(['/enquiry']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Enquiry[service]" value="課程咨詢">
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
						<label for="enquiry_type" class="col-sm-4 col-form-label text-left text-sm-right">*课程种类</label>
						<div class="col-sm-8">
							<select id="enquiry_type" name="Enquiry[info][type]" class="form-control form-control-sm" required>
								<option value="">請選擇一項</option>
								<option value="Fengshui">风水</option>
								<option value="Bazi">八字</option>
								<option value="Qimen Dunjia">奇门遁甲</option>
								<option value="Yijing">易经</option>
								<option value="Yi Yan Duan">一眼断</option>
								<option value="Mian Xiang">面相</option>
								<option value="All">全部</option>
							</select>
							<div id="other-type-textarea"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_area" class="col-sm-4 col-form-label text-left text-sm-right">*地區</label>
						<div class="col-sm-8">
							<select id="enquiry_area" name="Enquiry[info][area]" class="form-control form-control-sm" required>
								<option value="">請選擇一項</option>
								<option value="Johor">柔佛</option>
								<option value="Selangor">雪蘭莪</option>
								<option value="Penang">檳城</option>
								<option value="Others">其他</option>
							</select>
							<div id="other-area-textarea"></div>
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


