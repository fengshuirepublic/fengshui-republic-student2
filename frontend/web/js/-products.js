'use strict';

const containerItem = document.querySelector('#shopping-cart');

const PRODUCTS_CAT = {
	"water-feature": {
		"header": {
			"cn": "流水饰物",
			"en": "WATER FEATURE"
		},
		"items": [
			{
				"tag": "water-feature-1",
				"imageSet": null,
				"extraClass": null,
				"divider": true,
				"available": true,
				"price": [
					{
						"item_cn": "乾坤运财貔貅流水饰物（大）",
						"item_en": "Perfection of Five Elements: Wealth Pixiu Water-Feature Ornament (big)",
						"cn": "RM 1,980.00（大）",
						"en": "RM 1,980.00 (big)",
						"code": "qkcypxd",
						"value": 1980
					},
					{
						"item_cn": "乾坤运财貔貅流水饰物（中）",
						"item_en": "Perfection of Five Elements: Wealth Pixiu Water-Feature Ornament (medium)",
						"cn": "RM 1,680.00（中）",
						"en": "RM 1,680.00 (medium)",
						"code": "qkcypxx",
						"value": 1680
					}
				],
				"dimension": {
					"cn": "45x45x35cm (大) | 34x34x30cm (中) (尺寸以长x宽x高计算，仅供参考而已)",
					"en": "45x45x35cm (big) | 34x34x30cm (medium) (Dimensions are calculated in length x width x height, only for reference)"
				},
				"title": {
					"cn": "乾坤运财貔貅流水饰物",
					"en": "Perfection of Five Elements: Wealth Pixiu Water-Feature Ornament"
				},
				"desc": {
					"cn": "貔貅属木、灯光属火、陶瓷属土、元宝属金、加上流水就完全符合“五行具足”的吉祥原理，加上逆旋的流水之势起着扭转乾坤的效用！摆放在家中或商宅内的财位不仅能够催起财气，也可通过盘旋流动的水将财气聚集在家中！",
					"en": "Pixiu is an ancient mythical beast believed to be able to retain wealth. This divine beast belongs to the Wood Element. It is composed of the Metal Element (coins), Earth Element (ceramic), Fire Element (light) and Water Element (water). Auspiciously perfected with the Five Elements, the water flows from all directions, with its reverse direction turning the cosmos. Hence, placing the ornament in your house or commercial building will generate and retain the Wealth Qi or Energy."
				},
				"small_img": {
					"cn": "../images/products/item/water-feature/1-small.jpg",
					"en": "../images/products/item/water-feature/1-small.jpg"
				},
				"gallery": [
					{
						"thumbnail_url": null,
						"img_url": "../images/products/item/water-feature/1-1-large.png"
					}
				]
			},
			{
				"tag": "water-feature-2",
				"imageSet": null,
				"extraClass": null,
				"divider": true,
				"available": true,
				"price": [
					{
						"item_cn": "吸水招财吉象",
						"item_en": "Generating & Gathering Wealth: Elephant of Prosperity Water-Feature Ornament",
						"cn": "RM 880.00",
						"en": "RM 880.00",
						"code": "xszcjx",
						"value": 880
					}
				],
				"dimension": {
					"cn": "36x36x41cm (尺寸以长x宽x高计算，仅供参考而已)",
					"en": "36x36x41cm (Dimensions are calculated in length x width x height, only for reference)"
				},
				"title": {
					"cn": "吸水招财吉象",
					"en": "Generating & Gathering Wealth: Elephant of Prosperity Water-Feature Ornament"
				},
				"desc": {
					"cn": "快乐、祥和的大象张开嘴巴吸取“财气”并用鼻子将财气往家宅内牵引，将财气流水往内流而不是往外流，既符合吉祥流水招财法又充满美感，摆放在家中或商宅内的财位可达到招财催财又聚财的良好效果！",
					"en": "Elegantly designed with the principles of Fengshui, this joyous and serene Elephant water-feature ornament uses its mouth to attract the Wealth Energy and channels the energy back via its trunk. Placing the ornament at home or in a commercial building will greatly generate abundance and retain wealth securely in your place."
				},
				"small_img": {
					"cn": "../images/products/item/water-feature/2-small.jpg",
					"en": "../images/products/item/water-feature/2-small.jpg"
				},
				"gallery": [
					{
						"thumbnail_url": null,
						"img_url": "../images/products/item/water-feature/2-1-large.png"
					}
				]
			},
			{
				"tag": "water-feature-3",
				"imageSet": null,
				"extraClass": null,
				"divider": false,
				"available": true,
				"price": [
					{
						"item_cn": "“祥和聚宝”流水饰物",
						"item_en": "Modern Water Features",
						"cn": "RM 680.00",
						"en": "RM 680.00",
						"code": "xhjb",
						"value": 680
					}
				],
				"dimension": {
					"cn": "23x23x20cm (尺寸以长x宽x高计算，仅供参考而已)",
					"en": "23x23x20cm (Dimensions are calculated in length x width x height, only for reference)"
				},
				"title": {
					"cn": "“祥和聚宝”流水饰物",
					"en": "Modern Water Features"
				},
				"desc": {
					"cn": "新颖的流水饰物打破了传统的设计观念，在小小的居家空间里也可以展现出独特的格调。小型流水饰物除了可以适当得摆放在家中财位引动财气，祥和的流水声更可令身心舒畅。",
					"en": "A new, modern water feature ornament that differs from traditional design, and one that can display its unique elegance even in a small living space. Of the small water feature ornament is placed in the right Wealth Position, it can activate the wealth energy in the house. Its serene water sound and graceful light will generate tranquil, harmonious atmosphere in the household. With refined glasswork, and delicate ceramic craftmanship, this water feature ornament will be your first choice to increase the aesthetic and taste of your household."
				},
				"small_img": {
					"cn": "../images/products/item/water-feature/3-small.jpg",
					"en": "../images/products/item/water-feature/3-small.jpg"
				},
				"gallery": [
					{
						"thumbnail_url": null,
						"img_url": "../images/products/item/water-feature/3-1-large.png"
					}
				]
			}
		]
	},
	"primordial-spirit": {
		"header": {
			"cn": "命名文昌印",
			"en": "PRIMORDIAL SPIRIT"
		},
		"items": [
			{
				"tag": "primordial-spirit-1",
				"imageSet": "ps1",
				"extraClass": null,
				"divider": true,
				"available": true,
				"price": [
					{
						"item_cn": "胎毛筆相框",
						"item_en": "Baby Hair Brush Prosperous Frame",
						"cn": "RM 680.00",
						"en": "RM 680.00",
						"code": "tmb",
						"value": 680
					}
				],
				"dimension": {
					"cn": "34x26.5cm (尺寸以长x高计算，仅供参考而已)",
					"en": "34x26.5cm (Dimensions are calculated in length x height, only for reference)"
				},
				"title": {
					"cn": "胎毛筆相框",
					"en": "Baby Hair Brush Prosperous Frame"
				},
				"desc": {
					"cn": "套组包括高品质实木相框，传统手工制作胎毛笔，名字及照片印刷。",
					"en": "Package includes hand-made wooden frame using traditional craftsmanship, hair brush and baby name poem, and printed baby name and photo."
				},
				"small_img": {
					"cn": "../images/products/item/primordial-spirit/1-small.png",
					"en": "../images/products/item/primordial-spirit/1-small.png"
				},
				"gallery": [
					{
						"thumbnail_url": "../images/products/item/primordial-spirit/1-1-thumb.jpg",
						"img_url": "../images/products/item/primordial-spirit/1-1-large.jpg"
					},
					{
						"thumbnail_url": "../images/products/item/primordial-spirit/1-2-thumb.jpg",
						"img_url": "../images/products/item/primordial-spirit/1-2-large.jpg"
					}
				]
			},
			{
				"tag": "primordial-spirit-2",
				"imageSet": "ps2",
				"extraClass": null,
				"divider": true,
				"available": true,
				"price": [
					{
						"item_cn": "臍帶章相框",
						"item_en": "Umbilical Cord Seal Prosperous Frame",
						"cn": "RM 688.00",
						"en": "RM 688.00",
						"code": "qdz",
						"value": 688
					}
				],
				"dimension": {
					"cn": "34x26.5cm (尺寸以长x高计算，仅供参考而已)",
					"en": "34x26.5cm (Dimensions are calculated in length x height, only for reference)"
				},
				"title": {
					"cn": "臍帶章相框",
					"en": "Umbilical Cord Seal Prosperous Frame"
				},
				"desc": {
					"cn": "套组包括高品质实木相框，精美脐带章，名字及照片印刷。",
					"en": "Package includes hand-made wooden frame using traditional craftsmanship, exquisite umbilical cord seal, baby name poem, and printed baby name and photo."
				},
				"small_img": {
					"cn": "../images/products/item/primordial-spirit/2-small.png",
					"en": "../images/products/item/primordial-spirit/2-small.png"
				},
				"gallery": [
					{
						"thumbnail_url": "../images/products/item/primordial-spirit/2-1-thumb.jpg",
						"img_url": "../images/products/item/primordial-spirit/2-1-large.jpg"
					},
					{
						"thumbnail_url": "../images/products/item/primordial-spirit/2-2-thumb.jpg",
						"img_url": "../images/products/item/primordial-spirit/2-2-large.jpg"
					}
				]
			},
			{
				"tag": "primordial-spirit-3",
				"imageSet": "ps3",
				"extraClass": null,
				"divider": true,
				"available": true,
				"price": [
					{
						"item_cn": "臍帶章胎毛筆相框",
						"item_en": "Umbilical Cord Seal & Baby Hair Brush Prosperous Frame",
						"cn": "RM 1,188.00",
						"en": "RM 1,188.00",
						"code": "qdztmb",
						"value": 1188
					}
				],
				"dimension": {
					"cn": "39x30cm (尺寸以长x高计算，仅供参考而已)",
					"en": "39x30cm (Dimensions are calculated in length x height, only for reference)"
				},
				"title": {
					"cn": "臍帶章胎毛筆相框",
					"en": "Umbilical Cord Seal & Baby Hair Brush Prosperous Frame"
				},
				"desc": {
					"cn": "套组包括高品质实木相框，传统手工制作胎毛笔，精美脐带章，名字及照片印刷。",
					"en": "Package includes hand-made wooden frame using traditional craftsmanship, hair brush made by traditional craftsmanship, exquisite umbilical cord seal, and printed baby name and photo."
				},
				"small_img": {
					"cn": "../images/products/item/primordial-spirit/3-small.png",
					"en": "../images/products/item/primordial-spirit/3-small.png"
				},
				"gallery": [
					{
						"thumbnail_url": "../images/products/item/primordial-spirit/3-1-thumb.jpg",
						"img_url": "../images/products/item/primordial-spirit/3-1-large.jpg"
					},
					{
						"thumbnail_url": "../images/products/item/primordial-spirit/3-2-thumb.jpg",
						"img_url": "../images/products/item/primordial-spirit/3-2-large.jpg"
					},
					{
						"thumbnail_url": "../images/products/item/primordial-spirit/3-3-thumb.jpg",
						"img_url": "../images/products/item/primordial-spirit/3-3-large.jpg"
					}
				]
			},
			{
				"tag": "primordial-spirit-4",
				"imageSet": "ps4",
				"extraClass": null,
				"divider": true,
				"available": true,
				"price": [
					{
						"item_cn": "臍帶章胎毛筆豪華相框",
						"item_en": "Umbilical Cord Seal & Baby Hair Brush Prosperous Frame (Deluxe Package)",
						"cn": "RM 2,388.00",
						"en": "RM 2,388.00",
						"code": "qdztmbhh",
						"value": 2388
					}
				],
				"dimension": {
					"cn": "45x75cm (尺寸以长x高计算，仅供参考而已)",
					"en": "45x75cm (Dimensions are calculated in length x height, only for reference)"
				},
				"title": {
					"cn": "臍帶章胎毛筆豪華相框",
					"en": "Umbilical Cord Seal & Baby Hair Brush Prosperous Frame (Deluxe Package)"
				},
				"desc": {
					"cn": "套组包括高品质实木相框，传统手工制作胎毛笔，精美脐带章，弥足珍贵手足印，名字提诗，名字及照片印刷。",
					"en": "Package includes hand-made wooden frame using traditional craftsmanship, hair brush, exquisite umbilical cord seal and precious hand and foot mold, baby name poem, and printed baby name and photo."
				},
				"small_img": {
					"cn": "../images/products/item/primordial-spirit/4-small.png",
					"en": "../images/products/item/primordial-spirit/4-small.png"
				},
				"gallery": [
					{
						"thumbnail_url": "../images/products/item/primordial-spirit/4-1-thumb.jpg",
						"img_url": "../images/products/item/primordial-spirit/4-1-large.jpg"
					},
					{
						"thumbnail_url": "../images/products/item/primordial-spirit/4-2-thumb.jpg",
						"img_url": "../images/products/item/primordial-spirit/4-2-large.jpg"
					},
					{
						"thumbnail_url": "../images/products/item/primordial-spirit/4-3-thumb.jpg",
						"img_url": "../images/products/item/primordial-spirit/4-3-large.jpg"
					}
				]
			},
			{
				"tag": "primordial-spirit-5",
				"imageSet": null,
				"extraClass": null,
				"divider": true,
				"available": true,
				"price": [
					{
						"item_cn": "元神文昌印",
						"item_en": "Primordial Spirit-Academy Star Seal",
						"cn": "RM 1080.00",
						"en": "RM 1080.00",
						"code": "yswcy",
						"value": 1080
					}
				],
				"dimension": {
					"cn": "37x37x10cm (尺寸以长x宽x高计算，仅供参考而已)",
					"en": "37x37x10cm (Dimensions are calculated in length x width x height, only for reference)"
				},
				"title": {
					"cn": "元神文昌印",
					"en": "Primordial Spirit-Academy Star Seal"
				},
				"desc": {
					"cn": "宝宝的出生对父母来说都是非常的重要及珍贵的时刻，天下父母都希望自己的儿女可以聪明伶俐、身体健康！古时人们会将宝宝的胎毛及脐带制作成胎毛笔及文昌印，希望孩子长大后能够乖巧聪明、学业、事业及官运亨通！龙岩风水延续古人的智慧，将孩子最纯洁干净的胎毛及脐带制作成能够永久珍藏的“元神文昌印”，除了寄寓了父母对孩子的祝福与期望，也能让长大成人的孩子了解父母对自己从出生到成长的爱意！",
					"en": "The birth of a baby is a parent’s most precious moment, and the greatest wish for the baby is to be happy and healthy.<br/>The ancient Chinese use the child’s first haircut to make writing brush and umbilical cord for making the Academy Star Seal. They believe that this will enhance the baby’s health and future intellectual achievements. Fengshui Republic upholds this ancient practice by using the baby’s first cut hair and umbilical cord to fashion the Primordial Spirit Academy Star Brush and Seal - the parents’ first gift of love and blessing to the child."
				},
				"small_img": {
					"cn": "../images/products/item/primordial-spirit/5-small.jpg",
					"en": "../images/products/item/primordial-spirit/5-small.jpg"
				},
				"gallery": [
					{
						"thumbnail_url": null,
						"img_url": "../images/products/item/primordial-spirit/5-1-large.jpg"
					}
				]
			},
			{
				"tag": "primordial-spirit-6",
				"imageSet": null,
				"extraClass": null,
				"divider": false,
				"available": true,
				"price": [
					{
						"item_cn": "睡岁平安枕",
						"item_en": "Well-Being Pillow",
						"cn": "RM 38.00",
						"en": "RM 38.00",
						"code": "sspa",
						"value": 38
					}
				],
				"dimension": {
					"cn": "14x31cm (尺寸以长x高计算，仅供参考而已)",
					"en": "14x31cm (Dimensions are calculated in length x height, only for reference)"
				},
				"title": {
					"cn": "睡岁平安枕",
					"en": "Well-Being Pillow"
				},
				"desc": {
					"cn": "根据传统，古时父母为了让孩子能够一觉到天明都会使用米或豆壳制作称为“压惊枕”的小枕头给孩子，除了能让宝宝在睡觉时不易受惊并更有安全感，也祝福及期望孩子能够欢喜、快乐、平安及健康！",
					"en": "In the old days, for the child to have a good night sleep, parents would prepare a specially made small pillow for the child. The pillow would be filled with rice and bean sprout kernels, and it can help the baby to sleep tight without awakening in shock. Named Well-Being Pillow, this is a gift for the baby to be happy and healthy."
				},
				"small_img": {
					"cn": "../images/products/item/primordial-spirit/6-small.jpg",
					"en": "../images/products/item/primordial-spirit/6-small.jpg"
				},
				"gallery": [
					{
						"thumbnail_url": null,
						"img_url": "../images/products/item/primordial-spirit/6-1-large.jpg"
					}
				]
			}
		]
	},
	"qimen-dunjia": {
		"header": {
			"cn": "奇門本命財位",
			"en": "QIMEN DUNJIA"
		},
		"items": [
			{
				"tag": "qimen-dunjia-1",
				"imageSet": "qm1",
				"extraClass": null,
				"divider": false,
				"available": true,
				"price": [
					{
						"item_cn": "奇门遁甲 - 本命财局（红）",
						"item_en": "Qimen Dunjia: Determining Personal Wealth Position (red)",
						"cn": "RM 4,880.00（红）",
						"en": "RM 4,880.00 (red)",
						"code": "qmdjr",
						"value": 4880
					},
					{
						"item_cn": "奇门遁甲 - 本命财局（黄）",
						"item_en": "Qimen Dunjia: Determining Personal Wealth Position (yellow)",
						"cn": "RM 4,880.00（黄）",
						"en": "RM 4,880.00 (yellow)",
						"code": "qmdjy",
						"value": 4880
					},
					{
						"item_cn": "奇门遁甲 - 本命财局（白）",
						"item_en": "Qimen Dunjia: Determining Personal Wealth Position (white)",
						"cn": "RM 4,880.00（白）",
						"en": "RM 4,880.00 (white)",
						"code": "qmdjw",
						"value": 4880
					},
					{
						"item_cn": "奇门遁甲 - 本命财局（黑）",
						"item_en": "Qimen Dunjia: Determining Personal Wealth Position (black)",
						"cn": "RM 4,880.00（黑）",
						"en": "RM 4,880.00 (black)",
						"code": "qmdjb",
						"value": 4880
					},
					{
						"item_cn": "奇门遁甲 - 本命财局（绿）",
						"item_en": "Qimen Dunjia: Determining Personal Wealth Position (green)",
						"cn": "RM 4,880.00（绿）",
						"en": "RM 4,880.00 (green)",
						"code": "qmdjg",
						"value": 4880
					}
				],
				"dimension": {
					"cn": "22x22x23cm (尺寸以长x宽x高计算，仅供参考而已)",
					"en": "22x22x23cm (Dimensions are calculated in length x width x height, only for reference)"
				},
				"title": {
					"cn": "奇门遁甲 - 本命财局",
					"en": "Qimen Dunjia: Determining Personal Wealth Position"
				},
				"desc": {
					"cn": "根据奇门遁甲，从个人八字中可推算出属于自己的本命财位，只要在所在方位布“本命财局”就能够达到催起自身财气的良好效果。“本命财局”并不只是水晶那么简单，而是利用水晶能量配合：天时（择日）、人和（八字）及地利（方位）才能达到催起财运的良好效果！我们将根据你的八字找到专属的财运方位，并指导你摆放自己的五行水晶颜色，加上师傅的加持与择日便能够够启动、催起专属自己的本命财局！",
					"en": "Qimen Dunjia is an ancient Chinese system used to calculate the best positions for strategies and decisions. Based on one’s Bazi (birth year, month, date and hour), we can discover our personal wealth position to attract abundance and prosperity. Through date selection, Bazi and geo-positioning, we can locate our wealth position. We will be able to receive the master’s blessings by using the right crystal color, while the accurate date selection seeks to welcome wealth into our lives."
				},
				"small_img": {
					"cn": "../images/products/item/qimen-dunjia/1-small.png",
					"en": "../images/products/item/qimen-dunjia/1-small.png"
				},
				"gallery": [
					{
						"thumbnail_url": "../images/products/item/qimen-dunjia/1-1-thumb.jpg",
						"img_url": "../images/products/item/qimen-dunjia/1-1-large.jpg"
					},
					{
						"thumbnail_url": "../images/products/item/qimen-dunjia/1-2-thumb.jpg",
						"img_url": "../images/products/item/qimen-dunjia/1-2-large.png"
					},
					{
						"thumbnail_url": "../images/products/item/qimen-dunjia/1-3-thumb.jpg",
						"img_url": "../images/products/item/qimen-dunjia/1-3-large.png"
					},
					{
						"thumbnail_url": "../images/products/item/qimen-dunjia/1-4-thumb.jpg",
						"img_url": "../images/products/item/qimen-dunjia/1-4-large.png"
					},
					{
						"thumbnail_url": "../images/products/item/qimen-dunjia/1-5-thumb.jpg",
						"img_url": "../images/products/item/qimen-dunjia/1-5-large.png"
					},
					{
						"thumbnail_url": "../images/products/item/qimen-dunjia/1-6-thumb.jpg",
						"img_url": "../images/products/item/qimen-dunjia/1-6-large.png"
					}
				]
			}
		]
	},
	"fulushou": {
		"header": {
			"cn": "福禄寿",
			"en": "FU LU SHOU"
		},
		"items": [
			{
				"tag": "fulushou-1",
				"imageSet": null,
				"extraClass": null,
				"divider": false,
				"available": true,
				"price": [
					{
						"item_cn": "福禄寿",
						"item_en": "Fu Lu Shou",
						"cn": "RM 4,880.00",
						"en": "RM 4,880.00",
						"code": "fls",
						"value": 4880
					}
				],
				"dimension": {
					"cn": "30x25x60cm (尺寸以长x宽x高计算，仅供参考而已)",
					"en": "30x25x60cm (Dimensions are calculated in length x width x height, only for reference)"
				},
				"title": {
					"cn": "福禄寿",
					"en": "Fu Lu Shou"
				},
				"desc": {
					"cn": "福禄寿乃华人最受欢迎的三个福神，分别是福星、祿星、壽星三位星君的合稱。又稱「財子壽」、「三星」、「三仙」，象徵財富、功名、長壽。我们的福禄寿历经数十道工艺，纯手工雕塑，色彩经125度高温烧制，肤色形象逼真，歷久彌新。三位福神神态雕刻逼真传神，格调高雅大方。适合摆放于玄关、客厅或饭厅，为居家环境带来吉祥气场。<br/>福禄寿需用时两个月的批货送达，准备齐全之后，我们的专员会通知您亲临我们的办公室领取。",
					"en": "Among the Chinese gods of good fortune, Fu, Lu and Shou, also known as the Three Stars are the three most popular celestial gods. Personification of three heavenly bodies, Fu symbolizes prosperity and abundance, Lu brings forth success and good reputation, while Shou is the god of longevity.<br/>Our statues of Three Stars are fully hand crafted with multiple meticulous processes, then fired under 125 degrees to make the gods look realistic, refined and elegant. The statues are suitable to be placed at the house entrance, or in the dining and living rooms to generate auspicious energy for the household.<br/>It will take two months for processing, you will be informed while the FU LU SHOU is ready to collect in our office."
				},
				"small_img": {
					"cn": "../images/products/item/fulushou/1-small.jpg",
					"en": "../images/products/item/fulushou/1-small.jpg"
				},
				"gallery": [
					{
						"thumbnail_url": null,
						"img_url": "../images/products/item/fulushou/1-1-large.jpg"
					}
				]
			}
		]
	},
	"auspicious-marriage-article": {
		"header": {
			"cn": "婚嫁配套",
			"en": "AUSPICIOUS MARRIAGE ARTICLE"
		},
		"items": [
			{
				"tag": "auspicious-marriage-article-1",
				"imageSet": null,
				"extraClass": null,
				"divider": false,
				"available": false,
				"price": [
					{
						"item_cn": null,
						"item_en": null,
						"cn": "RM 488.00",
						"en": "RM 488.00",
						"code": "hjwp",
						"value": 488
					}
				],
				"dimension": null,
				"title": {
					"cn": "婚嫁配套",
					"en": "AUSPICIOUS MARRIAGE ARTICLE"
				},
				"desc": {
					"cn": "从过大礼、安床、嫁妆至出嫁拜堂所需的基本用品，让新人不必伤脑筋我们一次帮你准备好！配套中一共20樣婚嫁用品意義非凡，除了讓新人了解中華文化美德，也讓傳統得到傳承。",
					"en": "Looking for the necessary items from betrothal to wedding bed set-up, from dowry to main wedding ceremony? Look no further! We provide one-stop service for all you need for your wedding. Our package includes 20 items for wedding ceremony, each has its own unique significance and symbolism. The newly-weds will also learn the virtues of Chinese culture to pass on the tradition."
				},
				"small_img": {
					"cn": "../images/products/item/auspicious-marriage-article/1-small.png",
					"en": "../images/products/item/auspicious-marriage-article/1-small.png"
				},
				"gallery": [
					{
						"thumbnail_url": null,
						"img_url": "../images/products/item/auspicious-marriage-article/1-1-large.jpg"
					}
				]
			}
		]
	},
	"magazine": {
		"header": {
			"cn": "雜誌類",
			"en": "MAGAZINE"
		},
		"items": [
			{
				"tag": "residential-fengshui-set",
				"imageSet": null,
				"extraClass": null,
				"divider": true,
				"available": true,
				"price": [
					{
						"item_cn": "居家风水 - 内外局篇（组合）优惠价",
						"item_en": "Residential Fengshui Interior & Exterior (Promotions)",
						"cn": "RM 100.00",
						"en": "RM 100.00",
						"code": "jjfs2019set",
						"value": 100
					}
				],
				"dimension": null,
				"title": {
					"cn": "居家风水 - 内外局篇（组合）优惠价",
					"en": "Residential Fengshui Interior & Exterior (Promotions)"
				},
				"desc": {
					"cn": "羅一鳴師傅傾力著作，深入淺出教導正統風水，最齊全完善居家風水寶典！<br/>圖文並茂，讓你一目了然！看完絕對加深你對風水之見解！",
					"en": "The great works of Master Louis Loh. He is the most influential Fengshui grand master in Asia. Be worth mentioning, this book presenting Fengshui as simple and easy to understand, even it's very profound metaphysics. It's totally a perfect collection with most complete Residential Fengshui. They are both excellent with the graphics and texts, which can make you read at a glance. For sure, you definitely benifitting greatly after discover more about Fengshui by this book!"
				},
				"small_img": {
					"cn": "../images/products/item/magazine/fs2019set-small.png",
					"en": "../images/products/item/magazine/fs2019set-small.png"
				},
				"gallery": [
					{
						"thumbnail_url": null,
						"img_url": "../images/products/item/magazine/fs2019set-large.jpg"
					}
				]
			},
			{
				"tag": "residential-fengshui-exterior",
				"imageSet": null,
				"extraClass": null,
				"divider": true,
				"available": true,
				"price": [
					{
						"item_cn": "居家风水 - 外局篇",
						"item_en": "Residential Fengshui For Exterior",
						"cn": "RM 59.00",
						"en": "RM 59.00",
						"code": "jjfs2019ext",
						"value": 59
					}
				],
				"dimension": null,
				"title": {
					"cn": "居家风水 - 外局篇",
					"en": "Residential Fengshui For Exterior"
				},
				"desc": {
					"cn": "羅一鳴師傅傾力著作，深入淺出教導正統風水，最齊全完善居家風水寶典！<br/>圖文並茂，讓你一目了然！看完絕對加深你對風水之見解！",
					"en": "The great works of Master Louis Loh. He is the most influential Fengshui grand master in Asia. Be worth mentioning, this book presenting Fengshui as simple and easy to understand, even it's very profound metaphysics. It's totally a perfect collection with most complete Residential Fengshui. They are both excellent with the graphics and texts, which can make you read at a glance. For sure, you definitely benifitting greatly after discover more about Fengshui by this book!"
				},
				"small_img": {
					"cn": "../images/products/item/magazine/fs2019ext-small.png",
					"en": "../images/products/item/magazine/fs2019ext-small.png"
				},
				"gallery": [
					{
						"thumbnail_url": null,
						"img_url": "../images/products/item/magazine/fs2019ext-large.jpg"
					}
				]
			},
			{
				"tag": "residential-fengshui-interior",
				"imageSet": null,
				"extraClass": null,
				"divider": true,
				"available": true,
				"price": [
					{
						"item_cn": "居家风水 - 內局篇",
						"item_en": "Residential Fengshui For Interior",
						"cn": "RM 59.00",
						"en": "RM 59.00",
						"code": "jjfs2019int",
						"value": 59
					}
				],
				"dimension": null,
				"title": {
					"cn": "居家风水 - 內局篇",
					"en": "Residential Fengshui For Interior"
				},
				"desc": {
					"cn": "羅一鳴師傅傾力著作，深入淺出教導正統風水，最齊全完善居家風水寶典！<br/>圖文並茂，讓你一目了然！看完絕對加深你對風水之見解！",
					"en": "The great works of Master Louis Loh. He is the most influential Fengshui grand master in Asia. Be worth mentioning, this book presenting Fengshui as simple and easy to understand, even it's very profound metaphysics. It's totally a perfect collection with most complete Residential Fengshui. They are both excellent with the graphics and texts, which can make you read at a glance. For sure, you definitely benifitting greatly after discover more about Fengshui by this book!"
				},
				"small_img": {
					"cn": "../images/products/item/magazine/fs2019int-small.png",
					"en": "../images/products/item/magazine/fs2019int-small.png"
				},
				"gallery": [
					{
						"thumbnail_url": null,
						"img_url": "../images/products/item/magazine/fs2019int-large.jpg"
					}
				]
			},
			{
				"tag": "magazine-yb2019",
				"imageSet": null,
				"extraClass": null,
				"divider": true,
				"available": false,
				"price": [
					{
						"item_cn": "2019己亥猪年【開運招財萬事通】（中文）",
						"item_en": "Fengshui And Zodiac For Year 2019 (cn)",
						"cn": "RM 13.80（中文）",
						"en": "RM 13.80 (cn)",
						"code": "yb2019cn",
						"value": 13.8
					},
					{
						"item_cn": "2019己亥猪年【開運招財萬事通】（英文）",
						"item_en": "Fengshui And Zodiac For Year 2019 (en)",
						"cn": "RM 16.80（英文）",
						"en": "RM 16.80 (en)",
						"code": "yb2019en",
						"value": 16.8
					}
				],
				"dimension": null,
				"title": {
					"cn": "2019己亥猪年【開運招財萬事通】",
					"en": "Fengshui And Zodiac For Year 2019"
				},
				"desc": {
					"cn": "想了解己亥豬年的流年運勢，在新的一年里做出正確的規劃嗎？己亥豬流年運勢大預言，讓您在事情還未發生前未雨綢繆！想知道自己在己亥豬年里的，財運、健康、感情及事業運嗎？",
					"en": "Finally our first ever English version 2019 yearbook is out! Gets the right planning for upcoming the year of Water Pig.<br/>Wish to know your own wealth, health, romance and career luck in the year of Water Pig? 12 Zodiacs analysis reveal yours overall luck and destiny in this year. Longing for a year full of wealth and prosperity? Activating and further enhancing your Wealth, Career, Romance and Academic sector in your residential through applying the correct Feng Shui. Know the meaning of Chinese New Year traditions and customs? Stories behind every cultural heritage of Chinese New Year are revealed! A good date for moving, marriage, travel, renovation and do business? The metaphysics of auspicious date selection is simplified for your conveniences to pick a good date any moment you wish for it."
				},
				"small_img": {
					"cn": "../images/products/item/magazine/yb2019-cn-small.png",
					"en": "../images/products/item/magazine/yb2019-en-small.png"
				},
				"gallery": [
					{
						"thumbnail_url": null,
						"img_url": "../images/products/item/magazine/yb2019-cn-large.jpg"
					},
					{
						"thumbnail_url": null,
						"img_url": "../images/products/item/magazine/yb2019-en-large.jpg"
					}
				]
			},
			{
				"tag": "magazine-ts2019",
				"imageSet": null,
				"extraClass": null,
				"divider": true,
				"available": false,
				"price": [
					{
						"item_cn": null,
						"item_en": null,
						"cn": "RM 16.80",
						"en": "RM 16.80",
						"code": "zsts2019",
						"value": 16.8
					}
				],
				"dimension": null,
				"title": {
					"cn": "桌上通勝 2019",
					"en": "2019 Fengshui Deskstop Almanac"
				},
				"desc": {
					"cn": "上述正统择日学的正确步骤及方法，但为了更方便大家能够为自己或亲友选择良辰吉日来进行任何大型活动，龙岩风水特别推出了现代“桌上通胜”，所有的吉凶日、日冲谁及可用吉时都明确的利用简单易懂的符号标示，务必让人对吉凶时间及日子一目了然！",
					"en": "Wish to know the right and auspicious date for your major events, but always thought that the Chinese art of Date Selection is too complicated? Introducing the Fengshui Republic’s 2019 Desktop Alamac, where you can check for the auspicious and inauspicious date and hour through simple steps.<br/>This desktop almanac not only has all the vital auspicious date and time, at the back there are useful information on the yearly Flying Stars and the Nine Palace diagrams that you can utilize easily to welcome good fortune to your household. Simplifying the arcane method of Fengshui and Date Selection and making this knowledge accessible to all, Master Loh’s Desktop Almanac is your first choice to select dates of good fortune in your life."
				},
				"small_img": {
					"cn": "../images/products/item/magazine/2019-calendar-small.png",
					"en": "../images/products/item/magazine/2019-calendar-small.png"
				},
				"gallery": [
					{
						"thumbnail_url": null,
						"img_url": "../images/products/item/magazine/2019-calendar-large.jpg"
					}
				]
			},
			{
				"tag": "magazine-hj",
				"imageSet": null,
				"extraClass": null,
				"divider": true,
				"available": false,
				"price": [
					{
						"item_cn": null,
						"item_en": null,
						"cn": "RM 10.00",
						"en": "RM 10.00",
						"code": "hjmwwj",
						"value": 10
					}
				],
				"dimension": null,
				"title": {
					"cn": "黃金滿屋外局篇",
					"en": "Fengshui For Exterior"
				},
				"desc": {
					"cn": "风水学是迷信吗？<br/>以正统的方法，教导正确的风水学，厘清不必要的谬误！<br/>摆放镜子能解决路冲所带来的煞气吗？教导大家简单实用的方法化煞，把风水简单化却不幼稚化！",
					"en": "Actual visible surroundings, such as mountains, landscape, waterways and buildings are considered as external environment. Can you define whether it is good for your property, or a invisible harmness to your family? Feng Shui is all about channelling and balancing energies in our living environment in ways that reduces stress and strengthen our sense of well-being. So, identify your property external environment now with the guide of this book."
				},
				"small_img": {
					"cn": "../images/products/item/magazine/fengshui-for-exterior-small.png",
					"en": "../images/products/item/magazine/fengshui-for-exterior-small.png"
				},
				"gallery": [
					{
						"thumbnail_url": null,
						"img_url": "../images/products/item/magazine/fengshui-for-exterior-large.jpg"
					}
				]
			},
			{
				"tag": "magazine-1",
				"imageSet": null,
				"extraClass": "pb-md-3",
				"divider": false,
				"available": false,
				"price": [
					{
						"item_cn": null,
						"item_en": null,
						"cn": "RM 10.00",
						"en": "RM 10.00",
						"code": "vol01",
						"value": 10
					}
				],
				"dimension": null,
				"title": {
					"cn": "《名人风水》第1期雜誌",
					"en": "Fengshui Magazine Vol. 1"
				},
				"desc": {
					"cn": "《名人風水》一共出版10期，是國內首創第一本結合名人、風水、面相、八字、生活時尚及國際時事的風水雜誌，內容豐富多元。雜誌每一期都會通過各领域热点人物，为读者提供正統風水觀念，提升人生智慧，揭示成功秘诀。",
					"en": "Fengshui Republic Magazine is now in its 10th issue. This is the first Fengshui magazine that contains a wealth of diverse contents, from celebrities to Fengshui, from face-reading to Bazi, from lifestyle to international affairs.<br/>The magazine will introduce the readers genuine Fengshui concepts through renown figures of different fields, allowing the readers access to the wisdom of life and secret of success."
				},
				"small_img": {
					"cn": "../images/products/item/magazine/volume-01-small.png",
					"en": "../images/products/item/magazine/volume-01-small.png"
				},
				"gallery": [
					{
						"thumbnail_url": null,
						"img_url": "../images/products/item/magazine/volume-01-large.jpg"
					}
				]
			},
			{
				"tag": "magazine-2",
				"imageSet": null,
				"extraClass": "py-md-3",
				"divider": false,
				"available": false,
				"price": [
					{
						"item_cn": null,
						"item_en": null,
						"cn": "RM 10.00",
						"en": "RM 10.00",
						"code": "vol01",
						"value": 10
					}
				],
				"dimension": null,
				"title": {
					"cn": "《名人风水》第2期雜誌",
					"en": "Fengshui Magazine Vol. 2"
				},
				"desc": {
					"cn": "《名人風水》一共出版10期，是國內首創第一本結合名人、風水、面相、八字、生活時尚及國際時事的風水雜誌，內容豐富多元。雜誌每一期都會通過各领域热点人物，为读者提供正統風水觀念，提升人生智慧，揭示成功秘诀。",
					"en": "Fengshui Republic Magazine is now in its 10th issue. This is the first Fengshui magazine that contains a wealth of diverse contents, from celebrities to Fengshui, from face-reading to Bazi, from lifestyle to international affairs.<br/>The magazine will introduce the readers genuine Fengshui concepts through renown figures of different fields, allowing the readers access to the wisdom of life and secret of success."
				},
				"small_img": {
					"cn": "../images/products/item/magazine/volume-02-small.png",
					"en": "../images/products/item/magazine/volume-02-small.png"
				},
				"gallery": [
					{
						"thumbnail_url": null,
						"img_url": "../images/products/item/magazine/volume-02-large.jpg"
					}
				]
			},
			{
				"tag": "magazine-3",
				"imageSet": null,
				"extraClass": "py-md-3",
				"divider": false,
				"available": false,
				"price": [
					{
						"item_cn": null,
						"item_en": null,
						"cn": "RM 10.00",
						"en": "RM 10.00",
						"code": "vol03",
						"value": 10
					}
				],
				"dimension": null,
				"title": {
					"cn": "《名人风水》第3期雜誌",
					"en": "Fengshui Magazine Vol. 3"
				},
				"desc": {
					"cn": "《名人風水》一共出版10期，是國內首創第一本結合名人、風水、面相、八字、生活時尚及國際時事的風水雜誌，內容豐富多元。雜誌每一期都會通過各领域热点人物，为读者提供正統風水觀念，提升人生智慧，揭示成功秘诀。",
					"en": "Fengshui Republic Magazine is now in its 10th issue. This is the first Fengshui magazine that contains a wealth of diverse contents, from celebrities to Fengshui, from face-reading to Bazi, from lifestyle to international affairs.<br/>The magazine will introduce the readers genuine Fengshui concepts through renown figures of different fields, allowing the readers access to the wisdom of life and secret of success."
				},
				"small_img": {
					"cn": "../images/products/item/magazine/volume-03-small.png",
					"en": "../images/products/item/magazine/volume-03-small.png"
				},
				"gallery": [
					{
						"thumbnail_url": null,
						"img_url": "../images/products/item/magazine/volume-03-large.jpg"
					}
				]
			},
			{
				"tag": "magazine-4",
				"imageSet": null,
				"extraClass": "py-md-3",
				"divider": false,
				"available": false,
				"price": [
					{
						"item_cn": null,
						"item_en": null,
						"cn": "RM 10.00",
						"en": "RM 10.00",
						"code": "vol04",
						"value": 10
					}
				],
				"dimension": null,
				"title": {
					"cn": "《名人风水》第4期雜誌",
					"en": "Fengshui Magazine Vol. 4"
				},
				"desc": {
					"cn": "《名人風水》一共出版10期，是國內首創第一本結合名人、風水、面相、八字、生活時尚及國際時事的風水雜誌，內容豐富多元。雜誌每一期都會通過各领域热点人物，为读者提供正統風水觀念，提升人生智慧，揭示成功秘诀。",
					"en": "Fengshui Republic Magazine is now in its 10th issue. This is the first Fengshui magazine that contains a wealth of diverse contents, from celebrities to Fengshui, from face-reading to Bazi, from lifestyle to international affairs.<br/>The magazine will introduce the readers genuine Fengshui concepts through renown figures of different fields, allowing the readers access to the wisdom of life and secret of success."
				},
				"small_img": {
					"cn": "../images/products/item/magazine/volume-04-small.png",
					"en": "../images/products/item/magazine/volume-04-small.png"
				},
				"gallery": [
					{
						"thumbnail_url": null,
						"img_url": "../images/products/item/magazine/volume-04-large.jpg"
					}
				]
			},
			{
				"tag": "magazine-5",
				"imageSet": null,
				"extraClass": "py-md-3",
				"divider": false,
				"available": false,
				"price": [
					{
						"item_cn": null,
						"item_en": null,
						"cn": "RM 10.00",
						"en": "RM 10.00",
						"code": "vol05",
						"value": 10
					}
				],
				"dimension": null,
				"title": {
					"cn": "《名人风水》第5期雜誌",
					"en": "Fengshui Magazine Vol. 5"
				},
				"desc": {
					"cn": "《名人風水》一共出版10期，是國內首創第一本結合名人、風水、面相、八字、生活時尚及國際時事的風水雜誌，內容豐富多元。雜誌每一期都會通過各领域热点人物，为读者提供正統風水觀念，提升人生智慧，揭示成功秘诀。",
					"en": "Fengshui Republic Magazine is now in its 10th issue. This is the first Fengshui magazine that contains a wealth of diverse contents, from celebrities to Fengshui, from face-reading to Bazi, from lifestyle to international affairs.<br/>The magazine will introduce the readers genuine Fengshui concepts through renown figures of different fields, allowing the readers access to the wisdom of life and secret of success."
				},
				"small_img": {
					"cn": "../images/products/item/magazine/volume-05-small.png",
					"en": "../images/products/item/magazine/volume-05-small.png"
				},
				"gallery": [
					{
						"thumbnail_url": null,
						"img_url": "../images/products/item/magazine/volume-05-large.jpg"
					}
				]
			},
			{
				"tag": "magazine-6",
				"imageSet": null,
				"extraClass": "py-md-3",
				"divider": false,
				"available": false,
				"price": [
					{
						"item_cn": null,
						"item_en": null,
						"cn": "RM 10.00",
						"en": "RM 10.00",
						"code": "vol06",
						"value": 10
					}
				],
				"dimension": null,
				"title": {
					"cn": "《名人风水》第6期雜誌",
					"en": "Fengshui Magazine Vol. 6"
				},
				"desc": {
					"cn": "《名人風水》一共出版10期，是國內首創第一本結合名人、風水、面相、八字、生活時尚及國際時事的風水雜誌，內容豐富多元。雜誌每一期都會通過各领域热点人物，为读者提供正統風水觀念，提升人生智慧，揭示成功秘诀。",
					"en": "Fengshui Republic Magazine is now in its 10th issue. This is the first Fengshui magazine that contains a wealth of diverse contents, from celebrities to Fengshui, from face-reading to Bazi, from lifestyle to international affairs.<br/>The magazine will introduce the readers genuine Fengshui concepts through renown figures of different fields, allowing the readers access to the wisdom of life and secret of success."
				},
				"small_img": {
					"cn": "../images/products/item/magazine/volume-06-small.png",
					"en": "../images/products/item/magazine/volume-06-small.png"
				},
				"gallery": [
					{
						"thumbnail_url": null,
						"img_url": "../images/products/item/magazine/volume-06-large.jpg"
					}
				]
			},
			{
				"tag": "magazine-7",
				"imageSet": null,
				"extraClass": "py-md-3",
				"divider": false,
				"available": false,
				"price": [
					{
						"item_cn": null,
						"item_en": null,
						"cn": "RM 10.00",
						"en": "RM 10.00",
						"code": "vol07",
						"value": 10
					}
				],
				"dimension": null,
				"title": {
					"cn": "《名人风水》第7期雜誌",
					"en": "Fengshui Magazine Vol. 7"
				},
				"desc": {
					"cn": "《名人風水》一共出版10期，是國內首創第一本結合名人、風水、面相、八字、生活時尚及國際時事的風水雜誌，內容豐富多元。雜誌每一期都會通過各领域热点人物，为读者提供正統風水觀念，提升人生智慧，揭示成功秘诀。",
					"en": "Fengshui Republic Magazine is now in its 10th issue. This is the first Fengshui magazine that contains a wealth of diverse contents, from celebrities to Fengshui, from face-reading to Bazi, from lifestyle to international affairs.<br/>The magazine will introduce the readers genuine Fengshui concepts through renown figures of different fields, allowing the readers access to the wisdom of life and secret of success."
				},
				"small_img": {
					"cn": "../images/products/item/magazine/volume-07-small.png",
					"en": "../images/products/item/magazine/volume-07-small.png"
				},
				"gallery": [
					{
						"thumbnail_url": null,
						"img_url": "../images/products/item/magazine/volume-07-large.jpg"
					}
				]
			},
			{
				"tag": "magazine-8",
				"imageSet": null,
				"extraClass": "py-md-3",
				"divider": false,
				"available": false,
				"price": [
					{
						"item_cn": null,
						"item_en": null,
						"cn": "RM 10.00",
						"en": "RM 10.00",
						"code": "vol08",
						"value": 10
					}
				],
				"dimension": null,
				"title": {
					"cn": "《名人风水》第8期雜誌",
					"en": "Fengshui Magazine Vol. 8"
				},
				"desc": {
					"cn": "《名人風水》一共出版10期，是國內首創第一本結合名人、風水、面相、八字、生活時尚及國際時事的風水雜誌，內容豐富多元。雜誌每一期都會通過各领域热点人物，为读者提供正統風水觀念，提升人生智慧，揭示成功秘诀。",
					"en": "Fengshui Republic Magazine is now in its 10th issue. This is the first Fengshui magazine that contains a wealth of diverse contents, from celebrities to Fengshui, from face-reading to Bazi, from lifestyle to international affairs.<br/>The magazine will introduce the readers genuine Fengshui concepts through renown figures of different fields, allowing the readers access to the wisdom of life and secret of success."
				},
				"small_img": {
					"cn": "../images/products/item/magazine/volume-08-small.png",
					"en": "../images/products/item/magazine/volume-08-small.png"
				},
				"gallery": [
					{
						"thumbnail_url": null,
						"img_url": "../images/products/item/magazine/volume-08-large.jpg"
					}
				]
			},
			{
				"tag": "magazine-9",
				"imageSet": null,
				"extraClass": "py-md-3",
				"divider": false,
				"available": false,
				"price": [
					{
						"item_cn": null,
						"item_en": null,
						"cn": "RM 10.00",
						"en": "RM 10.00",
						"code": "vol09",
						"value": 10
					}
				],
				"dimension": null,
				"title": {
					"cn": "《名人风水》第9期雜誌",
					"en": "Fengshui Magazine Vol. 9"
				},
				"desc": {
					"cn": "《名人風水》一共出版10期，是國內首創第一本結合名人、風水、面相、八字、生活時尚及國際時事的風水雜誌，內容豐富多元。雜誌每一期都會通過各领域热点人物，为读者提供正統風水觀念，提升人生智慧，揭示成功秘诀。",
					"en": "Fengshui Republic Magazine is now in its 10th issue. This is the first Fengshui magazine that contains a wealth of diverse contents, from celebrities to Fengshui, from face-reading to Bazi, from lifestyle to international affairs.<br/>The magazine will introduce the readers genuine Fengshui concepts through renown figures of different fields, allowing the readers access to the wisdom of life and secret of success."
				},
				"small_img": {
					"cn": "../images/products/item/magazine/volume-09-small.png",
					"en": "../images/products/item/magazine/volume-09-small.png"
				},
				"gallery": [
					{
						"thumbnail_url": null,
						"img_url": "../images/products/item/magazine/volume-09-large.jpg"
					}
				]
			},
			{
				"tag": "magazine-10",
				"imageSet": null,
				"extraClass": "py-md-3",
				"divider": false,
				"available": false,
				"price": [
					{
						"item_cn": null,
						"item_en": null,
						"cn": "RM 10.00",
						"en": "RM 10.00",
						"code": "vol10",
						"value": 10
					}
				],
				"dimension": null,
				"title": {
					"cn": "《名人风水》第10期雜誌",
					"en": "Fengshui Magazine Vol. 10"
				},
				"desc": {
					"cn": "《名人風水》一共出版10期，是國內首創第一本結合名人、風水、面相、八字、生活時尚及國際時事的風水雜誌，內容豐富多元。雜誌每一期都會通過各领域热点人物，为读者提供正統風水觀念，提升人生智慧，揭示成功秘诀。",
					"en": "Fengshui Republic Magazine is now in its 10th issue. This is the first Fengshui magazine that contains a wealth of diverse contents, from celebrities to Fengshui, from face-reading to Bazi, from lifestyle to international affairs.<br/>The magazine will introduce the readers genuine Fengshui concepts through renown figures of different fields, allowing the readers access to the wisdom of life and secret of success."
				},
				"small_img": {
					"cn": "../images/products/item/magazine/volume-10-small.png",
					"en": "../images/products/item/magazine/volume-10-small.png"
				},
				"gallery": [
					{
						"thumbnail_url": null,
						"img_url": "../images/products/item/magazine/volume-10-large.jpg"
					}
				]
			}
		]
	}
}

