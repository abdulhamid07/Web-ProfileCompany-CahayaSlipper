<?php
	error_reporting();
	include "../../../../config/koneksi.php";
	include "../../../../config/fungsi_seo.php";
	include "../../../../config/anti_injection.php";
	include "../../../../config/query.php";

	$act=$_GET['act'];

	if(($act=='addNews')||($act=='editNews')){
		$judul=anti_injection($_POST['judul']);
	  	$seo_title = seo_title($judul);
	  	$desc=$_POST['deskripsi'];
	  	$date=date('Y-m-d');
	  	$penulis=$_SESSION['id_user'];
	  	$dir="../../../../img/news/";
		$tipe_gambar = array ( 'image/jpeg', 'image/bmp' , 'image/png' );
		$img = $_FILES ['image']['name'];
		$ukuran = $_FILES ['image']['size'];
		$tipe = $_FILES ['image']['type'];
		$error = $_FILES ['image']['error'];
		$file_sementara = $_FILES['image' ]['tmp_name'];
		$max_size = 30000000; //dalam bytes
		$ekstensi_file=substr(strtolower(strchr($img,".")),1);

			$cons="chsNews";
			$acak=rand(1,999);
			$filterString=str_replace(" ", "", $img);
			$potong=substr($filterString,0,7);
			$gambar=$cons.$acak.$potong.".".$ekstensi_file;
		
		$vfile_upload=$dir . $gambar;
		$rename=$dir.$gambar;

			if($img !=''){
				if((in_array($tipe, $tipe_gambar))&&($ukuran <= $max_size)){
					move_uploaded_file($file_sementara, $vfile_upload);
					if($act=='addNews'){
						$q=mysql_query('INSERT INTO news (image,judul,judul_seo,desk,tgl,penulis) 
	  					values("'.$gambar.'","'.$judul.'","'.$seo_title.'","'.$desc.'","'.$date.'","'.$penulis.'")') or die("".mysql_error());
						header("location:news-3.html");
					}else if($act=='editNews'){
	  					$id=$_POST['id'];
	  					$query=autoLoad("news","no","$id");
						$image=$query['image'];
						$target="../../../../img/news/$image";
	  					$q=mysql_query("update news set image='$gambar',judul='$judul',judul_seo='$seo_title',desk='$desc',tgl='$date',penulis='$penulis' where no='$id'");	
	  					unlink($target);
	  					header("location:news-2.html");
	  				}
				}else{
					header("location:news-8.html");	
				}
			}else if(($act=='editNews')&&($gambar=='')){
				$id=$_POST['id'];
	  			$q=mysql_query("update news set judul='$judul',judul_seo='$seo_title',desk='$desc',tgl='$date',penulis='$penulis' where no='$id'");	
	 			header("location:news-2.html");
	 		}else if ($gambar == "" && $ukuran <= 0 && $error !== 0 && $act !=='editNews'){
				exit("<script>alert('Periksa kembali file gambar anda!'); window.history.back(); </script>");

			}else if($ukuran>$max_size){
				exit("<script>alert('Gambar yang anda upload max 5mb'); window.history.back(); </script>");			
			}
	}else if($act=='deleteNews'){
		$id=$_GET['id'];
		$query=autoLoad("news","no","$id");
		$image=$query['image'];
		$target="../../../../img/news/$image";
		$q=mysql_query("delete from news where no='$id'");
		unlink($target);
		header("location:news-1.html");
	}else if(($act=='addComment')||($act=='blsComment2')||($act=='deleteBlsComment')||($act=='deleteComment')){
		$id=$_POST['idNews'];
		$nama="Abdul Hamid";
		$email="abdulhamid.dev@gmail.com";
		$komentar=anti_injection($_POST['comment']);
		//$date=date('Y-m-d');
		$user="a";
		if($act=='addComment'){
			$qComment=mysql_query("insert into comment (nama,email,komentar,tgl,id_news,user)
							values('".$nama."','".$email."','".$komentar."',now(),'".$id."','".$user."')");
		header("location:viewComments-$id-11.html");
		}else if($act=='blsComment2'){
			$idComment=$_POST['id'];
			$qBls=mysql_query("insert into bls_comment (id_comment,nama,email,komentar,tgl,user)
							values('".$idComment."','".$nama."','".$email."','".$komentar."',now(),'".$user."')");
		header("location:viewComments-$id-10.html");
		}else if($act=='deleteBlsComment'){
			$idBlsComment=$_GET['id'];
			$qdelComment=mysql_query("delete from bls_comment where no='$idBlsComment'");
		header("location:viewComments-$id-9.html");
		}else if($act=='deleteComment'){
			$idComment2=$_GET['id'];
			$qdelBlsComment=mysql_query("delete from bls_comment where id_comment='$idComment2'");
			$qdelComment=mysql_query("delete from comment where no='$idComment2'");
		header("location:viewComments-$id-9.html");
		}


	}
?>