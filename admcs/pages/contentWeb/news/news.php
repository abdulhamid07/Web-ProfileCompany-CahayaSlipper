
      <div class="widget-box">
        <div class="widget-title"><span class="icon"><a href="addNews.html" class="btn btn-mini btn-danger"><i class="icon icon-plus"></i> News</a></span>

          <h5></h5>
        </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" style="color:black;">
              <thead>
                <tr>
                  <th><a href="#"><i class="icon icon-sort"></i> No</a></th>
                  <th width="10%">Image</th>
                  <th><a href="#"><i class="icon icon-sort"></i> Title</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Description</a></th>
                  <th width="12%"><a href="#"><i class="icon icon-sort"></i> Updated</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> <i class="icon icon-comments"></i></a></th>
                  <th width="7%">Action</th>
                </tr>
              </thead>
              <tbody>
          <?php
            $noNews=1;
            $qNews=viewAutoLoad("news","no");
            while($r=mysql_fetch_assoc($qNews)){
              $jumBls=0;
              $query=mysql_query("select no,count(id_news) as jumComment from comment where id_news='$r[no]'");
              while($rComment=mysql_fetch_assoc($query)){
                $qBls=mysql_query("select count(id_comment) as jumBls_comment from bls_comment where id_comment='$rComment[no]'");
                $rBls=mysql_fetch_assoc($qBls);
                $jumBls=$jumBls+$rBls['jumBls_comment'];
                $jumRComment=$rComment['jumComment'];
              }
              $jumlah=$jumRComment+$jumBls;
            $tglIndo=tgl_indo($r['tgl']);
          ?>

                <tr class="gradeA">
                  <td><?php echo $noNews; ?></td>
                  <td>
                  <?php
                    if($r['image']==''){
                  ?>
                        <img src="img/noimage.png" alt="Gambar Tidak Ada"></a>
                  <?php }else{ ?>
                  <ul class="thumbnails">
                    <li class="span1"> <a>                       
                        <img src="../img/news/<?php echo $r['image'] ?>" alt="Gambar Tidak Ada"></a>
                      <div class="actions">
                        <a class="lightbox_trigger" href="../img/news/<?php echo $r['image'] ?>">
                          <i class="icon-search"></i></a>
                    </li>
                  </ul>
                  <?php } ?>
                  </td>
                  <td><?php echo ucwords($r['judul']); ?></td>
                  <td><?php echo substr($r['desk'],0,200) ?></td>                 
                  <td><?php echo $tglIndo ?></td>
                  <td><a href="viewComments-<?php echo $r['no'] ?>.html" class="tip-bottom" title="<?php echo $jumlah ?> Comments"><span class="date badge badge-success"><?php echo $jumlah ?></span></a></td>
                  <td><center><a href="editNews-<?php echo $r['no'] ?>.html" title="Edit Data" class="tip-top"><button class="btn btn-mini btn-primary"><i class="icon icon-edit"></i></button></a>
                  <a href="actNews-<?php echo $r['no'] ?>-deleteNews.html" onClick="return confirm ('Yakin data akan diHapus?')" title="Hapus Data" class="tip-bottom">
                  <button class="btn btn-mini"><i class="icon icon-trash"></i></button></a></center></td>

                </tr>
          <?php
            $noNews++;
            }
          ?>

              </tbody>
            </table>
      </div>
    </div>
  

