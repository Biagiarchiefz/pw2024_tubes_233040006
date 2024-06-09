<?php

session_start();

if (!isset($_SESSION['login'])) {
  header("Location: index1.php");
  exit;
}

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}




require("functions.php");
//paginition 
$jumlahdata1hal = 5;
$jumlahdata = count(query("SELECT * FROM podcast"));
$jumlahhalaman = ceil($jumlahdata / $jumlahdata1hal);
$halamandigunakan = (isset($_GET['halamanuser'])) ?  $_GET['halamanuser'] : 1;
$awaldata = ($jumlahdata1hal *  $halamandigunakan) - $jumlahdata1hal;



// tampung ke variabel
$data = query("SELECT * FROM users LIMIT $awaldata, $jumlahdata1hal");

if (isset($_POST["bcari"])) {
  $data = cariemail($_POST["keyword"]);
}


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
          <a href="admin.php" class="text-decoration-none">
            <p class="">Music</p>
          </a>
        </div>

        <div class="mn d-flex">
          <div class="icn me-3">
            <img src="icons/f7_mic-fill.png" class="" alt="">
          </div>
          <a href="adminpod.php" class="text-decoration-none">
            <p class="">Podcast</p>
          </a>
        </div>

        <div class="mn d-flex">
          <div class="icn me-3">
            <img src="icons/profile-circle.png" alt="">
          </div>
          <a href="adminusers.php" class="text-decoration-none">
            <p>Users</p>
          </a>
        </div>

        <div class="mn d-flex">
          <div class="icn me-3">
            <img src="icons/group.png" alt="">
          </div>
          <a href="login.php" onclick="return confirm('Apakah anda yakin keluar halaman ini?')" class="text-decoration-none">
            <p>Sign Out</p>
          </a>
        </div>

      </div>
    </div>

    <div class="hal_utama mx-auto">

      
    <div class="cari py-3 text-light">
        <form action="" method="POST">
          <input class="keyword form-control me-2 rounded-pill text-light bg-dark shadow-none" type="search" placeholder="mau cari apa?" aria-label="Search" name="keyword" autofocus autocomplete="off">
          <button class="tombol icon btn btn-link" type="submit" name="bcari">
            <img src="icons/search-normal.png" alt="">
          </button>
        </form>
      </div>

      <div class="data mt-4 ">
        <table class="table table-dark table-hover">
          <thead class="">
            <tr>
              <th scope="col">#</th>
              <th scope="col">gambar</th>
              <th scope="col">username</th>
              <th scope="col">email</th>
              <th scope="col">action</th>
            </tr>
              
            <?php if (empty($data)) : ?>
              <tr>
                <td colspan="7">
                  <p style="font-style : italic;" class="fw-bold text-center mt-2">Data music tidak ditemukan</p>
                </td>
              </tr>
            <?php endif; ?>

          </thead>
          <tbody>
            <?php $i = 1;
            foreach ($data as $d) : ?>
              <tr>
                <th><?= $i++; ?></th>
                <td><img src="icons/adminuser.jpeg" alt="" style="width: 50%; height: 80px;" class="rounded"></td>
                <td><?= $d["username"]; ?></td>
                <td><?= $d["email"]; ?></td>
                <td>
                <a href="hapus.php?iduser=<?= $d['id']; ?>" onclick="return confirm('Apakah kamu yakin menghapus data ini?')" class="badge text text-decoration-none"><img src="icons/material-symbols_delete.png" alt=""></a>
                </td>
                
     
                
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

        <ul class="pagination fw-bold">
          <?php if ($halamandigunakan > 1) : ?>
            <li class="page-item">
              <a class="page-link" href="?halamanuser= <?= $halamandigunakan - 1; ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
          <?php endif; ?>

          <?php for ($i = 1; $i <= $jumlahhalaman; $i++) : ?>
            <?php if ($i == $halamandigunakan) : ?>
              <li class="page-item"><a class="page-link text-primary" href="?halamanuser=<?= $i; ?>"><?= $i; ?></a></li>
            <?php else : ?>
              <li class="page-item"><a class="page-link text-secondary" href="?halamanuser=<?= $i; ?>"><?= $i; ?></a></li>
            <?php endif; ?>
          <?php endfor; ?>

          <?php if ($halamandigunakan < $jumlahhalaman) : ?>
            <li class="page-item">
              <a class="page-link" href="?halamanuser= <?= $halamandigunakan + 1; ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          <?php endif; ?>
        </ul>

      </div>

    </div>

    

 

  </header>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>