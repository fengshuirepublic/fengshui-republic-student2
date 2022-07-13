<?php

use yii\web\View;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Ba Zi Report');

?>

<div id="bazireport-div" class="container-fluid py-5">
	<h2 class="text-center mb-5"><?= Yii::t('app', 'Ba Zi Report') ?></h2>
	<form action="<?= Url::to(['bazireportreset/']) ?>" method="post" role="form">
		<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
		<div class="form-row justify-content-center mb-4">
			<div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
				<input name="Bazireport[username]" type="text" class="form-control" placeholder="Username" required>
			</div>
		</div>
		<div class="form-row justify-content-center mb-4">
			<div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
				<input name="Bazireport[password]" type="password" class="form-control" placeholder="Password" required>
			</div>
		</div>
		<div class="form-row justify-content-center mb-4">
			<div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
				<div class="form-row">
					<div class="col-form-label" style="width: 120px;">
						<div class="form-check form-check-inline">
							<div class="custom-control custom-radio">
								<input class="custom-control-input" type="radio" name="Bazireport[is_visible]" id="bazireport-open" value="1" required <?= $is_visible  == 1 ? 'checked' : '' ?>>
								<label class="custom-control-label" for="bazireport-open">Open</label>
							</div>
						</div>
					</div>
					<div class="col-form-label">
						<div class="form-check form-check-inline">
							<div class="custom-control custom-radio">
								<input class="custom-control-input" type="radio" name="Bazireport[is_visible]" id="bazireport-close" value="0" required <?= $is_visible  == 0 ? 'checked' : '' ?>>
								<label class="custom-control-label" for="bazireport-close">Close</label>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="form-row justify-content-center">
			<div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
				<button type="submit" class="btn btn-primary btn-block">Submit</button>
			</div>
		</div>
	</form>
</div>
