        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon icon-user"></i> Our Team</a></span>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" >
              <thead>
                <tr>
                  <th><a href="#"><i class="icon icon-sort"></i> No</a></th>
                  <th>Image</th>
                  <th><a href="#"><i class="icon icon-sort"></i> Name</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Position</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Email</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Facebook</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Twitter</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Instagram</a></th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
          <?php
            $noTeam=1;
            $qTeam=viewAutoLoad("our_team","no");
            while($r=mysql_fetch_assoc($qTeam)){
          ?>

                <tr class="gradeA">
                  <td><?php echo $noTeam; ?></td>
                  <td> 
                    <ul class="thumbnails">
                      <li class="span12"> <a> 
                      <?php if($r['image']==''){ ?>
                        <img src="img/noimage.png" alt="Gambar Tidak Ada" width="100px" height="70px"></a>
                      <?php }else{ ?>
                        <img src="../img/ourTeam/<?php echo $r['image'] ?>" alt="Gambar Tidak Ada" width="100px" height="70px"></a>
                      <?php } ?>
                        <div class="actions">
                          <a class="lightbox_trigger" href="../img/ourTeam/<?php echo $r['image'] ?>">
                          <i class="icon-search"></i></a>
                        </div>
                      </li>
                    </ul>
                  </td>
                  <?php 
                    $userfb=str_replace("/", " ", $r['fb']);
                    $usertwit=str_replace("/", " ", $r['twit']);
                    $userig=str_replace("/", "@", $r['ig']);
                      
                  ?>
                  <td><?php echo strtoupper($r['nama']); ?></td>
                  <td><?php echo strtoupper($r['jabatan']); ?></td>
                  <td><?php echo $r['email']; ?></td>
                  <td><a href="http://<?php echo $r['fb'] ?>" title="Facebook Id" class="tip-bottom"><?php echo strstr($userfb, " ") ?></a></td>
                  <td><a href="http://<?php echo $r['twit'] ?>" title="Twitter Id" class="tip-bottom"><?php echo strstr($usertwit," "); ?></a></td>
                  <td><a href="http://<?php echo $r['ig'] ?>" title="Instagram Id" class="tip-bottom"><?php echo strstr($userig,"@"); ?></a></td>
                  <td><center><a href="editTeam-<?php echo $r['no'] ?>.html" class="tip-left" title="Perbarui">
                  <button class="btn btn-mini btn-primary"><i class="icon icon-edit"></i></button></a>
                  <a href="actTeam-<?php echo $r['no'] ?>-deleteTeam.html" onClick="return confirm ('Yakin data akan diHapus?')" title="Hapus Data" class="tip-bottom">
                  <button class="btn btn-mini"><i class="icon icon-trash"></i></button></a></center></td>

                </tr>
          <?php
            $noTeam++;
            }
          ?>

              </tbody>
            </table>
          </div>
        </div>