<?php

use frontend\assets\AppAsset;
use yii\web\View;

$this->registerCssFile("@web/css/service/all-services.css?2019-03-03-0001", [
	'depends' => AppAsset::className(),
]);

$this->title = Yii::t('app', 'ALL SERVICES');

$this->registerJsFile("@web/stand/scrollme/jquery.scrollme.js", [
	'depends' => AppAsset::className(),
]);

$this->registerCss('
	// h1 {
	// 	font-size: 160%;
	// }

	.button-wrap {
		top: -210px;
	}

	// @media (max-width: 767px){
	// 	#service-10 .button-wrap,
	// 	#service-11 .button-wrap {
	// 		top: -250px;
	// 	}
	// }
');

$this->registerJs('
', View::POS_END);

?>

<div class="container-fluid px-0 text-center">
	<div id="title">
		<h5 class="text-center fsrepublic-text-gold py-5 m-0">服务</h5>
	</div>
	<div id="service-1" class="service-group">
		<div class="scrollme">
			<div
				class="animateme"
				data-when="enter"
				data-from="0"
				data-to="1"
				data-opacity="1"
				data-translatey="50"
				style="margin-top: -50px"
			>
				<div id="img-1" class="image-group"></div>
			</div>
		</div>
		<div class="button-wrap">
			<h1 class="fsrepublic-text-white">居家风水</h1>
			<h1 class="fsrepublic-text-white">HOUSEHOLD FENGSHUI</h1>
			<a href="<?= Yii::$app->urlManager->createUrl('services/household-fengshui') ?>" class="btn btn-white">know more</a>
		</div>
	</div>
	<div id="service-2" class="service-group">
		<div class="scrollme">
			<div
				class="animateme"
				data-when="enter"
				data-from="0"
				data-to="1"
				data-opacity="1"
				data-translatey="50"
				style="margin-top: 50px"
			>
				<div id="img-2" class="image-group"></div>
			</div>
		</div>
		<div class="button-wrap">
			<h1 class="fsrepublic-text-white">商业风水</h1>
			<h1 class="fsrepublic-text-white">COMMERCIAL FENGSHUI</h1>
			<a href="<?= Yii::$app->urlManager->createUrl('services/commercial-fengshui') ?>" class="btn btn-white">know more</a>
		</div>
	</div>
	<div id="service-3" class="service-group">
		<div class="scrollme">
			<div
				class="animateme"
				data-when="enter"
				data-from="0"
				data-to="1"
				data-opacity="1"
				data-translatey="50"
				style="margin-top: 50px"
			>
				<div id="img-3" class="image-group"></div>
			</div>
		</div>
		<div class="button-wrap">
			<h1 class="fsrepublic-text-white">物业发展</h1>
			<h1 class="fsrepublic-text-white">PROPERTY DEVELOPMENT</h1>
			<a href="<?= Yii::$app->urlManager->createUrl('services/property-development') ?>" class="btn btn-white">know more</a>
		</div>
	</div>
	<div id="service-4" class="service-group">
		<div class="scrollme">
			<div
				class="animateme"
				data-when="enter"
				data-from="0"
				data-to="1"
				data-opacity="1"
				data-translatey="50"
				style="margin-top: 50px"
			>
				<div id="img-4" class="image-group"></div>
			</div>
		</div>
		<div class="button-wrap">
			<h1 class="fsrepublic-text-white">阴宅风水</h1>
			<h1 class="fsrepublic-text-white">TOMB FENGSHUI</h1>
			<a href="<?= Yii::$app->urlManager->createUrl('services/tomb-fengshui') ?>" class="btn btn-white">know more</a>
		</div>
	</div>
	<div id="service-5" class="service-group">
		<div class="scrollme">
			<div
				class="animateme"
				data-when="enter"
				data-from="0"
				data-to="1"
				data-opacity="1"
				data-translatey="50"
				style="margin-top: 50px"
			>
				<div id="img-5" class="image-group"></div>
			</div>
		</div>
		<div class="button-wrap">
			<h1 class="fsrepublic-text-white">八字批命</h1>
			<h1 class="fsrepublic-text-white">BAZI ANALYSIS</h1>
			<a href="<?= Yii::$app->urlManager->createUrl('services/bazi-analysis') ?>" class="btn btn-white">know more</a>
		</div>
	</div>
	<div id="service-6" class="service-group">
		<div class="scrollme">
			<div
				class="animateme"
				data-when="enter"
				data-from="0"
				data-to="1"
				data-opacity="1"
				data-translatey="50"
				style="margin-top: 50px"
			>
				<div id="img-6" class="image-group"></div>
			</div>
		</div>
		<div class="button-wrap">
			<h1 class="fsrepublic-text-white">婴儿命名</h1>
			<h1 class="fsrepublic-text-white">BABY NAMING</h1>
			<a href="<?= Yii::$app->urlManager->createUrl('services/baby-naming') ?>" class="btn btn-white">know more</a>
		</div>
	</div>
	<div id="service-7" class="service-group">
		<div class="scrollme">
			<div
				class="animateme"
				data-when="enter"
				data-from="0"
				data-to="1"
				data-opacity="1"
				data-translatey="50"
				style="margin-top: 50px"
			>
				<div id="img-7" class="image-group"></div>
			</div>
		</div>
		<div class="button-wrap">
			<h1 class="fsrepublic-text-white">成人改名</h1>
			<h1 class="fsrepublic-text-white">ADULT RENAMING</h1>
			<a href="<?= Yii::$app->urlManager->createUrl('services/adult-renaming') ?>" class="btn btn-white">know more</a>
		</div>
	</div>
	<div id="service-8" class="service-group">
		<div class="scrollme">
			<div
				class="animateme"
				data-when="enter"
				data-from="0"
				data-to="1"
				data-opacity="1"
				data-translatey="50"
				style="margin-top: 50px"
			>
				<div id="img-8" class="image-group"></div>
			</div>
		</div>
		<div class="button-wrap">
			<h1 class="fsrepublic-text-white">入伙择日</h1>
			<h1 class="fsrepublic-text-white">HOUSE MOVING DATE SELECTION</h1>
			<a href="<?= Yii::$app->urlManager->createUrl('services/house-moving-date') ?>" class="btn btn-white">know more</a>
		</div>
	</div>
	<div id="service-9" class="service-group">
		<div class="scrollme">
			<div
				class="animateme"
				data-when="enter"
				data-from="0"
				data-to="1"
				data-opacity="1"
				data-translatey="50"
				style="margin-top: 50px"
			>
				<div id="img-9" class="image-group"></div>
			</div>
		</div>
		<div class="button-wrap">
			<h1 class="fsrepublic-text-white">婚嫁择日</h1>
			<h1 class="fsrepublic-text-white">WEDDING DATE SELECTION</h1>
			<a href="<?= Yii::$app->urlManager->createUrl('services/wedding-date') ?>" class="btn btn-white">know more</a>
		</div>
	</div>
	<div id="service-10" class="service-group">
		<div class="scrollme">
			<div
				class="animateme"
				data-when="enter"
				data-from="0"
				data-to="1"
				data-opacity="1"
				data-translatey="50"
				style="margin-top: 50px"
			>
				<div id="img-10" class="image-group"></div>
			</div>
		</div>
		<div class="button-wrap">
			<h1 class="fsrepublic-text-white">择日剖腹</h1>
			<h1 class="fsrepublic-text-white">CHILD BIRTH DATE SELECTION</h1>
			<a href="<?= Yii::$app->urlManager->createUrl('services/child-birth-date') ?>" class="btn btn-white">know more</a>
		</div>
	</div>
	<div id="service-11" class="service-group">
		<div class="scrollme">
			<div
				class="animateme"
				data-when="enter"
				data-from="0"
				data-to="1"
				data-opacity="1"
				data-translatey="50"
				style="margin-top: 50px"
			>
				<div id="img-11" class="image-group"></div>
			</div>
		</div>
		<div class="button-wrap">
			<h1 class="fsrepublic-text-white">产业发展布局</h1>
			<h1 class="fsrepublic-text-white">PROPERTY DEVELOPMENT TALK</h1>
			<a href="javascript:void(0)" class="btn btn-white">know more</a>
		</div>
	</div>
	<div id="service-12" class="service-group">
		<div class="scrollme">
			<div
				class="animateme"
				data-when="enter"
				data-from="0"
				data-to="1"
				data-opacity="1"
				data-translatey="50"
				style="margin-top: 50px"
			>
				<div id="img-12" class="image-group"></div>
			</div>
		</div>
		<div class="button-wrap">
			<h1 class="fsrepublic-text-white">千人风水命理讲座</h1>
			<h1 class="fsrepublic-text-white">TALKS & EVENTS</h1>
			<a href="<?= Yii::$app->urlManager->createUrl('services/talks-events') ?>" class="btn btn-white">know more</a>
		</div>
	</div>
</div>

<div id="bg-spark">
	<div class="container-fluid px-0 py-5">
		<div class="row mx-0 mb-5">
			<div class="col-12 mx-auto px-0 mb-5">
				<h5 class="text-center fsrepublic-text-white mb-5">课程</h5>
				<div class="row mx-0">
					<div class="col-6 px-0">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/fengshui') ?>">
							<img class="img-fluid w-100" src="../images/service/all-services/cn-fengshui-course.jpg" alt="Fengshui Republic">
						</a>
					</div>
					<div class="col-6 px-0">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/bazi') ?>">
							<img class="img-fluid w-100" src="../images/service/all-services/cn-bazi-course.jpg" alt="Fengshui Republic">
						</a>
					</div>
					<div class="col-6 px-0">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/qimen') ?>">
							<img class="img-fluid w-100" src="../images/service/all-services/cn-qimen-course.jpg" alt="Fengshui Republic">
						</a>
					</div>
					<div class="col-6 px-0">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/yijing') ?>">
							<img class="img-fluid w-100" src="../images/service/all-services/cn-yijing-course.jpg" alt="Fengshui Republic">
						</a>
					</div>
					<div class="col-6 px-0">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/yiyanduan') ?>">
							<img class="img-fluid w-100" src="../images/service/all-services/cn-yiyanduan-course.jpg" alt="Fengshui Republic">
						</a>
					</div>
					<div class="col-6 px-0">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/mianxiang') ?>">
							<img class="img-fluid w-100" src="../images/service/all-services/cn-mianxiang-course.jpg" alt="Fengshui Republic">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


