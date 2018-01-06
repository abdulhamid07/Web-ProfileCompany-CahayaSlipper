<?php
  $module=$_GET['fModule'];
  if($module=='edit-news'){
    $id=$_GET['id'];

    $r=autoLoad("news","no","$id");

  }
?>
<div id="content-header">
  <div id="breadcrumb">
      <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a href="news.html" title="Go to" class="tip-bottom">News And Comments</a>
      <a href="#" title="Go to" class="tip-bottom"><?php if($module=='edit-news'){ ?>Edit<?php }else { ?>Add<?php } ?> News</a>
  </div>
</div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="<?php if($module=='edit-news'){ ?>span9<?php }else{ ?>span12<?php } ?>">
        <div class="widget-box">
         	<div class="widget-title">
          		<span class="icon"> <i class="icon icon-list-alt"></i> <?php if($module=='edit-news'){ ?>Edit<?php }else { ?>Add<?php } ?> News</span><?php if($module=='edit-news'){ ?><span class="icon"><code>* Kosongkan gambar jika tidak ada perubahan</code></span><?php } ?>

         	</div>
         	<div class="widget-content">  
  				<div class="row-fluid">
              <form method="post" action="actNews-<?php if($module=='edit-news'){ ?>editNews<?php }else{ ?>addNews<?php } ?>.html" enctype="multipart/form-data">
                <div class="span5">
                  <div class="control-group">
                    <div class="control-label">Image :</div>
                      <div class="controls">
                        <input type="file" id="inputError" name="image" class="span7"/>
                      </div>
                  </div>
                  </div>
                <div class="span7">
                  <div class="control-group">
                    <div class="control-label">Title :</div>
                      <div class="controls">
                      <?php if($module=='edit-news'){ ?>
                      <input type="hidden" name="id" value="<?php echo $id; ?>">
                      <textarea name="judul" class="span12" wrap="on"><?php echo $r['judul'] ?></textarea>
                      <?php }else{ ?>
                        <input type="text" name="judul" required class="span10 input-lg" placeholder="Judul News"/>
                      <?php } ?>
                      </div>
                  </div>
                  </div>
          </div>
        </div>
      </div>
    </div>

                          
                          
 <?php if($module=='edit-news'){ ?>                       
      <div class="span3">
        <div class="widget-box">
          <div class="widget-title">
            <span class="icon"><i class="icon icon-picture"></i> Now Image</span>
          </div>
        <div class="widget-content nopadding">
            <?php if($r['image']==''){ ?>
              <img src="img/noimage.png" alt="No Image" width="300px" height="150px">
            <?php  } else { ?>
              <img src="../img/news/<?php echo $r['image'] ?>" alt="Gambar" width="300px" height="150px">
            <?php } ?>
        </div>
      </div>
    </div>
<?php } ?>
  </div>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Description News</h5>
        </div>
        <div class="widget-content">
          <div class="control-group">
              <div class="controls">
                <textarea id="editor1" name="deskripsi" rows="6" placeholder="Enter text ..."><?php if($module=='edit-news'){ echo $r['desk']; }else{} ?></textarea>
              </div>
          </div>
            <button type="button" onclick="window.history.back()" class="btn btn-default"><i class="icon icon-circle-arrow-left"></i> Cancel</button>
            <button type="reset" class="btn btn-warning"><i class="icon icon-remove"></i> Reset</button>
            <button type="submit" class="btn btn-success"><i class="icon icon-save"></i> Save</button>      
        </div>
      </div>
              </form>
</div>


