<?php

namespace backend\excel;

use Yii;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class ProductOrderList
{
	public function generate($productOrders)
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
			->setCellValue('C1', 'Items')
			->setCellValue('D1', 'Delivery')
			->setCellValue('E1', 'Date')
			->setCellValue('F1', 'Payment Type')
			->setCellValue('G1', 'Payment Price (RM)')
			->setCellValue('H1', 'Postage Area')
			->setCellValue('I1', 'Postage Price (RM)')
			->setCellValue('J1', 'Name')
			->setCellValue('K1', 'Email')
			->setCellValue('L1', 'Phone')
			->setCellValue('M1', 'Address 1')
			->setCellValue('N1', 'Address 2')
			->setCellValue('O1', 'Address 3')
			->setCellValue('P1', 'Remark');

		$delivery = array(
			0 => 'Pending',
			1 => 'Completed'
		);

		$payment = array(
			1 => 'Paypal',
			2 => 'Kiple'
		);

		$area = array(
			0 => 'None',
			1 => 'Singapore',
			2 => 'East M\'sia',
			3 => 'West M\'sia'
		);

		$counter = 2;
		$no = 1;

		foreach ($productOrders as $orders) {
			$p = '';
			foreach ($orders->items as $item) {
				$p .= $item->info->name_cn.' x '.$item->quantity."\r";
			}

			$spreadsheet->getActiveSheet()
				->setCellValue("A{$counter}", $no)
				->setCellValue("B{$counter}", $orders->invoice_number)
				->setCellValue("C{$counter}", $p, DataType::TYPE_STRING)
				->setCellValue("D{$counter}", $delivery[$orders->deliver_status])
				->setCellValue("E{$counter}", $orders->create_date)
				->setCellValue("F{$counter}", $payment[$orders->payment_type])
				->setCellValue("G{$counter}", $orders->payment_price)
				->setCellValue("H{$counter}", $area[$orders->postage_area])
				->setCellValue("I{$counter}", $orders->postage_price)
				->setCellValue("J{$counter}", $orders->name)
				->setCellValue("K{$counter}", $orders->email)
				->setCellValue("L{$counter}", $orders->phone, DataType::TYPE_STRING)
				->setCellValue("M{$counter}", $orders->address_1)
				->setCellValue("N{$counter}", $orders->address_2)
				->setCellValue("O{$counter}", $orders->address_3)
				->setCellValue("P{$counter}", $orders->remark);
			++$counter;
			++$no;
		}

		$spreadsheet->getProperties()
			->setCreator('Fengshui Republic')
			->setLastModifiedBy('Fengshui Republic')
			->setTitle('Fengshui Republic Product Sales List')
			->setSubject('Fengshui Republic Product Sales List')
			->setDescription('Fengshui Republic Product Sales List')
			->setKeywords('Fengshui Republic Product Sales List')
			->setCategory('Fengshui Republic Product Sales List');
		$spreadsheet->getActiveSheet()->setTitle('Product Sales List');
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xls)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="product_sales_list_'.$date.'.xls"');
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


