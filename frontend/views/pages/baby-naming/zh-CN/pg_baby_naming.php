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
				<img src="../images/service/baby-naming/title-cn.png" class="d-flex mx-auto h-100 w-auto" alt="Fengshui Republic" />
			</div>
		</div>
	</div>
</div>

<div class="fsrepublic-gradient-brown">
	<div class="container py-4">
		<div class="row">
			<div class="col-10 mx-auto">
				<p class="m-0 text-center fsrepublic-text-white">“留子千金不如赐予佳名”，为孩子选择一个会带来好运的名字！</p>
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
					<p class="text-center text-md-left">俗语说得好“赠子千金，不如赐子一名”，为新生宝宝取一个好听又能够带来好运的名字是一件重要的大事！</p>
					<p class="text-center text-md-left m-0">名字是影响人生成功与否的其中一项因素，好的名字能够招来吉祥贵人运，提升人缘及人际关系，孩子在贵人处处下、做起事来也自然事半功倍！</p>
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
				<p class="text-left text-md-center my-0 fsrepublic-text-gold">婴儿命名服务包括以下特点：</p>
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
					<div class="col-12 col-md-4 col-lg-3 offset-md-2 offset-lg-3">
						<div>
							<ul class="pl-3 mb-0" style="list-style-type:disc">
								<li>
									配合孩子八字
								</li>
								<li>
									根据三才五格派
								</li>
								<li>
									配合八十一零数
								</li>
								<li>
									不會出現奇怪的組合
								</li>
								<li>
									詳盡全彩命名報告書
								</li>
							</ul>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="my-5 my-md-0">
							<img src="../images/service/baby-naming/fengshui-republic-report.png" class="img-fluid d-flex mx-auto ml-md-0" width="350">
							<p class="text-center fsrepublic-text-gold">全彩命名報告書</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container py-5">
	<div class="row">
		<div class="col-10 mx-auto">
			<h5 class="text-left text-md-center my-0 fsrepublic-text-gold">命名/改名学派</h5>
		</div>
	</div>
	<div class="row">
		<div class="col-10 mx-auto">
			<img src="../images/fr/line.png" class="img-fluid w-100">
		</div>
	</div>
	<div class="row">
		<div class="col-10 mx-auto">
			<h5 class="text-left text-md-center my-0 fsrepublic-text-gold">將配合命主的生辰八字，五行的喜忌為命主命名。<br class="d-none d-md-block">其中包括的命名學派有：</h5>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-sm-11 mx-auto mt-3">
			<div class="row">
				<div class="col-12 col-md-4 mx-auto px-0 px-sm-1 mt-2">
					<div class="desc-box-1 px-4 py-5">
						<div id="desc-bg-1">
							<ol class="pl-3 mb-0 pb-5" start="1">
								<li><p>八字配名</p></li>
								<li style="list-style-type: none;">
									<p>八字是取決人生格局的最重要元素，所以當為小孩與成人取名時配合八字是最重要的考量。每個人的八字都會有其五行之喜忌，所以在取名時一定要配合八字的喜用神之五行，這將會為命主未來的命運與運勢加分。</p>
								</li>
							</ol>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-4 mx-auto px-0 px-sm-1 mt-2">
					<div class="desc-box-2 px-4 py-5">
						<div id="desc-bg-2">
							<ol class="pl-3 mb-0 pb-5" start="2">
								<li><p>三才五格派</p></li>
								<ul class="pl-3 mb-0 pb-5" style="list-style-type:disc">
									<li>所謂五格即是天格，人格，地格，外格，總格。</li>
									<li>天格為命主與父母及師長之間的關係，不得相剋。</li>
									<li>人格為命主的個性，不能與天格及地格相剋，也稱成功運。</li>
									<li>地格為命主在將來與妻子及子女之間的關係，俗稱基礎運，不得與人格相剋。</li>
									<li>外格為命主在外的人緣，社交能力等之好壞。</li>
									<li>總格為命主一生的運勢，對事業，家庭，財運具有重大的影響力。</li>
								</ul>
							</ol>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-4 mx-auto px-0 px-sm-1 mt-2">
					<div class="desc-box-3 px-4 py-5">
						<div id="desc-bg-3">
							<ol class="pl-3 mb-0 pb-5" start="3">
								<li><p>八十一靈數</p></li>
								<li style="list-style-type: none;">
									<p>天格，人格，地格，外格，總格筆劃之數，其數必定要是吉祥之數，這將會為命主帶來好運。</p>
								</li>
							</ol>
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
				<h5 class="m-0 text-center fsrepublic-text-white">龙岩嬰兒命名配套</h5>
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
						<p><b>未出生:</b></p>
						<p>先为即将出生的宝宝预购命名服务，只要先提供资料及付款能够节省RM200，当宝宝出生后只要联系负责人提供出生年月日时就能在3-5个工作日内领取配合宝宝八字的名字。</p>
						<p><b>已出生：</b></p>
						<p>宝宝出生后，将资料提供我们并付款后便能够在3-5个工作日内领取配合宝宝八字的名字。</p>
					</div>
					<div class="col-12 col-md-8 d-none d-md-block">
						<div class="row">
							<div class="col-6 pl-0">
								<div class="bg-package pt-5 pb-3 px-3" data-toggle="modal" data-target="#enquiryModalA" style="cursor: pointer">
									<div class="d-flex justify-content-center">
										<h5 class="text-center bg-brown fsrepublic-text-white px-3 py-1">配套 A</h5>
									</div>
									<div class="package-height">
										<p class="text-center fsrepublic-text-gold">基本中文命名</p>
									</div>
									<img src="../images/service/baby-naming/price-cn-1.png?002" class="img-fluid w-100 mb-4" alt="Fengshui Republic">
									<p class="text-center m-0 fsrepublic-text-gold package-line"><small>现在只要付费就可享有特价RM488预定服务，可节省RM200呢！</small></p>
								</div>
							</div>
							<div class="col-6 pr-0">
								<div class="bg-package pt-5 pb-3 px-3" data-toggle="modal" data-target="#enquiryModalB" style="cursor: pointer">
									<div class="d-flex justify-content-center">
										<h5 class="text-center bg-brown fsrepublic-text-white px-3 py-1">配套 B</h5>
									</div>
									<div class="package-height">
										<p class="text-center fsrepublic-text-gold">基本中文命名<br>+<br>五行配洋名<br><small>Christian name</small></p>
									</div>
									<img src="../images/service/baby-naming/price-cn-2.png?002" class="img-fluid w-100 mb-4" alt="Fengshui Republic">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row d-none d-md-block">
					<div class="col-12 mt-3">
						<p class="text-center mt-3">取一个合现在文化层次、学识背景，符合五格命理，补救八字上五行喜欢的五行属性，達到五行的平衡的英文洋名对一生的事业、婚姻、健康、学业和人际关系都会有很大帮助。</p>
						<p class="text-center fsrepublic-text-gold"><small>*我們將在宝宝出生5个工作日以内提供大約7-10個精選名字。你可選擇1个心儀的名字再回复給我們。心儀名字的分析報告書將在一個星期內就会準備好。</small></p>
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
				<div class="pt-5 pb-3 px-3" data-toggle="modal" data-target="#enquiryModalA">
					<div class="d-flex justify-content-center">
						<h5 class="text-center bg-brown fsrepublic-text-white px-3 py-1">配套 A</h5>
					</div>
					<p class="text-center fsrepublic-text-gold">基本中文命名</p>
					<img src="../images/service/baby-naming/price-cn-1.png?002" class="img-fluid w-100 mb-4" alt="Fengshui Republic">
					<p class="text-center m-0 fsrepublic-text-gold package-line"><small>现在只要付费就可享有特价RM488预定服务，可节省RM200呢！</small></p>
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
				<div class="pt-5 pb-3 px-3" data-toggle="modal" data-target="#enquiryModalB">
					<div class="d-flex justify-content-center">
						<h5 class="text-center bg-brown fsrepublic-text-white px-3 py-1">配套 B</h5>
					</div>
					<p class="text-center fsrepublic-text-gold">基本中文命名<br>+<br>五行配洋名<br><small>Christian name</small></p>
					<img src="../images/service/baby-naming/price-cn-2.png?002" class="img-fluid w-100 mb-4" alt="Fengshui Republic">
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-11 mx-auto">
			<p class="mt-3">取一个合现在文化层次、学识背景，符合五格命理，补救八字上五行喜欢的五行属性，達到五行的平衡的英文洋名对一生的事业、婚姻、健康、学业和人际关系都会有很大帮助。</p>
			<p class="fsrepublic-text-gold"><small>*我們將在宝宝出生5个工作日以内提供大約7-10個精選名字。你可選擇1个心儀的名字再回复給我們。心儀名字的分析報告書將在一個星期內就会準備好。</small></p>
		</div>
	</div>
