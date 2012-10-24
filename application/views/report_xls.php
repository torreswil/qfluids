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
$worksheet =& $workbook->addWorksheet("MUD DATA");
$worksheet->setInputEncoding('UTF-8');

$worksheet->write(0, 0, "DATOS PRUEBA DE LODO", $f_title);
//Titulo columnas
$worksheet->write(1, 0, "Fases", $f_header);
$worksheet->write(1, 1, "Numero de reporte", $f_header);
$worksheet->write(1, 2, "depth", $f_header);
$worksheet->write(1, 3, "mud weigth", $f_header);
$worksheet->write(1, 4, "funnel viscosity", $f_header);
$worksheet->write(1, 5, "PV", $f_header);
$worksheet->write(1, 6, "YP", $f_header);
$worksheet->write(1, 7, "GELES", $f_header);
$worksheet->write(1, 8, "", $f_header);
$worksheet->write(1, 9, "", $f_header);
$worksheet->write(1, 10, "API fl/cake", $f_header);
$worksheet->write(1, 11, "MBT", $f_header);
$worksheet->write(1, 12, "Ph", $f_header);
$worksheet->write(1, 13, "Ca", $f_header);
$worksheet->write(1, 14, "CI", $f_header);
//Segunda fila para unir
$worksheet->write(2, 0, "", $f_header);
$worksheet->write(2, 1, "", $f_header);
$worksheet->write(2, 2, "", $f_header);
$worksheet->write(2, 3, "", $f_header);
$worksheet->write(2, 4, "", $f_header);
$worksheet->write(2, 5, "", $f_header);
$worksheet->write(2, 6, "", $f_header);
$worksheet->write(2, 7, "10\"", $f_header);
$worksheet->write(2, 8, "10'", $f_header);
$worksheet->write(2, 9, "30'", $f_header);
$worksheet->write(2, 10, "", $f_header);
$worksheet->write(2, 11, "", $f_header);
$worksheet->write(2, 12, "", $f_header);
$worksheet->write(2, 13, "", $f_header);
$worksheet->write(2, 14, "", $f_header);

//Defino el tamaño de la cabecera
$worksheet->setRow(0, 30);

//Defino el tamaño de las columnas
$worksheet->setColumn(0,0,11);
$worksheet->setColumn(0,1,11);
$worksheet->setColumn(0,2,11);
$worksheet->setColumn(0,3,11);
$worksheet->setColumn(0,4,11);
$worksheet->setColumn(0,5,11);
$worksheet->setColumn(0,6,11);
$worksheet->setColumn(0,7,11);
$worksheet->setColumn(0,8,11);
$worksheet->setColumn(0,9,11);
$worksheet->setColumn(0,10,11);
$worksheet->setColumn(0,11,11);
$worksheet->setColumn(0,12,11);
$worksheet->setColumn(0,13,11);
$worksheet->setColumn(0,14,11);

//Aplico el merge para el título
$worksheet->setMerge(0, 0, 0, 14);
//Aplico el merge con la siguiente fila de las cabeceras
$worksheet->setMerge(1, 0, 2, 0);
$worksheet->setMerge(1, 1, 2, 1);
$worksheet->setMerge(1, 2, 2, 2);
$worksheet->setMerge(1, 3, 2, 3);
$worksheet->setMerge(1, 4, 2, 4);
$worksheet->setMerge(1, 5, 2, 5);
$worksheet->setMerge(1, 6, 2, 6);
$worksheet->setMerge(1, 7, 1, 9);
$worksheet->setMerge(1, 10, 2, 10);
$worksheet->setMerge(1, 11, 2, 11);
$worksheet->setMerge(1, 12, 2, 12);
$worksheet->setMerge(1, 13, 2, 13);
$worksheet->setMerge(1, 14, 2, 14);

//Cargo los rows según el número en donde empieza
$row_i = 3;
$row_j = 3;
//Muestra los resultados de cada reporte

