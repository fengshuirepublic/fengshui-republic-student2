<?php

use yii\bootstrap\ActiveForm;
use yii\web\View;

$this->title = 'Change Password';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs('
	$("#change-password").addClass("active");
', View::POS_END);

?>

<?php if (Yii::$app->session->hasFlash('success')): ?>
	<div class="container">
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close p-0" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			<?= Yii::$app->session->getFlash('success') ?>
		</div>
	</div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('fail')): ?>
	<div class="container">
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close p-0" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			<?= Yii::$app->session->getFlash('fail') ?>
		</div>
	</div>
<?php endif; ?>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-xs-6">
			<h4 style="margin-top: 3px; margin-bottom: 5px;">Change Password</h4>
		</div>
	</div>
	<hr style="border-color: #404041; margin-top: 5px;">
	<div class="row">
		<div class="col-md-6">
			<?php $form = ActiveForm::begin([
				'id' => 'changePass-form',
			]); ?>
				<fieldset>
					<div class="form-group">
						<?php echo $form->field($model, 'old_password')->passwordInput() ?>
					</div>
					<div class="form-group">
						<?php echo $form->field($model, 'new_password')->passwordInput() ?>
					</div>
					<div class="form-group">
						<?php echo $form->field($model, 'rep_password')->passwordInput() ?>
					</div>
					<?php if ($model->hasErrors('llll')): ?>
						<div class="error-summary">
							<?php echo $model->getFirstError('llll') ?>
						</div>
					<?php endif ?>
					<button type="submit" class="btn btn-default btn-primary">Submit</button>
				</fieldset>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>