<?php
// priority order: lower to higher
return array(
	'人天' => array(
		'人格生天格' => '對長上孝順，盡忠與長上。服從上司，顧主為義。', //2
		'人格剋天格' => '長上緣薄，或不服上司。自端自行。', //8
		'天格剋人格' => '長上緣薄，勞而無功。有正當之理難以洽通。', //5
		'天格生人格' => '必受父長上寵愛，或有貴人援助。祖先亦有餘德。', //1
		'人格天格相剋' => '與長上緣薄，不服上司，自端自行，勞而無功，有正當之理也難以洽通。', //9 *
		'人格天格相生' => '對長上孝順，盡忠與長上，必受長上寵愛，祖先亦有裕德，常得貴人援助，服從上司，雇主為義。', //11 *
		'特殊狀況' => '特殊狀況 - 當人格與地格數理遇凶時，天格人格則為凶論', //Extra description
		),

	'人地' => array(
		'人格生地格' => '必愛顧子女，與部下或伴侶緣厚。同情部署感情和睦。', //3
		'人格剋地格' => '另一伴或子女緣薄，或與部上不和。多反复不從於事。', //7
		'地格生人格' => '必受子女孝順，或部下之援助。能得賢惠伴侶。', //4
		'地格剋人格' => '子女叛逆，或部下陷害被另一伴剋制或無助力。', //6
		'人格地格相剋' => '另一伴或子女緣薄，子女也較為叛逆，或被另一伴剋制及無助力，也因與部上不和，多反复不從於事，遭受部下陷害。', //10 *
		'人格地格相生' => '愛顧子女，必受子女孝順，與伴侶緣厚，能得賢惠伴侶，得到部下的援助，同情部署感情和睦。', //12 *
		// '特殊狀況' => '特殊狀況 - 當天格與人格數理遇凶時，人格地格則為凶論', //Extra description
		),

	'天人地' => array(
		'天格地格相剋' => '此五行看起来虽然相生,但由于天格五行与地格五行相克(天地相冲),故以凶論。另一伴或子女緣薄,子女也較為叛逆,或被另一伴剋制及無助力,也因與部上不和,多反复不從於事,遭受部下陷害。', // 13
		'天格地格相生' => '此五行看起来虽然相克,但由于天格的五行与地格相生,形成特别格局故可以吉论。愛顧子女,必受子女孝順,與伴侶緣厚,能得賢惠伴侶,得到部下的援助,同情部署感情和睦。', // 14
	// 	'特殊狀況' => '特殊狀況 - 當五行缺乏“金”者', //Extra description
		),
	);