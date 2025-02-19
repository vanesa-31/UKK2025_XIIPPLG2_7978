<?php
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $namaalbum = $_POST['namatugas'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = date('Y-m-d');
    $userid = $_SESSION['userid'];

    $sql = mysqli_query($koneksi, "INSERT INTO tugas VALUES('','$namatugas','$deskripsi','$tanggal','$userid')");
    echo "<script>
    alert ('Data berhasil disimpan');
    location.href='../admin/tugas.php';
    </script>";
}

if (isset($_POST['tugas'])) {
    $tugasid = $_POST['tugasid'];
    $namatugas = $_POST['namatugas'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = date('Y-m-d');
    $userid = $_SESSION['userid'];

    $sql = mysqli_query($koneksi, "UPDATE tugas SET namatugas='$namatugas', deskripsi='$deskripsi', tanggalbuat='$tanggal' WHERE tugasid='$tugasid'");
    if ($sql) { // Query succeeded
        echo "<script>
        alert('Data berhasil disimpan!');
        location.href='../admin/tugas.php';
        </script>";
    } else { // Query failed
        echo "<script>
        alert('Error: " . mysqli_error($koneksi) . "');
        </script>";
    }
    
}


if (isset($_POST['hapus'])) {
    $tugasid = $_POST['tugasid'];

    $sql = mysqli_query($koneksi, "DELETE FROM tugas WHERE albumid='$tugasid'");
    echo "<script>
    alert ('Data berhasil dihapus');
    location.href='../admin/tugas.php';
    </script>";
}

?>