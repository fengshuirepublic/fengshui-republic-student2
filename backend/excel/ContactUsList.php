<?php

namespace backend\excel;

use Yii;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class ContactUsList
{
	public function generate($contactUs)
	{
		$date = date("Y-m-d");
		$spreadsheet = new Spreadsheet();
		$spreadsheet->getActiveSheet()->getStyle('A:G')->getAlignment()->setHorizontal('left');
		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
		$spreadsheet->getActiveSheet()
			->setCellValue('A1', 'No.')
			->setCellValue('B1', 'Service')
			->setCellValue('C1', 'Name')
			->setCellValue('D1', 'Email')
			->setCellValue('E1', 'Contact')
			->setCellValue('F1', 'Message')
			->setCellValue('G1', 'Date Time');

		$service = array(
			1  => '居家风水',
			2  => '商宅风水',
			3  => '阴宅风水',
			4  => '屋业发展',
			5  => '婴儿取名',
			6  => '成人改名',
			7  => '搬家择日',
			8  => '婚嫁择日',
			9  => '择日剖腹',
			10 => '八字批命',
			11 => '风水讲座',
			12 => '课程',
		);

		$counter = 2;
		$no = 1;

		foreach ($contactUs as $contact) {
			$start = $counter;
			$spreadsheet->getActiveSheet()
				->setCellValue("A{$counter}", $no)
				->setCellValue("B{$counter}", $service[$contact->service])
				->setCellValue("C{$counter}", $contact->name)
				->setCellValue("D{$counter}", $contact->email)
				->setCellValue("E{$counter}", $contact->contact, DataType::TYPE_STRING)
				->setCellValue("F{$counter}", $contact->message)
				->setCellValue("G{$counter}", $contact->create_date);
			++$counter;
			++$no;
		}

		$spreadsheet->getProperties()
			->setCreator('Fengshui Republic')
			->setLastModifiedBy('Fengshui Republic')
			->setTitle('Fengshui Republic Contact Us List')
			->setSubject('Fengshui Republic Contact Us List')
			->setDescription('Fengshui Republic Contact Us List')
			->setKeywords('Fengshui Republic Contact Us List')
			->setCategory('Fengshui Republic Contact Us List');
		$spreadsheet->getActiveSheet()->setTitle('Contact Us List');
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xls)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="contact_us_list_'.$date.'.xls"');
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


