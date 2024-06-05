<?php 
require 'functions.php';


if (isset($_POST['registrasi'])) {
  if (registrasi($_POST) > 0) {
    echo " 
    <script>
    alert('user baru berhasil ditambahkan. silahkan login');
    document.location.href = 'login.php';
    </script>
    ";    
  } else {
    echo 'user gagal ditambahkan';
  }
}








?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi</title>
  <!-- Bostrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- logis.css -->
  <link rel="stylesheet" href="css/user_login.css">

</head>

<body>

  <div class="container">
    <div class="row d-flex justify-content-around align-items-center min-vh-100">

      <div class="d1 col-md-6">
        <div class="p1 mb-4 text-light">
          <h2>Start Your Musical Adventure!</h2>
          <p>Sign up now and discover the perfect playlist for every moment.</p>
        </div>


        <form action="" method="post">

          <div class="p2">

            <div class="mb-2">
              <label for="exampleFormControlInput1" class="form-label text-light">Username</label>
              <div class="field-group text-light">
                <input type="text" class="form-control rounded-pill shadow-none text-light" id="exampleFormControlInput1" placeholder="Username" name="username" autocomplete="off" autofocus required>
                <div class="icon">
                  <img src="icons/user.png" alt="">
                </div>
              </div>
            </div>

            <div class="mb-2">
              <label for="exampleFormControlInput1" class="form-label text-light">Email</label>
              <div class="field-group">
                <input type="email" class="form-control rounded-pill shadow-none text-light" id="exampleFormControlInput1" placeholder="Email" name="email" autocomplete="off" autofocus required>
                <div class="icon">
                  <img src="icons/crown.png" alt="">
                </div>
              </div>
            </div>

            <div class="mb-2">
              <label for="exampleFormControlInput1" class="form-label text-light ">Password</label>
              <div class="field-group">
                <input type="password" class="form-control rounded-pill shadow-none text-light" id="exampleFormControlInput1" placeholder="Password" name="password" required>
                <div class="icon">
                  <img src="icons/lock.png" alt="">
                </div>
              </div>
            </div>

          </div>

          <div class="p3 mt-4">

            <div class="">
              <a href="">
                <button type="submit" name="registrasi" class="btn btn-primary mb-2 w-100 rounded-pill">Create Account</button>
              </a>
            </div>

            <div class="">
              <a href="login.php">
                <button type="button" class="btn btn-light w-100 rounded-pill">Sign In to My Account</button>
              </a>
            </div>

          </div>

        </form>

      </div>

      <div class="d2 col-md-6">

        <p class="text-light fw-bold">tune track.</p>

      </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>