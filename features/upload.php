<?php
include("connect.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

$id = uniqid();


$vJudul = $_POST["nama"];
$vAuthor = $_POST["author"];
$vGenre = $_POST["genre"];
$vPenerbit = $_POST["penerbit"];
$vTanggal = $_POST["tgl_terbit"];
$vRating = $_POST["rating"];

$vCover = $_FILES["cover"]["name"];
$vCoverTemp = $_FILES["cover"]["tmp_name"];
$vPdf = $_FILES["file_pdf"]["name"];
$vPdfTemp = $_FILES["file_pdf"]["tmp_name"];


$baseDir = __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "upload";

$uploadDirCover = $baseDir . DIRECTORY_SEPARATOR . "images" . DIRECTORY_SEPARATOR . $id . DIRECTORY_SEPARATOR;
$uploadDirPdf = $baseDir . DIRECTORY_SEPARATOR . "pdf" . DIRECTORY_SEPARATOR . $id . DIRECTORY_SEPARATOR;


if (!is_dir($uploadDirCover)) {
    mkdir($uploadDirCover, 0777, true);
}
if (!is_dir($uploadDirPdf)) {
    mkdir($uploadDirPdf, 0777, true);
}

$coverPath = $uploadDirCover . basename($vCover);
$pdfPath = $uploadDirPdf . basename($vPdf);


if (move_uploaded_file($vCoverTemp, $coverPath) && move_uploaded_file($vPdfTemp, $pdfPath)) {
    $_SESSION['upload_data'] = 'Data Berhasil Ditambahkan';
} else {
  $_SESSION['upload_error'] = 'Gagal menambahkan Data';
}


$sql_prepare_query = "INSERT INTO tbl_buku(id,Cover,Judul_buku,Nama_penulis,Genre,Penerbit,Tanggal_Terbit,File_PDF,Rating) VALUES (?,?,?,?,?,?,?,?,?)";
$sql_prepare = mysqli_prepare($koneksi, $sql_prepare_query);
mysqli_stmt_bind_param($sql_prepare, 'ssssssssi', $id, $vCover, $vJudul, $vAuthor, $vGenre, $vPenerbit, $vTanggal, $vPdf, $vRating);
mysqli_stmt_execute($sql_prepare);


echo "<meta http-equiv=Refresh content=1;url=../admin/ />";
?>
