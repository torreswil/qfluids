<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Server extends CI_Controller {
	public function __construct(){
    	parent::__construct();
        $this->load->model('Api');
        $this->load->library('jsontricks');
    }

	public function index(){
        if(count($_POST) > 0){
            $filename   = 'project_keys/generated/'.$_POST['transactional_id'].'_key.qfl';
            $content    = array('transactional_id'=>$_POST['transactional_id']);
            if(write_file($filename, $this->jsontricks->unescape(json_encode($content)))){
                $data['main_content']   = 'server_create_activation_file';
                $data['filename']       = $filename;
                $this->load->view('partials/basic',$data);    
            }else{
                echo 'An error has ocurred.';
            }
        }else{
            $data['main_content']   = 'server_create_activation_file';
            $data['filename']       = '';
            $this->load->view('partials/basic',$data);
        }
	}
}
/*
<?php
// Lee el fichero en una variable,
// y convierte su contenido a una estructura de datos
$str_datos = file_get_contents("datos.json");
$datos = json_decode($str_datos,true);
 
echo "Aficiones del jefe: ".$datos["responsable"]["Aficiones"][0]."\n";
 
// Modifica el valor, y escribe el fichero json de salida
//
$datos["responsable"]["Aficiones"][0] = "Natación";
 
$fh = fopen("datos_out.json", 'w')
      or die("Error al abrir fichero de salida");
fwrite($fh, unescape(json_encode($datos)));
fclose($fh);
 
function code2utf($num){
    if($num<128)
        return chr($num);
    if($num<1024)
          return chr(($num>>6)+192).chr(($num&63)+128);
    if($num<32768)
        return chr(($num>>12)+224).chr((($num>>6)&63)+128)
              .chr(($num&63)+128);
    if($num<2097152)
        return chr(($num>>18)+240).chr((($num>>12)&63)+128)
                .chr((($num>>6)&63)+128).chr(($num&63)+128);
    return '';
}
 
function unescape($strIn, $iconv_to = 'UTF-8') {
    $strOut = '';
    $iPos = 0;
    $len = strlen ($strIn);
    while ($iPos < $len) {
        $charAt = substr ($strIn, $iPos, 1);
        if ($charAt == '\\') {
            $iPos++;
            $charAt = substr ($strIn, $iPos, 1);
            if ($charAt == 'u') {
                // Unicode character
                $iPos++;
                $unicodeHexVal = substr ($strIn, $iPos, 4);
                $unicode = hexdec ($unicodeHexVal);
                $strOut .= code2utf($unicode);
                $iPos += 4;
            }
            else {
                // Escaped ascii character
                $hexVal = substr ($strIn, $iPos, 2);
                if (hexdec($hexVal) > 127) {
                    // Convert to Unicode
                    $strOut .= code2utf(hexdec ($hexVal));
                }
                else {
                    $strOut .= chr (hexdec ($hexVal));
                }
                $iPos += 2;
            }
        }
        else {
            $strOut .= $charAt;
            $iPos++;
        }
    }
    if ($iconv_to != "UTF-8") {
        $strOut = iconv("UTF-8", $iconv_to, $strOut);
    }
    return $strOut;
} */
?>