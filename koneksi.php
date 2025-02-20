<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$koneksi = mysqli_connect('localhost', 'root', '', 'UKK2025_XIIPPLG2_7978');

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
