<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
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

<?= $content ?>

<small class="w-100 text-center mb-0" style="position: absolute; bottom: 0;">
	<a class="text-secondary" href="http://orosoftware.com.my/" target="_blank">Oro Software</a> x <a class="text-secondary" href="https://www.tdgasia.co/" target="_blank">TDGAsia</a>
</small>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
