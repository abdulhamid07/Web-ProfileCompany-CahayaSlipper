<?php
  //echo error_reporting(0);
  include "../config/koneksi.php";
  $qProduk=viewAutoLoad("produk","no");
  $rProduk=mysql_num_rows($qProduk);
  $qOrder=viewAutoLoad("orders","id_orders");
  $rOrder=mysql_num_rows($qOrder);
  $qEmail=mysql_query("select * from pesan where status='D'");
  $rEmail=mysql_num_rows($qEmail);
  $qComment=mysql_query("select * from comment where status='D'");
  $rComment=mysql_num_rows($qComment);
?>

<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">

    <div class="quick-actions_homepage">

      <ul class="quick-actions">
        <li class="bg_lb"> <a href="addProduk.html"> <i class="icon-truck"></i> Add Product </a> </li>
        <li class="bg_lg span3"> <a href="orders.html"> <i class="icon-shopping-cart"></i> <span class="label label-important"><?php echo $rOrder; ?></span>Orders</a> </li>
        <li class="bg_ly"> <a href="#report" data-toggle="modal"> <i class="icon-paste"></i> Report </a> </li>
        <li class="bg_lo"> <a href="news.html"> <i class="icon-comments"></i><span class="label label-info"><?php echo $rComment; ?></span> New Comments</a> </li>
        <li class="bg_ls"> <a href="product-services.html"> <i class="icon-ok-sign"></i> Services</a> </li>
        <li class="bg_lo span3"> <a href="email.html"> <i class="icon-envelope"></i><span class="label label-info"><?php echo $rEmail; ?></span> New Email</a> </li>
        <li class="bg_ls"> <a href="about.html"> <i class="icon-info-sign"></i> About And Contact</a> </li>
        <li class="bg_lb"> <a href="email-testimoni.html"> <i class="icon-comment"></i>Testimoni</a> </li>
        <li class="bg_lr"> <a href="orders-customers.html"> <i class="icon-group"></i> Customers</a> </li>
        <li class="bg_lg"> <a href="../index.html" target="new"> <i class="icon-eye-open"></i> View Website</a> </li>

      </ul>
    </div>
<!--End-Action boxes-->

<!--Chart-box-->
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
          <h5>Site Analytics</h5>
        </div>
        <div class="widget-content" >
          <div class="row-fluid">
            <div class="span9" id="statistik">
              <div class="chart">
                <table width="100%" id="user" border="0" align="center" cellpadding="10">
    <tr bgcolor="#FF9900" style='display:none;'> <th>Bulan</th> <th>Pengunjung: </th></tr>
    <?php

    $qStat = mysql_query("select tanggal,count(*) as pengunjung from statistik group by substring(tanggal,6,2)") or die("Error pada".mysql_error());

    while ($data = mysql_fetch_assoc($qStat)) {
      $tgl=bulan_indo($data['tanggal']);
 echo "<tr bgcolor='#D5F35B' style='display:none;'>
              <td>$tgl</td>
              <td align='center'>$data[pengunjung]</td>
              </tr>";

      } ?>



</table>
              </div>
            </div>
            <?php
  $ip= $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
  $waktu   = time(); //

  // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini
  $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
  // Kalau belum ada, simpan data user tersebut ke database
  if(mysql_num_rows($s) == 0){
    mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
  }
  else{
    mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
  }

  $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
  $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0);
  $bataswaktu       = time() - 300;
  $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

  $qFixOrders=mysql_query("select * from orders where status_order='Lunas'");
  $qPendOrders=mysql_query("select * from orders where status_order='Proses'");
  $qTotKust=viewAutoLoad("kustomer","id_kustomer");
  $totalFixOrders=mysql_num_rows($qFixOrders);
  $totalPendOrders=mysql_num_rows($qPendOrders);
  $totalKustomer=mysql_num_rows($qTotKust);
?>
            <div class="span3">
              <ul class="site-stats">
                <li class="bg_lh"><i class="icon-user"></i> <strong><?php echo $totalpengunjung ?></strong> <small>Total Visitors</small></li>
                <li class="bg_lh"><i class="icon-globe"></i> <strong><?php echo $pengunjungonline ?></strong> <small>Online Visitors</small></li>
                <li class="bg_lh"><i class="icon-ok"></i> <strong><?php echo $totalFixOrders ?></strong> <small>Fix Orders</small></li>
                <li class="bg_lh"><i class="icon-repeat"></i> <strong><?php echo $totalPendOrders ?></strong> <small>Proses Orders</small></li>
                <li class="bg_lh"><i class="icon-group"></i> <strong><?php echo $totalKustomer ?></strong> <small>Total Customers </small></li>
                <li class="bg_lh"><i class="icon-truck"></i> <strong><?php echo $rProduk; ?></strong> <small>Total Products</small></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
<!--End-Chart-box-->
  </div>
