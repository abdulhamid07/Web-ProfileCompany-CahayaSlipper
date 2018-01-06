<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
  <a href="#" title="Go to" class="tip-bottom"> Web Setting</a><a href="#" title="Go to" class="tip-bottom"> Menu Dan Sub Menu</a>
  </div>
</div>
    <div class="container-fluid">
    	<div class="widget-box">
         	<div class="widget-title">
          		<span class="icon"> <i class="icon icon-cogs"></i> Web Setting</span>
          		<span class="icon"><a href="#" data-toggle="modal" data-target="#addModalMain" class="btn btn-mini btn-danger"><i class="icon icon-plus"></i> Main Menu</a></span>
          		<span class="icon"><a href="#" data-toggle="modal" data-target="#addModalSub" class="btn btn-mini btn-warning"><i class="icon icon-plus"></i> Product Categories</a></span>
         	</div>
         	<div class="widget-content">  
         	<?php getMessage(); ?>
  				<div class="row-fluid">
         	 <?php
         	 
         	 include "mainMenu.php";
         	 include "subMenu.php"; ?>
         	 	</div>
         	 </div>
         </div>
    </div>