</div>

<div class="container pt-5">
	<div class="row">
		<div class="col-10 col-md-4 mx-auto d-block d-md-none">
			<img src="../images/fr/line.png" class="img-fluid w-100">
		</div>
	</div>
	<p class="text-center m-0 fsrepublic-text-gold">您可能也会喜欢</p>
	<div class="row">
		<div class="col-10 col-md-4 mx-auto d-none d-md-block">
			<img src="../images/fr/line.png" class="img-fluid w-100">
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-6 col-md-4 col-lg-2 px-2 mb-4">
			<img src="../images/service/baby-naming/item-cn-1.jpg" class="img-fluid w-100 mb-4" alt="Fengshui Republic">
			<p class="fsrepublic-text-gold px-2"><small>套组包括高品质实木相框，传统手工制作胎毛笔，名字及照片印刷。</small></p>
		</div>
		<div class="col-6 col-md-4 col-lg-2 px-2 mb-4">
			<img src="../images/service/baby-naming/item-cn-2.jpg" class="img-fluid w-100 mb-4" alt="Fengshui Republic">
			<p class="fsrepublic-text-gold px-2"><small>套组包括高品质实木相框，精美脐带章，名字及照片印刷。</small></p>
		</div>
		<div class="col-6 col-md-4 col-lg-2 px-2 mb-4">
			<img src="../images/service/baby-naming/item-cn-3.jpg" class="img-fluid w-100 mb-4" alt="Fengshui Republic">
			<p class="fsrepublic-text-gold px-2"><small>套组包括高品质实木相框，传统手工制作胎毛笔，精美脐带章，名字及照片印刷。</small></p>
		</div>
		<div class="col-6 col-md-4 col-lg-2 px-2 mb-4">
			<img src="../images/service/baby-naming/item-cn-4.jpg" class="img-fluid w-100 mb-4" alt="Fengshui Republic">
			<p class="fsrepublic-text-gold px-2"><small>套组包括高品质实木相框，传统手工制作胎毛笔、精美脐带章、弥足珍贵手足印、名字提诗、名字及照片。</small></p>
		</div>
		<div class="col-6 col-md-4 col-lg-2 px-2 mb-4">
			<img src="../images/service/baby-naming/item-cn-5.jpg?0001" class="img-fluid w-100 mb-4" alt="Fengshui Republic">
			<p class="fsrepublic-text-gold px-2"><small>特别配套价”全包”,包括：中文命名 + 脐带朱砂元神文昌印 + 附送配搭八字的洋名。</small></p>
		</div>
		<div class="col-6 col-md-4 col-lg-2 px-2 mb-4">
			<img src="../images/service/baby-naming/item-cn-6.jpg?2019-01-01-0000" class="img-fluid w-100 mb-4" alt="Fengshui Republic">
			<p class="fsrepublic-text-gold px-2"><small>根据传统，古时父母为了让孩子能够一觉到天明都会使用米或豆壳制作称为“压惊枕”的小枕头给孩子，除了能让宝宝在睡觉时不易受惊并更有安全感，也祝福及期望孩子能够欢喜、快乐、平安及健康！</small></p>
		</div>
	</div>
