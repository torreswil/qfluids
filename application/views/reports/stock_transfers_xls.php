<?php 
//Defino la política de error
error_reporting(0);

require_once APPPATH . 'libraries/excel.php';

$workbook = new Spreadsheet_Excel_Writer();

//Formato para el título de las columnas
$f_title =& $workbook->addFormat(array('size'=>13, 'weight'=>1, 'align'=>'center', 'color'=>'black', 'pattern'=>1, 'fgcolor'=>47, 'vAlign' => 'vcenter'));
$f_title->setBold();
$f_title->setBorder(2);

$f_header =& $workbook->addFormat(array('align'=>'center', 'fgcolor'=>41, 'align'=>'center', 'vAlign' => 'vcenter'));
$f_header->setBold();
$f_header->setBorder(1);

//Formate para los rows
$row_center =& $workbook->addFormat(array('align'=>'center'));
$row_center->setBorder(1);
$row_left =& $workbook->addFormat(array('align'=>'left',));
$row_left->setBorder(1);
$row_right =& $workbook->addFormat(array('align'=>'right'));
$row_right->setBorder(1);

//Formato para los decimales
$numberFormat = '#.#0,###;[Red]-#.#0,###';
$decimal =& $workbook->addFormat(array('align'=>'center', 'numformat'=>$numberFormat));
$decimal->setBorder(1);

$decimal_bold =& $workbook->addFormat(array('align'=>'center', 'numformat'=>$numberFormat));
$decimal_bold->setBold();
$decimal_bold->setBorder(1);

//Agrego la hoja
$worksheet =& $workbook->addWorksheet("STOCK TRANSFERS");
$worksheet->setInputEncoding('UTF-8');

$worksheet->write(0, 0, "STOCK TRANSFERS", $f_title);
//Titulo columnas
$worksheet->write(1, 0, "Code", $f_header);
$worksheet->write(1, 1, "Date", $f_header);
$worksheet->write(1, 2, "Origin", $f_header);
$worksheet->write(1, 3, "Destiny", $f_header);
$worksheet->write(1, 4, "Type", $f_header);
$worksheet->write(1, 5, "User", $f_header);
$worksheet->write(1, 6, "Notes", $f_header);
$worksheet->write(1, 7, "Quantity", $f_header);
$worksheet->write(1, 8, "Product", $f_header);
$worksheet->write(1, 9, "Chemical adition", $f_header);

//Defino el tamaño de la cabecera
$worksheet->setRow(0, 30);

//Defino el tamaño de las columnas
$worksheet->setColumn(0,0,15);
$worksheet->setColumn(0,1,11);
$worksheet->setColumn(0,2,11);
$worksheet->setColumn(0,3,11);
$worksheet->setColumn(0,4,11);
$worksheet->setColumn(0,5,11);
$worksheet->setColumn(0,6,11);
$worksheet->setColumn(0,7,11);
$worksheet->setColumn(0,8,15);
$worksheet->setColumn(0,9,15);

//Aplico el merge para el título
$worksheet->setMerge(0, 0, 0, 9);

$row=2;

foreach($movements as $movement) {        
        $worksheet->write($row, 0, $movement['code'], $row_left);
        $worksheet->write($row, 1, $movement['date'], $row_left);
        $worksheet->write($row, 2, $movement['origin'], $row_left);
        $worksheet->write($row, 3, $movement['destiny'], $row_left);
        $worksheet->write($row, 4, $movement['type'], $row_left);
        $worksheet->write($row, 5, $movement['user'], $row_left);
        $worksheet->write($row, 6, $movement['notes'], $row_left);
        $worksheet->write($row, 7, $movement['quantity'], $row_left);
        $worksheet->write($row, 8, $movement['product'], $row_left);
        $worksheet->write($row, 9, $movement['chemical_adition'], $row_left);
        $row++; 
}

//Asigno el nombre al archivo
$workbook->send("Stock Transfers.xls");
//Cierro el documento
$workbook->close();
