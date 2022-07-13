<?php

use frontend\assets\AppAsset;
use yii\web\View;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Persoanl Direction Reset');

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
						<input name="Pd[username]" type="text" class="form-control" placeholder="Username" required>
					</div>
				</div>
				<div class="form-row justify-content-center mb-4">
					<div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
						<input name="Pd[password]" type="password" class="form-control" placeholder="Password" required>
					</div>
				</div>
				<div class="form-row justify-content-center mb-4">
					<div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
						<div class="form-row">
							<div class="col-form-label" style="width: 120px;">
								<div class="form-check form-check-inline">
									<div class="custom-control custom-radio">
										<input class="custom-control-input" type="radio" name="Pd[is_visible]" id="pd-open" value="1" required <?= $is_visible  == 1 ? 'checked' : '' ?>>
										<label class="custom-control-label" for="pd-open">Open</label>
									</div>
								</div>
							</div>
							<div class="col-form-label">
								<div class="form-check form-check-inline">
									<div class="custom-control custom-radio">
										<input class="custom-control-input" type="radio" name="Pd[is_visible]" id="pd-close" value="0" required <?= $is_visible  == 0 ? 'checked' : '' ?>>
										<label class="custom-control-label" for="pd-close">Close</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-row justify-content-center mb-4">
					<div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
						<input name="Pd[access]" type="text" class="form-control" placeholder="New Access Code" required>
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
