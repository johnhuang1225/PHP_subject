<?php
$dir = dirname(__FILE__);
require_once $dir . "/PHPExcel/PHPExcel.php";
$objPHPExcel = new PHPExcel();
$objSheet = $objPHPExcel->getActiveSheet();
$objSheet->setTitle("demo");
$objSheet->setCellValue('A1', '姓名')->setCellValue('B1', '年齡');
$objSheet->setCellValue('A2', '黃獻葦')->setCellValue('B2', 43);
$objSheet->setCellValue('A3', '莊雅惠')->setCellValue('B2', 38);
$objSheet->setCellValue('A4', '黃耀霆')->setCellValue('B2', 8);
$objSheet->setCellValue('A5', '黃嬿儒')->setCellValue('B2', 6);
$objWrite = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWrite->save($dir . '/demo.xlsx');
?>