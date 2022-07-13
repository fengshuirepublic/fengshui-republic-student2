<?php

use yii\web\View;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Qi Men Dun Jia');

$this->registerCss('
	#qimen-reset-div {
		background-image: url("images/republic/plain.jpg");
		background-repeat: no-repeat;
		background-position: center;
		background-size: cover;
		min-height: 800px;
	}
');

?>

<div id="qimen-reset-div" class="container-fluid py-5">
	<h2 class="text-center mb-5"><?= Yii::t('app', 'Reset Access Code') ?> (<?= Yii::t('app', 'Qi Men Dun Jia') ?>)</h2>
	<form action="<?= Url::to(['qimenreset/']) ?>" method="post" role="form">
		<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
		<div class="form-row justify-content-center mb-4">
			<div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
				<input name="Geju[username]" type="text" class="form-control" placeholder="Username" required>
			</div>
		</div>
		<div class="form-row justify-content-center mb-4">
			<div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
				<input name="Geju[password]" type="password" class="form-control" placeholder="Password" required>
			</div>
		</div>
		<div class="form-row justify-content-center mb-4">
			<div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
				<div class="form-row">
					<div class="col-form-label" style="width: 120px;">
						<div class="form-check form-check-inline">
							<div class="custom-control custom-radio">
								<input class="custom-control-input" type="radio" name="Geju[is_visible]" id="geju-open" value="1" required <?= $is_visible  == 1 ? 'checked' : '' ?>>
								<label class="custom-control-label" for="geju-open">Open</label>
							</div>
						</div>
					</div>
					<div class="col-form-label">
						<div class="form-check form-check-inline">
							<div class="custom-control custom-radio">
								<input class="custom-control-input" type="radio" name="Geju[is_visible]" id="geju-close" value="0" required <?= $is_visible  == 0 ? 'checked' : '' ?>>
								<label class="custom-control-label" for="geju-close">Close</label>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<div class="form-row justify-content-center mb-4">
			<div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
				<input name="Geju[access]" type="text" class="form-control" placeholder="New Access Code" required>
			</div>
		</div>
		<div class="form-row justify-content-center">
			<div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
				<button type="submit" class="btn btn-primary btn-block">Submit</button>
			</div>
		</div>
	</form>
</div>