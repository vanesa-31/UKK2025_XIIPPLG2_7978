<?php
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $judultugas = $_POST['judultugas'];
    $deskripsitugas = $_POST['deskripsitugas'];
    $tanggaltugas = date('Y-m-d');
    $tugasid = $_POST['tugasid'];
    $userid = $_SESSION['userid'];
    $namatugas = rand().'-'.$tugas;

    move_uploaded_file($tmp, $lokasi.$namatugas);

    $sql = mysqli_query($koneksi, "INSERT INTO tugas VALUES('','$judultugas','$statustugas','$tanggaltugas','$namatugas','$tugasid','$userid')");
    echo "<script>
    alert ('Data berhasil disimpan');
    location.href='../admin/categories.php';
    </script>";
}

if(isset($_POST['edit'])){
    $tugasid = $_POST['tugasid'];
    $judultugas = $_POST['judultugas'];
    $statustugas = $_POST['statustugas'];
    $tanggaltugas = date('Y-m-d');
    $tugasid = $_POST['tugasid'];
    $userid = $_SESSION['userid'];
    $namatugas = rand().'-'.$tugas;

    if($foto == null) {
        $sql = mysqli_query($koneksi, "UPDATE tugas SET judultugas='$judultugas',statusfoto='$statusfoto',
        tanggaltugas='$tanggaltugas', tugasid='$tugasid' WHERE tugasid='$tugasid'");
}else{
    $query = mysqli_query($koneksi, "SELECT * FROM tugas WHERE tugasid='$tugasid'");
    $data = mysqli_fetch_array($query);
    if (is_file('../asset/tugas/'.$data['lokasifile'])){
        unlink('../asset/tugas/'.$data['lokasifile']);
    }
    move_uploaded_file($tmp, $lokasi.$namatugas);
    $sql = mysqli_query($koneksi, "UPDATE tugas SET judultugas='$judultugas',statustugas='$statustugas',
        tanggaltugas='$tanggaltugas', tugasid='$tugasid' WHERE tugasid='$tugasid'");
    }
    echo "<script>
    alert ('Data berhasil disimpan');
    location.href='../admin/tugas.php';
    </script>";
}

if (isset($_POST['hapus'])) {
    $tugasid = $_POST['tugasid'];
    $query = mysqli_query($koneksi, "SELECT * FROM tugas WHERE tugasid='$tugasid'");
    $data = mysqli_fetch_array($query);
    if (is_file('../asset/tugas/'.$data['lokasifile'])) {
        unlink('../asset/tugas/'.$data['lokasifile']);
    }

    $sql = mysqli_query($koneksi, "DELETE FROM tugas WHERE tugasid='$tugasid'");
    echo "<script>
    alert('Data berhasil dihapus!');
    location.href='../admin/tugas.php';
    </script>";
}