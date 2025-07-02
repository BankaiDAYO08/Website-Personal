<?php
session_start();
$username = 'orangbaik';
$password = 'kurangbaik';

if ($_POST['username'] === $username && $_POST['password'] === $password) {
  $_SESSION['login'] = true;
  header("Location: dashboard.php");
} else {
  echo "Login gagal!";
}
?>
