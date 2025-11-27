<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Simpan</title>
  <link rel="icon" href="../../asset/svg/home/logo.svg">
  <link rel="stylesheet" href="../../asset/css/main.css" />
  <link rel="stylesheet" href="../../asset/css/nav-authenticated.css" />
  <link rel="stylesheet" href="../../asset/css/books/style.css" />
  <link rel="stylesheet" href="../../asset/css/footer.css" />
</head>

<body>
  <!-- Navbar -->
  <?php
  session_start();
    if (!isset($_SESSION['userId'])) {
        header("Location: ../../auth/login");
        exit;  
    }
    include "../../features/connect.php";

    $sesii = $_SESSION['userId'];
    $query = "SELECT * FROM `tbl_saved` JOIN `tbl_buku` ON `tbl_saved`.`bookId` = `tbl_buku`.`Id` WHERE `tbl_saved`.`userId` = '$sesii'";
    $result = mysqli_query($koneksi,$query);
    $sql4 = "SELECT * FROM tbl_user WHERE userId = '$sesii'";
    $result4 = mysqli_query($koneksi, $sql4);
    
?>
  <header>
    <div class="nav-sidebar">
      <div class="nav-mid">
        <button class="btn-left">
          <div style="display: flex; align-items: center; gap: 13px; padding: 0 20px">
            <img src="../../asset/svg/home/menu.svg" />
            <h5>Disimpan</h5>
            <img src="../../asset/svg/home/expand.svg" />
          </div>
          <div class="menu">
            <?php
            $base_url = "http://localhost/";
            $userId = $_SESSION["userId"];
            $sql3 = "SELECT * FROM tbl_user WHERE userId = '$userId'";
            $result3 = mysqli_query($koneksi,$sql3);
            $row = mysqli_fetch_assoc($result3);
            ?>
            <a href="<?= $base_url; ?>home/">Beranda</a>
            <a href="<?= $base_url; ?>books/">Buku</a>
            <a href="<?= $base_url; ?>books/saved/">Disimpan</a>
            <a href="<?= $base_url; ?>books/reading/">Bacaan</a>
          </div>
        </button>
        <div class="input-search">
          <input type="text" name="" value="" />
          <button class="btn-right">
            <img src="../../asset/svg/home/search.svg" />
          </button>
        </div>
      </div>
      <div class="nav-end">
        <a href="<?= $base_url; ?>books/saved/">
          <div class="badge"><?= mysqli_num_rows($result)?></div>
          <img src="../../asset/svg/books/nav-end/1.svg" />
        </a>
        <a href="<?= $base_url; ?>books/reading/">
          <div class="badge"><?= mysqli_num_rows($result4)?></div>
          <img src="../../asset/svg/books/nav-end/2.svg" />
        </a>
        <a  href="<?= $base_url; ?>profile/?id=<?= $row['userId']?>" class="avatar">
          <img src="../../asset/svg/books/nav-end/3.svg" />
          <div class="avatar-name">
            <h6><?= $row['fullname']?></h6>
            <p></p>
          </div>
        </a>
      </div>
    </div>
    <nav>
      <div class="nav-start">
        <img src="../../asset/svg/home/logo.svg" />
        <a href="/"> Ruang <span>Baca</span> </a>
      </div>
      <div class="nav-mid">
        <button class="btn-left">
          <div style="display: flex; align-items: center; gap: 13px; padding: 0 20px">
            <img src="../../asset/svg/home/menu.svg" />
            <h5>Disimpan</h5>
            <img src="../../asset/svg/home/expand.svg" />
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
        <input type="text" name="" value="" />
        <button class="btn-right">
          <img src="../../asset/svg/home/search.svg" />
        </button>
      </div>
      <div class="nav-end">
        <a href="<?= $base_url; ?>books/saved/">
          <div class="badge"><?= mysqli_num_rows($result)?></div>
          <img src="../../asset/svg/books/nav-end/1.svg" />
        </a>
        <a href="<?= $base_url; ?>books/reading/">
          <div class="badge"><?= mysqli_num_rows($result4)?></div>
          <img src="../../asset/svg/books/nav-end/2.svg" />
        </a>
        <a href="<?= $base_url; ?>profile/?id=<?= $row['userId']?>" class="avatar">
          <img src="../../asset/svg/books/nav-end/3.svg" />
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

  <!-- Main -->

  <main>
    <div class="parent">
      <!-- <div class="main-left">
        <h2>Select Genre</h2>
        <div></div>
      </div> -->
      <div class="main-right">
        <h2>Buku Yang Disimpan</h2>
        <div class="main-list"> 
        <?php 
      //  if (mysqli_num_rows($result) == 0 ) {
      //   echo "<div style='text-align:center;font-weight:bold;font-size:30px;margin:100px 0;'>Data Yang Disimpan tidak ada</div>";
      //  }
        while ($row = mysqli_fetch_array($result)) {?>
          <button class="card" onclick="click()" data-id="<?=$row['Id']?>">
            <div class="close" data-close="<?=$row['Id']?>">
              X
            </div>
            <div class="card-cover">
              <img src="../../upload/images/<?= $row['Id'] ?>/<?= $row['Cover'] ?>" alt="" class="cover">
            </div>
            <p class="title"><?= $row['Judul_buku']?></p>
            <p class="genre"><?= $row['Genre']?></p>
            <div>
              <?php 
              for ($i = 0; $i < $row['Rating']; $i++) {
                echo '<img src="../../asset/svg/books/star.svg" alt="Star" style="width: 30px; height: 30px;">';
              }
              for ($i = 0; $i < 5 - $row['Rating'] ; $i++) {
                echo '<img src="../../asset/svg/books/star-empty.svg" alt="Empty Star" style="width: 30px; height: 30px;">';
              }
              
              ?>
          </button>
          <?php } ?>
        </div>
        </div>
      </div>
    </div>
  </main>
  <!-- Footer -->
  <footer>
    <div class="footer-bg">
      <h1>Hubungi Kami</h1>
      <div class="footer-list">
        <div class="footer-alamat">
          <h4>Alamat</h4>
          <p>Padang,Sumatra barat</p>
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
          <h4>Laporkan Bug</h4>
          <input type="email" placeholder="email">
          <button>kirim</button>
          <div>
            <h5>Ikuti kita</h5>

            <ul>
              <a href="/www.instagram.com"><img src="../../asset/svg/home/footer/follow/1.svg" alt=""></a>
              <a href="/www.linkedin.com"><img src="../../asset/svg/home/footer/follow/2.svg" alt=""></a>
              <a href="/www.facebook.com"><img src="../../asset/svg/home/footer/follow/3.svg" alt=""></a>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script src="../../asset/js/books/index.js"></script>
  <script>
    const close = document.querySelectorAll('.close');
    close.forEach(close => {
      close.addEventListener("click", (e) => {
      e.stopPropagation();
      const id = close.getAttribute("data-close");
      window.location.href = `../../features/saved.php/?id=${id}`;
    });
    });

  </script>
</body>
</html>
