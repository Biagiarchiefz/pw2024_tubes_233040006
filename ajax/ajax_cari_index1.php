<?php 
require '../functions.php';


$music = cari($_GET["keyword"]);

$podcast = caripod($_GET["keyword"]);


?>


<div class="dataus">

<div class="lagu_populer m-auto">
  <div class="kupu d-flex align-items-center justify-content-between">
    <h4>lagu populer</h4>
    <div class="tombol">
      <a href="music.php" class="text-decoration-none text-light">
        <p>show all</p>
      </a>
    </div>
  </div>

  <div class="kumpul_lagu mt-3 d-flex overflow-x-auto">

    <?php foreach ($music as $mu) : ?>
      <li class="lagu_item">
        <div class="img_play d-flex align-items-center justify-content-center position-relative">
          <img src="img/<?= $mu["album_img"]; ?>" alt="" class="rounded">
          <i class="bi playListPlay bi-play-circle position-absolute"></i>
        </div>
        <h5><?= $mu["judul_lagu"]; ?><br>
          <div class="penjelasan"><?= $mu["artis"]; ?></div>
        </h5>
      </li>
    <?php endforeach; ?>
  </div>
</div>


<div class="artis_populer m-auto mt-3">
  <div class="laba d-flex align-items-center justify-content-between">
    <h4>Podcast populer</h4>
    <div class="tombol">
      <a href="podcast.php" class="text-decoration-none text-light">
        <p>show all</p>
      </a>
    </div>
  </div>

  <div class="kumpul_artis d-flex overflow-x-auto me-3">

    <?php foreach ($podcast as $pod) : ?>
      <li class="artis_item me-2">
        <div class="img_play d-flex align-items-center justify-content-center position-relative ">
          <img src="img/<?= $pod["album"]; ?>" alt="" class="rounded">
          <i class="bi playListPlay bi-play-circle position-absolute"></i>
        </div>
        <h5><?= $pod["judul_podcast"]; ?></h5>
      </li>
    <?php endforeach; ?>
  </div>
</div>
</div>
