<?php
$id=$_GET['id'];
 //Define relative path from this script to mPDF
 $nama_file='Laporan Pendapatan'; //Beri nama file PDF hasil.
define('_MPDF_PATH','../../mpdf/');
//define("_JPGRAPH_PATH", '../mpdf60/graph_cache/src/');

//define("_JPGRAPH_PATH", '../jpgraph/src/'); 
 
include(_MPDF_PATH . "mpdf.php");
//include(_MPDF_PATH . "graph.php");

//include(_MPDF_PATH . "graph_cache/src/");

$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
 
//Beginning Buffer to save PHP variables and HTML tags
ob_start(); 

$mpdf->useGraphs = true;

?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Order</title>
    <style type="text/css">
         table.data
        {
            border-left: 1px solid #fff;
            border-top: 1px solid #fff;
            font-family: times new roman;
            font-size: 12px; 
            border-spacing:0;
            border-collapse: collapse;
            width: 100%; 
             
        }
         
        table.data td,th
        {
            border: 1px solid #cecece;
            padding: 2mm;
            
        }
        table.top tr td{
          vertical-align:middle;
          text-align:center;
          letter-spacing:3px;
        }
    </style>
</head>
<body>

<div id="wrapper">
    <div id="content">
         <?php
include "../../../config/koneksi.php";
include "../../../config/fungsi_indotgl.php";
include "../../../config/fungsi_rupiah.php";
$tglAwal=$_POST['awal'];
$tglAkhir=$_POST['akhir'];

$tglDbAwal=tgl_default($tglAwal);
$tglDbAkhir=tgl_default($tglAkhir);

$detOrder = mysql_query("SELECT * FROM orders,kustomer,departemen WHERE orders.id_kustomer=kustomer.id_kustomer AND orders.id_departemen=departemen.id AND id_orders='".$id."'");
$r=mysql_fetch_assoc($detOrder);
$qKustomer=mysql_query("select * from kustomer where id_kustomer='".$r['id_kustomer']."'");
$rCust=mysql_fetch_assoc($qKustomer);

$tgl=tgl_indo($r['tgl_order']);

?>
        <div id="invoice_body">
            <table class="top" align="left" style="padding-bottom:10px;" border="0" width="100%">
  <tr>
  <td style="text-align:left;"><img src="../../img/logo.png" width="150px" height="50px" alt="Gambar Logo"></td>
  <td><h3 align="center">LAPORAN PENDAPATAN PERPERIODE<br/>
                        PT.CAHAYA SLIPPER</h3></td>
  </tr>
</table>
<hr/>
<h3 align="center">DATA PENDAPATAN</h3>
            <div class="row-fluid">
              <div class="span12">
                <table class="data table table-bordered">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>Month</th>
                      <th>Transaction</th>
                      <th>Product Saled</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
              $sql2=mysql_query("select p.nama_produk,od.jumlah,p.harga from orders_detail od
                                join produk p on p.no=od.id_produk AND od.id_orders='".$id."'") or die("".mysql_error()); 
            $total=0;
            while($rproduk=mysql_fetch_assoc($sql2)){
              $amount=$rproduk['harga']*$rproduk['jumlah'];
              $tglIndo=tgl_indo($r['tgl_order']);
              $total=$total+$amount;
          ?>

                <tr class="gradeA">
                  <td><?php echo $rproduk['nama_produk']; ?></td> 
                  <td><?php echo $rproduk['jumlah'] ?></td>
                  <td>Unit</td>
                  <td><?php echo format_rupiah($rproduk['harga']) ?></td>                 
                  <td><strong><?php echo format_rupiah($amount) ?></strong></td>
                </tr>
          <?php
            }
          ?>
                <tr>
                  <td colspan="4" style="text-align:right; font-weight:bold;" >TOTAL Rp :</td>
                  <td><strong><?php echo format_rupiah($total); ?></strong></td>
                </tr>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
</div>
     <?php

$html = ob_get_contents(); //Proses untuk mengambil data
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
// LOAD a stylesheet
$stylesheet = file_get_contents('mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);    // The parameter 1 tells that this is css/style only and no body/html/text

$mpdf->WriteHTML($html,1);

$mpdf->Output($nama_file."-".$id.".pdf" ,'I');

exit; ?>
</body>
</html>