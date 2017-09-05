<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIA TPA | Al-Mursyiedin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../assets/plugin/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/plugin/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/plugin/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../assets/css/global.css">
  <link rel="stylesheet" href="../assets/css/skin-green.css">
  <script>
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
  </script>
</head>

<body class="sidebar-mini fixed skin-green">
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">
      <!-- Logo -->
      <a href="beranda.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
          <img src="../assets/image/logo.jpg" alt="" style="width:50px; height:50px;" />
        </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg" style="display:flex">
          <img src="../assets/image/logo.jpg" alt="" style="width:50px; height:50px;" />
          <div style="font-size:20px;text-align: left;padding-left: 10px; line-height:20px; margin-top:3px;">
            <span style="font-size:14px;font-weight:bold ;">TPA</span> <br/><b>Al-Mursyidien</b>
          </div>
        </span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown  notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-gears"></i>
                <span class="hidden-xs">Pengaturan</span>
              </a>
              <ul class="dropdown-menu">
                <!-- <li class="header">Manajemen Sistem</li> -->
                <li>
                  <ul class="menu">
                    <li>
                      <a  href="aturKegiatan.php" target="targetContent">
                        <i class="fa fa-calendar-check-o text-aqua"></i>
                        Manajemen Kegiatan
                      </a>
                    </li>
                    <li>
                      <a  href="aturPengguna.php" target="targetContent">
                        <i class="fa fa-users text-red"></i>
                        Manajemen Pengguna Aplikasi
                      </a>
                    </li>
                    <li>
                      <a href="aturSPP.php" target="targetContent">
                        <i class="fa fa-money text-green"></i>
                        Pengaturan SPP
                      </a>
                    </li>
                    <li>
                      <a href="aturGaji.php" target="targetContent">
                        <i class="fa fa-shopping-cart text-blue"></i>
                        Pengaturan Gaji
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li>
              <a href="../script/logout_proses.php">
                <i class="fa fa-sign-out"></i>
                <span class="hidden-xs">Keluar</span>
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
          <!-- Optionally, you can add icons to the links -->
          <li class="treeview">
            <a href="#"><i class="fa fa-archive"></i> <span>Data</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="../page/dataPengajar.php" target="targetContent"><i class="fa fa-group"></i>Pengajar</a></li>
              <li><a href="../page/dataSantri.php" target="targetContent"><i class="fa fa-user"></i>Santri</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-bar-chart"></i> <span>Administrasi</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a  href="../page/bayarSPP.php" target="targetContent"><i class="fa fa-money"></i>Bayar SPP</a></li>
              <li><a href="../page/absensiPengajar.php" target="targetContent"><i class="fa fa-edit"></i>Absensi Pengajar</a></li>
              <li><a href="#"><i class="fa fa-calendar"></i>Laporan Bulanan</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-sticky-note"></i> <span>Laporan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="../page/laporanSPP.php" target="targetContent"><i class="fa fa-sticky-note-o"></i>Bayar SPP</a></li>
              <li><a href="#"><i class="fa fa-sticky-note-o"></i>Slip Gaji</a></li>
              <li><a href="#"><i class="fa fa-sticky-note-o"></i>Laporan Bulanan</a></li>
            </ul>
          </li>
        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <iframe style="width:100%;"
      name="targetContent"
      frameborder="0"
      onload="resizeIframe(this)"
      src="../page/kalender.php">
    </iframe>
  </div>
  <!-- /.content-wrapper -->

  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<script src="../assets/plugin/jquery/dist/jquery.min.js"></script>
<script src="../assets/plugin/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../assets/js/global.js"></script>
<script src="../assets/js/custom.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
Both of these plugins are recommended to enhance the
user experience. -->
</body>
</html>
