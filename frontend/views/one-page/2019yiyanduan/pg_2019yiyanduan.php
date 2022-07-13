<?php

use frontend\assets\AppAsset;
use yii\web\View;
use yii\helpers\Url;

$this->registerJsFile("@web/stand/countdown/jquery.countdown.min.js", [
	'depends' => AppAsset::className(),
]);

$this->title = Yii::t('app', 'Yi Yan Duan Course 2019');

$this->registerCss('
	#main_gif_1_1 {
		height: 450px;
		background-image: url("images/2019yiyanduan/master-main-s.gif");
		background-repeat: no-repeat;
		background-position: center top;
		background-size: cover;
	}

	#main_gif_1_2 {
		height: 450px;
		background-image: url("images/2019yiyanduan/master-main-lg.gif");
		background-repeat: no-repeat;
		background-position: center top;
		background-size: cover;
	}

	@media (min-width: 1200px){
		#seq-gif,
		#main_gif_1_2 {
			padding-top: 30%;
		}
	}

	/* seq => */
		.seq {
			position: relative;
			height: 450px;
			overflow: hidden;
			background: #a2a2a2;
		}

		.seq .seq-absolute {
			position: absolute;
		}

		.seq .seq-background {
			top: 0;
			left: 0;
			width: 100%;
		}

		.seq .seq-model-1-1 img {
			max-height: 568px;
		}

		.seq .seq-model-1-1 {
			width: 100%;
			max-height: 568px;
			top: 2%;
			right: 20px;
			height: 25%;
		}
	/* <= seq */

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

	.bg-black {
		background-color: #000;
	}

	.bg-brown {
		background-color: #796042;
	}

	#buy {
		width: 35%;
		border: 1px solid #ff0000;
		border-radius: 10px;
		background-color: #ff0000;
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

	ol li:before {
		position: absolute;
		left: 15px;
		font-size: 15px;
	}

	ol li.venue-date:before {
		content: "Date :";
		align: text-right;
	}

	ol li.venue-time:before {
		content: "Time :";
	}

	ol li.venue-name:before {
		content: "Venue :";
	}

	ol li.venue-tel:before {
		content: "Tel :";
	}
');

