<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-link">
  <a href="index.php" class="back">Halaman Login</a>
</div>
<div id="loading-screen">
  <div id="loading-text">Tunggu<span id="dots"></span></div>
  <div class="spinner"></div>
</div>
  <div class="dashboard-container">
    <h1>Dashboard Admin</h1>

    <!-- Upload Section -->
    <div class="upload-section">
      <h2>Upload File</h2>
      <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="up_user">Username Admin</label>
        <input type="text" name="up_user" id="up_user" placeholder="Username Upload">
        
        <label for="up_pass">Password Admin</label>
        <input type="password" name="up_pass" id="up_pass" placeholder="Password Upload">
        
        <label for="file">Pilih File</label>
        <input type="file" name="fileToUpload" id="file">
        
        <button type="submit">Upload</button>
      </form>
    </div>

    <!-- Unduh Section -->
    <div class="files-section">
      <h2>Unduh File</h2>
      <p>File yang sudah di-upload tersedia di halaman berikut:</p>
      <a href="uploads_list.php" class="btn">Lihat & Unduh File</a>
    </div>
  </div>

  <script>
  // FORM LOGIN & UPLOAD: loading 20 detik
  const forms = document.querySelectorAll('form');
  forms.forEach(form => {
    form.addEventListener('submit', function(e) {
      e.preventDefault(); // Tahan submit
      document.getElementById('loading-screen').style.display = 'flex';
      setTimeout(() => {
        form.submit(); // Submit beneran setelah 20 detik
      }, 5000);
    });
  });

  // LINK DOWNLOAD: loading 20 detik
  const downloadLinks = document.querySelectorAll('a.btn');
  downloadLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault(); // Tahan download
      document.getElementById('loading-screen').style.display = 'flex';
      const url = link.getAttribute('href');
      setTimeout(() => {
        window.location.href = url; // Arahkan download setelah 20 detik
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

  const loginLink = document.querySelectorAll('.login-link a, a.login-back');
  loginLink.forEach(link => {
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
