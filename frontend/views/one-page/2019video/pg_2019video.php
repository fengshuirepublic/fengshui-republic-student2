<?php

use frontend\assets\AppAsset;
use yii\web\View;
use yii\helpers\Url;

// $this->registerCssFile("@web/css/2019/video.css?2019-01-01-0000", [
// 	'depends' => [\yii\web\YiiAsset::className()],
// ]);

// $this->registerJsFile("@web/core/moment/moment-2.13.0.js", [
// 	'depends' => AppAsset::className(),
// ]);

$this->registerJsFile("@web/stand/countdown/jquery.countdown.min.js", [
	'depends' => AppAsset::className(),
]);

$this->title = Yii::t('app', 'Online Video Course 2019');

$this->registerCss('
	.modal-backdrop.show {
		opacity: .9;
	}

	#ytModal .modal-content {
		background: none;
		border: 0;
		-moz-border-radius: 0; -webkit-border-radius: 0; border-radius: 0;
		-moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none;
	}

	#ytModal .modal-header {
		padding: 0;
	}

	#ytModal .modal-header, .modal-footer {
		border: 0;
	}

	#ytModal .modal-header .close {
		float: none;
		margin: 0;
		font-size: 36px;
		color: #fff;
		font-weight: 300;
		text-shadow: none;
		opacity: 1;
		padding: 0;
	}

	#ytModal .modal-body {
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

	#buy {
		width: 35%;
		border: 1px solid #ff0000;
		border-radius: 10px;
		background-color: #ff0000;
	}

	#bg-master {
		padding-top: 45%;
		background-image: url("images/2019video/yt.jpg");
		background-repeat: no-repeat;
		background-position: top center;
		background-size: cover;
	}

	.step {
		color:#CDB24B;
	}

	.countdown,
	.countdown-word {
		font-weight: 900;
	}

	.countdown-box {
		width: 20%;
	}

	.countdown-symbol {
		width: 5%;
		font-size: 8vw;
		min-height: 1px;
	}

	.day, .hour, .minute, .second {
		font-size: 8vw;
	}

	.dt {
		font-size: 2vw;
	}
');

