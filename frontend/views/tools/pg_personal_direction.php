<?php

use yii\web\View;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Personal Direction');

$this->registerJs('
	$("#pd-'.$sex.'").prop("checked", true);
', View::POS_END);

?>

<div id="personal-direction-div" class="container-fluid py-5">
	<h2 class="text-center mb-5"><?= Yii::t('app', 'Personal Direction') ?></h2>
	<form id="eight-mansion-form" action="<?= Url::to(['personal-direction/']) ?>" method="post" role="form">
		<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
		<?= $this->render('pg_personal_direction_select', ['year' => $year, 'month' => $month, 'day' => $day]) ?>
	</form>
	<br>
	<div class="row">
		<div class="col-12">
			<p class="text-center"><?= Yii::t('app', 'Animal Sign') ?>: <?= strtoupper(Yii::t('app', $animal)) ?></p>
			<img src="images/personal-direction/personal-gua<?= $gua ? $gua : '1' ?>.jpg" class="img-fluid mx-auto d-block" alt="Personal Direction">
		</div>
	</div>
</div>