
<?php
 //Define relative path from this script to mPDF
 $nama_file='Laporan Pernomer Order'; //Beri nama file PDF hasil.
define('_MPDF_PATH','../../../mpdf60/');
//define("_JPGRAPH_PATH", '../mpdf60/graph_cache/src/');

//define("_JPGRAPH_PATH", '../jpgraph/src/'); 
 
include(_MPDF_PATH."mpdf.php");
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
    <title>MPDF Printout</title>
</head>
<body>
<?php
include "../../../../config/koneksi.php";
include "../../../../config/fungsi_indotgl.php";
$id=$_GET['id'];
$detOrder = mysql_query("SELECT * FROM orders,kustomer,departemen WHERE orders.id_kustomer=kustomer.id_kustomer AND orders.id_departemen=departemen.id AND id_orders='$id'");
$r=mysql_fetch_assoc($detOrder);
$qKustomer=mysql_query("select * from kustomer where id_kustomer='$id'");
$rCust=mysql_fetch_assoc($qKustomer);

$tgl=tgl_indo($r['tgl_order']);

?>
<table align="left" style="font-size:12px;" border="0" width="100%">
  <tr>
  <td style="text-align:left;"><img src="../../../img/logo.png" width="200px" height="60px" alt="Gambar Logo"></td>
  </tr>
</table>
<table border="0" width="100%">
  <tr>
    <td width="20%">Customer Name</td>
    <td>:</td>
    <td width="40%"<?php echo strtoupper($rCust['nama_lengkap']) ?>></td>
    <td width="20%">No Order</td>
    <td>:</td>
    <td width="17%"><?php echo $id ?></td>
  </tr>
  <tr>
    <td>Telphone</td>
    <td>:</td>
    <td><?php echo $rCust['telpon'] ?></td>
    <td>Date Of Order</td>
    <td>:</td>
    <td><?php echo $tgl; ?></td>
  </tr>
  <tr>
    <td>E-mail</td>
    <td>:</td>
    <td><?php echo $rCust['email'] ?></td>
    <td>Departemen</td>
    <td>:</td>
    <td><?php echo strtoupper($r['departemen']) ?></td>
  </tr>
  <tr>
    <td>Delivery Address</td>
    <td>:</td>
    <td><?php echo ucwords($r['alamat_pengiriman']) ?></td>
    <td>Term Of Payment</td>
    <td>:</td>
    <td>30 days</td>
  </tr>
</table>
<hr/>
<h2 align="center">PURCHASE ORDER</h2>
';
?>
</body>
</html>
<?php
$html = ob_get_contents(); //Proses untuk mengambil data
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
// LOAD a stylesheet
$stylesheet = file_get_contents('mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);    // The parameter 1 tells that this is css/style only and no body/html/text

$mpdf->WriteHTML($html,1);

$mpdf->Output($nama_file."-".$data['no_sj'].".pdf" ,'I');

 


exit; 

?>