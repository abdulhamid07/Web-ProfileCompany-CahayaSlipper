        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><a href="#addSliderModal" data-toggle="modal" class="btn btn-mini btn-danger"><i class="icon icon-plus"></i> Add Slider</a></span>
            <h5></h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th><i class="icon icon-sort"></i> No</th>
                  <th><i class="icon icon-sort"></i>Description</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
          <?php
            $noslider=1;
            $qslider=viewAutoLoad("slider","no");
            while($r=mysql_fetch_assoc($qslider)){
          ?>

                <tr class="gradeA">
                  <td><?php echo $noslider; ?></td>
                  <td><font color="black"><?php echo ucwords($r['kSlide']); ?></font></td>
                  <td>
                  <ul class="thumbnails">
                  <li class="span2"> <a> 
                  <img src="../img/slider/<?php echo $r['image'] ?>" alt="Gambar Tidak Ada" width="100px" height="30px"></a>
                  <div class="actions">
                  <a class="lightbox_trigger" href="../img/slider/<?php echo $r['image'] ?>">
                  <i class="icon-search"></i></a>
                  </div>
                  </li></ul>
                  </td>
                  <td><center><a data-toggle="modal" data-id="<?php echo $r['no']; ?>" data-ket="<?php echo $r['kSlide']; ?>" data-image="<?php echo $r['image']; ?>" class="editSlider tip-bottom" href="#editSliderModal" title="Perbarui">
                  <button class="btn btn-mini btn-primary"><i class="icon icon-edit"></i></button></a>
                  <a href="actLogoSlider-<?php echo $r['no'] ?>-deleteSlider.html" onClick="return confirm ('Yakin data akan diHapus?')" title="Hapus Data" class="tip-bottom">
                  <button class="btn btn-mini"><i class="icon icon-trash"></i></button></a></center></td>

                </tr>
          <?php
            $noslider++;
            }
          ?>

              </tbody>
            </table>
          </div>
        </div>
        <div class="modal fade" id="addSliderModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" id="myModalLabel">Add Slider</h4>
                </div>
              <div class="modal-body" >
                <form action="actLogoSlider-inputslider.html" method="POST" name="addl" onSubmit="return addLogos()" enctype="multipart/form-data">
                  <label>Description :</label>
                  <input type="text" class="span5" name="ket"required placeholder="Keterangan Slider"/>
                  <label>Image :</label>
                  <input type="file" name="image" class="span3">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-success" type="submit" name="tombolproses"><i class="icon icon-save"></i> Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>

    <div class="modal fade" id="editSliderModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"> Edit Slider</h4>
          </div>
          <div class="modal-body">
            <form action="actLogoSlider-editSlider.html" method="POST" name="editlogo" enctype="multipart/form-data" onsubmit="EditLogos()">
            <label>Description</label>
            <input type="hidden" name="id" id="idslider"/>
            <input type="text" name="ket" required id="ketslider" class="span5" placeholder="Keterangan Slider"/>
            <label>Image</label>
            <input type="file" name="image" id="imageslider"/><span><font color="red">(*) kosongkan gambar jika tidak ada perubahan</font></span><p>    
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