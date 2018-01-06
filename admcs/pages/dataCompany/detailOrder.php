<?php

$id=$_GET['id'];

$detOrder = mysql_query("SELECT * FROM orders,kustomer,departemen WHERE orders.id_kustomer=kustomer.id_kustomer AND orders.id_departemen=departemen.id AND id_orders='$id'");
$r=mysql_fetch_assoc($detOrder);
$qKustomer=mysql_query("select * from kustomer where id_kustomer='$id'");
$rCust=mysql_fetch_assoc($qKustomer);

$tgl=tgl_indo($r['tgl_order']);
?>
<div id="content-header">
  <div id="breadcrumb">
      <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a href="news.html" title="Go to" class="tip-bottom">Orders</a>
  </div>
</div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
         	<div class="widget-title">
          		<span class="icon"> <i class="icon icon-list-alt"></i> Detail Order</span>

         	</div>
         	<div class="widget-content">
          <div class="row-fluid">
          <div class="span12">
          <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <div class="control-label">No Order :</div>
                      <div class="controls">
                        <input type="hidden" name="no" value="<?php echo $id; ?>"/>
                        <input type="text" name="id" class="span11" readonly="readonly" value="<?php echo $id ?>"/>
                      </div>
                  </div>
                  </div>
                  <div class="span6">
                  <div class="control-group">
                    <div class="control-label">Customer Name :</div>
                      <div class="controls">
                      <input type="text" readonly="readonly" class="span11" value="<?php echo strtoupper($rCust['nama_lengkap']) ?>">
                      </div>
                  </div>
                  </div>
               
          </div>
  				<div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <div class="control-label">Date Time :</div>
                      <div class="controls">
                      <input type="text" readonly="readonly" class="span11" value="<?php echo $tgl.$r['jam_order'] ?>">
                      </div>
                  </div>
                  </div>
                  <div class="span6">
                  <div class="control-group">
                    <div class="control-label">Delivery Address :</div>
                      <div class="controls">
                        <input type="text" name="alamat" class="span11" readonly="readonly" value="<?php echo ucwords($r['alamat_pengiriman']) ?>">
                      </div>
                  </div>
                  </div>
                
          </div>
          <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <div class="control-label">Status Order :</div>
                      <div class="controls">
<?php
    if ($r['status_order']=='Proses'){
        $pilihan_status = array('Proses', 'Lunas');
    }
    elseif ($r['status_order']=='Lunas'){
        $pilihan_status = array('Lunas', 'Batal');    
    }
    else{
        $pilihan_status = array('Proses', 'Lunas', 'Batal');    
    }

    $pilihan_order = '';
    foreach ($pilihan_status as $status) {
     $pilihan_order .= "<option value=$status"; //<option value='Proses' selected>
                                                //<option valu='Lunas'     >
     if ($status == $r['status_order']) {
        $pilihan_order .= " selected";
     }
     $pilihan_order .= ">$status</option>\r\n";
    }
?>
                      <form name="editStatus" method="post" action="actOrder-change.html">
                      <input type="hidden" name="id" value="<?php echo $id ?>"/>
                      <select name="status_order"><?php echo $pilihan_order ?></select><input type="submit" class="btn btn-mini btn-primary" value="Change Status"/> 
                      </form>
                      </div>
                  </div>
                  </div>
                  <div class="span6">
                  <div class="control-group">
                    <div class="control-label">Telephone :</div>
                      <div class="controls">
                      <input type="text" name="telpon" class="span11" readonly="readonly" value="<?php echo $rCust['telpon'] ?>">
                      </div>
                  </div>
                  </div>
                
          </div>
          <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <div class="control-label">Department :</div>
                      <div class="controls">
                        <input type="text" name="department" class="span11" readonly="readonly" value="<?php echo strtoupper($r['departemen']) ?>">
                      </div>
                  </div>
                  </div>
                  <div class="span6">
                  <div class="control-group">
                    <div class="control-label">Customer E-mail :</div>
                      <div class="controls">
                        <input type="text" name="alamat" class="span11" readonly="readonly" value="<?php echo $rCust['email'] ?>">
                      </div>
                  </div>
                  </div>
                
          </div>
        </div>
  </div>


  </div></div>
</div>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Purchase Order</h5>
        </div>
        <div class="widget-content">
          <div class="control-group">
              <div class="controls">
                   <table class="table table-bordered" style="color:black;">
              <thead>
                <tr>
                  <th><a href="#"><i class="icon icon-sort"></i> Product Name</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> QTY</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Unit</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Price Unit</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Amount</a></th>
                </tr>
              </thead>
              <tbody>
         <?php
              $sql2=mysql_query("select p.nama_produk,od.jumlah,p.harga from orders_detail od
                                join produk p on p.no=od.id_produk AND od.id_orders='$id'") or die("".mysql_error()); 
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
                  <td><?php echo format_rupiah($amount) ?></td>
                </tr>
          <?php
            }
          ?>
                <tr>
                  <td colspan="4" style="text-align:right; font-weight:bold;" >TOTAL Rp :</td>
                  <td><?php echo format_rupiah($total); ?></td>
                </tr>
              </tbody>
            </table>
              </div>
          </div>
                      <a href="orders.html" class="btn btn-default"><i class="icon icon-arrow-left"></i> Back To Orders</a></button>
                      <a href="order-<?php echo $id ?>-pdf.html" onSubmit="document.getElementById('bodydata').value=encodeURIComponent(document.body.innerHTML);" target="new" class="btn btn-success"><i class="icon icon-file"></i> Get PDF</a></button>

        </div>
      </div>
</div>


