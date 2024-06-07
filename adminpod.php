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
$halamandigunakan = (isset($_GET['halamanpod'])) ?  $_GET['halamanpod'] : 1;
$awaldata = ($jumlahdata1hal *  $halamandigunakan) - $jumlahdata1hal;



// tampung ke variabel
$podcast = query("SELECT * FROM podcast LIMIT $awaldata, $jumlahdata1hal");



if (isset($_POST["bcari"])) {
  $podcast = caripod($_POST["keyword"]);
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

      <div class="sidebar_menu">

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
          <input class="form-control me-2 rounded-pill text-light bg-dark shadow-none" type="search" placeholder="mau cari apa?" aria-label="Search" name="keyword" autofocus autocomplete="off">
          <button class="icon btn btn-link" type="submit" name="bcari">
            <img src="icons/search-normal.png" alt="">
          </button>
        </form>
      </div>

      <div class="add d-flex justify-content-between">
        <span></span>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary rounded-4" data-bs-toggle="modal" data-bs-target="#addsongs">
          Add podcast
        </button>

        <!-- Modal tambah data -->
        <div class="modal fade modal-lg" id="addsongs" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="addsongs">Add podcast</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                  <div class="mb-3">
                    <label class="form-label" for="judul">judul podcast</label>
                    <input type="text" class="form-control bg-light shadow-sm bg-body-tertiary rounded" id="judul" placeholder="Masukan judul podcast..." name="judul_pod" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="artis">artis</label>
                    <input type="text" class="form-control bg-light shadow-sm bg-body-tertiary rounded" id="artis" placeholder="Masukan nama artis..." name="artis_pod" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="album">Album</label>
                    <input type="file" class="form-control bg-light shadow-sm bg-body-tertiary rounded" id="album" placeholder="Masukan poster album..." name="album">
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="file">file_link</label>
                    <input type="text" class="form-control bg-light shadow-sm bg-body-tertiary rounded" id="file" placeholder="Masukan file/link lagu..." name="file_pod" required>
                  </div>

                </div>

                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" name="submitpod">Tambah</button>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                </div>
              </form>


            </div>
          </div>
        </div>
        <!-- akhir modal tambah  -->



      </div>


      <div class="data mt-4 ">
        <table class="table table-dark table-hover">
          <thead class="">
            <tr>
              <th scope="col">#</th>
              <th scope="col">judul_lagu</th>
              <th scope="col">artis</th>
              <th scope="col">album</th>
              <th scope="col">file_link</th>
              <th scope="col">action</th>
            </tr>

            <?php if (empty($podcast)) : ?>
              <tr>
                <td colspan="7">
                  <p style="font-style : italic;" class="fw-bold text-center mt-2">Data music tidak ditemukan</p>
                </td>
              </tr>
            <?php endif; ?>

          </thead>
          <tbody>

            <?php $i = 1;
            foreach ($podcast as $pod) : ?>
              <tr>
                <th><?= $i++; ?></th>
                <td><?= $pod["judul_podcast"]; ?></td>
                <td><?= $pod["artis"]; ?></td>
                <td><img src="img/<?= $pod["album"]; ?>" alt="" style="width: 30%; height: 60px;" class="rounded"></td>
                <td><?= $pod["file_link"]; ?></td>

                <td>

                  <a href="" class="badge text text-decoration-none" data-bs-toggle="modal" data-bs-target="#updatepod<?= $i ?>"><img src="icons/edit.png" alt=""></a>

                  <a href="hapus.php?idpod=<?= $pod["id_podcast"]; ?>" onclick="return confirm('are you sure Delete?')" class="badge text text-decoration-none"><img src="icons/material-symbols_delete.png" alt=""></a>

                </td>
              </tr>

              <!-- Modal update -->
              <div class="modal fade modal-lg text-dark" id="updatepod<?= $i ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="updatesongs">update</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>


                    <form action="functions.php" method="post">

                      <input type="hidden" class="form-control bg-light" placeholder="Masukan judul lagu..." name="pod_id" value="<?= $pod["id_podcast"]; ?>">
                      <div class="modal-body">


                        <div class="mb-3">
                          <label class="form-label">Judul lagu</label>
                          <input type="text" class="form-control bg-light" placeholder="Masukan judul podcast..." name="judul" value="<?= $pod["judul_podcast"]; ?>">
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Artis</label>
                          <input type="text" class="form-control bg-light" placeholder="Masukan artis..." name="artis" value="<?= $pod["artis"]; ?>">
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Album</label>
                          <input type="text" class="form-control bg-light" placeholder="Masukan album..." name="album" value="<?= $pod["album"]; ?>">
                        </div>

                        <div class="mb-3">
                          <label class="form-label">file</label>
                          <input type="text" class="form-control bg-light" placeholder="Masukan file..." name="file" value="<?= $pod["file_link"]; ?>">
                        </div>

                      </div>

                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="ubahpod">Simpan</button>

                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                      </div>
                    </form>


                  </div>
                </div>
              </div>
              <!--    akhir modal update   -->

            <?php endforeach; ?>
          </tbody>
        </table>

        <ul class="pagination fw-bold">
          <?php if ($halamandigunakan > 1) : ?>
            <li class="page-item">
              <a class="page-link" href="?halamanpod= <?= $halamandigunakan - 1; ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
          <?php endif; ?>

          <?php for ($i = 1; $i <= $jumlahhalaman; $i++) : ?>
            <?php if ($i == $halamandigunakan) : ?>
              <li class="page-item"><a class="page-link text-primary" href="?halamanpod=<?= $i; ?>"><?= $i; ?></a></li>
            <?php else : ?>
              <li class="page-item"><a class="page-link text-secondary" href="?halamanpod=<?= $i; ?>"><?= $i; ?></a></li>
            <?php endif; ?>
          <?php endfor; ?>

          <?php if ($halamandigunakan < $jumlahhalaman) : ?>
            <li class="page-item">
              <a class="page-link" href="?halamanpod= <?= $halamandigunakan + 1; ?>" aria-label="Next">
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