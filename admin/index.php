<?php
session_start();
$userid = $_SESSION['userid'];
if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda belum login');
    location.href='../index.php';
    </script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
    <title>MY TO DO LIST</title>
    
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="index.php">MY TO DO LIST</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
      <div class="navbar-nav me-auto">
       <a href="home.php" class="nav-link">Home</a>
       <a href="tugas.php" class="nav-link">tugas</a>
       <a href="categories.php" class="nav-link">kategori</a>
      </div>

      <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1">Keluar</a> 
    </div>
  </div>
</nav>

<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
    <p>MY TO DO LIST | VANESA</p>
</footer>
   
<script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>
</body>
</html>