<?php 
  include "connect.php";
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  session_start();
  $Id = $_GET['id'];
  
  $sesi = $_SESSION['userId'];
  $sql = "UPDATE tbl_user SET Bacaan='$Id' WHERE userId = '$sesi'";
  $result = mysqli_query($koneksi,$sql);
  header("Location: /books/detail/?id=".$Id);


?>
