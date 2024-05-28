<?php
require("functions.php");
// tampung ke variabel
$data = query("SELECT * FROM users");

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>admin</title>
  <!-- Bostrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- logis.css -->
  <link rel="stylesheet" href="css/admin.css">

</head>

<body>

  <header class="">
    <div class="sidebar border-end border-5 border-dark ">

      <div class="logo mt-2">
        <p>tunetrack
          admin.</p>
      </div>

      <div class="sidebar_menu ">

        <div class="mn d-flex">
          <div class="icn me-3">
            <img src="icons/home-hashtag.png" class="" alt="">
          </div>
          <a href="admin.php">
            <p class="">songs</p>
          </a>
        </div>

        <div class="mn d-flex">
          <div class="icn me-3">
            <img src="icons/profile-circle.png" alt="">
          </div>
          <a href="">
            <p>Users</p>
          </a>
        </div>

        <div class="mn d-flex">
          <div class="icn me-3">
            <img src="icons/group.png" alt="">
          </div>
          <a href="login.php">
            <p>Sign Out</p>
          </a>
        </div>

      </div>
    </div>

    <div class="hal_utama mx-auto">

      <div class="cari py-3 text-light">
        <form class="">
          <input class="form-control me-2 rounded-pill text-light bg-dark" type="search" placeholder="Search" aria-label="Search">
          <div class="icon">
            <img src="icons/search-normal.png" alt="">
          </div>
        </form>
      </div>

      <div class="data mt-4 ">
        <table class="table table-dark table-hover">
          <thead class="">
            <tr>
              <th scope="col">#</th>
              <th scope="col">username</th>
              <th scope="col">email</th>
              <th scope="col">Password</th>
              <th scope="col">Role</th>
             
            </tr>
          </thead>
          <tbody>
            <?php $i = 1;
            foreach ($data as $d) : ?>
              <tr>
                <th><?= $i++; ?></th>
                <td><?= $d["username"]; ?></td>
                <td><?= $d["email"]; ?></td>
                <td><?= $d["password"]; ?></td>
                <td><?= $d["role"]; ?></td>
                
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </div>

  </header>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>