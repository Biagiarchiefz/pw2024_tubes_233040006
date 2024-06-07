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

// paginition 
$jumlahdata1hal = 5;
$jumlahdata = count(query("SELECT * FROM music"));
$jumlahhalaman = ceil($jumlahdata / $jumlahdata1hal);
$halamandigunakan = (isset($_GET['halaman'])) ?  $_GET['halaman'] : 1;
$awaldata = ($jumlahdata1hal *  $halamandigunakan) - $jumlahdata1hal;




// tampung ke variabel
$music = query("SELECT * FROM music LIMIT $awaldata, $jumlahdata1hal");


if (isset($_POST["bcari"])) {
  $music = cari($_POST["keyword"]);
}

// akhir search




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
          <a href="index1.php" onclick="return confirm('Apakah anda yakin keluar halaman?')" class="text-decoration-none">
            <p>Sign Out</p>
          </a>
        </div>

      </div>
    </div>

    <div class="hal_utama mx-auto overflow-auto">

      <div class="cari py-3 text-light">
        <form action="" method="POST">
          <input class="keyword form-control me-2 rounded-pill text-light bg-dark shadow-none" type="search" placeholder="mau cari apa?" aria-label="Search" name="keyword" autocomplete="off">
          <button class="tombol icon btn btn-link" type="submit" name="bcari">
            <img src="icons/search-normal.png" alt="">
          </button>
        </form>
      </div>

      <div class="add d-flex justify-content-between">
        <span></span>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary rounded-4" data-bs-toggle="modal" data-bs-target="#addsongs">
          Add songs
        </button>

        <!-- Modal tambah data -->
        <div class="modal fade modal-lg" id="addsongs" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="addsongs">Add songs</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                  <div class="mb-3">
                    <label class="form-label" for="judul">judul_lagu</label>
                    <input type="text" class="form-control bg-light shadow-sm bg-body-tertiary rounded" id="judul" placeholder="Masukan judul lagu..." name="judul" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="artis">artis</label>
                    <input type="text" class="form-control bg-light shadow-sm bg-body-tertiary rounded" id="artis" placeholder="Masukan nama artis..." name="artis" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="genre">genre</label>
                    <input type="text" class="form-control bg-light shadow-sm bg-body-tertiary rounded" id="genre" placeholder="Masukan genre..." name="genre" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="album">Album</label>
                    <input type="file" class="form-control bg-light shadow-sm bg-body-tertiary rounded" id="album" placeholder="Masukan poster album..." name="album">
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="file">file_link</label>
                    <input type="text" class="form-control bg-light shadow-sm bg-body-tertiary rounded" id="file" placeholder="Masukan file/link lagu..." name="file" required>
                  </div>

                </div>

                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
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
              <th scope="col">genre</th>
              <th scope="col">album</th>
              <th scope="col">file_link</th>
              <th scope="col">action</th>
            </tr>

            <?php if (empty($music)) : ?>
              <tr>
                <td colspan="7">
                  <p style="font-style : italic;" class="fw-bold text-center mt-2">Data music tidak ditemukan</p>
                </td>
              </tr>
            <?php endif; ?>

          </thead>
          <tbody>

            <?php $i = 1;
            foreach ($music as $mu) : ?>
              <tr>
                <th><?= $i++; ?></th>
                <td><?= $mu["judul_lagu"]; ?></td>
                <td><?= $mu["artis"]; ?></td>
                <td><?= $mu["genre"]; ?></td>
                <td><img src="img/<?= $mu["album_img"]; ?>" alt="" style="width: 70%; height: 70px;" class="rounded"></td>
                <td><?= $mu["file_link"]; ?></td>

                <td>

                  <a href="" class="badge text text-decoration-none" data-bs-toggle="modal" data-bs-target="#updatesongs<?= $i ?>"><img src="icons/edit.png" alt=""></a>

                  <a href="hapus.php?id=<?= $mu["music_id"]; ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="badge text text-decoration-none"><img src="icons/material-symbols_delete.png" alt=""></a>

                </td>
              </tr>

              <!-- Modal update -->
              <div class="modal fade modal-lg text-dark" id="updatesongs<?= $i ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="updatesongs">update</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>


                    <form action="functions.php" method="post">

                      <input type="hidden" class="form-control bg-light" placeholder="Masukan judul lagu..." name="music_id" value="<?= $mu["music_id"]; ?>">
                      <div class="modal-body">


                        <div class="mb-3">
                          <label class="form-label">Judul lagu</label>
                          <input type="text" class="form-control bg-light" placeholder="Masukan judul lagu..." name="judul" value="<?= $mu["judul_lagu"]; ?>">
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Artis</label>
                          <input type="text" class="form-control bg-light" placeholder="Masukan artis..." name="artis" value="<?= $mu["artis"]; ?>">
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Genre</label>
                          <input type="text" class="form-control bg-light" placeholder="Masukan genre..." name="genre" value="<?= $mu["genre"]; ?>">
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Album</label>
                          <input type="text" class="form-control bg-light" placeholder="Masukan album..." name="album" value="<?= $mu["album_img"]; ?>">
                        </div>

                        <div class="mb-3">
                          <label class="form-label">file</label>
                          <input type="text" class="form-control bg-light" placeholder="Masukan file..." name="file" value="<?= $mu["file_link"]; ?>">
                        </div>

                      </div>

                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="ubah">Simpan</button>

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
          <?php if($halamandigunakan > 1) : ?>
          <li class="page-item">
            <a class="page-link" href="?halaman= <?= $halamandigunakan - 1; ?>" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <?php endif; ?>

          <?php for ($i = 1; $i <= $jumlahhalaman; $i++) : ?>
            <?php if ($i == $halamandigunakan) : ?>
              <li class="page-item"><a class="page-link text-primary" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
            <?php else : ?>
              <li class="page-item"><a class="page-link text-secondary" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
            <?php endif; ?>
          <?php endfor; ?>

          <?php if($halamandigunakan < $jumlahhalaman) : ?>
          <li class="page-item">
            <a class="page-link" href="?halaman= <?= $halamandigunakan + 1; ?>" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
          <?php endif; ?>
        </ul>

      </div>


    </div>

  </header>

  <script src="js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>