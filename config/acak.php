<?php
	function kdauto($table, $inisial, $no_produk){
	$struktur = mysql_query("select * from $table order by $no_produk");
	$field = mysql_field_name($struktur,0);
	$panjang = mysql_field_len($struktur,0);
	
	$query = mysql_query("select max(".$field.") from ".$table);
	$row = mysql_fetch_array($query);
	if($row[0] == ""){
	$angka = 0;
	}
	else {
	$angka = substr($row[0], strlen($inisial));
	}
	
	$angka++;
	$angka = strval($angka);
	$tmp="";
	for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka));
	$i++){
	$tmp = $tmp."0";
	}
	return $inisial.$tmp.$angka;
	}
?>