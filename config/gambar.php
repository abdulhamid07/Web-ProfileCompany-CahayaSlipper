<?php
function gambar($fupload_name){
  //direktori gambar
  $vdir_upload1 = "../../../../img/product/";

  $vfile_upload1 = $vdir_upload1 . $fupload_name;

  $TipeFile1   = $_FILES['image1']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["image1"]["tmp_name"], $vfile_upload1);

  //identitas file asli  
  if ($TipeFile1=="image/jpeg" ){
      $im_src1 = imagecreatefromjpeg($vfile_upload1);
      }elseif ($TipeFile1=="image/png" ){
      $im_src1 = imagecreatefrompng($vfile_upload1);
      }elseif ($TipeFile1=="image/gif" ){
      $im_src1 = imagecreatefromgif($vfile_upload1);
      }elseif ($TipeFile1=="image/wbmp" ){
      $im_src1 = imagecreatefromwbmp($vfile_upload1);
    }
    
  $src_width1 = imageSX($im_src1);
  $src_height1 = imageSY($im_src1);


  $dst_width = 185;
  $dst_height = 207;

  $dst_width1 = 450;
  $dst_height1 = 678;


 //proses perubahan ukuran
  $im1 = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im1, $im_src1, 0, 0, 0, 0, $dst_width, $dst_height, $src_width1, $src_height1);

  $im2 = imagecreatetruecolor($dst_width1,$dst_height1);
  imagecopyresampled($im2, $im_src1, 0, 0, 0, 0, $dst_width1, $dst_height1, $src_width1, $src_height1);


  //Simpan gambar
   if ($_FILES["image1"]["type"]=="image/jpeg" ){
      imagejpeg($im1,$vdir_upload1 . "small_" . $fupload_name);
      imagejpeg($im2,$vdir_upload1 . "big_" . $fupload_name);
      }
    elseif ($_FILES["image1"]["type"]=="image/png" ){
      imagepng($im1,$vdir_upload1 . "small_" . $fupload_name);
      imagepng($im2,$vdir_upload1 . "big_" . $fupload_name);
      }
    elseif ($_FILES["image1"]["type"]=="image/gif" ){
      imagegif($im1,$vdir_upload1 . "small_" . $fupload_name);
      imagegif($im2,$vdir_upload1 . "big_" . $fupload_name);
      }
    elseif($_FILES["image1"]["type"]=="image/wbmp" ){
      imagewbmp($im1,$vdir_upload1 . "small_" . $fupload_name);
      imagewbmp($im2,$vdir_upload1 . "big_" . $fupload_name);
      }

  unlink($vfile_upload1);
  //Hapus gambar di memori komputer
  imagedestroy($im_src1);
  imagedestroy($im1);
  imagedestroy($im2);


}

function gambar2($fupload_name2){
  //direktori gambar
  $vdir_upload2 = "../../../../img/product/";

  $vfile_upload2 = $vdir_upload2 . $fupload_name2;
 
  $TipeFile2   = $_FILES['image2']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["image2"]["tmp_name"], $vfile_upload2);

  //identitas file asli  
     if ($TipeFile2=="image/jpeg" ){
      $im_src2 = imagecreatefromjpeg($vfile_upload2);
      }elseif ($TipeFile2=="image/png" ){
      $im_src2 = imagecreatefrompng($vfile_upload2);
      }elseif ($TipeFile2=="image/gif" ){
      $im_src2 = imagecreatefromgif($vfile_upload2);
      }elseif ($TipeFile2=="image/wbmp" ){
      $im_src2 = imagecreatefromwbmp($vfile_upload2);
    }

  $src_width2 = imageSX($im_src2);
  $src_height2 = imageSY($im_src2);

  $dst_width4 = 185;
  $dst_height4 = 207;


  $dst_width2 = 450;
  $dst_height2 = 678;

 //proses perubahan ukuran
 

  $im3 = imagecreatetruecolor($dst_width4,$dst_height4);
  imagecopyresampled($im3, $im_src2, 0, 0, 0, 0, $dst_width4, $dst_height4, $src_width2, $src_height2);

  $im4 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im4, $im_src2, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width2, $src_height2);


        //Simpan gambar
   if ($_FILES["image2"]["type"]=="image/jpeg" ){
      imagejpeg($im3,$vdir_upload2 . "small_" . $fupload_name2);
      imagejpeg($im4,$vdir_upload2 . "big_" . $fupload_name2);
      }
    elseif ($_FILES["image2"]["type"]=="image/png" ){
      imagepng($im3,$vdir_upload2 . "small_" . $fupload_name2);
      imagepng($im4,$vdir_upload2 . "big_" . $fupload_name2);
      }
    elseif ($_FILES["image2"]["type"]=="image/gif" ){
      imagegif($im3,$vdir_upload2 . "small_" . $fupload_name2);
      imagegif($im4,$vdir_upload2 . "big_" . $fupload_name2);
      }
    elseif($_FILES["image2"]["type"]=="image/wbmp" ){
      imagewbmp($im3,$vdir_upload2 . "small_" . $fupload_name2);
      imagewbmp($im4,$vdir_upload2 . "big_" . $fupload_name2);
      }

 unlink($vfile_upload2);
  //Hapus gambar di memori komputer
  imagedestroy($im_src2);
 
  imagedestroy($im3);
  imagedestroy($im4);
  
}

