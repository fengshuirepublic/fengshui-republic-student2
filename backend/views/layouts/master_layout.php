<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\web\View;
use backend\assets\AppAsset;

AppAsset::register($this);

$this->registerCss('
	div.required label:after {
		content:" * ";
		color:red;
	}

	.full-screen-loading {
		position: fixed;
		z-index: 9999;
		background: rgba(255,255,255, 0.95);
		top: 0;
		width: 100%;
		height: 100%;
		overflow: hidden;
	}

	.full-screen-loading-text {
		animation: loading 2s 0s infinite both;
		font-size: 20px;
		margin-top: 25%;
	}

	@keyframes loading {
		0% {
			letter-spacing: 1px;
		}
		50% {
			letter-spacing: 12px;
		}
		100% {
			letter-spacing: 1px;
		}
	}
');

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Security-Policy" content="default-src 'self'; style-src 'self' 'unsafe-inline'; script-src 'self' 'unsafe-inline'; img-src 'self' 'unsafe-inline' data:;">
	<?= Html::csrfMetaTags() ?>
	<title>Admin Panel - <?= Html::encode($this->title) ?></title>
	<link rel="icon" href="<?php echo Yii::$app->request->baseUrl; ?>/images/favicon.ico"/>
	<?php $this->head() ?>
</head>
<body id="page-top">

<div class="full-screen-loading" style="display: none;">
	<div class="text-center full-screen-loading-text">
		LOADING ...
	</div>
</div>

<?php $this->beginBody() ?>

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
	<a class="navbar-brand mr-1" href="<?php echo Url::to(['site/']); ?>">Fengshui Republic</a>
	<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
		<i class="fas fa-bars"></i>
	</button>

	<!-- Navbar -->
	<!-- <ul class="navbar-nav d-block ml-auto">
		<li class="nav-item no-arrow">
			<a class="nav-link" href="javascript:void(0)">
				<span class="text-white"><?php echo Yii::$app->user->identity->role ?></span>
			</a>
		</li>
	</ul> -->
</nav>

<div id="wrapper">
	<!-- Sidebar -->
	<ul class="sidebar navbar-nav">
		<li id="sales" class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="salesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-fw fa-dollar-sign"></i>
				<span>Sales</span>
			</a>
			<div class="dropdown-menu" aria-labelledby="salesDropdown">
				<a class="dropdown-item" href="<?php echo Url::to(['sales/product-order']); ?>">Product Order</a>
				<a class="dropdown-item" href="<?php echo Url::to(['sales/video-pass']); ?>">Video Pass</a>
			</div>
		</li>
		<?php if (Yii::$app->user->can("level_3")): ?>
		<li id="backend" class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="backendDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-fw fa-briefcase"></i>
				<span>Backend</span>
			</a>
			<div class="dropdown-menu" aria-labelledby="backendDropdown">
				<a class="dropdown-item" href="<?php echo Url::to(['staff/list']); ?>">Staff</a>
				<a class="dropdown-item" href="<?php echo Url::to(['course/list']); ?>">Course</a>
				<a class="dropdown-item" href="<?php echo Url::to(['case/list']); ?>">Case</a>
				<a class="dropdown-item" href="<?php echo Url::to(['customer/list']); ?>">Customer</a>
				<a class="dropdown-item" href="<?php echo Url::to(['invoice/list']); ?>">Invoice</a>
			</div>
		</li>
		<?php endif; ?>
		<li id="website" class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="websiteDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-fw fa-globe"></i>
				<span>Website</span>
			</a>
			<div class="dropdown-menu" aria-labelledby="websiteDropdown">
				<a class="dropdown-item" href="<?php echo Url::to(['site/user']); ?>">Registered User</a>
				<a class="dropdown-item" href="<?php echo Url::to(['site/schedule']); ?>">Schedule</a>
				<a class="dropdown-item" href="<?php echo Url::to(['site/contact-us']); ?>">Contact Us</a>
				<a class="dropdown-item" href="<?php echo Url::to(['site/enquiry']); ?>">Enquiry</a>
				<a class="dropdown-item" href="<?php echo Url::to(['setting/slider']); ?>">Main Page Slider</a>
				<a class="dropdown-item" href="<?php echo Url::to(['setting/shortcut']); ?>">Main Page Shortcut</a>
			</div>
		</li>
		<li id="change-password" class="nav-item">
			<a class="nav-link" href="<?php echo Url::to(['site/changepass']); ?>">
				<i class="fas fa-fw fa-key"></i>
				<span>Change Password</span>
			</a>
		</li>
		<li id="logout" class="nav-item">
			<a class="nav-link" href="<?php echo Url::to(['site/logout']); ?>">
				<i class="fas fa-fw fa-sign-out-alt"></i>
				<span>Logout</span>
			</a>
		</li>
	</ul>

	<div id="content-wrapper">
		<div class="container-fluid">
			<!-- Breadcrumbs-->
			<!-- <ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="#">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">Overview</li>
			</ol> -->

			<?php echo $content; ?>
		</div>

		<!-- Sticky Footer -->
		<!-- <footer class="sticky-footer">
			<div class="container my-auto">
				<div class="copyright text-center my-auto">
					<span>Copyright © Your Website 2019</span>
				</div>
			</div>
		</footer> -->
	</div>
	<!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


