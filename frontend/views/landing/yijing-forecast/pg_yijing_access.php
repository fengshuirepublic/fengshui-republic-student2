<?php

use frontend\assets\AppAsset;
use yii\web\View;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Yi Jing Access');

$this->registerCss('
	#yijing-div {
		background-image: url("../images/yijing-forecast/bg.jpg");
		background-repeat: no-repeat;
		background-position: top center;
		background-size: cover;
		min-height: 800px;
	}
');

?>

<div id="yijing-div" class="container-fluid py-3">
	<div class="row justify-content-center">
		<div class="col-10">
			<img src="<?= Yii::$app->urlManager->createUrl('/images/yijing-forecast/logo.png') ?>" class="img-fluid d-flex mx-auto" width="140">
			<img src="<?= Yii::$app->urlManager->createUrl('/images/yijing-forecast/title.png') ?>" class="img-fluid d-flex mx-auto py-4 pb-5" width="300">
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-12 col-sm-10">
			<form method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<div class="form-row justify-content-center mb-4">
					<div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
						<input name="Yijing[access]" type="password" class="form-control" placeholder="Access Code" required>
					</div>
				</div>
				<div class="form-row justify-content-center">
					<div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
						<button type="submit" class="btn btn-primary btn-block">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>