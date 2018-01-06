        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><a href="#addModalTest" data-toggle="modal" class="btn btn-mini btn-danger"><i class="icon icon-plus"></i> Testimoni</a></span>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th><a href="#"><i class="icon icon-sort"></i> No</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Name</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Company</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Testimoni</a></th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
          <?php
            $noTest=1;
            $qTest=viewAutoLoad("testimoni","no");
            while($r=mysql_fetch_assoc($qTest)){
          ?>

                <tr class="gradeA">
                  <td  width="5%"><?php echo $noTest; ?></td>
                  <td  width="15%"><?php echo ucwords($r['nama']); ?></td>
                  <td><?php echo strtoupper($r['perusahaan']); ?></td>
                  <td><?php echo ucfirst($r['pesan']); ?></td>
                  <td  width="8%"><center><a href="#" onclick="javascript:modalEditTest('<?php echo $r['no'] ?>','<?php echo $r['nama'] ?>','<?php echo $r['perusahaan'] ?>','<?php echo $r['pesan'] ?>')" class="tip-top" title="Edit Testimoni">
                  <button class="btn btn-mini btn-primary"><i class="icon icon-edit"></i></button></a>
                  <a href="actEmail-<?php echo $r['no'] ?>-deleteTest.html" onClick="return confirm ('Yakin data akan diHapus?')" title="Hapus Data" class="tip-bottom">
                  <button class="btn btn-mini"><i class="icon icon-trash"></i></button></a></center></td>

                </tr>
          <?php
            $noTest++;
            }
          ?>

              </tbody>
            </table>
          </div>
        </div>
 <div class="modal hide" id="addModalTest" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Add Testimoni</h4>
          </div>
          <div class="modal-body">
            <form method="post" action="actEmail-addTest.html">
                <label>Name : </label>
                <input type="text" name="nama" class="span5" required placeholder="Your Name">
                <hr>
                <label>Company : </label>
                <textarea name="perusahaan" class="span5" wrap="of" rows="2" required placeholder="Your Company"></textarea>
                <hr>
                <label>Testimoni : </label>
                <textarea name="testimoni" class="span5" wrap="of" required placeholder="Your Testimoni"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button class="btn btn-success" type="submit" name="tombolproses"><i class="icon icon-save"></i> Save</button>
          </div>
            </form>
        </div>
      </div>
    </div>

     <div class="modal hide" id="editModalTest" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Edit Testimoni</h4>
          </div>
          <div class="modal-body">
            <form name="editTest" method="post" action="actEmail-editTest.html">
                <input type="hidden" name="no">
                <label>Name : </label>
                <input type="text"  name="nama" class="span5" required>
                <hr>
                <label>Company : </label>
                <textarea name="perusahaan" class="span5" wrap="on" rows="2" required></textarea>
                <hr>
                <label>Testimoni : </label>
                <textarea name="testimoni" class="span5" wrap="on" required></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button class="btn btn-success" type="submit" name="tombolproses"><i class="icon icon-save"></i> Update</button>
          </div>
            </form>
        </div>
      </div>
    </div>