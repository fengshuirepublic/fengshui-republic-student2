<?php

use yii\web\View;
use yii\helpers\Url;

$this->registerCssFile("@web/css/course/bazi.css?2019-06-02-0000", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->title = Yii::t('app', 'BAZI');

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

		.seq .seq-model-2-1 {
			width: 80%;
			left: 10%;
			margin-top: 20%;
		}
	}

	@media (min-width: 576px) and (max-width: 767px){
		#seq-main {
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

		.seq .seq-model-2-1 {
			width: 70%;
			left: 15%;
			margin-top: 15%;
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

		.seq .seq-model-2-1 {
			margin-top: 100px;
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

		.seq .seq-model-2-1 {
			margin-top: 110px;
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

		.seq .seq-model-2-1 {
			margin-top: 110px;
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

<div class="fsrepublic-gradient-brown">
	<div class="container py-3">
		<div class="row">
			<div class="col-10 mx-auto">
				<h5 class="m-0 text-center fsrepublic-text-white">八字课程<br>BAZI COURSE</h5>
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
				<p class="m-0 text-center fsrepublic-text-white">全新的专业八字课程要正式开课了，有兴趣的朋友准备好了吗？</p>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0">
	<div id="seq-main" class="seq">
		<div class="seq-canvas">
			<div class="seq-absolute seq-background">
				<div id="main_bazi_1_1"></div>
				<div id="main_bazi_2_1"></div>
			</div>
			<div class="seq-absolute seq-model-bazi">
				<img src="../images/course/course-bazi/bazi.png" class="d-flex mx-auto h-100 w-auto">
			</div>
			<div class="seq-absolute seq-model-video">
				<img src="../images/course/course-bazi/video.jpg" class="d-flex mx-auto h-100 w-auto" data-toggle="modal" data-target="#videoModal" style="cursor: pointer">
			</div>
			<div class="seq-absolute seq-model-logo d-none d-md-block">
				<img src="../images/course/logo-course-cn.png" class="d-flex mx-auto h-100 w-auto">
			</div>
			<div class="seq-absolute seq-model-1-1">
				<p class="text-center text-md-left fsrepublic-text-white">全马唯一一家荣获ISO9001国际认证的《龙岩风水》是一家教学系统完善的风水命理学院。传授正统的八字命理学问，绝不藏私！学习风水命理除了能够懂得运用这门博大精深的学问，也能助己助人及防止受骗，一举多得！</p>
				<div class="d-block d-md-none">
					<img id="logo-img" src="../images/course/logo-course-cn.png" class="d-flex mx-auto">
				</div>
				<div id="bazi-btn" class="text-center">
					<button type="button" class="btn btn-primary d-flex mx-auto ml-md-0" data-toggle="modal" data-target="#scheduleModal">课程时间表</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0">
	<div class="seq" style="height: 400px;">
		<div class="seq-canvas">
			<div class="seq-absolute seq-background">
				<?php if ($iPod || $iPhone || $iPad): ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/course/course-bazi/bazi-analysis-s.mov">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/course/course-bazi/bazi-analysis-lg.mov">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php elseif ($android): ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/course/course-bazi/bazi-analysis-s.webm" type="video/webm">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/course/course-bazi/bazi-analysis-lg.webm" type="video/webm">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php else: ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/course/course-bazi/bazi-analysis-s.mp4" type="video/mp4">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/course/course-bazi/bazi-analysis-lg.mp4" type="video/mp4">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php endif; ?>

				<div class="section_overlay"></div>
			</div>
			<div class="seq-absolute seq-model-2-1">
				<p class="text-center fsrepublic-text-gold">将博大精深的学理用深入浅出的方法教学，配合实际例子解读八字真谛，了解自身运势起伏，学习如何趋吉避凶、一帆风顺！</p>
				<p class="text-center fsrepublic-text-gold">对我们的课程有兴趣但仍存有疑问？不必担心，我们综合了大家常遇到的问题，一一为大家解说。</p>
				<div class="text-center">
					<button type="button" class="btn btn-primary d-flex mx-auto" data-toggle="modal" data-target="#enquiryModal">了解更多</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="faq" class="py-5">
	<div class="container py-5">
		<div class="row">
			<div class="col-11 col-md-10 mx-auto">
				<div class="row">
					<div class="col-6 col-md-4 px-0">
						<img src="../images/course/course-bazi/photo/img-s-1.jpg" class="view-img img-fluid w-100 d-none d-md-block" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/course-bazi/photo/img-l-1.jpg') ?>" style="cursor:pointer;">
						<img src="../images/course/course-bazi/photo/img-ss-1.jpg" class="view-img img-fluid w-100 d-block d-md-none" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/course-bazi/photo/img-l-1.jpg') ?>" style="cursor:pointer;">
					</div>
					<div class="col-6 col-md-8">
						<div class="row">
							<div class="col-12 col-md-6 px-0">
								<img src="../images/course/course-bazi/photo/img-s-2.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/course-bazi/photo/img-l-2.jpg') ?>" style="cursor:pointer;">
							</div>
							<div class="col-12 col-md-6 px-0">
								<img src="../images/course/course-bazi/photo/img-s-3.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/course-bazi/photo/img-l-3.jpg') ?>" style="cursor:pointer;">
							</div>
							<div class="col-12 px-0 d-none d-md-block">
								<img src="../images/course/course-bazi/photo/img-s-4.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/course-bazi/photo/img-l-4.jpg') ?>" style="cursor:pointer;">
							</div>
						</div>
					</div>
					<div class="col-12 px-0 d-block d-md-none">
						<img src="../images/course/course-bazi/photo/img-s-4.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/course-bazi/photo/img-l-4.jpg') ?>" style="cursor:pointer;">
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
				<h5 class="text-md-center mb-3 mb-md-5 fsrepublic-text-gold">专业八字课程 - “学习八字、改运修心！”</h5>
				<p>八字，即是我们出生的年、月、日和时所组成的八个字，可以看出我们的性格，了解自己与家人、夫妻和孩子的关系，更可以知道自己的运势如何、该往哪个方向发展才比较顺遂。学习八字，能够更了解自己，好好发挥自己的长处。然而，是什么原因让你迟迟不敢踏出改善人生的一步，让我们来看看常见的疑问：</p>
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
										<li>学八字有什么用处？</li>
									</ol>
								</div>
								<div id="collapse01" class="collapse show" aria-labelledby="heading01" data-parent="#accordionFAQ">
									<div class="card-body">
										<ol class="pl-3 mb-0" style="list-style-type: none;">
											<li>学习八字的好处在于可让我们更了解及认识自己，除了兴趣以外，学八字可在人生的道路上有莫大的帮助。如：身为受薪一族，学习八字后可以洞悉自己的整体命运、避短扬长，在走运的年份里能全力去实行想要做的事；反之，当遇到运势不稳定的年份时则要按兵不动，等待时机。而做生意的你，可从八字掌握伙伴、员工的性格与想法，若能预先了解他们的为人处事，发挥其所长，那就不怕所托非人。</li>
										</ol>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading02" data-toggle="collapse" data-target="#collapse02" aria-expanded="true" aria-controls="collapse02">
									<ol class="pl-3 mb-0" start="2">
										<li>学了八字可以改运吗？</li>
									</ol>
								</div>
								<div id="collapse02" class="collapse" aria-labelledby="heading02" data-parent="#accordionFAQ">
									<div class="card-body">
										<ol class="pl-3 mb-0" style="list-style-type: none;">
											<li>八字可以帮助我们了解命运，从而做出改善。所谓：“三分天注定，七分靠打拼”，从八字中我们可以找出自我的五行、大运及真实性格等，若能越早知道什么才是最适合自己、在什么行业才能发挥所长，那就可越早达到成功。</li>
										</ol>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading03" data-toggle="collapse" data-target="#collapse03" aria-expanded="true" aria-controls="collapse03">
									<ol class="pl-3 mb-0" start="3">
										<li>八字班会难吗？</li>
									</ol>
								</div>
								<div id="collapse03" class="collapse" aria-labelledby="heading03" data-parent="#accordionFAQ">
									<div class="card-body">
										<ol class="pl-3 mb-0" style="list-style-type: none;">
											<li>在古代，八字是门非常深奥的学问，或许需要耗费十余年来学习八字；但现代则不一样，本院提供简单易懂的教学讲义，导师也会运用实际的例子教学，让同学更容易印证八字的真实不虚。加上本院的承诺是：“一次付费，终身学习”，尽管第一次不能完全理解，下一次的课程也能继续来上复习课，不会学到会。</li>
										</ol>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading04" data-toggle="collapse" data-target="#collapse04" aria-expanded="true" aria-controls="collapse04">
									<ol class="pl-3 mb-0" start="4">
										<li>只是为兴趣而学，可以吗？要怎么才能拥有正式资格帮别人批八字？</li>
									</ol>
								</div>
								<div id="collapse04" class="collapse" aria-labelledby="heading04" data-parent="#accordionFAQ">
									<div class="card-body">
										<ol class="pl-3 mb-0" style="list-style-type: none;">
											<li>学习八字可以让我们更清楚自己适合什么、需要什么，更可以在短时间内了解一个人。而想要成为专业的八字师傅，更是一定要参与本院的八字课程，绝对可以增加你对八字知识的广度与深度，即可更加全面、更准确地分析对方的八字，让人觉得你是非一般的大师。</li>
										</ol>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading05" data-toggle="collapse" data-target="#collapse05" aria-expanded="true" aria-controls="collapse05">
									<ol class="pl-3 mb-0" start="5">
										<li>为什么要跟我们学八字？</li>
									</ol>
								</div>
								<div id="collapse05" class="collapse" aria-labelledby="heading05" data-parent="#accordionFAQ">
									<div class="card-body">
										<ol class="pl-3 mb-0" style="list-style-type: none;">
											<li>
												<ul class="pl-3 mb-0" style="list-style-type:disc">
													<li>
														全马唯一一家荣获ISO9001认证，是一家非常有系统教学的风水公司。
													</li>
													<li>
														龙岩风水开发了一套完整的八字软件系统，学习起来更容易上手。
													</li>
													<li>
														八字是一门博大精深的学问，如果跟着一般的教学方式，运用人工排盘，更需要花上多年的时间。
													</li>
													<li>
														龙岩风水拥有十年的教学经验及一整套完整的八字课程，让大家学习起来更加的方便。
													</li>
												</ul>
											</li>
										</ol>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading06" data-toggle="collapse" data-target="#collapse06" aria-expanded="true" aria-controls="collapse06">
									<ol class="pl-3 mb-0" start="6">
										<li>谁应该学八字？</li>
									</ol>
								</div>
								<div id="collapse06" class="collapse" aria-labelledby="heading06" data-parent="#accordionFAQ">
									<div class="card-body">
										<ol class="pl-3 mb-0" style="list-style-type: none;">
											<li>
												<ul class="pl-3 mb-0" style="list-style-type:disc">
													<li>
														想了解自己的潜能、想了解自己的运势、想了解自己在什么时候能踏出哪一步，想了解自己什么时候能创业或守业、要何时冲何时守的人都可以来上八字课。
													</li>
													<li>
														当我们了解了八字，就能够改变自己的人生
													</li>
												</ul>
											</li>
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
						<img src="../images/course/all-courses/course-cn-2.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/qimen') ?>" class="btn btn-primary mt-3 mb-5">了解更多</a>
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
					<iframe class="embed-responsive embed-responsive-1by1" width="560" height="315" src="https://www.youtube.com/embed/c7OMDkzBiNA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="scheduleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">八字课程时间表 <?= date('Y') ?></h5>
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


