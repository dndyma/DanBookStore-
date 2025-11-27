<?php
$id = $_GET['id'] ?? null;

if ($id) {
  echo "<h1>Detail Buku dengan ID: " . htmlspecialchars($id) . "</h1>";
  // Logika database dapat ditambahkan di sini
} else {
  echo "ID tidak valid.";
}
?>

