<?php

use yii\web\View;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Qi Men Dun Jia');

?>

<div id="qimen-div" class="container-fluid py-5">
	<h2 class="text-center mb-5"><?= Yii::t('app', 'Qi Men Dun Jia') ?> (<?= Yii::t('app', 'Ge Ju') ?>)</h2>
	<form action="<?= Url::to(['qimen-access/']) ?>" method="post" role="form">
		<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
		<div class="form-row justify-content-center mb-4">
			<div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
				<input name="Geju[access]" type="text" class="form-control" placeholder="<?= Yii::t('app', 'Access Code') ?>" required>
			</div>
		</div>
		<div class="form-row justify-content-center">
			<div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
				<button type="submit" class="btn btn-primary btn-block"><?= Yii::t('app', 'Submit') ?></button>
			</div>
		</div>
	</form>
</div>