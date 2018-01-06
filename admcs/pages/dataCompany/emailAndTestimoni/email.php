        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><a href="#myModalAdd" data-toggle="modal" class="btn btn-mini btn-danger"><i class="icon icon-pencil"></i> New Message</a></span>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" >
              <thead>
                <tr>
                  <th><a href="#"><i class="icon icon-sort"></i> No</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Name</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Subject</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Message</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Date</a></th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
          <?php
            $noEmail=1;
            $qEmail=viewAutoLoad("pesan","no");
            while($r=mysql_fetch_assoc($qEmail)){
                  $r1=loadBlsEmail($r['no']);
                  $r2=loadCountBalasan($r['no']);

                  $tanggal=tgl_indo($r['tgl']);
                  $tanggal1=tgl_indo($r1['be_tgl']);
          ?>

                <tr class="gradeA">
                  <td><?php echo $noEmail; ?></td>
                  <td><?php echo ucwords($r['nama']); ?></td>
                  <td><?php echo ucfirst($r['subjek']); ?></td>
                  <td><?php echo ucfirst(substr($r['pesan'],0,70)); ?></td>
                  <td><?php echo $tanggal; ?></td>
                  <td><center>
                  <?php if(mysql_num_rows($r2)>0){ ?>
                    <a href="#" onclick="javascript:seeMessage('<?php echo $r1['be_no'] ?>','<?php echo strtoupper($r1['p_nama']) ?>','<?php echo $r1['p_email'] ?>','<?php echo $r1['be_subjek'] ?>','<?php echo $r1['be_pesan'] ?>','<?php echo $tanggal1; ?>')" title="Lihat Balasan" class="tip-bottom">
                    <button class="btn btn-danger btn-mini"><i class="icon icon-retweet"></i></button></a>
                  <?php }else{} ?>
                  <a href="detailEmail-<?php echo $r['no'] ?>.html" class="tip-top" title="Detail Message">
                  <button class="btn btn-mini btn-primary"><i class="icon icon-edit"></i></button></a>
                  <a href="actEmail-<?php echo $r['no'] ?>-deleteEmail.html" onClick="return confirm ('Yakin data akan diHapus?')" title="Hapus Data" class="tip-bottom">
                  <button class="btn btn-mini"><i class="icon icon-trash"></i></button></a></center></td>

                </tr>
          <?php
            $noEmail++;
            }
          ?>

              </tbody>
            </table>
          </div>
          <code>NB : Data yang ada dimenu Email ini adalah pesan dari customer yang dikirim melalui form website.</code>
        </div>
 <div class="modal hide" id="seeReply" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"></h4><span>Date Replied :</span> <span id="tgl" style="color:red"></span>
          </div>
          <div class="modal-body">
            <form name="seemess" method="post" action="actEmail-updateReply.html" onSubmit="return ValMenu()">
                <input type="hidden" name="no">
                <label>To : </label>
                <input type="text" name="email" class="span5" readonly="readonly">
                <hr>
                <label>Subjek : </label>
                <input type="text" name="subjek" class="span5" required>
                <hr>
                <label>Message : </label>
                <textarea name="pesan" class="span5" wrap="of" required></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button class="btn btn-success" type="submit" name="tombolproses"><i class="icon icon-save"></i> Resend</button>
          </div>
            </form>
        </div>
      </div>
    </div>