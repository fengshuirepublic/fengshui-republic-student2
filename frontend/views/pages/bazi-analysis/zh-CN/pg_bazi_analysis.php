<?php

use yii\web\View;
use yii\helpers\Url;

$this->registerCssFile("@web/css/service/bazi-analysis.css?2019-03-01-0000", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->title = Yii::t('app', 'BAZI ANALYSIS');

$this->registerCss('
');

$this->registerJs('
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
							<source src="../images/service/bazi-analysis/bazi-analysis-s.mov">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/bazi-analysis/bazi-analysis-lg.mov">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php elseif ($android): ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/bazi-analysis/bazi-analysis-s.webm" type="video/webm">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/bazi-analysis/bazi-analysis-lg.webm" type="video/webm">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php else: ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/bazi-analysis/bazi-analysis-s.mp4" type="video/mp4">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/bazi-analysis/bazi-analysis-lg.mp4" type="video/mp4">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php endif; ?>

				<div class="section_overlay"></div>
			</div>
			<div class="seq-absolute seq-model-1-1">
				<img src="../images/service/bazi-analysis/title-cn.png" class="d-flex mx-auto h-100 w-auto" alt="Fengshui Republic" />
			</div>
		</div>
	</div>
</div>

<div class="fsrepublic-gradient-brown">
	<div class="container py-4">
		<div class="row">
			<div class="col-11 mx-auto">
				<p class="m-0 text-center fsrepublic-text-white">前路茫茫让你无所适从？八字批命让你更了解自己的性格优劣、运势起伏及整体方向！</p>
			</div>
		</div>
	</div>
</div>

<div id="bg-1">
	<div class="container py-5">
		<div class="row">
			<div class="col-10 col-md-8 mx-auto">
				<p class="text-left text-md-center">前路茫茫让你无所适从、不知所措？担心做错决定为自己带来不良影响？八字批命服务能够帮你了解自己整体运势的起伏，这样便能够避短扬长，做出最有利自己的决定！</p>
				<p class="text-left text-md-center">孔子曰“不知命无以为君子”，八字批命绝对不是迷信，是一门通过统计与计算来了解人生起伏的学问，以现代语言来说，八字就是每个人一出生就具备的“密码条”，正统、专业及有经验的命理师能够根据个人八字配合奇门遁甲推算出个人的运程起伏，在运势低迷时养精蓄锐、运势高涨时乘胜追击！</p>
			</div>
		</div>
	</div>
</div>

<div id="bg-2">
	<div class="container py-5">
		<div class="row d-none d-md-block">
			<div class="col-10 mx-auto">
				<div class="row fsrepublic-text-white">
					<div class="col-5 offset-1">
						<p>当了解自己的优点及缺点，并尽早知道自己的整体运程走势就不会出现前路茫茫、裹足不前的情况，反而能够避短扬长做出正确决定，做起事来也就事半功倍！</p>
						<ul class="pl-3 mb-0" style="list-style-type:disc">
							<li>性格分析</li>
							<li>五行喜忌</li>
							<li>人生大运</li>
						</ul>
					</div>
					<div class="col-6">
						<ul class="pl-3 mb-0" style="list-style-type:disc">
							<li>格局分析</li>
							<li>适合发展方向</li>
							<li>本命颜色</li>
							<li>本命优劣势</li>
							<li>适合行业及方向</li>
							<li>投资运、财运、健康运、子女运</li>
							<li>事业运</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row d-block d-md-none">
			<div class="col-10 mx-auto">
				<p>当了解自己的优点及缺点，并尽早知道自己的整体运程走势就不会出现前路茫茫、裹足不前的情况，反而能够避短扬长做出正确决定，做起事来也就事半功倍！</p>
				<ul class="pl-3 mb-0" style="list-style-type:disc">
					<li>性格分析</li>
					<li>五行喜忌</li>
					<li>人生大运</li>
					<li>格局分析</li>
					<li>适合发展方向</li>
					<li>本命颜色</li>
					<li>本命优劣势</li>
					<li>适合行业及方向</li>
					<li>投资运、财运、健康运、子女运</li>
					<li>事业运</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0 d-none d-md-block">
	<div class="seq">
		<div class="seq-canvas">
			<div class="seq-absolute seq-background">
				<div id="main_image_2_1"></div>
				<div class="section_overlay lite_overlay"></div>
			</div>
			<div class="seq-absolute seq-model-2-1">
				<h2 class="text-center fsrepublic-text-white">流年八字</h2>
				<h2 class="text-center fsrepublic-text-white">YEARLY BAZI</h2>
			</div>
		</div>
	</div>
</div>

<div class="container pt-3 pb-5">
	<div class="row d-block d-md-none">
		<div class="col-12 mx-auto mb-4">
			<img src="../images/service/bazi-analysis/writing-brush.jpg" class="img-fluid w-100">
		</div>
	</div>
	<div class="row">
		<div class="col-10 mx-auto">
			<h4 class="text-center fsrepublic-text-gold d-block d-md-none">流年八字</h4>
			<h4 class="text-center fsrepublic-text-gold d-block d-md-none">YEARLY BAZI</h4>
			<img src="../images/fr/line.png" class="img-fluid w-100 d-block d-md-none">
			<p class="text-center fsrepublic-text-gold m-0">运筹帷幄，<br>掌握好自己的运势</p>
		</div>
	</div>
	<div class="row">
		<div class="col-10 col-md-6 mx-auto">
			<img src="../images/fr/line.png" class="img-fluid w-100 d-none d-md-block">
		</div>
	</div>
	<div class="row">
		<div class="col-11 col-md-8 mx-auto">
			<div id="bg-yearly-bazi">
				<p class="text-left text-md-center mt-4">详细批命了解自己的八字后，建议每年进行流年八字分析，更进一步为自己在新的一年里所要面临的挑战做好充足的准备！</p>
				<p class="text-left text-md-center">需知道每一年的运势皆有起伏，流年八字将为你分析流年里每一个月所需要注意的事项，让你能够运筹帷幄，掌握好自己的财运、健康运、事业运、贵人运、学业运及姻缘运等整体运势，做出对自己最有利的安排！</p>
				<button type="button" class="btn btn-primary my-5 d-flex mx-auto" data-toggle="modal" data-target="#enquiryModal">了解更多</button>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0 d-none d-md-block">
	<div class="seq">
		<div class="seq-canvas">
			<div class="seq-absolute seq-background">
				<div id="main_image_3_1"></div>
				<div class="section_overlay lite_overlay"></div>
			</div>
			<div class="seq-absolute seq-model-3-1">
				<h2 class="text-center fsrepublic-text-white">生命蓝图</h2>
				<h2 class="text-center fsrepublic-text-white">LIFE'S BLUE PRINT</h2>
			</div>
		</div>
	</div>
</div>

<div class="container pt-3 pb-5 pb-md-0">
	<div class="row d-block d-md-none">
		<div class="col-12 mx-auto mb-4">
			<img src="../images/service/bazi-analysis/combination-lock.jpg" class="img-fluid w-100">
		</div>
	</div>
	<div class="row">
		<div class="col-10 mx-auto">
			<h4 class="text-center fsrepublic-text-gold d-block d-md-none">生命蓝图</h4>
			<h4 class="text-center fsrepublic-text-gold d-block d-md-none">LIFE'S BLUE PRINT</h4>
			<img src="../images/fr/line.png" class="img-fluid w-100 d-block d-md-none">
			<p class="text-center fsrepublic-text-gold m-0">选择自己的人生策略，<br>做出对自己最正确的选择！</p>
		</div>
	</div>
	<div class="row">
		<div class="col-10 col-md-6 mx-auto">
			<img src="../images/fr/line.png" class="img-fluid w-100 d-none d-md-block">
		</div>
	</div>
	<div class="row">
		<div class="col-11 col-md-8 mx-auto">
			<div id="bg-bleu-print">
				<p class="text-left text-md-center mt-4">每一个人都有与生俱来的天赋及才华，各自都有其独特的使命与人生轨迹。如果我们可以儘早透过八字分析了解自己的《生命蓝图》，了解自己拥有的人格特质便能够尽早做好未来规划、趋吉避凶，做起事来自然也事半功倍！</p>
				<p class="text-left text-md-center">龙岩风水将透过你的八字密码，为你解读专属于你的《生命蓝图》，切记《生命蓝图》是活的，一点都不宿命，是藉由了解自己的长短优劣之处，从而选择最适合自己的人生策略，顺应天地间的规律，做出对自己最正确的选择！</p>
				<p class="text-left text-md-center">由于无需要与师傅会面，此服务为较为经济实惠的配套。</p>
				<button type="button" class="btn btn-primary my-5 d-flex mx-auto" data-toggle="modal" data-target="#enquiryModal">了解更多</button>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-12 mx-auto d-block d-md-none">
			<img src="../images/service/bazi-analysis/little-girl.jpg" class="img-fluid w-100">
			<h4 class="text-center fsrepublic-text-gold d-block d-md-none mt-4">小孩潜能报告书</h4>
			<h4 class="text-center fsrepublic-text-gold d-block d-md-none">CHILD POTENTIAL<br>REPORT</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-10 mx-auto mb-4">
			<img src="../images/fr/line.png" class="img-fluid w-100">
		</div>
	</div>
	<div class="row">
		<div class="col-11 col-md-4 offset-md-2 d-none d-md-block">
			<img src="../images/service/bazi-analysis/little-girl.jpg" class="img-fluid w-100">
			<img src="../images/service/bazi-analysis/fengshui-republic-report.png" id="potential-report-img" class="img-fluid d-flex mx-auto" width="250">
			<p id="potential-report-word" class="text-right fsrepublic-text-gold">小孩潜能报告书</p>
		</div>
		<div class="col-11 col-md-4 mx-auto ml-md-3">
			<div id="bg-child-potential" class="pb-5 mb-5">
				<h4 class="text-center text-md-left fsrepublic-text-gold d-none d-md-block">小孩潜能报告书</h4>
				<h4 class="text-center text-md-left fsrepublic-text-gold d-none d-md-block">CHILD POTENTIAL REPORT</h4>
				<p class="text-center text-md-left fsrepublic-text-gold">了解孩子的强处、优势，<br>平安迈向成功的康庄大道！</p>
				<p>古时候命理学家会根据初生小孩的年月日时（四柱八字）中的“关煞”推算出小孩命中所带有的相应“关煞”吉凶，命中带有“小儿关煞”的孩子从出生到大运前的这段时间都需要格外照顾。此外，《八字潜能报告书》也会以孩子的八字五行列出孩子未来的潜能及方向，父母除了能从《潜能报告书》中为孩子趋吉避凶，也可以了解孩子的强处、优势，让孩子少走冤枉路，平安稳健地迈向成功的康庄大道！</p>
				<p>由于无需要与师傅会面，此服务为较为经济实惠的配套。</p>
				<img src="../images/service/bazi-analysis/fengshui-republic-report.png" class="img-fluid d-flex mx-auto mt-5 d-block d-md-none" width="250">
				<button type="button" class="btn btn-primary d-flex my-3 mx-auto ml-md-0" data-toggle="modal" data-target="#enquiryModal">了解更多</button>
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
						<img src="../images/service/all-services/service-extra1-cn.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/bazi') ?>" class="btn btn-primary mt-3 mb-5">了解更多</a>
					</div>
					<div class="col-12 col-sm-6 px-0 px-sm-3 mx-auto text-center">
						<img src="../images/service/all-services/service-extra2-cn.jpg" class="img-fluid w-100">
						<a href="javascript:void(0)" class="btn btn-primary mt-3 mb-5">了解更多</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?= Yii::t('app', 'BAZI ANALYSIS'); ?> <?= Yii::t('app', 'ENQUIRY'); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= Url::to(['/enquiry']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Enquiry[service]" value="<?= Yii::t('app', 'BAZI ANALYSIS'); ?>">
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
						<label for="enquiry_type" class="col-sm-4 col-form-label text-left text-sm-right">*八字服務</label>
						<div class="col-sm-8">
							<select id="enquiry_type" name="Enquiry[info][service]" class="form-control form-control-sm" required>
								<option value="">請選擇一項</option>
								<option value="Bazi Consultation">一生批算</option>
								<option value="Annual Bazi">流年批算</option>
								<option value="Bazi Potential">八字藍圖</option>
							</select>
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


