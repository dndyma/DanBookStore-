<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Beranda</title>
  <link rel="icon" href="../asset/svg/home/logo.svg">
  <link rel="stylesheet" href="../asset/css/main.css" />
  <?php session_start();  if (!isset($_SESSION['userId'])) { ?>
  <link rel="stylesheet" href="../asset/css/nav-unauthenticated.css" />
  <?php } else {?>
  <link rel="stylesheet" href="../asset/css/nav-authenticated.css" />
  <?php }?>
  <link rel="stylesheet" href="../asset/css/home/style.css" />
  <link rel="stylesheet" href="../asset/css/footer.css" />
</head>

<body>
  <!-- Navbar -->
  <?php 
    if (!isset($_SESSION['userId'])) {?>

  <header>
    <nav>
      <div class="nav-start">
        <img src="../asset/svg/home/logo.svg" />
        <a href="/"> Ruang <span>Baca</span> </a>
      </div>

      <div class="nav-mid">
        <button class="btn-left">
          <div style="display: flex; align-items: center; gap: 13px; padding: 0 20px">
            <img src="../asset/svg/home/menu.svg" />
            <h5>Menus</h5>
            <img src="../asset/svg/home/expand.svg" />
          </div>
        </button>
        <input type="text" name="" value="" />
        <button class="btn-right">
          <img src="../asset/svg/home/search.svg" />
        </button>
      </div>
      <div class="nav-end">
        <a href="/auth/login/"><button class="btn-login">Masuk</button></a>
        <button class="btn-signup">
          <img src="../asset/svg/home/profile.svg" />
          Daftar
        </button>
      </div>
    </nav>
  </header>
  <?php } else { ?>
  <header>
    <div class="nav-sidebar" style="background-color: white;">
      <div class="nav-mid">
        <button class="btn-left">
          <div style="display: flex; align-items: center; gap: 13px; padding: 0 20px">
            <img src="../asset/svg/home/menu.svg" />
            <h5>Buku</h5>
            <img src="../asset/svg/home/expand.svg" />
          </div>
          <div class="menu">
            <?php
            $base_url = "http://localhost/";
            ?>
            <a href="<?= $base_url; ?>home/">Beranda</a>
            <a href="<?= $base_url; ?>books/">Buku</a>
            <a href="<?= $base_url; ?>books/saved/">Disimpan</a>
            <a href="<?= $base_url; ?>books/reading/">Bacaan</a>
          </div>
        </button>
        <div class="input-search">
          <input type="text" name="" value="" class="input" />
          <button class="btn-right">
            <img src="../asset/svg/home/search.svg" />
          </button>
        </div>
      </div>
      <?php 
      include '../features/connect.php';
      $sesii = $_SESSION['userId'];
      $sql2 = "SELECT * FROM tbl_saved WHERE userId = '$sesii'";
      $result2 = mysqli_query($koneksi, $sql2);
      $sql4 = "SELECT * FROM tbl_user WHERE userId = '$sesii'";
      $result4 = mysqli_query($koneksi, $sql4);
      $userId = $_SESSION["userId"];
            $sql = "SELECT * FROM tbl_user WHERE userId = '$userId'";
            $result = mysqli_query($koneksi,$sql);
            $row = mysqli_fetch_assoc($result);
      ?>
      <div class="nav-end">
        <a href="<?= $base_url; ?>books/saved/">
          <div class="badge"><?= mysqli_num_rows($result2)?></div>
          <img src="../asset/svg/books/nav-end/1.svg" />
        </a>
        <a href="<?= $base_url; ?>books/reading/">
          <div class="badge"><?= mysqli_num_rows($result4)?></div>
          <img src="../asset/svg/books/nav-end/2.svg" />
        </a>
        <a href="<?= $base_url; ?>profile/?id=<?= $row['userId']?>" class="avatar">
          <img src="../asset/svg/books/nav-end/3.svg" />
          <div class="avatar-name">
            <h6><?= $row['fullname']?></h6>
            <p></p>
          </div>
        </a>
      </div>
    </div>
    <nav>
      <div class="nav-start">
        <img src="../asset/svg/home/logo.svg" />
        <a href="/"> Ruang <span>Baca</span> </a>
      </div>
      <div class="nav-mid">
        <button class="btn-left">
          <div style="display: flex; align-items: center; gap: 13px; padding: 0 20px">
            <img src="../asset/svg/home/menu.svg" />
            <h5>Beranda</h5>
            <img src="../asset/svg/home/expand.svg" />
          </div>
          <div class="menu">
            <?php
            include "../features/connect.php";
            $base_url = "http://localhost/";
            
            ?>
            <a href="<?= $base_url; ?>home/">Beranda</a>
            <a href="<?= $base_url; ?>books/">Buku</a>
            <a href="<?= $base_url; ?>books/saved/">Disimpan</a>
            <a href="<?= $base_url; ?>books/reading/">Bacaan</a>
          </div>
        </button>
        <input type="text" name="" value="" />
        <button class="btn-right">
          <img src="../asset/svg/home/search.svg" />
        </button>
      </div>
      <div class="nav-end">
        <a href="<?= $base_url; ?>books/saved/">
          <div class="badge"><?= mysqli_num_rows($result2)?></div>
          <img src="../asset/svg/books/nav-end/1.svg" />
        </a>
        <a href="<?= $base_url; ?>books/reading/">
          <div class="badge"><?= mysqli_num_rows($result4)?></div>
          <img src="../asset/svg/books/nav-end/2.svg" />
        </a>
        <a href="<?= $base_url; ?>profile/?id=<?= $row['userId']?>" class="avatar">
          <img src="../asset/svg/books/nav-end/3.svg" />
          <div class="avatar-name">
            <h6><?= $row['fullname']?></h6>
            <p></p>
          </div>
        </a>
      </div>
      <div class="nav-hamburger">
        <div class="line garis1"></div>
        <div class="line garis2"></div>
        <div class="line garis3"></div>
      </div>
    </nav>

  </header>

  <?php }  ?>
  <!-- Main -->
  <main>
    <!-- Bagian Hero -->
    <section class="hero">
      <div class="hero-left fade">
        <div class="parent-blob-section">
          <h1>Baca & Tumbuh
          </h1>
          <img src="../asset/svg/home/ilustration/1.svg" alt="" class="blob">
          <img src="../asset/svg/home/blob/1.svg" class="child-blob-section" />
        </div>
      </div>
      <div class="hero-left fade">
        <div class="parent-blob-section">
          <h1>Buku Tanpa Batas.</h1>
          <img src="../asset/svg/home/ilustration/2.svg" alt="" class="blob">
        </div>
      </div>
      <div class="hero-left fade">
        <div class="parent3-blob-section">
          <h1>Akses Tanpa Henti</h1>
          <img src="../asset/svg/home/ilustration/3.svg" alt="" class="blob">
          <img src="../asset/svg/home/blob/3.svg" class="child-blob-section" />
        </div>

      </div>

      <!-- <div class="hero-right">

      </div> -->
      <div style="text-align:center" class="dot-group">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
      </div>
    </section>
    <!-- Bagian List Card -->
    <section class="card">
      <div class="card-list" id="list1">
        <div class="card-box">
          <img src="../asset/svg/home/listcard/1.svg" />
        </div>
        <div>
          <h4>Akses Cepat</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, quisquam!</p>
        </div>
      </div>
      <div class="card-list" id="list2">
        <div class="card-box">
          <img src="../asset/svg/home/listcard/2.svg" />
        </div>
        <div>
          <h4>Keamanan Terjamin</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, quisquam!</p>
        </div>
      </div>

      <div class="card-list" id="list3">
        <div class="card-box">
          <img src="../asset/svg/home/listcard/3.svg" />
        </div>
        <div>
          <h4>Akses Kapan Saja</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, quisquam!</p>
        </div>
      </div>


    </section>
    <!-- Bagian Card Book -->
    <section class="cardbook">
      <div class="cardbook-left">
        <div class="carbook-recom">
          <div class="carbook-title">
            <h1>Rekomendasi buat kamu</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, aspernatur.</p>
          </div>
          <div class="cardbook-list">
            <img src="../asset/images/home/card/1.png" / width="100" height="150" class="gambar">
            <img src="../asset/images/home/card/2.png" / width="100" height="150" class="gambar">
            <img src="../asset/images/home/card/3.png" / width="100" height="150" class="gambar">
            <img src="../asset/images/home/card/4.png" / width="100" height="150" class="gambar">
          </div>
        </div>
        <img src="../asset/svg/home/cardblob/1.svg" id="cardblob1" />
        <img src="../asset/svg/home/cardblob/2.svg" id="cardblob2" />
      </div>
      </dizv>
      <div class="cardbook-right">
        <div class="carbook-recom">
          <div class="carbook-title">
            <h1>Populer di 2024</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, aspernatur.</p>
          </div>
          <div class="cardbook-list">
            <img src="../asset/images/home/card/5.png" / width="100" height="150" class="gambar">
            <img src="../asset/images/home/card/6.png" / width="100" height="150" class="gambar">
            <img src="../asset/images/home/card/7.png" / width="100" height="150" class="gambar">
            <img src="../asset/images/home/card/8.png" / width="100" height="150" class="gambar">
          </div>
        </div>
        <img src="../asset/svg/home/cardblob/3rev.svg" id="cardblob3" />
      </div>
    </section>

    <section class="special">
      <div class="special-title">
        <h1>Penulis Favorit</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, ab?</p>
      </div>
      <div class="special-card-group">
        <div class="special-card">
          <div class="special-card-left">
            <div class="special-card-left-title">
              <h1>Dandy M</h1>
              <p>
                ❝ Jangan takut bila maju perlahan tapi takutlah bila tidak ada kemajuan.❞
              </p>
            </div>
            <button>PROFIL</button>
          </div>
          <div class="special-card-right">
            <div class="special-card-right-title">
              <h1>Tere Liye</h1>
              <p>
                ❝ Pejuang sejati tidak akan menyerah sampai kematian sendiri yang menjemput dirinya❞
              </p>
            </div>
            <button>PROFIL</button>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- Footer -->
  <footer>
    <div class="footer-bg">
      <h1>Hubungi kami</h1>
      <div class="footer-list">
        <div class="footer-alamat">
          <h4>Alamat</h4>
          <p>Padang,Sumatra Barat</p>
          <p>Jl. Merapi Raya No. 123, Padang Utara, Kota Padang, Sumatera Barat, Indonesia</p>
          <p>Email: info@ruangbaca.com</p>
        </div>
        <div class="footer-staff">
          <h4>Hubungi Staf Kami</h4>
          <p>Butuh bantuan? Hubungi kami melalui:</p>
          <ul>
            <li><strong>Cristiano Ronaldo</strong> - Staff Ruang Baca
              <br>Telp: +62 812 3456 7890
              <br>Email: cristiano@ruangbaca.com
            </li>
          </ul>

        </div>
        <div class="footer-bug">
          <h4>Laporkan bug</h4>
          <input type="email">
          <button>Kirim</button>
          <div>
            <h5>Ikuti kita</h5>

            <ul>
              <a href="/www.instagram.com"><img src="../asset/svg/home/footer/follow/1.svg" alt=""></a>
              <a href="/www.linkedin.com"><img src="../asset/svg/home/footer/follow/2.svg" alt=""></a>
              <a href="/www.facebook.com"><img src="../asset/svg/home/footer/follow/3.svg" alt=""></a>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <?php if (!isset($_SESSION['userId'])) { ?>
  <script src="../asset/js/home/index.js"></script>
  <?php } else { ?>
  <script src="../asset/js/books/index.js"></script>
  <?php }?>
</body>


</html>
