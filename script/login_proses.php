<?php
   session_start();
   include '../koneksi.php';

   $error = '';
   if (isset($_POST['submit'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];

      $username = stripcslashes($username);
      $password = stripcslashes($password);
      $username = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $username);
      $password = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $password);

      $query = mysqli_query($GLOBALS["___mysqli_ston"], "select * from user where username = '$username' AND password = '$password'");
      $rows = mysqli_num_rows($query);
      if ($rows == 1) {
         $_SESSION['login_user'] = $username;
         header("location: menu.php");
      }
   }
?>
