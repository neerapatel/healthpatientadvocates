<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class CI_Encrypt {

	private $_ci;

 	function __construct()
    {
    	//When the class is constructed get an instance of codeigniter so we can access it locally
    	$this->_ci =& get_instance();
    }

	/*$test = encrypt("2000";
	echo $test."<br/>";
	echo decrypt($test);*/
	
	function encrypt($mprhase) {
		 $MASTERKEY = "KEYPHRASE";
		 $td = mcrypt_module_open('tripledes', '', 'ecb', '');
		 $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
		 mcrypt_generic_init($td, $MASTERKEY, $iv);
		 $crypted_value = mcrypt_generic($td, $mprhase);
		 mcrypt_generic_deinit($td);
		 mcrypt_module_close($td);
		 return base64_encode($crypted_value);
	} 
	
	function decrypt($mprhase) {
		 $MASTERKEY = "KEYPHRASE";
     $td = mcrypt_module_open('tripledes', '', 'ecb', '');
     $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
     mcrypt_generic_init($td, $MASTERKEY, $iv);
     $decrypted_value = mdecrypt_generic($td, base64_decode($mprhase));
     mcrypt_generic_deinit($td);
     mcrypt_module_close($td);
     return $decrypted_value;
	}


}
?>