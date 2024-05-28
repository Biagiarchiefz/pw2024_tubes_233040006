<?php
require("functions.php");

// ambil id dari url
$id = $_GET["id"];


// query mahasiswa berdasarkan id
$d = query("SELECT * FROM users WHERE user_id = $id");


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="details.css">
  <title>Data users</title>
</head>

<body>
  <div class="container">

    <div class="card bg-dark" style="width: 18rem;">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>

      <ul class="list-group list-group-flush">
        <li class="list-group-item">User name : <?= $d["user_name"]; ?></li>
        <li class="list-group-item">Email : <?= $d["email"]; ?></li>
        <li class="list-group-item">Password : <?= $d["password"]; ?></li>
        <li class="list-group-item">Role : <?= $d["role"]; ?></li>
      </ul>
      
      <div class="card-body">
        <a href="#" class="card-link rounded-3 text-bg-primary text-decoration-none p-2">Edit</a>

      </div>
    </div>
    <a href="admin.php" class="card-link rounded-3 text-bg-danger text-decoration-none p-2">Kembali ke halaman admin</a>

  </div>

</body>

</html>