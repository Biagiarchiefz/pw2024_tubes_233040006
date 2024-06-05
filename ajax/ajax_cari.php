<?php 

require '../functions.php';

$music = cari($_GET["keyword"]);


?>

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
                <td><img src="img/<?= $mu["album_img"]; ?>" alt="" style="width: 70%; height: 70px;"></td>
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
      </div>
