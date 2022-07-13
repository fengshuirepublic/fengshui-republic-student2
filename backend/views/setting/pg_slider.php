<?php

use yii\bootstrap\ActiveForm;
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;

$this->registerJsFile("@web/core/jquery-ui-1.12.1/jquery-ui.js", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->title = 'Main Page Slider';
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

	$("#addSlideModal").on("hidden.bs.modal", function () {
		$("#addSlide-form").trigger("reset");
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

				$.post("'.Url::to(['setting/slider-order']).'", {
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
			<h4 style="margin-top: 3px; margin-bottom: 5px;">Main Page Slider</h4>
		</div>
	</div>
	<hr style="border-color: #404041; margin-top: 5px;">
	<?php if ($total < 8): ?>
		<div class="row">
			<div class="col-12 mb-3">
				<button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#addSlideModal">Add Slide</button>
			</div>
		</div>
	<?php endif; ?>
</div>

<div class="container">
	<div class="row">
		<div class="col-2 d-none d-md-block">
			<ul class="list-gorup pl-0 text-right">
				<?php $count1 = 1; ?>
				<?php foreach ($slides as $slide): ?>
					<li class="list-group-item border-white px-0">slide <?= $count1 ?></li>
					<?php $count1++; ?>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="col-10">
			<ul id="sortable" class="list-group">
				<?php $count2 = 1; ?>
				<?php foreach ($slides as $slide): ?>
					<li id="item_<?= $slide->id ?>" class="list-group-item bg-light ui-state-default">
						<p class="mb-0">
							<a href="<?= Url::to(['setting/slider-delete', 'id' => $slide->id]) ?>" class="btn btn-sm btn-danger mr-1 py-0 btn-confirm-del">Delete</a>
							<a href="http://fengshui-republic.com/setting/slider/<?= $slide->file ?>-large.jpg?<?= strtotime($slide->create_date) ?>" target="_blank" class="btn btn-sm btn-primary mr-1 py-0">
								<i class="fas fa-desktop"></i>
							</a>
							<a href="http://fengshui-republic.com/setting/slider/<?= $slide->file ?>-small.jpg?<?= strtotime($slide->create_date) ?>" target="_blank" class="btn btn-sm btn-primary mr-1 py-0">
								<i class="fas fa-mobile-alt"></i>
							</a>
							<i class="fas fa-arrows-alt-v mx-3"></i>
							<?= $slide->name ?>
						</p>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>

<div id="addSlideModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">New Slide</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<?php $form = ActiveForm::begin([
				'id'     => 'addSlide-form',
				'fieldConfig' => [
					'options' => [
						'class' => 'form-group',
					]
				],
			]); ?>
				<div class="modal-body">
					<fieldset>
						<div class="row">
							<div class="col-12 col-md-6">
								<small>
									<p class="mb-0">Desktop View Image Requirement:</p>
									<p class="mb-0">&bull;&ensp;<span class="text-danger">.jpg format</span></p>
									<p class="mb-0">&bull;&ensp;<span class="text-danger">< 1 MB</span></p>
									<p class="mb-2">&bull;&ensp;<span class="text-danger">1920 px * 540 px ( 72dpi )</span></p>
								</small>
								<?php echo $form->field($addSlide, 'imgDesktop', [
									'options' => ['class' => 'form-group required']
								])->fileInput(['accept' => 'image/jpg']) ?>
							</div>
							<div class="col-12 col-md-6">
								<small>
									<p class="mb-0">Mobile View Image Requirement:</p>
									<p class="mb-0">&bull;&ensp;<span class="text-danger">.jpg format</span></p>
									<p class="mb-0">&bull;&ensp;<span class="text-danger">< 500 KB</span></p>
									<p class="mb-2">&bull;&ensp;<span class="text-danger">540 px * 810 px ( 72dpi )</span></p>
								</small>
								<?php echo $form->field($addSlide, 'imgMobile', [
									'options' => ['class' => 'form-group required']
								])->fileInput(['accept' => 'image/jpg']) ?>
							</div>
							<div class="col-12 col-md-6">
								<?php echo $form->field($addSlide, 'name')->textInput(['class' => 'form-control form-control-sm']) ?>
							</div>
							<div class="col-12 col-md-6">
								<?php echo $form->field($addSlide, 'url')->textInput(['class' => 'form-control form-control-sm']) ?>
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


