<?php

use frontend\assets\AppAsset;
use yii\web\View;
use yii\helpers\Url;

// $this->registerCssFile("@web/css/2019/video.css?2019-01-01-0000", [
// 	'depends' => [\yii\web\YiiAsset::className()],
// ]);

$this->title = Yii::t('app', 'Online Video Course');

$this->registerCss('
	.modal-backdrop.show {
		opacity: .9;
	}

	.ytModal .modal-content {
		background: none;
		border: 0;
		-moz-border-radius: 0; -webkit-border-radius: 0; border-radius: 0;
		-moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none;
	}

	.ytModal .modal-header {
		padding: 0;
	}

	.ytModal .modal-header, .modal-footer {
		border: 0;
	}

	.ytModal .modal-header .close {
		float: none;
		margin: 0;
		font-size: 36px;
		color: #fff;
		font-weight: 300;
		text-shadow: none;
		opacity: 1;
		padding: 0;
	}

	.ytModal .modal-body {
		padding: 0;
	}

	.h2-vw {
		font-size: 7vw; /* vw = viewport width, vh = viewport height */
		font-weight: 900;
	}

	.h4-vw {
		font-size: 6vw;
	}

	.h5-vw, .li-vw {
		font-size: 5vw;
	}

	.h6-vw {
		font-size: 4vw;
	}

	#bg-black {
		background-color: #000;
	}

	#bg-brown {
		background-color: #796042;
	}

	.step {
		color:#CDB24B;
	}
');

