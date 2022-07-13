<?php

use yii\web\View;
use yii\helpers\Url;

$this->registerCssFile("@web/css/service/baby-naming.css?2018-12-18-0000", [
	'depends' => [\yii\web\YiiAsset::className()],
]);

$this->title = Yii::t('app', 'BABY NAMING');

$this->registerCss('
');

$this->registerJs('
	if(window.location.href.indexOf("?m=a") != -1) {
		$("#enquiryModalA").modal("show");
	}

	$("#enquiry_genderA").change(function() {
		var value = $(this).val();
		if(value=="Others") {
			$("#other-gender-textareaA").append("<textarea name=\"Enquiry[info][genderOther]\" class=\"form-control form-control-sm mt-2 other-textarea\" required></textarea>");
		} else {
			$("#other-gender-textareaA").empty();
		}
	});

	$("#enquiry_genderB").change(function() {
		var value = $(this).val();
		if(value=="Others") {
			$("#other-gender-textareaB").append("<textarea name=\"Enquiry[info][genderOther]\" class=\"form-control form-control-sm mt-2 other-textarea\" required></textarea>");
		} else {
			$("#other-gender-textareaB").empty();
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
							<source src="../images/service/baby-naming/baby-naming-s.mov">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/baby-naming/baby-naming-lg.mov">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php elseif ($android): ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/baby-naming/baby-naming-s.webm" type="video/webm">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/baby-naming/baby-naming-lg.webm" type="video/webm">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php else: ?>
					<div class="d-block d-md-none">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/baby-naming/baby-naming-s.mp4" type="video/mp4">
							Your browser does not support HTML5 video.
						</video>
					</div>
					<div class="d-none d-md-block">
						<video class="embed-responsive embed-responsive-1by1" autoplay muted loop playsinline>
							<source src="../images/service/baby-naming/baby-naming-lg.mp4" type="video/mp4">
							Your browser does not support HTML5 video.
						</video>
					</div>
				<?php endif; ?>

				<div class="section_overlay"></div>
			</div>
			<div class="seq-absolute seq-model-1-1">
				<img src="../images/service/baby-naming/title-en.png" class="d-flex mx-auto h-100 w-auto" alt="Fengshui Republic" />
			</div>
		</div>
	</div>
</div>

<div class="fsrepublic-gradient-brown">
	<div class="container py-4">
		<div class="row">
			<div class="col-10 mx-auto">
				<p class="m-0 text-center fsrepublic-text-white">Give your child the best gift by giving an auspicious name that will bring him or her a life time of good fortune.</p>
			</div>
		</div>
	</div>
</div>

<div class="container py-5">
	<div class="row">
		<div class="col-10 mx-auto">
			<div class="row">
				<div class="col-12 col-md-5 offset-md-1">
					<img src="../images/service/baby-naming/video.jpg" class="img-fluid d-none d-md-block" width="400" data-toggle="modal" data-target="#videoModal" style="cursor: pointer">
				</div>
				<div class="col-12 col-md-5 mx-auto">
					<p class="text-center text-md-left m-0">Having a good name is important for a newborn baby, as the name can secure the child’s success for his or her life time. A good name can also enhance a person’s interpersonal relationship and helps the person achieve accomplishments in life easily.</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid px-0">
	<img src="../images/service/baby-naming/video.jpg" class="img-fluid w-100 d-block d-md-none" data-toggle="modal" data-target="#videoModal" style="cursor: pointer">
</div>

<div id="bg-1">
	<div class="container py-5">
		<div class="row">
			<div class="col-10 mx-auto">
				<p class="text-left text-md-center my-0 fsrepublic-text-gold">Baby naming service includes the following:</p>
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
									Compatible with the baby’s Bazi
								</li>
								<li>
									Based on the Three Powers & Five Structures (San Cai Wu Ge) system
								</li>
								<li>
									Compatible with the 81 Divine Numbers
								</li>
								<li>
									7 to 10 names for you to choose from
								</li>
								<li>
									No weird name combinations
								</li>
								<li>
									Full color, comprehensive and detailed report
								</li>
							</ul>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="my-5 my-md-0">
							<img src="../images/service/baby-naming/fengshui-republic-report.png" class="img-fluid d-flex mx-auto ml-md-0" width="350">
							<p class="text-center fsrepublic-text-gold">Full color, comprehensive and detailed report</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="bg-brown">
	<div class="container py-3">
		<div class="row">
			<div class="col-10 mx-auto">
				<h5 class="m-0 text-center fsrepublic-text-white">Baby Naming Package</h5>
			</div>
		</div>
	</div>
</div>

<div id="bg-3">
	<div class="container py-5">
		<div class="row">
			<div class="col-11 mx-auto">
				<div class="row">
					<div class="col-12 col-md-4">
						<p><b>Before the baby’s birth:</b></p>
						<p>You can pre-order the baby naming service before your little precious’ birth. Just submit us the required information and payment and save RM200. Once the baby is born, contact the person in charge and provide us the baby’s birth year, month, day and hour to receive suitable names to match your baby’s Bazi, within 3 to 5 days.</p>
						<p><b>After your baby is born:</b></p>
						<p>After your baby is born, provide us the baby’s birth year, month, day and hour; to receive names that suit your baby’s Bazi, within 3 to 5 days.</p>
					</div>
					<div class="col-12 col-md-8 d-none d-md-block">
						<div class="row">
							<div class="col-6 pl-0">
								<div class="bg-package pt-5 pb-3 px-3" data-toggle="modal" data-target="#enquiryModalA" style="cursor: pointer">
									<div class="d-flex justify-content-center">
										<h5 class="text-center bg-brown fsrepublic-text-white px-3 py-1">Package A</h5>
									</div>
									<div class="package-height">
										<p class="text-center fsrepublic-text-gold">Baby Chinese Naming</p>
									</div>
									<img src="../images/service/baby-naming/price-en-1.png?002" class="img-fluid w-100 mb-4" alt="Fengshui Republic">
									<p class="text-center m-0 fsrepublic-text-gold package-line"><small>Now you can enjoy the special RM488 preborn Baby Chinese Naming Package to save RM200</small></p>
								</div>
							</div>
							<div class="col-6 pr-0">
								<div class="bg-package pt-5 pb-3 px-3" data-toggle="modal" data-target="#enquiryModalB" style="cursor: pointer">
									<div class="d-flex justify-content-center">
										<h5 class="text-center bg-brown fsrepublic-text-white px-3 py-1">Package B</h5>
									</div>
									<div class="package-height">
										<p class="text-center fsrepublic-text-gold">Baby Chinese Naming<br>+<br>English Name</p>
									</div>
									<img src="../images/service/baby-naming/price-en-2.png?002" class="img-fluid w-100 mb-4" alt="Fengshui Republic">
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<p class="mt-3">Having an English name that suits your cultural, education background, and compatible with the balance of your Five Elements can help to greatly boos your career, marriage, health, academic life and interpersonal relationship.</p>
									<p class="fsrepublic-text-gold"><small>*We will provide approximately 10 suggested names within 5 working days via email after your input of information. You may then reply the email with your choice of name and we will proceed with printing of the naming report.</small></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container d-block d-md-none">
	<div class="row">
		<div class="col-11 mx-auto">
			<div class="row">
				<div class="pt-5 pb-3 px-3">
					<div class="d-flex justify-content-center" data-toggle="modal" data-target="#enquiryModalA">
						<h5 class="text-center bg-brown fsrepublic-text-white px-3 py-1">Package A</h5>
					</div>
					<p class="text-center fsrepublic-text-gold">Baby Chinese Naming</p>
					<img src="../images/service/baby-naming/price-en-1.png?002" class="img-fluid w-100 mb-4" alt="Fengshui Republic">
					<p class="text-center m-0 fsrepublic-text-gold package-line"><small>Now you can enjoy the special RM488 preborn Baby Chinese Naming Package to save RM200</small></p>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-10 mx-auto">
			<img src="../images/fr/line.png" class="img-fluid w-100">
		</div>
	</div>
	<div class="row">
		<div class="col-11 mx-auto">
			<div class="row">
				<div class="pt-5 pb-3 px-3">
					<div class="d-flex justify-content-center" data-toggle="modal" data-target="#enquiryModalB">
						<h5 class="text-center bg-brown fsrepublic-text-white px-3 py-1">Package B</h5>
					</div>
					<p class="text-center fsrepublic-text-gold">Baby Chinese Naming<br>+<br>English Name</p>
					<img src="../images/service/baby-naming/price-en-2.png?002" class="img-fluid w-100 mb-4" alt="Fengshui Republic">
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-11 mx-auto">
			<p class="mt-3">Having an English name that suits your cultural, education background, and compatible with the balance of your Five Elements can help to greatly boos your career, marriage, health, academic life and interpersonal relationship.</p>
			<p class="fsrepublic-text-gold"><small>*We will provide approximately 10 suggested names within 5 working days via email after your input of information. You may then reply the email with your choice of name and we will proceed with printing of the naming report.</small></p>
		</div>
	</div>
</div>

<div class="container pt-5">
	<div class="row">
		<div class="col-10 col-md-4 mx-auto d-block d-md-none">
			<img src="../images/fr/line.png" class="img-fluid w-100">
		</div>
	</div>
	<p class="text-center m-0 fsrepublic-text-gold">You may like</p>
	<div class="row">
		<div class="col-10 col-md-4 mx-auto d-none d-md-block">
			<img src="../images/fr/line.png" class="img-fluid w-100">
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-6 col-md-4 col-lg-2 px-2 mb-4">
			<img src="../images/service/baby-naming/item-en-1.jpg" class="img-fluid w-100 mb-4" alt="Fengshui Republic">
			<p class="fsrepublic-text-gold px-2"><small>Package includes hand-made wooden frame using traditional craftsmanship, hair brush made by traditional craftsmanship, exquisite umbilical cord seal, and printed baby name and photo.</small></p>
		</div>
		<div class="col-6 col-md-4 col-lg-2 px-2 mb-4">
			<img src="../images/service/baby-naming/item-en-2.jpg" class="img-fluid w-100 mb-4" alt="Fengshui Republic">
			<p class="fsrepublic-text-gold px-2"><small>Package includes high quality wooden frame, exquisite umbilical cord seal, and printed baby name and photo.</small></p>
		</div>
		<div class="col-6 col-md-4 col-lg-2 px-2 mb-4">
			<img src="../images/service/baby-naming/item-en-3.jpg" class="img-fluid w-100 mb-4" alt="Fengshui Republic">
			<p class="fsrepublic-text-gold px-2"><small>Package includes hand-made wooden frame using traditional craftsmanship, hair brush made by traditional craftsmanship, exquisite umbilical cord seal, and printed baby name and photo.</small></p>
		</div>
		<div class="col-6 col-md-4 col-lg-2 px-2 mb-4">
			<img src="../images/service/baby-naming/item-en-4.jpg" class="img-fluid w-100 mb-4" alt="Fengshui Republic">
			<p class="fsrepublic-text-gold px-2"><small>Package includes hand-made wooden frame using traditional craftsmanship, hair brush, exquisite umbilical cord seal and precious hand and foot mold, baby name poem, and printed baby name and photo.</small></p>
		</div>
		<div class="col-6 col-md-4 col-lg-2 px-2 mb-4">
			<img src="../images/service/baby-naming/item-en-5.jpg?0001" class="img-fluid w-100 mb-4" alt="Fengshui Republic">
			<p class="fsrepublic-text-gold px-2"><small>Special package (All in one) = Include Baby name chop + Chinese Ink Pad + Box + Free Christian name.</small></p>
		</div>
		<div class="col-6 col-md-4 col-lg-2 px-2 mb-4">
			<img src="../images/service/baby-naming/item-en-6.jpg?2019-01-01-0000" class="img-fluid w-100 mb-4" alt="Fengshui Republic">
			<p class="fsrepublic-text-gold px-2"><small>In the old days, for the child to have a good night sleep, parents would prepare a specially made small pillow for the child. The pillow would be filled with rice and bean sprout kernels, and it can help the baby to sleep tight without awakening in shock. Named Well-Being Pillow, this is a gift for the baby to be happy and healthy.</small></p>
		</div>
	</div>
</div>

<div class="container py-5">
	<div class="row">
		<div class="col-10 col-md-4 mx-auto d-block d-md-none">
			<img src="../images/fr/line.png" class="img-fluid w-100">
		</div>
	</div>
	<p class="text-center m-0 fsrepublic-text-gold">Baby Naming FAQ</p>
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
									<li>The names I received do not contain the characters that I like. Why is it so?</li>
								</ol>
							</div>
							<div id="collapse01" class="collapse show" aria-labelledby="heading01" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>In the art and science of Chinese name, we put emphasis on the correlation between the names and the Bazi (birth year, month, day and hour). Some of the characters are not compatible with the baby because of the characters’ strokes and Five Elements. Such characters are in conflict, or “clashing” with the baby or the parents. We do not recommend these characters to be used as the name of the baby.</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading02" data-toggle="collapse" data-target="#collapse02" aria-expanded="true" aria-controls="collapse02">
								<ol class="pl-3 mb-0" start="2">
									<li>Can I use Simplified Chinese characters?</li>
								</ol>
							</div>
							<div id="collapse02" class="collapse" aria-labelledby="heading02" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>Yes, though when the baby grew up, he or she has to learn how to write the name in Traditional Chinese in the signature, name cards or company signs to boost the fortune.</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading03" data-toggle="collapse" data-target="#collapse03" aria-expanded="true" aria-controls="collapse03">
								<ol class="pl-3 mb-0" start="3">
									<li>I have received the 10 names, but I am unable to choose any that I like. What should I do?</li>
								</ol>
							</div>
							<div id="collapse03" class="collapse" aria-labelledby="heading03" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>We will provide you 3 additional names. These 3 names will score lower than the previous 10 names, but they are still auspicious names. If you still wish to receive extra names, a fee of RM688 will be charged, and the new names might score even lower points.</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading04" data-toggle="collapse" data-target="#collapse04" aria-expanded="true" aria-controls="collapse04">
								<ol class="pl-3 mb-0" start="4">
									<li>Can the names follow the characters of the family genealogy?</li>
								</ol>
							</div>
							<div id="collapse04" class="collapse" aria-labelledby="heading04" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>Yes. Our Master will try to fulfill your requirements in the most possible way; but do remember that not all characters in the genealogy are compatible with the baby and might score lower marks.</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading05" data-toggle="collapse" data-target="#collapse05" aria-expanded="true" aria-controls="collapse05">
								<ol class="pl-3 mb-0" start="5">
									<li>Is there any taboo to avoid naming the baby with the same name as an elder family member?</li>
								</ol>
							</div>
							<div id="collapse05" class="collapse" aria-labelledby="heading05" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>There is no such taboo in the Art of Naming, but such taboo does exist in the Chinese tradition. You can submit us a list of names to be avoided when you give us the essential information for the Master’s reference.</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading06" data-toggle="collapse" data-target="#collapse06" aria-expanded="true" aria-controls="collapse06">
								<ol class="pl-3 mb-0" start="6">
									<li>Is it true that the name of the baby should contain the Five Elements that the baby lacks of?</li>
								</ol>
							</div>
							<div id="collapse06" class="collapse" aria-labelledby="heading06" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>Theoretically yes. A person’s name should be based on his or her Bazi and Five Elements, therefore the person’s Favorable Aspect (Xi Yong Shen) will be given the emphasis.</li>
									</ol>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading07" data-toggle="collapse" data-target="#collapse07" aria-expanded="true" aria-controls="collapse07">
								<ol class="pl-3 mb-0" start="7">
									<li>Can the baby share the same name with his or her cousin? Is there any taboo to avoid the same name?</li>
								</ol>
							</div>
							<div id="collapse07" class="collapse" aria-labelledby="heading07" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>There is no such taboo in the Art of Naming, but we recommend you to use different names to avoid confusion.</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading08" data-toggle="collapse" data-target="#collapse08" aria-expanded="true" aria-controls="collapse08">
								<ol class="pl-3 mb-0" start="8">
									<li>My children are twins born in the same hour; can I choose 2 names among the 10 names given?</li>
								</ol>
							</div>
							<div id="collapse08" class="collapse" aria-labelledby="heading08" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>It is not recommended to do so. While the twins might share the same Bazi, there will be some subtle differences in Chinese Metaphysics. Names should be chosen only after the Bazi of the twins are determined by the Master. Note: There is a special discount for twins, please contact us for further information.</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading09" data-toggle="collapse" data-target="#collapse09" aria-expanded="true" aria-controls="collapse09">
								<ol class="pl-3 mb-0" start="9">
									<li>I have already given the baby an English name. Can I give my baby a Chinese name that sounds like the English name?</li>
								</ol>
							</div>
							<div id="collapse09" class="collapse" aria-labelledby="heading09" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>Yes. However, please bear in mind that you might not be able to receive 10 names, and the names might not be able to fulfill the baby’s Five Elements requirement.</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading10" data-toggle="collapse" data-target="#collapse10" aria-expanded="true" aria-controls="collapse10">
								<ol class="pl-3 mb-0" start="10">
									<li>Why is Traditional Chinese having different strokes?</li>
								</ol>
							</div>
							<div id="collapse10" class="collapse" aria-labelledby="heading10" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>From the ancient time, the Chinese Art of Naming uses the Traditional Chinese characters. Our calculation is based on Emperor Kangxi’s Dictionary, and will be different with the Simplified Chinese characters commonly used today.</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading11" data-toggle="collapse" data-target="#collapse11" aria-expanded="true" aria-controls="collapse11">
								<ol class="pl-3 mb-0" start="11">
									<li>Can the baby be named even before being born? Isn’t Bazi required for naming?</li>
								</ol>
							</div>
							<div id="collapse11" class="collapse" aria-labelledby="heading11" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>Yes, all naming service can only be conducted after we received the accurate timing information of the baby after he or she was born. However, you will receive special discount if you make early payment, and you can provide the person in charge the baby’s information after the baby is born.</li>
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
		<p class="text-center fsrepublic-text-white">YOU MAY LIKE</p>
		<div class="row">
			<div class="col-12 col-md-10 mx-auto">
				<div class="row">
					<div class="col-12 col-sm-6 px-0 px-sm-3 mx-auto text-center">
						<img src="../images/service/all-services/service-en-5.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('services/bazi-analysis') ?>" class="btn btn-primary mt-3 mb-5">know more</a>
					</div>
					<div class="col-12 col-sm-6 px-0 px-sm-3 mx-auto text-center">
						<img src="../images/service/all-services/service-extra3-en.jpg" class="img-fluid w-100">
						<a href="javascript:void(0)" class="btn btn-primary mt-3 mb-5">know more</a>
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
					<iframe class="embed-responsive embed-responsive-1by1" width="560" height="315" src="https://www.youtube.com/embed/S_ueVET5wf0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="enquiryModalA" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?= Yii::t('app', 'BABY NAMING'); ?> <?= Yii::t('app', 'ENQUIRY'); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= Url::to(['/enquiry']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Enquiry[service]" value="<?= Yii::t('app', 'BABY NAMING'); ?> Package A">
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
						<label for="enquiry_type" class="col-sm-4 col-form-label text-left text-sm-right">*Born / Preborn</label>
						<div class="col-sm-8">
							<select id="enquiry_type" name="Enquiry[info][type]" class="form-control form-control-sm" required>
								<option value="">Please Select One</option>
								<option value="Born">Born</option>
								<option value="Preborn">Preborn</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_genderA" class="col-sm-4 col-form-label text-left text-sm-right">*Baby Gender</label>
						<div class="col-sm-8">
							<select id="enquiry_genderA" name="Enquiry[info][gender]" class="form-control form-control-sm" required>
								<option value="">Please Select One</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="Twins">Twins</option>
								<option value="Others">Others</option>
							</select>
							<div id="other-gender-textareaA"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_dob" class="col-sm-4 col-form-label text-left text-sm-right">Date of Birth</label>
						<div class="col-sm-8">
							<select class="form-control" name="Enquiry[info][year]">
								<option value="">Please Select Year</option>
								<?php for ($i=2050; $i>1910; $i--): ?>
									<option value="<?= $i ?>"><?= $i ?> year</option>
								<?php endfor; ?>
							</select>
							<select class="form-control" name="Enquiry[info][month]">
								<option value="">Please Select Month</option>
								<option value="1">January</option>
								<option value="2">February</option>
								<option value="3">March</option>
								<option value="4">April</option>
								<option value="5">May</option>
								<option value="6">June</option>
								<option value="7">July</option>
								<option value="8">August</option>
								<option value="9">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select>
							<select class="form-control" name="Enquiry[info][day]">
								<option value="">Please Select Day</option>
								<?php for ($i=1; $i<32; $i++): ?>
									<?php
										if (!in_array(($i % 100), array(11,12,13))) {
											$n = $i;
											switch ($n % 10) {
												// Handle 1st, 2nd, 3rd
												case 1:  $n = $n.'st';break;
												case 2:  $n = $n.'nd';break;
												case 3:  $n = $n.'rd';break;
												default: $n = $n.'th';break;
											}
										} else {
											$n = $i;
											$n = $n.'th';
										}
									?>
									<option value="<?= $i ?>"><?= $n ?></option>
								<?php endfor; ?>
							</select>
							<select class="form-control" name="Enquiry[info][hour]">
								<option value="">Please Select Hour</option>
								<?php for ($i=0; $i<24; $i++): ?>
									<option value="<?= $i ?>"><?= $i ?> hour</option>
								<?php endfor; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_preferred" class="col-sm-4 col-form-label text-left text-sm-right">Preferred Names</label>
						<div class="col-sm-8">
							<textarea id="enquiry_preferred" name="Enquiry[info][preferred]" class="form-control form-control-sm"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_avoid" class="col-sm-4 col-form-label text-left text-sm-right">Avoid Names</label>
						<div class="col-sm-8">
							<textarea id="enquiry_avoid" name="Enquiry[info][avoid]" class="form-control form-control-sm"></textarea>
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

<div class="modal fade" id="enquiryModalB" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?= Yii::t('app', 'BABY NAMING'); ?> <?= Yii::t('app', 'ENQUIRY'); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= Url::to(['/enquiry']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Enquiry[service]" value="<?= Yii::t('app', 'BABY NAMING'); ?> Package B">
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
						<label for="enquiry_type" class="col-sm-4 col-form-label text-left text-sm-right">*Born / Preborn</label>
						<div class="col-sm-8">
							<select id="enquiry_type" name="Enquiry[info][type]" class="form-control form-control-sm" required>
								<option value="">Please Select One</option>
								<option value="Born">Born</option>
								<option value="Preborn">Preborn</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_genderB" class="col-sm-4 col-form-label text-left text-sm-right">*Baby Gender</label>
						<div class="col-sm-8">
							<select id="enquiry_genderB" name="Enquiry[info][gender]" class="form-control form-control-sm" required>
								<option value="">Please Select One</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="Twins">Twins</option>
								<option value="Others">Others</option>
							</select>
							<div id="other-gender-textareaB"></div>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_dob" class="col-sm-4 col-form-label text-left text-sm-right">Date of Birth</label>
						<div class="col-sm-8">
							<select class="form-control" name="Enquiry[info][year]">
								<option value="">Please Select Year</option>
								<?php for ($i=2050; $i>1910; $i--): ?>
									<option value="<?= $i ?>"><?= $i ?> year</option>
								<?php endfor; ?>
							</select>
							<select class="form-control" name="Enquiry[info][month]">
								<option value="">Please Select Month</option>
								<option value="1">January</option>
								<option value="2">February</option>
								<option value="3">March</option>
								<option value="4">April</option>
								<option value="5">May</option>
								<option value="6">June</option>
								<option value="7">July</option>
								<option value="8">August</option>
								<option value="9">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select>
							<select class="form-control" name="Enquiry[info][day]">
								<option value="">Please Select Day</option>
								<?php for ($i=1; $i<32; $i++): ?>
									<?php
										if (!in_array(($i % 100), array(11,12,13))) {
											$n = $i;
											switch ($n % 10) {
												// Handle 1st, 2nd, 3rd
												case 1:  $n = $n.'st';break;
												case 2:  $n = $n.'nd';break;
												case 3:  $n = $n.'rd';break;
												default: $n = $n.'th';break;
											}
										} else {
											$n = $i;
											$n = $n.'th';
										}
									?>
									<option value="<?= $i ?>"><?= $n ?></option>
								<?php endfor; ?>
							</select>
							<select class="form-control" name="Enquiry[info][hour]">
								<option value="">Please Select Hour</option>
								<?php for ($i=0; $i<24; $i++): ?>
									<option value="<?= $i ?>"><?= $i ?> hour</option>
								<?php endfor; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_preferred" class="col-sm-4 col-form-label text-left text-sm-right">Preferred Names</label>
						<div class="col-sm-8">
							<textarea id="enquiry_preferred" name="Enquiry[info][preferred]" class="form-control form-control-sm"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_avoid" class="col-sm-4 col-form-label text-left text-sm-right">Avoid Names</label>
						<div class="col-sm-8">
							<textarea id="enquiry_avoid" name="Enquiry[info][avoid]" class="form-control form-control-sm"></textarea>
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


