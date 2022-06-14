<?php
require_once('../../config/koneksi.php');

if(isset($_POST["sumbit_berkas"])) {
    $id_user =  mysqli_real_escape_string($con,$_POST['id_user']);

    $output = '';
    if($_FILES['berkas']['name'] != ''){
       $file_name = $_FILES['berkas']['name'];
       $tmp_file = $_FILES['berkas']['tmp_name'];

       $nama_acak = round(microtime(true)) . '.';
       $nama_baru = $nama_acak.'_'.$file_name;

       $array = explode("_", $nama_baru);
       $name = $array[0];
       $ext = $array[1];
       if($ext == 'zip'){
          $path = '../folder/berkas/';
          $location = $path . $nama_baru;
            //if (!file_exists($path))
            //mkdir($path);

          if(move_uploaded_file($tmp_file, $location)){
            $query="UPDATE `user_berkas` SET `berkas` = '$nama_baru', `stat_berkas` = 1 WHERE id_user = '$id_user'";
            $result= mysqli_query($con, $query);
           
              //$zip = new ZipArchive;
              // if($zip->open($location)){
              //    $zip->extractTo($path);
              //    $zip->close();
              // }
              // unlink($location);//ini buat apa yaa?
              if ($query) {
                  echo "<script>alert('Berkas berhasil diupload'); 
                          location.href='../leader/berkas.php' </script>";
              } else {
                  echo "<script>alert('Data ketua gagal diupload'); 
                          location.href='../leader/berkas.php' </script>";

              }
          }
        } else {
          echo "<script>
                  alert('Hanya .zip yang diperbolehkan'); 
                  location='../leader/berkas.php';
              </script>";
        }
    }

    

}
