<?php
   include '../koneksi.php';
   include '../script/format_number.php';

   $q = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM santri");
   $rows = mysqli_num_rows($q) + 1;
   $santri_id = "tpa-sntr$rows";
?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../assets/plugin/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/plugin/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/plugin/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../assets/css/global.css">
</head>
<body class="hold-transition">
  <div class="content-wrapper" style="margin-left:0px ">
    <?php
       if (isset($_GET['edt'])) {

          if ($_GET['edt'] == "aktivitas") {
             $id = $_GET['id'];
             $nama = $_GET['nama'];
             $honor = $_GET['honor'];

             echo '<section class="content-header">';
               echo '<h1>';
                 echo 'Kegiatan';
                 echo '<small>| Edit Data</small>';
               echo '</h1>';
               echo '<ol class="breadcrumb">';
                 echo '<li><a href="kalender.php"><i class="fa fa-dashboard"></i>Beranda</a></li>';
                 echo '<li><a href="#">Pengaturan</a></li>';
                 echo '<li class="active">Manajemen Kegiatan</li>';
               echo '</ol>';
             echo '</section>';
             echo '<section class="content">';
               echo '<div class="row">';
                 echo '<div class="col-md-12">';
                   echo '<div class="box box-danger">';
                     echo '<div class="box-header with-border">';
                       echo '<h3 class="box-title">Edit Data Kegiatan</h3>';
                     echo '</div>';
                     echo '<form class="form-horizontal" action="edit.php" method="post">';
                       echo '<div class="box-body">';
                         echo '<div class="form-group">';
                           echo '<label class="col-sm-3 control-label">Id Kegiatan</label>';
                           echo '<div class="col-sm-6">';
                             echo '<input type="text" name="aktivitas_id" value="'.$id.'" readonly="readonly"  class="form-control">';
                           echo '</div>';
                         echo '</div>';
                         echo '<div class="form-group">';
                           echo '<label class="col-sm-3 control-label">Nama Kegiatan</label>';
                           echo '<div class="col-sm-6">';
                             echo '<input  type="text" name="aktivitas_name" value="'.$nama.'" autofocus class="form-control">';
                           echo '</div>';
                         echo '</div>';
                         echo '<div class="form-group">';
                           echo '<label class="col-sm-3 control-label">Honor Kegiatan</label>';
                           echo '<div class="col-sm-6">';
                             echo '<input type="text" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" name="aktivitas_pay" value="'.rupiahFormat($honor).'" class="form-control">';
                           echo '</div>';
                         echo '</div>';
                       echo '</div>';
                       echo '<div class="box-footer">';
                         echo '<button type="submit" name="aktivitas_upd" class="btn btn-flat btn-success pull-right" style="margin-left:15px">Update</button>';
                       echo '</div>';
                     echo '</form>';
                   echo '</div>';
                 echo '</div>';
               echo '</div>';
             echo '</section>';

            //  echo '<div class="">';
            //     echo '<form class="" action="edit.php" method="post">';
            //     echo '<div class="">';
            //        echo '<label for="">ID: </label>';
            //        echo '<span>'.$id.'</span>';
            //        echo '<input type="hidden" name="aktivitas_id" value="'.$id.'">';
            //     echo '</div>';
            //        echo '<div class="">';
            //           echo '<label for="">Aktivitas</label>';
            //           echo '<input type="text" name="aktivitas_name" value="'.$nama.'">';
            //        echo '</div>';
            //        echo '<div class="">';
            //           echo '<label for="">Honor</label>';
            //           echo '<input type="text" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" name="aktivitas_pay" value="'.rupiahFormat($honor).'">';
            //        echo '</div>';
            //        echo '<input type="submit" name="aktivitas_upd" value="Update">';
            //     echo '</form>';
            //  echo '</div>';
          }

          if ($_GET['edt'] == "slist") {
             $id = $_GET['id'];
             $nama = $_GET['nama'];

             echo '<section class="content-header">';
               echo '<h1>';
                 echo 'Santri';
                 echo '<small>| Edit Data</small>';
               echo '</h1>';
               echo '<ol class="breadcrumb">';
                 echo '<li><a href="kalender.php"><i class="fa fa-dashboard"></i>Beranda</a></li>';
                 echo '<li><a href="#">Data</a></li>';
                 echo '<li class="active">Santri</li>';
               echo '</ol>';
             echo '</section>';
             echo '<section class="content">';
               echo '<div class="row">';
                 echo '<div class="col-md-12">';
                   echo '<div class="box box-danger">';
                     echo '<div class="box-header with-border">';
                       echo '<h3 class="box-title">Edit Data Santri</h3>';
                     echo '</div>';
                     echo '<form class="form-horizontal" action="edit.php" method="post">';
                       echo '<div class="box-body">';
                         echo '<div class="form-group">';
                           echo '<label class="col-sm-3 control-label">Id Santri</label>';
                           echo '<div class="col-sm-6">';
                             echo '<input type="text" name="santri_id" value="'.$id.'"  readonly="readonly"  class="form-control">';
                           echo '</div>';
                         echo '</div>';
                         echo '<div class="form-group">';
                           echo '<label class="col-sm-3 control-label">Nama Santri</label>';
                           echo '<div class="col-sm-6">';
                             echo '<input  type="text" id="santri_name" name="santri_name" onFocus="this.select()" autofocus required value="'.$nama.'" class="form-control">';
                           echo '</div>';
                         echo '</div>';

                         echo '<div class="form-group">';
                           echo '<label class="col-sm-3 control-label">Wali Kelas</label>';
                           echo '<div class="col-sm-6">';
                             echo '<select class="form-control"  name="santri_walas">';
                               echo '<option selected="selected">--Pilih Wali Kelas--</option>';

                                  $query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pengajar where JABATAN = 'Walas'");
                                  if (mysqli_num_rows($query) != 0) {
                                     while ($data = mysqli_fetch_assoc($query)) {
                                          echo '<option value="'.$data['ID_PENGAJAR'].'">'.$data['NAMA_PENGAJAR'].'</option>';
                                     }
                                  }

                             echo '</select>';
                           echo '</div>';
                         echo '</div>';
                         echo '<div class="form-group">';
                           echo '<label class="col-sm-3 control-label">Tingkatan</label>';
                           echo '<div class="col-sm-6">';
                             echo '<select class="form-control" name="santri_tingkatan">';
                               echo '<option selected="selected">--Pilih Tingkatan--</option>';
                               echo '<option value="TK Jilid 1">TK Jilid 1</option>';
                               echo '<option value="TK Jilid 2">TK Jilid 2</option>';
                               echo '<option value="TK Jilid 3">TK Jilid 3</option>';
                               echo '<option value="TK Jilid 5">TK Jilid 5</option>';
                               echo '<option value="TK Jilid 4">TK Jilid 4</option>';
                               echo '<option value="TK Jilid 6">TK Jilid 6</option>';
                               echo '<option value="TK Al-Quran">TK Al-Quran</option>';
                               echo '<option value="SD Jilid 1">SD Jilid 1</option>';
                               echo '<option value="SD Jilid 2">SD Jilid 2</option>';
                               echo '<option value="SD Jilid 3">SD Jilid 3</option>';
                               echo '<option value="SD Jilid 3">SD Jilid 3</option>';
                               echo '<option value="SD Jilid 4">SD Jilid 4</option>';
                               echo '<option value="SD Jilid 5">SD Jilid 5</option>';
                               echo '<option value="SD Jilid 6">SD Jilid 6</option>';
                               echo '<option value="SD Kls 1 Quran">SD Kls 1 Quran</option>';
                               echo '<option value="SD Kls 2 Quran">SD Kls 2 Quran</option>';
                               echo '<option value="SD Kls 3 Quran">SD Kls 3 Quran</option>';
                               echo '<option value="SD Kls 4 Quran">SD Kls 4 Quran</option>';
                               echo '<option value="SD Kls 5 Quran">SD Kls 5 Quran</option>';
                               echo '<option value="SD Kls 6 Quran">SD Kls 6 Quran</option>';
                               echo '<option value="Al-Quran">Al-Quran</option>';
                             echo '</select>';
                           echo '</div>';
                         echo '</div>';
                         echo '<div class="form-group">';
                           echo '<label class="col-sm-3 control-label">Status</label>';
                           echo '<div class="col-sm-6">';
                             echo '<select class="form-control" name="santri_status">';
                               echo '<option value="Aktif" selected="selected">Aktif</option>';
                               echo '<option value="Tidak Aktif">Tidak Aktif</option>';
                             echo '</select>';
                           echo '</div>';
                         echo '</div>';
                       echo '</div>';
                       echo '<div class="box-footer">';
                         echo '<button  type="submit" name="edit_santri" id="edit_santri" class="btn btn-flat btn-success pull-right">Update</button>';
                       echo '</div>';
                     echo '</form>';
                   echo '</div>';
                 echo '</div>';
               echo '</div>';
             echo '</section>';

            //  echo '<div class="">';
            //     echo '<form class="" action="edit.php" method="post">';
            //        echo '<div class="">';
            //           echo '<label for="">ID: </label>';
            //           echo '<input type="text" name="santri_id" value="'.$id.'" readonly="readonly">';
            //        echo '</div>';
            //        echo '<div class="">';
            //           echo '<label for="">Nama: </label>';
            //           echo '<input type="text" id="santri_name" name="santri_name" onFocus="this.select()" autofocus required value="'.$nama.'">';
            //        echo '</div>';
             //
            //        echo '<div class="">';
            //           echo '<label for="">Walas: </label>';
            //           echo '<select class="" name="santri_walas">';
            //              echo '<option selected="selected">--Pilih Walas--</option>';
             //
            //                 $query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT ID_PENGAJAR, NAMA_PENGAJAR FROM pengajar WHERE JABATAN = 'walas' ");
            //                 if (mysqli_num_rows($query) != 0) {
            //                    while ($data = mysqli_fetch_assoc($query)) {
            //                       echo '<option value="'.$data['ID_PENGAJAR'].'">'.$data['NAMA_PENGAJAR'].'</option>';
            //                    }
            //                 }
             //
            //           echo '</select>';
            //        echo '</div>';
            //        echo '<div class="">';
            //           echo '<label for="">Tingkatan: </label>';
            //           echo '<select class="" name="santri_tingkatan">';
            //              echo '<option selected="selected">--Pilih Tingkatan--</option>';
            //              echo '<option value="TK Jilid 1">TK Jilid 1</option>';
            //              echo '<option value="TK Jilid 2">TK Jilid 2</option>';
            //              echo '<option value="TK Jilid 3">TK Jilid 3</option>';
            //              echo '<option value="TK Jilid 4">TK Jilid 4</option>';
            //              echo '<option value="TK Jilid 5">TK Jilid 5</option>';
            //              echo '<option value="TK Jilid 6">TK Jilid 6</option>';
            //              echo '<option value="TK Al-Quran">TK Al-Qur`an</option>';
            //              echo '<option value="SD Jilid 1">SD Jilid 1</option>';
            //              echo '<option value="SD Jilid 2">SD Jilid 2</option>';
            //              echo '<option value="SD Jilid 3">SD Jilid 3</option>';
            //              echo '<option value="SD Jilid 3">SD Jilid 3</option>';
            //              echo '<option value="SD Jilid 4">SD Jilid 4</option>';
            //              echo '<option value="SD Jilid 5">SD Jilid 5</option>';
            //              echo '<option value="SD Jilid 6">SD Jilid 6</option>';
            //              echo '<option value="SD Kls 1 Quran">SD Kls 1 Qur`an</option>';
            //              echo '<option value="SD Kls 2 Quran">SD Kls 2 Qur`an</option>';
            //              echo '<option value="SD Kls 3 Quran">SD Kls 3 Qur`an</option>';
            //              echo '<option value="SD Kls 4 Quran">SD Kls 4 Qur`an</option>';
            //              echo '<option value="SD Kls 5 Quran">SD Kls 5 Qur`an</option>';
            //              echo '<option value="SD Kls 6 Quran">SD Kls 6 Qur`an</option>';
            //              echo '<option value="Al-Quran">Al-Qur`an</option>';
            //           echo '</select>';
            //        echo '</div>';
            //        echo '<div class="">';
            //           echo '<label for="">Status: </label>';
            //           echo '<select class="" name="santri_status">';
            //              echo '<option value="Aktif" selected="selected">Aktif</option>';
            //              echo '<option value="Tidak Aktif">Tidak Aktif</option>';
            //           echo '</select>';
            //        echo '</div>';
            //        echo '<input type="submit" name="edit_santri" id="edit_santri" value="Update"/>';
            //     echo '</form>';
            //  echo '</div>';
          }

          if ($_GET['edt'] == "plist") {
             $id = $_GET['id'];
             $nama = $_GET['nama'];
             $habdi = $_GET['habdi'];
             $hjabatan = $_GET['hjabatan'];

             echo '<section class="content-header">';
               echo '<h1>';
                 echo 'Pengajar';
                 echo '<small>| Edit Data</small>';
               echo '</h1>';
               echo '<ol class="breadcrumb">';
                 echo '<li><a href="kalender.php"><i class="fa fa-dashboard"></i>Beranda</a></li>';
                 echo '<li><a href="#">Data</a></li>';
                 echo '<li class="active">Pengajar</li>';
               echo '</ol>';
             echo '</section>';
             echo '<section class="content">';
               echo '<div class="row">';
                 echo '<div class="col-md-12">';
                   echo '<div class="box box-danger">';
                     echo '<div class="box-header with-border">';
                       echo '<h3 class="box-title">Edit Data Pengajar</h3>';
                     echo '</div>';
                     echo '<form class="form-horizontal" action="edit.php" method="post">';
                       echo '<div class="box-body">';
                         echo '<div class="form-group">';
                           echo '<label class="col-sm-3 control-label">Id Pengajar</label>';
                           echo '<div class="col-sm-6">';
                             echo '<input type="text" id="pengajar_id" name="pengajar_id" value="'.$id.'" readonly="readonly" class="form-control">';
                           echo '</div>';
                         echo '</div>';
                         echo '<div class="form-group">';
                           echo '<label class="col-sm-3 control-label">Nama Pengajar</label>';
                           echo '<div class="col-sm-6">';
                             echo '<input  type="text" id="pengajar_name" name="pengajar_name" onFocus="this.select();" value="'.$nama.'" required class="form-control">';
                           echo '</div>';
                         echo '</div>';
                         echo '<div class="form-group">';
                           echo '<label class="col-sm-3 control-label">Jabatan</label>';
                           echo '<div class="col-sm-6">';
                             echo '<select class="form-control"  name="pengajar_jabatan">';
                               echo '<option selected="selected">--Pilih Jabatan--</option>';
                               echo '<option value="P.W">P.W</option>';
                               echo '<option value="Kepala">Kepala</option>';
                               echo '<option value="Kepala">WK</option>';
                               echo '<option value="Bendahara">Bendahara</option>';
                               echo '<option value="Walas">Walas</option>';
                             echo '</select>';
                           echo '</div>';
                         echo '</div>';
                         echo '<div class="form-group">';
                           echo '<label class="col-sm-3 control-label">Tunjangan Abdi</label>';
                           echo '<div class="col-sm-6">';
                             echo '<input  type="text" id="pengajar_habdi" name="pengajar_habdi" onFocus="this.select();" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" value="'.rupiahFormat($habdi).'" required class="form-control">';
                           echo '</div>';
                         echo '</div>';
                         echo '<div class="form-group">';
                           echo '<label class="col-sm-3 control-label">Tunjangan Jabatan</label>';
                           echo '<div class="col-sm-6">';
                             echo '<input type="text" id="pengajar_hjabatan" name="pengajar_hjabatan" onFocus="this.select();" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" value="'.rupiahFormat($hjabatan).'" required class="form-control">';
                           echo '</div>';
                         echo '</div>';
                         echo '<div class="form-group">';
                           echo '<label class="col-sm-3 control-label">Status</label>';
                           echo '<div class="col-sm-6">';
                             echo '<select class="form-control" name="pengajar_status">';
                               echo '<option value="Aktif" selected="selected">Aktif</option>';
                               echo '<option value="Tidak Aktif">Tidak Aktif</option>';
                             echo '</select>';
                           echo '</div>';
                         echo '</div>';
                       echo '</div>';
                       echo '<div class="box-footer">';
                         echo '<button input type="submit" name="edit_pengajar" id="edit_pengajar" class="btn btn-flat btn-success pull-right">Update</button>';
                       echo '</div>';
                     echo '</form>';
                   echo '</div>';
                 echo '</div>';
               echo '</div>';
             echo '</section>';

            //  echo '<form class="" action="edit.php" method="post">';
            //     echo '<div class="">';
            //        echo '<label for="">ID Pengajar: </label>';
            //        echo '<input type="text" id="pengajar_id" name="pengajar_id" value="'.$id.'" readonly="readonly">';
            //     echo '</div>';
            //     echo '<div class="">';
            //        echo '<label for="">Nama: </label>';
            //        echo '<input type="text" id="pengajar_name" name="pengajar_name" onFocus="this.select();" value="'.$nama.'" required>';
            //     echo '</div>';
            //     echo '<div class="">';
            //        echo '<label for="">Jabatan: </label>';
            //        echo '<select class="" name="pengajar_jabatan">';
            //           echo '<option selected="selected">--Pilih Jabatan--</option>';
            //           echo '<option value="P.W">P.W</option>';
            //           echo '<option value="Kepala">Kepala</option>';
            //           echo '<option value="Kepala">WK</option>';
            //           echo '<option value="Bendahara">Bendahara</option>';
            //           echo '<option value="Walas">Walas</option>';
            //        echo '</select>';
            //     echo '</div>';
            //     echo '<div class="">';
            //        echo '<label for="">Tunjangan Abdi: </label>';
            //        echo '<input type="text" id="pengajar_habdi" name="pengajar_habdi" onFocus="this.select();" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" value="'.rupiahFormat($habdi).'" required>';
            //     echo '</div>';
            //     echo '<div class="">';
            //        echo '<label for="">Tunjangan Jabatan: </label>';
            //        echo '<input type="text" id="pengajar_hjabatan" name="pengajar_hjabatan" onFocus="this.select();" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" value="'.rupiahFormat($hjabatan).'" required>';
            //     echo '</div>';
            //     echo '<div class="">';
            //        echo '<label for="">Status: </label>';
            //        echo '<select class="" name="pengajar_status">';
            //           echo '<option selected="selected" value="Aktif">Aktif</option>';
            //           echo '<option value="Tidak Aktif">Tidak Aktif</option>';
            //        echo '</select>';
            //     echo '</div>';
            //     echo '<input type="submit" name="edit_pengajar" id="edit_pengajar" value="Submit">';
            //  echo '</form>';
          }
       }

       if (isset($_POST['aktivitas_upd'])) {
          $id = $_POST['aktivitas_id'];
          $aktivitas_name = $_POST['aktivitas_name'];
          $aktivitas_pay= $_POST['aktivitas_pay'];
          $aktivitas_pay = penghilangTitik($aktivitas_pay);
          $query = mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE `aktivitas` SET `NAMA_AKTIVITAS` = '$aktivitas_name', `HONOR_AKTIVITAS` = '$aktivitas_pay' WHERE `aktivitas`.`ID_AKTIVITAS` = '$id';");
          header("location: aturKegiatan.php");
       }

       if (isset($_POST['edit_santri'])) {
          $id = $_POST['santri_id'];
          $nama = $_POST['santri_name'];
          $walas = $_POST['santri_walas'];
          $tingkatan = $_POST['santri_tingkatan'];
          $status = $_POST['santri_status'];
          $query = mysqli_query($GLOBALS["___mysqli_ston"],"UPDATE `santri` SET `NAMA_SANTRI` = '$nama', `ID_PENGAJAR` = '$walas', `TINGKATAN` = '$tingkatan', `STATUS_SANTRI` = '$status' WHERE `santri`.`ID_SANTRI` = '$id'");
          header("location: dataSantri.php");
       }

       if (isset($_POST['edit_pengajar'])) {
          $id = $_POST['pengajar_id'];
          $nama = $_POST['pengajar_name'];
          $jabatan = $_POST['pengajar_jabatan'];
          $habdi = $_POST['pengajar_habdi'];
          $habdi = penghilangTitik($habdi);
          $hjabatan = $_POST['pengajar_hjabatan'];
          $hjabatan = penghilangTitik($hjabatan);
          $status = $_POST['pengajar_status'];
          $query = mysqli_query($GLOBALS["___mysqli_ston"],"UPDATE `pengajar` SET `NAMA_PENGAJAR` = '$nama', `JABATAN` = '$jabatan', `HONOR_ABDI` = '$habdi', `HONOR_JABATAN` = '$hjabatan', `STATUS_PENGAJAR` = '$status' WHERE `pengajar`.`ID_PENGAJAR` = '$id' ");
          header("location: dataPengajar.php");
       }

       if (isset($_GET['hps'])) {
          if ($_GET['hps'] == "usr") {
             $id = $_GET['usr'];
             $query = mysqli_query($GLOBALS["___mysqli_ston"],"DELETE FROM user WHERE USERNAME = '$id'");
             header("location: aturPengguna.php");
          }
       }
    ?>

    <script src="../assets/plugin/jquery/dist/jquery.min.js"></script>
    <script src="../assets/plugin/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/global.js"></script>
    <script src="../assets/js/custom.js"></script>
  </body>
  </html>