const PRODUCTS = [];

_.each(PRODUCTS_CAT, cat => {
	let items = _.filter(cat.items, itm => itm.available);
	_.each(items, itm => {
		_.each(itm.price, price => {
			PRODUCTS.push(price);
		})
	})
})

function numberWithCommas(x) {
	x = parseFloat(x).toFixed(2);
	return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

class Cart extends React.Component {

	submitForm() {
		const csrf = this.props.csrf;
		const cart = this.props.cart.slice();
		const groupCart = {};

		_.each(cart, p => {
			if (p.code in groupCart) {
				groupCart[p.code].qty++;
			} else {
				groupCart[p.code] = Object.assign({}, p, { qty: 1 });
			}
		})

		let form = $('<form method="post" action="../products/process-order">');
		let input = $('<input type="hidden" name="_csrf-frontend" value="' + csrf + '">');
		form.append(input)
		_.each(groupCart, c => {
			let input = $('<input type="hidden" name="Item[' + c.code + ']">')
			input.val(c.qty)
			form.append(input)
		})
		form.appendTo('body');
		// console.log(form);
		form.submit();
		// console.log('DONE')
	}

	render() {
		const lang = this.props.language || "en";
		const cart = this.props.cart.slice();
		const groupCart = {};
		let totalVal = 0;

		_.each(cart, p => {
			if (p.code in groupCart) {
				groupCart[p.code].qty++;
			} else {
				groupCart[p.code] = Object.assign({}, p, { qty: 1 });
			}
			totalVal += p.value;
		})

		// console.log('Original Cart', cart);
		// console.log('Group Cart', groupCart);

		if (lang == "cn") {
			var title = "购物篮";
			var total = "总额";
			var close = "关闭";
			var checkout = "结账";
		}
		if (lang == "en") {
			var title = "Your Shopping Cart";
			var total = "Total";
			var close = "Close";
			var checkout = "Checkout";
		}

		return (
			<div>
				<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">{title}</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								{_.map(groupCart, c => {
									return (
										<div>
											<p class="mb-0">{c.item_cn}</p>
											<p>{c.item_en}</p>
											<p>
												<i class="fa fa-lg fa-minus-circle" aria-hidden="true" onClick={() => this.props.removeCart(c.code)}></i>
												<span class="mx-2">{c.qty}</span>
												<i class="fa fa-lg fa-plus-circle" aria-hidden="true" onClick={() => this.props.addToCart(c.code)}></i>
												<span class="pull-right">RM {numberWithCommas(c.value * c.qty)}</span>
											</p>
											<hr/>
										</div>
									);
								})}
								<p class="text-right">Total: RM {numberWithCommas(totalVal)}</p>
								<hr/>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">{close}</button>
								<button type="submit" class="btn btn-primary" onClick={() => this.submitForm()}>{checkout}</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		);
	}
}

