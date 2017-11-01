<?php

$dir = dirname(__FILE__);
require_once $dir . "/PHPExcel/PHPExcel.php";
$filename = $dir . "/demo.xlsx";

//載入excel分兩種
//1. 指定載入的sheet
$fileType = PHPExcel_IOFactory::identify($filename); // 取得excel類型
$objReader = PHPExcel_IOFactory::createReader($fileType); // 獲取文件操作對象
$sheetName = array("demo", "demo2"); // or $sheetName = array("demo", "demo2");
$objReader->setLoadSheetsOnly($sheetName); // 只載入指定的sheet
$objPHPExcel = $objReader->load($filename);

//2. 全部載入
//$objPHPExcel = PHPExcel_IOFactory::load($filename); // 一次全部載入所有sheet



read_by_iterator($objPHPExcel);

//solution 2:以Iterator方式
function read_by_iterator($objPHPExcel) {
    foreach ($objPHPExcel->getWorksheetIterator() as $sheet) {
        foreach ($sheet->getRowIterator() as $row) {
            foreach ($row->getCellIterator() as $cell) {
                $data = $cell->getValue();
                echo $data . "&nbsp;&nbsp;&nbsp;";
            }
            echo "<br>";
        }
        echo "<br>";
    }
}


//solution 1:一次讀入全部資料到array，消耗記憶體大，不建議
//read_all($objPHPExcel); // 一次讀取全部資料轉為array

function read_all($objPHPExcel) {
    $sheetCount = $objPHPExcel->getSheetCount();
    for ($i = 0; $i < $sheetCount; $i++) {
        $data = $objPHPExcel->getSheet($i)->toArray();
        print_r($data);
    }
}


?>