<?php
session_start();
include "../config/koneksi.php";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
       <a href="#" class="nav-link"></a>
       <a href="#" class="nav-link"></a>
      </div>

      <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1">Keluar</a> 
    </div>
  </div>
</nav>

<div class="container mt-3">
    <div class="row">
    <?php
    $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE usersid='$usersid'");
    while($data = mysqli_fetch_array($query)){
        ?>
    <div class="col-md-3">
            <div class="card">
                <img src="../asset/img/<?php echo $data['lokasifile']?>" class="card-img-top" 
                title="<?php echo $data['judulfoto']?>" style="height:12rem;">
                <div class="card-footer text-center">
                  <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid']?>" type="submit" name="suka"><i class="fa-regular fa-heart m-1"></i></a> 
                  <?php
                  $fotoid = $data['fotoid'];
                  $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                  echo mysqli_num_rows($like). ' Suka';
                   ?>
                  <a href=""><i class="fa-regular fa-comment m-1"></i></a> 3 Komentar
      </div>
            </div>
        </div>
    <?php } ?>
    </div>
</div>
   
<script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>
</body>
</html>