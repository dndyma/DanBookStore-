<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reading</title>
  <link rel="stylesheet" href="../asset/css/reading/style.css">
  <link rel="stylesheet" href="../asset/css/footer.css">
</head>

<body>

  <?php 
  session_start();
  if (!isset($_SESSION['userId'])) {
      header("Location: ../auth/login");
      exit;  
  }
    include '../features/connect.php';
    $Id = $_GET['id'] ?? null;
    $query = "SELECT Id,File_PDF FROM tbl_buku WHERE Id = '$Id'";
    $result = mysqli_query($koneksi,$query);
    $row = mysqli_fetch_assoc($result);

    
  
  ?>
  <embed src="../upload/pdf/<?= $Id ?>/<?= $row['File_PDF']?>" type="application/pdf">
</body>

</html>