</div>

<div class="container py-5">
	<div class="row">
		<div class="col-10 col-md-4 mx-auto d-block d-md-none">
			<img src="../images/fr/line.png" class="img-fluid w-100">
		</div>
	</div>
	<p class="text-center m-0 fsrepublic-text-gold">嬰兒取名常见问题</p>
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
									<li>为什么配不到喜欢的字？</li>
								</ol>
							</div>
							<div id="collapse01" class="collapse show" aria-labelledby="heading01" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>姓名學注重名字要配合八字，一些喜歡的字由於筆劃、五格及五行沒有配合到寶寶，也出現相沖寶寶或與父母之間的關係有相克的現象，因此才不鼓勵使用。</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading02" data-toggle="collapse" data-target="#collapse02" aria-expanded="true" aria-controls="collapse02">
								<ol class="pl-3 mb-0" start="2">
									<li>可以用簡體寫名字嗎？</li>
								</ol>
							</div>
							<div id="collapse02" class="collapse" aria-labelledby="heading02" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>可以，但記得要讓小孩長大後學會如何親寫繁體的名字，將來可在簽名、名片，或公司招牌上使用，增加貴人運及人緣運。</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading03" data-toggle="collapse" data-target="#collapse03" aria-expanded="true" aria-controls="collapse03">
								<ol class="pl-3 mb-0" start="3">
									<li>給了10名字之後，還是選不到喜歡的名字，怎麼辦？</li>
								</ol>
							</div>
							<div id="collapse03" class="collapse" aria-labelledby="heading03" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>我們將另外給予3個分數略低但仍屬吉祥的名字，若最終無法決定要求再選，我們將徵收而外688費用，且分數方面可能會更低。</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading04" data-toggle="collapse" data-target="#collapse04" aria-expanded="true" aria-controls="collapse04">
								<ol class="pl-3 mb-0" start="4">
									<li>可不可以跟着族谱？</li>
								</ol>
							</div>
							<div id="collapse04" class="collapse" aria-labelledby="heading04" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>可以，師傅會盡量配合，但不是所有族譜的字體都配合寶寶，因此分數可能稍低。</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading05" data-toggle="collapse" data-target="#collapse05" aria-expanded="true" aria-controls="collapse05">
								<ol class="pl-3 mb-0" start="5">
									<li>需要避忌其他长辈的名字吗？</li>
								</ol>
							</div>
							<div id="collapse05" class="collapse" aria-labelledby="heading05" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>命名學上並沒有問題，但華人傳統習俗都會避開長輩的名字，因此必須在呈交資料時把避忌名字列出讓師傅參考。</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading06" data-toggle="collapse" data-target="#collapse06" aria-expanded="true" aria-controls="collapse06">
								<ol class="pl-3 mb-0" start="6">
									<li>名字是不是看寶寶缺什麼五行就填補什麼五行呢？</li>
								</ol>
							</div>
							<div id="collapse06" class="collapse" aria-labelledby="heading06" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>理論上正確，依照個人八字五行即為取名首要條件，因此非常注重個人的喜用神。</li>
									</ol>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading07" data-toggle="collapse" data-target="#collapse07" aria-expanded="true" aria-controls="collapse07">
								<ol class="pl-3 mb-0" start="7">
									<li>寶寶的堂表姐/弟的名字可以一樣嗎？需不需要避忌？</li>
								</ol>
							</div>
							<div id="collapse07" class="collapse" aria-labelledby="heading07" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>命名學上並沒有問題，但建議使用不同名字。主要原因是為了避免在呼喚名字是出現誤會的情況發生。</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading08" data-toggle="collapse" data-target="#collapse08" aria-expanded="true" aria-controls="collapse08">
								<ol class="pl-3 mb-0" start="8">
									<li>雙胞胎同個時辰我可以取10個名字在裡面選擇兩個來用嗎？</li>
								</ol>
							</div>
							<div id="collapse08" class="collapse" aria-labelledby="heading08" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>不建議，雖然寶寶八字相同但在八字命理上會有少許差異，因此必須讓師傅確認該八字的五行才下定論。（雙胞胎可得到折扣，可聯繫我們的專員）</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading09" data-toggle="collapse" data-target="#collapse09" aria-expanded="true" aria-controls="collapse09">
								<ol class="pl-3 mb-0" start="9">
									<li>是否可以用已決定的英文名字來取類似近音的中文名字？</li>
								</ol>
							</div>
							<div id="collapse09" class="collapse" aria-labelledby="heading09" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>可以，但或許得不到10個名字，同時也未必配合寶寶五行需求。</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading10" data-toggle="collapse" data-target="#collapse10" aria-expanded="true" aria-controls="collapse10">
								<ol class="pl-3 mb-0" start="10">
									<li>繁體的筆劃計算為什麼會有不一樣呢？</li>
								</ol>
							</div>
							<div id="collapse10" class="collapse" aria-labelledby="heading10" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>漢字是以繁體字為始，姓名學從古流傳至今也一樣，我們是根據古代康熙字典筆畫的計算方式為標準，因此字體的筆畫將會比現代看到的簡體筆畫來得多。</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header collapsed" id="heading11" data-toggle="collapse" data-target="#collapse11" aria-expanded="true" aria-controls="collapse11">
								<ol class="pl-3 mb-0" start="11">
									<li>为什么还没出世就可以取名呢？不是要看八字吗？ 没出世哪有八字啊？</li>
								</ol>
							</div>
							<div id="collapse11" class="collapse" aria-labelledby="heading11" data-parent="#accordionFAQ">
								<div class="card-body">
									<ol class="pl-3 mb-0" style="list-style-type: none;">
										<li>是的，所有取名服務都需要等寶寶出生拿到準確的時間後才能篩選寶寶的名字，之所以提早付款是因為可以獲得優惠價，當寶寶出生後便可以立即將資料發給負責人。</li>
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
						<img src="../images/service/all-services/service-cn-5.jpg" class="img-fluid w-100">
						<a href="<?= Yii::$app->urlManager->createUrl('services/bazi-analysis') ?>" class="btn btn-primary mt-3 mb-5">了解更多</a>
					</div>
					<div class="col-12 col-sm-6 px-0 px-sm-3 mx-auto text-center">
						<img src="../images/service/all-services/service-extra3-cn.jpg" class="img-fluid w-100">
						<a href="javascript:void(0)" class="btn btn-primary mt-3 mb-5">了解更多</a>
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
				<h5 class="modal-title"><?= Yii::t('app', 'BABY NAMING'); ?><?= Yii::t('app', 'ENQUIRY'); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= Url::to(['/enquiry']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Enquiry[service]" value="<?= Yii::t('app', 'BABY NAMING'); ?> Package A">
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
						<label for="enquiry_type" class="col-sm-4 col-form-label text-left text-sm-right">*已出生 / 未出生</label>
						<div class="col-sm-8">
							<select id="enquiry_type" name="Enquiry[info][type]" class="form-control form-control-sm" required>
								<option value="">請選擇一項</option>
								<option value="Born">已出生</option>
								<option value="Preborn">未出生</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_genderA" class="col-sm-4 col-form-label text-left text-sm-right">*寶寶性別</label>
						<div class="col-sm-8">
							<select id="enquiry_genderA" name="Enquiry[info][gender]" class="form-control form-control-sm" required>
								<option value="">請選擇一項</option>
								<option value="Male">男</option>
								<option value="Female">女</option>
								<option value="Twins">雙胞胎</option>
								<option value="Others">其他</option>
							</select>
							<div id="other-gender-textareaA"></div>
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

<div class="modal fade" id="enquiryModalB" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?= Yii::t('app', 'BABY NAMING'); ?><?= Yii::t('app', 'ENQUIRY'); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= Url::to(['/enquiry']) ?>" method="post" role="form">
				<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
				<input type="hidden" name="Enquiry[service]" value="<?= Yii::t('app', 'BABY NAMING'); ?> Package B">
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
						<label for="enquiry_type" class="col-sm-4 col-form-label text-left text-sm-right">*已出生 / 未出生</label>
						<div class="col-sm-8">
							<select id="enquiry_type" name="Enquiry[info][type]" class="form-control form-control-sm" required>
								<option value="">請選擇一項</option>
								<option value="Born">已出生</option>
								<option value="Preborn">未出生</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="enquiry_genderB" class="col-sm-4 col-form-label text-left text-sm-right">*寶寶性別</label>
						<div class="col-sm-8">
							<select id="enquiry_genderB" name="Enquiry[info][gender]" class="form-control form-control-sm" required>
								<option value="">請選擇一項</option>
								<option value="Male">男</option>
								<option value="Female">女</option>
								<option value="Twins">雙胞胎</option>
								<option value="Others">其他</option>
							</select>
							<div id="other-gender-textareaB"></div>
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


