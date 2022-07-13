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

$this->registerCss('
	@font-face {
		font-family: Hiragino;
		src: url("'.Yii::$app->urlManager->createUrl('fonts/fr.otf').'") format("opentype");
	}

	body {
		font-family: Hiragino;
	}

	a[href^=tel] { color: inherit; text-decoration: none; }

	.form-captcha {
		padding: .375rem .75rem;
		font-size: .9rem;
		line-height: 1.5;
		color: #495057;
		background-color: #fff;
		background-clip: padding-box;
		border: 1px solid #ced4da;
		border-radius: .25rem;
		transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
	}
');

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
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123400549-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'UA-123400549-1');
	</script>

	<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/en/sdk.js#xfbml=1&version=v3.0';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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

<div id="section_footer">
	<div id="section_address" class="mt-3 py-5">
		<div class="container-fluid px-0">
			<div class="row mx-0">
				<div class="col-11 mx-auto">
					<div class="row">
						<div class="col-10 offset-1 col-lg-10 offset-lg-1">
							<div class="row">
								<div class="col-12 col-sm-7 col-md-8">
									<h6 class="fsrepublic-text-grey mb-3"><?= Yii::t('app', 'MALAYSIA') ?></h6>
									<div class="row">
										<div class="col-12 col-md-6">
											<h6>KL <?= Yii::t('app', 'Office') ?></h6>
											<small>99-1, Blk H, Jaya One, 72A,</small><br>
											<small>Jalan Universiti, 46200,</small><br>
											<small>Petaling Jaya, Selangor.</small><br>
											<div class="mt-3">
												<small>Tel: +603 7960 9066</small>
											</div>
											<small>Fax: +603 7960 5066</small>
										</div>
										<div id="border-address" class="col-12 col-md-6 pt-3 pt-md-0">
											<h6>JB <?= Yii::t('app', 'Office') ?></h6>
											<small>No.33-02, Jalan Molek 1/29,</small><br>
											<small>Taman Molek, 81100,</small><br>
											<small>Johor Bahru, Johor.</small><br>
											<div class="mt-3">
												<small>Tel: +607 3535 366</small>
											</div>
											<small>Fax: +607 3611 167</small>
										</div>
									</div>
								</div>
								<div class="col-12 col-sm-5 col-md-4 pt-3 pt-sm-0">
									<h6 class="fsrepublic-text-grey mb-3"><?= Yii::t('app', 'SINGAPORE') ?></h6>
									<div class="row">
										<div class="col-12">
											<h6>SG <?= Yii::t('app', 'Office') ?></h6>
											<small>9 Temasek Boulevard,</small><br>
											<small>Suntec Tower Two #09-01,</small><br>
											<small>Singapore 038989</small><br>
											<div class="mt-3">
												<small>Tel: +65 6407 1312</small>
											</div>
											<small>Fax: +65 6407 1501</small><br>
											<small>Hp: +65 9750 2761</small>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="section_award">
		<div class="container-fluid py-5 px-md-3 px-lg-5 d-none d-sm-block">
			<div class="row">
				<div class="col-4 px-0">
					<img src="<?= Yii::$app->urlManager->createUrl('/images/fr/awards-01.png') ?>" class="img-fluid d-flex mx-auto" alt="Awards">
				</div>
				<div class="col-4">
					<img src="<?= Yii::$app->urlManager->createUrl('/images/fr/awards-02.png') ?>" class="img-fluid d-flex mx-auto" alt="Awards">
				</div>
				<div class="col-4 px-0">
					<img src="<?= Yii::$app->urlManager->createUrl('/images/fr/awards-03.png') ?>" class="img-fluid d-flex mx-auto" alt="Awards">
				</div>
			</div>
		</div>
		<div class="container-fluid p-5 d-block d-sm-none">
			<div class="row">
				<div class="col-12">
					<img src="<?= Yii::$app->urlManager->createUrl('/images/fr/awards-all.png') ?>" class="img-fluid d-flex mx-auto" alt="Awards">
				</div>
			</div>
		</div>
	</div>
	<div id="section_info">
		<div class="container-fluid px-0">
			<div id="footerText-area" class="py-3 py-md-4">
				<div class="row mx-0">
					<div class="col-12" style="font-family: 'Times New Roman', Times, serif;">
						<div id="footerText-md" class="d-block d-lg-none">
							<small class="d-flex justify-content-center">
								<a class="fsrepublic-text-white" href="<?= Yii::$app->urlManager->createUrl('terms-conditions') ?>">Terms & Conditions</a>
								&nbsp;|&nbsp;
								<a class="fsrepublic-text-white" href="<?= Yii::$app->urlManager->createUrl('privacy-notice') ?>">Privacy Notice</a>
								&nbsp;|&nbsp;
								<a class="fsrepublic-text-white" href="<?= Yii::$app->urlManager->createUrl('disclaimer-clause') ?>">Disclaimer</a>
							</small>
							<small class="d-flex justify-content-center">
								&copy; 2008-<?= date('Y') ?> Fengshui Republic Sdn. Bhd.
							</small>
							<small class="d-flex justify-content-center">All rights reserved.</small>
						</div>
						<div id="footerText-lg" class="d-none d-lg-block">
							<small class="d-flex justify-content-center">
								<a class="fsrepublic-text-white" href="<?= Yii::$app->urlManager->createUrl('terms-conditions') ?>">Terms & Conditions</a>
								&nbsp;|&nbsp;
								<a class="fsrepublic-text-white" href="<?= Yii::$app->urlManager->createUrl('privacy-notice') ?>">Privacy Notice</a>
								&nbsp;|&nbsp;
								<a class="fsrepublic-text-white" href="<?= Yii::$app->urlManager->createUrl('disclaimer-clause') ?>">Disclaimer</a>
								&nbsp;|&nbsp;&copy; 2008-2018 Fengshui Republic Sdn. Bhd. All rights reserved.
							</small>
						</div>
					</div>
				</div>
				<div class="row mx-0">
					<div class="col-auto mt-2 d-flex mx-auto">
						<a class="px-2 facebook_href" href="https://www.facebook.com/FengShuiLouisLoh/" target="_blank">
							<i class="fa fa-lg fa-facebook" style="background-color: #fff; color: #000;"></i>
						</a>
						<a class="px-2 instagram_href" href="https://www.instagram.com/master_louisloh/" target="_blank">
							<i class="fa fa-lg fa-instagram" style="background-color: #fff; color: #000;"></i>
						</a>
						<a class="px-2 youtube_href" href="https://www.youtube.com/user/fsgwchannel/" target="_blank">
							<i class="fa fa-lg fa-youtube-play" style="background-color: #fff; color: #000;"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/20378211.js"></script>
<!-- End of HubSpot Embed Code -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
