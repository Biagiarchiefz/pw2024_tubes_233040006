<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require("functions.php");

$podside = query("SELECT * FROM podcast LIMIT 5, 10");
$podcast = query("SELECT * FROM podcast");

if (isset($_POST["bcari"])) {
  $podcast = caripod($_POST["keyword"]);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- css -->
  <link rel="stylesheet" href="css/music.css">

  <!-- css icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <title>Music App</title>
</head>

<body style=" background-color: #333333;" class="bg-dark">

  <header class="">

    <!--             Sidebar               -->
    <div class="menu border-end border-bottom border-5 border-dark rounded-4">
      <h1>Tunetrack.</h1>
      <div class="playlist">
        <h4 class="active"><i class="bi bi-house-door"></i>Home</h4>
        <h4 class="active"><i class="bi bi-search"></i>Search</h4>
        <!-- <h4> <span></span> <i class="bi bi-music-note-list"></i>Rekomendasi</h4> -->
      </div>
      
      <div class="ms-4 mt-4">
        <button class="btn btn-dark rounded-pill">Artist</button>
        <button class="btn btn-dark rounded-pill">Playlist</button>
      </div>

      <div class="menu_lagu rounded">

        <?php $i = 1;
        foreach ($podside as $pods) : ?>

          <li class="lagu_item">
            <!-- <span><?= $i++; ?></span> -->
            <img src="img/<?= $pods["album"]; ?>" alt="" class="rounded">
            <h5><?= $pods["artis"]; ?><br>
              <div class="penjelasan">Artist</div>
            </h5>
            <i class="bi playListPlay bi-play-circle" id="1"></i>
          </li>



        <?php endforeach; ?>


      </div>
    </div>

    <!--             bagian utama           -->
    <div class="lagu overflow-auto rounded-4 border-bottom border-5 border-dark ">

      <nav class="d-flex justify-content-between align-items-center ms-4">

        <ul class="d-flex mt-3">
          <a href="index1.php" class="text-decoration-none">
            <li>All<span></span></li>
          </a>
          <a href="music.php" class="text-decoration-none">
            <li>Music</li>
          </a>
          <a href="podcast.php" class="text-decoration-none"><li>Podcast</li></a>

          
          <?php if ($_SESSION['role'] === 'admin') : ?>
            <a href="admin.php" class="text-decoration-none"><li>Admin</li></a>
          <?php endif; ?>
        </ul>

        <div class="cari py-3 text-light">
          <form action="" method="post">
            <input class="form-control me-2 rounded-pill text-light bg-dark shadow-none" id="searchinx" type="search" placeholder="Search music" aria-label="Search" name="keyword" autocomplete="off">
            <button class="icon btn btn-link" type="submit" name="bcari">
              <img src="icons/search-normal.png" alt="">
            </button>
          </form>
        </div>

        <div class="dropdown">
        <a href="logout.php" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="icons/profile-circle.png" alt="">
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="">Edit profil</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>

          </ul>
        </div>

      </nav>



      <div class="lagu_populer mt-5">

        <div class="kupu d-flex align-items-center justify-content-between">
          <h4>Semua podcast</h4>
        </div>

        <div class="kumpul_lagu mt-3 d-flex">
          <?php foreach ($podcast as $pod) : ?>

            <li class="lagu_item me-3">
              <div class="img_play d-flex align-items-center justify-content-center position-relative">
                <img src="img/<?= $pod["album"]; ?>" alt="" class="rounded">
                <i class="bi playListPlay bi-play-circle position-absolute"></i>
              </div>
              <h5><?= $pod["judul_podcast"]; ?><br>
                <div class="penjelasan"><?= $pod["artis"]; ?></div>
              </h5>
            </li>

          <?php endforeach; ?>


        </div>


      </div>



    </div>


    <!--            bagian play music        -->

    <div class="play rounded-3">
      <div class="nada">
        <div class="nada1"></div>
        <div class="nada1"></div>
        <div class="nada1"></div>
      </div>
      <img src="img/gojo.jpeg" alt="" id="gambar_play" class="rounded">
      <h5 id="title">
        ngbrol bareng bg gojo
        <div class="nama">gojo satoru</div>
      </h5>

      <div class="icon d-flex align-items-center">
        <i class="bi bi-music-note-beamed me-2 d-flex align-items-center"></i>
        <i class="bi bi-skip-start-fill"></i>
        <i class="bi bi-play-fill m-2"></i>
        <i class="bi bi-skip-end-fill"></i>
        <i class="bi bi-cloud-arrow-down-fill ms-2" id="download_music"></i>
      </div>

      <span>0:00</span>
      <div class="bar">
        <input type="range" id="trol" min="0" max="100">
        <div class="bar2" id="bar2"></div>
        <div class="dot"></div>
      </div>
      <span id="durationend">0:30</span>


      <div class="vol">
        <i class="bi bi-volume-down-fill" id="vol_icon"></i>
        <input type="range" min="0" max="100" id="vol">
        <div class="vol_bar"></div>
        <div class="dot" id="vol_dot"></div>

      </div>
    </div>


  </header>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  


</body>

</html>