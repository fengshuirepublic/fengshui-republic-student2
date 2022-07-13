<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCss('
	body{
		background-image: url("'.Yii::$app->request->baseUrl.'/images/bg_login.jpg");
		background-repeat: no-repeat;
		background-position: center;
		background-size: cover;
	}
');

?>

<div class="container">
	<div class="card card-login mx-auto mt-5">
		<div class="card-header">Fengshui Republic Admin</div>
		<div class="card-body">
			<?php $form = ActiveForm::begin([
				'id' => 'login-form',
			]); ?>
				<fieldset>
					<div class="form-group">
						<?php echo $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
					</div>
					<div class="form-group">
						<?php echo $form->field($model, 'password')->passwordInput() ?>
					</div>
					<?php if ($model->hasErrors('llll')): ?>
						<div class="error-summary">
							<?php echo $model->getFirstError('llll') ?>
						</div>
					<?php endif ?>
					<?php // echo $form->field($model, 'rememberMe')->checkbox() ?>
					<?php echo Html::submitButton('Login', [
						'class' => 'btn btn-primary btn-block',
						'style'=>'background-color: #7D889A; border-color: #7D889A; color: #FFF; padding-top: 10px; padding-bottom: 10px;',
						'name' => 'login-button'
					]) ?>
				</fieldset>
			<?php ActiveForm::end(); ?>

			<!-- <form>
				<div class="form-group">
					<div class="form-label-group">
						<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
						<label for="inputEmail">Email address</label>
					</div>
				</div>
				<div class="form-group">
					<div class="form-label-group">
						<input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
						<label for="inputPassword">Password</label>
					</div>
				</div>
				<div class="form-group">
					<div class="checkbox">
						<label>
							<input type="checkbox" value="remember-me">
							Remember Password
						</label>
					</div>
				</div>
				<a class="btn btn-primary btn-block" href="index.html">Login</a>
			</form>
			<div class="text-center">
				<a class="d-block small mt-3" href="register.html">Register an Account</a>
				<a class="d-block small" href="forgot-password.html">Forgot Password?</a>
			</div> -->
		</div>
	</div>
</div>