$this->registerJs('
	var date = new Date();
	date.setDate(date.getDate() + 3);

	$(".countdown").countdown(date, function(event) {
		var totalDays = pad(event.offset.totalDays, 2);
		$(this).html(event.strftime("<div class=\"countdown-box float-left\"><span class=\"day\">" + totalDays + "</span></div><div class=\"countdown-symbol float-left\"><span>:</span></div><div class=\"countdown-box float-left\"><span class=\"hour\">%H</span></div><div class=\"countdown-symbol float-left\"><span>:</span></div><div class=\"countdown-box float-left\"><span class=\"minute\">%M</span></div><div class=\"countdown-symbol float-left\"><span>:</span></div><div class=\"countdown-box float-left\"><span class=\"second\">%S</span></div>"));
	});

	function pad (str, max) {
		str = str.toString();
		return str.length < max ? pad("0" + str, max) : str;
	}
', View::POS_END);

?>

<div class="bg-black">
	<div class="container-fluid d-block d-md-none">
		<div class="row py-3 py-md-5">
			<div class="col-auto d-block mx-auto">
				<a href="<?= Yii::$app->urlManager->createUrl('/') ?>">
					<img id="brand-logo" src="<?= Yii::$app->urlManager->createUrl('/images/fr/logo-white.png') ?>" alt="Fengshui Republic">
				</a>
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
				<div class="seq-absolute seq-model-1-1 d-none d-md-block">
					<img src="images/fr/logo-white.png" class="d-flex ml-auto h-100 w-auto" alt="Fengshui Republic" />
				</div>
			</div>
		</div>
	</div>
</div>

<div class="bg-brown">
	<div class="container-fluid pb-4 pb-md-5">
		<div class="row d-block d-md-none">
			<div class="col-6 mx-auto mb-2">
				<img src="images/2019yiyanduan/yiyanduan.png" class="img-fluid d-flex mx-auto" width="80%">
			</div>
		</div>
		<div class="row pt-md-5">
			<div class="col-12 col-md-3 d-none d-md-block pt-md-5">
				<img src="images/2019yiyanduan/yiyanduan.png" class="img-fluid d-flex mx-auto" width="80%">
			</div>
			<div class="col-10 offset-1 col-md-8 offset-md-0">
				<ul class="pl-3 mb-0 fsrepublic-text-white" style="list-style-type: disc">
					<li class="h6-vw">
						一門讓你一學即會，一會就用，一用就準的風水學派
					</li>
					<li class="h6-vw">
						讓你擁有風水眼，一眼便知該宅是富宅還是凶宅
					</li>
					<li class="h6-vw">
						教會你佈下快速發富的格局
					</li>
					<li class="h6-vw">
						教會你佈下健康幸福的格局
					</li>
					<li class="h6-vw">
						教會你佈下員工進取的格局
					</li>
					<li class="h6-vw">
						教會你佈下貴人處處的格局
					</li>
					<li class="h6-vw">
						教會你佈下提升業績的格局
					</li>
					<li class="h6-vw">
						教會你佈下迅速發展的格局
					</li>
					<li class="h6-vw">
						教會你佈下提高忠誠的格局
					</li>
					<li class="h6-vw">
						教會你建立夫妻和諧的格局
					</li>
					<li class="h6-vw">
						教會你建立考好成績的格局
					</li>
					<li class="h6-vw">
						教會你避開所有兇惡的格局
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="bg-black">
	<div class="container-fluid py-4 py-md-5">
		<div class="row">
			<div class="col-10 col-md-9 mx-auto">
				<h5 class="text-center fsrepublic-text-white h2-vw"><b>開課時間</b></h5>
			</div>
		</div>
		<div class="row">
			<div class="mt-3 col-10 offset-1 col-md-4 offset-md-2 fsrepublic-text-white">
				<h5>KUALA LUMPUR</h5>
				<ol class="ml-4" style="list-style-type:none">
					<li class="venue-date">22, 23, 24 Mar 2019</li>
					<li class="venue-time">9.30am - 6pm</li>
					<li class="venue-name">Unit 3.049, Level 3, Block J, Jaya One, 72A, Jalan Universiti, 46200, Petaling Jaya, Selangor.</li>
					<li class="venue-tel">+603 7960 9066</li>
				</ol>
			</div>
			<div class="mt-3 col-10 offset-1 col-md-4 offset-md-0 fsrepublic-text-white">
				<h5>JOHOR BAHRU</h5>
				<ol class="ml-4" style="list-style-type:none">
					<li class="venue-date">12, 13, 14 Apr 2019</li>
					<li class="venue-time">9.30am - 6pm</li>
					<li class="venue-name">Taman Molek</li>
					<li class="venue-tel">+607 353 5366</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-11 col-md-8 mx-auto mt-3">
				<img src="images/2019yiyanduan/promotion1.png?001" class="img-fluid d-flex mx-auto">
			</div>
		</div>
		<div class="row">
			<div class="col-12 mt-3 text-center fsrepublic-text-white">
				<div class="d-flex justify-content-center countdown">
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
		<!-- <div class="row">
			<div class="col-11 mx-auto mt-3 mt-md-5">
				<div class="text-center">
					<button id="buy" class="btn btn-primary btn-lg fsrepublic-text-white" data-toggle="modal" data-target="#purchaseCourse">
						<h5 class="m-0 h5-vw"><b>我要報名</b></h5>
					</button>
				</div>
			</div>
		</div> -->
	</div>
</div>

<div class="bg-brown">
	<div class="container-fluid py-4 py-md-5">
		<div class="row">
			<div class="col-10 col-md-9 mx-auto">
				<h5 class="text-center fsrepublic-text-white h5-vw">欲知更多詳情，請馬上聯繫</h5>
				<a href="https://wa.me/60127019989?text=嗨，請讓我了解更多關於風水一眼斷課程。">
					<img id="call" class="img-fluid d-flex mx-auto" src="images/2019yiyanduan/call.png">
				</a>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid py-4 py-md-5">
	<div class="row">
		<div class="col-10 col-md-9 mx-auto">
			<h5 class="h4-vw" style="color: #CBAF40; margin-left:-0.5em;">風水一眼斷適合什麼人？</h5>
			<ol class="pl-3 mb-0">
				<li class="h5-vw">
					想要提升財運的人
				</li>
				<li class="h5-vw">
					想要提升健康的人
				</li>
				<li class="h5-vw">
					想要提升事業運的人
				</li>
				<li class="h5-vw">
					想要提升家庭運，增進和諧幸福的人
				</li>
				<li class="h5-vw">
					想要提升夫妻運，擁有甜蜜幸福的人
				</li>
			</ol>
		</div>
	</div>
</div>

<div class="bg-black">
	<div class="container-fluid pb-4">
		<div class="row">
			<div class="col-11 col-md-8 mx-auto mt-3">
				<img src="images/2019yiyanduan/promotion1.png?001" class="img-fluid d-flex mx-auto">
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
		<!-- <div class="row">
			<div class="col-11 mx-auto mt-3 mt-md-5">
				<div class="text-center">
					<button id="buy" class="btn btn-primary btn-lg fsrepublic-text-white" data-toggle="modal" data-target="#purchaseCourse">
						<h5 class="m-0 h5-vw"><b>我要報名</b></h5>
					</button>
				</div>
			</div>
		</div> -->
	</div>
</div>

<div class="bg-brown">
	<div class="container-fluid py-4 py-md-5">
		<div class="row">
			<div class="col-10 col-md-9 mx-auto">
				<h5 class="text-center fsrepublic-text-white h5-vw">欲知更多詳情，請馬上聯繫</h5>
				<a href="https://wa.me/60127019989?text=嗨，請讓我了解更多關於風水一眼斷課程。">
					<img id="call" class="img-fluid d-flex mx-auto" src="images/2019yiyanduan/call.png">
				</a>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid py-4 py-md-5">
	<div class="row">
		<div class="col-10 col-md-9 mx-auto">
			<h5 class="h4-vw">對我們的課程有興趣但仍存有疑問？不必擔心，我們綜合了大家常遇到的問題，一一為大家解說。</h5>
			<h4 class="mt-4 h4-vw" style="color: #CBAF40;"><b>常問問題：</b></h4>
			<h5 class="h6-vw"><b>Q：為什麼要跟我們學一眼斷？</b></h5>
			<h5 class="h6-vw">我們是唯一一家給予完整教學的風水學院。羅師傅秉持使命與宗旨，把全套的型巒風水學傳授於世，通過正統教學的方式傳給炎黃子孫。此外，羅師傅更是通過多年的實戰經驗打造了一套《送財佈局法》。因此我們所教的不僅是風水，而是希望為大家創造更多《財富》並遠離窮困的學問，勢必打造一個富裕的華人天下。</h5>
			<h5 class="mt-4 h6-vw"><b>Q：誰應該參加一眼斷課程？</b></h5>
			<h5 class="h6-vw">想讓生活過得更好的人都可以參加。為自己打造一個優良的居家環境，運用大地能量來提昇我們的磁場能量。此外，想在生意或事業上有所進步的人也可通過學習來提昇自身能量和運勢，透過所學所知為自己趨吉避凶，立於不敗！</h5>
			<h5 class="mt-4 h6-vw"><b>Q：一眼斷課程難學嗎？數理不好可以學嗎？</b></h5>
			<h5 class="h6-vw">一眼斷課程一點也不難學！只要懂得基本華語，加上羅師傅深入淺出的教學方式，配合使用簡單易懂的對照表，肯定讓學員一學即會，而且一會了之後便能馬上運用。此外，本院的承諾是：“一次付費，終身學習”，就算第一次學習不能完全掌握，下一次課程僅需付茶水費用便能回來繼續複習。</h5>
			<h5 class="mt-4 h6-vw"><b>Q：我想要往風水方面發展，這裡的課程適合嗎？</b></h5>
			<h5 class="h6-vw">如果想要從事風水相關行業，那這肯定是你不能錯過的風水課程！老師擁有多年的教學經驗，學生已經達到千人以上，加上豐富的實戰經驗，將會把最實用，最精簡的知識傳達給你。值得一提的是，本院是全馬唯一一家以中文授課，從陽宅到陰宅，羅盤從第一盤教到最後一盤的風水學院。</h5>
			<h5 class="mt-4 h6-vw"><b>Q：我之前在外面已經學了基礎班，在這裡我可以直接跳級嗎？</b></h5>
			<h5 class="h6-vw">若經過審查，是可以選擇跳級。由於擔心學生在課程途中才發現自己學的和老師所教的出現差異並追趕不上，建議還是重新從初級學起，多與同學進行交流提升學習經驗，必定能學習並掌握更多的風水知識。</h5>
		</div>
	</div>
</div>

<div class="bg-black">
	<div class="container-fluid pb-4">
		<div class="row">
			<div class="col-11 col-md-8 mx-auto mt-3">
				<img src="images/2019yiyanduan/promotion1.png?001" class="img-fluid d-flex mx-auto">
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
		<!-- <div class="row">
			<div class="col-11 mx-auto mt-3 mt-md-5">
				<div class="text-center">
					<button id="buy" class="btn btn-primary btn-lg fsrepublic-text-white" data-toggle="modal" data-target="#purchaseCourse">
						<h5 class="m-0 h5-vw"><b>我要報名</b></h5>
					</button>
				</div>
			</div>
		</div> -->
	</div>
</div>

<div class="bg-brown">
	<div class="container-fluid py-4 py-md-5">
		<div class="row">
			<div class="col-10 col-md-9 mx-auto">
				<h5 class="text-center fsrepublic-text-white h5-vw">欲知更多詳情，請馬上聯繫</h5>
				<a href="https://wa.me/60127019989?text=嗨，請讓我了解更多關於風水一眼斷課程。">
					<img id="call" class="img-fluid d-flex mx-auto" src="images/2019yiyanduan/call.png">
				</a>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="purchaseCourse" tabindex="-1" role="dialog" aria-labelledby="purchaseCourseLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">2019 風水一眼斷課程</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="course-order-form" action="<?= Url::to(['/2019yiyanduan']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Order[quantity]" value="1" />

				<div class="modal-body">
					<div class="col-12 mx-auto mb-3">
						<div class="card">
							<div class="card-body">
								<div class="form-group">
									<label for="order_course_name_cn">*中文名字</label>
									<input id="order_course_name_cn" class="form-control form-control-sm" type="text" name="Order[person][1][name_cn]" required />
								</div>
								<div class="form-group">
									<label for="order_course_name">*英文名字 (IC Full Name)</label>
									<input id="order_course_name" class="form-control form-control-sm" type="text" name="Order[person][1][name]" required />
								</div>
								<div class="form-group">
									<label for="order_course_email">*電郵</label>
									<input id="order_course_email" class="form-control form-control-sm" type="email" name="Order[person][1][email]" required />
								</div>
								<div class="form-group">
									<label for="order_course_phone">*電話</label>
									<input id="order_course_phone" class="form-control form-control-sm" type="text" name="Order[person][1][phone]" required />
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer pt-0">
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					<button type="submit" class="btn btn-primary">提交</button>
				</div>
			</form>
		</div>
	</div>
</div>


