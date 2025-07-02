<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: index.php");
  exit();
}

$files = glob("uploads/*");
?>
<!DOCTYPE html>
<html>
<head>
  <title>File Upload</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="loading-screen">
  <div id="loading-text">Tunggu<span id="dots"></span></div>
  <div class="spinner"></div>
</div>
<div class="files-section">
  <h2>File yang Tersedia</h2>
  <?php foreach ($files as $file): 
    $fileName = basename($file);
  ?>
    <div class="file-item">
      <a href="<?= $file ?>" download><?= $fileName ?></a>
      <form method="POST" action="delete.php" class="delete-form">
        <input type="hidden" name="fileName" value="<?= $fileName ?>">
        <input type="text" name="del_user" placeholder="Username Admin">
        <input type="password" name="del_pass" placeholder="Password Admin">
        <button type="submit" class="delete-btn">Hapus</button>
      </form>
    </div>
  <?php endforeach; ?>
  <div class="back-link">
    <a href="dashboard.php">&larr; Kembali ke Dashboard</a>
  </div>
</div>
<script>
  // Animasi titik-titik setelah "Tunggu"
  let dots = 0;
  setInterval(() => {
    dots = (dots + 1) % 4; // 0 1 2 3
    document.getElementById('dots').innerText = '.'.repeat(dots);
  }, 500);

  // Loading 20 detik pada form submit
  const forms = document.querySelectorAll('form');
  forms.forEach(form => {
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      document.getElementById('loading-screen').style.display = 'flex';
      setTimeout(() => {
        form.submit();
      }, 5000);
    });
  });

  // Loading 20 detik pada link download
  const downloadLinks = document.querySelectorAll('a.btn');
  downloadLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault();
      document.getElementById('loading-screen').style.display = 'flex';
      const url = link.getAttribute('href');
      setTimeout(() => {
        window.location.href = url;
      }, 5000);
    });

  });
  const backLinks = document.querySelectorAll('.back-link a, a.back');
  backLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault();
      document.getElementById('loading-screen').style.display = 'flex';
      const url = link.getAttribute('href');
      setTimeout(() => {
        window.location.href = url;
      }, 5000);
    });
  });
</script>

</body>
</html>
