<?php
$server = "localhost";
$database = "db_ruang_baca";
$username = "root";
$password = "";

$koneksi = mysqli_connect($server, $username, $password, $database);

if (!$koneksi) {
  die("Koneksi Gagal" . mysqli_connect_error());
}
// mysqli_close($koneksi);
?>