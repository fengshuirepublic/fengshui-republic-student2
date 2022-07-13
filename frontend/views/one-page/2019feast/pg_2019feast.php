<?php

use frontend\assets\AppAsset;
use yii\web\View;
use yii\helpers\Url;

$this->registerCssFile("@web/css/2019/feast.css?2019-01-01-0001", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->registerJsFile("https://unpkg.com/react@16/umd/react.production.min.js", [
	'depends' => AppAsset::className(),
	'crossorigin' => true,
]);

$this->registerJsFile("https://unpkg.com/react-dom@16/umd/react-dom.production.min.js", [
	'depends' => AppAsset::className(),
	'crossorigin' => true,
]);

$this->registerJsFile("https://unpkg.com/babel-standalone@6/babel.min.js", [
	'depends' => AppAsset::className(),
	'crossorigin' => true,
]);

$this->registerJsFile("@web/js/2019feast.js", [
	'depends' => AppAsset::className(),
	'type'    => 'text/babel',
]);

$this->title = Yii::t('app', 'Family Feast 2019');

$this->registerCss('
	html {
		overflow: scroll; -webkit-overflow-scrolling: touch;
	}

	body {
		background-color: #000;
	}

	.btn-order:not(:disabled):not(.disabled):active {
		color: #fff;
		background-color: #BA975D;
		border-color: #764C29;
	}

	.btn-order:hover {
		color: #fff;
		background-color: #BA975D;
		border: 3px solid #764C29;
	}

	.btn-order {
		background-color: #BA975D;
		border: 3px solid #764C29;
		border-radius: 15px;
		font-size: 20px;
		width: 250px;
	}

	ol li:before {
		position: absolute;
		left: 15px;
		font-size: 15px;
	}

	ol li.hotel-name:before {
		content: "地名：";
	}

	ol li.hotel-addr:before {
		content: "地址：";
	}

	ol li.hotel-time:before {
		content: "時間：";
	}

	#hyatt-hotel,
	#doubleTree-hotel {
		width: 100%;
		padding-top: 50%;
	}
');

// $this->registerJs('
// ', View::POS_END);

?>

<div class="container-fluid px-0">
	<img src="images/2019feast/main-1-lg.jpg?2019-01-01-0000" class="img-fluid d-none d-sm-block">
	<img src="images/2019feast/main-1-xs.jpg?2019-01-01-0000" class="img-fluid d-block d-sm-none">
</div>

<div id="bg-yellow" class="py-5">
	<div class="container-fluid">
		<div class="row">
			<div class="col-10 mx-auto">
				<img src="images/2019feast/logo.png" class="img-fluid d-flex mx-auto" width="180">
				<img src="images/2019feast/word.png" class="img-fluid d-flex mx-auto mt-3" width="200">
			</div>
		</div>
		<div class="row">
			<div class="col-11 col-md-9 col-lg-7 mx-auto mt-3">
				<p>2019年將迎來龍巖風水首屆家宴，對你我來說將是意義非凡的年份！</p>
				<p>一直以來，龍巖風水秉持着傳承中華文化，將正統風水命理知識發揚光大的使命，十多年來已經累計了數以千計的同門學生。</p>
				<p>龍巖家宴宗旨在於增進同門感情，無分你我的在一起討論命理玄學，甚至分享各自領域專長知識，創建一個互惠互利的優質交流平台。</p>
				<p>從今往後的每一年將舉辦龍巖家宴，希望各屆學生們都能夠常常回“家”，共進餐宴之餘也能夠繼續彼此的緣分。</p>
			</div>
		</div>
		<div class="row">
			<div id="signature" class="col-11 col-md-9 col-lg-7 mx-auto">
				<img src="images/2019feast/master-signature.png" class="d-block ml-auto" width="180">
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0">
	<img src="images/2019feast/main-2-lg.jpg" class="img-fluid d-none d-sm-block">
	<img src="images/2019feast/main-2-xs.jpg" class="img-fluid d-block d-sm-none">
</div>

<div class="container-fluid px-0">
	<img src="images/2019feast/main-3-lg.jpg?2019-01-01-0000" class="img-fluid d-none d-sm-block">
	<img src="images/2019feast/main-3-xs.jpg?2019-01-01-0000" class="img-fluid d-block d-sm-none">
</div>

<div class="container-fluid px-0">
	<img src="images/2019feast/main-4-lg.jpg" class="img-fluid d-none d-sm-block">
	<img src="images/2019feast/main-4-xs.jpg" class="img-fluid d-block d-sm-none">
</div>

<div id="bg-dining1" class="py-5 mt-3 mt-md-0">
	<div class="container-fluid">
		<div class="row">
			<div class="col-10 mx-auto">
				<h3 class="mb-0 text-center fsrepublic-text-white">JOHOR BAHRU</h3>
				<h3 class="py-3 text-center fsrepublic-text-white">龍岩家宴</h3>
				<img src="images/2019feast/logo-dtree.png" class="img-fluid d-flex mx-auto" width="400">
				<h4 class="py-3 text-center fsrepublic-text-white">Menu</h4>
				<h4 class="pb-3 text-center fsrepublic-text-white">RM 2588 / 桌</h4>
			</div>
		</div>
		<div class="row">
			<div class="col-11 col-md-9 col-lg-7 mx-auto">
				<div class="row">
					<div class="col-12 col-md-6 text-center fsrepublic-text-white">
						<h4 class="py-3">黄金冷热拼盤</h4>
						<h4 class="py-3">海鲜豆腐蟹肉羹</h4>
						<h4 class="py-3">五香烤雞</h4>
						<h4 class="py-3">特式蒸海斑</h4>
						<h4 class="py-3">四川或妈蜜焗虾</h4>
					</div>
					<div class="col-12 col-md-6 text-center fsrepublic-text-white">
						<h4 class="py-3">冬菇豆根扒双蔬</h4>
						<h4 class="py-3">黄金蛋丝炒饭</h4>
						<h4 class="py-3">龙眼莲子炖姜茶</h4>
						<h4 class="py-3">紅豆卷</h4>
						<h4 class="py-3">中國茗茶</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="bg-yellow" class="py-5">
	<div class="container-fluid">
		<div class="row">
			<div class="col-11 mx-auto text-center">
				<h4><b>JB家宴餐饮费</b></h4>
				<h4><b>RM 260/人</b></h4>
				<p>（可攜帶另一半出席，需另行付費）</p>
				<button type="button" class="btn btn-primary mb-3 btn-order fsrepublic-text-white" data-toggle="modal" data-target="#jbFeastModal">
					<b>我要出席</b>
				</button>
			</div>
		</div>
	</div>
</div>

<div id="bg-dining2" class="py-5 mt-3 mt-md-0">
	<div class="container-fluid">
		<div class="row">
			<div class="col-10 mx-auto">
				<h3 class="mb-0 text-center fsrepublic-text-white">KUALA LUMPUR</h3>
				<h3 class="py-3 text-center fsrepublic-text-white">龍岩家宴</h3>
				<img src="images/2019feast/logo-hyatt.png" class="img-fluid d-flex mx-auto" width="400">
				<h4 class="py-3 text-center fsrepublic-text-white">Menu</h4>
				<h4 class="pb-3 text-center fsrepublic-text-white">RM 2770 / 桌</h4>
			</div>
		</div>
		<div class="row">
			<div class="col-11 col-md-9 col-lg-7 mx-auto">
				<div class="row">
					<div class="col-12 col-md-6 text-center fsrepublic-text-white">
						<h4 class="py-3">錦繡拼盤</h4>
						<h4 class="py-3">蟲草花瑤柱燉雞</h4>
						<h4 class="py-3">薑蔥清蒸龍虎斑</h4>
						<h4 class="py-3">金茂炭烤琵琶鴨</h4>
						<h4 class="py-3">海鮮醬爆蝦球</h4>
					</div>
					<div class="col-12 col-md-6 text-center fsrepublic-text-white">
						<h4 class="py-3">蟹肉扒西蘭花</h4>
						<h4 class="py-3">四寶炒香苗</h4>
						<h4 class="py-3">荔茸西米露</h4>
						<h4 class="py-3">君悅甜點心</h4>
						<h4 class="py-3">中國茗茶</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="bg-yellow" class="py-5">
	<div class="container-fluid">
		<div class="row">
			<div class="col-11 mx-auto text-center">
				<h4><b>KL家宴餐饮费</b></h4>
				<h4><b>RM 280/人</b></h4>
				<p>（可攜帶另一半出席，需另行付費）</p>
				<button type="button" class="btn btn-primary mb-3 btn-order fsrepublic-text-white" data-toggle="modal" data-target="#klFeastModal">
					<b>我要出席</b>
				</button>
			</div>
		</div>
	</div>
</div>

<div id="bg-black" class="pt-3 pt-md-5 fsrepublic-text-white">
	<div class="container">
		<div class="row">
			<div class="col-11 col-md-5 offset-md-1 d-none d-md-block mb-3 mb-md-5">
				<h4>KL 龍岩家宴</h4>
				<ol class="ml-3" style="list-style-type:none">
					<li class="hotel-name">Grand Hyatt Kuala Lumpur</li>
					<li class="hotel-addr">No. 12, Jalan Pinang, Kuala Lumpur, 50450 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</li>
					<li class="hotel-time">7.00 pm</li>
				</ol>
			</div>
			<div class="col-11 col-md-5 mx-auto ml-md-0 mb-3 mb-md-5">
				<div id="hyatt-hotel"></div>
			</div>
			<div class="col-11 mx-auto d-block d-md-none mb-3 mb-md-5">
				<h4>KL 龍岩家宴</h4>
				<ol class="ml-3" style="list-style-type:none">
					<li class="hotel-name">Grand Hyatt Kuala Lumpur</li>
					<li class="hotel-addr">No. 12, Jalan Pinang, Kuala Lumpur, 50450 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</li>
					<li class="hotel-time">7.00 pm</li>
				</ol>
			</div>
		</div>
		<hr class="d-block d-md-none" style="background-color: #fff;">
		<div class="row">
			<div class="col-11 col-md-5 offset-md-1 d-none d-md-block">
				<h4>JB 龍岩家宴</h4>
				<ol class="ml-3" style="list-style-type:none">
					<li class="hotel-name">Double Tree by Hilton</li>
					<li class="hotel-addr">No. 12, Jalan Ngee Heng, Bandar Johor Bahru, 80000 Johor Bahru, Johor</li>
					<li class="hotel-time">7.00 pm</li>
				</ol>
			</div>
			<div class="col-11 col-md-5 mx-auto ml-md-0 mb-3">
				<div id="doubleTree-hotel"></div>
			</div>
			<div class="col-11 mx-auto d-block d-md-none">
				<h4>JB 龍岩家宴</h4>
				<ol class="ml-3" style="list-style-type:none">
					<li class="hotel-name">Double Tree by Hilton</li>
					<li class="hotel-addr">No. 12, Jalan Ngee Heng, Bandar Johor Bahru, 80000 Johor Bahru, Johor</li>
					<li class="hotel-time">7.00 pm</li>
				</ol>
			</div>
		</div>
		<hr class="d-block d-md-none" style="background-color: #fff;">
	</div>
</div>

<span class="metadata-marker" style="display: none;" data-region_tag="script-body"></span>
<script>
	function initMap() {
		var hyatt = {lat: 3.153685, lng: 101.712267};
		var hyatt_map = new google.maps.Map(document.getElementById('hyatt-hotel'), {zoom: 18, center: hyatt});
		var hyatt_marker = new google.maps.Marker({position: hyatt, map: hyatt_map});

		var doubleTree = {lat: 1.465324, lng: 103.760062};
		var doubleTree_map = new google.maps.Map(document.getElementById('doubleTree-hotel'), {zoom: 18, center: doubleTree});
		var doubleTree_marker = new google.maps.Marker({position: doubleTree, map: doubleTree_map});
	}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAM0CFRR-VgZgA4pY-_U4cvgHu9TnDZVKQ&callback=initMap"></script>

<div class="modal fade" id="klFeastModal" tabindex="-1" role="dialog" aria-labelledby="klFeastModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">2019 龍岩家宴 - 吉隆坡 KL</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="kl-order-form" action="<?= Url::to(['/2019feast']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Order[item_name]" value="2019 龍岩家宴 （吉隆坡 KL）" />
				<input type="hidden" name="Order[item_number]" value="2019-family-feast-kl-ticket" />

				<div class="modal-body">
					<div id="form-kl-react"></div>
				</div>
				<div class="modal-footer pt-0">
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					<button type="submit" class="btn btn-primary">提交</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="jbFeastModal" tabindex="-1" role="dialog" aria-labelledby="jbFeastModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">2019 龍岩家宴 - 柔佛 JB</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="jb-order-form" action="<?= Url::to(['/2019feast']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Order[item_name]" value="2019 龍岩家宴 （柔佛 JB）" />
				<input type="hidden" name="Order[item_number]" value="2019-family-feast-jb-ticket" />

				<div class="modal-body">
					<div id="form-jb-react"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					<button type="submit" class="btn btn-primary">提交</button>
				</div>
			</form>
		</div>
	</div>
</div>


