<script type="text/javaScript">
function buka(url)
{newwindow = window.open(url, '_blank', "status=yes, height=300, width=400, resizeable=yes");}
</script>
<?php
$hostname = '{imap.gmail.com:993/ssl/novalidate-cert}[Gmail]/All Mail';
$username = 'abdulhamid.dev@gmail.com';
$password = 'PSMSmedan37';
$mbox = imap_open($hostname,$username,$password) or die('Cannot connect to mail server: ' . imap_last_error());
$mbox = imap_open($hostname,$username,$password,NULL,1) or die('Cannot connect to Gmail: ' . print_r(imap_errors()));
$MC=imap_check($mbox);
$MN=$MC->Nmsgs;
$overview=imap_fetch_overview($mbox,"1:$MN",0);
$size=sizeof($overview);
?>        
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><a href="#myModalAdd" data-toggle="modal" class="btn btn-mini btn-danger"><i class="icon icon-pencil"></i> New Message</a></span>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" >
              <thead>
                <tr>
                  <th><a href="#"><i class="icon icon-sort"></i> No</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> From</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Email</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Date</a></th>
                  <th><a href="#"><i class="icon icon-sort"></i> Subject</a></th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
          <?php
            for($i=$size-1;$i>=0;$i--)
              {   $val=$overview[$i];
                  $msg=$val->msgno;
                  $date=date('Y-m-d H:i:s', strtotime($val->date));
                  $subj=isset($val->subject)?$val->subject:"(no subject)";
                  $header = imap_header($mbox, $msg);
                  $from = $header->from;
                  $email_size = $val->size;
                  foreach ($from as $id => $object) 
                  {   $fromname = isset($object->personal)?$object->personal:$object->mailbox;
                      $fromaddress = $object->mailbox . "@" . $object->host;
                  }
          ?>

                <tr class="gradeA">
                  <td><?php echo $msg; ?></td>
                  <td><?php echo ucwords($fromname); ?></td>
                  <td><?php echo ucfirst($fromaddress); ?></td>
                  <td><?php echo $date; ?></td>
                  <td><?php echo $subj; ?></td>
                  <td><center>
                  <a href="detailEmail-<?php echo $r['no'] ?>.html" class="tip-top" title="Detail Message">
                  <button class="btn btn-mini btn-primary"><i class="icon icon-edit"></i></button></a>
                  <a href="actEmail-<?php echo $r['no'] ?>-deleteEmail.html" onClick="return confirm ('Yakin data akan diHapus?')" title="Hapus Data" class="tip-bottom">
                  <button class="btn btn-mini"><i class="icon icon-trash"></i></button></a></center></td>

                </tr>
          <?php
            }
          ?>

              </tbody>
            </table>
          </div>
          <code>NB : Data yang ada dimenu Email ini adalah pesan dari customer yang dikirim melalui form website.</code>
        </div>
 <div class="modal hide" id="seeReply" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"></h4><span>Date Replied :</span> <span id="tgl" style="color:red"></span>
          </div>
          <div class="modal-body">
            <form name="seemess" method="post" action="actEmail-updateReply.html" onSubmit="return ValMenu()">
                <input type="hidden" name="no">
                <label>To : </label>
                <input type="text" name="email" class="span5" readonly="readonly">
                <hr>
                <label>Subjek : </label>
                <input type="text" name="subjek" class="span5" required>
                <hr>
                <label>Message : </label>
                <textarea name="pesan" class="span5" wrap="of" required></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button class="btn btn-success" type="submit" name="tombolproses"><i class="icon icon-save"></i> Resend</button>
          </div>
            </form>
        </div>
      </div>
    </div>