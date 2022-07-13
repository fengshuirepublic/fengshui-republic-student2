<?php

use yii\web\View;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'CHECKOUT');

$this->registerCss('
	.payment-btn {
		border: none;
		background: transparent;
	}

	.btn-kiple {
		font-weight: 900;
		font-size: 14px;
		color: #F8F8F8;
		background-color: #009EDE;
	}
');

$this->registerJs('
	function numberWithCommas(x) {
		x = parseFloat(x).toFixed(2);
		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}

	$(function() {
		var postageFeeList = {
			"singapore" : '.$postage_sg.',
			"east_msia" : '.$postage_eastm.',
			"west_msia" : '.$postage_westm.',
		};

		var data = $("#postageType").data();
		if (data) {
			var postageFee = postageFeeList["singapore"];
		} else {
			var postageFee = 0;
		}
		var subtotal    = parseFloat($("#subtotal").html().replace(/,/g, ""));
		var grand_total = postageFee+subtotal;

		$("#postageFee").html(numberWithCommas(postageFee));
		$("#grand_total").html(numberWithCommas(grand_total));

		$("#postageType").change(function() {
			if (data) {
				postageFee = postageFeeList[$(this).val()];
			} else {
				postageFee = 0;
			}
			$("#postageFee").html(numberWithCommas(postageFee));

			grand_total = postageFee+subtotal;
			$("#grand_total").html(numberWithCommas(grand_total));
		});
	});
', View::POS_END);

$this->registerJs('
	$(function() {
		$("#postageFee-info").popover({
			html: true,
			trigger: "focus",
			placement: "top",
			content: "Postage Fee<ul class=\"pl-3\"><li>West Malaysia: RM 8.00</li><li>East Malaysia: RM 18.00</li><li>Singapore: RM 38.00</li></ul>",
		});
	});
', View::POS_END);

?>

<div class="container-fluid pb-2 pb-md-0" style="background-color: #000;">
	<div class="row">
		<div class="col-auto d-block d-md-none mx-auto mt-1 px-0">
			<a href="<?= Yii::$app->urlManager->createUrl('/') ?>">
				<img id="brand-logo" src="<?= Yii::$app->urlManager->createUrl('/images/fr/logo-white.png') ?>" alt="Fengshui Republic">
			</a>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row py-0 py-md-3">
		<div class="col-auto d-none d-md-block mx-auto">
			<a href="<?= Yii::$app->urlManager->createUrl('/') ?>">
				<img id="brand-logo" src="<?= Yii::$app->urlManager->createUrl('/images/fr/logo.png') ?>" alt="Fengshui Republic">
			</a>
		</div>
	</div>
</div>
<div class="container-fluid pb-5">
	<div class="row">
		<div class="col-12 col-md-10 mx-auto">
			<h5 class="text-center pt-5 mb-0"><?= Yii::t('app', 'Checkout'); ?></h5>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-md-10 mx-auto">
			<img src="../images/fr/line.png" class="img-fluid w-100">
		</div>
	</div>
	<form action="<?= Url::to(['products/place-order']) ?>" method="post" role="form">
		<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
		<input type="hidden" name="FormOrderProduct[form_code]" value="<?= $new_order->form_code ?>">
		<div class="row">
			<div class="col-12 col-md-10 mx-auto">
				<?php $is_magazine  = false; ?>
				<?php $qty_magazine = 0; ?>
				<?php $subtotal     = 0; ?>
				<?php foreach ($new_order->items as $item): ?>
					<?php $subtotal += $item->price ?>
					<?php if (in_array($item->product_code, $magazine_list)): ?>
						<?php $is_magazine   = true; ?>
						<?php $qty_magazine += $item->quantity; ?>
					<?php endif; ?>
					<p class="mb-0"><?= $cnProducts[$item->product_code] ?></p>
					<p><?= $enProducts[$item->product_code] ?></p>
					<p>
						<span><?= $item->quantity ?></span>
						<span class="pull-right">RM <span><?= number_format($item->price, 2) ?></span></span>
					</p>
					<hr>
				<?php endforeach; ?>
				<p class="text-right">Subtotal: RM <span id="subtotal"><?= number_format($subtotal, 2) ?></span></p>
				<?php if ($is_magazine == true): ?>
					<div class="row d-flex justify-content-end">
						<div class="col-12 col-md-auto">
							<div class="row">
								<div class="col-12 col-md-auto">
									<p class="my-2 text-right text-md-left">
										<i id="postageFee-info" class="fa fa-lg fa-info-circle mr-2" tabindex="0" data-toggle="popover"></i>Postage Fee
									</p>
								</div>
								<div class="col-12 col-md-auto">
									<select class="form-control" id="postageType" name="FormOrderProduct[postage_area]" data-quantity="<?= $qty_magazine ?>">
										<option value="singapore">Singapore</option>
										<option value="east_msia">East Malaysia</option>
										<option value="west_msia">West Malaysia</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-auto">
							<p class="my-2 text-right">Total Postage Fee: RM <span id="postageFee"></span></p>
						</div>
					</div>
				<?php endif; ?>
				<hr>
				<p class="text-right">Grand Total: RM <span id="grand_total"></span></p>
				<hr class="mb-5">
				<div class="form-row">
					<div class="col-12 col-md-6 col-lg-3">
						<div class="form-group">
							<label for="checkout-collect_at">*Collect at</label>
							<select class="form-control" id="checkout-collect_at" name="FormOrderProduct[collect_at]" required>
								<option value="kl">Kuala Lumpur Office</option>
								<option value="jb">Johor Bahru Office</option>
							</select>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-3">
						<div class="form-group">
							<label for="checkout-name">*Name</label>
							<input id="checkout-name" name="FormOrderProduct[name]" type="text" class="form-control" required>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-3">
						<div class="form-group">
							<label for="checkout-email">*Email</label>
							<input id="checkout-email" name="FormOrderProduct[email]" type="email" class="form-control" required>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-3">
						<div class="form-group">
							<label for="checkout-phone">*Phone</label>
							<input id="checkout-phone" name="FormOrderProduct[phone]" type="text" class="form-control" required>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-12 col-md-6 col-lg-4">
						<div class="form-group">
							<label for="checkout-address_1">*Address 1</label>
							<input id="checkout-address_1" name="FormOrderProduct[address_1]" type="text" class="form-control" placeholder="Street Address" required>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4">
						<div class="form-group">
							<label for="checkout-address_2">*Address 2</label>
							<input id="checkout-address_2" name="FormOrderProduct[address_2]" type="text" class="form-control" placeholder="City/State/Zip" required>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4">
						<div class="form-group">
							<label for="checkout-address_3">Address 3</label>
							<input id="checkout-address_3" name="FormOrderProduct[address_3]" type="text" class="form-control" placeholder="Country">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<p>*All the items must collect in our office, EXCEPT the books will be delivery by courier services.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<button type="submit" class="btn btn-default btn-kiple pull-right payment-btn" name="FormOrderProduct[payment_type]" value="kiple">
							Buy now with Kiple
						</button>
						<a href="<?php echo Url::to(['products/list', 'order' => 'cancel']) ?>" class="btn btn-default pull-right mr-2">Cancel</a>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>


