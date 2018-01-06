<?php

    $id=$_GET['id'];

    $r=autoLoad("news","no","$id");
    $tgl=tgl_indo($r['tgl']);

?>
<div id="content-header">
  <div id="breadcrumb">
      <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a href="news.html" title="Go to" class="tip-bottom">News And Comments</a>
  </div>
</div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
      <?php getMessage(); ?>
        <div class="widget-box">
         	<div class="widget-title">
          		<span class="icon"> <i class="icon icon-comments"></i> All Commens</span>

         	</div>
         	<div class="widget-content">  
  				<div class="row-fluid">

              <div class="span9">
                <div class="control-group">
                  <div class="controls">
                    <label>Title :</label>
                    <input type="text" name="judul" readonly="readonly" class="span12" value="<?php echo $r['judul'] ?>">
                  </div>
                 </div>
              </div>
              <div class="span3">
                <div class="control-group">
                  <div class="controls">
                    <label>Date Updated :</label>
                    <input type="text" name="tgl" readonly="readonly" class="span12" value="<?php echo $tgl ?>">
                  </div>
                 </div>
              </div>
            <div class="widget-box">
          <div class="widget-title bg_ly"><span class="icon"><i class="icon-user"></i></span>
            <h5>Comments</h5>
          </div>
          <div class="widget-content nopadding fix_hgt">
            <ul class="recent-posts">
            <table border="0" width="100%">
<?php 
          $qCom=mysql_query("select * from comment where id_news='$id'") or die("".mysql_error());
          $jumComment=mysql_num_rows($qCom);
          if($jumComment==0){
            echo "<center><code> Belum Ada Komentar di berita ini.
                  <br/>Isi form dibawah untuk memberi komentar.</code></center>";
          }else{
          while($rComment=mysql_fetch_assoc($qCom)){ 
            $qBls=mysql_query("select * from bls_comment where id_comment='$rComment[no]'");

            $tgl=tgl_indo($rComment['tgl']);
?>
            <tr>
            <td colspan="2">  
              <li class="clearfix">
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="img/demo/av3.jpg"> </div>
                <div class="article-post"> <span class="user-info" style="color:red;"> By: <?php echo ucwords($rComment['nama']) ?> / Date Time: <?php echo $tgl ?></span>
                  <p><?php echo ucfirst($rComment['komentar']) ?></p>
                </div>

              </li>
            </td>
            <td>
            <div class="pull-right"><?php if(mysql_num_rows($qBls)==0) { ?>
             <form method="post" action="actNews-<?php echo $rComment['no'] ?>-deleteComment.html">
                <a class="btn btn-mini btn-primary" href="#" onclick="javascript:blsComment('<?php echo $rComment['no'] ?>','<?php echo $id ?>')" title="Reply Task"><i class="icon-retweet"></i> </a><?php }else{ ?>
                <form method="post" action="actNews-<?php echo $rComment['no'] ?>-deleteComment.html"> <?php } ?>
                <input type="hidden" name="idNews" value="<?php echo $id ?>"> 
                <button class="btn btn-mini btn-warning" title="Delete" onClick="return confirm ('Yakin data akan diHapus?')"><i class="icon-remove"></i></button>
            </form>
            </div>
            </td>
            </tr>
<?php
          
          while($rBls=mysql_fetch_array($qBls)){
            $tglBls=tgl_indo($rBls['tgl']);
            $qmax=mysql_query("select max(no) as tertinggi from bls_comment where id_comment='$rComment[no]'");
            $rmax=mysql_fetch_array($qmax);
?>
            <tr>
            <td width="5%">
            </td>
            <td>
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="img/demo/<?php if($rBls['user']=='a') { ?>av2.jpg<?php } else { ?>av5.jpg<?php } ?>"> </div>
                <div class="article-post"> <span class="user-info" style="color:maroon"> By: <?php echo ucwords($rBls['nama']) ?> / Date Time: <?php echo $tglBls; if($rBls['user']=='a'){ echo " /Administrator."; } ?>  </span>
                  <p><?php echo ucfirst($rBls['komentar']) ?> </p>
                </div>
              </li>
            </td>
            <td> 
            <div class="pull-right"><?php if($rmax['tertinggi']==$rBls['no']){ ?>
            <form method="post" action="actNews-<?php echo $rBls['no'] ?>-deleteBlsComment.html">
              <a class="btn btn-mini btn-primary" href="#" onclick="javascript:blsComment('<?php echo $rComment['no'] ?>','<?php echo $id ?>')" title="Reply Task"><i class="icon-retweet"></i> </a><?php  }else{ ?>
              <form method="post" action="actNews-<?php echo $rBls['no'] ?>-deleteBlsComment.html"> <?php } ?>
              <input type="hidden" name="idNews" value="<?php echo $id ?>">  
              <button class="btn btn-mini btn-warning" title="Delete" onClick="return confirm ('Yakin data akan diHapus?')"><i class="icon-remove"></i></button>
            </form>
            </div>
            
            </td>
            </tr>
<?php }}} ?>

          </table>
             
            </ul>
          </div>
          <div class="chat-message well">
              <form name="comment" method="post" action="actNews-addComment.html">
                <button class="btn btn-success">Send</button>
                <span class="input-box">
                <input type="hidden" name="idNews" value="<?php echo $id ?>"/>
                <input type="text" name="comment" id="msg-box" placeholder="Input Your Meessage .." />
                </span>
              </form>
          </div>
        </div>
        <a href="news.html" class="btn btn-default"><i class="icon icon-arrow-left"></i> Back To News</a>
          </div>
        </div>
      </div>              
    </div>
  </div>
</div>

 <div class="modal hide" id="addBlsComment" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Comment Reply</h4>
          </div>
          <div class="modal-body">
            <form name="fmBlsComment" id="basic_validate" method="post" action="actNews-blsComment2.html">
                <input type="hidden" name="id">
                <input type="hidden" name="idNews" value="<?php echo $id ?>"/>
                <div class="control-group">
                <!--<div class="control-label">Name* :</div>
                <div class="controls"> 
                <input type="text" name="nama" class="span5" required placeholder="Your Name">
                </div>
                </div>
                <hr>
                <div class="control-group">
                <div class="control-label">Email* :</div>
                <div class="controls"> 
                <input type="text" id="email" name="email" class="span5" required placeholder="Your Email">
                </div>
                </div>
                <hr>-->
                <div class="control-group">
                <div class="control-label">Comment* :</div>
                <div class="controls"> 
                <textarea name="comment" class="span5" rows="5" wrap="of" required placeholder="Your Komentar"></textarea>
                </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button class="btn btn-success" type="submit" name="tombolproses"><i class="icon icon-save"></i> Save</button>
          </div>
            </form>
        </div>
      </div>
    </div>
