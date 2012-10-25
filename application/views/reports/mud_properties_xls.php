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
        
        //Número de columnas donde inician las pruebas
        $col = 2;
        
        //Reviso cuantas pruebas se realizaron por proyecto por reporte       
        $tmp_report = $this->Api->sql("SELECT reports.id, reports.number, reports.phase, project_report_test.value, project_report_test.hour, test.test FROM reports LEFT JOIN project_report_test ON reports.id = project_report_test.report_id LEFT JOIN test ON test.id = project_report_test.test_id WHERE reports.id = {$report['id']} GROUP BY project_report_test.hour");
        //Tomo la cantidad de reportes
        $tam_report = count($tmp_report);
        //Imprimo los reportes
        foreach($tmp_report as $fila) {
                $worksheet->write($row_i, 0, $report['phase'], $row_left);
                $worksheet->write($row_i, 1, $report['number'], $row_left);
                $row_i++;
        }
        
        //Inicializo nuevamente la fila para la próxima columna
        $row_i = $row_j;
        $tam_col = $tam_report;
        //Consulto el test 'depth'
        $depth = $this->Api->sql("SELECT project_report_test.* FROM project_report_test INNER JOIN test ON test.id = project_report_test.test_id WHERE project_report_test.report_id = {$report['id']} AND test.test = 'depth' ORDER BY project_report_test.hour ASC, project_report_test.id ASC");
        foreach($depth as $fila) {
                $worksheet->write($row_i, $col, empty($fila['value']) ? '' : $fila['value'], $decimal);                
                $row_i++;
                $tam_col--;
        }
        //Por si no tiene registros imprima columnas vacías        
        while($tam_col > 0) {
                $worksheet->write($row_i, $col, '', $decimal);
                $row_i++;
                $tam_col--;
        }  
        
        //Mud weight
        $row_i = $row_j;
        $tam_col = $tam_report;
        $col++;
        $mud_weight = $this->Api->sql("SELECT project_report_test.* FROM project_report_test INNER JOIN test ON test.id = project_report_test.test_id WHERE project_report_test.report_id = {$report['id']} AND test.test = 'mud weight' ORDER BY project_report_test.hour ASC, project_report_test.id ASC");        
        foreach($mud_weight as $fila) {                
                $worksheet->write($row_i, $col, empty($fila['value']) ? '' : $fila['value'], $decimal);                
                $row_i++;
                $tam_col--;
        }         
        while($tam_col > 0) {
                $worksheet->write($row_i, $col, '', $decimal);
                $row_i++;
                $tam_col--;
        }
                
        //funnel_viscosity
        $row_i = $row_j;
        $tam_col = $tam_report;
        $col++;
        $funnel_viscosity = $this->Api->sql("SELECT project_report_test.* FROM project_report_test INNER JOIN test ON test.id = project_report_test.test_id WHERE project_report_test.report_id = {$report['id']} AND test.test = 'Funnel viscosity' ORDER BY project_report_test.hour ASC, project_report_test.id ASC");        
        foreach($funnel_viscosity as $fila) {                
                $worksheet->write($row_i, $col, empty($fila['value']) ? '' : $fila['value'], $decimal);                
                $row_i++;
                $tam_col--;
        }
        while($tam_col > 0) {
                $worksheet->write($row_i, $col, '', $decimal);
                $row_i++;
                $tam_col--;
        }
        
        //PV
        $row_i = $row_j;
        $tam_col = $tam_report;
        $col++;
        $pv = $this->Api->sql("SELECT project_report_test.* FROM project_report_test INNER JOIN test ON test.id = project_report_test.test_id WHERE project_report_test.report_id = {$report['id']} AND test.test = 'pv' ORDER BY project_report_test.hour ASC, project_report_test.id ASC");        
        foreach($pv as $fila) {                
                $worksheet->write($row_i, $col, empty($fila['value']) ? '' : $fila['value'], $decimal);                
                $row_i++;
                $tam_col--;
        }
        while($tam_col > 0) {
                $worksheet->write($row_i, $col, '', $decimal);
                $row_i++;
                $tam_col--;
        }
        
        //YP
        $row_i = $row_j;
        $tam_col = $tam_report;
        $col++;
        $yp = $this->Api->sql("SELECT project_report_test.* FROM project_report_test INNER JOIN test ON test.id = project_report_test.test_id WHERE project_report_test.report_id = {$report['id']} AND test.test = 'yp' ORDER BY project_report_test.hour ASC, project_report_test.id ASC");        
        foreach($yp as $fila) {                
                $worksheet->write($row_i, $col, empty($fila['value']) ? '' : $fila['value'], $decimal);                
                $row_i++;
                $tam_col--;
        }
        while($tam_col > 0) {
                $worksheet->write($row_i, $col, '', $decimal);
                $row_i++;
                $tam_col--;
        }
        
        //10"
        $row_i = $row_j;
        $tam_col = $tam_report;
        $col++;
        $t_10_1 = $this->Api->sql("SELECT project_report_test.* FROM project_report_test INNER JOIN test ON test.id = project_report_test.test_id WHERE project_report_test.report_id = {$report['id']} AND test.test = '10\"' ORDER BY project_report_test.hour ASC, project_report_test.id ASC");        
        foreach($t_10_1 as $fila) {                
                $worksheet->write($row_i, $col, empty($fila['value']) ? '' : $fila['value'], $decimal);                
                $row_i++;
                $tam_col--;
        }
        while($tam_col > 0) {
                $worksheet->write($row_i, $col, '', $decimal);
                $row_i++;
                $tam_col--;
        }
        
        //10'
        $row_i = $row_j;
        $tam_col = $tam_report;
        $col++;
        $t_10_2 = $this->Api->sql("SELECT project_report_test.* FROM project_report_test INNER JOIN test ON test.id = project_report_test.test_id WHERE project_report_test.report_id = {$report['id']} AND test.test = '10\'' ORDER BY project_report_test.hour ASC, project_report_test.id ASC");        
        foreach($t_10_2 as $fila) {                
                $worksheet->write($row_i, $col, empty($fila['value']) ? '' : $fila['value'], $decimal);                
                $row_i++;
                $tam_col--;
        }
        while($tam_col > 0) {
                $worksheet->write($row_i, $col, '', $decimal);
                $row_i++;
                $tam_col--;
        }
        
        //30'
        $row_i = $row_j;
        $tam_col = $tam_report;
        $col++;
        $t_30 = $this->Api->sql("SELECT project_report_test.* FROM project_report_test INNER JOIN test ON test.id = project_report_test.test_id WHERE project_report_test.report_id = {$report['id']} AND test.test = '30\'' ORDER BY project_report_test.hour ASC, project_report_test.id ASC");        
        foreach($t_30 as $fila) {                
                $worksheet->write($row_i, $col, empty($fila['value']) ? '' : $fila['value'], $decimal);                
                $row_i++;
                $tam_col--;
        }
        while($tam_col > 0) {
                $worksheet->write($row_i, $col, '', $decimal);
                $row_i++;
                $tam_col--;
        }
        
        //API fl/cake'
        $row_i = $row_j;
        $tam_col = $tam_report;
        $col++;
        $API_fl_cake = $this->Api->sql("SELECT project_report_test.* FROM project_report_test INNER JOIN test ON test.id = project_report_test.test_id WHERE project_report_test.report_id = {$report['id']} AND test.test = 'API fl/cake' ORDER BY project_report_test.hour ASC, project_report_test.id ASC");        
        foreach($API_fl_cake as $fila) {                
                $worksheet->write($row_i, $col, empty($fila['value']) ? '' : $fila['value'], $decimal);                
                $row_i++;
                $tam_col--;
        }
        while($tam_col > 0) {
                $worksheet->write($row_i, $col, '', $decimal);
                $row_i++;
                $tam_col--;                
        }
        
        //MBT
        $row_i = $row_j;
        $tam_col = $tam_report;
        $col++;
        $mbt = $this->Api->sql("SELECT project_report_test.* FROM project_report_test INNER JOIN test ON test.id = project_report_test.test_id WHERE project_report_test.report_id = {$report['id']} AND test.test = 'MBT' ORDER BY project_report_test.hour ASC, project_report_test.id ASC");        
        foreach($mbt as $fila) {                
                $worksheet->write($row_i, $col, empty($fila['value']) ? '' : $fila['value'], $decimal);                
                $row_i++;
                $tam_col--;
        }
        while($tam_col > 0) {
                $worksheet->write($row_i, $col, '', $decimal);
                $row_i++;
                $tam_col--;
        }
        
        //Ph
        $row_i = $row_j;
        $tam_col = $tam_report;
        $col++;
        $ph = $this->Api->sql("SELECT project_report_test.* FROM project_report_test INNER JOIN test ON test.id = project_report_test.test_id WHERE project_report_test.report_id = {$report['id']} AND test.test = 'pH METER' ORDER BY project_report_test.hour ASC, project_report_test.id ASC");        
        foreach($ph as $fila) {                
                $worksheet->write($row_i, $col, empty($fila['value']) ? '' : $fila['value'], $decimal);                
                $row_i++;
                $tam_col--;
        }
        while($tam_col > 0) {
                $worksheet->write($row_i, $col, '', $decimal);
                $row_i++;
                $tam_col--;
        }
        
        //Ca
        $row_i = $row_j;
        $tam_col = $tam_report;
        $col++;
        $ca = $this->Api->sql("SELECT project_report_test.* FROM project_report_test INNER JOIN test ON test.id = project_report_test.test_id WHERE project_report_test.report_id = {$report['id']} AND test.test = 'Ca++' ORDER BY project_report_test.hour ASC, project_report_test.id ASC");        
        foreach($ca as $fila) {                
                $worksheet->write($row_i, $col, empty($fila['value']) ? '' : $fila['value'], $decimal);                
                $row_i++;
                $tam_col--;
        }
        while($tam_col > 0) {
                $worksheet->write($row_i, $col, '', $decimal);
                $row_i++;
                $tam_col--;
        }
        
        //Cii
        $row_i = $row_j;
        $tam_col = $tam_report;
        $col++;
        $cii = $this->Api->sql("SELECT project_report_test.* FROM project_report_test INNER JOIN test ON test.id = project_report_test.test_id WHERE project_report_test.report_id = {$report['id']} AND test.test = 'c.c.i.' ORDER BY project_report_test.hour ASC, project_report_test.id ASC");        
        foreach($cii as $fila) {                
                $worksheet->write($row_i, $col, empty($fila['value']) ? '' : $fila['value'], $decimal);                
                $row_i++;
                $tam_col--;
        }
        while($tam_col > 0) {
                $worksheet->write($row_i, $col, '', $decimal);
                $row_i++;
                $tam_col--;
        }
        
        if(is_array($options) && !empty($options[0])) {
                //Columna en donde empiezan a imprimirse las cabeceras
                $col_header = 15;
                //Recorro las opciones
                foreach($options as $option) {
                        $row_i = $row_j;
                        $tam_col = $tam_report;
                        $col++;
                        //Muestro las cabeceras
                        $tests = $this->Api->get_where('test', array('id'=>$option));
                        foreach($tests as $test) {
                                //Agrego las cabeceras
                                $worksheet->write(1, $col_header, strtoupper(str_replace('&theta;', '', ($test['test']))), $f_header);
                                $worksheet->write(2, $col_header, "", $f_header);                                
                                $worksheet->setColumn(0,$col_header,11);
                                $worksheet->setMerge(1, $col_header, 2, $col_header);                                
                        }
                        //Consulto los valores
                        $opt = $this->Api->sql("SELECT project_report_test.*, test.test FROM project_report_test INNER JOIN test ON test.id = project_report_test.test_id WHERE project_report_test.report_id = {$report['id']} AND test.id = '$option' ORDER BY project_report_test.hour ASC, project_report_test.id ASC");
                        foreach($opt as $fila) {                                  
                                $worksheet->write($row_i, $col, empty($fila['value']) ? '' : $fila['value'], $decimal);
                                $row_i++;
                                $tam_col--;
                        } 
                        while($tam_col > 0) {
                                $worksheet->write($row_i, $col, '', $decimal);
                                $row_i++;
                                $tam_col--;
                        }
                        $col_header++;
                } 
                //Aplico el merge para el título
                $worksheet->setMerge(0, 0, 0, $col_header-1);
        }
        
        //Asigno la nueva fila dependiendo de los reportes que tenga
        $row_j = $row_j+count($tmp_report);
        $row_i = $row_j;
                
}

//Asigno el nombre al archivo
$workbook->send("Datos_prueba_de_lodo.xls");
//Cierro el documento
$workbook->close();
