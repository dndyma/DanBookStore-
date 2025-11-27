<?php
include "connect.php";


  // print_r($_FILES);
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
$vId = $_GET["id"] ?? null;

if ($vId) {
        $query = "SELECT Cover,File_PDF FROM tbl_buku WHERE Id = '$vId'";
        $result = mysqli_query($koneksi,$query);
        $row = mysqli_fetch_assoc($result);

        $coverPath = "../upload/images/$vId/".$row['Cover']; 
        $coverDir = "../upload/images/$vId";
        $pdfDir = "../upload/pdf/$vId";
        $pdfPath = "../upload/pdf/$vId/".$row['File_PDF']; 
        if (is_file($coverPath)) {
          unlink($coverPath);
        }
       if (is_dir($coverDir)) {
          rmdir($coverDir);
       }
        if (is_file($pdfPath)) {
        unlink($pdfPath);
       }
        if (is_dir($pdfDir)) {
            rmdir($pdfDir);
        }
        $sql = "DELETE FROM tbl_buku WHERE Id = '$vId'";
        if (mysqli_query($koneksi, $sql)) {
          $_SESSION['delete_success'] = "✅Berhasil Hapus";
          echo "<meta http-equiv=Refresh content=1;url=http://localhost/admin/ />";
        } else {
          $_SESSION['delete_error'] = "❌Gagal Hapus";
        }

} else {
  echo "gagal";
}


// echo "<meta http-equiv=Refresh content=1;url=../books/>";
?>
