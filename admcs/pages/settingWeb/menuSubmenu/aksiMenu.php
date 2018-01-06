<?php
	error_reporting();
	include "../../../../config/koneksi.php";
	include "../../../../config/anti_injection.php";
	$act=$_GET['act'];

	if(($act=='addMain')||($act=='addSub')||($act=='editMain')||($act=='editSub')){
		//tambah main dan sub
		$menu=anti_injection($_POST['menu']);
		$link=anti_injection($_POST['link']);

			if(($act=='addSub')||($act=='editSub')){
				$main=anti_injection($_POST['main']);

					if($act=='editSub'){
						$id=$_POST['no'];
						$q=mysql_query("update sub_menu set kd_main='$main',nmSub_menu='$menu',link='$link' where no='$id'");
						header("location:menu-2.html");

					}else if($act=='addSub'){
						$q=mysql_query("insert into sub_menu(kd_main,nmSub_menu,link) values('".$main."','".$menu."','".$link."')");
						header("location:menu-3.html");

					}
			}else if(($act=='addMain')||($act=='editMain')){
				$akt=anti_injection($_POST['aktif']);

					if($act=='addMain'){
						$q=mysql_query("insert into main_menu(menu,aktif,link) values('".$menu."','".$akt."','".$link."')");
						header("location:menu-3.html");

					}else if($act=='editMain'){
						$id=$_POST['no'];
						$q=mysql_query("update main_menu set menu='$menu',aktif='$akt',link='$link' where no='$id'");
						header("location:menu-2.html");

					}
			}
	}else if(($act=='aktifMain')||($act=='deleteMain')||($act=='deleteSub')){
		$id=$_GET['id'];

			if($act=='aktifMain'){
				$st=$_GET['st'];
				if($st=='y'){
				$q=mysql_query("update main_menu set aktif='n' where no='$id'");
				}else{
				$q=mysql_query("update main_menu set aktif='y' where no='$id'");	
				}
				header("location:menu-2.html");

			}else if($act=='deleteMain'){
				$q=mysql_query("delete from main_menu where no='$id'");
				header("location:menu-1.html");

			}else if($act=='deleteSub'){
				$q=mysql_query("delete from sub_menu where no='$id'");
				header("location:menu-1.html");
			}
	}

?>