$this->registerJs('
	$("#video1Modal").on("hidden.bs.modal", function () {
		$("#video1-video").attr("src", $("#video1-video").attr("src"));
	});

	$("#video2Modal").on("hidden.bs.modal", function () {
		$("#video2-video").attr("src", $("#video2-video").attr("src"));
	});

	$("#video3Modal").on("hidden.bs.modal", function () {
		$("#video3-video").attr("src", $("#video3-video").attr("src"));
	});

	$("#video4Modal").on("hidden.bs.modal", function () {
		$("#video4-video").attr("src", $("#video4-video").attr("src"));
	});
', View::POS_END);

?>

<div id="bg-black">
	<div class="container-fluid">
		<div class="row py-3 py-md-5">
			<div class="col-auto d-block mx-auto">
				<a href="<?= Yii::$app->urlManager->createUrl('/') ?>">
					<img id="brand-logo" src="<?= Yii::$app->urlManager->createUrl('/images/fr/logo-white.png') ?>" alt="Fengshui Republic">
				</a>
			</div>
		</div>
	</div>
</div>

<div id="bg-black">
	<div class="container-fluid py-4 py-md-5">
		<div class="row">
			<div class="col-10 col-md-9 mx-auto">
				<h5 class="text-center h5-vw" style="color: #ff0000;">??????</h5>
				<h6 class="fsrepublic-text-white h6-vw">??????????????????????????????????????????????????????????????????</h6>
				<h6 class="fsrepublic-text-white h6-vw">???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</h6>
			</div>
		</div>
		<?php if (!$access): ?>
			<div class="row">
				<div class="col-10 col-md-4 mx-auto mt-5">
					<form id="video-order-form" action="<?= Url::to(['/2019fengshui-video']) ?>" method="post" role="form">
						<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
						<div class="form-group fsrepublic-text-white text-center">
							<label for="access_code"><span class="h6-vw">*??????????????????</span></label>
							<input id="access_code" class="form-control h6-vw" type="text" name="Code" required />
							<div class="text-center">
								<button class="btn btn-primary btn-lg mt-3">
									<h5 class="m-0 h6-vw"><b>??????</b></h5>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>

<?php if ($access): ?>
	<div id="bg-brown">
		<div class="container-fluid py-4 py-md-5">
			<div class="row">
				<div class="col-10 col-md-9 mx-auto">
					<h6 class="fsrepublic-text-white h6-vw">??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</h6>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid py-3">
		<div class="row">
			<div class="col-12 col-md-10 mx-auto">
				<ul class="pl-3 mb-0" style="list-style-type: disc;">
					<li style="list-style: none; margin-left:-1em;">
						<h5 class="h5-vw step">?????????</h5>
					</li>
					<li class="h6-vw">
						?????? Video 1 - ??????????????????????????????
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="container-fluid px-0">
		<div data-toggle="modal" data-target="#video1Modal" style="cursor: pointer;">
			<img src="images/2019video/play-1-lg.jpg?001" class="img-fluid d-none d-sm-block">
			<img src="images/2019video/play-1-xs.jpg?001" class="img-fluid d-block d-sm-none">
		</div>
	</div>

	<div class="container-fluid py-3">
		<div class="row px-md-5">
			<div class="col-12 col-md-8 mx-auto">
				<ul class="pl-3 mb-0" style="list-style-type: disc;">
					<li style="list-style: none; margin-left:-1em;">
						<h5 class="h5-vw step">?????????</h5>
					</li>
					<li class="h6-vw">
						<a href="http://gerenjifang.fengshui-republic.com/" style="color:#007bff">http://gerenjifang.fengshui-republic.com/</a> ????????????????????????
					</li>
					<li class="h6-vw">
						?????? Video 2 - ???????????????????????????????????????????????????
					</li>
				</ul>
			</div>
			<div class="col-12 col-md-4 mx-auto">
				<img src="images/2019video/pdf.png" class="img-fluid">
			</div>
		</div>
	</div>

	<div class="container-fluid px-0">
		<div data-toggle="modal" data-target="#video2Modal" style="cursor: pointer;">
			<img src="images/2019video/play-2-lg.jpg?001" class="img-fluid d-none d-sm-block">
			<img src="images/2019video/play-2-xs.jpg?001" class="img-fluid d-block d-sm-none">
		</div>
	</div>

	<div class="container-fluid py-3">
		<div class="row">
			<div class="col-12 col-md-10 mx-auto">
				<ul class="pl-3 mb-0" style="list-style-type: disc;">
					<li style="list-style: none; margin-left:-1em;">
						<h5 class="h5-vw step">?????????</h5>
					</li>
					<li class="h6-vw">
						?????? Video 3 - ??????????????????????????????
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="container-fluid px-0">
		<div data-toggle="modal" data-target="#video3Modal" style="cursor: pointer;">
			<img src="images/2019video/play-3-lg.jpg?001" class="img-fluid d-none d-sm-block">
			<img src="images/2019video/play-3-xs.jpg?001" class="img-fluid d-block d-sm-none">
		</div>
	</div>

	<div class="container-fluid py-3">
		<div class="row">
			<div class="col-12 col-md-10 mx-auto">
				<ul class="pl-3 mb-0" style="list-style-type: disc;">
					<li style="list-style: none; margin-left:-1em;">
						<h5 class="h5-vw step">?????????</h5>
					</li>
					<li class="h6-vw">
						?????? Video 4 - ??????????????? - ????????????????????????
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="container-fluid px-0">
		<div data-toggle="modal" data-target="#video4Modal" style="cursor: pointer;">
			<img src="images/2019video/play-4-lg.jpg?001" class="img-fluid d-none d-sm-block">
			<img src="images/2019video/play-4-xs.jpg?001" class="img-fluid d-block d-sm-none">
		</div>
	</div>

	<div id="bg-brown">
		<div class="container-fluid py-4 py-md-5">
			<div class="row">
				<div class="col-10 col-md-9 mx-auto">
					<h5 class="text-center fsrepublic-text-white h6-vw">??????????????????</h5>
					<h5 class="text-center fsrepublic-text-white h6-vw"><span class="h4-vw">?????????</span>????????????</h5>
					<h5 class="text-center fsrepublic-text-white h6-vw">???????????????</h5>
					<a href="https://wa.me/60127019989">
						<img id="call" class="img-fluid" src="images/2019video/call.png">
					</a>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

<div class="modal fade ytModal" id="video1Modal" tabindex="-1" role="dialog" aria-labelledby="video1ModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<video id="video1-video" src="<?php echo $video_url[1] ?>" type="video/mp4" class="embed-responsive embed-responsive-1by1" controls>
				</video>
			</div>
		</div>
	</div>
</div>

<div class="modal fade ytModal" id="video2Modal" tabindex="-1" role="dialog" aria-labelledby="video2ModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<video id="video2-video" src="<?php echo $video_url[2] ?>" type="video/mp4" class="embed-responsive embed-responsive-1by1" controls>
				</video>
			</div>
		</div>
	</div>
</div>

<div class="modal fade ytModal" id="video3Modal" tabindex="-1" role="dialog" aria-labelledby="video3ModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<video id="video3-video" src="<?php echo $video_url[3] ?>" type="video/mp4" class="embed-responsive embed-responsive-1by1" controls>
				</video>
			</div>
		</div>
	</div>
</div>

<div class="modal fade ytModal" id="video4Modal" tabindex="-1" role="dialog" aria-labelledby="video4ModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<video id="video4-video" src="<?php echo $video_url[4] ?>" type="video/mp4" class="embed-responsive embed-responsive-1by1" controls>
				</video>
			</div>
		</div>
	</div>
</div>


