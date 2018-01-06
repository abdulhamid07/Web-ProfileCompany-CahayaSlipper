      <div class="span6">  
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon icon-map-marker"></i> Contacts</a></span>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped" >
              <thead>
                <tr>
                  <th><a href="#"><i class="icon icon-sort"></i> No</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Title</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Contact Name</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Aktif</a></th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
          <?php
            $noContact=1;
            $qContact=viewAutoLoad("contact","id");
            //$qsosmed=mysql_query("select * from contact where type='t'");
            while($r=mysql_fetch_assoc($qContact)){

                  if($r['type']=='t'){
                    $sosmed=str_replace("/", " ", $r['link']);
                    $link=strstr($sosmed, " ");
                  }else{
                    $link=$r['link'];
                  }
          ?>

                <tr class="gradeA">
                  <td><?php echo $noContact; ?></td>
                  <td><?php echo strtoupper($r['contact_name'])?></td>
                  <td><?php echo $link; ?></td>
                  <td><center><a href="actAbout-<?php echo $r['id'] ?>-aktifContact-<?php echo $r['aktif'] ?>.html" title="<?php if($r['aktif']=='n'){ ?>Tidak Aktif<?php }else {?>Aktif<?php } ?>" class="tip-left">
                  <?php
                    if($r['aktif']=='n'){
                  ?>
                  <input type="button" class="btn btn-default btn-mini" value="<?php echo strtoupper($r['aktif']) ?>">
                  <?php }else{ ?>
                  <input type="button" class="btn btn-success btn-mini" value="<?php echo strtoupper($r['aktif']) ?>">
                  <?php } ?>
                  </a></center></td>
                  <td><center><a href="#" onclick="javascript:fungsiEditContact('<?php echo $r['id'] ?>','<?php echo $r['contact_name'] ?>','<?php echo $link ?>')" class="tip-right" title="Perbarui">
                  <button class="btn btn-mini btn-primary"><i class="icon icon-edit"></i></button></a>
                  </center></td>
                </tr>
          <?php
            $noContact++;
            }
          ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
