<?php

use yii\web\View;

$this->registerCssFile("@web/css/service/property-development.css?2018-12-18-0000", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->title = Yii::t('app', 'PROPERTY DEVELOPMENT');

$this->registerCss('
');

$this->registerJs('
	$(".view-img").click(function () {
		var data = $(this).data();

		$("#prompt-img").attr("src", data.img);
		$("#imageModal").modal("show");
	})
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
							<source src="../images/service/property-development/property-development-s.mov">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/property-development/property-development-lg.mov">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php elseif ($android): ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/property-development/property-development-s.webm" type="video/webm">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/property-development/property-development-lg.webm" type="video/webm">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php else: ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/property-development/property-development-s.mp4" type="video/mp4">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/property-development/property-development-lg.mp4" type="video/mp4">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php endif; ?>

				<div class="section_overlay"></div>
			</div>
			<div class="seq-absolute seq-model-1-1">
				<img src="../images/service/property-development/title-en.png" class="d-flex mx-auto h-100 w-auto" alt="Fengshui Republic" />
			</div>
		</div>
	</div>
</div>

<div class="fsrepublic-gradient-brown">
	<div class="container py-4">
		<div class="row">
			<div class="col-10 mx-auto">
				<p class="m-0 text-center fsrepublic-text-white">Prosperous development through perfect Fengshui planning.</p>
			</div>
		</div>
	</div>
</div>

<div id="bg-1">
	<div class="container py-5">
		<div class="row">
			<div class="col-10 mx-auto">
				<p class="text-left text-md-center">Master Loh has been collaborating with numerous housing developers and provides services that include Fengshui planning and talks, instilling authentic Fengshui in the development plans. Regardless of closed door talks or lectures open for the public, Master Loh links the developers and the clients closer together through Fengshui and Chinese metaphysics, bringing positive effects to the developers.</p>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0">
	<div class="seq">
		<div class="seq-canvas">
			<div class="seq-absolute seq-background">
				<div id="main_image_1_1" class="d-block d-lg-none"></div>
				<div id="main_image_1_2" class="d-none d-lg-block"></div>
			</div>
		</div>
	</div>
</div>

<div class="container py-5">
	<div class="row">
		<div class="col-10 mx-auto mb-5">
			<p class="text-center">Our collaboration with developers includes:</p>
			<img class="img-fluid d-block d-md-none" src="../images/service/property-development/developer-s.png" alt="Fengshui Republic">
			<img class="img-fluid d-none d-md-block" src="../images/service/property-development/developer-lg.png" alt="Fengshui Republic">
		</div>
	</div>
	<div class="row">
		<div class="col-10 mx-auto">
			<div class="row">
				<div class="col-6 col-md-3 p-1">
					<img src="../images/service/property-development/thumbnail-img-1.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/service/property-development/event-img-1.jpg') ?>" style="cursor:pointer;">
				</div>
				<div class="col-6 col-md-3 p-1">
					<img src="../images/service/property-development/thumbnail-img-2.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/service/property-development/event-img-2.jpg') ?>" style="cursor:pointer;">
				</div>
				<div class="col-6 col-md-3 p-1">
					<img src="../images/service/property-development/thumbnail-img-3.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/service/property-development/event-img-3.jpg') ?>" style="cursor:pointer;">
				</div>
				<div class="col-6 col-md-3 p-1">
					<img src="../images/service/property-development/thumbnail-img-4.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/service/property-development/event-img-4.jpg') ?>" style="cursor:pointer;">
				</div>
			</div>
		</div>
		<div class="col-10 mx-auto">
			<div class="row">
				<div class="col-6 col-md-3 p-1">
					<img src="../images/service/property-development/thumbnail-img-5.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/service/property-development/event-img-5.jpg') ?>" style="cursor:pointer;">
				</div>
				<div class="col-6 col-md-3 p-1">
					<img src="../images/service/property-development/thumbnail-img-6.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/service/property-development/event-img-6.jpg') ?>" style="cursor:pointer;">
				</div>
				<div class="col-12 col-md-6 p-1">
					<img src="../images/service/property-development/thumbnail-img-7.jpg" class="view-img img-fluid w-100" data-toggle="modal" data-target="#imageModal" data-img="<?= Yii::$app->urlManager->createUrl('/images/service/property-development/event-img-7.jpg') ?>" style="cursor:pointer;">
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
						<img src="../images/service/all-services/service-en-11.jpg" class="img-fluid w-100">
						<a href="javescript:void(0)" class="btn btn-primary mt-3 mb-5">know more</a>
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


