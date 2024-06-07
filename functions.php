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



// function upload
function upload()
{

  $nama_file = $_FILES['album']['name'];
  $tipe_file = $_FILES['album']['type'];
  $ukuran_file = $_FILES['album']['size'];
  $error = $_FILES['album']['error'];
  $tmp_file = $_FILES['album']['tmp_name'];


  // ketidak tidak ada gambar yang di pilih

  if ($error == 4) {
    echo "
    <script>
    alert('pilih gambar');
    </script>
    ";

    return false;
  }

  //  cek ektensi file

  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));

  if (!in_array($ekstensi_file, $daftar_gambar)) {
    echo "
    <script>
    alert('yang anda tambahkan bukan gambar, Pilih gambar lain!!');
    </script>
    ";

    return false;
  }


  // cek type file
  if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {

    echo "
    <script>
    alert('yang anda tambahkan bukan gambar, Pilih gambar lain!!');
    </script>
    ";

    return false;
  }

  // cek ukuran file max 5mb
  if ($ukuran_file > 5000000) {

    echo "
    <script>
    alert('ukuran gambar terlalu besar!');
    </script>
    ";

    return false;
  }

  // lolos pengecekan 
  // siap upload file
  // generate nama file baru
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;


  move_uploaded_file($tmp_file, 'img/' . $nama_file_baru);
  return $nama_file_baru;
}


function uploadpod()
{

  $nama_file = $_FILES['album']['name'];
  $tipe_file = $_FILES['album']['type'];
  $ukuran_file = $_FILES['album']['size'];
  $error = $_FILES['album']['error'];
  $tmp_file = $_FILES['album']['tmp_name'];


  // ketidak tidak ada gambar yang di pilih

  if ($error == 4) {
    echo "
    <script>
    alert('pilih gambar');
    </script>
    ";

    return false;
  }

  //  cek ektensi file

  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));

  if (!in_array($ekstensi_file, $daftar_gambar)) {
    echo "
    <script>
    alert('yang anda tambahkan bukan gambar, Pilih gambar lain!!');
    </script>
    ";

    return false;
  }


  // cek type file
  if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {

    echo "
    <script>
    alert('yang anda tambahkan bukan gambar, Pilih gambar lain!!');
    </script>
    ";

    return false;
  }

  // cek ukuran file max 5mb
  if ($ukuran_file > 5000000) {

    echo "
    <script>
    alert('ukuran gambar terlalu besar!');
    </script>
    ";

    return false;
  }

  // lolos pengecekan 
  // siap upload file
  // generate nama file baru
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;


  move_uploaded_file($tmp_file, 'img/' . $nama_file_baru);
  return $nama_file_baru;
}

// akhir uploadd



