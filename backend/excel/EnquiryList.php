<?php

namespace backend\excel;

use Yii;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class EnquiryList
{
	public function generate($enquiryList)
	{
		$date = date("Y-m-d");
		$spreadsheet = new Spreadsheet();
		$spreadsheet->getActiveSheet()->getStyle('A:H')->getAlignment()->setHorizontal('left');
		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
		$spreadsheet->getActiveSheet()
			->setCellValue('A1', 'No.')
			->setCellValue('B1', 'Service')
			->setCellValue('C1', 'Chinese Name')
			->setCellValue('D1', 'English Name')
			->setCellValue('E1', 'Email')
			->setCellValue('F1', 'Contact')
			->setCellValue('G1', 'Message')
			->setCellValue('H1', 'Date Time');

		$counter = 2;
		$no = 1;

		foreach ($enquiryList as $enquiry) {
			$start = $counter;
			$spreadsheet->getActiveSheet()
				->setCellValue("A{$counter}", $no)
				->setCellValue("B{$counter}", $enquiry->service)
				->setCellValue("C{$counter}", $enquiry->name_cn)
				->setCellValue("D{$counter}", $enquiry->name_en)
				->setCellValue("E{$counter}", $enquiry->email)
				->setCellValue("F{$counter}", $enquiry->contact, DataType::TYPE_STRING)
				->setCellValue("G{$counter}", str_replace("<br>", "\n", $enquiry->info))
				->setCellValue("H{$counter}", $enquiry->create_date);
			++$counter;
			++$no;
		}

		$spreadsheet->getProperties()
			->setCreator('Fengshui Republic')
			->setLastModifiedBy('Fengshui Republic')
			->setTitle('Fengshui Republic Enquiry List')
			->setSubject('Fengshui Republic Enquiry List')
			->setDescription('Fengshui Republic Enquiry List')
			->setKeywords('Fengshui Republic Enquiry List')
			->setCategory('Fengshui Republic Enquiry List');
		$spreadsheet->getActiveSheet()->setTitle('Enquiry List');
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xls)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="enquiry_list_'.$date.'.xls"');
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


