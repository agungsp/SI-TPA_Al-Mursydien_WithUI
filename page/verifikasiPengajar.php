<?php
   include '../koneksi.php';
   $pengajar_id = $_POST['pengajar_id'];
   $pengajar_name = $_POST['pengajar_name'];
   $pengajar_jabatan = $_POST['pengajar_jabatan'];
   $query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pengajar where NAMA_PENGAJAR LIKE '$pengajar_name' AND STATUS_PENGAJAR = 'Aktif'");
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
        Pengajar
        <small>| Verifikasi Data</small>
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
              <h3 class="box-title">Entri Data Pengajar</h3>
            </div>
            <form class="form-horizontal" action="../script/input_proses.php"  method="post">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-3 control-label">ID Pengajar</label>
                  <div class="col-sm-6">
                    <input type="text" name="pengajar_id" value="<?php echo $pengajar_id ; ?>" readonly="readonly" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama</label>
                  <div class="col-sm-6">
                    <input type="text" name="pengajar_name" value="<?php echo $pengajar_name ; ?>" readonly="readonly" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Jabatan</label>
                  <div class="col-sm-6">
                    <input type="text" name="pengajar_jabatan" value="<?php echo $pengajar_jabatan ; ?>" readonly="readonly" class="form-control">
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
                          <i class="fa fa-times-circle-o"></i>ID Pengajar: <span>'.$data['ID_PENGAJAR'].'</span>
                        </label>
                      </div>
                      <div class="form-group has-error">
                        <label class="control-label" for="inputError">
                          <i class="fa fa-times-circle-o"></i>Nama : <span>'.$data['NAMA_PENGAJAR'].'</span>
                        </label>
                      </div>
                      <div class="form-group has-error">
                        <label class="control-label" for="inputError">
                          <i class="fa fa-times-circle-o"></i>Jabatan : <span>'.$data['JABATAN'].'</span>
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
                <button type="submit" name="submit_pengajar" class="btn btn-primary pull-right" style="margin-left:15px" autofocus>Simpan</button>
                <a href="entriPengajar.php"><input  type="button" value="Batal" class="btn btn-danger pull-right"></a>
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
