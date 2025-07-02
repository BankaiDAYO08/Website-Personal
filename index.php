<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="loading-screen">
  <div id="loading-text">Tunggu<span id="dots"></span></div>
  <div class="spinner"></div>
</div>
<div class="login-container">
  <div class="login-card">
    <h2>Login</h2>
    <form action="auth.php" method="POST">
      <input type="text" name="username" placeholder="Username">
      <input type="password" name="password" placeholder="Password">
      <button type="submit">Masuk</button>
    </form>
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
</script>

</body>
</html>