// function tambah data
function tambah($data)
{
  $conn = koneksi();

  $judul = htmlspecialchars($data["judul"]);
  $artis = htmlspecialchars($data["artis"]);
  $genre = htmlspecialchars($data["genre"]);
  // $album = htmlspecialchars($data["album"]);
  $file  = htmlspecialchars($data["file"]);

  // upload gambar 
  $album = upload();
  if (!$album) {
    return false;
  }



  $query = "INSERT INTO music VALUES 
  (null, '$judul', '$artis', '$genre', '$album', '$file')";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

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


function tambahpod($data)
{
  $conn = koneksi();

  $judul = htmlspecialchars($data["judul_pod"]);
  $artis = htmlspecialchars($data["artis_pod"]);
  // $album = htmlspecialchars($data["album"]);
  $file  = htmlspecialchars($data["file_pod"]);

  // upload gambar 
  $album = uploadpod();
  if (!$album) {
    return false;
  }


  $query = "INSERT INTO podcast VALUES 
  (null, '$judul', '$artis', '$album', '$file')";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


if (isset($_POST["submitpod"])) {


  if (tambahpod($_POST)  > 0) {

    echo "
  <script>
  alert('Data berhasil ditambahkan');
  document.location.href = 'adminpod.php';
  </script>
  ";
  } else {

    echo "
    <script>
    alert('Data gagal ditambahkan');
    document.location.href = 'adminpod.php';
    </script>
    ";
  }
}

// akhir tambah data





//     hapus data
function hapus($id)
{
  $conn = koneksi();

 
  mysqli_query($conn, "DELETE FROM music WHERE music_id = $id");


  return mysqli_affected_rows($conn);
}


function hapususer($id)
{
  $conn = koneksi();

  mysqli_query($conn, "DELETE FROM users WHERE id = $id");

  return mysqli_affected_rows($conn);
}

function hapuspod($id)
{
  $conn = koneksi();

  mysqli_query($conn, "DELETE FROM podcast WHERE id_podcast = $id");

  return mysqli_affected_rows($conn);
}

//    akhir hapus data






//      update data   

$conn = koneksi();

// jika tombol ubah di klik
if (isset($_POST['ubah'])) {


  // update data ini 
  $update = mysqli_query($conn, "UPDATE music SET 
                                                judul_lagu = '$_POST[judul]',
                                                artis = '$_POST[artis]',
                                                genre = '$_POST[genre]',
                                                album_img = '$_POST[album]',
                                                file_link = '$_POST[file]'
                                                WHERE music_id = '$_POST[music_id]'
                                                ");

  if ($update) {

    echo "
  <script>
  alert('Data berhasil diubah');
  document.location.href = 'admin.php';
  </script>
  ";
  } else {

    echo "
    <script>
    alert('Data gagal ubah');
    document.location.href = 'admin.php';
    </script>
    ";
  }
}

// jika tombol yang namanya ubahpod di klik
if (isset($_POST['ubahpod'])) {

  // update data ini [nama table]
  $update = mysqli_query($conn, "UPDATE podcast SET 
                                                judul_podcast = '$_POST[judul]',
                                                artis = '$_POST[artis]',           
                                                album = '$_POST[album]',
                                                file_link = '$_POST[file]'
                                                WHERE id_podcast = '$_POST[pod_id]'
                                                ");

  if ($update) {

    echo "
  <script>
  alert('Data berhasil diubah');
  document.location.href = 'adminpod.php';
  </script>
  ";
  } else {

    echo "
    <script>
    alert('Data gagal ubah');
    document.location.href = 'adminpod.php';
    </script>
    ";
  }
}

//  akhir update data 



// search data
function cari($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM music 
             WHERE 
             artis LIKE '%$keyword%' OR
             judul_lagu LIKE '%$keyword%' OR
             genre LIKE '%$keyword%' ";


  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}


function caripod($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM podcast
                    WHERE 
                     artis LIKE '%$keyword%' OR
                      judul_podcast LIKE '%$keyword%'";



  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function cariemail($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM users
                    WHERE 
                     username LIKE '%$keyword%' OR
                      email LIKE '%$keyword%'";



  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}


// akhir search data


// loginn

function login($log)
{
  $conn = koneksi();

  $username = htmlspecialchars($log['username']);
  $password = htmlspecialchars($log['password']);


  // cek dulu username
  if ($user = query("SELECT * FROM users WHERE username = '$username'")) {


    // cek password
    if (password_verify($password, $user['password'])) {


      $_SESSION['login'] = true;
      $_SESSION['id'] = $user['id'];

      if (
        $user['id_role'] == 1
      ) {
        $_SESSION['role'] = 'admin';
      } else {
        $_SESSION['role'] = 'user';
      }

      // set session
      header("Location: index1.php");
      exit;
    }
  }
  return [
    'error' => true,
    'pesan' => 'username/password salah!!!'
  ];
}



//     registrasi  
function registrasi($data)
{

  $conn = koneksi();

  $username = htmlspecialchars(strtolower($data['username']));
  $email = htmlspecialchars(strtolower($data['email']));
  $password = mysqli_real_escape_string($conn, $data['password']);



  // jika username / password kosong
  if (empty($username)  || empty($email) || empty($password)) {

    echo "<script>
    alert.('username / password tidak boleh kosong!');
    document.location.href = 'registrasi.php';
    </script>";

    return false;
  }

  // jika username sudah ada 

  if (query("SELECT * FROM users WHERE username = '$username'")[0]) {
    echo " 
    <script>
    alert('Username sudah terdaftar');
    document.location.href = 'registrasi.php';
    </script>
    ";
    return false;
  }


  // jika password < 5 digit 
  if (strlen($password) < 5) {

    echo " 
    <script>
    alert('password terlalu pendek');
    document.location.href = 'registrasi.php';
    </script>
    ";
    return false;
  }

  // jika username dan password sudah sesuai
  // enkripsi password

  $password_baru = password_hash($password, PASSWORD_DEFAULT);

  $email = htmlspecialchars(strtolower($data['email']));


  // inserty ke tabel user
  $query = "INSERT INTO users
              VALUES 
              (0, 'default.png','$username', '$email', '$password_baru', '0')";


  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}



//   pagination 


















