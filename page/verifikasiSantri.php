<?php
   include '../koneksi.php';
   $santri_id = $_POST['santri_id'];
   $santri_name = $_POST['santri_name'];
   $santri_walas = $_POST['santri_walas'];
   $santri_tingkatan = $_POST['santri_tingkatan'];
   $query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT santri.ID_SANTRI, santri.NAMA_SANTRI, pengajar.NAMA_PENGAJAR, santri.TINGKATAN FROM santri INNER JOIN pengajar ON santri.ID_PENGAJAR = pengajar.ID_PENGAJAR where NAMA_SANTRI LIKE '$santri_name' AND STATUS_SANTRI = 'Aktif' ");
   $q = mysqli_query($GLOBALS['___mysqli_ston'], "SELECT NAMA_PENGAJAR FROM pengajar WHERE ID_PENGAJAR = '$santri_walas'");
   $q_result = mysqli_fetch_assoc($q);
?>
<!DOCTYPE html>
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
        <small>| Verifikasi Data</small>
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
              <h3 class="box-title">Entri Data Santri</h3>
            </div>
            <form class="form-horizontal" action="../script/input_proses.php"  method="post">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-3 control-label">ID Santri</label>
                  <div class="col-sm-6">
                    <input type="text" name="santri_id" value="<?php echo $santri_id; ?>" readonly="readonly" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama</label>
                  <div class="col-sm-6">
                    <input type="text" name="santri_name" value="<?php echo $santri_name; ?>" readonly="readonly" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Wali Kelas</label>
                  <div class="col-sm-6">
                    <input type="text" name="" value="<?php echo $q_result['NAMA_PENGAJAR']; ?>" readonly="readonly" class="form-control">
                    <input type="hidden" name="santri_walas" value="<?php echo $santri_walas; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Tingkat</label>
                  <div class="col-sm-6">
                    <input type="text" name="santri_tingkatan" value="<?php echo $santri_tingkatan; ?>" readonly="readonly" class="form-control">
                  </div>
                </div>

                <br/><br/>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Validasi Data Identik/Sama</label>
                  <?php
                  if (mysqli_num_rows($query) != 0) {
                    $data = mysqli_fetch_assoc($query);
                    echo '
                    <div class="col-sm-6">
                      <div class="form-group has-error">
                        <label class="control-label" for="inputError">
                          <i class="fa fa-times-circle-o"></i>ID Santri : <span>'.$data['ID_SANTRI'].'</span>
                        </label>
                      </div>
                      <div class="form-group has-error">
                        <label class="control-label" for="inputError">
                          <i class="fa fa-times-circle-o"></i>Nama : <span>'.$data['NAMA_SANTRI'].'</span>
                        </label>
                      </div>
                      <div class="form-group has-error">
                        <label class="control-label" for="inputError">
                          <i class="fa fa-times-circle-o"></i>Wali Kelas : <span>'.$data['NAMA_PENGAJAR'].'</span>
                        </label>
                      </div>
                      <div class="form-group has-error">
                        <label class="control-label" for="inputError">
                          <i class="fa fa-times-circle-o"></i>Tingkat : <span>'.$data['TINGKATAN'].'</span>
                        </label>
                      </div>
                    </div>
                    ';
                  } else {
                    echo '
                    <div class="col-sm-6">
                      <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i>Tidak ada data yang identik</label>
                      </div>
                    </div>
                    ';
                  }
                  ?>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="submit_santri" class="btn btn-primary pull-right" style="margin-left:15px" autofocus>Simpan</button>
                <a href="../page/entriSantri.php"><input  type="button" value="Batal" class="btn btn-danger pull-right"></a>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
      </div>
    </section>

    <script src="../assets/plugin/jquery/dist/jquery.min.js"></script>
    <script src="../assets/plugin/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/global.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script type="text/javascript">
    </script>
  </body>
  </html>
