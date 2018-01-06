<?php
	session_start();
	//session_id();

	include "../config/koneksi.php";
	$datetime=date('Y-m-d H:m:s');
	$ip = $_SERVER['REMOTE_ADDR']; 
	$bs = $_SERVER['HTTP_USER_AGENT'];
	$date=date('Y-m-d H:m:s');
	
	if(!empty($_SESSION['id_user']) && !empty($_SESSION['password'] ))
	{
	unset($_SESSION['id']);
	}
	else if(($_GET['tanda']=='time')||($_GET['tanda']=='oke')) {
			$query=mysql_query("insert into log_admin (id_user,ip,browser,timeLogout)
					values('".$_SESSION['id_user']."','".$ip."','".$bs."',now())");
			session_destroy();
	
		if ($_GET['tanda']=='time'){
			header("location:login.php?err=12");
		}else if ($_GET['tanda']=='oke'){
		header("location:index.php");
		}
	}else if ($_GET['tanda']=='sess'){
		
		header('location:error.html');
	}
?>
