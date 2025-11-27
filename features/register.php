<?php
include 'connect.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$vFullname = htmlspecialchars($_POST['fullname']);
$vEmail = htmlspecialchars($_POST['email']);
$vPassword = htmlspecialchars(trim($_POST['password']));

if ($vEmail) {
  $sqlMail = mysqli_query($koneksi, "SELECT email from tbl_user WHERE email = '$vEmail'");
  if (mysqli_num_rows(result: $sqlMail) > 0) {
    $_SESSION['email_error'] = "Email belum terdaftar. Silakan daftar.";
    echo "Error";
  }
}



$UUID = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4));
$vNewPassword = password_hash($vPassword, PASSWORD_BCRYPT);

$sql_prepare_query = "insert into tbl_user(userId,fullname,email,password,role) values (?,?,?,?,?)";
$role = 'user';
$sql_prepare = mysqli_prepare($koneksi, $sql_prepare_query);
mysqli_stmt_bind_param($sql_prepare, 'sssss', $UUID, $vFullname, $vEmail, $vNewPassword, $role);
mysqli_stmt_execute($sql_prepare);


echo "<meta http-equiv=Refresh content=1;url=../auth/login>";

?>