<?php
include '../../features/connect.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();


$email_error = '';
$password_error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $vEmail = htmlspecialchars($_POST['email']);
    $vPassword = htmlspecialchars($_POST['password']);

    $sql_prepare_query = "SELECT userId, password, role FROM tbl_user WHERE email = ? ";
    $sql_prepare = mysqli_prepare($koneksi, $sql_prepare_query);
    mysqli_stmt_bind_param($sql_prepare, 's', $vEmail);
    mysqli_stmt_execute($sql_prepare);
    mysqli_stmt_store_result($sql_prepare);

    if (mysqli_stmt_num_rows($sql_prepare) > 0) {
        mysqli_stmt_bind_result($sql_prepare, $userId, $hash, $role);
        mysqli_stmt_fetch($sql_prepare);

        if (password_verify(trim($vPassword), $hash)) {
            session_regenerate_id(true); 
            $_SESSION['userId'] = $userId;
            $_SESSION['role'] = $role;
            if ($role === 'user') {
                header("Location: /books");
                exit;
            } else {
                header("Location: /admin");
                exit;
            }
        } else {
            $_SESSION['password_error'] = "Password Anda Salah";
            $password_error = "Password Anda Salah"; 
        }
    } else {
        $_SESSION['email_error'] = "Email belum terdaftar. Silakan lanjutkan.";
        $email_error = "Email belum terdaftar. Silakan daftar."; 
    }

}
if ($email_error) {
  unset($_SESSION['email_error']);
}
if ($password_error) {
  unset($_SESSION['password_error']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Masuk</title>
  <link rel="icon" href="../../asset/svg/home/logo.svg">
  <link rel="stylesheet" href="../../asset/css/auth/login.css" />
  <link rel="stylesheet" href="../../asset/css/notif.css">
</head>

<body>
  <div class="main-login">
    <div class="main-form">
      <h1>Selamat Datang!</h1>
      <form action="" method="POST">
        <div>
          <div class="main-email">
            <input type="email" placeholder="email" name="email" maxlength="30" required>
            <img src="../../asset/svg/auth/icon/3.svg" alt="">
          </div>
          <div class="main-email">
            <input type="password" placeholder="password" name="password" minlength="8" maxlength="20" required>
            <img src="../../asset/svg/auth/icon/2.svg" alt="">
          </div>
        </div>
        <button type="submit" class="btn-kirim">Kirim</button>
      </form>
      <?php
      $base_url = "http://localhost/auth/";
      ?>
      <p>Tidak memiliki akun Daftar ? <a href="<?= $base_url; ?>register/"> disini</a></p>
    </div>
    <img src="../../asset/svg/auth/bg/1.svg" alt="">
  </div>

  <div class="notif">
    <h3>
      <?php 
        if ($email_error) {
            echo $email_error;
        }
        if ($password_error) {
            echo $password_error;
        }
      ?>
    </h3>
  </div>

</body>

<script>
const errorMessages = <?php echo json_encode(['email_error' => $email_error, 'password_error' => $password_error]); ?>;
const notif = document.querySelector('.notif');

if (errorMessages.email_error || errorMessages.password_error) {
  notif.classList.add('active');
}
setTimeout(() => {
  notif.classList.remove('active');
}, 3000);
</script>


</html>