<?php
	error_reporting();
	include "../../../../config/koneksi.php";
	$act=$_GET['act'];
	if($act=='change'){
		$id=$_POST['id'];
		$status=$_POST['status_order'];

		$q=mysql_query("update orders set status_order='$status' where id_orders='$id'");

		if($q){
			header("location:orders-2.html");
		}else{
			header("location:orders-5.html");
		}
	}
?>