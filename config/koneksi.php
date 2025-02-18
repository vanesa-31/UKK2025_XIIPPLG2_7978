<?php
$hostname = 'localhost';
$userdb = 'root';
$passdb = '';
$namedb = 'UKK2025_XIIPPLG2_7978';

$koneksi = mysqli_connect($hostname, $userdb, $passdb, $namedb);

// Periksa apakah koneksi berhasil
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>