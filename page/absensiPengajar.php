<?php
   include '../koneksi.php';
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
        Absensi Pengajar
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="kalender.php"><i class="fa fa-dashboard"></i>Beranda</a></li>
        <li><a href="#">Administrasi</a></li>
        <li class="active">Absensi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Entri Absensi</h3>
            </div>
            <form action="../script/input_proses.php" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label class="control-label">ID Pengajar</label>
                  <input type="text" name="absensi_cari" id="absensi_cari" placeholder="Cari Nama Pengajar" autofocus class="form-control">
                </div>
                <div class="form-group">
                  <label class="control-label">Nama Pengajar</label>
                  <input type="text"  id="absensi_name" name="absensi_name" readonly="readonly"  class="form-control">
                </div>
                <div class="form-group">
                  <label class="control-label">Tanggal Absensi</label>
                  <input type="text" name="absensi_date" id="absensi_date" readonly="readonly" class="form-control">
                </div>
                <div class="form-group">
                  <label class="control-label">Kegiatan</label>
                  <select class="form-control"  name="absensi_aktivitas">
                    <option selected="selected">--Pilih Kegiatan--</option>
                    <?php
                       $query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM aktivitas");
                       if (mysqli_num_rows($query) != 0) {
                          while ($data = mysqli_fetch_assoc($query)) {
                             echo '<option value="'.$data['ID_AKTIVITAS'].'">'.$data['NAMA_AKTIVITAS'].'</option>';
                          }
                       }
                    ?>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="submit_absensi" id="submit_absensi" class="btn btn-primary pull-right">Absen</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
        <div class="col-md-8">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Daftar Absensi Hari Ini</h3>
              <!-- <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <a  href="entriSantri.php" target="targetContent"><button type="submit" class="btn btn-sm btn-flat btn-default pull-right"><i class="fa fa-plus"></i> Tambah Santri</a></button>
                </div>
              </div> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>#</th>
                  <th>Tanggal</th>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Aktivitas</th>
                </tr>
                <tbody>
                  <?php
                      $query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT a.id_pengajar, a.nama_pengajar, b.nama_aktivitas, c.WAKTU_ABSENSI from pengajar a, aktivitas b, absensi c WHERE a.ID_PENGAJAR = c.ID_PENGAJAR && b.ID_AKTIVITAS = c.ID_AKTIVITAS && c.WAKTU_ABSENSI = (SELECT CURRENT_DATE())");
                      if (mysqli_num_rows($query) > 0) {
                         $i = 1;
                         while ($data = mysqli_fetch_assoc($query)) {
                            echo '<tr>';
                               echo '<td>'.$i.'</td>';
                               echo '<td>'.$data['WAKTU_ABSENSI'].'</td>';
                               echo '<td>'.$data['id_pengajar'].'</td>';
                               echo '<td>'.$data['nama_pengajar'].'</td>';
                               echo '<td>'.$data['nama_aktivitas'].'</td>';
                            echo '</tr>';
                            $i++;
                         }
                      } else {
                         echo '<tr>';
                           echo '<td>#</td>';
                           echo '<td colspan="4">Absensi Hari Ini KOSONG!</td>';
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
    <script src="../assets/plugin/jquery-ui.js"></script>
    <script src="../assets/plugin/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/global.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script>
      $(document).ready(function(){
         $("#absensi_cari").autocomplete({
            minLength:1,
            source:'../script/absensi_data2.php',
            select:function(event, ui){
               $('#absensi_name').val(ui.item.nama);
            }
         });
      });

      $(function(){
         $('#absensi_date').val(tanggal());
      });
    </script>
  </body>
  </html>
