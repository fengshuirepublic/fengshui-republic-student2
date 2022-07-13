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
				<h5 class="m-0 text-center fsrepublic-text-white">YI YAN DUAN <br class="d-block d-md-none">COURSE</h5>
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
				<p class="m-0 text-center fsrepublic-text-white">Fengshui at a Glance is a Landform Fengshui Method, and integration of the Xing Luan system from Hong Kong and Xing Jia system from Taiwan. This method is astonishingly accurate and can show precise results.</p>
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
				<img src="../images/course/logo-course-en.png" class="d-flex mx-auto h-100 w-auto">
			</div>
			<div class="seq-absolute seq-model-1-1">
				<p class="text-center text-md-left fsrepublic-text-white">Fengshui Republic is the only Malaysia institute that offers complete, comprehensive courses in Fengshui and Chinese Metaphysics and has received the ISO9001 international certification. It is also the first of such institution that teaches both Xing Luan and Xing Jia knowledge, allowing the general public to access to this profound ancient wisdom and benefit from it.</p>
				<div class="d-block d-md-none">
					<img id="logo-img" src="../images/course/logo-course-en.png" class="d-flex mx-auto">
				</div>
				<div id="yiyanduan-btn" class="text-center">
					<button type="button" class="btn btn-primary d-flex mx-auto ml-md-0" data-toggle="modal" data-target="#scheduleModal">class schedule</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="bg-light">
	<div class="container pt-5 pb-0">
		<div class="row">
			<div class="col-10 col-lg-7 mx-auto">
				<h5 class="fsrepublic-text-gold">Xing Luan System</h5>
				<div class="row">
					<div class="col-12 col-md-6">
						<p>Over a decade ago, when Master Loh visited a friend in Hong Kong, he heard that there was a limp temple caretaker who does not use Fengshui Compass, yet he can accurately predict the fortune, and even the time of the events of the households he saw. Some rumors even claim he summons spirits to inspect the Fengshui for him.</p>
						<p>So, Master Loh began his journey to seek for this adept of Fengshui, yet the limp temple caretaker could not be found even after Master Loh attempted to look for him for two years.</p>
					</div>
					<div class="col-12 col-md-6">
						<p>Finally, 8 years ago Master Loh managed to find the adept; the friendship between the two was forged and they had a lot to talk about. However, the limp temple caretaker refused to teach Master Loh about Fengshui, stating that he had promised his own master that he would keep the knowledge as a secret until five years later. After knowing this, Master Loh no longer asked the old adept to teach him the art of Fengshui, though whenever he went to Hong Kong he would meet up with the adept.</p>
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
				<p class="m-0 text-center fsrepublic-text-white">In the autumn of 2013, when Master Loh visited the limp temple caretaker, the adept expressed his will to teach Master Loh the art of Xing Luan. The adept said that the promise of making the knowledge a secret for five years has long passed, and that he found Master Loh the right and trustworthy person to inherit the knowledge. Since then, Master Loh has become the only disciple of this great master</p>
			</div>
		</div>
	</div>
</div>

