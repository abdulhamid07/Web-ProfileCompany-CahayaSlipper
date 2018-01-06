<?php
	include "koneksi.php";
	function viewAutoLoad($param1,$param2){
		$q=mysql_query("select * from $param1 order by $param2");
		return $q;
	}
	function loadSubMenu(){
		$q=mysql_query("select s.no as sno,s.kd_main,s.nmSub_menu,s.link,m.menu from sub_menu s,main_menu m where s.kd_main=m.no");
		return $q;
	}
	function autoLoad($namaTable,$param1,$param2){
		$q=mysql_query("select * from $namaTable where $param1=$param2 limit 0,1");
		$r=mysql_fetch_assoc($q);
		return $r;
	}
	function loadBlsEmail($param){
		$qlc=mysql_query("select be.no as be_no, be.id_pesan, be.subjek as be_subjek, be.pesan as be_pesan,be.tgl as be_tgl,
             p.no as p_no, p.nama as p_nama, p.email as p_email from bls_email be, pesan p
             where be.id_pesan=p.no AND p.no='$param'");
        $dlc=mysql_fetch_assoc($qlc);
      return $dlc;
	}
	function loadCountBalasan($param1){
		$qp=mysql_query("select * from bls_email be,pesan p where be.id_pesan=p.no AND be.id_pesan='$param1' AND p.status='R'");
		return $qp;
	}


?>