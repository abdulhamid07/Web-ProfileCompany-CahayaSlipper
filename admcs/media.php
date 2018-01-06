<?php
require_once "../config/functions.php";
        if (empty($_SESSION['id'])){
                header('location:error.html');
                } else {
        if (ISSET($_SESSION['id']))
            {
        if (!login_check()) {
            header("Location: logout.php?tanda=time");
        exit(0);
            }else {
  include "../config/koneksi.php";
  include "../config/query.php";
  include "../config/anti_injection.php";
  include "../config/notify.php";
  include "../config/fungsi_indotgl.php";
  include "../config/fungsi_rupiah.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Cahaya Slipper Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Cahayaslipper.com, cahaya slipper, sandal hotel jogja,sandal hotel">
<meta name="author" content="Abdul Hamid & Endra Setiawan | Zada Media Yogyakarta | hamyd.abdul6@gmail.com & setiaendra18@gmail.com">
<link rel="icon" type="image/png" href="img/icon.png">
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/colorpicker.css" />
<link rel="stylesheet" href="css/datepicker.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link rel="stylesheet" href="css/bootstrap-wysihtml5.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <a href="index.html"><img src="img/logo.png" alt="logo" width="150px" height="50px"></a>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
 <?php
    include "include/topMenu.php";
 ?>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
  <div style="float:right;" id="search">
    <a href="#about" data-toggle="modal" class="btn btn-info btn-mini"><i class="icon icon-question-sign"></i></a>
  </div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
<?php
  include "include/leftMenu.php";
?>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<?php
  include "select.php";
?>
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> <code>2017 &copy; Zada Media Technology. All Right Rerserved</code> </div>
</div>
<div class="modal hide" id="report" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" id="myModalLabel">Report Product Sale</h4>
                </div>
              <div class="modal-body" >
                <form action="report.html" method="POST" target="_blank">
                  <label>Date :</label>
                    <div  data-date="" class="input-append date datepicker">
                      <input name="awal" type="text" placeholder="Tanggal Awal"  data-date-format="mm-dd-yyyy" class="span2" value="" readonly="" />
                      <span class="add-on"><i class="icon-calendar"></i></span>
                    </div>To
                    <div  data-date="" class="input-append date datepicker">
                      <input name="akhir" type="text" placeholder="Tanggal Akhir"  data-date-format="mm-dd-yyyy" class="span2" value="" readonly="" />
                      <span class="add-on"><i class="icon-calendar"></i></span>
                    </div>
                    <label>Status Order :</label>
                    <select name="status" required>
                      <option value="">-- Status Order --</option>
                      <option value="Lunas">Lunas</option>
                      <option value="Proses">Proses</option>
                      <option value="Batal">Batal</option>
                    </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-success"><i class="icon icon-file"></i> Get PDF</button>
              </div>
              </form>
            </div>
          </div>
        </div>

<script src="js/excanvas.min.js"></script> 
<script src="js/jquery.flot.min.js"></script> 
<script src="js/jquery.flot.resize.min.js"></script> 
<script src="js/matrix.dashboard.js"></script> 
<script src="js/jquery.gritter.min.js"></script> 
<script src="js/jquery.wizard.js"></script> 
<script src="js/matrix.popover.js"></script>
<script src="js/wysihtml5-0.3.0.js"></script> 
<script src="js/ckeditor/ckeditor.js"></script>

<!-- data tables -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.ui.custom.js"></script>  
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.validate.js"></script> 
<script src="js/matrix.form_validation.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.tables.js"></script>

<script src="js/bootstrap-colorpicker.js"></script> 
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.toggle.buttons.js"></script>
<script src="js/masked.js"></script>
<script src="js/jquery.uniform.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/matrix.js"></script>
<script src="js/matrix.form_common.js"></script>
<script src="js/jquery.peity.min.js"></script> 








<script src="js/jquery.fusioncharts.debug.js"></script> 
  <script type="text/javascript">
    $('#user').convertToFusionCharts({
        swfPath: "js/Charts/",
        type: "MSColumn3D",
        data: "#user",
        dataFormat: "HTMLTable"
    });
</script>


<script>
    function blsComment(no,idnews){
      var commid=no;
      var commidnews=idnews;

      document.fmBlsComment.id.value=commid;
      document.fmBlsComment.idNews.value=commidnews;
    $('#addBlsComment').modal('show');
        }
    </script>
<script>
    function editService(no,judul,ket){
      var servid=no;
      var servjudul=judul;
      var servket=ket;

      document.serv.no.value=servid;
      document.serv.judul.value=servjudul;
      document.serv.ket.value=servket;
    $('#modalEditService').modal('show');
        }
    </script>
  <script>
    function fungsiEditContact(no,name,kontak){
      var contactid=no;
      var contactnama=document.getElementById("kontak");
      var contactlink=kontak;
      var cnama=name;

      document.editContact.no.value=contactid;
      contactnama.innerHTML=cnama+(" :");
      document.editContact.link.value=contactlink;
    $('#modalEditContact').modal('show');
        }
    </script>

    <script>
    function fungsiEditProfil(no,deskripsi){
      var aboutid=no;
      var aboutprofile=deskripsi;
      document.editProfile.no.value=aboutid;
      document.editProfile.deskripsi.value=aboutprofile;
      $('#modalEditP').modal('show');
      }
  </script>

  <script>
    function modalEditTest(no,nama,perusahaan,pesan){
      var testid=no;
      var testnama=nama;
      var testperusahaan=perusahaan;
      var testpesan=pesan;
      document.editTest.no.value=testid;
      document.editTest.nama.value=testnama;
      document.editTest.perusahaan.value=testperusahaan;
      document.editTest.testimoni.value=testpesan;
      $('#editModalTest').modal('show');
    }
  </script>


<!-- edit logo-->
<script type="text/javascript">
            $(function() {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
                //bootstrap WYSIHTML5 - text editor
                $('.textarea_editor').wysihtml5();
            });
        </script>
<script>
  $(document).on("click",".GantiLogo", function(){
  var myLogoId = $(this).data("id");
  var myLogoTitle= $(this).data("title");
  var myLogoImage = $(this).data("image");
  var myLogoAktif = $(this).data("aktif");

  $(".modal-body #idlogo").val(myLogoId);
  $(".modal-body #titlelogo").val(myLogoTitle);
  $(".modal-body #imagelogo").val(myLogoImage);
  $(".modal-body #aktiflogo").val(myLogoAktif);


  });
  </script>
<!-- edit slider-->
  <script>
  $(document).on("click",".editSlider", function(){
  var idSlider = $(this).data("id");
  var ketSlider= $(this).data("ket");
  var imgSlider = $(this).data("image");

  $(".modal-body #idslider").val(idSlider);
  $(".modal-body #ketslider").val(ketSlider);
  $(".modal-body #imageslider").val(imgSlider);


  });
  </script>
  <script>
        function modalEditMain(no,menu,aktif,link){
            var mainid=no;
            var mainmenu=menu;
            var mainakt=aktif;
            var mainlink=link;
            document.editMainMenu.no.value=mainid;
            document.editMainMenu.menu.value=mainmenu;
            document.editMainMenu.link.value=mainakt;
            document.editMainMenu.aktif.value=mainlink;
            $('#modalEditMain').modal('show');
        }
  </script>
  <script>
        function modalEditSub(no,kd_main,nmSub_menu,link){
            var subid=no;
            var submain=kd_main;
            var submenu=nmSub_menu;
            var sublink=link;
            document.editSubMenu.no.value=subid;
            document.editSubMenu.main.value=submain;
            document.editSubMenu.menu.value=submenu;
            document.editSubMenu.link.value=sublink;
             $('#editModalSub').modal('show');
        }
  </script>
      <script>
        function seeMessage(no,nama,email,subjek,pesan,tgl){
            var messid=no;
            var messnama=document.getElementById("myModalLabel");
            var mnama=nama;
            var messemail=email;
            var messsubjek=subjek;
            var messpesan=pesan;
            var messtgl=document.getElementById("tgl");;
            var mtgl=tgl;
            document.seemess.no.value=messid;
            messnama.innerHTML=mnama;
            messtgl.innerHTML=mtgl;
            document.seemess.email.value=messemail;
            document.seemess.subjek.value=messsubjek;
            document.seemess.pesan.value=messpesan;
             $('#seeReply').modal('show');
        }
    </script>
    <script>
        function replyMessage(no,email){
            var replyid=no;
            var replyemail=email;
            document.replypesan.no.value=replyid;
            document.replypesan.email.value=replyemail;
             $('#replyModal').modal('show');
        }
    </script>

  <script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
<?php }}} ?>