class CartIcon extends React.Component {

	render() {
		const lang = this.props.language || "en";

		if (lang == "cn") { var text = "购物篮" }
		if (lang == "en") { var text = "CART" }

		const cart = this.props.cart.slice();

		// (function (cb) {
		// 	return function () {
		// 		//
		// 	}
		// })(function () {})()

		return (
			<div>
				<div id="fsrepublic-tools">
					<div class="fsrepublic-tools-menu-wrap">
						<div class="fsrepublic-tools-menu back-to-top">
							<div class="d-flex justify-content-center">
								<i class="fa fa-4x fa-angle-double-up" aria-hidden="true"></i>
							</div>
						</div>
					</div>
					<div class="fsrepublic-tools-menu-wrap">
						<div class="fsrepublic-tools-menu" data-toggle={"modal"} data-target={"#cartModal"}>
							<div class="mt-1">
								<i class="fa fa-4x fa-shopping-bag d-flex justify-content-center" aria-hidden="true"></i>
								<span class="badge badge-danger">{(() => {
									if (cart.length > 9) {
										return '9+';
									}
									return cart.length;
								})()}</span>
								<div class="text-center fsrepublic-tools-text">{text}</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		);
	}
}

class CategoryItem extends React.Component {

	constructor(props) {
		super(props);

		this.state = {
			code    : null,
			product : null
		}

		if (props.item.price.length > 0) {
			this.state.code    = props.item.price[0].code;
			this.state.product = props.item.price[0];
		}
	}

