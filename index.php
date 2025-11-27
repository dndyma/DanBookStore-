<?php

$request = trim($_SERVER['REQUEST_URI'], '/');

if ($request === '') {
  header("Location: home/", true, 301);
  exit;
} else {
  echo "PASTIKAN FOLDER PROJECT INI ADA DI MAIN UTAMA HTDOCS BUKAN DALAM SUBFOLDER";
}
?>
