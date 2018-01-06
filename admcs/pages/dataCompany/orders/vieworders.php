<?php $cust=$_GET['id']; ?>
<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
  <a href="#" title="Go to" class="tip-bottom"> Orders And Customers
  </a>
  </div>
</div>
    <div class="container-fluid">
        <div class="widget-box">
          <div class="widget-title">
            <ul class="nav nav-tabs">
              <li <?php if($cust!='customers'){ ?>class="active"<?php }else{} ?>><a data-toggle="tab" href="#tab1"><i class="icon icon-shopping-cart"></i> Data Orders</a></li>
              <li <?php if($cust=='customers'){ ?>class="active"<?php } ?>><a data-toggle="tab" href="#tab2"><i class="icon icon-heart"></i> Data Customers</a></li>
            </ul>
          </div>
          <div class="widget-content tab-content">
          <?php getMessage(); ?>
            <div id="tab1" class="tab-pane <?php if($cust!='customers'){ ?>active<?php }else{} ?>">
              <?php include "orders.php"; ?>  
            </div>
            <div id="tab2" class="tab-pane <?php if($cust=='customers'){ ?>active<?php } ?>">
              <?php include "customers.php"; ?>  
            </div>
          </div>
        </div>
      </div>