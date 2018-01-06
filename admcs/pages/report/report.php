<?php
$id=$_POST['awal'];
 //Define relative path from this script to mPDF
 $nama_file='Laporan Penjualan'; //Beri nama file PDF hasil.
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
        th{
          background-color: #dedede;
        }
        .no{
          text-align: center;
        }
        table.top tr td.title{
          vertical-align:middle;
          text-align:center;
          letter-spacing:3px;
          width: 70%;
        }
        table.footer{
          font-size:10px;
          font-family: courier;
          width: 100%;
        }
        table.footer tr td.tdfoot{
          font-weight: bold;
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
include "../../../config/query.php";

$tglAwal=$_POST['awal'];
$tglAkhir=$_POST['akhir'];
$status=$_POST['status'];

$tglDbAwal=tgl_default($tglAwal);
$tglDbAkhir=tgl_default($tglAkhir);

?>
        <div id="invoice_body">
            <table class="top" align="left" style="padding-bottom:10px;" border="0" width="100%">
  <tr>
  <td style="text-align:left; width:15%;"><img src="../../img/logo.png" width="150px" height="50px" alt="Gambar Logo"></td>
  <td class="title"><h3>LAPORAN PENJUALAN PRODUK<br/>
                        PT.CAHAYA SLIPPER</h3></td>
  </tr>
</table>
<hr/>

<h3 align="center">DATA PRODUK</h3>
            <div class="row-fluid">
              <div class="span12">
                <table class="data table table-bordered">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>Date</th>
                      <th>Product Name</th>
                      <th>QTY</th>
                      <th width="5%">Price Unit</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
              $sql2=mysql_query("select o.tgl_order,p.nama_produk,od.jumlah,p.harga from orders_detail od
                                join produk p on p.no=od.id_produk join orders o on o.id_orders=od.id_orders where status_order='".$status."' and o.tgl_order between '".$tglDbAwal."' and '".$tglDbAkhir."'") or die("".mysql_error()); 
            
            $offset=1;
            $result=mysql_num_rows($sql2);
              if($result==0){
                  echo "<tr>
                        <td colspan='6' align='center'>Tidak Ada Data Dengan Status Order $status</td>
                        </tr>";
              }else{
            while($rproduk=mysql_fetch_assoc($sql2)){
              $amount=$rproduk['harga']*$rproduk['jumlah'];
              $tglIndo=tgl_indo($rproduk['tgl_order']);
              $qspan=mysql_query("select * from orders o,orders_detail od where status_order='".$status."' and tgl_order='".$rproduk['tgl_order']."' and od.id_orders=o.id_orders");
              $span=mysql_num_rows($qspan);
              $total=$total+$amount;
          ?>

                <tr class="gradeA">
          <?php
              if($tgl==$tglIndo){
                $tgl='';
              }else{
                $tgl=$tglIndo;
              
              
          ?>      
                  <td <?php if($tgl==$tglIndo){ echo "rowspan=$span"; } else{ } ?> class="no"><?php if($tgl==$tglIndo){ echo $offset; $offset++; }else{ echo ''; } ?></td>
                  <td <?php if($tgl==$tglIndo){ echo "rowspan=$span"; } else{ } ?>><?php echo $tgl ?></td>
              <?php } ?>
                  <td><?php echo $rproduk['nama_produk']; ?></td> 
                  <td class="no"><?php echo $rproduk['jumlah'] ?></td>
                  <td><?php echo format_rupiah($rproduk['harga']).',-' ?></td>
                  <td><strong><?php echo format_rupiah($amount).',-' ?></strong></td>
                </tr>
          <?php
              $tgl=$tglIndo;
              $qty+=$rproduk['jumlah'];
            }
          ?>
                <tr>
                  <td colspan="3" style="text-align:right; font-weight:bold;" >TOTAL </td>
                  <td class="no"><?php echo $qty ?></td>
                  <td colspan="2"  align="right"><strong>Rp. <?php echo format_rupiah($total).',-'; ?></strong></td>
                </tr>
          <?php } ?>
                  </tbody>
                </table>
          <?php
            $transaksi=mysql_query("select * from orders where status_order='".$status."' order by id_orders");
            $produk=mysql_query("select distinct(id_produk) from orders_detail od,orders o where o.status_order='".$status."' and od.id_orders=o.id_orders");
            $dateDefault=date("Y-m-d");
          ?>    

              <p>
                <table class="footer">
                  <thead>
                  <tr>
                    <td colspan="3">KETERANGAN :</td>
                  </tr>
                  <tr>
                      <td width="15%">Periode</td>
                      <td width="1%">:</td>
                      <td class="tdfoot"><?php echo tgl_indo($tglDbAwal) .' - '. tgl_indo($tglDbAkhir) ?></td>
                    </tr>
                    <tr>
                      <td width="15%">Total Transaksi</td>
                      <td width="1%">:</td>
                      <td class="tdfoot"><?php echo mysql_num_rows($transaksi) ?> Kali Transaksi</td>
                    </tr>
                    <tr>
                      <td>Produk Terjual</td>
                      <td>:</td>
                      <td class="tdfoot"><?php echo mysql_num_rows($produk) ?> Kategori</td>
                    </tr>
                    <tr>
                      <td>Status Order</td>
                      <td>:</td>
                      <td class="tdfoot"><?php echo strtoupper($status) ?></td>
                    </tr>
                    <tr> 
                      <td>Dicetak Tanggal</td>
                      <td>:</td>
                      <td class="tdfoot"><?php echo tgl_indo($dateDefault) ?></td>
                    </tr>
                  </thead>
                </table>
                </p>
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