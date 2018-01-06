    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon icon-th"></i> Sub Menu Or Product Categories</span>
          <h5></h5>
        </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th><i class="icon icon-sort"></i> No</th>
                  <th><i class="icon icon-sort"></i> Main Menu</th>
                  <th><i class="icon icon-sort"></i> Product Categories</th>
                  <th><i class="icon icon-sort"></i> Link</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
          <?php
            $nosub=1;
            $qsubMenu=loadSubMenu();
            while($r=mysql_fetch_assoc($qsubMenu)){
          ?>

                <tr class="gradeA">
                  <td><?php echo $nosub; ?></td>
                  <td><font color="black"><?php echo strtoupper($r['menu']); ?></font></td>
                  <td><font color="black"><?php echo ucwords($r['nmSub_menu']); ?></font></td>
                  <td><?php echo $r['link'] ?></td>                 
                  <td><center><a href="#" onclick="javascript:modalEditSub('<?php echo $r['sno'] ?>','<?php echo $r['kd_main'] ?>','<?php echo $r['nmSub_menu'] ?>','<?php echo $r['link'] ?>')" title="Edit Data" class="tip-bottom">
                  <button class="btn btn-mini btn-primary"><i class="icon icon-edit"></i></button></a>
                  <a href="actMenu-<?php echo $r['sno'] ?>-deleteSub.html" onClick="return confirm ('Yakin data akan diHapus?')" title="Hapus Data" class="tip-bottom">
                  <button class="btn btn-mini"><i class="icon icon-trash"></i></button></a></center></td>

                </tr>
          <?php
            $nosub++;
            }
          ?>

              </tbody>
            </table>
          </div>
      </div>
    </div>
<div class="modal hide" id="addModalSub">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"> Add Product Categories</h4>
          </div>
          <div class="modal-body">
            <form method="post" action="actMenu-addSub.html">
                  <label>Sub Menu : </label>
                  <input type="text" name="menu" class="span9" required placeholder="Sub Menu" size="15">
                  <hr>
                  <label>Link Sub Menu : </label>
                  <input type="text" name="link" class="span9" required placeholder="Link Sub Menu">
                  <hr>
                  <label>Menu Utama : </label>
                <select name="main" class="span9" required/>
                  <option value="">-- PILIH MENU UTAMA --</option>
                <?php $q=mysql_query("select * from main_menu");
                      while($row=mysql_fetch_assoc($q)){
                 ?>
                 <option value="<?php echo $row['no'] ?>"><?php echo strtoupper($row['menu']) ?></option>
                 <?php } ?>
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

  <div class="modal hide" id="editModalSub">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"> Edit Product Categories</h4>
          </div>
          <div class="modal-body">
           <form name="editSubMenu" method="post" action="actMenu-editSub.html">
                <input type="hidden" name="no">
                <label>Sub Menu : </label>
                <input type="text" name="menu" class="span9" required placeholder="Sub Menu" size="15">
                <hr>
                <label>Link : </label>
                <input type="text" name="link" class="span9" required placeholder="Link Sub Menu">
                <hr>
                <label>Menu Utama : </label>
                <select name="main" class="span9" required>
                  <option value="">-- PILIH MENU UTAMA --</option>
                <?php $q=mysql_query("select * from main_menu");
                      while($row=mysql_fetch_assoc($q)){
                 ?>
                 <option value="<?php echo $row['no'] ?>"><?php echo strtoupper($row['menu']) ?></option>
                 <?php } ?>
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