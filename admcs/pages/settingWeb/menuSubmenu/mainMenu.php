
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon icon-th"></i> Main Menu</span><span class="icon"><code>Note:klik Y/N untuk mengaktifkan atau menonaktifkan menu.</code></span>
          <h5></h5>
        </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th><i class="icon icon-sort"></i> No</th>
                  <th><i class="icon icon-sort"></i> Menu</th>
                  <th><i class="icon icon-sort"></i> Link</th>
                  <th><i class="icon icon-sort"></i> Active</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
          <?php
            $nomain=1;
            $qMainMenu=viewAutoLoad("main_menu","no");
            while($r=mysql_fetch_assoc($qMainMenu)){
          ?>

                <tr class="gradeA">
                  <td><?php echo $nomain; ?></td>
                  <td><font color="black"><?php echo strtoupper($r['menu']); ?></font></td>
                  <td><?php echo $r['link'] ?></td>                 
                  <td><center><a href="actMenu-<?php echo $r['no'] ?>-aktifMain-<?php echo $r['aktif'] ?>.html" title="<?php if($r['aktif']=='n'){ ?>Tidak Aktif<?php }else {?>Aktif<?php } ?>" class="tip-left">
                  <?php
                    if($r['aktif']=='n'){
                  ?>
                  <input type="button" class="btn btn-default btn-mini" value="<?php echo strtoupper($r['aktif']) ?>">
                  <?php }else{ ?>
                  <input type="button" class="btn btn-success btn-mini" value="<?php echo strtoupper($r['aktif']) ?>">
                  <?php } ?>
                  </a></center></td>
                  <td><center><a onclick="javascript:modalEditMain('<?php echo $r['no'] ?>','<?php echo $r['menu'] ?>','<?php echo $r['link'] ?>','<?php echo $r['aktif'] ?>')" href="#" title="Edit Data" class="tip-top">
                  <button class="btn btn-mini btn-primary"><i class="icon icon-edit"></i></button></a>
                  <a href="actMenu-<?php echo $r['no'] ?>-deleteMain.html" onClick="return confirm ('Yakin data akan diHapus?')" title="Hapus Data" class="tip-right">
                  <button class="btn btn-mini"><i class="icon icon-trash"></i></button></a></center></td>

                </tr>
          <?php
            $nomain++;
            }
          ?>

              </tbody>
            </table>
          </div>
      </div>
    </div>

    <div class="modal hide" id="addModalMain"/>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"> Add Main Menu</h4>
          </div>
          <div class="modal-body">
            <form method="post" action="actMenu-addMain.html"/>
                <label>Menu : </label>
                <input type="text" name="menu" class="span9" required placeholder="Nama Menu"/>
                <hr>
                <label>Link : </label>
                <input type="text" name="link" class="span9" placeholder="Link Menu"/>
                <hr>
                <label>Aktif : </label>
                <select name="aktif"required class="span9">
                  <option value="">-- -- --</option>
                  <option value="y">Aktif</option>
                  <option value="n">Tidak Aktif</option>
                </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button class="btn btn-success" type="submit" name="tombolproses"><i class="icon icon-save"></i> Save</button>
          </div>
            </form>
        </div>
      </div>
    </div>

    <div class="modal hide" id="modalEditMain">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"> Edit Main Menu</h4>
          </div>
          <div class="modal-body">
            <form name="editMainMenu" method="post" action="actMenu-editMain.html">
                <input type="hidden" name="no" id="menuid"> 
                <label>Menu : </label>
                <input type="text" name="menu" id="menujudul" class="span9" required placeholder="Nama Menu" maxlength="15">
                <hr>
                <label>Link : </label>
                <input type="text" name="link" id="menulink" class="span9" placeholder="Link Menu" size="15">
                <hr>
                <label>Aktif : </label>
                 <select name="aktif"required id="aktif" class="span9">
                  <option value="">-- -- --</option>
                  <option value="y">Aktif</option>
                  <option value="n">Tidak Aktif</option>
                </select> 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button class="btn btn-success" type="submit" name="tombolproses"><i class="icon icon-save"></i> Update</button>
          </div>
            </form>
        </div>
      </div>
    </div>
