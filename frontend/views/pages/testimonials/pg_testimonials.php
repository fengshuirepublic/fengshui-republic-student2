<?php

$this->title = Yii::t('app', 'Testimonials');

$this->registerCss('
	#testimonials {
		background-color: #F2F2F2;
	}

	.text-color {
		color: #000;
	}

	.testimonial-text {
		font-size: 0.8rem;
		line-height: 1.2;
	}
');

?>

<div id="testimonials" class="container-fluid">
	<h2 class="text-center pt-5"><?= Yii::t('app', 'Testimonials') ?></h2>
	<div class="row">
		<?php foreach ($testimonials as $key => $value): ?>
				<div class="col-12 col-md-6 col-lg-4">
					<div class="mt-4 pt-4 pb-3 testimonial-card">
						<a href="<?= Yii::$app->urlManager->createUrl('testimonial/'.$value['url']) ?>">
							<img src="images/testimonials/testimonial-<?= sprintf('%02d', $key) ?>-sm.jpg" class="img-fluid d-flex mx-auto">
							<p class="px-4 my-2 testimonial-text text-color"><b><?= $value['en_title'] ?></b></p>
							<small class="px-4 text-color">Client: <?= $value['en_name'] ?></small>
						</a>
					</div>
				</div>
		<?php endforeach; ?>
	</div>
	<br>
	<br>
</div>