<?php

use yii\web\View;
use yii\helpers\Url;

$this->registerCssFile("@web/css/service/adult-renaming.css?2018-12-18-0000", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->title = Yii::t('app', 'ADULT RENAMING');

$this->registerCss('
	.package-height {
		height: 430px;
	}

	@media (min-width: 768px) and (max-width: 991px){
		.package-height {
			height: 530px;
		}
	}
');

$this->registerJs('
	if(window.location.href.indexOf("?m=a") != -1) {
		$("#enquiryModalA").modal("show");
	}
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
							<source src="../images/service/adult-renaming/adult-renaming-s.mov">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/adult-renaming/adult-renaming-lg.mov">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php elseif ($android): ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/adult-renaming/adult-renaming-s.webm" type="video/webm">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/adult-renaming/adult-renaming-lg.webm" type="video/webm">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php else: ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/adult-renaming/adult-renaming-s.mp4" type="video/mp4">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/adult-renaming/adult-renaming-lg.mp4" type="video/mp4">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php endif; ?>

				<div class="section_overlay"></div>
			</div>
			<div class="seq-absolute seq-model-1-1">
				<img src="../images/service/adult-renaming/title-cn.png" class="d-flex mx-auto h-100 w-auto" alt="Fengshui Republic" />
			</div>
		</div>
	</div>
</div>

<div class="fsrepublic-gradient-brown">
	<div class="container py-4">
		<div class="row">
			<div class="col-10 mx-auto">
				<p class="m-0 text-center fsrepublic-text-white">“名正运顺”人生命运成败的其中一个重要的元素</p>
			</div>
		</div>
	</div>
</div>

<div class="container py-5">
	<div class="row">
		<div class="col-10 mx-auto">
			<p class="m-0 text-center">名字是影响人生成功与否的其中一项重要因素，一个好的名字能够提升你的人缘及人际关系，让你贵人处处、事半功倍。</p>
			<p class="m-0 text-center">成人改名将配合你的生辰八字及五行的 “喜忌”，精选5-7个高分、配合八字及好听的名字供选择（若原名不适合将提供不同音但高分的名字）。选了一个最心仪的名字后，我们将准备好详尽的姓名分析报告书供收藏。</p>
		</div>
	</div>
</div>

<div id="bg-1">
	<div class="container py-5">
		<div class="row d-none d-md-block">
			<div class="col-11 mx-auto">
				<div class="row">
					<div class="col-12 col-md-6 col-lg-5 ml-auto pl-0">
						<div class="bg-package pt-5 pb-3 px-3">
							<div class="d-flex justify-content-center">
								<p class="text-center bg-brown fsrepublic-text-white px-3">配套 A</p>
							</div>
							<div class="package-height">
								<p class="text-center m-0 fsrepublic-text-gold">基本成人改名</p>
								<p class="text-center fsrepublic-text-gold">RM688</p>
								<p class="text-center px-4">成人改名將配合命主的生辰八字，五行的喜忌為命主命名。</p>
								<p class="text-center px-4">根据原有姓名，精选7-10个高分并配合八字的名字供选择（若原名不适合将提供不同音但高分的名字）。选择了一个最心仪的名字后，我们将在一个星期内准备好详尽的姓名分析报告书供收藏。</p>
							</div>
							<button type="button" class="btn btn-primary my-5 d-flex mx-auto" data-toggle="modal" data-target="#enquiryModalA">了解更多</button>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-5 mr-auto pr-0">
						<div class="bg-package pt-5 pb-3 px-3">
							<div class="d-flex justify-content-center">
								<p class="text-center bg-brown fsrepublic-text-white px-3">配套 B</p>
							</div>
							<div class="package-height">
								<p class="text-center m-0 fsrepublic-text-gold">基本成人改名 + 五行配洋名</p>
								<p class="text-center fsrepublic-text-gold">RM788</p>
								<p class="text-center px-4">成人改名將配合命主的生辰八字，五行的喜忌為命主命名。</p>
								<p class="text-center px-4">根据原有姓名，精选7-10个高分并配合八字的名字供选择（若原名不适合将提供不同音但高分的名字）。选择了一个最心仪的名字后，我们将在一个星期内准备好详尽的姓名分析报告书供收藏。</p>
								<p class="text-center px-4">+</p>
								<p class="text-center px-4">取一个合现在文化层次、学识背景，符合五格命理，补救八字上五行喜欢的五行属性，達到五行的平衡的英文洋名对一生的事业、婚姻、健康、学业和人际关系都会有很大帮助。</p>
							</div>
							<button type="button" class="btn btn-primary my-5 d-flex mx-auto" data-toggle="modal" data-target="#enquiryModalB">了解更多</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row d-block d-md-none">
			<div class="col-12 mx-auto">
				<div class="d-flex justify-content-center">
					<p class="text-center bg-brown fsrepublic-text-white px-3">配套 A</p>
				</div>
				<p class="text-center m-0 fsrepublic-text-gold">基本成人改名</p>
				<p class="text-center fsrepublic-text-gold">RM688</p>
				<p class="text-center px-4">成人改名將配合命主的生辰八字，五行的喜忌為命主命名。</p>
				<p class="text-center px-4">根据原有姓名，精选7-10个高分并配合八字的名字供选择（若原名不适合将提供不同音但高分的名字）。选择了一个最心仪的名字后，我们将在一个星期内准备好详尽的姓名分析报告书供收藏。</p>
				<button type="button" class="btn btn-primary mt-5 d-flex mx-auto">了解更多</button>
			</div>
		</div>
	</div>
</div>

<div class="container py-5 d-block d-md-none">
	<div class="row">
		<div class="col-12 mx-auto">
			<div class="d-flex justify-content-center">
				<p class="text-center bg-brown fsrepublic-text-white px-3">配套 B</p>
			</div>
			<p class="text-center m-0 fsrepublic-text-gold">基本成人改名 + 五行配洋名</p>
			<p class="text-center fsrepublic-text-gold">RM788</p>
			<p class="text-center px-4">成人改名將配合命主的生辰八字，五行的喜忌為命主命名。</p>
			<p class="text-center px-4">根据原有姓名，精选7-10个高分并配合八字的名字供选择（若原名不适合将提供不同音但高分的名字）。选择了一个最心仪的名字后，我们将在一个星期内准备好详尽的姓名分析报告书供收藏。</p>
			<p class="text-center px-4">+</p>
			<p class="text-center px-4">取一个合现在文化层次、学识背景，符合五格命理，补救八字上五行喜欢的五行属性，達到五行的平衡的英文洋名对一生的事业、婚姻、健康、学业和人际关系都会有很大帮助。</p>
		</div>
	</div>
</div>

<div class="container-fluid d-block d-md-none">
	<div class="row">
		<div class="col-12 px-0">
			<div id="bg-2">
				<button type="button" class="btn btn-primary d-flex mx-auto">了解更多</button>
			</div>
		</div>
	</div>
</div>

<div class="container py-5">
	<p class="text-center m-0 fsrepublic-text-gold">成人改名常见问题</p>
	<div class="row">
		<div class="col-10 col-md-4 mx-auto d-none d-md-block">
			<img src="../images/fr/line.png" class="img-fluid w-100">
		</div>
	</div>
	<div class="row">
		<div class="col-11 mx-auto">
			<div class="accordion mt-3" id="accordionFAQ">
				<div class="row">
					<div class="col-12 col-md-6">
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading01" data-toggle="collapse" data-target="#collapse01" aria-expanded="true" aria-controls="collapse01">
								<ol class="pl-3 mb-0" start="1">
									<li>為什麼不能配回原名？</li>
								</ol>
							</div>
							<div id="collapse01" class="collapse show" aria-labelledby="heading01" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>姓名學注重名字要配合八字，一些喜歡的字由於筆劃、五格及五行沒有配合到寶寶，也出現相沖寶寶或與父母之間的關係有相克的現象，因此才不鼓勵使用回。</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading02" data-toggle="collapse" data-target="#collapse02" aria-expanded="true" aria-controls="collapse02">
								<ol class="pl-3 mb-0" start="2">
									<li>改了名字需要去拜神嗎？</li>
								</ol>
							</div>
							<div id="collapse02" class="collapse" aria-labelledby="heading02" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>以姓名學來說並不需要，但若家族擁有此傳統可遵循習俗進行，一般上在燒香祭拜祖先時禀報祖先即可。</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading03" data-toggle="collapse" data-target="#collapse03" aria-expanded="true" aria-controls="collapse03">
								<ol class="pl-3 mb-0" start="3">
									<li>IC 需要改吗？</li>
								</ol>
							</div>
							<div id="collapse03" class="collapse" aria-labelledby="heading03" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>不需要，但建議將名片，印章或名字標籤上更換新的名字。</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading04" data-toggle="collapse" data-target="#collapse04" aria-expanded="true" aria-controls="collapse04">
								<ol class="pl-3 mb-0" start="4">
									<li>少用中文姓名，用需要改名吗？</li>
								</ol>
							</div>
							<div id="collapse04" class="collapse" aria-labelledby="heading04" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>姓名學是影響人生成敗上其中一個的重要因素，根據理論分數只要低於70分都建議更改名字。將配合自己八字、對自己好運的新名字印在名片上可達到讓人留下好的印象、增加貴人運的效果。多叫多用心名字，效果更加理想。</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading05" data-toggle="collapse" data-target="#collapse05" aria-expanded="true" aria-controls="collapse05">
								<ol class="pl-3 mb-0" start="5">
									<li>改了名字如何多用？</li>
								</ol>
							</div>
							<div id="collapse05" class="collapse" aria-labelledby="heading05" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>無論在名片、印章或稱呼上都建議多使用新的名字。（若很少使用中文名字，可以向我們購取配合五行的英文名字。</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading06" data-toggle="collapse" data-target="#collapse06" aria-expanded="true" aria-controls="collapse06">
								<ol class="pl-3 mb-0" start="6">
									<li>家族拜祖先或喪事，是使用原名還是改過的得名字？</li>
								</ol>
							</div>
							<div id="collapse06" class="collapse" aria-labelledby="heading06" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>可以使用新的名字，沒有任何負面影響。</li>
									</ol>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading07" data-toggle="collapse" data-target="#collapse07" aria-expanded="true" aria-controls="collapse07">
								<ol class="pl-3 mb-0" start="7">
									<li>改了後依然很多人稱呼回原本的名字會有影響嗎？</li>
								</ol>
							</div>
							<div id="collapse07" class="collapse" aria-labelledby="heading07" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>不會，但絕對沒有任何幫助。</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading08" data-toggle="collapse" data-target="#collapse08" aria-expanded="true" aria-controls="collapse08">
								<ol class="pl-3 mb-0" start="8">
									<li>師傅給了10個名字后顧客會有自己的意見，會resend其他名字問適合嗎？</li>
								</ol>
							</div>
							<div id="collapse08" class="collapse" aria-labelledby="heading08" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>可以，但建議在取名前把心儀的名字寫出來給我們，將提供10個名字，若無法選擇需要更多的名將有額外收費。</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading09" data-toggle="collapse" data-target="#collapse09" aria-expanded="true" aria-controls="collapse09">
								<ol class="pl-3 mb-0" start="9">
									<li>名字和小輩撞到，可是本身又喜歡這個名字，請問有影響嗎？</li>
								</ol>
							</div>
							<div id="collapse09" class="collapse" aria-labelledby="heading09" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>沒有，但華人傳統習俗並不喜歡，原因是在稱呼時會有碰撞的問題。</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading10" data-toggle="collapse" data-target="#collapse10" aria-expanded="true" aria-controls="collapse10">
								<ol class="pl-3 mb-0" start="10">
									<li>我都一把年紀了，還需要改名字嗎？</li>
								</ol>
							</div>
							<div id="collapse10" class="collapse" aria-labelledby="heading10" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>姓名學是影響人生成敗上其中一個的重要因素，只要低於70分以下的名字都建議更換。</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading11" data-toggle="collapse" data-target="#collapse11" aria-expanded="true" aria-controls="collapse11">
								<ol class="pl-3 mb-0" start="11">
									<li>改了名字真的有效果嗎？多久可以看到？</li>
								</ol>
							</div>
							<div id="collapse11" class="collapse" aria-labelledby="heading11" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>正所謂「一命二運三風水，四積德五讀書六名七相....」在改變人生的十二大因素裡，名字的重要性排行第六，因此肯定有效！效果的速度在於顧客的使用次數，若在多方面使用的越多，相对的得到的感应就越快。</li>
									</ol>
								</div>
							</div>
						</div>
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
						<img src="../images/service/all-services/service-extra1-cn.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('courses/bazi') ?>" class="btn btn-primary mt-3 mb-5">了解更多</a>
					</div>
					<div class="col-12 col-sm-6 px-0 px-sm-3 mx-auto text-center">
						<img src="../images/service/all-services/service-cn-5.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('services/bazi-analysis') ?>" class="btn btn-primary mt-3 mb-5">了解更多</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="enquiryModalA" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?= Yii::t('app', 'ADULT RENAMING'); ?><?= Yii::t('app', 'ENQUIRY'); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= Url::to(['/enquiry']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Enquiry[service]" value="<?= Yii::t('app', 'ADULT RENAMING'); ?> Package A">
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
						<label for="enquiry_dob" class="col-sm-4 col-form-label text-left text-sm-right">出生日期</label>
						<div class="col-sm-8">
							<input id="enquiry_dob" name="Enquiry[info][dob]" class="form-control form-control-sm" type="text">
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_preferred" class="col-sm-4 col-form-label text-left text-sm-right">心儀名字</label>
						<div class="col-sm-8">
							<textarea id="enquiry_preferred" name="Enquiry[info][preferred]" class="form-control form-control-sm"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_avoid" class="col-sm-4 col-form-label text-left text-sm-right">避忌名字</label>
						<div class="col-sm-8">
							<textarea id="enquiry_avoid" name="Enquiry[info][avoid]" class="form-control form-control-sm"></textarea>
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

<div class="modal fade" id="enquiryModalB" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?= Yii::t('app', 'ADULT RENAMING'); ?><?= Yii::t('app', 'ENQUIRY'); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= Url::to(['/enquiry']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Enquiry[service]" value="<?= Yii::t('app', 'ADULT RENAMING'); ?> Package B">
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
						<label for="enquiry_dob" class="col-sm-4 col-form-label text-left text-sm-right">出生日期</label>
						<div class="col-sm-8">
							<select class="form-control" name="Enquiry[info][year]">
								<option value="">請選擇年</option>
								<?php for ($i=2050; $i>1910; $i--): ?>
									<option value="<?= $i ?>"><?= $i ?>年</option>
								<?php endfor; ?>
							</select>
							<select class="form-control" name="Enquiry[info][month]">
								<option value="">請選擇月</option>
								<option value="1">一月</option>
								<option value="2">二月</option>
								<option value="3">三月</option>
								<option value="4">四月</option>
								<option value="5">五月</option>
								<option value="6">六月</option>
								<option value="7">七月</option>
								<option value="8">八月</option>
								<option value="9">九月</option>
								<option value="10">十月</option>
								<option value="11">十一月</option>
								<option value="12">十二月</option>
							</select>
							<select class="form-control" name="Enquiry[info][day]">
								<option value="">請選擇日</option>
								<?php for ($i=1; $i<32; $i++): ?>
									<option value="<?= $i ?>"><?= $i ?>日</option>
								<?php endfor; ?>
							</select>
							<select class="form-control" name="Enquiry[info][hour]">
								<option value="">請選擇時</option>
								<?php for ($i=0; $i<24; $i++): ?>
									<option value="<?= $i ?>"><?= $i ?>時</option>
								<?php endfor; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_preferred" class="col-sm-4 col-form-label text-left text-sm-right">心儀名字</label>
						<div class="col-sm-8">
							<textarea id="enquiry_preferred" name="Enquiry[info][preferred]" class="form-control form-control-sm"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_avoid" class="col-sm-4 col-form-label text-left text-sm-right">避忌名字</label>
						<div class="col-sm-8">
							<textarea id="enquiry_avoid" name="Enquiry[info][avoid]" class="form-control form-control-sm"></textarea>
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


