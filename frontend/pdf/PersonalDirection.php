<?php

namespace frontend\pdf;

use Yii;
use pentajeu\extensions\EasyPDF;

class PersonalDirection extends EasyPDF
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
		$this->SetAutoPageBreak(TRUE, 0.5);
		$this->SetPrintHeader(TRUE);
		$this->SetPrintFooter(FALSE);

		$this->SetAuthor("Fengshui Republic Personal Direction PDF");
		$this->SetTitle("Fengshui Republic Personal Direction PDF");
		$this->SetSubject("Fengshui Republic Personal Direction PDF");
		$this->SetKeywords("Fengshui Republic Personal Direction PDF");
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

	public function Header()
	{
		$image_file = Yii::getAlias('@frontend')."/fs_tools/personal_direction/images/logo.png";
		$this->Rect(1, 0.1, 19, 1.5, 'F', array(), array(147, 28, 20));
		$this->PDF_Image($image_file,  array('x' => 12.8, 'y' => 0.2, 'w' => 7, 'h' => 1.3));

		// $image_file = Yii::getAlias('@frontend')."/fs_tools/personal_direction/images/logo.jpg";
		// $this->PDF_Image($image_file,  array('x' => 0, 'y' => 0, 'w' => 21, 'h' => 2.1));
	}

	public function generate($bazi, $gender, $minute, $pd_gua)
	{
		$dz=array("???","???","???","???","???","???","???","???","???","???","???","???");

		$style = array(
			'L' => array('width' => 0.03, 'color' => array(147, 28, 20)),
			'T' => 1,
			'R' => 1,
			'B' => 1
		);

		$c_number = array(
			'0' => '???',
			'1' => '???',
			'2' => '???',
			'3' => '???',
			'4' => '???',
			'5' => '???',
			'6' => '???',
			'7' => '???',
			'8' => '???',
			'9' => '???',
		);

		$info_tg = array(
			'???'=>array(0=>'Jia', 1=>'???',2=>'Wood'),
			'???'=>array(0=>'Yi',  1=>'???',2=>'Wood'),
			'???'=>array(0=>'Bing',1=>'???',2=>'Fire'),
			'???'=>array(0=>'Ding',1=>'???',2=>'Fire'),
			'???'=>array(0=>'Wu',  1=>'???',2=>'Earth'),
			'???'=>array(0=>'Ji',  1=>'???',2=>'Earth'),
			'???'=>array(0=>'Geng',1=>'???',2=>'Metal'),
			'???'=>array(0=>'Xin', 1=>'???',2=>'Metal'),
			'???'=>array(0=>'Ren', 1=>'???',2=>'Water'),
			'???'=>array(0=>'Gui', 1=>'???',2=>'Water'),
		);

		$info_dz = array(
			'???'=>array(0=>'???',1=>'Rat',    2=>'???',3=>'Water',4=>'Zi3'),
			'???'=>array(0=>'???',1=>'Ox',     2=>'???',3=>'Earth',4=>'Chou3'),
			'???'=>array(0=>'???',1=>'Tiger',  2=>'???',3=>'Wood', 4=>'Yin2'),
			'???'=>array(0=>'???',1=>'Rabbit', 2=>'???',3=>'Wood', 4=>'Mao3'),
			'???'=>array(0=>'???',1=>'Dragon', 2=>'???',3=>'Earth',4=>'Chen2'),
			'???'=>array(0=>'???',1=>'Snake',  2=>'???',3=>'Fire', 4=>'Si4'),
			'???'=>array(0=>'???',1=>'Horse',  2=>'???',3=>'Fire', 4=>'Wu3'),
			'???'=>array(0=>'???',1=>'Goat',   2=>'???',3=>'Earth',4=>'Wei4'),
			'???'=>array(0=>'???',1=>'Monkey', 2=>'???',3=>'Metal',4=>'Shen1'),
			'???'=>array(0=>'???',1=>'Rooster',2=>'???',3=>'Metal',4=>'You3'),
			'???'=>array(0=>'???',1=>'Dog',    2=>'???',3=>'Earth',4=>'Xu1'),
			'???'=>array(0=>'???',1=>'Boar',   2=>'???',3=>'Water',4=>'Hai4'),
		);

		// ??????
		$ss = array(
			'???' => array(
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
			),
			'???' => array(
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
			),
			'???' => array(
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
			),
			'???' => array(
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
			),
			'???' => array(
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
			),
			'???' => array(
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
			),
			'???' => array(
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
			),
			'???' => array(
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
			),
			'???' => array(
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
			),
			'???' => array(
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
				'???' => '??????',
			),
		);

		$ss_info = array(
			'??????' => 'F',
			'??????' => 'RW',
			'??????' => 'EG',
			'??????' => 'HO',
			'??????' => 'IW',
			'??????' => 'DW',
			'??????' => 'SK',
			'??????' => 'DO',
			'??????' => 'IR',
			'??????' => 'DR',
		);

		$dzcg = array(
			'???'=> array(
				0 => '???',
			),
			'???'=> array(
				0 => '???',
				1 => '???',
				2 => '???',
			),
			'???'=> array(
				0 => '???',
				1 => '???',
				2 => '???',
			),
			'???'=> array(
				0 => '???',
			),
			'???'=> array(
				0 => '???',
				1 => '???',
				2 => '???',
			),
			'???'=> array(
				0 => '???',
				1 => '???',
				2 => '???',
			),
			'???'=> array(
				0 => '???',
				1 => '???',
			),
			'???'=> array(
				0 => '???',
				1 => '???',
				2 => '???',
			),
			'???'=> array(
				0 => '???',
				1 => '???',
				2 => '???',
			),
			'???'=> array(
				0 => '???',
			),
			'???'=> array(
				0 => '???',
				1 => '???',
				2 => '???',
			),
			'???'=> array(
				0 => '???',
				1 => '???',
			),
		);

		$this->AddPage();

		$this->Rect(1, 1.7, 8.7, 0.5, 'F', array(), array(147, 28, 20));
		$this->PDF_WriteText("????????????", array(
				'style'=>array('size'=>10,'color'=>array(255, 255, 255)),
				'cell'=>array('x' => 1.1, 'y'=>1.73),
			)
		);

		/* row 1 => */
			$this->PDF_WriteText("?????????", array(
					'style'=>array('size'=>11),
					'cell'=>array('x' => 1.1, 'y'=>2.3),
				)
			);

			$date = "{$bazi->e_m}/{$bazi->e_d}/{$bazi->e_y}";
			$time = "{$bazi->e_h}:{$minute}";
			$this->PDF_WriteText(date('d/m/Y', strtotime($date))."???".date('h:i a', strtotime($time)), array(
					'style'=>array('size'=>11),
					'cell'=>array('x' => 2.4, 'y'=>2.3),
				)
			);

			$this->PDF_WriteText("?????????{$gender}", array(
					'style'=>array('size'=>11),
					'cell'=>array('x' => 7.9, 'y'=>2.3),
				)
			);
		/* <= row 1 */

		/* row 2 => */
			$this->PDF_WriteText("?????????", array(
					'style'=>array('size'=>11),
					'cell'=>array('x' => 1.1, 'y'=>3),
				)
			);

			$arr = str_split($bazi->c_y);
			$c_year = '';
			foreach ($arr as $key => $value) {
				$c_year .= $c_number[$value];
			}
			$c_month = str_replace("???","",$bazi->c_m);
			$this->PDF_WriteText("{$c_year}???{$c_month}???{$bazi->c_d}{$bazi->c_h}???", array(
					'style'=>array('size'=>11),
					'cell'=>array('x' => 2.4, 'y'=>3),
				)
			);

			$this->PDF_WriteText("?????????{$info_dz[$bazi->dzn][0]}", array(
					'style'=>array('size'=>11),
					'cell'=>array('x' => 7.9, 'y'=>3),
				)
			);
		/* <= row 2 */

		/* row 3 => */
			// ??????
			$gr = array(
				'???'=>'??????',
				'???'=>'??????',
				'???'=>'??????',
				'???'=>'??????',
				'???'=>'??????',
				'???'=>'??????',
				'???'=>'??????',
				'???'=>'??????',
				'???'=>'??????',
				'???'=>'??????',
			);
			$this->PDF_WriteText("?????????{$gr[$bazi->tgr]}", array(
					'style'=>array('size'=>11),
					'cell'=>array('x' => 1.1, 'y'=>3.7),
				)
			);

			// ??????
			$ym = array(
				'???'=>'???',
				'???'=>'???',
				'???'=>'???',
				'???'=>'???',
				'???'=>'???',
				'???'=>'???',
				'???'=>'???',
				'???'=>'???',
				'???'=>'???',
				'???'=>'???',
				'???'=>'???',
				'???'=>'???',
			);
			$this->PDF_WriteText("?????????{$ym[$bazi->dzn]}", array(
					'style'=>array('size'=>11),
					'cell'=>array('x' => 5, 'y'=>3.7),
				)
			);
		/* <= row 3 */

		/* row 4 => */
			// ??????
			$th = array(
				'???'=>'???',
				'???'=>'???',
				'???'=>'???',
				'???'=>'???',
				'???'=>'???',
				'???'=>'???',
				'???'=>'???',
				'???'=>'???',
				'???'=>'???',
				'???'=>'???',
				'???'=>'???',
				'???'=>'???',
			);
			$this->PDF_WriteText("?????????{$th[$bazi->dzn]}", array(
					'style'=>array('size'=>11),
					'cell'=>array('x' => 1.1, 'y'=>4.4),
				)
			);

			// ??????
			$wc = array(
				'???'=>'???',
				'???'=>'???',
				'???'=>'???',
				'???'=>'???',
				'???'=>'???',
				'???'=>'???',
				'???'=>'???',
				'???'=>'???',
				'???'=>'???',
				'???'=>'???',
			);
			$this->PDF_WriteText("?????????{$wc[$bazi->tgr]}", array(
					'style'=>array('size'=>11),
					'cell'=>array('x' => 5, 'y'=>4.4),
				)
			);
		/* <= row 4 */

		/* personal direction calculate => */
			// $a_compare = $info_dz[$bazi->dzn][0];
			// $b_compare = $info_dz[$dz[($bazi->c_y-1900+36)%12]][0];

			// if ($a_compare != $b_compare) {
			// 	$gua_year = $bazi->c_y+1;
			// } else {
			// 	$gua_year = $bazi->c_y;
			// }

			// if ($gua_year >= 2000) {
			// 	// male
			// 	$x = str_split($gua_year, 2);
			// 	$result_male = (99-$x[1])%9;
			// 	if ($result_male == 5) {
			// 		$result_male = 2;
			// 	}
			// 	if ($result_male == 0) {
			// 		$result_male = 9;
			// 	}
			// 	// female
			// 	$result_female = ($x[1]-3)%9;
			// 	if ($result_female == -3) {
			// 		$result_female = 6;
			// 	}
			// 	if ($result_female == -2) {
			// 		$result_female = 7;
			// 	}
			// 	if ($result_female == -1) {
			// 		$result_female = 8;
			// 	}
			// 	if ($result_female == 5) {
			// 		$result_female = 8;
			// 	}
			// 	if ($result_female == 0) {
			// 		$result_female = 9;
			// 	}
			// } else {
			// 	// male
			// 	$x = str_split($gua_year, 2);
			// 	$result_male = (100-$x[1])%9;
			// 	if ($result_male == 5) {
			// 		$result_male = 2;
			// 	}
			// 	if ($result_male == 0) {
			// 		$result_male = 9;
			// 	}
			// 	// female
			// 	$result_female = ($x[1]-4)%9;
			// 	if ($result_female == 5) {
			// 		$result_female = 8;
			// 	}
			// 	if ($result_female == 0) {
			// 		$result_female = 9;
			// 	}
			// }
			// if ($gender == '???') {
			// 	$gua_result = $result_male;
			// } else {
			// 	$gua_result = $result_female;
			// }

			$gua_result = $pd_gua;
		/* <= personal direction calculate */

		$this->Rect(1, 8.7, 19, 0.5, 'F', array(), array(147, 28, 20));
		$this->PDF_WriteText("??????????????????24???",
			array(
				'style'=>array('size'=>10,'color'=>array(255, 255, 255)),
				'cell'=>array('x'=>1.1,'y'=>8.72),
			)
		);
		$this->Rect(1, 8.7, 19, 10.2, '', $style);

		$gua = Yii::getAlias('@frontend')."/fs_tools/personal_direction/images/gua/personal-gua{$gua_result}.jpg";
		$this->PDF_Image($gua,  array('x' => 1, 'y' => 5.4, 'w' => 8.7, 'h' => 3.1));

		$compass = Yii::getAlias('@frontend')."/fs_tools/personal_direction/images/compass/compass-gua{$gua_result}.jpg";
		$this->PDF_Image($compass,  array('x' => 4.5, 'y' => 9.4, 'w' => 12, 'h' => 9.3));
		// $this->PDF_Image($compass,  array('x' => 0.3, 'y' => 10.2, 'w' => 20.4, 'h' => 10.2));

		// $this->Rect(10.6, 2.3, 10.2, 0.5, 'F', array(), array(147, 28, 20));
		$this->Rect(10, 1.7, 2.5, 0.5, 'F', array(
			'L' => 0,
			'T' => 0,
			'R' => array('width' => 0.03, 'color' => array(255, 255, 255)),
			'B' => 0,
		),array(147, 28, 20));
		$this->Rect(12.5, 1.7, 2.5, 0.5, 'F', array(
			'L' => array('width' => 0.03, 'color' => array(255, 255, 255)),
			'T' => 0,
			'R' => 1,
			'B' => 0,
		),array(147, 28, 20));
		$this->Rect(15, 1.7, 2.5, 0.5, 'F', array(
			'L' => array('width' => 0.03, 'color' => array(255, 255, 255)),
			'T' => 0,
			'R' => 1,
			'B' => 0,
		),array(147, 28, 20));
		$this->Rect(17.5, 1.7, 2.5, 0.5, 'F', array(
			'L' => array('width' => 0.03, 'color' => array(255, 255, 255)),
			'T' => 0,
			'R' => 0,
			'B' => 0,
		),array(147, 28, 20));

		$this->PDF_WriteText("??? Hour", array(
				'style'=>array('size'=>10,'color'=>array(255, 255, 255)),
				'cell'=>array('x' => 10, 'y'=>1.73, 'w'=>2.5, 'align'=>'C'),
			)
		);
		$this->PDF_WriteText("??? Day", array(
				'style'=>array('size'=>10,'color'=>array(255, 255, 255)),
				'cell'=>array('x' => 12.5, 'y'=>1.73, 'w'=>2.5, 'align'=>'C'),
			)
		);
		$this->PDF_WriteText("??? Month", array(
				'style'=>array('size'=>10,'color'=>array(255, 255, 255)),
				'cell'=>array('x' => 15, 'y'=>1.73, 'w'=>2.5, 'align'=>'C'),
			)
		);
		$this->PDF_WriteText("??? Year", array(
				'style'=>array('size'=>10,'color'=>array(255, 255, 255)),
				'cell'=>array('x' => 17.5, 'y'=>1.73, 'w'=>2.5, 'align'=>'C'),
			)
		);

		/* bazi => */
			/* row 1 => */
				$this->Rect(10, 2.2, 2.5, 1, '', $style);
				$this->PDF_WriteText($ss[$bazi->tgr][$bazi->tgs], array(
						'style'=>array('size'=>8,'color'=>array(0, 0, 0)),
						'cell'=>array('x' => 10, 'y'=>2.3, 'w'=>2.5, 'align'=>'C'),
					)
				);
				$this->PDF_WriteText($ss_info[$ss[$bazi->tgr][$bazi->tgs]], array(
						'style'=>array('size'=>8,'color'=>array(0, 0, 0)),
						'cell'=>array('x' => 10, 'y'=>2.7, 'w'=>2.5, 'align'=>'C'),
					)
				);

				$this->Rect(12.5, 2.2, 2.5, 1, '', $style);
				$this->PDF_WriteText("??????", array(
						'style'=>array('size'=>8,'color'=>array(0, 0, 0)),
						'cell'=>array('x' => 12.5, 'y'=>2.3, 'w'=>2.5, 'align'=>'C'),
					)
				);
				$this->PDF_WriteText("DM", array(
						'style'=>array('size'=>8,'color'=>array(0, 0, 0)),
						'cell'=>array('x' => 12.5, 'y'=>2.7, 'w'=>2.5, 'align'=>'C'),
					)
				);

				$this->Rect(15, 2.2, 2.5, 1, '', $style);
				$this->PDF_WriteText($ss[$bazi->tgr][$bazi->tgy], array(
						'style'=>array('size'=>8,'color'=>array(0, 0, 0)),
						'cell'=>array('x' => 15, 'y'=>2.3, 'w'=>2.5, 'align'=>'C'),
					)
				);
				$this->PDF_WriteText($ss_info[$ss[$bazi->tgr][$bazi->tgy]], array(
						'style'=>array('size'=>8,'color'=>array(0, 0, 0)),
						'cell'=>array('x' => 15, 'y'=>2.7, 'w'=>2.5, 'align'=>'C'),
					)
				);

				$this->Rect(17.5, 2.2, 2.5, 1, '', $style);
				$this->PDF_WriteText($ss[$bazi->tgr][$bazi->tgn], array(
						'style'=>array('size'=>8,'color'=>array(0, 0, 0)),
						'cell'=>array('x' => 17.5, 'y'=>2.3, 'w'=>2.5, 'align'=>'C'),
					)
				);
				$this->PDF_WriteText($ss_info[$ss[$bazi->tgr][$bazi->tgn]], array(
						'style'=>array('size'=>8,'color'=>array(0, 0, 0)),
						'cell'=>array('x' => 17.5, 'y'=>2.7, 'w'=>2.5, 'align'=>'C'),
					)
				);
			/* <= row 1 */

			$element_color = array(
				'Water' => array(0, 0, 255),
				'Earth' => array(165, 42, 42),
				'Wood'  => array(0, 128, 0),
				'Fire'  => array(255, 0, 0),
				'Metal' => array(230, 195, 0),
			);
			/* row 2 => */
				$this->Rect(10, 3.2, 2.5, 1.5, '', $style);
				$this->PDF_WriteText($bazi->tgs, array(
						'style'=>array('size'=>25,'color'=>array(147, 28, 20)),
						'cell'=>array('x' => 10, 'y'=>3.2, 'w'=>2.5, 'align'=>'C'),
					)
				);
				$this->PDF_WriteText($info_tg[$bazi->tgs][1], array(
						'style'=>array('size'=>10,'color'=>$element_color[$info_tg[$bazi->tgs][2]]),
						'cell'=>array('x' => 9.8, 'y'=>3.7, 'w'=>2.5, 'align'=>'R'),
					)
				);
				$this->PDF_WriteText("{$info_tg[$bazi->tgs][0]}, {$info_tg[$bazi->tgs][2]}", array(
						'style'=>array('size'=>8,'color'=>array(0, 0, 0)),
						'cell'=>array('x' => 10, 'y'=>4.2, 'w'=>2.5, 'align'=>'C'),
					)
				);

				$this->Rect(12.5, 3.2, 2.5, 1.5, '', $style);
				$this->PDF_WriteText($bazi->tgr, array(
						'style'=>array('size'=>25,'color'=>array(147, 28, 20)),
						'cell'=>array('x' => 12.5, 'y'=>3.2, 'w'=>2.5, 'align'=>'C'),
					)
				);
				$this->PDF_WriteText($info_tg[$bazi->tgr][1], array(
						'style'=>array('size'=>10,'color'=>$element_color[$info_tg[$bazi->tgr][2]]),
						'cell'=>array('x' => 12.3, 'y'=>3.7, 'w'=>2.5, 'align'=>'R'),
					)
				);
				$this->PDF_WriteText("{$info_tg[$bazi->tgr][0]}, {$info_tg[$bazi->tgr][2]}", array(
						'style'=>array('size'=>8,'color'=>array(0, 0, 0)),
						'cell'=>array('x' => 12.5, 'y'=>4.2, 'w'=>2.5, 'align'=>'C'),
					)
				);

				$this->Rect(15, 3.2, 2.5, 1.5, '', $style);
				$this->PDF_WriteText($bazi->tgy, array(
						'style'=>array('size'=>25,'color'=>array(147, 28, 20)),
						'cell'=>array('x' => 15, 'y'=>3.2, 'w'=>2.5, 'align'=>'C'),
					)
				);
				$this->PDF_WriteText($info_tg[$bazi->tgy][1], array(
						'style'=>array('size'=>10,'color'=>$element_color[$info_tg[$bazi->tgy][2]]),
						'cell'=>array('x' => 14.8, 'y'=>3.7, 'w'=>2.5, 'align'=>'R'),
					)
				);
				$this->PDF_WriteText("{$info_tg[$bazi->tgy][0]}, {$info_tg[$bazi->tgy][2]}", array(
						'style'=>array('size'=>8,'color'=>array(0, 0, 0)),
						'cell'=>array('x' => 15, 'y'=>4.2, 'w'=>2.5, 'align'=>'C'),
					)
				);

				$this->Rect(17.5, 3.2, 2.5, 1.5, '', $style);
				$this->PDF_WriteText($bazi->tgn, array(
						'style'=>array('size'=>25,'color'=>array(147, 28, 20)),
						'cell'=>array('x' => 17.5, 'y'=>3.2, 'w'=>2.5, 'align'=>'C'),
					)
				);
				$this->PDF_WriteText($info_tg[$bazi->tgn][1], array(
						'style'=>array('size'=>10,'color'=>$element_color[$info_tg[$bazi->tgn][2]]),
						'cell'=>array('x' => 17.3, 'y'=>3.7, 'w'=>2.5, 'align'=>'R'),
					)
				);
				$this->PDF_WriteText("{$info_tg[$bazi->tgn][0]}, {$info_tg[$bazi->tgn][2]}", array(
						'style'=>array('size'=>8,'color'=>array(0, 0, 0)),
						'cell'=>array('x' => 17.5, 'y'=>4.2, 'w'=>2.5, 'align'=>'C'),
					)
				);
			/* <= row 2 */

			/* row 3 => */
				$this->Rect(10, 4.7, 2.5, 1.5, '', $style);
				$this->PDF_WriteText($bazi->dzs, array(
						'style'=>array('size'=>25,'color'=>array(147, 28, 20)),
						'cell'=>array('x' => 10, 'y'=>4.7, 'w'=>2.5, 'align'=>'C'),
					)
				);
				$this->PDF_WriteText($info_dz[$bazi->dzs][2], array(
						'style'=>array('size'=>10,'color'=>$element_color[$info_dz[$bazi->dzs][3]]),
						'cell'=>array('x' => 9.8, 'y'=>5.2, 'w'=>2.5, 'align'=>'R'),
					)
				);
				$this->PDF_WriteText("{$info_dz[$bazi->dzs][1]}, {$info_dz[$bazi->dzs][3]}", array(
						'style'=>array('size'=>8,'color'=>array(0, 0, 0)),
						'cell'=>array('x' => 10, 'y'=>5.7, 'w'=>2.5, 'align'=>'C'),
					)
				);

				$this->Rect(12.5, 4.7, 2.5, 1.5, '', $style);
				$this->PDF_WriteText($bazi->dzr, array(
						'style'=>array('size'=>25,'color'=>array(147, 28, 20)),
						'cell'=>array('x' => 12.5, 'y'=>4.7, 'w'=>2.5, 'align'=>'C'),
					)
				);
				$this->PDF_WriteText($info_dz[$bazi->dzr][2], array(
						'style'=>array('size'=>10,'color'=>$element_color[$info_dz[$bazi->dzr][3]]),
						'cell'=>array('x' => 12.3, 'y'=>5.2, 'w'=>2.5, 'align'=>'R'),
					)
				);
				$this->PDF_WriteText("{$info_dz[$bazi->dzr][1]}, {$info_dz[$bazi->dzr][3]}", array(
						'style'=>array('size'=>8,'color'=>array(0, 0, 0)),
						'cell'=>array('x' => 12.5, 'y'=>5.7, 'w'=>2.5, 'align'=>'C'),
					)
				);

				$this->Rect(15, 4.7, 2.5, 1.5, '', $style);
				$this->PDF_WriteText($bazi->dzy, array(
						'style'=>array('size'=>25,'color'=>array(147, 28, 20)),
						'cell'=>array('x' => 15, 'y'=>4.7, 'w'=>2.5, 'align'=>'C'),
					)
				);
				$this->PDF_WriteText($info_dz[$bazi->dzy][2], array(
						'style'=>array('size'=>10,'color'=>$element_color[$info_dz[$bazi->dzy][3]]),
						'cell'=>array('x' => 14.8, 'y'=>5.2, 'w'=>2.5, 'align'=>'R'),
					)
				);
				$this->PDF_WriteText("{$info_dz[$bazi->dzy][1]}, {$info_dz[$bazi->dzy][3]}", array(
						'style'=>array('size'=>8,'color'=>array(0, 0, 0)),
						'cell'=>array('x' => 15, 'y'=>5.7, 'w'=>2.5, 'align'=>'C'),
					)
				);

				$this->Rect(17.5, 4.7, 2.5, 1.5, '', $style);
				$this->PDF_WriteText($bazi->dzn, array(
						'style'=>array('size'=>25,'color'=>array(147, 28, 20)),
						'cell'=>array('x' => 17.5, 'y'=>4.7, 'w'=>2.5, 'align'=>'C'),
					)
				);
				$this->PDF_WriteText($info_dz[$bazi->dzn][2], array(
						'style'=>array('size'=>10,'color'=>$element_color[$info_dz[$bazi->dzn][3]]),
						'cell'=>array('x' => 17.3, 'y'=>5.2, 'w'=>2.5, 'align'=>'R'),
					)
				);
				$this->PDF_WriteText("{$info_dz[$bazi->dzn][1]}, {$info_dz[$bazi->dzn][3]}", array(
						'style'=>array('size'=>8,'color'=>array(0, 0, 0)),
						'cell'=>array('x' => 17.5, 'y'=>5.7, 'w'=>2.5, 'align'=>'C'),
					)
				);
			/* <= row 3 */

			/* row 4 => */
				$this->Rect(10, 6.2, 2.5, 1, '', $style);
				$dzcgs_count = count($dzcg[$bazi->dzs]);
				switch($dzcgs_count) {
					case 1:
						$dzcgs_x = 0;
						$dzcgs_w = 2.45;
						break;
					case 2:
						$dzcgs_x = 0.8;
						$dzcgs_w = 1.7;
						break;
					case 3:
						$dzcgs_x = 0.83;
						$dzcgs_w = 0.83;
						break;
					default:
						exit;
				}
				$dzcgs_x0 = 0;
				foreach ($dzcg[$bazi->dzs] as $key => $value) {
					$this->PDF_WriteText($value, array(
							'style'=>array('size'=>9,'color'=>array(0, 0, 0)),
							'cell'=>array('x' => 10.05+$dzcgs_x0, 'y'=>6.3, 'w'=>$dzcgs_w, 'align'=>'C'),
						)
					);
					$this->PDF_WriteText($info_tg[$value][0], array(
							'style'=>array('size'=>7,'color'=>array(0, 0, 0)),
							'cell'=>array('x' => 10.08+$dzcgs_x0, 'y'=>6.7, 'w'=>$dzcgs_w, 'align'=>'C'),
						)
					);
					$dzcgs_x0 += $dzcgs_x;
				}

				$this->Rect(12.5, 6.2, 2.5, 1, '', $style);
				$dzcgr_count = count($dzcg[$bazi->dzr]);
				switch($dzcgr_count) {
					case 1:
						$dzcgr_x = 0;
						$dzcgr_w = 2.45;
						break;
					case 2:
						$dzcgr_x = 0.8;
						$dzcgr_w = 1.7;
						break;
					case 3:
						$dzcgr_x = 0.83;
						$dzcgr_w = 0.83;
						break;
					default:
						exit;
				}
				$dzcgr_x0 = 0;
				foreach ($dzcg[$bazi->dzr] as $key => $value) {
					$this->PDF_WriteText($value, array(
							'style'=>array('size'=>9,'color'=>array(0, 0, 0)),
							'cell'=>array('x' => 12.55+$dzcgr_x0, 'y'=>6.3, 'w'=>$dzcgr_w, 'align'=>'C'),
						)
					);
					$this->PDF_WriteText($info_tg[$value][0], array(
							'style'=>array('size'=>7,'color'=>array(0, 0, 0)),
							'cell'=>array('x' => 12.58+$dzcgr_x0, 'y'=>6.7, 'w'=>$dzcgr_w, 'align'=>'C'),
						)
					);
					$dzcgr_x0 += $dzcgr_x;
				}

				$this->Rect(15, 6.2, 2.5, 1, '', $style);
				$dzcgy_count = count($dzcg[$bazi->dzy]);
				switch($dzcgy_count) {
					case 1:
						$dzcgy_x = 0;
						$dzcgy_w = 2.45;
						break;
					case 2:
						$dzcgy_x = 0.8;
						$dzcgy_w = 1.7;
						break;
					case 3:
						$dzcgy_x = 0.83;
						$dzcgy_w = 0.83;
						break;
					default:
						exit;
				}
				$dzcgy_x0 = 0;
				foreach ($dzcg[$bazi->dzy] as $key => $value) {
					$this->PDF_WriteText($value, array(
							'style'=>array('size'=>9,'color'=>array(0, 0, 0)),
							'cell'=>array('x' => 15.05+$dzcgy_x0, 'y'=>6.3, 'w'=>$dzcgy_w, 'align'=>'C'),
						)
					);
					$this->PDF_WriteText($info_tg[$value][0], array(
							'style'=>array('size'=>7,'color'=>array(0, 0, 0)),
							'cell'=>array('x' => 15.08+$dzcgy_x0, 'y'=>6.7, 'w'=>$dzcgy_w, 'align'=>'C'),
						)
					);
					$dzcgy_x0 += $dzcgy_x;
				}

				$this->Rect(17.5, 6.2, 2.5, 1, '', $style);
				$dzcgn_count = count($dzcg[$bazi->dzn]);
				switch($dzcgn_count) {
					case 1:
						$dzcgn_x = 0;
						$dzcgn_w = 2.45;
						break;
					case 2:
						$dzcgn_x = 0.8;
						$dzcgn_w = 1.7;
						break;
					case 3:
						$dzcgn_x = 0.83;
						$dzcgn_w = 0.83;
						break;
					default:
						exit;
				}
				$dzcgn_x0 = 0;
				foreach ($dzcg[$bazi->dzn] as $key => $value) {
					$this->PDF_WriteText($value, array(
							'style'=>array('size'=>9,'color'=>array(0, 0, 0)),
							'cell'=>array('x' => 17.55+$dzcgn_x0, 'y'=>6.3, 'w'=>$dzcgn_w, 'align'=>'C'),
						)
					);
					$this->PDF_WriteText($info_tg[$value][0], array(
							'style'=>array('size'=>7,'color'=>array(0, 0, 0)),
							'cell'=>array('x' => 17.58+$dzcgn_x0, 'y'=>6.7, 'w'=>$dzcgn_w, 'align'=>'C'),
						)
					);
					$dzcgn_x0 += $dzcgn_x;
				}
			/* <= row 4 */

			/* row 5 => */
				$this->Rect(10, 7.2, 2.5, 1.3, '', $style);
				$cgsss_count = count($dzcg[$bazi->dzs]);
				switch($cgsss_count) {
					case 1:
						$cgsss_x = 0;
						$cgsss_w = 0.833;
						$cgsss_start = 0.83;
						break;
					case 2:
						$cgsss_x = 0.8;
						$cgsss_w = 0.833;
						$cgsss_start = 0.45;
						break;
					case 3:
						$cgsss_x = 0.833;
						$cgsss_w = 0.833;
						$cgsss_start = 0;
						break;
					default:
						exit;
				}
				$cgsss_x0 = 0;
				foreach ($dzcg[$bazi->dzs] as $key => $value) {
					$this->PDF_WriteText($ss[$bazi->tgr][$value], array(
							'style'=>array('size'=>9,'color'=>array(0, 0, 0)),
							'cell'=>array('x' => 10.05+$cgsss_x0+$cgsss_start, 'y'=>7.3, 'w'=>$cgsss_w, 'align'=>'C'),
						)
					);
					$this->PDF_WriteText($ss_info[$ss[$bazi->tgr][$value]], array(
							'style'=>array('size'=>8,'color'=>array(0, 0, 0)),
							'cell'=>array('x' => 10.05+$cgsss_x0+$cgsss_start, 'y'=>8.1, 'w'=>$cgsss_w, 'align'=>'C'),
						)
					);
					$cgsss_x0 += $cgsss_x;
				}

				$this->Rect(12.5, 7.2, 2.5, 1.3, '', $style);
				$cgssr_count = count($dzcg[$bazi->dzr]);
				switch($cgssr_count) {
					case 1:
						$cgssr_x = 0;
						$cgssr_w = 0.833;
						$cgssr_start = 0.83;
						break;
					case 2:
						$cgssr_x = 0.8;
						$cgssr_w = 0.833;
						$cgssr_start = 0.45;
						break;
					case 3:
						$cgssr_x = 0.833;
						$cgssr_w = 0.833;
						$cgssr_start = 0;
						break;
					default:
						exit;
				}
				$cgssr_x0 = 0;
				foreach ($dzcg[$bazi->dzr] as $key => $value) {
					$this->PDF_WriteText($ss[$bazi->tgr][$value], array(
							'style'=>array('size'=>9,'color'=>array(0, 0, 0)),
							'cell'=>array('x' => 12.55+$cgssr_x0+$cgssr_start, 'y'=>7.3, 'w'=>$cgssr_w, 'align'=>'C'),
						)
					);
					$this->PDF_WriteText($ss_info[$ss[$bazi->tgr][$value]], array(
							'style'=>array('size'=>8,'color'=>array(0, 0, 0)),
							'cell'=>array('x' => 12.55+$cgssr_x0+$cgssr_start, 'y'=>8.1, 'w'=>$cgssr_w, 'align'=>'C'),
						)
					);
					$cgssr_x0 += $cgssr_x;
				}

				$this->Rect(15, 7.2, 2.5, 1.3, '', $style);
				$cgssy_count = count($dzcg[$bazi->dzy]);
				switch($cgssy_count) {
					case 1:
						$cgssy_x = 0;
						$cgssy_w = 0.833;
						$cgssy_start = 0.83;
						break;
					case 2:
						$cgssy_x = 0.8;
						$cgssy_w = 0.833;
						$cgssy_start = 0.45;
						break;
					case 3:
						$cgssy_x = 0.833;
						$cgssy_w = 0.833;
						$cgssy_start = 0;
						break;
					default:
						exit;
				}
				$cgssy_x0 = 0;
				foreach ($dzcg[$bazi->dzy] as $key => $value) {
					$this->PDF_WriteText($ss[$bazi->tgr][$value], array(
							'style'=>array('size'=>9,'color'=>array(0, 0, 0)),
							'cell'=>array('x' => 15.05+$cgssy_x0+$cgssy_start, 'y'=>7.3, 'w'=>$cgssy_w, 'align'=>'C'),
						)
					);
					$this->PDF_WriteText($ss_info[$ss[$bazi->tgr][$value]], array(
							'style'=>array('size'=>8,'color'=>array(0, 0, 0)),
							'cell'=>array('x' => 15.05+$cgssy_x0+$cgssy_start, 'y'=>8.1, 'w'=>$cgssy_w, 'align'=>'C'),
						)
					);
					$cgssy_x0 += $cgssy_x;
				}

				$this->Rect(17.5, 7.2, 2.5, 1.3, '', $style);
				$cgssn_count = count($dzcg[$bazi->dzn]);
				switch($cgssn_count) {
					case 1:
						$cgssn_x = 0;
						$cgssn_w = 0.833;
						$cgssn_start = 0.83;
						break;
					case 2:
						$cgssn_x = 0.8;
						$cgssn_w = 0.833;
						// $cgssn_start = 0.415;
						// $cgssn_start = 0.2074;
						$cgssn_start = 0.45;
						break;
					case 3:
						$cgssn_x = 0.833;
						$cgssn_w = 0.833;
						$cgssn_start = 0;
						break;
					default:
						exit;
				}
				$cgssn_x0 = 0;
				foreach ($dzcg[$bazi->dzn] as $key => $value) {
					$this->PDF_WriteText($ss[$bazi->tgr][$value], array(
							'style'=>array('size'=>9,'color'=>array(0, 0, 0)),
							'cell'=>array('x' => 17.55+$cgssn_x0+$cgssn_start, 'y'=>7.3, 'w'=>$cgssn_w, 'align'=>'C'),
						)
					);
					$this->PDF_WriteText($ss_info[$ss[$bazi->tgr][$value]], array(
							'style'=>array('size'=>8,'color'=>array(0, 0, 0)),
							'cell'=>array('x' => 17.55+$cgssn_x0+$cgssn_start, 'y'=>8.1, 'w'=>$cgssn_w, 'align'=>'C'),
						)
					);
					$cgssn_x0 += $cgssn_x;
				}
			/* <= row 5 */
		/* <= bazi */

		$this->Rect(0.98, 19.1, 9.5, 0.5, 'F', array(), array(147, 28, 20));
		$this->PDF_WriteText("?????????", array(
				'style'=>array('size'=>10,'color'=>array(255, 255, 255)),
				'cell'=>array('x'=>1.1, 'y'=>19.12),
			)
		);
		$this->Rect(1, 19.6, 9.5, 9.8, '', $style);

		$this->Rect(10.52, 19.1, 9.5, 0.5, 'F', array(), array(147, 28, 20));
		$this->PDF_WriteText("?????????", array(
				'style'=>array('size'=>10,'color'=>array(255, 255, 255)),
				'cell'=>array('x'=>10.6, 'y'=>19.12),
			)
		);
		$this->Rect(10.5, 19.6, 9.5, 9.8, '', $style);

		/* ????????? => */
			$this->PDF_WriteText("?????????",
				array(
					'style'=>array('size'=>11,'color'=>array(147, 28, 20)),
					'cell'=>array('x'=>1.25,'y'=>20,'w'=>9.3),
				)
			);
			$this->PDF_WriteText("- ???????????????????????????????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>2.45,'y'=>20,'w'=>9.3),
				)
			);
			$this->PDF_WriteText("???????????????????????????????????????????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>1.25),
				)
			);
			$this->PDF_WriteText("???????????????????????????????????????????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>1.25),
				)
			);
			$this->PDF_WriteText("?????????????????????????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>1.25),
				)
			);
			$this->PDF_WriteText("?????????",
				array(
					'style'=>array('size'=>11,'color'=>array(147, 28, 20)),
					'cell'=>array('x'=>1.25,'y'=>22.3,'w'=>9.3),
				)
			);
			$this->PDF_WriteText("- ???????????????????????????????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>2.45,'y'=>22.3,'w'=>9.3),
				)
			);
			$this->PDF_WriteText("???????????????????????????????????????????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>1.25),
				)
			);
			$this->PDF_WriteText("???????????????????????????????????????????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>1.25),
				)
			);
			$this->PDF_WriteText("???????????????????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>1.25),
				)
			);
			$this->PDF_WriteText("?????????",
				array(
					'style'=>array('size'=>11,'color'=>array(147, 28, 20)),
					'cell'=>array('x'=>1.25,'y'=>24.6,'w'=>10),
				)
			);
			$this->PDF_WriteText("- ???????????????????????????????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>2.45,'y'=>24.6,'w'=>10),
				)
			);
			$this->PDF_WriteText("???????????????????????????????????????????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>1.25),
				)
			);
			$this->PDF_WriteText("???????????????????????????????????????????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>1.25),
				)
			);
			$this->PDF_WriteText("?????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>1.25),
				)
			);
			$this->PDF_WriteText("?????????",
				array(
					'style'=>array('size'=>11,'color'=>array(147, 28, 20)),
					'cell'=>array('x'=>1.25,'y'=>26.9,'w'=>10),
				)
			);
			$this->PDF_WriteText("- ???????????????????????????????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>2.45,'y'=>26.9,'w'=>10),
				)
			);
			$this->PDF_WriteText("???????????????????????????????????????????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>1.25),
				)
			);
			$this->PDF_WriteText("???????????????????????????????????????????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>1.25),
				)
			);
			$this->PDF_WriteText("???????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>1.25),
				)
			);
		/* <= ????????? */

		/* ????????? => */
			$this->PDF_WriteText("?????????",
				array(
					'style'=>array('size'=>11,'color'=>array(0, 0, 0)),
					'cell'=>array('x'=>10.75,'y'=>20,'w'=>9.3),
				)
			);
			$this->PDF_WriteText("- ???????????????????????????????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>11.95,'y'=>20,'w'=>9.3),
				)
			);
			$this->PDF_WriteText("???????????????????????????????????????????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>10.75,'w'=>10.5),
				)
			);
			$this->PDF_WriteText("???????????????????????????????????????????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>10.75,'w'=>10.5),
				)
			);
			$this->PDF_WriteText("?????????????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>10.75,'w'=>10.5),
				)
			);
			$this->PDF_WriteText("?????????",
				array(
					'style'=>array('size'=>11,'color'=>array(0, 0, 0)),
					'cell'=>array('x'=>10.75,'y'=>22.3,'w'=>10),
				)
			);
			$this->PDF_WriteText("- ???????????????????????????????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>11.95,'y'=>22.3,'w'=>10),
				)
			);
			$this->PDF_WriteText("???????????????????????????????????????????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>10.75,'w'=>10.5),
				)
			);
			$this->PDF_WriteText("???????????????????????????????????????????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>10.75,'w'=>10.5),
				)
			);
			$this->PDF_WriteText("???????????????????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>10.75,'w'=>10.5),
				)
			);
			$this->PDF_WriteText("?????????",
				array(
					'style'=>array('size'=>11,'color'=>array(0, 0, 0)),
					'cell'=>array('x'=>10.75,'y'=>24.6,'w'=>10),
				)
			);
			$this->PDF_WriteText("- ???????????????????????????????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>11.95,'y'=>24.6,'w'=>10),
				)
			);
			$this->PDF_WriteText("???????????????????????????????????????????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>10.75,'w'=>10.5),
				)
			);
			$this->PDF_WriteText("???????????????????????????????????????????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>10.75,'w'=>10.5),
				)
			);
			$this->PDF_WriteText("????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>10.75,'w'=>10.5),
				)
			);
			$this->PDF_WriteText("?????????",
				array(
					'style'=>array('size'=>11,'color'=>array(0, 0, 0)),
					'cell'=>array('x'=>10.75,'y'=>26.8,'w'=>10),
				)
			);
			$this->PDF_WriteText("- ???????????????????????????????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>11.95,'y'=>26.8,'w'=>10),
				)
			);
			$this->PDF_WriteText("???????????????????????????????????????????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>10.75,'w'=>10.5),
				)
			);
			$this->PDF_WriteText("???????????????????????????????????????????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>10.75,'w'=>10.5),
				)
			);
			$this->PDF_WriteText("???????????????????????????????????????",
				array(
					'style'=>array('size'=>10,'color'=>array(85, 85, 85)),
					'cell'=>array('x'=>10.75,'w'=>10.5),
				)
			);
		/* <= ????????? */

		$this->AddPage();

		$this->Rect(1, 1.7, 9.48, 1, 'F', array(), array(147, 28, 20));
		$this->PDF_WriteText("??????????????????24???", array(
				'style'=>array('size'=>15,'color'=>array(255, 255, 255)),
				'cell'=>array('x'=>1.1, 'y'=>1.85, 'w'=>9.5, 'align'=>'C'),
			)
		);
		$this->Rect(1.02, 2.7, 9.48, 9, '', $style);
		$compass_small = Yii::getAlias('@frontend')."/fs_tools/personal_direction/images/compass/small/compass-gua{$gua_result}.jpg";
		$this->PDF_Image($compass_small,  array('x' => 1.5, 'y' => 2.8, 'w' => 8.7, 'h' => 8.7));

		$current_year = date("Y");
		$today_dt = new \DateTime(date("Y-m-d"));
		// $current_year = date("2019");
		// $today_dt = new \DateTime(date("2019-02-03"));

		switch($current_year) {
			case 2018:
				$lc = new \DateTime("2018-02-04");
				$today_dt >= $lc ? $gua_year='2018' : $gua_year='2017';
				break;
			case 2019:
				$lc = new \DateTime("2019-02-04");
				$today_dt >= $lc ? $gua_year='2019' : $gua_year='2018';
				break;
			case 2020:
				$lc = new \DateTime("2020-02-04");
				$today_dt >= $lc ? $gua_year='2020' : $gua_year='2019';
				break;
			case 2021:
				$lc = new \DateTime("2021-02-03");
				$today_dt >= $lc ? $gua_year='2021' : $gua_year='2020';
				break;
			case 2022:
				$lc = new \DateTime("2022-02-04");
				$today_dt >= $lc ? $gua_year='2022' : $gua_year='2021';
				break;
			case 2023:
				$lc = new \DateTime("2023-02-04");
				$today_dt >= $lc ? $gua_year='2023' : $gua_year='2022';
				break;
			case 2024:
				$lc = new \DateTime("2024-02-04");
				$today_dt >= $lc ? $gua_year='2024' : $gua_year='2023';
				break;
			case 2025:
				$lc = new \DateTime("2025-02-03");
				$today_dt >= $lc ? $gua_year='2025' : $gua_year='2024';
				break;
			case 2026:
				$lc = new \DateTime("2026-02-04");
				$today_dt >= $lc ? $gua_year='2026' : $gua_year='2025';
				break;
			default:
				exit;
		}
		// print_r($gua_year);exit;

		$this->Rect(10.52, 1.7, 9.48, 1, 'F', array(), array(147, 28, 20));
		$this->PDF_WriteText("{$gua_year}????????????", array(
				'style'=>array('size'=>15,'color'=>array(255, 255, 255)),
				'cell'=>array('x'=>10.6, 'y'=>1.85, 'w'=>9.4, 'align'=>'C'),
			)
		);
		$this->Rect(10.5, 2.7, 9.48, 9, '', $style);
		$gua_year_img = Yii::getAlias('@frontend')."/fs_tools/personal_direction/images/year/{$gua_year}.jpg";
		$this->PDF_Image($gua_year_img,  array('x' => 11.25, 'y' => 3.2, 'w' => 8, 'h' => 8));

		$this->Rect(1, 12.2, 19, 0.8, 'F', array(), array(147, 28, 20));
		$this->PDF_WriteText("????????????", array(
				'style'=>array('size'=>13,'color'=>array(255, 255, 255)),
				'cell'=>array('x'=>1.1, 'y'=>12.3, 'w'=>19, 'align'=>'L'),
			)
		);
		$nine_star = Yii::getAlias('@frontend')."/fs_tools/personal_direction/images/nine_star.jpg";
		$this->PDF_Image($nine_star,  array('x' => 0.92, 'y' => 13, 'w' => 19.16, 'h' => 15.5));
	}
}


