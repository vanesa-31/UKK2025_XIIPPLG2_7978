<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY TO DO LIST</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<body style="background-color: rgb(46, 191, 248);"> 
<nav class="navbar navbar-expand-lg bg-body-black">
  <div class="container">
    <a class="navbar-brand" href="index.php"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
      <div class="navbar-nav me-auto">

      </div>
      <a href="register.php" class="btn btn-outline-primary m-1">
        Daftar</a>
        <a href="login.php" class="btn btn-outline-primary m-1">
        Masuk</a>
    </div>
  </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body bg-light">
                    <div class="text-center">
                        <h5>Login TO DO LIST</h5>
                    </div>
                    <form action="config/aksi_login.php" method="POST">
                        <label class="form-label">Username</label>
                        <input type="text" name="username"class="form-control" required>
                        <label class="form-label">Password</label>
                        <input type="password" name="password"class="form-control" required>
                        <div class="d-grid mt-2">
                            <button class="btn btn-primary" type="submit" name="kirim">MASUK
                            </button>
                        </div>
                    </form>
                    <hr>
                    <p>Belum punya akun? <a href="register.php">Daftar disini!</p>
                </div>
            </div>
        </div>
    </div>
</div>

 <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>