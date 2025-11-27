<?php
// Periksa apakah 'id' ada di query string
if (isset($_GET['id'])) {
  // Jika 'id' ada, tampilkan error atau alihkan
  echo "Error: Halaman ini tidak dapat diakses dengan parameter ID.";
  exit; // Hentikan eksekusi skrip
}

// Jika tidak ada 'id', lanjutkan ke konten halaman
echo "Selamat datang di halaman Home!";
?>

