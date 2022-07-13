<?php

use yii\web\View;
use yii\helpers\Url;

$this->registerCssFile("@web/css/course/yiyanduan.css?2019-03-03-0000", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->title = Yii::t('app', 'YI YAN DUAN');

$this->registerCss('
	#seq-main {
		height: 1300px;
	}

	.table-bordered td {
		border: 1px solid #7a6142;
		vertical-align: middle;
	}

	.table-bordered tr td:first-child {
		width: 50%;
	}

	td:nth-child(2) {
		width: 25%;
	}

	td:nth-child(3) {
		width: 25%;
	}

	@media (max-width: 575px){
		#seq-main {
			height: 1400px;
		}

		#main_yiyanduan_1_1 {
			height: 1400px;
		}

		.seq .seq-model-video {
			width: 100%;
			height: 12%;
			left: 0%;
		}

		#logo-img {
			width: 70%;
		}

		.seq-model-yiyandan {
			height: 32%;
		}

		.seq .seq-model-1-1 {
			width: 74%;
			left: 13%;
			top: 490px;
		}
	}

	@media (min-width: 576px) and (max-width: 767px){
		#seq-main {
			height: 1400px;
		}

		#main_yiyanduan_1_1 {
			height: 1400px;
		}

		.seq .seq-model-video {
			width: 70%;
			height: 16%;
			left: 15%;
		}

		#logo-img {
			width: 45%;
		}

		.seq .seq-model-1-1 {
			width: 70%;
			left: 15%;
			top: 550px;
		}
	}

	@media (min-width: 768px) and (max-width: 991px){
		.seq .seq-model-video {
			width: 70%;
			left: 15%;
			height: 18%;
		}

		.seq-model-logo {
			width: 100%;
			right: 200px;
			height: 21%;
			top: 500px;
		}

		.seq .seq-model-1-1 {
			width: 50%;
			left: 45%;
			top: 540px;
		}
	}

	@media (min-width: 992px) and (max-width: 1199px){
		.seq .seq-model-video {
			width: 60%;
			left: 20%;
			height: 18%;
		}

		.seq-model-logo {
			width: 100%;
			right: 200px;
			height: 21%;
			top: 520px;
		}

		.seq .seq-model-1-1 {
			width: 40%;
			left: 45%;
			top: 550px;
		}
	}

	@media (min-width: 1200px){
		#seq-gif,
		#main_gif_1_2 {
			padding-top: 30%;
		}

		.seq-model-logo {
			width: 100%;
			right: 290px;
			height: 20%;
			top: 540px;
		}

		.seq-model-video {
			height: 21%;
		}

		.seq .seq-model-1-1 {
			width: 40%;
			left: 40%;
			top: 570px;
		}
	}

	@media (min-width: 1500px){
		.seq .seq-model-video {
			width: 70%;
			left: 15%;
			height: 21%;
		}
	}
');

