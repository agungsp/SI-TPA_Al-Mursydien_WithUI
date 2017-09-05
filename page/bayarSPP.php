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
        Bayar SPP
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="kalender.php"><i class="fa fa-dashboard"></i>Beranda</a></li>
        <li><a href="#">Administrasi</a></li>
        <li class="active">SPP</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pembayaran SPP</h3>
            </div>
            <form class="form-horizontal" action="../script/input_proses.php" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-3 control-label">ID Santri</label>
                  <div class="col-sm-6">
                    <input type="text" name="spp_cari" id="spp_cari" autofocus placeholder="Cari Nama Santri" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama</label>
                  <div class="col-sm-6">
                    <input type="text" id="spp_name" name="spp_name" readonly="readonly" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Tanggal</label>
                  <div class="col-sm-6">
                    <input type="text" name="spp_date" id="spp_date" readonly="readonly" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Jumlah Tagihan</label>
                  <div class="col-sm-6">
                    <?php
                       $f_limit = fopen("../log/limit_spp.txt","r") or die ("Unable to open file!!");
                       $kalimat = fgets($f_limit);
                       $kata = explode(" ",$kalimat);
                       echo '<input id="spp_tagihan"  readonly="readonly" value="'.$kata[1].'" class="form-control" >';
                       fclose($f_limit);
                    ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Jumlah Terbayar</label>
                  <div class="col-sm-6">
                    <input id="spp_last"  readonly="readonly" class="form-control" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Jumlah Bayar</label>
                  <div class="col-sm-6">
                    <input type="text" name="spp_pay" id="spp_pay" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" value="" class="form-control">
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="submit_spp" id="submit_spp" class="btn btn-primary pull-right" style="margin-left:15px">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
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
         $("#spp_cari").autocomplete({
            minLength:1,
            source:'../script/spp_data2.php',
            select:function(event, ui){
               $('#spp_name').val(ui.item.nama);
               $('#spp_last').val(ui.item.terakhir_bayar);
            }
         });
      });

      $(function(){
         $('#spp_date').val(tanggal());
      });
    </script>
  </body>
  </html>
