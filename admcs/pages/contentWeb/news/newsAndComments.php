<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
  <a href="#" title="Go to" class="tip-bottom"> News And Comments
  </a>
  </div>
</div>
    <div class="container-fluid">
        <div class="widget-box">
          <div class="widget-title">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#tab1"><i class="icon icon-copy"></i> Data News</a></li>
            </ul>
          </div>
          <div class="widget-content tab-content">
          <?php getMessage(); ?>
            <div id="tab1" class="tab-pane active">
              <?php include "news.php"; ?>  
            </div>
          </div>
        </div>
      </div>