<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="icon" href="../asset/svg/home/logo.svg">
  <link rel="stylesheet" href="../asset/css/main.css" />
  <link rel="stylesheet" href="../asset/css/admin/style.css" />
  <link rel="stylesheet" href="../asset/css/notif.css" />
</head>

<body>
  <?php
      session_start();
      if (!isset($_SESSION['userId'])) {
          header("Location: ../auth/login");
          exit;  
      } 
      if ($_SESSION['role'] === 'user') {
        header("Location: ../home");
        exit;  
      }
      include "../features/connect.php";
      $id = $_SESSION['userId'];
      $sql = "SELECT * FROM tbl_user WHERE userId = '$id'";
      $result = mysqli_query($koneksi, $sql);
      $row = mysqli_fetch_array($result);


    ?>
  <h1 class="khusus">Maaf Halaman Admin Hanya Tersedia di desktop</h1>
  <!-- Nav -->
  <nav>
    <div class="avatar">
      <div class="avatar-img">
        <h1>❛❛</h1>
      </div>
      <div class="avatar-title">
        <h4><?= $row['fullname'] ?></h4>
        <p><?= $row['email'] ?></p>
      </div>
    </div>
    <div class="nav-list">
      <button class="home active">
        <div class="title">
          <img src="../asset/svg/admin/1.svg" alt="">
          <p>Beranda</p>
        </div>
      </button>
      <button class="home" id="btn2">
        <div class="title">
          <img src="../asset/svg/admin/2.svg" alt="">
          <p>Buku</p>
        </div>
      </button>
      <button class="home" id="btn3" data-id="<?= $row['userId'] ?>">
        <div class="title">
          <img src="../asset/svg/admin/4.svg" alt="">
          <p>Profil</p>
        </div>
      </button>
      <button class="home" id="btn4">
        <div class="title">
          <img src="../asset/svg/admin/3.svg" alt="">
          <p>Logout</p>
        </div>
      </button>
    </div>
    <div class="nav-ilustration">
      <img src="../asset/svg/admin/7.svg" alt="">
      <p> Ayo Daftarkan Buku digital sekarang!</p>
    </div>
  </nav>
  <!-- Main -->
  <main>
    <div class="main-start">
      <h1>Halo,<?= $row['fullname'] ?>👋</h1>
      <div class="input-search">
        <img src="../asset/svg/admin/8.svg" alt="">
        <input type="text">
      </div>
    </div>
    <div class="main-hero">
      <div class="main-title">
        <div class="title">
          <p class="p1">Upload buku untuk dapat dibaca oleh orang lain.</p>
          <button class="btn-tambah">
            <img src="../asset/svg/admin/5.svg" alt="">
            <p>Tambah buku</p>
          </button>
        </div>
      </div>
      <div class="hero">
        <img src="../asset/svg/admin/6.svg" alt="">
      </div>
    </div>
    <div class="main-table">
      <h3>Tabel Data Buku</h3>
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Author</th>
            <th>Penerbit</th>
            <th>Aksi</th>
          </tr>
        </thead>



        <tbody>
          <?php 
          include '../features/connect.php';
          $query = 'SELECT * FROM tbl_buku';
          $result = mysqli_query($koneksi,$query);
          $No = 1;
          while ($row = mysqli_fetch_assoc($result)) {?>
          <tr>
            <td><?= $No++?></td>
            <td><?= $row['Judul_buku']?></td>
            <td><?= $row['Nama_penulis']?></td>
            <td><?= $row['Penerbit']?></td>
            <td>
              <div style="display: flex;gap:3px;justify-content: center;">
                <button class="btn-detail" data-id="<?= $row['Id'] ?>">
                  <img src="../asset/svg/admin/11.svg" alt="">
                </button>
                <button class="btn-update" data-id="<?= $row['Id'] ?>">
                  <img src="../asset/svg/admin/9.svg" alt="">
                </button>
                <button class="btn-delete" data-id="<?= $row['Id'] ?>">
                  <img src="../asset/svg/admin/10.svg" alt="">
                </button>
              </div>
            </td>
          </tr>
          <?php } ?>

        </tbody>
      </table>
    </div>
  </main>
  <div class="notif">
    <h3>
      <?php 
        if (isset($_SESSION['upload_data'])){
            echo $_SESSION['upload_data'];
        }
        if (isset($_SESSION['upload_error'])) {
            echo $_SESSION['upload_error'];
        }
        if (isset($_SESSION['delete_success'])){
          echo $_SESSION['delete_success'];
        }
        if (isset($_SESSION['delete_error'])) {
            echo $_SESSION['delete_error'];
        }
        if (isset($_SESSION['edit_success'])){
          echo $_SESSION['edit_success'];
        }
        if (isset($_SESSION['edit_error'])) {
            echo $_SESSION['edit_error'];
        }
        unset($_SESSION['upload_data']);
        unset($_SESSION['upload_error']);
        unset($_SESSION['delete_success']);
        unset($_SESSION['delete_error']);
        unset($_SESSION['edit_success']);
        unset($_SESSION['edit_error']);
      ?>
    </h3>
  </div>
  <script src="../asset/js/admin/index.js"></script>
  <script>
  const btn4 = document.querySelector('#btn4');
  btn4.addEventListener('click', () => {
    window.location.href = '../../features/logout.php';
  });
  const notif = document.querySelector(".notif");
  if (notif.textContent.trim()) {
    notif.classList.add("active");
    setTimeout(() => {
      notif.classList.remove("active");
    }, 1000);
  }
  </script>
</body>

</html>