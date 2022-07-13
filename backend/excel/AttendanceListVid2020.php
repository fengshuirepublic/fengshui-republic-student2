<?php

namespace backend\excel;

use Yii;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class AttendanceListVid2020
{
	public function generate($attendees)
	{
		$date = date("Y-m-d");
		$spreadsheet = new Spreadsheet();
		$spreadsheet->getActiveSheet()->getStyle('A:I')->getAlignment()->setHorizontal('left');
		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
		$spreadsheet->getActiveSheet()
			->setCellValue('A1', 'No.')
			->setCellValue('B1', 'Invoice ID')
			->setCellValue('C1', 'Video Type')
			->setCellValue('D1', 'Payment Type')
			->setCellValue('E1', 'Attend')
			->setCellValue('F1', 'Name')
			->setCellValue('G1', 'Email')
			->setCellValue('H1', 'Phone')
			->setCellValue('I1', 'Remark');

		$type_video = array(
			'yydvi20a' => '2020 風水课程視頻 (14天)',
			'yydvi20b' => '2020 風水课程視頻 （無限）',
		);

		$type_payment = array(
			0 => '-',
			1 => 'Paypal',
			2 => 'Kiple',
		);

		$type_attend = array(
			0 => '-',
			1 => 'KL',
			2 => 'JB',
		);

		$counter = 2;
		$no = 1;

		foreach ($attendees as $attendee) {
			if ($attendee->invoice_number == 'FSRP-00000') {
				$payment = $type_payment[0];
				$name = $attendee->eventAttendee->name;
				$email = $attendee->eventAttendee->email;
				$phone = $attendee->eventAttendee->phone;
			} else {
				$payment = $type_payment[$attendee->ecomOrder->payment_type];
				$name = $attendee->ecomOrder->name;
				$email = $attendee->ecomOrder->email;
				$phone = $attendee->ecomOrder->phone;
			}

			$spreadsheet->getActiveSheet()
				->setCellValue("A{$counter}", $no)
				->setCellValue("B{$counter}", $attendee->invoice_number)
				->setCellValue("C{$counter}", $type_video[$attendee->product_code])
				->setCellValue("D{$counter}", $payment)
				->setCellValue("E{$counter}", $type_attend[$attendee->attendance])
				->setCellValue("F{$counter}", $name)
				->setCellValue("G{$counter}", $email)
				->setCellValue("H{$counter}", $phone, DataType::TYPE_STRING)
				->setCellValue("I{$counter}", $attendee->remark);
			++$counter;
			++$no;
		}

		$spreadsheet->getProperties()
			->setCreator('Fengshui Republic')
			->setLastModifiedBy('Fengshui Republic')
			->setTitle('Fengshui Republic Attendee List')
			->setSubject('Fengshui Republic Attendee List')
			->setDescription('Fengshui Republic Attendee List')
			->setKeywords('Fengshui Republic Attendee List')
			->setCategory('Fengshui Republic Attendee List');
		$spreadsheet->getActiveSheet()->setTitle('Attendee List');
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xls)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="video_pass_attendee_list_'.$date.'.xls"');
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


