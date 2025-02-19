<?php
include "../config/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY TO DO LIST</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:rgb(52, 227, 250);">
  <div class="container">
    <a class="navbar-brand" href="index.php">MY TO DO LIST</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
      <div class="navbar-nav me-auto">
        <a href="home.php" class="nav-link">Home</a>
        <a href="tugas.php" class="nav-link">tugas</a>
        <a href="categories.php" class="nav-link">Tambah Tugas</a>
      </div>
      <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1">Keluar</a>
    </div>
  </div>
</nav>

<div class="container">
    <div class="row">
        <!-- Form Tambah Tugas -->
        <div class="col-md-4">
            <div class="card mt-2">
                <div class="card-header">List Tugas</div>
                <div class="card-body">
                    <form action="../config/aksi_tugas.php" method="POST">
                        <label class="form-label">Nama Tugas</label>
                        <input type="text" name="namatugas" class="form-control" required>
                        <label class="form-label">Kategori</label>
                        <input type="text" name="status" class="form-control" required>
                        <label class="from-label">Status</label>
                        <input type="text" name="tanggal" class="form-control" required>
                        <label class="from-label">Tanggal</label>
                        <input type="text" name="tanggal" class="form-control" required>
                        <button type="submit" class="btn btn-primary mt-2" name="tambah">Tambah Tugas</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tabel Data Tugas -->
        <div class="col-md-8">
            <div class="card mt-2">
                <div class="card-header">Data Tugas</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Tugas</th>
                                <th>kategori</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            session_start();
                            $userid = $_SESSION['userid'];
                            $query = mysqli_query($koneksi, "SELECT * FROM tasks");
                            while($data = mysqli_fetch_array($query)){
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data['namatugas'] ?></td>
                                <td><?php echo $data['deskripsi'] ?></td>
                                <td><?php echo $data['tanggaltugas'] ?></td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
                                        data-bs-target="#edit<?php echo $data['category_id'] ?>">Edit</button>
                                    <div class="modal fade" id="edit<?php echo $data['category_id'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo $data['category_id'] ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="editModalLabel<?php echo $data['category_id'] ?>">Edit tugas</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="../config/aksi_tugas.php" method="POST">
                                                        <input type="hidden" name="category_id" value="<?php echo $data['category_id'] ?>">
                                                        <label class="form-label">Nama Tugas</label>
                                                        <input type="text" name="namatugas" value="<?php echo $data['namatugas'] ?>" class="form-control" required>
                                                        <label class="form-label">Status</label>
                                                        <textarea class="form-control" name="status" required><?php echo $data['status']; ?></textarea>
                                                        
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="edit" class="btn btn-primary">Edit tugas</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" 
                                        data-bs-target="#hapus<?php echo $data['category_id'] ?>">Hapus Tugas</button>

                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="hapus<?php echo $data['category_id'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo $data['category_id'] ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="editModalLabel">Hapus Tugas</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="../config/aksi_tugas.php" method="POST">
                                                        <input type="hidden" name="category_id" value="<?php echo $data['category_id'] ?>">
                                                         Apakah anda yakin akan menghapus data <strong><?php echo $data ['namatugas'] ?> </strong> ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="hapus" class="btn btn-primary">Simpan Perubahan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
    <p>MY TO DO LIST | vanesa</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>