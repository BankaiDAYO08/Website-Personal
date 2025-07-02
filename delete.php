<?php
session_start();
if (!isset($_SESSION['login'])) {
  die("Akses ditolak!");
}

$admin_user = 'garang';
$admin_pass = 'anjay';

if ($_POST['del_user'] !== $admin_user || $_POST['del_pass'] !== $admin_pass) {
  die("Username atau password Admin salah. <a href='uploads_list.php'>Kembali</a>");
}

if (isset($_POST['fileName'])) {
  $file = "uploads/" . basename($_POST['fileName']);
  if (file_exists($file)) {
    unlink($file);
    echo "File berhasil dihapus.<br><a href='uploads_list.php'>Kembali ke Halaman Sebelumnya</a>";
  } else {
    echo "File tidak ditemukan.<br><a href='uploads_list.php'>Kembali ke Halaman Sebelumnya</a>";
  }
} else {
  echo "Permintaan tidak valid.<br><a href='uploads_list.php'>Kembali ke Halaman Sebelumnya</a>";
}
?>
