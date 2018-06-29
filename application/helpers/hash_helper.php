<?php 

/*hash string*/
function hash_string($string = '')
{
	return hash('sha1', $string . config_item('encryption_key'));
}

/**
	fungsi ini digunakan untuk mengganti nilai yang dihasilkan dari fungsi encode CI yang digunakan untuk url.
	karena nilai yang dihasilkan dari fungsi encode CI mengandung karakter yang berpengaruh di url. seperti + / dan =
**/
function hash_link_encode($linkencode){
		$linkencode = str_replace(array('+','/','='), array('-','_','~'), $linkencode);
		
		return $linkencode;
}

function hash_link_decode($linkdecode){
		$linkdecode = str_replace(array('-','_','~'), array('+','/','='), $linkdecode);
		
		return $linkdecode;
}
