<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\web\View;
use backend\assets\AppAsset;

AppAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
	<title>Admin Panel - <?= Html::encode($this->title) ?></title>
	<link rel="icon" href="<?php echo Yii::$app->request->baseUrl; ?>/images/favicon.ico"/>
	<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
	<a class="navbar-brand mr-1" href="<?php echo Url::to(['site/']); ?>">Fengshui Republic</a>
</nav>

<div id="wrapper">
	<div id="content-wrapper">
		<div class="container-fluid">
			<?= Breadcrumbs::widget([
				'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			]) ?>

			<?php echo $content; ?>
		</div>
	</div>
	<small class="w-100 text-center mb-0" style="position: absolute; bottom: 0;">
		<a class="text-secondary" href="http://orosoftware.com.my/" target="_blank">Oro Software</a> x <a class="text-secondary" href="https://www.tdgasia.co/" target="_blank">TDGAsia</a>
	</small>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


