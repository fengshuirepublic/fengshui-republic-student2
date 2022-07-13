<?php

use yii\web\View;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Eight Mansion Fengshui');

?>

<div id="eight-mansion-div" class="container-fluid py-5">
	<h2 class="text-center mb-5"><?= Yii::t('app', 'Eight Mansion Fengshui') ?></h2>
	<form id="eight-mansion-form" action="<?= Url::to(['eight-mansion/']) ?>" method="post" role="form">
		<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
		<?= $this->render('pg_eight_mansion_select', ['facing' => $facing]) ?>
	</form>
	<br>
	<div class="row">
		<div class="col-12">
			<img src="images/eight-mansion/goa-<?= $facing ? $facing : 'east' ?>.gif" class="img-fluid mx-auto d-block" alt="Eight Mansion">
		</div>
	</div>
</div>