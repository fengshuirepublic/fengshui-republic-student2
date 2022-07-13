<?php

use frontend\assets\AppAsset;
use yii\web\View;
use yii\helpers\Url;

$this->registerCssFile("@web/stand/slick/slick-theme.css", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->registerCssFile("@web/stand/slick/slick.css", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->registerCssFile("@web/css/products.css?2020-10-01-0000", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->registerJsFile("@web/core/lodash/lodash.min.js", [
	'depends' => AppAsset::className(),
]);

$this->registerJsFile("@web/js/react.production.min.js", [
	'depends' => AppAsset::className(),
]);

$this->registerJsFile("@web/js/react-dom.production.min.js", [
	'depends' => AppAsset::className(),
]);

// $this->registerJsFile("https://unpkg.com/react@16/umd/react.production.min.js", [
// 	'depends' => AppAsset::className(),
// 	'crossorigin' => true,
// ]);

// $this->registerJsFile("https://unpkg.com/react-dom@16/umd/react-dom.production.min.js", [
// 	'depends' => AppAsset::className(),
// 	'crossorigin' => true,
// ]);

// $this->registerJsFile("https://unpkg.com/babel-standalone@6/babel.min.js", [
// 	'depends' => AppAsset::className(),
// 	'crossorigin' => true,
// ]);

$this->registerJsFile("@web/stand/slick/slick.min.js", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->registerJsFile("@web/stand/zoom/jquery.zoom.min.js", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->registerJsFile("@web/js/products.js?016", [
	'depends' => AppAsset::className(),
	// 'type'    => 'text/babel',
]);

$this->title = Yii::t('app', 'PRODUCTS');

$this->registerJs('
', View::POS_END);

$this->registerCss('
	@media (max-width: 767px){
		.price-tag,
		h6 {
			font-size: 0.8em;
		}

		h3 {
			font-size: 1.6em;
		}
	}

	.badge-danger {
		font-size: 0.6rem;
		top: 50px;
		right: 10px;
		position: absolute;
	}

	#categoryNav {
		background-color: #DED7D0;
		font-size: 0.8em;
	}

	#categoryNav a:hover {
		background-color: transparent;
		color: #000;
	}

	.section_overlay {
		background: rgba(0,0,0,0.4) url(../images/fr/overlay.png) repeat;
	}

	.col-thumb,
	.list-img {
		display: none;
	}

	.list-img img {
		width: 45px;
	}

	.price-tag:focus,
	.price-tag {
		color: #7E5D34;
		border-color: #7E5D34;
		outline: 0;
		box-shadow: none;
	}

	.btn-secondary:disabled {
		background-color: #7E5D34;
		border-color: #7E5D34;
		border-radius: 0;
	}

	.fa-share-alt {
		color: #7E5D34;
	}

	.pointer {
		cursor: pointer;
	}

	.back-to-top {
		height: 26px;
		border: none;
	}

	.fsrepublic-tools-text {
		font-size: 12px;
	}
');

?>

<div class="container-fluid px-0">
	<div class="seq">
		<div class="seq-canvas">
			<div class="seq-absolute seq-background">
				<div id="main_image_1_1" class="d-block d-md-none"></div>
				<div id="main_image_1_2" class="d-none d-md-block"></div>
				<div class="section_overlay"></div>
			</div>
			<div class="seq-absolute seq-model-1-1">
				<img src="../images/products/title-cn.png" class="d-flex mx-auto h-100 w-auto" alt="Fengshui Republic" />
			</div>
		</div>
	</div>
</div>

<nav id="categoryNav" class="navbar navbar-expand-sm px-0 py-0">
	<div class="collapse navbar-collapse" id="navbarCollapse">
		<div class="container-fluid">
			<div class="row">
				<div class="col-10 mx-auto">
					<ul class="navbar-nav nav-fill w-100">
						<li class="nav-item">
							<a class="nav-link fsrepublic-text-gold py-2" href="#water-feature">流水饰物</a>
						</li>
						<li class="nav-item">
							<a class="nav-link fsrepublic-text-gold py-2" href="#primordial-spirit">命名文昌印</a>
						</li>
						<li class="nav-item">
							<a class="nav-link fsrepublic-text-gold py-2" href="#qimen-dunjia">奇門本命財位</a>
						</li>
						<li class="nav-item">
							<a class="nav-link fsrepublic-text-gold py-2" href="#fulushou">福禄寿</a>
						</li>
						<li class="nav-item">
							<a class="nav-link fsrepublic-text-gold py-2" href="#magazine">雜誌類</a>
						</li>
						<!-- <li class="nav-item">
							<a class="nav-link fsrepublic-text-gold py-2" href="#auspicious-marriage-article">婚嫁配套</a>
						</li> -->
					</ul>
				</div>
			</div>
		</div>
	</div>
</nav>

<div class="container-fluid d-block d-sm-none" style="background-color: #DED7D0;">
	<div class="row">
		<div class="col-11 mx-auto">
			<div class="category-slide">
				<div>
					<p class="text-center my-2 mx-3">
						<a class="fsrepublic-text-gold py-2" href="#water-feature">
							<small>流水饰物</small>
						</a>
					</p>
				</div>
				<div>
					<p class="text-center my-2 mx-3">
						<a class="fsrepublic-text-gold py-2" href="#primordial-spirit">
							<small>命名文昌印</small>
						</a>
					</p>
				</div>
				<div>
					<p class="text-center my-2 mx-3">
						<a class="fsrepublic-text-gold py-2" href="#qimen-dunjia">
							<small>奇門本命財位</small>
						</a>
					</p>
				</div>
				<div>
					<p class="text-center my-2 mx-3">
						<a class="fsrepublic-text-gold py-2" href="#fulushou">
							<small>福禄寿</small>
						</a>
					</p>
				</div>
				<div>
					<p class="text-center my-2 mx-3">
						<a class="fsrepublic-text-gold py-2" href="#magazine">
							<small>雜誌類</small>
						</a>
					</p>
				</div>
				<!-- <div>
					<p class="text-center my-2 mx-3">
						<a class="fsrepublic-text-gold py-2" href="#auspicious-marriage-article">
							<small>婚嫁配套</small>
						</a>
					</p>
				</div> -->
			</div>
		</div>
	</div>
</div>

<div id="shopping-cart" language="cn" csrf="<?= Yii::$app->request->getCsrfToken() ?>"></div>

<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12 px-1 col-thumb">
							<div id="list-m1" class="list-img">
								<img class="img-thumbnail p-0 mb-1" data-img="<?= Yii::$app->urlManager->createUrl('/images/products/item/magazine/ybts2020-cn-large.jpg') ?>" src="<?= Yii::$app->urlManager->createUrl('/images/products/item/magazine/ybts2020-cn-small.jpg') ?>" alt="Fengshui Republic">
								<img class="img-thumbnail p-0 mb-1" data-img="<?= Yii::$app->urlManager->createUrl('/images/products/item/magazine/ybts2020-en-large.jpg') ?>" src="<?= Yii::$app->urlManager->createUrl('/images/products/item/magazine/ybts2020-en-small.jpg') ?>" alt="Fengshui Republic">
							</div>
							<div id="list-m2" class="list-img">
								<img class="img-thumbnail p-0 mb-1" data-img="<?= Yii::$app->urlManager->createUrl('/images/products/item/magazine/yb2020-cn-large.jpg') ?>" src="<?= Yii::$app->urlManager->createUrl('/images/products/item/magazine/yb2020-cn-small.png') ?>" alt="Fengshui Republic">
								<img class="img-thumbnail p-0 mb-1" data-img="<?= Yii::$app->urlManager->createUrl('/images/products/item/magazine/yb2020-en-large.jpg') ?>" src="<?= Yii::$app->urlManager->createUrl('/images/products/item/magazine/yb2020-en-small.png') ?>" alt="Fengshui Republic">
							</div>
							<div id="list-ps1" class="list-img">
								<img class="img-thumbnail p-0 mb-1" data-img="<?= Yii::$app->urlManager->createUrl('/images/products/item/primordial-spirit/1-1-large.jpg') ?>" src="<?= Yii::$app->urlManager->createUrl('/images/products/item/primordial-spirit/1-1-thumb.jpg') ?>" alt="Fengshui Republic">
								<img class="img-thumbnail p-0 mb-1" data-img="<?= Yii::$app->urlManager->createUrl('/images/products/item/primordial-spirit/1-2-large.jpg') ?>" src="<?= Yii::$app->urlManager->createUrl('/images/products/item/primordial-spirit/1-2-thumb.jpg') ?>" alt="Fengshui Republic">
							</div>
							<div id="list-ps2" class="list-img">
								<img class="img-thumbnail p-0 mb-1" data-img="<?= Yii::$app->urlManager->createUrl('/images/products/item/primordial-spirit/2-1-large.jpg') ?>" src="<?= Yii::$app->urlManager->createUrl('/images/products/item/primordial-spirit/2-1-thumb.jpg') ?>" alt="Fengshui Republic">
								<img class="img-thumbnail p-0 mb-1" data-img="<?= Yii::$app->urlManager->createUrl('/images/products/item/primordial-spirit/2-2-large.jpg') ?>" src="<?= Yii::$app->urlManager->createUrl('/images/products/item/primordial-spirit/2-2-thumb.jpg') ?>" alt="Fengshui Republic">
							</div>
							<div id="list-ps3" class="list-img">
								<img class="img-thumbnail p-0 mb-1" data-img="<?= Yii::$app->urlManager->createUrl('/images/products/item/primordial-spirit/3-1-large.jpg') ?>" src="<?= Yii::$app->urlManager->createUrl('/images/products/item/primordial-spirit/3-1-thumb.jpg') ?>" alt="Fengshui Republic">
								<img class="img-thumbnail p-0 mb-1" data-img="<?= Yii::$app->urlManager->createUrl('/images/products/item/primordial-spirit/3-2-large.jpg') ?>" src="<?= Yii::$app->urlManager->createUrl('/images/products/item/primordial-spirit/3-2-thumb.jpg') ?>" alt="Fengshui Republic">
								<img class="img-thumbnail p-0 mb-1" data-img="<?= Yii::$app->urlManager->createUrl('/images/products/item/primordial-spirit/3-3-large.jpg') ?>" src="<?= Yii::$app->urlManager->createUrl('/images/products/item/primordial-spirit/3-3-thumb.jpg') ?>" alt="Fengshui Republic">
							</div>
							<div id="list-ps4" class="list-img">
								<img class="img-thumbnail p-0 mb-1" data-img="<?= Yii::$app->urlManager->createUrl('/images/products/item/primordial-spirit/4-1-large.jpg') ?>" src="<?= Yii::$app->urlManager->createUrl('/images/products/item/primordial-spirit/4-1-thumb.jpg') ?>" alt="Fengshui Republic">
								<img class="img-thumbnail p-0 mb-1" data-img="<?= Yii::$app->urlManager->createUrl('/images/products/item/primordial-spirit/4-2-large.jpg') ?>" src="<?= Yii::$app->urlManager->createUrl('/images/products/item/primordial-spirit/4-2-thumb.jpg') ?>" alt="Fengshui Republic">
								<img class="img-thumbnail p-0 mb-1" data-img="<?= Yii::$app->urlManager->createUrl('/images/products/item/primordial-spirit/4-3-large.jpg') ?>" src="<?= Yii::$app->urlManager->createUrl('/images/products/item/primordial-spirit/4-3-thumb.jpg') ?>" alt="Fengshui Republic">
							</div>
							<div id="list-qm1" class="list-img">
								<img class="img-thumbnail p-0 mb-1" data-img="<?= Yii::$app->urlManager->createUrl('/images/products/item/qimen-dunjia/1-1-large.jpg') ?>" src="<?= Yii::$app->urlManager->createUrl('/images/products/item/qimen-dunjia/1-1-thumb.jpg') ?>" alt="Fengshui Republic">
								<img class="img-thumbnail p-0 mb-1" data-img="<?= Yii::$app->urlManager->createUrl('/images/products/item/qimen-dunjia/1-2-large.png') ?>" src="<?= Yii::$app->urlManager->createUrl('/images/products/item/qimen-dunjia/1-2-thumb.jpg') ?>" alt="Fengshui Republic">
								<img class="img-thumbnail p-0 mb-1" data-img="<?= Yii::$app->urlManager->createUrl('/images/products/item/qimen-dunjia/1-3-large.png') ?>" src="<?= Yii::$app->urlManager->createUrl('/images/products/item/qimen-dunjia/1-3-thumb.jpg') ?>" alt="Fengshui Republic">
								<img class="img-thumbnail p-0 mb-1" data-img="<?= Yii::$app->urlManager->createUrl('/images/products/item/qimen-dunjia/1-4-large.png') ?>" src="<?= Yii::$app->urlManager->createUrl('/images/products/item/qimen-dunjia/1-4-thumb.jpg') ?>" alt="Fengshui Republic">
								<img class="img-thumbnail p-0 mb-1" data-img="<?= Yii::$app->urlManager->createUrl('/images/products/item/qimen-dunjia/1-5-large.png') ?>" src="<?= Yii::$app->urlManager->createUrl('/images/products/item/qimen-dunjia/1-5-thumb.jpg') ?>" alt="Fengshui Republic">
								<img class="img-thumbnail p-0 mb-1" data-img="<?= Yii::$app->urlManager->createUrl('/images/products/item/qimen-dunjia/1-6-large.png') ?>" src="<?= Yii::$app->urlManager->createUrl('/images/products/item/qimen-dunjia/1-6-thumb.jpg') ?>" alt="Fengshui Republic">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 px-1">
							<img id="prompt-img" class="img-fluid">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


