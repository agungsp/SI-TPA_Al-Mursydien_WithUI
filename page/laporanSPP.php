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
    <link rel="stylesheet" href="../assets/css/jquery-ui.css">
  <link rel="stylesheet" href="../assets/css/global.css">

</head>
<body class="hold-transition">
  <div class="content-wrapper" style="margin-left:0px ">
    <section class="content-header">
      <h1>
        Laporan Pembayaran SPP
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="kalender.php"><i class="fa fa-dashboard"></i>Beranda</a></li>
        <li><a href="#">Laporan</a></li>
        <li class="active">Pembayaran SPP</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Telusur Data Pembayaran SPP</h3>
            </div>
            <form class="form-horizontal" action="laporanSPP.php" method="post">
              <div class="box-body" >
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Nama Santri</label>
                  <div class="col-sm-6">
                    <input type="text" name="cari_nama" id="cari_nama" placeholder="Cari Nama Santri.." autofocus class="form-control">
                    <input type="hidden" name="cari_id" id="cari_id">
                  </div>
                  <button type="submit" name="submit_cari_nama" class="btn btn-flat btn-primary">Cari</button>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Periode</label>
                  <div class="col-sm-4" style="padding:0px">
                    <div  class="col-sm-6">
                      <select class="form-control"  name="bln_awal">
                      <option selected="selected">Bulan</option>
                      <?php
                      $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                      $jlh_bln=count($bulan);
                      for($c=0; $c<$jlh_bln; $c+=1){
                        $bul = $c+1;
                        echo '<option value="'.num_zero($bul).'">'.$bulan[$c].'</option>';
                      }
                      ?>
                    </select>
                    </div>
                    <div  class="col-sm-6">
                      <select class="form-control"  name="thn_awal">
                      <?php
                      echo '<option selected="selected">Tahun</option>';
                      $q = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT YEAR(TGL_PEMBAYARAN) AS THN FROM spp ORDER BY TGL_PEMBAYARAN ASC");
                      if (mysqli_num_rows($q) != 0) {
                        $x = 0;
                        while ($data = mysqli_fetch_assoc($q)) {
                          if ($x != $data['THN']) {
                            $x = $data['THN'];
                            echo '<option value="'.$data['THN'].'">'.$data['THN'].'</option>';
                          }
                        }
                      }
                      ?>
                    </select>
                    </div>
                  </div>
                  <label class="col-sm-1 control-label">Sampai</label>
                  <div class="col-sm-4" style="padding:0px">
                    <div  class="col-sm-6">
                      <select class="form-control"  name="bln_akhir">
                      <option selected="selected">Bulan</option>
                      <?php
                      $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                      $jlh_bln=count($bulan);
                      for($c=0; $c<$jlh_bln; $c+=1){
                        $bul = $c+1;
                        echo '<option value="'.$bul.'">'.$bulan[$c].'</option>';
                      }
                      ?>
                    </select>
                    </div>
                    <div  class="col-sm-6">
                      <select class="form-control"  name="thn_akhir">
                      <?php
                      echo '<option selected="selected">Tahun</option>';
                      $q = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT YEAR(TGL_PEMBAYARAN) AS THN FROM spp ORDER BY TGL_PEMBAYARAN ASC");
                      if (mysqli_num_rows($q) != 0) {
                        $x = 0;
                        while ($data = mysqli_fetch_assoc($q)) {
                          if ($x != $data['THN']) {
                            $x = $data['THN'];
                            echo '<option value="'.$data['THN'].'">'.$data['THN'].'</option>';
                          }
                        }
                      }
                      ?>
                    </select>
                    </div>
                  </div>
                  <button type="submit" name="submit_cari_periode"  class="btn btn-flat btn-primary" >Cari</button>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="laporanSPPAll.php"><input class="btn btn-flat btn-success pull-left" style="margin-right:15px" value="Laporan Keseluruhan"></button>
                <button type="submit" name="all" class="btn btn-flat btn-warning pull-right" style="margin-left:15px">Tampilkan Semua Pembayaran</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Daftar Pembayaran SPP</h3>
              <!-- <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
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
                  <th>Bayar</th>
                </tr>
                <tbody>
                  <?php
                     if (isset($_POST['submit_cari_nama'])) {
                        $cari = $_POST['cari_id'];
                        $query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tabel_spp where ID_SANTRI = '$cari'");
                     }

                     elseif (isset($_POST['submit_cari_periode'])) {
                        $bln_awal = $_POST['bln_awal'];
                        $thn_awal = $_POST['thn_awal'];
                        $bln_akhir = $_POST['bln_akhir'];
                        $thn_akhir = $_POST['thn_akhir'];
                        $awal = "$thn_awal-$bln_awal-01";
                        $akhir = "$thn_akhir-$bln_akhir-01";

                        $aw = date('Y-m-01', strtotime($awal));
                        $ak = date('Y-m-t', strtotime($akhir));

                        $query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tabel_spp where TGL_PEMBAYARAN between '$aw' and '$ak'");
                     }

                     elseif (isset($_POST['all'])) {
                        $query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from tabel_spp");
                     }

                     else {
                        $query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from tabel_spp");
                     }


                     if (mysqli_num_rows($query) > 0) {
                        $i = 1;
                        while ($data = mysqli_fetch_assoc($query)) {
                           echo '<tr>';
                              echo '<td>'.$i.'</td>';
                              echo '<td>'.date("d-n-Y",strtotime($data['TGL_PEMBAYARAN'])).'</td>';
                              echo '<td>'.$data['ID_SANTRI'].'</td>';
                              echo '<td>'.$data['NAMA_SANTRI'].'</td>';
                              echo '<td>Rp. '.rupiahFormat($data['TOTAL']).',-</td>';
                           echo '</tr>';
                           $i++;
                        }
                     } else {
                        echo '<tr>';
                           echo '<td>#</td>';
                           echo '<td colspan="4">DATA KOSONG!</td>';
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
    $(document).ready(function(){
       $("#cari_nama").autocomplete({
          minLength:1,
          source:'../script/spp_report_data.php',
          select:function(event, ui){
             $('#cari_id').val(ui.item.id);
          }
       });
    });
    </script>
  </body>
  </html>
