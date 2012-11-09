<?php 

require_once APPPATH . 'libraries/WkHtmlToPdf.php';

$url = "http://qfluids/main/report/$project/$report/";

$pdf = new WkHtmlToPdf;

$pdf->addPage($url);

// Add a cover (same sources as above are possible)
$pdf->addToc();

// ... send to client as file download
if(!$pdf->send('test.pdf')) {
        echo $pdf->getError();
}
