        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon icon-list-alt"></i> Data Services</span>
          <h5></h5>
        </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-striped" style="color:black;">
              <thead>
                <tr>
                  <th><a href="#"><i class="icon icon-sort"></i> No</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Title</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Description</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Active</a></th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
         <?php
            $noServ=1;
            $qServ=viewAutoLoad("services","no");
            while($r=mysql_fetch_assoc($qServ)){
          ?>

                <tr class="gradeA">
                  <td><?php echo $noServ; ?></td>
                  <td><?php echo strtoupper($r['judul']); ?></td>
                  <td><?php echo substr($r['ket'],0,200) ?></td>                 
                   <td><center><a href="actService-<?php echo $r['no'] ?>-<?php echo $r['aktif'] ?>-activeService.html" title="<?php if($r['aktif']=='n'){ ?>Tidak Aktif<?php }else {?>Aktif<?php } ?>" class="tip-left">
                  <?php
                    if($r['aktif']=='n'){
                  ?>
                  <input type="button" class="btn btn-default btn-mini" value="<?php echo strtoupper($r['aktif']) ?>">
                  <?php }else{ ?>
                  <input type="button" class="btn btn-success btn-mini" value="<?php echo strtoupper($r['aktif']) ?>">
                  <?php } ?>
                  </a></center></td>
                  <td><center><a href="#"onclick="javascript:editService('<?php echo $r['no'] ?>','<?php echo strtoupper($r['judul']) ?>','<?php echo $r['ket'] ?>')" title="Edit Service" class="tip-bottom"><button class="btn btn-mini btn-primary"><i class="icon icon-edit"></i></button></a>
                 </center></td>

                </tr>
          <?php
            $noServ++;
            }
          ?>

              </tbody>
            </table>
          </div>
        </div>
 <div class="modal hide" id="modalEditService" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Edit Service</h4>
          </div>
          <div class="modal-body">
            <form name="serv" method="post" action="actProduct-updateService.html">
                <input type="hidden" name="no">
                <label>Service Title : </label>
                <input type="text" name="judul" required class="span5">
                <hr>
                <label>Description : </label>
                <textarea name="ket" rows="5" class="span5" wrap="of" required></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button class="btn btn-success" type="submit" name="tombolproses"><i class="icon icon-save"></i> Update</button>
          </div>
            </form>
        </div>
      </div>
    </div>