<div class="container pt-5 pb-0">
	<div class="row">
		<div class="col-10 col-lg-7 mx-auto">
			<h5 class="fsrepublic-text-gold">Xing Jia System</h5>
			<div class="row">
				<div class="col-12 col-md-6">
					<p>Decades ago, a Buddhist monk from mainland China travelled to Taiwan and sought to cross a huge river. He was aided by a kind fisherman, and to repay the latter’s kindness, the monk passed down the knowledge of Xing Jia system of Fengshui to him. After this, the fisherman became known as a great Fengshui master who could divine the auspiciousness of a household and the fortune of its members based on the shape of the house and tomb, without even resorting to the use of Fengshui Compass.</p>
					<p>This fisherman is the renowned Fengshui Master Zheng Qingfeng, who only had about a dozen of disciples. The Xing Luan and Xing Jia systems are quite similar; both belong to the Landform School. During a fieldwork on the ancestral tomb of a renowned personality, Master Loh had the opportunity to get to know a disciple of Master Zheng Qingfeng and learned the art of Xing Jia from him.</p>
				</div>
				<div class="col-12 col-md-6">
					<p>Based on his years of practical experience, Master Loh integrates the two systems to become the art of Fengshui at a Glance that can accurately forecast fortune of a household and avert ill fate while welcoming auspiciousness to one’s life. Other than that, Master Loh also create the Wealth Setting Method based on years of practical experience.</p>
					<p>Now, Master Loh is revealing this precious, complete set of Landform Fengshui knowledge to the public, and hopes that through the Wealth Setting Method everyone can enjoy a prosperous, abundant life.</p>
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
					<h5 class="fsrepublic-text-gold">Fengshui at a Glance</h5>
					<ul class="pl-3 mb-0" style="list-style-type:disc">
						<li>
							A unique Fengshui system that allows you to instantly apply in real life with high accuracy
						</li>
						<li>
							Get to know a household is auspicious or not instantly
						</li>
						<li>
							Learn how to avoid inauspicious formation
						</li>
						<li>
							Learn how to set-up prosperity formation
						</li>
						<li>
							Learn how to set-up formation for good marriage
						</li>
						<li>
							Learn how to set-up formation for good health
						</li>
						<li>
							Learn how to set-up formation for good results in your children’s exams
						</li>
						<li>
							Learn how to set-up formation to make your staff more productive
						</li>
						<li>
							Learn how to set-up formation to welcome beneficial people into your life
						</li>
						<li>
							Learn how to set-up formation to boost your sales
						</li>
						<li>
							Learn how to set-up formation to make your staff more loyal
						</li>
						<li>
							Learn how to set-up formation to improve your career
						</li>
					</ul>
					<button type="button" class="btn btn-primary d-flex mx-auto ml-md-0 mt-4" data-toggle="modal" data-target="#enquiryModal">know more</button>
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
						<img src="../images/course/course-yiyanduan/word-en.png" class="img-fluid d-flex ml-md-auto mx-auto" width="300">
					</div>
					<div class="col-12 col-md-6 mt-4">
						<h5>Fengshui at a Glance is for:</h5>
						<ol class="pl-3 mb-0">
							<li>
								Those who wish to improve their health
							</li>
							<li>
								Those who wish to improve their financial situation
							</li>
							<li>
								Those who wish to have a harmonious family life
							</li>
							<li>
								Those who wish to have a better marital relationship
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
		<p class="text-center fsrepublic-text-white">YOU MAY LIKE</p>
		<div class="row">
			<div class="col-12 col-md-10 mx-auto">
				<div class="row">
					<div class="col-12 col-sm-6 px-0 px-sm-3 mx-auto text-center">
						<img src="../images/course/all-courses/course-en-5.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/fengshui') ?>" class="btn btn-primary mt-3 mb-5">know more</a>
					</div>
					<div class="col-12 col-sm-6 px-0 px-sm-3 mx-auto text-center">
						<img src="../images/course/all-courses/course-en-4.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/yijing') ?>" class="btn btn-primary mt-3 mb-5">know more</a>
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
				<h5 class="modal-title">Yi Yan Duan Schedule <?= date('Y') ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h5>Kuala Lumpur</h5>
				<table class="table table-bordered table-sm text-center" style="background-color: #EFECE8;">
					<tbody>
						<?php foreach ($groups as $group): ?>
							<?php if ($group->location == 'KL'): ?>
								<?php $rep = 1; ?>
								<?php foreach ($schedules as $schedule): ?>
									<?php if ($schedule->name_en == $group->name_en && $schedule->location == 'KL'): ?>
										<tr>
											<?php if ($rep == 1): ?>
												<td rowspan="<?= $group->cnt ?>"><?= $group->name_en ?></td>
												<td rowspan="<?= $group->cnt ?>"><?= $group->cnt ?> days</td>
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
				<h5 class="mt-4">Johor Bahru</h5>
				<table class="table table-bordered table-sm text-center" style="background-color: #EFECE8;">
					<tbody>
						<?php foreach ($groups as $group): ?>
							<?php if ($group->location == 'JB'): ?>
								<?php $rep = 1; ?>
								<?php foreach ($schedules as $schedule): ?>
									<?php if ($schedule->name_en == $group->name_en && $schedule->location == 'JB'): ?>
										<tr>
											<?php if ($rep == 1): ?>
												<td rowspan="<?= $group->cnt ?>"><?= $group->name_en ?></td>
												<td rowspan="<?= $group->cnt ?>"><?= $group->cnt ?> days</td>
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
				<h5 class="modal-title">COURSE ENQUIRY</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= Url::to(['/enquiry']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Enquiry[service]" value="Course Enquiry">
				<div class="modal-body">
					<div class="form-group row">
						<label for="enquiry_title" class="col-sm-4 col-form-label text-left text-sm-right">*Title</label>
						<div class="col-sm-8">
							<select id="enquiry_title" name="Enquiry[title]" class="form-control form-control-sm" required>
								<option value="">Please Select One</option>
								<option value="Mr">Mr</option>
								<option value="Mrs">Mrs</option>
								<option value="Ms">Ms</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_chinese_name" class="col-sm-4 col-form-label text-left text-sm-right">*Chinese Name</label>
						<div class="col-sm-8">
							<input id="enquiry_chinese_name" class="form-control form-control-sm" type="text" name="Enquiry[name_cn]" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_english_name" class="col-sm-4 col-form-label text-left text-sm-right">English Name</label>
						<div class="col-sm-8">
							<input id="enquiry_english_name" class="form-control form-control-sm" type="text" name="Enquiry[name_en]">
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_contact" class="col-sm-4 col-form-label text-left text-sm-right">*Contact</label>
						<div class="col-sm-8">
							<input id="enquiry_contact" class="form-control form-control-sm" type="text" name="Enquiry[contact]" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_email" class="col-sm-4 col-form-label text-left text-sm-right">*Email</label>
						<div class="col-sm-8">
							<input id="enquiry_email" class="form-control form-control-sm" type="email" name="Enquiry[email]" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_type" class="col-sm-4 col-form-label text-left text-sm-right">*Course Type</label>
						<div class="col-sm-8">
							<select id="enquiry_type" name="Enquiry[info][type]" class="form-control form-control-sm" required>
								<option value="">Please Select One</option>
								<option value="Fengshui">Fengshui</option>
								<option value="Bazi">Bazi</option>
								<option value="Qimen Dunjia">Qimen Dunjia</option>
								<option value="Yijing">Yijing</option>
								<option value="Yi Yan Duan">Yi Yan Duan</option>
								<option value="Mian Xiang">Physiognomy (Mian Xiang)</option>
								<option value="All">All</option>
							</select>
							<div id="other-type-textarea"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_area" class="col-sm-4 col-form-label text-left text-sm-right">*Area</label>
						<div class="col-sm-8">
							<select id="enquiry_area" name="Enquiry[info][area]" class="form-control form-control-sm" required>
								<option value="">Please Select One</option>
								<option value="Johor">Johor</option>
								<option value="Selangor">Selangor</option>
								<option value="Penang">Penang</option>
								<option value="Others">Others</option>
							</select>
							<div id="other-area-textarea"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_remark" class="col-sm-4 col-form-label text-left text-sm-right">Remark</label>
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


