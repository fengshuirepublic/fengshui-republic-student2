<?php

use yii\web\View;
use yii\helpers\Url;

$this->registerCssFile("@web/stand/slick/slick-theme.css", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->registerCssFile("@web/stand/slick/slick.css", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->registerCssFile("@web/css/service/household-fengshui.css?2018-12-19-0000", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->registerJsFile("@web/stand/slick/slick.min.js", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->title = Yii::t('app', 'HOUSEHOLD FENGSHUI');

$this->registerCss('
	@media (max-width: 575px){
		.seq .seq-model-2-1 {
			bottom: 22%;
			height: 56%;
		}
	}
');

$this->registerJs('
	$("#videoModal").on("hidden.bs.modal", function () {
		$("#yt-video iframe").attr("src", $("#yt-video iframe").attr("src"));
	});

	$(".testimonial-slide").slick({
		initialSlide: Math.floor((Math.random() * 10) + 1),
		autoplay: true,
		lazyLoad: "ondemand",
		infinite: true
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

?>

<div class="container-fluid px-0">
	<div class="seq">
		<div class="seq-canvas">
			<div class="seq-absolute seq-background">
				<div id="main_image_1_1" class="d-block d-md-none"></div>
				<div id="main_image_1_2" class="d-none d-md-block"></div>
				<div class="section_overlay"></div>
			</div>
			<div class="seq-absolute seq-model-1-1">
				<img src="../images/service/household-fengshui/title-cn.png" class="d-flex mx-auto h-100 w-auto" alt="Fengshui Republic" />
			</div>
		</div>
	</div>
</div>

<div class="fsrepublic-gradient-brown">
	<div class="container py-4">
		<div class="row">
			<div class="col-10 mx-auto">
				<p class="m-0 text-center fsrepublic-text-white">风水与设计相互融合，让自己心仪的居家风格充满风水吉祥能量，全家受惠！</p>
			</div>
		</div>
	</div>
</div>

<div id="bg-1">
	<div class="container py-5">
		<div class="row">
			<div class="col-10 mx-auto">
				<div class="row">
					<div class="col-12 col-md-5 offset-md-1">
						<p class="text-center text-md-left m-0">
							所谓“屋旺人兴，屋败人衰”，我们每天至少会花三分之一的时间在家，由此可见居家风水是何等重要！兴旺的居家风水不仅能促进家庭和谐及提升全家健康，也能在财运、事业运、学业运及姻缘运各领域上带来良好的感应，让全家人做起事来事半功倍，一举多得！
						</p>
					</div>
					<div class="col-12 col-md-6">
						<img src="../images/service/household-fengshui/video.jpg" class="img-fluid d-none d-md-block" width="400" data-toggle="modal" data-target="#videoModal" style="cursor: pointer">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0">
	<img src="../images/service/household-fengshui/video.jpg" class="img-fluid w-100 d-block d-md-none" data-toggle="modal" data-target="#videoModal" style="cursor: pointer">
</div>

<div id="bg-2">
	<div class="container py-5">
		<div class="row">
			<div class="col-10 mx-auto">
				<h4 class="text-center my-0 fsrepublic-text-gold">居家风水<br>堪舆范围</h4>
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
					<div class="col-12 col-md-5 offset-md-1">
						<div>
							<ul class="pl-3 mb-0" style="list-style-type:disc">
								<li>
									现场屋宅风水分析与论断
								</li>
								<li>
									外环境分析
								</li>
								<li>
									内部格局分析
								</li>
								<li>
									阳宅三要重点布局
								</li>
								<li>
									吉方引动，压制凶方
								</li>
								<li>
									引动人缘桃花
								</li>
							</ul>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div>
							<ul class="pl-3" style="list-style-type:disc">
								<li>
									催财气，富贵腾达
								</li>
								<li>
									财位，文昌，事业布局
								</li>
								<li>
									动工择日择方位
								</li>
								<li>
									搬家择日
								</li>
								<li>
									新家入伙程序
								</li>
								<li>
									全彩与完整的风水报告书
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-10 mx-auto my-5">
				<img src="../images/service/household-fengshui/fengshui-republic-report.png" class="img-fluid d-flex mx-auto" width="350">
				<p class="text-center fsrepublic-text-gold">全彩与完整的风水报告书</p>
				<button type="button" class="btn btn-primary my-5 d-flex mx-auto" data-toggle="modal" data-target="#enquiryModal">了解更多</button>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0">
	<div class="seq">
		<div class="seq-canvas">
			<div class="seq-absolute seq-background">
				<div id="main_image_2_1" class="d-block d-md-none"></div>
				<div id="main_image_2_2" class="d-none d-md-block"></div>
				<div class="section_overlay"></div>
			</div>
			<div class="seq-absolute seq-model-2-1">
				<img src="../images/service/household-fengshui/methodology-cn-desktop.png" class="h-100 w-auto d-none d-md-block" alt="Fengshui Republic" />
				<img src="../images/service/household-fengshui/methodology-cn-mobile.png" class="h-100 w-auto d-block d-md-none mx-auto" alt="Fengshui Republic" />
			</div>
		</div>
	</div>
</div>

<div id="testimonial">
	<div class="container py-5">
		<h4 class="text-center m-4">顾客见证</h4>
		<div class="row">
			<div class="col-10 col-md-6 col-lg-4 mx-auto">
				<div class="testimonial-slide">
					<div>
						<img src="../images/testimonials/testimonial-01-sm.jpg" class="img-fluid w-100">
						<p class="text-center mt-4 px-3">"龙岩三高：高品质，高水准和高诚信！"</p>
						<p class="text-center"><small>Angie Ng</small></p>
					</div>
					<div>
						<img src="../images/testimonials/testimonial-02-sm.jpg" class="img-fluid w-100">
						<p class="text-center mt-4 px-3">"大师与团队的专业，让我们佩服！"</p>
						<p class="text-center"><small>Paula Lin</small></p>
					</div>
					<div>
						<img src="../images/testimonials/testimonial-03-sm.jpg" class="img-fluid w-100">
						<p class="text-center mt-4 px-3">"如果你相信风水，龙岩风水绝对是你可以参考的选择！"</p>
						<p class="text-center"><small>Yin Lee</small></p>
					</div>
					<div>
						<img src="../images/testimonials/testimonial-04-sm.jpg" class="img-fluid w-100">
						<p class="text-center mt-4 px-3">"经过罗师傅布局后我的生意、家庭及财运都有很大的進展！"</p>
						<p class="text-center"><small>Louis Lai</small></p>
					</div>
					<div>
						<img src="../images/testimonials/testimonial-05-sm.jpg" class="img-fluid w-100">
						<p class="text-center mt-4 px-3">"送子千金不如赐子一名！"</p>
						<p class="text-center"><small>Ong Bee Yun</small></p>
					</div>
					<div>
						<img src="../images/testimonials/testimonial-06-sm.jpg" class="img-fluid w-100">
						<p class="text-center mt-4 px-3">"一家大小平平安安过每一天！"</p>
						<p class="text-center"><small>Hong Pik Yee</small></p>
					</div>
					<div>
						<img src="../images/testimonials/testimonial-07-sm.jpg" class="img-fluid w-100">
						<p class="text-center mt-4 px-3">"配合了风水布局迎吉避凶，稳健成长！"</p>
						<p class="text-center"><small>Shim Woon Choon</small></p>
					</div>
					<div>
						<img src="../images/testimonials/testimonial-08-sm.jpg" class="img-fluid w-100">
						<p class="text-center mt-4 px-3">"堪察风水更动后公司气场变的更好了！"</p>
						<p class="text-center"><small>Jeremy Kee</small></p>
					</div>
					<div>
						<img src="../images/testimonials/testimonial-09-sm.jpg" class="img-fluid w-100">
						<p class="text-center mt-4 px-3">"感恩有你们，让我们公司可以扩展地这么快也让我们有个舒适的办公环境和温馨的家！"</p>
						<p class="text-center"><small>Sun Low</small></p>
					</div>
					<div>
						<img src="../images/testimonials/testimonial-10-sm.jpg" class="img-fluid w-100">
						<p class="text-center mt-4 px-3">"龙岩风水服务绝对是一个可以让你信服及信赖的选择！"</p>
						<p class="text-center"><small>Adam Ang</small></p>
					</div>
					<div>
						<img src="../images/testimonials/testimonial-11-sm.jpg" class="img-fluid w-100">
						<p class="text-center mt-4 px-3">"一家大小都平安开心！"</p>
						<p class="text-center"><small>Liang Hill</small></p>
					</div>
					<div>
						<img src="../images/testimonials/testimonial-12-sm.jpg" class="img-fluid w-100">
						<p class="text-center mt-4 px-3">"好的风水，家庭和谐跟事业更上一层楼！"</p>
						<p class="text-center"><small>Erny Looi Chee E</small></p>
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
								家庭成员八字与平面图
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
						<img src="../images/service/all-services/service-cn-5.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('services/bazi-analysis') ?>" class="btn btn-primary mt-3 mb-5">了解更多</a>
					</div>
					<div class="col-12 col-sm-6 px-0 px-sm-3 mx-auto text-center">
						<img src="../images/service/all-services/service-cn-12.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('services/talks-events') ?>" class="btn btn-primary mt-3 mb-5">了解更多</a>
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
				<h5 class="modal-title"><?= Yii::t('app', 'HOUSEHOLD FENGSHUI'); ?><?= Yii::t('app', 'ENQUIRY'); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= Url::to(['/enquiry']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Enquiry[service]" value="<?= Yii::t('app', 'HOUSEHOLD FENGSHUI'); ?>">
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
						<label for="enquiry_type" class="col-sm-4 col-form-label text-left text-sm-right">*屋子類型</label>
						<div class="col-sm-8">
							<select id="enquiry_type" name="Enquiry[info][type]" class="form-control form-control-sm" required>
								<option value="">請選擇一項</option>
								<option value="Single Storey Terrace">單層排屋</option>
								<option value="Double Storey Terrace">雙層排屋</option>
								<option value="Triple Storey Terrace">三層排樓</option>
								<option value="Cluster">田字屋</option>
								<option value="Semi-D">半獨立</option>
								<option value="Detached">獨立式</option>
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


