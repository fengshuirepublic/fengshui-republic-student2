<?php

namespace frontend\pdf;

use Yii;
use pentajeu\extensions\EasyPDF;

class NamingSingle extends EasyPDF
{
	public function __construct()
	{
		parent::__construct("P", "cm", "A4", true, "UTF-8");
	}

	protected function init()
	{
		parent::init();

		$this->font_family = array(
			'font'  => 'ARIALUNI',
			'style' => '',
			'size'  => 12,
			'color' => array(0, 0, 0),
		);
		$this->default_font = array(
			'font'  => 'ARIALUNI',
			'size'  => 12,
			'style' => '',
			'color' => array(0, 0, 0),
		);
		$this->setFontFamily();

		$this->SetMargins(1, 1, 1, TRUE);
		$this->SetFooterMargin(1);
		$this->SetAutoPageBreak(TRUE, 1);
		$this->SetPrintHeader(FALSE);
		$this->SetPrintFooter(TRUE);

		$this->SetAuthor("Fengshui Republic Naming PDF");
		$this->SetTitle("Fengshui Republic Naming PDF");
		$this->SetSubject("Fengshui Republic Naming PDF");
		$this->SetKeywords("Fengshui Republic Naming PDF");
	}

	private function PDF_WriteText($text, array $param = array())
	{
		$default_font = $this->default_font;
		$param['style'] = isset($param['style'])?array_merge($default_font, $param['style']):$default_font;
		$param['cell'] = isset($param['cell'])?$param['cell']:array();

		$this->setFontFamily($param['style']);
		$this->PDF_MultiCell($text, $param['cell']);

		$this->setFontFamily($default_font);
	}

	private function PDF_Write($text, array $param = array())
	{
		$default_font = $this->default_font;
		$write_param = array('align'=>'J', 'link'=>'', 'fill'=>false, 'ln'=>false);
		$param = array_merge($default_font, $param);
		$write_param = array_merge($write_param, $param);
		$this->setFontFamily($param);
		$this->Write(0, $text, $write_param['link'], $write_param['fill'], $write_param['align'], $write_param['ln']);

		$this->setFontFamily($default_font);
	}

	private function PDF_MultiCell($text, array $param = array())
	{
		// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
		$default = array(
			'w' => 0,
			'h' => 0,
			'txt' => $text,
			'border' => 0,
			'align' => 'J',
			'fill' => false,
			'ln' => 1,
			'x' => '',
			'y' => '',
			'reseth' => true,
			'ishtml' => false,
			'autopadding' => true,
			'maxh' => 0,
			'valign' => 'T',
			'fitcell' => false,
		);
		$default = array_merge($default, $param);
		return parent::MultiCell($default['w'], $default['h'], $default['txt'], $default['border'], $default['align'], $default['fill'], $default['ln'], $default['x'], $default['y'], $default['reseth'], $default['ishtml'], $default['autopadding'], $default['maxh'], $default['valign'], $default['fitcell']);
	}

	private function PDF_Image($file, array $param = array())
	{
		$default = array(
			'x' => '',
			'y' => '',
			'w' => 0,
			'h' => 0,
			'type' => '',
			'link' => '',
			'align' => '',
			'resize' => false,
			'dpi' => 300,
			'palign' => '',
			'ismask' => false,
			'imgmask' => false,
			'border' => 0,
			'fitbox' => false,
			'hidden' => false,
			'fitonpage' => false,
			'alt' => false,
			'altimgs' => array(),
			);
		$default = array_merge($default, $param);
		$this->Image($file, $default['x'], $default['y'], $default['w'], $default['h'], $default['type'], $default['link'], $default['align'], $default['resize'], $default['dpi'], $default['palign'], $default['ismask'], $default['imgmask'], $default['border'], $default['fitbox'], $default['hidden'], $default['fitonpage'], $default['alt'], $default['altimgs']);
	}