$this->registerJs('
	$("#enquiry_area").change(function() {
		var value = $(this).val();
		if(value=="Others") {
			$("#other-area-textarea").append("<textarea name=\"Enquiry[info][areaOther]\" class=\"form-control form-control-sm mt-2 other-textarea\" required></textarea>");
		} else {
			$("#other-area-textarea").empty();
		}
	});
', View::POS_END);

?>

<div class="fsrepublic-gradient-brown">
	<div class="container py-3">
		<div class="row">
			<div class="col-10 mx-auto">
				<h5 class="m-0 text-center fsrepublic-text-white">形家一眼断课程 <br class="d-block d-md-none">YI YAN DUAN COURSE</h5>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0">
	<div id="seq-gif" class="seq">
		<div class="seq-canvas">
			<div class="seq-absolute seq-background">
				<div id="main_gif_1_1" class="d-block d-md-none"></div>
				<div id="main_gif_1_2" class="d-none d-md-block"></div>
			</div>
		</div>
	</div>
</div>

<div class="bg-brown">
	<div class="container py-3">
		<div class="row">
			<div class="col-10 col-lg-9 mx-auto">
				<p class="m-0 text-center fsrepublic-text-white">风水《形家一眼断》是集合了香港《形峦一眼断》及台湾《形家长眼法》的峦头风水学。此风水学问在论断家宅吉凶事项时，如有神助般奇准无比、料事如神，让人叹为观止。</p>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0">
	<div id="seq-main" class="seq">
		<div class="seq-canvas">
			<div class="seq-absolute seq-background">
				<div id="main_yiyanduan_1_1"></div>
			</div>
			<div class="seq-absolute seq-model-yiyanduan">
				<img src="../images/course/course-yiyanduan/yiyanduan.png" class="d-flex mx-auto h-100 w-auto">
			</div>
			<div class="seq-absolute seq-model-video">
				<img src="../images/course/course-yiyanduan/video.jpg" class="d-flex mx-auto h-100 w-auto" data-toggle="modal" data-target="#videoModal" style="cursor: pointer">
			</div>
			<div class="seq-absolute seq-model-logo d-none d-md-block">
				<img src="../images/course/logo-course-cn.png" class="d-flex mx-auto h-100 w-auto">
			</div>
			<div class="seq-absolute seq-model-1-1">
				<p class="text-center text-md-left fsrepublic-text-white">我们也是全马唯一一家荣获ISO9001认证，全马唯一一家精通与传授理气、形峦所有学派的风水学院。完善的教学能够让普罗大众对这门博大精深的学问有更深入的了解，让你一眼定吉凶，既能助己助人也能够防止受骗，一举多得！</p>
				<div class="d-block d-md-none">
					<img id="logo-img" src="../images/course/logo-course-cn.png" class="d-flex mx-auto">
				</div>
				<div id="yiyanduan-btn" class="text-center">
					<button type="button" class="btn btn-primary d-flex mx-auto ml-md-0" data-toggle="modal" data-target="#scheduleModal">课程时间表</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="bg-light">
	<div class="container pt-5 pb-0">
		<div class="row">
			<div class="col-10 col-lg-7 mx-auto">
				<h5 class="fsrepublic-text-gold">《形峦一眼断》</h5>
				<div class="row">
					<div class="col-12 col-md-6">
						<p>10年前罗师傅到香港拜访朋友时，从朋友口中得知在下洋村的文昌庙里，有个庙祝被人命名为“跛脚仙”。此人行踪漂浮，当在帮人堪舆风水时从不用罗盘，而且在一拐一拐的路上，一眼便能神准的断论其家宅所有人的吉凶事项和发生时间，非常不可思议。总总神奇事迹让人传说他被神仙附身，甚至有天兵鬼将在帮他看风水！</p>
					</div>
					<div class="col-12 col-md-6">
						<p>于是罗师傅便开启了追寻奇人“跛脚仙”的旅程，在向附近的村民打听下得知“跛脚仙”不是每天都在庙里，有时一个月也只见过他一面。所以当年罗师傅并花了两年的时间都未见到“跛脚仙”。黄天不负有心人，直到八年前的春天终于让他找到了奇人“跛脚仙”。两人一见如故、交谈中意气相投，于是便向他求教关于风水的学问，却被他拒绝传授风水学问。“跛脚仙”回答说，根据门规他曾向白鹤老人发誓，必须保密五年后才能再传后人。罗师傅得知后也不再为难，只好询问了“跛脚仙”的联络方式，以便日后再拜访。往后的数年里，每当罗师傅前往香港都会上门拜访“跛脚仙”。</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0">
	<div id="bg-house">
	</div>
</div>

<div class="fsrepublic-gradient-brown">
	<div class="container py-5">
		<div class="row">
			<div class="col-10 col-lg-7 mx-auto">
				<p class="m-0 text-center fsrepublic-text-white">2013年的秋天，罗师傅再次登门拜访时“跛脚仙”却自行说出有意要传授罗师傅《形峦一眼断》心法秘诀，也说到其实五年的限期早已过去多年，只是白鹤老人在临终前有交代过此心法绝对不可传给心术不正之人，此后罗师傅便成为了“跛脚仙”的唯一弟子。</p>
			</div>
		</div>
	</div>
</div>

<div class="container pt-5 pb-0">
	<div class="row">
		<div class="col-10 col-lg-7 mx-auto">
			<h5 class="fsrepublic-text-gold">《形家长眼法》</h5>
			<div class="row">
				<div class="col-12 col-md-6">
					<p>台湾解放时期，有一大陆和尚在台湾为渡江而寻找船只，此时有一位抓泥鳅为生的渔夫过来协助和尚渡过大江。随后和尚为了答谢渔夫便将一套名为《形家长眼法》的风水学问传授了给渔夫。往后渔夫所到之处都会为当地人堪舆风水，奇怪的是他并不需要罗盘，只要观其屋子与坟墓形象便能断定该宅的吉凶和对应的家庭成员，从此大家便为他起了个名叫“泥鳅仙”。</p>
					<p>而这位《泥鳅仙》便是后人认识的风水大师--郑清风，他也只拥有十多位的传人。</p>
				</div>
				<div class="col-12 col-md-6">
					<p>由于《形家长眼法》的堪舆技巧与《形峦一眼断》非常的相似，都是属于风水学上的《峦头派》。罗师傅在一次考察台湾名人祖坟时，在机缘巧合之下结识了其中一位较低调的传人，也向他拜师学习了《形家长眼法》。</p>
					<p>经过多年的实战经验和整合，罗师傅将两派的心法与秘诀所长融会贯通，整合成为《形家一眼断》。《形家一眼断》的风水学问不止能够准确论断家宅的吉凶，还能助人逢凶化吉。此外，罗师傅更是通过多年的经验打造了一套《送财布局法》。</p>
					<p>五年后的今天正是《形峦一眼断》门规圆满之时，罗师傅也建立了自己的使命，希望把这全套的形峦风水学传授于世，通过教学的方式传给炎黄子孙，希望为大家创造更多的《财富》远离穷困，打造一个富裕华人的天下。</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0">
	<div id="bg-mountain">
	</div>
</div>

<div class="container py-5">
	<div class="row">
		<div class="col-12 mx-auto">
			<div class="row">
				<div class="col-10 col-md-5 mx-auto">
					<h5 class="fsrepublic-text-gold">风水一眼断</h5>
					<ul class="pl-3 mb-0" style="list-style-type:disc">
						<li>
							一门让你一学就会，一会就用，一用就准的风水学派。
						</li>
						<li>
							让你拥有风水眼，一眼便知该宅是富宅还是凶宅。
						</li>
						<li>
							教会你避开所有凶恶的格局。
						</li>
						<li>
							教会你布下快速发富的格局。
						</li>
						<li>
							教会你建立夫妻和谐的格局。
						</li>
						<li>
							教会你布下健康幸福的格局。
						</li>
						<li>
							教会你布下孩子考满份的格局。
						</li>
						<li>
							教会你布下员工进取的格局。
						</li>
						<li>
							教会你布下贵人满天下的格局。
						</li>
						<li>
							教会你布下销售成绩提升的格局。
						</li>
						<li>
							教会你布下员工都忠诚的格局。
						</li>
						<li>
							教会你事业发展更迅速的格局。
						</li>
					</ul>
					<button type="button" class="btn btn-primary d-flex mx-auto ml-md-0 mt-4" data-toggle="modal" data-target="#enquiryModal">了解更多</button>
				</div>
				<div class="col-12 col-md-6 col-lg-5 col-xl-4">
					<img id="beast" src="../images/course/course-yiyanduan/beast.png" class="img-fluid w-100">
				</div>
			</div>
		</div>
	</div>
</div>

<div id="bg-black">
	<div class="container py-5">
		<div class="row">
			<div class="col-10 mx-auto">
				<div class="row">
					<div class="col-12 col-md-6 px-0">
						<img src="../images/course/course-yiyanduan/word-cn.png" class="img-fluid d-flex ml-md-auto mx-auto" width="300">
					</div>
					<div class="col-12 col-md-6 mt-4">
						<h5>事宜上风水一眼断的人群:</h5>
						<ol class="pl-3 mb-0">
							<li>
								想要身体更加健康，精力充沛的人
							</li>
							<li>
								想要提升财运，增加财富的人
							</li>
							<li>
								想要改变家庭关系，拥有和谐幸福家庭的人
							</li>
							<li>
								想要改变夫妻关系，拥有甜蜜幸福生活的人
							</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="may-like">
	<div class="container py-5">
		<p class="text-center fsrepublic-text-white">您可能也会喜欢</p>
		<div class="row">
			<div class="col-12 col-md-10 mx-auto">
				<div class="row">
					<div class="col-12 col-sm-6 px-0 px-sm-3 mx-auto text-center">
						<img src="../images/course/all-courses/course-cn-5.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/fengshui') ?>" class="btn btn-primary mt-3 mb-5">了解更多</a>
					</div>
					<div class="col-12 col-sm-6 px-0 px-sm-3 mx-auto text-center">
						<img src="../images/course/all-courses/course-cn-4.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/yijing') ?>" class="btn btn-primary mt-3 mb-5">了解更多</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div id="yt-video" class="d-flex justify-content-center">
					<iframe class="embed-responsive embed-responsive-1by1" width="560" height="315" src="https://www.youtube.com/embed/DdxMZhx8le8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="scheduleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">一眼断课程时间表 <?= date('Y') ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h5>吉隆坡</h5>
				<table class="table table-bordered table-sm text-center" style="background-color: #EFECE8;">
					<tbody>
						<?php foreach ($groups as $group): ?>
							<?php if ($group->location == 'KL'): ?>
								<?php $rep = 1; ?>
								<?php foreach ($schedules as $schedule): ?>
									<?php if ($schedule->name_en == $group->name_en && $schedule->location == 'KL'): ?>
										<tr>
											<?php if ($rep == 1): ?>
												<td rowspan="<?= $group->cnt ?>"><?= $group->name_cn ?></td>
												<td rowspan="<?= $group->cnt ?>"><?= $group->cnt ?> 天</td>
											<?php endif; ?>
											<td><?= date("d F", strtotime($schedule->date)) ?></td>
										</tr>
										<?php $rep++; ?>
									<?php endif; ?>
								<?php endforeach; ?>
							<?php endif; ?>
						<?php endforeach; ?>
					</tbody>
				</table>
				<h5 class="mt-4">新山</h5>
				<table class="table table-bordered table-sm text-center" style="background-color: #EFECE8;">
					<tbody>
						<?php foreach ($groups as $group): ?>
							<?php if ($group->location == 'JB'): ?>
								<?php $rep = 1; ?>
								<?php foreach ($schedules as $schedule): ?>
									<?php if ($schedule->name_en == $group->name_en && $schedule->location == 'JB'): ?>
										<tr>
											<?php if ($rep == 1): ?>
												<td rowspan="<?= $group->cnt ?>"><?= $group->name_cn ?></td>
												<td rowspan="<?= $group->cnt ?>"><?= $group->cnt ?> 天</td>
											<?php endif; ?>
											<td><?= date("d F", strtotime($schedule->date)) ?></td>
										</tr>
										<?php $rep++; ?>
									<?php endif; ?>
								<?php endforeach; ?>
							<?php endif; ?>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">課程咨詢</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= Url::to(['/enquiry']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Enquiry[service]" value="課程咨詢">
				<div class="modal-body">
					<div class="form-group row">
						<label for="enquiry_title" class="col-sm-4 col-form-label text-left text-sm-right">*稱呼</label>
						<div class="col-sm-8">
							<select id="enquiry_title" name="Enquiry[title]" class="form-control form-control-sm" required>
								<option value="">請選擇一項</option>
								<option value="Mr">先生</option>
								<option value="Mrs">太太</option>
								<option value="Ms">女士</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_chinese_name" class="col-sm-4 col-form-label text-left text-sm-right">*中文名字</label>
						<div class="col-sm-8">
							<input id="enquiry_chinese_name" class="form-control form-control-sm" type="text" name="Enquiry[name_cn]" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_english_name" class="col-sm-4 col-form-label text-left text-sm-right">英文名字</label>
						<div class="col-sm-8">
							<input id="enquiry_english_name" class="form-control form-control-sm" type="text" name="Enquiry[name_en]">
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_contact" class="col-sm-4 col-form-label text-left text-sm-right">*聯絡號碼</label>
						<div class="col-sm-8">
							<input id="enquiry_contact" class="form-control form-control-sm" type="text" name="Enquiry[contact]" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_email" class="col-sm-4 col-form-label text-left text-sm-right">*電郵地址</label>
						<div class="col-sm-8">
							<input id="enquiry_email" class="form-control form-control-sm" type="email" name="Enquiry[email]" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_type" class="col-sm-4 col-form-label text-left text-sm-right">*课程种类</label>
						<div class="col-sm-8">
							<select id="enquiry_type" name="Enquiry[info][type]" class="form-control form-control-sm" required>
								<option value="">請選擇一項</option>
								<option value="Fengshui">风水</option>
								<option value="Bazi">八字</option>
								<option value="Qimen Dunjia">奇门遁甲</option>
								<option value="Yijing">易经</option>
								<option value="Yi Yan Duan">一眼断</option>
								<option value="Mian Xiang">面相</option>
								<option value="All">全部</option>
							</select>
							<div id="other-type-textarea"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_area" class="col-sm-4 col-form-label text-left text-sm-right">*地區</label>
						<div class="col-sm-8">
							<select id="enquiry_area" name="Enquiry[info][area]" class="form-control form-control-sm" required>
								<option value="">請選擇一項</option>
								<option value="Johor">柔佛</option>
								<option value="Selangor">雪蘭莪</option>
								<option value="Penang">檳城</option>
								<option value="Others">其他</option>
							</select>
							<div id="other-area-textarea"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_remark" class="col-sm-4 col-form-label text-left text-sm-right">備註</label>
						<div class="col-sm-8">
							<textarea id="enquiry_remark" name="Enquiry[info][remark]" class="form-control form-control-sm"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><?= Yii::t('app', 'Close'); ?></button>
					<button type="submit" class="btn btn-primary"><?= Yii::t('app', 'Submit'); ?></button>
				</div>
			</form>
		</div>
	</div>
</div>


