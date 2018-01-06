<?php

  $module=$_GET['fModule'];
  if($module=='edit-produk'){
    $id=$_GET['id'];

    $r=autoLoad("produk","no","$id");
    $tgl=tgl_indo($r['tgl_masuk']);
  }
      //generate product code
    $q = mysql_query("select * from produk order by no desc limit 0,1");
    $d = mysql_fetch_array($q);
    $s = $d['no']+1;
    $date = date('dm');

?>
<div id="content-header">
  <div id="breadcrumb">
      <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a href="news.html" title="Go to" class="tip-bottom">Products And Services</a>
      <a href="#" title="Go to" class="tip-bottom"><?php if($module=='edit-produk'){ ?>Edit<?php }else { ?> Add<?php } ?> Product</a>
  </div>
</div>
  <div class="container-fluid">
<form method="post" action="actProduct-<?php if($module=='edit-produk'){ ?>editProduct<?php }else{ ?>addProduct<?php } ?>.html" id="number_validate" enctype="multipart/form-data">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
         	<div class="widget-title">
          		<span class="icon"> <i class="icon icon-list-alt"></i> <?php if($module=='edit-produk'){ ?>Edit<?php }else { ?>Add<?php } ?> Product</span><?php if($module=='edit-produk'){ ?><span class="icon"><code>Date Updated : <?php echo $tgl ?></code></span><span class="icon"><code>* Kosongkan gambar jika tidak ada perubahan</code></span><?php } ?>

         	</div>
         	<div class="widget-content">
          <div class="row-fluid">
          <div class="<?php if($module=='edit-produk'){ ?>span8<?php }else{ ?>span12 <?php } ?>">
          <div class="row-fluid">
                <div class="span8">
                  <div class="control-group">
                    <div class="control-label">Product Code :</div>
                      <div class="controls">
                        <input type="hidden" name="no" value="<?php echo $id; ?>"/>
                        <input type="text" name="id" class="span11" readonly="readonly" value="<?php if($module=='edit-produk'){ echo $r['id_produk']; } else { echo ("CHS$date$s"); }?>"/>
                      </div>
                  </div>
                  </div>
                  <div class="span4">
                  <div class="control-group">
                    <div class="control-label">Image 1 :</div>
                      <div class="controls">
                      <input type="hidden" name="img1" value="<?php echo $r['gambar1'] ?>">
                      <input type="file" name="image1"/>
                      </div>
                  </div>
                  </div>
               
          </div>
  				<div class="row-fluid">
                <div class="span8">
                  <div class="control-group">
                    <div class="control-label">Product Name* :</div>
                      <div class="controls">
                        <input type="text" name="produk" class="span11" required="" placeholder="Input product name .." value="<?php if($module=='edit-produk'){ echo $r['nama_produk']; } else {}?>"/>
                      </div>
                  </div>
                  </div>
                  <div class="span4">
                  <div class="control-group">
                    <div class="control-label">Image 2 :</div>
                      <div class="controls">
                      <input type="hidden" name="img2" value="<?php echo $r['gambar2'] ?>">
                      <input type="file" name="image2"/>
                      </div>
                  </div>
                  </div>
                
          </div>
          <div class="row-fluid">
                <div class="span8">
                  <div class="control-group">
                    <div class="control-label">Price* :</div>
                      <div class="controls">
                        <input type="text" name="harga" class="span11" required="" placeholder="Input Product price .." value="<?php if($module=='edit-produk'){ echo $r['harga']; }else{} ?>"/>
                      </div>
                  </div>
                  </div>
                  <div class="span4">
                  <div class="control-group">
                    <div class="control-label">Image 3 :</div>
                      <div class="controls">
                      <input type="hidden" name="img3" value="<?php echo $r['gambar3'] ?>">
                      <input type="file" name="image3"/>
                      </div>
                  </div>
                  </div>
                
          </div>
          <div class="row-fluid">
                <div class="span8">
                  <div class="control-group">
                    <div class="control-label">Stock* :</div>
                      <div class="controls">
                        <input type="text" name="stok" class="span11" required="" placeholder="Input product stock .." value="<?php if($module=='edit-produk'){ echo $r['stok']; }else{} ?>"/>
                      </div>
                  </div>
                  </div>
                
          </div>
          
           
  </div>
  <?php   if($module=='edit-produk'){ ?>
  <div class="span4">
                  <div class="control-group">
                    <div class="control-label">Now Image (click to zoom the image) :</div>
                      <div class="controls">
                      <?php
                 
                  $r=autoLoad("produk","no","$id");
                ?>
                    <ul class="thumbnails">
                    <li class="span4"> <a>
                          <img src="../img/product/small_<?php echo $r['gambar1'] ?>" alt="No Image 1"/>
                          <div class="actions">
                          <a class="lightbox_trigger" href="../img/product/big_<?php echo $r['gambar1'] ?>">
                          Img 1<i class="icon-search"></i></a>
                          </div>
                    </li>
                    <li class="span4"> <a>

                          <img src="../img/product/small_<?php echo $r['gambar2'] ?>" alt="&nbsp;"/>
                          <div class="actions">
                          <a class="lightbox_trigger" href="../img/product/big_<?php echo $r['gambar2'] ?>">
                          Img 2<i class="icon-search"></i></a>
                          </div>
                    </li>
                    <li class="span4"> <a>
                          <img src="../img/product/small_<?php echo $r['gambar3'] ?>" alt="&nbsp;">
                          <div class="actions">
                          <a class="lightbox_trigger" href="../img/product/big_<?php echo $r['gambar3'] ?>">
                          Img 3<i class="icon-search"></i></a>
                          </div>
                    </li>
                  </ul>
                      </div>
                  </div>
                 
         
  </div>
   <?php } ?>
  </div>


  </div></div>
</div>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Description Product</h5>
        </div>
        <div class="widget-content">
          <div class="control-group">
              <div class="controls">
                <textarea id="editor1" name="deskripsi" required="" rows="6" placeholder="Enter text ..."><?php if($module=='edit-produk'){ echo $r['deskripsi']; }else{} ?></textarea>
              </div>
          </div>
            <button type="button" onclick="window.history.back()" class="btn btn-default"><i class="icon icon-circle-arrow-left"></i> Cancel</button>
            <button type="reset" class="btn btn-warning"><i class="icon icon-remove"></i> Reset</button>
            <button type="submit" class="btn btn-success"><i class="icon icon-save"></i> Save</button>      
        </div>
      </div>
              </form>
</div>


