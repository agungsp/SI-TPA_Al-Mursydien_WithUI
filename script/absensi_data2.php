<?php
   //include 'mysql.php';
   include '../koneksi.php';
   $term = $_GET['term'];

   $query  = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from pengajar where NAMA_PENGAJAR like '".$term."%'");
   $json = array();

   while($pengajar = mysqli_fetch_array($query)){
       $json[] = array(
           'label' => $pengajar['ID_PENGAJAR'].' - '.$pengajar['NAMA_PENGAJAR'], // text sugesti saat user mengetik di input box
           'value' => $pengajar['ID_PENGAJAR'], // nilai yang akan dimasukkan diinputbox saat user memilih salah satu sugesti
           'nama' => $pengajar['NAMA_PENGAJAR']
       );
   }
   header("Content-Type: text/json");
   echo json_encode($json);
?>
