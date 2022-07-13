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

	.bg-light-brown {
		background: rgba(122,97,66,0.83);
	}

	.shadow-box {
		-moz-box-shadow: inset 0 -10px 10px -10px #000000;
		-webkit-box-shadow: inset 0 -10px 10px -10px #000000;
		box-shadow: inset 0 -30px 30px -30px #CCC;
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
				<h5 class="m-0 text-center fsrepublic-text-white">奇门课程 <br class="d-block d-md-none">QIMEN DUNJIA COURSE</h5>
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
				<p class="m-0 text-center fsrepublic-text-white">全新的奇门遁甲课程要正式开课了，有兴趣的朋友准备好了吗?</p>
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
				<img src="../images/course/logo-course-cn.png" class="d-flex mx-auto h-100 w-auto">
			</div>
			<div class="seq-absolute seq-model-1-1">
				<p class="text-center text-md-left fsrepublic-text-white">全马唯一一家荣获ISO9001国际认证的《龙岩风水》是一家教学系统完善的风水命理学院。传授正统的八字命理学问，绝不藏私！学习风水命理除了能够懂得运用这门博大精深的学问，也能助己助人及防止受骗，一举多得！</p>
				<div class="d-block d-md-none">
					<img id="logo-img" src="../images/course/logo-course-cn.png" class="d-flex mx-auto">
				</div>
				<div id="qimen-btn" class="text-center">
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
				<p class="text-center">将古代军师所运用的玄妙兵法以深入浅出的方法教学，龙岩风水不惜耗费巨资研发专业软件，目的就在于让学生更容易上手，将古代军师所运用的“必胜之术”掌握在手中，而这一套系统唯独龙岩风水才有！对我们的课程有兴趣但仍存有疑问？不必担心，我们综合了大家常遇到的问题与内心挣扎，一一为大家解说清楚。</p>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0 d-block d-md-none">
	<img src="../images/course/course-qimen/zhuge_liang_1.jpg" class="img-fluid w-100">
</div>

<div class="bg-light-brown">
	<div class="container py-5">
		<div class="row">
			<div class="col-10 col-md-5 mx-auto d-none d-md-block">
				<img src="../images/course/course-qimen/zhuge_liang_1.jpg" class="img-fluid d-flex mx-auto">
			</div>
			<div class="col-10 col-md-7 mx-auto">
				<img src="../images/course/course-qimen/story.png" class="img-fluid d-flex mx-auto">
				<p class="mt-3">“赤壁之战”是中国战争史上最经典的战争之一，以八万蜀吴联军打败号称八十万的魏军，取得以少胜多的光辉战绩。根据记载：诸葛亮是利用“奇门遁甲”之术，借来东风，再火烧连营的方法，一举把曹操八十万大军打得落花流水，灰飞烟灭。</p>
			</div>
		</div>
	</div>
</div>

<div class="shadow-box">
	<div class="container py-5 d-block d-md-none">
		<div class="row">
			<div class="col-12">
				<img src="../images/course/course-qimen/zhuge_liang_3.png" class="img-fluid w-100 px-3 pb-4">
			</div>
		</div>
		<div class="row">
			<div class="col-10 mx-auto">
				<h4 class="fsrepublic-text-gold"><b>奇门命局</b></h4>
				<ul class="pl-3 mb-0" style="list-style-type:disc">
					<li>
						找出自己的能量
					</li>
					<li>
						找出事件的因果与潜在问题
					</li>
					<li>
						找出自己有利的方向
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-10 mx-auto">
				<h4 class="fsrepublic-text-gold mt-5"><b>奇门预测</b></h4>
				<ul class="pl-3 mb-0" style="list-style-type:disc">
					<li>
						如何预测事情的成败
					</li>
					<li>
						如何找出应对策略
					</li>
					<li>
						如何避开凶险迈向成功
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-10 mx-auto">
				<h4 class="fsrepublic-text-gold mt-5"><b>奇门战略</b></h4>
				<ul class="pl-3 mb-0" style="list-style-type:disc">
					<li>
						如何在商业上布局
					</li>
					<li>
						如何排兵布阵，抢占先机
					</li>
					<li>
						如何择日，提高成功概率
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-10 mx-auto">
				<h4 class="fsrepublic-text-gold mt-5"><b>奇门风水</b></h4>
				<ul class="pl-3 mb-0" style="list-style-type:disc">
					<li>
						如何找出最旺的能量场
					</li>
					<li>
						如何找出强能量空间，占尽地利优势
					</li>
					<li>
						如何找出预知家宅格局
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="shadow-box">
	<div class="container py-5 d-none d-md-block">
		<div class="row pt-5 pb-3">
			<div class="col-4 text-md-right">
				<div class="row">
					<div class="col-12">
						<h4 class="fsrepublic-text-gold"><b>奇门命局</b></h4>
						<p>&#8226 找出自己的能量</p>
						<p>&#8226 找出事件的因果与潜在问题</p>
						<p>&#8226 找出自己有利的方向</p>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<h4 class="fsrepublic-text-gold mt-5"><b>奇门战略</b></h4>
						<p>&#8226 如何在商业上布局</p>
						<p>&#8226 如何排兵布阵，抢占先机</p>
						<p>&#8226 如何择日，提高成功概率</p>
					</div>
				</div>
			</div>
			<div class="col-4">
				<img src="../images/course/course-qimen/zhuge_liang_2.png" class="img-fluid d-flex mx-auto">
				<p class="text-center mb-0 mt-5">奇门遁甲入门班 &#183 将引导你发掘潜能</p>
				<p class="text-center">达到目的 &#183 创造未来!</p>
			</div>
			<div class="col-4">
				<div class="row">
					<div class="col-12">
						<h4 class="fsrepublic-text-gold"><b>奇门预测</b></h4>
						<p>&#8226 如何预测事情的成败</p>
						<p>&#8226 如何找出应对策略</p>
						<p>&#8226 如何避开凶险迈向成功</p>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<h4 class="fsrepublic-text-gold mt-5"><b>奇门风水</b></h4>
						<p>&#8226 如何找出最旺的能量场</p>
						<p>&#8226 如何找出强能量空间，占尽地利优势</p>
						<p>&#8226 如何找出预知家宅格局</p>
					</div>
				</div>
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
						<h5 class="fsrepublic-text-gold">专业奇门遁甲课程 - “立于不败、突围而出！”</h5>
						<p>奇门遁甲是一门古代的兵法，所谓“商场如战场”，因此特别推荐给做生意或想创业的朋友。若能将古人的智慧运用在现代商业社会，除了可让你处在不败之地，更能控制结果、提升业绩！我们也能透过属于自己的奇门宇宙能量，找出自己的定位、发掘潜能、创造未来！</p>
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
				<h5 class="text-center mb-3 mb-md-5 fsrepublic-text-gold">奇门遁甲课程 Q&A</h5>
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
										<li>为什么要跟我们学奇门遁甲？</li>
									</ol>
								</div>
								<div id="collapse01" class="collapse show" aria-labelledby="heading01" data-parent="#accordionFAQ">
									<div class="card-body">
										<ul class="pl-3 mb-0">
											<li>全马唯一一家荣获ISO9001国际认证的风水命理公司，拥有非常有系统的教学方程式。我们不仅教奇门遁甲课程，也会训练大家运用战略家眼光来思考全局，再运用成功人士的思维来做判断。</li>
											<li>无论学习哪一门学问，我们都应该向成功者学习。</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading02" data-toggle="collapse" data-target="#collapse02" aria-expanded="true" aria-controls="collapse02">
									<ol class="pl-3 mb-0" start="2">
										<li>谁应该学奇门遁甲？</li>
									</ol>
								</div>
								<div id="collapse02" class="collapse" aria-labelledby="heading02" data-parent="#accordionFAQ">
									<div class="card-body">
										<ul class="pl-3 mb-0">
											<li>奇门遁甲特别推荐给做生意的朋友，因为商场如战场，奇门遁甲无时无刻让我们利于不败之地，征服每一个客户，把业绩做好，把自己的事业推向另一个高峰。</li>
											<li>在处理公司业务及员工问题时，奇门遁甲都能助我们一臂之力；而要创业或打工的朋友，想要步步高升，奇门遁甲都能给你一个策略，更重要的事，我们能够运用大自然的力量改变人生。</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading03" data-toggle="collapse" data-target="#collapse03" aria-expanded="true" aria-controls="collapse03">
									<ol class="pl-3 mb-0" start="3">
										<li>奇门遁甲会难学吗？</li>
									</ol>
								</div>
								<div id="collapse03" class="collapse" aria-labelledby="heading03" data-parent="#accordionFAQ">
									<div class="card-body">
										<ul class="pl-3 mb-0">
											<li>外面所有的奇门遁甲课程都需要花费大量的时间才能略懂一二，而我们耗费巨资所研发的专业软件，目的在于让学生更容易上手，将古代军师所运用的一套系统瞬间掌握于手中。</li>
											<li>所有的学生都能学会，不用耗费时间排盘，随时随地用得上，然而这一套系统唯独我们才拥有。</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="card mb-2">
								<div class="card-header collapsed" id="heading04" data-toggle="collapse" data-target="#collapse04" aria-expanded="true" aria-controls="collapse04">
									<ol class="pl-3 mb-0" start="4">
										<li>学奇门遁甲有什么好处？</li>
									</ol>
								</div>
								<div id="collapse04" class="collapse" aria-labelledby="heading04" data-parent="#accordionFAQ">
									<div class="card-body">
										<ol class="pl-3 mb-0" style="list-style-type: none;">
											<li>所谓：“学会奇门遁，来人不用问”，所以学会奇门遁甲后，等于有一位隐形的随身军师跟在身边，无时无刻的为你出谋献策，让你趋吉避凶。</li>
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
						<img src="../images/course/all-courses/course-cn-1.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/bazi') ?>" class="btn btn-primary mt-3 mb-5">了解更多</a>
					</div>
					<div class="col-12 col-sm-6 px-0 px-sm-3 mx-auto text-center">
						<img src="../images/course/all-courses/course-cn-5.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/fengshui') ?>" class="btn btn-primary mt-3 mb-5">了解更多</a>
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
				<h5 class="modal-title">奇门课程时间表 <?= date('Y') ?></h5>
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


