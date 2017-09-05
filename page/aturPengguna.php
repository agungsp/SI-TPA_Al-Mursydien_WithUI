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
        Pengguna Aplikasi
        <small>| Manajemen</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="kalender.php"><i class="fa fa-dashboard"></i>Beranda</a></li>
        <li><a href="#">Pengaturan</a></li>
        <li class="active">Manajemen Pengguna Aplikasi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Entri Data Pengguna Aplikasi</h3>
            </div>
            <form class="form-horizontal" action="aturPengguna.php" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Pengguna</label>
                  <div class="col-sm-6">
                    <input type="text" name="username" placeholder="Nama Pengguna..." autofocus class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Kata Sandi</label>
                  <div class="col-sm-6">
                    <input  type="password" name="password" placeholder="Kata Sandi..." class="form-control">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button  type="submit" name="submit_user" class="btn btn-flat btn-primary pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">Daftar Pengguna Aplikasi</h3>
              <!-- <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                </div>
              </div> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Id</th>
                  <th>Nama Pengguna</th>
                  <th>Hapus</th>
                </tr>
                <tbody>
                  <?php
                     $q = mysqli_query($GLOBALS["___mysqli_ston"],"SELECT USERNAME FROM user");
                     $i=1;
                     while ($d = mysqli_fetch_assoc($q)) {
                        echo '<tr>';
                           echo '<td>'.$i.'</td>';
                           echo '<td>'.$d['USERNAME'].'</td>';
                           echo '<td><a target="targetContent" href="edit.php?hps=usr&usr='.$d['USERNAME'].'"><button class=" btn btn-sm btn-flat btn-primary"><i class="fa fa-close"></i> Hapus</button></a></td>';
                        echo '</tr>';
                        $i++;
                     }
                  ?>
                </tbody>
              </table>
              <?php
                 if (isset($_POST['submit_user'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $check = mysqli_query($GLOBALS["___mysqli_ston"],"SELECT USERNAME from user where USERNAME = '$username'");

                    if (mysqli_num_rows($check) == 0) {
                       $query = mysqli_query($GLOBALS["___mysqli_ston"],"INSERT INTO user VALUES ('$username','$password')");
                       header("location: aturPengguna.php");
                    }
                 }
              ?>
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
  </body>
  </html>
