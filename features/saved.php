<?php
  include "../features/connect.php";

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  session_start();

  $bookId = $_GET['id']; 
  $userId = $_SESSION['userId'];

  // Hapus data lama berdasarkan bookId saja
  $delete_sql = "DELETE FROM tbl_saved WHERE bookId = '$bookId'";
  $delete_result = mysqli_query($koneksi, $delete_sql);
  header("Location: /books/saved");
  mysqli_close($koneksi);
?>
