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


?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>login</title>
  <!-- Bostrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- logis.css -->
  <link rel="stylesheet" href="css/login.css">

</head>

<body>

  <div class="container">
    <div class="row d-flex justify-content-around align-items-center min-vh-100">

      <div class="d1 col-md-6">
        <div class="p1 mb-5 text-light">
          <h2>Welcome back!</h2>
          <p>Enter your details to continue enjoying your favorite tunes.</p>
        </div>

        <?php if (isset($error)) : ?>
          echo "
          <script>
            alert('username dan password salah');
            document.location.href = 'login.php';
          </script>
          ";
        <?php endif; ?>



        <form action="" method="post">
          <div class="p2">

            <div class="mb-2">
              <label for="username" class="form-label text-light">Username</label>
              <div class="field-group text-light">
                <input type="text" class="form-control rounded-pill text-light" id="username" placeholder="Username" name="username">
                <div class="icon">
                  <img src="icons/crown.png" alt="">
                </div>
              </div>
            </div>




            <div class="mb-2">
              <label for="exampleFormControlInput1" class="form-label text-light">Password</label>
              <div class="field-group text-light">
                <input type="password" class="form-control rounded-pill" id="exampleFormControlInput1" placeholder="Password" name="password">
                <div class="icon">
                  <img src="icons/lock.png" alt="">
                </div>
              </div>
            </div>


          </div>

          <div class="p3">

            <div class="">
              <img src="" alt="">
              <button type="submit" name="submit" class="btn btn-primary mb-2 w-100 rounded-pill">Sign in</button>
            </div>
        </form>


        <div class="">
          <button type="button" class="btn btn-light w-100 rounded-pill"><a href="create_akun.php" class="text-decoration-none">Create New Account</a></button>
        </div>
      </div>

    </div>

    <div class="d2 col-md-6">

      <p class="text-light fw-bold">tune track.</p>

    </div>
  </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>