<?php
	error_reporting();
	include "../../../../config/koneksi.php";
	include "../../../../config/fungsi_seo.php";
	include "../../../../config/anti_injection.php";
	include "../../../../config/query.php";
	include "../../../../config/gambar.php";


	$act=$_GET['act'];

	if(($act=='addProduct')||($act=='editProduct')){
		$id=$_POST['no'];
		$tipe_gambar = array ( 'image/jpeg', 'image/bmp' , 'image/png' );

		$produk=anti_injection($_POST['produk']);
		$harga=anti_injection($_POST['harga']);
		$stok=anti_injection($_POST['stok']);
	  	$seo_title = seo_title($produk);
	  	$desc=$_POST['deskripsi'];
	  	$date=date('Y-m-d');
	  	//$penulis=$_SESSION['kd_user'];
	  	$Lfile1    = $_FILES['image1']['tmp_name'];
	    $tipe1      = $_FILES['image1']['type'];
	  	$NamaFile1      = $_FILES['image1']['name'];
	  	$ukuran1= $_FILES['image1']['size'];
	  	//IMAGE 2
	  	$Lfile2    = $_FILES['image2']['tmp_name'];
	  	$tipe2      = $_FILES['image2']['type'];
	  	$NamaFile2      = $_FILES['image2']['name'];
	  	$ukuran2= $_FILES['image2']['size']; 
	  	//IMAGE 3
	  	$Lfile3    = $_FILES['image3']['tmp_name'];
	  	$tipe3      = $_FILES['image3']['type'];
	  	$NamaFile3      = $_FILES['image3']['name'];
	  	$ukuran3= $_FILES['image3']['size'];    

		$max_size = 30000000; //dalam bytes
		$ekstensi_file1=substr(strtolower(strchr($NamaFile1,".")),1);
		$ekstensi_file2=substr(strtolower(strchr($NamaFile2,".")),1);
		$ekstensi_file3=substr(strtolower(strchr($NamaFile3,".")),1);

			$cons="chsProduct";
			$acak=rand(1,999);
			$filterString1=str_replace(" ", "", $NamaFile1);
			$filterString2=str_replace(" ", "", $NamaFile2);
			$filterString3=str_replace(" ", "", $NamaFile3);
			
			$potong1=substr($filterString1,0,5);
			$potong2=substr($filterString2,0,5);
			$potong3=substr($filterString3,0,5);
			
			$gambar1=$cons.$acak.$potong1.".".$ekstensi_file1;
			$gambar2=$cons.$acak.$potong2.".".$ekstensi_file2;
			$gambar3=$cons.$acak.$potong3.".".$ekstensi_file3;

			if($act=='editProduct'){	
				$query=autoLoad("produk","no","$id");
				$image1=$query['gambar1'];
				$image2=$query['gambar2'];
				$image3=$query['gambar3'];
				$target1="../../../../img/product/small_$image1";
				$target11="../../../../img/product/big_$image1";
				$target2="../../../../img/product/small_$image2";
				$target22="../../../../img/product/big_$image2";
				$target3="../../../../img/product/small_$image3";
				$target33="../../../../img/product/big_$image3";
			}

				if(($NamaFile1!='')&&($NamaFile2=='')&&($NamaFile3=='')){
					if($act=='editProduct'){
						$gambar2=$_POST['img2'];
						$gambar3=$_POST['img3'];
						if($_POST['img1']!=''){
							unlink($target1);
							unlink($target11);
						}
					}else{
						$gambar2=" ";
						$gambar3=" ";
					}
					if((in_array($tipe1, $tipe_gambar))&&($ukuran1 <= $max_size)){
						
						gambar($gambar1);
					}else{
						header("location:product-8.html");
					}
				}else if(($NamaFile1=='')&&($NamaFile2!='')&&($NamaFile3=='')){
					if($act=='editProduct'){
						$gambar1=$_POST['img1'];
						$gambar3=$_POST['img3'];
						if($_POST['img2']!=''){
							unlink($target2);
							unlink($target22);
						}
					}else{
						$gambar1=" ";
						$gambar3=" ";
					}
					if((in_array($tipe2, $tipe_gambar))&&($ukuran2 <= $max_size)){
						gambar2($gambar2);
					}else{
						header("location:product-8.html");
					}

				}else if(($NamaFile1=='')&&($NamaFile2=='')&&($NamaFile3!='')){
					if($act=='editProduct'){
						$gambar1=$_POST['img1'];
						$gambar2=$_POST['img2'];
						if($_POST['img3']!=''){
							unlink($target3);
							unlink($target33);
						}
					}else{
						$gambar1=" ";
						$gambar2=" ";
					}
					if((in_array($tipe3, $tipe_gambar))&&($ukuran3 <= $max_size)){
						gambar3($gambar3);
					}else{
						header("location:product-8.html");
					}
				}else if(($NamaFile1!='')&&($NamaFile2!='')&&($NamaFile3=='')){
					if($act=='editProduct'){
						$gambar3=$_POST['img3'];
						if(($_POST['img1']!='')&&($_POST['img2']=='')){
							unlink($target1);
							unlink($target11);
						}else if(($_POST['img1']=='')&&($_POST['img2']!='')){
							unlink($target2);
							unlink($target22);
						}else if(($_POST['img1']!='')&&($_POST['img1']!='')){
							unlink($target1);
							unlink($target11);
							unlink($target2);
							unlink($target22);
						}else{

						}
					}else{
						$gambar3=" ";
					}
					if((in_array($tipe1, $tipe_gambar))&&($ukuran1 <= $max_size)){
						if((in_array($tipe2, $tipe_gambar))&&($ukuran2 <= $max_size)){
							gambar($gambar1);
							gambar2($gambar2);
						}else{
						header("location:product-8.html");
						}
					}else{
						header("location:product-8.html");
					}

				}else if(($NamaFile1!='')&&($NamaFile2=='')&&($NamaFile3!='')){
					if($act=='editProduct'){
						$gambar2=$_POST['img2'];
						if(($_POST['img1']!='')&&($_POST['img3']=='')){
							unlink($target1);
							unlink($target11);
						}else if(($_POST['img1']=='')&&($_POST['img3']!='')){
							unlink($target3);
							unlink($target33);
						}else if(($_POST['img1']!='')&&($_POST['img3']!='')){
							unlink($target1);
							unlink($target11);
							unlink($target3);
							unlink($target33);
						}else{

						}
					}else{
						$gambar2=" ";
					}
					if((in_array($tipe1, $tipe_gambar))&&($ukuran1 <= $max_size)){
						if((in_array($tipe3, $tipe_gambar))&&($ukuran3 <= $max_size)){
							gambar($gambar1);
							gambar3($gambar3);
						}else{
						header("location:product-8.html");
						}
					}else{
						header("location:product-8.html");
					}

				}else if(($NamaFile1=='')&&($NamaFile2!='')&&($NamaFile3!='')){
					if($act=='editProduct'){
						$gambar1=$_POST['img1'];
						if(($_POST['img2']!='')&&($_POST['img3']=='')){
							unlink($target2);
							unlink($target22);
						}else if(($_POST['img2']=='')&&($_POST['img3']!='')){
							unlink($target3);
							unlink($target33);
						}else if(($_POST['img2']!='')&&($_POST['img3']!='')){
							unlink($target2);
							unlink($target22);
							unlink($target3);
							unlink($target33);
						}
					}else{
						$gambar1=" ";
					}
					if((in_array($tipe2, $tipe_gambar))&&($ukuran2 <= $max_size)){
						if((in_array($tipe3, $tipe_gambar))&&($ukuran3 <= $max_size)){
							gambar2($gambar2);
							gambar3($gambar3);
						}else{
						header("location:product-8.html");
						}
					}else{
						header("location:product-8.html");
					}

				}else if(($NamaFile1!='')&&($NamaFile2!='')&&($NamaFile3!='')){
					if((in_array($tipe1, $tipe_gambar))&&($ukuran1 <= $max_size)){
						if((in_array($tipe2, $tipe_gambar))&&($ukuran2 <= $max_size)){
							if((in_array($tipe3, $tipe_gambar))&&($ukuran3 <= $max_size)){
								gambar($gambar1);
								gambar2($gambar2);
								gambar3($gambar3);
								if(($_POST['img1']!='')&&($_POST['img2']=='')&&($_POST['img3']=='')){
									unlink($target1);
									unlink($target11);
								}else if(($_POST['img1']=='')&&($_POST['img2']!='')&&($_POST['img3']=='')){
									unlink($target2);
									unlink($target22);
								}else if(($_POST['img1']=='')&&($_POST['img2']=='')&&($_POST['img3']!='')){
									unlink($target3);
									unlink($target33);	
								}else if(($_POST['img1']!='')&&($_POST['img2']!='')&&($_POST['img3']=='')){
									unlink($target1);
									unlink($target11);
									unlink($target2);
									unlink($target22);
								}else if(($_POST['img1']!='')&&($_POST['img2']=='')&&($_POST['img3']!='')){
									unlink($target1);
									unlink($target11);
									unlink($target3);
									unlink($target33);
								}else if(($_POST['img1']=='')&&($_POST['img2']!='')&&($_POST['img3']!='')){
									unlink($target2);
									unlink($target22);
									unlink($target3);
									unlink($target33);
								}else if(($_POST['img1']!='')&&($_POST['img2']!='')&&($_POST['img3']!='')){
									unlink($target1);
									unlink($target11);
									unlink($target2);
									unlink($target22);
									unlink($target3);
									unlink($target33);
								}else{

								}

							}else{
							header("location:product-8.html");
							}
						}else{
							header("location:product-8.html");
						}
					}else{
						header("location:product-8.html");
					}	
				}else if(($NamaFile1=='')&&($NamaFile2=='')&&($NamaFile3=='')){
					$gambar1=$_POST['img1'];
					$gambar2=$_POST['img2'];
					$gambar3=$_POST['img3'];
				}

			if($act=='addProduct'){
				$id_produk=$_POST['id'];
				$q=mysql_query('INSERT INTO produk (id_produk,nama_produk,produk_seo,deskripsi,harga,stok,tgl_masuk,gambar1,gambar2,gambar3) 
	  			values("'.$id_produk.'","'.$produk.'","'.$seo_title.'","'.$desc.'","'.$harga.'","'.$stok.'","'.$date.'","'.$gambar1.'","'.$gambar2.'","'.$gambar3.'")') or die("".mysql_error());
				if($q){
					header("location:product-3.html");
				}else{
					header("location:product-6.html");
				}
			}else if($act=='editProduct'){
				$id=$_POST['no'];
				$q=mysql_query("update produk set nama_produk='$produk',produk_seo='$seo_title',deskripsi='$desc',harga='$harga',stok='$stok',tgl_masuk='$date',gambar1='$gambar1',gambar2='$gambar2',gambar3='$gambar3'
								where no='$id'") or die("".mysql_error());
				
				if($q){
					header("location:product-2.html");
				}else{
					header("location:product-5.html");
				}

			}
			
	}else if($act=='deleteProduct'){
		$id=$_GET['id'];
		$query=autoLoad("produk","no","$id");
		$image1=$query['gambar1'];
		$image2=$query['gambar2'];
		$image3=$query['gambar3'];
		$target1="../../../../img/product/small_$image1";
		$target11="../../../../img/product/big_$image1";
		$target2="../../../../img/product/small_$image2";
		$target22="../../../../img/product/big_$image2";
		$target3="../../../../img/product/small_$image3";
		$target33="../../../../img/product/big_$image3";
		$q=mysql_query("delete from produk where no='$id'");
		unlink($target1);
		unlink($target11);
		unlink($target2);
		unlink($target22);
		unlink($target3);
		unlink($target33);
		header("location:product-1.html");
	}else if($act=='updateService'){
		$id=$_POST['no'];
		$title=anti_injection($_POST['judul']);
		$ket=$_POST['ket'];

		$qServ=mysql_query("update services set judul='$title',ket='$ket' where no='$id'");
		if($qServ){
					header("location:product-2.html");
				}else{
					header("location:product-5.html");
				}	
	}else if($act=='activeService'){
		$id=$_GET['id'];
		$st=$_GET['st'];
			if($st=='y'){
				$q=mysql_query("update services set aktif='n' where no='$id'") or die ("".mysql_error());
			}else{
				$q=mysql_query("update services set aktif='y' where no='$id'")  or die ("".mysql_error());;	
			}
				header("location:product-2.html");
	}
?>