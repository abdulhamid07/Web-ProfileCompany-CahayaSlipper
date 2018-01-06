<?php $test=$_GET['id']; ?>
<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
  <a href="#" title="Go to" class="tip-bottom"> Data Company
  </a><a href="#" title="Go to" class="tip-bottom"> Email And Testimoni</a>
  </div>
</div>
    <div class="container-fluid">
        <div class="widget-box">
          <div class="widget-title">
          <span class="icon"> <i class="icon icon-folder-open"></i> Data Company</span>
            <ul class="nav nav-tabs">
              <li <?php if($test!='testimoni'){ ?>class="active"<?php }else{} ?>><a data-toggle="tab" href="#tab1"><i class="icon icon-envelope"></i> Email</a></li>
              <li <?php if($test=='testimoni'){ ?>class="active"<?php } ?>><a data-toggle="tab" href="#tab2"><i class="icon icon-comments"></i> Testimoni</a></li>
            </ul>
          </div>
          <div class="widget-content tab-content">
          <?php getMessage(); ?>
            <div id="tab1" class="tab-pane <?php if($test!='testimoni'){ ?>active<?php }else{} ?>">
              <?php include "email.php"; ?>  
            </div>
            <div id="tab2" class="tab-pane <?php if($test=='testimoni'){ ?>active<?php } ?>"> 
            <?php include "testimoni.php"; ?>
            </div>
          </div>
        </div>
      </div>