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
        Pengajar
        <small>| Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="kalender.php"><i class="fa fa-dashboard"></i>Beranda</a></li>
        <li><a href="#">Data</a></li>
        <li class="active">Pengajar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Telusur Data Pengajar</h3>
            </div>
            <form class="form-horizontal" action="dataPengajar.php" method="post">
              <div class="box-body">
                <div class="form-group col-sm-6">
                  <label class="col-sm-4 control-label">Nama Pengajar</label>
                  <div class="col-sm-6">
                    <input type="text" name="cari_nama" id="cari_nama" placeholder="Cari Nama Pengajar.." autofocus class="form-control">
                  </div>
                  <button type="submit" name="submit_cari_nama" class="btn btn-flat btn-primary">Cari</button>
                </div>
                <div class="form-group col-sm-6">
                  <label class="col-sm-3 control-label">Jabatan</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="pengajar_jabatan">
                      <option selected="selected">--Pilih Jabatan--</option>
                      <option value="P.W">P.W</option>
                      <option value="Kepala">Kepala</option>
                      <option value="Kepala">WK</option>
                      <option value="Bendahara">Bendahara</option>
                      <option value="WaliKelas">Wali Kelas</option>
                    </select>
                  </div>
                  <button type="submit" name="submit_cari_jabatan" class="btn btn-flat btn-primary" >Cari</button>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="all" class="btn btn-flat btn-warning pull-right" style="margin-left:15px">Tampilkan Semua Pengajar</button>
                <button type="submit" name="cari_tidak_aktif" class="btn btn-flat btn-danger pull-right" style="margin-left:15px">Pengajar Tidak Aktif</button>
                <button type="submit" name="cari_aktif" class="btn btn-flat btn-success pull-right" style="margin-left:15px">Pengajar Aktif</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Daftar Pengajar</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <a  href="entriPengajar.php" target="targetContent"><button type="submit" class="btn btn-sm btn-flat btn-default pull-right"><i class="fa fa-plus"></i> Tambah Pengajar</a></button>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Jabatan</th>
                  <th>Tahun Masuk</th>
                  <th>Tunjangan Abdi</th>
                  <th>Tunjangan Jabatan</th>
                  <th>Status</th>
                  <th>Edit</th>
                </tr>
                <tbody>
                   <?php
                      if (isset($_POST['submit_cari_nama'])) {
                         $nama = $_POST['cari_nama'];
                         $query = mysqli_query($GLOBALS["___mysqli_ston"],"SELECT * FROM pengajar WHERE NAMA_PENGAJAR like '%$nama%' ");
                      }
                      elseif (isset($_POST['submit_cari_jabatan'])) {
                         $jabatan = $_POST['pengajar_jabatan'];
                         $query = mysqli_query($GLOBALS["___mysqli_ston"],"SELECT * FROM pengajar WHERE JABATAN = '$jabatan' ");
                      }
                      elseif (isset($_POST['cari_aktif'])) {
                         $query = mysqli_query($GLOBALS["___mysqli_ston"],"SELECT * FROM pengajar WHERE STATUS_PENGAJAR = 'Aktif'");
                      }
                      elseif (isset($_POST['cari_tidak_aktif'])) {
                         $query = mysqli_query($GLOBALS["___mysqli_ston"],"SELECT * FROM pengajar WHERE NOT STATUS_PENGAJAR = 'Aktif'");
                      }
                      elseif (isset($_POST['all'])) {
                         $query = mysqli_query($GLOBALS["___mysqli_ston"],"SELECT * FROM pengajar");
                      }
                      else {
                         $query = mysqli_query($GLOBALS["___mysqli_ston"],"SELECT * FROM pengajar");
                      }

                      if (mysqli_num_rows($query) > 0) {
                         while ($data = mysqli_fetch_assoc($query)) {
                            echo '<tr>';
                               echo '<td>'.$data['ID_PENGAJAR'].'</td>';
                               echo '<td>'.$data['NAMA_PENGAJAR'].'</td>';
                               echo '<td>'.$data['JABATAN'].'</td>';
                               echo '<td>'.$data['TAHUN_MASUK'].'</td>';
                               echo '<td>Rp. '.rupiahFormat($data['HONOR_ABDI']).',-</td>';
                               echo '<td>Rp. '.rupiahFormat($data['HONOR_JABATAN']).',-</td>';
                               echo '<td>'.$data['STATUS_PENGAJAR'].'</td>';
                               echo '<td><a target="targetContent" href="edit.php?edt=plist&id='.$data['ID_PENGAJAR'].'&nama='.$data['NAMA_PENGAJAR'].'&habdi='.$data['HONOR_ABDI'].'&hjabatan='.$data['HONOR_JABATAN'].'"><button class=" btn btn-sm btn-flat btn-primary"><i class="fa fa-pencil"></i> Edit</button></a></td>';
                            echo '</tr>';
                         }
                      } else {
                         echo '<tr>';
                           echo '<td colspan="8">Data Tidak Ditemukan</td>';
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
