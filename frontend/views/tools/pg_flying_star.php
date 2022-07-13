<?php

use yii\web\View;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Xuan Kong Flying Star Fengshui');

?>

<div id="flying-star-div" class="container-fluid py-5">
	<h2 class="text-center mb-5"><?= Yii::t('app', 'Xuan Kong Flying Star Fengshui') ?></h2>
	<form id="eight-mansion-form" action="<?= Url::to(['flying-star/']) ?>" method="post" role="form">
		<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
		<?= $this->render('pg_flying_star_select', ['facing' => $facing, 'period' => $period]) ?>
	</form>
	<br>
	<div class="row">
		<div class="col-12">
			<img src="images/facing-period/<?= $facing ? $facing : 'f1' ?><?= $period ? $period : 'p1' ?>.gif" class="img-fluid mx-auto d-block" alt="Xuan Kong Flying Star">
		</div>
	</div>
</div>