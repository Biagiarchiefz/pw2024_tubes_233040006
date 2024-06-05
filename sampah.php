<?php 

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

  // cek username dan password 
  if ($_POST["username"] == "admin" && $_POST["password"] == "123") {


    // jika benar, redirect ke halaman admin
    header("Location: admin.php");
    exit;
  } else {
    // jika salah, tampilkan pesan kesalahan
    $error = true;
  }
}


// <?php if (isset($error)) : ?>
  echo "
  <script>
    alert('username dan password salah');
    document.location.href = 'login.php';
  </script>
  ";
  // endif






?>