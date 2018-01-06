        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><a href="#myModalAdd" data-toggle="modal" class="btn btn-mini btn-danger"><i class="icon icon-plus"></i> Add Logo</a></span>
          <span class="icon"><code>Note:klik Y/N untuk mengaktifkan atau menonaktifkan logo.</code></span>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th><i class="icon icon-sort"></i> Title</th>
                  <th>Image</th>
                  <th><i class="icon icon-sort"></i> Active</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
          <?php
            $nologo=1;
            $qlogo=viewAutoLoad("logo","id_logo");
            while($r=mysql_fetch_assoc($qlogo)){
          ?>

                <tr class="gradeA">
                  <td><font color="black"><?php echo ucwords($r['title']) ?></font></td>
                  <td>
                  
                  <ul class="thumbnails">
                  <li class="span2"> <a> 
                  <?php if($r['image']==''){ ?>
                  <img src="img/noimage.png" alt="Gambar Tidak Ada" width="100px" height="30px"></a>
                  <?php }else{ ?>
                  <img src="../img/logo/<?php echo $r['image'] ?>" alt="Gambar Tidak Ada" width="100px" height="30px"></a>
                  <?php } ?>
                  <div class="actions">
                  <a class="lightbox_trigger" href="../img/logo/<?php echo $r['image'] ?>">
                  <i class="icon-search"></i></a>
                  </div>
                  </li></ul>
                  </td>
                   <td><center><a href="actLogoSlider-<?php echo $r['id_logo'] ?>-aktiflogo.html" title="<?php if($r['aktif']=='n'){ ?>Tidak Aktif<?php }else {?>Aktif<?php } ?>" class="tip-left">
                  <?php
                    if($r['aktif']=='n'){
                  ?>
                  <input type="button" class="btn btn-default" value="<?php echo strtoupper($r['aktif']) ?>">
                  <?php }else{ ?>
                  <input type="button" class="btn btn-success" value="<?php echo strtoupper($r['aktif']) ?>">
                  <?php } ?>
                  </a></center></td>
                  <td><center><a data-toggle="modal" data-id="<?php echo $r['id_logo']; ?>" data-title="<?php echo $r['title']; ?>" data-image="<?php echo $r['image']; ?>" data-aktif="<?php echo $r['aktif']; ?>" class="GantiLogo tip-left" href="#editLogoModal" title="Perbarui">
                  <button class="btn btn-mini btn-primary"><i class="icon icon-edit"></i></button></a>
                  <a href="actLogoSlider-<?php echo $r['id_logo'] ?>-deletelogo.html" onClick="return confirm ('Yakin data akan diHapus?')" title="Hapus Data" class="tip-bottom">
                  <button class="btn btn-mini"><i class="icon icon-trash"></i></button></a></center></td>

                </tr>
          <?php
            $nologo++;
            }
          ?>

              </tbody>
            </table>
          </div>
        </div>
        
        <div class="modal hide" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" id="myModalLabel">Add Logo</h4>
                </div>
              <div class="modal-body" >
                <form action="actLogoSlider-inputlogo.html" method="POST" name="addl" onSubmit="return addLogos()" enctype="multipart/form-data">
                  <label>Title :</label>
                  <input type="text" class="span5" name="judul"required autocomplete="off" placeholder="Judul Logo">
                  <label>Image :</label>
                  <input type="file" name="image" class="span3">
                  <label>Active :</label>
                  <select name="aktif" required/>
                    <option value="">-- -- --</option>
                    <option value="y">Aktif</option>
                    <option value="n">Tidak</option>
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

    <div class="modal hide" id="editLogoModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"> Edit Logo</h4>
          </div>
          <div class="modal-body">
            <form action="actLogoSlider-editLogo.html" method="POST" name="editlogo" enctype="multipart/form-data" onsubmit="EditLogos()">
            <label>Title</label>
            <input type="hidden" name="id" id="idlogo"/>
            <input type="text" name="judul" required id="titlelogo" class="span5" placeholder="Judul Logo"/>
            <label>Image</label>
            <input type="file" name="image" id="imagelogo"/><span><font color="red">(*) kosongkan gambar jika tidak ada perubahan</font></span><p>
            <label>Active</label>
            <select name="aktif" required id="aktiflogo"/>
              <option value="">-- -- --</option>
              <option value="y" id="aktiflogo">Aktif</option>
              <option value="n" id="aktiflogo">Tidak</option>
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
<!--
<script>
$(document).ready(function()
{
  $('.edit_data').click(function(){
    var logo_id=$(this).data("id");
    $.ajax({
      url:"editLogo.php",
      method:"post",
      data:{logo_id:logo_id
      },
      success:function(data){
        $('#editLogo').html(data);
        $('#modalEditLogo').modal("show");
      }
    })
  })
})
</script> -->