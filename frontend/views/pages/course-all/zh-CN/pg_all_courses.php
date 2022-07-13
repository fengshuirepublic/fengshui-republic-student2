<?php

use yii\web\View;

$this->registerCssFile("@web/css/course/all-courses.css?2018-12-18-0000", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->title = Yii::t('app', 'ALL COURSES');

$this->registerCss('
');

$this->registerJs('
	$(".view-img").click(function () {
		var data = $(this).data();

		$("#prompt-img").attr("src", data.img);
		$("#imageModal").modal("show");
	})
', View::POS_END);

?>

<div id="bg-spark">
	<div class="container pb-0 pb-md-5">
		<div class="row">
			<div class="col-12 col-md-10 col-lg-9 mx-auto">
				<div id="bg-spark-s" class="row mb-sm-4 d-flex pb-5">
					<div class="col-12">
						<h5 class="text-center fsrepublic-text-white pt-5 pb-3 p-md-5">课程 COURSES</h5>
					</div>
					<div class="col-12 col-md-5 col-lg-4">
						<img class="d-block d-md-none img-fluid w-70 mx-auto" src="../images/course/logo-course-cn.png" alt="Fengshui Republic">
						<img class="d-none d-md-block d-lg-none img-fluid w-70 ml-auto" src="../images/course/logo-course-cn.png" alt="Fengshui Republic">
						<img class="d-none d-lg-block img-fluid mx-auto" src="../images/course/logo-course-cn.png" alt="Fengshui Republic">
					</div>
					<div class="col-12 col-md-7 col-lg-8 align-self-center">
						<p class="text-center text-md-left fsrepublic-text-white">我们也是全马唯一一家荣获ISO9001认证，全马唯一一家精通与传授理气、形峦所有学派的风水学院。完善的教学能够让普罗大众对这门博大精深的学问有更深入的了解，让你一眼定吉凶，既能助己助人也能够防止受骗，一举多得！</p>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-sm-6 px-0 px-sm-4 mb-sm-4">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/fengshui') ?>">
							<h5 class="m-0 pt-3 pb-1 text-center fsrepublic-text-white course-title fsrepublic-gradient-brown py-1">风水课程<br><small>FENGSHUI COURSE</small></h5>
							<img class="img-fluid w-100" src="../images/course/course-fengshui.jpg" alt="Fengshui Republic">
						</a>
					</div>
					<div class="col-12 col-sm-6 px-0 px-sm-4 mb-sm-4">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/bazi') ?>">
							<h5 class="m-0 pt-3 pb-1 text-center fsrepublic-text-white course-title fsrepublic-gradient-brown py-1">八字课程<br><small>BAZI COURSE</small></h5>
							<img class="img-fluid w-100" src="../images/course/course-bazi.jpg" alt="Fengshui Republic">
						</a>
					</div>
					<div class="col-12 col-sm-6 px-0 px-sm-4 mb-sm-4">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/qimen') ?>">
							<h5 class="m-0 pt-3 pb-1 text-center fsrepublic-text-white course-title fsrepublic-gradient-brown py-1">奇门课程<br><small>QIMEN DUNJIA COURSE</small></h5>
							<img class="img-fluid w-100" src="../images/course/course-qimen.jpg" alt="Fengshui Republic">
						</a>
					</div>
					<div class="col-12 col-sm-6 px-0 px-sm-4 mb-sm-4">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/yijing') ?>">
							<h5 class="m-0 pt-3 pb-1 text-center fsrepublic-text-white course-title fsrepublic-gradient-brown py-1">易经课程<br><small>YIJING COURSE</small></h5>
							<img class="img-fluid w-100" src="../images/course/course-yijing.jpg" alt="Fengshui Republic">
						</a>
					</div>
					<div class="col-12 col-sm-6 px-0 px-sm-4 mb-sm-4">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/yiyanduan') ?>">
							<h5 class="m-0 pt-3 pb-1 text-center fsrepublic-text-white course-title fsrepublic-gradient-brown py-1">一眼断课程<br><small>YI YAN DUAN COURSE</small></h5>
							<img class="img-fluid w-100" src="../images/course/course-yiyanduan.jpg" alt="Fengshui Republic">
						</a>
					</div>
					<div class="col-12 col-sm-6 px-0 px-sm-4 mb-sm-4">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/mianxiang') ?>">
							<h5 class="m-0 pt-3 pb-1 text-center fsrepublic-text-white course-title fsrepublic-gradient-brown py-1">面相课程<br><small>PHYSIOGNOMY COURSE</small></h5>
							<img class="img-fluid w-100" src="../images/course/course-mianxiang.jpg" alt="Fengshui Republic">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container py-5">
	<div class="row">
		<div class="col-10 mx-auto">
			<div class="row">
				<div class="col-12 col-md-6">
					<div class="row">
						<div class="col-12 px-0">
							<img src="../images/course/photo/img-s-1.jpg?20181230" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/photo/img-l-1.jpg') ?>" style="cursor:pointer;">
						</div>
						<div class="col-6 px-0">
							<img src="../images/course/photo/img-s-2.jpg?20181230" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/photo/img-l-2.jpg') ?>" style="cursor:pointer;">
						</div>
						<div class="col-6 px-0">
							<div class="row">
								<div class="col-12">
									<img src="../images/course/photo/img-s-3.jpg?20181230" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/photo/img-l-3.jpg') ?>" style="cursor:pointer;">
								</div>
								<div class="col-12">
									<img src="../images/course/photo/img-s-4.jpg?20181230" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/photo/img-l-4.jpg') ?>" style="cursor:pointer;">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6">
					<div class="row">
						<div class="col-6 px-0">
							<img src="../images/course/photo/img-s-5.jpg?20181230" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/photo/img-l-5.jpg') ?>" style="cursor:pointer;">
						</div>
						<div class="col-6 px-0">
							<img src="../images/course/photo/img-s-6.jpg?20181230" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/photo/img-l-6.jpg') ?>" style="cursor:pointer;">
						</div>
						<div class="col-6 px-0">
							<img src="../images/course/photo/img-s-7.jpg?20181230" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/photo/img-l-7.jpg') ?>" style="cursor:pointer;">
						</div>
						<div class="col-6 px-0">
							<img src="../images/course/photo/img-s-8.jpg?20181230" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/photo/img-l-8.jpg') ?>" style="cursor:pointer;">
						</div>
						<div class="col-12 px-0">
							<img src="../images/course/photo/img-s-9.jpg?20181230" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/course/photo/img-l-9.jpg') ?>" style="cursor:pointer;">
						</div>
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


