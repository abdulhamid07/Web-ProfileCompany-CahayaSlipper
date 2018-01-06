<?php
    $id=$_GET['id'];

    $r=autoLoad("about","no","$id");

?>
<div id="content-header">
  <div id="breadcrumb">
      <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a href="news.html" title="Go to" class="tip-bottom">About And Contact</a>
      <a href="#" title="Go to" class="tip-bottom">Edit Profile Company</a>
  </div>
</div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
         	<div class="widget-title">
          		<span class="icon"> <i class="icon icon-list-alt"></i>Edit Profile Company</span><span class="icon"><code>*Kosongkan gambar jika tidak ada perubahan</code></span>

         	</div>
         	<div class="widget-content">  
  				<div class="row-fluid">
              <form method="post" action="actAbout-editAbout.html" enctype="multipart/form-data">
            <div class="row-fluid">
              <div class="span8">
                <div class="control-group">
                  <div class="controls">
                  <input type="hidden" name="id" value="<?php echo $id ?>">
                    <textarea id="editor1" name="deskripsi" rows="6" placeholder="Enter text ..."><?php echo $r['profile']; ?></textarea>
                  </div>
                 </div>
              </div>
              <div class="span3">
                <span class="icon"><i class="icon icon-picture"></i> Now Image</span>
                <?php if($r['image']==''){ ?>
                  <img src="img/noimage.png" alt="No Image" width="300px" height="150px">
                <?php  } else { ?>
                  <img src="../img/ourTeam/<?php echo $r['image'] ?>" alt="Gambar" width="300px" height="150px">
                <?php } ?>
                <label>Choose Image :</label>
                <input type="file" name="image">
              </div>
            </div>
            <button type="button" onclick="window.history.back()" class="btn btn-default"><i class="icon icon-circle-arrow-left"></i> Cancel</button>
            <button type="reset" class="btn btn-warning"><i class="icon icon-remove"></i> Reset</button>
            <button type="submit" class="btn btn-success"><i class="icon icon-save"></i> Save</button>  
            </form>
          </div>
        </div>
      </div>              
    </div>
  </div>
</div>