	handleChangePrice(code) {
		let pIdx = _.findIndex(this.props.item.price, p => p.code == code)
		this.setState({
			code    : code,
			product : Object.assign({}, this.props.item.price[pIdx])
		})
	}

	render() {
		const lang = this.props.language || "en";

		if (lang == "cn") {
			var extraTitle = <h5 class="text-center text-md-left">{this.props.item.title["en"]}</h5>;
		} else {
			var extraTitle = "";
		}

		if (this.props.item.dimension) {
			var dimension = <p class="text-center text-md-left fsrepublic-text-gold"><small>{this.props.item.dimension[lang]}</small></p>;
		} else {
			var dimension = "";
		}

		if (this.props.item.divider) {
			var divider = (
				<div class="row">
					<div class="col-12 mx-auto">
						<img src="../images/products/divider-l.png" alt="Fengshui Republic" class="img-fluid d-none d-md-block" />
						<img src="../images/products/divider-m.png" alt="Fengshui Republic" class="img-fluid d-block d-md-none" />
					</div>
				</div>
			);
		} else {
			var divider = "";
		}

		if (this.props.item.price.length > 1) {
			var price = (
				<select class="select-control price-tag px-1 px-md-3 mr-2 mx-md-3" value={this.state.code} onChange={event => this.handleChangePrice(event.target.value)}>
					{
						_.map(this.props.item.price, function (price) {
							return <option value={price.code}>{price[lang]}</option>
						})
					}
				</select>
			);
		} else {
			var price = <p class="col-auto py-2 m-0 fsrepublic-text-gold">{this.state.product[lang]}</p>;
		}

		if (this.props.item.available == true) {
			if (lang == "cn") { var addToCart = "加入购物篮" }
			if (lang == "en") { var addToCart = "Add to cart" }
			var addCartBtn = <button type="button" class="btn btn-primary px-2 px-md-5" onClick={() => this.props.addToCart(this.state.product)} value={this.state.quantity}>{addToCart}</button>;
		} else {
			if (lang == "cn") { var addToCart = "售罄" }
			if (lang == "en") { var addToCart = "Out of stock" }
			var addCartBtn = <button type="button" class="btn btn-secondary px-2 px-md-5" disabled>{addToCart}</button>;
		}

		return (
			<div>
				<div id={this.props.item.tag} class="row">
					<div class="col-11 col-md-10 mx-auto">
						<div class={"row py-5 " + this.props.item.extraClass}>
							<div class="col-md-4 d-none d-md-block">
								<img src={this.props.item.small_img[lang]} class="view-img img-fluid pointer" data-toggle={"modal"} data-target={"#imageModal"} data-img={this.props.item.gallery[0].img_url} data-set={this.props.item.imageSet} />
							</div>
							<div class="col-md-8">
								<h3 class="text-center text-md-left fsrepublic-text-gold">{this.props.item.title[lang]}</h3>
								{extraTitle}
								{dimension}
								<p dangerouslySetInnerHTML={{ __html: this.props.item.desc[lang] }} class="text-center text-md-left"></p>
								<div class="row">
									<div class="col-12 d-block d-md-none">
										<img src={this.props.item.small_img[lang]} class="view-img img-fluid mb-3 d-block mx-auto pointer" data-toggle={"modal"} data-target={"#imageModal"} data-img={this.props.item.gallery[0].img_url} data-set={this.props.item.imageSet} />
									</div>
								</div>
								<div class="row">
									<div class="col-auto mx-auto mb-3 d-block d-md-none">
										<i class="fa fa-lg fa-share-alt pointer copyLink" data-link={"http://fengshui-republic.com/products/list#" + this.props.item.tag}></i>
									</div>
								</div>
								<div class="row">
									<div class="col-auto mx-auto ml-md-0">
										<div class="row">
											{price}
											{addCartBtn}
											<div class="col-auto mx-auto d-none d-md-block">
												<i class="fa fa-lg fa-share-alt pt-2 mt-1 ml-3 pointer copyLink" data-link={"http://fengshui-republic.com/products/list#" + this.props.item.tag}></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						{divider}
					</div>
				</div>
			</div>
		);
	}
}