function gambar3($fupload_name3){
  //direktori gambar

  $vdir_upload3 = "../../../../img/product/";

  $vfile_upload3 = $vdir_upload3 . $fupload_name3;
 
  $TipeFile3   = $_FILES['image3']['type'];

  move_uploaded_file($_FILES["image3"]["tmp_name"], $vfile_upload3);

  //identitas file asli  
    if ($TipeFile3=="image/jpeg" ){
      $im_src3 = imagecreatefromjpeg($vfile_upload3);
      }elseif ($TipeFile3=="image/png" ){
      $im_src3 = imagecreatefrompng($vfile_upload3);
      }elseif ($TipeFile3=="image/gif" ){
      $im_src3 = imagecreatefromgif($vfile_upload3);
      }elseif ($TipeFile3=="image/wbmp" ){
      $im_src3 = imagecreatefromwbmp($vfile_upload3);
    }
 

  $src_width3 = imageSX($im_src3);
  $src_height3 = imageSY($im_src3);

  $dst_width5 = 185;
  $dst_height5 = 207;

  $dst_width3 = 450;
  $dst_height3 = 678;

 //proses perubahan ukuran
  $im5 = imagecreatetruecolor($dst_width5,$dst_height5);
  imagecopyresampled($im5, $im_src3, 0, 0, 0, 0, $dst_width5, $dst_height5, $src_width3, $src_height3);

  $im6 = imagecreatetruecolor($dst_width3,$dst_height3);
  imagecopyresampled($im6, $im_src3, 0, 0, 0, 0, $dst_width3, $dst_height3, $src_width3, $src_height3);

        //Simpan gambar
   if ($_FILES["image3"]["type"]=="image/jpeg" ){
      imagejpeg($im5,$vdir_upload3 . "small_" . $fupload_name3);
      imagejpeg($im6,$vdir_upload3 . "big_" . $fupload_name3);
      }
    elseif ($_FILES["image3"]["type"]=="image/png" ){
      imagepng($im5,$vdir_upload3 . "small_" . $fupload_name3);
      imagepng($im6,$vdir_upload3 . "big_" . $fupload_name3);
      }
    elseif ($_FILES["image3"]["type"]=="image/gif" ){
      imagegif($im5,$vdir_upload3 . "small_" . $fupload_name3);
      imagegif($im6,$vdir_upload3 . "big_" . $fupload_name3);
      }
    elseif($_FILES["image3"]["type"]=="image/wbmp" ){
      imagewbmp($im5,$vdir_upload3 . "small_" . $fupload_name3);
      imagewbmp($im6,$vdir_upload3 . "big_" . $fupload_name3);
    }
  
   unlink($vfile_upload3);
  //Hapus gambar di memori komputer
  imagedestroy($im_src3);
  imagedestroy($im5);
  imagedestroy($im6);

}
?>