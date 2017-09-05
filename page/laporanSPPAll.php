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
    <link rel="stylesheet" href="../assets/css/jquery-ui.css">
  <link rel="stylesheet" href="../assets/css/global.css">

</head>
<body class="hold-transition">
  <div class="content-wrapper" style="margin-left:0px ">
    <section class="content-header">
      <h1>
        Laporan Pembayaran SPP
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="kalender.php"><i class="fa fa-dashboard"></i>Beranda</a></li>
        <li><a href="#">Laporan</a></li>
        <li class="active">Pembayaran SPP</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Telusur Data Pembayaran SPP</h3>
            </div>
            <form class="form-horizontal" action="laporanSPPAll.php" method="post">
              <div class="box-body" >
                <div class="form-group col-sm-6">
                  <label class="col-sm-3 control-label">Nama Santri</label>
                  <div class="col-sm-6">
                    <input  type="text" name="cari_nama" id="cari_nama" placeholder="Cari Nama Santri.." autofocus class="form-control">
                    <input type="hidden" name="cari_id" id="cari_id">
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
                <button type="submit" name="all" class="btn btn-flat btn-warning pull-right" style="margin-left:15px">Tampilkan Semua Pembayaran</button>
                <button  type="submit" name="cari_belum_lunas" class="btn btn-flat btn-danger pull-right" style="margin-left:15px">Belum Lunas</button>
                <button  type="submit" name="cari_lunas"  class="btn btn-flat btn-success pull-right" style="margin-left:15px">Sudah Lunas</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Daftar Pembayaran SPP</h3>
              <!-- <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                </div>
              </div> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Tingkatan</th>
                  <th>Walas</th>
                  <th>Total SPP</th>
                </tr>
                <tbody>
                  <?php
                     if (isset($_POST['submit_cari_nama'])) {
                        $id = $_POST['cari_id'];
                        $query = mysqli_query($GLOBALS["___mysqli_ston"],"SELECT santri.ID_SANTRI,santri.NAMA_SANTRI,santri.TINGKATAN,pengajar.NAMA_PENGAJAR,santri.TOTAL_SPP FROM santri INNER JOIN pengajar ON santri.ID_PENGAJAR = pengajar.ID_PENGAJAR WHERE santri.STATUS_SANTRI = 'Aktif' && santri.ID_SANTRI = '$id' ");
                     }
                     elseif (isset($_POST['submit_cari_pengajar'])) {
                        $id = $_POST['cari_pengajar'];
                        $query = mysqli_query($GLOBALS["___mysqli_ston"],"SELECT santri.ID_SANTRI,santri.NAMA_SANTRI,santri.TINGKATAN,pengajar.NAMA_PENGAJAR,santri.TOTAL_SPP FROM santri INNER JOIN pengajar ON santri.ID_PENGAJAR = pengajar.ID_PENGAJAR WHERE santri.STATUS_SANTRI = 'Aktif' && pengajar.ID_PENGAJAR = '$id' ");
                     }
                     elseif (isset($_POST['submit_cari_tingkatan'])) {
                        $tingkatan = $_POST['santri_tingkatan'];
                        $query = mysqli_query($GLOBALS["___mysqli_ston"],"SELECT santri.ID_SANTRI,santri.NAMA_SANTRI,santri.TINGKATAN,pengajar.NAMA_PENGAJAR,santri.TOTAL_SPP FROM santri INNER JOIN pengajar ON santri.ID_PENGAJAR = pengajar.ID_PENGAJAR WHERE santri.STATUS_SANTRI = 'Aktif' && santri.TINGKATAN = '$tingkatan' ");
                     }
                     elseif (isset($_POST['cari_lunas'])) {
                        $f_limit = fopen("../log/limit_spp.txt","r") or die ("Unable to open file!!");
                        $kalimat = fgets($f_limit);
                        $kata = explode(" ",$kalimat);
                        $limit = penghilangTitik($kata[1]);
                        fclose($f_limit);
                        $query = mysqli_query($GLOBALS["___mysqli_ston"],"SELECT santri.ID_SANTRI,santri.NAMA_SANTRI,santri.TINGKATAN,pengajar.NAMA_PENGAJAR,santri.TOTAL_SPP FROM santri INNER JOIN pengajar ON santri.ID_PENGAJAR = pengajar.ID_PENGAJAR WHERE santri.STATUS_SANTRI = 'Aktif' && santri.TOTAL_SPP = '$limit' ");
                     }
                     elseif (isset($_POST['cari_belum_lunas'])) {
                        $f_limit = fopen("../log/limit_spp.txt","r") or die ("Unable to open file!!");
                        $kalimat = fgets($f_limit);
                        $kata = explode(" ",$kalimat);
                        $limit = penghilangTitik($kata[1]);
                        fclose($f_limit);
                        $query = mysqli_query($GLOBALS["___mysqli_ston"],"SELECT santri.ID_SANTRI,santri.NAMA_SANTRI,santri.TINGKATAN,pengajar.NAMA_PENGAJAR,santri.TOTAL_SPP FROM santri INNER JOIN pengajar ON santri.ID_PENGAJAR = pengajar.ID_PENGAJAR WHERE santri.STATUS_SANTRI = 'Aktif' && NOT santri.TOTAL_SPP = '$limit' ");
                     }
                     elseif (isset($_POST['all'])) {
                        $query = mysqli_query($GLOBALS["___mysqli_ston"],"SELECT santri.ID_SANTRI,santri.NAMA_SANTRI,santri.TINGKATAN,pengajar.NAMA_PENGAJAR,santri.TOTAL_SPP FROM santri INNER JOIN pengajar ON santri.ID_PENGAJAR = pengajar.ID_PENGAJAR WHERE santri.STATUS_SANTRI = 'Aktif'");
                     }
                     else {
                        $query = mysqli_query($GLOBALS["___mysqli_ston"],"SELECT santri.ID_SANTRI,santri.NAMA_SANTRI,santri.TINGKATAN,pengajar.NAMA_PENGAJAR,santri.TOTAL_SPP FROM santri INNER JOIN pengajar ON santri.ID_PENGAJAR = pengajar.ID_PENGAJAR WHERE santri.STATUS_SANTRI = 'Aktif'");
                     }

                     if (mysqli_num_rows($query) > 0) {
                        while ($data = mysqli_fetch_assoc($query)) {
                           echo '<tr>';
                              echo '<td>'.$data['ID_SANTRI'].'</td>';
                              echo '<td>'.$data['NAMA_SANTRI'].'</td>';
                              echo '<td>'.$data['TINGKATAN'].'</td>';
                              echo '<td>'.$data['NAMA_PENGAJAR'].'</td>';
                              echo '<td>Rp. '.rupiahFormat($data['TOTAL_SPP']).',-</td>';
                           echo '</tr>';
                        }
                     } else {
                        echo '<tr>';
                          echo '<td colspan="5">DATA KOSONG!</td>';
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
    $(document).ready(function(){
       $("#cari_nama").autocomplete({
          minLength:1,
          source:'../script/spp_report_data.php',
          select:function(event, ui){
             $('#cari_id').val(ui.item.id);
          }
       });
    });
    </script>
  </body>
  </html>
