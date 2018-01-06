<?php
	error_reporting();
	include "../../../../config/koneksi.php";
	include "../../../../config/anti_injection.php";
	include "../../../../config/query.php";

	$act=$_GET['act'];

	if(($act=='editTeam')||($act=='editAbout')){
		$id=$_POST['id'];
		$dir="../../../../img/ourTeam/";
		$name=anti_injection($_POST['name']);
		$jabatan=anti_injection($_POST['position']);
		$email=anti_injection($_POST['email']);
		$fb=anti_injection($_POST['fb']);
		$twit=anti_injection($_POST['twit']);
		$ig=anti_injection($_POST['ig']);

		$tipe_gambar = array ( 'image/gif','image/jpeg', 'image/bmp' , 'image/png' );
		$img = $_FILES ['image']['name'];
		$ukuran = $_FILES ['image']['size'];
		$tipe = $_FILES ['image']['type'];
		$error = $_FILES ['image']['error'];
		$max_size = 3000000; //dalam bytes
		$file_sementara = $_FILES['image' ]['tmp_name'];
		$ekstensi_file=substr(strtolower(strchr($img,".")),1);

			$cons="chsAboutContact";
			$acak=rand(1,999);
			$filterString=str_replace(" ", "", $img);
			$potong=substr($filterString,0,7);
			$gambar=$cons.$acak.$potong.".".$ekstensi_file;
		
		$vfile_upload=$dir . $gambar;
		$rename=$dir.$gambar;

		if($img !=''){
			if((in_array($tipe, $tipe_gambar))&&($ukuran <= $max_size)){
				move_uploaded_file($file_sementara, $vfile_upload);
				rename($vfile_upload,$rename);
				$query=autoLoad("our_team","no","$id");
				$image=$query['image'];
				$target="../../../../img/ourTeam/$image";
				unlink($target);
				if($act=='editTeam'){
					$editLogo=mysql_query("update our_team set nama='".$name."',jabatan='".$jabatan."',image='".$gambar."',email='".$email."',fb='".$fb."',twit='".$twit."',ig='".$ig."' where no='$id'") or die ("".mysql_error());
				}else if($act=='editAbout'){
					$desk=$_POST['deskripsi'];
					$editAbout=mysql_query("update about set image='$gambar', profile='$desk' where no='$id'");
				}
				header("location:about-2.html");	
			}else{
				header("location:about-8.html");	
			}
		}else if($img ==''){
			if($act=='editTeam'){
				$editLogo=mysql_query("update our_team set nama='".$name."',jabatan='".$jabatan."',email='".$email."',fb='".$fb."',twit='".$twit."',ig='".$ig."' where no='$id'") or die ("".mysql_error());;
			}else if($act=='editAbout'){
				$desk=$_POST['deskripsi'];
				$editAbout=mysql_query("update about set profile='$desk' where no='$id'");
			}	
				header("location:about-2.html");
		}
					

	}else if($act=='editContact'){
		$id=$_POST['no'];
		$link=anti_injection($_POST['link']);

		if($id=='4'){
			$alt="www.facebook.com/$link";
		}elseif($id=='5'){
			$alt="www.twitter.com/$link";
		}elseif($id=='6'){
			$alt="www.instagram.com/$link";
		}else{
			$alt=$link;
		}

		$q=mysql_query("update contact set link='$alt' where id='$id'") or die("".mysql_error());
		header("location:about-2.html");

	}else if($act=='aktifContact'){
		$id=$_GET['id'];
		$st=$_GET['st'];
			if($st=='y'){
				$q=mysql_query("update contact set aktif='n' where id='$id'") or die ("".mysql_error());
			}else{
				$q=mysql_query("update contact set aktif='y' where id='$id'")  or die ("".mysql_error());;	
			}
				header("location:about-2.html");
	}else if($act=='deleteTeam'){
		$id=$_GET['id'];
		$query=autoLoad("our_team","no","$id");
		$image=$query['image'];
		$target="../../../../img/ourTeam/$image";
		$q=mysql_query("delete from our_team where no='$id'");
		header("location:about-1.html");
		unlink($target);
	}
?>