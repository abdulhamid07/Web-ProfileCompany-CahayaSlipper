<?php
    $id=$_GET['id'];
    $q=mysql_query("update pesan set status='R' where no='$id'");
    $r=autoLoad("pesan","no","$id");

?>
<div id="content-header">
  <div id="breadcrumb">
      <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a href="#" title="Go to" class="tip-bottom">Data Company</a>
      <a href="news.html" title="Go to" class="tip-bottom">Email And Testimoni</a>
      <a href="#" title="Go to" class="tip-bottom">Detail Email</a>
  </div>
</div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
         	<div class="widget-title">
          		<span class="icon"> <i class="icon icon-list-alt"></i> Detail Email</span><span class="icon"><code>Date : <?php echo tgl_indo($r['tgl']) ?></code></span>

         	</div>
         	<div class="widget-content">
          <form  method="post">  
  				<div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <div class="control-label">Name :</div>
                      <div class="controls">
                      <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="text" id="inputError" name="nama" class="span11" readonly="" value="<?php echo ucwords($r['nama']) ?>" />
                      </div>
                  </div>
                  </div>
                <div class="span6">
                  <div class="control-group">
                    <div class="control-label">Email :</div>
                      <div class="controls">               
                        <input type="text" id="inputError" name="email" class="span11" readonly="" value="<?php echo $r['nama'] ?>" />
                      </div>
                  </div>
                </div>
          </div>

        
          <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <div class="control-label">Subject :</div>
                      <div class="controls">
                        <textarea name="subjek" readonly="" class="span11" rows="2" wrap="on"><?php echo ucwords($r['subjek']) ?></textarea>
                      </div>
                  </div>
                  </div>
                <div class="span6">
                  <div class="control-group">
                    <div class="control-label">Message :</div>
                      <div class="controls">               
                        <textarea name="subjek" readonly="" class="span11" rows="2" wrap="on"><?php echo ucwords($r['pesan']) ?></textarea>
                      </div>
                  </div>
                </div>
          </div>
        <div class="widget-footer">
            <button type="button" class="btn btn-default" onclick="window.history.back()"><i class="icon icon-circle-arrow-left"></i> Cancel</button>
            <a href="#" onclick="javascript:replyMessage('<?php echo $id ?>','<?php echo $r['email'] ?>')" class="btn btn-success"><i class="icon icon-retweet"> Reply</i></a>
        </div>
      </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal hide" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Reply Message</h4>
          </div>
          <div class="modal-body">
            <form name="replypesan" method="post" action="actEmail-replyEmail.html">
                <input type="hidden" name="no">
                <label>From : </label>
                <input type="text" class="span5" name="email" readonly="readonly">
                <hr>
                <label>Subject : </label>
                <textarea class="span5" required name="subjek"></textarea>
                <hr>
                <label>Message : </label>
                <textarea name="pesan" class="span5"required></textarea>
                <hr>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button class="btn btn-success" type="submit" name="tombolproses"><i class="fa fa-reply"></i> Balas</button>
          </div>
            </form>
        </div>
      </div>
    </div>

