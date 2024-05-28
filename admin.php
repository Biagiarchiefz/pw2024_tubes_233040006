<?php
require("functions.php");

// tampung ke variabel
$music = query("SELECT * FROM music");



// $db = mysqli_connect("localhost", "root", "", "pw2024_tubes_233040006");

if (isset($_POST["submit"])) {


  if (tambah($_POST)  > 0) {

    echo "
  <script>
  alert('Data berhasil ditambahkan');
  document.location.href = 'admin.php';
  </script>
  ";
  } else {
  
    echo "
    <script>
    alert('Data gagal ditambahkan');
    document.location.href = 'admin.php';
    </script>
    ";
  }
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
          <a href="admin.php">
            <p class="">songs</p>
          </a>
        </div>

        <div class="mn d-flex">
          <div class="icn me-3">
            <img src="icons/profile-circle.png" alt="">
          </div>
          <a href="users.php">
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

      <div class="add d-flex justify-content-between">
        <span></span>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addsongs">
          Add songs
        </button>

        <!-- Modal -->

        <div class="modal fade modal-lg" id="addsongs" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Add songs</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <form action="" method="post">
                <div class="modal-body">

                  <div class="mb-3">
                    <label class="form-label" for="judul">judul_lagu</label>
                    <input type="text" class="form-control bg-light" id="judul" placeholder="Masukan Id_lagu..." name="judul" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="artis">artis</label>
                    <input type="text" class="form-control bg-light" id="artis" placeholder="Masukan title lagu..." name="artis" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="genre">genre</label>
                    <input type="text" class="form-control bg-light" id="genre" placeholder="Masukan nama artis..." name="genre" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="album">Album</label>
                    <input type="text" class="form-control bg-light" id="album" placeholder="Masukan nama album..." name="album" required>
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="file">file_link</label>
                    <input type="text" class="form-control bg-light" id="file" placeholder="Masukan tahun rilis..." name="file" required>
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
          </thead>
          <tbody>
            <?php $i = 1;
            foreach ($music as $mu) : ?>
              <tr>
                <th><?= $i++; ?></th>
                <td><?= $mu["judul_lagu"]; ?></td>
                <td><?= $mu["artis"]; ?></td>
                <td><?= $mu["genre"]; ?></td>
                <td><img src="img/<?= $mu["album_img"]; ?>" alt="" style="width: 70%; height: 70px;"></td>
                <td><?= $mu["file_link"]; ?></td>


                <td>

                  <a href="#" class="badge text text-decoration-none" data-bs-target="#updatesongs" data-bs-toggle="modal"><img src="icons/tabler_edit.png" alt=""></a>


                  <!-- Modal -->

                  <div class="modal fade modal-lg text-dark" id="updatesongs" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="updatesongs">update</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="" method="post">
                          <div class="modal-body">

                            <div class="mb-3">
                              <label class="form-label">Id_lagu</label>
                              <input type="text" class="form-control bg-light" placeholder="Masukan Id_lagu..." name="tid">
                            </div>

                            <div class="mb-3">
                              <label class="form-label">Title</label>
                              <input type="text" class="form-control bg-light" placeholder="Masukan title lagu..." name="ttitle">
                            </div>

                            <div class="mb-3">
                              <label class="form-label">Artis</label>
                              <input type="text" class="form-control bg-light" placeholder="Masukan nama artis..." name="tartis">
                            </div>

                            <div class="mb-3">
                              <label class="form-label">Album</label>
                              <input type="text" class="form-control bg-light" placeholder="Masukan nama album..." name="talbum">
                            </div>

                            <div class="mb-3">
                              <label class="form-label">sasasas</label>
                              <input type="text" class="form-control bg-light" placeholder="Masukan tahun rilis..." name="ttahun">
                            </div>

                          </div>

                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>

                          </div>
                        </form>


                      </div>
                    </div>
                  </div>

                  <a href="hapus.php?id=<?= $mu["music_id"]; ?>" onclick="return confirm('are you sure Delete?')" class="badge text text-decoration-none"><img src="icons/Vector (1).png" alt=""></a>

                </td>
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