<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Jsontricks {

	public function code2utf($num){
	    if($num < 128)
	        return chr($num);
	    if($num < 1024)
	          return chr(($num>>6)+192).chr(($num&63)+128);
	    if($num < 32768)
	        return chr(($num>>12)+224).chr((($num>>6)&63)+128)
	              .chr(($num&63)+128);
	    if($num < 2097152)
	        return chr(($num>>18)+240).chr((($num>>12)&63)+128)
	                .chr((($num>>6)&63)+128).chr(($num&63)+128);
	    return '';
	}
	 
	public function unescape($strIn, $iconv_to = 'UTF-8') {
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
	                $strOut .= $this->code2utf($unicode);
	                $iPos += 4;
	            }
	            else {
	                // Escaped ascii character
	                $hexVal = substr ($strIn, $iPos, 2);
	                if (hexdec($hexVal) > 127) {
	                    // Convert to Unicode
	                    $strOut .= $this->code2utf(hexdec ($hexVal));
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
	}
}
?>