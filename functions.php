<?php

function koneksi()
{
  // koneksi ke db pilih database
  return mysqli_connect("localhost", "root", "", "pw2024_tubes_233040006");
}

function query($query)
{
  $conn = koneksi();

  // query isi table user
  $result = mysqli_query($conn, $query);

  // jika hasil hanya 1 data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  // ubah data ke dalam array
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}


function tambah($data)
{
  $conn = koneksi();

  $judul = htmlspecialchars($data["judul"]);
  $artis = htmlspecialchars($data["artis"]);
  $genre = htmlspecialchars($data["genre"]);
  $album = htmlspecialchars($data["album"]);
  $file  = htmlspecialchars($data["file"]);



  $query = "INSERT INTO music VALUES 
  (null, '$judul', '$artis', '$genre', '$album', '$file',null)";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);


}


function hapus ($id) {
  $conn = koneksi();

  mysqli_query($conn, "DELETE FROM music WHERE music_id = $id");

  return mysqli_affected_rows($conn);
}
