<?php 
require_once "Classes/PHPExcel.php";

$inputFileType = 'CSV';
$inputFileName = 'testFile.csv';
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($inputFileName);

$worksheet = $objPHPExcel->getActiveSheet();
foreach ($worksheet->getRowIterator() as $row) {
	echo 'Row number: ' . $row->getRowIndex() . "\r\n";

	$cellIterator = $row->getCellIterator();
	$cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
	foreach ($cellIterator as $cell) {
		if (!is_null($cell)) {
			echo 'Cell: ' . $cell->getCoordinate() . ' - ' . $cell->getValue() . "\r\n";
		}
	}
}
?>