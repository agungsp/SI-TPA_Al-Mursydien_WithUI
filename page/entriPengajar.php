<?php
   include '../koneksi.php';

   $q = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pengajar");
   $rows = mysqli_num_rows($q) + 1;
   $pengajar_id = "tpa-pgjr$rows";
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
        <small>| Entri Data</small>
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
            <form class="form-horizontal" action="verifikasiPengajar.php" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-3 control-label">ID Pengajar</label>
                  <div class="col-sm-6">
                    <input type="text" id="pengajar_id" name="pengajar_id" value="<?php echo $pengajar_id; ?>" readonly="readonly" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama</label>
                  <div class="col-sm-6">
                    <input type="text" id="pengajar_name" name="pengajar_name" autofocus required class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Jabatan</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="pengajar_jabatan">
                      <option selected="selected">--Pilih Jabatan--</option>
                      <option value="P.W">P.W</option>
                      <option value="Kepala">Kepala</option>
                      <option value="Kepala">WK</option>
                      <option value="Bendahara">Bendahara</option>
                      <option value="Walas">Wali Kelas</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Tanggal Masuk</label>
                  <div class="col-sm-6">
                    <input type="text" name="pengajar_date" id="pengajar_date" readonly="readonly" class="form-control">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="submit_pengajar" id="submit_pengajar" class="btn btn-flat btn-primary pull-right" style="margin-left:15px">Simpan</button>
                <a href="dataPengajar.php"><input  type="button" value="Batal" class="btn btn-flat btn-danger pull-right"></a>
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
    $(function(){
      $('#pengajar_date').val(tanggal());
    });
    </script>
  </body>
  </html>
