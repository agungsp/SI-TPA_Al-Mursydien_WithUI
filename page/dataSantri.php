<?php
include '../koneksi.php';
include '../script/format_number.php';
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
    <section class="content-header">
      <h1>
        Santri
        <small>| Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="kalender.php"><i class="fa fa-dashboard"></i>Beranda</a></li>
        <li><a href="#">Data</a></li>
        <li class="active">Santri</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Telusur Data Santri</h3>
            </div>
            <form class="form-horizontal" action="dataSantri.php" method="post">
              <div class="box-body">
                <div class="form-group col-sm-6">
                  <label class="col-sm-3 control-label">Nama Santri</label>
                  <div class="col-sm-6">
                    <input type="text" name="cari_nama" id="cari_nama" placeholder="Cari Nama Santri.." autofocus class="form-control">
                  </div>
                  <button type="submit" name="submit_cari_nama" class="btn btn-flat btn-primary">Cari</button>
                </div>
                <div class="form-group col-sm-6">
                  <label class="col-sm-3 control-label">Wali Kelas</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="cari_pengajar">
                       <option selected="selected">--Pilih Wali Kelas--</option>
                       <?php
                          $q = mysqli_query($GLOBALS["___mysqli_ston"],"SELECT ID_PENGAJAR,NAMA_PENGAJAR FROM pengajar ORDER BY NAMA_PENGAJAR");
                          while ($data = mysqli_fetch_assoc($q)) {
                             echo '<option value="'.$data['ID_PENGAJAR'].'">'.$data['NAMA_PENGAJAR'].'</option>';
                          }
                       ?>
                    </select>
                  </div>
                  <button type="submit" name="submit_cari_pengajar" class="btn btn-flat btn-primary" >Cari</button>
                </div>
                <div class="form-group col-sm-6">
                  <label class="col-sm-3 control-label">Tingkatan</label>
                  <div class="col-sm-6">
                    <select  class="form-control" name="santri_tingkatan">
                       <option selected="selected">--Pilih Tingkatan--</option>
                       <option value="TK Jilid 1">TK Jilid 1</option>
                       <option value="TK Jilid 2">TK Jilid 2</option>
                       <option value="TK Jilid 3">TK Jilid 3</option>
                       <option value="TK Jilid 4">TK Jilid 4</option>
                       <option value="TK Jilid 5">TK Jilid 5</option>
                       <option value="TK Jilid 6">TK Jilid 6</option>
                       <option value="TK Al-Quran">TK Al-Qur'an</option>
                       <option value="SD Jilid 1">SD Jilid 1</option>
                       <option value="SD Jilid 2">SD Jilid 2</option>
                       <option value="SD Jilid 3">SD Jilid 3</option>
                       <option value="SD Jilid 3">SD Jilid 3</option>
                       <option value="SD Jilid 4">SD Jilid 4</option>
                       <option value="SD Jilid 5">SD Jilid 5</option>
                       <option value="SD Jilid 6">SD Jilid 6</option>
                       <option value="SD Kls 1 Quran">SD Kls 1 Qur'an</option>
                       <option value="SD Kls 2 Quran">SD Kls 2 Qur'an</option>
                       <option value="SD Kls 3 Quran">SD Kls 3 Qur'an</option>
                       <option value="SD Kls 4 Quran">SD Kls 4 Qur'an</option>
                       <option value="SD Kls 5 Quran">SD Kls 5 Qur'an</option>
                       <option value="SD Kls 6 Quran">SD Kls 6 Qur'an</option>
                       <option value="Al-Quran">Al-Qur'an</option>
                    </select>
                  </div>
                  <button type="submit" name="submit_cari_tingkatan" class="btn btn-flat btn-primary" >Cari</button>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="all" class="btn btn-flat btn-warning pull-right" style="margin-left:15px">Tampilkan Semua Santri</button>
                <button type="submit" name="cari_tidak_aktif" class="btn btn-flat btn-danger pull-right" style="margin-left:15px">Santri Tidak Aktif</button>
                <button type="submit" name="cari_aktif" class="btn btn-flat btn-success pull-right" style="margin-left:15px">Santri Aktif</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Daftar Santri</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <a  href="entriSantri.php" target="targetContent"><button type="submit" class="btn btn-sm btn-flat btn-default pull-right"><i class="fa fa-plus"></i> Tambah Santri</a></button>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Tingkatan</th>
                  <th>Walas</th>
                  <th>Status</th>
                  <th>Edit</th>
                </tr>
                <tbody>
                  <?php
                     if (isset($_POST['submit_cari_nama'])) {
                        $nama = $_POST['cari_nama'];
                        $query = mysqli_query($GLOBALS["___mysqli_ston"],"SELECT santri.ID_SANTRI,santri.NAMA_SANTRI,santri.TINGKATAN,pengajar.NAMA_PENGAJAR,santri.STATUS_SANTRI FROM santri INNER JOIN pengajar ON santri.ID_PENGAJAR = pengajar.ID_PENGAJAR WHERE santri.NAMA_SANTRI like '%$nama%' ");
                     }
                     elseif (isset($_POST['submit_cari_pengajar'])) {
                        $id = $_POST['cari_pengajar'];
                        $query = mysqli_query($GLOBALS["___mysqli_ston"],"SELECT santri.ID_SANTRI,santri.NAMA_SANTRI,santri.TINGKATAN,pengajar.NAMA_PENGAJAR,santri.STATUS_SANTRI FROM santri INNER JOIN pengajar ON santri.ID_PENGAJAR = pengajar.ID_PENGAJAR WHERE pengajar.ID_PENGAJAR = '$id' ");
                     }
                     elseif (isset($_POST['submit_cari_tingkatan'])) {
                        $tingkatan = $_POST['santri_tingkatan'];
                        $query = mysqli_query($GLOBALS["___mysqli_ston"],"SELECT santri.ID_SANTRI,santri.NAMA_SANTRI,santri.TINGKATAN,pengajar.NAMA_PENGAJAR,santri.STATUS_SANTRI FROM santri INNER JOIN pengajar ON santri.ID_PENGAJAR = pengajar.ID_PENGAJAR WHERE santri.TINGKATAN = '$tingkatan' ");
                     }
                     elseif (isset($_POST['cari_aktif'])) {
                        $query = mysqli_query($GLOBALS["___mysqli_ston"],"SELECT santri.ID_SANTRI,santri.NAMA_SANTRI,santri.TINGKATAN,pengajar.NAMA_PENGAJAR,santri.STATUS_SANTRI FROM santri INNER JOIN pengajar ON santri.ID_PENGAJAR = pengajar.ID_PENGAJAR WHERE santri.STATUS_SANTRI = 'Aktif'");
                     }
                     elseif (isset($_POST['cari_tidak_aktif'])) {
                        $query = mysqli_query($GLOBALS["___mysqli_ston"],"SELECT santri.ID_SANTRI,santri.NAMA_SANTRI,santri.TINGKATAN,pengajar.NAMA_PENGAJAR,santri.STATUS_SANTRI FROM santri INNER JOIN pengajar ON santri.ID_PENGAJAR = pengajar.ID_PENGAJAR WHERE NOT santri.STATUS_SANTRI = 'Aktif'");
                     }
                     elseif (isset($_POST['all'])) {
                        $query = mysqli_query($GLOBALS["___mysqli_ston"],"SELECT santri.ID_SANTRI,santri.NAMA_SANTRI,santri.TINGKATAN,pengajar.NAMA_PENGAJAR,santri.STATUS_SANTRI FROM santri INNER JOIN pengajar ON santri.ID_PENGAJAR = pengajar.ID_PENGAJAR ");
                     }
                     else {
                        $query = mysqli_query($GLOBALS["___mysqli_ston"],"SELECT santri.ID_SANTRI,santri.NAMA_SANTRI,santri.TINGKATAN,pengajar.NAMA_PENGAJAR,santri.STATUS_SANTRI FROM santri INNER JOIN pengajar ON santri.ID_PENGAJAR = pengajar.ID_PENGAJAR ");
                     }

                     if (mysqli_num_rows($query) > 0) {
                        while ($data = mysqli_fetch_assoc($query)) {
                           echo '<tr>';
                              echo '<td>'.$data['ID_SANTRI'].'</td>';
                              echo '<td>'.$data['NAMA_SANTRI'].'</td>';
                              echo '<td>'.$data['TINGKATAN'].'</td>';
                              echo '<td>'.$data['NAMA_PENGAJAR'].'</td>';
                              echo '<td>'.$data['STATUS_SANTRI'].'</td>';
                              echo '<td><a target="targetContent" href="edit.php?edt=slist&id='.$data['ID_SANTRI'].'&nama='.$data['NAMA_SANTRI'].'"><button class=" btn btn-sm btn-flat btn-primary"><i class="fa fa-pencil"></i> Edit</button></a></td>';
                           echo '</tr>';
                        }

                     } else {
                        echo '<tr>';
                          echo '<td colspan="6">Data Tidak Ditemukan</td>';
                       echo '</tr>';
                     }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>


        </div>
      </div>
    </section>
    <script src="../assets/plugin/jquery/dist/jquery.min.js"></script>
    <script src="../assets/plugin/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/plugin/jquery-ui.js"></script>
    <script src="../assets/js/global.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script type="text/javascript">
    </script>
  </body>
  </html>
