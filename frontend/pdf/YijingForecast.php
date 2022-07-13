<?php

namespace frontend\pdf;

use Yii;
use pentajeu\extensions\EasyPDF;

class YijingForecast extends EasyPDF
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

		$this->SetAuthor("Fengshui Republic Yi Jing PDF");
		$this->SetTitle("Fengshui Republic Yi Jing PDF");
		$this->SetSubject("Fengshui Republic Yi Jing PDF");
		$this->SetKeywords("Fengshui Republic Yi Jing PDF");
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
		$image_file = Yii::getAlias('@frontend')."/fs_tools/yijing/images/logo.png";
		$this->Rect(1, 0.1, 19, 1.5, 'F', array(), array(147, 28, 20));
		$this->PDF_Image($image_file,  array('x' => 12.8, 'y' => 0.2, 'w' => 7, 'h' => 1.3));
	}

	public function generate($gua_up, $gua_down, $yao_number, $method, $dt, $minute, $phone)
	{
		$gua64 = require(Yii::getAlias('@frontend').'/fs_tools/yijing/gua64.php');
		$gua64_ = require(Yii::getAlias('@frontend').'/fs_tools/yijing/gua64_.php');

		// 生入 = 吉
		// 生出 = 兇
		// 克出 = 吉
		// 克入 = 兇
		// 比旺 = 吉
		$ti_yong_sheng_ke = array(
			'金' => array(
				'金' => array(
					'relate' => '比旺',
					'ji_xiong' => '吉',
				),
				'木' => array(
					'relate' => '克出',
					'ji_xiong' => '吉',
				),
				'水' => array(
					'relate' => '洩出',
					'ji_xiong' => '兇',
				),
				'火' => array(
					'relate' => '克入',
					'ji_xiong' => '兇',
				),
				'土' => array(
					'relate' => '生入',
					'ji_xiong' => '吉',
				),
			),
			'木' => array(
				'金' => array(
					'relate' => '克入',
					'ji_xiong' => '兇',
				),
				'木' => array(
					'relate' => '比旺',
					'ji_xiong' => '吉',
				),
				'水' => array(
					'relate' => '生入',
					'ji_xiong' => '吉',
				),
				'火' => array(
					'relate' => '洩出',
					'ji_xiong' => '兇',
				),
				'土' => array(
					'relate' => '克出',
					'ji_xiong' => '吉',
				),
			),
			'水' => array(
				'金' => array(
					'relate' => '生入',
					'ji_xiong' => '吉',
				),
				'木' => array(
					'relate' => '洩出',
					'ji_xiong' => '兇',
				),
				'水' => array(
					'relate' => '比旺',
					'ji_xiong' => '吉',
				),
				'火' => array(
					'relate' => '克出',
					'ji_xiong' => '吉',
				),
				'土' => array(
					'relate' => '克入',
					'ji_xiong' => '兇',
				),
			),
			'火' => array(
				'金' => array(
					'relate' => '克出',
					'ji_xiong' => '吉',
				),
				'木' => array(
					'relate' => '生入',
					'ji_xiong' => '吉',
				),
				'水' => array(
					'relate' => '克入',
					'ji_xiong' => '兇',
				),
				'火' => array(
					'relate' => '比旺',
					'ji_xiong' => '吉',
				),
				'土' => array(
					'relate' => '洩出',
					'ji_xiong' => '兇',
				),
			),
			'土' => array(
				'金' => array(
					'relate' => '洩出',
					'ji_xiong' => '兇',
				),
				'木' => array(
					'relate' => '克入',
					'ji_xiong' => '兇',
				),
				'水' => array(
					'relate' => '克出',
					'ji_xiong' => '吉',
				),
				'火' => array(
					'relate' => '生入',
					'ji_xiong' => '吉',
				),
				'土' => array(
					'relate' => '比旺',
					'ji_xiong' => '吉',
				),
			),
		);

		$method_name = array(
			'1' => '現時起卦',
			'2' => '報數起卦',
			'3' => '指定起卦',
			'4' => '電話號碼起卦',
		);

		$style = array(
			'L' => array('width' => 0.03, 'color' => array(147, 28, 20)),
			'T' => 1,
			'R' => 1,
			'B' => 1
		);

		$c_number = array(
			'0' => '零',
			'1' => '一',
			'2' => '二',
			'3' => '三',
			'4' => '四',
			'5' => '五',
			'6' => '六',
			'7' => '七',
			'8' => '八',
			'9' => '九',
		);

		$gua_shu = array(
			'1' => array(
				'name'    => '乾',
				'wu_xing' => '金',
				'color'   => array(230, 195, 0),
				'gua'     => array('2','2','2'),
			),
			'2' => array(
				'name'    => '兌',
				'wu_xing' => '金',
				'color'   => array(230, 195, 0),
				'gua'     => array('2','2','1'),
			),
			'3' => array(
				'name'    => '離',
				'wu_xing' => '火',
				'color'   => array(255, 0, 0),
				'gua'     => array('2','1','2'),
			),
			'4' => array(
				'name'    => '震',
				'wu_xing' => '木',
				'color'   => array(0, 128, 0),
				'gua'     => array('2','1','1'),
			),
			'5' => array(
				'name'    => '巽',
				'wu_xing' => '木',
				'color'   => array(0, 128, 0),
				'gua'     => array('1','2','2'),
			),
			'6' => array(
				'name'    => '坎',
				'wu_xing' => '水',
				'color'   => array(0, 0, 255),
				'gua'     => array('1','2','1'),
			),
			'7' => array(
				'name'    => '艮',
				'wu_xing' => '土',
				'color'   => array(165, 42, 42),
				'gua'     => array('1','1','2'),
			),
			'8' => array(
				'name'    => '坤',
				'wu_xing' => '土',
				'color'   => array(165, 42, 42),
				'gua'     => array('1','1','1'),
			)
		);

		$_gua_shu = array(
			'222' => '1',
			'221' => '2',
			'212' => '3',
			'211' => '4',
			'122' => '5',
			'121' => '6',
			'112' => '7',
			'111' => '8',
		);

		$gua_up_img   = implode("",$gua_shu[$gua_up]['gua']);
		$gua_down_img = implode("",$gua_shu[$gua_down]['gua']);
		$yao_number_list = array(
			'6' => '2',
			'5' => '1',
			'4' => '0',
			'3' => '2',
			'2' => '1',
			'1' => '0',
		);

		$yao_new = '';
		if ($yao_number > 3) {
			foreach ($gua_shu[$gua_up]['gua'] as $key => $value) {
				if ($key == $yao_number_list[$yao_number]) {
					$yao_bian = $gua_shu[$gua_up]['gua'][$yao_number_list[$yao_number]];
					switch($yao_bian) {
						case 1:
							$yao_new .= 2;
							break;
						case 2:
							$yao_new .= 1;
							break;
						default:
							exit;
					}
				} else {
					$yao_new .= $gua_shu[$gua_up]['gua'][$key];
				}
			}
			$bian_gua_up_img = $yao_new;
			$bian_gua_down_img = $gua_down_img;
		} else {
			foreach ($gua_shu[$gua_down]['gua'] as $key => $value) {
				if ($key == $yao_number_list[$yao_number]) {
					$yao_bian = $gua_shu[$gua_down]['gua'][$yao_number_list[$yao_number]];
					switch($yao_bian) {
						case 1:
							$yao_new .= 2;
							break;
						case 2:
							$yao_new .= 1;
							break;
						default:
							exit;
					}
				} else {
					$yao_new .= $gua_shu[$gua_down]['gua'][$key];
				}
			}
			$bian_gua_up_img = $gua_up_img;
			$bian_gua_down_img = $yao_new;
		}

		if ($gua_up == '1' && $gua_down == '1') {
			$hu_gua_up_img   = $gua_shu[$_gua_shu[$bian_gua_down_img]]['gua'][2].$gua_shu[$_gua_shu[$bian_gua_up_img]]['gua'][0].$gua_shu[$_gua_shu[$bian_gua_up_img]]['gua'][1];
			$hu_gua_down_img = $gua_shu[$_gua_shu[$bian_gua_down_img]]['gua'][1].$gua_shu[$_gua_shu[$bian_gua_down_img]]['gua'][2].$gua_shu[$_gua_shu[$bian_gua_up_img]]['gua'][0];
			// print_r('全陽<br>');
		} elseif ($gua_up == '8' && $gua_down == '8') {
			$hu_gua_up_img   = $gua_shu[$_gua_shu[$bian_gua_down_img]]['gua'][2].$gua_shu[$_gua_shu[$bian_gua_up_img]]['gua'][0].$gua_shu[$_gua_shu[$bian_gua_up_img]]['gua'][1];
			$hu_gua_down_img = $gua_shu[$_gua_shu[$bian_gua_down_img]]['gua'][1].$gua_shu[$_gua_shu[$bian_gua_down_img]]['gua'][2].$gua_shu[$_gua_shu[$bian_gua_up_img]]['gua'][0];
			// print_r('全陰<br>');
		} else {
			$hu_gua_up_img   = $gua_shu[$gua_down]['gua'][2].$gua_shu[$gua_up]['gua'][0].$gua_shu[$gua_up]['gua'][1];
			$hu_gua_down_img = $gua_shu[$gua_down]['gua'][1].$gua_shu[$gua_down]['gua'][2].$gua_shu[$gua_up]['gua'][0];
		}

		// print_r('本卦上:');
		// print_r($gua_up_img);
		// print_r('<br>');
		// print_r('本掛下:');
		// print_r($gua_down_img);
		// print_r('<br><br>');

		// print_r('互卦上:');
		// print_r($hu_gua_up_img);
		// print_r('<br>');
		// print_r('互掛下:');
		// print_r($hu_gua_down_img);
		// print_r('<br><br>');

		// print_r('變卦上:');
		// print_r($bian_gua_up_img);
		// print_r('<br>');
		// print_r('變卦下:');
		// print_r($bian_gua_down_img);
		// print_r('<br>');
		// exit;

		$this->AddPage();

		$this->Rect(1, 1.85, 19, 0.5, 'F', array(), array(147, 28, 20));
		$this->PDF_WriteText("起卦資料", array(
				'style'=>array('size'=>10,'color'=>array(255, 255, 255)),
				'cell'=>array('x' => 1.1, 'y'=>1.88),
			)
		);
		$this->Rect(1.01, 2.35, 18.97, 2.4, '', $style);
		$this->Rect(1.01, 4.75, 18.97, 8, '', $style);

		/* row 1 => */
			$this->PDF_WriteText("陽曆：", array(
					'style'=>array('size'=>15),
					'cell'=>array('x' => 1.6, 'y'=>2.65),
				)
			);
			$date = "{$dt->e_m}/{$dt->e_d}/{$dt->e_y}";
			$time = "{$dt->e_h}:{$minute}";
			$this->PDF_WriteText(date('d/m/Y', strtotime($date))."&#8194;&#8194;".date('H:i', strtotime($time)), array(
					'style'=>array('size'=>15),
					'cell'=>array('x' => 3.15, 'y'=>2.65),
				)
			);

			$this->PDF_WriteText("農曆：", array(
					'style'=>array('size'=>15),
					'cell'=>array('x' => 11, 'y'=>2.65),
				)
			);
			$arr = str_split($dt->c_y);
			$c_year = '';
			foreach ($arr as $key => $value) {
				$c_year .= $c_number[$value];
			}
			$c_month = str_replace("月","",$dt->c_m);
			$this->PDF_WriteText("{$c_year}年{$c_month}月{$dt->c_d}&#8194;{$dt->c_h}時", array(
					'style'=>array('size'=>15),
					'cell'=>array('x' => 12.6, 'y'=>2.65),
				)
			);
		/* <= row 1 */

		/* row 2 => */
			if ($method == 2) {
				$this->PDF_WriteText("起卦法：{$method_name[$method]} ({$phone})", array(
						'style'=>array('size'=>15),
						'cell'=>array('x' => 1.6, 'y'=>3.65),
					)
				);
			} elseif ($method == 4) {
				$this->PDF_WriteText("起卦法：{$method_name[$method]}({$phone})", array(
						'style'=>array('size'=>15),
						'cell'=>array('x' => 1.6, 'y'=>3.65),
					)
				);
			} else {
				$this->PDF_WriteText("起卦法：{$method_name[$method]}", array(
						'style'=>array('size'=>15),
						'cell'=>array('x' => 1.6, 'y'=>3.65),
					)
				);
			}

			$this->PDF_WriteText("上卦：{$gua_up}", array(
					'style'=>array('size'=>15),
					'cell'=>array('x' => 11, 'y'=>3.65),
				)
			);
			$this->PDF_WriteText("下卦：{$gua_down}", array(
					'style'=>array('size'=>15),
					'cell'=>array('x' => 13.5, 'y'=>3.65),
				)
			);
			$this->PDF_WriteText("動爻：{$yao_number}", array(
					'style'=>array('size'=>15),
					'cell'=>array('x' => 16, 'y'=>3.65),
				)
			);
		/* <= row 2 */

		/* row 3 => */
			switch($yao_number) {
				case 1:
					$this->Circle(4.05, 9.85, 0.15, 0, 360, 'DF');
					$this->Circle(9.55, 9.85, 0.15, 0, 360, 'DF');
					$this->Circle(15.05, 9.85, 0.15, 0, 360, 'DF');
					break;
				case 2:
					$this->Circle(4.05, 9.35, 0.15, 0, 360, 'DF');
					$this->Circle(9.55, 9.35, 0.15, 0, 360, 'DF');
					$this->Circle(15.05, 9.35, 0.15, 0, 360, 'DF');
					break;
				case 3:
					$this->Circle(4.05, 8.85, 0.15, 0, 360, 'DF');
					$this->Circle(9.55, 8.85, 0.15, 0, 360, 'DF');
					$this->Circle(15.05, 8.85, 0.15, 0, 360, 'DF');
					break;
				case 4:
					$this->Circle(4.05, 7.65, 0.15, 0, 360, 'DF');
					$this->Circle(9.55, 7.65, 0.15, 0, 360, 'DF');
					$this->Circle(15.05, 7.65, 0.15, 0, 360, 'DF');
					break;
				case 5:
					$this->Circle(4.05, 7.15, 0.15, 0, 360, 'DF');
					$this->Circle(9.55, 7.15, 0.15, 0, 360, 'DF');
					$this->Circle(15.05, 7.15, 0.15, 0, 360, 'DF');
					break;
				case 6:
					$this->Circle(4.05, 6.65, 0.15, 0, 360, 'DF');
					$this->Circle(9.55, 6.65, 0.15, 0, 360, 'DF');
					$this->Circle(15.05, 6.65, 0.15, 0, 360, 'DF');
					break;
				default:
					exit;
			}

			if ($yao_number > 3) {
				$this->PDF_WriteText("用", array(
						'style'=>array('size'=>36,'color'=>array(147, 28, 20)),
						'cell'=>array('x' => 1.6, 'y'=>6.3),
					)
				);
				$this->PDF_WriteText("體", array(
						'style'=>array('size'=>36,'color'=>array(147, 28, 20)),
						'cell'=>array('x' => 1.6, 'y'=>8.5),
					)
				);

				$ben_ti_yong_sheng_ke  = $ti_yong_sheng_ke[$gua_shu[$_gua_shu[$gua_down_img]]['wu_xing']][$gua_shu[$_gua_shu[$gua_up_img]]['wu_xing']];
				$hu_ti_yong_sheng_ke   = $ti_yong_sheng_ke[$gua_shu[$_gua_shu[$hu_gua_down_img]]['wu_xing']][$gua_shu[$_gua_shu[$hu_gua_up_img]]['wu_xing']];
				$bian_ti_yong_sheng_ke = $ti_yong_sheng_ke[$gua_shu[$_gua_shu[$bian_gua_down_img]]['wu_xing']][$gua_shu[$_gua_shu[$bian_gua_up_img]]['wu_xing']];
			} else {
				$this->PDF_WriteText("體", array(
						'style'=>array('size'=>36,'color'=>array(147, 28, 20)),
						'cell'=>array('x' => 1.6, 'y'=>6.3),
					)
				);
				$this->PDF_WriteText("用", array(
						'style'=>array('size'=>36,'color'=>array(147, 28, 20)),
						'cell'=>array('x' => 1.6, 'y'=>8.5),
					)
				);

				$ben_ti_yong_sheng_ke  = $ti_yong_sheng_ke[$gua_shu[$_gua_shu[$gua_up_img]]['wu_xing']][$gua_shu[$_gua_shu[$gua_down_img]]['wu_xing']];
				$hu_ti_yong_sheng_ke   = $ti_yong_sheng_ke[$gua_shu[$_gua_shu[$hu_gua_up_img]]['wu_xing']][$gua_shu[$_gua_shu[$hu_gua_down_img]]['wu_xing']];
				$bian_ti_yong_sheng_ke = $ti_yong_sheng_ke[$gua_shu[$_gua_shu[$bian_gua_up_img]]['wu_xing']][$gua_shu[$_gua_shu[$bian_gua_down_img]]['wu_xing']];
			}

			/* 本掛 => */
				$this->Rect(3.6, 5.1, 5, 0.8, 'F', array(), array(147, 28, 20));
				$this->Rect(3.61, 5.1, 4.97, 5.5, '', $style);
				$this->PDF_WriteText("本掛", array(
						'style'=>array('size'=>15,'color'=>array(255, 255, 255)),
						'cell'=>array('x' => 3.6, 'y'=>5.15, 'w'=>5, 'align'=>'C'),
					)
				);
				$this->PDF_WriteText($gua64[$gua_down_img.$gua_up_img]['name'], array(
						'style'=>array('size'=>17,'color'=>array(147, 28, 20)),
						'cell'=>array('x' => 3.6, 'y'=>10.7, 'w'=>5, 'align'=>'C'),
					)
				);
				$this->PDF_WriteText("{$ben_ti_yong_sheng_ke['relate']}&nbsp;&#8729;&nbsp;{$ben_ti_yong_sheng_ke['ji_xiong']}", array(
						'style'=>array('size'=>23,'color'=>array(147, 28, 20)),
						'cell'=>array('x' => 3.6, 'y'=>11.45, 'w'=>5, 'align'=>'C'),
					)
				);

				$ben_gua_up = Yii::getAlias('@frontend')."/fs_tools/yijing/images/{$gua_up_img}.jpg";
				$this->PDF_Image($ben_gua_up,  array('x' => 4.5, 'y' => 6.5, 'w' => 2.5));
				$ben_gua_down = Yii::getAlias('@frontend')."/fs_tools/yijing/images/{$gua_down_img}.jpg";
				$this->PDF_Image($ben_gua_down,  array('x' => 4.5, 'y' => 8.7, 'w' => 2.5));
				// print_r($gua_down_img.$gua_up_img);exit;

				$this->PDF_WriteText($gua_shu[$_gua_shu[$gua_up_img]]['name'], array(
						'style'=>array('size'=>18,'color'=>$gua_shu[$_gua_shu[$gua_up_img]]['color']),
						'cell'=>array('x' => 5.35, 'y'=>6.25, 'w'=>'5', 'align'=>'C'),
					)
				);
				$this->PDF_WriteText($gua_shu[$_gua_shu[$gua_up_img]]['wu_xing'], array(
						'style'=>array('size'=>18,'color'=>$gua_shu[$_gua_shu[$gua_up_img]]['color']),
						'cell'=>array('x' => 5.35, 'y'=>7.05, 'w'=>'5', 'align'=>'C'),
					)
				);
				$this->PDF_WriteText($gua_shu[$_gua_shu[$gua_down_img]]['name'], array(
						'style'=>array('size'=>18,'color'=>$gua_shu[$_gua_shu[$gua_down_img]]['color']),
						'cell'=>array('x' => 5.35, 'y'=>8.5, 'w'=>'5', 'align'=>'C'),
					)
				);
				$this->PDF_WriteText($gua_shu[$_gua_shu[$gua_down_img]]['wu_xing'], array(
						'style'=>array('size'=>18,'color'=>$gua_shu[$_gua_shu[$gua_down_img]]['color']),
						'cell'=>array('x' => 5.35, 'y'=>9.3, 'w'=>'5', 'align'=>'C'),
					)
				);
			/* <= 本掛 */

			/* 互掛 => */
				$this->Rect(9.1, 5.1, 5, 0.8, 'F', array(), array(147, 28, 20));
				$this->Rect(9.11, 5.1, 4.97, 5.5, '', $style);
				$this->PDF_WriteText("互掛", array(
						'style'=>array('size'=>15,'color'=>array(255, 255, 255)),
						'cell'=>array('x' => 9.1, 'y'=>5.15, 'w'=>5, 'align'=>'C'),
					)
				);
				$this->PDF_WriteText($gua64[$hu_gua_down_img.$hu_gua_up_img]['name'], array(
						'style'=>array('size'=>17,'color'=>array(147, 28, 20)),
						'cell'=>array('x' => 9.1, 'y'=>10.7, 'w'=>5, 'align'=>'C'),
					)
				);
				$this->PDF_WriteText("{$hu_ti_yong_sheng_ke['relate']}&nbsp;&#8729;&nbsp;{$hu_ti_yong_sheng_ke['ji_xiong']}", array(
						'style'=>array('size'=>23,'color'=>array(147, 28, 20)),
						'cell'=>array('x' => 9.1, 'y'=>11.45, 'w'=>5, 'align'=>'C'),
					)
				);

				$hu_gua_up = Yii::getAlias('@frontend')."/fs_tools/yijing/images/{$hu_gua_up_img}.jpg";
				$this->PDF_Image($hu_gua_up,  array('x' => 10, 'y' => 6.5, 'w' => 2.5));
				$hu_gua_down = Yii::getAlias('@frontend')."/fs_tools/yijing/images/{$hu_gua_down_img}.jpg";
				$this->PDF_Image($hu_gua_down,  array('x' => 10, 'y' => 8.7, 'w' => 2.5));
				// print_r($hu_gua_down_img.$hu_gua_up_img);exit;

				$this->PDF_WriteText($gua_shu[$_gua_shu[$hu_gua_up_img]]['name'], array(
						'style'=>array('size'=>18,'color'=>$gua_shu[$_gua_shu[$hu_gua_up_img]]['color']),
						'cell'=>array('x' => 10.85, 'y'=>6.25, 'w'=>'5', 'align'=>'C'),
					)
				);
				$this->PDF_WriteText($gua_shu[$_gua_shu[$hu_gua_up_img]]['wu_xing'], array(
						'style'=>array('size'=>18,'color'=>$gua_shu[$_gua_shu[$hu_gua_up_img]]['color']),
						'cell'=>array('x' => 10.85, 'y'=>7.05, 'w'=>'5', 'align'=>'C'),
					)
				);
				$this->PDF_WriteText($gua_shu[$_gua_shu[$hu_gua_down_img]]['name'], array(
						'style'=>array('size'=>18,'color'=>$gua_shu[$_gua_shu[$hu_gua_down_img]]['color']),
						'cell'=>array('x' => 10.85, 'y'=>8.5, 'w'=>'5', 'align'=>'C'),
					)
				);
				$this->PDF_WriteText($gua_shu[$_gua_shu[$hu_gua_down_img]]['wu_xing'], array(
						'style'=>array('size'=>18,'color'=>$gua_shu[$_gua_shu[$hu_gua_down_img]]['color']),
						'cell'=>array('x' => 10.85, 'y'=>9.3, 'w'=>'5', 'align'=>'C'),
					)
				);
			/* <= 互掛 */

			/* 變掛 => */
				$this->Rect(14.6, 5.1, 5, 0.8, 'F', array(), array(147, 28, 20));
				$this->Rect(14.61, 5.1, 4.97, 5.5, '', $style);
				$this->PDF_WriteText("變掛", array(
						'style'=>array('size'=>15,'color'=>array(255, 255, 255)),
						'cell'=>array('x' => 14.6, 'y'=>5.15, 'w'=>5, 'align'=>'C'),
					)
				);
				$this->PDF_WriteText($gua64[$bian_gua_down_img.$bian_gua_up_img]['name'], array(
						'style'=>array('size'=>17,'color'=>array(147, 28, 20)),
						'cell'=>array('x' => 14.6, 'y'=>10.7, 'w'=>5, 'align'=>'C'),
					)
				);
				$this->PDF_WriteText("{$bian_ti_yong_sheng_ke['relate']}&nbsp;&#8729;&nbsp;{$bian_ti_yong_sheng_ke['ji_xiong']}", array(
						'style'=>array('size'=>23,'color'=>array(147, 28, 20)),
						'cell'=>array('x' => 14.6, 'y'=>11.45, 'w'=>5, 'align'=>'C'),
					)
				);

				$bian_gua_up = Yii::getAlias('@frontend')."/fs_tools/yijing/images/{$bian_gua_up_img}.jpg";
				$this->PDF_Image($bian_gua_up,  array('x' => 15.5, 'y' => 6.5, 'w' => 2.5));
				$bian_gua_down = Yii::getAlias('@frontend')."/fs_tools/yijing/images/{$bian_gua_down_img}.jpg";
				$this->PDF_Image($bian_gua_down,  array('x' => 15.5, 'y' => 8.7, 'w' => 2.5));
				// print_r($bian_gua_down_img.$bian_gua_up_img);exit;

				$this->PDF_WriteText($gua_shu[$_gua_shu[$bian_gua_up_img]]['name'], array(
						'style'=>array('size'=>18,'color'=>$gua_shu[$_gua_shu[$bian_gua_up_img]]['color']),
						'cell'=>array('x' => 16.35, 'y'=>6.25, 'w'=>'5', 'align'=>'C'),
					)
				);
				$this->PDF_WriteText($gua_shu[$_gua_shu[$bian_gua_up_img]]['wu_xing'], array(
						'style'=>array('size'=>18,'color'=>$gua_shu[$_gua_shu[$bian_gua_up_img]]['color']),
						'cell'=>array('x' => 16.35, 'y'=>7.05, 'w'=>'5', 'align'=>'C'),
					)
				);
				$this->PDF_WriteText($gua_shu[$_gua_shu[$bian_gua_down_img]]['name'], array(
						'style'=>array('size'=>18,'color'=>$gua_shu[$_gua_shu[$bian_gua_down_img]]['color']),
						'cell'=>array('x' => 16.35, 'y'=>8.5, 'w'=>'5', 'align'=>'C'),
					)
				);
				$this->PDF_WriteText($gua_shu[$_gua_shu[$bian_gua_down_img]]['wu_xing'], array(
						'style'=>array('size'=>18,'color'=>$gua_shu[$_gua_shu[$bian_gua_down_img]]['color']),
						'cell'=>array('x' => 16.35, 'y'=>9.3, 'w'=>'5', 'align'=>'C'),
					)
				);
			/* <= 變掛 */
		/* <= row 3 */

		/* row 4 => */
			$this->Rect(1, 13.1, 19, 0.6, 'F', array(), array(147, 28, 20));
			$this->PDF_WriteText("本掛", array(
					'style'=>array('size'=>13,'color'=>array(255, 255, 255)),
					'cell'=>array('x' => 1.1, 'y'=>13.12),
				)
			);
			$this->Rect(1.01, 13.7, 3, 4.5, '', $style);
			$this->Rect(4.01, 13.7, 15.97, 4.5, '', $style);
			$this->PDF_WriteText($gua64[$gua_down_img.$gua_up_img]['name'], array(
					'style'=>array('size'=>19,'color'=>array(147, 28, 20)),
					'cell'=>array('x' => 1.05, 'y'=>15.5, 'w'=> 3, 'align'=>'C'),
				)
			);
			$this->PDF_WriteText($gua64[$gua_down_img.$gua_up_img]['desc'], array(
					'style'=>array('size'=>17),
					// 'cell'=>array('x' => 4.2, 'y'=>13.95, 'w'=> 15.5),
					'cell'=>array('x' => 4.2, 'y'=>15.15, 'w'=> 15.5),
				)
			);
		/* <= row 4 */

		/* row 5 => */
			$this->Rect(1, 18.6, 19, 0.6, 'F', array(), array(147, 28, 20));
			$this->PDF_WriteText("互掛", array(
					'style'=>array('size'=>13,'color'=>array(255, 255, 255)),
					'cell'=>array('x' => 1.1, 'y'=>18.62),
				)
			);
			$this->Rect(1.01, 19.2, 3, 4.5, '', $style);
			$this->Rect(4.01, 19.2, 15.97, 4.5, '', $style);
			$this->PDF_WriteText($gua64[$hu_gua_down_img.$hu_gua_up_img]['name'], array(
					'style'=>array('size'=>19,'color'=>array(147, 28, 20)),
					'cell'=>array('x' => 1.05, 'y'=>21, 'w'=> 3, 'align'=>'C'),
				)
			);
			$this->PDF_WriteText($gua64[$hu_gua_down_img.$hu_gua_up_img]['desc'], array(
					'style'=>array('size'=>17),
					'cell'=>array('x' => 4.2, 'y'=>20.65, 'w'=> 15.5),
				)
			);
		/* <= row 5 */

		/* row 6 => */
			$this->Rect(1, 24.1, 19, 0.6, 'F', array(), array(147, 28, 20));
			$this->PDF_WriteText("變掛", array(
					'style'=>array('size'=>13,'color'=>array(255, 255, 255)),
					'cell'=>array('x' => 1.1, 'y'=>24.12),
				)
			);
			$this->Rect(1.01, 24.7, 3, 4.5, '', $style);
			$this->Rect(4.01, 24.7, 15.97, 4.5, '', $style);
						$this->PDF_WriteText($gua64[$bian_gua_down_img.$bian_gua_up_img]['name'], array(
					'style'=>array('size'=>19,'color'=>array(147, 28, 20)),
					'cell'=>array('x' => 1.05, 'y'=>26.5, 'w'=> 3, 'align'=>'C'),
				)
			);
			$this->PDF_WriteText($gua64[$bian_gua_down_img.$bian_gua_up_img]['desc'], array(
			// $this->PDF_WriteText($gua64[122222]['desc'], array(
					'style'=>array('size'=>17),
					// 'cell'=>array('x' => 4.05, 'y'=>24.8, 'w'=> 15.97),
					'cell'=>array('x' => 4.2, 'y'=>26.15, 'w'=> 15.5),
				)
			);
		/* <= row 6 */

		$this->AddPage();

		/* row 1 => */
			// 13.7, 1.85
			// 15.5, 3.65
			// 15.15, 3.25
			// 27.85
			// 3.5
			$this->Rect(1, 1.85, 19, 0.4, 'F', array(), array(147, 28, 20));
			$this->Rect(1.01, 2.25, 3, 8.1, '', $style);
			$this->Rect(4.01, 2.25, 15.97, 8.1, '', $style);
			$this->PDF_WriteText($gua64_[$gua_down_img.$gua_up_img]['name'], array(
					'style'=>array('size'=>19,'color'=>array(147, 28, 20)),
					'cell'=>array('x' => 1.05, 'y'=>5.85, 'w'=> 3, 'align'=>'C'),
				)
			);
			$this->PDF_WriteText($gua64_[$gua_down_img.$gua_up_img]['desc1'], array(
					'style'=>array('size'=>15),
					'cell'=>array('x' => 4.2, 'y'=>2.55, 'w'=> 15.5),
				)
			);
			$this->Ln(0.2);
			$this->PDF_WriteText($gua64_[$gua_down_img.$gua_up_img]['desc2'], array(
					'style'=>array('size'=>15),
					'cell'=>array('x' => 4.2, 'w'=> 15.5),
				)
			);
			$this->Ln(0.2);
			$this->PDF_WriteText($gua64_[$gua_down_img.$gua_up_img]['desc3'], array(
					'style'=>array('size'=>15),
					'cell'=>array('x' => 4.2, 'w'=> 15.5),
				)
			);
		/* <= row 1 */

		/* row 2 => */
			// 1.8, 0.35, 9
			// 10.35
			$this->Rect(1, 10.85, 19, 0.4, 'F', array(), array(147, 28, 20));
			$this->Rect(1.01, 11.25, 3, 8.1, '', $style);
			$this->Rect(4.01, 11.25, 15.97, 8.1, '', $style);
			$this->PDF_WriteText($gua64_[$hu_gua_down_img.$hu_gua_up_img]['name'], array(
					'style'=>array('size'=>19,'color'=>array(147, 28, 20)),
					'cell'=>array('x' => 1.05, 'y'=>14.85, 'w'=> 3, 'align'=>'C'),
				)
			);
			$this->PDF_WriteText($gua64_[$hu_gua_down_img.$hu_gua_up_img]['desc1'], array(
					'style'=>array('size'=>15),
					'cell'=>array('x' => 4.2, 'y'=>11.55, 'w'=> 15.5),
				)
			);
			$this->Ln(0.2);
			$this->PDF_WriteText($gua64_[$hu_gua_down_img.$hu_gua_up_img]['desc2'], array(
					'style'=>array('size'=>15),
					'cell'=>array('x' => 4.2, 'w'=> 15.5),
				)
			);
			$this->Ln(0.2);
			$this->PDF_WriteText($gua64_[$hu_gua_down_img.$hu_gua_up_img]['desc3'], array(
					'style'=>array('size'=>15),
					'cell'=>array('x' => 4.2, 'w'=> 15.5),
				)
			);
		/* <= row 2 */

		/* row 3 => */
			$this->Rect(1, 19.85, 19, 0.4, 'F', array(), array(147, 28, 20));
			$this->Rect(1.01, 20.25, 3, 8.1, '', $style);
			$this->Rect(4.01, 20.25, 15.97, 8.1, '', $style);
						$this->PDF_WriteText($gua64_[$bian_gua_down_img.$bian_gua_up_img]['name'], array(
					'style'=>array('size'=>19,'color'=>array(147, 28, 20)),
					'cell'=>array('x' => 1.05, 'y'=>23.85, 'w'=> 3, 'align'=>'C'),
				)
			);
			$this->PDF_WriteText($gua64_[$bian_gua_down_img.$bian_gua_up_img]['desc1'], array(
					'style'=>array('size'=>15),
					'cell'=>array('x' => 4.2, 'y'=>20.55, 'w'=> 15.5),
				)
			);
			$this->Ln(0.2);
			$this->PDF_WriteText($gua64_[$bian_gua_down_img.$bian_gua_up_img]['desc2'], array(
					'style'=>array('size'=>15),
					'cell'=>array('x' => 4.2, 'w'=> 15.5),
				)
			);
			$this->Ln(0.2);
			$this->PDF_WriteText($gua64_[$bian_gua_down_img.$bian_gua_up_img]['desc3'], array(
					'style'=>array('size'=>15),
					'cell'=>array('x' => 4.2, 'w'=> 15.5),
				)
			);
		/* <= row 3 */
	}
}


