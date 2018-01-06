<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
  <a href="#" title="Go to" class="tip-bottom"> Data Company
  </a><a href="#" title="Go to" class="tip-bottom"> About Us And Contact</a>
  </div>
</div>
    <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title">
            <span class="icon"> <i class="icon icon-folder-open"></i> Data Company</span>
          </div>
         <div class="widget-content">  
          <?php getMessage(); ?>
          <div class="row-fluid">
           <?php
           
           include "about.php";
           ?>
            </div>
           </div>
          </div>
        </div>
      </div>
        </div>
      </div>

    <div class="modal hide" id="modalEditContact">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Edit Contact</h4>
          </div>
          <div class="modal-body">
            <form action="actAbout-editContact.html" method="POST" name="editContact" enctype="multipart/form-data">
            <label id="kontak">:</label>
            <input type="hidden" name="no"/>
              <textarea name="link" class="span5" rows="3" wrap="on" placeholder="input your contact name .."></textarea>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button class="btn btn-success" type="submit" name="tombolproses"><i class="icon icon-save"></i> Update</button>
          </div>
      </form>
        </div>
      </div>
    </div>