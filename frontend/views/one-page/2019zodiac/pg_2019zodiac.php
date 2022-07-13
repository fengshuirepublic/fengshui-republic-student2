<?php

use yii\web\View;
use yii\helpers\Url;

$this->registerCssFile("@web/css/2019/zodiac.css?2018-12-19-0000", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->title = Yii::t('app', 'Prediction for the Twelve Animal Signs 2019');

$this->registerCss('
	.unlock-btn {
		color: #fff !important;
		border-color: #fff;
		border-radius: 8px;
		background-color: #8E8F92;
	}

	.btn-primary:hover {
		background-color: #8E8F92;
	}

	@media (max-width: 575px){
		.seq .seq-model-1-1 {
			height: 60%;
			top: 20%;
		}

		.seq .seq-model-2-1 {
			height: 70%;
			bottom: 0;
			right: 50px;
		}

		.seq .seq-model-2-2 {
			height: 25%;
			top: 100px;
			left: 65px;
		}
	}

	@media (min-width: 576px) and (max-width: 767px){
		.seq .seq-model-1-1 {
			height: 80%;
			top: 10%;
		}

		.seq-model-2-1 {
			height: 85%;
			right: 100px;
			bottom: 0;
		}

		.seq-model-2-2 {
			height: 40%;
			left: 100px;
			top: 25%;
		}
	}

	@media (min-width: 768px) and (max-width: 991px){
		.seq .seq-model-1-1 {
			height: 80%;
			top: 10%;
		}

		.seq-model-2-1 {
			height: 85%;
			right: 200px;
			bottom: 0;
		}

		.seq-model-2-2 {
			height: 50%;
			left: 100px;
			top: 15%;
		}
	}

	@media (min-width: 992px) and (max-width: 1199px){
		.seq .seq-model-1-1 {
			height: 80%;
			top: 10%;
		}

		.seq-model-2-1 {
			height: 85%;
			right: 200px;
			bottom: 0;
		}

		.seq-model-2-2 {
			height: 50%;
			left: 100px;
			top: 15%;
		}
	}

	@media (min-width: 1200px){
		.seq .seq-model-1-1 {
			height: 80%;
			top: 10%;
		}

		.seq-model-2-1 {
			height: 85%;
			right: 200px;
			bottom: 0;
		}

		.seq-model-2-2 {
			height: 50%;
			left: 100px;
			top: 15%;
		}
	}
');

$this->registerJs('
', View::POS_END);

?>

<div class="container-fluid px-0">
	<div class="seq">
		<div class="seq-canvas">
			<div class="seq-absolute seq-background">
				<div id="main_1_1"></div>
			</div>
			<div class="seq-absolute seq-model-1-1">
				<img src="images/2019zodiac/title-en.png" class="d-flex mx-auto h-100 w-auto">
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<img src="images/2019zodiac/rank-en.png" class="img-fluid d-flex mx-auto">
		</div>
	</div>
	<div class="row">
		<div class="col-12 mx-auto">
			<div class="text-center py-5">
				<?php if (Yii::$app->user->isGuest): ?>
					<a href="<?= Url::to(['member/']) ?>" class="btn btn-primary unlock-btn"><i class="fa fa-lock" aria-hidden="true"></i> <?= Yii::t('app', 'Register | Login') ?></a>
				<?php else: ?>
					<a href="<?= Url::to(['2019zodiac-file/', 'file_name' => 'zodiac-en.pdf']) ?>" class="btn btn-primary unlock-btn" target="_blank">
						<i class="fa fa-lock" aria-hidden="true"></i> <?= Yii::t('app', 'Get Now') ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0 mt-3">
	<div class="seq" style="height: 500px;">
		<div class="seq-canvas">
			<div class="seq-absolute seq-background">
				<div id="main_2_1"></div>
			</div>
			<div class="seq-absolute seq-model-2-1">
				<img src="images/2019zodiac/master.png" class="d-flex mx-auto h-100 w-auto">
			</div>
			<div class="seq-absolute seq-model-2-2">
				<img src="images/2019zodiac/work-en.png" class="d-flex mx-auto h-100 w-auto">
				<div class="text-center pt-4">
					<?php if (Yii::$app->user->isGuest): ?>
						<a href="<?= Url::to(['member/']) ?>" class="btn btn-primary unlock-btn"><i class="fa fa-lock" aria-hidden="true"></i> <?= Yii::t('app', 'Register | Login') ?></a>
					<?php else: ?>
						<a href="<?= Url::to(['2019zodiac-file/', 'file_name' => 'work-en.pdf']) ?>" class="btn btn-primary unlock-btn" target="_blank">
							<i class="fa fa-lock" aria-hidden="true"></i> <?= Yii::t('app', 'Get Now') ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="bg-spark">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 col-md-4 offset-md-2">
				<img id="fs-position" src="images/2019zodiac/liu-nian-en.png" class="img-fluid d-flex mx-auto" width="300">
				<div class="text-center py-4">
					<?php if (Yii::$app->user->isGuest): ?>
						<a href="<?= Url::to(['member/']) ?>" class="btn btn-primary unlock-btn"><i class="fa fa-lock" aria-hidden="true"></i> <?= Yii::t('app', 'Register | Login') ?></a>
					<?php else: ?>
						<a href="<?= Url::to(['2019zodiac-file/', 'file_name' => 'liu-nian-en.pdf']) ?>" class="btn btn-primary unlock-btn" target="_blank">
							<i class="fa fa-lock" aria-hidden="true"></i> <?= Yii::t('app', 'Get Now') ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-12 col-md-6">
				<img id="chart" src="images/2019zodiac/chart.png" class="img-fluid d-flex mx-auto mx-md-0" width="400">
			</div>
		</div>
	</div>
</div>

<div id="bg-red">
	<div class="container py-5">
		<div class="row">
			<div class="col-10 mx-auto">
				<img src="images/2019zodiac/fs.png" class="img-fluid d-flex mx-auto" width="400">
			</div>
		</div>
	</div>
</div>


