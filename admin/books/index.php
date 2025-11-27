<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload</title>
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
  <main>
    <div class="edit-hapus">
      <h3>Upload Buku</h3>
    </div>
   
    <form action="../../features/upload.php" method="POST" enctype="multipart/form-data">
      <table>
        <tr>
          <td><label for="cover">Cover</label></td>
          <td><input type="file" id="cover" name="cover" accept="image/*" required></td>
        </tr>
        <tr>
          <td>
            <label for="nama">Nama Buku</label>
          </td>
          <td>
            <input type="text" id="nama" name="nama" required>
          </td>
        </tr>
        <tr>
          <td>
            <label for="author">Nama Penulis</label>
          </td>
          <td>
            <input type="text" id="author" name="author" required>
          </td>
        </tr>
        <tr>
          <td>
            <label for="genre">Genre</label>
          </td>
          <td>
            <input type="text" id="genre" name="genre" required>
          </td>
        </tr>
        <tr>
          <td>
            <label for="penerbit">Penerbit</label>
          </td>
          <td>
            <input type="text" id="penerbit" name="penerbit" required>
          </td>
        </tr>
        <tr>
          <td>
            <label for="tgl_terbit">Tanggal Terbit</label>
          </td>
          <td>
            <input type="date" id="tgl_terbit" name="tgl_terbit" required>
          </td>
        </tr>
        <tr>
          <td>
            <label for="file_pdf">File PDF</label>
          </td>
          <td>
            <input type="file" id="file_pdf" name="file_pdf" accept=".pdf" required>
          </td>
        </tr>
        <tr>
          <td>
            <label for="rating">Rating</label>
          </td>
          <td>
            <input type="number" id="rating" name="rating" required min="1" max="5">
          </td>
        </tr>
        <tr>
          <td colspan="2"><button type="submit">Upload</button>
          </td>
        </tr>
      </table>
    </form>
  </main>
</body>

</html>
