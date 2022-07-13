<?php

use yii\web\View;
use yii\helpers\Url;

$this->registerCssFile("@web/css/service/commercial-fengshui.css?2018-12-18-0000", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->title = Yii::t('app', 'COMMERCIAL FENGSHUI');

$this->registerCss('
');

$this->registerJs('
	$("#videoModal").on("hidden.bs.modal", function () {
		$("#yt-video iframe").attr("src", $("#yt-video iframe").attr("src"));
	});

	$("#enquiry_type").change(function() {
		var value = $(this).val();
		if(value=="Others") {
			$("#other-type-textarea").append("<textarea name=\"Enquiry[info][typeOther]\" class=\"form-control form-control-sm mt-2 other-textarea\" required></textarea>");
		} else {
			$("#other-type-textarea").empty()
		}
	});

	$("#enquiry_area").change(function() {
		var value = $(this).val();
		if(value=="Others") {
			$("#other-area-textarea").append("<textarea name=\"Enquiry[info][areaOther]\" class=\"form-control form-control-sm mt-2 other-textarea\" required></textarea>");
		} else {
			$("#other-area-textarea").empty();
		}
	});
', View::POS_END);

$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
$android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");

?>

<div class="container-fluid px-0">
	<div class="seq">
		<div class="seq-canvas">
			<div class="seq-absolute seq-background">
				<?php if ($iPod || $iPhone || $iPad): ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/commercial-fengshui/commercial-fengshui-s.mov">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/commercial-fengshui/commercial-fengshui-lg.mov">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php elseif ($android): ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/commercial-fengshui/commercial-fengshui-s.webm" type="video/webm">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/commercial-fengshui/commercial-fengshui-lg.webm" type="video/webm">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php else: ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/commercial-fengshui/commercial-fengshui-s.mp4" type="video/mp4">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/commercial-fengshui/commercial-fengshui-lg.mp4" type="video/mp4">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php endif; ?>

				<div class="section_overlay"></div>
			</div>
			<div class="seq-absolute seq-model-1-1">
				<img src="../images/service/commercial-fengshui/title-cn.png" class="d-flex mx-auto h-100 w-auto" alt="Fengshui Republic" />
			</div>
		</div>
	</div>
</div>

<div class="fsrepublic-gradient-brown">
	<div class="container py-4">
		<div class="row">
			<div class="col-11 mx-auto">
				<p class="m-0 text-center fsrepublic-text-white">完善的催财与催事业，结合良好的空间规划，让你的事业蒸蒸日上</p>
			</div>
		</div>
	</div>
</div>

<div class="container py-5">
	<div class="row">
		<div class="col-10 mx-auto">
			<p class="m-0 text-center">催财、催贵人、催事业，吉祥风水配合空间规划让你的事业蒸蒸日上！拥有良好地点、优质产品、完善管理以及正面的经营理念却总是经营不顺，为什么呢？很大的可能是因为风水出了问题！良好的风水布局能让你的思维清晰，在决策上做出正确的选择吸引更多商机。好风水也能促使人事和谐，让日常运作顺畅，提高职员士气及生产力。</p>
		</div>
	</div>
</div>

<div class="container-fluid px-0">
	<img src="../images/service/commercial-fengshui/video.jpg" class="img-fluid w-100 d-block d-md-none" data-toggle="modal" data-target="#videoModal" style="cursor: pointer">
</div>

<div id="bg-1" class="py-3">
	<div class="container py-5">
		<div class="row">
			<div class="col-10 mx-auto">
				<div class="row">
					<div class="col-12 col-md-5 offset-md-1">
						<img src="../images/service/commercial-fengshui/video.jpg" class="img-fluid d-none d-md-block" width="400" data-toggle="modal" data-target="#videoModal" style="cursor: pointer">
					</div>
					<div class="col-12 col-md-5 mx-auto">
						<p class="text-center text-md-left m-0">商业风水服务通过“理气”（方向方位）及内外峦头（内外建筑及摆设）布局，配合商业五行和个人命卦及八字，并引动吉祥气场如财位、文昌位、贵人位及人丁位等，确保客户能够获得吉祥风水的良好感应。</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="bg-2">
	<div class="container py-5">
		<div class="row">
			<div class="col-10 mx-auto">
				<h4 class="text-center my-0 fsrepublic-text-gold">商业风水<br>堪舆范围</h4>
			</div>
		</div>
		<div class="row">
			<div class="col-10 mx-auto">
				<img src="../images/fr/line.png" class="img-fluid w-100">
			</div>
		</div>
		<div class="row">
			<div class="col-10 mx-auto">
				<div class="row">
					<div class="col-12 col-md-6">
						<div>
							<ul class="pl-3 mb-0" style="list-style-type:disc">
								<li>
									现场商宅风水分析与论断
								</li>
								<li>
									内外环境分析
								</li>
								<li>
									柜台风水与精神壁
								</li>
								<li>
									商宅大门的布局
								</li>
								<li>
									吉方引动，压制凶方
								</li>
								<li>
									寻财位，催财气
								</li>
								<li>
									业主以及各要员办公室
								</li>
								<li>
									个人座位吉方
								</li>
								<li>
									座位与会议室布局
								</li>
								<li>
									动工择日择方位
								</li>
								<li>
									新商宅开幕择日
								</li>
								<li>
									新商宅入伙程序
								</li>
								<li>
									全彩与完整的风水报告书
								</li>
							</ul>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="my-5 my-md-0">
							<img src="../images/service/commercial-fengshui/fengshui-republic-report.png" class="img-fluid d-flex mx-auto" width="350">
							<p class="text-center fsrepublic-text-gold">全彩与完整的风水报告书</p>
							<button type="button" class="btn btn-primary my-5 d-flex mx-auto" data-toggle="modal" data-target="#enquiryModal">了解更多</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="methodology" class="py-0 py-md-5">
	<div class="container-fluid px-0 d-block d-md-none">
		<div class="seq">
			<div class="seq-canvas">
				<div class="seq-absolute seq-background">
					<div id="master_image_1"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 col-md-5 offset-md-1 d-none d-md-block">
				<img class="img-fluid d-flex ml-auto" src="../images/service/commercial-fengshui/main-master-1-1.jpg" alt="Fengshui Republic" style="height: 300px;">
			</div>
			<div class="col-12 col-md-3 offset-md-1">
				<div class="px-2 py-5">
					<div>
						<h4 class="text-center my-0 fsrepublic-text-gold">风水堪舆<br>学派理论</h4>
						<img src="../images/fr/line.png" class="img-fluid w-100">
						<p class="mt-2 text-center fsrepublic-text-gold">堪舆风水将结合三元与三合风水，配搭个人八字吉方，并通过商宅内外环境的情况而进行个人化的风水布局。</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="why-us">
	<div class="container py-5">
		<h5 class="text-center fsrepublic-text-gold">为什么选择龙岩风水？</h5>
		<h5 class="text-center fsrepublic-text-gold">WHY FENGSHUI REPUBLIC ?</h5>
		<div class="row">
			<div class="col-10 mx-auto">
				<div class="row">
					<div class="col-11 col-md-6 mx-auto">
						<img src="../images/fr/why-us/cn-why-1.png" class="img-fluid w-100">
						<img src="../images/fr/why-us/cn-why-2.png" class="img-fluid w-100">
						<img src="../images/fr/why-us/cn-why-3.png" class="img-fluid w-100">
						<img src="../images/fr/why-us/cn-why-4.png?001" class="img-fluid w-100">
					</div>
					<div class="col-11 col-md-6 mx-auto">
						<img src="../images/fr/why-us/cn-why-5.png" class="img-fluid w-100">
						<img src="../images/fr/why-us/cn-why-6.png" class="img-fluid w-100">
						<img src="../images/fr/why-us/cn-why-7.png" class="img-fluid w-100">
						<img src="../images/fr/why-us/cn-why-8.png" class="img-fluid w-100">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="process-flow">
	<div class="container py-5">
		<h5 class="text-center">风水咨询流程</h5>
		<div class="row">
			<div class="col-11 col-md-6 mx-auto">
				<div class="row">
					<div class="col-6 mx-auto">
						<img src="../images/fr/process-flow/icon-1.png" class="img-fluid w-100">
						<ol class="pl-3 mb-0" start="1">
							<li>
								交付定金确认预约
							</li>
						</ol>
					</div>
					<div class="col-6 mx-auto">
						<img src="../images/fr/process-flow/icon-2.png" class="img-fluid w-100">
						<ol class="pl-3 mb-0" start="2">
							<li>
								关键员工八字与平面图
							</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="col-11 col-md-6 mx-auto">
				<div class="row">
					<div class="col-6 mx-auto">
						<img src="../images/fr/process-flow/icon-3.png" class="img-fluid w-100">
						<ol class="pl-3 mb-0" start="3">
							<li>
								风水勘察，可于当天询问问题
							</li>
						</ol>
					</div>
					<div class="col-6 mx-auto">
						<img src="../images/fr/process-flow/icon-4.png" class="img-fluid w-100">
						<ol class="pl-3 mb-0" start="4">
							<li>
								勘察之前或当天支付余款
							</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-11 col-md-6 mx-auto">
				<div class="row">
					<div class="col-6 mx-auto">
						<img src="../images/fr/process-flow/icon-5.png" class="img-fluid w-100">
						<ol class="pl-3 mb-0" start="5">
							<li>
								寄出/领取报告书
							</li>
						</ol>
					</div>
					<div class="col-6 mx-auto">
						<img src="../images/fr/process-flow/icon-6.png" class="img-fluid w-100">
						<ol class="pl-3 mb-0" start="6">
							<li>
								择日动工
							</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="col-11 col-md-6 mx-auto">
				<div class="row">
					<div class="col-6 mx-auto">
						<img src="../images/fr/process-flow/icon-7.png" class="img-fluid w-100">
						<ol class="pl-3 mb-0" start="7">
							<li>
								装修期间可提问问题
							</li>
						</ol>
					</div>
					<div class="col-6 mx-auto">
						<img src="../images/fr/process-flow/icon-8.png" class="img-fluid w-100">
						<ol class="pl-3 mb-0" start="8">
							<li>
								择日开张/搬迁
							</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<button type="button" class="btn btn-primary my-5 d-flex mx-auto" data-toggle="modal" data-target="#enquiryModal">了解更多</button>
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
						<img src="../images/service/all-services/service-cn-11.jpg" class="img-fluid w-100">
						<a href="javascript:void(0)" class="btn btn-primary mt-3 mb-5">了解更多</a>
					</div>
					<div class="col-12 col-sm-6 px-0 px-sm-3 mx-auto text-center">
						<img src="../images/service/all-services/service-cn-12.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('services/talks-events') ?>" class="btn btn-primary mt-3 mb-5" data-toggle="modal" data-target="#enquiryModal">了解更多</a>
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
					<iframe class="embed-responsive embed-responsive-1by1" width="560" height="315" src="https://www.youtube.com/embed/TGT4Joxtbk8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?= Yii::t('app', 'COMMERCIAL FENGSHUI'); ?><?= Yii::t('app', 'ENQUIRY'); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= Url::to(['/enquiry']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Enquiry[service]" value="<?= Yii::t('app', 'COMMERCIAL FENGSHUI'); ?>">
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
						<label for="enquiry_type" class="col-sm-4 col-form-label text-left text-sm-right">*類型</label>
						<div class="col-sm-8">
							<select id="enquiry_type" name="Enquiry[info][type]" class="form-control form-control-sm" required>
								<option value="">請選擇一項</option>
								<option value="Shop Lot">商業店面</option>
								<option value="Mall Unit">商城單位</option>
								<option value="Factory">工廠</option>
								<option value="Others">其他</option>
							</select>
							<div id="other-type-textarea"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_sqft" class="col-sm-4 col-form-label text-left text-sm-right">*平方尺</label>
						<div class="col-sm-8">
							<select id="enquiry_sqft" name="Enquiry[info][sqft]" class="form-control form-control-sm" required>
								<option value="">請選擇一項</option>
								<option value="500~2000">500~2000</option>
								<option value="2001~3500">2001~3500</option>
								<option value="3501~5000">3501~5000</option>
								<option value=">5000">>5000</option>
							</select>
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


