<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- css -->
  <link rel="stylesheet" href="css/style.css">

  <!-- css icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <title>Music App</title>
</head>

<body style=" background-color: #333333;" class="bg-dark" >

  <header class="">

    <!--             Sidebar               -->
    <div class="menu border-end border-bottom border-5 border-dark rounded-4">
      <h1>Tunetrack.</h1>
      <div class="playlist">
        <h4 class="active"><span></span> <i class="bi bi-music-note-list"></i>Playlist</h4>
        <h4> <span></span> <i class="bi bi-music-note-list"></i>Terakhir Didengar</h4>
        <h4> <span></span> <i class="bi bi-music-note-list"></i>Rekomendasi</h4>
      </div>

      <div class="menu_lagu">
        <li class="lagu_item">
          <span>01</span>
          <img src="img/1.jpeg" alt="">
          <h5>daun jatuh <br>
            <div class="penjelasan">pagi</div>
          </h5>
          <i class="bi playListPlay bi-play-circle" id="1"></i>
        </li>

        <li class="lagu_item">
          <span>01</span>
          <img src="img/2.jpeg" alt="">
          <h5>Pegang tangganku<br>
            <div class="penjelasan">Nosstres</div>
          </h5>
          <i class="bi playListPlay bi-play-circle"></i>
        </li>

      


      </div>
    </div>

    <!--             bagian utama           -->
    <div class="lagu overflow-auto rounded-4 border-bottom border-5 border-dark ">

      <nav class="d-flex justify-content-between align-items-center">
        <ul class="d-flex mt-3">
          <li>All<span></span></li>
          <li>Music</li>
          <li>Podcast</li>
        </ul>

        <div class="cari py-3 text-light">
          <form class="">
            <input class="form-control me-2 rounded-pill text-light bg-dark" type="search" placeholder="Search music" aria-label="Search">
            <div class="icon">
              <img src="icons/search-normal.png" alt="">
            </div>
          </form>
        </div>
      </nav>

      <div class="content m-auto pt-3">
        <h1>Tunetrack.</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia quos porro sint, veniam cumque, <br> perferendis molestiae magni in quae, laborum deleniti quas. Voluptates, quam hic?</p>
        <div class="buttons">
          <button class="btn btn-dark rounded-pill">Install App</button>
          <button class="btn btn-light rounded-pill">Explore Premium</button>
        </div>
      </div>

      <div class="lagu_populer">

        <div class="kupu d-flex align-items-center justify-content-between">
          <h4>lagu populer</h4>
          <div class="tombol">
            <i class="bi bi-arrow-left-short"></i>
            <i class="bi bi-arrow-right-short"></i>
          </div>
        </div>

        <div class="kumpul_lagu mt-3 d-flex overflow-x-auto">

          <li class="lagu_item">
            <div class="img_play d-flex align-items-center justify-content-center position-relative">
              <img src="img/2.jpeg" alt="">
              <i class="bi playListPlay bi-play-circle position-absolute"></i>
            </div>
            <h5>Pegang tanggankuffffffffffffvdvvdvdvvvvvvvv<br>
              <div class="penjelasan">Nosstres</div>
            </h5>
          </li>

          <li class="lagu_item">
            <div class="img_play d-flex align-items-center justify-content-center position-relative">
              <img src="img/2.jpeg" alt="">
              <i class="bi playListPlay bi-play-circle position-absolute"></i>
            </div>
            <h5>Pegang tanggankuffffffffffffvdvvdvdvvvvvvvv<br>
              <div class="penjelasan">Nosstres</div>
            </h5>
          </li>

     
          <li class="lagu_item">
            <div class="img_play d-flex align-items-center justify-content-center position-relative">
              <img src="img/2.jpeg" alt="">
              <i class="bi playListPlay bi-play-circle position-absolute"></i>
            </div>
            <h5>Pegang tanggankuffffffffffffvdvvdvdvvvvvvvv<br>
              <div class="penjelasan">Nosstres</div>
            </h5>
          </li>

          
     
        </div>


      </div>

      <div class="artis_populer m-auto mt-3">
        <div class="laba d-flex align-items-center justify-content-between">
          <h4>artis populer</h4>
          <div class="tombol">
            <i class="bi bi-arrow-left-short"></i>
            <i class="bi bi-arrow-right-short"></i>
          </div>
        </div>

        <div class="kumpul_artis d-flex overflow-x-auto me-3">

        <li class="artis_item">
            <div class="img_play d-flex align-items-center justify-content-center position-relative">
              <img src="img/nadin.jpg" alt="">
              <i class="bi playListPlay bi-play-circle position-absolute"></i>
            </div>
            <h5>Nadin</h5>
          </li>

          <li class="artis_item">
            <div class="img_play d-flex align-items-center justify-content-center position-relative">
              <img src="img/nadin.jpg" alt="">
              <i class="bi playListPlay bi-play-circle position-absolute"></i>
            </div>
            <h5>Nadin</h5>
          </li>



        
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
  <script></script>


</body>

</html>