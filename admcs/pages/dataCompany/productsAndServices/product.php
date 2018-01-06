        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon icon-list-alt"></i> Data Products</span><span class="icon"><a href="addProduk.html" class="btn btn-mini btn-danger"><i class="icon icon-plus"></i> Product</a></span>

          <h5></h5>
        </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" style="color:black;">
              <thead>
                <tr>
                  <th><a href="#"><i class="icon icon-sort"></i> No</a></th>
                  <th width="10%">Image</th>
                  <th><a href="#"><i class="icon icon-sort"></i> Product</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Description</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Price</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Stock</a></th>
                  <th width="7%">Action</th>
                </tr>
              </thead>
              <tbody>
         <?php
            $noProduk=1;
            $qProduk=viewAutoLoad("produk","id_produk");
            while($r=mysql_fetch_assoc($qProduk)){
            $tglIndo=tgl_indo($r['tgl_masuk']);
          ?>

                <tr class="gradeA">
                  <td><?php echo $noProduk; ?></td>
                  <td>
                  <?php
                    if(($r['gambar1']=='')&&($r['gambar2']=='')&&($r['gambar3']=='')){
                  ?>
                        <img src="img/noimage.png" alt="Gambar Tidak Ada"></a>
                  <?php }else{ ?>
                  <ul class="thumbnails">
                    <li class="span1"> <a>
                  <?php if(($r['gambar1']!='')&&($r['gambar2']!='')&&($r['gambar3']!='')){ ?>                         
                          <img src="../img/product/small_<?php echo trim($r['gambar1']) ?>" alt="Gambar Tidak Ada" width="50px" height="100px"></a>
                          <div class="actions">
                          <a class="lightbox_trigger" href="../img/product/big_<?php echo trim($r['gambar1']) ?>">
                          <i class="icon-search"></i></a>
                  <?php   }else if(($r['gambar1']!='')&&($r['gambar2']=='')&&($r['gambar3']=='')){ ?>                         
                          <img src="../img/product/small_<?php echo $r['gambar1'] ?>" alt="Gambar Tidak Ada" width="50px" height="100px"></a>
                          <div class="actions">
                          <a class="lightbox_trigger" href="../img/product/big_<?php echo trim($r['gambar1']) ?>">
                          <i class="icon-search"></i></a>
                  <?php }else if(($r['gambar1']=='')&&($r['gambar2']!='')&&($r['gambar3']=='')){ ?>
                          <img src="../img/product/small_<?php echo $r['gambar2'] ?>" alt="Gambar Tidak Ada" width="50px" height="100px"></a>
                          <div class="actions">
                          <a class="lightbox_trigger" href="../img/product/big_<?php echo trim($r['gambar2']) ?>">
                          <i class="icon-search"></i></a>
                  <?php }else if(($r['gambar1']=='')&&($r['gambar2']=='')&&($r['gambar3']!='')){ ?>
                          <img src="../img/product/small_<?php echo trim($r['gambar3']) ?>" alt="Gambar Tidak Ada" width="50px" height="100px"></a>
                          <div class="actions">
                          <a class="lightbox_trigger" href="../img/product/big_<?php echo trim($r['gambar3']) ?>">
                          <i class="icon-search"></i></a>
                   <?php  }else if(($r['gambar1']!='')&&($r['gambar2']!='')&&($r['gambar3']=='')){ ?>                         
                          <img src="../img/product/small_<?php echo $r['gambar1'] ?>" alt="Gambar Tidak Ada" width="50px" height="100px"></a>
                          <div class="actions">
                          <a class="lightbox_trigger" href="../img/product/big_<?php echo trim($r['gambar1']) ?>">
                          <i class="icon-search"></i></a>
                   <?php  }else if(($r['gambar1']!='')&&($r['gambar2']=='')&&($r['gambar3']!='')){ ?>                         
                          <img src="../img/product/small_<?php echo $r['gambar1'] ?>" alt="Gambar Tidak Ada" width="50px" height="100px"></a>
                          <div class="actions">
                          <a class="lightbox_trigger" href="../img/product/big_<?php echo trim($r['gambar1']) ?>">
                          <i class="icon-search"></i></a>
                   <?php   }else if(($r['gambar1']=='')&&($r['gambar2']!='')&&($r['gambar3']!='')){ ?>                         
                          <img src="../img/product/small_<?php echo $r['gambar2'] ?>" alt="Gambar Tidak Ada" width="50px" height="100px"></a>
                          <div class="actions">
                          <a class="lightbox_trigger" href="../img/product/big_<?php echo trim($r['gambar2']) ?>">
                          <i class="icon-search"></i></a>
                  <?php } ?>
                    </li>
                  </ul>
                  <?php } ?>
                  </td>
                  <td><?php echo strtoupper($r['nama_produk']); ?></td>
                  <td><?php echo substr($r['deskripsi'],0,250) ?></td>                 
                  <td><?php echo format_rupiah($r['harga']) ?></td>
                  <td><?php echo $r['stok'] ?></td>
                  <td><center><a href="editProduct-<?php echo $r['no'] ?>.html" title="Edit Data" class="tip-top"><button class="btn btn-mini btn-primary"><i class="icon icon-edit"></i></button></a>
                  <a href="actProduct-<?php echo $r['no'] ?>-deleteProduct.html" onClick="return confirm ('Yakin data akan diHapus?')" title="Hapus Data" class="tip-bottom">
                  <button class="btn btn-mini"><i class="icon icon-trash"></i></button></a></center></td>

                </tr>
          <?php
            $noProduk++;
            }
          ?>

              </tbody>
            </table>
          </div>
        </div>