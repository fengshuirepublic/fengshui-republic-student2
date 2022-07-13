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
				<h4 class="text-left text-md-center mb-3">龙岩风水 <br class="d-block d-sm-none">THE COMPANY</h4>
				<p class="text-left text-md-center">罗一鸣是马来西亚最具影响力的风水师，拥有多年的风水命理实战经验，无论在行内或行外皆享誉盛名！</p>
				<p class="text-left text-md-center m-0">由他所领导的“罗家班”是龙岩风水的核心团队，每一位都由罗师傅亲自指导，受过最正统及最完善的风水命理培训，能够为顾客提供最专业的阳宅风水、祖坟风水、生基风水、商宅风水、婴儿命名、成人改名、八字批命、择日婚嫁、择日生产及择日入伙等一站式风水命理服务。</p>
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
				<p class="text-left text-md-center">龙岩风水也提供奇门遁甲课程、风水课程、八字课程、易经课程、面相课程等等，以深入浅出及实战教学方法，让所有对玄学充满兴趣但又一窍不通的学员得到最正统及最完善的教学。通过有系统的教学方法，至今从龙岩风水毕业的学生已经桃李满天下！</p>
				<p class="text-left text-md-center m-0">龙岩三有：“有系统、 有口碑、有名望”的特色，对于顾客所提出的疑问都能够做出正确及快速的解答，让所有将风水命理交给龙岩风水的顾客都能够安心、放心，称心！龙岩风水也提供奇门遁甲课程、风水课程、八字课程、易经课程、面相课程等等，以深入浅出及实战教学方法，让所有对玄学充满兴趣但又一窍不通的学员得到最正统及最完善的教学。通过有系统的教学方法，至今从龙岩风水毕业的学生已经桃李满天下！</p>
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
					<h4>罗一鸣师傅介绍</h4>
					<h4 class="mb-3">ABOUT MASTER</h4>
					<p>祖籍潮州的罗一鸣为马来西亚第三代华侨，从小热爱中华文化，对中华五术-山、医、命、卜、相都有浓厚的兴趣。由于受到精通各派风水命理学的大伯罗北洋熏陶，在属于风水及命理范畴的命、卜及相方面更有深入的研究。</p>
					<p>出道前，罗一鸣曾向多位风水师傅学习，更是香港当代玄学宗师、风水大师俞志麟的第一入室弟子，凭借着先天的天分及后天的努力不懈，出道至今已成为享誉国内外的风水师，谦虚的他从不以大师自居，常以一名致力推动风水命理玄学的学习者自居，希望自己能够在发扬中华文化的道路上做出贡献。</p>
					<p class="m-0">罗一鸣师傅修完商业学士学位后便进入职场工作，以28岁之龄成为国际公司的领导，30岁便成为外资企业的区域经理，常在中国、台湾、日本及新马间往返，处理公司区域之决策及业务，是公司里不可多得的青年才俊。</p>
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
				<p class="text-md-center">正当事业平步青云，但心系风水命理学的他却选择放弃高薪厚职，毅然离开公司投身风水命理界！凭借着专业的态度及深厚的风水命理根基，罗一鸣师傅成为多家跨国企业的御用风水顾问，同时也参与了诸如马来西亚伊斯干达经济特区重点发展事项、城镇花园规划及寮国赌场等大型发展项目。专业及实事求是的态度使罗师傅成为大家信任的著名风水命理学家。</p>
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
				<p class="text-center m-0">国内外主流媒体同样给予正面的肯定，各大小电台及电视台都多次邀请他担任风水节目的特别嘉宾。同时，罗师傅也是中英文报章与杂志的採访嘉宾及专栏作家。更难得的是，罗师傅所出版的新春刊物、风水书籍及风水杂志都是各大书局的热销刊物。</p>
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
					<p>出色的语言能力使到罗师傅能以华语及英语进行风水堪舆、教学与演讲，更是少数精通阳宅及阴宅风水的风水明师。特出的双语能力使罗师傅与其他一般只能以单语的风水师傅们立于不同的水平线上，加上出色的口才与渊博的风水知识，罗师傅备受许多大型活动和商业机构青睐，成为许多风水讲座的特邀嘉宾兼讲师。</p>
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
					<p class="text-left text-md-center">随着多年的实战经验，罗师傅成立了龙岩风水命理学院，通过公司团队的力量为大众提供最专业的风水及命理服务。罗师傅也成功获得国际认证ISO9001，成为全马第一间获得国际认证的风水公司！这些年来，罗师傅传授了风水知识给数百位来自马来西亚、新家坡、印尼及中国的学生，一些学生后来也成为了精通风水命理的风水顾问。</p>
					<p class="text-left text-md-center">毋庸置疑，罗一鸣师傅是风水界裡首屈一指兼拥有良好口碑的风水学家，接下来的日子罗师傅将继续将风水命理知识灵活运用并传承下去，发扬光大！</p>
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
					<p class="text-left text-md-center">随着多年的实战经验，罗师傅成立了龙岩风水命理学院，通过公司团队的力量为大众提供最专业的风水及命理服务。罗师傅也成功获得国际认证ISO9001，成为全马第一间获得国际认证的风水公司！这些年来，罗师傅传授了风水知识给数百位来自马来西亚、新家坡、印尼及中国的学生，一些学生后来也成为了精通风水命理的风水顾问。</p>
					<p class="text-left text-md-center">毋庸置疑，罗一鸣师傅是风水界裡首屈一指兼拥有良好口碑的风水学家，接下来的日子罗师傅将继续将风水命理知识灵活运用并传承下去，发扬光大！</p>
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
				<p class="text-center">罗一鸣师傅创立及领导的“罗家班”风水团队是龙岩风水命理公司的核心团队。全体成员皆经过罗一鸣师傅亲自指导并上过所有“师资班”的课程培训，精通风水、命理及奇门遁甲外也拥有多年的实战经验。专业敬业的“罗家班风水团队”绝对能解决您在风水命理上所遇到的疑难杂症，让你安心及放心。</p>
				<?php 
				// <p class="text-center">教育部顧問：Professor Dato' Sri Dr. Alex Ong</p>
				// <!-- <p class="text-center">罗一鸣师傅创立及领导的“罗家班”风水团队是龙岩风水命理公司的核心团队，成员包括王德铨师傅、陈明延师傅、程俊成风水顾问、黄敬善风水顾问及苏钰凯风水顾问。</p>
				// <p class="text-center">罗家班全体成员皆经过罗一鸣师傅亲自指导并上过所有“师资班”的课程培训，精通风水、命理及奇门遁甲外也拥有多年的实战经验。专业敬业的“罗家班风水团队”绝对能解决您在风水命理上所遇到的疑难杂症，让你安心及放心。</p>
				// <p class="text-center m-0">教育部顧問：</p>
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


