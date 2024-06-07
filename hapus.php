<?php 
require ("functions.php");



if ($id = $_GET["id"]) {

if( hapus ($id) > 0 ) {

  echo " 
  <script>
  alert('Data berhasil dihapus');
  document.location.href = 'admin.php';
  </script>
  ";
  } else {
    echo "
    <script>
    alert('Data gagal dihapus');
    document.location.href = 'admin.php';
    </script>
    ";
  }

} elseif ($iduser = $_GET["iduser"]) {

  if( hapususer($iduser) > 0 ) {

    echo " 
    <script>
    alert('Data berhasil dihapus');
    document.location.href = 'adminusers.php';
    </script>
    ";
    } else {
      echo "
      <script>
      alert('Data gagal dihapus');
      document.location.href = 'adminusers.php';
      </script>
      ";
    }

} elseif ($idpod = $_GET["idpod"]) {

  if( hapuspod($idpod) > 0 ) {

    echo " 
    <script>
    alert('Data berhasil dihapus');
    document.location.href = 'adminpod.php';
    </script>
    ";
    } else {
      echo "
      <script>
      alert('Data gagal dihapus');
      document.location.href = 'adminpod.php';
      </script>
      ";
    }

}

  



?>


