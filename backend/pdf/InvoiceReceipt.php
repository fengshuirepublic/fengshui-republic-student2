<?php

namespace backend\pdf;

use Yii;
use pentajeu\extensions\EasyPDF;

class InvoiceReceipt extends EasyPDF
{
	public function __construct()
	{
		parent::__construct("P", "cm", "A4", true, "UTF-8");
	}

	protected function init()
	{
		parent::init();
		$this->SetMargins(1, 1, 1, true);
		$this->SetFooterMargin(1);
		$this->SetAutoPageBreak(TRUE, 1);
		$this->SetPrintHeader(true);

		$this->SetAuthor("FENGSHUI-REPUBLIC INVOICE PDF");
		$this->SetTitle("FENGSHUI-REPUBLIC INVOICE PDF");
		$this->SetSubject("Invoice");
		$this->SetKeywords("Invoice");
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

	public function Header()
	{
		$companyInfo = array(
			'fs' => array(
				'full_name' => 'FENGSHUI REPUBLIC SDN. BHD.',
				'register_no' => '730899-K'
			)
		);

		$this->PDF_WriteText($companyInfo['fs']['full_name'], array(
				'style'=>array('size' => 20),
				'cell' => array('y' => 0.7, 'align' => 'C'),
			)
		);

		$this->PDF_WriteText('( '.$companyInfo['fs']['register_no'].' )', array(
				'style'=>array('size' => 8),
				'cell' => array('x' => 16.2, 'y' => 1.1, 'align' => 'L'),
			)
		);

		$this->PDF_WriteText('33-02, Jalan Molek 1/29, Taman Molek, 81100, Johor Bahru, Johor, Malaysia', array(
				'style'=>array('size' => 8.5),
				'cell' => array('y' => 1.6, 'align' => 'C'),
			)
		);

		$this->PDF_WriteText('Tel : 07-3535 366 &nbsp;&nbsp; Fax : 07-3611 167', array(
				'style'=>array('size' => 8.5),
				'cell' => array('y' => 2.1, 'align' => 'C'),
			)
		);

		$this->PDF_WriteText('99-01, Block H, Jaya One, 72A, Jalan Universiti, 46200, Petaling Jaya, Selangor, Malaysia', array(
				'style'=>array('size' => 8.5),
				'cell' => array('y' => 2.6, 'align' => 'C'),
			)
		);

		$this->PDF_WriteText('Tel : 03-7960 9066 &nbsp;&nbsp; Fax : 03-7960 5066', array(
				'style'=>array('size' => 8.5),
				'cell' => array('y' => 3.1, 'align' => 'C'),
			)
		);
	}

	public function generate($invoiceInfo)
	{
		$page_item   = $invoiceInfo->item_per_page;
		$page_number = ceil(count($invoiceInfo->items)/$page_item);
		$page_count  = 1;
		$sub_total   = 0;
		$grand_total = 0;
		$style = array(
			'L' => array('width' => 0.03, 'color' => array(0, 0, 0)),
			'T' => 1,
			'R' => 1,
			'B' => 1
		);

		for ($i=0; $i<$page_number; $i++) {

			$start = $i*$page_item;
			$end = (($i+1)*$page_item);
			$margin_top = 3.7;
			$margin_left = 1.5;

			$this->AddPage();

			/* customer info => */
				$this->PDF_WriteText('To #', array(
						'style'=>array('size' => 11),
						'cell' => array(
							'y' => $margin_top,
							'align' => 'L'
						),
					)
				);
				$this->Ln(0.1);
				$this->PDF_WriteText(strtoupper($invoiceInfo->customer->name_en), array(
						'style'=>array('size' => 11),
						'cell' => array(
							'x' => $margin_left,
							// 'y' => $margin_top,
							'w' => 11,
							// 'border' => 1,
							'align' => 'L'
						),
					)
				);
				$this->Ln(0.1);
				$this->PDF_WriteText(strtoupper($invoiceInfo->customer->address_1), array(
						'style'=>array('size' => 9),
						'cell' => array(
							'x' => $margin_left,
							'w' => 11,
							'align' => 'L'
						),
					)
				);
				$this->PDF_WriteText(strtoupper($invoiceInfo->customer->address_2), array(
						'style'=>array('size' => 9),
						'cell' => array(
							'x' => $margin_left,
							'w' => 11,
							'align' => 'L'
						),
					)
				);
				$this->PDF_WriteText(strtoupper($invoiceInfo->customer->address_3), array(
						'style'=>array('size' => 9),
						'cell' => array(
							'x' => $margin_left,
							'w' => 11,
							'align' => 'L'
						),
					)
				);
				$this->PDF_WriteText(strtoupper($invoiceInfo->customer->postcode.', '.$invoiceInfo->customer->city.', '.$invoiceInfo->customer->country), array(
						'style'=>array('size' => 9),
						'cell' => array(
							'x' => $margin_left,
							'w' => 11,
							'align' => 'L'
						),
					)
				);
				$this->Ln(0.1);
				$attention = $invoiceInfo->attention ? : '-';
				$this->PDF_WriteText('Attention : '.$attention, array(
						'style'=>array('size' => 9),
						'cell' => array(
							'x' => $margin_left,
							'w' => 11,
							'align' => 'L'
						),
					)
				);
			/* <= customer info */

			/* invoice => */
				$this->PDF_WriteText('INVOICE', array(
						'style'=>array('size' => 13),
						'cell' => array(
							// 'x' => 10.5,
							'x' => 13,
							'y' => $margin_top,
							'w' => 3.5,
							'align' => 'C',
							'border' => 1,
						),
					)
				);
				$this->PDF_WriteText('No.', array(
						'style'=>array('size' => 9),
						'cell' => array(
							'x' => 13,
							'y' => $margin_top+0.8,
							'align' => 'L'
						),
					)
				);
				$this->PDF_WriteText(':', array(
						'style'=>array('size' => 9),
						'cell' => array(
							'x' => 13+1.2,
							'y' => $margin_top+0.8,
							'align' => 'L'
						),
					)
				);
				$this->PDF_WriteText($invoiceInfo->invoice_number, array(
						'style'=>array('size' => 9),
						'cell' => array(
							'x' => 13+1.4,
							'y' => $margin_top+0.8,
							// 'w' => 4.2,
							'align' => 'L'
						),
					)
				);

				$this->PDF_WriteText('Date', array(
						'style'=>array('size' => 9),
						'cell' => array(
							'x' => 13,
							'y' => $margin_top+1.3,
							'align' => 'L'
						),
					)
				);
				$this->PDF_WriteText(':', array(
						'style'=>array('size' => 9),
						'cell' => array(
							'x' => 13+1.2,
							'y' => $margin_top+1.3,
							'align' => 'L'
						),
					)
				);
				if ($invoiceInfo->invoice_date) {
					$invoice_date = date("d-m-Y", strtotime($invoiceInfo->invoice_date));
				} else {
					$invoice_date = '-';
				}
				$this->PDF_WriteText($invoice_date, array(
						'style'=>array('size' => 9),
						'cell' => array(
							'x' => 13+1.4,
							'y' => $margin_top+1.3,
							'align' => 'L'
						),
					)
				);

				$this->PDF_WriteText('Validity', array(
						'style'=>array('size' => 9),
						'cell' => array(
							'x' => 13,
							'y' => $margin_top+1.8,
							'align' => 'L'
						),
					)
				);
				$this->PDF_WriteText(':', array(
						'style'=>array('size' => 9),
						'cell' => array(
							'x' => 13+1.2,
							'y' => $margin_top+1.8,
							'align' => 'L'
						),
					)
				);
				$this->PDF_WriteText('14 days', array(
						'style'=>array('size' => 9),
						'cell' => array(
							'x' => 13+1.4,
							'y' => $margin_top+1.8,
							'align' => 'L'
						),
					)
				);

				$this->PDF_WriteText('Page', array(
						'style'=>array('size' => 9),
						'cell' => array(
							'x' => 13,
							'y' => $margin_top+2.8,
							'align' => 'L'
						),
					)
				);
				$this->PDF_WriteText(':', array(
						'style'=>array('size' => 9),
						'cell' => array(
							'x' => 13+1.2,
							'y' => $margin_top+2.8,
							'align' => 'L'
						),
					)
				);
				$this->PDF_WriteText($page_count.' / '.$page_number, array(
						'style'=>array('size' => 9),
						'cell' => array(
							'x' => 13+1.4,
							'y' => $margin_top+2.8,
							'align' => 'L'
						),
					)
				);
			/* <= invoice */

			/* item list header => */
				$this->PDF_WriteText('No.', array(
						'style'=>array('size' => 11),
						'cell' => array(
							'x' => 1,
							'y' => 7.75,
							'w' => 1,
							'align' => 'L',
							// 'border' => 1
						),
					)
				);
				$this->PDF_WriteText('Description', array(
						'style'=>array('size' => 11),
						'cell' => array(
							'x' => 2,
							'y' => 7.75,
							'w' => 9,
							'align' => 'L',
							// 'border' => 1
						),
					)
				);
				$this->PDF_WriteText('Amount (RM)', array(
						'style'=>array('size' => 11),
						'cell' => array(
							'x' => 17,
							'y' => 7.75,
							'w' => 3,
							'align' => 'R',
							// 'border' => 1
						),
					)
				);
			/* <= item list header */

			/* item list => */
				$item_margin_top = 8.45;
				for ($j=$start; $j<$end; $j++) {
					if (array_key_exists($j, $invoiceInfo->items)) {
						$this->PDF_WriteText($j+1, array(
								'style'=>array('size' => 9),
								'cell' => array(
									'x' => 1,
									'y' => $item_margin_top,
									'w' => 1,
									'align' => 'R',
									// 'border' => 1
								),
							)
						);
						$description = $invoiceInfo->items[$j]->case->description ? : '-';
						$this->PDF_WriteText($description, array(
								'style'=>array('size' => 9),
								'cell' => array(
									'x' => 2,
									'y' => $item_margin_top,
									'w' => 8.7,
									'align' => 'L',
									// 'border' => 1
								),
							)
						);
						$pointY = $this->getY();
						$this->PDF_WriteText(number_format($invoiceInfo->items[$j]->case->price, 2), array(
								'style'=>array('size' => 9),
								'cell' => array(
									'x' => 17,
									'y' => $item_margin_top,
									'w' => 3,
									'align' => 'R',
									// 'border' => 1
								),
							)
						);
						$item_margin_top = $pointY + 0.3;
						$sub_total += $invoiceInfo->items[$j]->case->price;
					}
				}
			/* <= item list */

			$this->Line($this->GetX(), 7.7, 20, 7.7);
			$this->Line($this->GetX(), 8.3, 20, 8.3);
			if ($page_number == $page_count) {
				/* footer => */
					// $this->Rect($margin_left, $margin_top, $width, $height, '', $style);
					$margin_top = 22.5;

					$this->PDF_WriteText('E. & O.E.', array(
							'style'=>array('size' => 9),
							'cell' => array(
								'y' => $margin_top+1.5,
							),
						)
					);
					$this->Rect(1, $margin_top+2, 5.75, 2.5, '', $style);
					$this->Line(1.75, $margin_top+3.9, 6, $margin_top+3.9);
					$this->PDF_WriteText('Authorised Signature', array(
							'style'=>array('size' => 9),
							'cell' => array(
								'y' => $margin_top+4,
								'w' => 5.75,
								'align' => 'C',
							),
						)
					);

					$this->Rect(6.75, $margin_top+2, 5.75, 2.5, '', $style);
					$this->Line(7.5, $margin_top+3.9, 11.75, $margin_top+3.9);
					$this->PDF_WriteText('Customer\'s stamp or I/C recipient' , array(
							'style'=>array('size' => 9),
							'cell' => array(
								'x' => 6.75,
								'y' => $margin_top+4,
								'w' => 5.75,
								'align' => 'C',
							),
						)
					);

					$this->Rect(12.5, $margin_top+2, 4.5, 1.5, '', $style);
					$this->PDF_WriteText('Subtotal (RM)', array(
							'style'=>array('size' => 11),
							'cell' => array(
								'x' => 12.5,
								'y' => $margin_top+2.1,
								'w' => 4.5,
								'align' => 'R'
							),
						)
					);
					$this->PDF_WriteText('Discount (RM)', array(
							'style'=>array('size' => 11),
							'cell' => array(
								'x' => 12.5,
								'y' => $margin_top+2.8,
								'w' => 4.5,
								'align' => 'R'
							),
						)
					);

					$this->Rect(12.5, $margin_top+3.5, 4.5, 1, '', $style);
					$this->PDF_WriteText('Total (RM)', array(
							'style'=>array('size' => 11),
							'cell' => array(
								'x' => 12.5,
								'y' => $margin_top+3.75,
								'w' => 4.5,
								'align' => 'R'
							),
						)
					);

					$this->Rect(17, $margin_top+2, 3, 1.5, '', $style);
					$this->PDF_WriteText(number_format($sub_total, 2), array(
							'style'=>array('size' => 11),
							'cell' => array(
								'x' => 17,
								'y' => $margin_top+2.1,
								'w' => 3,
								'align' => 'R'
							),
						)
					);

					$discount = $invoiceInfo->discount;
					$this->PDF_WriteText(number_format($discount, 2), array(
							'style'=>array('size' => 11),
							'cell' => array(
								'x' => 17,
								'y' => $margin_top+2.8,
								'w' => 3,
								'align' => 'R'
							),
						)
					);

					$grand_total = $sub_total-$discount;
					$this->Rect(17, $margin_top+3.5, 3, 1, '', $style);
					$this->PDF_WriteText(number_format($grand_total, 2), array(
							'style'=>array('size' => 11),
							'cell' => array(
								'x' => 17,
								'y' => $margin_top+3.75,
								'w' => 3,
								'align' => 'R'
							),
						)
					);

					$this->Line($this->GetX(), $margin_top+2, 20, $margin_top+2);

					$this->PDF_WriteText('All cheques should be crossed and make payable to "FENGSHUI REPUBLIC SDN BHD"', array(
							'style'=>array('size' => 9),
							'cell' => array(
								'y' => 27.3,
							),
						)
					);
					$this->PDF_WriteText('Account No: 1161 00 7447 (OCBC BANK)', array(
							'style'=>array('size' => 9),
						)
					);
					$this->PDF_WriteText('Account No: 8007 3134 36 (CIMB BANK)', array(
							'style'=>array('size' => 9),
						)
					);
				/* <= footer */
			} else {
				/* footer => */
					$margin_top = 22.5;
					$this->Line($this->GetX(), $margin_top+2, 20, $margin_top+2);
					$this->PDF_WriteText('NEXT', array(
							'style'=>array('size' => 9),
							'cell' => array(
								'x' => 1,
								'y' => $margin_top+2.1,
								'w' => 9,
								'align' => 'L'
							),
						)
					);
				/* <= footer */
			}
			$page_count++;
		}
	}
}


