<?php
function enkripsi ($enkrip){
 require "class.pcrypt.php";
		
		$crypt = new pcrypt(MODE_ECB, "BLOWFISH", "secretkey");	
		$crypt->encrypt("$enkrip");
}
function deskripsi ($deskrip){
	require "class.pcrypt.php";
		
		$crypt = new pcrypt(MODE_ECB, "BLOWFISH", "secretkey");	
		$crypt->decrypt("$deskrip");	
}
?>