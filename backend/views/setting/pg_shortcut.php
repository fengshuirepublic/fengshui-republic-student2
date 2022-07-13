<?php

use yii\bootstrap\ActiveForm;
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;

$this->registerJsFile("@web/core/jquery-ui-1.12.1/jquery-ui.js", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->title = 'Main Page Shortcut';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCss('
	#sortable p {
		overflow: hidden;
		text-overflow: ellipsis;
		white-space: nowrap;
	}
');

$this->registerJs('
	$("#website").addClass("active");

	$("#addShortcutModal").on("hidden.bs.modal", function () {
		$("#addShortcut-form").trigger("reset");
	})

	$(function(){
		$("#sortable").sortable();
		$("#sortable").disableSelection();

		$("#sortable").sortable({
			axis: "y",
			update: function (event, ui) {
				// var items = $(this).sortable("toArray");
				var items = $(this).sortable("serialize");
				// console.log(items);

				$.post("'.Url::to(['setting/shortcut-order']).'", {
					"_csrf-backend" : "'.Yii::$app->request->getCsrfToken().'",
					"items" : items
				}, function(result) {
					// console.log(result);
					console.log(result.error);
					if (result.error.status == 1) {
						alert("Error.");
					} else {
						alert("Rearrange done.");
					}
				});
			}
		});
	});
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
		<div class="col-12">
			<h4 style="margin-top: 3px; margin-bottom: 5px;">Main Page Shortcut</h4>
		</div>
	</div>
	<hr style="border-color: #404041; margin-top: 5px;">
	<?php if ($total < 6): ?>
		<div class="row">
			<div class="col-12 mb-3">
				<button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#addShortcutModal">Add Shortcut</button>
			</div>
		</div>
	<?php endif; ?>
</div>

<div class="container">
	<div class="row">
		<div class="col-2 d-none d-md-block">
			<ul class="list-gorup pl-0 text-right">
				<?php $count1 = 1; ?>
				<?php foreach ($shortcuts as $shortcut): ?>
					<li class="list-group-item border-white px-0">shortcut <?= $count1 ?></li>
					<?php $count1++; ?>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="col-10">
			<ul id="sortable" class="list-group">
				<?php $count2 = 1; ?>
				<?php foreach ($shortcuts as $shortcut): ?>
					<li id="item-<?= $shortcut->id ?>" data-id="<?= $shortcut->id ?>" class="list-group-item bg-light ui-state-default">
						<p class="mb-0">
							<a href="<?= Url::to(['setting/shortcut-delete', 'id' => $shortcut->id]) ?>" class="btn btn-sm btn-danger mr-1 py-0 btn-confirm-del">Delete</a>
							<a href="http://fengshui-republic.com/setting/shortcut/<?= $shortcut->file ?>.jpg?<?= strtotime($shortcut->create_date) ?>" target="_blank" class="btn btn-sm btn-primary mr-1 py-0">
								<i class="fas fa-file-image"></i>
							</a>
							<i class="fas fa-arrows-alt-v mx-3"></i>
							<?= $shortcut->name_cn ?>, <?= $shortcut->name_en ?>
						</p>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>

<div id="addShortcutModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">New Shortcut</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<?php $form = ActiveForm::begin([
				'id'     => 'addShortcut-form',
				'fieldConfig' => [
					'options' => [
						'class' => 'form-group',
					]
				],
			]); ?>
				<div class="modal-body">
					<fieldset>
						<div class="row">
							<div class="col-12">
								<small>
									<p class="mb-0">Image Requirement:</p>
									<p class="mb-0">&bull;&ensp;<span class="text-danger">.jpg format</span></p>
									<p class="mb-0">&bull;&ensp;<span class="text-danger">< 300 KB</span></p>
									<p class="mb-2">&bull;&ensp;<span class="text-danger">750 px * 435 px ( 72dpi )</span></p>
								</small>
								<?php echo $form->field($addShortcut, 'img', [
									'options' => ['class' => 'form-group required']
								])->fileInput(['accept' => 'image/jpg']) ?>
							</div>
							<div class="col-12">
								<?php echo $form->field($addShortcut, 'name_en')->textInput(['class' => 'form-control form-control-sm']) ?>
							</div>
							<div class="col-12">
								<?php echo $form->field($addShortcut, 'name_cn')->textInput(['class' => 'form-control form-control-sm']) ?>
							</div>
							<div class="col-12">
								<?php echo $form->field($addShortcut, 'url')->textInput(['class' => 'form-control form-control-sm']) ?>
							</div>
						</div>
					</fieldset>
				</div>
				<div class="modal-footer">
					<div class="container">
						<div class="row">
							<div class="col-auto ml-auto px-0">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</div>
				</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>


