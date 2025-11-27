<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit</title>
  <link rel="icon" href="../../asset/svg/home/logo.svg">
  <link rel="stylesheet" href="../../asset/css/main.css" />
  <link rel="stylesheet" href="../../asset/css/admin/books/style.css" />
</head>

<body>
  <?php
      session_start();
      if (!isset($_SESSION['userId'])) {
          header("Location: ../auth/login");
          exit;  
      } 
      if ($_SESSION['role'] === 'user') {
        header("Location: ../../../../home/");
        exit;  
      }
    ?>
  <?php 
        include "../../features/connect.php";
        $vId = $_GET['id'] ?? null;
        $query = "SELECT * FROM tbl_buku WHERE Id = '$vId'";
        $result = mysqli_query($koneksi,$query);
        $row = mysqli_fetch_assoc($result);
      ?>
  <h1 class="khusus">Maaf Halaman Admin Hanya Tersedia di desktop</h1>
  <main>
    <div class="edit-hapus">
      <h3>Edit buku</h3>
      <button class="btn-hps" data-id="<?= $row['Id'] ?>">Hapus buku</button>
    </div>
    <form action="../../features/edit.php?id='121212'" method="post" enctype="multipart/form-data">

      <table>
        <input type="hidden" name="id" value="<?= $row['Id'] ?>" style="display: none;" required>
        <tr>
          <td><label for="cover">Cover</label></td>
          <td>
            <input type="file" id="cover" name="cover">
            <span style="font-size: small;">File Yang Sebelumnya diupload : <span
                style="color:red;"><?= $row['Cover']?></span></span>
            </input>
          </td>
        </tr>
        <tr>
          <td>
            <label for="nama">Judul Buku</label>
          </td>
          <td>
            <input type="text" id="nama" name="nama" value="<?= $row['Judul_buku']?>" required>
          </td>
        </tr>
        <tr>
          <td>
            <label for="author">Nama Penulis</label>
          </td>
          <td>
            <input type="text" id="author" name="author" value="<?= $row['Nama_penulis']?>" required />
          </td>
        </tr>
        <tr>
          <td>
            <label for="genre">Genre</label>
          </td>
          <td>
            <input type="text" id="genre" name="genre" value="<?= $row['Genre']?>" required>
          </td>
        </tr>
        <tr>
          <td>
            <label for="penerbit">Penerbit</label>
          </td>
          <td>
            <input type="text" id="penerbit" name="penerbit" value="<?= $row['Penerbit']?>" required>
          </td>
        </tr>
        <tr>
          <td>
            <label for="tgl_terbit">Tanggal Terbit</label>
          </td>
          <td>
            <input type="date" id="tgl_terbit" name="tgl_terbit" value="<?= $row['Tanggal_Terbit']?>" required>
          </td>
        </tr>
        <tr>
          <td>
            <label for="file_pdf">File PDF</label>
          </td>
          <td>
            <input type="file" id="file_pdf" name="file_pdf">
            <span style="font-size: small;">File Yang Sebelumnya diupload : <span
                style="color:red;"><?= $row['File_PDF']?></span></span></input>
          </td>
        </tr>
        <tr>
          <td>
            <label for="rating">Rating</label>
          </td>
          <td>
            <input type="number" id="rating" name="rating" required min="1" max="5" value="<?= $row['Rating']?>">
          </td>
        </tr>
        <tr>
          <td colspan="2"><button>Edit</button></td>
        </tr>
      </table>
    </form>
  </main>
  <script>
  const btnhps = document.querySelector('.btn-hps');
  btnhps.addEventListener('click', () => {
    const id = btnhps.getAttribute("data-id");
    window.location.href = `../../features/delete.php/?id=${id}`;
  })
  </script>
</body>

</html>