<?php
	$id=$_GET['id'];
	$r=autoLoad("our_team","no","$id");
	$userfb=str_replace("/", " ", $r['fb']);
    $usertwit=str_replace("/", " ", $r['twit']);
    $userig=str_replace("/", " ", $r['ig']);
?>
<div id="content-header">
  <div id="breadcrumb">
      <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a href="news.html" title="Go to" class="tip-bottom">About Us And Contacts</a>
      <a href="#" title="Go to" class="tip-bottom">Edit Our Team</a>
  </div>
</div>
<div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
         	<div class="widget-title">
	<span class="icon"> <i class="icon icon-list-alt"></i> Edit Contact</span><span class="icon"><code>* Kosongkan gambar jika tidak ada perubahan</code></span>
</div>
<div class="widget-content">
      <div class="span9">
        <form method="post" action="actAbout-editTeam.html" name="basic_validate" id="basic_validate" enctype="multipart/form-data"/>  
  			<div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <div class="control-label">Name* :</div>
                      <div class="controls">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="text" name="name" required class="span12" value="<?php echo strtoupper($r['nama']) ?>"/>
                      </div>
                  </div>
                  </div>
                <div class="span6">
                  <div class="control-group">
                    <div class="control-label">Facebook :</div>
                      <div class="controls">
                      <input type="text" name="fb" class="span12" placeholder="Your Facebook Id .." value="<?php echo strstr($userfb, " ") ?>"/>
                      </div>
                  </div>
                  </div>
          	</div>
          	<div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <div class="control-label">Position* :</div>
                      <div class="controls">
                        <input type="text" name="position" required class="span12" placeholder="Input Your Position .." value="<?php echo $r['jabatan'] ?>"/>
                      </div>
                  </div>
                  </div>
                <div class="span6">
                  <div class="control-group">
                    <div class="control-label">Twitter :</div>
                      <div class="controls">
                      <input type="text" name="twit" class="span12" placeholder="Your Twitter Id .." value="<?php echo strstr($usertwit," "); ?>"/>
                      </div>
                  </div>
                  </div>
          	</div>
          	<div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <div class="control-label">Email* :</div>
                      <div class="controls">
                        <input type="text" id="email" name="email" required class="span12" value="<?php echo $r['email'] ?>" />
                      </div>
                  </div>
                  </div>
                <div class="span6">
                  <div class="control-group">
                    <div class="control-label">Instagram :</div>
                      <div class="controls">
                      <input type="text" name="ig" class="span12" placeholder="Your Instagram Id .." value="<?php echo strstr($userig," "); ?>"/>
                      </div>
                      <div class="control-label">Image :</div>
        	<input type="file" name="image" class="span3"/>
                  </div>
                  </div>
          	</div>
    </div>

    <div class="span3">
        <div class="widget-box">
          <div class="widget-title">
            <span class="icon"><i class="icon icon-picture"></i> Now Image</span>
          </div>
        <div class="widget-content nopadding">
            <?php if($r['image']==''){ ?>
              <img src="img/noimage.png" alt="No Image" width="300px" height="150px">
            <?php  } else { ?>
              <img src="../img/ourTeam/<?php echo $r['image'] ?>" alt="Gambar" width="300px" height="150px">
            <?php } ?>
        </div>
        <div class="widget-footer">
        	
        </div>
      </div>
    </div>
     <div class="row-fluid">
      <div class="span12">
          <div class="form-actions">
    		<button type="button" onclick="window.history.back()" class="btn btn-default"><i class="icon icon-circle-arrow-left"></i> Cancel</button>
            <button type="reset" class="btn btn-warning"><i class="icon icon-remove"></i> Reset</button>
            <button type="submit" class="btn btn-success"><i class="icon icon-save"></i> Update</button>      
        </div>
        </div>
    	
            </div>
           </div>
          </div>
      
        </div>
              </form>
         </div>
        </div>
