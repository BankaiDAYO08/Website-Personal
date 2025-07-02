<?php
session_start();
if (!isset($_SESSION['login'])) {
  die("Akses ditolak");
}

$up_user = 'garang';
$up_pass = 'anjay';

if ($_POST['up_user'] !== $up_user || $_POST['up_pass'] !== $up_pass) {
  die("Auth upload gagal!");
}

$target_dir = "uploads/";
if (!file_exists($target_dir)) {
  mkdir($target_dir, 0777, true);
}

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$totalSize = 0;
foreach (glob($target_dir . "*") as $file) {
  $totalSize += filesize($file);
}
$totalSize += $_FILES["fileToUpload"]["size"];

if ($totalSize > (10 * 1024 * 1024 * 1024)) { // 10GB
  die("Kapasitas penyimpanan melebihi 10GB");
}

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
  echo "File berhasil diupload. <a href='dashboard.php'>Kembali</a>";
} else {
  echo "Upload gagal.";
}
?>
