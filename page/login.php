<?php
   include '../script/login_proses.php';

   if(isset($_SESSION['login_user'])){
      header("location: beranda.php");
   }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Masuk</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../assets/plugin/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/plugin/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/plugin/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../assets/css/global.css">
  <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body class="hold-transition login-page">

  <ul class="slideshow">
    <li><span>Image 01</span></li>
    <li><span>Image 02</span></li>
    <li><span>Image 03</span></li>
    <li><span>Image 04</span></li>
  </ul>
  <div class="container">
    <div class="login-box">
      <!-- <div class="login-logo">
      <a href="../../index2.html" style="color:#fff">TPA <b>Al-Mursyidien</b></a>
    </div> -->
    <!-- /.login-logo -->
    <div class="login-box-body">
      <div class="user-header">
        <div>
          <img src="../assets/image/logo.jpg" alt="" style="width:100px; height:100px;" />
        </div>
        <h2 class="login-box-msg" style="margin-top:10px; font-size:30px">TPA <b>Al-Mursyidien</h2>
      </div>
      <form method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Nama"  name="username" id="txt_username"  required autofocus>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Kata Sandi" name="password" id="txt_password"  required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat"  name="submit" id="btnSubmit" >Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->
</div>

<script src="../assets/plugin/jquery/dist/jquery.min.js"></script>
<script src="../assets/plugin/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