$this->registerJs('
	$("#ytModal").on("hidden.bs.modal", function () {
		$("#yt-video iframe").attr("src", $("#yt-video iframe").attr("src"));
	});

	$(".countdown").countdown("2019/03/21", function(event) {
		var totalDays = pad(event.offset.totalDays, 2);
		$(this).html(event.strftime("<div class=\"countdown-box float-left\"><span class=\"day\">" + totalDays + "</span></div><div class=\"countdown-symbol float-left\"><span>:</span></div><div class=\"countdown-box float-left\"><span class=\"hour\">%H</span></div><div class=\"countdown-symbol float-left\"><span>:</span></div><div class=\"countdown-box float-left\"><span class=\"minute\">%M</span></div><div class=\"countdown-symbol float-left\"><span>:</span></div><div class=\"countdown-box float-left\"><span class=\"second\">%S</span></div>"));
	});

	function pad (str, max) {
		str = str.toString();
		return str.length < max ? pad("0" + str, max) : str;
	}
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

	<div class="container-fluid py-4 py-md-3">
		<div class="row">
			<div class="col-12">
				<h2 class="text-center fsrepublic-text-white h2-vw">????????????</h2>
				<h2 class="text-center fsrepublic-text-white h2-vw">??????????????????</h2>
			</div>
		</div>
	</div>
</div>


<div class="container-fluid px-0">
	<img src="images/2019video/main-1-lg.jpg" class="img-fluid d-none d-sm-block">
	<img src="images/2019video/main-1-xs.jpg" class="img-fluid d-block d-sm-none">
</div>

<div id="bg-brown">
	<div class="container-fluid py-4 py-md-5">
		<div class="row">
			<div class="col-10 col-md-9 mx-auto">
				<ul class="pl-3 mb-0 fsrepublic-text-white" style="list-style-type: disc">
					<li style="list-style: none; margin-left:-1em;">
						<h4 class="h4-vw">????????????</h4>
					</li>
					<li class="li-vw">
						??????????????????
					</li>
					<li class="li-vw">
						??????????????????
					</li>
					<li class="li-vw">
						??????????????????
					</li>
					<li class="li-vw">
						??????????????????????????????
					</li>
					<li class="li-vw">
						???????????????????????????
					</li>
					<li class="li-vw">
						???????????????????????????
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div id="bg-black">
	<div class="container-fluid py-4 py-md-5">
		<div class="row">
			<div class="col-10 col-md-9 mx-auto">
				<ul class="pl-3 mb-0 fsrepublic-text-white">
					<li style="list-style: none; margin-left:-1em;">
						<h5 class="h5-vw">??????<span style="color: #ff0000;"> RM24.30 </span>??????????????????</h5>
					</li>
					<li class="li-vw">
						4?????????120????????????????????????????????????
					</li>
					<li class="li-vw">
						??????????????????
					</li>
					<li class="li-vw">
						??????????????????
					</li>
					<li class="li-vw">
						???????????????????????????
					</li>
				</ul>
			</div>
		</div>
		<!-- <div class="row">
			<div class="col-11 mx-auto mt-3">
				<div style="border: 1px solid #ff0000;">
					<h5 class="m-0 p-1 text-center fsrepublic-text-white h5-vw">????????????????????? 21 MAR 2019</h5>
				</div>
			</div>
		</div> -->
		<div class="row">
			<div class="col-11 col-md-8 mx-auto mt-3">
				<img src="images/2019video/promotion.png" class="img-fluid d-flex mx-auto">
			</div>
		</div>
		<div class="row">
			<div class="col-12 mt-3 text-center fsrepublic-text-white">
				<div class="d-flex justify-content-center countdown">
					<!-- <div class="countdown-box float-left">
						<span class="day">99</span>
					</div>
					<div class="countdown-symbol float-left">
						<span>:</span>
					</div>
					<div class="countdown-box float-left">
						<span class="hour">99</span>
					</div>
					<div class="countdown-symbol float-left">
						<span>:</span>
					</div>
					<div class="countdown-box float-left">
						<span class="minute">99</span>
					</div>
					<div class="countdown-symbol float-left">
						<span>:</span>
					</div>
					<div class="countdown-box float-left">
						<span class="second">99</span>
					</div> -->
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 text-center fsrepublic-text-white">
				<div class="d-flex justify-content-center countdown-word">
					<div class="countdown-box float-left">
						<div class="dt">DAYS</div>
					</div>
					<div class="countdown-symbol float-left"></div>
					<div class="countdown-box float-left">
						<div class="dt">HOURS</div>
					</div>
					<div class="countdown-symbol float-left"></div>
					<div class="countdown-box float-left">
						<div class="dt">MINUTES</div>
					</div>
					<div class="countdown-symbol float-left"></div>
					<div class="countdown-box float-left">
						<div class="dt">SECONDS</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-11 mx-auto mt-3 mt-md-5">
				<div class="text-center">
					<button id="buy" class="btn btn-primary btn-lg fsrepublic-text-white" data-toggle="modal" data-target="#purchaseVideo">
						<h5 class="m-0 h5-vw"><b>??????</b></h5>
					</button>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-11 col-md-8 mx-auto mt-5">
				<img src="images/2019video/promotion1.png" class="img-fluid d-flex mx-auto">
				<img src="images/2019video/expire.png" class="img-fluid d-flex mx-auto">
			</div>
		</div>
	</div>
</div>

<div id="bg-brown">
	<div class="container-fluid py-4 py-md-5">
		<div class="row">
			<div class="col-10 col-md-9 mx-auto">
				<h5 class="text-center fsrepublic-text-white h5-vw">????????????????????????????????????</h5>
				<a href="https://wa.me/60127019989?text=????????????????????????????????????????????????????????????">
					<img id="call" class="img-fluid d-flex mx-auto" src="images/2019video/call.png">
				</a>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0">
	<div id="bg-master" data-toggle="modal" data-target="#ytModal" style="cursor: pointer;"></div>
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
	</div>
</div>

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
	<div data-toggle="modal" data-target="#purchaseVideo" style="cursor: pointer;">
		<img src="images/2019video/step-1-lg.jpg?001" class="img-fluid d-none d-sm-block">
		<img src="images/2019video/step-1-xs.jpg?001" class="img-fluid d-block d-sm-none">
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
					<a href="http://gerenjifang.fengshui-republic.com/" target="_blank" style="color:#007bff">http://gerenjifang.fengshui-republic.com/</a> ????????????????????????
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
	<div data-toggle="modal" data-target="#purchaseVideo" style="cursor: pointer;">
		<img src="images/2019video/step-2-lg.jpg?001" class="img-fluid d-none d-sm-block">
		<img src="images/2019video/step-2-xs.jpg?001" class="img-fluid d-block d-sm-none">
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
	<div data-toggle="modal" data-target="#purchaseVideo" style="cursor: pointer;">
		<img src="images/2019video/step-3-lg.jpg?001" class="img-fluid d-none d-sm-block">
		<img src="images/2019video/step-3-xs.jpg?001" class="img-fluid d-block d-sm-none">
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
	<div data-toggle="modal" data-target="#purchaseVideo" style="cursor: pointer;">
		<img src="images/2019video/step-4-lg.jpg?001" class="img-fluid d-none d-sm-block">
		<img src="images/2019video/step-4-xs.jpg?001" class="img-fluid d-block d-sm-none">
	</div>
</div>

<div id="bg-black">
	<div class="container-fluid pb-4">
		<div class="row">
			<div class="col-11 col-md-8 mx-auto mt-3">
				<img src="images/2019video/promotion.png" class="img-fluid d-flex mx-auto">
			</div>
		</div>
		<div class="row">
			<div class="col-12 mt-3 text-center fsrepublic-text-white">
				<div class="mx-auto countdown"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 text-center fsrepublic-text-white">
				<div class="mx-auto countdown-word">
					<div class="countdown-box float-left">
						<div class="dt">DAYS</div>
					</div>
					<div class="countdown-symbol float-left"></div>
					<div class="countdown-box float-left">
						<div class="dt">HOURS</div>
					</div>
					<div class="countdown-symbol float-left"></div>
					<div class="countdown-box float-left">
						<div class="dt">MINUTES</div>
					</div>
					<div class="countdown-symbol float-left"></div>
					<div class="countdown-box float-left">
						<div class="dt">SECONDS</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-11 mx-auto mt-3 mt-md-5">
				<div class="text-center">
					<button id="buy" class="btn btn-primary btn-lg fsrepublic-text-white" data-toggle="modal" data-target="#purchaseVideo">
						<h5 class="m-0 h5-vw"><b>??????</b></h5>
					</button>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-11 col-md-8 mx-auto mt-5">
				<img src="images/2019video/promotion1.png" class="img-fluid d-flex mx-auto">
				<img src="images/2019video/expire.png" class="img-fluid d-flex mx-auto">
			</div>
		</div>
	</div>
</div>

<div id="bg-brown">
	<div class="container-fluid py-4 py-md-5">
		<div class="row">
			<div class="col-10 col-md-9 mx-auto">
				<h5 class="text-center fsrepublic-text-white h5-vw">????????????????????????????????????</h5>
				<a href="https://wa.me/60127019989?text=????????????????????????????????????????????????????????????">
					<img id="call" class="img-fluid d-flex mx-auto" src="images/2019video/call.png">
				</a>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="ytModal" tabindex="-1" role="dialog" aria-labelledby="ytModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div id="yt-video" class="d-flex justify-content-center">
					<iframe class="embed-responsive embed-responsive-1by1" width="560" height="315" src="https://www.youtube.com/embed/wtq2uHPeEeI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="purchaseVideo" tabindex="-1" role="dialog" aria-labelledby="purchaseVideoLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">2019 ??????????????????</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="video-order-form" action="<?= Url::to(['/2019video']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Order[quantity]" value="1" />

				<div class="modal-body">
					<div class="col-12 mx-auto mb-3">
						<div class="card">
							<div class="card-body">
								<div class="form-group">
									<label for="order_video_name">*??????</label>
									<input id="order_video_name" class="form-control form-control-sm" type="text" name="Order[person][1][name]" required />
								</div>
								<div class="form-group">
									<label for="order_video_email">*??????</label>
									<input id="order_video_email" class="form-control form-control-sm" type="email" name="Order[person][1][email]" required />
								</div>
								<div class="form-group">
									<label for="order_video_phone">*??????</label>
									<input id="order_video_phone" class="form-control form-control-sm" type="text" name="Order[person][1][phone]" required />
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer pt-0">
					<button type="button" class="btn btn-default" data-dismiss="modal">??????</button>
					<button type="submit" class="btn btn-primary">??????</button>
				</div>
			</form>
		</div>
	</div>
</div>


