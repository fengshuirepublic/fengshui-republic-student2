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
			height: 30%;
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
			height: 35%;
		}
	}

	@media (min-width: 992px) and (max-width: 1199px){
		.seq .seq-model-1-1 {
			left: 10%;
			top: 180px;
		}

		.seq .seq-model-3-1 {
			left: 50px;
			height: 40%;
		}
	}

	@media (min-width: 1200px){
		.seq .seq-model-1-1 {
			left: 10%;
			top: 180px;
		}

		.seq .seq-model-3-1 {
			left: 50px;
			height: 40%;
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
					<img src="images/about-us/model-1-1-en.png" class="d-flex h-100 w-auto" alt="Fengshui Republic" />
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
					<img src="images/about-us/model-1-1-en.png" class="d-flex h-100 w-auto" alt="Fengshui Republic" />
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0 d-none d-md-block" style="background-color: #000;">
	<img src="images/about-us/main-master-1-1-en.jpg" class="img-fluid d-flex mx-auto">
</div>

<div id="about_us_intro_1">
	<div class="container py-5">
		<div class="row">
			<div class="col-11 col-lg-8 mx-auto">
				<h4 class="text-left text-md-center mb-3">THE COMPANY</h4>
				<p class="text-left text-md-center m-0 ">Fengshui Republic is founded by Master Louis Loh together with a group of skilled Fengshui practitioners. Master Loh’s life mission is to provide the most professional and authentic services to his customers, including: Residential Fengshui, Ancestral tomb Fengshui, Shengji Fengshui, Commercial Fengshui, Adult and Baby naming, Bazi reading, Wedding date selection, Delivery date selection and House moving date selection.</p>
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
				<p class="text-left text-md-center">Fengshui Republic is acclaimed for its systematic and reputable results, speedy and professional services with a focus on giving satisfactory solutions to customers as the topmost priority.</p>
				<p class="text-left text-md-center m-0">Fengshui Republic is also the first and the only Fengshui-Chinese Metaphysic company to be ISO9001-certified. Master Loh is committed to continue modernizing the traditional art of Fengshui to provide its customers with the most professional Fengshui-Chinese Metaphysic services.</p>
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
					<img class="img-fluid d-flex mx-auto" src="images/about-us/master-1-en.png" alt="Fengshui Republic">
				</div>
				<div class="d-none d-md-block">
					<img class="img-fluid d-flex ml-auto" src="images/about-us/master-1-en.png" alt="Fengshui Republic">
				</div>
			</div>
			<div id="eye_of_fengshui" class="col-11 col-md-5 mx-auto mx-md-0">
				<div class="py-5">
					<div class="d-none d-md-block">
						<br><br><br><br><br>
					</div>
					<h4 class="mb-3">ABOUT MASTER</h4>
					<p>Master Louis Loh is a third generation Malaysian Chinese of Chaozhou (Teochew) origin. Since young, he had been influenced by his uncle - also a Fengshui master, and later developed a strong interest in Chinese esoteric knowledge, Fengshui and divination</p>
					<p>Master Loh studied under many renowned Fengshui masters, including the famous Hong Kong Fengshui Master Yu Zhilin. Humble, diligent and knowledgeable, Master Loh still considers himself as Fengshui follower striving to contribute towards the development of Fengshui and traditional Chinese culture.</p>
					<p class="m-0">After completing his Business Degree, Master Loh entered the corporate world at 28 and became the leader of a multinational company. By 30, he was the regional manager of a foreign company and frequently travelled to China, Taiwan, Japan and Singapore for business matters.</p>
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
					<img src="images/about-us/signature-en.png" class="d-flex h-100 w-auto" alt="Fengshui Republic" />
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
					<img src="images/about-us/signature-en.png" class="d-flex h-100 w-auto" alt="Fengshui Republic" />
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0 d-none d-md-block" style="background-color: #000;">
	<div class="d-none d-md-block">
		<img src="images/about-us/main-master-3-1-en.jpg" class="img-fluid d-flex mx-auto">
	</div>
</div>

<div id="about_us_brand">
	<div class="container py-5">
		<div class="row">
			<div class="col-11 col-lg-8 mx-auto">
				<p class="text-md-center">Even at the peak of his career, Master Loh did not forget his passion for Fengshui. He left his high-paying job and pursued Fengshui as his life path. His professional training and Fengshui mastery carved his niche as the lead Fengshui advisor to many multinational companies. He was also instrumental in Fengshui mapping for many key development projects like Iskandar Malaysia, numerous casinos in Laos, and high-end residential developments. Today, Master Loh is of the most trusted Fengshui and Chinese Metaphysic masters in Malaysia and regionally.</p>
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
				<p class="text-center m-0">No stranger to the mainstream media, Master Loh has shared his professional Fengshui insights on countless radio and television programs and Fengshui-Chinese Metaphysic columns in Chinese and English dailies. The Fengshui Yearbook, magazines and books published by Master Loh have also become the best-sellers in many local bookstores.</p>
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
					<p>Master Loh is proficient in both English and Chinese; and can skillfully deliver talks and conduct Fengshui classes. His bilingual proficiency separates him from other monolingual Fengshui practitioners. He is one of the very few masters who have mastered both residential and tomb Fengshui, making him a much sought-after Fengshui speaker at many major corporate events.</p>
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
					<ul class="pl-3 m-0" style="list-style-type:disc">
						<li>
							With his years of experience, Master Loh has founded Fengshui Republic to provide the most professional and the best Fengshui and Chinese Metaphysic services through teamwork.
						</li>
						<li>
							Fengshui Republic is also the first and the only Fengshui-Chinese Metaphysic company to be ISO9001-certified.
						</li>
						<li>
							Master Loh has shared his Fengshui knowledge with hundreds of students from Malaysia, Singapore, Indonesia and China. Many of them have even become Fengshui masters today.
						</li>
						<li>
							Master Loh is one of the foremost Fengshui masters and will continue to deliver his priceless wisdom and knowledge to make it suitable for modern lives.
						</li>
					</ul>
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
					<ul class="pl-3 m-0" style="list-style-type:disc">
						<li>
							With his years of experience, Master Loh has founded Fengshui Republic to provide the most professional and the best Fengshui and Chinese Metaphysic services through teamwork.
						</li>
						<li>
							Fengshui Republic is also the first and the only Fengshui-Chinese Metaphysic company to be ISO9001-certified.
						</li>
						<li>
							Master Loh has shared his Fengshui knowledge with hundreds of students from Malaysia, Singapore, Indonesia and China. Many of them have even become Fengshui masters today.
						</li>
						<li>
							Master Loh is one of the foremost Fengshui masters and will continue to deliver his priceless wisdom and knowledge to make it suitable for modern lives.
						</li>
					</ul>
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
				<p class="text-center">Fengshui Republic is founded by Master Loh, all team members are selected and personally trained by Master Loh, and each of them are well-versed in Fengshui, Chinese metaphysics and Qimen Dunjia. With its combined years of experience, we can provide the best services and Fengshui-related solutions to all your issues.</p>
				<?php
				// <!--<p class="text-center">Our appointed Academy Counsel and Advisor is Professor Dato' Sri Dr. Alex Ong</p>-->

				// <!-- <p class="text-center">Fengshui Republic is founded by Master Loh and headed by Master 王德铨 and Master 陈明延, 程俊成, 黄敬善, and 苏钰凯.</p>
				// <p class="text-center">All team members are selected and personally trained by Master Loh, and each of them are well-versed in Fengshui, Chinese metaphysics and Qimen Dunjia. With its combined years of experience, we can provide the best services and Fengshui-related solutions to all your issues.</p>
				// <p class="text-center m-0">Academy Counsel and Advisor:</p>
				// <p class="text-center">Dato' Sri Dr Alex Ong</p> -->
				?>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row px-3">
			<div class="col-12 col-md-4 mx-auto px-1">
				<img src="images/about-us/en/en-team-master.png" class="img-fluid d-flex mx-auto">
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
		<!--				<img src="images/about-us/en/en-team-melvin.png" class="img-fluid">-->
		<!--			</div>-->
		<!--			<div class="col-6 px-0 pr-1 py-1">-->
		<!--				<img src="images/about-us/en/en-team-chris.png" class="img-fluid">-->
		<!--			</div>-->
		<!--		</div>-->
		<!--		<div class="row px-1">-->
		<!--			<div class="col-4 px-0">-->
		<!--				<img src="images/about-us/en/en-team-steve.png" class="img-fluid">-->
		<!--			</div>-->
		<!--			<div class="col-4 px-0">-->
		<!--				<img src="images/about-us/en/en-team-john.png" class="img-fluid">-->
		<!--			</div>-->
		<!--			<div class="col-4 px-0">-->
		<!--				<img src="images/about-us/en/en-team-jerrick.png" class="img-fluid">-->
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
		<!--				<img src="images/about-us/en/en-team-danny.png" class="img-fluid">-->
		<!--			</div>-->
		<!--			<div class="col-6 px-0 pr-1 py-1">-->
		<!--				<img src="images/about-us/en/en-team-peggy.png" class="img-fluid">-->
		<!--			</div>-->
		<!--		</div>-->
		<!--		<div class="row px-1">-->
		<!--			<div class="col-4 px-0">-->
		<!--				<img src="images/about-us/en/en-team-elsa.png" class="img-fluid">-->
		<!--			</div>-->
		<!--			<div class="col-4 px-0">-->
		<!--				<img src="images/about-us/en/en-team-jimmy.png" class="img-fluid">-->
		<!--			</div>-->
		<!--			<div class="col-4 px-0">-->
		<!--				<img src="images/about-us/en/en-team-chloe.png?20181230" class="img-fluid">-->
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


