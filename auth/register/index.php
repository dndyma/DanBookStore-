<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar</title>
  <link rel="icon" href="../../asset/svg/home/logo.svg">
  <link rel="stylesheet" href="../../asset/css/auth/register.css" />
</head>

<body>
  <div class="main-login">
    <div class="main-form">
      <h1>Daftar</h1>
      <p id="desc">
        Dengan mendaftar, Anda menyetujui ketentuan berikut:
        <a href=''>
          <span className="font-bold">Kebijakan Privasi</span>
        </a>
        dan
        <a href=''>
          <span className="font-bold">Ketentuan Layanan</span>
        </a>
      </p>

      <form action="../../features/register.php" method="POST">
        <div>
          <div class="main-email">
            <input type="text" placeholder="fullname" name="fullname" maxlength="25" required>
            <img src="../../asset/svg/auth/icon/1.svg" alt="">
          </div>
          <div class="main-email">
            <input type="email" placeholder="email" name="email" maxlength="30" required>
            <img src="../../asset/svg/auth/icon/3.svg" alt="">
          </div>
          <div class="main-email">
            <input type="password" placeholder="password" name="password" minlength="8" maxlength="20" required>
            <img src="../../asset/svg/auth/icon/2.svg" alt="">
          </div>

        </div>
        <button type="submit">Daftar</button>
      </form>
      <?php
      $base_url = "http://localhost/auth/";
      ?>
      <p>Apakah Anda sudah punya akun ? <a href="<?= $base_url; ?>login/">disini</a></p>
    </div>
    <img src="../../asset/svg/auth/bg/1.svg" alt="">
  </div>
</body>

</html>
