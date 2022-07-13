<?php

$this->title = Yii::t('app', 'Testimonials').' ('.$en_name.')';

$this->registerCss('
	.text-color {
		color: #333;
	}
');

?>

<?= $this->render('pg_customer_'.$name, [
	'testimonials' => $testimonials,
	'previous'     => $previous,
	'previous_key' => $previous_key,
	'next'         => $next,
	'next_key'     => $next_key,
]) ?>

<div class="container-fluid">
	<div class="row mb-5">
		<div class="col-12 col-md-10 col-xl-8 mx-auto">
			<div class="row">
				<div class="col-6">
					<div class="row">
						<div class="col-3 col-md-1">
							<i class="fa fa-chevron-left text-color" aria-hidden="true"></i>
						</div>
						<div class="col-9 col-md-11 pl-0">
							<a href="<?= Yii::$app->urlManager->createUrl('testimonial/'.$previous) ?>">
								<div class="text-color text-nav">客户: <?= $testimonials[$previous_key]['en_name'] ?></div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="row">
						<div class="col-9 col-md-11 pr-0">
							<a class="float-right" href="<?= Yii::$app->urlManager->createUrl('testimonial/'.$next) ?>">
								<div class="text-color text-nav">客户: <?= $testimonials[$next_key]['en_name'] ?></div>
							</a>
						</div>
						<div class="col-3 col-md-1">
							<i class="fa fa-chevron-right text-color float-right pt-1" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>