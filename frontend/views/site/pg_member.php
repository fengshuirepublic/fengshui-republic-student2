<?php

use yii\web\View;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Register | Login');

$this->registerCss('
	#member-div {
		background-image: url("images/republic/ss6.jpg");
		background-repeat: no-repeat;
		background-position: center;
		background-size: cover;
		min-height: 800px;
	}
	.member-div {
		border-radius: 5px;
		background-color: #F3F3EA;
		height: 400px;
	}
');

?>

<div id="member-div" class="container-fluid py-5">
	<div class="row">
		<div class="col-12 col-md-6">
			<div class="member-div py-3 px-4 mb-4">
				<h4 class="mb-4"><?= Yii::t('app', 'Create Free Account') ?></h4>
				<form action="<?= Url::to(['register/']) ?>" method="post" role="form">
					<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
					<div class="form-row">
						<div class="col-12">
							<div class="form-group">
								<label for="">*<?= Yii::t('app', 'Full Name') ?></label>
								<input name="Register[name]" type="text" class="form-control" placeholder="" required>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-12">
							<div class="form-group">
								<label for="">*<?= Yii::t('app', 'Email') ?></label>
								<input name="Register[email]" type="email" class="form-control" placeholder="" required>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-12">
							<div class="form-group">
								<label for="">*<?= Yii::t('app', 'Contact Number') ?></label>
								<input name="Register[contact]" type="text" class="form-control" placeholder="" required>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-12">
							<button type="submit" class="btn btn-primary"><?= Yii::t('app', 'Submit') ?></button>
						</div>
					</div>
					<div class="form-row">
						<div class="col-12">
							<?= $this->render('pg_member_resend') ?>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-12 col-md-6">
			<div class="member-div py-3 px-4 mb-4">
				<h4 class="mb-4"><?= Yii::t('app', 'Login') ?></h4>
				<form action="<?= Url::to(['login/']) ?>" method="post" role="form">
					<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
					<div class="form-row">
						<div class="col-12">
							<div class="form-group">
								<label for="">*<?= Yii::t('app', 'Email') ?></label>
								<input name="FormLogin[email]" type="email" class="form-control" placeholder="" required>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-12">
							<button type="submit" class="btn btn-primary"><?= Yii::t('app', 'Submit') ?></button>
						</div>
					</div>
					<div class="form-row">
						<div class="col-12">
							<?= $this->render('pg_member_desc') ?>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="resendModal" tabindex="-1" role="dialog" aria-labelledby="resendTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header py-2">
				<h5 class="modal-title" id="resendTitle"><?= Yii::t('app', 'Resend verification email') ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= Url::to(['resend/']) ?>" method="post" role="form">
				<div class="modal-body">
						<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
						<div class="form-row">
							<div class="col-12">
								<div class="form-group">
									<label for="">*<?= Yii::t('app', 'Email') ?></label>
									<input name="Resend[email]" type="email" class="form-control" placeholder="" required>
								</div>
							</div>
						</div>
				</div>
				<div class="modal-footer py-2">
					<button type="submit" class="btn btn-primary"><?= Yii::t('app', 'Submit') ?></button>
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>