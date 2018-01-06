<?php
	error_reporting();
	include "../../../../config/koneksi.php";
	include "../../../../config/anti_injection.php";

	$act=$_GET['act'];

	if(($act=='addTest')||($act=='editTest')){
		$name=anti_injection($_POST['nama']);
		$company=anti_injection($_POST['perusahaan']);
		$test=anti_injection($_POST['testimoni']);

		if($act=='addTest'){
			$q=mysql_query("insert into testimoni(nama,perusahaan,pesan) values('".$name."','".$company."','".$test."')");
			header("location:email-3.html");
		}else if($act=='editTest'){
			$id=$_POST['no'];
			$q=mysql_query("update testimoni set nama='$name',perusahaan='$company',pesan='$test' where no='$id'");
			header("location:email-2.html");
		}
	}else if($act=='deleteTest'){
		$id=$_GET['id'];
		$q=mysql_query("delete from testimoni where no='$id'");
		header("location:email-1.html");
	}

?>