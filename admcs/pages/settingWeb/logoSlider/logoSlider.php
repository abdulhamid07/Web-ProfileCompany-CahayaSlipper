<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
  <a href="#" title="Go to" class="tip-bottom"> Setting Web</a><a href="#" title="Go to" class="tip-bottom"> Logo Dan Slider</a>
  </div>
</div>
    <div class="container-fluid">
        <div class="widget-box">
          <div class="widget-title">
          <span class="icon"> <i class="icon icon-cogs"></i> Setting Web</span>
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#tab1"><i class="icon icon-picture"></i> Logo</a></li>
              <li><a data-toggle="tab" href="#tab2"><i class="icon icon-film"></i> Slider</a></li>
            </ul>
          </div>
          <div class="widget-content tab-content">
          <?php getMessage(); ?>
            <div id="tab1" class="tab-pane active">
              <?php include "logo.php"; ?>  
            </div>
            <div id="tab2" class="tab-pane"> 
            <?php include "slider.php"; ?>
            </div>
          </div>
        </div>
      </div>