class Category extends React.Component {

	constructor(props) {
		super(props);
	}

	render() {
		const lang = this.props.language || "en";
		var items = _.map(this.props.items, item => {
			return <CategoryItem item={item} language={lang} addToCart={this.props.addToCart} />
		})
		return (
			<div>
				<div class="row">
					<div class="col-12 col-md-10 mx-auto px-0">
						<h6 id={this.props.value} class="text-center fsrepublic-text-white bg-gradients py-1 mt-lg-5">{this.props.header[lang]}</h6>
					</div>
				</div>
				{items}
			</div>
		);
	}
}

class AppItemList extends React.Component {

	constructor(props) {
		super(props);
		this.state = {
			"language": containerItem.attributes.language.value,
			"csrf": containerItem.attributes.csrf.value,
			"products": PRODUCTS_CAT,
			"cart": []
		}

		this.addToCart       = this.addToCart.bind(this)
		this.increaseProduct = this.increaseProduct.bind(this)
		this.decreaseProduct = this.decreaseProduct.bind(this)
	}

	addToCart(product) {
		let cart = this.state.cart.slice();
		cart.push(product);
		this.setState({
			cart : cart
		})
	}

	increaseProduct(code) {
		let cart = this.state.cart.slice();
		let pIdx = _.findIndex(PRODUCTS, p => p.code == code);
		if (pIdx >= 0) {
			cart.push(Object.assign({}, PRODUCTS[pIdx]));
			this.setState({
				cart: cart
			});
		}
	}

