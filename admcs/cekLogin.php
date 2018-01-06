<?php
include "../config/koneksi.php";
include "../config/anti_injection.php";
require_once "../config/functions.php";

	$psw = md5($_POST['pwd']);
	

	$username = anti_injection($_POST['usr']);
	$password = anti_injection ($psw);
	$ip = $_SERVER['REMOTE_ADDR']; 
	$bs = $_SERVER['HTTP_USER_AGENT'];

	if (!(ctype_alnum($username)) OR !(ctype_alnum($password))){
		header("location:login.php?err=7");
		} else {
		// query untuk mendapatkan record dari username
		$query = "SELECT * FROM admins WHERE username = '$username' AND password='$password'";
		$hasil = mysql_query($query); ("".mysql_error());
		$data = mysql_fetch_array($hasil);
		$q = mysql_num_rows($hasil);
		 

		// cek kesesuaian password
		if ($data['password'] == $password && $data['username'] == $username){

			$query=mysql_query("insert into log_admin (id_user,ip,browser,timeLogin,timeLogout)
					values('".$data['id_user']."','".$ip."','".$bs."',now(),'logged')");
    		// menyimpan username dan level ke dalam session
    		$_SESSION['id']=session_id();
			$_SESSION['id_user'] = $data['id_user'];
			$_SESSION['name']=$data['nama_lengkap'];
			$_SESSION['level']=$data['level'];
		    $_SESSION['username'] = $data['username'];

				login_validate();
				header('location: index.html');
		} else {
				header("location:login.php?err=7");
			}
		}
	?>