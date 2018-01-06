<?php $serv=$_GET['id']; ?>
<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
  <a href="#" title="Go to" class="tip-bottom"> Data Company
  </a><a href="#" title="Go to" class="tip-bottom"> Products And Services</a>
  </div>
</div>
    <div class="container-fluid">
        <div class="widget-box">
          <div class="widget-title">
          <span class="icon"> <i class="icon icon-folder-open"></i> Data Company</span>
            <ul class="nav nav-tabs">
              <li <?php if($serv!='services'){ ?>class="active"<?php }else{} ?>><a data-toggle="tab" href="#tab1"><i class="icon icon-truck"></i> Products</a></li>
              <li <?php if($serv=='services'){ ?>class="active"<?php } ?>><a data-toggle="tab" href="#tab2"><i class="icon icon-ok-sign"></i> Services</a></li>
            </ul>
          </div>
          <div class="widget-content tab-content">
          <?php getMessage(); ?>
            <div id="tab1" class="tab-pane <?php if($serv!='services'){ ?>active<?php }else{} ?>">
              <?php include "product.php"; ?>  
            </div>
            <div id="tab2" class="tab-pane <?php if($serv=='services'){ ?>active<?php } ?>"> 
            <?php include "services.php"; ?>
            </div>
          </div>
        </div>
      </div>