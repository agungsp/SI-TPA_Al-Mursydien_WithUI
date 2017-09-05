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
        Kegiatan
        <small>| Manajemen</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="kalender.php"><i class="fa fa-dashboard"></i>Beranda</a></li>
        <li><a href="#">Pengaturan</a></li>
        <li class="active">Manajemen Kegiatan</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Entri Data Kegiatan</h3>
            </div>
            <form class="form-horizontal" action="../script/input_proses.php" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Kegiatan</label>
                  <div class="col-sm-6">
                    <input type="text" name="aktivitas_name" id="aktivitas_name" placeholder="Nama Kegiatan..." autofocus class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Honor Kegiatan</label>
                  <div class="col-sm-6">
                    <input type="text" name="aktivitas_pay" id="aktivitas_pay" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" placeholder="Honor..." class="form-control">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="submit_aktivitas" class="btn btn-flat btn-primary pull-right" >Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">Daftar Kegiatan</h3>
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
                  <th>Aktivitas</th>
                  <th>Honor</th>
                  <th>Edit</th>
                </tr>
                <tbody>
                  <?php
                     $query = mysqli_query($GLOBALS["___mysqli_ston"],"SELECT * FROM aktivitas");
                     while ($data = mysqli_fetch_assoc($query)) {
                        echo '<tr>';
                           echo '<td>'.$data['ID_AKTIVITAS'].'</td>';
                           echo '<td>'.$data['NAMA_AKTIVITAS'].'</td>';
                           echo '<td>Rp. '.rupiahFormat($data['HONOR_AKTIVITAS']).',-</td>';
                           echo '<td><a target="targetContent" href="edit.php?edt=aktivitas&id='.$data['ID_AKTIVITAS'].'&nama='.$data['NAMA_AKTIVITAS'].'&honor='.$data['HONOR_AKTIVITAS'].'"><button class=" btn btn-sm btn-flat btn-primary"><i class="fa fa-pencil"></i> Edit</button></a></td>';
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
