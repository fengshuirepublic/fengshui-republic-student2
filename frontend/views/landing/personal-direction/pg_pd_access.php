<?php

use frontend\assets\AppAsset;
use yii\web\View;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Persoanl Direction Access');

$this->registerCss('
	#personal-direction-div {
		background-image: url("../images/personal-direction/bg.jpg");
		background-repeat: no-repeat;
		background-position: top center;
		background-size: cover;
		min-height: 800px;
	}
');

?>

<div id="personal-direction-div" class="container-fluid py-3">
	<div class="row justify-content-center">
		<div class="col-10">
			<img src="<?= Yii::$app->urlManager->createUrl('/images/personal-direction/logo.png') ?>" class="img-fluid d-flex mx-auto" width="140">
			<img src="<?= Yii::$app->urlManager->createUrl('/images/personal-direction/title.png') ?>" class="img-fluid d-flex mx-auto py-4 pb-5" width="300">
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-12 col-sm-10">
			<form method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<div class="form-row justify-content-center mb-4">
					<div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
						<input name="Pd[access]" type="password" class="form-control" placeholder="Access Code" required>
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
