<?php

use frontend\assets\AppAsset;
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

AppAsset::register($this);

if (Yii::$app->session->hasFlash('alert')) {
	$this->registerJs('
		$("#messageModal-txt").html("'.Yii::$app->session->getFlash('alert').'");
		$("#messageModal").modal("show");
	', View::POS_END);
}

?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?= Html::csrfMetaTags() ?>

	<title><?= Yii::t('app', 'Fengshui Republic Academy and Consultation') ?> - <?= Html::encode($this->title) ?></title>
	<meta name="keywords" content="Fengshui, Fengshui Courses, Chinese Astrology, Chinese Metaphysics, Fengshui Republic, Fengshui, Fengshui schools, Fengshui consultation Singapore, destiny analysis, chinese metaphysics, Chinese Astrology, fengshui talk, Fengshui articles,  divination, BaZi, Xuan Kong, Fengshui Tips, seminar, Chinese Metaphysics Singapore, Fengshui, Malaysia, Singapore, Johor Bahru, Johor, Fengshui Courses, Fengshui Training, Fengshui Consultation, Fengshui Services, Louis Loh, Kuala Lumpur, Fengshui Academy, Master Loh" />
	<meta name="description" content="1st Fengshui company certified by ISO:9001 in Malaysia. We provide Fengshui consultation services, naming and course training in Johor Bahru, Kuala Lumpur, Malaysia and Singapore." />
	<link rel="icon" href="<?= Yii::$app->urlManager->createUrl('/images/fr/favicon.ico') ?>">

	<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header>

</header>

<div class="wrap">
	<?= $content ?>
</div>

<div class="modal" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header py-2">
				<h5 class="modal-title" id="messageTitle"><?= Yii::t('app', 'Alert') ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p id="messageModal-txt"></p>
			</div>
			<div class="modal-footer py-2">
				<button type="button" class="btn btn-primary" data-dismiss="modal"><?= Yii::t('app', 'Close') ?></button>
			</div>
		</div>
	</div>
</div>

<small class="w-100 text-center mb-0" style="position: absolute; bottom: 0;">
	<a class="text-secondary" href="http://orosoftware.com.my/" target="_blank">Oro Software</a> x <a class="text-secondary" href="https://www.tdgasia.co/" target="_blank">TDGAsia</a>
</small>
<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/20378211.js"></script>
<!-- End of HubSpot Embed Code -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
