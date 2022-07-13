<?php

use frontend\assets\AppAsset;
use yii\web\View;
use yii\helpers\Url;

$this->registerJsFile("@web/stand/countdown/jquery.countdown.min.js", [
	'depends' => AppAsset::className(),
]);

$this->title = Yii::t('app', 'Online Video Course');

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

	.payment-btn {
		border: none;
		background: transparent;
	}

	.btn-kiple {
		font-weight: 900;
		font-size: 14px;
		color: #F8F8F8;
		background-color: #009EDE;
	}

	.h1-vw {
		font-size: 11vw; /* vw = viewport width, vh = viewport height */
		font-weight: 900;
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

	#bg-red {
		background-color: #FF0000;
	}

	#buy {
		width: 35%;
		border: 1px solid #ff0000;
		border-radius: 10px;
		background-color: #ff0000;
	}

	#bg-master {
		padding-top: 45%;
		background-image: url("images/yyd-video-course/yt.jpg");
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

	$(".countdown").countdown("'.$cd_date.'", function(event) {
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
				<h1 class="text-center fsrepublic-text-white h1-vw">風水課程</h1>
				<h1 class="text-center fsrepublic-text-white h1-vw">網上視頻教學</h1>
			</div>
		</div>
	</div>
</div>


<div class="container-fluid px-0">
	<img src="images/yyd-video-course/main-1-lg.jpg" class="img-fluid d-none d-sm-block">
	<img src="images/yyd-video-course/main-1-xs.jpg" class="img-fluid d-block d-sm-none">
</div>

<div id="bg-brown">
	<div class="container-fluid py-4 py-md-5">
		<div class="row">
			<div class="col-10 col-md-9 mx-auto">
				<ul class="pl-3 mb-0 fsrepublic-text-white" style="list-style-type: disc">
					<li style="list-style: none; margin-left:-1em;">
						<h4 class="h4-vw">課程內容</h4>
					</li>
					<li class="li-vw">
						真正了解風水
					</li>
					<li class="li-vw">
						找出個人吉方
					</li>
					<li class="li-vw">
						善用個人吉方
					</li>
					<li class="li-vw">
						提升事業，財運與健康
					</li>
					<li class="li-vw">
						門，房，灶風水秘訣
					</li>
					<li class="li-vw">
						解說一眼斷風水秘法
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
				<h5 class="h5-vw fsrepublic-text-white" style="margin-left:-0.5em;">僅需<span style="color: #ff0000;"> RM76.00 </span>要既能得到：</h5>
				<ol class="pl-3 mb-0 fsrepublic-text-white">
					<li class="li-vw">
						4集超過120分鐘網上視頻風水課程教學
					</li>
					<li class="li-vw">
						可以重複觀看
					</li>
					<li class="li-vw">
						彈性學習時間
					</li>
					<li class="li-vw">
						簡易教學，一定學會
					</li>
					<li class="li-vw">
						看完四集可獲免費出席一日課程（價值 RM1280）
					</li>
					<li class="li-vw">
						一日課程可面對面諮詢
					</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-10 mx-auto mt-3">
				<hr id="package" style="border-color: #fff;">
			</div>
		</div>
		<div class="row">
			<div class="col-12 mx-auto mt-3">
				<h1 class="text-center fsrepublic-text-white h1-vw">14天有限期配套</h1>
				<img src="images/yyd-video-course/promotion.png" class="img-fluid d-flex mx-auto">
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
					<button id="buy" class="btn btn-primary btn-lg fsrepublic-text-white" data-toggle="modal" data-target="#purchaseVideoA">
						<h5 class="m-0 h5-vw"><b>購買</b></h5>
					</button>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-10 mx-auto mt-3">
				<hr style="border-color: #fff;">
			</div>
		</div>
		<div class="row">
			<div class="col-12 mx-auto mt-3">
				<h1 class="text-center fsrepublic-text-white h1-vw">無限期配套</h1>
				<h6 class="text-center fsrepublic-text-white h6-vw">（不限制觀看時間及次數，可永久保留）</h6>
				<img src="images/yyd-video-course/promotion2.png" class="img-fluid d-flex mx-auto">
			</div>
		</div>
		<div class="row">
			<div class="col-11 mx-auto mt-3 mt-md-5">
				<div class="text-center">
					<button id="buy" class="btn btn-primary btn-lg fsrepublic-text-white" data-toggle="modal" data-target="#purchaseVideoB">
						<h5 class="m-0 h5-vw"><b>購買</b></h5>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="bg-brown">
	<div class="container-fluid py-4 py-md-5">
		<div class="row">
			<div class="col-10 col-md-9 mx-auto">
				<h5 class="text-center fsrepublic-text-white h5-vw">欲知更多詳情，請馬上聯繫</h5>
				<a href="https://wa.me/60127019989?text=嗨，請讓我了解更多關於網上視頻風水課程。">
					<img id="call" class="img-fluid d-flex mx-auto" src="images/yyd-video-course/call.png">
				</a>
				<a href="https://wa.me/60127885255?text=嗨，請讓我了解更多關於網上視頻風水課程。">
					<img id="call" class="img-fluid d-flex mx-auto" src="images/yyd-video-course/call2.png">
				</a>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0">
	<div id="bg-master" data-toggle="modal" data-target="#ytModal" style="cursor: pointer;"></div>
</div>

<div id="bg-red">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<h1 class="text-center fsrepublic-text-white h1-vw my-2">重要提醒:</h1>
			</div>
		</div>
	</div>
</div>

<div id="bg-brown">
	<div class="container-fluid py-4 py-md-5">
		<div class="row">
			<div class="col-10 col-md-9 mx-auto">
				<ol class="pl-3 mb-0 fsrepublic-text-white">
					<li class="li-vw">
						所有風水課程視頻都有特定關聯，請按照順序觀看。
					</li>
					<li class="li-vw">
						激活之後，即可觀看風水課程視頻。
					</li>
					<li class="li-vw">
						所有風水視頻的激活碼（access code）將於購買十四天后失效，請務必在十四天內的期限觀看完畢。
					</li>
					<li class="li-vw">
						無限期配套將無不限制觀看時間及次數。
					</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid py-3">
	<div class="row">
		<div class="col-12 col-md-10 mx-auto">
			<ul class="pl-3 mb-0" style="list-style-type: disc;">
				<li style="list-style: none; margin-left:-1em;">
					<h5 class="h5-vw step">步驟一</h5>
				</li>
				<li class="h6-vw">
					觀看 Video 1 - 改變人生的十二個因素
				</li>
			</ul>
		</div>
	</div>
</div>

<div class="container-fluid px-0">
	<a href="#package">
		<img src="images/yyd-video-course/step-1-lg.jpg?001" class="img-fluid d-none d-sm-block">
		<img src="images/yyd-video-course/step-1-xs.jpg?001" class="img-fluid d-block d-sm-none">
	</a>
</div>

<div class="container-fluid py-3">
	<div class="row px-md-5">
		<div class="col-12 col-md-8 mx-auto">
			<ul class="pl-3 mb-0" style="list-style-type: disc;">
				<li style="list-style: none; margin-left:-1em;">
					<h5 class="h5-vw step">步驟二</h5>
				</li>
				<li class="h6-vw">
					<a href="http://gerenjifang.fengshui-republic.com/" target="_blank" style="color:#007bff">http://gerenjifang.fengshui-republic.com/</a> 打印你的個人吉方
				</li>
				<li class="h6-vw">
					觀看 Video 2 - 如何找出能幫助你邁向成功的個人吉方
				</li>
			</ul>
		</div>
		<div class="col-12 col-md-4 mx-auto">
			<img src="images/yyd-video-course/pdf.png" class="img-fluid">
		</div>
	</div>
</div>

<div class="container-fluid px-0">
	<a href="#package">
		<img src="images/yyd-video-course/step-2-lg.jpg?001" class="img-fluid d-none d-sm-block">
		<img src="images/yyd-video-course/step-2-xs.jpg?001" class="img-fluid d-block d-sm-none">
	</a>
</div>

<div class="container-fluid py-3">
	<div class="row">
		<div class="col-12 col-md-10 mx-auto">
			<ul class="pl-3 mb-0" style="list-style-type: disc;">
				<li style="list-style: none; margin-left:-1em;">
					<h5 class="h5-vw step">步驟三</h5>
				</li>
				<li class="h6-vw">
					觀看 Video 3 - 影響風水的有五大元素
				</li>
			</ul>
		</div>
	</div>
</div>

<div class="container-fluid px-0">
	<a href="#package">
		<img src="images/yyd-video-course/step-3-lg.jpg?001" class="img-fluid d-none d-sm-block">
		<img src="images/yyd-video-course/step-3-xs.jpg?001" class="img-fluid d-block d-sm-none">
	</a>
</div>

<div class="container-fluid py-3">
	<div class="row">
		<div class="col-12 col-md-10 mx-auto">
			<ul class="pl-3 mb-0" style="list-style-type: disc;">
				<li style="list-style: none; margin-left:-1em;">
					<h5 class="h5-vw step">步驟四</h5>
				</li>
				<li class="h6-vw">
					觀看 Video 4 - 一眼斷風水 - 神奇的風水學派！
				</li>
			</ul>
		</div>
	</div>
</div>

<div class="container-fluid px-0">
	<a href="#package">
		<img src="images/yyd-video-course/step-4-lg.jpg?001" class="img-fluid d-none d-sm-block">
		<img src="images/yyd-video-course/step-4-xs.jpg?001" class="img-fluid d-block d-sm-none">
	</a>
</div>

<div id="bg-black">
	<div class="container-fluid pb-4">
		<div class="row">
			<div class="col-12 mx-auto mt-3">
				<h1 class="text-center fsrepublic-text-white h1-vw">14天有限期配套</h1>
				<img src="images/yyd-video-course/promotion.png" class="img-fluid d-flex mx-auto">
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
					<button id="buy" class="btn btn-primary btn-lg fsrepublic-text-white" data-toggle="modal" data-target="#purchaseVideoA">
						<h5 class="m-0 h5-vw"><b>購買</b></h5>
					</button>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-10 mx-auto mt-3">
				<hr style="border-color: #fff;">
			</div>
		</div>
		<div class="row">
			<div class="col-12 mx-auto mt-3">
				<h1 class="text-center fsrepublic-text-white h1-vw">無限期配套</h1>
				<h6 class="text-center fsrepublic-text-white h6-vw">（不限制觀看時間及次數，可永久保留）</h6>
				<img src="images/yyd-video-course/promotion2.png" class="img-fluid d-flex mx-auto">
			</div>
		</div>
		<div class="row">
			<div class="col-11 mx-auto mt-3 mt-md-5">
				<div class="text-center">
					<button id="buy" class="btn btn-primary btn-lg fsrepublic-text-white" data-toggle="modal" data-target="#purchaseVideoB">
						<h5 class="m-0 h5-vw"><b>購買</b></h5>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="bg-brown">
	<div class="container-fluid py-4 py-md-5">
		<div class="row">
			<div class="col-10 col-md-9 mx-auto">
				<h5 class="text-center fsrepublic-text-white h5-vw">欲知更多詳情，請馬上聯繫</h5>
				<a href="https://wa.me/60127019989?text=嗨，請讓我了解更多關於網上視頻風水課程。">
					<img id="call" class="img-fluid d-flex mx-auto" src="images/yyd-video-course/call.png">
				</a>
				<a href="https://wa.me/60127885255?text=嗨，請讓我了解更多關於網上視頻風水課程。">
					<img id="call" class="img-fluid d-flex mx-auto" src="images/yyd-video-course/call2.png">
				</a>
			</div>
		</div>
	</div>
</div>

<div id="bg-black">
	<div class="container-fluid py-4 py-md-5">
		<div class="row">
			<div class="col-10 col-md-9 mx-auto">
				<h4 class="text-center h4-vw" style="color: #ff0000;">警告</h4>
				<h5 class="fsrepublic-text-white h5-vw">所有內容及視頻版權歸龍岩風水命理研究院所有。</h5>
				<h5 class="fsrepublic-text-white h5-vw">未經版權所有人的明確授權，不得以任何形式或以任何方式對本網站上之任何內容行使影印、複製、散佈、再版、下載、顯示、張貼、構造或傳送之行為，包括於電子、機械、影印、錄製或其他方式。版權所有人將保留一切法律追究責任。</h5>
			</div>
		</div>
		<div class="row">
			<div class="col-10 mx-auto mt-3">
				<hr style="border-color: #fff;">
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

<div class="modal fade" id="purchaseVideoA" tabindex="-1" role="dialog" aria-labelledby="purchaseVideoLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">風水課程視頻</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="video-order-form" action="<?= Url::to(['/yydcourse']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Order[product]" value="yydvi20a" />

				<div class="modal-body">
					<div class="col-12 mx-auto mb-3">
						<h6>14天有限期配套 (RM 76.00)</h6>
						<div class="card">
							<div class="card-body">
								<div class="form-group">
									<label for="order_video_name">*名字</label>
									<input id="order_video_name" class="form-control form-control-sm" type="text" name="Order[name]" required />
								</div>
								<div class="form-group">
									<label for="order_video_email">*電郵</label>
									<input id="order_video_email" class="form-control form-control-sm" type="email" name="Order[email]" required />
								</div>
								<div class="form-group">
									<label for="order_video_phone">*電話</label>
									<input id="order_video_phone" class="form-control form-control-sm" type="text" name="Order[phone]" required />
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer pt-0">
					<div class="container">
						<div class="row">
							<div class="col-12 col-md-auto ml-auto px-0">
								<button type="submit" class="pull-right payment-btn px-0 mb-3" name="Order[payment_type]" value="paypal">
									<img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/buy-logo-medium.png" alt="Buy now with PayPal" />
								</button>
							</div>
							<div class="col-12 col-md-auto ml-auto px-0">
								<button type="submit" class="pull-right btn btn-default btn-kiple payment-btn mb-3" name="Order[payment_type]" value="kiple">
									Buy now with Kiple
								</button>
							</div>
							<div class="col-12 col-md-auto ml-auto px-0">
								<button type="button" class="pull-right btn btn-default py-1 mb-3" data-dismiss="modal">关闭</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="purchaseVideoB" tabindex="-1" role="dialog" aria-labelledby="purchaseVideoLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">風水課程視頻</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="video-order-form" action="<?= Url::to(['/yydcourse']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Order[product]" value="yydvi20b" />

				<div class="modal-body">
					<div class="col-12 mx-auto mb-3">
						<h6>無限期配套 (RM 899.00)</h6>
						<div class="card">
							<div class="card-body">
								<div class="form-group">
									<label for="order_video_name">*名字</label>
									<input id="order_video_name" class="form-control form-control-sm" type="text" name="Order[name]" required />
								</div>
								<div class="form-group">
									<label for="order_video_email">*電郵</label>
									<input id="order_video_email" class="form-control form-control-sm" type="email" name="Order[email]" required />
								</div>
								<div class="form-group">
									<label for="order_video_phone">*電話</label>
									<input id="order_video_phone" class="form-control form-control-sm" type="text" name="Order[phone]" required />
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer pt-0">
					<div class="container">
						<div class="row">
							<div class="col-12 col-md-auto ml-auto px-0">
								<button type="submit" class="pull-right payment-btn px-0 mb-3" name="Order[payment_type]" value="paypal">
									<img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/buy-logo-medium.png" alt="Buy now with PayPal" />
								</button>
							</div>
							<div class="col-12 col-md-auto ml-auto px-0">
								<button type="submit" class="pull-right btn btn-default btn-kiple payment-btn mb-3" name="Order[payment_type]" value="kiple">
									Buy now with Kiple
								</button>
							</div>
							<div class="col-12 col-md-auto ml-auto px-0">
								<button type="button" class="pull-right btn btn-default py-1 mb-3" data-dismiss="modal">关闭</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>


