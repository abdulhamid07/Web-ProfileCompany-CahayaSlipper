<?php
	include "../../../../config/koneksi.php";
	include "../../../../config/anti_injection.php";

	//$qs=mysql_query("select link from socmed where no in(4)");
	//$ds=mysql_fetch_assoc($qs);
	$act=$_GET['act'];

	if(($act=='replyEmail')||($act=='updateReply')){

		$sub=anti_injection($_POST['subjek']);
		$tgl=date('Y-m-d');
		$pes=anti_injection($_POST['pesan']);
		$email=anti_injection($_POST['email']);

			if($act=='replyEmail'){
				$q=mysql_query('insert into bls_email (id_pesan,subjek,pesan,tgl)
								values("'.$no.'","'.$sub.'","'.$pes.'","'.$tgl.'")');
				$email_to=$email;
				$email_from = 'hamyd.abdul6@gmail.com';//'$ds[link]';//replace with your email
		    		//$body = 'Name: ' . $nama. "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subjek . "\n\n" . 'Message: ' . $pesan;
		    		$isi='Message: ' . $pes;
		    		$success = @mail($email_to, $sub, $isi, 'From: <'.$email_from.'>');
				header("location:email-3.html");

			}else if($act=='updateReply'){
				$id=$_POST['no'];
				$q=mysql_query("update bls_email set subjek='$sub',pesan='$pes',tgl='$tgl' where no='$id'");
				header("location:email-2.html");	
			}

	}if(($act=='addTest')||($act=='editTest')){
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
	}else if(($act=='deleteEmail')||($act=='deleteTest')){
		$id=$_GET['id'];
			if($act=='deleteEmail'){
				$q=mysql_query("delete from pesan where no='$id'");
				$qbc=mysql_query("delete from bls_email where no='$id'");
			}else if($act=='deleteTest'){
				$q=mysql_query("delete from testimoni where no='$id'");
			}
		header("location:email-1.html");
	}
	