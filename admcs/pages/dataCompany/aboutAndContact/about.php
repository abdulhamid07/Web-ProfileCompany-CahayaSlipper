      <div class="span6">  
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon icon-th"></i> Profile Company</a></span>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped" >
              <thead>
                <tr>
                  <th><a href="#"><i class="icon icon-sort"></i> No</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Image</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Profile</a></th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
          <?php
            $noAbout=1;
            $qAbout=viewAutoLoad("about","no");
            while($r=mysql_fetch_assoc($qAbout)){
          ?>

                <tr class="gradeA">
                  <td><?php echo $noAbout; ?></td>
                  <td>
                  <?php
                    if($r['image']==''){ ?>
                        <img src="img/noimage.png" width="150px" height="70px"/>
                  <?php  }else { ?>
                        <img src="../img/ourTeam/<?php echo $r['image']; ?>" width="150px" height="70px"/>
                  <?php } ?>
                  </td>
                  <td><?php echo substr($r['profile'],0,570); ?>...</td>
                  <td><center><a href="actProfile-<?php echo $r['no']; ?>-editProfile.html" class="tip-right" title="Perbarui">
                  <button class="btn btn-mini btn-primary"><i class="icon icon-edit"></i></button></a></center></td>
                </tr>
          <?php
            $noAbout++;
            }
          ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>

      <?php include "contact.php";
            include "ourTeam.php"; ?>

           