foreach($reports as $report) { 
        
        //Reviso cuantas pruebas se realizaron por proyecto por reporte       
        $tmp_report = $this->Api->sql("SELECT reports.id, reports.number, reports.phase, project_report_test.value, project_report_test.hour, test.test FROM reports LEFT JOIN project_report_test ON reports.id = project_report_test.report_id LEFT JOIN test ON test.id = project_report_test.test_id WHERE reports.id = {$report['id']} GROUP BY project_report_test.hour");
        foreach($tmp_report as $fila) {
                $worksheet->write($row_i, 0, $report['phase'], $row_left);
                $worksheet->write($row_i, 1, $report['number'], $row_left);
                $row_i++;
        }
        
        //Inicializo nuevamente la fila para la próxima columna
        $row_i = $row_j;
        //Consulto el test 'depth'
        $depth = $this->Api->sql("SELECT project_report_test.* FROM project_report_test INNER JOIN test ON test.id = project_report_test.test_id WHERE project_report_test.report_id = {$report['id']} AND test.test = 'depth' ORDER BY project_report_test.hour ASC, project_report_test.id ASC");
        foreach($depth as $fila) {
                $worksheet->write($row_i, 2, empty($fila['value']) ? '' : $fila['value'], $decimal);                
                $row_i++;
        }
        
        //Mud weight
        $row_i = $row_j;
        $mud_weight = $this->Api->sql("SELECT project_report_test.* FROM project_report_test INNER JOIN test ON test.id = project_report_test.test_id WHERE project_report_test.report_id = {$report['id']} AND test.test = 'mud weight' ORDER BY project_report_test.hour ASC, project_report_test.id ASC");        
        foreach($mud_weight as $fila) {                
                $worksheet->write($row_i, 3, empty($fila['value']) ? '' : $fila['value'], $decimal);                
                $row_i++;
        } 
        
        //funnel_viscosity
        $row_i = $row_j;
        $funnel_viscosity = $this->Api->sql("SELECT project_report_test.* FROM project_report_test INNER JOIN test ON test.id = project_report_test.test_id WHERE project_report_test.report_id = {$report['id']} AND test.test = 'Funnel viscosity' ORDER BY project_report_test.hour ASC, project_report_test.id ASC");        
        foreach($funnel_viscosity as $fila) {                
                $worksheet->write($row_i, 4, empty($fila['value']) ? '' : $fila['value'], $decimal);                
                $row_i++;
        }
        
        //PV
        $row_i = $row_j;
        $pv = $this->Api->sql("SELECT project_report_test.* FROM project_report_test INNER JOIN test ON test.id = project_report_test.test_id WHERE project_report_test.report_id = {$report['id']} AND test.test = 'pv' ORDER BY project_report_test.hour ASC, project_report_test.id ASC");        
        foreach($pv as $fila) {                
                $worksheet->write($row_i, 5, empty($fila['value']) ? '' : $fila['value'], $decimal);                
                $row_i++;
        }
        
        //YP
        $row_i = $row_j;
        $yp = $this->Api->sql("SELECT project_report_test.* FROM project_report_test INNER JOIN test ON test.id = project_report_test.test_id WHERE project_report_test.report_id = {$report['id']} AND test.test = 'yp' ORDER BY project_report_test.hour ASC, project_report_test.id ASC");        
        foreach($yp as $fila) {                
                $worksheet->write($row_i, 6, empty($fila['value']) ? '' : $fila['value'], $decimal);                
                $row_i++;
        }
        
        //10"
        $row_i = $row_j;
        $t_10_1 = $this->Api->sql("SELECT project_report_test.* FROM project_report_test INNER JOIN test ON test.id = project_report_test.test_id WHERE project_report_test.report_id = {$report['id']} AND test.test = '10\"' ORDER BY project_report_test.hour ASC, project_report_test.id ASC");        
        foreach($t_10_1 as $fila) {                
                $worksheet->write($row_i, 7, empty($fila['value']) ? '' : $fila['value'], $decimal);                
                $row_i++;
        }
        
        //10'
        $row_i = $row_j;
        $t_10_2 = $this->Api->sql("SELECT project_report_test.* FROM project_report_test INNER JOIN test ON test.id = project_report_test.test_id WHERE project_report_test.report_id = {$report['id']} AND test.test = '10\'' ORDER BY project_report_test.hour ASC, project_report_test.id ASC");        
        foreach($t_10_2 as $fila) {                
                $worksheet->write($row_i, 8, empty($fila['value']) ? '' : $fila['value'], $decimal);                
                $row_i++;
        }
        
        //30'
        $row_i = $row_j;
        $t_30 = $this->Api->sql("SELECT project_report_test.* FROM project_report_test INNER JOIN test ON test.id = project_report_test.test_id WHERE project_report_test.report_id = {$report['id']} AND test.test = '30\'' ORDER BY project_report_test.hour ASC, project_report_test.id ASC");        
        foreach($t_30 as $fila) {                
                $worksheet->write($row_i, 9, empty($fila['value']) ? '' : $fila['value'], $decimal);                
                $row_i++;
        }
        
        //API fl/cake'
        $row_i = $row_j;
        $API_fl_cake = $this->Api->sql("SELECT project_report_test.* FROM project_report_test INNER JOIN test ON test.id = project_report_test.test_id WHERE project_report_test.report_id = {$report['id']} AND test.test = 'API fl/cake' ORDER BY project_report_test.hour ASC, project_report_test.id ASC");        
        foreach($API_fl_cake as $fila) {                
                $worksheet->write($row_i, 10, empty($fila['value']) ? '' : $fila['value'], $decimal);                
                $row_i++;
        }
        
        //MBT
        $row_i = $row_j;
        $mbt = $this->Api->sql("SELECT project_report_test.* FROM project_report_test INNER JOIN test ON test.id = project_report_test.test_id WHERE project_report_test.report_id = {$report['id']} AND test.test = 'MBT' ORDER BY project_report_test.hour ASC, project_report_test.id ASC");        
        foreach($mbt as $fila) {                
                $worksheet->write($row_i, 11, empty($fila['value']) ? '' : $fila['value'], $decimal);                
                $row_i++;
        }
        
        //Ph
        $row_i = $row_j;
        $ph = $this->Api->sql("SELECT project_report_test.* FROM project_report_test INNER JOIN test ON test.id = project_report_test.test_id WHERE project_report_test.report_id = {$report['id']} AND test.test = 'pH METER' ORDER BY project_report_test.hour ASC, project_report_test.id ASC");        
        foreach($ph as $fila) {                
                $worksheet->write($row_i, 12, empty($fila['value']) ? '' : $fila['value'], $decimal);                
                $row_i++;
        }
        
        //Ca
        $row_i = $row_j;
        $ca = $this->Api->sql("SELECT project_report_test.* FROM project_report_test INNER JOIN test ON test.id = project_report_test.test_id WHERE project_report_test.report_id = {$report['id']} AND test.test = 'Ca++' ORDER BY project_report_test.hour ASC, project_report_test.id ASC");        
        foreach($ca as $fila) {                
                $worksheet->write($row_i, 13, empty($fila['value']) ? '' : $fila['value'], $decimal);                
                $row_i++;
        }
        
        //Cii
        $row_i = $row_j;
        $cii = $this->Api->sql("SELECT project_report_test.* FROM project_report_test INNER JOIN test ON test.id = project_report_test.test_id WHERE project_report_test.report_id = {$report['id']} AND test.test = 'c.c.i.' ORDER BY project_report_test.hour ASC, project_report_test.id ASC");        
        foreach($cii as $fila) {                
                $worksheet->write($row_i, 14, empty($fila['value']) ? '' : $fila['value'], $decimal);                
                $row_i++;
        }
        
        //Asigno la nueva fila dependiendo de los reportes que tenga
        $row_j = $row_j+count($tmp_report);
        $row_i = $row_j;
                
}

//Asigno el nombre al archivo
$workbook->send("Datos_prueba_de_lodo.xls");
//Cierro el documento
$workbook->close();
