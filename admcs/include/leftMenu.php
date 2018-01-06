<?php  $md=$_GET['fModule']; 
$company=array('aboutAndContact','emailTestimoni','productsAndServices');
$setting=array('logoSlider','menuSubmenu');
  
?>  

  <ul>
    <li <?php if($md=='dashboard'){ ?>class="active"<?php } ?>><a href="index.html"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="<?php if(in_array($md, $setting)){ ?>active<?php } ?> submenu"> <a href="#"><i class="icon icon-cogs"></i> <span>Web Setting</span><span class="label label-info"><i class="icon icon-chevron-down"></i></span></a>
      <ul>
        <li <?php if($md=='logoSlider'){ ?>class="active"<?php } ?>><a href="logoslider.html"><i class="icon-chevron-right"></i> Logo & Slider</a></li>
        <li <?php if($md=='menuSubmenu'){ ?>class="active"<?php } ?>><a href="menu.html"><i class="icon-chevron-right"></i> Menu & Sub Menu</a></li>
      </ul>
    </li>
    <li class="<?php if(in_array($md, $company)){ ?>active<?php } ?> submenu"> <a href="#"><i class="icon icon-folder-open"></i> <span>Company Data</span><span class="label label-info"><i class="icon icon-chevron-down"></i></span></a>
      <ul>
        <li <?php if($md=='productsAndServices'){ ?>class="active"<?php } ?>><a href="product.html"><i class="icon-chevron-right"></i> Products &amp; Services</a></li>
        <li <?php if($md=='emailTestimoni'){ ?>class="active"<?php } ?>><a href="email.html"><i class="icon-chevron-right"></i> Emails & Testimoni</a></li>
        <li <?php if($md=='aboutAndContact'){ ?>class="active"<?php } ?>><a href="about.html"><i class="icon-chevron-right"></i> About Us &amp; Contact</a></li>
      </ul>
    </li>
    <li <?php if($md=='news'){ ?>class="active"<?php } ?>> <a href="news.html"><i class="icon icon-book"></i> <span>News &amp; Comments</span></a> </li>
    <li <?php if($md=='OrDers123'){ ?>class="active"<?php } ?>> <a href="orders.html"><i class="icon icon-shopping-cart"></i> <span>Orders & Customers</span></a> </li>
      <li> <a href="#report" data-toggle="modal"><i class="icon-paste"></i> <span>Report</span></a> 
  </ul>