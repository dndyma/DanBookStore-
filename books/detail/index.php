<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail</title>
  <link rel="icon" href="../../asset/svg/home/logo.svg">
  <link rel="stylesheet" href="../../asset/css/main.css" />
  <link rel="stylesheet" href="../../asset/css/nav-authenticated.css" />
  <link rel="stylesheet" href="../../asset/css/books/detail/main.css" />
  <link rel="stylesheet" href="../../asset/css/footer.css" />
</head>

</head>

<body>
<?php
  session_start();
  include '../../features/connect.php';
  $sesii = $_SESSION['userId'];
  $sql2 = "SELECT * FROM tbl_saved WHERE userId = '$sesii' ";
  $result2 = mysqli_query($koneksi, $sql2);
  $sql4 = "SELECT * FROM tbl_user WHERE userId = '$sesii'";
  $result4 = mysqli_query($koneksi, $sql4);

  if (!isset($_SESSION['userId'])) {
      header("Location: ../../auth/login");
      exit;  
  }
  $params = $_GET['id'];

   if (!$params) {
    header("Location: ../");
    exit;
   }
?>
  <!-- Navbar -->
  <header>
    <nav>
      <div class="nav-start">
        <img src="../../asset/svg/home/logo.svg" />
        <a href="/"> Ruang <span>Baca</span> </a>
      </div>
      <div class="nav-mid">
        <button class="btn-left">
          <div style="display: flex; align-items: center; gap: 13px; padding: 0 20px">
            <img src="../../asset/svg/home/menu.svg" />
            <h5>Buku</h5>
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
        <input type="text" name="" value="" />
        <button class="btn-right">
          <img src="../../asset/svg/home/search.svg" />
        </button>
      </div>
      <div class="nav-end">
        <a href="<?= $base_url; ?>books/saved/">
          <div class="badge"><?= mysqli_num_rows($result2)?></div>
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
    <div class="nav-sidebar">
      <h3>Halo</h3>
      <div class="nav-mid">
        <button class="btn-left">
          <div style="display: flex; align-items: center; gap: 13px; padding: 0 20px">
            <img src="../../asset/svg/home/menu.svg" />
            <h5>Buku</h5>
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
        <div class="input-search">
          <input type="text" name="" value="" />
          <button class="btn-right">
            <img src="../../asset/svg/home/search.svg" />
          </button>
        </div>
      </div>
      <div class="nav-end">
        <a href="<?= $base_url; ?>books/saved/">
          <div class="badge"><?= mysqli_num_rows($result2)?></div>
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
    </div>
  </header>
  <!-- Main -->
  <div class="ini">
    <h2>Buku Detail</h2>
  </div>
  <?php
  include "../../features/connect.php";
 $vId = $_GET['id'] ?? null;
 $query = "SELECT * FROM tbl_buku WHERE Id = '$vId'";
 $result = mysqli_query($koneksi,$query);
 $row = mysqli_fetch_assoc($result);
?>
  <main>

      <div class="img-cover">
        <img src="../../upload/images/<?= $vId ?>/<?= $row['Cover'] ?>" alt="" class="cover">
      </div>
      <div class="desc">
        <div class="card-title">
          <div style="display:flex;width: 100%" class="title">
            <h1><?= $row["Judul_buku"] ?></h1>
          </div>
          <div class="star">
            <img src="../../asset/svg/books/star.svg" alt="" style="width: 20px;height:20px;">
            <img src="../../asset/svg/books/star.svg" alt="" style="width: 20px;height:20px;">
            <img src="../../asset/svg/books/star.svg" alt="" style="width: 20px;height:20px;">
            <img src="../../asset/svg/books/star-empty.svg" alt="" style="width: 20px;height:20px;">
            <img src="../../asset/svg/books/star-empty.svg" alt="" style="width: 20px;height:20px;">
            <h4>4.0</h4>
          </div>
        </div>
        <p class="desc-title">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis ex nostrum unde ullam,
          amet dolore optio.
          Magni eaque autem nemo animi minus, natus dolore voluptatibus porro nam, a minima voluptates.
          Vel quidem vitae maxime! Ducimus, dolorem architecto laudantium recusandae autem, sed est libero aperiam quaerat
          nostrum aliquid voluptatem quo? Dolor ea soluta consectetur illo fugiat vel velit maiores odit in?
          Voluptatem repellat vel aperiam est voluptatibus accusantium eos voluptas aliquid dolor rerum fugit pariatur
          dolores aut minima temporibus ullam, error sapiente explicabo. Ratione voluptatibus expedita magni explicabo
          doloribus quas illo?
          Illo consequatur accusantium praesentium iure asperiores doloribus alias fugiat harum id necessitatibus quae
          laboriosam quisquam saepe sed est deleniti ab voluptas, ea, reiciendis placeat mollitia aperiam, ratione
          similique? Impedit, error?
          Cum tempore, porro totam ratione pariatur nulla repudiandae corrupti officia nesciunt nostrum autem facere
          dolorem quas perspiciatis soluta voluptatum vitae qui magni repellendus doloremque, quod tenetur! Ut veniam sint
          commodi!</p>
        <div class="card-author">
          <div class="card-author-img">
            <img src="../../asset/svg/books/nav-end/3.svg" />
            <div class="card-author-desc">
              <p>Ditulis oleh</p>
              <h5><?= $row["Nama_penulis"] ?></h5>
            </div>
          </div>
          <div class="card-author-img">
            <div class="card-author-desc">
              <p>Penerbit</p>
              <h5><?= $row["Penerbit"] ?></h5>
            </div>
          </div>
          <div class="card-author-img">
            <div class="card-author-desc">
              <p>Tahun</p>
              <h5><?= $row["Tanggal_Terbit"] ?></h5>
            </div>
          </div>
          <!-- <div class="card-button">
            <button class="btn1">Gratis</button>
            <button>EPUB</button>
          </div> -->
        </div>
        <div class="borrower-list">
          <button class="btn-baca" data-id="<?= $vId ?>">
            Baca
          </button>
        </div>
      </div>
      </span>
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
    const baca = document.querySelectorAll(".btn-baca");
    baca.forEach((c) => {
      c.addEventListener("click", (e) => {
        const Id = c.getAttribute("data-id");
        window.open(`http://localhost/reading/?id=${Id}`, "_blank");
        window.location.href=`../../features/reading.php/?id=${Id}`;
      });
    });
    

  </script>
</body>

</html>