	decreaseProduct(code) {
		let cart = this.state.cart.slice();
		let pIdx = _.findIndex(cart, p => p.code == code);
		if (pIdx >= 0) {
			_.pullAt(cart, pIdx);
			this.setState({
				cart: cart
			});
		}
	}

	// toggleLanguage() {
	// 	this.setState({
	// 		language : this.state.language == "en" ? "cn" : "en"
	// 	});
	// }
	// <button onClick={() => this.toggleLanguage()}>Toggle Language</button>
	// <p>Current Language: {lang}</p>
	// <h1>Lang: {lang}</h1>

	render() {
		var csrf  = this.state.csrf;
		var lang  = this.state.language;
		var items = this.state.products;
		var itemList = _.map(items, (value, key) => {
			return <Category value={key} language={lang} header={value.header} items={value.items} addToCart={this.addToCart} />;
		});

		return (
			<div>
				<div class="container-fluid">
					<div>
						{itemList}
					</div>
				</div>
				<CartIcon language={lang} cart={this.state.cart} />
				<Cart csrf={csrf} language={lang} cart={this.state.cart} removeCart={this.decreaseProduct} addToCart={this.increaseProduct} />
			</div>
		)
	}
}

ReactDOM.render(<AppItemList />, containerItem);

$(function() {

	var duration = 300;

	$(".back-to-top").click(function(event) {
		event.preventDefault();
		$("html, body").animate({scrollTop: 0}, duration);
		return false;
	});

	$("#prompt-img").wrap("<span class=\"zooming\" style=\"display:inline-block;\"></span>").css("display", "block").parent().zoom();

	$("#imageModal").on("hidden.bs.modal", function () {
		$(".col-thumb").hide();
		$(".list-img").hide();
		$(".zooming").trigger("zoom.destroy");
	});

	$(".category-slide").slick({
		// centerMode: true,
		variableWidth: true,
		initialSlide: 1,
		// slidesToShow: 1,
		// slidesToScroll: 1,
		lazyLoad: "ondemand",
		autoplay: false,
		infinite: true
	});

	$(".view-img").click(function () {
		var data = $(this).data();

		if(data.set) {
			$(".col-thumb").show();
			$("#list-"+data.set).show();
		}
		$(".zooming").zoom({url: data.img});
		$("#prompt-img").attr("src", data.img);
		$("#imageModal").modal("show");
	});

	$(".img-thumbnail").click(function () {
		var data = $(this).data();

		$(".zooming").trigger("zoom.destroy");
		$(".zooming").zoom({url: data.img});
		$("#prompt-img").attr("src", data.img);
	});

	$(".copyLink").click(function () {
		var data  = $(this).data();
		var $temp = $("<input>");

		$("body").append($temp);
		$temp.val(data.link);
		if (navigator.userAgent.match(/ipad|ipod|iphone/i)) {
			var el = $temp.get(0);
			var editable = el.contentEditable;
			var readOnly = el.readOnly;
			el.contentEditable = true;
			el.readOnly = true;
			var range = document.createRange();
			range.selectNodeContents(el);
			var sel = window.getSelection();
			sel.removeAllRanges();
			sel.addRange(range);
			el.setSelectionRange(0, 999999);
			el.contentEditable = editable;
			el.readOnly = readOnly;
		} else {
			$temp.select();
		}

		document.execCommand('copy');
		$temp.remove();
		alert("Link copied to clipboard");
	});

	var goTo = window.location.hash;

	if (goTo) {
		$(window).scrollTop($(goTo).offset().top);
		// console.log(goTo);
	}

});


