<?php
  include "../features/connect.php";

  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$bookId = $_GET['id']; 
$userId = $_SESSION['userId'];


$check_sql = "SELECT * FROM tbl_saved WHERE userId = '$userId' AND bookId = '$bookId'";
$check_result = mysqli_query($koneksi, $check_sql);

if (mysqli_num_rows($check_result) > 0) {
    $bookId = $_GET['id']; 
    $userId = $_SESSION['userId'];

    $delete_sql = "DELETE FROM tbl_saved WHERE bookId = '$bookId'";
    $delete_result = mysqli_query($koneksi, $delete_sql);
    header("Location: /books/");
  mysqli_close($koneksi);
   $_SESSION['delete_book'] = 'Hapus Disimpan';
} else {
    $insert_sql = "INSERT INTO tbl_saved (userId, bookId) VALUES ('$userId', '$bookId')";
    $insert_result = mysqli_query($koneksi, $insert_sql);
    
    if ($insert_result) {
        header("Location: /books/");
        $_SESSION['add_book'] = 'Disimpan';
        exit;
    } else {
        echo "Gagal menyimpan buku.";
    }
}

mysqli_close($koneksi);
?>
