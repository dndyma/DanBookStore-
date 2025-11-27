<?php
include 'connect.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$vEmail = htmlspecialchars($_POST['email']);
$vPassword = htmlspecialchars($_POST['password']);



$sql_prepare_query = "SELECT userId,password,role FROM tbl_user WHERE email = ? ";
$sql_prepare = mysqli_prepare($koneksi, $sql_prepare_query);
mysqli_stmt_bind_param($sql_prepare, 's', $vEmail);
mysqli_stmt_execute($sql_prepare);
mysqli_stmt_store_result($sql_prepare);


if (mysqli_stmt_num_rows($sql_prepare) > 0) {
  mysqli_stmt_bind_result($sql_prepare, $userId,$hash,$role);
  mysqli_stmt_fetch($sql_prepare);

  if (password_verify(trim($vPassword), $hash)) {
    
    session_regenerate_id(true); 
    $_SESSION['userId'] = $userId;
    $_SESSION['role'] = $role;
    if ($role === 'user') {
      header("Location: ../books/");
      exit;
    } else {
      $_SESSION['userId'] = $userId;
      header("Location: ../admin/");
      exit;
    }
  } else {
    $_SESSION['password_error'] = "Password Anda Salah";
    header("Location: ../auth/login");
    exit;
  }
} else {
  $_SESSION['email_error'] = "Email belum terdaftar. Silakan daftar.";
  exit;
}




?>