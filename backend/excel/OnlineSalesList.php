<?php

namespace backend\excel;

use Yii;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class OnlineSalesList
{
	public function generate($onlineSales)
	{
		$date = date("Y-m-d");
		$spreadsheet = new Spreadsheet();
		$spreadsheet->getActiveSheet()->getStyle('A:P')->getAlignment()->setHorizontal('left');
		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
		$spreadsheet->getActiveSheet()
			->setCellValue('A1', 'No.')
			->setCellValue('B1', 'Invoice ID')
			->setCellValue('C1', 'Description')
			->setCellValue('D1', 'Status')
			->setCellValue('E1', 'Date')
			->setCellValue('F1', 'Currency')
			->setCellValue('G1', 'Price')
			->setCellValue('H1', 'Payer Email')
			->setCellValue('I1', 'Payer First Name')
			->setCellValue('J1', 'Payer Last Name')
			->setCellValue('K1', 'Country')
			->setCellValue('L1', 'Phone')
			->setCellValue('M1', 'Access Code')
			->setCellValue('N1', 'Form Name')
			->setCellValue('O1', 'Form Phone')
			->setCellValue('P1', 'Form Email');

		$description = array(
			'2019-family-feast-kl-ticket' => '2019 龙岩家宴 KL',
			'2019-family-feast-jb-ticket' => '2019 龙岩家宴 JB',
			'2019-online-video-course'    => '2019 風水教學視頻',
			'2019-yiyanduan-course'       => '2019 風水一眼斷課程',
		);

		$counter = 2;
		$no = 1;

		foreach ($onlineSales as $sales) {
			if ($sales->accessCode) {
				$accessCode = $sales->accessCode->code;
			} else {
				$accessCode = '-';
			}

			$start = $counter;
			foreach ($sales->products as $product) {
				$spreadsheet->getActiveSheet()
					->setCellValue("A{$counter}", $no)
					->setCellValue("B{$counter}", $sales->invoice_number)
					->setCellValue("C{$counter}", $description[$sales->description])
					->setCellValue("D{$counter}", $sales->transaction_state)
					->setCellValue("E{$counter}", $sales->create_date)
					->setCellValue("F{$counter}", $sales->currency)
					->setCellValue("G{$counter}", $sales->total)
					->setCellValue("H{$counter}", $sales->payer_email)
					->setCellValue("I{$counter}", $sales->payer_first_name)
					->setCellValue("J{$counter}", $sales->payer_last_name)
					->setCellValue("K{$counter}", $sales->country_code)
					->setCellValue("L{$counter}", $sales->payer_phone, DataType::TYPE_STRING)
					->setCellValue("M{$counter}", $accessCode)
					->setCellValue("N{$counter}", $product->name)
					->setCellValue("O{$counter}", $product->phone, DataType::TYPE_STRING)
					->setCellValue("P{$counter}", $product->email);
				$end = $counter;
				++$counter;
			}
			++$no;

			if ($start != $end) {
				$spreadsheet->getActiveSheet()->mergeCells('A'.$start.':A'.$end);
				$spreadsheet->getActiveSheet()->mergeCells('B'.$start.':B'.$end);
				$spreadsheet->getActiveSheet()->mergeCells('C'.$start.':C'.$end);
				$spreadsheet->getActiveSheet()->mergeCells('D'.$start.':D'.$end);
				$spreadsheet->getActiveSheet()->mergeCells('E'.$start.':E'.$end);
				$spreadsheet->getActiveSheet()->mergeCells('F'.$start.':F'.$end);
				$spreadsheet->getActiveSheet()->mergeCells('G'.$start.':G'.$end);
				$spreadsheet->getActiveSheet()->mergeCells('H'.$start.':H'.$end);
				$spreadsheet->getActiveSheet()->mergeCells('I'.$start.':I'.$end);
				$spreadsheet->getActiveSheet()->mergeCells('J'.$start.':J'.$end);
				$spreadsheet->getActiveSheet()->mergeCells('K'.$start.':K'.$end);
				$spreadsheet->getActiveSheet()->mergeCells('L'.$start.':L'.$end);
				$spreadsheet->getActiveSheet()->mergeCells('M'.$start.':M'.$end);
			}
		}

		$spreadsheet->getProperties()
			->setCreator('Fengshui Republic')
			->setLastModifiedBy('Fengshui Republic')
			->setTitle('Fengshui Republic Online Sales List')
			->setSubject('Fengshui Republic Online Sales List')
			->setDescription('Fengshui Republic Online Sales List')
			->setKeywords('Fengshui Republic Online Sales List')
			->setCategory('Fengshui Republic Online Sales List');
		$spreadsheet->getActiveSheet()->setTitle('Online Sales List');
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xls)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="online_sales_list_'.$date.'.xls"');
		header('Cache-Control: max-age=0');

		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xls');
		$writer->save('php://output');
		return;
	}
}


