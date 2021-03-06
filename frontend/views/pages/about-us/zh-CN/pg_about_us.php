<?php

$this->registerCssFile("@web/css/about-us.css?2019-01-01-0000", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->title = Yii::t('app', 'ABOUT US');

$this->registerCss('
	@media (max-width: 575px){
		.seq .seq-model-1-1 {
			left: 8%;
			height: 9%;
		}

		.seq .seq-model-3-1 {
			left: 30px;
			height: 40%;
		}
	}

	@media (min-width: 576px) and (max-width: 767px){
		.seq .seq-model-1-1 img {
			float: right;
			margin-right: 20px;
		}

		.seq .seq-model-1-1 {
			height: 11%;
		}

		.seq .seq-model-3-1 {
			left: 30px;
			height: 50%;
		}
	}

	@media (min-width: 768px) and (max-width: 991px){
		.seq .seq-model-1-1 img {
			float: right;
			margin-right: 5%;
		}

		.seq .seq-model-1-1 {
			height: 12%;
			top: 180px;
		}

		.seq .seq-model-3-1 {
			left: 50px;
			height: 60%;
		}
	}

	@media (min-width: 992px) and (max-width: 1199px){
		.seq .seq-model-1-1 {
			left: 10%;
			top: 180px;
		}

		.seq .seq-model-3-1 {
			left: 50px;
			height: 60%;
		}
	}

	@media (min-width: 1200px){
		.seq .seq-model-1-1 {
			left: 10%;
			top: 180px;
		}

		.seq .seq-model-3-1 {
			left: 50px;
			height: 60%;
		}
	}
');

?>

<!-- <div class="about_us_image_1">
	<div class="container-fluid px-0">
		<div class="seq">
			<div class="seq-canvas">
				<div class="seq-absolute seq-background">
					<div id="main_image_1_1" class="d-block d-lg-none"></div>
					<div id="main_image_1_2" class="d-none d-lg-block"></div>
				</div>
				<div class="seq-absolute seq-model-1-1">
					<img src="images/about-us/model-1-1-cn.png" class="d-flex h-100 w-auto" alt="Fengshui Republic" />
				</div>
			</div>
		</div>
	</div>
</div> -->

<div class="about_us_image_1 d-block d-md-none">
	<div class="container-fluid px-0">
		<div class="seq">
			<div class="seq-canvas">
				<div class="seq-absolute seq-background">
					<div id="main_image_1_1" class="d-block d-md-none"></div>
				</div>
				<div class="seq-absolute seq-model-1-1">
					<img src="images/about-us/model-1-1-cn.png" class="d-flex h-100 w-auto" alt="Fengshui Republic" />
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0 d-none d-md-block" style="background-color: #000;">
	<img src="images/about-us/main-master-1-1-cn.jpg" class="img-fluid d-flex mx-auto">
</div>

<div id="about_us_intro_1">
	<div class="container py-5">
		<div class="row">
			<div class="col-11 col-lg-8 mx-auto">
				<h4 class="text-left text-md-center mb-3">???????????? <br class="d-block d-sm-none">THE COMPANY</h4>
				<p class="text-left text-md-center">??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
				<p class="text-left text-md-center m-0">?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
			</div>
		</div>
	</div>
</div>

<!-- <div id="about_us_image_2">
	<div class="container-fluid px-0">
		<div class="seq">
			<div class="seq-canvas">
				<div class="seq-absolute seq-background">
					<div id="main_image_2_1" class="d-block d-md-none"></div>
					<div id="main_image_2_2" class="d-none d-md-block"></div>
				</div>
			</div>
		</div>
	</div>
</div> -->

<div class="container-fluid px-0" style="background-color: #000;">
	<div class="d-none d-md-block">
		<img src="images/about-us/main-master-2-1-lg.jpg" class="img-fluid d-flex mx-auto">
	</div>
	<div class="d-block d-md-none">
		<img src="images/about-us/main-master-2-1-s.jpg" class="img-fluid d-flex mx-auto">
	</div>
</div>

<div id="about_us_intro_2" class="fsrepublic-gradient-brown fsrepublic-text-white">
	<div class="container py-5">
		<div class="row">
			<div class="col-11 col-lg-8 mx-auto">
				<p class="text-left text-md-center">????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
				<p class="text-left text-md-center m-0">?????????????????????????????? ???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
			</div>
		</div>
	</div>
</div>

<div id="about_us_award">
	<div class="container-fluid py-5 px-md-3 px-lg-5 d-none d-sm-block">
		<div class="row">
			<div class="col-4 px-0">
				<img src="images/about-us/awards-01.png" class="img-fluid d-flex mx-auto" alt="Fengshui Republic">
			</div>
			<div class="col-4">
				<img src="images/about-us/awards-02.png" class="img-fluid d-flex mx-auto" alt="Fengshui Republic">
			</div>
			<div class="col-4 px-0">
				<img src="images/about-us/awards-03.png" class="img-fluid d-flex mx-auto" alt="Fengshui Republic">
			</div>
		</div>
	</div>
	<div class="container-fluid p-5 d-block d-sm-none">
		<div class="row">
			<div class="col-12">
				<img src="images/about-us/awards-all.png" class="img-fluid d-flex mx-auto" alt="Fengshui Republic">
			</div>
		</div>
	</div>
</div>

<div id="about_us_master_1" class="pt-5 pb-0 pb-md-5">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6">
				<div class="d-block d-md-none">
					<img class="img-fluid d-flex mx-auto" src="images/about-us/master-1-cn.png" alt="Fengshui Republic">
				</div>
				<div class="d-none d-md-block">
					<img class="img-fluid d-flex ml-auto" src="images/about-us/master-1-cn.png" alt="Fengshui Republic">
				</div>
			</div>
			<div id="eye_of_fengshui" class="col-11 col-md-5 mx-auto mx-md-0">
				<div class="py-5">
					<div class="d-none d-md-block">
						<br><br><br><br><br>
					</div>
					<h4>?????????????????????</h4>
					<h4 class="mb-3">ABOUT MASTER</h4>
					<p>???????????????????????????????????????????????????????????????????????????????????????????????????-???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
					<p>???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
					<p class="m-0">?????????????????????????????????????????????????????????????????????28???????????????????????????????????????30??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- <div id="about_us_image_3">
	<div class="container-fluid px-0">
		<div class="seq">
			<div class="seq-canvas">
				<div class="seq-absolute seq-background">
					<div id="main_image_3_1" class="d-block d-md-none"></div>
					<div id="main_image_3_2" class="d-none d-md-block"></div>
				</div>
				<div class="seq-absolute seq-model-3-1">
					<img src="images/about-us/signature-cn.png" class="d-flex h-100 w-auto" alt="Fengshui Republic" />
				</div>
			</div>
		</div>
	</div>
</div> -->

<div id="about_us_image_3" class="d-block d-md-none">
	<div class="container-fluid px-0">
		<div class="seq">
			<div class="seq-canvas">
				<div class="seq-absolute seq-background">
					<div id="main_image_3_1" class="d-block d-md-none"></div>
				</div>
				<div class="seq-absolute seq-model-3-1">
					<img src="images/about-us/signature-cn.png" class="d-flex h-100 w-auto" alt="Fengshui Republic" />
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0 d-none d-md-block" style="background-color: #000;">
	<div class="d-none d-md-block">
		<img src="images/about-us/main-master-3-1-cn.jpg" class="img-fluid d-flex mx-auto">
	</div>
</div>

<div id="about_us_brand">
	<div class="container py-5">
		<div class="row">
			<div class="col-11 col-lg-8 mx-auto">
				<p class="text-md-center">?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<img src="images/about-us/brand-desktop.png" class="img-fluid mx-auto d-none d-md-block" alt="Fengshui Republic">
				<img src="images/about-us/brand-mobile.png" class="img-fluid mx-auto d-block d-md-none" alt="Fengshui Republic">
			</div>
		</div>
	</div>
</div>

<div id="about_us_media">
	<div class="container py-5">
		<div class="row">
			<div class="col-11 col-lg-8 mx-auto">
				<p class="text-center m-0">??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<img src="images/about-us/media-desktop.png" class="img-fluid mx-auto d-none d-md-block" alt="Fengshui Republic">
			</div>
		</div>
	</div>
</div>

<div id="about_us_master_2" class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-5 d-none d-md-block">
				<img class="img-fluid d-flex ml-auto" src="images/about-us/master-3.jpg" alt="Fengshui Republic" style="height: 300px;">
			</div>
			<div class="col-12 col-md-5 d-block d-md-none">
				<img src="images/about-us/media-mobile.png" class="img-fluid mx-auto d-block d-md-none" alt="Fengshui Republic">
			</div>
			<div class="col-11 col-md-5 mx-auto mx-md-0">
				<div class="py-3">
					<p>????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid px-0 d-block d-md-none">
		<div class="seq">
			<div class="seq-canvas">
				<div class="seq-absolute seq-background">
					<div id="master_stage"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="about_us_image_4">
	<div class="d-block d-md-none">
		<div class="container">
			<div class="row">
				<div class="col-11 col-lg-8 mx-auto pb-4">
					<p class="text-left text-md-center">?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????ISO9001???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
					<p class="text-left text-md-center">??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
				</div>
			</div>
		</div>
	</div>
	<!-- <div class="container-fluid px-0">
		<div class="seq">
			<div class="seq-canvas">
				<div class="seq-absolute seq-background">
					<div id="main_image_4_1" class="d-block d-md-none"></div>
					<div id="main_image_4_2" class="d-none d-md-block"></div>
				</div>
			</div>
		</div>
	</div> -->
	<div class="container-fluid px-0" style="background-color: #000;">
		<div class="d-none d-md-block">
			<img src="images/about-us/main-master-4-1.jpg" class="img-fluid d-flex mx-auto">
		</div>
		<div class="d-block d-md-none">
			<img src="images/about-us/main-master-4-2.jpg" class="img-fluid d-flex mx-auto">
		</div>
	</div>
	<div id="about_us_master_3" class="py-5 d-none d-md-block">
		<div class="container">
			<div class="row">
				<div class="col-11 col-lg-8 mx-auto">
					<p class="text-left text-md-center">?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????ISO9001???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
					<p class="text-left text-md-center">??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="about_us_group" class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<img src="images/about-us/group.png" class="img-fluid d-flex mx-auto" width="80">
			</div>
		</div>
		<div class="row">
			<div class="col-11 col-lg-8 mx-auto">
				<h4 class="text-center mt-3 mb-4">THE TEAM</h4>
				<p class="text-center">??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
				<?php 
				// <p class="text-center">??????????????????Professor Dato' Sri Dr. Alex Ong</p>
				// <!-- <p class="text-center">?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
				// <p class="text-center">??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
				// <p class="text-center m-0">??????????????????</p>
				// <p class="text-center">Dato' Sri Dr Alex Ong</p> -->
				?>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row px-3">
			<div class="col-12 col-md-4 mx-auto px-1">
				<img src="images/about-us/cn/cn-team-master.png" class="img-fluid d-flex mx-auto">
			</div>
		</div>
		<!--<div class="row px-3">-->
		<!--	<div class="col-12 col-md-4 offset-md-2">-->
		<!--		<div class="row">-->
		<!--			<div class="col-12 px-1">-->
		<!--				<p class="mt-3 mb-0 text-left text-md-center">MASTER & CONSULTANT</p>-->
		<!--			</div>-->
		<!--		</div>-->
		<!--		<div class="row">-->
		<!--			<div class="col-6 px-0 pl-1 py-1">-->
		<!--				<img src="images/about-us/cn/cn-team-melvin.png" class="img-fluid">-->
		<!--			</div>-->
		<!--			<div class="col-6 px-0 pr-1 py-1">-->
		<!--				<img src="images/about-us/cn/cn-team-chris.png" class="img-fluid">-->
		<!--			</div>-->
		<!--		</div>-->
		<!--		<div class="row px-1">-->
		<!--			<div class="col-4 px-0">-->
		<!--				<img src="images/about-us/cn/cn-team-steve.png" class="img-fluid">-->
		<!--			</div>-->
		<!--			<div class="col-4 px-0">-->
		<!--				<img src="images/about-us/cn/cn-team-john.png" class="img-fluid">-->
		<!--			</div>-->
		<!--			<div class="col-4 px-0">-->
		<!--				<img src="images/about-us/cn/cn-team-jerrick.png" class="img-fluid">-->
		<!--			</div>-->
		<!--		</div>-->
		<!--	</div>-->
		<!--	<div class="col-12 col-md-4">-->
		<!--		<div class="row">-->
		<!--			<div class="col-12 px-1">-->
		<!--				<p class="mt-3 mb-0 text-left text-md-center">CUSTOMER SERVICE TEAM</p>-->
		<!--			</div>-->
		<!--		</div>-->
		<!--		<div class="row">-->
		<!--			<div class="col-6 px-0 pl-1 py-1">-->
		<!--				<img src="images/about-us/cn/cn-team-danny.png" class="img-fluid">-->
		<!--			</div>-->
		<!--			<div class="col-6 px-0 pr-1 py-1">-->
		<!--				<img src="images/about-us/cn/cn-team-peggy.png" class="img-fluid">-->
		<!--			</div>-->
		<!--		</div>-->
		<!--		<div class="row px-1">-->
		<!--			<div class="col-4 px-0">-->
		<!--				<img src="images/about-us/cn/cn-team-elsa.png" class="img-fluid">-->
		<!--			</div>-->
		<!--			<div class="col-4 px-0">-->
		<!--				<img src="images/about-us/cn/cn-team-jimmy.png" class="img-fluid">-->
		<!--			</div>-->
		<!--			<div class="col-4 px-0">-->
		<!--				<img src="images/about-us/cn/cn-team-chloe.png?20181230" class="img-fluid">-->
		<!--			</div>-->
		<!--		</div>-->
		<!--	</div>-->
		<!--</div>-->
		<div class="row px-3">
			<div class="col-12 col-md-8 offset-md-2 p-1">
				<img src="images/about-us/fse.jpg" class="img-fluid">
			</div>
		</div>
	</div>
</div>


