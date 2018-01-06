<?php
function getMessage(){
	switch(@$_GET['err'])
	{
		case 1: echo "<div class=\"alert alert-danger alert-dismissable\">
                                        <i class=\"icon icon-check\"></i>
                                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
		Delete Success.</div>"; break;
		case 2: echo "<div class=\"alert alert-success alert-dismissable\">
                                        <i class=\"icon icon-check\"></i>
                                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
		Edit Success.</div>"; break;
		case 3: echo "<div class=\"alert alert-info alert-dismissable\">
												<i class=\"icon icon-check\"></i>
												<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
		Added Success.</div>"; break;
		case 4: echo "<div class=\"alert alert-warning alert-dismissable\">
												<i class=\"icon icon-warning\"></i>
												<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
		Delete Failed.</div>"; break;
		case 5: echo "<div class=\"alert alert-warning alert-dismissable\">
												<i class=\"icon icon-warning\"></i>
												<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
		Edit Failed.</div>"; break;
		case 6: echo "<div class=\"alert alert-warning alert-dismissable\">
												<i class=\"icon icon-warning\"></i>
												<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
		Add Failed.</div>"; break;

		case 7: echo "<div class=\"alert alert-warning alert-dismissable\">
												<i class=\"icon icon-warning\"></i>
												<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
		Username or Password Incorrect.</div></div>"; break;
		case 8: echo "<div class=\"alert alert-warning alert-dismissable\">
												<i class=\"icon icon-warning-sign\"></i>
												<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
		Gagal Diedit (Ukuran maksimal gambar 3 mb dan ekstensi gambar yang diizinkan = jpeg/bmp/png/gif)</div>"; break;
		case 9: echo "<div class=\"alert alert-danger alert-dismissable\">
                                        <i class=\"icon icon-check\"></i>
                                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
		Delete Comment Success.</div>"; break;
		case 10: echo "<div class=\"alert alert-success alert-dismissable\">
                                        <i class=\"icon icon-check\"></i>
                                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
		Reply Comment Success.</div>"; break;
		case 11: echo "<div class=\"alert alert-info alert-dismissable\">
												<i class=\"icon icon-check\"></i>
												<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
		Added New Comment Success.</div>"; break;
		case 12: echo "<div class=\"alert alert-warning alert-dismissable\">
												<i class=\"icon icon-warning\"></i>
												<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
		Silahkan Login Kembali.</div></div>"; break;
		
	}
}

?>