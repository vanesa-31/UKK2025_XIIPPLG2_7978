<?php
include '../config/koneksi.php';
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
<nav class="navbar navbar-expand-lg bg-body-tertiary">
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:rgb(52, 227, 250);">
  <div class="container">
    <a class="navbar-brand" href="index.php">MY TO DO LIST</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
      <div class="navbar-nav me-auto">
        <a href="home.php" class="nav-link">Home</a>
        <a href="tugas.php" class="nav-link">Tugas</a>
        <a href="categories.php" class="nav-link">Kategori</a>
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
                <div class="card-header">Tambah Tugas</div>
                <div class="card-body">
                    <form action="../config/aksi_tugas.php" method="POST" enctype="multipart/form-data">
                        <label class="form-label">Nama Tugas</label>
                        <input type="text" name="namatugas" class="form-control" required>
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsitugas" required></textarea>
                        <label class="form-label">List Tugas</label>
                        <select class="form-control" name="id">
                        </select>
                        <label class="form-label">File</label>
                        <input type="file" class="form-control" name="lokasifile" require>
                        <button type="submit" class="btn btn-primary mt-2" name="tambah">Tambah tugas</button>
                    </form>
                    
                </div>
            </div>
        </div>

        <!-- Tabel Data Album -->
        <div class="col-md-8">
            <div class="card mt-2">
                <div class="card-header">Data tugas</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tugas</th>
                                <th>Judul Tugas</th>
                                <th>status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
    <?php 
    $no = 1;
    session_start();
    $userid = $_SESSION['userid'];
    $sql = mysqli_query($koneksi, "SELECT * FROM tugas WHERE userid='$userid'");
    if (mysqli_num_rows($sql) > 0) {
        while ($data = mysqli_fetch_array($sql)) {
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $data['judultugas']; ?></td>
        <td><?php echo $data['statustugas']; ?></td>
        <td><?php echo $data['tanggaltugas']; ?></td>
        <td>
            <!-- Tombol Edit -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
                data-bs-target="#edit<?php echo $data['tugasid']; ?>">Edit</button>
            <!-- Modal Edit -->
            <div class="modal fade" id="edit<?php echo $data['tugasid']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo $data['tugasid']; ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editModalLabel<?php echo $data['tugasid']; ?>">Edit tugas</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="../config/aksi_category.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="tugasid" value="<?php echo $data['tugasid']; ?>">
                                <label class="form-label">Judul Tugas</label>
                                <input type="text" name="judultugas" value="<?php echo $data['judultugas']; ?>" class="form-control">
                                <label class="form-label">Status</label>
                                <textarea class="form-control" name="statustugas" required><?php echo $data['statustugas']; ?></textarea>
                                <label class="form-label">Tugas</label>
                                <select class="form-control" name="tugasid">
                                    <?php
                                    $sql_tugas = mysqli_query($koneksi, "SELECT * FROM tugas WHERE userid='$userid'");
                                    while ($data_tugas = mysqli_fetch_array($sql_tugas)) { ?>
                                        <option <?php if ($data_tugas['tugasid'] == $data['tugasid']) { ?> selected="selected" <?php } ?> value="<?php echo $data_tugas['tugasid']; ?>"><?php echo $data_tugas['namatugas']; ?></option>
                                    <?php } ?>
                                </select>
                                <label class="form-label">Tugas</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="../asset/tugas/<?php echo $data['statustugas']; ?>">
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label">Tempat Tugas</label>
                                        <input type="file" class="form-control" name="statustugas">
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="edit" class="btn btn-primary">Edit Tugas</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" 
                data-bs-target="#hapus<?php echo $data['tugasid']; ?>">Hapus</button>
            <!-- Modal Hapus -->
            <div class="modal fade" id="hapus<?php echo $data['tugasid']; ?>" tabindex="-1" aria-labelledby="hapusModalLabel<?php echo $data['tugasid']; ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="hapusModalLabel">Hapus Tugas</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="../config/aksi_category.php" method="POST">
                                <input type="hidden" name="tugasid" value="<?php echo $data['tugasid']; ?>">
                                Apakah Anda yakin akan menghapus data <strong><?php echo $data['namatugas']; ?></strong>?
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="hapus" class="btn btn-primary">Hapus Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </tr>
    <?php 
        }
    } else {
        echo "<tr><td colspan='6'>Tidak ada data tersedia</td></tr>";
    } ?>
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