	public function Footer(){
		$image_file = Yii::getAlias('@frontend')."/fs_tools/naming_analysis/images/footer.jpg";
		$this->PDF_Image($image_file,  array('x' => 1.5, 'y' => $this->getPageHeight() - 1.7, 'w' => 17.9, 'h' => 0.9));
	}

	public function generate($total, $result, $na_yin)
	{
		$this->AddPage();

		if($total==2){
			$this->PDF_WriteText("[ 名字分析&#8194;-&#8194;".$result['name_translate'][0]['character'].$result['name_translate'][1]['character']."&#8195;&#8195;".$result['name_translate'][0]['hanyupinyin']." ".$result['name_translate'][1]['hanyupinyin']." "." ]",array(
					'style'=>array('size'=>17),
					'cell'=>array('align'=>'C'),
				)
			);
			// $this->PDF_WriteText("**以上評分還未搭配八字五行",array(
			// 		'style'=>array('size'=>12),
			// 		'cell'=>array('y'=>'1.9','align'=>'R'),
			// 	)
			// );
			$image_file = Yii::getAlias('@frontend')."/fs_tools/naming_analysis/images/bracket.jpg";
			$this->PDF_Image($image_file,  array('x' => 4.8, 'y' => 2.5, 'w' => 11.45, 'h' => 12.6));

			/* name character */
			$this->PDF_WriteText($result['name_translate'][0]['character'], array(
					'style'=>array('size' => 65),
					// 'cell'=>array('x'=>9, 'y'=>3.5),
					'cell'=>array('align'=>'C', 'y'=>4),
				)
			);
			$this->PDF_WriteText($result['name_translate'][1]['character'], array(
					'style'=>array('size' => 65),
					// 'cell'=>array('x'=>9, 'y'=>6.9),
					'cell'=>array('align'=>'C', 'y'=>8.7),
				)
			);

			/* stroke count */
			$this->PDF_WriteText($result['name_translate'][0]['strokecount'], array(
					'style'=>array('size' => 15),
					'cell'=>array('x'=>11.2, 'y'=>6.6),
				)
			);
			$this->PDF_WriteText($result['name_translate'][1]['strokecount'], array(
					'style'=>array('size' => 15),
					'cell'=>array('x'=>11.2, 'y'=>11.2),
				)
			);

			/* character element */
			$this->PDF_WriteText($na_yin[0], array(
					'style'=>array('size' => 12),
					'cell'=>array('x'=>11.6, 'y'=>5.8),
				)
			);
			$this->PDF_WriteText($na_yin[1], array(
					'style'=>array('size' => 12),
					'cell'=>array('x'=>11.6, 'y'=>10.5),
				)
			);
		}

		if($total==3){
			$this->PDF_WriteText("[ 名字分析&#8194;-&#8194;".$result['name_translate'][0]['character'].$result['name_translate'][1]['character'].$result['name_translate'][2]['character']."&#8195;&#8195;".$result['name_translate'][0]['hanyupinyin']." ".$result['name_translate'][1]['hanyupinyin']." ".$result['name_translate'][2]['hanyupinyin']." ]",array(
					'style'=>array('size'=>17),
					'cell'=>array('align'=>'C'),
				)
			);
			// $this->PDF_WriteText("**以上評分還未搭配八字五行",array(
			// 		'style'=>array('size'=>12),
			// 		'cell'=>array('y'=>'1.9','align'=>'R'),
			// 	)
			// );
			$image_file = Yii::getAlias('@frontend')."/fs_tools/naming_analysis/images/bracket.jpg";
			$this->PDF_Image($image_file,  array('x' => 4.8, 'y' => 2.5, 'w' => 11.45, 'h' => 12.6));

			/* name character */
			$this->PDF_WriteText($result['name_translate'][0]['character'], array(
					'style'=>array('size' => 65),
					// 'cell'=>array('x'=>9, 'y'=>3.5),
					'cell'=>array('align'=>'C', 'y'=>3.5),
				)
			);
			$this->PDF_WriteText($result['name_translate'][1]['character'], array(
					'style'=>array('size' => 65),
					// 'cell'=>array('x'=>9, 'y'=>6.9),
					'cell'=>array('align'=>'C', 'y'=>6.9),
				)
			);
			$this->PDF_WriteText($result['name_translate'][2]['character'], array(
					'style'=>array('size' => 65),
					// 'cell'=>array('x'=>9, 'y'=>10.2),
					'cell'=>array('align'=>'C', 'y'=>10.2),
				)
			);

			/* stroke count */
			$this->PDF_WriteText($result['name_translate'][0]['strokecount'], array(
					'style'=>array('size' => 15),
					'cell'=>array('x'=>11.4, 'y'=>6.4),
				)
			);
			$this->PDF_WriteText($result['name_translate'][1]['strokecount'], array(
					'style'=>array('size' => 15),
					'cell'=>array('x'=>11.4, 'y'=>9.7),
				)
			);
			$this->PDF_WriteText($result['name_translate'][2]['strokecount'], array(
					'style'=>array('size' => 15),
					'cell'=>array('x'=>11.4, 'y'=>12.7),
				)
			);

			/* character element */
			$this->PDF_WriteText($na_yin[0], array(
					'style'=>array('size' => 12),
					'cell'=>array('x'=>11.8, 'y'=>5.6),
				)
			);
			$this->PDF_WriteText($na_yin[1], array(
					'style'=>array('size' => 12),
					'cell'=>array('x'=>11.8, 'y'=>9),
				)
			);
			$this->PDF_WriteText($na_yin[2], array(
					'style'=>array('size' => 12),
					'cell'=>array('x'=>11.8, 'y'=>12.2),
				)
			);
		}

		if($total==4){
			$this->PDF_WriteText("[ 名字分析 - ".$result['name_translate'][0]['character'].$result['name_translate'][1]['character'].$result['name_translate'][2]['character'].$result['name_translate'][3]['character']."&#8195;&#8195;".$result['name_translate'][0]['hanyupinyin']." ".$result['name_translate'][1]['hanyupinyin']." ".$result['name_translate'][2]['hanyupinyin']." ".$result['name_translate'][3]['hanyupinyin']." ]",array(
					'style'=>array('size'=>17),
					'cell'=>array('align'=>'C'),
				)
			);
			// $this->PDF_WriteText("**以上評分還未搭配八字五行",array(
			// 		'style'=>array('size'=>12),
			// 		'cell'=>array('y'=>'1.9','align'=>'R'),
			// 	)
			// );
			$image_file = Yii::getAlias('@frontend')."/fs_tools/naming_analysis/images/bracket.jpg";
			$this->PDF_Image($image_file,  array('x' => 4.8, 'y' => 2.5, 'w' => 11.45, 'h' => 12.6));

			/* name character */
			$this->PDF_WriteText($result['name_translate'][0]['character'], array(
					'style'=>array('size' => 55),
					// 'cell'=>array('x'=>9, 'y'=>3.5),
					'cell'=>array('align'=>'C', 'y'=>3.2),
				)
			);
			$this->PDF_WriteText($result['name_translate'][1]['character'], array(
					'style'=>array('size' => 55),
					// 'cell'=>array('x'=>9, 'y'=>6.9),
					'cell'=>array('align'=>'C', 'y'=>5.8),
				)
			);
			$this->PDF_WriteText($result['name_translate'][2]['character'], array(
					'style'=>array('size' => 55),
					// 'cell'=>array('x'=>9, 'y'=>10.2),
					'cell'=>array('align'=>'C', 'y'=>8.2),
				)
			);
			$this->PDF_WriteText($result['name_translate'][3]['character'], array(
					'style'=>array('size' => 55),
					// 'cell'=>array('x'=>9, 'y'=>10.2),
					'cell'=>array('align'=>'C', 'y'=>10.7),
				)
			);

			/* stroke count */
			$this->PDF_WriteText($result['name_translate'][0]['strokecount'], array(
					'style'=>array('size' => 15),
					'cell'=>array('x'=>11.2, 'y'=>5.2),
				)
			);
			$this->PDF_WriteText($result['name_translate'][1]['strokecount'], array(
					'style'=>array('size' => 15),
					'cell'=>array('x'=>11.2, 'y'=>7.8),
				)
			);
			$this->PDF_WriteText($result['name_translate'][2]['strokecount'], array(
					'style'=>array('size' => 15),
					'cell'=>array('x'=>11.2, 'y'=>10.2),
				)
			);
			$this->PDF_WriteText($result['name_translate'][3]['strokecount'], array(
					'style'=>array('size' => 15),
					'cell'=>array('x'=>11.2, 'y'=>12.7),
				)
			);

			/* character element */
			$this->PDF_WriteText($na_yin[0], array(
					'style'=>array('size' => 12),
					'cell'=>array('x'=>11.6, 'y'=>4.7),
				)
			);
			$this->PDF_WriteText($na_yin[1], array(
					'style'=>array('size' => 12),
					'cell'=>array('x'=>11.6, 'y'=>7.4),
				)
			);
			$this->PDF_WriteText($na_yin[2], array(
					'style'=>array('size' => 12),
					'cell'=>array('x'=>11.6, 'y'=>9.7),
				)
			);
			$this->PDF_WriteText($na_yin[3], array(
					'style'=>array('size' => 12),
					'cell'=>array('x'=>11.6, 'y'=>12.2),
				)
			);
		}

		/* wu_ge */
		$this->PDF_WriteText("天格&#8194;".$result['element_result'][0]['count']."&#8194;( ".$result['element_result'][0]['element']." )&#8194;".$result['element_result'][0]['element_type'], array(
				'style'=>array('size' => 18),
				'cell'=>array('x'=>12.8, 'y'=>4.5),
			)
		);
		$this->PDF_WriteText("人格&#8194;".$result['element_result'][1]['count']."&#8194;( ".$result['element_result'][1]['element']." )&#8194;".$result['element_result'][1]['element_type'], array(
				'style'=>array('size' => 18),
				'cell'=>array('x'=>12.8, 'y'=>7.9),
			)
		);
		$this->PDF_WriteText("地格&#8194;".$result['element_result'][2]['count']."&#8194;( ".$result['element_result'][2]['element']." )&#8194;".$result['element_result'][2]['element_type'], array(
				'style'=>array('size' => 18),
				'cell'=>array('x'=>12.8, 'y'=>11.2),
			)
		);
		$this->PDF_WriteText("外格&#8194;".$result['element_result'][3]['count'], array(
				'style'=>array('size' => 18),
				'cell'=>array('x'=>5.2, 'y'=>7.1),
			)
		);
		$this->PDF_WriteText("( ".$result['element_result'][3]['element']." )", array(
				'style'=>array('size' => 18),
				'cell'=>array('x'=>5.6, 'y'=>8),
			)
		);
		$this->PDF_WriteText($result['element_result'][3]['element_type'], array(
				'style'=>array('size' => 18),
				'cell'=>array('x'=>6, 'y'=>8.9),
			)
		);
		$this->PDF_WriteText("總格&#8194;".$result['element_result'][4]['count']."&#8194;( ".$result['element_result'][4]['element']." )&#8194;".$result['element_result'][4]['element_type'], array(
				'style'=>array('size' => 18),
				'cell'=>array('x'=>'7.8', 'y'=>14.5),
				// 'cell'=>array('align'=>'C', 'y'=>14.5),
			)
		);

		/* description */
		$this->PDF_WriteText("");

		// $font = $bold_font = array('size'=>10);
		// $bold_font['style'] = 'B';

		$this->PDF_WriteText("天格 （".$result['element_result'][0]['count']."） : 【".$result['element_result'][0]['detail']['title']."】", array(
				'style'=>array('size' => 18),
				'cell'=>array('align'=>'C', 'y'=>16),
			)
		);
		$this->PDF_WriteText("長輩運", array(
				'style'=>array('size' => 12),
				'cell'=>array(
					'x'=>15.8,
					'y'=>16.23
				),
			)
		);

		$this->PDF_WriteText("人格 （".$result['element_result'][1]['count']."） : 【".$result['element_result'][1]['detail']['title']."】", array(
				'style'=>array('size' => 18),
				'cell'=>array('align'=>'C', 'y'=>17),
			)
		);
		$this->PDF_WriteText("主運", array(
				'style'=>array('size' => 12),
				'cell'=>array(
					'x'=>15.8,
					'y'=>17.23
				),
			)
		);

		$this->PDF_WriteText("地格 （".$result['element_result'][2]['count']."） : 【".$result['element_result'][2]['detail']['title']."】", array(
				'style'=>array('size' => 18),
				'cell'=>array('align'=>'C', 'y'=>18),
			)
		);
		$this->PDF_WriteText("子女運", array(
				'style'=>array('size' => 12),
				'cell'=>array(
					'x'=>15.8,
					'y'=>18.23
				),
			)
		);

		$this->PDF_WriteText("外格 （".$result['element_result'][3]['count']."） : 【".$result['element_result'][3]['detail']['title']."】", array(
				'style'=>array('size' => 18),
				'cell'=>array('align'=>'C', 'y'=>19),
			)
		);
		$this->PDF_WriteText("家庭運", array(
				'style'=>array('size' => 12),
				'cell'=>array(
					'x'=>15.8,
					'y'=>19.23
				),
			)
		);

		$this->PDF_WriteText("總格 （".$result['element_result'][4]['count']."） : 【".$result['element_result'][4]['detail']['title']."】", array(
				'style'=>array('size' => 18),
				'cell'=>array('align'=>'C', 'y'=>20),
			)
		);
		$this->PDF_WriteText("老年運", array(
				'style'=>array('size' => 12),
				'cell'=>array(
					'x'=>15.8,
					'y'=>20.23
				),
			)
		);

		$this->PDF_WriteText("正所謂“名不正則言不順”，人的名字就是代表著個人存在的生命。因此，名字是一生中最寶貴的財富。名字中隱含著強大的能量信息，足以影響人生的命運和事業上的成敗，正如俗語所雲:“遺子千金，不如教子一藝，教子一藝，如賜予佳名“。為新生寶寶或自己取個好 名是非常重要的一個開始。", array(
				'style'=>array('size' => 16),
				'cell'=>array(
					'x'=>2.25,
					'y'=>22,
					'w'=>16.5
				),
			)
		);

		$baby_naming = Yii::getAlias('@frontend')."/fs_tools/naming_analysis/images/baby-naming.png";
		$adult_renaming = Yii::getAlias('@frontend')."/fs_tools/naming_analysis/images/adult-renaming.png";
		$this->PDF_Image($baby_naming,  array('x' => 7.5, 'y' => 26.5, 'w' => 2.5, 'h' => 1.2, 'link' => 'http://fengshui-republic.com/services/baby-naming?m=a'));
		$this->PDF_Image($adult_renaming,  array('x' => 11, 'y' => 26.5, 'w' => 2.5, 'h' => 1.2, 'link' => 'http://fengshui-republic.com/services/adult-renaming?m=a'));

		// $know_more = Yii::getAlias('@frontend')."/fs_tools/naming_analysis/images/know-more.png";
		// $this->PDF_Image($know_more,  array('x' => 9.5, 'y' => 26.5, 'w' => 2.5, 'h' => 1.2, 'link' => 'http://www.fengshui-republic.com/services/baby-naming#enquiryModalA'));
	}
}


