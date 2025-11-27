<?php
include "connect.php";


  // print_r($_FILES);
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
$vId = $_POST["id"] ?? null;  
$vJudul = $_POST["nama"] ?? null;
$vAuthor = $_POST["author"] ?? null;
$vGenre = $_POST["genre"] ?? null;
$vPenerbit = $_POST["penerbit"] ?? null;
$vTanggal = $_POST["tgl_terbit"] ?? null;
$vRating = $_POST["rating"];

$vCover = $_FILES["cover"]["name"] ?? null;
$vCoverTemp = $_FILES["cover"]["tmp_name"] ?? null;
$vPdf = $_FILES["file_pdf"]["name"] ?? null;
$vPdfTemp = $_FILES["file_pdf"]["tmp_name"] ?? null;
$coverPath = null;
$pdfPath = null;
$coverFileName = null;
$pdfFileName = null;
if ($vCover) {
  $uploadDirCover = '/opt/lampp/htdocs/upload/images/';
  $coverFileName = basename($vCover); 
  $coverPath = $uploadDirCover . basename($_FILES["cover"]["name"]);
  if (move_uploaded_file($vCoverTemp, $coverPath)) {
    echo "File berhasil diupload.";
  } else {
    echo "Gagal mengupload file.";
  }
  
} else if($vPdf) {
  $uploadDirPdf = '/opt/lampp/htdocs/upload/pdf/';
  $pdfFileName = basename($vPdf); 
  $pdfPath = $uploadDirPdf . basename($_FILES["file_pdf"]["name"]);  
  if (move_uploaded_file($vPdfTemp, $pdfPath)) {
    echo "";
  } else {
    echo "Gagal mengupload file.";
  }
}


$data = mysqli_query($koneksi, "SELECT Id,File_PDF,Cover FROM tbl_buku WHERE Id = '$vId'");
$row = mysqli_fetch_assoc($data);
$id = $row['Id'];
$pdf = $row['File_PDF'];
$cover = $row['Cover'];


if (!$coverPath) {
  $coverFileName = $cover;
}

// Jika tidak ada file PDF yang diupload, tetap gunakan file PDF yang lama
if (!$pdfPath) {
  $pdfFileName = $pdf;
}


$sql = "
    UPDATE tbl_buku 
    SET 
        Cover = '$coverFileName',
        Judul_buku = '$vJudul',
        Nama_penulis = '$vAuthor',
        Genre = '$vGenre',
        Penerbit = '$vPenerbit',
        Tanggal_Terbit = '$vTanggal',
        File_PDF = '$pdfFileName',
        Rating = '$vRating'
    WHERE Id = '$id'
";
if (mysqli_query($koneksi, $sql)) {
  $_SESSION['edit_success'] = "Berhasil Edit";
  echo "<meta http-equiv=Refresh content=1;url=http://localhost/admin/ />";
} else {
  $_SESSION['edit_error'] = "Error Edit";
  echo "Error: " . mysqli_error($koneksi);
}

// echo "<meta http-equiv=Refresh content=1;url=../books/>";
?>