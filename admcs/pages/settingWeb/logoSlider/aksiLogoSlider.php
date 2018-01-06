<?php
error_reporting();
include "../../../../config/koneksi.php";
include "../../../../config/anti_injection.php";
include "../../../../config/query.php";

$act=$_GET['act'];

	if(($act=='editLogo')||($act=='editSlider')){
		$id=$_POST['id'];
	}else if(($act=='deletelogo')||($act=='deleteSlider')||($act=='aktiflogo')){
		$id=$_GET['id'];
	}

	if(($act=='inputlogo') || ($act=='editLogo')){
		$title = anti_injection($_POST['judul']);
		$aktif = anti_injection($_POST['aktif']);
	}else if(($act=='inputslider') || ($act=='editSlider')){
		$ket   = anti_injection($_POST['ket']);
	}

if(($act=='inputlogo')||($act=='inputslider')||($act=='editLogo')||($act=='editSlider')){
$dir="../../../../img/logo/";
$tipe_gambar = array ( 'image/jpeg', 'image/bmp' , 'image/png' );
$img = $_FILES ['image']['name'];
$ukuran = $_FILES ['image']['size'];
$tipe = $_FILES ['image']['type'];
$error = $_FILES ['image']['error'];
$max_size = 3000000; //dalam bytes
$file_sementara = $_FILES['image' ]['tmp_name'];

$ekstensi_file=substr(strtolower(strchr($img,".")),1);

			$cons="chsLogoSlider";
			$acak=rand(1,999);
			$filterString=str_replace(" ", "", $img);
			$potong=substr($filterString,0,7);
			$gambar=$cons.$acak.$potong.".".$ekstensi_file;
		
		$vfile_upload=$dir . $gambar;
		$rename=$dir.$gambar;

	if($img !=''){
		if((in_array($tipe, $tipe_gambar))&&($ukuran <= $max_size)){

			if($act=='inputlogo'){

				move_uploaded_file($file_sementara, $vfile_upload);
				$addlogo = mysql_query('INSERT INTO logo (title,image,aktif) values("'.$title.'","'.$gambar.'","'.$aktif.'")');
				header("location:logoslider-3.html");

			}elseif($act=='inputslider'){
				move_uploaded_file($file_sementara, "../../../../img/slider/$gambar");
				$addlogo = mysql_query('INSERT INTO slider (kSlide,image) values("'.$ket.'","'.$gambar.'")');
				header("location:logoslider-3.html");
			}else if($act=='editLogo'){
				move_uploaded_file($file_sementara, "../../../../img/logo/$gambar");
				$query=autoLoad("logo","id_logo","$id");
				$image=$query['image'];
				$target="../../../../img/logo/$image";
				unlink($target);
				$editLogo=mysql_query("update logo set title='".$title."', image='".$gambar."',aktif='".$aktif."' where id_logo='$id'");
				header("location:logoslider-2.html");
			}else if($act=='editSlider'){
				move_uploaded_file($file_sementara, "../../../../img/slider/$gambar");
				$query=autoLoad("slider","no","$id");
				$image=$query['image'];
				$target="../../../../img/slider/$image";
				unlink($target);
				$editSlider=mysql_query("update slider set kSlide='".$ket."', image='".$gambar."' where no='$id'");
				header("location:logoslider-2.html");
			}
		}else{
				header("location:about-8.html");	
			}

	}else{

		if($act=='editLogo'){
			$editLogo=mysql_query("update logo set title='".$title."', aktif='".$aktif."' where id_logo='$id'");
			header("location:logoslider-2.html");
		}else if($act=='editSlider'){
			$editLogo=mysql_query("update slider set kSlide='".$ket."' where no='$id'");
			header("location:logoslider-2.html");
		}
	}

}elseif ($act=='aktiflogo') {
	$update = mysql_query("UPDATE logo set aktif='y' where id_logo='$id'");
	$update = mysql_query("UPDATE logo set aktif='n' where id_logo!='$id'");
	header("location:logoslider-2.html");

}elseif ($act=='deletelogo') {
	$query=autoLoad("logo","id_logo","$id");
	$image=$query['image'];
	$target="../../../../img/logo/$image";
	$deletelogo = mysql_query("DELETE FROM logo where id_logo='$id'");
	unlink($target);
	header("location:logoslider-1.html");
}elseif ($act=='deleteSlider') {
	$query=autoLoad("slider","no","$id");
	$image=$query['image'];
	$target="../../../../img/slider/$image";
	$deleteSlider = mysql_query("DELETE FROM slider where no='$id'");
	unlink($target);
	header("location:logoslider-1.html");

}elseif ($act=='aktiftema') {
	$id=$_GET['id'];
	$update = mysql_query("UPDATE theme_obaju set status='y' where no='$id'");
	$update = mysql_query("UPDATE theme_obaju set status='t' where no!='$id'");
	header("location:../../media.php?module=tampilweb&err=2");
}

	?>