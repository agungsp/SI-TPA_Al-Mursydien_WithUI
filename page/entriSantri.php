<?php
   include '../koneksi.php';

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
    <section class="content-header">
      <h1>
        Santri
        <small>| Entri Data</small>
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
            <form class="form-horizontal" action="verifikasiSantri.php" method="post">
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
                    <input type="text" id="santri_name" name="santri_name" autofocus required class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Wali Kelas</label>
                  <div class="col-sm-6">
                    <select class="form-control"  name="santri_walas">
                      <option selected="selected">--Pilih Wali Kelas--</option>
                      <?php
                         $query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pengajar where JABATAN = 'Walas'");
                         if (mysqli_num_rows($query) != 0) {
                            while ($data = mysqli_fetch_assoc($query)) {
                                 echo '<option value="'.$data['ID_PENGAJAR'].'">'.$data['NAMA_PENGAJAR'].'</option>';
                            }
                         }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Tingkatan</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="santri_tingkatan">
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
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="submit_santri" id="submit_santri" class="btn btn-primary pull-right" style="margin-left:15px">Simpan</button>
                <a href="../page/dataSantri.php"><input  type="button" value="Batal" class="btn btn-danger pull-right"></a>
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
  </body>
  </html>
