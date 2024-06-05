<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require("functions.php");

$podcast = query("SELECT * FROM podcast");

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
        <h4 class="active"><span></span><i class="bi bi-house-door"></i>Home</h4>
        <h4 class="active"><span></span><i class="bi bi-search"></i>Search</h4>
        <!-- <h4> <span></span> <i class="bi bi-music-note-list"></i>Rekomendasi</h4> -->
      </div>

      <div class="menu_lagu">

        <?php $i = 1;
        foreach ($podcast as $pod) : ?>

          <li class="lagu_item">
            <!-- <span><?= $i++; ?></span> -->
            <img src="img/<?= $pod["album"]; ?>" alt="" class="rounded">
            <h5><?= $pod["artis"]; ?><br>
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
          <a href="index1.php">
            <li>All<span></span></li>
          </a>
          <a href="music.php">
            <li>Music</li>
          </a>
          <a href="podcast.php"><li>Podcast</li></a>

          
          <?php if ($_SESSION['role'] === 'admin') : ?>
            <a href="admin.php" class=""><li>Admin</li></a>
          <?php endif; ?>
        </ul>

        <div class="cari py-3 text-light">
          <form class="">
            <input class="form-control me-2 rounded-pill text-light bg-dark shadow-none" type="search" placeholder="Search music" aria-label="Search">
            <div class="icon">
              <img src="icons/search-normal.png" alt="">
            </div>
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



      <!--   bawah nav hal utama   -->
      <div class="content m-auto pt-3">
        <!-- <h1>Tunetrack.</h1> -->
        <div class="d-flex mt-3">
       <div class="card me-3"  style="border: 2px solid white;  width: 300px;">
        <div class="">
          <img src="img/2.jpeg" alt="" style=" width: 40px;" class="rounded">
        </div>
       </div>
       <div class="card"  style="border: 2px solid white;  width: 300px;">
        <div class="">
          <img src="img/2.jpeg" alt="" style=" width: 40px;" class="rounded">
        </div>
       </div>

       </div>
      </div>

      <div class="lagu_populer">

        <div class="kupu d-flex align-items-center justify-content-between">
          <h4>Semua podcast</h4>
          <div class="tombol">
            <i class="bi bi-arrow-left-short"></i>
            <i class="bi bi-arrow-right-short"></i>
          </div>
        </div>

        <div class="kumpul_lagu mt-3 d-flex overflow-x-auto">
          <?php foreach ($podcast as $pod) : ?>

            <li class="lagu_item me-4">
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
      <img src="img/1.jpeg" alt="" id="gambar_play">
      <h5 id="title">
        superheroes
        <div class="nama">coldplay</div>
      </h5>

      <div class="icon d-flex align-items-center">
        <i class="bi shuffle bi-music-note-beamed me-2 d-flex align-items-center">next</i>
        <i class="bi bi-skip-start-fill"></i>
        <i class="bi bi-play-fill m-2"></i>
        <i class="bi bi-skip-end-fill"></i>
        <i class="bi bi-cloud-arrow-down-fill ms-2" id="download_music"></i>
      </div>

      <span id="duration">0:00</span>
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